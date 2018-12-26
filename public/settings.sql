DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `show_mobile` tinyint(1) NOT NULL DEFAULT '0',
  `show_birthday` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO `settings` (`id`, `user_id`, `show_mobile`, `show_birthday`, `created_at`, `updated_at`) VALUES ('1', '1', '0', '0', '2018-12-26 16:42:33', '2018-12-26 16:42:33'),
('2', '2', '1', '1', '2018-12-26 16:46:00', '2018-12-26 22:06:32'),
('3', '3', '0', '0', '2018-12-26 17:38:27', '2018-12-26 17:38:27'),
('4', '4', '0', '0', '2018-12-26 17:41:11', '2018-12-26 17:41:11'),
('5', '5', '0', '0', '2018-12-26 17:42:54', '2018-12-26 17:42:54'),
('6', '6', '0', '0', '2018-12-26 18:04:10', '2018-12-26 18:04:10');
