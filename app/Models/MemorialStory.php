<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MemorialStory extends Model
{
    /** @use HasFactory<\Database\Factories\MemorialStoryFactory> */
    use HasFactory;

    protected $fillable = [
        'memorial_page_id',
        'title',
        'content',
        'author_name',
        'sort_order',
    ];

    public function memorialPage(): BelongsTo
    {
        return $this->belongsTo(MemorialPage::class);
    }

    public function getExcerptAttribute(?int $length = 150): string
    {
        return \Str::limit(strip_tags($this->content), $length);
    }

    public function getWordCountAttribute(): int
    {
        return str_word_count(strip_tags($this->content));
    }
}
