# Student Management Application

A simple PHP-based student information management system built with the MVC pattern. This application allows users to register, login, and manage student records, including creation and deletion functionality.

## Features

- **User Authentication**
  - Register with username, email, and password
  - Login with email and password
  - Session management for secure access

- **Student Management**
  - View all students in a tabular format
  - Add new students with student ID, name, and email
  - Delete existing student records
  - Track who created each student record

- **Security Features**
  - Password hashing
  - Input sanitization
  - Session-based authentication
  - Protected routes

## Technology Stack

- **Backend**: PHP 8.1
- **Database**: MySQL 8.0
- **Web Server**: Apache
- **Architecture**: MVC (Model-View-Controller)
- **Frontend**: Bootstrap 5 for responsive design
- **Containerization**: Docker and Docker Compose

## Project Structure

```
.
├── config/
│   ├── database.php   # Database connection settings
│   └── init.sql       # Initial database schema
├── controllers/
│   ├── AuthController.php    # Handles authentication logic
│   └── StudentController.php # Handles student management logic
├── models/
│   ├── User.php       # User model for auth operations
│   └── Student.php    # Student model for CRUD operations
├── views/
│   ├── auth/          # Authentication views (login, register)
│   ├── layouts/       # Page templates
│   ├── students/      # Student management views
│   └── index.php      # Redirect to login
├── .htaccess          # Apache URL rewriting rules
├── index.php          # Main entry point and router
├── Dockerfile         # Docker configuration for PHP/Apache
└── docker-compose.yml # Docker Compose configuration
```

## Prerequisites

- Docker and Docker Compose
- Git (optional, for cloning the repository)

## Installation

1. Clone the repository (or download and extract the ZIP file):

    ```sh
    git clone https://github.com/yourusername/student-management-app.git
    cd student-management-app
    ```

2. Make sure Docker Desktop is running on your machine.

## Running the Project

To run this project using Docker Compose, follow these steps:

1. Make sure you have Docker and Docker Compose installed on your machine.
2. Open a terminal and navigate to the project directory.
3. Run the following command to build and start the containers in detached mode:

    ```sh
    docker-compose up --build -d
    ```

4. Once the containers are up and running, you can access the application in your web browser at `http://localhost:8080`.
5. You can also access phpMyAdmin to manage the database at `http://localhost:8081` (username: `root`, password: `root`).

## Stopping the Project

To stop the running containers, use the following command:

```sh
docker-compose down
```

To stop the containers and remove all data (including the database), use:

```sh
docker-compose down -v
```

## Database Configuration

The database connection is configured in `config/database.php`. The default settings are:

- Host: `mysql` (Docker service name)
- Database: `student_management`
- Username: `root`
- Password: `root`

These settings match the environment variables defined in the `docker-compose.yml` file.

## Usage Guide

1. **Registration**
   - Navigate to the application URL
   - Click on the "Register" link
   - Fill in the required fields (username, email, password)
   - Submit the form to create your account

2. **Login**
   - Enter your email and password
   - Click "Login" to access the dashboard

3. **View Students**
   - After login, you'll be directed to the student list
   - All existing students will be displayed in a table

4. **Add a Student**
   - Click on "Add New Student" button
   - Fill in the student details (ID, name, email)
   - Click "Save Student" to create the record

5. **Delete a Student**
   - In the student list, click the "Delete" button next to a student
   - Confirm the deletion when prompted

## Security Considerations

- Passwords are hashed using PHP's `password_hash()` function
- Input data is sanitized to prevent SQL injection
- Session-based authentication prevents unauthorized access
- .htaccess rules protect sensitive files

## Potential Improvements

- Add student editing functionality
- Implement role-based access control
- Add pagination for the student list
- Include search and filter options
- Add form validation on the client side
- Implement data export functionality


## Acknowledgments

- PHP community for documentation and resources
- Bootstrap team for the responsive CSS framework