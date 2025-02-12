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

-- Dumping structure for table sirapat_db4.cache
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sirapat_db4.cache: ~0 rows (approximately)

-- Dumping structure for table sirapat_db4.cache_locks
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sirapat_db4.cache_locks: ~0 rows (approximately)

-- Dumping structure for table sirapat_db4.failed_jobs
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

-- Dumping data for table sirapat_db4.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table sirapat_db4.jenis_rapats
CREATE TABLE IF NOT EXISTS `jenis_rapats` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sirapat_db4.jenis_rapats: ~8 rows (approximately)
INSERT IGNORE INTO `jenis_rapats` (`id`, `nama`, `deskripsi`, `created_at`, `updated_at`) VALUES
	(5, 'Koordinasi', 'Menciptakan keselarasan dan efisiensi dalam mencapai target yang telah ditetapkan.', '2025-01-15 18:30:55', '2025-01-15 18:30:55'),
	(6, 'Evaluasi', 'Membahas capaian dan merumuskan langkah tindak lanjut.', '2025-01-15 18:33:23', '2025-01-15 18:33:23'),
	(10, 'Perencanaan', 'Merancang langkah atau strategi yang akan dilakukan di masa depan.', '2025-01-21 20:03:58', '2025-01-21 20:03:58'),
	(11, 'Pengambilan Keputusan', 'Menentukan keputusan penting secara kolektif.', '2025-01-21 20:05:17', '2025-01-21 20:05:17'),
	(12, 'Pelaporan', 'Menyampaikan hasil kerja, perkembangan proyek, atau pencapaian target.', '2025-01-21 20:06:32', '2025-01-21 20:06:32'),
	(14, 'Penyelesaian Konflik', 'Menyelesaikan konflik internal atau eksternal.', '2025-01-21 20:08:11', '2025-01-21 20:08:11'),
	(16, 'Monitoring dan Kontrol', 'Memantau perkembangan pekerjaan dan memastikan semuanya berjalan sesuai rencana.', '2025-01-21 20:09:45', '2025-01-21 20:09:45'),
	(18, 'Sosialisasi', 'Memberikan informasi baru kepada anggota.', '2025-01-29 19:25:33', '2025-01-29 19:25:33');

-- Dumping structure for table sirapat_db4.jobs
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

-- Dumping data for table sirapat_db4.jobs: ~0 rows (approximately)

-- Dumping structure for table sirapat_db4.job_batches
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

-- Dumping data for table sirapat_db4.job_batches: ~0 rows (approximately)

-- Dumping structure for table sirapat_db4.kehadirans
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
  CONSTRAINT `FKR` FOREIGN KEY (`rapat_id`) REFERENCES `rapats` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sirapat_db4.kehadirans: ~0 rows (approximately)
INSERT IGNORE INTO `kehadirans` (`id`, `rapat_id`, `nama`, `keterangan`, `tanggal`, `created_at`, `updated_at`) VALUES
	(31, 26, '31', 'hadir', '2025-02-11', '2025-02-11 02:13:26', '2025-02-11 02:14:32'),
	(32, 26, '12', 'hadir', '2025-02-11', '2025-02-11 02:16:59', '2025-02-11 02:17:08'),
	(33, 26, '20', 'hadir', '2025-02-11', '2025-02-11 02:25:24', '2025-02-11 02:31:36');

-- Dumping structure for table sirapat_db4.lampirans
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

-- Dumping data for table sirapat_db4.lampirans: ~0 rows (approximately)

-- Dumping structure for table sirapat_db4.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sirapat_db4.migrations: ~13 rows (approximately)
INSERT IGNORE INTO `migrations` (`id`, `migration`, `batch`) VALUES
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
	(12, '2025_01_07_040508_create_kehadirans_table', 2),
	(13, '2025_01_20_022230_add_image_to_notulens_table', 3);

