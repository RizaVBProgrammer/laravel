-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Apr 2024 pada 05.06
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tugas_akhir`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_perusahaan` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(255) NOT NULL,
  `no_po` varchar(255) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `no_invoice` varchar(255) NOT NULL,
  `term` varchar(255) NOT NULL,
  `produk` varchar(255) NOT NULL,
  `nama_kapal` varchar(255) NOT NULL,
  `wilayah_pengisian` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `harga` double NOT NULL,
  `harga_dasar` double NOT NULL,
  `ppn` double NOT NULL,
  `jumlah_harga_dasar` double NOT NULL,
  `jumlah_ppn` double NOT NULL,
  `total` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `invoices`
--

INSERT INTO `invoices` (`id`, `nama_perusahaan`, `alamat`, `no_telp`, `no_po`, `tanggal`, `no_invoice`, `term`, `produk`, `nama_kapal`, `wilayah_pengisian`, `qty`, `satuan`, `harga`, `harga_dasar`, `ppn`, `jumlah_harga_dasar`, `jumlah_ppn`, `total`, `created_at`, `updated_at`) VALUES
(2, 'PT. PELAYARAN KARTIKA SAMUDRA ADIJAYA', 'Kom. Ruko Balikpapan Regency V3 No.02RT. 43 RW.000 Sepinggan Baru', '08989811425', '-', '2024-03-03', '001/PT-AKPS/03/24', 'Cash', 'BIO SOLAR', 'AWB. WINTER GREEN', 'Balikpapan', 10000, 'Liter', 141780000, 14178, 1559, 141780000, 15595800, 157375800, '2024-03-03 04:05:16', '2024-03-03 04:32:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_02_19_113548_create_purchase_orders_table', 2),
(7, '2024_03_03_060614_create_invoices_table', 3),
(8, '2024_03_03_114312_create_surat_jalans_table', 4),
(9, '2024_03_27_032545_create_notifications_table', 5),
(16, '2024_04_04_032452_create_pengeluaran_bbms_table', 6),
(17, '2024_04_04_032556_create_pengeluaran_operasional_table', 7),
(18, '2024_04_04_032936_change_pengeluaran_operasinoal_to_pengeluaran_operasionals_table', 8),
(19, '2024_04_04_033322_drop_tabel_pengeluaran_bbms', 9),
(20, '2024_04_04_033338_drop_tabel_pengeluaran_operasionals', 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('admin@white.com', '$2y$12$qZDUp6VHuVvrwNKvlNoiM.cYpbFL0lheJXGn8PqqQuOoj4JgOrj/.', '2024-02-20 07:19:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengeluaran_bbm`
--

CREATE TABLE `pengeluaran_bbm` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_perusahaan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `no_invoice` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `produk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `wilayah_pengisian` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `satuan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` double NOT NULL,
  `total` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengeluaran_bbm`
--

INSERT INTO `pengeluaran_bbm` (`id`, `nama_perusahaan`, `tanggal`, `no_invoice`, `produk`, `wilayah_pengisian`, `qty`, `satuan`, `harga`, `total`, `created_at`, `updated_at`) VALUES
(1, 'sdsds', '2024-04-01', 'sdsd', 'sdsdsd', 'sdsdsd', 1, 'sdsdsd', 2000, 2000, '2024-04-22 11:04:20', '2024-04-22 11:00:56'),
(3, 'Perusahaan X', '2024-04-22', 'sdsd', 'sd', 'Medan', 12, 'Liter', 1222, 1222, '2024-04-22 04:04:53', '2024-04-22 04:04:53'),
(4, 'sdsd', '2024-04-22', 'sdsd', 'sdsdsd', 'Medan', 12, 'Liter', 1222, 1222, '2024-04-22 04:19:26', '2024-04-22 04:19:26'),
(5, 'sdsd', '2024-04-22', 'sdsd', 'sdsdsd', 'Medan', 12, 'MegaLiter', 1222, 1222, '2024-04-22 04:19:48', '2024-04-22 04:19:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengeluaran_biaya_operasional`
--

CREATE TABLE `pengeluaran_biaya_operasional` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` text DEFAULT NULL,
  `jumlah` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengeluaran_biaya_operasional`
--

INSERT INTO `pengeluaran_biaya_operasional` (`id`, `tanggal`, `keterangan`, `jumlah`, `created_at`, `updated_at`) VALUES
(1, '2024-04-10', 'sdsd', 12.00, '2024-04-22 14:52:22', '2024-04-30 14:52:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `purchase_orders`
--

CREATE TABLE `purchase_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_perusahaan` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `file` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Proses',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `purchase_orders`
--

INSERT INTO `purchase_orders` (`id`, `nama_perusahaan`, `user_id`, `file`, `status`, `created_at`, `updated_at`) VALUES
(1, 'PT. Alisha Karunia Perdana', 1, '1708405624.pdf', 'Selesai', '2024-02-19 22:07:04', '2024-03-03 05:49:44'),
(2, 'PT. Alisha Karunia Perdana', 3, '1709470035.pdf', 'Batal', '2024-03-03 05:47:15', '2024-03-03 05:49:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_jalans`
--

CREATE TABLE `surat_jalans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kepada` varchar(255) NOT NULL,
  `up` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `no_surat` varchar(255) NOT NULL,
  `no_po` varchar(255) NOT NULL,
  `tujuan` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `no_telp` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `nama_transportir` varchar(255) NOT NULL,
  `segel_atas` varchar(255) NOT NULL,
  `segel_bawah` varchar(255) NOT NULL,
  `plat` varchar(255) NOT NULL,
  `pengirim` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `surat_jalans`
--

INSERT INTO `surat_jalans` (`id`, `kepada`, `up`, `tanggal`, `no_surat`, `no_po`, `tujuan`, `contact`, `no_telp`, `qty`, `jenis`, `nama_transportir`, `segel_atas`, `segel_bawah`, `plat`, `pengirim`, `created_at`, `updated_at`) VALUES
(1, 'Azzzxx', 'B', '2024-03-03', '2', '3', 'Jakarta', '08123', '08989811425', 55, 'Kayu', 'GG', '8', '9', 'G 23', 'Ax', '2024-03-03 05:01:35', '2024-03-03 05:54:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `role` varchar(255) DEFAULT 'CUSTOMER',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Admin Admin', 'admin@gmail.com', '2024-02-08 06:29:35', '$2y$10$GMkf8t8U4jJ4GPcfsX9UMOIHuJjW7xhSucC9I9myPa6F68XRPjvJ.', NULL, 'ADMIN', '2024-02-08 06:29:36', '2024-02-08 06:29:36'),
(3, 'Customer', 'customer@gmail.com', NULL, '$2y$10$mDenlne5MMn7h0AfBJS.OexhzgdWjHzRBR2rvEWpKWLL/WxvFmdl.', NULL, 'CUSTOMER', '2024-03-03 13:02:15', NULL),
(4, 'Direktur', 'direktur@gmail.com', NULL, '$2y$10$VkpIJUyFyKXOSKaAd68AUunvb8FDMdEaWfFN0QCsQhH44dAL0TCLe', NULL, 'DIREKTUR', '2024-03-03 13:02:18', NULL),
(5, 'x', 'xx@gmail.com', NULL, '$2y$12$9JcLoZArlSni7sQc/aQTPemUcRew8alLNuRafASKWTjtg9hxEu80S', NULL, 'CUSTOMER', '2024-03-03 06:00:13', '2024-03-03 06:00:13'),
(6, 'user', 'user@gmail.com', NULL, '$2y$12$PaA3HralxttuZeMGY.DU6.4QVOv1OIvntAhNgAJIklwlEMTvHRsXu', NULL, 'CUSTOMER', '2024-03-27 07:05:27', '2024-03-27 07:05:27'),
(7, 'Julia Astrid', 'juliaastrid@gmail.com', NULL, '$2y$12$OQSNg7rLD2QbRhAlfw4X5O9tgE2sqBL3WDxadm6avRQIyiZMJfAsm', NULL, 'KEUANGAN', '2024-04-03 09:15:13', '2024-04-03 09:27:23'),
(8, 'keuangan', 'keuangan@gmail.com', NULL, '$2y$12$9vNVvpVd9fyRVApYfwPmQ.QqFHrYtjpqkahuTuOa5RnMh0c5I2W.2', NULL, 'DIREKTUR', '2024-04-03 09:30:46', '2024-04-03 09:45:06');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `pengeluaran_bbm`
--
ALTER TABLE `pengeluaran_bbm`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengeluaran_biaya_operasional`
--
ALTER TABLE `pengeluaran_biaya_operasional`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `purchase_orders`
--
ALTER TABLE `purchase_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `surat_jalans`
--
ALTER TABLE `surat_jalans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pengeluaran_bbm`
--
ALTER TABLE `pengeluaran_bbm`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `pengeluaran_biaya_operasional`
--
ALTER TABLE `pengeluaran_biaya_operasional`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `purchase_orders`
--
ALTER TABLE `purchase_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `surat_jalans`
--
ALTER TABLE `surat_jalans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
