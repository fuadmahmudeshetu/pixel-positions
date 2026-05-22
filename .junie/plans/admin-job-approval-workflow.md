---
sessionId: session-260522-151236-h6nn
---

# Requirements

### Overview & Goals
Implement a moderation flow where newly created jobs are hidden from public pages until an admin approves them.

### In Scope
- New jobs are saved in a **pending** state by default.
- Admin can approve a pending job from the admin jobs screen.
- Public-facing job listings/search/tag pages show only approved jobs.
- Admin jobs screen shows approval status clearly.

### Out of Scope
- Multi-step review workflow (reject/revision/history).
- Email/notification system for approval events.
- Full role/permission redesign (existing `admin` middleware remains the gate).

### Acceptance Criteria
- When a non-admin posts a job, it does **not** appear on `/`, `/jobs`, `/teachers`, `/search`, or tag pages.
- Admin sees the job in `/admin/jobs` with status `Pending`.
- After admin clicks `Approve`, status becomes `Approved` and the job appears on public pages.

# Technical Design

### Current Implementation (from codebase)
- Job creation is in `app/Http/Controllers/JobController.php` (`store`).
- Public job queries are in:
  - `JobController@index` and `JobController@teachers`
  - `app/Http/Controllers/SearchController.php`
  - `app/Http/Controllers/TagController.php`
- Current bug found: in `JobController@teachers`, the non-featured `$jobs` query is missing `where('is_approved', 1)`, so pending jobs are still shown on `/teachers`.
- Admin jobs page is served by `AdminController@jobs` and rendered in `resources/views/admin/jobs.blade.php`.
- Admin protection already exists via `routes/web.php` admin group + `app/Http/Middleware/IsAdmin.php` alias in `bootstrap/app.php`.

### Key Decisions
- Use a simple database flag (`is_approved`) on `jobs` for moderation state.
- Keep approval action inside existing `AdminController` to match current routing style.
- Apply approval filtering at query level (controllers), so unapproved jobs are never passed to public views.

### Proposed Changes
1. **Persist approval state**
   - Add a migration in `database/migrations` to append `is_approved` (boolean, default `false`) to `jobs`.
   - Update `app/Models/Job.php`:
     - include `is_approved` in fillable/casts (cast to `boolean`).

2. **Create admin approval endpoint**
   - In `routes/web.php` (inside existing admin group), add route like:
     - `PATCH /admin/jobs/{job}/approve` -> `AdminController@approve` (name `admin.jobs.approve`).
   - In `app/Http/Controllers/AdminController.php`:
     - add `approve(Job $job)` method to set `is_approved = true` and redirect back with flash message.

#### Reference code for `approve` method (copy manually)
```php
public function approve(Job $job)
{
    if ($job->is_approved) {
        return redirect()->back()->with('success', 'Job is already approved.');
    }

    $job->update([
        'is_approved' => true,
    ]);

    return redirect()->back()->with('success', 'Job approved successfully.');
}
```

#### Route line for this method
```php
Route::patch('/jobs/{job}/approve', 'approve')->name('jobs.approve');
```

3. **Filter public pages to approved jobs only**
   - Update `JobController@index` and `JobController@teachers` queries to include `where('is_approved', true)` for both featured and non-featured lists.
   - Update `SearchController` query to only return approved jobs.
   - Update `TagController` to query approved jobs from tag relation (`$tag->jobs()->where('is_approved', true)->get()`).

4. **Expose moderation controls in admin UI**
   - Update `resources/views/admin/jobs.blade.php`:
     - add status badge (`Pending` / `Approved`).
     - add approve button/form for pending jobs that submits PATCH to `admin.jobs.approve`.
     - show success flash message after approval.

### Risks / Notes
- Existing jobs will default to `is_approved = false` with this migration; if you want old jobs visible immediately, run a one-time DB update to mark existing rows approved.
- Ensure approval button is present in both desktop and mobile layout blocks in `admin/jobs.blade.php` to keep UX consistent.

# Testing

### Validation Approach
Use manual browser checks and existing Laravel routes to verify moderation behavior end-to-end.

### Key Scenarios
- Create a job as normal authenticated non-admin user and verify it does not appear on home/teachers/search/tag pages.
- Open `/admin/jobs` as admin and verify the new job is marked `Pending` with an `Approve` button.
- Click `Approve`, verify flash success appears, status changes to `Approved`, and job appears publicly.

### Edge Checks
- Approving an already approved job should not break (action should remain idempotent or harmless).
- Non-admin user must not access approve route (blocked by existing `admin` middleware).
- Pagination/listing should still function after adding approval filter.

# Delivery Steps

###   Step 1: Add job approval state to persistence model
Outcome: Jobs have a persisted moderation flag that defaults to pending.

- Create a migration under `database/migrations` to add `is_approved` (boolean, default `false`) to the `jobs` table.
- Update `app/Models/Job.php` to include `is_approved` in model attributes (`fillable`/casts) so reads and writes are explicit.
- Decide and document one-time handling for existing rows (either bulk set approved or leave pending for manual review).

###   Step 2: Implement admin approval action in backend routes/controllers
Outcome: Admin can approve a specific job through a secured endpoint.

- Extend `routes/web.php` inside the existing `Route::middleware(['auth', 'admin'])->prefix('admin')...` group with a PATCH approval route.
- Add `approve(Job $job)` method in `app/Http/Controllers/AdminController.php` to update the flag and redirect with a session success message.
- Keep the action aligned with current controller conventions already used for admin user update/delete actions.

###   Step 3: Restrict all public job discovery flows to approved jobs
Outcome: Unapproved jobs are hidden from all user-facing listings and discovery endpoints.

- Add `where('is_approved', true)` to all public list queries; specifically fix `JobController@teachers` non-featured `$jobs` query which currently has no approval filter.
- Update `SearchController` so search returns only approved jobs.
- Update `TagController` to fetch only approved jobs from the tag relation query.
- Re-check pagination/fragments still work after query constraints.

###   Step 4: Add approval controls and status indicators in admin jobs UI
Outcome: Admin jobs page clearly shows pending/approved state and supports approving in one click.

- Modify `resources/views/admin/jobs.blade.php` desktop table to include a status column and approve form/button for pending rows.
- Mirror the same approval controls/status in the mobile card layout section of the same file.
- Add flash message rendering (similar to `admin/users.blade.php`) to confirm successful approval actions.