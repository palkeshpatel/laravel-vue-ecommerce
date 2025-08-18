# 🤝 Contributing to E-Commerce Platform

Thank you for your interest in contributing to our modern e-commerce platform! This document provides guidelines and information for contributors.

## 📋 Table of Contents

-   [🎯 Getting Started](#-getting-started)
-   [🔧 Development Setup](#-development-setup)
-   [📝 Code Style Guidelines](#-code-style-guidelines)
-   [🚀 Making Changes](#-making-changes)
-   [🧪 Testing](#-testing)
-   [📚 Documentation](#-documentation)
-   [🎨 UI/UX Guidelines](#-uiux-guidelines)
-   [🔒 Security Guidelines](#-security-guidelines)
-   [📦 Release Process](#-release-process)
-   [🎉 Recognition](#-recognition)

## 🎯 Getting Started

### Prerequisites

-   **PHP** 8.2 or higher
-   **Composer** 2.0 or higher
-   **Node.js** 18 or higher
-   **MySQL** 8.0 or higher
-   **Git**

### Fork and Clone

1. **Fork** the repository on GitHub
2. **Clone** your fork locally:
    ```bash
    git clone https://github.com/YOUR_USERNAME/ecommerce-website.git
    cd ecommerce-website
    ```
3. **Add upstream** remote:
    ```bash
    git remote add upstream https://github.com/palkeshpatel/ecommerce-website.git
    ```

## 🔧 Development Setup

### Environment Setup

1. **Install dependencies**:

    ```bash
    composer install
    npm install
    ```

2. **Environment configuration**:

    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

3. **Database setup**:

    ```bash
    php artisan migrate --seed
    ```

4. **Create admin user**:

    ```bash
    php artisan make:filament-user
    ```

5. **Build assets**:
    ```bash
    npm run dev
    ```

### Development Workflow

1. **Create a feature branch**:

    ```bash
    git checkout -b feature/your-feature-name
    ```

2. **Make your changes** and commit:

    ```bash
    git add .
    git commit -m "feat: add new feature description"
    ```

3. **Push to your fork**:

    ```bash
    git push origin feature/your-feature-name
    ```

4. **Create a Pull Request** on GitHub

## 📝 Code Style Guidelines

### PHP/Laravel

-   Follow **PSR-12** coding standards
-   Use **Laravel conventions** for naming and structure
-   Write **meaningful variable and function names**
-   Add **type hints** where possible
-   Include **PHPDoc comments** for complex methods

```php
/**
 * Create a new product with validation
 *
 * @param array $data
 * @return Product
 * @throws ValidationException
 */
public function createProduct(array $data): Product
{
    $validated = $this->validateProductData($data);

    return Product::create($validated);
}
```

### JavaScript/Vue.js

-   Use **ES6+** features
-   Follow **Vue.js style guide**
-   Use **meaningful component names**
-   Implement **proper error handling**
-   Add **JSDoc comments** for complex functions

```javascript
/**
 * Fetches products with filtering
 * @param {Object} filters - Filter parameters
 * @returns {Promise<Array>} Products array
 */
async function fetchProducts(filters = {}) {
    try {
        const response = await axios.get("/api/products", { params: filters });
        return response.data;
    } catch (error) {
        console.error("Error fetching products:", error);
        throw error;
    }
}
```

### CSS/TailwindCSS

-   Use **TailwindCSS utility classes** when possible
-   Follow **mobile-first** responsive design
-   Maintain **consistent spacing** and colors
-   Use **semantic class names** for custom CSS

## 🚀 Making Changes

### Commit Message Format

Use conventional commit format:

```
type(scope): description

[optional body]

[optional footer]
```

**Types:**

-   `feat`: New feature
-   `fix`: Bug fix
-   `docs`: Documentation changes
-   `style`: Code style changes
-   `refactor`: Code refactoring
-   `test`: Test additions/changes
-   `chore`: Build/tooling changes

**Examples:**

```bash
git commit -m "feat(products): add bulk delete functionality"
git commit -m "fix(cart): resolve session persistence issue"
git commit -m "docs(readme): update installation instructions"
```

### Pull Request Guidelines

1. **Create descriptive PR titles**
2. **Fill out the PR template completely**
3. **Include screenshots** for UI changes
4. **Add tests** for new features
5. **Update documentation** as needed
6. **Ensure all checks pass**

## 🧪 Testing

### PHP Tests

```bash
# Run all tests
php artisan test

# Run specific test file
php artisan test tests/Feature/ProductTest.php

# Run with coverage
php artisan test --coverage
```

### JavaScript Tests

```bash
# Run Vue component tests
npm run test

# Run tests in watch mode
npm run test:watch
```

### Manual Testing Checklist

-   [ ] **Cross-browser testing** (Chrome, Firefox, Safari, Edge)
-   [ ] **Mobile responsiveness** (iOS, Android)
-   [ ] **Accessibility testing** (screen readers, keyboard navigation)
-   [ ] **Performance testing** (Lighthouse, PageSpeed Insights)
-   [ ] **Security testing** (OWASP guidelines)

## 📚 Documentation

### Code Documentation

-   **Document complex business logic**
-   **Explain API endpoints** with examples
-   **Include usage examples** for components
-   **Update README** for new features

### API Documentation

```php
/**
 * @api {get} /api/products Get Products
 * @apiName GetProducts
 * @apiGroup Products
 * @apiVersion 1.0.0
 *
 * @apiParam {Number} [page] Page number
 * @apiParam {String} [category] Category filter
 * @apiParam {String} [search] Search term
 *
 * @apiSuccess {Object[]} data Products array
 * @apiSuccess {Number} data.id Product ID
 * @apiSuccess {String} data.name Product name
 * @apiSuccess {Number} data.price Product price
 */
```

## 🎨 UI/UX Guidelines

### Design Principles

-   **Consistency**: Use consistent colors, spacing, and typography
-   **Accessibility**: Follow WCAG 2.1 guidelines
-   **Responsiveness**: Mobile-first design approach
-   **Performance**: Optimize for fast loading times

### Component Guidelines

-   **Reusable components** with clear props
-   **Proper error states** and loading states
-   **Accessible form elements** with labels
-   **Keyboard navigation** support

### Color Palette

```css
/* Primary Colors */
--primary-50: #eff6ff;
--primary-500: #3b82f6;
--primary-900: #1e3a8a;

/* Neutral Colors */
--gray-50: #f9fafb;
--gray-500: #6b7280;
--gray-900: #111827;
```

## 🔒 Security Guidelines

### General Security

-   **Validate all inputs** on both client and server
-   **Sanitize data** before database operations
-   **Use prepared statements** for database queries
-   **Implement proper authentication** and authorization
-   **Follow OWASP security guidelines**

### Laravel Security

```php
// Use Laravel's built-in validation
$validated = $request->validate([
    'name' => 'required|string|max:255',
    'email' => 'required|email|unique:users',
    'password' => 'required|min:8|confirmed',
]);

// Use Eloquent's mass assignment protection
protected $fillable = ['name', 'email', 'password'];
```

### Frontend Security

```javascript
// Sanitize user inputs
const sanitizeInput = (input) => {
    return DOMPurify.sanitize(input);
};

// Validate data before submission
const validateForm = (data) => {
    // Implement validation logic
};
```

## 📦 Release Process

### Versioning

We follow [Semantic Versioning](https://semver.org/):

-   **MAJOR**: Breaking changes
-   **MINOR**: New features (backward compatible)
-   **PATCH**: Bug fixes (backward compatible)

### Release Checklist

-   [ ] **All tests pass**
-   [ ] **Documentation updated**
-   [ ] **Changelog updated**
-   [ ] **Version bumped**
-   [ ] **Assets built** for production
-   [ ] **Security scan** completed

## 🎉 Recognition

### Contributors

All contributors will be recognized in:

-   **README.md** contributors section
-   **GitHub contributors** page
-   **Release notes** for significant contributions

### Hall of Fame

Special recognition for:

-   **Major feature contributions**
-   **Bug fixes** that solve critical issues
-   **Documentation improvements**
-   **Community support**

## 📞 Getting Help

### Communication Channels

-   **GitHub Issues**: For bug reports and feature requests
-   **GitHub Discussions**: For questions and community discussions
-   **Email**: For private or sensitive matters

### Resources

-   [Laravel Documentation](https://laravel.com/docs)
-   [Filament Documentation](https://filamentphp.com/docs)
-   [Vue.js Documentation](https://vuejs.org/guide/)
-   [TailwindCSS Documentation](https://tailwindcss.com/docs)

---

**Thank you for contributing to our e-commerce platform! 🛍️**

Your contributions help make this project better for everyone in the community.
