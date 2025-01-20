-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Jan 2025 pada 15.42
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tiketinaja`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pesawat_id` int(11) NOT NULL,
  `booking_code` varchar(50) NOT NULL,
  `detail_penerbangan` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`detail_penerbangan`)),
  `total_price` decimal(10,2) NOT NULL,
  `status` enum('pending','confirmed','canceled') NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `bookings`
--

INSERT INTO `bookings` (`id`, `user_id`, `pesawat_id`, `booking_code`, `detail_penerbangan`, `total_price`, `status`) VALUES
(3, 2, 1, 'BK001', '{\"nomor_penerbangan\": \"GA-101\", \"maskapai\": \"Garuda Indonesia\", \"asal\": \"Jakarta\", \"tujuan\": \"Bali\", \"waktu_keberangkatan\": \"2025-01-20 10:00:00\", \"waktu_kedatangan\": \"2025-01-20 12:00:00\"}', '3000000.00', 'confirmed'),
(4, 3, 2, 'BK002', '{\"nomor_penerbangan\": \"SJ-202\", \"maskapai\": \"Sriwijaya Air\", \"asal\": \"Jakarta\", \"tujuan\": \"Surabaya\", \"waktu_keberangkatan\": \"2025-01-21 08:00:00\", \"waktu_kedatangan\": \"2025-01-21 09:30:00\"}', '2400000.00', 'pending');

-- --------------------------------------------------------

--
-- Struktur dari tabel `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `payment_date` datetime NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `status` enum('pending','completed','failed') NOT NULL DEFAULT 'pending',
  `payment_method` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `payment`
--

INSERT INTO `payment` (`id`, `booking_id`, `payment_date`, `amount`, `status`, `payment_method`) VALUES
(3, 3, '2025-01-15 14:00:00', '3000000.00', 'completed', 'credit_card'),
(4, 4, '0000-00-00 00:00:00', '2400000.00', 'pending', 'bank_transfer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penumpang`
--

