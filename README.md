# Analytics Dashboard

## Technologies Used

-   **Laravel** (PHP Framework)

## Languages

-   **HTML5 / CSS3**
-   **PHP**
-   **JavaScript**

## Requirements

-   **Composer**
-   **Node.js**
-   **XAMPP**

## Installation Steps

1. Run the following command in your terminal:
    ```bash
    composer install
    ```
2. Create a copy of the .env.example file and rename it to .env.

3. Open the .env file and update the following database configuration (remove any # comments if present):

    ```bash
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=anadashDB
    DB_USERNAME=root
    DB_PASSWORD=

    ```

4. Create a database in localhost/phpmyadmin named anadashDB

5. Run the database migrations:
    ```bash
    php artisan migrate:fresh
    ```
6. Install the admin panel:
    ```bash
    php artisan admin:install
    ```
7. Start the Laravel development server:
    ```bash
    php artisan serve
    ```

## Contributors

-   STAC
-   DAM
