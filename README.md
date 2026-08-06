# 🌦️ ForecastHub

<p align="center">

![Laravel](https://img.shields.io/badge/Laravel-12-red?style=for-the-badge&logo=laravel)
![Vue](https://img.shields.io/badge/Vue-3-42b883?style=for-the-badge&logo=vue.js)
![PHP](https://img.shields.io/badge/PHP-8.2-777BB4?style=for-the-badge&logo=php)
![MySQL](https://img.shields.io/badge/MySQL-Database-4479A1?style=for-the-badge&logo=mysql)
![Vite](https://img.shields.io/badge/Vite-Frontend-646CFF?style=for-the-badge&logo=vite)

</p>

A modern **Full Stack Weather Forecast Application** built using **Laravel 12**, **Vue 3**, and **MySQL**. The application provides real-time weather information, 3-day forecasts, geolocation support, dark mode, and persistent search history using a clean RESTful architecture.

---

# 🚀 Features

## 🌤 Weather

- Search weather by city name
- Current weather conditions
- 3-day weather forecast
- Weather icons and detailed information
- Real-time data from WeatherAPI

---

## 📍 Location

- Detect user's current location
- Automatically fetch weather using browser Geolocation API

---

## 🌙 UI Features

- Dark / Light mode
- Responsive design
- Clean and modern interface
- Smooth user experience

---

## 🕘 Search History

- Stores recently searched cities
- Retrieves last five searches
- MySQL database persistence

---

## ⚙ Backend Features

- RESTful API
- Service Layer Architecture
- MVC Pattern
- Input Validation
- Exception Handling
- Database Integration
- Clean JSON Responses

---

# 🏗 Tech Stack

| Technology | Purpose |
|------------|----------|
| Laravel 12 | Backend API |
| Vue 3 | Frontend SPA |
| PHP 8.2 | Backend Language |
| MySQL | Database |
| Axios | API Requests |
| Vite | Frontend Bundler |
| WeatherAPI | Weather Data |
| Composer | PHP Dependency Manager |
| npm | JavaScript Package Manager |

---

# 📂 Project Structure

```text
ForecastHub/
│
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       └── Api/
│   │           └── WeatherController.php
│   │
│   ├── Models/
│   │   └── SearchHistory.php
│   │
│   └── Services/
│       └── WeatherService.php
│
├── database/
│   └── migrations/
│
├── public/
│
├── resources/
│   ├── js/
│   │   ├── app.js
│   │   └── components/
│   │       └── WeatherDashboard.vue
│   │
│   └── views/
│       └── welcome.blade.php
│
├── routes/
│   └── web.php
│
├── .env
├── composer.json
├── package.json
└── vite.config.js
```

---

# 🏛 System Architecture

```text
                User
                  │
                  ▼
          Vue 3 Frontend
                  │
          Axios HTTP Client
                  │
                  ▼
        Laravel REST API
                  │
        Weather Service Layer
           │             │
           │             ▼
           │      WeatherAPI
           │
           ▼
      MySQL Database
```

---

# 📸 Screenshots

## Home Page

> Add screenshot here

```
images/home.png
```

---

## Weather Forecast

> Add screenshot here

```
images/forecast.png
```

---

## Dark Mode

> Add screenshot here

```
images/dark-mode.png
```

---

# ⚙ Installation

## Clone Repository

```bash
git clone https://github.com/RaghavSingal2002/ForecastHub.git

cd ForecastHub
```

---

## Install Dependencies

### Backend

```bash
composer install
```

### Frontend

```bash
npm install
```

---

## Configure Environment

Copy the environment file.

```bash
cp .env.example .env
```

Update the database configuration.

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=weather_db
DB_USERNAME=root
DB_PASSWORD=
```

Add your WeatherAPI key.

```env
WEATHER_API_KEY=YOUR_API_KEY
```

---

## Generate Application Key

```bash
php artisan key:generate
```

---

## Run Database Migrations

```bash
php artisan migrate
```

---

## Start Development Server

Terminal 1

```bash
php artisan serve
```

Terminal 2

```bash
npm run dev
```

Visit

```
http://127.0.0.1:8000
```

---

# 🔌 REST API

## Get Weather

```
GET /api/weather?q=London
```

### Sample Response

```json
{
  "location": "London",
  "temperature": 23,
  "condition": "Sunny",
  "humidity": 40
}
```

---

## Search History

```
GET /api/history
```

Returns the last five searched cities.

---

# 🗄 Database

## search_histories

| Column | Type |
|----------|------|
| id | bigint |
| location | string |
| created_at | timestamp |
| updated_at | timestamp |

---

# 🌍 External APIs

The application integrates with:

- WeatherAPI

Features used:

- Current Weather
- Forecast API
- Geolocation Search

---

# 🔒 Security

- API Key stored securely in `.env`
- Backend input validation
- Eloquent ORM protection
- Exception handling
- RESTful API design
- No API key exposed to frontend

---

# 📚 Learning Outcomes

This project demonstrates:

- Full Stack Development
- Laravel MVC Architecture
- Vue 3 Composition API
- REST API Development
- Service Layer Pattern
- MySQL Integration
- External API Integration
- Database Migrations
- Responsive UI Development
- Geolocation API
- State Management

---

# 🚀 Future Enhancements

- User Authentication
- Favorite Cities
- Temperature Unit Toggle
- Weather Charts
- Hourly Forecast
- Push Notifications
- Tailwind CSS UI Improvements
- Docker Support
- CI/CD Pipeline
- AWS Deployment
- DigitalOcean Deployment

---

# 👨‍💻 Author

## Raghav Singal

**Full Stack Developer | AI/ML Engineer**

GitHub:
https://github.com/RaghavSingal2002

---

# ⭐ Support

If you found this project useful, consider giving it a ⭐ on GitHub.

---

# 📄 License

This project is licensed under the MIT License.
