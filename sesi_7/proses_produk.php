<?php
session_start();

// Pastikan request datang dari method POST
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: tambah_produk.php");
    exit();
}

$errors = [];
$inputData = [
    'name' => trim($_POST['name'] ?? ''),
    'category' => trim($_POST['category'] ?? ''),
    'price' => trim($_POST['price'] ?? ''),
    'stock' => trim($_POST['stock'] ?? ''),
    'description' => trim($_POST['description'] ?? '')
];

// 1. Validasi Nama Produk
if (empty($inputData['name'])) {
    $errors['name'] = "Nama produk wajib diisi.";
} elseif (strlen($inputData['name']) < 3) {
    $errors['name'] = "Nama produk minimal 3 karakter.";
}

// 2. Validasi Kategori
if (empty($inputData['category'])) {
    $errors['category'] = "Pilih salah satu kategori.";
}

// 3. Validasi Harga
if ($inputData['price'] === '') {
    $errors['price'] = "Harga wajib diisi.";
} else {
    $priceVal = filter_var($inputData['price'], FILTER_VALIDATE_FLOAT);
    if ($priceVal === false || $priceVal <= 0) {
        $errors['price'] = "Harga harus berupa angka positif yang valid.";
    }
}

// 4. Validasi Stok
if ($inputData['stock'] === '') {
    $errors['stock'] = "Jumlah stok wajib diisi.";
} else {
    $stockVal = filter_var($inputData['stock'], FILTER_VALIDATE_INT);
    if ($stockVal === false || $stockVal < 0) {
        $errors['stock'] = "Stok harus berupa bilangan bulat non-negatif.";
    }
}

// 5. Validasi Deskripsi
if (empty($inputData['description'])) {
    $errors['description'] = "Deskripsi produk wajib diisi.";
}

// 6. Validasi Gambar
if (!isset($_FILES["image"]) || $_FILES["image"]["error"] === UPLOAD_ERR_NO_FILE) {
    $errors['image'] = "Gambar produk wajib diunggah.";
} else {
    $file = $_FILES["image"];
    $allowedTypes = ['image/jpeg', 'image/png', 'image/webp'];
    $maxSize = 2 * 1024 * 1024; // 2MB

    if (!in_array($file['type'], $allowedTypes)) {
        $errors['image'] = "Format gambar harus JPG, PNG, atau WEBP.";
    } elseif ($file['size'] > $maxSize) {
        $errors['image'] = "Ukuran gambar maksimal 2MB.";
    }
}

// Penanganan Alur Redirect
if (!empty($errors)) {
    // Simpan error & isi input ke session untuk dikirim balik ke form
    $_SESSION['errors'] = $errors;
    $_SESSION['old'] = $inputData;
    header("Location: tambah_produk.php");
    exit();
} else {
    // PROSES SIMPAN DATA (Contoh: Pindahkan file / Simpan ke Database)
    // move_uploaded_file($file['tmp_name'], 'uploads/' . basename($file['name']));

    $_SESSION['success'] = true;
    header("Location: tambah_produk.php");
    exit();
}
