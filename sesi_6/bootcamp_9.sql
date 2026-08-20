-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2026 at 11:38 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bootcamp_9`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `category` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- INSERT (Menambah Data)
-- ==========================================

-- Insert User
INSERT INTO users (name, email, password) 
VALUES ('John Doe', 'john@example.com', 'hashed_password_123');

-- Insert Product
INSERT INTO products (name, description, image, price, stock, category) 
VALUES ('Sepatu Lari', 'Sepatu lari ringan dan nyaman', 'sepatu.jpg', 500000.00, 10, 'Olahraga');

-- Insert Order (user_id = 1, product_id = 1)
INSERT INTO orders (user_id, product_id, quantity, total) 
VALUES (1, 1, 2, 1000000.00);

-- READ (Membaca / Menampilkan Data)
-- ==========================================

-- Menampilkan semua data dari masing-masing tabel
SELECT * FROM users;
SELECT * FROM products;
SELECT * FROM orders;

-- Menampilkan detail pesanan beserta nama user dan produk (JOIN)
SELECT 
    orders.id AS order_id,
    users.name AS customer_name,
    products.name AS product_name,
    orders.quantity,
    orders.total
FROM orders
JOIN users ON orders.user_id = users.id
JOIN products ON orders.product_id = products.id;

-- UPDATE (Membaharui Data)
-- ==========================================

-- Update nama dan email user berdasarkan ID
UPDATE users 
SET name = 'Johnathan Doe', email = 'john.doe@example.com' 
WHERE id = 1;

-- Update harga dan stok produk berdasarkan ID
UPDATE products 
SET price = 450000.00, stock = 8 
WHERE id = 1;

-- Update jumlah pesanan dan total harga berdasarkan ID
UPDATE orders 
SET quantity = 1, total = 450000.00 
WHERE id = 1;

-- DELETE (Menghapus Data)
-- ==========================================

-- Menghapus order tertentu
DELETE FROM orders WHERE id = 1;

-- Menghapus produk tertentu
DELETE FROM products WHERE id = 1;

-- Menghapus user tertentu
DELETE FROM users WHERE id = 1;