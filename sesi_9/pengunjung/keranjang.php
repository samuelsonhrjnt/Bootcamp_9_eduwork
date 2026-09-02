<?php
require_once 'connect.php';
include 'includes/header.php';

$cart = $_SESSION['cart'] ?? [];
$total_harga = 0;
?>

<h4 class="fw-bold mb-4">Keranjang Belanja</h4>

<?php if (!empty($cart)): ?>
    <div class="table-responsive bg-white rounded shadow-sm p-3 mb-4">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th style="width: 150px;">Jumlah</th>
                    <th>Subtotal</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cart as $id => $item):
                    $subtotal = $item['price'] * $item['qty'];
                    $total_harga += $subtotal;
                ?>
                    <tr>
                        <td>
                            <div class="d-flex items-center gap-3">
                                <img src="../upload/<?php echo htmlspecialchars($item['image']); ?>"
                                    style="width: 50px; height: 50px; object-fit: cover;" class="rounded"
                                    onerror="this.src='https://via.placeholder.com/50';">
                                <div>
                                    <h6 class="mb-0 fw-bold"><?php echo htmlspecialchars($item['name']); ?></h6>
                                </div>
                            </div>
                        </td>
                        <td>Rp <?php echo number_format($item['price'], 0, ',', '.'); ?></td>
                        <td>
                            <form action="aksi_keranjang.php?act=update" method="POST" class="d-flex gap-1">
                                <input type="hidden" name="product_id" value="<?php echo $id; ?>">
                                <input type="number" name="qty" value="<?php echo $item['qty']; ?>" min="1" class="form-control form-control-sm text-center">
                                <button type="submit" class="btn btn-outline-secondary btn-sm">✓</button>
                            </form>
                        </td>
                        <td class="fw-bold">Rp <?php echo number_format($subtotal, 0, ',', '.'); ?></td>
                        <td class="text-center">
                            <a href="aksi_keranjang.php?act=delete&id=<?php echo $id; ?>"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Hapus produk ini dari keranjang?')">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="row align-items-center">
        <div class="col-md-6 mb-3 mb-md-0">
            <a href="index.php" class="btn btn-outline-primary">← Lanjut Belanja</a>
            <a href="aksi_keranjang.php?act=clear" class="btn btn-outline-danger" onclick="return confirm('Kosongkan keranjang?')">Kosongkan Keranjang</a>
        </div>
        <div class="col-md-6 text-md-end">
            <h5 class="fw-bold mb-3">Total Pembayaran: <span class="text-primary">Rp <?php echo number_format($total_harga, 0, ',', '.'); ?></span></h5>
            <a href="#" class="btn btn-success btn-lg fw-medium">Lanjut ke Checkout →</a>
        </div>
    </div>
<?php else: ?>
    <div class="text-center py-5 bg-white rounded shadow-sm">
        <p class="text-muted fs-5 mb-3">Keranjang belanja Anda masih kosong.</p>
        <a href="index.php" class="btn btn-primary">Mulai Belanja</a>
    </div>
<?php endif; ?>

<?php include 'includes/footer.php'; ?>