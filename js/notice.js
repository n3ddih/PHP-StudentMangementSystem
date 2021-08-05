// This will ask user if they want their messages to be notified
document.addEventListener('DOMContentLoaded', function () {
    if (!Notification) {
        alert("Your browser doesn't support notification."); 
        return;
    }
    if (Notification.permission !== "granted")
        Notification.requestPermission();
});
