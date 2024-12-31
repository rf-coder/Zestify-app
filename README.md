
# Zestify - Cosmetics E-Commerce

Zestify is an e-commerce platform for selling skincare, haircare, makeup, and cosmetic products. Built with Laravel, it provides an easy-to-use website for browsing, searching, and purchasing products.

## Features

- **Product Categories**: Browse products by categories such as skincare, haircare, makeup, and more.
- **Search Functionality**: Search products by name in real-time using AJAX.
- **Product Details**: View detailed information about each product including price, description, and images.
- **Add to Cart**: Add products to the cart and proceed to checkout.
- **Responsive Design**: Fully responsive and mobile-friendly interface.

## Installation

Follow these steps to set up the project on your local machine:

### 1. Clone the Repository

```bash
git clone https://github.com/your-username/zestify.git
cd zestify
```

### 2. Install Dependencies

Install the required Composer and NPM dependencies:

```bash
composer install
npm install
```

### 3. Set Up Environment File

Copy the `.env.example` file to `.env` and update it with your database and application configurations.

```bash
cp .env.example .env
```

### 4. Generate Application Key

Generate the application key:

```bash
php artisan key:generate
```

### 5. Migrate the Database

Run the migrations to create the necessary tables:

```bash
php artisan migrate
```

### 6. Seed the Database (Optional)

You can seed the database with dummy data for testing:

```bash
php artisan db:seed
```

### 7. Serve the Application

Start the local development server:

```bash
php artisan serve
```

Your application will now be available at `http://127.0.0.1:8000`.

## Directory Structure

```
- app/
  - Http/
    - Controllers/
      - ProductController.php
      - SearchController.php
  - Models/
    - Product.php
    - Category.php
- resources/
  - views/
    - layouts/
      - web.blade.php
    - products/
      - index.blade.php
      - partials/
        - products.blade.php
  - assets/
    - css/
    - js/
- routes/
  - web.php
- public/
  - images/
    - banner.png
```

## Routes

### Product Routes

- **GET `/products`**: Displays all products.
- **GET `/products/category/{category}`**: Displays products by category.
- **GET `/products/{id}`**: View product details.
- **POST `/cart/add/{product}`**: Add a product to the cart.

### Search Routes

- **GET `/search`**: Search for products by name and description using AJAX.

## Technology Stack

- **Backend**: Laravel 11
- **Frontend**: Blade templates, HTML, CSS, Bootstrap, jQuery, AJAX
- **Database**: MySQL



