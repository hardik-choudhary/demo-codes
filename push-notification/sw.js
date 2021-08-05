self.addEventListener('install', function(event){
    self.skipWaiting();
});

self.addEventListener('push', function (event) {
    if (!(self.Notification && self.Notification.permission === 'granted')) {
        return;
    }

    var pushData = event.data.json();
    const options = {
        body: pushData.body,
        icon: pushData.icon,
        badge: pushData.badge,
        data: pushData.extraData
    };

    event.waitUntil(self.registration.showNotification(pushData.title, options));
});

self.addEventListener('notificationclick', function (event) {
    event.notification.close();

    event.waitUntil(
        clients.openWindow(event.notification.data)
    );
});