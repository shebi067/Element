<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Playlist;
use App\Models\Song;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    /**
     * Show the music application homepage.
     */
    public function __invoke(): View
    {
        $featuredSongs = Song::where('is_featured', true)->get();
        $trendingSongs = Song::where('is_trending', true)->orderByDesc('plays_count')->get();
        $popularSongs = Song::orderByDesc('plays_count')->take(8)->get();
        $allSongs = Song::all();
        $artists = Artist::all();
        $playlists = Playlist::with('songs')->get();
        $genres = ['All', 'Bollywood', 'Punjabi', 'Synth-Pop', 'Hip-Hop', 'Dance Pop', 'Sufi', 'Lo-Fi', 'R&B'];

        $playerQueue = $allSongs->map(fn (Song $song): array => [
            'id' => $song->id,
            'title' => $song->title,
            'artist' => $song->artist_name,
            'album' => $song->album_name ?? '',
            'genre' => $song->genre,
            'cover' => $song->cover_url,
            'audio' => $song->audio_url,
            'video_id' => $song->video_id,
            'duration' => $song->duration,
            'lyrics' => $song->lyrics ? json_decode($song->lyrics, true) : [],
            'plays' => number_format($song->plays_count),
        ])->values();

        return view('music.index', [
            'featuredSongs' => $featuredSongs,
            'trendingSongs' => $trendingSongs,
            'popularSongs' => $popularSongs,
            'allSongs' => $allSongs,
            'artists' => $artists,
            'playlists' => $playlists,
            'genres' => $genres,
            'playerQueue' => $playerQueue,
        ]);
    }
}
