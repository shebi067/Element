<?php

use App\Http\Controllers\HomeController;
use App\Models\Playlist;
use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::get('/audio/{filename}', function (string $filename) {
    $path = public_path('storage/songs/'.$filename);
    if (! file_exists($path)) {
        abort(404);
    }

    return response()->file($path, [
        'Content-Type' => 'audio/mpeg',
        'Accept-Ranges' => 'bytes',
    ]);
})->where('filename', '[A-Za-z0-9_\-\.]+')->name('audio.stream');

Route::get('/download/{filename}', function (string $filename) {
    $path = public_path('storage/songs/'.$filename);
    if (! file_exists($path)) {
        abort(404);
    }

    return response()->download($path, $filename, [
        'Content-Type' => 'audio/mpeg',
    ]);
})->where('filename', '[A-Za-z0-9_\-\.]+')->name('audio.download');

Route::post('/favorites/toggle', function (Request $request) {
    $songId = $request->input('song_id');
    $song = Song::find($songId);
    if (! $song) {
        return response()->json(['error' => 'Song not found'], 404);
    }

    $playlist = Playlist::firstOrCreate(
        ['title' => 'Favourite Songs'],
        [
            'description' => 'Your personal collection of liked tracks',
            'cover_url' => $song->cover_url ?: '/storage/covers/NzDjENadvrQ.jpg',
            'tracks_count' => 0,
            'source' => 'local',
        ]
    );

    $isAttached = $playlist->songs()->where('songs.id', $song->id)->exists();
    if ($isAttached) {
        $playlist->songs()->detach($song->id);
        $playlist->tracks_count = $playlist->songs()->count();
        $playlist->save();

        return response()->json([
            'is_favorite' => false,
            'message' => 'Removed from Favourite Songs',
            'playlist_count' => $playlist->tracks_count,
            'playlist_id' => $playlist->id,
            'song_id' => $song->id,
        ]);
    } else {
        $playlist->songs()->attach($song->id, ['position' => $playlist->songs()->count() + 1]);
        $playlist->tracks_count = $playlist->songs()->count();
        $playlist->cover_url = $song->cover_url;
        $playlist->save();

        return response()->json([
            'is_favorite' => true,
            'message' => 'Added to Favourite Songs ❤️',
            'playlist_count' => $playlist->tracks_count,
            'playlist_id' => $playlist->id,
            'cover_url' => $playlist->cover_url,
            'song_id' => $song->id,
        ]);
    }
})->name('favorites.toggle');
