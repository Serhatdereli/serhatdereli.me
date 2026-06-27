/* Life Hub service worker — offline cache + network-first (so deploys always show
 * the latest). All paths are relative to the worker's scope, so this works both at
 * a custom-domain root and at a GitHub Pages project sub-path. */
var CACHE = 'life-hub-v4';
var APP = ['./', 'life-hub.html', 'serhat-plan.html', 'icon.svg', 'manifest.webmanifest'];

self.addEventListener('install', function (e) {
  e.waitUntil(
    caches.open(CACHE).then(function (c) {
      // Best-effort: cache each item independently so one missing file can't abort the rest.
      return Promise.all(APP.map(function (u) { return c.add(u).catch(function () {}); }));
    }).then(function () { return self.skipWaiting(); })
  );
});

self.addEventListener('activate', function (e) {
  e.waitUntil(
    caches.keys().then(function (keys) {
      return Promise.all(keys.map(function (k) { if (k !== CACHE) return caches.delete(k); }));
    }).then(function () { return self.clients.claim(); })
  );
});

self.addEventListener('fetch', function (e) {
  var url;
  try { url = new URL(e.request.url); } catch (err) { return; }
  if (e.request.method !== 'GET' || url.origin !== location.origin) return;
  // Network-first: freshest version when online, cache fallback when offline.
  e.respondWith(
    fetch(e.request).then(function (res) {
      var copy = res.clone();
      caches.open(CACHE).then(function (c) { c.put(e.request, copy); });
      return res;
    }).catch(function () {
      return caches.match(e.request).then(function (hit) { return hit || caches.match('life-hub.html'); });
    })
  );
});
