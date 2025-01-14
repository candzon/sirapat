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

-- Dumping structure for table sirapat_db.cache
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sirapat_db.cache: ~0 rows (approximately)

-- Dumping structure for table sirapat_db.cache_locks
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sirapat_db.cache_locks: ~0 rows (approximately)

-- Dumping structure for table sirapat_db.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sirapat_db.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table sirapat_db.jenis_rapats
CREATE TABLE IF NOT EXISTS `jenis_rapats` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sirapat_db.jenis_rapats: ~2 rows (approximately)
REPLACE INTO `jenis_rapats` (`id`, `nama`, `deskripsi`, `created_at`, `updated_at`) VALUES
	(3, 'Inpa', 'Coba tok', '2025-01-02 00:40:57', '2025-01-02 00:40:57'),
	(4, 'jkk', 'treyyy', '2025-01-09 23:49:41', '2025-01-09 23:49:41');

-- Dumping structure for table sirapat_db.jobs
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sirapat_db.jobs: ~0 rows (approximately)

-- Dumping structure for table sirapat_db.job_batches
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sirapat_db.job_batches: ~0 rows (approximately)

-- Dumping structure for table sirapat_db.kehadirans
CREATE TABLE IF NOT EXISTS `kehadirans` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `rapat_id` bigint unsigned NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FKR` (`rapat_id`),
  CONSTRAINT `FKR` FOREIGN KEY (`rapat_id`) REFERENCES `rapats` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sirapat_db.kehadirans: ~3 rows (approximately)
REPLACE INTO `kehadirans` (`id`, `rapat_id`, `nama`, `keterangan`, `tanggal`, `created_at`, `updated_at`) VALUES
	(9, 6, 'intan', 'hadir', '2025-01-13', '2025-01-13 15:58:29', '2025-01-13 22:35:54'),
	(10, 6, 'intan', 'hadir', '2025-01-13', '2025-01-13 15:59:23', '2025-01-13 17:25:47'),
	(11, 6, 'aksa junaidi', 'belum hadir', '2025-01-13', '2025-01-13 16:01:38', '2025-01-13 16:01:38'),
	(12, 6, 'anggraini', 'belum hadir', '2025-01-14', '2025-01-13 17:40:43', '2025-01-13 17:40:43');

-- Dumping structure for table sirapat_db.lampirans
CREATE TABLE IF NOT EXISTS `lampirans` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `rapat_id` bigint unsigned NOT NULL,
  `nama_file` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_file` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ukuran` int NOT NULL,
  `path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lampirans_rapat_id_foreign` (`rapat_id`),
  CONSTRAINT `lampirans_rapat_id_foreign` FOREIGN KEY (`rapat_id`) REFERENCES `rapats` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sirapat_db.lampirans: ~0 rows (approximately)

-- Dumping structure for table sirapat_db.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sirapat_db.migrations: ~12 rows (approximately)
REPLACE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000001_create_cache_table', 1),
	(2, '0001_01_01_000002_create_jobs_table', 1),
	(3, '2024_12_22_134955_create_users_table', 1),
	(4, '2024_12_22_134956_create_opds_table', 1),
	(5, '2024_12_22_134957_create_jenis_rapats_table', 1),
	(6, '2024_12_22_134958_create_rapats_table', 1),
	(7, '2024_12_22_134959_create_notulens_table', 1),
	(8, '2024_12_22_134959_create_peserta_rapats_table', 1),
	(9, '2024_12_22_135000_create_undangans_table', 1),
	(10, '2024_12_22_135001_create_lampirans_table', 1),
	(11, '2024_12_22_140126_create_sessions_table', 1),
	(12, '2025_01_07_040508_create_kehadirans_table', 2);

-- Dumping structure for table sirapat_db.notulens
CREATE TABLE IF NOT EXISTS `notulens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `rapat_id` bigint unsigned NOT NULL,
  `notulis_id` bigint unsigned NOT NULL,
  `isi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('draft','selesai') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'draft',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notulens_rapat_id_foreign` (`rapat_id`),
  KEY `notulens_notulis_id_foreign` (`notulis_id`),
  CONSTRAINT `notulens_notulis_id_foreign` FOREIGN KEY (`notulis_id`) REFERENCES `users` (`id`),
  CONSTRAINT `notulens_rapat_id_foreign` FOREIGN KEY (`rapat_id`) REFERENCES `rapats` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sirapat_db.notulens: ~1 rows (approximately)
