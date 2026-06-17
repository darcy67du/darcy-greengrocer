<?php require_once __DIR__ . '/config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($pageTitle) ? htmlspecialchars($pageTitle) . ' – ' . SITE_NAME : SITE_NAME ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
<header class="site-header">
    <div class="container header-inner">
        <a href="/index.php" class="logo">
            <span class="logo-leaf">🌿</span>
            <span class="logo-text">Darcy <strong>GreenGrocer</strong></span>
        </a>
        <nav class="main-nav">
            <a href="/index.php">Shop</a>
            <?php if (isLoggedIn()): ?>
                <a href="/customer/orders.php">My Orders</a>
                <a href="/customer/cart.php" class="cart-link">
                    🛒 Cart
                    <?php
                    $cartCount = 0;
                    if (isset($_SESSION['cart'])) {
                        foreach ($_SESSION['cart'] as $item) $cartCount += 1;
                    }
                    if ($cartCount > 0): ?>
                        <span class="cart-badge"><?= $cartCount ?></span>
                    <?php endif; ?>
                </a>
                <?php if (isAdmin()): ?>
                    <a href="/admin/index.php" class="btn-admin">Admin Panel</a>
                <?php endif; ?>
                <a href="/logout.php" class="btn-outline">Logout</a>
            <?php else: ?>
                <a href="/login.php">Login</a>
                <a href="/register.php" class="btn-primary">Register</a>
            <?php endif; ?>
        </nav>
    </div>
</header>
<main class="site-main">
<?php
$flash = getFlash();
if ($flash): ?>
<div class="flash flash-<?= $flash['type'] ?>">
    <?= htmlspecialchars($flash['message']) ?>
    <button onclick="this.parentElement.remove()">×</button>
</div>
<?php endif; ?>
