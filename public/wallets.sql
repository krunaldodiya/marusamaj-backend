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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO `wallets` (`id`, `user_id`, `balance`, `created_at`, `updated_at`) VALUES ('1', '1', '0', '2018-12-26 16:42:33', '2018-12-26 16:42:33'),
('2', '2', '0', '2018-12-26 16:46:00', '2018-12-26 16:46:00'),
('4', '4', '0', '2018-12-26 17:41:11', '2018-12-26 17:41:11'),
('5', '5', '0', '2018-12-26 17:42:54', '2018-12-26 17:42:54'),
('6', '6', '0', '2018-12-26 18:04:10', '2018-12-26 18:04:10'),
('7', '7', '0', '2018-12-27 08:04:16', '2018-12-27 08:04:16'),
('8', '8', '0', '2018-12-27 14:39:38', '2018-12-27 14:39:38'),
('10', '10', '0', '2018-12-27 19:19:49', '2018-12-27 19:19:49');
