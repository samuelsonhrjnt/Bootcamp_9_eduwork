<?php
require_once 'connect.php';
include 'includes/header.php';

// Ambil data produk
$stmt = $pdo->query("SELECT * FROM products ORDER BY id DESC");
$products = $stmt->fetchAll();

$success_msg = $_SESSION['success'] ?? '';
unset($_SESSION['success']);
?>

<?php if ($success_msg): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo $success_msg; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

<h4 class="fw-bold mb-4">Daftar Produk</h4>

<div class="row g-4">
    <?php if (!empty($products)): ?>
        <?php foreach ($products as $p): ?>
            <div class="col-6 col-md-4 col-lg-3">
                <div class="card h-100 shadow-sm border-0">
                    <img src="../upload/<?php echo htmlspecialchars($p['image']); ?>"
                        class="card-img-top" alt="<?php echo htmlspecialchars($p['name']); ?>"
                        style="height: 180px; object-fit: cover;"
                        onerror="this.src='https://via.placeholder.com/300x200?text=No+Image';">

                    <div class="card-body d-flex flex-column">
                        <h6 class="card-title fw-bold text-truncate mb-1"><?php echo htmlspecialchars($p['name']); ?></h6>
                        <div class="fw-bold text-primary fs-5 mb-2">
                            Rp <?php echo number_format($p['price'], 0, ',', '.'); ?>
                        </div>

                        <div class="mt-auto d-grid gap-2">
                            <a href="detail.php?id=<?php echo $p['id']; ?>" class="btn btn-outline-secondary btn-sm">
                                Detail
                            </a>
                            <?php if ($p['stock'] > 0): ?>
                                <form action="aksi_keranjang.php?act=add" method="POST">
                                    <input type="hidden" name="product_id" value="<?php echo $p['id']; ?>">
                                    <input type="hidden" name="qty" value="1">
                                    <button type="submit" class="btn btn-primary btn-sm w-100 fw-medium">
                                        + Keranjang
                                    </button>
                                </form>
                            <?php else: ?>
                                <button class="btn btn-secondary btn-sm" disabled>Stok Habis</button>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="col-12 text-center py-5">
            <p class="text-muted">Belum ada produk yang tersedia.</p>
        </div>
    <?php endif; ?>
</div>

<?php include 'includes/footer.php'; ?>