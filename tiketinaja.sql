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
  `price` decimal(10,2) NOT NULL,
  `kursi` int(11) NOT NULL,
  `operasional` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`operasional`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pesawat`
--

INSERT INTO `pesawat` (`id`, `nomor_penerbangan`, `maskapai`, `asal`, `tujuan`, `waktu_keberangkatan`, `waktu_kedatangan`, `price`, `kursi`, `operasional`) VALUES
(1, 'GA-001', 'Garuda Indonesia', 'Jakarta', 'Bali', '2025-01-20 06:00:00', '2025-01-20 08:00:00', '1500000.00', 180, '[\"monday\", \"wednesday\", \"friday\"]'),
(2, 'GA-002', 'Garuda Indonesia', 'Surabaya', 'Jakarta', '2025-01-20 09:00:00', '2025-01-20 11:00:00', '1300000.00', 180, '[\"tuesday\", \"thursday\"]'),
(3, 'GA-003', 'Garuda Indonesia', 'Bandung', 'Medan', '2025-01-20 12:00:00', '2025-01-20 14:00:00', '1700000.00', 200, '[\"monday\", \"saturday\"]'),
(4, 'GA-004', 'Garuda Indonesia', 'Bali', 'Makassar', '2025-01-20 07:00:00', '2025-01-20 09:00:00', '1600000.00', 180, '[\"sunday\"]'),
(5, 'GA-005', 'Garuda Indonesia', 'Jakarta', 'Lombok', '2025-01-20 15:00:00', '2025-01-20 17:00:00', '1400000.00', 150, '[\"wednesday\", \"friday\"]'),
(6, 'GA-006', 'Garuda Indonesia', 'Bali', 'Jakarta', '2025-01-20 06:00:00', '2025-01-20 08:00:00', '1500000.00', 160, '[\"monday\", \"tuesday\", \"saturday\"]'),
(7, 'GA-007', 'Garuda Indonesia', 'Jakarta', 'Medan', '2025-01-20 10:00:00', '2025-01-20 13:00:00', '1800000.00', 200, '[\"thursday\", \"sunday\"]'),
(8, 'GA-008', 'Garuda Indonesia', 'Jakarta', 'Yogyakarta', '2025-01-20 14:00:00', '2025-01-20 16:00:00', '1200000.00', 150, '[\"friday\"]'),
(9, 'GA-009', 'Garuda Indonesia', 'Surabaya', 'Bali', '2025-01-20 17:00:00', '2025-01-20 18:30:00', '1000000.00', 180, '[\"wednesday\"]'),
(10, 'GA-010', 'Garuda Indonesia', 'Makassar', 'Bandung', '2025-01-20 08:00:00', '2025-01-20 11:00:00', '2000000.00', 170, '[\"tuesday\", \"saturday\"]'),
(11, 'JT-011', 'Lion Air', 'Jakarta', 'Medan', '2025-01-20 06:00:00', '2025-01-20 08:30:00', '1000000.00', 200, '[\"monday\", \"saturday\"]'),
(12, 'JT-012', 'Lion Air', 'Bali', 'Surabaya', '2025-01-20 09:00:00', '2025-01-20 10:00:00', '900000.00', 180, '[\"tuesday\", \"thursday\", \"sunday\"]'),
(13, 'JT-013', 'Lion Air', 'Jakarta', 'Lombok', '2025-01-20 15:00:00', '2025-01-20 17:30:00', '1300000.00', 150, '[\"friday\", \"saturday\"]'),
(14, 'JT-014', 'Lion Air', 'Surabaya', 'Jakarta', '2025-01-20 07:00:00', '2025-01-20 09:00:00', '800000.00', 180, '[\"wednesday\", \"sunday\"]'),
(15, 'JT-015', 'Lion Air', 'Bandung', 'Jakarta', '2025-01-20 13:00:00', '2025-01-20 14:30:00', '700000.00', 160, '[\"thursday\"]'),
(16, 'JT-016', 'Lion Air', 'Medan', 'Jakarta', '2025-01-20 10:00:00', '2025-01-20 12:30:00', '1000000.00', 200, '[\"monday\", \"wednesday\"]'),
(17, 'JT-017', 'Lion Air', 'Jakarta', 'Makassar', '2025-01-20 09:00:00', '2025-01-20 12:00:00', '1600000.00', 150, '[\"tuesday\", \"saturday\"]'),
(18, 'JT-018', 'Lion Air', 'Bali', 'Jakarta', '2025-01-20 11:00:00', '2025-01-20 13:00:00', '1500000.00', 180, '[\"wednesday\", \"friday\"]'),
(19, 'JT-019', 'Lion Air', 'Makassar', 'Medan', '2025-01-20 16:00:00', '2025-01-20 19:00:00', '2000000.00', 170, '[\"sunday\"]'),
(20, 'JT-020', 'Lion Air', 'Jakarta', 'Surabaya', '2025-01-20 08:00:00', '2025-01-20 09:30:00', '900000.00', 200, '[\"friday\"]');

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
