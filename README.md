# Laravel 11 Application

This is a Laravel 11 application that integrates with a WHOIS API to fetch domain and contact information. Below are the instructions for setting up, configuring, and running the application.

## Requirements

Before setting up the project, ensure that your system meets the following requirements:

- **PHP 8.2** or later
- **Composer 2.0** or later
- **Laravel 11**
- **WHOIS API Key** (you can obtain this from the WHOIS API provider)

## Setup

### 1. Clone the Repository
First, clone the repository to your local machine:

```bash
git clone https://github.com/kennethtomagan/whoi-backend.git
cd whoi-backend
```

### 2. Install Dependencies
Install the PHP dependencies using Composer:

```bash
composer install
```

### 3. Environment Configuration
Copy the .env.example file to create your own environment configuration:

```bash
cp .env.example .env
```
Then, update the .env file with your database credentials and WHOIS API key:

```bash
WHOIS_API_KEY=your_api_key
```

### 4. Generate Application Key
Generate the application key, which is used for encryption:

```bash
php artisan migrate
```

## Running the Application

### Development Server
Start the development server on http://127.0.0.1:8000:
```bash
php artisan serve
```
