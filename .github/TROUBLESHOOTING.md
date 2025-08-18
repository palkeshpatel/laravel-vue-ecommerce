# 🔧 CI/CD Troubleshooting Guide

This guide helps you resolve common issues with the Laravel CI workflow.

## 🚨 Common Issues & Solutions

### 1. **Workflow Fails on "Install Composer dependencies"**

**Error**: `composer install` fails
**Solution**: 
- Check if `composer.json` exists in the root directory
- Ensure all dependencies are properly specified
- Try running `composer install` locally first

### 2. **Workflow Fails on "Install Node.js dependencies"**

**Error**: `npm ci` fails with dependency conflicts
**Solution**:
- Check if `package.json` exists in the root directory
- Ensure `package-lock.json` is committed to the repository
- Try running `npm install` locally first
- **For Vite conflicts**: Update to compatible versions:
  ```json
  {
    "vite": "^6.0.0",
    "@vitejs/plugin-vue": "^5.2.4",
    "@tailwindcss/vite": "^4.1.12"
  }
  ```
- **Use legacy peer deps**: Run `npm ci --legacy-peer-deps` in CI

### 3. **Database Migration Fails**

**Error**: `php artisan migrate --force` fails
**Solution**:
- Check if `.env.example` exists and has proper database configuration
- Ensure MySQL service is running in the workflow
- Verify database credentials in the workflow

### 4. **Asset Build Fails**

**Error**: `npm run build` fails
**Solution**:
- Check if `vite.config.js` exists
- Ensure all required Node.js dependencies are installed
- Verify the build script exists in `package.json`
- Check for Vite version compatibility issues

### 5. **PHP Syntax Check Fails**

**Error**: PHP syntax errors found
**Solution**:
- Run `php -l filename.php` locally to find syntax errors
- Check for missing semicolons, brackets, or syntax issues
- Ensure PHP version compatibility

## 🔍 Debugging Steps

### Step 1: Check Workflow Logs
1. Go to your repository's **Actions** tab
2. Click on the failed workflow run
3. Click on the failed job
4. Expand the failing step to see the exact error

### Step 2: Test Locally
Run these commands locally to replicate the CI environment:

```bash
# Test Composer
composer install --no-progress --prefer-dist --optimize-autoloader

# Test Node.js (with legacy peer deps)
npm install --legacy-peer-deps

# Test Laravel
cp .env.example .env
php artisan key:generate
php artisan config:cache
php artisan migrate --force

# Test Build
npm run build

# Test PHP Syntax
find . -name "*.php" -not -path "./vendor/*" -not -path "./node_modules/*" -exec php -l {} \;
```

### Step 3: Check File Structure
Ensure these files exist in your repository:
- ✅ `composer.json`
- ✅ `package.json`
- ✅ `.env.example`
- ✅ `vite.config.js` (if using Vite)
- ✅ `artisan` (Laravel command file)

## 🛠️ Workflow Configuration

### Current Workflow Features:
- **PHP 8.2** with all required extensions
- **Node.js 18** with npm caching
- **MySQL 8.0** service for database testing
- **Composer** dependency installation
- **Laravel** configuration and migrations
- **Asset building** with npm (using legacy peer deps)
- **PHP syntax checking**
- **Basic Laravel health checks**

### Environment Variables:
The workflow uses these default values:
- `DB_CONNECTION=mysql`
- `DB_HOST=127.0.0.1`
- `DB_PORT=3306`
- `DB_DATABASE=ecommerce_test`
- `DB_USERNAME=root`
- `DB_PASSWORD=password`

## 📞 Getting Help

If you're still experiencing issues:

1. **Check the workflow logs** for specific error messages
2. **Test locally** using the commands above
3. **Create an issue** with the error details
4. **Share the workflow run URL** for better debugging

## 🎯 Success Indicators

When the workflow runs successfully, you should see:
- ✅ Green checkmark on all steps
- ✅ "All tests passed successfully!" message
- ✅ CI Status badge showing "passing"

---

**Remember**: The CI workflow is designed to catch issues early and ensure your code is ready for deployment! 🚀
