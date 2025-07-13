-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2025 at 06:19 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `motor_bekas88`
--

-- --------------------------------------------------------

--
-- Table structure for table `motors`
--

CREATE TABLE `motors` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `warna` varchar(50) NOT NULL,
  `kondisi` varchar(50) NOT NULL,
  `kilometer` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `motors`
--

INSERT INTO `motors` (`id`, `nama`, `harga`, `warna`, `kondisi`, `kilometer`, `deskripsi`, `gambar`, `created_at`) VALUES
(1, 'Honda Beat 2018', 12500000, 'Hitam', 'Mulus', 12000, 'Honda Beat 2018 dalam kondisi mulus, mesin halus, surat lengkap, siap pakai.', 'honda-beat.jpg', '2025-07-10 16:08:24'),
(2, 'Yamaha Mio 2020', 15000000, 'Biru', 'Baru 90%', 8000, 'Yamaha Mio 2020 kondisi seperti baru, aksesoris lengkap, bebas masalah.', 'yamaha-mio.jpg', '2025-07-10 16:08:24'),
(3, 'Honda Vario 2018', 18000000, 'Hitam', 'Baru 90%', 5000, 'Honda Vario 2018 jarak tempuh rendah, mesin terawat, body mulus.', 'honda-vario.jpg', '2025-07-10 16:08:24'),
(4, 'Suzuki Satria 2019', 18000000, 'Merah', 'Mulus', 15000, 'Suzuki Satria 2019 warna merah menyala, performa maksimal, surat lengkap.', 'suzuki-satria.jpg', '2025-07-10 16:08:24'),
(5, 'CBR 250 RR', 40000000, 'Hitam', 'Mulus', 20000, 'CBR 250 RR kondisi prima, aksesoris racing, siap touring.', 'cbr-250rr.jpg', '2025-07-10 16:08:24'),
(6, 'CBR 150 R', 20000000, 'Merah', 'Mulus', 20000, 'CBR 150 R warna merah sporty, mesin halus, cocok untuk harian.', 'cbr-150r.jpg', '2025-07-10 16:08:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `motors`
--
ALTER TABLE `motors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `motors`
--
ALTER TABLE `motors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
