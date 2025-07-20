# Medium Clone - Internship Project

A modern blogging platform inspired by Medium, built with Laravel 11 for my internship project. This application provides a clean, minimalist interface for reading and writing articles.

##  Features

- **User Authentication** - Register, login, and manage user profiles
- **Article Management** - Create, edit, and publish blog posts
- **Categories** - Organize articles by topics and categories  
- **Responsive Design** - Built with Tailwind CSS for mobile-first design
- **Rich Text Editor** - Write and format articles with ease
- **User Dashboard** - Manage your articles and profile

##  Tech Stack

- **Backend**: Laravel 11 (PHP 8.2+)
- **Frontend**: Blade Templates, Tailwind CSS, Vite
- **Database**: SQLite (development), MySQL (production ready)
- **Authentication**: Laravel Breeze
- **Testing**: Pest PHP

##  Prerequisites

Before running this project, make sure you have:

- PHP 8.2 or higher
- Composer
- Node.js & npm
- Git

##  Installation & Setup

1. **Clone the repository**
   ```bash
   git clone <your-repo-url>
   cd medium
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install Node.js dependencies**
   ```bash
   npm install
   ```

4. **Environment setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Database setup**
   ```bash
   php artisan migrate
   php artisan db:seed
   ```

6. **Build assets**
   ```bash
   npm run build
   ```

7. **Start the development server**
   ```bash
   php artisan serve
   ```

Visit `http://localhost:8000` to view the application.

##  Database Schema

### Users
- User authentication and profile management

### Posts  
- Article content, titles, and metadata
- Belongs to Users and Categories

### Categories
- Article categorization and organization

##  Testing

Run the test suite:
```bash
php artisan test
```

Or using Pest directly:
```bash
./vendor/bin/pest
```

##  Project Structure

```
app/
├── Models/
│   ├── User.php
│   ├── Post.php
│   └── Category.php
├── Http/Controllers/
└── Http/Requests/
database/
├── migrations/
└── seeders/
resources/
├── views/
├── css/
└── js/
```

##  Internship Goals

This project demonstrates:
- **Laravel Framework Proficiency** - MVC architecture, Eloquent ORM, migrations
- **Frontend Integration** - Blade templating, Tailwind CSS, responsive design  
- **Database Design** - Proper relationships and data modeling
- **Authentication** - Secure user registration and login
- **Testing** - Unit and feature tests with Pest
- **Version Control** - Git workflow and project organization

##  Deployment

The application is ready for deployment on platforms like:
- Laravel Forge
- DigitalOcean
- AWS
- Heroku

##  License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
