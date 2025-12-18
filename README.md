# Shipment_Tracking

Shipment Tracking Assessment – A web application to manage and track shipments, built using **PHP 8.2** and **Laravel 12**.

---

## Features

- **Shipment List** (`/shipments`)
    - Displays shipments with tracking number, receiver name, destination city, status, and shipment date.
    - Pagination for large datasets.
    - Search shipments by tracking number.

- **Shipment Details** (`/shipments/{id}`)
    - Shows full shipment details including sender and receiver information.
    - Displays shipment status timeline with timestamps and locations.

- **Database Structure**
    - `shipments` table: stores shipment details.
    - `status_logs` table: tracks status changes with timestamps and locations.

- **Server-Side Rendering (SSR)** using Blade templates.

---

## Technology Stack

| Layer     | Technology      | Version  |
| --------- | --------------- | -------- |
| Backend   | PHP             | 8.2      |
| Framework | Laravel         | 12       |
| Database  | MySQL           | 10.4     |
| ORM       | Eloquent        | Built-in |
| SSR       | Blade Templates | Built-in |

---

## Installation & Setup

1. **Clone the repository**

```bash
git clone < https://github.com/Prashantdhepe/Shipment_Tracking >
cd API
```

2. **Configure environment**

```bash
cp .env.example .env
```

Edit `.env` and set your database credentials:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=shipment_tracking
DB_USERNAME=root
DB_PASSWORD=
```

3. **Create database**

```sql
CREATE DATABASE shipment_tracking;
```

4. **Run migrations**

```bash
php artisan migrate
```

5. **Seed database with fake data**

```bash
php artisan db:seed --class=ShipmentSeeder
```

6. **Start the server**

```bash
php artisan serve
```

---

## Access the Application

- Shipment List: [http://127.0.0.1:8000/shipments]
- Shipment Details: Click any tracking number in the list to view full details.

---

## Directory Structure

```
Shipment Tracking
|──API
    ├── app/Models/
    │   ├── Shipment.php
    │   └── StatusLog.php
    ├── app/Http/Controllers/
    │   └── ShipmentController.php
    ├── database/
    │   ├── migrations/
    │   └── seeders/
    ├── resources/views/shipments/
    │   ├── index.blade.php
    │   └── show.blade.php
    ├── routes/web.php
    └── README.md
```

## Author

- Developed by **[Prashant Dhepe]**
- GitHub: [https://github.com/Prashantdhepe]
