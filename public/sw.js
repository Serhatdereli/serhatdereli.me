/* Life Hub service worker.
 * Caches ONLY the Hub's own pages/assets for offline use, and deliberately
 * does NOT intercept the rest of the site. No analytics, no external calls —
 * the privacy guarantee (data stays in the browser) is unaffected.
 */
var CACHE = 'life-hub-v2';
var APP = ['/goal/', '/life-hub.html', '/serhat-plan.html', '/icon.svg', '/manifest.webmanifest'];

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
    caches.keys()
      .then(function (keys) { return Promise.all(keys.map(function (k) { if (k !== CACHE) return caches.delete(k); })); })
      .then(function () { return self.clients.claim(); })
  );
});

self.addEventListener('fetch', function (e) {
  var url;
  try { url = new URL(e.request.url); } catch (err) { return; }
  if (e.request.method !== 'GET' || url.origin !== location.origin) return;
  if (APP.indexOf(url.pathname) === -1) return; // leave the rest of the site alone
  e.respondWith(
    caches.match(e.request).then(function (hit) {
      return hit || fetch(e.request).then(function (res) {
        var copy = res.clone();
        caches.open(CACHE).then(function (c) { c.put(e.request, copy); });
        return res;
      }).catch(function () { return caches.match('/life-hub.html'); });
    })
  );
});
