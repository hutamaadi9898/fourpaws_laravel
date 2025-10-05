<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class MemorialPage extends Model
{
    /** @use HasFactory<\Database\Factories\MemorialPageFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'template_id',
        'pet_name',
        'pet_type',
        'breed',
        'birth_date',
        'death_date',
        'description',
        'slug',
        'is_published',
        'view_count',
        'custom_settings',
    ];

    protected function casts(): array
    {
        return [
            'birth_date' => 'date',
            'death_date' => 'date',
            'custom_settings' => 'array',
            'is_published' => 'boolean',
            'view_count' => 'integer',
        ];
    }

    protected static function booted(): void
    {
        static::creating(function (MemorialPage $memorialPage) {
            if (empty($memorialPage->slug)) {
                $memorialPage->slug = Str::slug($memorialPage->pet_name.'-'.Str::random(6));
            }
        });
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function template(): BelongsTo
    {
        return $this->belongsTo(MemorialTemplate::class);
    }

    public function media(): HasMany
    {
        return $this->hasMany(MemorialMedia::class)->orderBy('sort_order');
    }

    public function stories(): HasMany
    {
        return $this->hasMany(MemorialStory::class)->orderBy('sort_order');
    }

    public function guestbookEntries(): HasMany
    {
        return $this->hasMany(GuestbookEntry::class)->where('is_approved', true)->latest();
    }

    public function scopePublished(Builder $query): void
    {
        $query->where('is_published', true);
    }

    public function scopeByUser(Builder $query, User $user): void
    {
        $query->where('user_id', $user->id);
    }

    public function scopeByPetType(Builder $query, string $petType): void
    {
        $query->where('pet_type', $petType);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function getUrlAttribute(): string
    {
        return route('memorial.show', $this->slug);
    }

    public function incrementViewCount(): void
    {
        $this->increment('view_count');
    }
}
