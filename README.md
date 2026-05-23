# Auth Studio — Laravel OAuth Login System

A standalone, secure authentication system extracted from the cloudconvert project.
No database required — accounts persist to a file-locked JSON store.

## Features

- Email & password sign-up / sign-in (bcrypt password hashing)
- Social OAuth via Laravel Socialite — Google & Microsoft
- Forgot-password flow with emailed verification codes and expiring reset tokens
- Optional two-step verification (6-digit code after sign-in)
- Profile management (name, avatar upload/URL, contact details) and account settings

## Requirements

- PHP 8.2+
- Composer (dependencies are already vendored in `vendor/`)

## Setup

1. Copy `.env.example` to `.env` (a working `.env` with OAuth credentials is already included).
2. If `APP_KEY` is empty, generate one: `php artisan key:generate`
3. Start the dev server:

   ```bash
   php artisan serve
   ```

   Then open http://localhost:8000

## OAuth configuration

Provider credentials live in `.env` (`GOOGLE_*`, `MICROSOFT_*`). The redirect URIs must
match those registered in the Google Cloud Console / Azure App Registration:

- Google:    `http://127.0.0.1:8000/auth/google/callback`
- Microsoft: `http://localhost:8000/auth/microsoft/callback`

## Account storage

User accounts are stored in `storage/app/user-accounts.json`. No migrations needed.

## Useful commands

```bash
php artisan optimize:clear   # clear all caches (config, route, view, events)
php artisan route:list       # list all routes
```

<!-- auto-push test 17:51:15 -->
