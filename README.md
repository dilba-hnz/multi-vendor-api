# Multi-Vendor Order & Inventory API

A backend-only Laravel REST API for a marketplace-style platform where multiple vendors can manage products and customers can place orders.

The goal of this project is to build a production-oriented backend system that demonstrates real-world backend concepts such as authorization, inventory management, concurrency handling, caching, asynchronous processing, and automated testing.

---

## Tech Stack

- PHP 8.3+
- Laravel 12
- MySQL
- Redis
- Laravel Sanctum
- PHPUnit / Pest

---

## 🎯 Project Goals

- 🏪 Multi-vendor product management
- 🛒 Customer order processing
- 📦 Inventory management
- 🔐 Secure API authentication
- 🛡️ Role-based authorization
- 💾 Database transaction handling
- 🔒 Concurrency control to prevent overselling
- 📨 Background job processing
- ⚡ Performance optimization with caching

---

## ✨ Current Features

### 🔐 Authentication

Implemented:

- 📝 User registration
- 🔑 User login
- 🚪 User logout
- 🎟️ Token-based authentication using Laravel Sanctum

---

## 🧩 Planned Features

### 🏪 Vendor Management

- 👤 Vendor profile management
- 🛡️ Vendor-specific product authorization
- 📦 Product inventory management


### 📦 Product Management

- ➕ Product CRUD operations
- 🗂️ Categories
- 🔍 Search and filtering
- 📄 Pagination
- 🚀 Query optimization


### 🛒 Order System

- 📝 Order creation
- 📋 Order items management
- ✅ Stock validation
- 💾 Database transactions
- 📉 Inventory deduction


### 🚀 Advanced Features

- 🔒 Prevent overselling using database locking
- ⚡ Redis caching for product listings
- 📨 Queue-based order processing
- 📧 Email notifications
- 🧾 Invoice generation
- 🚦 Rate limiting
- 📚 API documentation with Swagger
- 🧪 Feature and unit testing

---

## 🚀 Development Roadmap

-[x] 🏗️ Project initialization
-[x] 🔐 Authentication system
-[ ] 🏪 Vendor management
-[ ] 📦 Product management
-[ ] 🛒 Order management
-[ ] 🔒 Inventory locking
-[ ] 📨 Queue processing
-[ ] ⚡  Redis caching
-[ ] 🧪 Automated testing
-[ ] 📚 API documentation