-- Dumping structure for table sirapat_db4.notulens
CREATE TABLE IF NOT EXISTS `notulens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `rapat_id` bigint unsigned NOT NULL,
  `notulis_id` bigint unsigned NOT NULL,
  `admin_pj` int DEFAULT NULL,
  `isi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('draft','selesai') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'draft',
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notulens_rapat_id_foreign` (`rapat_id`),
  KEY `notulens_notulis_id_foreign` (`notulis_id`),
  CONSTRAINT `notulens_notulis_id_foreign` FOREIGN KEY (`notulis_id`) REFERENCES `users` (`id`),
  CONSTRAINT `notulens_rapat_id_foreign` FOREIGN KEY (`rapat_id`) REFERENCES `rapats` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sirapat_db4.notulens: ~0 rows (approximately)
INSERT IGNORE INTO `notulens` (`id`, `rapat_id`, `notulis_id`, `admin_pj`, `isi`, `status`, `image`, `created_at`, `updated_at`) VALUES
	(1, 26, 31, 29, '<p class="MsoNormal" style="line-height: 120%; tab-stops: 70.9pt 3.0cm;"><span lang="PT-BR" style="font-size: 11.0pt; line-height: 120%; font-family: \'Arial\',sans-serif; mso-ansi-language: PT-BR;">Kepada Yth<span style="mso-tab-count: 1;">&nbsp;&nbsp;&nbsp;&nbsp; </span>:<span style="mso-tab-count: 1;">&nbsp;&nbsp;&nbsp; </span>Kepala </span></p>\r\n<p class="MsoNormal" style="margin-left: 90.0pt; text-indent: -90.0pt; line-height: 120%; tab-stops: 70.9pt 3.0cm;"><span lang="PT-BR" style="font-size: 11.0pt; line-height: 120%; font-family: \'Arial\',sans-serif; mso-ansi-language: PT-BR;">Dari<span style="mso-tab-count: 1;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>:<span style="mso-tab-count: 1;">&nbsp;&nbsp;&nbsp; </span></span><span lang="SV" style="font-size: 11.0pt; line-height: 120%; font-family: \'Arial\',sans-serif; mso-ansi-language: SV;">Kepala Bidang </span></p>\r\n<p class="MsoNormal" style="line-height: 120%; tab-stops: 70.9pt 3.0cm;"><span lang="PT-BR" style="font-size: 11.0pt; line-height: 120%; font-family: \'Arial\',sans-serif; mso-ansi-language: PT-BR;">Tanggal <span style="mso-tab-count: 1;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>:<span style="mso-spacerun: yes;">&nbsp; </span></span></p>\r\n<p class="MsoNormal" style="line-height: 120%; tab-stops: 70.9pt 3.0cm;"><span lang="PT-BR" style="font-size: 11.0pt; line-height: 120%; font-family: \'Arial\',sans-serif; mso-ansi-language: PT-BR;">Nomor<span style="mso-tab-count: 1;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>:<span style="mso-spacerun: yes;">&nbsp; </span></span></p>\r\n<p class="MsoNormal" style="line-height: 120%; tab-stops: 70.9pt 3.0cm;"><span lang="PT-BR" style="font-size: 11.0pt; line-height: 120%; font-family: \'Arial\',sans-serif; mso-ansi-language: PT-BR;">Sifat<span style="mso-tab-count: 1;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>:<span style="mso-tab-count: 1;">&nbsp;&nbsp;&nbsp; </span>Biasa</span></p>\r\n<p class="MsoNormal" style="line-height: 120%; tab-stops: 70.9pt 3.0cm;"><span lang="PT-BR" style="font-size: 11.0pt; line-height: 120%; font-family: \'Arial\',sans-serif; mso-ansi-language: PT-BR;">Lampiran <span style="mso-tab-count: 1;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>: <span style="mso-tab-count: 1;">&nbsp;&nbsp; </span>- </span></p>\r\n<p class="MsoNormal" style="margin-left: 92.15pt; text-indent: -92.15pt; line-height: 120%; tab-stops: 70.9pt 3.0cm;"><span lang="PT-BR" style="font-size: 11.0pt; line-height: 120%; font-family: \'Arial\',sans-serif; mso-ansi-language: PT-BR;">Hal<span style="mso-tab-count: 1;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>:<span style="mso-tab-count: 1;">&nbsp;&nbsp;&nbsp; </span>Laporan Rapat Koordinasi Aplikasi Bantuan Penyandang Disabilitas</span></p>\r\n<p class="MsoNormal" style="margin-left: 90.0pt; text-align: justify; line-height: 120%; tab-stops: 81.0pt;"><!-- [if gte vml 1]><v:line id="Line44" o:spid="_x0000_s1026"\r\n style=\'position:absolute;left:0;text-align:left;z-index:251660800;\r\n visibility:visible;mso-wrap-style:square;mso-wrap-distance-left:9pt;\r\n mso-wrap-distance-top:0;mso-wrap-distance-right:9pt;\r\n mso-wrap-distance-bottom:0;mso-position-horizontal:absolute;\r\n mso-position-horizontal-relative:text;mso-position-vertical:absolute;\r\n mso-position-vertical-relative:text\' from="0,6.05pt" to="469.5pt,6.05pt"\r\n o:gfxdata="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\r\n7OeouhcoCIZq5WKWakrjxTSscnZGtWtHvsFzVLtIkTCyfjMXO2e3okY4lwPilSo/8M1HLZAmeV+p\r\nLe062N5DiTcMqm0fDpdhOPgMruB42gfaqqKtKhpcwZkzlIv0oLjtZxc5BZ6nlAJTyym1HFPPKfWc\r\n0sgpjZzSzClN39MnqnCKrw5TfS8/MIUalh2wZr2Fffq/8S8AAAD//wMAUEsDBBQABgAIAAAAIQCc\r\nZkZBuwAAACQBAAAqAAAAY2xpcGJvYXJkL2RyYXdpbmdzL19yZWxzL2RyYXdpbmcxLnhtbC5yZWxz\r\nhI/NCsIwEITvgu8Q9m7SehCRJr2I0KvUBwjJNi02PyRR7Nsb6EVB8LIws+w3s037sjN5YkyTdxxq\r\nWgFBp7yenOFw6y+7I5CUpdNy9g45LJigFdtNc8VZ5nKUxikkUigucRhzDifGkhrRykR9QFc2g49W\r\n5iKjYUGquzTI9lV1YPGTAeKLSTrNIXa6BtIvoST/Z/thmBSevXpYdPlHBMulFxagjAYzB0pXZ501\r\nLV2BiYZ9/SbeAAAA//8DAFBLAQItABQABgAIAAAAIQC75UiUBQEAAB4CAAATAAAAAAAAAAAAAAAA\r\nAAAAAABbQ29udGVudF9UeXBlc10ueG1sUEsBAi0AFAAGAAgAAAAhAK0wP/HBAAAAMgEAAAsAAAAA\r\nAAAAAAAAAAAANgEAAF9yZWxzLy5yZWxzUEsBAi0AFAAGAAgAAAAhAPbru5OaAQAAogMAAB8AAAAA\r\nAAAAAAAAAAAAIAIAAGNsaXBib2FyZC9kcmF3aW5ncy9kcmF3aW5nMS54bWxQSwECLQAUAAYACAAA\r\nACEAkn2H4B0HAABJIAAAGgAAAAAAAAAAAAAAAAD3AwAAY2xpcGJvYXJkL3RoZW1lL3RoZW1lMS54\r\nbWxQSwECLQAUAAYACAAAACEAnGZGQbsAAAAkAQAAKgAAAAAAAAAAAAAAAABMCwAAY2xpcGJvYXJk\r\nL2RyYXdpbmdzL19yZWxzL2RyYXdpbmcxLnhtbC5yZWxzUEsFBgAAAAAFAAUAZwEAAE8MAAAAAA==\r\n" o:allowincell="f" filled="t" strokeweight="4.5pt">\r\n <v:stroke linestyle="thickThin"/>\r\n</v:line><![endif]--><!-- [if !vml]--></p>\r\n<table cellspacing="0" cellpadding="0" align="left">\r\n<tbody>\r\n<tr>\r\n<td width="10" height="98">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td>&nbsp;</td>\r\n<td><img src="file:///C:/Users/lenovo/AppData/Local/Temp/msohtmlclip1/01/clip_image001.gif" width="633" height="7"></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p class="MsoNormal" style="margin-left: 90.0pt; text-align: justify; line-height: 120%; tab-stops: 81.0pt;"><!--[endif]--><span lang="PT-BR" style="font-size: 10.0pt; line-height: 120%; font-family: \'Arial\',sans-serif; mso-ansi-language: PT-BR;">&nbsp;</span></p>\r\n<p class="MsoBodyTextIndent" style="text-align: justify; text-indent: 1.0cm; line-height: 120%;"><span lang="PT-BR" style="font-size: 11.0pt; line-height: 120%; font-family: \'Arial\',sans-serif; mso-ansi-language: PT-BR;">&nbsp;</span></p>\r\n<p>&nbsp;</p>\r\n<p class="MsoBodyTextIndent" style="text-align: justify; text-indent: 1.0cm; line-height: 120%;"><span lang="PT-BR" style="font-size: 11.0pt; line-height: 120%; font-family: \'Arial\',sans-serif; mso-ansi-language: PT-BR;">Bersama ini kami laporkan hasil rapat koordinasi Aplikasi Bantuan Penyandang Disabilitas yang dilaksanakan pada :</span></p>\r\n<p class="MsoBodyTextIndent" style="text-align: justify; text-indent: 1.0cm; line-height: 120%;"><span lang="PT-BR" style="font-size: 11.0pt; line-height: 120%; font-family: \'Arial\',sans-serif; mso-ansi-language: PT-BR;">&nbsp;</span></p>\r\n<p class="MsoBodyTextIndent" style="text-align: justify; text-indent: 1.0cm; line-height: 120%; tab-stops: 4.0cm;"><span lang="PT-BR" style="font-size: 11.0pt; line-height: 120%; font-family: \'Arial\',sans-serif; mso-ansi-language: PT-BR;">Hari / Tanggal <span style="mso-tab-count: 1;">&nbsp;&nbsp;&nbsp; </span>:<span style="mso-spacerun: yes;">&nbsp; </span></span></p>\r\n<p class="MsoBodyTextIndent" style="text-align: justify; text-indent: 1.0cm; line-height: 120%; tab-stops: 4.0cm;"><span lang="PT-BR" style="font-size: 11.0pt; line-height: 120%; font-family: \'Arial\',sans-serif; mso-ansi-language: PT-BR;">Waktu <span style="mso-tab-count: 1;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>:<span style="mso-spacerun: yes;">&nbsp; </span></span></p>\r\n<p class="MsoBodyTextIndent" style="text-align: justify; text-indent: 1.0cm; line-height: 120%; tab-stops: 4.0cm;"><span lang="PT-BR" style="font-size: 11.0pt; line-height: 120%; font-family: \'Arial\',sans-serif; mso-ansi-language: PT-BR;">Tempat <span style="mso-tab-count: 1;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>:<span style="mso-spacerun: yes;">&nbsp; </span></span></p>\r\n<p class="MsoBodyTextIndent" style="text-align: justify; text-indent: 1.0cm; line-height: 120%; tab-stops: 148.85pt;"><span lang="PT-BR" style="font-size: 11.0pt; line-height: 120%; font-family: \'Arial\',sans-serif; mso-ansi-language: PT-BR;">&nbsp;</span></p>\r\n<p class="MsoBodyTextIndent" style="text-align: justify; text-indent: 1.0cm; line-height: 120%;"><span lang="PT-BR" style="font-size: 11.0pt; line-height: 120%; font-family: \'Arial\',sans-serif; mso-ansi-language: PT-BR;">Adapun hasil rapat koordinasi adalah sebagai berikut :</span></p>\r\n<p class="MsoBodyTextIndent" style="margin-left: 49.65pt; text-align: justify; text-indent: -21.3pt; line-height: 120%; mso-list: l1 level1 lfo1; border: none; mso-padding-alt: 31.0pt 31.0pt 31.0pt 31.0pt; mso-border-shadow: yes;"><!-- [if !supportLists]--><span lang="PT-BR" style="font-size: 11.0pt; line-height: 120%; font-family: \'Arial\',sans-serif; mso-fareast-font-family: Arial; mso-ansi-language: PT-BR;"><span style="mso-list: Ignore;">1.<span style="font: 7.0pt \'Times New Roman\';">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span><!--[endif]--><span lang="PT-BR" style="font-size: 11.0pt; line-height: 120%; font-family: \'Arial\',sans-serif; mso-ansi-language: PT-BR;">Paparan Aplikasi Bantuan Penyandang Disabilitas yang telah dikembangkan Diskominfo.</span></p>\r\n<p class="MsoBodyTextIndent" style="margin-left: 49.65pt; text-align: justify; text-indent: -21.3pt; line-height: 120%; mso-list: l1 level1 lfo1; border: none; mso-padding-alt: 31.0pt 31.0pt 31.0pt 31.0pt; mso-border-shadow: yes;"><!-- [if !supportLists]--><span lang="PT-BR" style="font-size: 11.0pt; line-height: 120%; font-family: \'Arial\',sans-serif; mso-fareast-font-family: Arial; mso-ansi-language: PT-BR;"><span style="mso-list: Ignore;">2.<span style="font: 7.0pt \'Times New Roman\';">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span><!--[endif]--><span lang="PT-BR" style="font-size: 11.0pt; line-height: 120%; font-family: \'Arial\',sans-serif; mso-ansi-language: PT-BR;">Review Aplikasi Bantuan Penyandang Disabilitas dengan hasil :</span></p>\r\n<p class="MsoBodyTextIndent" style="margin-left: 67.65pt; text-align: justify; text-indent: -18.0pt; line-height: 120%; mso-list: l0 level1 lfo2; border: none; mso-padding-alt: 31.0pt 31.0pt 31.0pt 31.0pt; mso-border-shadow: yes;"><!-- [if !supportLists]--><span lang="PT-BR" style="font-size: 11.0pt; line-height: 120%; font-family: \'Arial\',sans-serif; mso-fareast-font-family: Arial; mso-ansi-language: PT-BR;"><span style="mso-list: Ignore;">a.<span style="font: 7.0pt \'Times New Roman\';">&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span><!--[endif]--><span lang="PT-BR" style="font-size: 11.0pt; line-height: 120%; font-family: \'Arial\',sans-serif; mso-ansi-language: PT-BR;">A</span></p>\r\n<p class="MsoBodyTextIndent" style="margin-left: 67.65pt; text-align: justify; text-indent: -18.0pt; line-height: 120%; mso-list: l0 level1 lfo2; border: none; mso-padding-alt: 31.0pt 31.0pt 31.0pt 31.0pt; mso-border-shadow: yes;"><!-- [if !supportLists]--><span lang="PT-BR" style="font-size: 11.0pt; line-height: 120%; font-family: \'Arial\',sans-serif; mso-fareast-font-family: Arial; mso-ansi-language: PT-BR;"><span style="mso-list: Ignore;">b.<span style="font: 7.0pt \'Times New Roman\';">&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span><!--[endif]--><span lang="PT-BR" style="font-size: 11.0pt; line-height: 120%; font-family: \'Arial\',sans-serif; mso-ansi-language: PT-BR;">A</span></p>\r\n<p class="MsoBodyTextIndent" style="margin-left: 67.65pt; text-align: justify; text-indent: -18.0pt; line-height: 120%; mso-list: l0 level1 lfo2; border: none; mso-padding-alt: 31.0pt 31.0pt 31.0pt 31.0pt; mso-border-shadow: yes;"><!-- [if !supportLists]--><span lang="PT-BR" style="font-size: 11.0pt; line-height: 120%; font-family: \'Arial\',sans-serif; mso-fareast-font-family: Arial; mso-ansi-language: PT-BR;"><span style="mso-list: Ignore;">c.<span style="font: 7.0pt \'Times New Roman\';">&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span><!--[endif]--><span lang="PT-BR" style="font-size: 11.0pt; line-height: 120%; font-family: \'Arial\',sans-serif; mso-ansi-language: PT-BR;">A</span></p>\r\n<p class="MsoBodyTextIndent" style="margin-left: 49.65pt; text-align: justify; text-indent: -21.3pt; line-height: 120%; mso-list: l1 level1 lfo1; border: none; mso-padding-alt: 31.0pt 31.0pt 31.0pt 31.0pt; mso-border-shadow: yes;"><!-- [if !supportLists]--><span lang="PT-BR" style="font-size: 11.0pt; line-height: 120%; font-family: \'Arial\',sans-serif; mso-fareast-font-family: Arial; mso-ansi-language: PT-BR;"><span style="mso-list: Ignore;">3.<span style="font: 7.0pt \'Times New Roman\';">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span><!--[endif]--><span lang="PT-BR" style="font-size: 11.0pt; line-height: 120%; font-family: \'Arial\',sans-serif; mso-ansi-language: PT-BR;">Aplikasi abang dipa akan disosialisasikan.</span></p>\r\n<p class="MsoBodyTextIndent" style="margin-left: 1.0cm; text-align: justify; text-indent: 0cm; line-height: 120%; border: none; mso-padding-alt: 31.0pt 31.0pt 31.0pt 31.0pt; mso-border-shadow: yes;"><span lang="PT-BR" style="font-size: 11.0pt; line-height: 120%; font-family: \'Arial\',sans-serif; mso-ansi-language: PT-BR;">&nbsp;</span></p>\r\n<p class="MsoBodyTextIndent" style="margin-left: 49.65pt; text-align: justify; text-indent: 22.35pt; line-height: 120%; border: none; mso-padding-alt: 31.0pt 31.0pt 31.0pt 31.0pt; mso-border-shadow: yes;"><span lang="PT-BR" style="font-size: 11.0pt; line-height: 120%; font-family: \'Arial\',sans-serif; mso-ansi-language: PT-BR;">&nbsp;</span></p>\r\n<p class="MsoBodyTextIndent" style="text-align: justify; text-indent: 1.0cm; line-height: 120%;"><span lang="SV" style="font-size: 10.0pt; line-height: 120%; font-family: \'Arial\',sans-serif; mso-ansi-language: SV;"><span style="mso-tab-count: 1;">&nbsp;&nbsp; </span></span></p>\r\n<p class="MsoBodyTextIndent" style="text-align: justify; text-indent: 1.0cm; line-height: 120%;"><span lang="PT-BR" style="font-size: 11.0pt; line-height: 120%; font-family: \'Arial\',sans-serif; mso-ansi-language: PT-BR;">Demikian untuk menjadikan periksa. </span></p>', 'selesai', '1739265328.jpg', '2025-02-11 02:15:28', '2025-02-11 02:15:28');

-- Dumping structure for table sirapat_db4.opds
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
  `nip` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `opds_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sirapat_db4.opds: ~4 rows (approximately)
