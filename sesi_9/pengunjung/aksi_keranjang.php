<?php
session_start();
require_once 'connect.php';

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

$act = $_GET['act'] ?? '';

// Tambah ke keranjang
if ($act === 'add' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = (int)$_POST['product_id'];
    $qty = (int)$_POST['qty'];

    $stmt = $pdo->prepare("SELECT * FROM products WHERE id = :id");
    $stmt->execute(['id' => $product_id]);
    $product = $stmt->fetch();

    if ($product) {
        if (isset($_SESSION['cart'][$product_id])) {
            $_SESSION['cart'][$product_id]['qty'] += $qty;
        } else {
            $_SESSION['cart'][$product_id] = [
                'name'  => $product['name'],
                'price' => $product['price'],
                'image' => $product['image'],
                'qty'   => $qty
            ];
        }
        $_SESSION['success'] = "Produk berhasil ditambahkan ke keranjang!";
    }
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit;
}

// Update kuantitas
if ($act === 'update' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = (int)$_POST['product_id'];
    $qty = (int)$_POST['qty'];

    if (isset($_SESSION['cart'][$product_id]) && $qty > 0) {
        $_SESSION['cart'][$product_id]['qty'] = $qty;
    }
    header("Location: keranjang.php");
    exit;
}

// Hapus satu item
if ($act === 'delete') {
    $id = (int)$_GET['id'];
    unset($_SESSION['cart'][$id]);
    header("Location: keranjang.php");
    exit;
}

// Kosongkan keranjang
if ($act === 'clear') {
    unset($_SESSION['cart']);
    header("Location: keranjang.php");
    exit;
}
