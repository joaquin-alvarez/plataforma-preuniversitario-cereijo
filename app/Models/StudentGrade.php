<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StudentGrade extends Model
{
    use HasFactory;

    public function gradablePeriod(): BelongsTo
    {
        return $this->belongsTo(GradablePeriod::class, 'gradable_period', 'period');
    }
}