INSERT IGNORE INTO `opds` (`id`, `nama`, `kepala`, `email`, `telepon`, `alamat`, `is_active`, `created_at`, `updated_at`, `nip`) VALUES
	(12, 'Dinas Sosial', 'Indriyanto, S.H.M.', 'dinsospati@gmail.com', '(0295) 381642', 'Jalan Ki Juru Mertani, Cengkok, Sidoharjo, Kec. Pati, Kabupaten Pati, Jawa Tengah 59117, Indonesia.', 1, '2025-01-21 20:24:14', '2025-01-21 20:24:14', '198106152006021002\n\n'),
	(13, 'Dinas Pendidikan', 'Winarto, S.Pd', 'disdik@gmail.com', '(0295) 381421', 'Jalan P.Sudirman No. 1, Puri, Kec. Pati, Kabupaten Pati, Jawa Tengah 59113, Indonesia.', 1, '2025-01-21 23:17:26', '2025-01-22 21:30:09', '197512201998032005'),
	(14, 'Dinas Kesehatan', 'Aviani Tritanti Venusia, MM', 'dinkes@gmail.com', '(0295) 381685', 'Jalan Diponegoro No.153, Parenggan, Kec. Pati, Kabupaten Pati, Jawa Tengah 59119, Indonesia', 1, '2025-01-22 21:22:13', '2025-02-06 19:23:28', '1989091020100110093'),
	(29, 'Dinas Komunikasi dan Informatika', 'Ratri Wijayanto, S.STP.,M.Si', 'diskominfo@gmail.com', '(0295) 381127', 'JL. RA. Kartini No. 1A PATI Kode Pos 59111', 1, '2025-02-11 01:09:43', '2025-02-11 01:09:43', '198006271998101001');

