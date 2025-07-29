# 🛠️ Service Booking System - Laravel REST API

A basic API-driven Service Booking System built using **Laravel 10** and **Sanctum**. Customers can register, view services, and book them. Admins can manage services and view all bookings.

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

## 📁 Project Structure Highlights

- `App\Http\Controllers\Api\V1` – All versioned API Controllers
- `App\Http\Requests\V1` – FormRequest classes for validation
- `App\Http\Resources\V1` – API Resource for formatted responses
- `App\Repositories` – Repository layer for business logic
- `routes/api.php` – Versioned API routes under `/api/v1`
- `database/seeders` – Admin and service seeding

---

## ⚙️ Requirements

- PHP >= 8.1
- Composer
- Laravel >= 10
- MySQL
- Node.js & NPM (for frontend assets if needed)
- Git

---

## 🧪 Installation & Running Locally

### 1. Clone the Repository
```bash
git clone https://github.com/your-username/service-booking-system.git
cd service-booking-system
