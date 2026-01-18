# Frontend Login with SQLite Integration

This project is a simple web application featuring a Login and Registration system integrated with a server-less SQLite database.

## Features

*   **User Registration**: Create new accounts with email and password.
*   **User Login**: Authenticate existing users.
*   **Dual-Form Interface**: Seamless toggling between Login and Registration forms without page reloads.
*   **SQLite Database**: Lightweight, file-based database (`database.db`) automatically created on first run.
*   **User Viewer**: A specific utility page (`view_users.php`) to view registered users and their details.
*   **Plain Text Passwords**: As per recent configuration, passwords are stored and verified in plain text (Note: This is for educational/testing purposes and not recommended for production).

## Prerequisites

*   **PHP**: Ensure PHP is installed and added to your system path.
*   **Web Server**: A local server like XAMPP, WAMP, or the built-in PHP development server.
*   **PDO SQLite Extension**: Ensure `extension=pdo_sqlite` is enabled in your `php.ini` file (usually enabled by default).

## Installation & Setup

1.  **Clone/Download** the repository to your web server directory (e.g., `htdocs` in XAMPP).
2.  **Start the Server**:
    *   If using XAMPP/WAMP, start Apache.
    *   Alternatively, run the PHP built-in server from the project directory:
        ```bash
        php -S localhost:8000
        ```
3.  **Access the Application**:
    *   Open your browser and navigate to `http://localhost:8000/index.html` (or your specific XAMPP URL).

## Usage

1.  **Register**:
    *   Click "Register here" on the login page.
    *   Enter an email and password.
    *   Submit the form.
2.  **Login**:
    *   Use the credentials you just created to log in.
3.  **View Database**:
    *   Navigate to `view_users.php` in your browser (e.g., `http://localhost:8000/view_users.php`) to see a list of all registered users.

## File Structure

*   `index.html`: The main frontend interface containing both Login and Register forms.
*   `style.css`: Styling for the forms and layout.
*   `script.js`: JavaScript logic to toggle between forms.
*   `db.php`: PHP script to connect to the SQLite database and create the table if missing.
*   `auth.php`: PHP script handling the server-side logic for Login and Registration.
*   `view_users.php`: Utility script to display database records.
*   `database.db`: The SQLite database file (generated automatically).

## Screenshots

### Login Page
![Login Page](https://github.com/mndyshammas-dot/login-page/blob/472c680e93fd1083850827e700f35fa565fc375c/Screenshot%202026-01-18%20174424.png)

### Registered Users (SQLite Database View)
![User Database](https://github.com/mndyshammas-dot/login-page/blob/292352642f7d6323b5e1dfa7cb0cc9cc4faf14f8/Screenshot%202026-01-18%20174437.png)
## Security Note

Currently, **password hashing is disabled**. Passwords are stored in plain text. For production environments, it is highly recommended to re-enable `password_hash()` in `auth.php`.



