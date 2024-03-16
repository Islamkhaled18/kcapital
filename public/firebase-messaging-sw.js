importScripts('https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js');
 importScripts('https://www.gstatic.com/firebasejs/8.10.0/firebase-messaging.js');
 const firebaseConfig = {apiKey:'AIzaSyAXKnNhT_gXL7vQsUWSm1abaYx9f2hQiIA',
authDomain:'k-capital-e1fb5.firebaseapp.com',
projectId:'k-capital-e1fb5',
storageBucket:'k-capital-e1fb5.appspot.com',
messagingSenderId:'754688704112',
appId:'1:754688704112:web:83b124fc2bb806fe537eb5',
measurementId:'G-12NVWJ2L09',
 };
if (!firebase.apps.length) {
 firebase.initializeApp(firebaseConfig);
 }
const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function(payload) {
console.log(payload);
 var title = payload.data.title;
var options = {
body: payload.data.body,
icon: payload.data.icon,
data: {
 time: new Date(Date.now()).toString(),
 click_action: payload.data.click_action
 }
};
return self.registration.showNotification(title, options);
 });
self.addEventListener('notificationclick', function(event) {
 var action_click = event.notification.data.click_action;
event.notification.close();
event.waitUntil(
clients.openWindow(action_click)
 );
});