🚀 Prompt for Building E-commerce Admin with Laravel + Filament + Inertia + Vue 3

You are an expert Laravel + Vue 3 developer. I want to build a modern E-commerce project using the following stack:

Laravel 12 (latest stable)

Filament Admin (for backend management)

Inertia.js + Vue 3 (for frontend)

TailwindCSS (for styling)

MySQL (database)

Modern best practices (authentication, clean code, reusable components)

🎯 Requirements

1. Authentication

Use Laravel Breeze + Inertia + Vue 3 for authentication (login, register, forgot password).

Admins will log in via Filament Panel at /admin.

2. Database Models

Category: id, name, slug

Product: id, category_id, name, slug, description, price, stock, image

Customer: id, name, email, phone, address

Order: id, customer_id, total_amount, status (pending, paid, shipped, completed, cancelled)

OrderItem: id, order_id, product_id, quantity, price

3. Filament Admin Panel

Create Filament resources with CRUD for:

Category

Product (with image upload, category relation)

Customer

Order (with status dropdown + relation to OrderItems)

4. Frontend (Inertia + Vue 3)

Public pages:

Homepage (hero, featured products, categories)

Category page (list of products)

Product detail page

Cart page

Checkout page

Order success page

Customer Dashboard:

My Orders (list + status)

Order Detail

Profile Management

5. Cart & Checkout Flow

Vue 3 state management (Pinia or Vuex)

Add to cart, update quantity, remove item

Checkout with order save in DB

6. UI/UX

TailwindCSS + Heroicons

Responsive design

Reusable Vue 3 components (ProductCard, ProductGrid, Navbar, Footer, etc.)

⚡ Deliverables

A Laravel project with:

Filament admin panel (/admin) for managing products, categories, orders, customers.

Inertia.js + Vue 3 frontend (/) for customers.

Authentication for customers + admin.

Cart + Checkout flow.

Clean, maintainable, production-ready code.

👉 Please generate all necessary models, migrations, controllers, resources, Vue 3 components, and routes according to the requirements above.