-- Dumping structure for table sirapat_db4.opd_members
CREATE TABLE IF NOT EXISTS `opd_members` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kepala_opd_id` int DEFAULT NULL,
  `staff_opd_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sirapat_db4.opd_members: ~7 rows (approximately)
INSERT IGNORE INTO `opd_members` (`id`, `kepala_opd_id`, `staff_opd_id`, `created_at`, `updated_at`) VALUES
	(1, 12, 16, '2025-02-07 03:15:58', '2025-02-07 03:15:58'),
	(2, 12, 17, '2025-02-07 03:16:52', '2025-02-07 03:16:52'),
	(3, 12, 18, '2025-02-07 07:16:43', '2025-02-07 07:16:43'),
	(5, 12, 20, '2025-02-08 18:47:43', '2025-02-08 18:47:43'),
	(8, 13, 23, '2025-02-10 20:08:13', '2025-02-10 20:08:13'),
	(9, 25, 25, '2025-02-11 00:43:38', '2025-02-11 00:43:38'),
	(11, 29, 31, '2025-02-11 01:55:06', '2025-02-11 01:55:06');

-- Dumping structure for table sirapat_db4.peserta_rapats
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

-- Dumping data for table sirapat_db4.peserta_rapats: ~0 rows (approximately)

-- Dumping structure for table sirapat_db4.rapats
CREATE TABLE IF NOT EXISTS `rapats` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pimpinan_rapat` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sirapat_db4.rapats: ~0 rows (approximately)
INSERT IGNORE INTO `rapats` (`id`, `judul`, `pimpinan_rapat`, `tanggal`, `waktu`, `tempat`, `jenis_rapat_id`, `deskripsi`, `status`, `created_by`, `created_at`, `updated_at`) VALUES
	(26, 'Rapat Keamanan Siber', 'Ratri Wijayanto, S.STP.,M.Si', '2025-02-11', '20:10:00', 'Gedung A', 5, 'OK', 'selesai', 29, '2025-02-11 02:08:15', '2025-02-11 02:38:57');

-- Dumping structure for table sirapat_db4.sessions
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

-- Dumping data for table sirapat_db4.sessions: ~10 rows (approximately)
INSERT IGNORE INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('AwP3CwJrz10197BLCS3dEhIwA9mzMwTAWHJu0O8p', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36 Edg/132.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiRWRvN05oTG5FNzZ0NVVhaHFyRzVXSnhuY2pMdTF4MVhUcEZ1VWFxcSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo0MToiaHR0cDovL2NjZGItMTExLTk0LTE5Ni0xNDgubmdyb2stZnJlZS5hcHAiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo0NzoiaHR0cDovL2NjZGItMTExLTk0LTE5Ni0xNDgubmdyb2stZnJlZS5hcHAvbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1739264252),
	('HUiIkBHdIm9lIyoZWq6C32hVpgWaHCfD6oMncGAu', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36 Edg/132.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZEdFTDJLMU5QRVpPenNxdkdweUpJM3RBTDR6N1RYcW00YnI5bGdVWSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9tYW5hamVtZW4tb3BkIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mjt9', 1739260774),
	('kmoeFBdO3QGQCSCBM2PjYnPBmqKvalHZMskNRo96', 12, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36 Edg/132.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiYmwxVEZHdjQ0d2JJeWJUNjEzdnpqWDJLaEhaUnhqcWVqSXNNbWtYaSI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjU1OiJodHRwOi8vY2NkYi0xMTEtOTQtMTk2LTE0OC5uZ3Jvay1mcmVlLmFwcC9tYW5hamVtZW4tb3BkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTI7fQ==', 1739259516),
	('uvloEUtalIvdsR7HI35LUNFrMyV610a0l0OWKS3P', NULL, '127.0.0.1', 'WhatsApp/2.23.20.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQzh0Sks0VkNKZTByQkJKVXVnVEpxU2ozb2JoOHQ1OG9YMzVSSFJrQiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDc6Imh0dHA6Ly9jY2RiLTExMS05NC0xOTYtMTQ4Lm5ncm9rLWZyZWUuYXBwL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1739264257),
	('w2xbOEzEqGlXASRKp8MlfOVxR3OAVLUrVeiL5AfT', NULL, '127.0.0.1', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRVE3bHhobGhtT1NadHVOdmZDSzBPUFo4c0hiQ09BcGNHODM2SFlNaSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDc6Imh0dHA6Ly9jY2RiLTExMS05NC0xOTYtMTQ4Lm5ncm9rLWZyZWUuYXBwL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1739264270),
	('YLZOqY5QLaGGRpYF0AOPwz2XvNzj1GAzOIzLzzm4', 29, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoibkRvRk1HOGJpQWFKeVR0WjVJTU5HVHozTlJYUmJOV3l6QnBXcnNWeCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTk6Imh0dHA6Ly9jY2RiLTExMS05NC0xOTYtMTQ4Lm5ncm9rLWZyZWUuYXBwL2tlaGFkaXJhbi8zMS9lZGl0Ijt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mjk7fQ==', 1739266885);

-- Dumping structure for table sirapat_db4.undangans
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sirapat_db4.undangans: ~0 rows (approximately)
INSERT IGNORE INTO `undangans` (`id`, `rapat_id`, `user_id`, `judul`, `isi`, `template`, `status`, `created_at`, `updated_at`) VALUES
	(1, 26, 29, 'Keamanan Siber', '<p class="MsoNormal" style="margin-bottom: 0cm; line-height: 115%; tab-stops: 70.9pt 9.0cm;"><span lang="EN-US" style="font-size: 12.0pt; mso-bidi-font-size: 11.0pt; line-height: 115%; font-family: \'Arial\',sans-serif;">Nomor<span style="mso-tab-count: 1;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>: ${nomor_naskah}</span></p>\r\n<p class="MsoNormal" style="margin-bottom: 0cm; line-height: 115%; tab-stops: 70.9pt 9.0cm;"><span lang="EN-US" style="font-size: 12.0pt; mso-bidi-font-size: 11.0pt; line-height: 115%; font-family: \'Arial\',sans-serif;">Sifat<span style="mso-tab-count: 1;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>: ${sifat}</span></p>\r\n<p class="MsoNormal" style="margin-bottom: 0cm; line-height: 115%; tab-stops: 70.9pt 9.0cm;"><span lang="EN-US" style="font-size: 12.0pt; mso-bidi-font-size: 11.0pt; line-height: 115%; font-family: \'Arial\',sans-serif;">Lampiran<span style="mso-tab-count: 1;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>: </span></p>\r\n<p class="MsoNormal" style="margin-bottom: 0cm; line-height: 115%; tab-stops: 70.9pt 9.0cm;"><span lang="EN-US" style="font-size: 12.0pt; mso-bidi-font-size: 11.0pt; line-height: 115%; font-family: \'Arial\',sans-serif;">Hal<span style="mso-tab-count: 1;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>: Undangan Review Aplikasi Abang Dipa</span></p>\r\n<p class="MsoNormal" style="margin-bottom: 0cm; line-height: 115%; tab-stops: 70.9pt 9.0cm;"><span lang="EN-US" style="font-size: 12.0pt; mso-bidi-font-size: 11.0pt; line-height: 115%; font-family: \'Arial\',sans-serif;">&nbsp;</span></p>\r\n<p class="MsoNormal" style="margin-bottom: 0cm; line-height: 115%; tab-stops: 35.45pt 9.0cm;"><span lang="FI" style="font-size: 12.0pt; mso-bidi-font-size: 11.0pt; line-height: 115%; font-family: \'Arial\',sans-serif; mso-ansi-language: FI;">Yth. <span style="mso-tab-count: 1;">&nbsp;&nbsp; </span>Kepala Dinas D</span></p>\r\n<p class="MsoNormal" style="margin-bottom: 0cm; line-height: 115%; tab-stops: 35.45pt 9.0cm;"><span lang="FI" style="font-size: 12.0pt; mso-bidi-font-size: 11.0pt; line-height: 115%; font-family: \'Arial\',sans-serif; mso-ansi-language: FI;"><span style="mso-tab-count: 1;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span><span style="mso-spacerun: yes;">&nbsp;</span></span></p>\r\n<p class="MsoNormal" style="margin-bottom: 0cm; line-height: 115%; tab-stops: 35.45pt 9.0cm;"><span lang="FI" style="font-size: 12.0pt; mso-bidi-font-size: 11.0pt; line-height: 115%; font-family: \'Arial\',sans-serif; mso-ansi-language: FI;"><span style="mso-tab-count: 1;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>di</span></p>\r\n<p class="MsoNormal" style="margin-bottom: 0cm; line-height: 115%; tab-stops: 35.45pt 9.0cm;"><span lang="FI" style="font-size: 12.0pt; mso-bidi-font-size: 11.0pt; line-height: 115%; font-family: \'Arial\',sans-serif; mso-ansi-language: FI;"><span style="mso-tab-count: 1;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>Tempat</span></p>\r\n<p class="MsoNormal" style="margin-bottom: 0cm; text-align: justify; line-height: 115%;"><span lang="FI" style="font-size: 12.0pt; line-height: 115%; font-family: \'Arial\',sans-serif; mso-fareast-font-family: \'Bookman Old Style\'; mso-ansi-language: FI;">&nbsp;</span></p>\r\n<p class="MsoNormal" style="margin-bottom: 0cm; text-align: justify; text-indent: 35.45pt; line-height: 115%;"><span lang="IN" style="font-size: 12.0pt; line-height: 115%; font-family: \'Arial\',sans-serif; color: black; mso-ansi-language: IN;">Dalam rangka pengembangan aplikasi bantuan difabel, yang sudah pada tahap akhir pengembangan, Dinas A akan melakukan review final terhadap Aband Dipa tersebut bersama dengan<span style="mso-spacerun: yes;">&nbsp; </span>Dinas D.</span></p>\r\n<p class="MsoNormal" style="margin-bottom: 0cm; text-align: justify; text-indent: 35.45pt; line-height: 115%;"><span lang="IN" style="font-size: 12.0pt; line-height: 115%; font-family: \'Arial\',sans-serif; color: black; mso-ansi-language: IN;">Untuk itu k</span><span lang="IN" style="font-size: 12.0pt; line-height: 115%; font-family: \'Arial\',sans-serif; mso-ansi-language: IN;">ami mohon <span style="color: black;">Saudara dapat menugaskan personel yang membidangi aplikasi sosial tentang bantuan difable untuk melakukan koordinasi review pengembangan aplikasi yang akan dilakukan besok :</span></span></p>\r\n<p class="MsoNormal" style="text-align: justify; line-height: 115%; tab-stops: 36.0pt; margin: 0cm -6.3pt 0cm 35.45pt;"><span style="font-size: 12.0pt; line-height: 115%; font-family: \'Arial\',sans-serif; mso-ansi-language: EN-ID;">Hari<span style="mso-tab-count: 2;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span> <span style="mso-tab-count: 1;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>: </span></p>\r\n<p class="MsoNormal" style="text-align: justify; line-height: 115%; tab-stops: 36.0pt; margin: 0cm 0cm 0cm 35.45pt;"><span style="font-size: 12.0pt; line-height: 115%; font-family: \'Arial\',sans-serif; mso-ansi-language: EN-ID;">Tanggal <span style="mso-tab-count: 1;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span><span style="mso-spacerun: yes;">&nbsp;</span><span style="mso-tab-count: 1;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>: </span></p>\r\n<p class="MsoNormal" style="text-align: justify; line-height: 115%; tab-stops: 36.0pt; margin: 0cm -6.3pt 0cm 35.45pt;"><span style="font-size: 12.0pt; line-height: 115%; font-family: \'Arial\',sans-serif; mso-ansi-language: EN-ID;">Jam<span style="mso-tab-count: 2;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span> <span style="mso-tab-count: 1;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>: </span></p>\r\n<p class="MsoNormal" style="text-align: justify; line-height: 115%; tab-stops: 36.0pt; margin: 0cm -6.3pt 0cm 35.45pt;"><span lang="FI" style="font-size: 12.0pt; line-height: 115%; font-family: \'Arial\',sans-serif; mso-ansi-language: FI;">Tempat <span style="mso-tab-count: 1;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span><span style="mso-spacerun: yes;">&nbsp;</span><span style="mso-tab-count: 1;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>: </span></p>\r\n<p class="MsoNormal" style="text-align: justify; text-indent: 35.4pt; line-height: 115%; margin: 0cm 0cm 0cm 49.65pt;"><span lang="IN" style="font-size: 12.0pt; line-height: 115%; font-family: \'Arial\',sans-serif; color: black; mso-ansi-language: IN;">&nbsp;</span></p>\r\n<p class="MsoNormal" style="margin-bottom: 0cm; text-align: justify; text-indent: 35.45pt; line-height: 115%;"><span lang="FI" style="font-size: 12.0pt; line-height: 115%; font-family: \'Arial\',sans-serif; mso-ansi-language: FI;">Demikian atas perhatiannya kami sampaikan terima kasih</span><span lang="IN" style="font-size: 12.0pt; line-height: 115%; font-family: \'Arial\',sans-serif; mso-ansi-language: IN;">.</span></p>', 'formal', 'terkirim', '2025-02-11 02:10:08', '2025-02-11 02:10:08');

-- Dumping structure for table sirapat_db4.undangan_dispos
CREATE TABLE IF NOT EXISTS `undangan_dispos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `undangan_id` int DEFAULT NULL,
  `penerima_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sirapat_db4.undangan_dispos: ~0 rows (approximately)
INSERT IGNORE INTO `undangan_dispos` (`id`, `undangan_id`, `penerima_id`, `created_at`, `updated_at`) VALUES
	(1, 1, 12, '2025-02-11 02:10:08', '2025-02-11 02:10:08'),
	(2, 1, 13, '2025-02-11 02:10:08', '2025-02-11 02:10:08'),
	(3, 1, 14, '2025-02-11 02:10:08', '2025-02-11 02:10:08'),
	(4, 1, 31, '2025-02-11 02:10:38', '2025-02-11 02:10:38'),
	(5, 1, 20, '2025-02-11 02:24:36', '2025-02-11 02:24:36');

-- Dumping structure for table sirapat_db4.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','user','notulis','opd') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `opd_id` int DEFAULT NULL,
  `is_active` int DEFAULT '0' COMMENT '0=tidak aktif, 1=aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sirapat_db4.users: ~12 rows (approximately)
INSERT IGNORE INTO `users` (`id`, `name`, `email`, `password`, `role`, `opd_id`, `is_active`, `created_at`, `updated_at`) VALUES
	(2, 'Admin', 'admin@gmail.com', '$2y$12$JFTeU0IsBZUbjEGXHQX5yebCGsAhLrhCzhMyeXRlMTnEco9BrnAd.', 'admin', 0, 1, '2024-12-29 11:14:40', '2024-12-29 11:14:40'),
	(3, 'Notulis', 'notulis@gmail.com', '$2y$12$LN8CGGqiszj7iaX.nXc36.TCzCJrQMV/RrOd8m7ZAnw5rfi5YRmRe', 'notulis', 0, 1, '2024-12-29 11:21:38', '2024-12-29 11:21:38'),
	(12, 'Indriyanto, S.H.M.', 'dinsospati@gmail.com', '$2y$12$tSQojG.tuRaMR4pyhIj0be2Tep8LMlzqSGi6yW1/m41kRbYlJLwmG', 'opd', 12, 1, '2025-01-21 13:24:15', '2025-01-21 13:24:15'),
	(13, 'Winarto, S.Pd.', 'disdik@gmail.com', '$2y$12$FWsw1d1mjO26AcrbDpRCceJPl4RChwKggMvEGIPhwEJ3gWaxDJrpW', 'opd', 13, 1, '2025-01-21 16:17:26', '2025-01-21 16:17:26'),
	(14, 'Aviani Tritanti Venusia, MM', 'dinkes@gmail.com', '$2y$12$vl5fZ6b3.hBf6YGMoXki1efoxHhWK.lbK3qm5B18W0s8R/dTrSzMS', 'opd', 14, 1, '2025-01-22 14:22:13', '2025-01-22 14:22:13'),
	(16, 'Intan', 'intan@gmail.com', '$2y$12$o2a8d2/iXb5AAmoDFlbvge4WdOd9sGh155spMfLnXNmohg3K/aa/K', 'user', 12, 0, '2025-02-07 03:15:58', '2025-02-08 19:26:34'),
	(17, 'Anggraini', 'anggraini@gmail.com', '$2y$12$uxPwTh.LKC5QXS60k4k.XeSWMDme8eFpXuzHKArLQxwjjnBdNs4n6', 'user', 12, 1, '2025-02-07 03:16:52', '2025-02-08 08:57:38'),
	(20, 'Lee Jeno', 'jenolee@gmail.com', '$2y$12$6I09HXFuTZEnPpX2A6eI3u5j5VpshCAWavB7o.ssc4CTxnj2zmN0S', 'user', 12, 1, '2025-02-08 18:47:43', '2025-02-08 18:58:05'),
	(23, 'Mark Lee', 'leemark@gmail.com', '$2y$12$cCLDQOWAD5MyM2glMuJsyON0Tdkjikv2QynF4ol0d8Dl8RQafmwqK', 'user', 13, 1, '2025-02-10 20:08:13', '2025-02-10 20:10:19'),
	(25, 'Lee Haechan', 'haechanlee@gmail.com', '$2y$12$HLfzLIfj85CW9ZFi9TZOeO1WFHn.RujJoD0wUrF0Tyvy6Z4UfhuEa', 'user', 25, 0, '2025-02-11 00:43:38', '2025-02-11 00:43:38'),
	(29, 'Ratri Wijayanto, S.STP.,M.Si', 'diskominfo@gmail.com', '$2y$12$nUws0.4XgLZJIkiIFaIXw.xI5Y4BANX0CVdE/nSA8lQTZeiZQVIg2', 'opd', 29, 1, '2025-02-11 01:09:43', '2025-02-11 01:09:43'),
	(31, 'Mingyu', 'mingyu@gmail.com', '$2y$12$M7LIruP92fFl3zu9XQc/VudLJrOoasZGhHR4Vk7H3ThhlbTOhavJ2', 'user', 29, 1, '2025-02-11 01:55:06', '2025-02-11 02:00:01');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
