<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Song;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    /**
     * Show the music application homepage.
     */
    public function __invoke(): View
    {
        $featuredSong = Song::where('is_featured', true)->first() ?? Song::first();
        $trendingSongs = Song::where('is_trending', true)->orderByDesc('plays_count')->get();
        $allSongs = Song::all();
        $artists = Artist::all();
        $genres = ['All', 'Bollywood', 'Punjabi', 'Synth-Pop', 'Hip-Hop', 'Dance Pop', 'Sufi', 'Lo-Fi', 'R&B'];

        $playerQueue = $allSongs->map(fn (Song $song): array => [
            'id' => $song->id,
            'title' => $song->title,
            'artist' => $song->artist_name,
            'cover' => $song->cover_url,
            'audio' => $song->audio_url,
        ])->values();

        return view('music.index', [
            'featuredSong' => $featuredSong,
            'trendingSongs' => $trendingSongs,
            'allSongs' => $allSongs,
            'playerQueue' => $playerQueue,
            'artists' => $artists,
            'genres' => $genres,
        ]);
    }
}
