<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class MemorialMedia extends Model
{
    /** @use HasFactory<\Database\Factories\MemorialMediaFactory> */
    use HasFactory;

    protected $fillable = [
        'memorial_page_id',
        'media_type',
        'file_path',
        'original_filename',
        'mime_type',
        'file_size',
        'alt_text',
        'sort_order',
    ];

    public function memorialPage(): BelongsTo
    {
        return $this->belongsTo(MemorialPage::class);
    }

    public function scopeImages(Builder $query): void
    {
        $query->where('media_type', 'image');
    }

    public function scopeVideos(Builder $query): void
    {
        $query->where('media_type', 'video');
    }

    public function scopeAudio(Builder $query): void
    {
        $query->where('media_type', 'audio');
    }

    public function getUrlAttribute(): string
    {
        return Storage::url($this->file_path);
    }

    public function getFormattedFileSizeAttribute(): string
    {
        $units = ['B', 'KB', 'MB', 'GB'];
        $bytes = $this->file_size;

        for ($i = 0; $bytes > 1024 && $i < count($units) - 1; $i++) {
            $bytes /= 1024;
        }

        return round($bytes, 2).' '.$units[$i];
    }

    public function isImage(): bool
    {
        return $this->media_type === 'image';
    }

    public function isVideo(): bool
    {
        return $this->media_type === 'video';
    }

    public function isAudio(): bool
    {
        return $this->media_type === 'audio';
    }
}
