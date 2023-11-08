<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Support\Role;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Builder;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $primaryKey = 'dni';
    public $incrementing = false;

    public function studentGuardians(): BelongsToMany
    {
        return $this->belongsToMany(StudentGuardian::class);
    }

    public function studentAbsenceReports(): HasMany
    {
        return $this->hasMany(StudentAbsenceReport::class, 'student_dni');
    }

    protected $fillable = [];


    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'password' => 'hashed',
    ];

    protected function getProperFullNameAttribute(): string
    {
        return Str::title($this->last_name . ', '. $this->first_name);
    }

        public function scopeOfRole(Builder $query, Role $role): void
        {
            $query->where('role_id', $role);
        }
}
