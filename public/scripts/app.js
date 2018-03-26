(function() {
    'use strict';

    var app = {
        isLoading: true
    };

    // TODO add service worker code here
    if ('serviceWorker' in navigator) {
        navigator.serviceWorker
            .register('./service-worker.js', {
                scope: '.'
            })
            .then(function() { console.log('Service Worker Registered'); });
    }
})();