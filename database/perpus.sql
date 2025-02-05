-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for ujiankejuruan
CREATE DATABASE IF NOT EXISTS `ujiankejuruan` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `ujiankejuruan`;

-- Dumping structure for table ujiankejuruan.admins
CREATE TABLE IF NOT EXISTS `admins` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('petugas','admin') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ujiankejuruan.admins: ~2 rows (approximately)
INSERT INTO `admins` (`id`, `nama`, `username`, `password`, `role`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'admin', '$2y$12$kU3WOKfwIC9.KvqTNdYFSOxEpEbBItZmiFxVvC8VnjDm0UjkquxeK', 'admin', '2025-02-02 21:22:29', '2025-02-02 21:22:29'),
	(4, 'admin2', 'admin2', '$2y$12$f7/X6G8YaDtLtCSclVtRbu8AQRpGkc6woAb20I.AxZVuyyqoIp.1G', 'petugas', '2025-02-04 00:32:17', '2025-02-04 00:32:17'),
	(5, 'petugas1', 'petugas1', '$2y$12$EcSS4mxII2j0s7A9V84Ksu94Mx8yOQ.PbptHce.Kdu1k9CE2WinUC', 'petugas', '2025-02-04 20:01:04', '2025-02-04 20:01:04');

-- Dumping structure for table ujiankejuruan.bukus
CREATE TABLE IF NOT EXISTS `bukus` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sampul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penulis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penerbit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_terbit` date NOT NULL,
  `kategori_id` bigint unsigned NOT NULL,
  `status` enum('dipinjam','tidak') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bukus_kategori_id_foreign` (`kategori_id`),
  CONSTRAINT `bukus_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategoris` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ujiankejuruan.bukus: ~3 rows (approximately)
INSERT INTO `bukus` (`id`, `slug`, `sampul`, `file`, `judul`, `penulis`, `penerbit`, `tahun_terbit`, `kategori_id`, `status`, `created_at`, `updated_at`) VALUES
	(2, 'sadefasdf-ubah-judulafafe', 'ynlP4feXbLxflle3egL7HESLkANXeHTPMqsmDtAc.jpg', 'pmIySI7VWDTQpzCJJVu46tiTf6Bywt0I2vfGdtsf.jpg', 'sadefasdf ubah judulafafe', 'aefefadefd', 'aefefadefd', '2025-02-27', 2, 'tidak', '2025-02-02 23:07:27', '2025-02-02 23:39:23'),
	(5, 'aefaf', 'BIppx0uuDmWeYn9MEeRH0j1QGMSCSG8ybG71baJS.jpg', NULL, 'aefaf', 'ageeg', 'aeg', '2025-02-08', 2, 'tidak', '2025-02-02 23:41:29', '2025-02-02 23:41:29'),
	(6, 'afeaf', 'I612z9lSd4WVh2UgGppSI9ZBYJPg2BF5mtliTwI1.jpg', NULL, 'afeaf', 'aefgjhfjgfgj edit penulis', 'aefgjhfjgfgj', '2025-03-01', 3, 'tidak', '2025-02-02 23:41:48', '2025-02-03 00:23:01'),
	(8, 'dragon-ball', 'ArlbrUSbSCMaHOUCPiC4cNFvXemZbhHJkGQqr6ye.jpg', 'AaDLweuDIkZUpYWDImY1aLAiHi8wHndWIJxuChtI.pdf', 'Dragon ball', 'Siapa', 'Tidak Tahu', '2025-02-04', 3, 'tidak', '2025-02-04 01:47:58', '2025-02-04 01:47:58'),
	(9, 'demon-slayer', 'Y7Aoq5z8YHf7sI4Spg881PNYsUPrBS110tjgnIlf.jpg', '63RSQmnbVIcWzgKF6EWV4nu5PsuRk0N1YYfhtRKv.pdf', 'Demon Slayer', 'aefaef', 'aefaf', '2017-03-17', 2, 'tidak', '2025-02-04 20:12:10', '2025-02-04 20:12:10');

-- Dumping structure for table ujiankejuruan.cache
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ujiankejuruan.cache: ~0 rows (approximately)

-- Dumping structure for table ujiankejuruan.cache_locks
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ujiankejuruan.cache_locks: ~0 rows (approximately)

-- Dumping structure for table ujiankejuruan.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ujiankejuruan.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table ujiankejuruan.favorits
CREATE TABLE IF NOT EXISTS `favorits` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `buku_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `favorits_user_id_foreign` (`user_id`),
  KEY `favorits_buku_id_foreign` (`buku_id`),
  CONSTRAINT `favorits_buku_id_foreign` FOREIGN KEY (`buku_id`) REFERENCES `bukus` (`id`) ON DELETE CASCADE,
  CONSTRAINT `favorits_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ujiankejuruan.favorits: ~3 rows (approximately)
