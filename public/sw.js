const CACHE_NAME = 'element-music-v1';
const AUDIO_CACHE = 'element-music-audio-v1';
const STATIC_ASSETS = [
    '/',
    '/manifest.json'
];

self.addEventListener('install', (event) => {
    event.waitUntil(
        caches.open(CACHE_NAME).then((cache) => {
            return cache.addAll(STATIC_ASSETS).catch(() => {});
        }).then(() => self.skipWaiting())
    );
});

self.addEventListener('activate', (event) => {
    event.waitUntil(
        caches.keys().then((keys) => {
            return Promise.all(
                keys.filter((key) => key !== CACHE_NAME && key !== AUDIO_CACHE)
                    .map((key) => caches.delete(key))
            );
        }).then(() => self.clients.claim())
    );
});

self.addEventListener('fetch', (event) => {
    const url = new URL(event.request.url);

    // Audio streaming handling
    if (url.pathname.startsWith('/audio/') || url.pathname.endsWith('.mp3')) {
        event.respondWith(
            caches.open(AUDIO_CACHE).then(async (cache) => {
                const cached = await cache.match(event.request, { ignoreSearch: true });
                if (cached) {
                    const rangeHeader = event.request.headers.get('range');
                    if (rangeHeader) {
                        const arrayBuffer = await cached.arrayBuffer();
                        const bytes = /^bytes\=(\d+)\-(\d+)?$/g.exec(rangeHeader);
                        if (bytes) {
                            const start = parseInt(bytes[1], 10);
                            const end = bytes[2] ? parseInt(bytes[2], 10) : arrayBuffer.byteLength - 1;
                            const chunk = arrayBuffer.slice(start, end + 1);
                            return new Response(chunk, {
                                status: 206,
                                statusText: 'Partial Content',
                                headers: [
                                    ['Content-Range', `bytes ${start}-${end}/${arrayBuffer.byteLength}`],
                                    ['Content-Length', `${chunk.byteLength}`],
                                    ['Content-Type', 'audio/mpeg'],
                                    ['Accept-Ranges', 'bytes']
                                ]
                            });
                        }
                    }
                    return cached;
                }
                return fetch(event.request).catch(() => new Response(null, { status: 404 }));
            })
        );
        return;
    }

    // Covers and static images
    if (url.pathname.startsWith('/storage/covers/')) {
        event.respondWith(
            caches.open(CACHE_NAME).then(async (cache) => {
                const cached = await cache.match(event.request);
                if (cached) return cached;
                try {
                    const response = await fetch(event.request);
                    if (response && response.status === 200) {
                        cache.put(event.request, response.clone());
                    }
                    return response;
                } catch (e) {
                    return cached || new Response(null, { status: 404 });
                }
            })
        );
        return;
    }

    // Navigation fallback
    if (event.request.mode === 'navigate') {
        event.respondWith(
            fetch(event.request).catch(async () => {
                const cachedRoot = await caches.match('/');
                return cachedRoot || new Response('Offline', { status: 200, headers: { 'Content-Type': 'text/html' } });
            })
        );
        return;
    }

    // Default fetch
    event.respondWith(
        caches.match(event.request).then((response) => response || fetch(event.request))
    );
});
