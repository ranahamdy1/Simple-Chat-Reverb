# Laravel Reverb Chat
- A real-time chat application built with Laravel and Reverb WebSocket server.
- This app allows multiple users to chat in real-time without relying on external services like Pusher.

## Features
- Real-time messaging using Laravel Reverb
- Simple Blade frontend
- User authentication
- Event broadcasting with Laravel Echo

## Running the Application
### You need to run 3 servers:
1- Laravel app:
```php
php artisan serve
```
2- Reverb WebSocket server:
```php
php artisan reverb:start
```
3- Frontend (for Echo):
```php
npm run dev
```

