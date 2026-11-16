<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="theme-color" content="#F04E23">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <link rel="manifest" href="/manifest.json">
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

        @keyframes heartBounce {
            0% { transform: scale(1); }
            35% { transform: scale(1.4); }
            65% { transform: scale(0.9); }
            100% { transform: scale(1); }
        }
        .animate-heart-bounce {
            animation: heartBounce 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            20%, 60% { transform: translateX(-6px); }
            40%, 80% { transform: translateX(6px); }
        }
        .animate-shake {
            animation: shake 0.35s ease-in-out;
        }
    </style>
</head>
<body class="min-h-screen bg-[#050302]">

    <div class="relative mx-auto min-h-screen max-w-md overflow-hidden app-surface-bg flex flex-col justify-between shadow-2xl pb-44">

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

            <!-- Profile Avatar (Clickable: DP Changer Only) -->
            <button id="headerProfileAvatarBtn" onclick="openDpModal()" class="relative group cursor-pointer focus:outline-none transition active:scale-95" aria-label="Change Profile Picture" title="Change Profile Picture">
                <img id="headerProfileAvatar" src="https://images.unsplash.com/photo-1599566150163-29194dcaad36?w=100&auto=format&fit=crop&q=80" class="w-10 h-10 rounded-full object-cover ring-2 ring-white/30 group-hover:ring-[#F04E23] transition-all shadow-md" alt="Profile">
                <span class="absolute bottom-0 right-0 w-3 h-3 rounded-full bg-[#F04E23] ring-2 ring-[#0D0705]"></span>
            </button>
        </header>

        <!-- 2. SCROLLABLE MAIN HOMEPAGE CONTENT -->
        <main id="homeView" class="flex-1 overflow-y-auto no-scrollbar pt-2 px-5">

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

            <!-- 3. "TO GET YOU STARTED" HERO CAROUSEL / EMPTY STATE -->
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
            @endif

            <!-- 4. "POPULAR SONGS" SECTION -->
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

            <!-- 4.5 SUGGESTED PLAYLIST SPOTLIGHT BANNER -->
            @if ($suggestedPlaylist)
                <section class="mt-6" id="suggestedPlaylistBanner">
                    <div class="mb-3 flex items-center justify-between">
                        <h2 class="text-[19px] font-semibold tracking-tight text-white">Suggested For You</h2>
                        <span class="text-[10px] font-bold uppercase tracking-wider px-2 py-0.5 rounded-full bg-[#F04E23]/20 text-[#F04E23] border border-[#F04E23]/30">Curated</span>
                    </div>

                    <div class="relative w-full rounded-[28px] overflow-hidden p-5 border border-white/15 shadow-2xl bg-gradient-to-br from-[#2D160D] via-[#1A0E08] to-[#0D0705] group">
                        <img src="{{ $suggestedPlaylist->cover_url }}" class="absolute -right-6 -top-6 -bottom-6 w-1/2 object-cover opacity-40 pointer-events-none transition-transform duration-700 group-hover:scale-105" alt="">
                        <div class="absolute inset-0 bg-gradient-to-r from-[#140B07] via-[#140B07]/80 to-transparent pointer-events-none"></div>

                        <div class="relative z-10 max-w-[75%]">
                            <div class="flex items-center gap-2 mb-2">
                                <span class="px-2.5 py-0.5 rounded-full text-[10px] font-black uppercase tracking-wider bg-[#F04E23] text-neutral-950">🔥 Featured Playlist</span>
                                <span class="text-[11px] text-[#D6CFCB] font-medium">{{ $suggestedPlaylist->songs->count() ?: $suggestedPlaylist->tracks_count }} tracks</span>
                            </div>
                            <h3 class="text-[20px] font-extrabold text-white leading-tight tracking-tight drop-shadow">{{ $suggestedPlaylist->title }}</h3>
                            <p class="text-[12px] text-[#D6CFCB] mt-1 line-clamp-1">Trending viral hits, high-energy rhythms, and complete collection</p>

                            <div class="mt-4 flex items-center gap-2.5">
                                <button onclick="playPlaylistTracks('{{ addslashes($suggestedPlaylist->title) }}')" class="h-10 px-5 rounded-full pill-active text-neutral-950 text-xs font-bold flex items-center gap-2 shadow-xl active:scale-95 transition">
                                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                    Play Playlist
                                </button>
                                <button onclick="filterByPlaylist('{{ addslashes($suggestedPlaylist->title) }}', this)" class="h-10 px-4 rounded-full glass-pill-inactive text-xs font-medium text-white hover:bg-white/15 transition">
                                    View Tracks
                                </button>
                                <button id="spotlightPlDlBtn-{{ $suggestedPlaylist->id }}" onclick="toggleDownloadPlaylist({{ $suggestedPlaylist->id }}, '{{ addslashes($suggestedPlaylist->title) }}')" class="h-10 px-4 rounded-full glass-pill-inactive text-xs font-medium text-white hover:bg-white/15 transition flex items-center gap-1.5" title="Download for Offline">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                                    <span class="pl-dl-label">Download</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </section>
            @endif

            <!-- 5. FEATURED PLAYLISTS SECTION -->
            @if ($playlists->count() > 0)
                <section class="mt-6" id="playlistsSection">
                    <div class="mb-3 flex items-center justify-between">
                        <h2 class="text-[19px] font-semibold tracking-tight text-white">Featured Playlists</h2>
                        <span class="text-[12px] font-medium text-[#8C827D]">{{ $playlists->count() }} Playlists</span>
                    </div>

                    <div class="flex items-center gap-3.5 overflow-x-auto no-scrollbar snap-x snap-mandatory pb-1" id="playlistsContainer">
                        @foreach ($playlists as $pl)
                            <div onclick="openPlaylistFromHomepage('{{ addslashes($pl->title) }}')" class="playlist-card relative w-[190px] h-[135px] rounded-[24px] overflow-hidden shrink-0 snap-start cursor-pointer group shadow-xl border border-white/10 bg-[#1A100C]" data-playlist-title="{{ strtolower($pl->title) }}">
                                <img src="{{ $pl->cover_url }}" class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" alt="{{ $pl->title }}">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/95 via-black/40 to-transparent"></div>

                                <div class="absolute top-2.5 right-2.5 flex items-center gap-1.5">
                                    <button id="plCardDlBtn-{{ $pl->id }}" onclick="event.stopPropagation(); toggleDownloadPlaylist({{ $pl->id }}, '{{ addslashes($pl->title) }}')" class="w-7 h-7 rounded-full bg-black/60 backdrop-blur-md text-white/80 hover:text-white flex items-center justify-center shadow-lg transition active:scale-95" title="Download Playlist for Offline">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                                    </button>
                                    <div class="w-7 h-7 rounded-full bg-[#F04E23]/90 text-white flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform">
                                        <svg class="w-3.5 h-3.5 ml-0.5" viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg>
                                    </div>
                                </div>

                                <div class="absolute bottom-2.5 left-3 right-3">
                                    <h3 class="text-[13px] font-bold text-white truncate drop-shadow">{{ $pl->title }}</h3>
                                    <p class="playlist-tracks-count text-[11px] text-[#D6CFCB] font-medium truncate mt-0.5">{{ $pl->songs->count() ?: $pl->tracks_count }} tracks</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </section>
            @endif

            <!-- 6. ALL SONGS LIST -->
            <section class="mt-6 mb-4">
                <div class="mb-3 flex items-center justify-between">
                    <div>
                        <div class="flex items-center gap-2">
                            <h2 id="songsSectionTitle" class="text-[19px] font-semibold tracking-tight text-white">All Tracks</h2>
                            <button id="clearPlaylistFilterBtn" onclick="clearPlaylistFilter()" class="hidden px-2.5 py-0.5 rounded-full bg-white/10 hover:bg-white/20 text-[11px] font-semibold text-[#F04E23] flex items-center gap-1 transition" title="Clear filter and show all tracks">
                                <span>Show All</span>
                                <span class="text-white/60">✕</span>
                            </button>
                        </div>
                        <span id="songsCountLabel" class="text-[12px] font-medium text-[#8C827D]">{{ $allSongs->count() }} tracks</span>
                    </div>
                    <!-- Instant Shuffle All Button -->
                    <button onclick="shuffleAllTracks()" class="h-8 px-3.5 rounded-full pill-active flex items-center gap-1.5 text-xs font-bold text-neutral-950 shadow-lg active:scale-95 transition" title="Shuffle All Songs">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 3h5v5M4 20L21 3M21 16v5h-5M15 15l6 6M4 4l5 5"/>
                        </svg>
                        <span>Shuffle</span>
                    </button>
                </div>

                <ul class="space-y-2.5" id="songListContainer">
                    @foreach ($allSongs as $song)
                        <li data-id="{{ $song->id }}" data-genre="{{ $song->genre }}" data-album="{{ strtolower($song->album_name ?? '') }}" data-playlists="{{ strtolower($song->playlists->pluck('title')->join(',')) }}" data-search="{{ strtolower($song->title.' '.$song->artist_name.' '.($song->album_name ?? '')) }}" class="song-item">
                            <button onclick="playSongById({{ $song->id }})" class="w-full flex items-center justify-between p-2.5 rounded-2xl glass-pill-inactive text-left transition hover:bg-white/15">
                                <div class="flex items-center gap-3 min-w-0 flex-1">
                                    <img src="{{ $song->cover_url }}" class="w-12 h-12 rounded-xl object-cover shrink-0" alt="">
                                    <div class="min-w-0 flex-1">
                                        <p class="song-title text-sm font-semibold text-white truncate">{{ $song->title }}</p>
                                        <p class="text-xs text-[#D6CFCB] truncate">{{ $song->artist_name }} • {{ $song->genre }}</p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-2.5 shrink-0 ml-2">
                                    <span class="text-xs text-[#8C827D]">{{ $song->formatted_duration }}</span>
                                    <span id="songDlBtn-{{ $song->id }}" onclick="event.stopPropagation(); toggleDownloadSong({{ $song->id }})" class="w-8 h-8 rounded-full bg-white/10 hover:bg-white/20 text-white/70 hover:text-white flex items-center justify-center transition active:scale-90" title="Download for Offline Playback">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                                    </span>
                                    <span class="w-8 h-8 rounded-full bg-white/10 flex items-center justify-center text-white">
                                        <svg class="w-3.5 h-3.5 ml-0.5" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                    </span>
                                </div>
                            </button>
                        </li>
                    @endforeach
                </ul>
                <p id="noSongsFound" class="hidden text-center py-8 text-sm text-[#8C827D]">No Result Found</p>
            </section>

        </main>

        <!-- 6.5 FLOATING HOMEPAGE MINI PLAYER (Always accessible right above dock) -->
        <div id="homepageMiniPlayer" onclick="openNowPlayingModal()" class="fixed bottom-[86px] left-1/2 -translate-x-1/2 w-[calc(100%-32px)] max-w-[416px] h-[58px] rounded-2xl liquid-glass-search px-3 flex items-center justify-between z-30 cursor-pointer shadow-2xl transition-all duration-300 hover:scale-[1.01]">
            <div class="flex items-center gap-3 min-w-0 flex-1">
                <img id="hpMiniCover" src="{{ $allSongs->first()?->cover_url }}" class="w-10 h-10 rounded-xl object-cover ring-1 ring-white/20 shrink-0" alt="">
                <div class="min-w-0 flex-1">
                    <p id="hpMiniTitle" class="text-[13px] font-bold text-white truncate">{{ $allSongs->first()?->title ?? 'Select a Song' }}</p>
                    <p id="hpMiniArtist" class="text-[11px] text-[#D6CFCB] font-medium truncate">{{ $allSongs->first()?->artist_name ?? 'Element Music' }}</p>
                </div>
            </div>
            <div class="flex items-center gap-1.5 shrink-0 ml-2" onclick="event.stopPropagation()">
                <button onclick="prevTrack()" class="w-8 h-8 rounded-full flex items-center justify-center text-white/80 hover:text-white transition active:scale-90" aria-label="Previous">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M6 6h2v12H6zm3.5 6l8.5 6V6z"/></svg>
                </button>
                <button onclick="togglePlayPause()" class="w-10 h-10 rounded-full pill-active flex items-center justify-center text-neutral-950 shadow-lg transition active:scale-90" aria-label="Play/Pause">
                    <svg id="hpMiniPlayIcon" class="w-5 h-5 ml-0.5" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                </button>
                <button onclick="nextTrack()" class="w-8 h-8 rounded-full flex items-center justify-center text-white/80 hover:text-white transition active:scale-90" aria-label="Next">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M6 18l8.5-6L6 6v12zM16 6v12h2V6h-2z"/></svg>
                </button>
            </div>
        </div>

        <!-- 7. FLOATING BOTTOM NAVIGATION DOCK -->
        <nav aria-label="Bottom Navigation" class="fixed bottom-4 left-1/2 -translate-x-1/2 w-[calc(100%-32px)] max-w-[416px] h-[68px] rounded-full bottom-nav-dock px-3 flex items-center justify-between z-30">
            <!-- Home Tab Button -->
            <button id="navTabHome" onclick="navigateToTab('Home')" class="h-[50px] px-5 rounded-full pill-active flex items-center gap-2 shrink-0 transition-all duration-300">
                <svg class="w-[18px] h-[18px]" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 3.2L4 9.6V20.5C4 21.05 4.45 21.5 5 21.5H19C19.55 21.5 20 21.05 20 20.5V9.6L12 3.2Z"/>
                </svg>
                <span id="navTabHomeLabel" class="text-[14px] font-semibold tracking-tight">Home</span>
            </button>

            <!-- Search Button -->
            <button onclick="focusSearch();" aria-label="Search" class="w-[50px] h-[50px] rounded-full dock-circle-btn flex items-center justify-center text-white/90 shrink-0 hover:text-white transition">
                <svg class="w-[20px] h-[20px]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <circle cx="11" cy="11" r="7"></circle>
                    <line x1="20" y1="20" x2="16.2" y2="16.2" stroke-linecap="round"></line>
                </svg>
            </button>

            <!-- Player Button -->
            <button onclick="openNowPlayingModal();" aria-label="Now Playing" class="w-[50px] h-[50px] rounded-full dock-circle-btn flex items-center justify-center text-white/90 shrink-0 hover:text-white transition">
                <svg class="w-[20px] h-[20px]" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="8"></circle>
                    <circle cx="12" cy="12" r="3"></circle>
                    <path d="M12 7a5 5 0 0 0-5 5" stroke-linecap="round"></path>
                </svg>
            </button>

            <!-- Playlists Tab Button (Orange pill when active) -->
            <button id="navTabPlaylists" onclick="navigateToTab('Playlists')" aria-label="Playlists" class="w-[50px] h-[50px] rounded-full dock-circle-btn flex items-center justify-center text-white/90 shrink-0 transition-all duration-300" title="Playlists">
                <svg class="w-[20px] h-[20px]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 18V5l12-2v13M9 9l12-2M9 18a3 3 0 1 1-6 0 3 3 0 0 1 6 0zm12-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                </svg>
                <span id="navTabPlaylistsLabel" class="hidden text-[14px] font-semibold tracking-tight">Playlists</span>
            </button>
        </nav>

        <!-- ============================================================== -->
        <!-- 7.5 PLAYLISTS PAGE VIEW (Plain List & Detail with Floating Play) -->
        <!-- ============================================================== -->
        <div id="playlistsView" class="hidden flex-1 overflow-y-auto no-scrollbar pt-2 px-5 pb-36">

            <!-- VIEW 1: Plain Playlists List (Plain rows without boxed cards) -->
            <div id="playlistsListSection">
                <div class="flex items-center justify-between pb-3 pt-2 mb-2 border-b border-white/10 shrink-0">
                    <div>
                        <h2 class="text-2xl font-black text-white tracking-tight">Playlists</h2>
                        <p class="text-xs text-[#8C827D] mt-0.5">{{ $playlists->count() }} Collections Available</p>
                    </div>
                    <button onclick="navigateToTab('Home')" class="w-9 h-9 rounded-full bg-white/10 hover:bg-white/20 active:scale-90 flex items-center justify-center text-white/80 hover:text-white transition" title="Back to Home">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>

                <!-- Plain List of Playlists (No heavy cards, plain sleek rows) -->
                <div class="space-y-1 py-1" id="plainPlaylistsContainer">
                    @foreach ($playlists as $pl)
                        <div onclick="openPlaylistDetail('{{ addslashes($pl->title) }}')"
                             class="flex items-center justify-between p-3 rounded-2xl hover:bg-white/5 active:bg-white/10 cursor-pointer group transition border-b border-white/5 select-none"
                             data-playlist-title="{{ strtolower($pl->title) }}">
                            <div class="flex items-center gap-3.5 min-w-0 flex-1">
                                <div class="relative w-14 h-14 rounded-2xl overflow-hidden shrink-0 ring-1 ring-white/10 shadow-lg group-hover:scale-105 transition-transform">
                                    <img src="{{ $pl->cover_url }}" class="w-full h-full object-cover" alt="{{ $pl->title }}">
                                    <div class="absolute inset-0 bg-black/30 opacity-0 group-hover:opacity-100 flex items-center justify-center transition-opacity text-white">
                                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                    </div>
                                </div>
                                <div class="min-w-0 flex-1 text-left">
                                    <h3 class="text-[15px] font-bold text-white group-hover:text-[#F04E23] transition-colors truncate">{{ $pl->title }}</h3>
                                    <p class="playlist-tracks-count text-xs text-[#8C827D] mt-0.5 truncate">{{ $pl->songs->count() ?: $pl->tracks_count }} tracks • Audio Playlist</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-2 shrink-0 ml-3 text-white/40 group-hover:text-[#F04E23] transition">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                                </svg>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- VIEW 2: Playlist Detail View (Shows tracks & Floating Play Button) -->
            <div id="playlistDetailSection" class="hidden">
                <!-- Top Nav Bar -->
                <div class="flex items-center justify-between py-2 mb-3 shrink-0">
                    <button onclick="closePlaylistDetail()" class="flex items-center gap-1.5 text-xs font-bold text-white/80 hover:text-white transition py-1.5 px-3 rounded-full bg-white/5 border border-white/10 active:scale-95">
                        <svg class="w-4 h-4 text-[#F04E23]" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
                        <span>All Playlists</span>
                    </button>
                    <button id="detailPlDownloadBtn" onclick="toggleDownloadCurrentPlaylist()" class="h-8 px-3 rounded-full bg-white/10 hover:bg-white/20 text-white/80 text-xs font-semibold flex items-center gap-1.5 transition active:scale-95" title="Download Entire Playlist">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                        <span id="detailPlDlLabel">Download</span>
                    </button>
                </div>

                <!-- Playlist Hero Banner -->
                <div class="flex items-center gap-4 p-4 rounded-3xl bg-white/5 border border-white/5 mb-4 shadow-xl">
                    <img id="detailPlCover" src="" class="w-20 h-20 rounded-2xl object-cover ring-1 ring-white/15 shrink-0 shadow-lg" alt="">
                    <div class="min-w-0 flex-1 text-left">
                        <span class="text-[10px] font-bold uppercase tracking-wider text-[#F04E23]">PLAYLIST</span>
                        <h2 id="detailPlTitle" class="text-lg font-black text-white truncate mt-0.5"></h2>
                        <p id="detailPlCount" class="text-xs text-[#8C827D] mt-1 font-medium"></p>
                    </div>
                </div>

                <!-- Tracks List -->
                <div class="space-y-1.5 pb-24" id="detailPlTracksList"></div>

                <!-- Floating Play Button (Bottom Right - Tap to play, Hold to shuffle) -->
                <button id="floatingPlaylistPlayBtn" class="fixed bottom-36 right-5 sm:right-[calc(50%-180px)] w-14 h-14 rounded-full pill-active text-neutral-950 shadow-2xl flex items-center justify-center transition active:scale-90 hover:scale-105 z-30 cursor-pointer select-none" title="Tap to Play • Hold to Shuffle Play">
                    <svg class="w-7 h-7 ml-0.5 fill-current" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                </button>
            </div>

        </div>

        <!-- ============================================================== -->
        <!-- 8. FULLSCREEN IMMERSIVE POSTER PLAYER DRAWER -->
        <!-- ============================================================== -->
        <div id="nowPlayingModal" class="fixed inset-0 max-w-md mx-auto bg-black z-40 translate-y-full transition-transform duration-500 ease-out flex flex-col justify-between overflow-hidden">

            <!-- FULL-BLEED BACKGROUND POSTER (Full Screen) -->
            <img id="playerFullPoster" src="{{ $allSongs->first()?->cover_url }}"
                 class="absolute inset-0 w-full h-full object-cover object-center filter brightness-95 transition-all duration-700 z-[1]" alt="Song Cover Poster">

            <!-- Vignette & Dark Gradient overlays so controls and text are completely clear -->
            <div class="absolute inset-0 bg-gradient-to-b from-black/60 via-black/20 to-black/95 pointer-events-none z-[2]"></div>

            <!-- TOP BAR -->
            <div class="relative z-10 w-full pt-6 pb-2 px-5 flex items-center justify-between shrink-0">
                <button onclick="closeNowPlayingModal()" class="w-10 h-10 rounded-full liquid-circle-btn flex items-center justify-center text-white transition active:scale-90" aria-label="Dismiss">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
                </button>

                <div class="px-3.5 py-1 rounded-full bg-white/10 border border-white/15 text-[11px] font-semibold text-white/90 uppercase tracking-wider backdrop-blur-md">
                    <span id="playerTopCategoryTag">Now Playing</span>
                </div>

                <button onclick="toggleSettingsModal()" class="w-10 h-10 rounded-full liquid-circle-btn flex items-center justify-center text-white transition active:scale-90" aria-label="Options">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><circle cx="5" cy="12" r="2"/><circle cx="12" cy="12" r="2"/><circle cx="19" cy="12" r="2"/></svg>
                </button>
            </div>

            <!-- MIDDLE SPACER -->
            <div class="relative z-10 flex-1 min-h-[140px]"></div>

            <!-- LOWER CONTROLS & FEATURES CARD -->
            <div class="relative z-10 w-full px-5 pb-8 shrink-0">

                <!-- Song Title & Artist Name with '>' link -->
                <div class="mb-3 flex items-center justify-between">
                    <div class="min-w-0 flex-1 pr-3">
                        <div class="flex items-center gap-1.5 cursor-pointer" onclick="showToast('Album: ' + currentSong().album)">
                            <h2 id="modalTrackTitle" class="text-[20px] font-extrabold text-white truncate tracking-tight drop-shadow-md">{{ $allSongs->first()?->title ?? 'Select a Song' }}</h2>
                            <svg class="w-4 h-4 text-white/70 shrink-0" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                        </div>
                        <p id="modalTrackArtist" class="text-[13px] font-medium text-[#D6CFCB] truncate mt-0.5 drop-shadow">{{ $allSongs->first()?->artist_name ?? 'Element Music' }}</p>
                    </div>

                    <!-- Heart Favorite Button -->
                    <button onclick="toggleFavorite()" id="favoriteBtn" class="w-10 h-10 rounded-full liquid-circle-btn flex items-center justify-center text-white shrink-0 transition active:scale-90" aria-label="Like">
                        <svg id="heartIcon" class="w-5 h-5 transition-transform text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                        </svg>
                    </button>
                </div>

                <!-- Feature Row: [Like 13K] [Dislike] [Lyrics] [Comments] [Save] -->
                <div class="flex items-center gap-2 overflow-x-auto no-scrollbar mb-3 py-0.5">
                    <button onclick="toggleLikeCounter()" id="likeCounterBtn" class="h-8 px-3 rounded-full glass-pill-inactive flex items-center gap-1.5 text-xs font-semibold shrink-0">
                        <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"/></svg>
                        <span id="likeCountText">13K</span>
                    </button>

                    <button onclick="showToast('Disliked')" class="h-8 px-2.5 rounded-full glass-pill-inactive flex items-center justify-center text-white shrink-0">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M10 15v4a3 3 0 0 0 3 3l4-9V2H5.72a2 2 0 0 0-2 1.7l-1.38 9a2 2 0 0 0 2 2.3zm7-13h3a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2h-3"/></svg>
                    </button>

                    <button onclick="openLyricsSheet()" class="h-8 px-3 rounded-full pill-active flex items-center gap-1.5 text-xs font-semibold shrink-0 shadow-lg">
                        <svg class="w-3.5 h-3.5 text-neutral-950" fill="currentColor" viewBox="0 0 24 24"><path d="M14 17h3l2-4V7h-6v6h3M6 17h3l2-4V7H5v6h3"/></svg>
                        <span>Lyrics</span>
                    </button>

                    <button onclick="openQueueSheet()" class="h-8 px-3 rounded-full glass-pill-inactive flex items-center gap-1.5 text-xs font-medium shrink-0 text-white hover:bg-white/20 transition active:scale-95" title="Up Next / Playback Queue">
                        <svg class="w-3.5 h-3.5 text-[#F04E23]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h10M4 18h7m8-4l3 3m0 0l-3 3m3-3h-6"/>
                        </svg>
                        <span>Queue</span>
                    </button>

                    <button id="playerDownloadBtn" onclick="toggleDownloadCurrentSong()" class="h-8 px-3 rounded-full glass-pill-inactive flex items-center gap-1.5 text-xs font-medium shrink-0 transition" title="Download for offline playback">
                        <svg id="playerDlIcon" class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                        <span id="playerDlLabel">Download</span>
                    </button>
                </div>

                <!-- Progress Scrubber Slider -->
                <div class="w-full mb-3">
                    <input id="audioScrubber" type="range" min="0" max="100" value="0" class="w-full custom-range cursor-pointer" />
                    <div class="flex justify-between text-[11px] font-medium text-[#D6CFCB] mt-1.5">
                        <span id="currentTimeLabel">0:00</span>
                        <span id="totalDurationLabel">{{ $allSongs->first()?->formatted_duration ?? '3:45' }}</span>
                    </div>
                </div>

                <!-- Full Playback Controls Row: [Shuffle] [Prev] [Play/Pause] [Next] [Repeat] -->
                <div class="flex items-center justify-between px-2 mb-3">
                    <button onclick="toggleShuffle()" id="shuffleBtn" class="w-10 h-10 rounded-full flex items-center justify-center text-white/60 hover:text-white transition" aria-label="Shuffle">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 3h5v5M4 20L21 3M21 16v5h-5M15 15l6 6M4 4l5 5"/>
                        </svg>
                    </button>

                    <button onclick="prevTrack()" class="w-12 h-12 rounded-full dock-circle-btn flex items-center justify-center text-white transition active:scale-95" aria-label="Previous">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M6 6h2v12H6zm3.5 6l8.5 6V6z"/></svg>
                    </button>

                    <button onclick="togglePlayPause()" id="modalPlayBtn" class="w-16 h-16 rounded-full pill-active flex items-center justify-center text-neutral-950 shadow-2xl transition active:scale-95" aria-label="Play/Pause">
                        <svg id="playPauseIcon" class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                    </button>

                    <button onclick="nextTrack()" class="w-12 h-12 rounded-full dock-circle-btn flex items-center justify-center text-white transition active:scale-95" aria-label="Next">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M6 18l8.5-6L6 6v12zM16 6v12h2V6h-2z"/></svg>
                    </button>

                    <button onclick="toggleRepeat()" id="repeatBtn" class="w-10 h-10 rounded-full flex items-center justify-center text-white/60 hover:text-white transition" aria-label="Repeat">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 1l4 4-4 4M3 11V9a4 4 0 0 1 4-4h14M7 23l-4-4 4-4M21 13v2a4 4 0 0 1-4 4H3"/>
                        </svg>
                    </button>
                </div>

                <!-- SWIPE-UP DRAG HANDLE WITH LIVE LYRICS TEASER (SS 2 Style) -->
                <div id="lyricsTeaserTrigger" onclick="openLyricsSheet()" class="w-full flex flex-col items-center cursor-pointer pt-0.5 group" title="Swipe or tap up for lyrics">
                    <div class="w-10 h-1 bg-white/40 rounded-full mb-1.5 group-hover:bg-white transition-all"></div>
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

            <!-- ============================================================== -->
            <!-- 9.5 UP NEXT & PLAYBACK QUEUE (Drag to reorder, swipe right to remove) -->
            <!-- ============================================================== -->
            <div id="queueSheet" class="absolute inset-0 bg-[#0D0705]/98 backdrop-blur-3xl z-50 translate-y-full transition-transform duration-500 ease-out flex flex-col justify-between p-6">

                <!-- Top Drag-Down Handle & Close Buttons -->
                <div class="flex items-center justify-between shrink-0 pb-3" id="queueTopHeader">
                    <button onclick="closeQueueSheet()" class="w-9 h-9 rounded-full bg-white/10 hover:bg-white/20 active:scale-90 flex items-center justify-center text-white/80 hover:text-white transition cursor-pointer" aria-label="Close Queue" title="Close Queue">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    <button onclick="closeQueueSheet()" class="py-2.5 px-6 -my-2 flex flex-col items-center group cursor-pointer" aria-label="Close Queue" title="Tap or drag down to close">
                        <span class="w-14 h-1.5 bg-white/40 group-hover:bg-white/80 rounded-full transition shadow-sm"></span>
                    </button>
                    <button onclick="closeQueueSheet()" class="w-9 h-9 rounded-full bg-white/10 hover:bg-white/20 active:scale-90 flex items-center justify-center text-white/80 hover:text-white transition cursor-pointer" aria-label="Close Queue" title="Close Queue">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>

                <!-- Currently Playing Track Card -->
                <div class="p-3 rounded-2xl bg-white/5 border border-[#F04E23]/30 flex items-center justify-between shrink-0">
                    <div class="flex items-center gap-3 min-w-0 flex-1">
                        <img id="queueCurrentCover" src="" class="w-11 h-11 rounded-xl object-cover ring-1 ring-[#F04E23]/40 shrink-0" alt="">
                        <div class="min-w-0 flex-1 text-left">
                            <p id="queueCurrentTitle" class="text-sm font-bold text-white truncate"></p>
                            <p id="queueCurrentArtist" class="text-xs text-[#8C827D] truncate mt-0.5"></p>
                        </div>
                    </div>
                    <div class="text-[#F04E23] shrink-0 ml-2">
                        <svg class="w-5 h-5 fill-current animate-pulse" viewBox="0 0 24 24"><path d="M12 3v10.55c-.59-.34-1.27-.55-2-.55-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4V7h4V3h-6z"/></svg>
                    </div>
                </div>

                <!-- Scrollable Full Queue List (Previous + Up Next) -->
                <div class="flex-1 overflow-y-auto no-scrollbar py-2" id="queueListScrollContainer">
                    <!-- Previously Played Section (When jumped forward or skipped) -->
                    <div id="queuePrevSection" class="hidden mb-3">
                        <div class="flex items-center justify-between px-1 mb-1.5 text-[11px] font-bold uppercase tracking-wider text-white/40">
                            <span>Previously Played</span>
                            <span id="queuePrevCount" class="text-[10px] text-white/30"></span>
                        </div>
                        <div id="queuePrevList" class="space-y-1.5 opacity-60"></div>
                    </div>

                    <!-- Up Next Section -->
                    <div id="queueUpcomingSection">
                        <div class="flex items-center justify-between px-1 mb-1.5 text-[11px] font-bold uppercase tracking-wider text-[#F04E23]">
                            <span>Up Next</span>
                            <span id="queueUpcomingCount" class="text-[10px] text-white/40"></span>
                        </div>
                        <div id="queueUpcomingList" class="space-y-1.5"></div>
                    </div>

                    <div id="emptyQueueMsg" class="hidden py-14 text-center text-[#8C827D]">
                        <div class="w-12 h-12 rounded-full bg-white/5 flex items-center justify-center mx-auto mb-2 text-white/40">🎵</div>
                        <p class="text-sm font-semibold text-white/80">Queue is empty</p>
                        <p class="text-xs mt-1 text-[#8C827D]">Next tracks will continue from your playlist</p>
                    </div>
                </div>

                <!-- Bottom Action Bar -->
                <div class="shrink-0 pt-3 border-t border-white/10">
                    <button onclick="closeQueueSheet()" class="w-full py-2.5 rounded-xl pill-active text-neutral-950 text-xs font-bold shadow-lg transition active:scale-95">
                        Back to Player
                    </button>
                </div>

            </div>

        </div>

        <!-- 10. PROFILE PICTURE (DP) MODAL - Solely dedicated to changing DP -->
        <div id="dpModal" class="fixed inset-0 max-w-md mx-auto bg-black/80 backdrop-blur-md z-50 hidden items-center justify-center p-5 select-none transition-all duration-300">
            <div class="w-full max-w-sm rounded-[28px] bg-[#140C09] border border-white/15 p-6 shadow-2xl flex flex-col items-center text-center relative">
                <!-- Close Button -->
                <button onclick="closeDpModal()" class="absolute top-4 right-4 w-8 h-8 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center transition active:scale-90" aria-label="Close">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>

                <h3 class="text-lg font-bold text-white tracking-tight mb-1">Profile Picture</h3>
                <p class="text-xs text-[#8C827D] mb-5">Change your profile picture (DP)</p>

                <!-- Current Avatar Preview with Edit Overlay -->
                <div class="relative mb-6 cursor-pointer group" onclick="triggerDpUpload()">
                    <img id="dpModalPreview" src="https://images.unsplash.com/photo-1599566150163-29194dcaad36?w=300&auto=format&fit=crop&q=80" class="w-28 h-28 rounded-full object-cover ring-4 ring-[#F04E23]/60 shadow-xl group-hover:ring-[#F04E23] transition-all" alt="Profile Preview">
                    <div class="absolute inset-0 rounded-full bg-black/40 group-hover:bg-black/20 flex items-center justify-center transition opacity-0 group-hover:opacity-100">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    </div>
                    <div class="absolute bottom-1 right-1 w-8 h-8 rounded-full bg-[#F04E23] text-white flex items-center justify-center ring-2 ring-[#140C09] shadow-lg">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/><circle cx="12" cy="13" r="3"/></svg>
                    </div>
                </div>

                <input type="file" id="dpFileInput" accept="image/*" class="hidden" onchange="handleDpFileSelected(event)">

                <div class="w-full space-y-2.5">
                    <button onclick="triggerDpUpload()" class="w-full py-3 rounded-2xl pill-active text-neutral-950 font-bold text-sm shadow-lg flex items-center justify-center gap-2 transition active:scale-95">
                        <svg class="w-4 h-4 text-neutral-950" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/></svg>
                        <span>Change DP</span>
                    </button>
                    <button onclick="closeDpModal(); logoutUser();" class="w-full py-2.5 rounded-2xl bg-red-500/15 hover:bg-red-500/25 border border-red-500/30 text-red-400 font-semibold text-xs flex items-center justify-center gap-2 transition active:scale-95">
                        <svg class="w-4 h-4 text-red-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                        <span>Log Out</span>
                    </button>
                    <button onclick="closeDpModal()" class="w-full py-2 rounded-2xl bg-white/10 hover:bg-white/15 text-white/80 hover:text-white font-medium text-xs transition active:scale-95">
                        Cancel
                    </button>
                </div>
            </div>
        </div>

        <!-- SETTINGS / MENU MODAL -->
        <div id="settingsModal" class="fixed inset-0 max-w-md mx-auto bg-black/80 backdrop-blur-md z-50 hidden items-center justify-center p-5 select-none transition-all duration-300">
            <div class="w-full max-w-sm rounded-[28px] bg-[#140C09] border border-white/15 p-6 shadow-2xl flex flex-col text-left relative">
                <button onclick="toggleSettingsModal()" class="absolute top-4 right-4 w-8 h-8 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center transition active:scale-90" aria-label="Close">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>

                <h3 class="text-lg font-bold text-white tracking-tight mb-1">Account & Settings</h3>
                <p class="text-xs text-[#8C827D] mb-4">Manage your profile and playback</p>

                <!-- User Card -->
                <div class="flex items-center gap-3 p-3 rounded-2xl bg-white/5 border border-white/10 mb-4">
                    <img id="settingsMenuAvatar" src="https://images.unsplash.com/photo-1599566150163-29194dcaad36?w=100&auto=format&fit=crop&q=80" class="w-12 h-12 rounded-full object-cover ring-2 ring-[#F04E23]" alt="">
                    <div class="min-w-0 flex-1">
                        <p id="settingsMenuUserName" class="text-sm font-bold text-white truncate">Shehbaz Ashraf</p>
                        <p id="settingsMenuUserEmail" class="text-xs text-[#8C827D] truncate">shehbazashraf@outlook.com</p>
                    </div>
                </div>

                <div class="space-y-2 mb-4">
                    <button onclick="toggleSettingsModal(); openDpModal();" class="w-full py-2.5 px-3.5 rounded-xl bg-white/5 hover:bg-white/10 text-white text-xs font-semibold flex items-center justify-between transition">
                        <span class="flex items-center gap-2">
                            <span>📷</span>
                            <span>Change Profile Picture (DP)</span>
                        </span>
                        <svg class="w-4 h-4 text-white/50" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                    </button>
                    <button onclick="logoutUser()" class="w-full py-2.5 px-3.5 rounded-xl bg-red-500/10 hover:bg-red-500/20 text-red-400 text-xs font-semibold flex items-center justify-between transition">
                        <span class="flex items-center gap-2">
                            <span>🚪</span>
                            <span>Log Out</span>
                        </span>
                        <svg class="w-4 h-4 text-red-400/60" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                    </button>
                </div>

                <div class="pt-3 border-t border-white/10 text-center">
                    <p class="text-[11px] text-white/40">Element v2.0 • This app is made by Shehbaz Ashraf</p>
                </div>
            </div>
        </div>

        <!-- MANDATORY LOGIN GATE OVERLAY -->
        <div id="loginGate" class="fixed inset-0 max-w-md mx-auto bg-[#070403] z-[60] flex flex-col justify-between p-6 sm:p-8 select-none transition-opacity duration-300">
            <!-- Ambient Glow Effect -->
            <div class="absolute -top-24 left-1/2 -translate-x-1/2 w-80 h-80 bg-[#F04E23]/25 rounded-full blur-[100px] pointer-events-none"></div>

            <!-- Top Logo & Welcome Section (Positioned comfortably lower) -->
            <div class="relative z-10 pt-20 pb-2 text-center">
                <!-- Custom App Logo with background removed -->
                <div class="w-24 h-24 mx-auto mb-4 flex items-center justify-center filter drop-shadow-[0_8px_24px_rgba(240,78,35,0.45)]">
                    <img src="/images/logo.png" class="w-full h-full object-contain" alt="Element Logo">
                </div>

                <h1 class="text-2xl font-black text-white tracking-tight">Welcome to "Element"</h1>
            </div>

            <!-- Middle Interactive Auth Area -->
            <div class="relative z-10 w-full my-auto py-6">

                <!-- STEP 1: EMAIL ENTRY -->
                <div id="loginEmailStep" class="w-full space-y-4">
                    <div class="space-y-1.5 text-left">
                        <label for="loginEmailInput" class="text-xs font-semibold text-white/80 block pl-1">Email Address</label>
                        <div class="relative flex items-center">
                            <span class="absolute left-4 text-white/40">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            </span>
                            <input id="loginEmailInput" type="email" value="shehbazashraf@outlook.com" placeholder="shehbazashraf@outlook.com" autocomplete="email" autocapitalize="off" spellcheck="false"
                                   class="w-full h-12 pl-11 pr-4 rounded-2xl bg-white/5 border border-white/15 focus:border-[#F04E23] text-white text-sm outline-none transition focus:ring-2 focus:ring-[#F04E23]/30">
                        </div>
                        <p id="loginEmailError" class="hidden text-xs text-red-400 pl-1 pt-1 font-medium"></p>
                    </div>

                    <button id="loginEmailSubmitBtn" onclick="handleLoginEmailSubmit()" class="w-full h-12 rounded-2xl pill-active text-neutral-950 font-bold text-sm shadow-xl flex items-center justify-center gap-2 transition active:scale-95">
                        <span>Login</span>
                        <svg class="w-4 h-4 text-neutral-950" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                    </button>
                </div>

                <!-- STEP 2: 4-DIGIT PIN ENTRY -->
                <div id="loginPinStep" class="hidden w-full space-y-5 text-center">
                    <div>
                        <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-white/5 border border-white/10 text-xs text-white/70 mb-2">
                            <span id="loginPinDisplayEmail">shehbazashraf@outlook.com</span>
                            <button onclick="backToEmailStep()" class="text-[#F04E23] font-semibold hover:underline ml-1 text-[11px]">Change</button>
                        </div>
                        <h2 class="text-base font-bold text-white tracking-tight">Enter 4-Digit Security PIN</h2>
                        <p class="text-xs text-[#8C827D] mt-0.5">Please enter your 4-digit PIN</p>
                    </div>

                    <!-- 4 PIN DIGIT INPUTS -->
                    <div id="pinInputsContainer" class="flex items-center justify-center gap-3 py-2">
                        <input type="password" inputmode="numeric" maxlength="1" data-index="0" class="pin-digit-box w-12 h-14 rounded-2xl bg-white/5 border border-white/20 focus:border-[#F04E23] text-center text-xl font-bold text-white outline-none focus:ring-2 focus:ring-[#F04E23]/40 transition">
                        <input type="password" inputmode="numeric" maxlength="1" data-index="1" class="pin-digit-box w-12 h-14 rounded-2xl bg-white/5 border border-white/20 focus:border-[#F04E23] text-center text-xl font-bold text-white outline-none focus:ring-2 focus:ring-[#F04E23]/40 transition">
                        <input type="password" inputmode="numeric" maxlength="1" data-index="2" class="pin-digit-box w-12 h-14 rounded-2xl bg-white/5 border border-white/20 focus:border-[#F04E23] text-center text-xl font-bold text-white outline-none focus:ring-2 focus:ring-[#F04E23]/40 transition">
                        <input type="password" inputmode="numeric" maxlength="1" data-index="3" class="pin-digit-box w-12 h-14 rounded-2xl bg-white/5 border border-white/20 focus:border-[#F04E23] text-center text-xl font-bold text-white outline-none focus:ring-2 focus:ring-[#F04E23]/40 transition">
                    </div>

                    <p id="loginPinError" class="hidden text-xs text-red-400 font-medium"></p>

                    <button id="loginPinSubmitBtn" onclick="handlePinVerify()" class="w-full h-12 rounded-2xl pill-active text-neutral-950 font-bold text-sm shadow-xl flex items-center justify-center gap-2 transition active:scale-95">
                        <span>Unlock App</span>
                        <svg class="w-4 h-4 text-neutral-950" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                    </button>
                </div>

            </div>

            <!-- Bottom Required Line -->
            <div class="relative z-10 pb-4 text-center">
                <p class="text-[12px] font-medium text-white/40 tracking-wider">
                    This app is made by Shehbaz Ashraf
                </p>
            </div>
        </div>

        <!-- 11. REAL AUDIO TAG -->
        <audio id="realAudio" preload="auto" playsinline></audio>

        <!-- TOAST NOTIFICATION -->
        <div id="toastBox" class="fixed top-14 left-1/2 -translate-x-1/2 px-4 py-2 rounded-full bg-neutral-900/95 text-white border border-white/20 text-xs font-medium shadow-xl opacity-0 pointer-events-none transition-opacity duration-300 z-50 whitespace-nowrap">
            Notification
        </div>

    </div>

    <script>
        const songs = {{ Js::from($playerQueue) }};
        const playlistsData = {{ Js::from($playlistsData) }};
        const favoriteSongIds = new Set({{ Js::from($favoriteSongIds) }});
        let queueList = [...songs];
        const audio = document.getElementById('realAudio');
        let currentTrackIndex = 0;
        let isPlaying = false;
        let isShuffle = false;
        let isRepeat = false;
        let activeCategory = 'All';
        let likeCount = 13420;
        let isLiked = false;
        let draggedQueueIdx = null;

        const AUDIO_CACHE = 'element-music-audio-v1';
        const COVER_CACHE = 'element-music-v1';

        // Register Service Worker for true offline PWA / APK support
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', () => {
                navigator.serviceWorker.register('/sw.js').then((reg) => {
                    console.log('Element Music Service Worker ready:', reg.scope);
                }).catch((err) => {
                    console.warn('SW register notice:', err);
                });
            });
        }

        function currentSong() {
            return queueList[currentTrackIndex] || songs[0];
        }

        function playSongById(id) {
            const index = queueList.findIndex(s => s.id === id);
            if (index !== -1) {
                playTrack(index);
                openNowPlayingModal();
            } else {
                const sIndex = songs.findIndex(s => s.id === id);
                if (sIndex !== -1) {
                    queueList = [...songs];
                    playTrack(sIndex);
                    openNowPlayingModal();
                }
            }
        }

        function playTrack(index, showToastMsg = true) {
            if (index < 0 || index >= queueList.length) return;
            closeLyricsSheet();
            closeQueueSheet();
            currentTrackIndex = index;
            const song = queueList[index];
            try { localStorage.setItem('element_last_song_id', song.id); } catch(e) {}

            if (typeof updateHeartUI === 'function') {
                updateHeartUI(favoriteSongIds.has(song.id));
            }

            if (typeof renderQueue === 'function') {
                renderQueue();
            }

            if (typeof updateShuffleUI === 'function') {
                updateShuffleUI();
            }
            if (typeof updateRepeatUI === 'function') {
                updateRepeatUI();
            }

            // Update mini status in header
            document.getElementById('miniStatusText').textContent = song.title;

            // Update floating homepage mini player
            const hpMini = document.getElementById('homepageMiniPlayer');
            if (hpMini) {
                hpMini.classList.remove('hidden');
                document.getElementById('hpMiniCover').src = song.cover;
                document.getElementById('hpMiniTitle').textContent = song.title;
                document.getElementById('hpMiniArtist').textContent = song.artist;
            }

            // Update full player modal (centered artwork & ambient background)
            document.getElementById('playerFullPoster').src = song.cover;
            const bgBlur = document.getElementById('playerBgBlur');
            if (bgBlur) bgBlur.src = song.cover;

            document.getElementById('modalTrackTitle').textContent = song.title;
            document.getElementById('modalTrackArtist').textContent = song.artist + (song.genre ? ' • ' + song.genre : '');
            document.getElementById('playerTopCategoryTag').textContent = song.genre ? song.genre.toUpperCase() : 'NOW PLAYING';
            document.getElementById('totalDurationLabel').textContent = song.duration || '3:30';

            // Reset scrubber smoothly
            if (scrubber) scrubber.value = 0;
            document.getElementById('currentTimeLabel').textContent = '0:00';

            // Update lyrics preview & sheet
            document.getElementById('lyricsTrackTitle').textContent = song.title;
            document.getElementById('lyricsMiniTitle').textContent = song.title;
            document.getElementById('lyricsMiniArtist').textContent = song.artist;
            document.getElementById('lyricsMiniCover').src = song.cover;
            renderLyrics(song);

            // Update download button state in player modal
            if (typeof offlineManager !== 'undefined') {
                offlineManager.updatePlayerBtn(offlineManager.isDownloaded(song.id));
            }

            // Real Native Audio Playback with offline CacheStorage support
            if (song.audio) {
                try {
                    audio.pause();
                } catch(e) {}

                // Check CacheStorage for instant offline APK playback
                if ('caches' in window) {
                    caches.open(AUDIO_CACHE).then(async (cache) => {
                        const match = await cache.match(song.audio);
                        if (match) {
                            const blob = await match.blob();
                            audio.src = URL.createObjectURL(blob);
                        } else {
                            audio.src = song.audio;
                        }
                        audio.load();
                        const playPromise = audio.play();
                        if (playPromise !== undefined) {
                            playPromise.then(() => {
                                isPlaying = true;
                                updatePlayIcons();
                            }).catch((err) => {
                                console.warn('Playback waiting or blocked:', err);
                                isPlaying = false;
                                updatePlayIcons();
                            });
                        }
                    }).catch(() => {
                        audio.src = song.audio;
                        audio.load();
                        audio.play().then(() => { isPlaying = true; updatePlayIcons(); }).catch(() => { isPlaying = false; updatePlayIcons(); });
                    });
                } else {
                    audio.src = song.audio;
                    audio.load();
                    audio.play().then(() => { isPlaying = true; updatePlayIcons(); }).catch(() => { isPlaying = false; updatePlayIcons(); });
                }
            }

            // Highlight in track list
            document.querySelectorAll('.song-title').forEach(el => el.classList.remove('text-[#F04E23]'));
            const activeTitle = document.querySelector(`[onclick="playSongById(${song.id})"] .song-title`);
            if (activeTitle) activeTitle.classList.add('text-[#F04E23]');

            fetch(`/api/v1/songs/${song.id}/play`, { method: 'POST', headers: { 'Accept': 'application/json' } }).catch(() => {});
            if (showToastMsg) {
                showToast(`Playing: ${song.title}`);
            }
        }

        function togglePlayPause() {
            if (audio.src) {
                if (audio.paused) {
                    const p = audio.play();
                    if (p !== undefined) {
                        p.then(() => {
                            isPlaying = true;
                            updatePlayIcons();
                        }).catch(() => {});
                    }
                } else {
                    audio.pause();
                    isPlaying = false;
                    updatePlayIcons();
                }
            } else if (songs.length > 0) {
                playTrack(0);
            }
        }

        // Native HTML5 Audio Event Listeners
        audio.addEventListener('play', () => { isPlaying = true; updatePlayIcons(); });
        audio.addEventListener('playing', () => { isPlaying = true; updatePlayIcons(); });
        audio.addEventListener('pause', () => { isPlaying = false; updatePlayIcons(); });
        audio.addEventListener('error', (e) => {
            console.error('Audio load error:', audio.error);
        });

        function updatePlayIcons() {
            const icon = document.getElementById('playPauseIcon');
            const hpIcon = document.getElementById('hpMiniPlayIcon');
            const lyricsIcon = document.getElementById('lyricsPlayIcon');
            const eq = document.getElementById('headerEq');

            const playSvg = '<path d="M8 5v14l11-7z"/>';
            const pauseSvg = '<path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z"/>';

            if (isPlaying) {
                if (icon) icon.innerHTML = pauseSvg;
                if (hpIcon) hpIcon.innerHTML = pauseSvg;
                if (lyricsIcon) lyricsIcon.innerHTML = pauseSvg;
                if (eq) eq.classList.remove('paused-eq');
            } else {
                if (icon) icon.innerHTML = playSvg;
                if (hpIcon) hpIcon.innerHTML = playSvg;
                if (lyricsIcon) lyricsIcon.innerHTML = playSvg;
                if (eq) eq.classList.add('paused-eq');
            }
        }

        function nextTrack() {
            if (queueList.length === 0) return;
            if (isShuffle) {
                currentTrackIndex = Math.floor(Math.random() * queueList.length);
            } else {
                currentTrackIndex = (currentTrackIndex + 1) % queueList.length;
            }
            playTrack(currentTrackIndex);
        }

        function prevTrack() {
            if (queueList.length === 0) return;
            currentTrackIndex = (currentTrackIndex - 1 + queueList.length) % queueList.length;
            playTrack(currentTrackIndex);
        }

        function toggleShuffle() {
            isShuffle = !isShuffle;
            updateShuffleUI();
            showToast(isShuffle ? 'Shuffle: ON 🔀' : 'Shuffle: OFF');
        }

        function updateShuffleUI() {
            const btn = document.getElementById('shuffleBtn');
            if (!btn) return;
            if (isShuffle) {
                btn.className = 'w-10 h-10 rounded-full flex items-center justify-center bg-[#F04E23]/25 text-[#F04E23] ring-2 ring-[#F04E23] shadow-lg shadow-[#F04E23]/30 transition active:scale-95';
            } else {
                btn.className = 'w-10 h-10 rounded-full flex items-center justify-center text-white/60 hover:text-white transition active:scale-95';
            }
        }

        function toggleRepeat() {
            isRepeat = !isRepeat;
            updateRepeatUI();
            showToast(isRepeat ? 'Repeat: ON 🔁' : 'Repeat: OFF');
        }

        function updateRepeatUI() {
            const btn = document.getElementById('repeatBtn');
            if (!btn) return;
            if (isRepeat) {
                btn.className = 'w-10 h-10 rounded-full flex items-center justify-center bg-[#F04E23]/25 text-[#F04E23] ring-2 ring-[#F04E23] shadow-lg shadow-[#F04E23]/30 transition active:scale-95';
            } else {
                btn.className = 'w-10 h-10 rounded-full flex items-center justify-center text-white/60 hover:text-white transition active:scale-95';
            }
        }

        // Live Playback Scrubber & Timer loop (Debounced with isSeeking to avoid snapback)
        let isSeeking = false;
        const scrubber = document.getElementById('audioScrubber');

        if (scrubber) {
            scrubber.addEventListener('pointerdown', () => { isSeeking = true; });
            scrubber.addEventListener('touchstart', () => { isSeeking = true; }, { passive: true });
            scrubber.addEventListener('input', (e) => {
                isSeeking = true;
                const val = parseFloat(e.target.value);
                if (audio.duration && !isNaN(audio.duration)) {
                    const previewTime = (val / 100) * audio.duration;
                    const mins = Math.floor(previewTime / 60);
                    const secs = String(Math.floor(previewTime % 60)).padStart(2, '0');
                    document.getElementById('currentTimeLabel').textContent = `${mins}:${secs}`;
                }
            });
            scrubber.addEventListener('change', (e) => {
                const val = parseFloat(e.target.value);
                if (audio.duration && !isNaN(audio.duration)) {
                    audio.currentTime = (val / 100) * audio.duration;
                }
                setTimeout(() => { isSeeking = false; }, 150);
            });
            scrubber.addEventListener('pointerup', () => {
                setTimeout(() => { isSeeking = false; }, 150);
            });
            scrubber.addEventListener('touchend', () => {
                setTimeout(() => { isSeeking = false; }, 150);
            });
        }

        setInterval(() => {
            if (audio.duration && !isNaN(audio.duration) && !isSeeking) {
                const curr = audio.currentTime;
                const dur = audio.duration;
                const percent = (curr / dur) * 100;
                if (scrubber) scrubber.value = percent;
                const mins = Math.floor(curr / 60);
                const secs = String(Math.floor(curr % 60)).padStart(2, '0');
                document.getElementById('currentTimeLabel').textContent = `${mins}:${secs}`;

                const totalMins = Math.floor(dur / 60);
                const totalSecs = String(Math.floor(dur % 60)).padStart(2, '0');
                document.getElementById('totalDurationLabel').textContent = `${totalMins}:${totalSecs}`;

                syncLyrics(curr);
            }
        }, 250);

        audio.addEventListener('ended', () => {
            if (isRepeat) {
                audio.currentTime = 0;
                audio.play();
            } else {
                nextTrack();
            }
        });

        function filterByPlaylist(title, el) {
            const cleanTitle = title.toLowerCase();
            const isFav = cleanTitle.includes('favourit') || cleanTitle.includes('favorit');
            
            // Find playlist object in playlistsData if available
            const plObj = playlistsData.find(p => p.title.toLowerCase() === cleanTitle || (isFav && (p.title.toLowerCase().includes('favourit') || p.title.toLowerCase().includes('favorit'))));
            const plSongIds = plObj && plObj.song_ids ? new Set(plObj.song_ids.map(Number)) : new Set();

            let count = 0;
            document.querySelectorAll('.song-item').forEach(item => {
                const sId = Number(item.dataset.id);
                const album = item.dataset.album || '';
                const search = item.dataset.search || '';
                const itemPlaylists = (item.dataset.playlists || '').toLowerCase();

                let match = false;
                if (isFav) {
                    match = favoriteSongIds.has(sId);
                } else if (plSongIds.size > 0) {
                    match = plSongIds.has(sId);
                } else {
                    match = album.includes(cleanTitle) || search.includes(cleanTitle) || itemPlaylists.includes(cleanTitle);
                }

                item.classList.toggle('hidden', !match);
                if (match) count++;
            });

            // Update UI headers
            const countLabel = document.getElementById('songsCountLabel');
            if (countLabel) countLabel.textContent = `${count} tracks • Playlist: ${title}`;

            const sectionTitle = document.getElementById('songsSectionTitle');
            if (sectionTitle) sectionTitle.textContent = title;

            const clearFilterBtn = document.getElementById('clearPlaylistFilterBtn');
            if (clearFilterBtn) clearFilterBtn.classList.remove('hidden');

            const noSongs = document.getElementById('noSongsFound');
            if (noSongs) {
                if (count === 0) {
                    noSongs.classList.remove('hidden');
                    noSongs.innerHTML = isFav 
                        ? '<div class="py-12 text-center text-[#8C827D]"><p class="text-3xl mb-2">❤️</p><p class="text-sm font-bold text-white">No Favourite Songs yet</p><p class="text-xs text-white/50 mt-1">Player me Heart (❤️) button par click karein to songs yahan show hongy.</p></div>'
                        : `<div class="py-12 text-center text-[#8C827D]"><p class="text-3xl mb-2">🎵</p><p class="text-sm font-bold text-white">No tracks found in "${title}"</p></div>`;
                } else {
                    noSongs.classList.add('hidden');
                }
            }

            showToast(`Playlist: ${title} (${count} songs)`);
            const listSection = document.getElementById('songListContainer');
            if (listSection) listSection.scrollIntoView({ behavior: 'smooth' });
        }

        function clearPlaylistFilter() {
            document.querySelectorAll('.song-item').forEach(item => {
                item.classList.remove('hidden');
            });
            const countLabel = document.getElementById('songsCountLabel');
            if (countLabel) countLabel.textContent = `${songs.length} tracks`;
            const sectionTitle = document.getElementById('songsSectionTitle');
            if (sectionTitle) sectionTitle.textContent = 'All Tracks';
            const clearFilterBtn = document.getElementById('clearPlaylistFilterBtn');
            if (clearFilterBtn) clearFilterBtn.classList.add('hidden');
            const noSongs = document.getElementById('noSongsFound');
            if (noSongs) noSongs.classList.add('hidden');
            showToast('Showing all tracks');
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
            closeQueueSheet();
            document.getElementById('lyricsSheet').classList.remove('translate-y-full');
            syncLyrics(audio.currentTime);
        }

        function closeLyricsSheet() {
            document.getElementById('lyricsSheet').classList.add('translate-y-full');
        }

        // ==============================================================
        // UP NEXT & PLAYBACK QUEUE ENGINE (Drag to reorder, swipe right to remove)
        // ==============================================================
        function openQueueSheet() {
            closeLyricsSheet();
            renderQueue();
            const sheet = document.getElementById('queueSheet');
            if (sheet) {
                sheet.style.transform = '';
                sheet.style.transition = '';
                sheet.classList.remove('translate-y-full');
            }
        }

        function closeQueueSheet() {
            const sheet = document.getElementById('queueSheet');
            if (sheet) {
                sheet.style.transform = '';
                sheet.style.transition = '';
                sheet.classList.add('translate-y-full');
            }
        }

        function renderQueue() {
            const current = currentSong();
            if (current) {
                const qCover = document.getElementById('queueCurrentCover');
                if (qCover) qCover.src = current.cover;
                const qTitle = document.getElementById('queueCurrentTitle');
                if (qTitle) qTitle.textContent = current.title;
                const qArtist = document.getElementById('queueCurrentArtist');
                if (qArtist) qArtist.textContent = current.artist + (current.genre ? ' • ' + current.genre : '');
            }

            const prevSection = document.getElementById('queuePrevSection');
            const prevList = document.getElementById('queuePrevList');
            const prevCount = document.getElementById('queuePrevCount');

            const upcomingSection = document.getElementById('queueUpcomingSection');
            const upcomingList = document.getElementById('queueUpcomingList');
            const upcomingCount = document.getElementById('queueUpcomingCount');
            const emptyMsg = document.getElementById('emptyQueueMsg');

            if (!upcomingList) return;

            // Split full queue into Previous and Upcoming based on current position
            const prevTracks = queueList.slice(0, currentTrackIndex);
            const upcomingTracks = queueList.slice(currentTrackIndex + 1);

            // Render Previously Played Songs (Preserves skipped tracks for jumping back!)
            if (prevSection && prevList) {
                if (prevTracks.length > 0) {
                    prevSection.classList.remove('hidden');
                    if (prevCount) prevCount.textContent = `${prevTracks.length} tracks`;
                    prevList.innerHTML = '';
                    prevTracks.forEach((track, pIdx) => {
                        const row = createQueueRow(track, pIdx, 'prev');
                        prevList.appendChild(row);
                    });
                } else {
                    prevSection.classList.add('hidden');
                }
            }

            // Render Upcoming Songs
            upcomingList.innerHTML = '';
            if (upcomingTracks.length > 0) {
                if (upcomingCount) upcomingCount.textContent = `${upcomingTracks.length} tracks`;
                if (emptyMsg) emptyMsg.classList.add('hidden');
                upcomingTracks.forEach((track, uIdx) => {
                    const realIndex = currentTrackIndex + 1 + uIdx;
                    const row = createQueueRow(track, realIndex, 'upcoming');
                    upcomingList.appendChild(row);
                });
            } else {
                if (upcomingCount) upcomingCount.textContent = '0';
                if (emptyMsg) emptyMsg.classList.remove('hidden');
            }
        }

        function createQueueRow(track, realIdx, type) {
            const row = document.createElement('div');
            row.className = 'queue-row relative overflow-hidden rounded-2xl bg-white/5 border border-white/5 hover:bg-white/10 transition-all flex items-center justify-between p-2 select-none group';
            row.draggable = (type === 'upcoming');
            row.dataset.realIndex = realIdx;

            row.innerHTML = `
                <div class="swipe-trash-indicator absolute inset-0 bg-red-600/90 text-white flex items-center justify-start pl-4 font-bold text-xs opacity-0 pointer-events-none transition-opacity">
                    <span>🗑️ Swipe right to remove</span>
                </div>
                <div class="flex items-center gap-2.5 min-w-0 flex-1 relative z-10">
                    <div class="drag-handle cursor-grab active:cursor-grabbing p-1.5 text-white/30 hover:text-white shrink-0" title="Drag up or down to reorder">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 8h16M4 16h16"/></svg>
                    </div>
                    <img src="${track.cover}" class="w-10 h-10 rounded-xl object-cover shrink-0 cursor-pointer" onclick="jumpToQueueSong(${realIdx})" alt="">
                    <div class="min-w-0 flex-1 text-left cursor-pointer" onclick="jumpToQueueSong(${realIdx})">
                        <p class="text-xs font-bold text-white truncate group-hover:text-[#F04E23] transition-colors">${track.title}</p>
                        <p class="text-[11px] text-[#8C827D] truncate">${track.artist}</p>
                    </div>
                </div>
                <div class="flex items-center gap-2 shrink-0 ml-2 relative z-10 pr-2">
                    <span class="text-[11px] text-[#8C827D] font-medium">${track.duration}</span>
                </div>
            `;

            // Drag and drop for reordering (HTML5)
            if (type === 'upcoming') {
                row.addEventListener('dragstart', (e) => {
                    draggedQueueIdx = realIdx;
                    row.classList.add('opacity-40', 'scale-[0.98]');
                    e.dataTransfer.effectAllowed = 'move';
                });

                row.addEventListener('dragover', (e) => {
                    e.preventDefault();
                    e.dataTransfer.dropEffect = 'move';
                    row.classList.add('border-t-2', 'border-[#F04E23]');
                });

                row.addEventListener('dragleave', () => {
                    row.classList.remove('border-t-2', 'border-[#F04E23]');
                });

                row.addEventListener('drop', (e) => {
                    e.preventDefault();
                    row.classList.remove('border-t-2', 'border-[#F04E23]');
                    if (draggedQueueIdx !== null && draggedQueueIdx !== realIdx) {
                        const movedItem = queueList.splice(draggedQueueIdx, 1)[0];
                        queueList.splice(realIdx, 0, movedItem);
                        renderQueue();
                        showToast('Queue reordered ⇅');
                    }
                });

                row.addEventListener('dragend', () => {
                    row.classList.remove('opacity-40', 'scale-[0.98]', 'border-t-2', 'border-[#F04E23]');
                });
            }

            // Swipe right to remove (Touch & Pointer)
            let touchStartX = 0;
            let touchStartY = 0;
            let isSwiping = false;
            let isPointerDown = false;
            const trashIndicator = row.querySelector('.swipe-trash-indicator');

            const startSwipe = (clientX, clientY) => {
                touchStartX = clientX;
                touchStartY = clientY;
                isSwiping = false;
                row.style.transition = 'none';
            };

            const moveSwipe = (clientX, clientY) => {
                const diffX = clientX - touchStartX;
                const diffY = clientY - touchStartY;

                if (diffX > 10 && Math.abs(diffX) > Math.abs(diffY)) {
                    isSwiping = true;
                    row.style.transform = `translateX(${diffX}px)`;
                    row.style.opacity = Math.max(0.2, 1 - (diffX / 280));
                    if (trashIndicator) {
                        trashIndicator.style.opacity = Math.min(1, diffX / 80);
                    }
                }
            };

            const endSwipe = (clientX) => {
                if (!isSwiping) return;
                const diffX = clientX - touchStartX;

                row.style.transition = 'transform 0.25s ease, opacity 0.25s ease';
                if (diffX > 80) {
                    row.style.transform = 'translateX(120%)';
                    row.style.opacity = '0';
                    setTimeout(() => {
                        removeSongFromQueue(realIdx);
                    }, 220);
                } else {
                    row.style.transform = 'translateX(0)';
                    row.style.opacity = '1';
                    if (trashIndicator) trashIndicator.style.opacity = '0';
                }
                isSwiping = false;
            };

            row.addEventListener('touchstart', (e) => startSwipe(e.touches[0].clientX, e.touches[0].clientY), { passive: true });
            row.addEventListener('touchmove', (e) => moveSwipe(e.touches[0].clientX, e.touches[0].clientY), { passive: true });
            row.addEventListener('touchend', (e) => endSwipe(e.changedTouches[0].clientX), { passive: true });

            // Pointer/mouse support
            row.addEventListener('pointerdown', (e) => {
                if (e.target.closest('.drag-handle')) return;
                isPointerDown = true;
                startSwipe(e.clientX, e.clientY);
            });
            row.addEventListener('pointermove', (e) => {
                if (!isPointerDown) return;
                moveSwipe(e.clientX, e.clientY);
            });
            row.addEventListener('pointerup', (e) => {
                if (!isPointerDown) return;
                isPointerDown = false;
                endSwipe(e.clientX);
            });
            row.addEventListener('pointercancel', () => {
                if (!isPointerDown) return;
                isPointerDown = false;
                row.style.transform = 'translateX(0)';
                row.style.opacity = '1';
                if (trashIndicator) trashIndicator.style.opacity = '0';
            });

            return row;
        }

        function jumpToQueueSong(realIdx) {
            if (realIdx >= 0 && realIdx < queueList.length) {
                playTrack(realIdx);
                renderQueue();
            }
        }

        function removeSongFromQueue(realIdx) {
            if (realIdx >= 0 && realIdx < queueList.length) {
                const [removed] = queueList.splice(realIdx, 1);
                if (realIdx < currentTrackIndex) {
                    currentTrackIndex--;
                }
                renderQueue();
                showToast(`"${removed.title}" removed from queue`);
            }
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
        // QUEUE SHEET DRAG-DOWN TO CLOSE GESTURE (Touch & Pointer)
        // ==============================================================
        (function initQueueSheetDragToClose() {
            const sheet = document.getElementById('queueSheet');
            const scrollContainer = document.getElementById('queueListScrollContainer');
            if (!sheet) return;

            let startY = 0;
            let startX = 0;
            let currentDiffY = 0;
            let isDraggingSheet = false;
            let canDrag = false;

            const onStart = (clientX, clientY, target) => {
                // Ignore clicks on buttons or drag-handles for song reorder
                if (target.closest('button') || target.closest('.drag-handle')) return;
                
                // Allow drag if user touched the top header, cover, or scroll is at top
                const isScrollAtTop = !scrollContainer || scrollContainer.scrollTop <= 0;
                const isTopArea = target.closest('#queueTopHeader') || !target.closest('#queueListScrollContainer');
                
                if (isTopArea || isScrollAtTop) {
                    canDrag = true;
                    startY = clientY;
                    startX = clientX;
                    currentDiffY = 0;
                    isDraggingSheet = false;
                }
            };

            const onMove = (clientX, clientY) => {
                if (!canDrag) return;
                const diffY = clientY - startY;
                const diffX = clientX - startX;

                // Only drag downwards and when vertical movement dominates
                if (diffY > 8 && Math.abs(diffY) > Math.abs(diffX)) {
                    isDraggingSheet = true;
                    currentDiffY = diffY;
                    sheet.style.transition = 'none';
                    sheet.style.transform = `translateY(${Math.max(0, diffY)}px)`;
                }
            };

            const onEnd = () => {
                if (!canDrag) return;
                canDrag = false;
                if (isDraggingSheet) {
                    sheet.style.transition = 'transform 0.3s cubic-bezier(0.16, 1, 0.3, 1)';
                    if (currentDiffY > 80) {
                        closeQueueSheet();
                    } else {
                        sheet.style.transform = 'translateY(0)';
                    }
                    isDraggingSheet = false;
                }
            };

            // Touch events
            sheet.addEventListener('touchstart', (e) => {
                onStart(e.touches[0].clientX, e.touches[0].clientY, e.target);
            }, { passive: true });

            sheet.addEventListener('touchmove', (e) => {
                onMove(e.touches[0].clientX, e.touches[0].clientY);
            }, { passive: true });

            sheet.addEventListener('touchend', onEnd, { passive: true });

            // Pointer events (Mouse / Trackpad)
            sheet.addEventListener('pointerdown', (e) => {
                onStart(e.clientX, e.clientY, e.target);
            });
            sheet.addEventListener('pointermove', (e) => {
                onMove(e.clientX, e.clientY);
            });
            sheet.addEventListener('pointerup', onEnd);
            sheet.addEventListener('pointercancel', onEnd);
        })();

        // ==============================================================
        // FAVORITE SONGS SYSTEM (Heart toggle & Favourite Songs playlist)
        // ==============================================================
        function updateHeartUI(isFav, animate = false) {
            const heart = document.getElementById('heartIcon');
            const btn = document.getElementById('favoriteBtn');
            if (!heart) return;

            if (animate) {
                heart.classList.remove('animate-heart-bounce');
                void heart.offsetWidth; // trigger reflow
                heart.classList.add('animate-heart-bounce');
            }

            if (isFav) {
                heart.classList.remove('text-white');
                heart.classList.add('text-red-500');
                heart.setAttribute('fill', 'currentColor');
            } else {
                heart.classList.remove('text-red-500');
                heart.classList.add('text-white');
                heart.setAttribute('fill', 'none');
            }
        }

        async function toggleFavorite() {
            const song = currentSong();
            if (!song) return;

            const isCurrentlyFav = favoriteSongIds.has(song.id);
            const willFav = !isCurrentlyFav;

            // Instant optimistic UI response with bounce animation
            if (willFav) {
                favoriteSongIds.add(song.id);
                updateHeartUI(true, true);
                showToast('Added to Favourite Songs ❤️');
            } else {
                favoriteSongIds.delete(song.id);
                updateHeartUI(false, true);
                showToast('Removed from Favourite Songs');
            }

            // Sync local playlistsData
            const favPl = playlistsData.find(p => p.title.toLowerCase().includes('favourit') || p.title.toLowerCase().includes('favorit'));
            if (favPl) {
                if (!favPl.song_ids) favPl.song_ids = [];
                if (willFav) {
                    if (!favPl.song_ids.includes(song.id)) favPl.song_ids.push(song.id);
                } else {
                    favPl.song_ids = favPl.song_ids.filter(id => id !== song.id);
                }
                favPl.tracks_count = favPl.song_ids.length;
            }

            // Update all playlist cards in UI instantly
            const newCount = favoriteSongIds.size;
            document.querySelectorAll('[data-playlist-title]').forEach(card => {
                const t = (card.dataset.playlistTitle || '').toLowerCase();
                if (t.includes('favourit') || t.includes('favorit')) {
                    const countEl = card.querySelector('.playlist-tracks-count, p');
                    if (countEl) countEl.textContent = `${newCount} tracks` + (countEl.textContent.includes('•') ? ' • Audio Collection' : '');
                    if (willFav && song.cover) {
                        const img = card.querySelector('img');
                        if (img) img.src = song.cover;
                    }
                }
            });

            // If Favourite Songs is currently filtered on screen, refresh the view
            const secTitle = document.getElementById('songsSectionTitle');
            if (secTitle && (secTitle.textContent.includes('Favourite') || activeCategory === '❤️ Favourites')) {
                if (activeCategory === '❤️ Favourites') {
                    filterTracks();
                } else {
                    filterByPlaylist('Favourite Songs');
                }
            }

            // If Playlist Detail view is currently open for Favourite Songs, refresh it live
            if (currentActivePlaylistTitle && (currentActivePlaylistTitle.toLowerCase().includes('favourit') || currentActivePlaylistTitle.toLowerCase().includes('favorit'))) {
                openPlaylistDetail(currentActivePlaylistTitle);
            }

            // Sync with backend playlist in database
            try {
                const res = await fetch('/favorites/toggle', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ song_id: song.id })
                });
                const data = await res.json();
                if (data.playlist_count !== undefined) {
                    document.querySelectorAll('[data-playlist-title]').forEach(card => {
                        const t = (card.dataset.playlistTitle || '').toLowerCase();
                        if (t.includes('favourit') || t.includes('favorit')) {
                            const countEl = card.querySelector('.playlist-tracks-count, p');
                            if (countEl) countEl.textContent = `${data.playlist_count} tracks` + (countEl.textContent.includes('•') ? ' • Audio Collection' : '');
                        }
                    });
                }
            } catch (err) {
                console.warn('Favorite sync warning:', err);
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
                const sId = Number(item.dataset.id);
                let matchCategory = true;
                if (activeCategory === '❤️ Favourites' || activeCategory === 'Favourites') {
                    matchCategory = favoriteSongIds.has(sId);
                } else if (activeCategory === '📥 Downloads') {
                    matchCategory = typeof offlineManager !== 'undefined' && offlineManager.isDownloaded(sId);
                } else if (activeCategory !== 'All') {
                    matchCategory = (item.dataset.genre === activeCategory);
                }

                const matchSearch = item.dataset.search.includes(term);
                const visible = matchCategory && matchSearch;
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





        function openNowPlayingModal() {
            document.getElementById('nowPlayingModal').classList.remove('translate-y-full');
        }

        function closeNowPlayingModal() {
            document.getElementById('nowPlayingModal').classList.add('translate-y-full');
            closeLyricsSheet();
        }

        let activeNavTab = 'Home';
        let currentActivePlaylistTitle = '';

        function navigateToTab(tabName) {
            const btnHome = document.getElementById('navTabHome');
            const lblHome = document.getElementById('navTabHomeLabel');
            const btnPlaylists = document.getElementById('navTabPlaylists');
            const lblPlaylists = document.getElementById('navTabPlaylistsLabel');
            const homeView = document.getElementById('homeView');
            const playlistsView = document.getElementById('playlistsView');

            if (tabName === 'Playlists') {
                activeNavTab = 'Playlists';
                // Home button collapses to round circle
                if (btnHome) btnHome.className = 'w-[50px] h-[50px] rounded-full dock-circle-btn flex items-center justify-center text-white/90 shrink-0 transition-all duration-300';
                if (lblHome) lblHome.classList.add('hidden');

                // Playlists button expands to orange pill
                if (btnPlaylists) btnPlaylists.className = 'h-[50px] px-5 rounded-full pill-active flex items-center gap-2 shrink-0 transition-all duration-300';
                if (lblPlaylists) lblPlaylists.classList.remove('hidden');

                // Switch views
                if (homeView) homeView.classList.add('hidden');
                if (playlistsView) {
                    playlistsView.classList.remove('hidden');
                    closePlaylistDetail(); // reset to plain playlists list
                }
                window.scrollTo({ top: 0, behavior: 'instant' });
            } else {
                activeNavTab = 'Home';
                // Playlists button collapses to round circle
                if (btnPlaylists) btnPlaylists.className = 'w-[50px] h-[50px] rounded-full dock-circle-btn flex items-center justify-center text-white/90 shrink-0 transition-all duration-300';
                if (lblPlaylists) lblPlaylists.classList.add('hidden');

                // Home button expands to orange pill
                if (btnHome) btnHome.className = 'h-[50px] px-5 rounded-full pill-active flex items-center gap-2 shrink-0 transition-all duration-300';
                if (lblHome) lblHome.classList.remove('hidden');

                // Switch views
                if (playlistsView) playlistsView.classList.add('hidden');
                if (homeView) homeView.classList.remove('hidden');
                window.scrollTo({ top: 0, behavior: 'instant' });
            }
        }

        function openPlaylistsModal() {
            navigateToTab('Playlists');
        }

        function closePlaylistsModal() {
            navigateToTab('Home');
        }

        function openPlaylistFromHomepage(title) {
            navigateToTab('Playlists');
            openPlaylistDetail(title);
        }

        function getPlaylistTracks(playlistTitle) {
            const cleanTitle = (playlistTitle || '').toLowerCase();
            const isFav = cleanTitle.includes('favourit') || cleanTitle.includes('favorit');
            
            if (isFav) {
                return songs.filter(s => favoriteSongIds.has(s.id));
            }

            const plObj = playlistsData.find(p => p.title.toLowerCase() === cleanTitle);
            const plSongIds = plObj && plObj.song_ids ? new Set(plObj.song_ids.map(Number)) : new Set();
            
            return songs.filter(s => 
                plSongIds.has(s.id) || 
                (s.album || '').toLowerCase().includes(cleanTitle) || 
                (s.playlist_titles || []).some(t => t.toLowerCase() === cleanTitle)
            );
        }

        function openPlaylistDetail(playlistTitle) {
            currentActivePlaylistTitle = playlistTitle;
            const listSec = document.getElementById('playlistsListSection');
            const detailSec = document.getElementById('playlistDetailSection');
            if (listSec) listSec.classList.add('hidden');
            if (detailSec) detailSec.classList.remove('hidden');

            const tracks = getPlaylistTracks(playlistTitle);
            
            // Set header info
            const titleEl = document.getElementById('detailPlTitle');
            const countEl = document.getElementById('detailPlCount');
            const coverEl = document.getElementById('detailPlCover');

            if (titleEl) titleEl.textContent = playlistTitle;
            if (countEl) countEl.textContent = `${tracks.length} tracks • Audio Playlist`;

            const plObj = playlistsData.find(p => p.title.toLowerCase() === playlistTitle.toLowerCase());
            const coverUrl = (plObj && plObj.cover_url) ? plObj.cover_url : (tracks.length > 0 ? tracks[0].cover : '/storage/covers/NzDjENadvrQ.jpg');
            if (coverEl) coverEl.src = coverUrl;

            // Render tracks
            renderDetailPlaylistTracks(tracks);
            window.scrollTo({ top: 0, behavior: 'instant' });
        }

        function closePlaylistDetail() {
            currentActivePlaylistTitle = '';
            const listSec = document.getElementById('playlistsListSection');
            const detailSec = document.getElementById('playlistDetailSection');
            if (listSec) listSec.classList.remove('hidden');
            if (detailSec) detailSec.classList.add('hidden');
        }

        function renderDetailPlaylistTracks(tracks) {
            const container = document.getElementById('detailPlTracksList');
            if (!container) return;
            container.innerHTML = '';

            if (!tracks || tracks.length === 0) {
                container.innerHTML = `
                    <div class="py-16 text-center text-[#8C827D]">
                        <p class="text-3xl mb-2">🎵</p>
                        <p class="text-sm font-bold text-white">No tracks in this playlist</p>
                        <p class="text-xs text-white/50 mt-1">Player me Heart (❤️) button click karke tracks add karein.</p>
                    </div>
                `;
                return;
            }

            tracks.forEach((track, idx) => {
                const isDl = typeof offlineManager !== 'undefined' && offlineManager.isDownloaded(track.id);
                const row = document.createElement('div');
                row.className = 'flex items-center justify-between p-2.5 rounded-2xl hover:bg-white/5 active:bg-white/10 cursor-pointer transition select-none group border border-transparent hover:border-white/5';
                
                row.onclick = () => {
                    // Queue ONLY this playlist's songs!
                    queueList = [...tracks];
                    playTrack(idx);
                    openNowPlayingModal();
                };

                row.innerHTML = `
                    <div class="flex items-center gap-3 min-w-0 flex-1">
                        <span class="w-5 text-center text-xs font-bold text-white/40 group-hover:text-[#F04E23] shrink-0">${idx + 1}</span>
                        <img src="${track.cover}" class="w-11 h-11 rounded-xl object-cover shrink-0 ring-1 ring-white/10" alt="">
                        <div class="min-w-0 flex-1 text-left">
                            <p class="text-sm font-bold text-white group-hover:text-[#F04E23] transition-colors truncate">${track.title}</p>
                            <p class="text-xs text-[#8C827D] truncate mt-0.5">${track.artist}</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-2.5 shrink-0 ml-2">
                        <span class="text-xs text-[#8C827D] font-medium">${track.duration}</span>
                        ${isDl ? '<span class="w-6 h-6 rounded-full bg-[#F04E23] text-white flex items-center justify-center text-[10px] font-bold"><svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg></span>' : ''}
                        <button class="w-8 h-8 rounded-full bg-white/5 group-hover:bg-[#F04E23] group-hover:text-neutral-950 text-white flex items-center justify-center transition">
                            <svg class="w-3.5 h-3.5 ml-0.5 fill-current" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                        </button>
                    </div>
                `;
                container.appendChild(row);
            });
        }

        function playCurrentPlaylist() {
            if (!currentActivePlaylistTitle) return;
            const tracks = getPlaylistTracks(currentActivePlaylistTitle);
            if (!tracks || tracks.length === 0) {
                showToast('Is playlist me koi song nahi hai');
                return;
            }
            // Queue ONLY this playlist's songs!
            queueList = [...tracks];
            playTrack(0);
            openNowPlayingModal();
            showToast(`Playing: ${currentActivePlaylistTitle} (${tracks.length} tracks) 🎵`);
        }

        function playShuffledCurrentPlaylist() {
            if (!currentActivePlaylistTitle) return;
            const tracks = getPlaylistTracks(currentActivePlaylistTitle);
            if (!tracks || tracks.length === 0) return;

            // Turn on shuffle mode and highlight button in orange
            isShuffle = true;
            if (typeof updateShuffleUI === 'function') {
                updateShuffleUI();
            }

            // Shuffle the playlist tracks randomly
            const shuffledTracks = [...tracks].sort(() => Math.random() - 0.5);
            queueList = shuffledTracks;

            // Play first track of shuffled queue silently WITHOUT any toast or message
            playTrack(0, false);
            openNowPlayingModal();
        }

        // Long-press / Hold on floating playlist play button to trigger shuffle play (NO toast message)
        (function initFloatingPlayBtnHold() {
            const btn = document.getElementById('floatingPlaylistPlayBtn');
            if (!btn) return;

            let holdTimer = null;
            let isHold = false;
            let startX = 0;
            let startY = 0;

            const onStart = (clientX, clientY) => {
                isHold = false;
                startX = clientX;
                startY = clientY;
                btn.style.transform = 'scale(0.92)';

                holdTimer = setTimeout(() => {
                    isHold = true;
                    btn.style.transform = 'scale(1.12)';
                    setTimeout(() => { btn.style.transform = ''; }, 200);
                    if (navigator.vibrate) {
                        try { navigator.vibrate(50); } catch(e) {}
                    }
                    // Start shuffled playlist playback without any toast or message
                    playShuffledCurrentPlaylist();
                }, 450);
            };

            const onMove = (clientX, clientY) => {
                const diff = Math.hypot(clientX - startX, clientY - startY);
                if (diff > 12) {
                    clearTimeout(holdTimer);
                    btn.style.transform = '';
                }
            };

            const onEnd = (e) => {
                clearTimeout(holdTimer);
                btn.style.transform = '';
                if (isHold && e) {
                    e.preventDefault();
                    e.stopPropagation();
                }
            };

            btn.addEventListener('touchstart', (e) => {
                onStart(e.touches[0].clientX, e.touches[0].clientY);
            }, { passive: true });

            btn.addEventListener('touchmove', (e) => {
                onMove(e.touches[0].clientX, e.touches[0].clientY);
            }, { passive: true });

            btn.addEventListener('touchend', onEnd);
            btn.addEventListener('touchcancel', onEnd);

            btn.addEventListener('pointerdown', (e) => {
                if (e.pointerType === 'mouse' && e.button !== 0) return;
                onStart(e.clientX, e.clientY);
            });

            btn.addEventListener('pointermove', (e) => {
                onMove(e.clientX, e.clientY);
            });

            btn.addEventListener('pointerup', onEnd);
            btn.addEventListener('pointercancel', onEnd);

            btn.addEventListener('click', (e) => {
                if (isHold) {
                    e.preventDefault();
                    e.stopPropagation();
                    isHold = false;
                    return;
                }
                playCurrentPlaylist();
            });
        })();

        function toggleDownloadCurrentPlaylist() {
            if (!currentActivePlaylistTitle) return;
            const plObj = playlistsData.find(p => p.title.toLowerCase() === currentActivePlaylistTitle.toLowerCase());
            const pId = plObj ? plObj.id : 999;
            toggleDownloadPlaylist(pId, currentActivePlaylistTitle);
        }

        function playPlaylistTracks(title) {
            const cleanTitle = title.toLowerCase();
            const playlistTracks = getPlaylistTracks(cleanTitle);

            if (playlistTracks.length === 0) {
                showToast(cleanTitle.includes('favourit') ? 'Favourite Songs playlist khali hai' : `Playlist "${title}" me koi track nahi hai`);
                return;
            }

            queueList = [...playlistTracks];
            playTrack(0);
            openNowPlayingModal();
            showToast(`Playing: ${title} (${playlistTracks.length} tracks) 🎵`);
        }

        function shuffleAllTracks() {
            isShuffle = true;
            updateShuffleUI();
            const randIdx = Math.floor(Math.random() * songs.length);
            playTrack(randIdx);
            openNowPlayingModal();
            showToast('🔀 Shuffled All Songs!');
        }

        function toggleSettingsModal() {
            const modal = document.getElementById('settingsModal');
            if (!modal) return;
            modal.classList.toggle('hidden');
            modal.classList.toggle('flex');
        }

        function switchNavTab(tab, el) {
            if (tab === 'Playlists' || tab === 'Home') {
                navigateToTab(tab);
            } else {
                showToast(`${tab} tab active`);
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

        // ==============================================================
        // OFFLINE & APK DOWNLOAD SYSTEM (YT MUSIC STYLE)
        // ==============================================================
        const offlineManager = {
            downloadedSongIds: new Set(JSON.parse(localStorage.getItem('element_offline_songs') || '[]')),
            downloadedPlaylistIds: new Set(JSON.parse(localStorage.getItem('element_offline_playlists') || '[]')),

            isDownloaded(songId) {
                return this.downloadedSongIds.has(Number(songId));
            },

            isPlaylistDownloaded(playlistId) {
                return this.downloadedPlaylistIds.has(Number(playlistId));
            },

            saveState() {
                localStorage.setItem('element_offline_songs', JSON.stringify([...this.downloadedSongIds]));
                localStorage.setItem('element_offline_playlists', JSON.stringify([...this.downloadedPlaylistIds]));
            },

            async downloadSong(songId) {
                const id = Number(songId);
                const song = songs.find(s => s.id === id);
                if (!song) return false;

                try {
                    // Cache audio file in CacheStorage
                    if ('caches' in window) {
                        const audioCache = await caches.open(AUDIO_CACHE);
                        const audioReq = new Request(song.audio, { mode: 'cors' });
                        const audioResp = await fetch(audioReq);
                        if (!audioResp.ok) throw new Error('Audio fetch failed');
                        await audioCache.put(audioReq, audioResp);

                        // Cache cover image
                        if (song.cover) {
                            const coverCache = await caches.open(COVER_CACHE);
                            const coverReq = new Request(song.cover);
                            fetch(coverReq).then(res => {
                                if (res && res.ok) coverCache.put(coverReq, res);
                            }).catch(() => {});
                        }
                    }

                    this.downloadedSongIds.add(id);
                    this.saveState();
                    this.updateSongUI(id, true);
                    if (currentSong() && currentSong().id === id) {
                        this.updatePlayerBtn(true);
                    }
                    return true;
                } catch (err) {
                    console.error('Download error for song', id, err);
                    return false;
                }
            },

            async removeSong(songId) {
                const id = Number(songId);
                const song = songs.find(s => s.id === id);
                if (song && 'caches' in window) {
                    try {
                        const audioCache = await caches.open(AUDIO_CACHE);
                        await audioCache.delete(song.audio);
                    } catch(e) {}
                }
                this.downloadedSongIds.delete(id);
                this.saveState();
                this.updateSongUI(id, false);
                if (currentSong() && currentSong().id === id) {
                    this.updatePlayerBtn(false);
                }
            },

            async downloadPlaylist(playlistId, plTitle, onProgress) {
                const pId = Number(playlistId);
                const plObj = playlistsData.find(p => p.id === pId);
                let songIds = plObj ? plObj.song_ids : [];
                if (!songIds || songIds.length === 0) {
                    const cleanT = plTitle.toLowerCase();
                    songIds = songs.filter(s => (s.album || '').toLowerCase().includes(cleanT) || (s.playlist_titles || []).includes(plTitle)).map(s => s.id);
                }

                const total = songIds.length;
                if (total === 0) {
                    showToast('Is playlist me koi song nahi mila');
                    return;
                }

                showToast(`📥 Downloading "${plTitle}" (0/${total})...`);
                let done = 0;

                for (const sId of songIds) {
                    if (!this.isDownloaded(sId)) {
                        await this.downloadSong(sId);
                    }
                    done++;
                    if (onProgress) onProgress(done, total);
                }

                this.downloadedPlaylistIds.add(pId);
                this.saveState();
                this.updatePlaylistUI(pId, true);
                showToast(`✓ Playlist "${plTitle}" APK me download ho gayi!`);
            },

            updateSongUI(songId, isDl) {
                const btn = document.getElementById(`songDlBtn-${songId}`);
                if (!btn) return;
                if (isDl) {
                    btn.className = 'w-8 h-8 rounded-full bg-[#F04E23] text-white ring-2 ring-[#F04E23]/50 shadow-md shadow-[#F04E23]/25 flex items-center justify-center transition active:scale-90';
                    btn.title = 'Downloaded (Offline) • Click to remove';
                    btn.innerHTML = '<svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>';
                } else {
                    btn.className = 'w-8 h-8 rounded-full bg-white/10 hover:bg-white/20 text-white/70 hover:text-white flex items-center justify-center transition active:scale-90';
                    btn.title = 'Download for Offline Playback';
                    btn.innerHTML = '<svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>';
                }
            },

            updatePlayerBtn(isDl) {
                const btn = document.getElementById('playerDownloadBtn');
                const label = document.getElementById('playerDlLabel');
                const icon = document.getElementById('playerDlIcon');
                if (!btn || !label) return;
                if (isDl) {
                    btn.className = 'h-8 px-3 rounded-full bg-[#F04E23]/20 ring-1 ring-[#F04E23]/50 text-[#F04E23] flex items-center gap-1.5 text-xs font-bold shrink-0 transition';
                    label.textContent = 'Downloaded';
                    if (icon) icon.innerHTML = '<path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>';
                } else {
                    btn.className = 'h-8 px-3 rounded-full glass-pill-inactive flex items-center gap-1.5 text-xs font-medium shrink-0 transition text-white/80 hover:text-white';
                    label.textContent = 'Download';
                    if (icon) icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>';
                }
            },

            updatePlaylistUI(pId, isDl) {
                const elements = [
                    document.getElementById(`plDlBtn-${pId}`),
                    document.getElementById(`spotlightPlDlBtn-${pId}`),
                    document.getElementById(`plCardDlBtn-${pId}`)
                ];
                elements.forEach(btn => {
                    if (!btn) return;
                    const label = btn.querySelector('.pl-dl-label');
                    if (isDl) {
                        btn.className = btn.className.replace('bg-white/10', 'bg-[#F04E23]/25 ring-1 ring-[#F04E23]/60 text-[#F04E23]').replace('bg-black/60', 'bg-[#F04E23]/90 text-white');
                        if (label) label.textContent = '✓ Offline';
                        btn.innerHTML = btn.innerHTML.replace('d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"', 'd="M5 13l4 4L19 7"');
                    }
                });
            },

            initUI() {
                this.downloadedSongIds.forEach(id => this.updateSongUI(id, true));
                this.downloadedPlaylistIds.forEach(id => this.updatePlaylistUI(id, true));
            }
        };

        async function toggleDownloadSong(songId) {
            const id = Number(songId);
            if (offlineManager.isDownloaded(id)) {
                if (confirm('Is song ko offline downloads se delete karein?')) {
                    await offlineManager.removeSong(id);
                    showToast('Song downloads se remove kar diya gaya');
                    if (activeCategory === '📥 Downloads') filterTracks();
                }
            } else {
                const btn = document.getElementById(`songDlBtn-${id}`);
                if (btn) {
                    btn.innerHTML = '<svg class="w-3.5 h-3.5 animate-spin text-[#F04E23]" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>';
                }
                showToast('Song is downloading...');
                const ok = await offlineManager.downloadSong(id);
                if (ok) {
                    showToast('✓ Song downloaded! Offline / APK me available');
                    if (activeCategory === '📥 Downloads') filterTracks();
                } else {
                    showToast('Download error. Dobara koshish karein.');
                    offlineManager.updateSongUI(id, false);
                }
            }
        }

        function toggleDownloadCurrentSong() {
            const song = currentSong();
            if (song) toggleDownloadSong(song.id);
        }

        async function toggleDownloadPlaylist(playlistId, playlistTitle) {
            const pId = Number(playlistId);
            const btn = document.getElementById(`plDlBtn-${pId}`);
            const spotlightBtn = document.getElementById(`spotlightPlDlBtn-${pId}`);
            const setLabel = (text) => {
                if (btn) {
                    const l = btn.querySelector('.pl-dl-label');
                    if (l) l.textContent = text;
                }
                if (spotlightBtn) {
                    const l = spotlightBtn.querySelector('.pl-dl-label');
                    if (l) l.textContent = text;
                }
            };

            setLabel('⏳ Downloading...');
            await offlineManager.downloadPlaylist(pId, playlistTitle, (done, total) => {
                setLabel(`📥 ${done}/${total}`);
            });
            setLabel('✓ Offline');
            if (activeCategory === '📥 Downloads') filterTracks();
        }

        // Initialize active song (Restores last played song consistently across page reloads!)
        if (songs.length > 0) {
            let initialIndex = 0;
            const savedSongId = localStorage.getItem('element_last_song_id');
            if (savedSongId) {
                const foundIdx = songs.findIndex(s => s.id === Number(savedSongId));
                if (foundIdx !== -1) {
                    initialIndex = foundIdx;
                }
            }
            currentTrackIndex = initialIndex;
            const s = songs[initialIndex];
            if (s.audio) {
                audio.src = s.audio;
                audio.load();
            }
            document.getElementById('miniStatusText').textContent = s.title;
            const hpMiniCover = document.getElementById('hpMiniCover');
            if (hpMiniCover) hpMiniCover.src = s.cover;
            const hpMiniTitle = document.getElementById('hpMiniTitle');
            if (hpMiniTitle) hpMiniTitle.textContent = s.title;
            const hpMiniArtist = document.getElementById('hpMiniArtist');
            if (hpMiniArtist) hpMiniArtist.textContent = s.artist;
            const bgBlur = document.getElementById('playerBgBlur');
            if (bgBlur) bgBlur.src = s.cover;
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
            if (typeof updateHeartUI === 'function') {
                updateHeartUI(favoriteSongIds.has(s.id));
            }
            renderQueue();
        }

        // ==============================================================
        // AUTHENTICATION & SECURITY PIN SYSTEM
        // ==============================================================
        const VALID_ACCOUNTS = {
            'shehbazashraf@outlook.com': { pin: '1234', name: 'Shehbaz Ashraf' },
            'huzaifasaleem@outlook.com': { pin: '1234', name: 'Huzaifa Saleem' }
        };
        let currentAuthEmail = 'shehbazashraf@outlook.com';

        function updateUserProfileUI(name, email) {
            const nameEl = document.getElementById('settingsMenuUserName');
            if (nameEl) nameEl.textContent = name;
            const emailEl = document.getElementById('settingsMenuUserEmail');
            if (emailEl) emailEl.textContent = email;
        }

        function checkAuthStatus() {
            const isLoggedIn = localStorage.getItem('element_auth_logged_in') === 'true';
            const savedEmail = localStorage.getItem('element_auth_email') || 'shehbazashraf@outlook.com';
            const account = VALID_ACCOUNTS[savedEmail] || VALID_ACCOUNTS['shehbazashraf@outlook.com'];

            updateUserProfileUI(account.name, savedEmail);

            const loginGate = document.getElementById('loginGate');
            if (!loginGate) return;

            if (isLoggedIn) {
                loginGate.classList.add('hidden');
            } else {
                loginGate.classList.remove('hidden', 'opacity-0', 'pointer-events-none');
                showEmailStep();
            }
        }

        function showEmailStep() {
            const emailStep = document.getElementById('loginEmailStep');
            const pinStep = document.getElementById('loginPinStep');
            const emailError = document.getElementById('loginEmailError');
            if (emailStep) emailStep.classList.remove('hidden');
            if (pinStep) pinStep.classList.add('hidden');
            if (emailError) emailError.classList.add('hidden');
            const emailInput = document.getElementById('loginEmailInput');
            if (emailInput) {
                const savedEmail = localStorage.getItem('element_auth_email');
                if (savedEmail && VALID_ACCOUNTS[savedEmail]) {
                    emailInput.value = savedEmail;
                } else if (!emailInput.value) {
                    emailInput.value = 'shehbazashraf@outlook.com';
                }
                setTimeout(() => emailInput.focus(), 150);
            }
        }

        function backToEmailStep() {
            showEmailStep();
        }

        function handleLoginEmailSubmit() {
            const emailInput = document.getElementById('loginEmailInput');
            const emailError = document.getElementById('loginEmailError');
            const enteredEmail = (emailInput ? emailInput.value : '').trim().toLowerCase();

            if (!enteredEmail) {
                if (emailError) {
                    emailError.textContent = 'Please enter your email address.';
                    emailError.classList.remove('hidden');
                }
                return;
            }

            if (!VALID_ACCOUNTS[enteredEmail]) {
                if (emailError) {
                    emailError.textContent = 'Invalid email. Allowed accounts: shehbazashraf@outlook.com or huzaifasaleem@outlook.com';
                    emailError.classList.remove('hidden');
                }
                return;
            }

            if (emailError) emailError.classList.add('hidden');
            currentAuthEmail = enteredEmail;

            // Switch to Step 2: 4-Digit PIN
            const emailStep = document.getElementById('loginEmailStep');
            const pinStep = document.getElementById('loginPinStep');
            const pinDisplayEmail = document.getElementById('loginPinDisplayEmail');
            if (pinDisplayEmail) pinDisplayEmail.textContent = enteredEmail;

            if (emailStep) emailStep.classList.add('hidden');
            if (pinStep) pinStep.classList.remove('hidden');

            // Clear previous PIN values
            const pinBoxes = document.querySelectorAll('.pin-digit-box');
            pinBoxes.forEach(b => { b.value = ''; b.classList.remove('border-red-500'); });
            const pinError = document.getElementById('loginPinError');
            if (pinError) pinError.classList.add('hidden');

            const firstPinBox = document.querySelector('.pin-digit-box[data-index="0"]');
            if (firstPinBox) setTimeout(() => firstPinBox.focus(), 100);
        }

        function handlePinVerify() {
            const pinBoxes = document.querySelectorAll('.pin-digit-box');
            const enteredPin = Array.from(pinBoxes).map(b => b.value).join('').trim();
            const pinError = document.getElementById('loginPinError');
            const pinContainer = document.getElementById('pinInputsContainer');

            if (enteredPin.length < 4) {
                if (pinError) {
                    pinError.textContent = 'Please enter all 4 digits.';
                    pinError.classList.remove('hidden');
                }
                return;
            }

            const account = VALID_ACCOUNTS[currentAuthEmail];
            if (account && enteredPin === account.pin) {
                if (pinError) pinError.classList.add('hidden');
                localStorage.setItem('element_auth_logged_in', 'true');
                localStorage.setItem('element_auth_email', currentAuthEmail);
                localStorage.setItem('element_auth_name', account.name);

                updateUserProfileUI(account.name, currentAuthEmail);

                const loginGate = document.getElementById('loginGate');
                if (loginGate) {
                    loginGate.classList.add('opacity-0', 'pointer-events-none');
                    setTimeout(() => {
                        loginGate.classList.add('hidden');
                    }, 350);
                }
                showToast(`Welcome to Element, ${account.name}! 🎵`);
            } else {
                if (pinError) {
                    pinError.textContent = 'Incorrect PIN! Try again.';
                    pinError.classList.remove('hidden');
                }
                if (pinContainer) {
                    pinContainer.classList.add('animate-shake');
                    setTimeout(() => pinContainer.classList.remove('animate-shake'), 400);
                }
                pinBoxes.forEach(b => {
                    b.value = '';
                    b.classList.add('border-red-500');
                    setTimeout(() => b.classList.remove('border-red-500'), 1000);
                });
                const firstPinBox = document.querySelector('.pin-digit-box[data-index="0"]');
                if (firstPinBox) firstPinBox.focus();
            }
        }

        function setupPinInputHandlers() {
            const pinBoxes = document.querySelectorAll('.pin-digit-box');
            pinBoxes.forEach((box, idx) => {
                box.addEventListener('input', (e) => {
                    e.target.value = e.target.value.replace(/[^0-9]/g, '');
                    if (e.target.value.length === 1) {
                        if (idx < pinBoxes.length - 1) {
                            pinBoxes[idx + 1].focus();
                        } else {
                            handlePinVerify();
                        }
                    }
                });

                box.addEventListener('keydown', (e) => {
                    if (e.key === 'Backspace') {
                        if (!e.target.value && idx > 0) {
                            pinBoxes[idx - 1].focus();
                        }
                    } else if (e.key === 'Enter') {
                        handlePinVerify();
                    }
                });

                box.addEventListener('paste', (e) => {
                    e.preventDefault();
                    const pastedData = (e.clipboardData || window.clipboardData).getData('text').trim().replace(/[^0-9]/g, '');
                    if (pastedData) {
                        for (let i = 0; i < pinBoxes.length; i++) {
                            pinBoxes[i].value = pastedData[i] || '';
                        }
                        if (pastedData.length >= 4) {
                            pinBoxes[3].focus();
                            handlePinVerify();
                        } else {
                            const nextEmpty = Math.min(pastedData.length, pinBoxes.length - 1);
                            pinBoxes[nextEmpty].focus();
                        }
                    }
                });
            });

            const emailInput = document.getElementById('loginEmailInput');
            if (emailInput) {
                emailInput.addEventListener('keydown', (e) => {
                    if (e.key === 'Enter') handleLoginEmailSubmit();
                });
            }
        }

        function logoutUser() {
            localStorage.removeItem('element_auth_logged_in');
            const settingsModal = document.getElementById('settingsModal');
            if (settingsModal) {
                settingsModal.classList.add('hidden');
                settingsModal.classList.remove('flex');
            }
            checkAuthStatus();
            showToast('Logged out successfully');
        }

        // ==============================================================
        // PROFILE PICTURE (DP) SYSTEM
        // ==============================================================
        function openDpModal() {
            const modal = document.getElementById('dpModal');
            if (!modal) return;
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeDpModal() {
            const modal = document.getElementById('dpModal');
            if (!modal) return;
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }

        function triggerDpUpload() {
            const fileInput = document.getElementById('dpFileInput');
            if (fileInput) fileInput.click();
        }

        function handleDpFileSelected(event) {
            const file = event.target.files && event.target.files[0];
            if (!file) return;

            if (!file.type.startsWith('image/')) {
                showToast('Please select a valid image file');
                return;
            }

            const reader = new FileReader();
            reader.onload = function(e) {
                const base64Data = e.target.result;
                try {
                    localStorage.setItem('element_user_dp', base64Data);
                } catch(err) {
                    console.warn('LocalStorage save error:', err);
                }
                updateAllAvatarImages(base64Data);
                closeDpModal();
                showToast('✓ Profile picture updated!');
            };
            reader.readAsDataURL(file);
        }

        function updateAllAvatarImages(imgUrl) {
            const headerAvatar = document.getElementById('headerProfileAvatar');
            if (headerAvatar) headerAvatar.src = imgUrl;

            const modalPreview = document.getElementById('dpModalPreview');
            if (modalPreview) modalPreview.src = imgUrl;

            const menuAvatar = document.getElementById('settingsMenuAvatar');
            if (menuAvatar) menuAvatar.src = imgUrl;
        }

        function initProfileDp() {
            const savedDp = localStorage.getItem('element_user_dp');
            if (savedDp) {
                updateAllAvatarImages(savedDp);
            }
        }

        // Initialize Auth and Profile DP
        setupPinInputHandlers();
        checkAuthStatus();
        initProfileDp();

        // Initialize offline UI badges from saved state
        offlineManager.initUI();
    </script>
</body>
</html>
