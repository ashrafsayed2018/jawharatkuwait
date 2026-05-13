<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $fillable = [
        'overall',
        'price',
        'service',
        'staff',
        'quality',
        'comment',
        'reviewer_name',
        'is_approved',
    ];

    protected $casts = [
        'is_approved' => 'boolean',
        'overall'     => 'integer',
        'price'       => 'integer',
        'service'     => 'integer',
        'staff'       => 'integer',
        'quality'     => 'integer',
    ];

    // ─── Scopes ──────────────────────────────────────────────────────────────

    public function scopeApproved($query)
    {
        return $query->where('is_approved', true);
    }

    public function scopePending($query)
    {
        return $query->where('is_approved', false);
    }

    // ─── Computed attributes ──────────────────────────────────────────────────

    public function getAverageSubScoreAttribute(): ?float
    {
        $scores = array_filter([
            $this->price,
            $this->service,
            $this->staff,
            $this->quality,
        ], fn ($v) => $v !== null);

        if (empty($scores)) {
            return null;
        }

        return round(array_sum($scores) / count($scores), 1);
    }

    public function getStarsArrayAttribute(): array
    {
        return array_map(
            fn ($i) => ['filled' => $i <= $this->overall],
            range(1, 5)
        );
    }

    // ─── Static helpers ───────────────────────────────────────────────────────

    public static function labelFor(int $score): string
    {
        return match ($score) {
            5 => 'ممتاز',
            4 => 'جيد جداً',
            3 => 'جيد',
            2 => 'مقبول',
            default => 'ضعيف',
        };
    }

    public static function globalStats(): array
    {
        $ratings = self::approved()->get();

        if ($ratings->isEmpty()) {
            return ['average' => 0, 'count' => 0, 'distribution' => array_fill(1, 5, 0)];
        }

        $distribution = [];
        for ($i = 1; $i <= 5; $i++) {
            $distribution[$i] = $ratings->where('overall', $i)->count();
        }

        return [
            'average'      => round($ratings->avg('overall'), 2),
            'count'        => $ratings->count(),
            'distribution' => $distribution,
        ];
    }
}
