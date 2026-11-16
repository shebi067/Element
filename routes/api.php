<?php

use App\Http\Controllers\Api\MusicController;
use App\Http\Controllers\Api\YouTubeImportController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('v1')->group(function (): void {
    Route::get('/songs', [MusicController::class, 'index'])->name('api.songs.index');
    Route::get('/songs/featured', [MusicController::class, 'featured'])->name('api.songs.featured');
    Route::get('/songs/trending', [MusicController::class, 'trending'])->name('api.songs.trending');
    Route::get('/songs/{song}', [MusicController::class, 'show'])->name('api.songs.show');
    Route::post('/songs/{song}/play', [MusicController::class, 'recordPlay'])->name('api.songs.play');
    Route::get('/artists', [MusicController::class, 'artists'])->name('api.artists.index');
    Route::post('/import/youtube', [YouTubeImportController::class, 'import'])->name('api.import.youtube');
});
