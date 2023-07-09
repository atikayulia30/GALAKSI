-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 26, 2023 at 10:02 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fotomedia`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin', '$2y$10$beo2ZIbljDhW25TVAICO7eOZRNH9pHVXpREdOj6RrIUT7R1ih7XZa', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `hapus` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`, `hapus`, `created_at`, `updated_at`) VALUES
(3, '1 A', 0, '2023-05-01 03:46:27', '2023-05-01 03:46:27'),
(4, '2 A', 0, '2023-05-11 23:22:06', '2023-05-11 23:22:06'),
(5, '3 A', 0, '2023-05-11 23:22:20', '2023-05-11 23:22:20');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id` int(12) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `komentar` text NOT NULL,
  `id_video` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id`, `nama`, `komentar`, `id_video`) VALUES
(1, 'anjay', 'tes komentar', 3),
(2, 'anjay', 'kontol', 3);

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_mapel` varchar(255) NOT NULL,
  `hapus` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`id`, `nama_mapel`, `hapus`, `created_at`, `updated_at`) VALUES
(1, 'IPA', 0, '2023-05-01 04:03:37', '2023-05-01 04:09:36'),
(2, 'Matematika', 0, '2023-05-11 23:23:52', '2023-05-11 23:23:52'),
(3, 'Bahasa Indonesia', 0, '2023-05-11 23:24:03', '2023-05-11 23:24:03');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_03_04_124046_admin', 1),
(6, '2023_03_05_004659_kategori', 1),
(7, '2023_03_05_004707_vendor', 1),
(8, '2023_03_05_005438_pesanan', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_vendor` int(11) NOT NULL,
  `waktu_awal` datetime NOT NULL,
  `waktu_akhir` datetime NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id`, `id_user`, `id_vendor`, `waktu_awal`, `waktu_akhir`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2023-03-06 00:10:13', '2023-03-07 00:10:15', 'Keterangan', '2023-03-02 12:00:00', '2023-03-02 12:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `kelas`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'dony', 'dony@gmail.com', '', NULL, '$2y$10$kWoWQtPEbAwilkHxBkiPLeX8MY5w4lyXVT9kxWGl5WFCYaBE0TgPC', NULL, NULL, NULL),
(2, 'anjay', 'a@gmail.com', '3', NULL, '$2y$10$kH.xu6OYfiaV3T/QdxU8JuA55bsYxon9Pft9h6XMtykNAckfrp4fq', NULL, NULL, NULL),
(3, 'ardi', 'ardi@gmail.com', '3', NULL, '$2y$10$AbCVfPHQJNJEkEq1wqbqhOUmIDQUVdzy5bySLA.f5YIma5xk79DQe', NULL, NULL, NULL),
(4, 'bogel', 'bogel@gmail.com', '3', NULL, '$2y$10$eyTIFQnSmVb5Aw80sfAGhedeKY3QmyABNCvd.gMWLPPhuH.3T7fAq', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_vendor` varchar(255) NOT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `no_telp` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `paket` text DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `hapus` int(11) NOT NULL DEFAULT 0,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `like` int(20) NOT NULL,
  `harga` varchar(255) DEFAULT NULL,
  `jenis_vendor` int(11) DEFAULT 1,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `asal` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`id`, `nama_vendor`, `alamat`, `no_telp`, `foto`, `paket`, `id_kategori`, `hapus`, `created_at`, `updated_at`, `username`, `password`, `like`, `harga`, `jenis_vendor`, `facebook`, `instagram`, `asal`) VALUES
