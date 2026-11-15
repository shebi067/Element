<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="theme-color" content="#0D0705">
    <title>Element Music</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts: Plus Jakarta Sans & Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --color-primary: #F04E23;
            --color-primary-glow: rgba(240, 78, 35, 0.45);
            --bg-base: #0D0705;
            --bg-gradient-top: #5A2311;
            --bg-gradient-mid: #2B1108;
            --surface-pill-inactive: rgba(255, 255, 255, 0.11);
            --surface-bottom-dock: rgba(28, 25, 24, 0.90);
            --surface-nav-icon: rgba(255, 255, 255, 0.14);
            --surface-card-glass: rgba(34, 28, 24, 0.56);
            --border-glass: rgba(255, 255, 255, 0.24);
            --border-glass-subtle: rgba(255, 255, 255, 0.14);
            --text-primary: #FFFFFF;
            --text-secondary: #D6CFCB;
            --text-muted: #8C827D;
            --text-on-primary: #121212;
        }

        [data-theme="crimson"] {
            --color-primary: #FA524B;
            --color-primary-glow: rgba(237, 50, 51, 0.5);
            --bg-base: #0F0506;
            --bg-gradient-top: #6E1418;
            --bg-gradient-mid: #33080A;
        }

        * {
            box-sizing: border-box;
            -webkit-tap-highlight-color: transparent;
        }

        body {
            font-family: 'Plus Jakarta Sans', 'Inter', sans-serif;
            background-color: #050302;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
            color: #FFFFFF;
        }

        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }
        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .app-surface-bg {
            background-color: var(--bg-base);
            background-image: 
                radial-gradient(circle at 18% 12%, var(--bg-gradient-top) 0%, var(--bg-gradient-mid) 36%, var(--bg-base) 72%),
                radial-gradient(circle at 85% 28%, rgba(90, 35, 17, 0.35) 0%, transparent 55%);
            transition: background 0.4s ease;
        }

        .liquid-circle-btn {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            border: 1.2px solid rgba(255, 255, 255, 0.32);
            box-shadow: 
                inset 0 2px 4px rgba(255, 255, 255, 0.25),
                inset 0 -2px 6px rgba(0, 0, 0, 0.35),
                0 6px 16px rgba(0, 0, 0, 0.3);
            transition: all 0.25s cubic-bezier(0.22, 1, 0.36, 1);
        }
        .liquid-circle-btn:hover {
            transform: scale(1.05);
            background: rgba(255, 255, 255, 0.14);
            border-color: rgba(255, 255, 255, 0.48);
        }
        .liquid-circle-btn:active {
            transform: scale(0.95);
        }

        .glass-pill-inactive {
            background: var(--surface-pill-inactive);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            border-top: 1px solid rgba(255, 255, 255, 0.20);
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            border-left: 1px solid rgba(255, 255, 255, 0.12);
            border-right: 1px solid rgba(255, 255, 255, 0.12);
            color: var(--text-secondary);
            box-shadow: 
                inset 0 1px 2px rgba(255, 255, 255, 0.12),
                0 4px 12px rgba(0, 0, 0, 0.2);
            transition: all 0.28s cubic-bezier(0.22, 1, 0.36, 1);
        }
        .glass-pill-inactive:hover {
            background: rgba(255, 255, 255, 0.17);
            color: #FFFFFF;
        }

        .pill-active {
            background: var(--color-primary);
            color: var(--text-on-primary);
            font-weight: 600;
            border: 1px solid rgba(255, 255, 255, 0.25);
            box-shadow: 
                inset 0 2px 4px rgba(255, 255, 255, 0.35),
                0 6px 18px var(--color-primary-glow);
            transition: all 0.28s cubic-bezier(0.22, 1, 0.36, 1);
        }

        .hero-glass-overlay {
            background: rgba(45, 38, 34, 0.52);
            backdrop-filter: blur(18px) saturate(140%);
            -webkit-backdrop-filter: blur(18px) saturate(140%);
            border-top: 1px solid rgba(255, 255, 255, 0.28);
            border-bottom: 1.5px solid rgba(255, 255, 255, 0.36);
            border-left: 1px solid rgba(255, 255, 255, 0.18);
            border-right: 1px solid rgba(255, 255, 255, 0.18);
            box-shadow: 
                inset 0 4px 10px rgba(255, 255, 255, 0.14),
                inset 0 -3px 8px rgba(255, 255, 255, 0.12),
                0 10px 24px rgba(0, 0, 0, 0.45);
        }

        .bottom-nav-dock {
            background: rgba(28, 25, 24, 0.92);
            backdrop-filter: blur(22px) saturate(150%);
            -webkit-backdrop-filter: blur(22px) saturate(150%);
            border-top: 1px solid rgba(255, 255, 255, 0.14);
            border-bottom: 1px solid rgba(255, 255, 255, 0.06);
            box-shadow: 
                0 16px 36px rgba(0, 0, 0, 0.75),
                inset 0 1px 1px rgba(255, 255, 255, 0.12);
        }

        .dock-circle-btn {
            background: linear-gradient(165deg, rgba(255, 255, 255, 0.22) 0%, rgba(255, 255, 255, 0.09) 100%);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-top: 1px solid rgba(255, 255, 255, 0.28);
            border-bottom: 1px solid rgba(255, 255, 255, 0.12);
            box-shadow: 
                inset 0 2px 4px rgba(255, 255, 255, 0.15),
                0 4px 10px rgba(0, 0, 0, 0.35);
            transition: all 0.3s cubic-bezier(0.22, 1, 0.36, 1);
        }
        .dock-circle-btn:hover {
            background: linear-gradient(165deg, rgba(255, 255, 255, 0.3) 0%, rgba(255, 255, 255, 0.14) 100%);
            transform: translateY(-1px);
        }

        @@keyframes eqBar1 {
            0%, 100% { height: 5px; }
            50% { height: 16px; }
        }
        @@keyframes eqBar2 {
            0%, 100% { height: 15px; }
            35% { height: 4px; }
            70% { height: 18px; }
        }
        @@keyframes eqBar3 {
            0%, 100% { height: 8px; }
            40% { height: 17px; }
            80% { height: 5px; }
        }
        .eq-bar-1 { animation: eqBar1 0.8s ease-in-out infinite; }
        .eq-bar-2 { animation: eqBar2 0.7s ease-in-out infinite; }
        .eq-bar-3 { animation: eqBar3 0.9s ease-in-out infinite; }
        .paused-eq span {
            animation-play-state: paused !important;
            height: 4px !important;
        }
    </style>
