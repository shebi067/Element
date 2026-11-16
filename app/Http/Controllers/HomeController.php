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
        $allSongs = Song::with('playlists')->orderBy('id')->get();
        $artists = Artist::all();

        // Ensure "Favourite Songs" playlist exists
        $favPlaylist = Playlist::firstOrCreate(
            ['title' => 'Favourite Songs'],
            [
                'description' => 'Your personal collection of liked tracks',
                'cover_url' => '/storage/covers/NzDjENadvrQ.jpg',
                'tracks_count' => 0,
                'source' => 'local',
            ]
        );
        $favoriteSongIds = $favPlaylist->songs()->pluck('songs.id')->toArray();

        $playlists = Playlist::with('songs')->get();
        $suggestedPlaylist = Playlist::with('songs')->where('title', '!=', 'Favourite Songs')->latest()->first() ?? $playlists->first();
        $genres = ['All', '❤️ Favourites', '📥 Downloads', 'Bollywood', 'Punjabi', 'Synth-Pop', 'Hip-Hop', 'Dance Pop', 'Sufi', 'Lo-Fi', 'R&B'];

        $playerQueue = $allSongs->map(fn (Song $song): array => [
            'id' => $song->id,
            'title' => $song->title,
            'artist' => $song->artist_name,
            'album' => $song->album_name ?? '',
            'genre' => $song->genre,
            'cover' => $song->cover_url,
            'audio' => $song->audio_url,
            'video_id' => $song->video_id,
            'duration' => $song->formatted_duration,
            'lyrics' => $song->lyrics ? json_decode($song->lyrics, true) : [],
            'plays' => number_format($song->plays_count),
            'playlist_ids' => $song->playlists->pluck('id')->toArray(),
            'playlist_titles' => $song->playlists->pluck('title')->toArray(),
            'filename' => basename((string) $song->audio_url),
        ])->values();

        $playlistsData = $playlists->map(fn (Playlist $pl): array => [
            'id' => $pl->id,
            'title' => $pl->title,
            'cover_url' => $pl->cover_url,
            'tracks_count' => $pl->songs->count() ?: $pl->tracks_count,
            'song_ids' => $pl->songs->pluck('id')->toArray(),
        ])->values();

        return view('music.index', [
            'featuredSongs' => $featuredSongs,
            'trendingSongs' => $trendingSongs,
            'popularSongs' => $popularSongs,
            'allSongs' => $allSongs,
            'artists' => $artists,
            'playlists' => $playlists,
            'playlistsData' => $playlistsData,
            'favoriteSongIds' => $favoriteSongIds,
            'suggestedPlaylist' => $suggestedPlaylist,
            'genres' => $genres,
            'playerQueue' => $playerQueue,
        ]);
    }
}
