# Climate Change Club website

Climate Change Club is a PHP website for student-led climate action. It presents current projects, articles, video resources, community updates, account access, and a small administrative area for club content.

## What is in this release

Version 27.1 focuses on speed, discoverability, and a more polished experience:

- Full-width responsive visual system with a reading progress indicator and back-to-top control.
- Organization structured data, richer social previews, security headers, and updated sitemap coverage.
- Public release history in `changelog.php` and `CHANGELOG.md`.
- An action-first homepage with a guided next-step picker, real progress states, and fewer interruptions.
- Responsive navigation, a keyboard skip link, visible focus states, and keyboard-accessible action tabs.
- Environment-based site, database, and SMTP configuration.
- Safer session cookies plus CSRF-protected, POST-only administrative changes.
- Consolidated documentation in `beta-docs.php` and an aligned sitemap.

## Run locally

This project needs a PHP-capable web server. Copy `.env.example` to `.env`, then add environment variables through your local server or hosting provider. Do not commit `.env`.

Public pages work without a database. Account, article, order, and donation features need these variables:

```text
DB_HOST
DB_PORT
DB_NAME
DB_USER
DB_PASSWORD
```

Set `SITE_URL` to the deployed HTTPS URL. Set `SITE_BASE_PATH` only for a subdirectory installation such as `/ccc-website`.

## Security notes

All credentials must be stored in the deployment environment, not PHP source. If an earlier copy of the repository contained credentials, rotate those values with the relevant database and email providers before deploying this version.

Administrative create, edit, and delete operations require authentication, a CSRF token, and POST requests. Keep the PHP runtime and PHPMailer dependency updated.

## Validation

Before publishing, run PHP syntax checks, check important pages at desktop and mobile widths, and test keyboard navigation. The public documentation page has the full release checklist: `beta-docs.php`.