REPLACE INTO `notulens` (`id`, `rapat_id`, `notulis_id`, `isi`, `status`, `created_at`, `updated_at`) VALUES
	(1, 6, 4, 'AAAAAAAA HALLOOOO', 'selesai', '2025-01-11 22:41:28', '2025-01-12 03:09:57'),
	(4, 8, 2, 'test notulensi aktivitas terbaru', 'draft', '2025-01-13 19:10:55', '2025-01-13 19:10:55');

-- Dumping structure for table sirapat_db.opds
CREATE TABLE IF NOT EXISTS `opds` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kepala` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `opds_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sirapat_db.opds: ~4 rows (approximately)
REPLACE INTO `opds` (`id`, `nama`, `kepala`, `email`, `telepon`, `alamat`, `is_active`, `created_at`, `updated_at`) VALUES
	(1, 'Dinas Pertanian', 'mm', 'jjjlll@ioj.bi', '0992843664', 'aaaaaa', 0, '2025-01-09 23:51:43', '2025-01-13 00:20:30'),
	(3, 'Dinas Lingkungan Hidup', 'dwdwd', 'dddqd@fdes.g', '0992843664', 'aaawsdwqdwd', 0, '2025-01-12 01:41:14', '2025-01-12 01:58:47'),
	(8, 'Dinas Pendidikan', 'Wildan', 'wildan@gmail.com', '62856736237', 'Jl kebajikan', 1, '2025-01-12 07:05:47', '2025-01-12 07:05:47');

-- Dumping structure for table sirapat_db.peserta_rapats
CREATE TABLE IF NOT EXISTS `peserta_rapats` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `rapat_id` bigint unsigned NOT NULL,
  `opd_id` bigint unsigned NOT NULL,
  `status_kehadiran` enum('belum_hadir','hadir','tidak_hadir') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'belum_hadir',
  `waktu_hadir` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `peserta_rapats_rapat_id_foreign` (`rapat_id`),
  KEY `peserta_rapats_opd_id_foreign` (`opd_id`),
  CONSTRAINT `peserta_rapats_opd_id_foreign` FOREIGN KEY (`opd_id`) REFERENCES `opds` (`id`),
  CONSTRAINT `peserta_rapats_rapat_id_foreign` FOREIGN KEY (`rapat_id`) REFERENCES `rapats` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sirapat_db.peserta_rapats: ~0 rows (approximately)

-- Dumping structure for table sirapat_db.rapats
CREATE TABLE IF NOT EXISTS `rapats` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `tempat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_rapat_id` bigint unsigned NOT NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` enum('draft','terjadwal','berlangsung','selesai','dibatalkan') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'draft',
  `created_by` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `rapats_jenis_rapat_id_foreign` (`jenis_rapat_id`),
  KEY `rapats_created_by_foreign` (`created_by`),
  CONSTRAINT `rapats_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  CONSTRAINT `rapats_jenis_rapat_id_foreign` FOREIGN KEY (`jenis_rapat_id`) REFERENCES `jenis_rapats` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sirapat_db.rapats: ~0 rows (approximately)
REPLACE INTO `rapats` (`id`, `judul`, `tanggal`, `waktu`, `tempat`, `jenis_rapat_id`, `deskripsi`, `status`, `created_by`, `created_at`, `updated_at`) VALUES
	(6, 'ety', '2025-01-14', '07:30:00', 'troji', 4, 'oooiiiii', 'selesai', 4, '2025-01-09 23:49:14', '2025-01-13 18:04:56'),
	(8, 'tttttt', '2025-01-13', '08:47:00', 'ttt', 3, 'tttttt', 'draft', 2, '2025-01-13 18:44:14', '2025-01-13 18:44:14');

