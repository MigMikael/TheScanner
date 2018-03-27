var cacheName = 'scanner-PWA';
var filesToCache = [
    '/',
    '/index.php',
    '/scripts/app.js',
    '/js/jquery-3.3.1.min.js',
    '/js/jsqrscanner.nocache.js',
    '/js/bootbox.min.js',
    '/css/app.css',
    '/css/JsQRScanner.css'
];

self.addEventListener('install', function(e) {
    console.log('[ServiceWorker] Install');
    e.waitUntil(
        caches.open(cacheName).then(function(cache) {
            console.log('[ServiceWorker] Caching app shell');
            return cache.addAll(filesToCache);
        })
    );
});

self.addEventListener('fetch', function(event) {
    event.respondWith(
        caches.match(event.request)
            .then(function(response) {
                    // Cache hit - return response
                    if (response) {
                        return response;
                    }
                    return fetch(event.request);
                }
            )
    );
});