CREATE TABLE `penumpang` (
  `id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `passport_number` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `penumpang`
--

INSERT INTO `penumpang` (`id`, `booking_id`, `name`, `age`, `passport_number`) VALUES
(7, 3, 'rafi', 30, 'A12345678'),
(8, 3, 'rafi', 28, 'B98765432'),
(9, 4, 'ramdani', 35, 'C76543210');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesawat`
--

CREATE TABLE `pesawat` (
  `id` int(11) NOT NULL,
  `nomor_penerbangan` varchar(50) NOT NULL,
  `maskapai` varchar(100) NOT NULL,
  `asal` varchar(100) NOT NULL,
  `tujuan` varchar(100) NOT NULL,
  `waktu_keberangkatan` datetime NOT NULL,
  `waktu_kedatangan` datetime NOT NULL,
  `price` int(255) NOT NULL,
  `kursi` int(11) NOT NULL,
  `operasional` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`operasional`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pesawat`
--

INSERT INTO `pesawat` (`id`, `nomor_penerbangan`, `maskapai`, `asal`, `tujuan`, `waktu_keberangkatan`, `waktu_kedatangan`, `price`, `kursi`, `operasional`) VALUES
(1, 'GA-001', 'Garuda Indonesia', 'Jakarta', 'Bali', DATE_ADD(DATE_ADD(NOW(), INTERVAL 1 DAY), INTERVAL 0 HOUR), DATE_ADD(DATE_ADD(NOW(), INTERVAL 1 DAY), INTERVAL 2 HOUR), 1500000, 180, '["monday", "wednesday"]'),
(2, 'GA-002', 'Garuda Indonesia', 'Surabaya', 'Jakarta', DATE_ADD(DATE_ADD(NOW(), INTERVAL 1 DAY), INTERVAL 3 HOUR), DATE_ADD(DATE_ADD(NOW(), INTERVAL 1 DAY), INTERVAL 5 HOUR), 1300000, 180, '["tuesday"]'),
(3, 'GA-003', 'Garuda Indonesia', 'Bandung', 'Medan', DATE_ADD(DATE_ADD(NOW(), INTERVAL 1 DAY), INTERVAL 6 HOUR), DATE_ADD(DATE_ADD(NOW(), INTERVAL 1 DAY), INTERVAL 8 HOUR), 1700000, 200, '["monday", "friday"]'),
(4, 'GA-004', 'Garuda Indonesia', 'Bali', 'Makassar', DATE_ADD(DATE_ADD(NOW(), INTERVAL 1 DAY), INTERVAL 9 HOUR), DATE_ADD(DATE_ADD(NOW(), INTERVAL 1 DAY), INTERVAL 11 HOUR), 1600000, 180, '["sunday"]'),
(5, 'GA-005', 'Garuda Indonesia', 'Jakarta', 'Lombok', DATE_ADD(DATE_ADD(NOW(), INTERVAL 1 DAY), INTERVAL 12 HOUR), DATE_ADD(DATE_ADD(NOW(), INTERVAL 1 DAY), INTERVAL 14 HOUR), 1400000, 150, '["wednesday"]'),
(6, 'JT-001', 'Lion Air', 'Medan', 'Jakarta', DATE_ADD(DATE_ADD(NOW(), INTERVAL 1 DAY), INTERVAL 15 HOUR), DATE_ADD(DATE_ADD(NOW(), INTERVAL 1 DAY), INTERVAL 17 HOUR), 1000000, 200, '["monday"]'),
(7, 'JT-002', 'Lion Air', 'Surabaya', 'Bali', DATE_ADD(DATE_ADD(NOW(), INTERVAL 1 DAY), INTERVAL 18 HOUR), DATE_ADD(DATE_ADD(NOW(), INTERVAL 1 DAY), INTERVAL 20 HOUR), 900000, 180, '["tuesday"]'),
(8, 'JT-003', 'Lion Air', 'Bandung', 'Makassar', DATE_ADD(DATE_ADD(NOW(), INTERVAL 1 DAY), INTERVAL 21 HOUR), DATE_ADD(DATE_ADD(NOW(), INTERVAL 1 DAY), INTERVAL 23 HOUR), 2000000, 170, '["saturday"]'),
(9, 'JT-004', 'Lion Air', 'Jakarta', 'Yogyakarta', DATE_ADD(DATE_ADD(NOW(), INTERVAL 1 DAY), INTERVAL 24 HOUR), DATE_ADD(DATE_ADD(NOW(), INTERVAL 1 DAY), INTERVAL 26 HOUR), 1200000, 150, '["friday"]'),
(10, 'JT-005', 'Lion Air', 'Bali', 'Jakarta', DATE_ADD(DATE_ADD(NOW(), INTERVAL 1 DAY), INTERVAL 27 HOUR), DATE_ADD(DATE_ADD(NOW(), INTERVAL 1 DAY), INTERVAL 29 HOUR), 1500000, 180, '["monday"]'),
-- Hari 2
(11, 'GA-006', 'Garuda Indonesia', 'Jakarta', 'Medan', DATE_ADD(DATE_ADD(NOW(), INTERVAL 2 DAY), INTERVAL 0 HOUR), DATE_ADD(DATE_ADD(NOW(), INTERVAL 2 DAY), INTERVAL 3 HOUR), 1800000, 200, '["tuesday"]'),
(12, 'GA-007', 'Garuda Indonesia', 'Makassar', 'Bandung', DATE_ADD(DATE_ADD(NOW(), INTERVAL 2 DAY), INTERVAL 4 HOUR), DATE_ADD(DATE_ADD(NOW(), INTERVAL 2 DAY), INTERVAL 7 HOUR), 2000000, 170, '["saturday"]'),
(13, 'JT-006', 'Lion Air', 'Jakarta', 'Surabaya', DATE_ADD(DATE_ADD(NOW(), INTERVAL 2 DAY), INTERVAL 8 HOUR), DATE_ADD(DATE_ADD(NOW(), INTERVAL 2 DAY), INTERVAL 10 HOUR), 900000, 200, '["friday"]'),
(14, 'JT-007', 'Lion Air', 'Medan', 'Bali', DATE_ADD(DATE_ADD(NOW(), INTERVAL 2 DAY), INTERVAL 11 HOUR), DATE_ADD(DATE_ADD(NOW(), INTERVAL 2 DAY), INTERVAL 14 HOUR), 1900000, 180, '["sunday"]'),
(15, 'JT-008', 'Lion Air', 'Jakarta', 'Makassar', DATE_ADD(DATE_ADD(NOW(), INTERVAL 2 DAY), INTERVAL 15 HOUR), DATE_ADD(DATE_ADD(NOW(), INTERVAL 2 DAY), INTERVAL 17 HOUR), 1600000, 150, '["tuesday"]'),
(16, 'GA-008', 'Garuda Indonesia', 'Yogyakarta', 'Jakarta', DATE_ADD(DATE_ADD(NOW(), INTERVAL 2 DAY), INTERVAL 18 HOUR), DATE_ADD(DATE_ADD(NOW(), INTERVAL 2 DAY), INTERVAL 20 HOUR), 1200000, 180, '["thursday"]'),
(17, 'GA-009', 'Garuda Indonesia', 'Jakarta', 'Pontianak', DATE_ADD(DATE_ADD(NOW(), INTERVAL 2 DAY), INTERVAL 21 HOUR), DATE_ADD(DATE_ADD(NOW(), INTERVAL 2 DAY), INTERVAL 23 HOUR), 1400000, 150, '["wednesday"]'),
(18, 'JT-009', 'Lion Air', 'Surabaya', 'Bandung', DATE_ADD(DATE_ADD(NOW(), INTERVAL 2 DAY), INTERVAL 24 HOUR), DATE_ADD(DATE_ADD(NOW(), INTERVAL 2 DAY), INTERVAL 26 HOUR), 1300000, 160, '["friday"]'),
(19, 'JT-010', 'Lion Air', 'Jakarta', 'Bali', DATE_ADD(DATE_ADD(NOW(), INTERVAL 2 DAY), INTERVAL 27 HOUR), DATE_ADD(DATE_ADD(NOW(), INTERVAL 2 DAY), INTERVAL 29 HOUR), 1500000, 180, '["sunday"]'),
(20, 'GA-010', 'Garuda Indonesia', 'Lombok', 'Jakarta', DATE_ADD(DATE_ADD(NOW(), INTERVAL 2 DAY), INTERVAL 30 HOUR), DATE_ADD(DATE_ADD(NOW(), INTERVAL 2 DAY), INTERVAL 33 HOUR), 1700000, 200, '["monday"]'),
-- Hari 3
(21, 'GA-011', 'Garuda Indonesia', 'Jakarta', 'Bali', DATE_ADD(DATE_ADD(NOW(), INTERVAL 3 DAY), INTERVAL 0 HOUR), DATE_ADD(DATE_ADD(NOW(), INTERVAL 3 DAY), INTERVAL 2 HOUR), 1500000, 180, '["monday", "wednesday"]'),
(22, 'GA-012', 'Garuda Indonesia', 'Surabaya', 'Jakarta', DATE_ADD(DATE_ADD(NOW(), INTERVAL 3 DAY), INTERVAL 3 HOUR), DATE_ADD(DATE_ADD(NOW(), INTERVAL 3 DAY), INTERVAL 5 HOUR), 1300000, 180, '["tuesday"]'),
(23, 'GA-013', 'Garuda Indonesia', 'Bandung', 'Medan', DATE_ADD(DATE_ADD(NOW(), INTERVAL 3 DAY), INTERVAL 6 HOUR), DATE_ADD(DATE_ADD(NOW(), INTERVAL 3 DAY), INTERVAL 8 HOUR), 1700000, 200, '["monday", "friday"]'),
(24, 'GA-014', 'Garuda Indonesia', 'Bali', 'Makassar', DATE_ADD(DATE_ADD(NOW(), INTERVAL 3 DAY), INTERVAL 9 HOUR), DATE_ADD(DATE_ADD(NOW(), INTERVAL 3 DAY), INTERVAL 11 HOUR), 1600000, 180, '["sunday"]'),
(25, 'GA-015', 'Garuda Indonesia', 'Jakarta', 'Lombok', DATE_ADD(DATE_ADD(NOW(), INTERVAL 3 DAY), INTERVAL 12 HOUR), DATE_ADD(DATE_ADD(NOW(), INTERVAL 3 DAY), INTERVAL 14 HOUR), 1400000, 150, '["wednesday"]'),
(26, 'JT-011', 'Lion Air', 'Medan', 'Jakarta', DATE_ADD(DATE_ADD(NOW(), INTERVAL 3 DAY), INTERVAL 15 HOUR), DATE_ADD(DATE_ADD(NOW(), INTERVAL 3 DAY), INTERVAL 17 HOUR), 1000000, 200, '["monday"]'),
(27, 'JT-012', 'Lion Air', 'Surabaya', 'Bali', DATE_ADD(DATE_ADD(NOW(), INTERVAL 3 DAY), INTERVAL 18 HOUR), DATE_ADD(DATE_ADD(NOW(), INTERVAL 3 DAY), INTERVAL 20 HOUR), 900000, 180, '["tuesday"]'),
(28, 'JT-013', 'Lion Air', 'Bandung', 'Makassar', DATE_ADD(DATE_ADD(NOW(), INTERVAL 3 DAY), INTERVAL 21 HOUR), DATE_ADD(DATE_ADD(NOW(), INTERVAL 3 DAY), INTERVAL 23 HOUR), 2000000, 170, '["saturday"]'),
(29, 'JT-014', 'Lion Air', 'Jakarta', 'Yogyakarta', DATE_ADD(DATE_ADD(NOW(), INTERVAL 3 DAY), INTERVAL 24 HOUR), DATE_ADD(DATE_ADD(NOW(), INTERVAL 3 DAY), INTERVAL 26 HOUR), 1200000, 150, '["friday"]'),
(30, 'JT-015', 'Lion Air', 'Bali', 'Jakarta', DATE_ADD(DATE_ADD(NOW(), INTERVAL 3 DAY), INTERVAL 27 HOUR), DATE_ADD(DATE_ADD(NOW(), INTERVAL 3 DAY), INTERVAL 29 HOUR), 1500000, 180, '["monday"]');


-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `role`) VALUES
(1, 'Admin', 'admin@tiketinaja.com', 'hashedpassword123', 'admin'),
(2, 'rafi', 'rafi@tiketinaja.com', 'hashedpassword123', 'user'),
(3, 'Ramdani', 'ramdani@tiketinaja.com', 'hashedpassword123', 'user'),
(4, 'Hafidh', 'hafidh@tiketinaja.com', 'hashedpassword123', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `booking_code` (`booking_code`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `pesawat_id` (`pesawat_id`);

--
-- Indeks untuk tabel `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `booking_id` (`booking_id`);

--
-- Indeks untuk tabel `penumpang`
--
ALTER TABLE `penumpang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `booking_id` (`booking_id`);

--
-- Indeks untuk tabel `pesawat`
--
ALTER TABLE `pesawat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `penumpang`
--
ALTER TABLE `penumpang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `pesawat`
--
ALTER TABLE `pesawat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`pesawat_id`) REFERENCES `pesawat` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penumpang`
--
ALTER TABLE `penumpang`
  ADD CONSTRAINT `penumpang_ibfk_1` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
