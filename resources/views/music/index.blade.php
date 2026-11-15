<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Liquid Glass Music App Homepage UI</title>
  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Google Fonts: Plus Jakarta Sans & Inter -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap" rel="stylesheet">

  <style>
    :root {
      /* Primary Colors */
      --color-primary: #F04E23;
      --color-primary-glow: rgba(240, 78, 35, 0.45);
      --bg-base: #0D0705;

      /* Secondary Ambient Colors */
      --bg-gradient-top: #5A2311;
      --bg-gradient-mid: #2B1108;
      --surface-pill-inactive: rgba(255, 255, 255, 0.11);
      --surface-bottom-dock: rgba(28, 25, 24, 0.90);

      /* Tertiary Liquid Glass Surfaces & Rim Highlights */
      --surface-nav-icon: rgba(255, 255, 255, 0.14);
      --surface-card-glass: rgba(34, 28, 24, 0.56);
      --border-glass: rgba(255, 255, 255, 0.24);
      --border-glass-subtle: rgba(255, 255, 255, 0.14);

      /* Neutrals */
      --text-primary: #FFFFFF;
      --text-secondary: #D6CFCB;
      --text-muted: #8C827D;
      --text-on-primary: #121212;
    }

    /* Crimson Liquid Theme Option (from first glassmorphism reference) */
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
      background-color: #DCDCDC;
      margin: 0;
      padding: 0;
      overflow-x: hidden;
      user-select: none;
    }

    /* Hide scrollbars for horizontal carousels */
    .no-scrollbar::-webkit-scrollbar {
      display: none;
    }
    .no-scrollbar {
      -ms-overflow-style: none;
      scrollbar-width: none;
    }

    /* App Ambient Background matching the reference screenshot */
    .app-surface-bg {
      background-color: var(--bg-base);
      background-image: 
        radial-gradient(circle at 18% 12%, var(--bg-gradient-top) 0%, var(--bg-gradient-mid) 36%, var(--bg-base) 72%),
        radial-gradient(circle at 85% 28%, rgba(90, 35, 17, 0.35) 0%, transparent 55%);
      transition: background 0.4s ease;
    }

    /* 3D Liquid Glassmorphism Menu Circle */
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

    /* Inactive Filter Pill (Warm Glass Surface) */
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

    /* Active Primary Pill (#F04E23) */
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

    /* Hero Card Frosted Glass Overlay (Saturday Party Tonight box) */
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

    /* Bottom Navigation Dock */
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

    /* Inactive Circular Button in Bottom Dock */
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

    /* Phone Mockup Frame Bezel */
    .phone-frame {
      width: 392px;
      height: 844px;
      border-radius: 56px;
      border: 6px solid #FFFFFF;
      box-shadow: 
        0 30px 70px rgba(0, 0, 0, 0.32),
        0 8px 24px rgba(0, 0, 0, 0.18),
        inset 0 0 0 2px rgba(0, 0, 0, 0.6);
      position: relative;
      overflow: hidden;
      flex-shrink: 0;
      transition: all 0.4s cubic-bezier(0.22, 1, 0.36, 1);
    }

    /* Full Screen Mode Override */
    .fullscreen-mode .phone-frame {
      width: 100%;
      max-width: 1120px;
      height: 88vh;
      min-height: 700px;
      border-radius: 36px;
      border-width: 4px;
    }

    /* Equalizer Bars Animation */
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

    /* Custom Sunset Silhouette Artwork Recreation matching screenshot */
    .sunset-silhouette-art {
      background: linear-gradient(155deg, #D9CEBA 0%, #F79433 38%, #E64817 58%, #1E4E56 80%, #10252A 100%);
    }
  </style>
</head>
<body class="min-h-screen flex flex-col items-center justify-center p-2 sm:p-6 bg-[#DFDFDF] transition-colors duration-300" id="bodyRoot">

  <!-- Top Floating Control Bar (Outside Phone Frame for inspecting Colors, View Mode & Theme) -->
  <div class="w-full max-w-xl mb-4 flex flex-wrap items-center justify-between gap-2 px-4 py-2.5 rounded-full bg-neutral-900/90 text-white backdrop-blur-xl shadow-lg border border-white/15 text-xs sm:text-sm z-30">
    <div class="flex items-center gap-2">
      <span class="inline-block w-3 h-3 rounded-full bg-[#F04E23] ring-2 ring-white/30" id="activeSwatchIndicator"></span>
      <span class="font-semibold tracking-tight">UI Preview</span>
      <button onclick="togglePaletteModal()" class="ml-1 px-2.5 py-1 rounded-full bg-white/10 hover:bg-white/20 text-white/90 transition flex items-center gap-1 text-xs">
        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"/></svg>
        Color Codes
      </button>
    </div>

    <div class="flex items-center gap-1.5">
      <!-- Theme Switcher -->
      <button onclick="switchTheme('rust')" id="btnThemeRust" class="px-2.5 py-1 rounded-full bg-[#F04E23] text-neutral-950 font-semibold text-xs transition">
        Rust #F04E23
      </button>
      <button onclick="switchTheme('crimson')" id="btnThemeCrimson" class="px-2.5 py-1 rounded-full bg-white/10 hover:bg-white/20 text-white/80 font-medium text-xs transition">
        Glass Red #FA524B
      </button>
      <!-- Layout Switcher -->
      <button onclick="toggleLayoutMode()" id="btnLayoutMode" class="hidden sm:inline-flex px-2.5 py-1 rounded-full bg-white/10 hover:bg-white/20 text-white/90 font-medium text-xs transition ml-1">
        Expand View
      </button>
    </div>
  </div>

  <!-- PHONE FRAME CONTAINER -->
  <div id="layoutWrapper" class="flex items-center justify-center w-full">
    <main class="phone-frame app-surface-bg flex flex-col justify-between text-white select-none" id="appContainer">

      <!-- 1. iOS STATUS BAR & DYNAMIC ISLAND -->
      <header class="w-full pt-3.5 pb-2 px-7 flex items-center justify-between z-20 shrink-0">
        <!-- Time -->
        <span class="text-[16px] font-semibold tracking-tight text-white/95">9:41</span>

        <!-- Dynamic Island Notch -->
        <div onclick="openNowPlayingModal()" class="w-[116px] h-[34px] bg-black rounded-full flex items-center justify-between px-3 cursor-pointer shadow-inner border border-white/5 group transition-transform hover:scale-105" title="Click to open Now Playing">
          <!-- Camera Lens dot -->
          <div class="flex items-center gap-1.5">
            <span class="w-2 h-2 rounded-full bg-[#F04E23] animate-pulse" id="islandLiveDot"></span>
          </div>
          <div class="w-3.5 h-3.5 rounded-full bg-[#0d1326] border border-indigo-900/60 flex items-center justify-center">
            <div class="w-1.5 h-1.5 rounded-full bg-indigo-400/50"></div>
          </div>
        </div>

        <!-- Status Icons (Signal, WiFi, Battery) -->
        <div class="flex items-center gap-1.5 text-white/95">
          <!-- Signal Bars -->
          <svg class="w-[17px] h-[12px]" viewBox="0 0 18 12" fill="currentColor">
            <rect x="0" y="7.5" width="3" height="4.5" rx="1"/>
            <rect x="4.5" y="5.5" width="3" height="6.5" rx="1"/>
            <rect x="9" y="3" width="3" height="9" rx="1"/>
            <rect x="13.5" y="0.5" width="3" height="11.5" rx="1" opacity="0.4"/>
          </svg>
          <!-- Wi-Fi -->
          <svg class="w-[16px] h-[12px]" viewBox="0 0 16 12" fill="currentColor">
            <path d="M8 9.5a1.5 1.5 0 100 3 1.5 1.5 0 000-3zm-3.6-1.8a5.5 5.5 0 017.2 0l1.2-1.4a7.3 7.3 0 00-9.6 0l1.2 1.4zm-2.8-2.9a9.5 9.5 0 0112.8 0l1.2-1.4a11.3 11.3 0 00-15.2 0l1.2 1.4z"/>
          </svg>
          <!-- Battery -->
          <div class="flex items-center">
            <div class="w-[23px] h-[12px] rounded-[4px] border border-white/40 p-[1.5px] flex items-center">
              <div class="w-[78%] h-full bg-white rounded-[2px]"></div>
            </div>
            <div class="w-[1.5px] h-[4px] bg-white/40 rounded-r-full ml-[1px]"></div>
          </div>
        </div>
      </header>

      <!-- SCROLLABLE MAIN CONTENT AREA -->
      <div class="flex-1 overflow-y-auto no-scrollbar pb-28 pt-1">

        <!-- 2. TOP MENU BUTTON ROW -->
        <div class="px-5 pt-2 pb-4 flex items-center justify-between">
          <button onclick="toggleDrawerMenu()" aria-label="Menu" class="w-[48px] h-[48px] rounded-full liquid-circle-btn flex flex-col items-start justify-center pl-[15px] gap-[4px]">
            <span class="w-[16px] h-[1.8px] bg-white rounded-full"></span>
            <span class="w-[13px] h-[1.8px] bg-white/90 rounded-full"></span>
            <span class="w-[9px] h-[1.8px] bg-white/80 rounded-full"></span>
          </button>

          <!-- Live Equalizer Mini Chip (shows current track status) -->
          <button onclick="openNowPlayingModal()" class="glass-pill-inactive px-3.5 py-2 rounded-full flex items-center gap-2.5 text-xs">
            <div id="headerEq" class="flex items-end gap-[2.5px] h-3.5">
              <span class="w-[2.5px] bg-[#F04E23] rounded-full eq-bar-1"></span>
              <span class="w-[2.5px] bg-[#F04E23] rounded-full eq-bar-2"></span>
              <span class="w-[2.5px] bg-[#F04E23] rounded-full eq-bar-3"></span>
            </div>
            <span id="miniStatusText" class="text-white/90 font-medium truncate max-w-[135px]">Saturday Party Tonight</span>
          </button>
        </div>

        <!-- 3. TRENDING SECTION & FILTER PILLS -->
        <section class="mt-1">
          <div class="px-5 mb-3.5">
            <h1 class="text-[22px] font-semibold tracking-tight text-white">Trending</h1>
          </div>

          <!-- Horizontal Filter Pills matching screenshot ("All", "Music", "Wrapped", "Wrapped") -->
          <div class="flex items-center gap-2.5 overflow-x-auto no-scrollbar px-5 pb-1" id="categoryPillsContainer">
            <button onclick="selectCategory('All', this)" class="pill-active px-[22px] py-[11px] rounded-full text-[14px] shrink-0">
              All
            </button>
            <button onclick="selectCategory('Music', this)" class="glass-pill-inactive px-[24px] py-[11px] rounded-full text-[14px] font-medium shrink-0">
              Music
            </button>
            <button onclick="selectCategory('Wrapped', this)" class="glass-pill-inactive px-[24px] py-[11px] rounded-full text-[14px] font-medium shrink-0">
              Wrapped
            </button>
            <button onclick="selectCategory('Party', this)" class="glass-pill-inactive px-[24px] py-[11px] rounded-full text-[14px] font-medium shrink-0">
              Wrapped
            </button>
            <button onclick="selectCategory('Podcasts', this)" class="glass-pill-inactive px-[22px] py-[11px] rounded-full text-[14px] font-medium shrink-0">
              Podcasts
            </button>
          </div>
        </section>

        <!-- 4. "TO GET YOU STARTED" HERO CAROUSEL -->
        <section class="mt-6">
          <div class="px-5 mb-3.5 flex items-center justify-between">
            <h2 class="text-[21px] font-semibold tracking-tight text-white">To get you started</h2>
            <button onclick="showToast('Showing all featured mixes')" class="text-[14px] font-medium text-[#8C827D] hover:text-white transition">
              See all
            </button>
          </div>

          <!-- Horizontal Snap Carousel -->
          <div class="flex items-center gap-4 overflow-x-auto no-scrollbar px-5 snap-x snap-mandatory" id="heroCarousel">
            
            <!-- HERO CARD 1: Exact recreation of "Saturday Party Tonight - Sharib Toshi" -->
            <article onclick="playTrack(0)" class="relative w-[292px] h-[288px] rounded-[34px] overflow-hidden shrink-0 snap-start cursor-pointer group shadow-2xl border border-white/10">
              <!-- Sunset Glow Silhouette Visual (SVG + CSS Gradient matching the screenshot) -->
              <div class="absolute inset-0 sunset-silhouette-art transition-transform duration-500 group-hover:scale-105">
                <!-- Distant city shadow -->
                <div class="absolute bottom-0 left-4 w-16 h-32 bg-[#0d1f24]/80 blur-[2px] rounded-t-xl"></div>
                <!-- Silhouette Person & Sunset Glow -->
                <svg class="absolute inset-0 w-full h-full object-cover" viewBox="0 0 300 300" xmlns="http://www.w3.org/2000/svg">
                  <defs>
                    <radialGradient id="sunGlow" cx="46%" cy="38%" r="34%">
                      <stop offset="0%" stop-color="#FF6B00" />
                      <stop offset="55%" stop-color="#FF3D00" stop-opacity="0.85" />
                      <stop offset="100%" stop-color="#FF3D00" stop-opacity="0" />
                    </radialGradient>
                    <linearGradient id="hoodieGrad" x1="0" y1="0" x2="1" y2="1">
                      <stop offset="0%" stop-color="#22353C" />
                      <stop offset="55%" stop-color="#D97B29" />
                      <stop offset="100%" stop-color="#5E2B14" />
                    </linearGradient>
                  </defs>
                  <!-- Head & Neck Silhouette -->
                  <path d="M110,120 C110,75 182,75 182,120 C182,132 186,134 185,142 C184,150 178,150 176,154 C172,168 164,175 162,188 L128,188 C126,174 115,165 112,148 C110,136 110,128 110,120 Z" fill="#6E2214" />
                  <!-- Intense Orange Sunset Sun Overlay across the face -->
                  <circle cx="142" cy="116" r="56" fill="url(#sunGlow)" />
                  <!-- Hoodie / Collar Silhouette -->
                  <path d="M55,300 C62,235 88,215 112,205 C120,192 165,185 188,195 C215,212 238,242 248,300 Z" fill="url(#hoodieGrad)" />
                  <!-- Golden Rim Highlight on Hoodie -->
                  <path d="M135,196 C158,186 184,185 198,204 L165,214 Z" fill="#FFA133" opacity="0.85" />
                </svg>

                <!-- Bottom bold condensed typography visible behind glass box ("DIFFERENT") -->
                <div class="absolute -bottom-3 left-0 right-0 text-center font-extrabold text-[34px] tracking-widest text-[#F7E6C4] opacity-90 select-none pointer-events-none">
                  DIFFERENT
                </div>
              </div>

              <!-- Play Button Badge on Hover -->
              <div class="absolute top-4 right-4 w-10 h-10 rounded-full bg-[#F04E23] text-neutral-950 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all duration-300 shadow-lg scale-90 group-hover:scale-100">
                <svg class="w-5 h-5 ml-0.5" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
              </div>

              <!-- Liquid Frosted Glass Inner Pill Card -->
              <div class="absolute bottom-[14px] left-[14px] right-[14px] h-[74px] rounded-[24px] hero-glass-overlay px-5 flex flex-col justify-center">
                <div class="flex items-center justify-between">
                  <div class="pr-2">
                    <h3 class="text-[17px] font-semibold text-white leading-snug tracking-tight">Saturday Party Tonight</h3>
                    <p class="text-[13.5px] font-normal text-[#D6CFCB] mt-0.5">Sharib Toshi</p>
                  </div>
                  <div class="w-8 h-8 rounded-full bg-white/15 border border-white/25 flex items-center justify-center shrink-0">
                    <svg class="w-4 h-4 text-white ml-0.5" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                  </div>
                </div>
              </div>
            </article>

            <!-- HERO CARD 2: Peeking Card on Right (Neon Night Aesthetic matching screenshot) -->
            <article onclick="playTrack(1)" class="relative w-[292px] h-[288px] rounded-[34px] overflow-hidden shrink-0 snap-start cursor-pointer group shadow-2xl border border-white/10">
              <!-- Dark Neon Brick Wall Visual -->
              <div class="absolute inset-0 bg-gradient-to-br from-[#121619] via-[#1C140D] to-[#0A0908] transition-transform duration-500 group-hover:scale-105">
                <!-- Industrial Scaffolding & Neon Glow -->
                <div class="absolute inset-y-0 left-0 w-12 border-r border-white/10 bg-black/40 flex flex-col justify-between py-2">
                  <div class="h-8 border-b border-white/10 skew-y-12"></div>
                  <div class="h-8 border-b border-white/10 -skew-y-12"></div>
                  <div class="h-8 border-b border-white/10 skew-y-12"></div>
                  <div class="h-8 border-b border-white/10 -skew-y-12"></div>
                </div>
                <!-- Warm Neon Sign Glow -->
                <div class="absolute top-8 right-8 w-36 h-36 rounded-full bg-amber-500/30 blur-2xl"></div>
                <div class="absolute top-10 left-20 right-6 h-36 rounded-2xl border-2 border-amber-200/80 shadow-[0_0_25px_rgba(251,191,36,0.6)] flex flex-col items-center justify-center p-4">
                  <span class="text-2xl font-extrabold tracking-widest text-white drop-shadow-[0_0_10px_rgba(255,255,255,0.9)]">NIGHT</span>
                  <span class="text-xs uppercase tracking-[0.3em] text-amber-200 mt-1">SESSIONS</span>
                </div>
                <div class="absolute bottom-24 left-4 text-[10px] font-bold tracking-wider text-white/75 uppercase leading-tight">
                  HOOKAH LOUNGE<br/>DRINKS & VIBES<br/>FOR TONIGHT
                </div>
              </div>

              <!-- Liquid Frosted Glass Inner Pill Card -->
              <div class="absolute bottom-[14px] left-[14px] right-[14px] h-[74px] rounded-[24px] hero-glass-overlay px-5 flex flex-col justify-center">
                <div class="flex items-center justify-between">
                  <div class="pr-2">
                    <h3 class="text-[17px] font-semibold text-white leading-snug tracking-tight">Saturday Night Vibes</h3>
                    <p class="text-[13.5px] font-normal text-[#D6CFCB] mt-0.5">Sharib Toshi & Kanika</p>
                  </div>
                  <div class="w-8 h-8 rounded-full bg-white/15 border border-white/25 flex items-center justify-center shrink-0">
                    <svg class="w-4 h-4 text-white ml-0.5" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                  </div>
                </div>
              </div>
            </article>

            <!-- HERO CARD 3: Extra Card for smooth scrolling -->
            <article onclick="playTrack(2)" class="relative w-[292px] h-[288px] rounded-[34px] overflow-hidden shrink-0 snap-start cursor-pointer group shadow-2xl border border-white/10">
              <div class="absolute inset-0 bg-gradient-to-br from-[#4A1215] via-[#9E1F24] to-[#1A0507] transition-transform duration-500 group-hover:scale-105 flex items-center justify-center">
                <div class="w-40 h-40 rounded-full bg-[#FA524B]/30 blur-xl"></div>
                <div class="text-center z-10">
                  <span class="px-3 py-1 rounded-full bg-white/15 border border-white/25 text-[11px] uppercase tracking-widest text-white">Liquid Mix</span>
                  <h4 class="text-3xl font-extrabold text-white mt-2 tracking-tight"> crimson</h4>
                </div>
              </div>
              <div class="absolute bottom-[14px] left-[14px] right-[14px] h-[74px] rounded-[24px] hero-glass-overlay px-5 flex flex-col justify-center">
                <div class="flex items-center justify-between">
                  <div class="pr-2">
                    <h3 class="text-[17px] font-semibold text-white leading-snug tracking-tight"> Crimson Glass</h3>
                    <p class="text-[13.5px] font-normal text-[#D6CFCB] mt-0.5">Atif Aslam & Pritam</p>
                  </div>
                  <div class="w-8 h-8 rounded-full bg-white/15 border border-white/25 flex items-center justify-center shrink-0">
                    <svg class="w-4 h-4 text-white ml-0.5" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                  </div>
                </div>
              </div>
            </article>

          </div>
        </section>

        <!-- 5. "POPULAR SONGS" SECTION -->
        <section class="mt-6">
          <div class="px-5 mb-3.5 flex items-center justify-between">
            <h2 class="text-[21px] font-semibold tracking-tight text-white">Popular songs</h2>
            <button onclick="showToast('Loading top 50 popular songs')" class="text-[14px] font-medium text-[#8C827D] hover:text-white transition">
              See all
            </button>
          </div>

          <!-- Horizontal Scrollable Cards Row matching screenshot -->
          <div class="flex items-start gap-3.5 overflow-x-auto no-scrollbar px-5">
            
            <!-- Popular Card 1: "DLA CIEBIE" Romantic Bokeh Cover -->
            <div onclick="playTrack(3)" class="w-[140px] shrink-0 cursor-pointer group">
              <div class="relative w-[140px] h-[142px] rounded-[24px] overflow-hidden border border-white/10 shadow-lg bg-[#1F1410]">
                <!-- Romantic Warm Bokeh & Couple Silhouette SVG -->
                <div class="absolute inset-0 bg-gradient-to-b from-[#2A1812] via-[#543426] to-[#1A110E] group-hover:scale-105 transition-transform duration-500">
                  <!-- Warm Fairy Lights Bokeh -->
                  <div class="absolute top-3 left-4 w-2 h-2 rounded-full bg-amber-200/80 blur-[1px]"></div>
                  <div class="absolute top-6 left-10 w-1.5 h-1.5 rounded-full bg-amber-100/90"></div>
                  <div class="absolute top-4 right-6 w-2.5 h-2.5 rounded-full bg-orange-300/60 blur-[1px]"></div>
                  <div class="absolute top-12 right-4 w-1.5 h-1.5 rounded-full bg-amber-100/80"></div>
                  <div class="absolute top-8 left-20 w-2 h-2 rounded-full bg-amber-200/70 blur-[1px]"></div>

                  <!-- Couple Portrait Illustration -->
                  <svg class="absolute inset-0 w-full h-full" viewBox="0 0 140 140">
                    <!-- Groom Left -->
                    <circle cx="56" cy="48" r="14" fill="#E0AC8B"/>
                    <path d="M42,40 C42,30 68,30 68,42 C60,38 48,40 42,40 Z" fill="#1F130E"/>
                    <path d="M26,140 C28,92 42,74 68,74 L74,140 Z" fill="#EDEAE6"/>
                    <line x1="48" y1="78" x2="46" y2="135" stroke="#2B1D18" stroke-width="2.5"/>
                    <!-- Bride Right -->
                    <circle cx="84" cy="56" r="13" fill="#E6B89C"/>
                    <path d="M74,46 C84,40 102,48 98,64 C92,58 82,52 74,46 Z" fill="#231510"/>
                    <path d="M64,140 C66,98 78,84 112,88 L118,140 Z" fill="#F7F4F0"/>
                  </svg>
                </div>

                <!-- Overlay Title matching "DLA CIEBIE" -->
                <div class="absolute inset-x-2 bottom-5 text-center">
                  <span class="text-[14.5px] font-extrabold tracking-tight text-white drop-shadow-[0_2px_6px_rgba(0,0,0,0.9)]">
                    DLA CIEBIE
                  </span>
                </div>
              </div>
              <p class="mt-2 text-[13px] font-medium text-white/90 truncate pl-1">Dla Ciebie</p>
              <p class="text-[11.5px] text-[#8C827D] truncate pl-1">Romantic Acoustic</p>
            </div>

            <!-- Popular Card 2: "FAZEI ISSO EM MEMÓRIA DE MIM" Dark Warm Hand Cover -->
            <div onclick="playTrack(4)" class="w-[140px] shrink-0 cursor-pointer group">
              <div class="relative w-[140px] h-[142px] rounded-[24px] overflow-hidden border border-white/10 shadow-lg bg-[#140B08]">
                <div class="absolute inset-0 bg-gradient-to-r from-[#0B0D11] via-[#261109] to-[#9E380E] group-hover:scale-105 transition-transform duration-500">
                  <!-- Stylized Hand Holding Light/Bread Silhouette -->
                  <svg class="absolute inset-0 w-full h-full" viewBox="0 0 140 140">
                    <!-- Arm & Fingers -->
                    <path d="M58,140 L62,102 C52,92 50,74 56,58 C60,48 76,46 82,56 C88,68 88,88 80,104 L82,140 Z" fill="#A85834"/>
                    <path d="M58,64 C66,60 76,62 78,68" stroke="#361509" stroke-width="3" fill="none" stroke-linecap="round"/>
                    <path d="M56,74 C66,70 76,72 78,78" stroke="#361509" stroke-width="3" fill="none" stroke-linecap="round"/>
                    <path d="M58,84 C66,80 74,82 76,88" stroke="#361509" stroke-width="3" fill="none" stroke-linecap="round"/>
                    <!-- Top Rim Light -->
                    <ellipse cx="68" cy="48" rx="10" ry="3.5" fill="#FFE0B2"/>
                  </svg>
                  <!-- Split Typography Left & Right -->
                  <div class="absolute top-1/2 -translate-y-1/2 left-2.5 text-[7.5px] font-semibold tracking-wider text-white/85 uppercase leading-tight">
                    FAZEI<br/>ISSO EM
                  </div>
                  <div class="absolute top-1/2 -translate-y-1/2 right-2.5 text-[7.5px] font-semibold tracking-wider text-amber-200/80 uppercase leading-tight">
                    MEMÓRIA<br/>DE MIM
                  </div>
                </div>
              </div>
              <p class="mt-2 text-[13px] font-medium text-white/90 truncate pl-1">Memória De Mim</p>
              <p class="text-[11.5px] text-[#8C827D] truncate pl-1">Soul Sessions</p>
            </div>

            <!-- Popular Card 3: Neon Purple Profile Cover (Peeking on Right in Screenshot) -->
            <div onclick="playTrack(5)" class="w-[140px] shrink-0 cursor-pointer group">
              <div class="relative w-[140px] h-[142px] rounded-[24px] overflow-hidden border border-white/10 shadow-lg bg-[#160B24]">
                <div class="absolute inset-0 bg-gradient-to-br from-[#2B0945] via-[#6A1B9A] to-[#12041C] group-hover:scale-105 transition-transform duration-500">
                  <!-- Purple Neon Portrait Silhouette -->
                  <svg class="absolute inset-0 w-full h-full" viewBox="0 0 140 140">
                    <circle cx="90" cy="54" r="24" fill="#BA68C8" opacity="0.85"/>
                    <path d="M55,140 C60,104 78,92 115,92 L125,140 Z" fill="#1A062B"/>
                  </svg>
                  <div class="absolute bottom-3 left-3 right-3 flex items-center justify-between">
                    <span class="w-4 h-4 rounded-full bg-white/20 text-[8px] flex items-center justify-center font-bold">A</span>
                    <span class="text-[13px] font-black tracking-wider text-white">TUDO</span>
                  </div>
                </div>
              </div>
              <p class="mt-2 text-[13px] font-medium text-white/90 truncate pl-1">Fantasy Night</p>
              <p class="text-[11.5px] text-[#8C827D] truncate pl-1">Vibra Mix</p>
            </div>

          </div>
        </section>

      </div>

      <!-- 6. FLOATING BOTTOM NAVIGATION BAR (Exact match to screenshot) -->
      <nav aria-label="Bottom Navigation" class="absolute bottom-5 left-4 right-4 h-[72px] rounded-full bottom-nav-dock px-2.5 flex items-center justify-between z-20">
        
        <!-- Active "Home" Pill Button (#F04E23 with #121212 icon & label) -->
        <button onclick="switchNavTab('Home', this)" id="navHomeBtn" class="h-[54px] px-6 rounded-full pill-active flex items-center gap-2.5 shrink-0">
          <!-- Solid Penthouse/Home Icon matching screenshot -->
          <svg class="w-[20px] h-[20px]" viewBox="0 0 24 24" fill="currentColor">
            <path d="M12 3.2L4 9.6V20.5C4 21.05 4.45 21.5 5 21.5H19C19.55 21.5 20 21.05 20 20.5V9.6L12 3.2ZM12 13.5C11.17 13.5 10.5 12.83 10.5 12C10.5 11.17 11.17 10.5 12 10.5C12.83 10.5 13.5 11.17 13.5 12C13.5 12.83 12.83 13.5 12 13.5Z"/>
          </svg>
          <span class="text-[15.5px] font-semibold tracking-tight">Home</span>
        </button>

        <!-- Inactive Circular Glass Button 1: Search -->
        <button onclick="switchNavTab('Search', this)" aria-label="Search" class="w-[54px] h-[54px] rounded-full dock-circle-btn flex items-center justify-center text-white/90 shrink-0">
          <svg class="w-[22px] h-[22px]" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
            <circle cx="11" cy="11" r="7"></circle>
            <line x1="20" y1="20" x2="16.2" y2="16.2" stroke-linecap="round"></line>
          </svg>
        </button>

        <!-- Inactive Circular Glass Button 2: Library Books/Playlists -->
        <button onclick="switchNavTab('Library', this)" aria-label="Library" class="w-[54px] h-[54px] rounded-full dock-circle-btn flex items-center justify-center text-white/90 shrink-0">
          <svg class="w-[21px] h-[21px]" fill="none" stroke="currentColor" stroke-width="1.7" viewBox="0 0 24 24">
            <rect x="4" y="4" width="5" height="16" rx="1.5"></rect>
            <rect x="9.5" y="4" width="5" height="16" rx="1.5"></rect>
            <path d="M15.5 4.5L20 19.2" stroke-linecap="round"></path>
            <line x1="6.5" y1="8" x2="6.5" y2="8.01" stroke-width="2" stroke-linecap="round"></line>
            <line x1="12" y1="8" x2="12" y2="8.01" stroke-width="2" stroke-linecap="round"></line>
          </svg>
        </button>

        <!-- Inactive Circular Glass Button 3: Disc / Profile -->
        <button onclick="switchNavTab('Disc', this)" aria-label="Audio Disc" class="w-[54px] h-[54px] rounded-full dock-circle-btn flex items-center justify-center text-white/90 shrink-0">
          <svg class="w-[22px] h-[22px]" fill="none" stroke="currentColor" stroke-width="1.7" viewBox="0 0 24 24">
            <circle cx="12" cy="12" r="8"></circle>
            <circle cx="12" cy="12" r="3"></circle>
            <path d="M12 7a5 5 0 0 0-5 5" stroke-linecap="round"></path>
          </svg>
        </button>

      </nav>

      <!-- INTERACTIVE NOW PLAYING LIQUID GLASS DRAWER -->
      <div id="nowPlayingModal" class="absolute inset-0 bg-black/75 backdrop-blur-2xl z-30 translate-y-full transition-transform duration-500 ease-out flex flex-col justify-between p-6">
        <div class="flex items-center justify-between">
          <button onclick="closeNowPlayingModal()" class="w-10 h-10 rounded-full liquid-circle-btn flex items-center justify-center text-white">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
          </button>
          <span class="text-xs font-semibold uppercase tracking-widest text-[#D6CFCB]">Now Playing</span>
          <button onclick="showToast('Added to Liked Songs')" class="w-10 h-10 rounded-full liquid-circle-btn flex items-center justify-center text-[#F04E23]">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
          </button>
        </div>

        <!-- Artwork Preview -->
        <div class="my-auto flex flex-col items-center">
          <div class="w-64 h-64 rounded-[36px] sunset-silhouette-art shadow-2xl border border-white/20 flex items-end p-4 relative overflow-hidden">
            <div class="w-full hero-glass-overlay rounded-2xl p-3 text-center">
              <p id="modalTrackTitle" class="text-base font-bold text-white">Saturday Party Tonight</p>
              <p id="modalTrackArtist" class="text-xs text-[#D6CFCB] mt-0.5">Sharib Toshi</p>
            </div>
          </div>

          <!-- Progress Scrubber -->
          <div class="w-full mt-8">
            <input type="range" min="0" max="100" value="38" class="w-full accent-[#F04E23] cursor-pointer h-1.5 bg-white/20 rounded-lg" oninput="updateTimePreview(this.value)" />
            <div class="flex justify-between text-xs text-[#8C827D] mt-1.5">
              <span id="currentTimeLabel">1:18</span>
              <span>3:24</span>
            </div>
          </div>

          <!-- Playback Controls -->
          <div class="flex items-center justify-center gap-6 mt-6">
            <button onclick="prevTrack()" class="w-12 h-12 rounded-full dock-circle-btn flex items-center justify-center text-white">
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M6 6h2v12H6zm3.5 6l8.5 6V6z"/></svg>
            </button>
            <button onclick="togglePlayPause()" id="modalPlayBtn" class="w-16 h-16 rounded-full pill-active flex items-center justify-center text-neutral-950 shadow-xl">
              <svg id="playPauseIcon" class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24"><path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z"/></svg>
            </button>
            <button onclick="nextTrack()" class="w-12 h-12 rounded-full dock-circle-btn flex items-center justify-center text-white">
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M6 18l8.5-6L6 6v12zM16 6v12h2V6h-2z"/></svg>
            </button>
          </div>
        </div>

        <p class="text-center text-xs text-[#8C827D]">Liquid Glass Audio Engine • Lossless 24-bit</p>
      </div>

      <!-- COLOR BREAKDOWN REFERENCE DRAWER -->
      <div id="paletteModal" class="absolute inset-0 bg-[#0D0705]/95 backdrop-blur-2xl z-40 hidden flex-col p-6 overflow-y-auto no-scrollbar">
        <div class="flex items-center justify-between pb-4 border-b border-white/10">
          <div>
            <h3 class="text-lg font-bold text-white">Color Code Breakdown</h3>
            <p class="text-xs text-[#8C827D]">Tap any hex code to copy</p>
          </div>
          <button onclick="togglePaletteModal()" class="w-9 h-9 rounded-full liquid-circle-btn flex items-center justify-center text-white">✕</button>
        </div>

        <div class="space-y-4 mt-4 text-xs">
          <div>
            <p class="text-[#F04E23] font-semibold uppercase tracking-wider mb-2">Primary (Brand & Base)</p>
            <div class="grid grid-cols-2 gap-2">
              <button onclick="copyHex('#F04E23')" class="p-2.5 rounded-2xl bg-white/5 border border-white/10 flex items-center gap-2.5 text-left hover:bg-white/10">
                <span class="w-7 h-7 rounded-xl bg-[#F04E23] shrink-0 border border-white/20"></span>
                <div><div class="font-bold text-white">#F04E23</div><div class="text-[10px] text-[#8C827D]">Active Orange Pill</div></div>
              </button>
              <button onclick="copyHex('#0D0705')" class="p-2.5 rounded-2xl bg-white/5 border border-white/10 flex items-center gap-2.5 text-left hover:bg-white/10">
                <span class="w-7 h-7 rounded-xl bg-[#0D0705] shrink-0 border border-white/20"></span>
                <div><div class="font-bold text-white">#0D0705</div><div class="text-[10px] text-[#8C827D]">Espresso Black Base</div></div>
              </button>
            </div>
          </div>

          <div>
            <p class="text-[#D6CFCB] font-semibold uppercase tracking-wider mb-2">Secondary (Ambient & Dock)</p>
            <div class="grid grid-cols-2 gap-2">
              <button onclick="copyHex('#5A2311')" class="p-2.5 rounded-2xl bg-white/5 border border-white/10 flex items-center gap-2.5 text-left hover:bg-white/10">
                <span class="w-7 h-7 rounded-xl bg-[#5A2311] shrink-0 border border-white/20"></span>
                <div><div class="font-bold text-white">#5A2311</div><div class="text-[10px] text-[#8C827D]">Top Rust Glow</div></div>
              </button>
              <button onclick="copyHex('#3D241C')" class="p-2.5 rounded-2xl bg-white/5 border border-white/10 flex items-center gap-2.5 text-left hover:bg-white/10">
                <span class="w-7 h-7 rounded-xl bg-[#3D241C] shrink-0 border border-white/20"></span>
                <div><div class="font-bold text-white">#3D241C</div><div class="text-[10px] text-[#8C827D]">Glass Pill Surface</div></div>
              </button>
            </div>
          </div>

          <div>
            <p class="text-[#D6CFCB] font-semibold uppercase tracking-wider mb-2">Tertiary (Liquid Glass Overlays)</p>
            <div class="grid grid-cols-2 gap-2">
              <button onclick="copyHex('#3A3532')" class="p-2.5 rounded-2xl bg-white/5 border border-white/10 flex items-center gap-2.5 text-left hover:bg-white/10">
                <span class="w-7 h-7 rounded-xl bg-[#3A3532] shrink-0 border border-white/20"></span>
                <div><div class="font-bold text-white">#3A3532</div><div class="text-[10px] text-[#8C827D]">Hero Frosted Box</div></div>
              </button>
              <button onclick="copyHex('#7A5B50')" class="p-2.5 rounded-2xl bg-white/5 border border-white/10 flex items-center gap-2.5 text-left hover:bg-white/10">
                <span class="w-7 h-7 rounded-xl bg-[#7A5B50] shrink-0 border border-white/20"></span>
                <div><div class="font-bold text-white">#7A5B50</div><div class="text-[10px] text-[#8C827D]">Glass Specular Rim</div></div>
              </button>
            </div>
          </div>

          <div>
            <p class="text-[#D6CFCB] font-semibold uppercase tracking-wider mb-2">Neutral / Natural (Typography)</p>
            <div class="grid grid-cols-3 gap-2">
              <button onclick="copyHex('#FFFFFF')" class="p-2 rounded-xl bg-white/5 border border-white/10 text-center hover:bg-white/10">
                <div class="w-full h-4 rounded bg-white mb-1"></div>
                <div class="font-bold text-white">#FFFFFF</div>
              </button>
              <button onclick="copyHex('#D6CFCB')" class="p-2 rounded-xl bg-white/5 border border-white/10 text-center hover:bg-white/10">
                <div class="w-full h-4 rounded bg-[#D6CFCB] mb-1"></div>
                <div class="font-bold text-white">#D6CFCB</div>
              </button>
              <button onclick="copyHex('#8C827D')" class="p-2 rounded-xl bg-white/5 border border-white/10 text-center hover:bg-white/10">
                <div class="w-full h-4 rounded bg-[#8C827D] mb-1"></div>
                <div class="font-bold text-white">#8C827D</div>
              </button>
            </div>
          </div>
        </div>
      </div>

      <!-- TOAST NOTIFICATION -->
      <div id="toastBox" class="absolute top-14 left-1/2 -translate-x-1/2 px-4 py-2 rounded-full bg-neutral-900/95 text-white border border-white/20 text-xs font-medium shadow-xl opacity-0 pointer-events-none transition-opacity duration-300 z-50 whitespace-nowrap">
        Copied!
      </div>

    </main>
  </div>

  <script>
    // Track Database
    const tracks = [
      { title: "Saturday Party Tonight", artist: "Sharib Toshi" },
      { title: "Saturday Night Vibes", artist: "Sharib Toshi & Kanika" },
      { title: "Crimson Glass", artist: "Atif Aslam & Pritam" },
      { title: "Dla Ciebie", artist: "Romantic Acoustic" },
      { title: "Memória De Mim", artist: "Soul Sessions" },
      { title: "Fantasy Night", artist: "Vibra Mix" }
    ];

    let currentTrackIndex = 0;
    let isPlaying = true;
    let isFullScreen = false;

    // Filter Category Pill Selection
    function selectCategory(categoryName, btnElement) {
      const container = document.getElementById('categoryPillsContainer');
      const buttons = container.querySelectorAll('button');
      buttons.forEach(btn => {
        btn.className = 'glass-pill-inactive px-[24px] py-[11px] rounded-full text-[14px] font-medium shrink-0';
      });
      btnElement.className = 'pill-active px-[22px] py-[11px] rounded-full text-[14px] shrink-0';
      showToast(`Filtered by: ${categoryName}`);
    }

    // Play Track Interaction
    function playTrack(index) {
      currentTrackIndex = index;
      isPlaying = true;
      const track = tracks[index];
      document.getElementById('miniStatusText').textContent = track.title;
      document.getElementById('modalTrackTitle').textContent = track.title;
      document.getElementById('modalTrackArtist').textContent = track.artist;
      document.getElementById('headerEq').classList.remove('paused-eq');
      updatePlayIcon();
      showToast(`Playing "${track.title}"`);
    }

    function togglePlayPause() {
      isPlaying = !isPlaying;
      const eq = document.getElementById('headerEq');
      if (isPlaying) {
        eq.classList.remove('paused-eq');
      } else {
        eq.classList.add('paused-eq');
      }
      updatePlayIcon();
    }

    function updatePlayIcon() {
      const icon = document.getElementById('playPauseIcon');
      if (isPlaying) {
        icon.innerHTML = '<path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z"/>';
      } else {
        icon.innerHTML = '<path d="M8 5v14l11-7z"/>';
      }
    }

    function nextTrack() {
      currentTrackIndex = (currentTrackIndex + 1) % tracks.length;
      playTrack(currentTrackIndex);
    }

    function prevTrack() {
      currentTrackIndex = (currentTrackIndex - 1 + tracks.length) % tracks.length;
      playTrack(currentTrackIndex);
    }

    function openNowPlayingModal() {
      document.getElementById('nowPlayingModal').classList.remove('translate-y-full');
    }

    function closeNowPlayingModal() {
      document.getElementById('nowPlayingModal').classList.add('translate-y-full');
    }

    function updateTimePreview(val) {
      const totalSeconds = Math.floor((val / 100) * 204);
      const mins = Math.floor(totalSeconds / 60);
      const secs = String(totalSeconds % 60).padStart(2, '0');
      document.getElementById('currentTimeLabel').textContent = `${mins}:${secs}`;
    }

    // Switch Bottom Navigation Feedback
    function switchNavTab(tabName, btnEl) {
      showToast(`${tabName} tab selected`);
    }

    // Toggle Color Breakdown Modal
    function togglePaletteModal() {
      const modal = document.getElementById('paletteModal');
      if (modal.classList.contains('hidden')) {
        modal.classList.remove('hidden');
        modal.classList.add('flex');
      } else {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
      }
    }

    function toggleDrawerMenu() {
      togglePaletteModal();
    }

    // Switch Theme between Rust Orange (#F04E23) & Liquid Red (#FA524B)
    function switchTheme(theme) {
      const root = document.documentElement;
      const rustBtn = document.getElementById('btnThemeRust');
      const crimsonBtn = document.getElementById('btnThemeCrimson');
      const indicator = document.getElementById('activeSwatchIndicator');

      if (theme === 'crimson') {
        root.setAttribute('data-theme', 'crimson');
        crimsonBtn.className = 'px-2.5 py-1 rounded-full bg-[#FA524B] text-neutral-950 font-semibold text-xs transition';
        rustBtn.className = 'px-2.5 py-1 rounded-full bg-white/10 hover:bg-white/20 text-white/80 font-medium text-xs transition';
        indicator.style.backgroundColor = '#FA524B';
        showToast('Theme: Crimson Liquid Glass (#FA524B)');
      } else {
        root.removeAttribute('data-theme');
        rustBtn.className = 'px-2.5 py-1 rounded-full bg-[#F04E23] text-neutral-950 font-semibold text-xs transition';
        crimsonBtn.className = 'px-2.5 py-1 rounded-full bg-white/10 hover:bg-white/20 text-white/80 font-medium text-xs transition';
        indicator.style.backgroundColor = '#F04E23';
        showToast('Theme: Original Rust Orange (#F04E23)');
      }
    }

    // Toggle Mobile Frame vs Expanded View
    function toggleLayoutMode() {
      isFullScreen = !isFullScreen;
      const wrapper = document.getElementById('layoutWrapper');
      const btn = document.getElementById('btnLayoutMode');
      if (isFullScreen) {
        wrapper.classList.add('fullscreen-mode');
        btn.textContent = 'Phone Frame';
      } else {
        wrapper.classList.remove('fullscreen-mode');
        btn.textContent = 'Expand View';
      }
    }

    // Copy Hex Code Helper
    function copyHex(hex) {
      const tempInput = document.createElement('textarea');
      tempInput.value = hex;
      document.body.appendChild(tempInput);
      tempInput.select();
      document.execCommand('copy');
      document.body.removeChild(tempInput);
      showToast(`Copied ${hex} to clipboard!`);
    }

    // Toast Helper
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
  </script>
</body>
</html>
