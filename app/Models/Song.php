<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Song extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'artist_id',
        'artist_name',
        'album_name',
        'genre',
        'cover_url',
        'audio_url',
        'video_id',
        'duration',
        'lyrics',
        'plays_count',
        'is_featured',
        'is_trending',
    ];

    /**
     * @return BelongsTo<Artist, $this>
     */
    public function artist(): BelongsTo
    {
        return $this->belongsTo(Artist::class);
    }

    /**
     * @return BelongsToMany<Playlist, $this>
     */
    public function playlists()
    {
        return $this->belongsToMany(Playlist::class, 'playlist_song');
    }

    public function getFormattedDurationAttribute(): string
    {
        if (! $this->duration) {
            return '3:30';
        }
        if (str_contains((string) $this->duration, ':')) {
            return (string) $this->duration;
        }

        return gmdate('i:s', (int) $this->duration);
    }
}
