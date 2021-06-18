const CACHE_NAME = "my-site-cache-v2";
const urlsToCache = [
  "/lib/jquery.min.js",
  "/lib/slick/slick.js",
  "/img/icon.png",
  "/img/google-play-badge.png",
  "/img/app-store.svg",
  "/img/youtube.svg",
  "/img/fb.svg",
  "/img/arow.png",
];

self.addEventListener("install", function(event) {
  console.log("Service worker installing...");
  // Perform install steps
  event.waitUntil(
      caches.open(CACHE_NAME)
          .then(function(cache) {
            console.log("Opened cache");
            return cache.addAll(urlsToCache);
          }),
  );
});

self.addEventListener("fetch", function(event) {
  console.log("Service worker activating...");
  event
      .respondWith(caches.match(event.request)
          .then(function(response) {
            // Cache hit - return response
            if (response) {
              return response;
            }
            return fetch(event.request);
          }),
      );
});


self.addEventListener("activate", function(event) {
  const cacheWhitelist = ["my-site-cache-v2"];
  event.waitUntil(
      caches.keys().then(function(cacheNames) {
        return Promise.all(
            cacheNames.map(function(cacheName) {
              if (cacheWhitelist.indexOf(cacheName) === -1) {
                return caches.delete(cacheName);
              }
            }),
        );
      }),
  );
  console.log("update cache success");
});
