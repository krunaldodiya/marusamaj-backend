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
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO `relatives` (`id`, `user_id`, `from`, `to`, `from_relation`, `to_relation`, `status`, `created_at`, `updated_at`) VALUES ('3', '5', '5', '4', 'Brother', 'Brother', '1', NULL, '2018-12-26 17:44:38'),
('4', '5', '4', '5', 'Brother', 'Brother', '1', NULL, '2018-12-26 17:44:38'),
('15', '1', '1', '2', 'Sister', 'Brother', '1', NULL, '2018-12-27 09:01:58'),
('16', '1', '2', '1', 'Brother', 'Sister', '1', NULL, '2018-12-27 09:10:25'),
('19', '6', '6', '7', 'Father', 'Daughter', '1', NULL, '2018-12-27 08:45:02'),
('20', '6', '7', '6', 'Daughter', 'Father', '1', NULL, '2018-12-27 09:10:25'),
('21', '7', '7', '2', 'Daughter', 'Father', '1', NULL, '2018-12-27 09:10:25'),
('22', '7', '2', '7', 'Father', 'Daughter', '1', NULL, '2018-12-27 08:43:08'),
('23', '2', '2', '6', 'Sister', 'Sister', '1', NULL, '2018-12-27 09:01:58'),
('24', '2', '6', '2', 'Sister', 'Sister', '1', NULL, '2018-12-27 08:45:02'),
('25', '6', '6', '1', 'Brother', 'Sister', '1', NULL, '2018-12-27 09:10:25'),
('26', '6', '1', '6', 'Sister', 'Brother', '1', NULL, '2018-12-27 09:01:58'),
('27', '1', '1', '7', 'Father', 'Son', '1', NULL, '2018-12-27 09:10:25'),
('28', '1', '7', '1', 'Son', 'Father', '1', NULL, '2018-12-27 09:10:25');
