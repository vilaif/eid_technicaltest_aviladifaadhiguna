# Smart Manufacturing Dashboard

A web-based dashboard for monitoring production machine performance and generating production reports by shift, developed as part of the technical test for PT Electrindo Inti Dinamika.

## Tech Stack

- Laravel 12
- Filament v4 (admin panel + authentication)
- MySQL

## Features

- **Machine Data Management** — CRUD operations for machine data (CNC, Milling, Press, Assembly), including machine status and temperature
- **Production Monitoring** — real-time dashboard with auto-refresh, displaying machine status and hourly production charts
- **Production Reports** — production summaries by machine and shift, filterable by date and shift
- **Authentication** — admin panel login using Filament

## Installation & Setup

1. Clone the repository

```bash
git clone <repo-url>
cd eid_technicaltest_aviladifa
```

2. Install dependencies

```bash
composer install
npm install
```

3. Set up the environment

```bash
cp .env.example .env
php artisan key:generate
```

4. Configure the database settings in `.env`

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=eid_manufacturing
DB_USERNAME=root
DB_PASSWORD=
```

5. Migrate and seed the database

```bash
php artisan migrate:fresh --seed
```

6. Build assets *(optional, only required if there are frontend changes)*

```bash
npm run build
```

7. Start the development server

```bash
php artisan serve
```

8. Open the application in your browser at:

`http://127.0.0.1:8000/admin`

## Admin Login

- Email: `admin@gmail.com`
- Password: `admin123`

## Data Structure

- `machines` — machine data, including name, type, status, and current temperature
- `production_logs` — production history for each machine, including quantity, temperature, operator, shift, and timestamp