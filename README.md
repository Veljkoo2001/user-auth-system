
---

# 🔐 PHP User Authentication System

A modern, secure PHP-based user authentication system with registration, login, and dashboard functionality. Built with security best practices including password hashing, prepared statements, and session management.

![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-00000F?style=for-the-badge&logo=mysql&logoColor=white)
![HTML5](https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white)
![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white)

## 📋 Features

- **User Registration** - Create new accounts with validation
- **Secure Login/Logout** - Session-based authentication
- **Password Hashing** - Using PHP's `password_hash()` for secure storage
- **Form Validation** - Both client and server-side validation
- **SQL Injection Prevention** - Prepared statements throughout
- **Responsive Design** - Mobile-friendly interface with Font Awesome icons
- **User Dashboard** - Protected area for authenticated users

## 🛡️ Security Features

- Passwords hashed with `PASSWORD_DEFAULT` algorithm
- Prepared statements for all database queries
- XSS prevention with `htmlspecialchars()` on output
- Session management for authenticated users
- Input sanitization and validation

## 🚀 Quick Start

### Prerequisites

- PHP 7.4 or higher
- MySQL 5.7 or higher
- Web server (Apache/Nginx) or XAMPP/WAMP/MAMP

### Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/Veljkoo2001/user-auth-system.git
   cd user-auth-system
   ```

2. **Configure database**
   - Create a MySQL database named `login_system`
   - Import the database structure (you'll need to create this):
   ```sql
   CREATE TABLE users (
       id INT AUTO_INCREMENT PRIMARY KEY,
       username VARCHAR(50) UNIQUE NOT NULL,
       email VARCHAR(100) UNIQUE NOT NULL,
       password VARCHAR(255) NOT NULL,
       created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
   );
   ```

3. **Update database configuration**
   - Open `config/database.php`
   - Update database credentials if needed:
   ```php
   $host = 'localhost';
   $dbname = 'login_system';
   $username = 'root';  // Change if different
   $password = '';      // Add password if set
   ```

4. **Run the application**
   - Place the project in your web server directory (e.g., `htdocs` for XAMPP)
   - Access via browser: `http://localhost/user-auth-system`

## 📁 Project Structure

```
user-auth-system/
│
├── config/
│   └── database.php      # Database connection configuration
│
├── includes/
│   ├── auth.php          # Authentication functions (login, register, logout)
│   └── functions.php     # Helper functions (sanitization, validation, redirect)
│
├── css/
│   └── style.css         # Main stylesheet
│
├── index.php             # Landing page / Home
├── login.php             # User login page
├── register.php          # User registration page
├── dashboard.php         # Protected user dashboard
├── logout.php            # Logout handler
└── test_db.php           # Database connection test utility
```

## 💻 Usage

### Registration
1. Navigate to `register.php`
2. Fill in username, email, and password (minimum 8 chars, 1 uppercase, 1 number)
3. Click "Register" to create an account

### Login
1. Go to `login.php`
2. Enter username/email and password
3. Successful login redirects to dashboard

### Dashboard
- Accessible only to authenticated users
- Displays user information
- Contains logout option

## 🧪 Testing

Use `test_db.php` to verify your database connection:
```
http://localhost/user-auth-system/test_db.php
```

## 🔧 Customization

### Styling
- All styles are in `css/style.css`
- Font Awesome icons are included for better UI

### Validation Rules
- Password requirements can be modified in `includes/functions.php` (`validatePassword` function)
- Email validation uses PHP's built-in `FILTER_VALIDATE_EMAIL`

## ⚠️ Important Notes

- **Session Security**: The system uses PHP sessions. For production, consider:
  - Setting `session.cookie_secure = 1` for HTTPS
  - Configuring `session.cookie_httponly = 1`
  - Implementing CSRF tokens for forms

- **Password Recovery**: The "Forgot Password" feature is currently a placeholder. Implement email-based recovery for production use.

- **Remember Me**: The "Remember Me" checkbox is currently a UI element. Implement token-based persistent login if needed.

## 🚀 Future Enhancements

- [ ] Email verification for new accounts
- [ ] Password reset functionality
- [ ] "Remember Me" feature with secure tokens
- [ ] CSRF protection
- [ ] Rate limiting for login attempts
- [ ] User profile management
- [ ] Admin panel for user management

## 📝 License

This project is open source and available under the [MIT License](LICENSE).

## 👨‍💻 Author

**Veljkoo2001**
- GitHub: [@Veljkoo2001](https://github.com/Veljkoo2001)

## 🙏 Acknowledgments

- [Font Awesome](https://fontawesome.com) for icons
- [PHP.net](https://php.net) for documentation and best practices

---

**⭐ Star this repository if you find it useful!**

---