-- Dumping structure for table sirapat_db.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sirapat_db.sessions: ~1 rows (approximately)
REPLACE INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('kr8jEMO2M6CKItJJ9xTlhUgh7VFbSp3vpWmYcfXn', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiWHJ5Rk41UnFnbkd5Rlp6M0pPOVh6NXd1aEk1d2ZBc1htaGxmd1lnayI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQwOiJodHRwOi8vNTRiMC0xMTEtOTQtMTk3LTEwLm5ncm9rLWZyZWUuYXBwIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mjt9', 1736832356),
	('ygADRHkdiP9lVw3xR86rpVTTUUsVUwz0Rh0O4EG2', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiTkV4a1NtblBVSEVjTXUwcWd4NUJ2b3BOSWdVNUhyN0t4bXYyb0dsQSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDY6Imh0dHA6Ly81NGIwLTExMS05NC0xOTctMTAubmdyb2stZnJlZS5hcHAvbG9naW4iO31zOjM6InVybCI7YToxOntzOjg6ImludGVuZGVkIjtzOjQwOiJodHRwOi8vNTRiMC0xMTEtOTQtMTk3LTEwLm5ncm9rLWZyZWUuYXBwIjt9fQ==', 1736828399),
	('Z211OtCFQVTachkS38C2RjBnOT2w45Wd0ApiNWSv', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoibElkcVFEZXFOelBUd24wRnI5U1VlODdrcFRaeTAzSG1IVldnYTlWMyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTA6Imh0dHA6Ly81NGIwLTExMS05NC0xOTctMTAubmdyb2stZnJlZS5hcHAva2VoYWRpcmFuIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1736832955);

-- Dumping structure for table sirapat_db.undangans
CREATE TABLE IF NOT EXISTS `undangans` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `rapat_id` bigint unsigned NOT NULL,
  `user_id` int DEFAULT NULL,
  `judul` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `template` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default',
  `status` enum('draft','terkirim','dibatalkan') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'draft',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `undangans_rapat_id_foreign` (`rapat_id`),
  CONSTRAINT `undangans_rapat_id_foreign` FOREIGN KEY (`rapat_id`) REFERENCES `rapats` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sirapat_db.undangans: ~2 rows (approximately)
REPLACE INTO `undangans` (`id`, `rapat_id`, `user_id`, `judul`, `isi`, `template`, `status`, `created_at`, `updated_at`) VALUES
	(1, 6, 8, 'Rapat Koordinasi dan Konsultasi', 'Pertemuan antara kepala sekolah, guru, dan staf dinas untuk membahas kebijakan pendidikan.', 'formal', 'terkirim', '2025-01-12 18:53:15', '2025-01-13 00:24:16'),
	(2, 8, 8, 'Acara Haul Dinas Pendidikan', 'Datang yaa', 'formal', 'terkirim', '2025-01-12 19:05:46', '2025-01-13 22:23:00'),
	(3, 6, 9, 'Acara Talkshow tentang Sampah', 'Jangan lupa datang dihari 1/20/2025', 'casual', 'draft', '2025-01-12 19:52:49', '2025-01-12 20:03:18'),
	(4, 6, 8, 'INVITASI ACARA HAUL DINAS KESEHATAN 2025', 'Kepada Yth., Seluruh Pegawai Di Tempat\r\n\r\nAssalamu\'alaikum warahmatullahi wabarakatuh,\r\n\r\nDengan hormat,\r\n\r\nDalam rangka memperingati Haul Akbar Guru Sekumpul ke-20, kami mengundang Bapak/Ibu untuk hadir dan berpartisipasi dalam acara Haul Dinas Kesehatan 2025 yang akan diselenggarakan pada:\r\nHari/Tanggal: Minggu, 25 Februari 2025 Waktu: Pukul 08.00 - selesai Tempat: Lapangan Banjarbaru, Kalimantan Selatan\r\n\r\nAcara Haul ini bertujuan untuk mengenang jasa-jasa almarhum Guru Sekumpul serta memberikan pelayanan kesehatan kepada para jemaah. Kami telah menyiapkan berbagai kegiatan, termasuk pemeriksaan kesehatan gratis, edukasi kesehatan, dan pengamanan makanan.\r\n\r\nJemaah diharapkan untuk menjaga kebersihan dan kesehatan selama acara. Kami juga menyediakan posko kesehatan dan tenaga medis yang siap memberikan pelayanan secara cepat dan tepat.\r\n\r\nDemikian undangan ini kami sampaikan. Kami sangat mengharapkan kehadiran Bapak/Ibu guna memeriahkan acara ini. Atas perhatian dan kerjasamanya, kami ucapkan terima kasih.\r\n\r\nWassalamu\'alaikum warahmatullahi wabarakatuh.\r\n\r\nHormat kami,\r\n\r\nDinas Kesehatan Provinsi Kalimantan Selatan', 'default', 'draft', '2025-01-13 15:11:09', '2025-01-13 15:11:09'),
	(5, 6, 2, 'Testt undangan admin', 'admin', 'default', 'draft', '2025-01-13 15:33:26', '2025-01-13 15:33:26');

-- Dumping structure for table sirapat_db.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','user','notulis','opd') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sirapat_db.users: ~5 rows (approximately)
REPLACE INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
	(1, 'intan', 'intan@gmail.com', '$2y$12$oRy07QjZSGLm6as9EAwCpu3EK9ZqxnW1Vn1TPEW8FUAaO9YRteDHO', 'user', '2024-12-22 18:55:03', '2024-12-22 18:55:03'),
	(2, 'admin', 'admin@gmail.com', '$2y$12$JFTeU0IsBZUbjEGXHQX5yebCGsAhLrhCzhMyeXRlMTnEco9BrnAd.', 'admin', '2024-12-29 18:14:40', '2024-12-29 18:14:40'),
	(3, 'notulis', 'notulis@gmail.com', '$2y$12$LN8CGGqiszj7iaX.nXc36.TCzCJrQMV/RrOd8m7ZAnw5rfi5YRmRe', 'notulis', '2024-12-29 18:21:38', '2024-12-29 18:21:38'),
	(4, 'want', 'cimplonstreet@gmail.com', '$2y$12$ovHHGRVbjRHJfGyp49y8wOZ4CX7nW2c99f6Igdwng6pIflWO5wzcS', 'admin', '2025-01-09 20:03:56', '2025-01-09 20:03:56'),
	(5, 'aryasatya', 'aryawatya123@gmail.com', '$2y$12$yBMpWU92x.0BVdIRsVc7fu7AArYb712EF1vRgw/0pXa1h0d5ceHUe', 'user', '2025-01-12 04:57:23', '2025-01-12 04:57:23'),
	(8, 'Wildan', 'wildan@gmail.com', '$2y$12$rvf6/vWNT8xHu.HU9lllye61KQ3Wb.hHa6rVRZwEIhVvLMpSLVqiy', 'opd', '2025-01-12 07:05:48', '2025-01-12 07:05:48'),
	(9, 'fadlan', 'fadlan@gmail.com', '$2y$12$vpfCfTndDcNw7gnffc4oEez80sJXMLNjM8AbUMz7RARqwxy7.WnZ6', 'opd', '2025-01-12 19:12:52', '2025-01-12 19:12:52'),
	(10, 'aksa junaidi', 'aksa@gmail.com', '$2y$12$V59YjlZRziKiBUJUH/cwFepaIOlwfTh69kwaH7a3NxgajUeFlmrIW', 'user', '2025-01-13 16:00:51', '2025-01-13 16:00:51'),
	(11, 'anggraini', 'angangkak@gmail.com', '$2y$12$qnmvG4FJh1IN0dcikFQUJeRPWlxxapCh5NK9EQoyyT01o5uirNdE2', 'user', '2025-01-13 17:39:41', '2025-01-13 17:39:41');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
