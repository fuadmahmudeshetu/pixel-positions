# Pixel Positions 🌟

A specialized job board platform designed to connect educators, Islamic studies teachers, and students in a seamless, role-based environment.

## 🚀 Features

### For Students
- **Browse & Search**: Find teaching opportunities, Quran classes, and academic resources.
- **Advanced Filters**: Filter by location, teaching mode (Online/In-person), schedule, and gender preference.
- **Bookmarks**: Save jobs to your profile for later review.

### For Teachers & Employers
- **Job Posting**: Share opportunities with detailed descriptions, salary ranges, and custom tags.
- **Profile Management**: Maintain a public profile showcasing all your active listings.
- **Notifications**: Real-time alerts when your job postings are approved or rejected by an admin.

### For Administrators
- **Dashboard**: High-level overview of users, employers, and job postings.
- **Approval Workflow**: Review pending jobs with the ability to approve or reject with specific reasons.
- **User Management**: Edit roles and manage all accounts in the system.

## 🛠️ Tech Stack

- **Framework**: [Laravel 11](https://laravel.com)
- **Frontend**: [Tailwind CSS](https://tailwindcss.com), [Alpine.js](https://alpinejs.dev), [Blade Components](https://laravel.com/docs/blade#components)
- **Icons/Assets**: [Vite](https://vitejs.dev)
- **Database**: SQLite (standard configuration)

## 🏁 Getting Started

### Prerequisites
- PHP 8.2+
- Composer
- Node.js & NPM

### Installation
1. **Clone the repository**:
   ```bash
   git clone <repository-url>
   cd pixel-positions
   ```

2. **Install dependencies**:
   ```bash
   composer install
   npm install
   ```

3. **Environment Setup**:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Database Migration & Seeding**:
   ```bash
   php artisan migrate --seed
   ```

5. **Run the Application**:
   ```bash
   # Terminal 1: Laravel Server
   php artisan serve

   # Terminal 2: Vite Assets
   npm run dev
   ```

## 📂 Project Structure Highlights
- `app/Http/Controllers`: Role-based logic for Auth, Jobs, and Admin.
- `app/Models`: Robust relationships between Users, Employers, Jobs, and Bookmarks.
- `resources/views/components`: Reusable UI elements for a consistent "dark mode" aesthetic.
- `routes/web.php`: Clean, named routes for all application features.

## 📜 License
This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
