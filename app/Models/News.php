<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'image_path',
        'type',
        'external_url',
        'admin_id',
    ];

    protected $casts = [
        'type' => 'string',
    ];

    /**
     * The admin/user who authored this news article.
     */
    public function admin(): BelongsTo
    {
        return $this->belongsTo(User::class, 'admin_id');
    }

    /**
     * Determine if this news item links to an external source.
     */
    public function isExternal(): bool
    {
        return $this->type === 'external';
    }
}
