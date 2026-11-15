<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="theme-color" content="#0b0b12">
    <title>Element Music</title>
    @fonts
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-[#05050a] font-sans text-white antialiased">
<div class="relative mx-auto min-h-screen max-w-md overflow-hidden bg-gradient-to-b from-[#1a0f2e] via-[#0b0b12] to-[#0b0b12] pb-44 shadow-2xl">

    {{-- Glow blobs --}}
    <div class="pointer-events-none absolute -top-24 -left-20 h-72 w-72 rounded-full bg-fuchsia-600/30 blur-3xl"></div>
    <div class="pointer-events-none absolute top-40 -right-24 h-72 w-72 rounded-full bg-indigo-600/25 blur-3xl"></div>

    {{-- Header --}}
    <header class="relative z-10 flex items-center justify-between px-5 pt-6">
        <div>
            <p class="text-xs text-white/50" id="greeting">Good Evening</p>
            <h1 class="text-xl font-semibold tracking-tight">Hey, Aditya 👋</h1>
        </div>
        <div class="flex items-center gap-3">
            <button class="grid h-10 w-10 place-items-center rounded-full bg-white/10 backdrop-blur" aria-label="Notifications">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M15 17h5l-1.4-1.4A2 2 0 0 1 18 14.2V11a6 6 0 1 0-12 0v3.2c0 .5-.2 1-.6 1.4L4 17h5m6 0a3 3 0 1 1-6 0"/></svg>
            </button>
            <img src="https://images.unsplash.com/photo-1599566150163-29194dcaad36?w=100&auto=format&fit=crop&q=80" class="h-10 w-10 rounded-full object-cover ring-2 ring-fuchsia-500" alt="Profile">
        </div>
    </header>

    {{-- Search --}}
    <div class="relative z-10 px-5 pt-5">
        <div class="flex items-center gap-3 rounded-2xl bg-white/10 px-4 py-3 backdrop-blur">
            <svg class="h-5 w-5 text-white/50" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/></svg>
            <input id="search" type="text" placeholder="Songs, artists, albums..." class="w-full bg-transparent text-sm placeholder-white/40 outline-none">
        </div>
    </div>

    {{-- Genre chips --}}
    <div class="relative z-10 flex gap-2 overflow-x-auto px-5 pt-4 [scrollbar-width:none]" id="genres">
        @foreach ($genres as $genre)
            <button data-genre="{{ $genre }}" class="genre-chip shrink-0 rounded-full px-4 py-1.5 text-xs font-medium transition {{ $loop->first ? 'bg-fuchsia-500 text-white' : 'bg-white/10 text-white/70' }}">{{ $genre }}</button>
        @endforeach
    </div>

    {{-- Featured banner --}}
    @if ($featuredSong)
        <section class="relative z-10 px-5 pt-6">
            <div class="relative h-48 overflow-hidden rounded-3xl">
                <img src="{{ $featuredSong->cover_url }}" class="absolute inset-0 h-full w-full object-cover" alt="">
                <div class="absolute inset-0 bg-gradient-to-r from-black/85 via-black/50 to-transparent"></div>
                <div class="relative flex h-full flex-col justify-end p-5">
                    <span class="mb-2 w-fit rounded-full bg-fuchsia-500/90 px-2.5 py-0.5 text-[10px] font-semibold uppercase tracking-wider">Featured</span>
                    <h2 class="text-2xl font-bold leading-tight">{{ $featuredSong->title }}</h2>
                    <p class="text-sm text-white/70">{{ $featuredSong->artist_name }} • {{ number_format($featuredSong->plays_count) }} plays</p>
                    <button data-play="{{ $featuredSong->id }}" class="play-btn mt-3 flex w-fit items-center gap-2 rounded-full bg-white px-5 py-2 text-sm font-semibold text-black">
                        <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg> Play Now
                    </button>
                </div>
            </div>
        </section>
    @endif

    {{-- Trending --}}
    <section class="relative z-10 pt-7">
        <div class="flex items-center justify-between px-5">
            <h3 class="text-lg font-semibold">🔥 Trending Now</h3>
            <a href="#" class="text-xs text-fuchsia-400">See all</a>
        </div>
        <div class="mt-3 flex gap-4 overflow-x-auto px-5 [scrollbar-width:none]">
            @foreach ($trendingSongs as $song)
                <button data-play="{{ $song->id }}" class="play-btn group w-36 shrink-0 text-left">
                    <div class="relative h-36 w-36 overflow-hidden rounded-2xl">
                        <img src="{{ $song->cover_url }}" class="h-full w-full object-cover transition duration-300 group-hover:scale-110" alt="">
                        <div class="absolute right-2 bottom-2 grid h-9 w-9 place-items-center rounded-full bg-fuchsia-500 shadow-lg shadow-fuchsia-500/40">
                            <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                        </div>
                    </div>
                    <p class="mt-2 truncate text-sm font-medium">{{ $song->title }}</p>
                    <p class="truncate text-xs text-white/50">{{ $song->artist_name }}</p>
                </button>
            @endforeach
        </div>
    </section>

    {{-- Artists --}}
    <section class="relative z-10 pt-7">
        <div class="flex items-center justify-between px-5">
            <h3 class="text-lg font-semibold">Popular Artists</h3>
            <a href="#" class="text-xs text-fuchsia-400">See all</a>
        </div>
        <div class="mt-3 flex gap-4 overflow-x-auto px-5 [scrollbar-width:none]">
            @foreach ($artists as $artist)
                <div class="w-20 shrink-0 text-center">
                    <img src="{{ $artist->avatar_url }}" class="h-20 w-20 rounded-full object-cover ring-2 ring-white/10" alt="{{ $artist->name }}">
                    <p class="mt-2 truncate text-xs font-medium">{{ $artist->name }}</p>
                    <p class="text-[10px] text-white/40">{{ $artist->monthly_listeners }}</p>
                </div>
            @endforeach
        </div>
    </section>

    {{-- All songs --}}
    <section class="relative z-10 px-5 pt-7">
        <h3 class="text-lg font-semibold">All Songs</h3>
        <ul class="mt-3 space-y-2" id="song-list">
            @foreach ($allSongs as $song)
                <li data-genre="{{ $song->genre }}" data-search="{{ strtolower($song->title.' '.$song->artist_name.' '.$song->album_name) }}" class="song-row">
                    <button data-play="{{ $song->id }}" class="play-btn flex w-full items-center gap-3 rounded-2xl p-2 text-left transition hover:bg-white/5">
                        <img src="{{ $song->cover_url }}" class="h-14 w-14 rounded-xl object-cover" alt="">
                        <div class="min-w-0 flex-1">
                            <p class="song-title truncate text-sm font-medium">{{ $song->title }}</p>
                            <p class="truncate text-xs text-white/50">{{ $song->artist_name }} • {{ $song->genre }}</p>
                        </div>
                        <span class="text-xs text-white/40">{{ $song->duration }}</span>
                    </button>
                </li>
            @endforeach
        </ul>
        <p id="no-results" class="hidden py-8 text-center text-sm text-white/40">Koi song nahi mila 😕</p>
    </section>

    {{-- Mini player --}}
    <div id="player" class="fixed bottom-[72px] left-1/2 z-30 hidden w-full max-w-md -translate-x-1/2 px-3">
        <div class="overflow-hidden rounded-2xl bg-gradient-to-r from-fuchsia-700/95 to-indigo-700/95 shadow-2xl backdrop-blur">
            <div class="flex items-center gap-3 p-2.5">
                <img id="player-cover" src="" class="h-12 w-12 rounded-xl object-cover" alt="">
                <div class="min-w-0 flex-1">
                    <p id="player-title" class="truncate text-sm font-semibold"></p>
                    <p id="player-artist" class="truncate text-xs text-white/70"></p>
                </div>
                <button id="prev-btn" class="p-2" aria-label="Previous"><svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M6 6h2v12H6zm3.5 6 8.5 6V6z"/></svg></button>
                <button id="toggle-btn" class="grid h-10 w-10 place-items-center rounded-full bg-white text-black" aria-label="Play/Pause">
                    <svg id="icon-play" class="hidden h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                    <svg id="icon-pause" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M6 19h4V5H6zm8-14v14h4V5z"/></svg>
                </button>
                <button id="next-btn" class="p-2" aria-label="Next"><svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M6 18l8.5-6L6 6zM16 6v12h2V6z"/></svg></button>
            </div>
            <div class="h-1 w-full bg-white/20"><div id="progress" class="h-full w-0 bg-white"></div></div>
        </div>
    </div>

    {{-- Bottom nav --}}
    <nav class="fixed bottom-0 left-1/2 z-40 flex w-full max-w-md -translate-x-1/2 justify-around border-t border-white/5 bg-[#0b0b12]/95 py-3 backdrop-blur">
        @foreach ([['Home', 'M3 12 12 3l9 9M5 10v10h14V10', true], ['Search', 'M11 4a7 7 0 1 0 0 14 7 7 0 0 0 0-14zm10 17-4.3-4.3', false], ['Library', 'M4 19V5m5 14V5m4 14 4-14 4 14', false], ['Profile', 'M12 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm-7 9a7 7 0 0 1 14 0', false]] as [$label, $path, $active])
            <a href="#" class="flex flex-col items-center gap-1 text-[10px] {{ $active ? 'text-fuchsia-400' : 'text-white/50' }}">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="{{ $path }}"/></svg>
                {{ $label }}
            </a>
        @endforeach
    </nav>

    <audio id="audio" preload="none"></audio>
</div>

<script>
    const songs = {{ Js::from($playerQueue) }};
    const audio = document.getElementById('audio');
    const $ = (id) => document.getElementById(id);
    let currentIndex = -1;

    const hour = new Date().getHours();
    $('greeting').textContent = hour < 12 ? 'Good Morning' : hour < 17 ? 'Good Afternoon' : 'Good Evening';

    function setPlayingIcon(isPlaying) {
        $('icon-play').classList.toggle('hidden', isPlaying);
        $('icon-pause').classList.toggle('hidden', !isPlaying);
    }

    function playSong(index) {
        if (index < 0 || index >= songs.length) return;
        currentIndex = index;
        const song = songs[index];
        $('player').classList.remove('hidden');
        $('player-cover').src = song.cover;
        $('player-title').textContent = song.title;
        $('player-artist').textContent = song.artist;
        audio.src = song.audio;
        audio.play().catch(() => setPlayingIcon(false));
        document.querySelectorAll('.song-title').forEach((el) => el.classList.remove('text-fuchsia-400'));
        document.querySelector(`#song-list [data-play="${song.id}"] .song-title`)?.classList.add('text-fuchsia-400');
        fetch(`/api/v1/songs/${song.id}/play`, { method: 'POST', headers: { Accept: 'application/json' } });
    }

    document.querySelectorAll('.play-btn').forEach((btn) => {
        btn.addEventListener('click', () => playSong(songs.findIndex((s) => s.id == btn.dataset.play)));
    });

    $('toggle-btn').addEventListener('click', () => audio.paused ? audio.play() : audio.pause());
    $('next-btn').addEventListener('click', () => playSong((currentIndex + 1) % songs.length));
    $('prev-btn').addEventListener('click', () => playSong((currentIndex - 1 + songs.length) % songs.length));
    audio.addEventListener('play', () => setPlayingIcon(true));
    audio.addEventListener('pause', () => setPlayingIcon(false));
    audio.addEventListener('ended', () => playSong((currentIndex + 1) % songs.length));
    audio.addEventListener('timeupdate', () => {
        $('progress').style.width = audio.duration ? `${(audio.currentTime / audio.duration) * 100}%` : '0%';
    });

    let activeGenre = 'All';
    function filterSongs() {
        const term = $('search').value.trim().toLowerCase();
        let visible = 0;
        document.querySelectorAll('.song-row').forEach((row) => {
            const show = (activeGenre === 'All' || row.dataset.genre === activeGenre) && row.dataset.search.includes(term);
            row.classList.toggle('hidden', !show);
            if (show) visible++;
        });
        $('no-results').classList.toggle('hidden', visible > 0);
    }

    $('search').addEventListener('input', filterSongs);
    document.querySelectorAll('.genre-chip').forEach((chip) => {
        chip.addEventListener('click', () => {
            activeGenre = chip.dataset.genre;
            document.querySelectorAll('.genre-chip').forEach((c) => {
                const isActive = c === chip;
                c.classList.toggle('bg-fuchsia-500', isActive);
                c.classList.toggle('text-white', isActive);
                c.classList.toggle('bg-white/10', !isActive);
                c.classList.toggle('text-white/70', !isActive);
            });
            filterSongs();
        });
    });
</script>
</body>
</html>
