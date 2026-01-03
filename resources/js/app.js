import './bootstrap';

Echo.channel('chat')
    .listen('MessageSent', (e) => {
        let li = document.createElement('li');
        li.innerText = e.user.name + ': ' + e.message;
        document.getElementById('messages').appendChild(li);
    });

import axios from 'axios';

window.axios = axios;

axios.defaults.withCredentials = true; // مهم جدًا مع Sanctum
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

const token = document.querySelector('meta[name="csrf-token"]');
if (token) {
    axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
}

