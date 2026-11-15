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
                'cover_url' => 'https://images.unsplash.com/photo-1514525253161-7a46d19cd819?w=900&auto=format&fit=crop&q=80',
                'audio_url' => 'https://www.soundhelix.com/examples/mp3/SoundHelix-Song-1.mp3',
                'duration' => '3:45',
                'lyrics' => json_encode([
                    ['time' => 0, 'text' => 'Mujhko itna bataye koi'],
                    ['time' => 5, 'text' => 'Kaise tujhse dil na lagaye koi'],
                    ['time' => 11, 'text' => 'Rabba ne tujhko banane me'],
                    ['time' => 17, 'text' => 'Kardi hai husn ki khaali tijoriyan'],
                    ['time' => 24, 'text' => 'Kajal ki siyahi se likhi'],
                    ['time' => 29, 'text' => 'Hai tune jaane kitno ki love storiyan'],
                    ['time' => 36, 'text' => 'Kesariya tera ishq hai piya'],
                    ['time' => 43, 'text' => 'Rang jaaun jo main haath lagaoon'],
                    ['time' => 51, 'text' => 'Din beete saara teri fikr me'],
                    ['time' => 59, 'text' => 'Rain saari teri khair manaoon'],
                    ['time' => 68, 'text' => 'Patjhad ke mausam me bhi'],
                    ['time' => 74, 'text' => 'Rangi chanaaron jaisi'],
                    ['time' => 81, 'text' => 'Jhanke sannaate me tu'],
                    ['time' => 88, 'text' => 'Veena ke taaron jaisi'],
                ]),
                'plays_count' => 1845200,
                'is_featured' => true,
                'is_trending' => true,
            ],
            [
                'title' => 'Lover (Midnight Vibe)',
                'artist_name' => 'Diljit Dosanjh',
                'album_name' => 'MoonChild Era',
                'genre' => 'Punjabi',
                'cover_url' => 'https://images.unsplash.com/photo-1470225620780-dba8ba36b745?w=900&auto=format&fit=crop&q=80',
                'audio_url' => 'https://www.soundhelix.com/examples/mp3/SoundHelix-Song-2.mp3',
                'duration' => '3:12',
                'lyrics' => json_encode([
                    ['time' => 0, 'text' => 'Tera ni tera aashiq haan'],
                    ['time' => 5, 'text' => 'Har passe meri charcha ae'],
                    ['time' => 10, 'text' => 'Ho akhiyan vich akhiyan paa ke'],
                    ['time' => 16, 'text' => 'Tu mere vall takk taan sahi'],
                    ['time' => 22, 'text' => 'Main tera lover boy'],
                    ['time' => 28, 'text' => 'Tu meri barbie doll'],
                    ['time' => 35, 'text' => 'Jadon vi chann tu charheya'],
                    ['time' => 42, 'text' => 'Main taare gin gin saari raat kati'],
                ]),
                'plays_count' => 3420100,
                'is_featured' => true,
                'is_trending' => true,
            ],
            [
                'title' => 'Blinding Lights',
                'artist_name' => 'The Weeknd',
                'album_name' => 'After Hours',
                'genre' => 'Synth-Pop',
                'cover_url' => 'https://images.unsplash.com/photo-1511671782779-c97d3d27a1d4?w=900&auto=format&fit=crop&q=80',
                'audio_url' => 'https://www.soundhelix.com/examples/mp3/SoundHelix-Song-3.mp3',
                'duration' => '3:20',
                'lyrics' => json_encode([
                    ['time' => 0, 'text' => "Yeah, I've been tryna call"],
                    ['time' => 6, 'text' => "I've been on my own for long enough"],
                    ['time' => 12, 'text' => 'Maybe you can show me how to love, maybe'],
                    ['time' => 18, 'text' => "I'm going through withdrawals"],
                    ['time' => 24, 'text' => "You don't even have to do too much"],
                    ['time' => 30, 'text' => 'You can turn me on with just a touch, baby'],
                    ['time' => 38, 'text' => "I look around and Sin City's cold and empty"],
                    ['time' => 46, 'text' => "No one's around to judge me"],
                    ['time' => 52, 'text' => "I can't see clearly when you're gone"],
                    ['time' => 59, 'text' => "I said, ooh, I'm blinded by the lights"],
                ]),
                'plays_count' => 9210000,
                'is_featured' => true,
                'is_trending' => true,
            ],
            [
                'title' => 'Brown Munde',
                'artist_name' => 'AP Dhillon',
                'album_name' => 'Hidden Gems',
                'genre' => 'Hip-Hop',
                'cover_url' => 'https://images.unsplash.com/photo-1493225457124-a3eb161ffa5f?w=900&auto=format&fit=crop&q=80',
                'audio_url' => 'https://www.soundhelix.com/examples/mp3/SoundHelix-Song-4.mp3',
                'duration' => '4:10',
                'lyrics' => json_encode([
                    ['time' => 0, 'text' => 'Desi munde desi munde'],
                    ['time' => 6, 'text' => 'Geetan di machine saare sun de'],
                    ['time' => 12, 'text' => 'Gaddi vich vajje bass heavy'],
                    ['time' => 18, 'text' => 'Karde grind din raat'],
                    ['time' => 25, 'text' => 'Brown Munde, Brown Munde!'],
                ]),
                'plays_count' => 5120000,
                'is_featured' => false,
                'is_trending' => true,
            ],
            [
                'title' => 'Levitating (Club Mix)',
                'artist_name' => 'Dua Lipa',
                'album_name' => 'Future Nostalgia',
                'genre' => 'Dance Pop',
                'cover_url' => 'https://images.unsplash.com/photo-1465847899084-d164df4dedc6?w=900&auto=format&fit=crop&q=80',
                'audio_url' => 'https://www.soundhelix.com/examples/mp3/SoundHelix-Song-5.mp3',
                'duration' => '3:23',
                'lyrics' => json_encode([
                    ['time' => 0, 'text' => 'If you wanna run away with me, I know a galaxy'],
                    ['time' => 6, 'text' => 'And I can take you for a ride'],
                    ['time' => 12, 'text' => 'I had a premonition that we fell into a rhythm'],
                    ['time' => 18, 'text' => 'Where the music don\'t stop for life'],
                    ['time' => 24, 'text' => 'Glitter in the sky, glitter in my eyes'],
                    ['time' => 30, 'text' => 'Shining just the way I like'],
                    ['time' => 36, 'text' => 'You want me, I want you, baby'],
                    ['time' => 42, 'text' => 'My sugarboo, I\'m levitating!'],
                ]),
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
