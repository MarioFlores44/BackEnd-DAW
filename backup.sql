-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.0.30 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para pt07_mario_flores
CREATE DATABASE IF NOT EXISTS `pt07_mario_flores` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `pt07_mario_flores`;

-- Volcando estructura para tabla pt07_mario_flores.articles
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `article` text COLLATE utf8mb4_general_ci NOT NULL,
  `user` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla pt07_mario_flores.articles: ~26 rows (aproximadamente)
INSERT INTO `articles` (`id`, `article`, `user`, `updated_at`) VALUES
	(1, 'Bola de Drac:', NULL, '2024-03-15 14:48:44'),
	(2, 'Anem-la a buscar, la bola del drac.', NULL, NULL),
	(3, 'Envoltada en un misteri, és un gran secret.', NULL, NULL),
	(4, 'Anem-la a agafar, la bola del drac.', NULL, NULL),
	(5, 'Entre tots els misteris, el més divertit.', NULL, NULL),
	(6, 'És un món d\'encís, un país encantat', NULL, NULL),
	(7, 'on, contents, tots nosaltres, ara hi farem cap.', NULL, NULL),
	(8, 'En moltes coses precioses ara ens podrem transformar,', NULL, NULL),
	(9, 'travessar l\'espai amb un núvol i, així, poder viatjar.', NULL, NULL),
	(10, 'L\'aventura comença ara:', NULL, NULL),
	(11, 'anem-la a buscar, anem, anem, anem, anem!', NULL, NULL),
	(12, 'Anirem per mars i muntanyes, i per tot l\'univers,', NULL, NULL),
	(13, 'intentant aconseguir la bola d\'un drac meravellós,', NULL, NULL),
	(14, 'i, així, la bola del drac,', NULL, NULL),
	(15, 'per fi serà nostra.', NULL, NULL),
	(16, 'Intentem-ho sense cap por:', NULL, NULL),
	(17, 'units a Goku no hi ha cap perill.', NULL, NULL),
	(18, 'Els meus cops i el meu kame-hame', NULL, NULL),
	(19, 'a tots impressionen sempre. Ara ho veureu.', NULL, NULL),
	(20, 'Anem-la a caçar, la bola del drac.', NULL, NULL),
	(21, 'Ens durà la sort: no es pot escapar.', NULL, NULL),
	(22, 'Anem-la a trobar, la bola del drac.', NULL, NULL),
	(23, 'Serà per a nosaltres si allarguem la mà.', NULL, NULL),
	(24, 'És un món d\'encís, un país encantat', NULL, NULL),
	(25, 'on, contents, tots nosaltres, ara hi farem cap.', NULL, NULL);

-- Volcando estructura para tabla pt07_mario_flores.failed_jobs
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

-- Volcando datos para la tabla pt07_mario_flores.failed_jobs: ~0 rows (aproximadamente)

-- Volcando estructura para tabla pt07_mario_flores.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla pt07_mario_flores.migrations: ~7 rows (aproximadamente)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2019_08_19_000000_create_failed_jobs_table', 1),
	(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(3, '2016_06_01_000001_create_oauth_auth_codes_table', 2),
	(4, '2016_06_01_000002_create_oauth_access_tokens_table', 2),
	(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 2),
	(6, '2016_06_01_000004_create_oauth_clients_table', 2),
	(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 2);

-- Volcando estructura para tabla pt07_mario_flores.oauth_access_tokens
CREATE TABLE IF NOT EXISTS `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `client_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla pt07_mario_flores.oauth_access_tokens: ~0 rows (aproximadamente)

-- Volcando estructura para tabla pt07_mario_flores.oauth_auth_codes
CREATE TABLE IF NOT EXISTS `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `client_id` bigint unsigned NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_auth_codes_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla pt07_mario_flores.oauth_auth_codes: ~0 rows (aproximadamente)

-- Volcando estructura para tabla pt07_mario_flores.oauth_clients
CREATE TABLE IF NOT EXISTS `oauth_clients` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla pt07_mario_flores.oauth_clients: ~0 rows (aproximadamente)
INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
	(1, NULL, 'Laravel Personal Access Client', 'VkhrbHo6lnudpUhT7PE4Ospd9TOFHPYfOdT0JkFa', NULL, 'http://localhost', 1, 0, 0, '2024-03-20 13:54:16', '2024-03-20 13:54:16'),
	(2, NULL, 'Laravel Password Grant Client', 'DoGa3QzzjvVKI00D1tpzfU8VEcZEWMfTMvN5hF4j', 'users', 'http://localhost', 0, 1, 0, '2024-03-20 13:54:17', '2024-03-20 13:54:17');

-- Volcando estructura para tabla pt07_mario_flores.oauth_personal_access_clients
CREATE TABLE IF NOT EXISTS `oauth_personal_access_clients` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `client_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla pt07_mario_flores.oauth_personal_access_clients: ~0 rows (aproximadamente)
INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
	(1, 1, '2024-03-20 13:54:17', '2024-03-20 13:54:17');

-- Volcando estructura para tabla pt07_mario_flores.oauth_refresh_tokens
CREATE TABLE IF NOT EXISTS `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla pt07_mario_flores.oauth_refresh_tokens: ~0 rows (aproximadamente)

-- Volcando estructura para tabla pt07_mario_flores.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `token` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla pt07_mario_flores.password_reset_tokens: ~2 rows (aproximadamente)
INSERT INTO `password_reset_tokens` (`id`, `email`, `token`, `created_at`) VALUES
	(3, 'xmartin@sapalomera.cat', '$2y$12$51T61MddQxECNw4MaW7aguAZPlLCIou/RWWtB9i0mki4hkZXKU5AK', '2024-03-15 16:15:07');

-- Volcando estructura para tabla pt07_mario_flores.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla pt07_mario_flores.personal_access_tokens: ~0 rows (aproximadamente)

-- Volcando estructura para tabla pt07_mario_flores.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `password` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `google_id` varchar(150) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `token_git` text COLLATE utf8mb4_general_ci,
  `remember_token` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla pt07_mario_flores.users: ~2 rows (aproximadamente)
INSERT INTO `users` (`id`, `name`, `email`, `password`, `updated_at`, `created_at`, `google_id`, `token_git`, `remember_token`) VALUES
	(1, 'Xavier', 'xmartin@sapalomera.cat', '$2y$12$ULoD9C1iOEYOPz6M0XlWP.MJLIeAQ7/W.U/GKzxeKHrNf7C0/TVRW', '2024-03-15 15:17:39', '2024-03-08 16:13:34', NULL, NULL, NULL),
	(2, 'Mario', 'm.flores2@sapalomera.cat', '$2y$12$CKExCwKscOlsHY.2Nt.DYumr2p.LUfa2n9hnOhqfQwfu8Qc.o1mxm', '2024-03-18 16:52:41', '2024-03-13 19:00:40', NULL, NULL, 'k5QsZhPBjyYw2tw4MS0H9eGP2UlwCW0IltkR6wpMjNnJLmiov6WR6IcEoZQx');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
