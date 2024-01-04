<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;

class StudentWarning extends Model
{
    use HasFactory;

    protected $fillable = [];

    protected $with = ['student'];

    public function student() : BelongsTo
    {
        return $this->belongsTo(User::class, 'student_dni', 'dni');
    }

    public function scopeSearch(Builder $query, int $dni) : void
    {
        $query->where('student_dni', 'like', '%'.$dni.'%');
    }
}
