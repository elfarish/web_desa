/*M!999999\- enable the sandbox mode */ 
-- MariaDB dump 10.19-11.8.3-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: u723596765_desa_pabuaran
-- ------------------------------------------------------
-- Server version	11.8.3-MariaDB-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*M!100616 SET @OLD_NOTE_VERBOSITY=@@NOTE_VERBOSITY, NOTE_VERBOSITY=0 */;

--
-- Table structure for table `berita`
--

DROP TABLE IF EXISTS `berita`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `berita` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `judul` varchar(300) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `ringkasan` text NOT NULL,
  `isi` longtext NOT NULL,
  `status` enum('draft','published','pending') NOT NULL DEFAULT 'draft',
  `tanggal` date NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `berita_slug_unique` (`slug`),
  KEY `berita_user_id_foreign` (`user_id`),
  CONSTRAINT `berita_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `berita`
--

/*!40000 ALTER TABLE `berita` DISABLE KEYS */;
set autocommit=0;
/*!40000 ALTER TABLE `berita` ENABLE KEYS */;
commit;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
set autocommit=0;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
commit;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
set autocommit=0;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
commit;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
set autocommit=0;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
commit;

--
-- Table structure for table `galeri`
--

DROP TABLE IF EXISTS `galeri`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `galeri` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `galeri`
--

/*!40000 ALTER TABLE `galeri` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `galeri` VALUES
(9,NULL,'galeri/1757994476_desa-pabuaran.jpg','2025-09-16 03:47:56','2025-09-16 03:47:56'),
(10,'kantor desa','galeri/1758249569_kantor-desa.png','2025-09-19 02:39:29','2025-09-19 02:39:29');
/*!40000 ALTER TABLE `galeri` ENABLE KEYS */;
commit;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
set autocommit=0;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
commit;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
set autocommit=0;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
commit;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `migrations` VALUES
(1,'0001_01_01_000000_create_users_table',1),
(2,'0001_01_01_000001_create_cache_table',1),
(3,'0001_01_01_000002_create_jobs_table',1),
(4,'2025_09_02_152833_create_struktural_table',1),
(5,'2025_09_04_143521_create_berita_table',1),
(6,'2025_09_04_145220_add_user_id_to_berita_table',2),
(7,'2025_09_04_160107_create_galeri_table',3),
(8,'2025_09_05_132207_create_tamplate_surat_table',4),
(9,'2025_09_05_140808_create_pengajuan_proposal_table',5),
(10,'2025_09_05_143801_create_statistik_table',6),
(11,'2025_09_05_150013_create_slide_table',7);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
commit;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
set autocommit=0;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
commit;

--
-- Table structure for table `pengajuan_proposal`
--

DROP TABLE IF EXISTS `pengajuan_proposal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `pengajuan_proposal` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pengajuan_proposal`
--

/*!40000 ALTER TABLE `pengajuan_proposal` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `pengajuan_proposal` VALUES
(3,'Pengajuan Proposal','https://docs.google.com/forms/d/e/1FAIpQLSe4vbfPi6P_EU7lnFjhTedW0WZSM1ei66sbjnMaPjS2vWXXcQ/viewform?usp=sharing&ouid=110538363236011653681','2025-09-05 07:25:01','2025-09-05 10:30:19');
/*!40000 ALTER TABLE `pengajuan_proposal` ENABLE KEYS */;
commit;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `sessions` VALUES
('0DAcUsk1qZSDRodD2CH3XI8kC95RwcSL3pg2KUw1',NULL,'66.249.73.97','Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.7339.207 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)','YTozOntzOjY6Il90b2tlbiI7czo0MDoiTklrQzltNWtFTGhjcmYyWmpjNTUzSnJzNEdTVU90dWZpODRLRjhMVSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHBzOi8vZGVzYXBhYnVhcmFuLmNvbS9sYXlhbmFuL3Byb3Bvc2FsIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1760022067),
('1C2CnTP4XqvfoJqvmbNcOBeeE3GaBtpFj692gwF3',NULL,'51.68.247.197','Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)','YTozOntzOjY6Il90b2tlbiI7czo0MDoiRjcwRUExTVBkSzZ1b3dRTWZnOHM2Tm9Ub0J3bnpNd1g2cVJFMEZTRSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDU6Imh0dHBzOi8vd3d3LmRlc2FwYWJ1YXJhbi5jb20vbGF5YW5hbi9wcm9wb3NhbCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1760413079),
('2BQvaIxei8IjbSll0aGh7CHA8BzmPbQDHSN0TNAf',NULL,'132.232.203.74','Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1','YTozOntzOjY6Il90b2tlbiI7czo0MDoiNmd0OUdDajgySGNQMXA5bndVRkp2cHdBdmJRajlHdXVFcjI1SXNvdSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHBzOi8vd3d3LmRlc2FwYWJ1YXJhbi5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1760078699),
('4IIRkvnhUvzyExdP9sqNjRuyxqDKxtiuc1GfRbNa',NULL,'2a03:2880:f802:2::','meta-externalagent/1.1 (+https://developers.facebook.com/docs/sharing/webmasters/crawler)','YTozOntzOjY6Il90b2tlbiI7czo0MDoiRmlaWlFTWkJxdFE1UGliYnI2dXhqSGZxQ1NYcTFSTndUS2JnWGI4SSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vZGVzYXBhYnVhcmFuLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1760137820),
('538DIzckqwcamBS2kMzYNv9Uuz33Pqh0zClwyfdX',NULL,'5.39.1.249','Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)','YTozOntzOjY6Il90b2tlbiI7czo0MDoiZzFXNG10cFdkR1hUdWtwbk9Gc2k2VkFQakhaVk5nUUxDTFo0dDFJTCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDU6Imh0dHBzOi8vd3d3LmRlc2FwYWJ1YXJhbi5jb20vcHJvZmlsL3Zpc2ktbWlzaSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1760402197),
('5G52yEYrxUMtOyST9LqDtxsaCSoIXRhtscf0v16b',NULL,'2a02:4780:6:c0de::8','Go-http-client/2.0','YToyOntzOjY6Il90b2tlbiI7czo0MDoiS2lsSHFJdDVlckdRbGYzZFd5VDlDRFl4MVFYMWVKTThwNGZneldxMSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1760164292),
('7460PND9wgQeoBN1U5cYPgimiXNnIs1HMtY7OF9g',NULL,'52.91.228.21','Mozilla/5.0 (Linux; U; Android 11; ru-ru; Mi 9T Build/RKQ1.200826.002) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/89.0.4389.116 Mobile Safari/537.36 XiaoMi/MiuiBrowser/13.1.0-gn','YTozOntzOjY6Il90b2tlbiI7czo0MDoiOEdCelJIck5lRjkwU245TVJZVDd4R3dCRzBjTGJSWGNqVGhrR0E5dyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vZGVzYXBhYnVhcmFuLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1760307281),
('8voUVmr3cVO0R8yKzRy8WrjO4PN2a3uyCGjHc86y',NULL,'37.59.204.133','Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)','YTozOntzOjY6Il90b2tlbiI7czo0MDoiTExHejZZaWllUmxyNUM4WU9xalJIY0JCeUxJd1YwOGNweTFGN3NEVSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHBzOi8vd3d3LmRlc2FwYWJ1YXJhbi5jb20vbGF5YW5hbi9zdXJhdCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1760409698),
('9yNj4HN5hLOSW719oE7PqH0QUHl7Ss92JJZtZYo6',NULL,'40.77.167.15','Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiaWdTWTZiVFhiOVlQTmhIR2dUNDdLbWZvSzVsRVdNd3dScVVEb2RyNSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vZGVzYXBhYnVhcmFuLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1760064090),
('A8u4yAOQ22pfgCasjl9pJPqDWO1Lfwt3mOTK59zn',NULL,'2001:4ca0:108:42::7','quic-go-HTTP/3','YToyOntzOjY6Il90b2tlbiI7czo0MDoidzBSRWRhbVdxT2Q3TWlZbGhXRDVrcGZMSkMwTTdNcDRJdUp6OHdxYiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1760292952),
('aWeRsCm23HDA0zklAdT1dOnJr1FABCbt2hfn2kyd',NULL,'3.255.159.229','Mozilla/5.0 (compatible; NetcraftSurveyAgent/1.0; +info@netcraft.com)','YTozOntzOjY6Il90b2tlbiI7czo0MDoid3ZmeEJ5b1ZGRjdXQkVHU3Boc3BCQXo1Q1haVG9Vc0VNNU5Sa3dQMCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHBzOi8vd3d3LmRlc2FwYWJ1YXJhbi5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1760408660),
('bcqfKfFmwaMlcMNRsiCeaX80JFHlDp0Q7hk0Tumo',NULL,'43.143.248.236','Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1','YTozOntzOjY6Il90b2tlbiI7czo0MDoiUkxRWXp2SzhZTE9BZVZvZ21KOXFkamtlamc5T3FETGFDUHF4UHFTYiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHBzOi8vd3d3LmRlc2FwYWJ1YXJhbi5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1760276680),
('c1FdD0mt0x4O4VcoKqId1i8pSnpI12kAnIXhGOjc',NULL,'40.77.167.24','Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiaUpVZU5PcU9VZGx4V0ZmYnlhbWNMTmhVOTk5eDEyVVpIdVZhQ2xMRiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHBzOi8vZGVzYXBhYnVhcmFuLmNvbS9sYXlhbmFuL3Byb3Bvc2FsIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1760114990),
('C3sfpqNy0xLOyshv7UO76C9hYmAf5lhd6a5b6YRY',NULL,'54.37.118.67','Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)','YTozOntzOjY6Il90b2tlbiI7czo0MDoicGtLNkx1SkExMGQ5bWVhV3dFZzQ4M2dQNzdaeFNRQmwxVlFzanc4WCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHBzOi8vd3d3LmRlc2FwYWJ1YXJhbi5jb20vYmVyaXRhIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1760416227),
('C5AIihnthlZHFWCNtI3UY1pp7MgKZGEkxKmzT3kj',NULL,'40.77.167.62','Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoibDVRYVM4bzBNQ1BTZllFcUQxSFJPWUZZNnlvbGVWNjRyVGxXV3NPUyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vZGVzYXBhYnVhcmFuLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1760046424),
('cZLZ0R5gPXqqOnYvY5350Ae2f8M33qMvSW63FZYN',NULL,'2a02:4780:6:c0de::8','Go-http-client/2.0','YToyOntzOjY6Il90b2tlbiI7czo0MDoiUjJ3ZVphcmFSNUpIaXBITzdja1VOR2VDN2w2SXhueWhuVkJ5aUxkRiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1760259291),
('DliqvedpCJk18S4I9ECG4LNfzgSN0EqsUrJCUJlG',NULL,'2a02:4780:6:c0de::8','Go-http-client/2.0','YToyOntzOjY6Il90b2tlbiI7czo0MDoibUxYa3FEY01mbmFZbnVqbWM4M3k5WEpWblBYdHkydkRIYzdKQ0xkNiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1760414513),
('DvyBUYX0DDjbftFzAOmQxEkQPlRSYfJ4t3IfIRwT',NULL,'66.249.71.131','Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.7339.207 Mobile Safari/537.36 (compatible; GoogleOther)','YTozOntzOjY6Il90b2tlbiI7czo0MDoiZkZGUVhLQTJzcWxrNGhlVXV3TUpNWVpNU2xqbHJldnFwYmJZd2xUQiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHBzOi8vZGVzYXBhYnVhcmFuLmNvbS9sYXlhbmFuL3Byb3Bvc2FsL2Rvd25sb2FkLzMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1760028962),
('E0Fl2utPOg6ErODdR0p7e97awcjntUe7bffPFFix',NULL,'2a03:2880:f802:1a::','meta-externalagent/1.1 (+https://developers.facebook.com/docs/sharing/webmasters/crawler)','YTozOntzOjY6Il90b2tlbiI7czo0MDoiaWI0Z0hZQXd2cVk1WUp1N3N4QzRoVmFkcWtQcmExcG8zUGNVbVRoTyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHBzOi8vd3d3LmRlc2FwYWJ1YXJhbi5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1760229684),
('EHFu09mIrAeug6VmPCVUNBxmLlOOzF86VaFZy3eJ',NULL,'15.235.96.16','Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)','YTozOntzOjY6Il90b2tlbiI7czo0MDoicWlxd1pyYUhqYXdRRE5WcHFjdWpRN3JyWFBOWkZxcmJBMU9UU2RxaSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHBzOi8vd3d3LmRlc2FwYWJ1YXJhbi5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1760383784),
('ExsQPuiVvUapYyBEjvpazw62MGM2yupxJqojpy1H',NULL,'17.246.19.86','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.4 Safari/605.1.15 (Applebot/0.1; +http://www.apple.com/go/applebot)','YTozOntzOjY6Il90b2tlbiI7czo0MDoiZGlwZU1RbnhmajZDR3RkempFQUNyNnU1RHFRQ2J6YlhCZUhJR3lZbCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHBzOi8vZGVzYXBhYnVhcmFuLmNvbS9wcm9maWwvc2VqYXJhaCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1760069997),
('FozX6LHGuJiSzJkCAKoa04wL5c9s8ADHJc8ao3tu',NULL,'2001:4ca0:108:42::7','quic-go-HTTP/3','YToyOntzOjY6Il90b2tlbiI7czo0MDoiNjdiUGVDb1N1UlZEeEIyTkN3WEZ0eWFTcExaRUFUdGQyWFBESXpDaSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1760279261),
('guQiGlqw1yLOrilt8vwlC2epFjGdm9z8CWg0YaLd',NULL,'42.236.17.34','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0; 360Spider','YTozOntzOjY6Il90b2tlbiI7czo0MDoiTHRITmZodzFvSURBOGxWZnBua2cxdHhobDJJeDM3bmp0WWZ6d0E4WSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHBzOi8vd3d3LmRlc2FwYWJ1YXJhbi5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1760276644),
('hg21qPue90URwrXuEGlQ5GSgb6trRFuxsd7Aktvs',NULL,'34.247.186.247','Mozilla/5.0 (compatible; NetcraftSurveyAgent/1.0; +info@netcraft.com)','YTozOntzOjY6Il90b2tlbiI7czo0MDoiN3VBQk8yeFNrUDRpdzV3MjE4RW85RXdpNEVpTTNjQWI2T1JweGU5diI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vZGVzYXBhYnVhcmFuLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1760408930),
('HhALIocmAKPrIDd5QwzBUSdjDImGs3Wok0MmlCkl',NULL,'51.195.215.60','Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUE9qZFN3SHRXeUZFUmVQZUpDVEJlWU9xRTdlbUhZTmF0NjRweTZxZyI7czo1OiJlcnJvciI7czoyNzoiRmlsZSBzdXJhdCB0aWRhayBkaXRlbXVrYW4uIjtzOjY6Il9mbGFzaCI7YToyOntzOjM6Im5ldyI7YTowOnt9czozOiJvbGQiO2E6MTp7aTowO3M6NToiZXJyb3IiO319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDk6Imh0dHBzOi8vZGVzYXBhYnVhcmFuLmNvbS9sYXlhbmFuL3N1cmF0L2Rvd25sb2FkLzYiO319',1760339925),
('huwB1MsCcZU5iTnsg5aFuQFKkaOmALEkxlw9N295',NULL,'2a03:2880:f802:14::','meta-externalagent/1.1 (+https://developers.facebook.com/docs/sharing/webmasters/crawler)','YTozOntzOjY6Il90b2tlbiI7czo0MDoiWWtWdFFtWmtMZ0UwMUJTeUVZdVhla3V4S1pXdjJsWm1qd2dMcDY2RSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vZGVzYXBhYnVhcmFuLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1760228974),
('hVdRUAHsydRDbH1f7fsfzVbIRj6cK8nWOMiUoKkC',NULL,'51.75.236.141','Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)','YTozOntzOjY6Il90b2tlbiI7czo0MDoiZjBpQnEwUUxsU2pvcTBESU1VdTBKQjJldHRSNE1WYlp3U1dYM1M3MSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTE6Imh0dHBzOi8vd3d3LmRlc2FwYWJ1YXJhbi5jb20vc3RydWt0dXJhbC9sZW1iYWdhLWJwZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1760397374),
('I95ak4SOATEuEhJv3CfwJJTbSI2h8ctK3I9zLocB',NULL,'52.167.144.197','Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiRmxnbm1LbkJLaTJYMUZ4MjRVdThVTnhwd1VHbnNzOWdic1pyd0V0diI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vZGVzYXBhYnVhcmFuLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1760403995),
('icDN6cyrgRnjPg6UdEPJGk9xRkG3A0BYw2kKYojS',NULL,'93.158.90.71','Mozilla/5.0 (Linux; Android 12; SAMSUNG SM-A415F) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/23.0 Chrome/115.0.0.0 Mobile Safari/537.3','YTozOntzOjY6Il90b2tlbiI7czo0MDoia3ZKOXc4c1dLZnZRY1FGQURZd2x0WHRhNzg3dVFweXRheVczM0dEcyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vZGVzYXBhYnVhcmFuLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1760057725),
('iqnh8VIrDmOG8CIDu1ro4TAswGs9coxQaiL5B3cZ',NULL,'36.41.75.167','Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1','YTozOntzOjY6Il90b2tlbiI7czo0MDoiY21qRHdhV0tuVmc3dlNGdjJwTGJYYjJkRHNtWUhZUmV2WmJleG1udiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vZGVzYXBhYnVhcmFuLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1760403653),
('ITJe3whCWAH7YHcswEj3xxaSSbpjgWreG0AK2tYj',NULL,'92.222.108.118','Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)','YTozOntzOjY6Il90b2tlbiI7czo0MDoiOUdJTnpXOWJWUXZEWk02VlRBNUI2SWxndk1SQTE2S0w3RTNYSWNpOSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHBzOi8vd3d3LmRlc2FwYWJ1YXJhbi5jb20vcG90ZW5zaSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1760407216),
('J5G5Zx1m7fDFzLNF7EzEVXTUH3gNg6kKfF3vvgPB',NULL,'34.243.22.7','Mozilla/5.0 (compatible; NetcraftSurveyAgent/1.0; +info@netcraft.com)','YTozOntzOjY6Il90b2tlbiI7czo0MDoidW9Wb1YwVWptUmcxc0V0bk9JYnl1MVBKS1FtZ3lSOGIzcGZEZE03USI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vZGVzYXBhYnVhcmFuLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1760326201),
('j78QNlq9cxd9WFLMrCxO3Bxe3i0LH3VQU8RFwvsL',NULL,'2a03:4000:40:17a:e48c:25ff:fee4:a06c','Mozilla/5.0 (compatible; Website-info.net-Robot; https://website-info.net/robot)','YTozOntzOjY6Il90b2tlbiI7czo0MDoid2xWMm1UbzZFRWV6OVJrQVhGQ0ZEdmRxYTRnZ05ReXN4YXMxYjRsVCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vZGVzYXBhYnVhcmFuLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1760158536),
('jgQdTgF8bPFmwzZpTwDYd4ebb7xApn4xlsXMCgm5',NULL,'52.49.51.26','Mozilla/5.0 (compatible; NetcraftSurveyAgent/1.0; +info@netcraft.com)','YTozOntzOjY6Il90b2tlbiI7czo0MDoidFh2dHVybUNRSHR1T3g2UHhXS1kwcDVGTnlrTjNpNVh0UDNNUWR2SSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vZGVzYXBhYnVhcmFuLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1760172188),
('jHCeTVYw90Zy8USKvsCRYV3bDWB0W2dmf1bTsH2D',NULL,'199.244.88.218','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiRlptYlR5VXMwOElnb0xIWFNFMU9jVjJCa1BTbXNQQTl2OTZTMk1nbSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vZGVzYXBhYnVhcmFuLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1760219011),
('JmMoVG7xT2G8ifWH3a1YF1nnjlMNgLB152KxZrip',NULL,'40.77.167.5','Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoieWM5WDBoMm1ZNk1NUWR1YkVnYm9JcFFGVWNseUhBVW1PNVlYWDVDSyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHBzOi8vZGVzYXBhYnVhcmFuLmNvbS9sYXlhbmFuL3Byb3Bvc2FsIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1760248341),
('jxQ4SLGcL0CCQJvxVXeew3oL4M9bQiW9ouaY6XeO',NULL,'182.10.98.11','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoieXBNRHZ3SFlyUlRTVkdGdW0ydkxDOUIySkpsTDBteG04MXB3Uk1nbiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vZGVzYXBhYnVhcmFuLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1760369694),
('KkWick87MAabe0OfXzL07vhDPuZBJfnb7lbCWhX7',NULL,'40.77.167.241','Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiYUhqejltWDV5TTdSbm9SOTFoZXFFZGc2bEtjUTFnRElZaUUxVGxDayI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vZGVzYXBhYnVhcmFuLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1760198112),
('Kn8xroTTG5nJRY8LT5c2bTCAY77ayENFdmu1d5B9',NULL,'92.222.108.116','Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)','YTozOntzOjY6Il90b2tlbiI7czo0MDoiRXJ5VzBVZ0FhdE5LN0tUMHJ2TUx2d01IQ1JndjJ4WkhYSkZyUDhlQiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDM6Imh0dHBzOi8vd3d3LmRlc2FwYWJ1YXJhbi5jb20vcHJvZmlsL3NlamFyYWgiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1760404844),
('leO7iPEWTx4Gm3h2VxaM8lomKMavTyLXUT8naV2T',NULL,'103.124.95.244','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36','YToyOntzOjY6Il90b2tlbiI7czo0MDoib0FTVGRid0xFMnd2RGxHMmZ5Vmh2UzFmY0k2bkdiQ3p6TTZMTDdnVCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1760272609),
('lFbHoenSBj0edstbvk0WMZvcF7R2QDP0etrfT0rO',NULL,'92.222.108.118','Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)','YTozOntzOjY6Il90b2tlbiI7czo0MDoieUk0dGV6cnBkZVJxVlBjZTk4VWFLV2VFdFpPajhvRlNVUWpxVG5DNiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHBzOi8vd3d3LmRlc2FwYWJ1YXJhbi5jb20vc3RydWt0dXJhbC9rZXBlbmd1cnVzYW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1760399794),
('m2LvLDwF7GwGblJyT7fOi15Qe1Z4tAKnxxtZAGLD',NULL,'20.98.104.241','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/534.24 (KHTML, like Gecko) Chrome/11.0.696.71 Safari/534.24','YTozOntzOjY6Il90b2tlbiI7czo0MDoiSTBWUUJzV2RTeHFVZEdOMGxtYWRWeVNLcG9SdzJYVUJPeXZScHNPZyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHBzOi8vd3d3LmRlc2FwYWJ1YXJhbi5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1760344650),
('mlgMkYhsKzBdGrj1jhysn4yO0wO2ZGcWU2nJPwE8',NULL,'119.45.20.16','Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1','YTozOntzOjY6Il90b2tlbiI7czo0MDoiMER5RjZDWEl0T3E2cEhFQnlzRW1rYmRSWjBZejFCdnB5ZHU3NEF0TCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHBzOi8vd3d3LmRlc2FwYWJ1YXJhbi5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1760417501),
('mzzkGXyseywO3mWHGhPADN1TXMwOJJAIglm3gU45',NULL,'66.249.73.98','Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.7339.207 Mobile Safari/537.36 (compatible; GoogleOther)','YTozOntzOjY6Il90b2tlbiI7czo0MDoicFJvZHJ4bHJveHBMVTFtMHBqZm5vWXpyczFmOWtKejRNelREdHc0cCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHBzOi8vZGVzYXBhYnVhcmFuLmNvbS9sYXlhbmFuL3Byb3Bvc2FsL2Rvd25sb2FkLzMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1760028964),
('n9w6oUGZgQKXXpKuL3DUSB4BhYpXZvaajzqJ7s8N',NULL,'54.155.248.168','Mozilla/5.0 (compatible; NetcraftSurveyAgent/1.0; +info@netcraft.com)','YTozOntzOjY6Il90b2tlbiI7czo0MDoiZTV4STVLSVNrVkNWTEZ1UlEwVWwzV203ODJkelM1RHc0bTE0VGpNVCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHBzOi8vd3d3LmRlc2FwYWJ1YXJhbi5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1760192004),
('naBJ4mhbScGY9WhACWpoIB5bE8CWTSNn7du1vD94',NULL,'95.108.213.251','Mozilla/5.0 (compatible; YandexBot/3.0; +http://yandex.com/bots)','YTozOntzOjY6Il90b2tlbiI7czo0MDoiT1NxQzNER01EeVdVV29PM1lLNXBubVdoM2RnMVhkeWhiR1FJWG5pMiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vZGVzYXBhYnVhcmFuLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1760350877),
('NdCzSZ4LJzgJQLB8b8gqDDywVDpCAOB0xIguZmRt',NULL,'114.124.144.103','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiVU5YeEVkektVZk1MV2hWTFJhWnFqZG9IZjBWY2l1V0JnZmV6TDlOciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHBzOi8vZGVzYXBhYnVhcmFuLmNvbS9sYXlhbmFuL3Byb3Bvc2FsIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1760269196),
('NWdhm4wkpTn7oVtPlOw44A6KKkUqsTj1HXYPpmro',NULL,'54.37.118.95','Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUkZmZXNwMDJicjBLeVF1UlpkWnpPZ2xlYXBrQ0lHNldqRlg3M0o0YSI7czo1OiJlcnJvciI7czoyNzoiRmlsZSBzdXJhdCB0aWRhayBkaXRlbXVrYW4uIjtzOjY6Il9mbGFzaCI7YToyOntzOjM6Im5ldyI7YTowOnt9czozOiJvbGQiO2E6MTp7aTowO3M6NToiZXJyb3IiO319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTM6Imh0dHBzOi8vd3d3LmRlc2FwYWJ1YXJhbi5jb20vbGF5YW5hbi9zdXJhdC9kb3dubG9hZC82Ijt9fQ==',1760424327),
('O5s5gcTcnk9flXqb5ZBh7aYDMxsk5DJEE0C1k11e',NULL,'109.172.93.44','Mozilla/5.0 (X11; Linux x86_64) Chrome/19.0.1084.9 Safari/536.5','YTozOntzOjY6Il90b2tlbiI7czo0MDoic1lUNDVCQ2N0NVlLcmRSbjF6QkNhOU1pRUZpaXhxYXdsM1FoUGQ0cyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vZGVzYXBhYnVhcmFuLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1760065373),
('oBghv3pNmMjZPwmJRsAKr3g5Th7ECRUQqnDJcUzg',NULL,'87.250.224.127','Mozilla/5.0 (compatible; YandexBot/3.0; +http://yandex.com/bots)','YTozOntzOjY6Il90b2tlbiI7czo0MDoiT0dYYWQycExqMDQ3bzNYV3ZaSXF1Y09PVUYySG9lOGR6cUdERUtTRyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vZGVzYXBhYnVhcmFuLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1760396298),
('OgJI5rOdBzvb5D8ZMXsCUa8BuHNbU1wz1AZyqZuT',NULL,'198.244.183.197','Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)','YTozOntzOjY6Il90b2tlbiI7czo0MDoicFhFYTBYZlBFWmdXU1hPZFBxUksxZ3hZVmhzdFJiYU53MXBZcWV2SSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHBzOi8vZGVzYXBhYnVhcmFuLmNvbS9sYXlhbmFuL3Byb3Bvc2FsL2Rvd25sb2FkLzMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1760317868),
('oiKaaxMnSL96JGAh4MSFwtyLZxLg4CyHhBKIduYk',NULL,'138.246.253.7','quic-go-HTTP/3','YToyOntzOjY6Il90b2tlbiI7czo0MDoiS2k4QUd2eldlQ05kNWthcUJMYU5XVEYwNzA1Y3ZRQk1iell0UGh0RCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1760111776),
('oJcrHGh75JWK5BIvogu0GhO3v4Mv8X2vB3pFS8oF',NULL,'2405:9800:b660:8e0c:6bf8:cd3f:4a95:1149','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiUEU1UjhxVWJycnpXQkhjSzIzcEw4VkZNenlvRk1RZlpSeGFpa1RsNSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vZGVzYXBhYnVhcmFuLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1760309031),
('OMKqQqAXmQd06KWWNHSBR0SHQAy2Qnw2LZV8TfDm',NULL,'95.108.213.234','Mozilla/5.0 (compatible; YandexBot/3.0; +http://yandex.com/bots)','YTozOntzOjY6Il90b2tlbiI7czo0MDoieXozWEFWUHVXM2NSRHhSUnRRRGVaeDl6SUo1aXBoVDJGMUZkRnpsYSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vZGVzYXBhYnVhcmFuLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1760261611),
('oPS5rxxVNZJF5dUVwiSPDXcK9NPDuaMxHZL0nViT',NULL,'213.180.203.192','Mozilla/5.0 (compatible; YandexBot/3.0; +http://yandex.com/bots)','YTozOntzOjY6Il90b2tlbiI7czo0MDoidjhqUk5nM0tqYm9jd0dFdFBJQXJZZzdVanA4R2U2REhteldjMUd0MiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vZGVzYXBhYnVhcmFuLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1760214452),
('PE2TkbMzhVY4dxKfPTnzdQ06RwvZcMwPK02NPX6d',NULL,'198.244.183.158','Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)','YTo0OntzOjY6Il90b2tlbiI7czo0MDoidnAwR3g2cWFUb1NJRFRjaElPQ05mb2JOVWVWWVY5NW5mbm93SHZUWCI7czo1OiJlcnJvciI7czoyNzoiRmlsZSBzdXJhdCB0aWRhayBkaXRlbXVrYW4uIjtzOjY6Il9mbGFzaCI7YToyOntzOjM6Im5ldyI7YTowOnt9czozOiJvbGQiO2E6MTp7aTowO3M6NToiZXJyb3IiO319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDk6Imh0dHBzOi8vZGVzYXBhYnVhcmFuLmNvbS9sYXlhbmFuL3N1cmF0L2Rvd25sb2FkLzciO319',1760326609),
('pmwArGaKRUTx10A4uU3FN3N6KrnO4GHMe7UbdsLt',NULL,'138.246.253.7','quic-go-HTTP/3','YToyOntzOjY6Il90b2tlbiI7czo0MDoiTTVDdzVrck4zNXNZSmx2WVBia081V1p1M0pweFFoOXhjbjlMYmpBTCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1760094168),
('PNNZV6MqxcABtBYJxm77ZuxApwioQeEJOnOP0zRZ',NULL,'87.250.224.40','Mozilla/5.0 (compatible; YandexBot/3.0; +http://yandex.com/bots)','YTozOntzOjY6Il90b2tlbiI7czo0MDoiU2ZOMFRqNGVUV3RjRmFvZkh6WUd1aDVXYU9KVGlsQUZpTEdKd2VyOCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vZGVzYXBhYnVhcmFuLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1760121985),
('pQRV3Nr1lphbfUeS2rqntPHUqD0iJFCqmQKfDjMr',NULL,'198.211.98.71','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiTFdJMmREanBXVU1DbjZ3NHFkTkdlV0RRNENYMUZxUVZPazR3ek01ZyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vZGVzYXBhYnVhcmFuLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1760340473),
('pYHBev2xET5q53oWMABLWSPIecINHINdYrEaXxGs',NULL,'2a05:b40:0:718:56ab:3aff:fe8b:42c2','Mozilla/5.0 (Linux; Android 10; Redmi Note 8 Pro) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.91 Mobile Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiaWRKYjJhV29oMEF0ZlFJbk5XblJIYTNkMzdrWndTbTdiTmlwNkNrVCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vZGVzYXBhYnVhcmFuLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1760306012),
('qHrbbSM8e2kBquSGbWZvvvbLVHGBUqvKDXxdo63K',NULL,'178.128.226.243','Mozilla/5.0 (X11; Linux x86_64; rv:139.0) Gecko/20100101 Firefox/139.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoiOTJreUNzazBNRWZVU1JsUGZzT292Wjl4ZTI3Z094R1pWT2pjbzgwTSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vZGVzYXBhYnVhcmFuLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1760168103),
('qJ3tMfluDo2oHgZfqF39gbvOWhOlLK3SQiiB0s8Y',NULL,'34.87.140.129','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36','YToyOntzOjY6Il90b2tlbiI7czo0MDoiTGNCUXhrMzQ0MmF2S1pGV0d3TERUOEdsNjNYYzNmbUkxd0NEakZ1aSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1760376555),
('raSCfBKkXSsDCa800Y5GZW9kzki5d8JHRHNJEKDo',NULL,'20.98.104.241','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/534.24 (KHTML, like Gecko) Chrome/11.0.696.71 Safari/534.24','YTozOntzOjY6Il90b2tlbiI7czo0MDoiU1A1dTRUSVhRUXNYWUJiVWdmWWpOaFZTVFZzTXBTYVNkOGpXY3dXeSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vZGVzYXBhYnVhcmFuLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1760344187),
('RAz5fi3WiJrH0bSxXJDUXvmJ0s3hAamSETKgIuYY',NULL,'43.135.180.120','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.3','YTozOntzOjY6Il90b2tlbiI7czo0MDoibnZGY25yYmtmMTR1TFd0Q29iWndOejFFMTRBbUNLaWg5YlNxZTN4eCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vZGVzYXBhYnVhcmFuLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1760076154),
('rDMe9t3TfOC6JbWUHCRqgVHdEMqQwxXimZx8K5ga',NULL,'2403:6200:88a4:4416::28','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiWmVZMnFsVXNuTzNTUUZjWjlYVzI4cXROakxvVWZlQU5Ua0xtUllTdyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vZGVzYXBhYnVhcmFuLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1760309406),
('Rns8aM46VBX6dnGpwtNxaZrROpVArJBbAv8UahHh',NULL,'94.23.188.201','Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)','YTozOntzOjY6Il90b2tlbiI7czo0MDoiZXVnSllEZ1VhUHNkRTdwRkpWTnJtYVBqS3RITUdwVXBlS0JrZXhvQiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTM6Imh0dHBzOi8vd3d3LmRlc2FwYWJ1YXJhbi5jb20vbGF5YW5hbi9zdXJhdC9kb3dubG9hZC80Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1760429363),
('s0SKlpYJseU2maesFZkdvlfU2gsGMB6k0HvavRky',NULL,'2a02:4780:6:c0de::8','Go-http-client/2.0','YToyOntzOjY6Il90b2tlbiI7czo0MDoidjRUZjF3eHYzWEgzcndYYkFWUmJRQ1M0YlRyMlB6NXY4cFA1NUVDMyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1760064692),
('S3cAypPu2IUB2zbRwar4ReIwgdJhr0yOPW1XpID7',NULL,'5.39.109.178','Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)','YTozOntzOjY6Il90b2tlbiI7czo0MDoiME9ZM0YzN3NiRXBEazVlYWZWRkVaT1lBNG55YTRRdlhaZEU1RzZlbSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTM6Imh0dHBzOi8vd3d3LmRlc2FwYWJ1YXJhbi5jb20vbGF5YW5hbi9zdXJhdC9kb3dubG9hZC81Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1760426966),
('sLkZPmTykcPNM1AplAws7IGQkDxK0Z4aSnNA9Q2z',NULL,'2a03:2880:f802:56::','meta-externalagent/1.1 (+https://developers.facebook.com/docs/sharing/webmasters/crawler)','YTozOntzOjY6Il90b2tlbiI7czo0MDoibUl4a3YzaFVUdWJqYXRvMVRGYjVyM2g1YkhIZVlIMjV6TGZqdG5sZyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHBzOi8vd3d3LmRlc2FwYWJ1YXJhbi5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1760429083),
('sMjn1VZ6Sac7y222FEfx4bJfynHQ1r5FX4fEtsyn',NULL,'2a02:4780:6:c0de::8','Go-http-client/2.0','YToyOntzOjY6Il90b2tlbiI7czo0MDoibVhodHJtMDBmN1hQVkFIQmlHSXVzNXZMQXg0NHZJanBxbWJFZ0gzNiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1760332356),
('SpgjAY90SzU1B1GgOCyv0vBBLQSuDNz5Fsrabtf5',NULL,'198.244.183.159','Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)','YTozOntzOjY6Il90b2tlbiI7czo0MDoiMHJ6N3hKbFVFa2lVVks3eGMyeGdyam9YZDRzR0h0MHc5OGo0WTdwNCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vZGVzYXBhYnVhcmFuLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1760432070),
('TdkkRZ0cQlmueqM7ibbK3NdzCo9GxYr5QpUiKs5p',NULL,'182.10.161.146','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiNVpNMnhGeWNYZzl6WFhoSnlxOUo0OHNXY2dBdlNsT2FCRHRaRm5PYSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vZGVzYXBhYnVhcmFuLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1760148546),
('TqmU9snNnzLD8Y9cNPUPWFMlWe2mLtALRyvHoDz8',NULL,'3.253.236.241','Mozilla/5.0 (compatible; NetcraftSurveyAgent/1.0; +info@netcraft.com)','YTozOntzOjY6Il90b2tlbiI7czo0MDoiZmZwbDZScmtqTkQxdzRGV2lURDZPRktwMFVFR2RuYWdHcGQ2SmlxWiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHBzOi8vd3d3LmRlc2FwYWJ1YXJhbi5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1760319015),
('UnLBMRWnz6nJvD5yvGT6w6XTqxkWT2GkVV8aAiHD',NULL,'198.244.226.168','Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)','YTozOntzOjY6Il90b2tlbiI7czo0MDoiN2hlcnQ0emNWd1NvaGJtQTlLcmJKalBpeDBFV1FuclNrVGloVkZHWSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vZGVzYXBhYnVhcmFuLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1760145885),
('vHsMRA1Fdfb07H30wZhP1ovpbHOv8uALB1s4F5EC',NULL,'64.227.146.188','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiQVB0OTFDNXVOOW9SSkhvcTBQTkdqVnFNYTVUckk1Ym93RXVlcmlSUyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHBzOi8vd3d3LmRlc2FwYWJ1YXJhbi5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1760355950),
('VLvoKWO9qNXdxzqNfyhMViKmTNFY0TKvX1QqzmLq',NULL,'95.108.213.127','Mozilla/5.0 (compatible; YandexBot/3.0; +http://yandex.com/bots)','YTozOntzOjY6Il90b2tlbiI7czo0MDoiTGFDVlV0SlY3T0l0Z3BQMnpLNVhZS1kyb3pZWVFVOVVtWkxOajc0VCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vZGVzYXBhYnVhcmFuLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1760077913),
('WNeNdvEGqLKCQveq6XSsmhgcuLojYPybD9H8UpVy',NULL,'34.207.115.173','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_5) AppleWebKit/602.1.50 (KHTML, like Gecko) Version/10.0 Safari/602.1.50','YTozOntzOjY6Il90b2tlbiI7czo0MDoiYjJuVE9wSElTd0oxRFZhWXA0eDdJQmQ4VUd1MVN0ZnVyNWptZFVkNSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vZGVzYXBhYnVhcmFuLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1760133173),
('xaf8Bh66FzOTRCzrRTY5vGv2RL0QTPCFH4bAD7qJ',NULL,'213.180.203.84','Mozilla/5.0 (compatible; YandexBot/3.0; +http://yandex.com/bots)','YTozOntzOjY6Il90b2tlbiI7czo0MDoibzB6Z0toaXZqcUwzMXFaNXZ5bTQyR2E1V2Rrc1RaVnE0WEw3SGV4ZiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vZGVzYXBhYnVhcmFuLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1760306312),
('XI2EZVjO1PZqYMYelt6mD5XWPVZYbSoSpfdiVzIY',NULL,'213.180.203.76','Mozilla/5.0 (compatible; YandexBot/3.0; +http://yandex.com/bots)','YTozOntzOjY6Il90b2tlbiI7czo0MDoiY1RDWnFNNzd3WDB3bEV1MEV2NzQweWU4VmQ2WE5YOGhZM3dNazFLYyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vZGVzYXBhYnVhcmFuLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1760032036),
('xTInlOYlKNMsGNglAnjMJ7znyoG2qHg8zZMCJ1jC',NULL,'37.59.204.147','Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZTlzYmNLbDFnRlRMMml6eVRpbUNuaGVieEZnS01FWUw1SjNCc2I1ZCI7czo1OiJlcnJvciI7czoyNzoiRmlsZSBzdXJhdCB0aWRhayBkaXRlbXVrYW4uIjtzOjY6Il9mbGFzaCI7YToyOntzOjM6Im5ldyI7YTowOnt9czozOiJvbGQiO2E6MTp7aTowO3M6NToiZXJyb3IiO319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTM6Imh0dHBzOi8vd3d3LmRlc2FwYWJ1YXJhbi5jb20vbGF5YW5hbi9zdXJhdC9kb3dubG9hZC83Ijt9fQ==',1760421925),
('YMCgaf1DwHNVniDmG7bwJspHtITY3KgimmyHUtEJ',NULL,'94.191.43.82','Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1','YTozOntzOjY6Il90b2tlbiI7czo0MDoibUZwVnQyRlZ5ZU96TWoybTltc1BqT2xMV0JXSGtvSXlxM1RYQkdEeCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHBzOi8vd3d3LmRlc2FwYWJ1YXJhbi5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1760247445),
('z6qazKrBof9wzrDzixgu2ZCNvCwSazybyiWlrZAi',NULL,'37.59.204.138','Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)','YTozOntzOjY6Il90b2tlbiI7czo0MDoiYjQzNGZJZWVWS0wxZmUzZTJMaHVDdmNjWjB1amQ5Q1BiOWhMMk8wbyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTY6Imh0dHBzOi8vd3d3LmRlc2FwYWJ1YXJhbi5jb20vbGF5YW5hbi9wcm9wb3NhbC9kb3dubG9hZC8zIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1760419587);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
commit;

--
-- Table structure for table `slide`
--

DROP TABLE IF EXISTS `slide`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `slide` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `gambar` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `slide`
--

/*!40000 ALTER TABLE `slide` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `slide` VALUES
(3,'slide/1758250472_desa-pabuaran-min.jpg',1,'2025-09-19 02:54:32','2025-09-19 02:54:32'),
(4,'slide/1758250483_kantor-desa-min.png',1,'2025-09-19 02:54:43','2025-09-19 02:54:43'),
(5,'slide/1758250496_kebun-min.png',1,'2025-09-19 02:54:56','2025-09-19 02:54:56');
/*!40000 ALTER TABLE `slide` ENABLE KEYS */;
commit;

--
-- Table structure for table `statistik`
--

DROP TABLE IF EXISTS `statistik`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `statistik` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `icon` varchar(255) NOT NULL,
  `count` int(11) NOT NULL,
  `label` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `statistik`
--

/*!40000 ALTER TABLE `statistik` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `statistik` VALUES
(2,'bi bi-gender-female',6561,'Perempuan','2025-09-05 07:55:01','2025-09-10 19:33:17'),
(3,'bi bi-gender-male',6602,'Laki-laki','2025-09-05 10:01:00','2025-09-10 19:33:06'),
(4,'bi bi-people-fill',13163,'Jumlah Penduduk','2025-09-10 19:34:48','2025-09-10 19:34:48'),
(5,'bi-house-fill',0,'Kepala Keluarga','2025-09-10 19:35:05','2025-09-10 19:35:05'),
(6,'bi bi-flower1',146,'Petani/Perkebunan','2025-09-10 19:35:23','2025-09-10 19:35:23'),
(7,'bi bi-shop',293,'Pedagang','2025-09-10 19:35:39','2025-09-10 19:35:39'),
(8,'bi bi-person-badge',415,'Wiraswasta','2025-09-10 19:36:03','2025-09-10 19:36:03'),
(9,'bi bi-box-seam-fill',3318,'Buruh Harian Lepas','2025-09-10 19:36:22','2025-09-10 19:36:22');
/*!40000 ALTER TABLE `statistik` ENABLE KEYS */;
commit;

--
-- Table structure for table `struktural`
--

DROP TABLE IF EXISTS `struktural`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `struktural` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `kategori` enum('kepengurusan','bpd') NOT NULL DEFAULT 'kepengurusan',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `struktural`
--

/*!40000 ALTER TABLE `struktural` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `struktural` VALUES
(3,'AYOH YOHANA','Kepala Desa','struktural/68ba2ee5de5ac-ayohyohana.png','kepengurusan','2025-09-04 17:29:25','2025-09-04 17:29:25'),
(4,'AHMAD SOFYAN','Sekretaris Desa','struktural/68ccc78174a42-ahmadsofyan.png','kepengurusan','2025-09-04 17:40:24','2025-09-19 03:01:21'),
(5,'ERWIN AKBAR','Kasi Pemerintahan','struktural/68ccc68e06136-erwinakbar.png','kepengurusan','2025-09-10 19:17:47','2025-09-19 02:57:18'),
(6,'SAEFUL YAMANI','Kasi Kesra','struktural/68ccc7aee4725-saefulyamani.png','kepengurusan','2025-09-10 19:18:22','2025-09-19 03:02:06'),
(7,'YAYAH ALFIAH','Kasi Pelayanan','struktural/68ccc7b98cf33-yayahalfiah.png','kepengurusan','2025-09-10 19:18:44','2025-09-19 03:02:17'),
(8,'BIMA NANDA SAPUTRA','Kaur Perencanaan','struktural/68ccc7c963858-bimanandasaputra.png','kepengurusan','2025-09-10 19:19:02','2025-09-19 03:02:33'),
(9,'AHMAD','Kaur Umum dan TU','struktural/68ccc7d4b3578-ahmad.png','kepengurusan','2025-09-10 19:19:23','2025-09-19 03:02:44'),
(10,'MIA DEWI','Kaur Keuangan',NULL,'kepengurusan','2025-09-10 19:19:46','2025-09-10 19:19:46'),
(11,'MUHAMAD JAMALUDIN','Kepala Dusun Satu','struktural/68ccc7ed28959-muhamadjamaludin.png','kepengurusan','2025-09-10 19:20:13','2025-09-19 03:03:09'),
(12,'SAEPUL ANWAR','Kepala Dusun Dua',NULL,'kepengurusan','2025-09-10 19:20:29','2025-09-10 19:20:29'),
(13,'ARTAWI','Kepala Dusun Tiga','struktural/68ccce04d8ae3-artawi.png','kepengurusan','2025-09-10 19:21:19','2025-09-19 03:29:08'),
(14,'TASYA','Staf Pembantu',NULL,'kepengurusan','2025-09-10 19:21:31','2025-09-10 19:21:31'),
(15,'UTANG WIJAYA','Staf Pembantu',NULL,'kepengurusan','2025-09-10 19:21:51','2025-09-10 19:21:51'),
(16,'ARWAN .SH','Ketua BPD',NULL,'bpd','2025-09-10 19:29:33','2025-09-10 19:29:33'),
(17,'DAHLAN','Wakil Ketua BPD',NULL,'bpd','2025-09-10 19:29:46','2025-09-10 19:29:46'),
(18,'HASAN BASRI','Sekretaris BPD',NULL,'bpd','2025-09-10 19:30:00','2025-09-10 19:30:00'),
(19,'MUHAMAD ZEIN','Ketua Bidang BPD',NULL,'bpd','2025-09-10 19:30:19','2025-09-10 19:30:19'),
(20,'EMANG','Anggota BPD',NULL,'bpd','2025-09-10 19:30:29','2025-09-10 19:30:29'),
(21,'RUDIANSYAH','Anggota BPD',NULL,'bpd','2025-09-10 19:30:39','2025-09-10 19:30:39'),
(22,'KOKOM KOMARIAH','Ketua Bidang BPD',NULL,'bpd','2025-09-10 19:30:56','2025-09-10 19:30:56'),
(23,'SUNARYA','Anggota BPD',NULL,'bpd','2025-09-10 19:31:08','2025-09-10 19:31:08'),
(24,'FIRMANSYAH','Anggota BPD',NULL,'bpd','2025-09-10 19:31:18','2025-09-10 19:31:18');
/*!40000 ALTER TABLE `struktural` ENABLE KEYS */;
commit;

--
-- Table structure for table `tamplate_surat`
--

DROP TABLE IF EXISTS `tamplate_surat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `tamplate_surat` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_template` varchar(255) NOT NULL,
  `kategori` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `file_path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tamplate_surat`
--

/*!40000 ALTER TABLE `tamplate_surat` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `tamplate_surat` VALUES
(4,'Master Proposal','Proposal','Tamplate Pengajuan Proposal','tamplate_surat/1757080683_master_proposal.doc','2025-09-05 06:52:34','2025-09-05 06:58:03'),
(5,'Surat Pernyataan Kesediaan Numpang KK','Surat Pernyartaan','Surat Pernyataan Kesediaan Numpang KK: surat yang menyatakan persetujuan seseorang menumpang di Kartu Keluarga (KK) orang lain.','tamplate_surat/1757080857_surat_pernyataan_kesediaan_numpang_kk.pdf','2025-09-05 07:00:57','2025-09-05 07:01:34'),
(6,'SP Alamat Tujuan','Surat Pernyartaan',NULL,'tamplate_surat/1757557605_sp_alamat_tujuan.pdf','2025-09-10 19:26:45','2025-09-10 19:26:45'),
(7,'Surat Pernyataan Kesediaan Numpang KK','Surat Pernyartaan',NULL,'tamplate_surat/1757557629_surat_pernyataan_kesediaan_numpang_kk.pdf','2025-09-10 19:27:09','2025-09-10 19:27:09');
/*!40000 ALTER TABLE `tamplate_surat` ENABLE KEYS */;
commit;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

/*!40000 ALTER TABLE `users` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `users` VALUES
(1,'Admin Desa','admin@desa.com',NULL,'$2y$12$CfkK7daCvk5xErcgygjwRu6Bv7I3v0Disiv20gPfUMYkunZErBCR6',NULL,'2025-09-04 08:19:35','2025-09-04 08:19:35');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
commit;

--
-- Dumping routines for database 'u723596765_desa_pabuaran'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*M!100616 SET NOTE_VERBOSITY=@OLD_NOTE_VERBOSITY */;

-- Dump completed on 2025-10-14  9:08:27
