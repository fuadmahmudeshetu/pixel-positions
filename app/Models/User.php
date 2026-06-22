<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable([
    'name',
    'role',
    'phone_number',
    'national_id',
    'email',
    'password',
])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function employer(): HasOne {
        return $this->hasOne(Employer::class);
    }

    public function isAdmin(): bool {
        return $this->role === 'admin';
    }

    public function isTeacher(): bool {
        return $this->role === 'teacher';
    }

    public function isEmployer(): bool {
        return $this->role === 'employer';
    }

    public function isTeacherOrEmployer(): bool {
        return in_array($this->role, ['teacher', 'employer']);
    }

    public function isStudent(): bool {
        return $this->role === 'student';
    }

    public function jobs(): HasManyThrough
    {
        return $this->hasManyThrough(Job::class, Employer::class);
    }

    public function bookmarks()
    {
        return $this->belongsToMany(Job::class, 'bookmarks')->withTimestamps();
    }
}
