<?php
session_start();
require_once 'connect.php';

$id = $_GET['id'] ?? null;

if ($id) {
    // 1. Cari gambar untuk dihapus dari folder uploads/
    $stmt = $pdo->prepare("SELECT image FROM products WHERE id = :id");
    $stmt->execute(['id' => $id]);
    $image = $stmt->fetchColumn();

    if ($image && file_exists('uploads/' . $image)) {
        unlink('uploads/' . $image);
    }

    // 2. Hapus data dari Database
    $deleteStmt = $pdo->prepare("DELETE FROM products WHERE id = :id");
    $deleteStmt->execute(['id' => $id]);

    $_SESSION['success'] = "Produk berhasil dihapus!";
} else {
    $_SESSION['error'] = "ID produk tidak valid.";
}

header("Location: index.php");
exit();
