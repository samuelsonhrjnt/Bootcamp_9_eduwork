<?php
session_start();
require_once 'connect.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: index.php");
    exit();
}

$action = $_GET['action'] ?? '';
$errors = [];

// Tangkap Input
$id          = $_POST['id'] ?? null;
$name        = trim($_POST['name'] ?? '');
$category    = trim($_POST['category'] ?? '');
$price       = trim($_POST['price'] ?? '');
$stock       = trim($_POST['stock'] ?? '');
$description = trim($_POST['description'] ?? '');

// 1. Validasi
if (empty($name)) $errors['name'] = "Nama produk wajib diisi.";
if (empty($category)) $errors['category'] = "Kategori wajib dipilih.";
if ($price === '' || !is_numeric($price) || $price <= 0) $errors['price'] = "Harga harus angka positif.";
if ($stock === '' || !filter_var($stock, FILTER_VALIDATE_INT) && $stock != 0 || $stock < 0) $errors['stock'] = "Stok harus angka bulat non-negatif.";
if (empty($description)) $errors['description'] = "Deskripsi wajib diisi.";

// Validasi File Gambar
$hasFile = isset($_FILES['image']) && $_FILES['image']['error'] !== UPLOAD_ERR_NO_FILE;
if ($action === 'create' && !$hasFile) {
    $errors['image'] = "Gambar produk wajib diunggah.";
}

if ($hasFile) {
    $allowedTypes = ['image/jpeg', 'image/png', 'image/webp'];
    if (!in_array($_FILES['image']['type'], $allowedTypes)) {
        $errors['image'] = "Format file harus JPG, PNG, atau WEBP.";
    } elseif ($_FILES['image']['size'] > 2 * 1024 * 1024) {
        $errors['image'] = "Ukuran gambar maksimal 2MB.";
    }
}

// Jika ada Error, kembalikan ke form
if (!empty($errors)) {
    $_SESSION['errors'] = $errors;
    $_SESSION['old']    = $_POST;
    header("Location: " . ($action === 'create' ? "tambah_produk.php" : "edit_produk.php?id=$id"));
    exit();
}

// Upload Gambar jika ada
$imageName = null;
if ($hasFile) {
    $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
    $imageName = time() . '_' . uniqid() . '.' . $ext;
    move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/' . $imageName);
}

// 2. Eksekusi Query
if ($action === 'create') {
    // INSERT Produk Baru
    $sql = "INSERT INTO products (name, category, price, stock, description, image) 
            VALUES (:name, :category, :price, :stock, :description, :image)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'name'        => $name,
        'category'    => $category,
        'price'       => $price,
        'stock'       => $stock,
        'description' => $description,
        'image'       => $imageName
    ]);
    $_SESSION['success'] = "Produk berhasil ditambahkan!";
} elseif ($action === 'update') {
    // UPDATE Data Produk
    if ($hasFile) {
        // Hapus gambar lama jika mengunggah gambar baru
        $stmtOld = $pdo->prepare("SELECT image FROM products WHERE id = :id");
        $stmtOld->execute(['id' => $id]);
        $oldImg = $stmtOld->fetchColumn();
        if ($oldImg && file_exists('uploads/' . $oldImg)) {
            unlink('uploads/' . $oldImg);
        }

        $sql = "UPDATE products SET name=:name, category=:category, price=:price, stock=:stock, description=:description, image=:image WHERE id=:id";
        $params = [
            'id'          => $id,
            'name'        => $name,
            'category'    => $category,
            'price'       => $price,
            'stock'       => $stock,
            'description' => $description,
            'image'       => $imageName
        ];
    } else {
        $sql = "UPDATE products SET name=:name, category=:category, price=:price, stock=:stock, description=:description WHERE id=:id";
        $params = [
            'id'          => $id,
            'name'        => $name,
            'category'    => $category,
            'price'       => $price,
            'stock'       => $stock,
            'description' => $description
        ];
    }

    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    $_SESSION['success'] = "Produk berhasil diperbarui!";
}

header("Location: index.php");
exit();
