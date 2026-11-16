<?php

namespace Tests\Feature;

use App\Models\Song;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomepageTest extends TestCase
{
    use RefreshDatabase;

    public function test_homepage_renders_header_and_bottom_navigation(): void
    {
        $response = $this->get(route('home'));

        $response->assertOk();
        $response->assertSee('Trending');
        $response->assertSee('Home');
        $response->assertSee('Player');
    }

    public function test_recording_a_play_increments_the_counter(): void
    {
        $song = Song::create([
            'title' => 'Test Track',
            'artist_name' => 'Test Artist',
            'cover_url' => 'https://example.com/cover.jpg',
            'audio_url' => 'https://example.com/audio.mp3',
            'duration' => '3:00',
            'plays_count' => 10,
        ]);

        $this->postJson(route('api.songs.play', $song))->assertOk();

        $this->assertSame(11, $song->fresh()->plays_count);
    }

    public function test_youtube_playlist_import_creates_playlist_and_songs(): void
    {
        $response = $this->postJson(route('api.import.youtube'), [
            'preset' => 'coke-studio',
        ]);

        $response->assertOk();
        $response->assertJsonPath('status', 'success');
        $this->assertDatabaseHas('playlists', [
            'title' => 'Coke Studio & Pakistani Hip-Hop Hits',
        ]);
        $this->assertDatabaseHas('songs', [
            'title' => 'Bandish (feat. Shareh, Talha Anjum, Talhah Yunus)',
        ]);
    }

    public function test_audio_stream_returns_404_for_missing_file(): void
    {
        $response = $this->get('/audio/missing_test_track.mp3');

        $response->assertNotFound();
    }
}
