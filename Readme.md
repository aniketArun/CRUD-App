# CRUD Application with PHP and Bootstrap

This is a CRUD (Create, Read, Update, Delete) application built with PHP, MySQL, and Bootstrap. It allows users to perform basic operations on user data, including adding, editing, and deleting user records.

## Features

1. **Login System**:
   - Admin authentication with encrypted passwords.
   - Session management to restrict access to certain pages.

2. **User Management**:
   - Add new users with fields for name, email, date of birth, and phone.
   - View a list of all users in a table.
   - Edit and delete users.

3. **Responsive Design**:
   - Built with Bootstrap to ensure a user-friendly and mobile-responsive interface.

4. **Database Structure**:
   - Two tables: `admin` for admin credentials and `users` for user data.

---

## File Structure

```
crudApp/
|-- config/
|   |-- config.php        # Database connection
|
|-- includes/
|   |-- create_tables.php # Script to create database tables
|   |-- functions.php     # Utility functions
|
|-- templates/
|   |-- header.php        # Header template with Bootstrap navbar
|   |-- footer.php        # Footer template with Bootstrap styling
|
|-- pages/
|   |-- login.php         # Login page for admin
|   |-- dashboard.php     # Dashboard for managing users
|   |-- edit_user.php     # Edit user functionality
|   |-- delete_user.php   # Delete user functionality
|   |-- logout.php        # Logout functionality
|
|-- index.php
|
|-- README.md             # Documentation
```

---

## Setup Instructions

### 1. Clone or Download the Repository
```bash
git clone https://github.com/your-repo/crudApp.git
```

### 2. Configure Database
- Create a database named `usermanage_db` in your MySQL server.
- Update database credentials in `includes/config.php`:
  ```php
  $host = 'localhost';
  $db = 'usermanage_db';
  $user = 'root';
  $pass = '';
  ```

### 3. Create Database Tables
- Run the `scripts/create_tables.php` script to create the necessary tables:
  ```bash
  php scripts/create_tables.php
  ```

### 4. Add Admin User
- Manually insert an admin record into the `admin` table with an encrypted password:
  ```sql
  INSERT INTO admin (name, email, password)
  VALUES ('Admin', 'admin@example.com', '{encrypted_password_here}');
  ```
  Use `functions.php` to generate the encrypted password:
  ```php
  echo password_hash('your_password', PASSWORD_BCRYPT);
  ```

### 5. Start Local Server
- Place the project in the `htdocs` directory of XAMPP or a similar local server setup.
- Navigate to the project URL in your browser:
  ```
  http://localhost/crudApp/pages/login.php
  ```

---

## Usage

### Login
- Use the admin credentials to log in.

### Dashboard
- View, add, edit, and delete user records.

### Logout
- Use the logout button in the navbar to end the session.

---


## Technologies Used
- PHP
- MySQL
- Bootstrap

---

## License
This project is licensed under the [MIT License](LICENSE).

---

## Author
- **Mr Aniket Arun Pendhari**: [Aniket Pendhari](https://github.com/aniketArun)

