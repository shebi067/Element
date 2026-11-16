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
    <!-- YouTube IFrame Player API for Real Audio Streaming -->
    <script src="https://www.youtube.com/iframe_api"></script>

    <style>
        :root {
            --color-primary: #F04E23;
            --color-primary-glow: rgba(240, 78, 35, 0.45);
            --bg-base: #0D0705;
            --bg-gradient-top: #5A2311;
            --bg-gradient-mid: #2B1108;
            --surface-pill-inactive: rgba(255, 255, 255, 0.11);
            --surface-bottom-dock: rgba(28, 25, 24, 0.90);
            --surface-card-glass: rgba(34, 28, 24, 0.56);
            --border-glass: rgba(255, 255, 255, 0.24);
            --text-primary: #FFFFFF;
            --text-secondary: #D6CFCB;
            --text-muted: #8C827D;
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

        .glass-pill-inactive {
            background: var(--surface-pill-inactive);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            border: 1px solid rgba(255, 255, 255, 0.14);
            color: var(--text-secondary);
            box-shadow: inset 0 1px 2px rgba(255, 255, 255, 0.12), 0 4px 12px rgba(0, 0, 0, 0.2);
            transition: all 0.25s ease;
        }

        .pill-active {
            background: var(--color-primary);
            color: #121212;
            font-weight: 600;
            border: 1px solid rgba(255, 255, 255, 0.25);
            box-shadow: inset 0 2px 4px rgba(255, 255, 255, 0.35), 0 6px 18px var(--color-primary-glow);
        }

        .hero-glass-overlay {
            background: rgba(30, 22, 18, 0.65);
            backdrop-filter: blur(20px) saturate(140%);
            -webkit-backdrop-filter: blur(20px) saturate(140%);
            border: 1px solid rgba(255, 255, 255, 0.22);
            box-shadow: inset 0 4px 10px rgba(255, 255, 255, 0.14), 0 10px 24px rgba(0, 0, 0, 0.5);
        }

        /* Ultra-Realistic Liquid Glass Search Bar & Circle Button (Reference UI) */
        .liquid-glass-search {
            background: rgba(255, 255, 255, 0.09);
            backdrop-filter: blur(24px) saturate(180%);
            -webkit-backdrop-filter: blur(24px) saturate(180%);
            border-top: 1.5px solid rgba(255, 255, 255, 0.55);
            border-bottom: 1px solid rgba(255, 255, 255, 0.14);
            border-left: 1.2px solid rgba(255, 255, 255, 0.30);
            border-right: 1.2px solid rgba(255, 255, 255, 0.30);
            box-shadow: 
                inset 0 2px 4px rgba(255, 255, 255, 0.40),
                inset 0 -2px 6px rgba(0, 0, 0, 0.25),
                0 8px 24px rgba(0, 0, 0, 0.28);
            transition: all 0.3s cubic-bezier(0.22, 1, 0.36, 1);
        }
        .liquid-glass-search:focus-within {
            background: rgba(255, 255, 255, 0.14);
            border-top-color: rgba(255, 255, 255, 0.75);
            border-color: rgba(255, 255, 255, 0.45);
            box-shadow: 
                inset 0 2px 5px rgba(255, 255, 255, 0.55),
                inset 0 -2px 6px rgba(0, 0, 0, 0.30),
                0 12px 32px rgba(0, 0, 0, 0.38),
                0 0 16px rgba(255, 255, 255, 0.15);
        }

        .liquid-glass-search-btn {
            background: rgba(255, 255, 255, 0.09);
            backdrop-filter: blur(24px) saturate(180%);
            -webkit-backdrop-filter: blur(24px) saturate(180%);
            border-top: 1.5px solid rgba(255, 255, 255, 0.55);
            border-bottom: 1px solid rgba(255, 255, 255, 0.14);
            border-left: 1.2px solid rgba(255, 255, 255, 0.30);
            border-right: 1.2px solid rgba(255, 255, 255, 0.30);
            box-shadow: 
                inset 0 2px 4px rgba(255, 255, 255, 0.42),
                inset 0 -2px 5px rgba(0, 0, 0, 0.25),
                0 8px 22px rgba(0, 0, 0, 0.28);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.25s cubic-bezier(0.22, 1, 0.36, 1);
        }
        .liquid-glass-search-btn:hover {
            transform: scale(1.05);
            background: rgba(255, 255, 255, 0.16);
            border-top-color: rgba(255, 255, 255, 0.80);
            box-shadow: 
                inset 0 2px 5px rgba(255, 255, 255, 0.55),
                inset 0 -2px 6px rgba(0, 0, 0, 0.25),
                0 10px 26px rgba(0, 0, 0, 0.32);
        }
        .liquid-glass-search-btn:active {
            transform: scale(0.95);
        }

        .bottom-nav-dock {
            background: rgba(24, 18, 15, 0.94);
            backdrop-filter: blur(22px) saturate(150%);
            -webkit-backdrop-filter: blur(22px) saturate(150%);
            border: 1px solid rgba(255, 255, 255, 0.14);
            box-shadow: 0 16px 36px rgba(0, 0, 0, 0.75), inset 0 1px 1px rgba(255, 255, 255, 0.12);
        }

        .dock-circle-btn {
            background: linear-gradient(165deg, rgba(255, 255, 255, 0.20) 0%, rgba(255, 255, 255, 0.08) 100%);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.22);
            box-shadow: inset 0 2px 4px rgba(255, 255, 255, 0.15), 0 4px 10px rgba(0, 0, 0, 0.35);
            transition: all 0.25s ease;
        }

        /* Equalizer Animation */
        @@keyframes eqBar1 { 0%, 100% { height: 4px; } 50% { height: 16px; } }
        @@keyframes eqBar2 { 0%, 100% { height: 15px; } 35% { height: 4px; } 70% { height: 18px; } }
        @@keyframes eqBar3 { 0%, 100% { height: 8px; } 40% { height: 17px; } 80% { height: 5px; } }
        .eq-bar-1 { animation: eqBar1 0.8s ease-in-out infinite; }
        .eq-bar-2 { animation: eqBar2 0.7s ease-in-out infinite; }
        .eq-bar-3 { animation: eqBar3 0.9s ease-in-out infinite; }
        .paused-eq span { animation-play-state: paused !important; height: 4px !important; }

        /* Custom Audio Scrubber Styling */
        input[type="range"].custom-range {
            -webkit-appearance: none;
            appearance: none;
            background: rgba(255, 255, 255, 0.2);
            height: 4px;
            border-radius: 9999px;
            outline: none;
        }
        input[type="range"].custom-range::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 14px;
            height: 14px;
            border-radius: 50%;
            background: #F04E23;
            cursor: pointer;
            box-shadow: 0 0 10px rgba(240, 78, 35, 0.8);
            border: 2px solid #FFFFFF;
        }
    </style>
