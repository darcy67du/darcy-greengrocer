<?php
// =============================================
// GreenGrocer - Database Configuration
// Update these values with your InfinityFree
// database credentials from your control panel
// =============================================


define('DB_HOST', 'sql300.infinityfree.com');   // or your InfinityFree MySQL host
define('DB_USER', 'if0_42166605');       // from InfinityFree control panel
define('DB_PASS', 'tuUiOtwnIG9rXyZ');       // from InfinityFree control panel
define('DB_NAME', 'if0_42166605_XXX');           // from InfinityFree control panel


define('SITE_NAME', 'Darcy GreenGrocer');
define('CURRENCY_SYMBOL', 'RWF ');
define('CURRENCY_DECIMALS', 0);

define('SITE_URL', ''); // root-relative: works on any domain

// Session config
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Connect to DB
function getDB()
{
    static $conn = null;
    if ($conn === null) {
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $conn->set_charset("utf8mb4");
    }
    return $conn;
}

// Format a number as currency (forces dot decimal, comma thousands)
function formatPrice($amount) {
    return 'RWF ' . number_format((float)$amount, 0, '.', ',');
}

// Format a plain number (no currency symbol)
function formatNumber($amount, $decimals = 0) {
    return number_format((float)$amount, $decimals, '.', ',');
}

// Sanitize input
function sanitize($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    return $data;
}

// Check if logged in
function isLoggedIn()
{
    return isset($_SESSION['user_id']);
}

// Check if admin
function isAdmin()
{
    return isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
}

// Redirect helper
function redirect($url)
{
    header("Location: $url");
    exit();
}

// Flash messages
function setFlash($type, $message)
{
    $_SESSION['flash'] = ['type' => $type, 'message' => $message];
}

function getFlash()
{
    if (isset($_SESSION['flash'])) {
        $flash = $_SESSION['flash'];
        unset($_SESSION['flash']);
        return $flash;
    }
    return null;
}
