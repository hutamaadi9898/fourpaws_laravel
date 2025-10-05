<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MemorialTemplate extends Model
{
    /** @use HasFactory<\Database\Factories\MemorialTemplateFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'preview_image',
        'template_data',
        'is_active',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'template_data' => 'array',
            'is_active' => 'boolean',
        ];
    }

    public function memorialPages(): HasMany
    {
        return $this->hasMany(MemorialPage::class, 'template_id');
    }

    public function scopeActive(Builder $query): void
    {
        $query->where('is_active', true);
    }

    public function scopeOrdered(Builder $query): void
    {
        $query->orderBy('sort_order')->orderBy('name');
    }
}
