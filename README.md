# Climate Change Club website

Climate Change Club is a PHP website for student-led climate action. It presents current projects, articles, video resources, community updates, account access, and a small administrative area for club content.

## What is in this release

Version 28.0 represents a major design consolidation that unifies the visual system across the entire site:

- **Unified v28 design system** with consistent CSS variables, spacing scale, typography hierarchy, and component patterns across all pages.
- **Visual refinement** including calmer colors, refined shadows and borders, and more intentional interactions without changing core functionality.
- **Improved header and navigation** with clearer branding, better visual hierarchy, and stronger site identity.
- **Better spacing and rhythm** with standardized padding, margins, and whitespace reducing visual clutter and improving readability.
- **Component consistency** where cards, buttons, forms, and interactive elements share unified styling patterns throughout the site.
- **Accessibility refinements** including improved focus states, keyboard navigation, and semantic HTML structure.
- **Performance optimization** through consolidated CSS patterns and removal of redundant styles.

Previous v28.x releases added:
- Full-width responsive visual system with reading progress indicator and back-to-top control.
- Organization structured data, richer social previews, security headers, and updated sitemap coverage.
- Public release history in `changelog.php` and `CHANGELOG.md`.
- Action-first homepage with guided next-step picker, real progress states, and fewer interruptions.
- Responsive navigation, keyboard skip link, visible focus states, and keyboard-accessible action tabs.
- Environment-based site, database, and SMTP configuration.
- Safer session cookies plus CSRF-protected, POST-only administrative changes.
- Admin workspace improvements and resource page expansion.
## Run locally

This project needs a PHP-capable web server. Copy `.env.example` to `.env`, then add environment variables through your local server or hosting provider. Do not commit `.env`.

Public pages work without a database. Account, article, order, and donation features need these variables:


