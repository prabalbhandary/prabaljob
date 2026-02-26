# Job Finder API + Filament Admin Dashboard

This repository contains a Laravel + Filament codebase for a role-based Job Finder platform with:

- REST API for auth, profiles, jobs, and applications.
- Filament admin dashboard for user/job/application/notification management.
- Database schema aligned with employer and employee requirements.

## Main modules

- **Authentication:** register, login, logout (Sanctum token flow).
- **Admin Dashboard (Filament):**
  - User management
  - Job management
  - Application review
  - Notification management
  - App stats widget
- **Employee features:** browse jobs, apply to jobs, maintain profile.
- **Employer features:** manage company profile and CRUD jobs.

## API routes

- `POST /api/auth/register`
- `POST /api/auth/login`
- `POST /api/auth/logout`
- `GET /api/jobs`
- `GET /api/jobs/{job}`
- `POST /api/jobs`
- `PUT /api/jobs/{job}`
- `DELETE /api/jobs/{job}`
- `GET /api/applications`
- `POST /api/jobs/{job}/apply`
- `GET /api/profile`
- `PUT /api/profile/employer`
- `PUT /api/profile/employee`

## Admin Dashboard

- Filament admin path: `/admin`
- Dashboard statistics available via `AppStatsOverview` widget.

## Setup

1. Install dependencies:
   - `composer install`
2. Configure environment:
   - `cp .env.example .env`
   - `php artisan key:generate`
3. Run migrations:
   - `php artisan migrate`
4. Create an admin user and login to `/admin`.

## Deliverable package

Binary zip files are not tracked in Git for this repository.

To create a downloadable package locally, run:

```bash
zip -r jobfinder-laravel-filament.zip . -x '.git/*' '.gitignore'
```
