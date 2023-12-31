<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $primaryKey = 'dni';

    public $incrementing = false;

    protected $appends = ['proper_full_name'];

    public function studentAbsenceReports(): HasMany
    {
        return $this->hasMany(StudentAbsenceReport::class, 'student_dni');
    }

    public function studentCourse(): BelongsTo
    {
        return $this->belongsTo(Course::class, 'course_id', 'id')->withDefault([
            'course' => 'sin curso asignado'
        ]);
    }

    public function studentGuardians(): BelongsToMany
    {
        return $this->belongsToMany(StudentGuardian::class);
    }

    public function studentWarnings(): HasMany
    {
        return $this->hasMany(StudentWarning::class, 'student_dni', 'dni');
    }

    public function studentWithdrawals(): HasMany
    {
        return $this->hasMany(StudentWithdrawal::class, 'student_dni', 'dni');
    }

    protected $guarded = [];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'password' => 'hashed',
    ];

    protected function properFullName(): Attribute
    {
        return Attribute::make(
            get: fn () => Str::title($this->last_name.', '.$this->first_name)
        );
    }

    public function scopeOfRole(Builder $query, int $role_id): void
    {
        $query->where('role_id', $role_id);
    }

    public function scopeSearch(Builder $query, int $dni)
    {
        $query->where('dni', 'like', '%'.$dni.'%');
    }
}
