
self.addEventListener('install', function(event) {
    event.waitUntil(
      caches.open('my-cache').then(function(cache) {
        return cache.addAll([
          '/',
          '/css/face-scan.css',
          '/build/assets/app.css',
          '/build/assets/app.js',
          '/images/icon_192x192.png',
          '/images/icon_512x512.png'
        ]);
      })
    );
  });
  
  self.addEventListener('fetch', function(event) {
    event.respondWith(
      caches.match(event.request).then(function(response) {
        return response || fetch(event.request).then(function(response) {
          return caches.open('my-dynamic-cache').then(function(cache) {
            cache.put(event.request, response.clone());
            return response;
          });
        });
      })
    );
  });
  