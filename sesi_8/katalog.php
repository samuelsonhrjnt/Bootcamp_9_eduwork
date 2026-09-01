<?php
require_once 'connect.php';

// Ambil kategori dari parameter URL (query string)
$selectedCategory = $_GET['category'] ?? 'Semua';

// 1. Query untuk mengambil daftar kategori unik untuk tombol filter
$catStmt = $pdo->query("SELECT DISTINCT category FROM products ORDER BY category ASC");
$categories = $catStmt->fetchAll(PDO::FETCH_COLUMN);

// 2. Query untuk mengambil produk berdasarkan filter
if ($selectedCategory !== 'Semua') {
    // Prepared statement dengan klausa WHERE jika ada kategori spesifik yang dipilih
    $stmt = $pdo->prepare("SELECT * FROM products WHERE category = :category ORDER BY id DESC");
    $stmt->execute(['category' => $selectedCategory]);
} else {
    // Tampilkan semua produk jika filter bernilai "Semua"
    $stmt = $pdo->query("SELECT * FROM products ORDER BY id DESC");
}

$products = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Produk E-Commerce</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .product-card {
            transition: transform 0.2s ease, shadow 0.2s ease;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.12) !important;
        }

        .product-img {
            height: 200px;
            object-fit: cover;
        }
    </style>
</head>

<body class="bg-light">

    <!-- Navbar Header -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4 shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="katalog.php">TokoOnline</a>
        </div>
    </nav>

    <div class="container pb-5">

        <!-- Bagian Filter Kategori -->
        <div class="row mb-4">
            <div class="col-12">
                <h5 class="fw-bold mb-3">Filter Kategori:</h5>
                <div class="d-flex flex-wrap gap-2">
                    <!-- Tombol 'Semua' -->
                    <a href="katalog.php?category=Semua"
                        class="btn btn-sm <?php echo ($selectedCategory === 'Semua') ? 'btn-primary' : 'btn-outline-primary'; ?>">
                        Semua
                    </a>

                    <!-- Looping Tombol Filter Kategori -->
                    <?php foreach ($categories as $cat): ?>
                        <a href="katalog.php?category=<?php echo urlencode($cat); ?>"
                            class="btn btn-sm <?php echo ($selectedCategory === $cat) ? 'btn-primary' : 'btn-outline-primary'; ?>">
                            <?php echo htmlspecialchars($cat); ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <!-- Grid Produk -->
        <div class="row g-4">
            <?php if (!empty($products)): ?>
                <?php foreach ($products as $product): ?>
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="card h-100 shadow-sm border-0 product-card">

                            <!-- Gambar Produk -->
                            <img src="uploads/<?php echo htmlspecialchars($product['image']); ?>"
                                class="card-img-top product-img"
                                alt="<?php echo htmlspecialchars($product['name']); ?>"
                                onerror="this.onerror=null; this.src='https://via.placeholder.com/300x200?text=No+Image';">

                            <div class="card-body d-flex flex-column">
                                <span class="badge bg-secondary mb-2 align-self-start">
                                    <?php echo htmlspecialchars($product['category']); ?>
                                </span>

                                <h6 class="card-title text-truncate fw-bold mb-1" title="<?php echo htmlspecialchars($product['name']); ?>">
                                    <?php echo htmlspecialchars($product['name']); ?>
                                </h6>

                                <p class="card-text text-muted small text-truncate mb-2">
                                    <?php echo htmlspecialchars($product['description']); ?>
                                </p>

                                <div class="mt-auto">
                                    <div class="fw-bold text-primary fs-5 mb-1">
                                        Rp <?php echo number_format($product['price'], 0, ',', '.'); ?>
                                    </div>

                                    <small class="text-muted d-block mb-3">
                                        Stok: <?php echo $product['stock']; ?>
                                    </small>
                                </div>
                            </div>

                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <!-- Tampilan Jika Produk Tidak Ditemukan -->
                <div class="col-12 text-center py-5">
                    <div class="alert alert-warning d-inline-block px-5">
                        Tidak ada produk yang ditemukan untuk kategori "<strong><?php echo htmlspecialchars($selectedCategory); ?></strong>".
                    </div>
                </div>
            <?php endif; ?>
        </div>

    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>