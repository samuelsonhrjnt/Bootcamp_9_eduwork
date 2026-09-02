<?php
session_start();
$errors = $_SESSION['errors'] ?? [];
$old = $_SESSION['old'] ?? [];
unset($_SESSION['errors'], $_SESSION['old']);
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk Baru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Tambah Produk Baru</h5>
                    </div>
                    <div class="card-body p-4">

                        <form action="proses_produk.php?action=create" method="POST" enctype="multipart/form-data">

                            <div class="mb-3">
                                <label class="form-label">Nama Produk</label>
                                <input type="text" class="form-control <?php echo isset($errors['name']) ? 'is-invalid' : ''; ?>"
                                    name="name" value="<?php echo htmlspecialchars($old['name'] ?? ''); ?>">
                                <div class="invalid-feedback"><?php echo $errors['name'] ?? ''; ?></div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Kategori</label>
                                <select class="form-select <?php echo isset($errors['category']) ? 'is-invalid' : ''; ?>" name="category">
                                    <?php $cat = $old['category'] ?? ''; ?>
                                    <option value="" disabled <?php echo empty($cat) ? 'selected' : ''; ?>>Pilih Kategori</option>
                                    <option value="Elektronik" <?php echo ($cat === 'Elektronik') ? 'selected' : ''; ?>>Elektronik</option>
                                    <option value="Pakaian" <?php echo ($cat === 'Pakaian') ? 'selected' : ''; ?>>Pakaian</option>
                                    <option value="Makanan" <?php echo ($cat === 'Makanan') ? 'selected' : ''; ?>>Makanan & Minuman</option>
                                    <option value="Lainnya" <?php echo ($cat === 'Lainnya') ? 'selected' : ''; ?>>Lainnya</option>
                                </select>
                                <div class="invalid-feedback"><?php echo $errors['category'] ?? ''; ?></div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Harga (Rp)</label>
                                    <input type="number" step="0.01" class="form-control <?php echo isset($errors['price']) ? 'is-invalid' : ''; ?>"
                                        name="price" value="<?php echo htmlspecialchars($old['price'] ?? ''); ?>">
                                    <div class="invalid-feedback"><?php echo $errors['price'] ?? ''; ?></div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Stok</label>
                                    <input type="number" class="form-control <?php echo isset($errors['stock']) ? 'is-invalid' : ''; ?>"
                                        name="stock" value="<?php echo htmlspecialchars($old['stock'] ?? ''); ?>">
                                    <div class="invalid-feedback"><?php echo $errors['stock'] ?? ''; ?></div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Deskripsi Produk</label>
                                <textarea class="form-control <?php echo isset($errors['description']) ? 'is-invalid' : ''; ?>"
                                    name="description" rows="3"><?php echo htmlspecialchars($old['description'] ?? ''); ?></textarea>
                                <div class="invalid-feedback"><?php echo $errors['description'] ?? ''; ?></div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Gambar Produk</label>
                                <input type="file" class="form-control <?php echo isset($errors['image']) ? 'is-invalid' : ''; ?>" name="image" accept="image/*">
                                <div class="invalid-feedback"><?php echo $errors['image'] ?? ''; ?></div>
                            </div>

                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary w-100">Simpan Produk</button>
                                <a href="index.php" class="btn btn-outline-secondary w-100">Batal</a>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>