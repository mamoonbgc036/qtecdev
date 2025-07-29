# 🛠️ Service Booking System - Laravel REST API

A basic API-driven Service Booking System built using **Laravel 12** and **Sanctum token based authtication**. Customers can register, view services, and book them. Admins can manage services and view all bookings.

---
# 🛠️ Live Endpoint Base Url

https://beta.rentandrooms.com/

---

## 🚀 Features

### ✅ Core Features
- Customer Registration & Login (Token-based using Sanctum)
- Admin Login (seeded credentials)
- Service Listing and Booking for Customers
- Admin Management of Services
- Role-based Access Control
- Input Validation (via Form Requests)
- Prevent booking for past dates

### 🧰 Bonus Features
- Service/Repository Pattern
- API Resource Classes
- Postman Collection for API Documentation
- Database Seeder with demo data
- Clean RESTful route structure

---

## ⚙️ Requirements

- PHP >= 8.2
- Composer
- Laravel >= 10
- MySQL
- Git

---

## 🧪 Installation & Running Locally

### 1. Clone the Repository
```bash
git clone https://github.com/your-username/service-booking-system.git
cd service-booking-system
````

### 1. Install Dependency
```bash
composer install
```
### 2. Create Application key
```bash
php artisan key:generate
```
### 3. Configure Database
```bash
create database in mysql and rename .env.example to .env and put dbname and credentials in .env
```
### 4. Migration and Seed
```bash
php artisan migrate --seed
```
### 5. Run and Browse
```bash
php artisan serve
```
### 6. Import postman.json file
```bash
Import postman.json file in postman from project root and test
```
