<?php

namespace App\Models;

use App\Models\Storage\Document;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class StudentAbsenceReport extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function documents(): MorphMany
    {
        return $this->morphMany(Document::class, 'commentable');
    }
}
