# Task Manager - Laravel

A simple task management web application built with Laravel, featuring user authentication and full CRUD functionality for personal tasks.

## Features
- User authentication (register, login, logout) via Laravel Breeze
- Create, read, update, and delete tasks
- Tasks are private to each logged-in user
- Mark tasks as completed
- Form validation with error handling

## Tech Stack
- **Backend:** Laravel 11 (PHP)
- **Frontend:** Blade templates, Tailwind CSS
- **Database:** SQLite
- **Authentication:** Laravel Breeze

## Key Concepts Implemented
- MVC architecture
- Eloquent ORM relationships (User hasMany Tasks, Task belongsTo User)
- Route model binding & resource routing
- Middleware-protected routes
- Request validation

## Setup Instructions
1. Clone the repo
2. Run `composer install`
3. Run `npm install && npm run build`
4. Copy `.env.example` to `.env` and run `php artisan key:generate`
5. Run `php artisan migrate`
6. Run `php artisan serve`

## Screenshots
(Add screenshots of your tasks page, login page here)