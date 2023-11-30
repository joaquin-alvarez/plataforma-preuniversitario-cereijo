<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GradablePeriodState extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function gradablePeriod(): BelongsTo
    {
        return $this->belongsTo(GradablePeriodState::class);
    }

    public function scopeActive(Builder $query): void
    {
        $query->where('is_active', true)->latest();
    }

    protected static function booted(): void
    {
        static::saved(function (GradablePeriodState $gradablePeriodState) {
            GradablePeriodState::where('id', '!=', $gradablePeriodState->id)->update(['is_active' => false]);
        });
    }

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
