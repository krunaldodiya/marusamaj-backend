-- -------------------------------------------------------------
-- TablePlus 1.0(166)
--
-- https://tableplus.com/
--
-- Database: marusamaj
-- Generation Time: 2018-12-26 17:47:25.1350
-- -------------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


DROP TABLE IF EXISTS `wallets`;
CREATE TABLE `wallets` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `balance` bigint(20) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `wallets_user_id_foreign` (`user_id`),
  CONSTRAINT `wallets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `wallet_transactions`;
CREATE TABLE `wallet_transactions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `wallet_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `amount` int(11) NOT NULL,
  `transaction_id` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_type` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `wallet_transactions_wallet_id_foreign` (`wallet_id`),
  CONSTRAINT `wallet_transactions_wallet_id_foreign` FOREIGN KEY (`wallet_id`) REFERENCES `wallets` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caste_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_caste_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `secondary_mobile` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Male',
  `dob` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marital_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Single',
  `education` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `occupation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caste_updated` tinyint(1) NOT NULL DEFAULT '0',
  `profile_updated` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_uid_unique` (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `sub_castes`;
CREATE TABLE `sub_castes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `caste_id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `show_mobile` tinyint(1) NOT NULL DEFAULT '0',
  `show_birthday` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `relatives`;
CREATE TABLE `relatives` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `from` int(11) NOT NULL,
  `to` int(11) NOT NULL,
  `from_relation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to_relation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `events`;
CREATE TABLE `events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `castes`;
CREATE TABLE `castes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `wallets` (`id`, `user_id`, `balance`, `created_at`, `updated_at`) VALUES ('1', '1', '0', '2018-12-26 16:42:33', '2018-12-26 16:42:33'),
('2', '2', '0', '2018-12-26 16:46:00', '2018-12-26 16:46:00'),
('3', '3', '0', '2018-12-26 17:38:27', '2018-12-26 17:38:27'),
('4', '4', '0', '2018-12-26 17:41:11', '2018-12-26 17:41:11'),
('5', '5', '0', '2018-12-26 17:42:54', '2018-12-26 17:42:54');

INSERT INTO `users` (`id`, `uid`, `name`, `father_city`, `mother_city`, `caste_id`, `sub_caste_id`, `mobile`, `secondary_mobile`, `gender`, `dob`, `marital_status`, `education`, `occupation`, `address`, `avatar`, `caste_updated`, `profile_updated`, `remember_token`, `created_at`, `updated_at`) VALUES ('1', NULL, 'Krunal Arvindkumar Dodiya', 'Bhailakui', 'Kapadwanj', '1', '1', '9426726815', NULL, 'Male', '27-06-1987', 'Single', 'B. Com Graduate', 'Freelance Web Developer', NULL, NULL, '1', '1', NULL, '2018-12-26 16:42:33', '2018-12-26 16:43:10'),
('2', NULL, 'Hetal Arvindkumar Dodiya', 'Bhailakui', 'Kapadwanj', '1', '1', '9426726815', NULL, 'Female', '10-08-1991', 'Single', 'M. Com Graduate', 'Government Job', NULL, NULL, '1', '1', NULL, '2018-12-26 16:46:00', '2018-12-26 16:47:04'),
('3', NULL, 'Geeta', 'Kevadiya', 'Karkariya', '1', '1', '9824506933', NULL, 'Female', '07-06-1988', 'Single', 'B. C. A', 'Private Job', NULL, NULL, '1', '1', NULL, '2018-12-26 17:38:27', '2018-12-26 17:39:53'),
('4', NULL, 'Bhavin Kanubhai Dodiya', 'Bhailakui', 'Kaniyel', '1', '1', '8980062273', NULL, 'Male', '04-10-1992', 'Single', 'M. C. A', 'Tata Capital Finance Services Ltd', NULL, NULL, '1', '1', NULL, '2018-12-26 17:41:11', '2018-12-26 17:42:39'),
('5', NULL, 'Pratik Kanubhai Dodiya', 'Bhailakui', 'Kaniyel', '1', '1', '8980062273', NULL, 'Male', '25-09-1995', 'Single', 'M. Com', 'Audit', NULL, NULL, '1', '1', NULL, '2018-12-26 17:42:54', '2018-12-26 17:43:53');

INSERT INTO `sub_castes` (`id`, `caste_id`, `name`, `created_at`, `updated_at`) VALUES ('1', '1', '2284', NULL, NULL),
('2', '1', 'Savaso', NULL, NULL),
('3', '1', 'Nani Daskoi', NULL, NULL),
('4', '1', 'Moti Daskoi', NULL, NULL),
('5', '1', '52', NULL, NULL),
('6', '1', '282', NULL, NULL),
('7', '1', 'Chhedal', NULL, NULL),
('8', '2', 'Kadva', NULL, NULL),
('9', '2', 'Leuva', NULL, NULL);

INSERT INTO `settings` (`id`, `user_id`, `show_mobile`, `show_birthday`, `created_at`, `updated_at`) VALUES ('1', '1', '0', '0', '2018-12-26 16:42:33', '2018-12-26 16:42:33'),
('2', '2', '0', '0', '2018-12-26 16:46:00', '2018-12-26 16:46:00'),
('3', '3', '0', '0', '2018-12-26 17:38:27', '2018-12-26 17:38:27'),
('4', '4', '0', '0', '2018-12-26 17:41:11', '2018-12-26 17:41:11'),
('5', '5', '0', '0', '2018-12-26 17:42:54', '2018-12-26 17:42:54');

INSERT INTO `relatives` (`id`, `user_id`, `from`, `to`, `from_relation`, `to_relation`, `status`, `created_at`, `updated_at`) VALUES ('1', '2', '2', '1', 'Brother', 'Sister', '1', NULL, '2018-12-26 17:15:21'),
('2', '2', '1', '2', 'Sister', 'Brother', '1', NULL, '2018-12-26 17:15:21'),
('3', '5', '5', '4', 'Brother', 'Brother', '1', NULL, '2018-12-26 17:44:38'),
('4', '5', '4', '5', 'Brother', 'Brother', '1', NULL, '2018-12-26 17:44:38');

INSERT INTO `castes` (`id`, `name`, `created_at`, `updated_at`) VALUES ('1', 'Vankar Samaj', NULL, NULL),
('2', 'Patel Samaj', NULL, NULL);



/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;