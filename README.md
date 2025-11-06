## Running the Project with Docker

This project provides a ready-to-use Docker setup for local development and testing. The included `Dockerfile` and `docker-compose.yml` configure all required services and dependencies.

### Requirements
- **PHP 8.2** (via `php:8.2-fpm-alpine`)
- **Composer 2.7** for dependency installation
- **MySQL** (latest)
- **Redis** (latest)

### Environment Variables
- The application expects environment variables as defined in `.env` and `.env.example`. Key variables for the database service:
  - `MYSQL_DATABASE=app_db`
  - `MYSQL_USER=app_user`
  - `MYSQL_PASSWORD=app_pass`
  - `MYSQL_ROOT_PASSWORD=root_pass`
- You may uncomment the `env_file: ./.env` line in `docker-compose.yml` to pass environment variables to the PHP service.

### Build and Run Instructions
1. **Build and start all services:**
   ```sh
   docker compose up --build
   ```
   This will build the PHP application image and start the PHP-FPM, MySQL, and Redis containers.

2. **Accessing Services:**
   - **PHP-FPM:** Exposed on port `9000` (internal use; connect via Nginx or Caddy if needed)
   - **MySQL:** Exposed on port `3306`
   - **Redis:** Exposed on port `6379`

### Special Configuration
- The application runs as a non-root user (`appuser`) for improved security.
- `storage` and `bootstrap/cache` directories are writable as required by Laravel.
- MySQL data is persisted in the `db_data` Docker volume.
- Redis is used for caching and queueing (see `config/cache.php` and `config/queue.php`).

### Notes
- Ensure your `.env` file is configured with the correct database and cache settings to match the Docker Compose configuration.
- If you need to run migrations or seed the database, use `docker compose exec php-app php artisan migrate` and `docker compose exec php-app php artisan db:seed`.

Refer to the provided `docker-compose.yml` and `Dockerfile` for further customization as needed for your environment.