INSERT INTO `favorits` (`id`, `user_id`, `buku_id`, `created_at`, `updated_at`) VALUES
	(6, 1, 6, '2025-02-03 20:31:23', '2025-02-03 20:31:23'),
	(13, 3, 8, '2025-02-04 18:10:09', '2025-02-04 18:10:09');

-- Dumping structure for table ujiankejuruan.jobs
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ujiankejuruan.jobs: ~0 rows (approximately)

-- Dumping structure for table ujiankejuruan.job_batches
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ujiankejuruan.job_batches: ~0 rows (approximately)

-- Dumping structure for table ujiankejuruan.kategoris
CREATE TABLE IF NOT EXISTS `kategoris` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ujiankejuruan.kategoris: ~2 rows (approximately)
INSERT INTO `kategoris` (`id`, `nama`, `created_at`, `updated_at`) VALUES
	(2, 'daefef', '2025-02-02 21:42:35', '2025-02-02 21:42:35'),
	(3, 'aefafe', '2025-02-02 21:42:41', '2025-02-02 21:42:41');

-- Dumping structure for table ujiankejuruan.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ujiankejuruan.migrations: ~8 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_users_table', 1),
	(2, '0001_01_01_000001_create_cache_table', 1),
	(3, '0001_01_01_000002_create_jobs_table', 1),
	(4, '2025_02_03_011710_create_admins_table', 1),
	(5, '2025_02_03_040105_create_kategoris_table', 1),
	(6, '2025_02_03_041131_create_bukus_table', 1),
	(8, '2025_02_03_064331_create_peminjamen_table', 2),
	(9, '2025_02_03_082115_create_ulasans_table', 3),
	(10, '2025_02_04_025905_create_favorits_table', 4);

-- Dumping structure for table ujiankejuruan.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ujiankejuruan.password_reset_tokens: ~0 rows (approximately)

-- Dumping structure for table ujiankejuruan.peminjamen
CREATE TABLE IF NOT EXISTS `peminjamen` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  `status` enum('pinjam','kembali') COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `buku_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `peminjamen_user_id_foreign` (`user_id`),
  KEY `peminjamen_buku_id_foreign` (`buku_id`),
  CONSTRAINT `peminjamen_buku_id_foreign` FOREIGN KEY (`buku_id`) REFERENCES `bukus` (`id`) ON DELETE CASCADE,
  CONSTRAINT `peminjamen_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ujiankejuruan.peminjamen: ~25 rows (approximately)
INSERT INTO `peminjamen` (`id`, `tanggal_pinjam`, `tanggal_kembali`, `status`, `user_id`, `buku_id`, `created_at`, `updated_at`) VALUES
	(2, '2025-02-03', '2025-02-04', 'kembali', 1, 5, '2025-02-03 00:36:47', '2025-02-03 18:45:14'),
	(3, '2025-02-04', '2025-02-04', 'kembali', 1, 2, '2025-02-03 18:30:14', '2025-02-03 18:55:44'),
	(4, '2025-02-04', '2025-02-04', 'kembali', 1, 2, '2025-02-03 18:31:00', '2025-02-03 18:55:48'),
	(6, '2025-02-04', '2025-02-04', 'kembali', 1, 6, '2025-02-03 18:56:01', '2025-02-03 18:56:26'),
	(7, '2025-02-04', '2025-02-04', 'kembali', 1, 2, '2025-02-03 19:10:33', '2025-02-03 19:52:19'),
	(9, '2025-02-04', '2025-02-04', 'kembali', 1, 6, '2025-02-03 19:26:09', '2025-02-04 00:46:28'),
	(10, '2025-02-04', '2025-02-04', 'kembali', 1, 2, '2025-02-03 19:26:11', '2025-02-04 00:52:18'),
	(11, '2025-02-04', NULL, 'pinjam', 1, 5, '2025-02-03 19:26:15', '2025-02-03 19:26:15'),
	(12, '2025-02-04', '2025-02-04', 'kembali', 1, 2, '2025-02-03 19:52:01', '2025-02-04 00:52:25'),
	(13, '2025-02-04', '2025-02-04', 'kembali', 2, 2, '2025-02-03 23:38:18', '2025-02-04 00:52:51'),
	(15, '2025-02-04', '2025-02-04', 'kembali', 2, 2, '2025-02-04 01:07:23', '2025-02-04 01:14:21'),
	(16, '2025-02-04', '2025-02-04', 'kembali', 2, 2, '2025-02-04 01:11:42', '2025-02-04 01:14:24'),
	(17, '2025-02-04', '2025-02-04', 'kembali', 2, 2, '2025-02-04 01:13:34', '2025-02-04 01:14:29'),
	(18, '2025-02-04', '2025-02-04', 'kembali', 2, 2, '2025-02-04 01:13:34', '2025-02-04 01:14:33'),
	(19, '2025-02-04', '2025-02-04', 'kembali', 2, 2, '2025-02-04 01:13:36', '2025-02-04 01:17:27'),
	(20, '2025-02-04', '2025-02-04', 'kembali', 2, 2, '2025-02-04 01:13:37', '2025-02-04 01:17:30'),
	(21, '2025-02-04', '2025-02-04', 'kembali', 2, 2, '2025-02-04 01:13:38', '2025-02-04 01:17:33'),
	(22, '2025-02-04', '2025-02-04', 'kembali', 2, 2, '2025-02-04 01:13:39', '2025-02-04 01:17:37'),
	(23, '2025-02-04', '2025-02-05', 'kembali', 2, 2, '2025-02-04 01:27:54', '2025-02-04 19:23:14'),
	(25, '2025-02-04', '2025-02-05', 'kembali', 2, 8, '2025-02-04 01:48:07', '2025-02-04 19:23:17'),
	(26, '2025-02-05', '2025-02-05', 'kembali', 3, 6, '2025-02-04 18:07:41', '2025-02-04 18:07:58'),
	(27, '2025-02-05', NULL, 'pinjam', 3, 8, '2025-02-04 18:08:09', '2025-02-04 18:08:09'),
	(29, '2025-02-05', '2025-02-05', 'kembali', 2, 2, '2025-02-04 19:24:27', '2025-02-04 19:24:46'),
	(30, '2025-02-05', NULL, 'pinjam', 1, 2, '2025-02-04 20:45:50', '2025-02-04 20:45:50'),
	(31, '2025-02-05', NULL, 'pinjam', 1, 9, '2025-02-05 03:02:21', '2025-02-05 03:02:21');

