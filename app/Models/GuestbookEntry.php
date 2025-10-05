<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GuestbookEntry extends Model
{
    /** @use HasFactory<\Database\Factories\GuestbookEntryFactory> */
    use HasFactory;

    protected $fillable = [
        'memorial_page_id',
        'visitor_name',
        'visitor_email',
        'message',
        'is_approved',
    ];

    protected $casts = [
        'is_approved' => 'boolean',
    ];

    public function memorialPage(): BelongsTo
    {
        return $this->belongsTo(MemorialPage::class);
    }

    public function scopeApproved($query)
    {
        return $query->where('is_approved', true);
    }

    public function scopePending($query)
    {
        return $query->where('is_approved', false);
    }

    public function getIsPublicAttribute(): bool
    {
        return $this->is_approved;
    }

    public function approve(): void
    {
        $this->update(['is_approved' => true]);
    }

    public function reject(): void
    {
        $this->update(['is_approved' => false]);
    }
}
