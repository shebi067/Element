<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArtistResource;
use App\Http\Resources\SongResource;
use App\Models\Artist;
use App\Models\Song;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class MusicController extends Controller
{
    /**
     * Get list of songs with search and filter.
     */
    public function index(Request $request): AnonymousResourceCollection
    {
        $query = Song::query()->with('artist');

        if ($request->filled('search')) {
            $search = (string) $request->input('search');
            $query->where(function ($q) use ($search): void {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('artist_name', 'like', "%{$search}%")
                    ->orWhere('album_name', 'like', "%{$search}%");
            });
        }

        if ($request->filled('genre') && $request->input('genre') !== 'All') {
            $query->where('genre', $request->input('genre'));
        }

        return SongResource::collection($query->latest()->paginate(20));
    }

    /**
     * Get featured songs for banner.
     */
    public function featured(): AnonymousResourceCollection
    {
        $featured = Song::where('is_featured', true)->take(5)->get();

        return SongResource::collection($featured);
    }

    /**
     * Get trending songs.
     */
    public function trending(): AnonymousResourceCollection
    {
        $trending = Song::where('is_trending', true)->orderByDesc('plays_count')->take(10)->get();

        return SongResource::collection($trending);
    }

    /**
     * Get list of artists.
     */
    public function artists(): AnonymousResourceCollection
    {
        return ArtistResource::collection(Artist::all());
    }

    /**
     * Show single song details.
     */
    public function show(Song $song): SongResource
    {
        return new SongResource($song->load('artist'));
    }

    /**
     * Record a song play.
     */
    public function recordPlay(Song $song): JsonResponse
    {
        $song->increment('plays_count');

        return response()->json([
            'status' => 'success',
            'plays_count' => $song->plays_count,
        ]);
    }
}
