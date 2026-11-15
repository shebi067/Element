<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class YouTubeApiImportTest extends TestCase
{
    use RefreshDatabase;

    public function test_youtube_playlist_import(): void
    {
        $response = $this->postJson('/api/v1/import/youtube', [
            'playlist_url' => 'https://www.youtube.com/playlist?list=PLMC9KNkIncKtPzgY-5rmhvj7fax8fdxoj',
        ]);

        $response->assertStatus(200);
    }
}
