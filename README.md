# D'Mahesa Law Firm Web Application

A modern, responsive, and dynamic web application built for **D'Mahesa Law Firm** using Laravel 12 and Tailwind CSS v4.

## Features

- **Public Facing Pages:** Beautifully designed pages using Glassmorphism and modern web aesthetics for Home, Advocates, News, and Contact.
- **Content Management System (CMS):** A secure, manual-authentication-based Admin Panel to manage Advocates and News articles.
- **Google Socialite Login:** Admins can log in securely using their Google accounts.
- **Gemini AI Chatbot:** An integrated floating AI assistant powered by the Google Gemini API to answer basic legal inquiries and guide users.
- **Tailwind CSS v4:** Styling built using the latest Tailwind CSS v4 `@theme` approach for maximum flexibility and performance.

## Requirements

- PHP 8.2+ (Recommended: PHP 8.4 via Laravel Herd)
- Composer
- Node.js & NPM
- SQLite (default)

## Installation & Setup

1. **Clone the repository:**
   ```bash
   git clone https://github.com/AsfiCorp/233040102_AthaillahSulthanFirasyalIlmi_WebHukum.git
   cd 233040102_AthaillahSulthanFirasyalIlmi_WebHukum
   ```

2. **Install PHP and Node dependencies:**
   ```bash
   composer install
   npm install
   ```

3. **Environment Setup:**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
   *Make sure to configure the following variables in your `.env` file:*
   - `GOOGLE_CLIENT_ID`
   - `GOOGLE_CLIENT_SECRET`
   - `GOOGLE_REDIRECT_URI="${APP_URL}/auth/google/callback"`
   - `GEMINI_API_KEY`

4. **Database & Seeding:**
   ```bash
   php artisan migrate --seed
   ```
   *The database will be populated with dummy advocates, news articles, and a default admin user (`admin@dmahesa.com` / `password`).*

5. **Link Storage:**
   ```bash
   php artisan storage:link
   ```

6. **Build Frontend Assets:**
   ```bash
   npm run build
   ```

7. **Run the Application:**
   If using Herd, simply visit `http://kantor-hukum.test`. Alternatively, run:
   ```bash
   php artisan serve
   ```

## Admin Access
- **URL:** `/login`
- **Email:** `admin@dmahesa.com`
- **Password:** `password`

## License
Proprietary. All rights reserved by D'Mahesa Law Firm.
