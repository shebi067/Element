<?php

namespace Database\Seeders;

use App\Models\Artist;
use App\Models\Song;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'demo@elementmusic.com'],
            [
                'name' => 'Aditya Sharma',
                'password' => bcrypt('password123'),
            ]
        );

        $artistsData = [
            [
                'name' => 'Arijit Singh',
                'genre' => 'Bollywood Romantic',
                'avatar_url' => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=400&auto=format&fit=crop&q=80',
                'monthly_listeners' => '38.4M',
                'is_verified' => true,
            ],
            [
                'name' => 'Diljit Dosanjh',
                'genre' => 'Punjabi Pop',
                'avatar_url' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=400&auto=format&fit=crop&q=80',
                'monthly_listeners' => '22.1M',
                'is_verified' => true,
            ],
            [
                'name' => 'The Weeknd',
                'genre' => 'R&B / Synthwave',
                'avatar_url' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=400&auto=format&fit=crop&q=80',
                'monthly_listeners' => '104.2M',
                'is_verified' => true,
            ],
            [
                'name' => 'AP Dhillon',
                'genre' => 'Punjabi Wave',
                'avatar_url' => 'https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?w=400&auto=format&fit=crop&q=80',
                'monthly_listeners' => '12.8M',
                'is_verified' => true,
            ],
            [
                'name' => 'Dua Lipa',
                'genre' => 'Dance Pop',
                'avatar_url' => 'https://images.unsplash.com/photo-1517841905240-472988babdf9?w=400&auto=format&fit=crop&q=80',
                'monthly_listeners' => '65.7M',
                'is_verified' => true,
            ],
            [
                'name' => 'A.R. Rahman',
                'genre' => 'Sufi & Classical',
                'avatar_url' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=400&auto=format&fit=crop&q=80',
                'monthly_listeners' => '19.5M',
                'is_verified' => true,
            ],
        ];

        $createdArtists = [];
        foreach ($artistsData as $aData) {
            $createdArtists[$aData['name']] = Artist::updateOrCreate(['name' => $aData['name']], $aData);
        }

        $songsData = [
            [
                'title' => 'Kesariya (Redux & Acoustic)',
                'artist_name' => 'Arijit Singh',
                'album_name' => 'Brahmastra Melodies',
                'genre' => 'Bollywood',
                'cover_url' => 'https://images.unsplash.com/photo-1514525253161-7a46d19cd819?w=500&auto=format&fit=crop&q=80',
                'audio_url' => 'https://www.soundhelix.com/examples/mp3/SoundHelix-Song-1.mp3',
                'duration' => '3:45',
                'plays_count' => 1845200,
                'is_featured' => true,
                'is_trending' => true,
            ],
            [
                'title' => 'Lover (Midnight Vibe)',
                'artist_name' => 'Diljit Dosanjh',
                'album_name' => 'MoonChild Era',
                'genre' => 'Punjabi',
                'cover_url' => 'https://images.unsplash.com/photo-1470225620780-dba8ba36b745?w=500&auto=format&fit=crop&q=80',
                'audio_url' => 'https://www.soundhelix.com/examples/mp3/SoundHelix-Song-2.mp3',
                'duration' => '3:12',
                'plays_count' => 3420100,
                'is_featured' => true,
                'is_trending' => true,
            ],
            [
                'title' => 'Blinding Lights',
                'artist_name' => 'The Weeknd',
                'album_name' => 'After Hours',
                'genre' => 'Synth-Pop',
                'cover_url' => 'https://images.unsplash.com/photo-1511671782779-c97d3d27a1d4?w=500&auto=format&fit=crop&q=80',
                'audio_url' => 'https://www.soundhelix.com/examples/mp3/SoundHelix-Song-3.mp3',
                'duration' => '3:20',
                'plays_count' => 9210000,
                'is_featured' => true,
                'is_trending' => true,
            ],
            [
                'title' => 'Brown Munde',
                'artist_name' => 'AP Dhillon',
                'album_name' => 'Hidden Gems',
                'genre' => 'Hip-Hop',
                'cover_url' => 'https://images.unsplash.com/photo-1493225457124-a3eb161ffa5f?w=500&auto=format&fit=crop&q=80',
                'audio_url' => 'https://www.soundhelix.com/examples/mp3/SoundHelix-Song-4.mp3',
                'duration' => '4:10',
                'plays_count' => 5120000,
                'is_featured' => false,
                'is_trending' => true,
            ],
            [
                'title' => 'Levitating (Club Mix)',
                'artist_name' => 'Dua Lipa',
                'album_name' => 'Future Nostalgia',
                'genre' => 'Dance Pop',
                'cover_url' => 'https://images.unsplash.com/photo-1465847899084-d164df4dedc6?w=500&auto=format&fit=crop&q=80',
                'audio_url' => 'https://www.soundhelix.com/examples/mp3/SoundHelix-Song-5.mp3',
                'duration' => '3:23',
                'plays_count' => 6400200,
                'is_featured' => false,
                'is_trending' => true,
            ],
            [
                'title' => 'Kun Faya Kun (Sufi Atmosphere)',
                'artist_name' => 'A.R. Rahman',
                'album_name' => 'Rockstar Classics',
                'genre' => 'Sufi',
                'cover_url' => 'https://images.unsplash.com/photo-1508700115892-45ecd05ae2ad?w=500&auto=format&fit=crop&q=80',
                'audio_url' => 'https://www.soundhelix.com/examples/mp3/SoundHelix-Song-6.mp3',
                'duration' => '5:15',
                'plays_count' => 4820100,
                'is_featured' => false,
                'is_trending' => false,
            ],
            [
                'title' => 'Tokyo Rain (Lofi Study)',
                'artist_name' => 'Arijit Singh',
                'album_name' => 'Chill Sessions',
                'genre' => 'Lo-Fi',
                'cover_url' => 'https://images.unsplash.com/photo-1518609878373-06d740f60d8b?w=500&auto=format&fit=crop&q=80',
                'audio_url' => 'https://www.soundhelix.com/examples/mp3/SoundHelix-Song-7.mp3',
                'duration' => '2:50',
                'plays_count' => 1250000,
                'is_featured' => false,
                'is_trending' => true,
            ],
            [
                'title' => 'Starboy Sunset Drive',
                'artist_name' => 'The Weeknd',
                'album_name' => 'Starboy',
                'genre' => 'R&B',
                'cover_url' => 'https://images.unsplash.com/photo-1487180144351-b8472da7d491?w=500&auto=format&fit=crop&q=80',
                'audio_url' => 'https://www.soundhelix.com/examples/mp3/SoundHelix-Song-8.mp3',
                'duration' => '3:50',
                'plays_count' => 7890000,
                'is_featured' => false,
                'is_trending' => true,
            ],
        ];

        foreach ($songsData as $sData) {
            $artist = $createdArtists[$sData['artist_name']] ?? null;
            $sData['artist_id'] = $artist?->id;
            Song::updateOrCreate(
                ['title' => $sData['title'], 'artist_name' => $sData['artist_name']],
                $sData
            );
        }
    }
}
