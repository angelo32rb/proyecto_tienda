# Cosmetics Store - Academic Project

## Overview

This is a **cosmetics store web application** developed as an **academic class project**. It demonstrates the implementation of a web application using the **MVVM (Model–View–ViewModel with DTO) architectural pattern** in PHP.

**⚠️ IMPORTANT SECURITY NOTICE**: This is a **demonstration/emulation project** and **NOT a real store**. The application lacks proper input filtering and validation for educational purposes, making it vulnerable to various security attacks.

## Architecture

The project follows the **MVVM (Model–View–ViewModel)** architectural pattern:

- **Models**: Handle database operations and business logic
- **DTOs (Data Transfer Objects)**: Manage data transfer between layers
- **Views**: Handle the presentation layer (PHP components)
- **Controllers**: Manage the application flow and user input processing

## Features

- **Product Management**: View, add, edit, and delete cosmetic products
- **User Authentication**: Login and registration system
- **Admin Panel**: Administrative interface for managing products and users
- **Contact System**: Contact form for user messages
- **Responsive Design**: Bootstrap 5 implementation
- **Image Upload**: Product image management system

## Project Structure

```
proyecto_tienda/
├── assets/
│   ├── css/                 # Stylesheets
│   ├── js/                  # JavaScript files
│   └── imgs/                # Images and media files
├── components/
│   ├── admin/               # Admin panel components
│   ├── auth/                # Authentication components
│   ├── main/                # Main application components
│   ├── Notifications/       # Toast notifications
│   └── Sessions/            # Session management
├── controllers/             # Controller classes
├── db/                      # Database schema
├── dto/                     # Data Transfer Objects
├── models/                  # Model classes
├── pages/                   # Main application pages
└── uploads/                 # Uploaded files directory
```

## Database Structure

The application uses MySQL with three main tables:

- **usuarios** (users): User accounts and authentication
- **productos** (products): Product information and details
- **mensajes** (messages): Contact form submissions

## Security Vulnerabilities (Educational Purpose)

**⚠️ WARNING**: This application contains security vulnerabilities for educational demonstration:

### 1. Cross-Site Scripting (XSS)

- **Stored XSS**: User inputs are not properly sanitized before being stored in the database
- **Reflected XSS**: URL parameters and form inputs are not filtered
- **DOM-based XSS**: Client-side JavaScript may process untrusted data

### 2. Cross-Site Request Forgery (CSRF)

- No CSRF tokens implemented
- State-changing operations can be performed without proper validation

### 3. Input Validation Issues

- Lack of proper input sanitization
- No server-side validation for many form fields
- File upload security is minimal

### 4. Authentication Weaknesses

- Passwords are stored in plain text
- No password complexity requirements
- Session management could be improved

## Technologies Used

- **Backend**: PHP 8.0+
- **Database**: MySQL/MariaDB
- **Frontend**: HTML5, CSS3, JavaScript
- **Framework**: Bootstrap 5
- **Server**: Apache (XAMPP)
- **Architecture**: MVVM Pattern

## Installation & Setup

1. **Prerequisites**:

   - XAMPP (or similar) with PHP 8.0+ and MySQL
   - Web browser

2. **Installation**:

   ```bash
   # Clone or download the project to your XAMPP htdocs folder
   # Navigate to: C:/xampp/htdocs/proyecto_tienda
   ```

3. **Database Setup**:

   - Import the SQL file: `db/tienda_cosmeticos.sql`
   - Ensure MySQL is running on localhost:3306
   - Default credentials: root (no password)

4. **Access**:
   - Navigate to: `http://localhost/proyecto_tienda`
   - Admin login: username `administrador`, password `123`

## Usage

### For Regular Users:

- Browse products on the main page
- View product details
- Contact the store through the contact form

### For Administrators:

- Login through `/pages/login.php`
- Access admin panel at `/pages/admin.php`
- Manage products, users, and view messages

## Educational Purpose

This project was created as a **class assignment** to demonstrate:

- Web development fundamentals
- MVC architectural patterns
- Database integration
- User authentication systems
- Security vulnerabilities (for learning purposes)

## Disclaimer

**This is not a production-ready application**. It is designed for educational purposes only and should never be deployed in a real-world environment without significant security improvements.

## Contributing

As this is an academic project, contributions are not expected. However, if you're using this for educational purposes, feel free to fork and modify for your own learning.

## License

This project is created for educational purposes. Please respect academic integrity policies if using this code for assignments.

---

**Remember**: Always implement proper security measures in real-world applications!
