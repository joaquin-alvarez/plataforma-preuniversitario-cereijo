<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class StudentGuardian extends Model
{
    use HasFactory;

    protected $primaryKey = 'dni';
    public $incrementing = false;

    protected $fillable = [];

    public function students(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function studentWithdrawals(): HasMany
    {
        return $this->hasMany(StudentWithdrawal::class);
    }
}
