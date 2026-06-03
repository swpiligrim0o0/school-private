# School Management System - O'zbekcha Qo'llanma

## 📦 O'rnatish

### 1. Dependensiyalarni O'rnatish
```bash
composer install
```

### 2. Environment Faylini Sozlash
```bash
cp .env.example .env
php artisan key:generate
```

### 3. Database Sozlamasi (.env faylida)
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=school_management
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Database Migratsiya
```bash
php artisan migrate
```

### 5. Test Ma'lumotlarini Qo'shish
```bash
php artisan db:seed
```

### 6. Server Ishga Tushirish
```bash
php artisan serve
```

Browser'da oching: `http://localhost:8000`

---

## 🔐 Test Login Ma'lumotlari

### Admin
- **Email**: admin@test.com
- **Parol**: password123

### O'qituvchi
- **Email**: teacher@test.com
- **Parol**: password123

### Oquvchi (10 ta test oquvchi mavjud)
- **Email**: student1@test.com - student10@test.com
- **Parol**: password123

---

## 📋 Asosiy Xususiyatlar

### 👥 Oquvchilar Boshqaruvi
- Oquvchi ma'lumotlarini qo'shish
- Oquvchi profilini tahrir qilish
- Oquvchi to'lovlarini ko'rish
- Oquvchi davomatini ko'rish

### 💰 To'lov Sistemi
- Oylik to'lovlarni qayd etish
- To'lov holatini kuzatish (To'landi, Kutilmoqda, O'tgan vaqt)
- To'lov tarixini saqlash

### ✅ Davomat Sistemi
- Kunlik davomatni qayd etish
- Davomat holatini o'zgartirish (Keldi, Kelmadi, Kech Keldi)
- Davomat statistikasini ko'rish

### 🔐 Xavfsizlik
- Login va autentifikatsiya
- Rol asosida ruxsat (Admin, O'qituvchi, Oquvchi)
- Sessiya boshqaruvi
- CSRF himoya

---

## 🗄️ Database Struktura

### Users (Foydalanuvchilar)
- id, name, email, password, role, timestamps

### Students (Oquvchilar)
- id, user_id, student_id, first_name, last_name, phone, address, class, date_of_birth, notes, timestamps

### Payments (To'lovlar)
- id, student_id, month, year, amount, status, payment_date, payment_method, notes, timestamps

### Attendance (Davomat)
- id, student_id, date, status, notes, timestamps

---

## 🛠️ Texnologiyalar

- **Laravel 10** - PHP Framework
- **MySQL** - Database
- **Bootstrap 5** - UI Framework
- **Blade** - Template Engine
- **Eloquent ORM** - Database Abstraction

---

## 📝 Foydalanuvchi Rollar

### Admin
- Barcha ma'lumotlarni ko'rish va tahrir qilish
- Oquvchilarni qo'shish/o'chirish
- To'lov va davomatni boshqarish

### O'qituvchi
- Oquvchilarni ko'rish
- Davomatni qayd etish
- To'lovlarni ko'rish

### Oquvchi
- O'z profilini ko'rish
- O'z to'lovlarini ko'rish
- O'z davomatini ko'rish

---

## 📧 Aloqa

**Loyha Egasi**: swpiligrim0o0

**GitHub**: https://github.com/swpiligrim0o0/school-private

---

## 📄 Litsenziya

MIT Litsenziya ostida
