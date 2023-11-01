<?php

namespace App\Models\Storage;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class StudentGradesReport extends Model
{
    use HasFactory;

    protected $fillable = ['student_dni', 'path'];

    public function student(): BelongsTo
    {
        return $this->belongsTo(User::class, 'student_dni', 'dni');
    }

    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        static::updated(function (StudentGradesReport $studentGradesReport) {
            Storage::delete($studentGradesReport->getOriginal('path'));
        });
    }
}
