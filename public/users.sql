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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO `users` (`id`, `uid`, `name`, `father_city`, `mother_city`, `caste_id`, `sub_caste_id`, `mobile`, `secondary_mobile`, `gender`, `dob`, `marital_status`, `education`, `occupation`, `address`, `avatar`, `caste_updated`, `profile_updated`, `remember_token`, `created_at`, `updated_at`) VALUES ('1', NULL, 'Krunal Arvindkumar Dodiya', 'Bhailakui', 'Kapadwanj', '1', '1', '9426726815', NULL, 'Male', '27-06-1987', 'Single', 'B. Com Graduate', 'Freelance Web Developer', NULL, 'https://res.cloudinary.com/marusamaj/image/upload/c_crop,h_480,w_480,x_226,y_0/v1545829144/qs79r9urzbikug1gqky9.jpg', '1', '1', NULL, '2018-12-26 16:42:33', '2018-12-26 18:29:05'),
('2', '691758270088', 'Hetal Arvindkumar Dodiya', 'Bhailakui', 'Kapadwanj', '1', '1', '9426726815', '7016342489', 'Female', '10-08-1991', 'Single', 'M. Com Graduate', 'Government Job', NULL, 'https://res.cloudinary.com/marusamaj/image/upload/c_crop,h_480,w_480,x_958,y_781/v1545833382/d6s2mpnrrxtkrefhn9up.jpg', '1', '1', NULL, '2018-12-26 16:46:00', '2018-12-26 22:01:40'),
('3', NULL, 'Geeta', 'Kevadiya', 'Karkariya', '1', '1', '9824506933', NULL, 'Female', '07-06-1988', 'Single', 'B. C. A', 'Private Job', NULL, NULL, '1', '1', NULL, '2018-12-26 17:38:27', '2018-12-26 17:39:53'),
('4', NULL, 'Bhavin Kanubhai Dodiya', 'Bhailakui', 'Kaniyel', '1', '1', '8980062273', NULL, 'Male', '04-10-1992', 'Single', 'M. C. A', 'Tata Capital Finance Services Ltd', NULL, NULL, '1', '1', NULL, '2018-12-26 17:41:11', '2018-12-26 17:42:39'),
('5', NULL, 'Pratik Kanubhai Dodiya', 'Bhailakui', 'Kaniyel', '1', '1', '8980062273', NULL, 'Male', '25-09-1995', 'Single', 'M. Com', 'Audit', NULL, NULL, '1', '1', NULL, '2018-12-26 17:42:54', '2018-12-26 17:43:53'),
('6', NULL, 'Manisha Jigar Amin', 'Bhailakui', 'Kapadwanj', '1', '1', '9426726815', NULL, 'Female', '21-03-1989', 'Married', 'M. A', 'Housewife', NULL, 'https://res.cloudinary.com/marusamaj/image/upload/c_crop,h_480,w_480,x_447,y_31/v1545830106/w670e1l3ht31brx8gxqe.jpg', '1', '1', NULL, '2018-12-26 18:04:10', '2018-12-26 18:45:07');
