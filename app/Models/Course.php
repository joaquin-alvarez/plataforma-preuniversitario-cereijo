<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    use HasFactory;

    public function announcements(): BelongsToMany
    {
        return $this->belongsToMany(Announcement::class);
    }

    public function students(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function subjects(): HasMany
    {
        return $this->hasMany(Subject::class);
    }
}
