# School Management System

Maktab oquvchilari boshqaruv sistemasi - Students, Payments, Attendance, Roles

## Xususiyatlar

- 👥 **Foydalanuvchi Autentifikatsiyasi** - Login sistema
- 📚 **Oquvchilar Hisoboti** - Student records
- 💰 **Oylik To'lovlar** - Monthly payments tracking
- ✅ **Davomat Sistemi** - Attendance management
- 🔐 **Rollar** - Admin, Teacher, Student roles
- 🗄️ **MySQL Database** - Data management

## O'rnatish

```bash
# Clone repository
git clone https://github.com/swpiligrim0o0/school-private.git
cd school-private

# Install dependencies
composer install

# Setup environment
cp .env.example .env
php artisan key:generate

# Database migration
php artisan migrate

# Run server
php artisan serve
```

## Login

- URL: `http://localhost:8000`
- Private system - faqat ro'yxatdan o'tgan foydalanuvchilar
- Register qo'shilmadi

## Texnologiyalar

- Laravel 10
- MySQL
- PHP 8.1+
- Blade Templates

---

**Author**: swpiligrim0o0
