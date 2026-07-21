# 🌦️ Laravel Weather API

A RESTful Weather API built with Laravel that allows users to search cities, retrieve current weather, view forecasts, and manage their favorite locations.

## ✨ Features

- Current weather information
- Multi-day weather forecast
- City search
- User authentication
- Save favorite cities
- Request validation
- Eloquent relationships
- Edit and update weather, forecasts

---

## 🛠️ Built With

- Laravel 13
- PHP 8.3+
- MySQL
- Eloquent ORM
- Blades on FE
- Tailwind CSS

---

## 🚀 Starting the project

1. Install dependencies for php

```bash 
composer i
```

2. Install dependencies for js

```bash
npm i
```

3. Setup the database connection and weather api in your .env file (Project uses [Weather API](https://weatherapi.com) to fetch the data, so you need to create an account there to get API key and access their API)

```bash
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=laravel
# DB_USERNAME=root
# DB_PASSWORD=

#WEATHER_API_KEY=
#WEATHER_API_URL=https://api.weatherapi.com/v1
```

4. Run the migrations

```bash
php artisan migrate
```

5. Start the project

```bash
npm run dev
```
```bash
php artisan serve
```

