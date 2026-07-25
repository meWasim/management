# User module

User module.

## Status

This module is enabled by default. Disable or enable it with:

```bash
php artisan module:disable user
php artisan module:enable user
```

## Structure

- `Routes/web.php` — browser routes.
- `Routes/api.php` — API routes.
- `Http/Controllers` — HTTP controllers.
- `Services` — application services.
- `Models` — Eloquent models.
- `Database/Migrations` — database migrations.

Document public endpoints, permissions, configuration, and dependencies here as the module grows.
