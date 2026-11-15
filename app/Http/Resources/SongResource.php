<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SongResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'artist_name' => $this->artist_name,
            'artist_id' => $this->artist_id,
            'album_name' => $this->album_name,
            'genre' => $this->genre,
            'cover_url' => $this->cover_url,
            'audio_url' => $this->audio_url,
            'duration' => $this->duration,
            'plays_count' => $this->plays_count,
            'is_featured' => (bool) $this->is_featured,
            'is_trending' => (bool) $this->is_trending,
            'created_at' => $this->created_at?->toIso8601String(),
        ];
    }
}