</head>
<body class="min-h-screen bg-[#050302]">

    <div class="relative mx-auto min-h-screen max-w-md overflow-hidden app-surface-bg flex flex-col justify-between shadow-2xl pb-28">

        <!-- 1. TOP HEADER -->
        <header class="w-full pt-6 pb-2 px-5 flex items-center justify-between z-20 shrink-0">
            <button onclick="toggleDrawerMenu()" aria-label="Menu" class="w-[46px] h-[46px] rounded-full liquid-circle-btn flex flex-col items-start justify-center pl-[14px] gap-[4px]">
                <span class="w-[16px] h-[2px] bg-white rounded-full"></span>
                <span class="w-[12px] h-[2px] bg-white/90 rounded-full"></span>
                <span class="w-[8px] h-[2px] bg-white/80 rounded-full"></span>
            </button>

            <!-- Live Player Mini Chip -->
            <button onclick="openNowPlayingModal()" class="glass-pill-inactive px-3.5 py-2 rounded-full flex items-center gap-2.5 text-xs">
                <div id="headerEq" class="flex items-end gap-[2.5px] h-3.5">
                    <span class="w-[2.5px] bg-[#F04E23] rounded-full eq-bar-1"></span>
                    <span class="w-[2.5px] bg-[#F04E23] rounded-full eq-bar-2"></span>
                    <span class="w-[2.5px] bg-[#F04E23] rounded-full eq-bar-3"></span>
                </div>
                <span id="miniStatusText" class="text-white/90 font-medium truncate max-w-[135px]">Select a Song</span>
            </button>

            <!-- Profile Avatar -->
            <div class="relative">
                <img src="https://images.unsplash.com/photo-1599566150163-29194dcaad36?w=100&auto=format&fit=crop&q=80" class="w-10 h-10 rounded-full object-cover ring-2 ring-white/30" alt="Profile">
                <span class="absolute bottom-0 right-0 w-3 h-3 rounded-full bg-[#F04E23] ring-2 ring-[#0D0705]"></span>
            </div>
        </header>

        <!-- 2. SCROLLABLE MAIN CONTENT AREA -->
        <main class="flex-1 overflow-y-auto no-scrollbar pt-2 px-5">

            <!-- Search Bar with Liquid Glass styling -->
            <div class="mt-2 mb-4">
                <div class="flex items-center gap-2.5">
                    <div class="flex-1 h-[48px] rounded-full glass-pill-inactive flex items-center px-4 gap-2.5">
                        <svg class="w-4 h-4 text-white/50" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/></svg>
                        <input id="searchInput" type="text" placeholder="Search songs, artists..." class="w-full bg-transparent text-sm text-white placeholder-white/40 outline-none">
                    </div>
                    <button onclick="clearSearch()" class="w-[48px] h-[48px] rounded-full liquid-circle-btn flex items-center justify-center text-white/80 shrink-0">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>
            </div>

            <!-- 3. TRENDING SECTION & FILTER PILLS -->
            <section class="mt-2">
                <div class="mb-3">
                    <h1 class="text-[20px] font-semibold tracking-tight text-white">Trending</h1>
                </div>

                <!-- Category Filter Pills -->
                <div class="flex items-center gap-2 overflow-x-auto no-scrollbar pb-1" id="categoryPillsContainer">
                    @foreach ($genres as $genre)
                        <button onclick="selectCategory('{{ $genre }}', this)" class="{{ $loop->first ? 'pill-active px-[20px] py-[9px]' : 'glass-pill-inactive px-[18px] py-[9px]' }} rounded-full text-[13px] shrink-0 font-medium transition">
                            {{ $genre }}
                        </button>
                    @endforeach
                </div>
            </section>

            <!-- 4. "TO GET YOU STARTED" HERO CAROUSEL -->
            <section class="mt-6">
                <div class="mb-3 flex items-center justify-between">
                    <h2 class="text-[19px] font-semibold tracking-tight text-white">To get you started</h2>
                    <span class="text-[12px] font-medium text-[#8C827D]">Featured</span>
                </div>

                <div class="flex items-center gap-4 overflow-x-auto no-scrollbar snap-x snap-mandatory">
                    @foreach ($featuredSongs as $song)
                        <article onclick="playSongById({{ $song->id }})" class="relative w-[280px] h-[260px] rounded-[32px] overflow-hidden shrink-0 snap-start cursor-pointer group shadow-2xl border border-white/10">
                            <img src="{{ $song->cover_url }}" class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" alt="{{ $song->title }}">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/30 to-transparent"></div>

                            <!-- Play Button Badge on Hover -->
                            <div class="absolute top-4 right-4 w-10 h-10 rounded-full bg-[#F04E23] text-neutral-950 flex items-center justify-center opacity-90 group-hover:opacity-100 transition shadow-lg">
                                <svg class="w-5 h-5 ml-0.5" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                            </div>

                            <!-- Inner Liquid Frosted Glass Pill Card -->
                            <div class="absolute bottom-[12px] left-[12px] right-[12px] h-[70px] rounded-[22px] hero-glass-overlay px-4 flex flex-col justify-center">
                                <div class="flex items-center justify-between">
                                    <div class="pr-2 min-w-0 flex-1">
                                        <h3 class="text-[15px] font-semibold text-white truncate leading-snug">{{ $song->title }}</h3>
                                        <p class="text-[12px] font-normal text-[#D6CFCB] truncate mt-0.5">{{ $song->artist_name }} • {{ $song->genre }}</p>
                                    </div>
                                    <div class="w-8 h-8 rounded-full bg-white/15 border border-white/25 flex items-center justify-center shrink-0">
                                        <svg class="w-4 h-4 text-white ml-0.5" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                    </div>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            </section>

            <!-- 5. "POPULAR SONGS" SECTION -->
            <section class="mt-6">
                <div class="mb-3 flex items-center justify-between">
                    <h2 class="text-[19px] font-semibold tracking-tight text-white">Popular songs</h2>
                    <span class="text-[12px] font-medium text-[#8C827D]">Top Streamed</span>
                </div>

                <div class="flex items-start gap-3.5 overflow-x-auto no-scrollbar">
                    @foreach ($popularSongs as $song)
                        <div onclick="playSongById({{ $song->id }})" class="w-[136px] shrink-0 cursor-pointer group">
                            <div class="relative w-[136px] h-[138px] rounded-[22px] overflow-hidden border border-white/10 shadow-lg bg-[#1F1410]">
                                <img src="{{ $song->cover_url }}" class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" alt="{{ $song->title }}">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent"></div>
                                <div class="absolute bottom-2 right-2 w-7 h-7 rounded-full bg-[#F04E23] flex items-center justify-center text-neutral-950 shadow opacity-90 group-hover:opacity-100 transition">
                                    <svg class="w-3.5 h-3.5 ml-0.5" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                </div>
                            </div>
                            <p class="mt-2 text-[13px] font-medium text-white/90 truncate">{{ $song->title }}</p>
                            <p class="text-[11px] text-[#8C827D] truncate">{{ $song->artist_name }}</p>
                        </div>
                    @endforeach
                </div>
            </section>

            <!-- 6. ALL SONGS LIST -->
            <section class="mt-6 mb-4">
                <div class="mb-3 flex items-center justify-between">
                    <h2 class="text-[19px] font-semibold tracking-tight text-white">All Tracks</h2>
                    <span id="songsCountLabel" class="text-[12px] font-medium text-[#8C827D]">{{ $allSongs->count() }} tracks</span>
                </div>

                <ul class="space-y-2.5" id="songListContainer">
                    @foreach ($allSongs as $song)
                        <li data-genre="{{ $song->genre }}" data-search="{{ strtolower($song->title.' '.$song->artist_name.' '.$song->album_name) }}" class="song-item">
                            <button onclick="playSongById({{ $song->id }})" class="w-full flex items-center justify-between p-2.5 rounded-2xl glass-pill-inactive text-left transition hover:bg-white/15">
                                <div class="flex items-center gap-3 min-w-0 flex-1">
                                    <img src="{{ $song->cover_url }}" class="w-12 h-12 rounded-xl object-cover shrink-0" alt="">
                                    <div class="min-w-0 flex-1">
                                        <p class="song-title text-sm font-semibold text-white truncate">{{ $song->title }}</p>
                                        <p class="text-xs text-[#D6CFCB] truncate">{{ $song->artist_name }} • {{ $song->genre }}</p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-3 shrink-0 ml-2">
                                    <span class="text-xs text-[#8C827D]">{{ $song->duration }}</span>
                                    <span class="w-8 h-8 rounded-full bg-white/10 flex items-center justify-center text-white">
                                        <svg class="w-3.5 h-3.5 ml-0.5" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                    </span>
                                </div>
                            </button>
                        </li>
                    @endforeach
                </ul>
                <p id="noSongsFound" class="hidden text-center py-8 text-sm text-[#8C827D]">Koi song nahi mila</p>
            </section>

        </main>

        <!-- 7. FLOATING BOTTOM NAVIGATION DOCK -->
        <nav aria-label="Bottom Navigation" class="fixed bottom-4 left-1/2 -translate-x-1/2 w-[calc(100%-32px)] max-w-[416px] h-[68px] rounded-full bottom-nav-dock px-3 flex items-center justify-between z-30">
            <button onclick="switchNavTab('Home', this)" class="h-[50px] px-5 rounded-full pill-active flex items-center gap-2 shrink-0">
                <svg class="w-[18px] h-[18px]" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 3.2L4 9.6V20.5C4 21.05 4.45 21.5 5 21.5H19C19.55 21.5 20 21.05 20 20.5V9.6L12 3.2ZM12 13.5C11.17 13.5 10.5 12.83 10.5 12C10.5 11.17 11.17 10.5 12 10.5C12.83 10.5 13.5 11.17 13.5 12C13.5 12.83 12.83 13.5 12 13.5Z"/>
                </svg>
                <span class="text-[14px] font-semibold tracking-tight">Home</span>
            </button>

            <button onclick="focusSearch(); switchNavTab('Search', this)" aria-label="Search" class="w-[50px] h-[50px] rounded-full dock-circle-btn flex items-center justify-center text-white/90 shrink-0">
                <svg class="w-[20px] h-[20px]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <circle cx="11" cy="11" r="7"></circle>
                    <line x1="20" y1="20" x2="16.2" y2="16.2" stroke-linecap="round"></line>
                </svg>
            </button>

            <button onclick="openNowPlayingModal(); switchNavTab('Player', this)" aria-label="Now Playing" class="w-[50px] h-[50px] rounded-full dock-circle-btn flex items-center justify-center text-white/90 shrink-0">
                <svg class="w-[20px] h-[20px]" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="8"></circle>
                    <circle cx="12" cy="12" r="3"></circle>
                    <path d="M12 7a5 5 0 0 0-5 5" stroke-linecap="round"></path>
                </svg>
            </button>

            <button onclick="toggleDrawerMenu(); switchNavTab('Settings', this)" aria-label="Theme & Settings" class="w-[50px] h-[50px] rounded-full dock-circle-btn flex items-center justify-center text-white/90 shrink-0">
                <svg class="w-[20px] h-[20px]" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"/>
                </svg>
            </button>
        </nav>

        <!-- 8. INTERACTIVE NOW PLAYING LIQUID GLASS DRAWER -->
        <div id="nowPlayingModal" class="fixed inset-x-0 bottom-0 top-0 max-w-md mx-auto bg-black/85 backdrop-blur-2xl z-40 translate-y-full transition-transform duration-500 ease-out flex flex-col justify-between p-6">
            <div class="flex items-center justify-between">
                <button onclick="closeNowPlayingModal()" class="w-10 h-10 rounded-full liquid-circle-btn flex items-center justify-center text-white">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <span class="text-xs font-semibold uppercase tracking-widest text-[#D6CFCB]">Now Playing</span>
                <button onclick="toggleFavorite()" id="favoriteBtn" class="w-10 h-10 rounded-full liquid-circle-btn flex items-center justify-center text-[#F04E23]">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
                </button>
            </div>

            <!-- Artwork Preview -->
            <div class="my-auto flex flex-col items-center">
                <div class="w-64 h-64 rounded-[32px] shadow-2xl border border-white/20 flex items-end p-4 relative overflow-hidden bg-cover bg-center" id="modalCoverArt">
                    <img id="modalCoverImg" src="" class="absolute inset-0 w-full h-full object-cover" alt="">
                    <div class="w-full hero-glass-overlay rounded-2xl p-3 text-center z-10">
                        <p id="modalTrackTitle" class="text-base font-bold text-white truncate">Select a Song</p>
                        <p id="modalTrackArtist" class="text-xs text-[#D6CFCB] mt-0.5 truncate">Element Music</p>
                    </div>
                </div>

                <!-- Progress Scrubber -->
                <div class="w-full mt-8">
                    <input id="audioScrubber" type="range" min="0" max="100" value="0" class="w-full accent-[#F04E23] cursor-pointer h-1.5 bg-white/20 rounded-lg" oninput="seekAudio(this.value)" />
                    <div class="flex justify-between text-xs text-[#8C827D] mt-1.5">
                        <span id="currentTimeLabel">0:00</span>
                        <span id="totalDurationLabel">0:00</span>
                    </div>
                </div>

                <!-- Playback Controls -->
                <div class="flex items-center justify-center gap-6 mt-6">
                    <button onclick="prevTrack()" class="w-12 h-12 rounded-full dock-circle-btn flex items-center justify-center text-white" aria-label="Previous">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M6 6h2v12H6zm3.5 6l8.5 6V6z"/></svg>
                    </button>
                    <button onclick="togglePlayPause()" id="modalPlayBtn" class="w-16 h-16 rounded-full pill-active flex items-center justify-center text-neutral-950 shadow-xl" aria-label="Play/Pause">
                        <svg id="playPauseIcon" class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                    </button>
                    <button onclick="nextTrack()" class="w-12 h-12 rounded-full dock-circle-btn flex items-center justify-center text-white" aria-label="Next">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M6 18l8.5-6L6 6v12zM16 6v12h2V6h-2z"/></svg>
                    </button>
                </div>
            </div>

            <p class="text-center text-xs text-[#8C827D]">Liquid Glass Audio Engine • Real Stream</p>
        </div>

        <!-- 9. SETTINGS & THEME MODAL -->
        <div id="settingsModal" class="fixed inset-x-0 bottom-0 top-0 max-w-md mx-auto bg-[#0D0705]/95 backdrop-blur-2xl z-50 hidden flex-col p-6 overflow-y-auto no-scrollbar">
            <div class="flex items-center justify-between pb-4 border-b border-white/10">
                <div>
                    <h3 class="text-lg font-bold text-white">App Settings</h3>
                    <p class="text-xs text-[#8C827D]">Liquid Glass Themes & Audio</p>
                </div>
                <button onclick="toggleDrawerMenu()" class="w-9 h-9 rounded-full liquid-circle-btn flex items-center justify-center text-white">✕</button>
            </div>

            <div class="space-y-5 mt-5 text-xs">
                <div>
                    <p class="text-white font-semibold text-sm mb-2">Color Theme</p>
                    <div class="grid grid-cols-2 gap-2.5">
                        <button onclick="switchTheme('rust')" id="btnThemeRust" class="p-3 rounded-2xl bg-[#F04E23] text-neutral-950 font-bold flex items-center gap-2">
                            <span class="w-4 h-4 rounded-full bg-white/80"></span>
                            Rust Orange
                        </button>
                        <button onclick="switchTheme('crimson')" id="btnThemeCrimson" class="p-3 rounded-2xl bg-white/10 text-white font-medium flex items-center gap-2 hover:bg-white/15">
                            <span class="w-4 h-4 rounded-full bg-[#FA524B]"></span>
                            Crimson Glass
                        </button>
                    </div>
                </div>

                <div class="p-4 rounded-2xl bg-white/5 border border-white/10">
                    <p class="text-white font-semibold text-sm">Android Music App Backend</p>
                    <p class="text-[#D6CFCB] mt-1">Laravel API endpoints active at <code class="text-[#F04E23]">/api/v1/songs</code> with Laravel Sanctum tokens ready.</p>
                </div>
            </div>
        </div>

        <!-- 10. REAL AUDIO TAG -->
        <audio id="realAudio" preload="none"></audio>

        <!-- TOAST NOTIFICATION -->
        <div id="toastBox" class="fixed top-14 left-1/2 -translate-x-1/2 px-4 py-2 rounded-full bg-neutral-900/95 text-white border border-white/20 text-xs font-medium shadow-xl opacity-0 pointer-events-none transition-opacity duration-300 z-50 whitespace-nowrap">
            Notification
        </div>

    </div>

    <script>
        const songs = {{ Js::from($playerQueue) }};
        const audio = document.getElementById('realAudio');
        let currentTrackIndex = 0;
        let isPlaying = false;
        let activeCategory = 'All';

        function playSongById(id) {
            const index = songs.findIndex(s => s.id === id);
            if (index !== -1) {
                playTrack(index);
            }
        }

        function playTrack(index) {
            if (index < 0 || index >= songs.length) return;
            currentTrackIndex = index;
            const song = songs[index];

            document.getElementById('miniStatusText').textContent = song.title;
            document.getElementById('modalTrackTitle').textContent = song.title;
            document.getElementById('modalTrackArtist').textContent = song.artist + (song.genre ? ' • ' + song.genre : '');
            document.getElementById('modalCoverImg').src = song.cover;
            document.getElementById('totalDurationLabel').textContent = song.duration || '3:30';

            audio.src = song.audio;
            audio.play().then(() => {
                isPlaying = true;
                updatePlayIcons();
            }).catch(() => {
                isPlaying = false;
                updatePlayIcons();
            });

            document.querySelectorAll('.song-title').forEach(el => el.classList.remove('text-[#F04E23]'));
            const activeTitle = document.querySelector(`[onclick="playSongById(${song.id})"] .song-title`);
            if (activeTitle) activeTitle.classList.add('text-[#F04E23]');

            fetch(`/api/v1/songs/${song.id}/play`, { method: 'POST', headers: { 'Accept': 'application/json' } }).catch(() => {});
            showToast(`Playing: ${song.title}`);
        }

        function togglePlayPause() {
            if (audio.src) {
                if (audio.paused) {
                    audio.play();
                    isPlaying = true;
                } else {
                    audio.pause();
                    isPlaying = false;
                }
                updatePlayIcons();
            } else if (songs.length > 0) {
                playTrack(0);
            }
        }

        function updatePlayIcons() {
            const icon = document.getElementById('playPauseIcon');
            const eq = document.getElementById('headerEq');
            if (isPlaying) {
                icon.innerHTML = '<path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z"/>';
                eq.classList.remove('paused-eq');
            } else {
                icon.innerHTML = '<path d="M8 5v14l11-7z"/>';
                eq.classList.add('paused-eq');
            }
        }

        function nextTrack() {
            currentTrackIndex = (currentTrackIndex + 1) % songs.length;
            playTrack(currentTrackIndex);
        }

        function prevTrack() {
            currentTrackIndex = (currentTrackIndex - 1 + songs.length) % songs.length;
            playTrack(currentTrackIndex);
        }

        audio.addEventListener('timeupdate', () => {
            if (audio.duration) {
                const percent = (audio.currentTime / audio.duration) * 100;
                document.getElementById('audioScrubber').value = percent;
                const mins = Math.floor(audio.currentTime / 60);
                const secs = String(Math.floor(audio.currentTime % 60)).padStart(2, '0');
                document.getElementById('currentTimeLabel').textContent = `${mins}:${secs}`;
            }
        });

        audio.addEventListener('ended', () => {
            nextTrack();
        });

        function seekAudio(val) {
            if (audio.duration) {
                audio.currentTime = (val / 100) * audio.duration;
            }
        }

        function selectCategory(genre, btnElement) {
            activeCategory = genre;
            const container = document.getElementById('categoryPillsContainer');
            container.querySelectorAll('button').forEach(btn => {
                btn.className = 'glass-pill-inactive px-[18px] py-[9px] rounded-full text-[13px] shrink-0 font-medium transition';
            });
            btnElement.className = 'pill-active px-[20px] py-[9px] rounded-full text-[13px] shrink-0 font-medium transition';
            filterTracks();
            showToast(`Filter: ${genre}`);
        }

        function filterTracks() {
            const term = document.getElementById('searchInput').value.trim().toLowerCase();
            let count = 0;
            document.querySelectorAll('.song-item').forEach(item => {
                const matchGenre = (activeCategory === 'All' || item.dataset.genre === activeCategory);
                const matchSearch = item.dataset.search.includes(term);
                const visible = matchGenre && matchSearch;
                item.classList.toggle('hidden', !visible);
                if (visible) count++;
            });
            document.getElementById('songsCountLabel').textContent = `${count} tracks`;
            document.getElementById('noSongsFound').classList.toggle('hidden', count > 0);
        }

        document.getElementById('searchInput').addEventListener('input', filterTracks);

        function clearSearch() {
            document.getElementById('searchInput').value = '';
            filterTracks();
        }

        function focusSearch() {
            document.getElementById('searchInput').focus();
        }

        function openNowPlayingModal() {
            document.getElementById('nowPlayingModal').classList.remove('translate-y-full');
        }

        function closeNowPlayingModal() {
            document.getElementById('nowPlayingModal').classList.add('translate-y-full');
        }

        function toggleDrawerMenu() {
            const modal = document.getElementById('settingsModal');
            modal.classList.toggle('hidden');
            modal.classList.toggle('flex');
        }

        function toggleFavorite() {
            showToast('Added to Liked Songs ❤️');
        }

        function switchNavTab(tab, el) {
            showToast(`${tab} tab active`);
        }

        function switchTheme(theme) {
            const root = document.documentElement;
            const rustBtn = document.getElementById('btnThemeRust');
            const crimsonBtn = document.getElementById('btnThemeCrimson');
            if (theme === 'crimson') {
                root.setAttribute('data-theme', 'crimson');
                crimsonBtn.className = 'p-3 rounded-2xl bg-[#FA524B] text-neutral-950 font-bold flex items-center gap-2';
                rustBtn.className = 'p-3 rounded-2xl bg-white/10 text-white font-medium flex items-center gap-2 hover:bg-white/15';
                showToast('Crimson Glass Theme applied');
            } else {
                root.removeAttribute('data-theme');
                rustBtn.className = 'p-3 rounded-2xl bg-[#F04E23] text-neutral-950 font-bold flex items-center gap-2';
                crimsonBtn.className = 'p-3 rounded-2xl bg-white/10 text-white font-medium flex items-center gap-2 hover:bg-white/15';
                showToast('Rust Orange Theme applied');
            }
        }

        let toastTimeout;
        function showToast(msg) {
            const toast = document.getElementById('toastBox');
            toast.textContent = msg;
            toast.classList.remove('opacity-0');
            clearTimeout(toastTimeout);
            toastTimeout = setTimeout(() => {
                toast.classList.add('opacity-0');
            }, 2000);
        }

        // Initialize default track preview in player
        if (songs.length > 0) {
            const s = songs[0];
            document.getElementById('miniStatusText').textContent = s.title;
            document.getElementById('modalTrackTitle').textContent = s.title;
            document.getElementById('modalTrackArtist').textContent = s.artist;
            document.getElementById('modalCoverImg').src = s.cover;
            document.getElementById('totalDurationLabel').textContent = s.duration || '3:30';
            updatePlayIcons();
        }
    </script>
</body>
</html>
