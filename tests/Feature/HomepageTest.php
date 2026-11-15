<?php

namespace Tests\Feature;

use App\Models\Song;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomepageTest extends TestCase
{
    use RefreshDatabase;

    public function test_homepage_renders_featured_trending_and_artists(): void
    {
        $this->seed();

        $response = $this->get(route('home'));

        $response->assertOk();
        $response->assertSee('Trending Now');
        $response->assertSee('Popular Artists');
        $response->assertSee('Arijit Singh');
        $response->assertSee('Blinding Lights');
    }

    public function test_homepage_renders_without_songs(): void
    {
        $this->get(route('home'))->assertOk();
    }

    public function test_recording_a_play_increments_the_counter(): void
    {
        $this->seed();
        $song = Song::first();
        $playsBefore = $song->plays_count;

        $this->postJson(route('api.songs.play', $song))->assertOk();

        $this->assertSame($playsBefore + 1, $song->fresh()->plays_count);
    }
}
