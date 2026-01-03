<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Chat</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/js/app.js'])
</head>
<body>

<input id="message" placeholder="Type a message" />
<button onclick="sendMessage()">Send</button>

<ul id="messages"></ul>

<script>
    // Setup Axios
    axios.defaults.withCredentials = true; // very important with Sanctum
    axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

    const csrfToken = document.querySelector('meta[name="csrf-token"]');
    if (csrfToken) {
        axios.defaults.headers.common['X-CSRF-TOKEN'] = csrfToken.content;
    }

    // User login (API)
    function login(email, password) {
        return axios.get('/sanctum/csrf-cookie') // must do before any POST
            .then(() => {
                return axios.post('/login', {
                    email: email,
                    password: password
                });
            });
    }

    // Send a chat message
    function sendMessage() {
        axios.post('/send-message', {
            message: document.getElementById('message').value
        })
            .then(res => {
                document.getElementById('message').value = '';

                // Success notification
                alert('Message sent successfully ✅');
            })
            .catch(err => {
                console.error(err.response);
                alert('Failed to send message: ' + (err.response.status || ''));
            });
    }

    // Example: automatic login (change to your user credentials)
    login('test@example.com', '123456').then(() => {
        console.log('Logged in successfully');
    }).catch(err => {
        console.error('Login failed', err.response);
    });

</script>

</body>
</html>
