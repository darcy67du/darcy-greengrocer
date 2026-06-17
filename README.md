# Darcy GreenGrocer 🌿


Live Website:
https://greengrocer.infinityfree.io/index.php


Organic & Eco-Friendly Delivery Platform

---

## 🚀 Deployment on InfinityFree

### Step 1 — Create Hosting Account
1. Sign up at https://www.infinityfree.com
2. Create a new hosting account and note your:
   - **FTP hostname**, **FTP username**, **FTP password**
   - **MySQL host**, **MySQL database name**, **MySQL username**, **MySQL password**

### Step 2 — Set Up the Database
1. Log in to your InfinityFree control panel
2. Go to **MySQL Databases** → create a new database
3. Open **phpMyAdmin** from the control panel
4. Select your database
5. Click the **SQL** tab and paste the entire contents of `database.sql`
6. Click **Go** to run it

### Step 3 — Configure the App
Open `includes/config.php` and update:

```php
define('DB_HOST', 'infinityfree.com');  
define('DB_USER', 'if0_xxxxxxxx');              
define('DB_PASS', 'your_password');             
define('DB_NAME', 'if0_xxxxxxxx'); 
define('SITE_URL', 'http://yourdomain.infinityfreeapp.com'); 
```

### Step 4 — Upload Files
Upload **all files** (including `.htaccess`) to the `htdocs` folder via:
- **InfinityFree File Manager** in the control panel, OR
- **FTP client** (FileZilla recommended):
  - Host: your FTP hostname
  - Username: your FTP username
  - Password: your FTP password
  - Port: 21

Upload everything inside the `greengrocer/` folder to `/htdocs/`

### Step 5 — Done!
Visit your domain. You should see the shop.

---

## 🔐 Default Admin Login
- **Email:** xxxxx.com
- **Password:** xxxxxx

> ⚠️ **Change this immediately** after first login via phpMyAdmin:
> ```sql
> UPDATE users SET password='[new_hash]' WHERE email='xxxxxxxxx.com';
> ```
> Generate a hash using PHP: `echo password_hash('YourNewPassword', PASSWORD_DEFAULT);`

---

## 📁 File Structure
```
htdocs/
├── index.php               ← Customer shop
├── login.php
├── register.php
├── logout.php
├── database.sql            ← Run this in phpMyAdmin
├── .htaccess
├── includes/
│   ├── config.php          
│   ├── header.php
│   └── footer.php
├── customer/
│   ├── cart.php
│   ├── checkout.php
│   ├── orders.php
│   ├── add_to_cart.php
│   └── remove_from_cart.php
├── admin/
│   ├── index.php           ← Dashboard
│   ├── products.php
│   ├── orders.php
│   └── users.php
└── assets/
    ├── css/style.css
    ├── js/main.js
    └── images/             product images 
```

---

## 🛒 Features
- Dynamic cart with kg (fractional) and unit products
- Server-side price validation (tamper-proof)
- Delivery slot booking with overbooking prevention
- Stock auto-deduction with sold-out detection
- Admin dashboard with daily delivery schedule
- SQL injection & XSS protection throughout
- Fully responsive mobile layout

