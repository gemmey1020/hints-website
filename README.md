# HINTS Website

Source for the HINTS brand website, including its editorial pages, responsive styling, and structured SEO metadata. The application is built with Laravel 13 and includes the site source and public assets needed for local development.

## Pages

- `/` — homepage
- `/doctrine`, `/disciplines`, `/engagements`, `/archive`, and `/vault` — editorial pages
- `/sitemap.xml` — generated sitemap

## Requirements

- PHP 8.3 or newer
- Composer
- Node.js and npm
- SQLite for the default local database

## Local setup

```bash
cp .env.example .env
composer install
npm install
mkdir -p database
touch database/database.sqlite
php artisan key:generate
php artisan migrate
npm run build
php artisan serve
```

Open the local URL printed by `php artisan serve`. For frontend development, run `npm run dev` in a second terminal. Set `APP_URL` in `.env` to the address where the site is served.

Do not commit `.env`, local databases, browser captures, generated build output, or runtime files. The public export excludes internal approvals and workspace records. Canonical brand assets that are not part of the site source are not included.

## License

No project license has been selected. Public visibility does not grant permission to reuse or redistribute this code; all rights remain reserved by the copyright holder unless a license is added.
