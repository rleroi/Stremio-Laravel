# Laravel Stremio Addon Template

A production-ready starter template for building Stremio addons using Laravel. This template provides a solid foundation for creating high-quality Stremio addons with modern PHP practices.

## Features

- 🚀 Built with Laravel 12
- 🎯 Clean architecture with services and interfaces
- 🔒 Type-safe with PHP 8.2+
- 🎨 Modern UI with Vue 3 and Inertia
- 📦 Easy configuration management
- 🧪 Testing ready
- 🐳 Docker support

## Requirements

- PHP 8.2+
- Composer
- Node.js 18+
- Docker (optional)

## Quick Start

1. Clone the repository:
```bash
git clone https://github.com/yourusername/laravel-stremio-addon.git
cd laravel-stremio-addon
```

2. Install dependencies:
```bash
composer install
npm install
```

3. Set up your environment:
```bash
cp .env.example .env
php artisan key:generate
```

4. Start the development server:
```bash
php artisan serve
```

5. Visit `http://localhost:8000` to configure your addon.

## Docker Setup

```bash
docker compose up -d
```

## Addon Configuration

The template includes an example configuration UI at `/config`.

## Stremio Protocol Implementation

This template implements the Stremio addon protocol with the following endpoints:

- `/manifest.json` - Addon manifest (dynamic based on configuration)
- `/catalog/{type}/{id}/{extra?}.json` - Content catalog
- `/meta/{type}/{id}/{extra?}.json` - Content metadata
- `/stream/{type}/{id}/{extra?}.json` - Stream information
- `/subtitles/{type}/{id}/{extra?}.json` - Subtitles

Each endpoint supports an optional `{config}` parameter to specify which configuration to use.

## Project Structure

```
app/
├── DataTransferObjects/    # Data transfer objects
│   └── AddonConfig.php     # Configuration DTO
├── Http/
│   ├── Controllers/        # HTTP controllers
│   │   ├── AddonController.php    # Stremio protocol endpoints
│   │   └── ConfigController.php   # Configuration UI
│   └── Resources/          # JSON resources
│       ├── MetaCollection.php
│       ├── MetaResource.php
│       └── StreamResource.php
├── Services/
│   ├── Interfaces/         # Service interfaces
│   │   ├── AddonConfigServiceInterface.php
│   │   ├── AddonManifestServiceInterface.php
│   │   └── CatalogServiceInterface.php
│   └── ...                # Service implementations
└── ...
```

## Development

### Running Tests

```bash
php artisan test
```

### Code Style

```bash
composer format
composer lint
```

### Docker Development

The project includes a complete Docker setup for development:

- PHP 8.2 FPM
- Nginx
- MySQL 8.0
- Redis (optional)

To start the development environment:

```bash
docker compose up -d
```

## Contributing

1. Fork the repository
2. Create your feature branch
3. Commit your changes
4. Push to the branch
5. Create a Pull Request

## License

This project is open-sourced software licensed under the [MIT license](LICENSE.md).

## Support

If you find this template useful, please consider giving it a star ⭐️ on GitHub!

## Authentication (Optional)

This starter is compatible with [Laravel Breeze](https://laravel.com/docs/12.x/starter-kits#laravel-breeze) for authentication (register, login, etc). If you want to enable user authentication features:

- Open `routes/web.php`
- Uncomment the Breeze routes section (around line 18)
- This will enable `/register`, `/login`, `/dashboard`, and profile management routes.

Example:

```php
// Uncomment to enable default Laravel Breeze routes
Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
```

See the [Laravel Breeze documentation](https://laravel.com/docs/12.x/starter-kits#laravel-breeze) for more details.
