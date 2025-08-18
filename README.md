# 🛍️ E-Commerce Admin with Laravel + Filament + Inertia + Vue 3

A modern, full-featured e-commerce application built with Laravel 12, Filament Admin Panel, Inertia.js, and Vue 3. This project demonstrates a complete e-commerce solution with both admin management and customer-facing frontend.

![Laravel](https://img.shields.io/badge/Laravel-12.x-red.svg)
![Filament](https://img.shields.io/badge/Filament-4.x-blue.svg)
![Vue.js](https://img.shields.io/badge/Vue.js-3.x-green.svg)
![TailwindCSS](https://img.shields.io/badge/TailwindCSS-4.x-38B2AC.svg)

## 📸 Screenshots

### 🔐 Admin Login

![Admin Login](https://raw.githubusercontent.com/palkeshpatel/ecommerce-website/refs/heads/main/public/login.jpg)

### 📊 Admin Dashboard

![Admin Dashboard](https://raw.githubusercontent.com/palkeshpatel/ecommerce-website/refs/heads/main/public/dasbord.jpg)

## 🚀 Features

### 🎛️ Admin Panel (Filament)

-   **Product Management**: CRUD operations for products with image upload
-   **Category Management**: Organize products by categories
-   **Customer Management**: View and manage customer information
-   **Order Management**: Track orders with status updates (pending, paid, shipped, completed, cancelled)
-   **Dashboard**: Overview of sales, orders, and products with real-time statistics
-   **Low Stock Alerts**: Monitor products with low inventory
-   **Order Analytics**: Track revenue and order trends

### 🛒 Customer Frontend (Inertia + Vue 3)

-   **Homepage**: Hero section, featured products, and category browsing
-   **Product Catalog**: Browse products with search and category filters
-   **Product Details**: Detailed product view with related products
-   **Shopping Cart**: Add, update, and remove items
-   **Checkout Process**: Complete order placement with customer information
-   **Order Confirmation**: Success page with order details
-   **Responsive Design**: Mobile-friendly interface

## 🛠 Tech Stack

-   **Backend**: Laravel 12
-   **Admin Panel**: Filament 4
-   **Frontend**: Inertia.js + Vue 3
-   **Styling**: TailwindCSS
-   **Database**: MySQL
-   **Authentication**: Laravel Breeze
-   **State Management**: Pinia (Vue 3)
-   **Icons**: Heroicons

## 📋 Requirements

-   PHP 8.2+
-   Composer
-   Node.js & NPM
-   MySQL Database

## 🚀 Installation

1. **Clone the repository**

    ```bash
    git clone <repository-url>
    cd filament-vendor
    ```

2. **Install PHP dependencies**

    ```bash
    composer install
    ```

3. **Install Node.js dependencies**

    ```bash
    npm install
    ```

4. **Environment setup**

    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

5. **Configure database**
   Update your `.env` file with database credentials:

    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_username
    DB_PASSWORD=your_password
    ```

6. **Run migrations and seeders**

    ```bash
    php artisan migrate
    php artisan db:seed
    ```

7. **Create admin user**

    ```bash
    php artisan make:filament-user
    ```

8. **Build frontend assets**

    ```bash
    npm run build
    ```

9. **Start the development server**
    ```bash
    php artisan serve
    ```

## 🔐 Access Points

-   **Customer Frontend**: `http://localhost:8000`
-   **Admin Panel**: `http://localhost:8000/admin`
-   **Admin Login**: Use the credentials created with `make:filament-user`

## 📁 Project Structure

```
filament-vendor/
├── app/
│   ├── Filament/Resources/          # Filament admin resources
│   ├── Filament/Widgets/            # Dashboard widgets
│   ├── Http/Controllers/            # Frontend controllers
│   └── Models/                      # Eloquent models
├── database/
│   ├── migrations/                  # Database migrations
│   └── seeders/                     # Sample data seeders
├── resources/
│   └── js/
│       ├── Components/              # Vue 3 components
│       ├── Layouts/                 # Page layouts
│       └── Pages/                   # Inertia pages
└── routes/
    └── web.php                      # Application routes
```

## 🛍️ Database Schema

### Categories

-   `id`, `name`, `slug`, `timestamps`

### Products

-   `id`, `category_id`, `name`, `slug`, `description`, `price`, `stock`, `image`, `timestamps`

### Customers

-   `id`, `name`, `email`, `phone`, `address`, `timestamps`

### Orders

-   `id`, `customer_id`, `total_amount`, `status`, `timestamps`

### Order Items

-   `id`, `order_id`, `product_id`, `quantity`, `price`, `timestamps`

## 📊 Dashboard Features

The admin dashboard includes:

-   **Revenue Statistics**: Total sales revenue with trending indicators
-   **Order Analytics**: Total orders, pending orders, and order status breakdown
-   **Customer Insights**: Total customers and customer growth
-   **Inventory Management**: Product count and low stock alerts
-   **Recent Orders**: Latest orders with customer details and status
-   **Low Stock Products**: Products that need restocking

## 🎨 Customization

### Adding New Products

1. Access the admin panel at `/admin`
2. Navigate to Products section
3. Click "New Product"
4. Fill in product details and upload image
5. Save the product

### Managing Orders

1. Go to Orders section in admin panel
2. View order details and update status
3. Track order progress through the workflow

### Customizing Frontend

-   Modify Vue components in `resources/js/Components/`
-   Update page layouts in `resources/js/Layouts/`
-   Customize styling with TailwindCSS classes

## 🔧 Development

### Running in Development Mode

```bash
# Terminal 1: Laravel server
php artisan serve

# Terminal 2: Vite development server
npm run dev
```

### Building for Production

```bash
npm run build
```

## 📝 Sample Data

The application comes with comprehensive sample data including:

-   **6 Product Categories**: Electronics, Clothing, Home & Garden, Books, Sports & Outdoors, Beauty & Health
-   **15 Sample Products**: Realistic products across all categories with pricing and descriptions
-   **5 Sample Customers**: Complete customer profiles with contact information
-   **20 Sample Orders**: Various order statuses with realistic order items and totals
-   **Admin User**: Ready to use admin account

## 🚀 Key Features Implemented

✅ **Complete E-commerce Flow**: Product browsing → Cart → Checkout → Order management  
✅ **Admin Dashboard**: Real-time statistics and analytics  
✅ **Product Management**: Full CRUD with image upload  
✅ **Order Processing**: Status tracking and customer management  
✅ **Responsive Design**: Mobile-first approach  
✅ **Search & Filtering**: Product search and category filtering  
✅ **Stock Management**: Low stock alerts and inventory tracking  
✅ **Customer Management**: Customer profiles and order history  
✅ **Modern UI/UX**: Clean, professional interface

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Submit a pull request

## 📄 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## 🆘 Support

For support and questions:

-   Check the Laravel documentation
-   Review Filament documentation
-   Open an issue in the repository

## 🌟 Showcase

This project demonstrates:

-   Modern Laravel development practices
-   Filament admin panel implementation
-   Inertia.js + Vue 3 frontend architecture
-   Complete e-commerce functionality
-   Professional UI/UX design
-   Production-ready code structure

---

**Happy Coding! 🎉**

_Built with ❤️ using Laravel, Filament, and Vue 3_
