<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="theme-color" content="#0B0B0B">
    <title>Element Music</title>
    @fonts
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-night font-sans text-snow antialiased">
<div class="relative mx-auto min-h-screen max-w-md overflow-hidden bg-coal pb-28 shadow-2xl">

    {{-- Grayscale background photo so the glass has something to refract --}}
    <div class="pointer-events-none absolute inset-0 bg-cover bg-center grayscale" style="background-image: url('https://images.unsplash.com/photo-1470225620780-dba8ba36b745?w=900&auto=format&fit=crop&q=80');"></div>
    <div class="pointer-events-none absolute inset-0 bg-gradient-to-b from-night/40 via-transparent to-night/70"></div>

    {{-- Header --}}
    <header class="relative z-10 px-4 pt-5">
        <div data-liquid-glass="normal" class="flex items-center justify-between rounded-3xl px-4 py-3">
            <div>
                <p class="text-xs text-mist" id="greeting">Good Evening</p>
                <h1 class="text-xl font-semibold tracking-tight text-snow drop-shadow">Hey, Aditya</h1>
            </div>
            <div class="flex items-center gap-3">
                <button data-liquid-glass="strong" class="grid h-10 w-10 place-items-center rounded-full text-snow" aria-label="Notifications">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M15 17h5l-1.4-1.4A2 2 0 0 1 18 14.2V11a6 6 0 1 0-12 0v3.2c0 .5-.2 1-.6 1.4L4 17h5m6 0a3 3 0 1 1-6 0"/></svg>
                </button>
                <img src="https://images.unsplash.com/photo-1599566150163-29194dcaad36?w=100&auto=format&fit=crop&q=80" class="h-10 w-10 rounded-full object-cover ring-2 ring-mist grayscale" alt="Profile">
            </div>
        </div>
    </header>

    {{-- Bottom nav --}}
    <nav class="fixed bottom-4 left-1/2 z-40 w-full max-w-md -translate-x-1/2 px-4">
        <div data-liquid-glass="strong" class="flex justify-around rounded-full py-3">
            @foreach ([['Home', 'M3 12 12 3l9 9M5 10v10h14V10', true], ['Search', 'M11 4a7 7 0 1 0 0 14 7 7 0 0 0 0-14zm10 17-4.3-4.3', false], ['Library', 'M4 19V5m5 14V5m4 14 4-14 4 14', false], ['Profile', 'M12 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm-7 9a7 7 0 0 1 14 0', false]] as [$label, $path, $active])
                <a href="#" class="flex flex-col items-center gap-1 text-[10px] font-medium {{ $active ? 'text-snow' : 'text-mist/70' }}">
                    <svg class="h-6 w-6 drop-shadow" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="{{ $path }}"/></svg>
                    {{ $label }}
                </a>
            @endforeach
        </div>
    </nav>
</div>

<script>
    const hour = new Date().getHours();
    document.getElementById('greeting').textContent = hour < 12 ? 'Good Morning' : hour < 17 ? 'Good Afternoon' : 'Good Evening';
</script>
</body>
</html>
