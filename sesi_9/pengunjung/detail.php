<?php
require_once 'connect.php';
include 'includes/header.php';

$id = $_GET['id'] ?? 0;
$stmt = $pdo->prepare("SELECT * FROM products WHERE id = :id");
$stmt->execute(['id' => $id]);
$product = $stmt->fetch();

if (!$product) {
    echo "<div class='alert alert-danger'>Produk tidak ditemukan. <a href='index.php'>Kembali ke Beranda</a></div>";
    include 'includes/footer.php';
    exit;
}
?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Beranda</a></li>
        <li class="breadcrumb-item active" aria-current="page"><?php echo htmlspecialchars($product['name']); ?></li>
    </ol>
</nav>

<div class="card shadow-sm border-0 p-3">
    <div class="row g-4 align-items-center">
        <div class="col-md-5">
            <img src="assets/images/<?php echo htmlspecialchars($product['image']); ?>"
                class="img-fluid rounded" alt="<?php echo htmlspecialchars($product['name']); ?>"
                onerror="this.src='https://via.placeholder.com/400x300?text=No+Image';">
        </div>
        <div class="col-md-7">
            <h3 class="fw-bold"><?php echo htmlspecialchars($product['name']); ?></h3>
            <h4 class="text-primary fw-bold my-3">
                Rp <?php echo number_format($product['price'], 0, ',', '.'); ?>
            </h4>
            <p class="text-muted">Stok: <strong><?php echo $product['stock']; ?></strong></p>
            <p class="mb-4"><?php echo nl2br(htmlspecialchars($product['description'])); ?></p>

            <?php if ($product['stock'] > 0): ?>
                <form action="aksi_keranjang.php?act=add" method="POST" class="row g-2 align-items-center">
                    <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                    <div class="col-auto">
                        <label for="qty" class="col-form-label">Jumlah:</label>
                    </div>
                    <div class="col-auto">
                        <input type="number" id="qty" name="qty" class="form-control" value="1" min="1" max="<?php echo $product['stock']; ?>" style="width: 80px;">
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary fw-medium">
                            🛒 Tambah ke Keranjang
                        </button>
                    </div>
                </form>
            <?php else: ?>
                <button class="btn btn-secondary" disabled>Stok Habis</button>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>