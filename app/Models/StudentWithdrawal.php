<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StudentWithdrawal extends Model
{
    use HasFactory;

    public function student(): BelongsTo
    {
        return $this->belongsTo(User::class, 'student_dni', 'dni');
    }

    public function studentGuardian(): BelongsTo
    {
        return $this->belongsTo(StudentGuardian::class, 'student_guardian_dni', 'dni');
    }
}
