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
        $response->assertSee('Hey, Aditya');
        $response->assertSeeInOrder(['Home', 'Search', 'Library', 'Profile']);
        $response->assertDontSee('Trending Now');
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