</head>
<body class="min-h-screen bg-[#050302]">

    <div class="relative mx-auto min-h-screen max-w-md overflow-hidden app-surface-bg flex flex-col justify-between shadow-2xl pb-28">

        <!-- 1. TOP HEADER -->
        <header class="w-full pt-6 pb-2 px-5 flex items-center justify-between z-20 shrink-0">
            <button onclick="toggleSettingsModal()" aria-label="Menu" class="w-[46px] h-[46px] rounded-full liquid-circle-btn flex flex-col items-start justify-center pl-[14px] gap-[4px]">
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

        <!-- 2. SCROLLABLE MAIN HOMEPAGE CONTENT -->
        <main class="flex-1 overflow-y-auto no-scrollbar pt-2 px-5">

            <!-- 2. LIQUID GLASS SEARCH BAR (Matching Reference Image) -->
            <div class="mt-2 mb-4">
                <div class="flex items-center gap-3">
                    <div class="relative flex-1 h-[52px] rounded-full liquid-glass-search flex items-center px-5">
                        <input id="searchInput" type="text" placeholder="Search..." autocomplete="off"
                               class="w-full bg-transparent text-[15px] font-normal tracking-wide text-white placeholder-white/60 outline-none pr-7">
                        <button id="clearSearchBtn" onclick="clearSearch()" class="hidden absolute right-4 w-6 h-6 rounded-full bg-white/10 hover:bg-white/20 text-white/70 hover:text-white flex items-center justify-center text-xs transition" title="Clear">
                            ✕
                        </button>
                    </div>
                    <button onclick="handleSearchBtnClick()" aria-label="Search" class="w-[52px] h-[52px] rounded-full liquid-glass-search-btn shrink-0 group">
                        <svg class="w-5 h-5 text-white/90 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                            <circle cx="11" cy="11" r="6.5"/>
                            <path d="m16 16 4.5 4.5"/>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- 3. TRENDING & FILTER PILLS -->
            <section class="mt-2">
                <div class="mb-3">
                    <h1 class="text-[20px] font-semibold tracking-tight text-white">Trending</h1>
                </div>

                <div class="flex items-center gap-2 overflow-x-auto no-scrollbar pb-1" id="categoryPillsContainer">
                    @foreach ($genres as $genre)
                        <button onclick="selectCategory('{{ $genre }}', this)" class="{{ $loop->first ? 'pill-active px-[20px] py-[9px]' : 'glass-pill-inactive px-[18px] py-[9px]' }} rounded-full text-[13px] shrink-0 font-medium transition">
                            {{ $genre }}
                        </button>
                    @endforeach
                </div>
            </section>

            <!-- 3.5 IMPORTED PLAYLISTS SECTION (Real YouTube Playlists) -->
            <section class="mt-5 {{ $playlists->count() === 0 ? 'hidden' : '' }}" id="playlistsSection">
                <div class="mb-3 flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <h2 class="text-[19px] font-semibold tracking-tight text-white">Imported Playlists</h2>
                        <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-red-600/30 text-red-400 border border-red-500/30">YouTube</span>
                    </div>
                    <button onclick="openImportModal()" class="text-[12px] font-semibold text-[#F04E23] hover:underline flex items-center gap-1">
                        + Import More
                    </button>
                </div>

                <div class="flex items-center gap-3.5 overflow-x-auto no-scrollbar snap-x snap-mandatory pb-1" id="playlistsContainer">
                    @foreach ($playlists as $pl)
                        <div onclick="filterByPlaylist('{{ addslashes($pl->title) }}', this)" class="playlist-card relative w-[190px] h-[135px] rounded-[24px] overflow-hidden shrink-0 snap-start cursor-pointer group shadow-xl border border-white/10 bg-[#1A100C]">
                            <img src="{{ $pl->cover_url }}" class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" alt="{{ $pl->title }}">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/95 via-black/40 to-transparent"></div>

                            <div class="absolute top-2.5 right-2.5 w-7 h-7 rounded-full bg-red-600/90 text-white flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform">
                                <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="currentColor"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                            </div>

                            <div class="absolute bottom-2.5 left-3 right-3">
                                <h3 class="text-[13px] font-bold text-white truncate drop-shadow">{{ $pl->title }}</h3>
                                <p class="text-[11px] text-[#D6CFCB] font-medium truncate mt-0.5">{{ $pl->songs->count() ?: $pl->tracks_count }} tracks • Live Sync</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>

            <!-- 4. "TO GET YOU STARTED" HERO CAROUSEL / EMPTY STATE -->
            @if ($featuredSongs->count() > 0)
                <section class="mt-6" id="featuredSection">
                    <div class="mb-3 flex items-center justify-between">
                        <h2 class="text-[19px] font-semibold tracking-tight text-white">To get you started</h2>
                        <span class="text-[12px] font-medium text-[#8C827D]">Featured</span>
                    </div>

                    <div class="flex items-center gap-4 overflow-x-auto no-scrollbar snap-x snap-mandatory">
                        @foreach ($featuredSongs as $song)
                            <article onclick="playSongById({{ $song->id }})" class="relative w-[280px] h-[260px] rounded-[32px] overflow-hidden shrink-0 snap-start cursor-pointer group shadow-2xl border border-white/10">
                                <img src="{{ $song->cover_url }}" class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" alt="{{ $song->title }}">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/30 to-transparent"></div>

                                <div class="absolute top-4 right-4 w-10 h-10 rounded-full bg-[#F04E23] text-neutral-950 flex items-center justify-center opacity-90 group-hover:opacity-100 transition shadow-lg">
                                    <svg class="w-5 h-5 ml-0.5" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                </div>

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
            @else
                <!-- Clean Empty State Prompt to Import Playlists -->
                <section class="mt-6" id="emptyImportBanner">
                    <div onclick="openImportModal()" class="p-6 rounded-3xl hero-glass-overlay text-center cursor-pointer border border-red-500/30 hover:border-red-500/60 transition group shadow-2xl">
                        <div class="w-14 h-14 mx-auto rounded-full bg-red-600/20 border border-red-500/40 flex items-center justify-center text-red-500 mb-3 group-hover:scale-110 transition-transform">
                            <svg class="w-7 h-7" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                            </svg>
                        </div>
                        <h3 class="text-base font-extrabold text-white">Import Your Playlists</h3>
                        <p class="text-xs text-[#D6CFCB] mt-1 max-w-[260px] mx-auto">No pre-loaded template soundtracks. Paste any YouTube playlist link or choose from trending mixes to import in real-time!</p>
                        <button class="mt-4 px-5 py-2.5 rounded-full bg-gradient-to-r from-red-600 to-[#F04E23] text-white text-xs font-bold shadow-lg shadow-red-600/30">
                            ⚡ Open YouTube Importer
                        </button>
                    </div>
                </section>
            @endif

            <!-- 5. "POPULAR SONGS" SECTION -->
            @if ($popularSongs->count() > 0)
                <section class="mt-6" id="popularSection">
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
            @endif

            <!-- 6. ALL SONGS LIST -->
            <section class="mt-6 mb-4">
                <div class="mb-3 flex items-center justify-between">
                    <h2 class="text-[19px] font-semibold tracking-tight text-white">All Tracks</h2>
                    <span id="songsCountLabel" class="text-[12px] font-medium text-[#8C827D]">{{ $allSongs->count() }} tracks</span>
                </div>

                <ul class="space-y-2.5" id="songListContainer">
                    @foreach ($allSongs as $song)
                        <li data-genre="{{ $song->genre }}" data-album="{{ strtolower($song->album_name ?? '') }}" data-search="{{ strtolower($song->title.' '.$song->artist_name.' '.($song->album_name ?? '')) }}" class="song-item">
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
                    <path d="M12 3.2L4 9.6V20.5C4 21.05 4.45 21.5 5 21.5H19C19.55 21.5 20 21.05 20 20.5V9.6L12 3.2Z"/>
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

            <button onclick="openImportModal(); switchNavTab('Import', this)" id="navImportBtn" aria-label="Import from YouTube" class="w-[50px] h-[50px] rounded-full dock-circle-btn flex flex-col items-center justify-center text-white/90 shrink-0 relative group hover:border-red-500/60 transition">
                <svg class="w-[20px] h-[20px] text-red-500 transition-transform group-hover:scale-110" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                </svg>
                <span class="text-[8px] font-bold tracking-tight text-white/80 uppercase">Import</span>
            </button>
        </nav>

        <!-- ============================================================== -->
        <!-- 8. FULLSCREEN IMMERSIVE POSTER PLAYER DRAWER (Matching SS 2 & SS 3) -->
        <!-- ============================================================== -->
        <div id="nowPlayingModal" class="fixed inset-0 max-w-md mx-auto bg-black z-40 translate-y-full transition-transform duration-500 ease-out flex flex-col justify-between overflow-hidden">
            
            <!-- REAL YOUTUBE VIDEO/AUDIO ENGINE (Full dimensions for reliable streaming) -->
            <div id="ytPlayerWrapper" class="absolute inset-0 w-full h-full z-0 overflow-hidden flex items-center justify-center bg-black transition-opacity duration-500 opacity-0 pointer-events-none">
                <div id="ytPlayer" class="w-full h-full"></div>
            </div>

            <!-- FULL-BLEED BACKGROUND POSTER (SS 3 style) -->
            <img id="playerFullPoster" src="https://images.unsplash.com/photo-1514525253161-7a46d19cd819?w=900&auto=format&fit=crop&q=80" 
                 class="absolute inset-0 w-full h-full object-cover object-center filter brightness-95 transition-all duration-700 z-[1]" alt="Song Cover Poster">
            
            <!-- Vignette & Dark Gradient overlays so controls and text are completely clear -->
            <div class="absolute inset-0 bg-gradient-to-b from-black/60 via-black/20 to-black/95 pointer-events-none z-[2]"></div>

            <!-- TOP BAR (SS 2 & 3 style) -->
            <div class="relative z-10 w-full pt-6 pb-2 px-5 flex items-center justify-between shrink-0">
                <!-- Down Chevron / Close Button -->
                <button onclick="closeNowPlayingModal()" class="w-10 h-10 rounded-full liquid-circle-btn flex items-center justify-center text-white" aria-label="Dismiss">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
                </button>

                <!-- Center Switcher: Song / Video Pill (SS 2 YT Music Style) -->
                <div class="glass-pill-inactive p-1 rounded-full flex items-center gap-1 text-[11px] font-semibold">
                    <button id="modeAudioBtn" onclick="switchPlayerMode('audio')" class="px-3 py-1 rounded-full pill-active text-neutral-950 flex items-center gap-1 transition">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 18V5l12-2v13"/><circle cx="6" cy="18" r="3"/><circle cx="18" cy="16" r="3"/></svg>
                        Song
                    </button>
                    <button id="modeVideoBtn" onclick="switchPlayerMode('video')" class="px-3 py-1 rounded-full text-white/70 hover:text-white flex items-center gap-1 transition">
                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                        Video
                    </button>
                </div>

                <!-- Right 3-Dots Menu -->
                <button onclick="toggleSettingsModal()" class="w-10 h-10 rounded-full liquid-circle-btn flex items-center justify-center text-white" aria-label="Options">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><circle cx="5" cy="12" r="2"/><circle cx="12" cy="12" r="2"/><circle cx="19" cy="12" r="2"/></svg>
                </button>
            </div>

            <!-- MIDDLE SPACER -->
            <div class="relative z-10 flex-1"></div>

            <!-- LOWER CONTROLS & FEATURES CARD (SS 2 + SS 3 style) -->
            <div class="relative z-10 w-full px-5 pb-6">

                <!-- Song Title & Artist Name with '>' link -->
                <div class="mb-4 flex items-center justify-between">
                    <div class="min-w-0 flex-1 pr-3">
                        <div class="flex items-center gap-1.5 cursor-pointer" onclick="showToast('Album: ' + currentSong().album)">
                            <h2 id="modalTrackTitle" class="text-[22px] font-extrabold text-white truncate tracking-tight drop-shadow-md">Kesariya (Redux & Acoustic)</h2>
                            <svg class="w-4 h-4 text-white/70 shrink-0" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                        </div>
                        <p id="modalTrackArtist" class="text-[14px] font-medium text-[#D6CFCB] truncate mt-0.5 drop-shadow">Arijit Singh</p>
                    </div>

                    <!-- Heart Favorite Button -->
                    <button onclick="toggleFavorite()" id="favoriteBtn" class="w-11 h-11 rounded-full liquid-circle-btn flex items-center justify-center text-white shrink-0 transition" aria-label="Like">
                        <svg id="heartIcon" class="w-5 h-5 transition-transform active:scale-125" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                        </svg>
                    </button>
                </div>

                <!-- 2nd Screenshot Feature Row: [Like 13K] [Dislike] [99 Lyrics] [197 Comments] [Save] -->
                <div class="flex items-center gap-2 overflow-x-auto no-scrollbar mb-4 py-1">
                    <!-- Like pill with count -->
                    <button onclick="toggleLikeCounter()" id="likeCounterBtn" class="h-9 px-3.5 rounded-full glass-pill-inactive flex items-center gap-1.5 text-xs font-semibold shrink-0">
                        <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"/></svg>
                        <span id="likeCountText">13K</span>
                    </button>

                    <!-- Dislike pill -->
                    <button onclick="showToast('Disliked')" class="h-9 px-3 rounded-full glass-pill-inactive flex items-center justify-center text-white shrink-0">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M10 15v4a3 3 0 0 0 3 3l4-9V2H5.72a2 2 0 0 0-2 1.7l-1.38 9a2 2 0 0 0 2 2.3zm7-13h3a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2h-3"/></svg>
                    </button>

                    <!-- Lyrics Pill (Toggles Lyrics!) -->
                    <button onclick="openLyricsSheet()" class="h-9 px-3.5 rounded-full pill-active flex items-center gap-1.5 text-xs font-semibold shrink-0 shadow-lg">
                        <svg class="w-3.5 h-3.5 text-neutral-950" fill="currentColor" viewBox="0 0 24 24"><path d="M14 17h3l2-4V7h-6v6h3M6 17h3l2-4V7H5v6h3"/></svg>
                        <span>Lyrics</span>
                    </button>

                    <!-- Comments pill -->
                    <button onclick="showToast('197 Comments • Live Discussion')" class="h-9 px-3.5 rounded-full glass-pill-inactive flex items-center gap-1.5 text-xs font-medium shrink-0">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                        <span>197</span>
                    </button>

                    <!-- Save / Add to Playlist pill -->
                    <button onclick="showToast('Saved to your playlist')" class="h-9 px-3.5 rounded-full glass-pill-inactive flex items-center gap-1.5 text-xs font-medium shrink-0">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"/></svg>
                        <span>Save</span>
                    </button>
                </div>

                <!-- Progress Scrubber Slider -->
                <div class="w-full mb-3">
                    <input id="audioScrubber" type="range" min="0" max="100" value="0" class="w-full custom-range cursor-pointer" oninput="seekAudio(this.value)" />
                    <div class="flex justify-between text-[11px] font-medium text-[#D6CFCB] mt-1.5">
                        <span id="currentTimeLabel">0:00</span>
                        <span id="totalDurationLabel">3:45</span>
                    </div>
                </div>

                <!-- Full Playback Controls Row: [Shuffle] [Prev] [Play/Pause] [Next] [Repeat] -->
                <div class="flex items-center justify-between px-2 mb-4">
                    <!-- Shuffle Toggle -->
                    <button onclick="toggleShuffle()" id="shuffleBtn" class="w-10 h-10 rounded-full flex items-center justify-center text-white/60 hover:text-white transition" aria-label="Shuffle">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 3h5v5M4 20L21 3M21 16v5h-5M15 15l6 6M4 4l5 5"/>
                        </svg>
                    </button>

                    <!-- Previous Track -->
                    <button onclick="prevTrack()" class="w-12 h-12 rounded-full dock-circle-btn flex items-center justify-center text-white transition active:scale-95" aria-label="Previous">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M6 6h2v12H6zm3.5 6l8.5 6V6z"/></svg>
                    </button>

                    <!-- Main Big Circular Play/Pause Button -->
                    <button onclick="togglePlayPause()" id="modalPlayBtn" class="w-16 h-16 rounded-full pill-active flex items-center justify-center text-neutral-950 shadow-2xl transition active:scale-95" aria-label="Play/Pause">
                        <svg id="playPauseIcon" class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                    </button>

                    <!-- Next Track -->
                    <button onclick="nextTrack()" class="w-12 h-12 rounded-full dock-circle-btn flex items-center justify-center text-white transition active:scale-95" aria-label="Next">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M6 18l8.5-6L6 6v12zM16 6v12h2V6h-2z"/></svg>
                    </button>

                    <!-- Repeat Toggle -->
                    <button onclick="toggleRepeat()" id="repeatBtn" class="w-10 h-10 rounded-full flex items-center justify-center text-white/60 hover:text-white transition" aria-label="Repeat">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 1l4 4-4 4M3 11V9a4 4 0 0 1 4-4h14M7 23l-4-4 4-4M21 13v2a4 4 0 0 1-4 4H3"/>
                        </svg>
                    </button>
                </div>

                <!-- SWIPE-UP DRAG HANDLE WITH LIVE LYRICS TEASER (SS 2 Style) -->
                <div id="lyricsTeaserTrigger" onclick="openLyricsSheet()" class="w-full flex flex-col items-center cursor-pointer pt-1 group" title="Swipe or tap up for lyrics">
                    <!-- Drag handle pill indicator -->
                    <div class="w-10 h-1 bg-white/40 rounded-full mb-2 group-hover:bg-white transition-all"></div>
                    <!-- Live Lyrics Preview Text -->
                    <div class="flex items-center gap-2 max-w-[90%] text-center">
                        <svg class="w-3 h-3 text-[#F04E23] shrink-0" fill="currentColor" viewBox="0 0 24 24"><path d="M14 17h3l2-4V7h-6v6h3M6 17h3l2-4V7H5v6h3"/></svg>
                        <p id="lyricsTeaserLine" class="text-xs text-[#D6CFCB] font-medium truncate">Swipe up for synced lyrics</p>
                    </div>
                </div>

            </div>

            <!-- ============================================================== -->
            <!-- 9. SYNCHRONIZED KARAOKE LYRICS SHEET (Slides up on drag/tap)   -->
            <!-- ============================================================== -->
            <div id="lyricsSheet" class="absolute inset-0 bg-[#0D0705]/95 backdrop-blur-3xl z-50 translate-y-full transition-transform duration-500 ease-out flex flex-col justify-between p-6">
                
                <!-- Lyrics Sheet Header with drag-down handle -->
                <div class="flex flex-col items-center shrink-0 pb-3 border-b border-white/10">
                    <button onclick="closeLyricsSheet()" class="w-12 h-1.5 bg-white/30 rounded-full mb-3 hover:bg-white/60 cursor-pointer" aria-label="Close Lyrics"></button>
                    <div class="w-full flex items-center justify-between">
                        <div>
                            <span class="text-[10px] font-extrabold uppercase tracking-widest text-[#F04E23]">Synchronized Lyrics</span>
                            <h3 id="lyricsTrackTitle" class="text-base font-bold text-white truncate max-w-[220px]">Kesariya</h3>
                        </div>
                        <button onclick="closeLyricsSheet()" class="w-8 h-8 rounded-full liquid-circle-btn flex items-center justify-center text-white text-xs">✕</button>
                    </div>
                </div>

                <!-- Lyrics Scrollable Lines -->
                <div id="lyricsLinesContainer" class="flex-1 overflow-y-auto no-scrollbar py-8 space-y-6 text-center select-text">
                    <!-- Dynamic Lines will be inserted here -->
                </div>

                <!-- Bottom Mini Playback Controller while reading lyrics -->
                <div class="shrink-0 pt-3 border-t border-white/10 flex items-center justify-between">
                    <div class="flex items-center gap-3 min-w-0 flex-1">
                        <img id="lyricsMiniCover" src="" class="w-10 h-10 rounded-lg object-cover" alt="">
                        <div class="min-w-0 flex-1 text-left">
                            <p id="lyricsMiniTitle" class="text-xs font-bold text-white truncate">Kesariya</p>
                            <p id="lyricsMiniArtist" class="text-[10px] text-[#8C827D] truncate">Arijit Singh</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-3">
                        <button onclick="togglePlayPause()" class="w-10 h-10 rounded-full pill-active flex items-center justify-center text-neutral-950">
                            <svg id="lyricsPlayIcon" class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                        </button>
                        <button onclick="nextTrack()" class="w-9 h-9 rounded-full dock-circle-btn flex items-center justify-center text-white">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M6 18l8.5-6L6 6v12zM16 6v12h2V6h-2z"/></svg>
                        </button>
                    </div>
                </div>

            </div>

        </div>

        <!-- 10. REAL-TIME YOUTUBE IMPORT HUB MODAL -->
        <div id="importModal" class="fixed inset-0 max-w-md mx-auto bg-[#0D0705]/95 backdrop-blur-3xl z-50 hidden flex-col p-6 overflow-y-auto no-scrollbar">
            <!-- Modal Header -->
            <div class="flex items-center justify-between pb-4 border-b border-white/10 shrink-0">
                <div class="flex items-center gap-2.5">
                    <div class="w-8 h-8 rounded-full bg-red-600/20 border border-red-500/40 flex items-center justify-center text-red-500">
                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-base font-bold text-white tracking-tight">YouTube Importer</h3>
                        <p class="text-[10px] text-[#8C827D]">Real-Time Playlist Extraction</p>
                    </div>
                </div>
                <button onclick="closeImportModal()" class="w-9 h-9 rounded-full liquid-circle-btn flex items-center justify-center text-white" aria-label="Close">✕</button>
            </div>

            <!-- Import URL Form & Beautiful Button -->
            <div class="mt-5 space-y-4">
                <div class="p-4 rounded-3xl hero-glass-overlay">
                    <label class="block text-xs font-semibold text-white/90 mb-2">Paste YouTube Playlist URL</label>
                    <div class="flex items-center gap-2 rounded-2xl bg-black/40 border border-white/10 px-3.5 py-2.5 focus-within:border-red-500/80 transition">
                        <svg class="w-4 h-4 text-white/40 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/></svg>
                        <input id="ytPlaylistInput" type="text" placeholder="https://youtube.com/playlist?list=..." class="w-full bg-transparent text-xs text-white placeholder-white/40 outline-none">
                    </div>

                    <!-- Beautiful Glowing Import Button -->
                    <button onclick="importCustomYouTubeUrl()" id="btnStartImport" class="mt-3.5 w-full h-12 rounded-2xl bg-gradient-to-r from-red-600 via-[#F04E23] to-red-500 text-white font-bold text-sm tracking-wide shadow-lg shadow-red-600/30 flex items-center justify-center gap-2 transition hover:scale-[1.02] active:scale-[0.98] cursor-pointer">
                        <svg class="w-5 h-5 text-white" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                        </svg>
                        <span id="importBtnText">Import Playlist Now</span>
                        <svg id="importBtnSpinner" class="w-4 h-4 text-white animate-spin hidden" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path></svg>
                    </button>
                </div>

                <!-- Real-Time Progress Bar -->
                <div id="importProgressBox" class="hidden p-4 rounded-2xl bg-white/5 border border-white/10 transition-all">
                    <div class="flex items-center justify-between text-xs mb-1.5">
                        <span id="importStatusText" class="font-medium text-[#D6CFCB]">Connecting to YouTube API...</span>
                        <span id="importPercentText" class="font-bold text-[#F04E23]">0%</span>
                    </div>
                    <div class="w-full h-2 rounded-full bg-black/50 overflow-hidden">
                        <div id="importProgressBar" class="h-full bg-gradient-to-r from-red-600 to-[#F04E23] transition-all duration-300 w-0"></div>
                    </div>
                </div>

                <!-- Curated 1-Click Real-time Import Presets -->
                <div>
                    <div class="mb-3 flex items-center justify-between">
                        <h4 class="text-xs font-bold uppercase tracking-wider text-white/80">⚡ 1-Click Trending Playlists</h4>
                        <span class="text-[10px] text-[#8C827D]">Real-Time Sync</span>
                    </div>

                    <div class="space-y-2.5">
                        <!-- Preset 1: Coke Studio & Pakistani Hip-Hop -->
                        <div class="p-3 rounded-2xl glass-pill-inactive flex items-center justify-between gap-3 hover:bg-white/15 transition">
                            <div class="flex items-center gap-3 min-w-0 flex-1">
                                <img src="https://images.unsplash.com/photo-1508700115892-45ecd05ae2ad?w=120&auto=format&fit=crop&q=80" class="w-12 h-12 rounded-xl object-cover shrink-0" alt="">
                                <div class="min-w-0 flex-1">
                                    <p class="text-xs font-bold text-white truncate">Coke Studio & Hip-Hop</p>
                                    <p class="text-[10px] text-[#D6CFCB] truncate">Bandish (Jokhay), Pasoori, Downers At Dusk</p>
                                    <span class="inline-block mt-0.5 text-[9px] px-1.5 py-0.2 rounded bg-red-600/30 text-red-300 font-medium">4 Tracks • Synced Lyrics</span>
                                </div>
                            </div>
                            <button onclick="triggerPresetImport('coke-studio')" class="h-8 px-3 rounded-xl bg-red-600 hover:bg-red-500 text-white font-semibold text-[11px] shrink-0 transition flex items-center gap-1 shadow">
                                <span>Import</span>
                            </button>
                        </div>

                        <!-- Preset 2: Punjabi Heatwave -->
                        <div class="p-3 rounded-2xl glass-pill-inactive flex items-center justify-between gap-3 hover:bg-white/15 transition">
                            <div class="flex items-center gap-3 min-w-0 flex-1">
                                <img src="https://images.unsplash.com/photo-1470225620780-dba8ba36b745?w=120&auto=format&fit=crop&q=80" class="w-12 h-12 rounded-xl object-cover shrink-0" alt="">
                                <div class="min-w-0 flex-1">
                                    <p class="text-xs font-bold text-white truncate">YouTube Punjabi Heatwave</p>
                                    <p class="text-[10px] text-[#D6CFCB] truncate">Karan Aujla (Softly), Shubh (No Love)</p>
                                    <span class="inline-block mt-0.5 text-[9px] px-1.5 py-0.2 rounded bg-red-600/30 text-red-300 font-medium">2 Tracks • 320kbps</span>
                                </div>
                            </div>
                            <button onclick="triggerPresetImport('punjabi-heat')" class="h-8 px-3 rounded-xl bg-red-600 hover:bg-red-500 text-white font-semibold text-[11px] shrink-0 transition flex items-center gap-1 shadow">
                                <span>Import</span>
                            </button>
                        </div>

                        <!-- Preset 3: 24/7 Lofi Study Beats -->
                        <div class="p-3 rounded-2xl glass-pill-inactive flex items-center justify-between gap-3 hover:bg-white/15 transition">
                            <div class="flex items-center gap-3 min-w-0 flex-1">
                                <img src="https://images.unsplash.com/photo-1518609878373-06d740f60d8b?w=120&auto=format&fit=crop&q=80" class="w-12 h-12 rounded-xl object-cover shrink-0" alt="">
                                <div class="min-w-0 flex-1">
                                    <p class="text-xs font-bold text-white truncate">24/7 Lofi Chill Beats</p>
                                    <p class="text-[10px] text-[#D6CFCB] truncate">Tokyo Rain, Coffee & Sunset Vinyl</p>
                                    <span class="inline-block mt-0.5 text-[9px] px-1.5 py-0.2 rounded bg-red-600/30 text-red-300 font-medium">2 Tracks • Ambient</span>
                                </div>
                            </div>
                            <button onclick="triggerPresetImport('lofi-chill')" class="h-8 px-3 rounded-xl bg-red-600 hover:bg-red-500 text-white font-semibold text-[11px] shrink-0 transition flex items-center gap-1 shadow">
                                <span>Import</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 11. REAL AUDIO TAG -->
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
        let isShuffle = false;
        let isRepeat = false;
        let activeCategory = 'All';
        let likeCount = 13420;
        let isLiked = false;
        let activeEngine = 'none'; // 'youtube' or 'html5'
        let ytPlayer = null;
        let ytReady = false;
        let pendingVideoId = null;

        // YouTube IFrame API Ready Callback
        window.onYouTubeIframeAPIReady = function() {
            try {
                ytPlayer = new YT.Player('ytPlayer', {
                    height: '100%',
                    width: '100%',
                    host: 'https://www.youtube-nocookie.com',
                    playerVars: {
                        'playsinline': 1,
                        'controls': 0,
                        'disablekb': 1,
                        'fs': 0,
                        'rel': 0,
                        'autoplay': 1,
                        'modestbranding': 1
                    },
                    events: {
                        'onReady': () => {
                            ytReady = true;
                            if (pendingVideoId) {
                                ytPlayer.loadVideoById(pendingVideoId);
                                ytPlayer.playVideo();
                                pendingVideoId = null;
                            }
                        },
                        'onStateChange': onYtStateChange,
                        'onError': onYtError
                    }
                });
            } catch (err) {
                console.error('YouTube Player Init Error:', err);
            }
        };

        function onYtError(event) {
            console.warn('YouTube playback error code:', event.data);
            const song = currentSong();
            if (song && song.video_id) {
                // Direct iframe embed fallback without SDK restrictions
                const iframe = document.querySelector('#ytPlayerWrapper iframe') || document.getElementById('ytPlayer');
                if (iframe) {
                    iframe.src = `https://www.youtube-nocookie.com/embed/${song.video_id}?autoplay=1&playsinline=1&controls=0&rel=0`;
                }
            }
        }

        function switchPlayerMode(mode) {
            const poster = document.getElementById('playerFullPoster');
            const ytWrap = document.getElementById('ytPlayerWrapper');
            const audioBtn = document.getElementById('modeAudioBtn');
            const videoBtn = document.getElementById('modeVideoBtn');

            if (mode === 'video') {
                poster.classList.add('opacity-0');
                ytWrap.classList.remove('opacity-0', 'pointer-events-none');
                ytWrap.classList.add('opacity-100');
                audioBtn.className = 'px-3 py-1 rounded-full text-white/70 hover:text-white flex items-center gap-1 transition';
                videoBtn.className = 'px-3 py-1 rounded-full pill-active text-neutral-950 flex items-center gap-1 transition';
                showToast('Video Mode: ON');
            } else {
                poster.classList.remove('opacity-0');
                ytWrap.classList.add('opacity-0', 'pointer-events-none');
                ytWrap.classList.remove('opacity-100');
                audioBtn.className = 'px-3 py-1 rounded-full pill-active text-neutral-950 flex items-center gap-1 transition';
                videoBtn.className = 'px-3 py-1 rounded-full text-white/70 hover:text-white flex items-center gap-1 transition';
                showToast('Song Mode: Audio & Poster');
            }
        }

        function onYtStateChange(event) {
            if (event.data === YT.PlayerState.PLAYING) {
                isPlaying = true;
                updatePlayIcons();
            } else if (event.data === YT.PlayerState.PAUSED) {
                isPlaying = false;
                updatePlayIcons();
            } else if (event.data === YT.PlayerState.ENDED) {
                if (isRepeat) {
                    ytPlayer.seekTo(0);
                    ytPlayer.playVideo();
                } else {
                    nextTrack();
                }
            }
        }

        function onYtError(event) {
            const song = currentSong();
            if (song && song.audio) {
                playHtml5Audio(song);
            }
        }

        function currentSong() {
            return songs[currentTrackIndex] || songs[0];
        }

        function playSongById(id) {
            const index = songs.findIndex(s => s.id === id);
            if (index !== -1) {
                playTrack(index);
                openNowPlayingModal();
            }
        }

        function playTrack(index) {
            if (index < 0 || index >= songs.length) return;
            closeLyricsSheet();
            currentTrackIndex = index;
            const song = songs[index];

            // Update mini status
            document.getElementById('miniStatusText').textContent = song.title;

            // Update full player (SS 3 full-bleed poster)
            document.getElementById('playerFullPoster').src = song.cover;
            document.getElementById('modalTrackTitle').textContent = song.title;
            document.getElementById('modalTrackArtist').textContent = song.artist + (song.genre ? ' • ' + song.genre : '');
            document.getElementById('playerTopCategoryTag').textContent = song.genre ? song.genre.toUpperCase() : 'NOW PLAYING';
            document.getElementById('totalDurationLabel').textContent = song.duration || '3:30';

            // Update lyrics preview & sheet
            document.getElementById('lyricsTrackTitle').textContent = song.title;
            document.getElementById('lyricsMiniTitle').textContent = song.title;
            document.getElementById('lyricsMiniArtist').textContent = song.artist;
            document.getElementById('lyricsMiniCover').src = song.cover;
            renderLyrics(song);

            // REAL YOUTUBE AUDIO ENGINE:
            if (song.video_id) {
                activeEngine = 'youtube';
                audio.pause();
                audio.currentTime = 0;

                if (ytReady && ytPlayer && typeof ytPlayer.loadVideoById === 'function') {
                    ytPlayer.loadVideoById(song.video_id);
                    ytPlayer.playVideo();
                    isPlaying = true;
                    updatePlayIcons();
                } else {
                    pendingVideoId = song.video_id;
                    const iframe = document.querySelector('#ytPlayerWrapper iframe') || document.getElementById('ytPlayer');
                    if (iframe && iframe.tagName === 'IFRAME') {
                        iframe.src = `https://www.youtube-nocookie.com/embed/${song.video_id}?autoplay=1&playsinline=1&controls=0&rel=0&enablejsapi=1`;
                    }
                    isPlaying = true;
                    updatePlayIcons();
                }
            } else if (song.audio) {
                playHtml5Audio(song);
            }

            // Highlight in track list
            document.querySelectorAll('.song-title').forEach(el => el.classList.remove('text-[#F04E23]'));
            const activeTitle = document.querySelector(`[onclick="playSongById(${song.id})"] .song-title`);
            if (activeTitle) activeTitle.classList.add('text-[#F04E23]');

            fetch(`/api/v1/songs/${song.id}/play`, { method: 'POST', headers: { 'Accept': 'application/json' } }).catch(() => {});
            showToast(`Playing: ${song.title}`);
        }

        function playHtml5Audio(song) {
            if (!song || !song.audio) return;
            if (ytPlayer && ytReady) {
                try { ytPlayer.pauseVideo(); } catch (e) {}
            }
            activeEngine = 'html5';
            audio.src = song.audio;
            audio.play().then(() => {
                isPlaying = true;
                updatePlayIcons();
            }).catch(() => {
                isPlaying = false;
                updatePlayIcons();
            });
        }

        function togglePlayPause() {
            if (activeEngine === 'youtube' && ytPlayer && ytReady) {
                try {
                    const state = ytPlayer.getPlayerState();
                    if (state === YT.PlayerState.PLAYING) {
                        ytPlayer.pauseVideo();
                        isPlaying = false;
                    } else {
                        ytPlayer.playVideo();
                        isPlaying = true;
                    }
                } catch (e) {
                    playHtml5Audio(currentSong());
                }
                updatePlayIcons();
            } else if (audio.src) {
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
            const lyricsIcon = document.getElementById('lyricsPlayIcon');
            const eq = document.getElementById('headerEq');

            const playSvg = '<path d="M8 5v14l11-7z"/>';
            const pauseSvg = '<path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z"/>';

            if (isPlaying) {
                icon.innerHTML = pauseSvg;
                if (lyricsIcon) lyricsIcon.innerHTML = pauseSvg;
                eq.classList.remove('paused-eq');
            } else {
                icon.innerHTML = playSvg;
                if (lyricsIcon) lyricsIcon.innerHTML = playSvg;
                eq.classList.add('paused-eq');
            }
        }

        function nextTrack() {
            if (isShuffle) {
                currentTrackIndex = Math.floor(Math.random() * songs.length);
            } else {
                currentTrackIndex = (currentTrackIndex + 1) % songs.length;
            }
            playTrack(currentTrackIndex);
        }

        function prevTrack() {
            currentTrackIndex = (currentTrackIndex - 1 + songs.length) % songs.length;
            playTrack(currentTrackIndex);
        }

        function toggleShuffle() {
            isShuffle = !isShuffle;
            const btn = document.getElementById('shuffleBtn');
            btn.classList.toggle('text-[#F04E23]', isShuffle);
            btn.classList.toggle('text-white/60', !isShuffle);
            showToast(isShuffle ? 'Shuffle: ON' : 'Shuffle: OFF');
        }

        function toggleRepeat() {
            isRepeat = !isRepeat;
            const btn = document.getElementById('repeatBtn');
            btn.classList.toggle('text-[#F04E23]', isRepeat);
            btn.classList.toggle('text-white/60', !isRepeat);
            showToast(isRepeat ? 'Repeat: ON' : 'Repeat: OFF');
        }

        // Live Playback Scrubber & Timer loop
        setInterval(() => {
            let curr = 0;
            let dur = 0;

            if (activeEngine === 'youtube' && ytPlayer && ytReady) {
                try {
                    curr = ytPlayer.getCurrentTime() || 0;
                    dur = ytPlayer.getDuration() || 0;
                } catch(e) {}
            } else if (activeEngine === 'html5' && audio.duration) {
                curr = audio.currentTime;
                dur = audio.duration;
            }

            if (dur > 0) {
                const percent = (curr / dur) * 100;
                document.getElementById('audioScrubber').value = percent;
                const mins = Math.floor(curr / 60);
                const secs = String(Math.floor(curr % 60)).padStart(2, '0');
                document.getElementById('currentTimeLabel').textContent = `${mins}:${secs}`;
                
                const totalMins = Math.floor(dur / 60);
                const totalSecs = String(Math.floor(dur % 60)).padStart(2, '0');
                document.getElementById('totalDurationLabel').textContent = `${totalMins}:${totalSecs}`;

                syncLyrics(curr);
            }
        }, 300);

        audio.addEventListener('ended', () => {
            if (isRepeat) {
                audio.currentTime = 0;
                audio.play();
            } else {
                nextTrack();
            }
        });

        function seekAudio(val) {
            if (activeEngine === 'youtube' && ytPlayer && ytReady) {
                try {
                    const dur = ytPlayer.getDuration();
                    if (dur > 0) {
                        ytPlayer.seekTo((val / 100) * dur, true);
                    }
                } catch (e) {}
            } else if (audio.duration) {
                audio.currentTime = (val / 100) * audio.duration;
            }
        }

        function filterByPlaylist(title, el) {
            const cleanTitle = title.toLowerCase();
            let count = 0;
            document.querySelectorAll('.song-item').forEach(item => {
                const album = item.dataset.album || '';
                const search = item.dataset.search || '';
                const match = album.includes(cleanTitle) || search.includes(cleanTitle);
                item.classList.toggle('hidden', !match);
                if (match) count++;
            });
            const countLabel = document.getElementById('songsCountLabel');
            if (countLabel) countLabel.textContent = `${count} tracks`;
            showToast(`Playlist: ${title} (${count} songs)`);
            const listSection = document.getElementById('songListContainer');
            if (listSection) listSection.scrollIntoView({ behavior: 'smooth' });
        }

        // ==============================================================
        // LYRICS SYNCHRONIZATION & SWIPE-UP ENGINE
        // ==============================================================
        function renderLyrics(song) {
            const container = document.getElementById('lyricsLinesContainer');
            container.innerHTML = '';
            const lyricsList = song.lyrics || [];

            if (lyricsList.length === 0) {
                container.innerHTML = `
                    <div class="py-20 text-[#8C827D]">
                        <p class="text-base font-medium">No official lyrics available</p>
                        <p class="text-xs mt-1">Enjoy the instrumental melody</p>
                    </div>
                `;
                document.getElementById('lyricsTeaserLine').textContent = 'Lyrics not available';
                return;
            }

            lyricsList.forEach((line, idx) => {
                const p = document.createElement('p');
                p.id = `lyricsLine-${idx}`;
                p.dataset.time = line.time;
                p.className = 'lyrics-line text-lg font-bold text-white/40 transition-all duration-300 cursor-pointer hover:text-white/80 py-1';
                p.textContent = line.text;
                p.onclick = () => {
                    audio.currentTime = line.time;
                    if (audio.paused) togglePlayPause();
                };
                container.appendChild(p);
            });

            document.getElementById('lyricsTeaserLine').textContent = lyricsList[0].text;
        }

        function syncLyrics(currTime) {
            const song = currentSong();
            const lyrics = song.lyrics || [];
            if (lyrics.length === 0) return;

            let activeIndex = -1;
            for (let i = 0; i < lyrics.length; i++) {
                if (currTime >= lyrics[i].time) {
                    activeIndex = i;
                } else {
                    break;
                }
            }

            if (activeIndex !== -1) {
                const sheet = document.getElementById('lyricsSheet');
                const isSheetOpen = !sheet.classList.contains('translate-y-full');

                document.querySelectorAll('.lyrics-line').forEach((el, idx) => {
                    if (idx === activeIndex) {
                        el.className = 'lyrics-line text-2xl font-black text-[#F04E23] scale-105 transition-all duration-300 py-1 drop-shadow-lg';
                        if (isSheetOpen) {
                            el.scrollIntoView({ behavior: 'smooth', block: 'center' });
                        }
                    } else if (idx < activeIndex) {
                        el.className = 'lyrics-line text-base font-semibold text-white/50 transition-all duration-300 py-1';
                    } else {
                        el.className = 'lyrics-line text-lg font-bold text-white/30 transition-all duration-300 py-1';
                    }
                });

                document.getElementById('lyricsTeaserLine').textContent = lyrics[activeIndex].text;
            }
        }

        function openLyricsSheet() {
            document.getElementById('lyricsSheet').classList.remove('translate-y-full');
            syncLyrics(audio.currentTime);
        }

        function closeLyricsSheet() {
            document.getElementById('lyricsSheet').classList.add('translate-y-full');
        }

        // Swipe-up listener specifically on the lyrics teaser bar
        let touchStartY = 0;
        const lyricsTeaser = document.getElementById('lyricsTeaserTrigger');
        lyricsTeaser.addEventListener('touchstart', (e) => {
            touchStartY = e.touches[0].clientY;
        }, { passive: true });

        lyricsTeaser.addEventListener('touchend', (e) => {
            const touchEndY = e.changedTouches[0].clientY;
            const diff = touchStartY - touchEndY;
            // Swiped UP more than 30px on the teaser bar -> Open lyrics
            if (diff > 30) {
                openLyricsSheet();
            }
        }, { passive: true });

        // Touch drag-down on lyrics sheet to close
        const lyricsSheet = document.getElementById('lyricsSheet');
        lyricsSheet.addEventListener('touchstart', (e) => {
            touchStartY = e.touches[0].clientY;
        }, { passive: true });

        lyricsSheet.addEventListener('touchend', (e) => {
            const touchEndY = e.changedTouches[0].clientY;
            const diff = touchEndY - touchStartY;
            // Swiped DOWN more than 60px -> Close lyrics
            if (diff > 60) {
                closeLyricsSheet();
            }
        }, { passive: true });

        // ==============================================================
        // OTHER CONTROLS & INTERACTIONS
        // ==============================================================
        function toggleFavorite() {
            isLiked = !isLiked;
            const heart = document.getElementById('heartIcon');
            const btn = document.getElementById('favoriteBtn');
            if (isLiked) {
                btn.classList.add('text-[#F04E23]');
                btn.classList.remove('text-white');
                showToast('Added to Liked Songs ❤️');
            } else {
                btn.classList.remove('text-[#F04E23]');
                btn.classList.add('text-white');
                showToast('Removed from Liked Songs');
            }
        }

        function toggleLikeCounter() {
            likeCount++;
            document.getElementById('likeCountText').textContent = (likeCount / 1000).toFixed(1) + 'K';
            document.getElementById('likeCounterBtn').classList.toggle('pill-active');
            showToast('You liked this song 👍');
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
            const input = document.getElementById('searchInput');
            const term = input.value.trim().toLowerCase();
            const clearBtn = document.getElementById('clearSearchBtn');
            if (clearBtn) {
                clearBtn.classList.toggle('hidden', term.length === 0);
            }

            let count = 0;
            document.querySelectorAll('.song-item').forEach(item => {
                const matchGenre = (activeCategory === 'All' || item.dataset.genre === activeCategory);
                const matchSearch = item.dataset.search.includes(term);
                const visible = matchGenre && matchSearch;
                item.classList.toggle('hidden', !visible);
                if (visible) count++;
            });
            const countLabel = document.getElementById('songsCountLabel');
            if (countLabel) countLabel.textContent = `${count} tracks`;
            const noSongs = document.getElementById('noSongsFound');
            if (noSongs) noSongs.classList.toggle('hidden', count > 0);
        }

        document.getElementById('searchInput').addEventListener('input', filterTracks);

        function handleSearchBtnClick() {
            const input = document.getElementById('searchInput');
            if (input.value.trim().length > 0) {
                filterTracks();
                showToast(`Searching for "${input.value}"`);
            } else {
                input.focus();
            }
        }

        function clearSearch() {
            const input = document.getElementById('searchInput');
            input.value = '';
            const clearBtn = document.getElementById('clearSearchBtn');
            if (clearBtn) clearBtn.classList.add('hidden');
            filterTracks();
            input.focus();
        }

        function focusSearch() {
            document.getElementById('searchInput').focus();
        }

        function openImportModal() {
            const modal = document.getElementById('importModal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeImportModal() {
            const modal = document.getElementById('importModal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }

        function importCustomYouTubeUrl() {
            const input = document.getElementById('ytPlaylistInput');
            const url = input.value.trim();
            if (!url) {
                showToast('Please enter a YouTube playlist URL');
                input.focus();
                return;
            }
            executeImport(null, url);
        }

        function triggerPresetImport(preset) {
            executeImport(preset, null);
        }

        async function executeImport(preset, url) {
            const btn = document.getElementById('btnStartImport');
            const btnText = document.getElementById('importBtnText');
            const btnSpinner = document.getElementById('importBtnSpinner');
            const progressBox = document.getElementById('importProgressBox');
            const progressBar = document.getElementById('importProgressBar');
            const statusText = document.getElementById('importStatusText');
            const percentText = document.getElementById('importPercentText');

            // UI Loading state
            btn.disabled = true;
            btnText.textContent = 'Importing...';
            btnSpinner.classList.remove('hidden');
            progressBox.classList.remove('hidden');

            progressBar.style.width = '20%';
            percentText.textContent = '20%';
            statusText.textContent = 'Connecting to YouTube Music server...';

            setTimeout(() => {
                progressBar.style.width = '55%';
                percentText.textContent = '55%';
                statusText.textContent = 'Parsing playlist tracks, covers & lyrics...';
            }, 600);

            try {
                const response = await fetch('/api/v1/import/youtube', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({ preset: preset, playlist_url: url })
                });

                const data = await response.json();

                progressBar.style.width = '100%';
                percentText.textContent = '100%';
                statusText.textContent = '✓ Successfully imported to Element Library!';

                if (data.status === 'success' && data.tracks && data.tracks.length > 0) {
                    // Update or display Playlists section
                    if (data.playlist) {
                        const plSection = document.getElementById('playlistsSection');
                        if (plSection) plSection.classList.remove('hidden');
                        const plContainer = document.getElementById('playlistsContainer');
                        if (plContainer) {
                            const plDiv = document.createElement('div');
                            plDiv.className = 'playlist-card relative w-[190px] h-[135px] rounded-[24px] overflow-hidden shrink-0 snap-start cursor-pointer group shadow-xl border border-white/10 bg-[#1A100C]';
                            plDiv.onclick = () => filterByPlaylist(data.playlist.title, plDiv);
                            plDiv.innerHTML = `
                                <img src="${data.playlist.cover_url}" class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" alt="${data.playlist.title}">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/95 via-black/40 to-transparent"></div>
                                <div class="absolute top-2.5 right-2.5 w-7 h-7 rounded-full bg-red-600/90 text-white flex items-center justify-center shadow-lg">
                                    <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="currentColor"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                                </div>
                                <div class="absolute bottom-2.5 left-3 right-3">
                                    <h3 class="text-[13px] font-bold text-white truncate drop-shadow">${data.playlist.title}</h3>
                                    <p class="text-[11px] text-[#D6CFCB] font-medium truncate mt-0.5">${data.playlist.tracks_count} tracks • Live Sync</p>
                                </div>
                            `;
                            plContainer.insertBefore(plDiv, plContainer.firstChild);
                        }
                    }

                    // Hide empty banner if present
                    const emptyBanner = document.getElementById('emptyImportBanner');
                    if (emptyBanner) emptyBanner.classList.add('hidden');

                    // Prepend tracks into live songs queue
                    data.tracks.forEach(t => {
                        const existingIdx = songs.findIndex(s => s.id === t.id);
                        if (existingIdx !== -1) {
                            songs[existingIdx] = t;
                        } else {
                            songs.unshift(t);

                            // Add to DOM list
                            const li = document.createElement('li');
                            li.dataset.genre = t.genre;
                            li.dataset.album = (t.album || '').toLowerCase();
                            li.dataset.search = (t.title + ' ' + t.artist + ' ' + (t.album || '')).toLowerCase();
                            li.className = 'song-item animate-pulse';
                            li.innerHTML = `
                                <button onclick="playSongById(${t.id})" class="w-full flex items-center justify-between p-2.5 rounded-2xl glass-pill-inactive text-left transition hover:bg-white/15 border-l-2 border-red-500">
                                    <div class="flex items-center gap-3 min-w-0 flex-1">
                                        <img src="${t.cover}" class="w-12 h-12 rounded-xl object-cover shrink-0" alt="">
                                        <div class="min-w-0 flex-1">
                                            <p class="song-title text-sm font-semibold text-white truncate">${t.title}</p>
                                            <p class="text-xs text-[#D6CFCB] truncate">${t.artist} • <span class="text-red-400">YouTube</span></p>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-3 shrink-0 ml-2">
                                        <span class="text-xs text-[#8C827D]">${t.duration}</span>
                                        <span class="w-8 h-8 rounded-full bg-red-600/30 text-red-400 flex items-center justify-center">
                                            <svg class="w-3.5 h-3.5 ml-0.5" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                        </span>
                                    </div>
                                </button>
                            `;
                            const list = document.getElementById('songListContainer');
                            list.insertBefore(li, list.firstChild);
                        }
                    });

                    document.getElementById('songsCountLabel').textContent = `${songs.length} tracks`;
                    showToast(`🎉 Imported ${data.tracks.length} tracks from YouTube!`);

                    setTimeout(() => {
                        closeImportModal();
                        // Play the first imported song immediately!
                        playSongById(data.tracks[0].id);
                    }, 1200);
                } else {
                    showToast('Failed to parse playlist');
                }
            } catch (err) {
                showToast('Import error: Check network connection');
            } finally {
                setTimeout(() => {
                    btn.disabled = false;
                    btnText.textContent = 'Import Playlist Now';
                    btnSpinner.classList.add('hidden');
                    progressBox.classList.add('hidden');
                    progressBar.style.width = '0%';
                }, 1500);
            }
        }

        function openNowPlayingModal() {
            document.getElementById('nowPlayingModal').classList.remove('translate-y-full');
        }

        function closeNowPlayingModal() {
            document.getElementById('nowPlayingModal').classList.add('translate-y-full');
            closeLyricsSheet();
        }

        function toggleSettingsModal() {
            const modal = document.getElementById('settingsModal');
            modal.classList.toggle('hidden');
            modal.classList.toggle('flex');
        }

        function switchNavTab(tab, el) {
            showToast(`${tab} tab active`);
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

        // Initialize first song
        if (songs.length > 0) {
            const s = songs[0];
            document.getElementById('miniStatusText').textContent = s.title;
            document.getElementById('playerFullPoster').src = s.cover;
            document.getElementById('modalTrackTitle').textContent = s.title;
            document.getElementById('modalTrackArtist').textContent = s.artist;
            document.getElementById('playerTopCategoryTag').textContent = s.genre ? s.genre.toUpperCase() : 'TOP HITS';
            document.getElementById('totalDurationLabel').textContent = s.duration || '3:30';
            document.getElementById('lyricsTrackTitle').textContent = s.title;
            document.getElementById('lyricsMiniTitle').textContent = s.title;
            document.getElementById('lyricsMiniArtist').textContent = s.artist;
            document.getElementById('lyricsMiniCover').src = s.cover;
            renderLyrics(s);
            updatePlayIcons();
        }
    </script>
</body>
</html>
