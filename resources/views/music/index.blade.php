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
<div class="relative mx-auto min-h-screen max-w-md overflow-hidden bg-gradient-to-b from-[#1a0f2e] via-[#0b0b12] to-[#0b0b12] pb-24 shadow-2xl">

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

    {{-- Bottom nav --}}
    <nav class="fixed bottom-0 left-1/2 z-40 flex w-full max-w-md -translate-x-1/2 justify-around border-t border-white/5 bg-[#0b0b12]/95 py-3 backdrop-blur">
        @foreach ([['Home', 'M3 12 12 3l9 9M5 10v10h14V10', true], ['Search', 'M11 4a7 7 0 1 0 0 14 7 7 0 0 0 0-14zm10 17-4.3-4.3', false], ['Library', 'M4 19V5m5 14V5m4 14 4-14 4 14', false], ['Profile', 'M12 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm-7 9a7 7 0 0 1 14 0', false]] as [$label, $path, $active])
            <a href="#" class="flex flex-col items-center gap-1 text-[10px] {{ $active ? 'text-fuchsia-400' : 'text-white/50' }}">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="{{ $path }}"/></svg>
                {{ $label }}
            </a>
        @endforeach
    </nav>
</div>

<script>
    const hour = new Date().getHours();
    document.getElementById('greeting').textContent = hour < 12 ? 'Good Morning' : hour < 17 ? 'Good Afternoon' : 'Good Evening';
</script>
</body>
</html>
