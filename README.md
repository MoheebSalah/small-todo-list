# MoheebTodos

A small Laravel TODO app built to demonstrate core framework basics.

## What it shows

- User authentication and task ownership
- Task CRUD with Eloquent models and migrations
- Blade templates for views
- Routes, controllers, and policies
- Simple, functional app structure for a personal project

## Setup

1. Install dependencies
   ```bash
   composer install
   ```
2. Copy environment file
   ```bash
   cp .env.example .env
   ```
3. Generate app key
   ```bash
   php artisan key:generate
   ```
4. Run database migrations
   ```bash
   php artisan migrate
   ```
5. Start the app
   ```bash
   php artisan serve
   ```

## Notes

This project is intentionally small and focused on the fundamentals of Laravel. It uses the framework's built-in features for routing, database access, and view rendering.
