<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SHOP.CO')</title>

    <!-- Google Fonts (Optional: Agar Font Beda & Tebal seperti SHOP.CO) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Integral+CF:wght@700;900&family=Satoshi:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Satoshi', sans-serif;
        }
        .fw-black {
            font-family: 'Integral CF', sans-serif;
        }
    </style>
</head>
<body class="bg-white d-flex flex-column min-vh-100">

    <!-- Panggil Komponen Navbar -->
    <x-navbar />

    <!-- Konten Utama (Dibuat full width tanpa flex-grow berlebih agar pas dengan desain) -->
    <main class="container flex-grow-1">
        @yield('content')
    </main>

    <!-- Panggil Komponen Footer -->
    <x-footer />

    <!-- Bootstrap 5 JS Bundle CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>