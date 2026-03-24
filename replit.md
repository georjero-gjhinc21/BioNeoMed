# BioNeoMed WordPress - Replit Setup

## Overview

This is a WordPress-based website for the BioNeoMed Research Foundation, a nonprofit organization. The site handles donations, research showcasing, testimonials, and community engagement.

## Architecture

- **Platform**: WordPress 6.x
- **Database**: SQLite (via wordpress/sqlite-database-integration plugin, no MySQL needed in Replit)
- **Server**: PHP 8.2 built-in web server on port 5000
- **Theme**: Custom `bioneomed-theme`
- **Plugin**: Custom `bioneomed-core` plugin

## Key Files

- `wp-config.php` — WordPress configuration with SQLite and dynamic URL for Replit proxy
- `wp-router.php` — PHP built-in server router (handles WordPress URL rewriting)
- `start.sh` — Startup script that launches PHP server on port 5000
- `wp-content/db.php` — SQLite drop-in (auto-loaded by WordPress)
- `wp-content/database/bioneomed.sqlite` — SQLite database file

## Custom Theme (`wp-content/themes/bioneomed-theme/`)

- `style.css` — Main stylesheet + theme metadata
- `functions.php` — Theme setup, hooks, asset enqueuing
- `header.php` / `footer.php` — Layout templates
- `index.php` / `front-page.php` — Main templates
- `inc/` — Theme helper files (customizer, template functions, etc.)
- `assets/css/` — Additional CSS
- `assets/js/` — JavaScript (main.js, donation.js)
- `template-parts/` — Reusable template parts

## Custom Plugin (`wp-content/plugins/bioneomed-core/`)

- `bioneomed-core.php` — Plugin entry point
- `includes/class-database.php` — Custom donation/analytics tables
- `includes/class-custom-post-types.php` — Research & Testimonial post types
- `includes/class-api-endpoints.php` — REST API routes
- `includes/class-zeffy-integration.php` — Zeffy donation webhook
- `includes/class-mailchimp-integration.php` — Newsletter signup
- `includes/functions.php` — Helper functions
- `admin/class-admin.php` — Admin dashboard

## WordPress Credentials (Development)

- **Admin URL**: /wp-admin
- **Username**: bioneomed_admin
- **Password**: BioNeoMed2024!

## Third-Party Integrations

- **Zeffy**: Zero-fee donation processing (configure via webhook URL)
- **Mailchimp**: Email marketing (configure API key in WP admin)
- **Google Analytics 4**: Add GA ID via Customizer
- **Cloudflare**: CDN (production only)

## Running Locally

The workflow "Start application" runs `bash start.sh` which starts PHP's built-in server on `0.0.0.0:5000`.

## Deployment Notes

The site URL is dynamically determined from the request host (`HTTP_X_FORWARDED_HOST` or `HTTP_HOST`), so it works seamlessly both in development and production.
