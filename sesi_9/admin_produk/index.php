<?php
session_start();
require_once 'connect.php';

// Ambil pesan notifikasi dari session jika ada
$success_msg = $_SESSION['success'] ?? '';
$error_msg   = $_SESSION['error'] ?? '';
unset($_SESSION['success'], $_SESSION['error']);

// Query READ: Ambil semua produk
$stmt = $pdo->query("SELECT * FROM products ORDER BY id DESC");
$products = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Admin - Kelola Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="h3 fw-bold">Kelola Produk Toko</h2>
            <a href="tambah_produk.php" class="btn btn-primary">+ Tambah Produk Baru</a>
        </div>

        <!-- Alert Notifikasi -->
        <?php if ($success_msg): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo $success_msg; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <?php if ($error_msg): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php echo $error_msg; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <!-- Tabel Daftar Produk (READ) -->
        <div class="card shadow-sm border-0">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th class="ps-3">No</th>
                                <th>Gambar</th>
                                <th>Nama Produk</th>
                                <th>Kategori</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($products)): ?>
                                <?php $no = 1;
                                foreach ($products as $row): ?>
                                    <tr>
                                        <td class="ps-3"><?php echo $no++; ?></td>
                                        <td>
                                            <img src="uploads/<?php echo htmlspecialchars($row['image']); ?>"
                                                alt="Gambar" style="width: 50px; height: 50px; object-fit: cover;" class="rounded"
                                                onerror="this.src='https://via.placeholder.com/50';">
                                        </td>
                                        <td class="fw-bold"><?php echo htmlspecialchars($row['name']); ?></td>
                                        <td><span class="badge bg-secondary"><?php echo htmlspecialchars($row['category']); ?></span></td>
                                        <td>Rp <?php echo number_format($row['price'], 0, ',', '.'); ?></td>
                                        <td><?php echo $row['stock']; ?></td>
                                        <td class="text-center">
                                            <!-- Tombol EDIT -->
                                            <a href="edit_produk.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-warning">Edit</a>

                                            <!-- Tombol HAPUS (DELETE) -->
                                            <a href="hapus_produk.php?id=<?php echo $row['id']; ?>"
                                                class="btn btn-sm btn-danger"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">
                                                Hapus
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="7" class="text-center py-4 text-muted">Belum ada data produk.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>