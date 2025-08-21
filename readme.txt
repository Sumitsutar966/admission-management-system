# Student Admission Management System

A web-based application for managing student admissions using PHP and MySQL.

## Features

- Admin and User login system
- Student registration with document uploads
- View, update, and delete student records
- Dashboard showing statistics for admin and user registrations
- Responsive UI with navigation bars

## Installation

1. **Download and Unzip**  
   Download the project and unzip it on your local system.

2. **Move to Root Directory**  
   Place the `student_admission_mgt_system` folder inside your web server's root directory (e.g., `htdocs` for XAMPP).

3. **Database Setup**  
   - Open phpMyAdmin.
   - Import the database from [`mysql/registration.sql`](mysql/registration.sql).

4. **Configuration**  
   - Ensure your database credentials in [`config/config.php`](config/config.php) match your local setup.

## Usage

- Open your browser and go to:  
  `http://localhost/student_admission_mgt_system`

### Admin Login

- **Username:** admin  
- **Password:** admin123

### User Login

- **Username:** user  
- **Password:** user123

## File Structure

- `index.php` - Admin login
- `user/user.php` - User login
- `user/signup.php` - User registration
- `admin/register.php` - Student registration by admin
- `admin/view_students.php` - View all students
- `admin/update_student.php` - Update student details
- `admin/delete.php` - Delete student record
- `config/config.php` - Database connection
- `mysql/registration.sql` - Database schema and sample data

## Documentation

See [`documentation/student mgt system.docx`](documentation/student%20mgt%20system.docx) for detailed documentation.

## License

This project is for educational purposes.
