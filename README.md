# Balitikuri Cooperative Bank — Full-Stack Web Platform

![Laravel](https://img.shields.io/badge/Laravel-12.x-FF2D20?style=flat&logo=laravel)
![Angular](https://img.shields.io/badge/Angular-12.x-DD0031?style=flat&logo=angular)
![MySQL](https://img.shields.io/badge/MySQL-8.0-4479A1?style=flat&logo=mysql)

A modern, highly secure, full-stack web application engineered for Balitikuri Cooperative Bank. This platform replaces a legacy static site with a dynamic banking ecosystem, providing financial disclosure portals, transaction monitoring, dynamic notices, and administrative content management.

---

## 📌 Executive Summary & Architecture

- *Problem:* The bank's legacy platform (hosted on Google Sites) lacked custom database integrations, granular security, dynamic financial disclosures, and role-based administrative control.
- *Solution:* Designed and deployed a decoupled full-stack architecture featuring a custom *Laravel 12 REST API* backend paired with a high-performance *Angular 12* single-page application (SPA) frontend.
- *Key Outcomes:* Enhanced site responsiveness, normalized relational database architecture, secure audit record processing, and comprehensive client/server-side validation.

---

## 🛠️ Tech Stack & Dependencies

- *Backend Framework:* PHP 8.2+, Laravel 12 (RESTful API Design)
- *Frontend Framework:* TypeScript, Angular 12, RxJS, Angular Router, Bootstrap
- *Database Engine:* MySQL 8.0 (Normalized Relational Schema, Indexed Foreign Keys, Eloquent ORM)
- *Authentication & Security:* Laravel Sanctum / Token-based Auth, CORS policy enforcement, CSRF protection, Input Sanitization

---

## ⚙️ Key Features & Functional Modules

1. *Dynamic Banking Disclosures & Notices:* Administrative interface to publish real-time interest rates, annual financial reports, and regulatory announcements.
2. *Transaction Monitoring Panel:* Back-office administrative module built for record logging, audit handling, and compliance tracking.
3. *Role-Based Access Control (RBAC):* Granular permission management restricting sensitive configuration endpoints to authorized administrators.
4. *Client-Side Route Guards:* Angular CanActivate route guards preventing unauthenticated navigation to admin dashboards.
5. *Robust API Data Validation:* Strict request sanitization using Laravel Form Request classes before committing operations to the database.

---

## 📁 Repository Structure

```text
├── app/                  # Laravel Core Business Logic (Controllers, Models, Middleware)
├── database/             # Relational Database Design
│   ├── migrations/       # Schema Structure & Foreign Key Constraints
│   └── seeders/          # Initial Banking Configuration Data
├── routes/               # Secure RESTful API Endpoints (api.php)
└── config/               # System Configurations (CORS, Sanctum, Database)
