<?php
session_start();

// Ambil data dan error dari session jika ada
$errors = $_SESSION['errors'] ?? [];
$old = $_SESSION['old'] ?? [];
$success = $_SESSION['success'] ?? false;

// Hapus session flash data agar tidak tampil berulang saat refresh
unset($_SESSION['errors'], $_SESSION['old'], $_SESSION['success']);
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data Produk</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-primary text-white py-3">
                        <h4 class="card-title mb-0 text-center">Form Input Produk</h4>
                    </div>
                    <div class="card-body p-4">

                        <?php if ($success): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                Data produk berhasil disimpan!
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>

                        <!-- Action diarahkan ke proses_produk.php -->
                        <form action="proses_produk.php" method="POST" enctype="multipart/form-data">

                            <!-- 1. Nama Produk -->
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Produk</label>
                                <input type="text" class="form-control <?php echo isset($errors['name']) ? 'is-invalid' : ''; ?>"
                                    id="name" name="name" value="<?php echo htmlspecialchars($old['name'] ?? ''); ?>" placeholder="Masukkan nama produk">
                                <?php if (isset($errors['name'])): ?>
                                    <div class="invalid-feedback"><?php echo $errors['name']; ?></div>
                                <?php endif; ?>
                            </div>

                            <!-- 2. Kategori -->
                            <div class="mb-3">
                                <label for="category" class="form-label">Kategori</label>
                                <select class="form-select <?php echo isset($errors['category']) ? 'is-invalid' : ''; ?>" id="category" name="category">
                                    <?php $selectedCat = $old['category'] ?? ''; ?>
                                    <option value="" disabled <?php echo empty($selectedCat) ? 'selected' : ''; ?>>Pilih Kategori</option>
                                    <option value="Elektronik" <?php echo ($selectedCat === 'Elektronik') ? 'selected' : ''; ?>>Elektronik</option>
                                    <option value="Pakaian" <?php echo ($selectedCat === 'Pakaian') ? 'selected' : ''; ?>>Pakaian</option>
                                    <option value="Makanan" <?php echo ($selectedCat === 'Makanan') ? 'selected' : ''; ?>>Makanan & Minuman</option>
                                    <option value="Lainnya" <?php echo ($selectedCat === 'Lainnya') ? 'selected' : ''; ?>>Lainnya</option>
                                </select>
                                <?php if (isset($errors['category'])): ?>
                                    <div class="invalid-feedback"><?php echo $errors['category']; ?></div>
                                <?php endif; ?>
                            </div>

                            <!-- 3. Harga dan Stok -->
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="price" class="form-label">Harga (Rp)</label>
                                    <input type="number" step="0.01" class="form-control <?php echo isset($errors['price']) ? 'is-invalid' : ''; ?>"
                                        id="price" name="price" value="<?php echo htmlspecialchars($old['price'] ?? ''); ?>" placeholder="0">
                                    <?php if (isset($errors['price'])): ?>
                                        <div class="invalid-feedback"><?php echo $errors['price']; ?></div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-6 mt-3 mt-md-0">
                                    <label for="stock" class="form-label">Jumlah Stok</label>
                                    <input type="number" class="form-control <?php echo isset($errors['stock']) ? 'is-invalid' : ''; ?>"
                                        id="stock" name="stock" value="<?php echo htmlspecialchars($old['stock'] ?? ''); ?>" placeholder="0">
                                    <?php if (isset($errors['stock'])): ?>
                                        <div class="invalid-feedback"><?php echo $errors['stock']; ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <!-- 4. Deskripsi -->
                            <div class="mb-3">
                                <label for="description" class="form-label">Deskripsi Produk</label>
                                <textarea class="form-control <?php echo isset($errors['description']) ? 'is-invalid' : ''; ?>"
                                    id="description" name="description" rows="4" placeholder="Tuliskan deskripsi singkat produk"><?php echo htmlspecialchars($old['description'] ?? ''); ?></textarea>
                                <?php if (isset($errors['description'])): ?>
                                    <div class="invalid-feedback"><?php echo $errors['description']; ?></div>
                                <?php endif; ?>
                            </div>

                            <!-- 5. Upload Gambar -->
                            <div class="mb-4">
                                <label for="image" class="form-label">Gambar Produk</label>
                                <input type="file" class="form-control <?php echo isset($errors['image']) ? 'is-invalid' : ''; ?>"
                                    id="image" name="image" accept="image/*">
                                <div class="form-text">Format yang diperbolehkan: JPG, PNG, WEBP. Maksimal 2MB.</div>
                                <?php if (isset($errors['image'])): ?>
                                    <div class="invalid-feedback"><?php echo $errors['image']; ?></div>
                                <?php endif; ?>
                            </div>

                            <!-- Submit Button -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-lg">Simpan Produk</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>