-- Dumping structure for table ujiankejuruan.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ujiankejuruan.sessions: ~1 rows (approximately)
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('JkVhC3LsgAbTaGCf1ybNxwVWh8Yhwup8cyBk9TDv', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36 Edg/132.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoid2VGdkZxa3Ftc3UxY2l5OWp2OXFkY0U2UGVoYlBjSFNzNEtkUmhORSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zaXN3YS9kYWZ0YXJidWt1LzUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1738749819);

-- Dumping structure for table ujiankejuruan.ulasans
CREATE TABLE IF NOT EXISTS `ulasans` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `buku_id` bigint unsigned NOT NULL,
  `rating` int NOT NULL,
  `ulasan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ulasans_user_id_foreign` (`user_id`),
  KEY `ulasans_buku_id_foreign` (`buku_id`),
  CONSTRAINT `ulasans_buku_id_foreign` FOREIGN KEY (`buku_id`) REFERENCES `bukus` (`id`) ON DELETE CASCADE,
  CONSTRAINT `ulasans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ujiankejuruan.ulasans: ~4 rows (approximately)
INSERT INTO `ulasans` (`id`, `user_id`, `buku_id`, `rating`, `ulasan`, `created_at`, `updated_at`) VALUES
	(3, 1, 2, 5, 'afefef', '2025-02-03 20:59:55', '2025-02-03 20:59:55'),
	(4, 1, 2, 4, 'aefeaf', '2025-02-03 21:00:48', '2025-02-03 21:00:48'),
	(6, 1, 2, 5, 'afefaef', '2025-02-03 21:08:28', '2025-02-03 21:08:28'),
	(8, 2, 5, 3, 'mantap', '2025-02-04 01:38:01', '2025-02-04 01:38:01');

-- Dumping structure for table ujiankejuruan.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ujiankejuruan.users: ~1 rows (approximately)
INSERT INTO `users` (`id`, `nama`, `email`, `email_verified_at`, `password`, `remember_token`, `alamat`, `created_at`, `updated_at`) VALUES
	(1, 'afan', 'afan@gmail.com', NULL, '$2y$12$KVl43wePmyfMsmd.JkhQ/.Rcjx47kQs3nqMwYjkVapkd8JvSY4v7q', NULL, 'banjar agung kajroan', '2025-02-02 21:22:28', '2025-02-02 21:22:28'),
	(2, 'afan 12341', 'coba1234@gmail.com', NULL, '$2y$12$O4VZJftHWabm4p8oyzYthuzKa3JRN9munQOelHRyOiUMV1vrQgWlG', NULL, 'banjaragung-hohoho-hoohoho', '2025-02-03 21:50:20', '2025-02-03 21:50:20'),
	(3, 'Khoirul Afwan', 'afan33222@gmail.com', NULL, '$2y$12$wGDKjWAMXfyTF9NzTgJzF.GWoYIEhnABBz5CzHgUvkbIGc8E8o6ce', NULL, 'Banjar agung kajoran', '2025-02-04 18:06:50', '2025-02-04 18:06:50'),
	(4, 'finatest', 'finaltest@gmail.com', NULL, '$2y$12$K8cICVMjgC3RYadxst5w9uTK4/ogV4fjcnY4S06JNo/fwBvFZa0ku', NULL, 'banjar agun kajoran', '2025-02-04 19:54:00', '2025-02-04 19:54:00');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
