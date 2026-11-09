# Online Course Management System

A web-based Online Course Management System developed using PHP and MySQL as an undergraduate Computing (Software Engineering) project. The platform allows users to explore available courses, browse categories, search for courses, and make online bookings.

## Project Overview

This application provides a platform for discovering and booking courses online. It includes a customer-facing website and an administrative panel for managing courses, categories, and customer bookings.

## Technologies Used

- **Frontend:** HTML5, CSS3, JavaScript
- **Backend:** PHP
- **Database:** MySQL
- **Development Environment:** XAMPP
- **Database Management:** phpMyAdmin

## Key Features

### Customer Features

- Browse available courses
- Explore courses by category
- Search for courses
- View course information and pricing
- Submit course booking requests
- Contact the platform

### Admin Features

- Administrator login
- Add, update, and delete courses
- Manage course categories
- Manage course images
- View customer bookings
- Manage booking information

## Project Structure

```text
course-finder/
├── admin/
├── config/
├── css/
├── images/
├── partials-front/
├── database/
│   └── course_finder.sql
├── booking.php
├── categories.php
├── category-courses.php
├── contactus.php
├── course-search.php
├── courses.php
├── index.php
└── README.md
```

## Installation and Setup

### 1. Install XAMPP

Download and install [XAMPP](https://www.apachefriends.org/).

### 2. Clone the Repository

```bash
git clone https://github.com/YOUR_USERNAME/online-course-management-system.git
```

### 3. Move the Project

Place the project folder inside XAMPP's `htdocs` directory.

### 4. Start Apache and MySQL

Open XAMPP and start Apache and MySQL.

### 5. Create the Database

1. Open phpMyAdmin at `http://localhost/phpmyadmin/`.
2. Create a database named `course_finder`.
3. Select the database.
4. Open the Import tab.
5. Import `database/course_finder.sql`.

### 6. Configure Database Connection

Open `config/constants.php` and configure the database connection.

Default local settings:

```php
define('SITEURL', 'http://localhost/course-finder/');
define('LOCALHOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'course_finder');
```

Adjust credentials according to your local MySQL configuration.

### 7. Run the Application

Visit:

```text
http://localhost/course-finder/
```

## Learning Outcomes

- Developed dynamic web applications using PHP.
- Implemented MySQL database integration.
- Practised CRUD operations.
- Developed frontend and backend functionality.
- Implemented course searching and booking.
- Gained practical experience in database management.

## Academic Project

Developed as an undergraduate academic project as part of a Computing (Software Engineering) degree.

## Database Note

The database contains sample testing data for demonstration purposes.

## Author

Htoo Wunna Aung
