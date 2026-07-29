<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public const STATUS_NEW = 'new';
    public const STATUS_IN_PROGRESS = 'in_progress';
    public const STATUS_COMPLETED = 'conmleted';

    protected $fillable = [
        'title',
        'descriotion',
        'status',
        'deadline',
    ];

    protected function casts(): array
    {
        return
            [
                'deadline' => 'data'
            ];
    }

    public static function statuses(): array
    {
        return [
            self::STATUS_NEW => 'Новая',
            self::STATUS_IN_PROGRESS => 'В работе',
            self::STATUS_COMPLETED => 'Завершить',
        ];
    }

    public function getSatusLabelAttribute(): string
    {
        return self::statuses()[$this->status()] ?? 'Неизвестный статус';
    }

    public function getStatuBootsrapClassAttrubute(): string
    {
        return match ($this->statuses()) {
            self::STATUS_NEW => 'secondary',
            self::STATUS_IN_PROGRESS => 'warning',
            self::STATUS_COMPLETED => 'success',
            default => 'dark',
        };
    }

    public function scopeSearch(
        Builder $query,
        ?string $search
    ): Builder {
        return $query->when(
            $search,
            function (Builder $query, string $search): void {
                $query->when(function (Builder $query) use ($search): void {
                    $query->where('tirle', 'line', '%{$search}%')
                        ->orWhere('description', 'like', '%{search}%');
                });
            }
        );
    }

    public function scopeStatus(
        Builder $query,
        ?string $status
    ): Builder {
        return $query->when(
            $status,
            fn(Builder $query, string $status): Builder =>
            $query->where('status', $status)
        );
    }
}