(1, 'Vendor', 'Jl Sawojajar 11', '0812314123', '1678040605_pexels-trung-nguyen-1751682.jpg', 'Selamat datang di Foto Wedding Indonesia, kami adalah vendor foto wedding yang siap membantu Anda untuk mengabadikan momen-momen terindah dalam hidup Anda. Dengan tim fotografer dan editor yang berpengalaman, kami menjamin hasil karya yang berkualitas tinggi dan memuaskan hati klien.\r\n\r\nKami menawarkan paket layanan yang lengkap, mulai dari pengambilan gambar pre-wedding, dokumentasi acara pernikahan, hingga pembuatan album foto. Kami juga dapat menyesuaikan gaya fotografi sesuai dengan keinginan klien, baik itu gaya klasik atau modern.\r\n\r\nBerbagai testimoni dari klien kami yang puas dapat dilihat di website kami, sehingga Anda dapat melihat langsung kualitas layanan yang kami berikan. Selain itu, kami juga menawarkan harga yang kompetitif dan promo khusus untuk memudahkan Anda dalam memilih layanan yang sesuai dengan kebutuhan Anda.', 1, 0, '2023-03-05 11:52:34', '2023-03-22 13:19:00', 'vendor', '$2y$10$sWXADkUkIUVTht8E4xllgOUXQv.B0V2dj7xfAczP/0yXeKwLDDFU2', 1, '200000', 1, 'facebook', 'instagram', 'Malang'),
(2, 'Vendor Wedding', 'Jl Sawojajar 11', '0812314123', 'wedding1.jpg', 'Selamat datang di Foto Wedding Indonesia, kami adalah vendor foto wedding yang siap membantu Anda untuk mengabadikan momen-momen terindah dalam hidup Anda. Dengan tim fotografer dan editor yang berpengalaman, kami menjamin hasil karya yang berkualitas tinggi dan memuaskan hati klien.\n\nKami menawarkan paket layanan yang lengkap, mulai dari pengambilan gambar pre-wedding, dokumentasi acara pernikahan, hingga pembuatan album foto. Kami juga dapat menyesuaikan gaya fotografi sesuai dengan keinginan klien, baik itu gaya klasik atau modern.\n\nBerbagai testimoni dari klien kami yang puas dapat dilihat di website kami, sehingga Anda dapat melihat langsung kualitas layanan yang kami berikan. Selain itu, kami juga menawarkan harga yang kompetitif dan promo khusus untuk memudahkan Anda dalam memilih layanan yang sesuai dengan kebutuhan Anda.', 1, 0, '2023-03-05 11:52:34', '2023-03-05 13:37:58', 'vendor2', '$2y$10$teeHH51iibdYjifStyybqu.jvAx0fnZ1rhpImgquHHUl9jBMys8Q6', 0, '2000000', 2, '', '', ''),
(3, 'Vendor Wedding 1', 'alamat', '08123412931', 'wedding3.jpg', 'Selamat datang di Foto Wedding Indonesia, kami adalah vendor foto wedding yang siap membantu Anda untuk mengabadikan momen-momen terindah dalam hidup Anda. Dengan tim fotografer dan editor yang berpengalaman, kami menjamin hasil karya yang berkualitas tinggi dan memuaskan hati klien.\n\nKami menawarkan paket layanan yang lengkap, mulai dari pengambilan gambar pre-wedding, dokumentasi acara pernikahan, hingga pembuatan album foto. Kami juga dapat menyesuaikan gaya fotografi sesuai dengan keinginan klien, baik itu gaya klasik atau modern.\n\nBerbagai testimoni dari klien kami yang puas dapat dilihat di website kami, sehingga Anda dapat melihat langsung kualitas layanan yang kami berikan. Selain itu, kami juga menawarkan harga yang kompetitif dan promo khusus untuk memudahkan Anda dalam memilih layanan yang sesuai dengan kebutuhan Anda.', 1, 0, '2023-03-14 11:22:28', '2023-03-16 12:45:22', 'vendor3', '$2y$10$TmSerRz6V/vDpvXTYE3l..FqPoGlcwfozIeCVWYpCoWn7X4G2Sh..', 0, '2000000', 2, '1facebook', '1instagram', 'malang1');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_slider`
--

CREATE TABLE `vendor_slider` (
  `id` int(11) NOT NULL,
  `id_vendor` int(11) DEFAULT NULL,
  `slider` varchar(255) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vendor_slider`
--

INSERT INTO `vendor_slider` (`id`, `id_vendor`, `slider`, `updated_at`, `created_at`) VALUES
(4, 1, 'wedding1.jpg', '2023-03-14 13:20:59', '2023-03-14 13:20:59'),
(5, 1, 'wedding3.jpg', '2023-03-15 05:15:16', '2023-03-15 05:15:16'),
(6, 1, '1678984511_1678025075_pexels-trung-nguyen-1751682.jpg', '2023-03-16 16:35:11', '2023-03-16 16:35:11'),
(7, 1, '1678984558_wedding.jpg', '2023-03-16 16:35:58', '2023-03-16 16:35:58'),
(8, 18, '1679485385_ultah.jpg', '2023-03-22 11:43:05', '2023-03-22 11:43:05');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `video` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `hapus` int(11) NOT NULL DEFAULT 0,
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id`, `judul`, `id_mapel`, `video`, `gambar`, `id_kategori`, `deskripsi`, `hapus`, `created_at`, `updated_at`) VALUES
(3, 'Lorem Ipsum', 1, '1683851145_181004_10_LABORATORIES-SCIENCE_12 (1).mp4', '1687173654_IMG_1782_B11_E8.jpg', 3, 'Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 0, '2023-05-04 02:23:43', '2023-05-12 00:25:42'),
(4, 'coba', 1, '1683167819_181004_10_LABORATORIES-SCIENCE_12 (1).mp4', '', 2, 'Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 0, '2023-05-04 02:36:59', '2023-05-04 02:36:59'),
(5, 'Lorem Ipsum', 1, '1683872784_181004_10_LABORATORIES-SCIENCE_12 (1).mp4', '1687173654_IMG_1782_B11_E8.jpg', 3, 'Lorem Ipsum&amp;nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 0, '2023-05-12 06:26:24', '2023-05-12 06:27:49'),
(7, 'lorem', 1, '1687173654_big_buck_bunny_720p_1mb.mp4', '1687173654_IMG_1782_B11_E8.jpg', 4, 'oooooiiiii', 0, '2023-06-19 11:20:54', '2023-06-19 11:20:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_username_unique` (`username`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor_slider`
--
ALTER TABLE `vendor_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `vendor_slider`
--
ALTER TABLE `vendor_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
