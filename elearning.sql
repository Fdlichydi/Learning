-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2024 at 02:33 PM
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
-- Database: `elearning`
--

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kelas` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `guru_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `nama_kelas`, `deskripsi`, `guru_id`, `created_at`, `updated_at`) VALUES
(1, 'Pemograman Dasar RPL 1', '-', 2, '2024-09-10 17:25:00', '2024-09-20 19:34:44'),
(2, 'Pemograman Dasar RPL 2', '-', 2, '2024-09-11 00:55:13', '2024-09-20 19:35:04');

-- --------------------------------------------------------

--
-- Table structure for table `kelas_siswa`
--

CREATE TABLE `kelas_siswa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kelas_id` bigint(20) UNSIGNED NOT NULL,
  `siswa_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kelas_siswa`
--

INSERT INTO `kelas_siswa` (`id`, `kelas_id`, `siswa_id`, `created_at`, `updated_at`) VALUES
(4, 2, 7, NULL, NULL),
(11, 1, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pertemuans`
--

CREATE TABLE `pertemuans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kelas_id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pertemuans`
--

INSERT INTO `pertemuans` (`id`, `kelas_id`, `judul`, `deskripsi`, `file`, `created_at`, `updated_at`) VALUES
(3, 1, 'Pertemuan 1', 'Dasar - Dasar Pemograman', '1726894444-resume rio.docx', '2024-09-11 00:56:42', '2024-09-24 07:38:01'),
(6, 2, 'Perkenalan', 'Tolong di baca dan buat tugas nya', '1726582914-resume rio.docx', '2024-09-17 07:21:54', '2024-09-20 21:17:33'),
(7, 1, 'Dasar - Dasar Pemograman', 'Tolong di baca, dan buat tugas nya', '1726589554-29_panduan-managemen-komplain.pdf', '2024-09-17 09:12:34', '2024-09-20 19:39:41');

-- --------------------------------------------------------

--
-- Table structure for table `tugas_siswas`
--

CREATE TABLE `tugas_siswas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `siswa_id` bigint(20) UNSIGNED NOT NULL,
  `kelas_id` bigint(20) UNSIGNED NOT NULL,
  `pertemuan_id` bigint(20) UNSIGNED NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `nilai` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tugas_siswas`
--

INSERT INTO `tugas_siswas` (`id`, `siswa_id`, `kelas_id`, `pertemuan_id`, `file`, `nilai`, `created_at`, `updated_at`) VALUES
(15, 3, 1, 3, '1727188549-Daftar Pustaka B.docx', '10', '2024-09-24 07:35:49', '2024-09-27 05:26:15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','guru','siswa') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(2, 'Sevino, S.Pd', 'sevino@gmail.com', '$2y$12$q8q5i0fe.1bxhiMsqIVFAehM2gg6ukRzyRXm1ev.Voozsne8ZBAna', 'guru', '2024-09-10 08:18:31', '2024-09-23 04:47:15'),
(3, 'Ali Sadikin', 'ali@gmail.com', '$2y$12$5c3xLllKPEPhejmJY9/f2ubFrwA.hOP2ppOpHfPgFLGSxJDRixaE.', 'siswa', '2024-09-10 08:18:32', '2024-09-23 04:47:47'),
(4, 'fadli', 'fadli@gmail.com', '$2y$12$HGtfwgrHuLL7xb3KsISayexPPQRCmmo/LTaa6EgC26gq/wFonS23C', 'admin', '2024-09-10 16:57:05', '2024-09-10 16:57:05'),
(5, 'Oky Prasetyo, S.Pd', 'oky@gmail.com', '$2y$12$k1rLwnTvrfp/3Remizu8WukoJPrNRK1aYtqOV.UpIYCWceiDsF2cu', 'guru', '2024-09-10 17:25:55', '2024-09-23 04:49:47'),
(7, 'Nanda', 'nanda@gmail.com', '$2y$12$mXqwvBwxnAPB4b8i8exA2e9cbVCQjXwUJNiUXm7pGgwldo8fs22a6', 'siswa', '2024-09-10 17:27:11', '2024-09-23 04:49:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kelas_guru_id_foreign` (`guru_id`);

--
-- Indexes for table `kelas_siswa`
--
ALTER TABLE `kelas_siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kelas_siswa_kelas_id_foreign` (`kelas_id`),
  ADD KEY `kelas_siswa_siswa_id_foreign` (`siswa_id`);

--
-- Indexes for table `pertemuans`
--
ALTER TABLE `pertemuans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pertemuans_kelas_id_foreign` (`kelas_id`);

--
-- Indexes for table `tugas_siswas`
--
ALTER TABLE `tugas_siswas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kelas_siswa`
--
ALTER TABLE `kelas_siswa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pertemuans`
--
ALTER TABLE `pertemuans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tugas_siswas`
--
ALTER TABLE `tugas_siswas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_guru_id_foreign` FOREIGN KEY (`guru_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `kelas_siswa`
--
ALTER TABLE `kelas_siswa`
  ADD CONSTRAINT `kelas_siswa_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `kelas_siswa_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pertemuans`
--
ALTER TABLE `pertemuans`
  ADD CONSTRAINT `pertemuans_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
