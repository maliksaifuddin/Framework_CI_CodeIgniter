-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 10 Nov 2019 pada 15.13
-- Versi Server: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_perubahan`
--

CREATE TABLE `tbl_perubahan` (
  `id` int(11) NOT NULL,
  `Nim` varchar(20) NOT NULL,
  `phone_number_old` varchar(20) NOT NULL,
  `phone_number_new` varchar(20) NOT NULL,
  `tgl_diubah` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_perubahan`
--

INSERT INTO `tbl_perubahan` (`id`, `Nim`, `phone_number_old`, `phone_number_new`, `tgl_diubah`) VALUES
(1, '161240000560', '088239954162', '088239954162', '2019-11-10 06:49:59'),
(2, '161240000560', '088239954162', '088239954154', '2019-11-10 06:50:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_data`
--

CREATE TABLE `users_data` (
  `user_id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `assoc_roles` varchar(1000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users_data`
--

INSERT INTO `users_data` (`user_id`, `name`, `nim`, `email`, `jenis_kelamin`, `phone_number`, `alamat`, `assoc_roles`) VALUES
(16, 'fais izzudin nadhif', '161240000568', 'faisizzudin@gmail.com', 'L', '088239954163', 'Karngkebagusa Tahunan Jepara', 'android'),
(15, 'malik', '161240000564', 'rumahkreatif.98@gmail.com', 'L', '088239954168', 'Bugel Kedung Jepara', 'yii'),
(17, 'siti', '161240000560', 'aisyahsitinur113@gmail.com', 'P', '088239954154', 'Bugel Kedung Jepara', 'yii');

--
-- Trigger `users_data`
--
DELIMITER $$
CREATE TRIGGER `trigger_phone_number` BEFORE UPDATE ON `users_data` FOR EACH ROW INSERT INTO tbl_perubahan
set nim=old.nim,
phone_number_old = old.phone_number,
phone_number_new = new.phone_number,
tgl_diubah = now()
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_perubahan`
--
ALTER TABLE `tbl_perubahan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_data`
--
ALTER TABLE `users_data`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_perubahan`
--
ALTER TABLE `tbl_perubahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users_data`
--
ALTER TABLE `users_data`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
