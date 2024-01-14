# Flower Shop Web Application

Welcome to the Flower Shop Web Application! This repository contains the source code for a simple flower shop website with features for user registration, login, and an admin dashboard for managing items and users.

## Pages

### 1. Welcome Page (`welcome.php`)

The Welcome Page serves as the entry point to the Flower Shop website. It includes links to register, log in, and access the admin page.

- **File:** `index.php`
- **Description:** Displays a welcome message and provides links for user registration, login, and accessing the admin page.

### 2. User Login Page (`login.php`)

The User Login Page allows registered users to log in to their accounts.

- **File:** `login.php`
- **Description:** Provides a form for users to enter their credentials and log in. Validates user input and redirects to the appropriate page (user or admin) upon successful login.

### 3. User Registration Page (`register.php`)

The User Registration Page allows new users to create an account.

- **File:** `register.php`
- **Description:** Provides a form for users to enter their registration details. Validates user input and displays a success message upon successful registration.

### 4. Home Page (`main.php`)

The Home Page displays a list of items available in the flower shop.

- **File:** `welcome.php`
- **Description:** Fetches items from the database and displays them in cards. Users can view details and add items to their cart.

### 5. Admin Dashboard (`admin.php`)

The Admin Dashboard allows administrators to manage items and user details.

- **File:** `admin.php`
- **Description:** Provides tabs for item upload and user management. Administrators can add new items, view and manage user details.

## Getting Started

1. Clone the repository:

    ```bash
    git clone https://github.com/your-username/flower-shop-web-app.git
    ```

2. Configure your web server to serve the PHP files.

3. Set up the database:
    - Import the provided SQL file (`flowershop.sql`) to create the necessary tables.

4. Update database configuration:
    - Open the `config.php` file and update database connection details.

5. Access the website through your web browser.

## Contributing

Contributions are welcome! If you have suggestions, improvements, or find any issues, feel free to open a pull request or create an issue.
