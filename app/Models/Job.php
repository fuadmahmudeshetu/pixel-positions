<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Job extends Model
{
    /** @use HasFactory<\Database\Factories\JobFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'salary',
        'location',
        'is_approved',
        'schedule',
        'gender_preference',
        'teaching_mode',
        'url',
        'status',
        'featured',
    ];


    public function tags() {
        return $this->belongsToMany(Tag::class);
    }

    public function employer(): BelongsTo {
        return $this->belongsTo(Employer::class);
    }

}
