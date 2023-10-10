import {createApp} from 'vue';
import Echo from 'laravel-echo';
import App from './App.vue'; // Replace with your main Vue component file
import RealTimeNotification from './components/RealTimeNotification.vue';
const app = createApp (App);

// Initialize Laravel Echo
window.Echo = new Echo ({
  broadcaster: 'pusher', // Use 'pusher' as the broadcaster
  key: process.env.VITE_PUSHER_APP_KEY,
  cluster: process.env.VITE_PUSHER_APP_CLUSTER,
  encrypted: true, // Set to true if you use HTTPS
  // Add any other options you need
});

app.config.globalProperties.$echo = window.Echo;

app.mount ('#app');

import RealTimeMessage from './components/RealTimeMessage.vue'; // Adjust the path
app.component ('real-time-message', RealTimeMessage);
