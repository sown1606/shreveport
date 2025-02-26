-- Adminer 4.8.0 MySQL 5.5.68-MariaDB dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `csv_data`;
CREATE TABLE `csv_data` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `csv_filename` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `csv_header` tinyint(4) DEFAULT '0',
  `csv_data` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `Datas`;
CREATE TABLE `Datas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `player_club_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tier` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tier_score` int(11) DEFAULT NULL,
  `offer` float DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `data_rows`;
CREATE TABLE `data_rows` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `data_type_id` int(10) unsigned NOT NULL,
  `field` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT '0',
  `browse` tinyint(1) NOT NULL DEFAULT '1',
  `read` tinyint(1) NOT NULL DEFAULT '1',
  `edit` tinyint(1) NOT NULL DEFAULT '1',
  `add` tinyint(1) NOT NULL DEFAULT '1',
  `delete` tinyint(1) NOT NULL DEFAULT '1',
  `details` text COLLATE utf8mb4_unicode_ci,
  `order` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `data_rows_data_type_id_foreign` (`data_type_id`),
  CONSTRAINT `data_rows_data_type_id_foreign` FOREIGN KEY (`data_type_id`) REFERENCES `data_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `data_rows` (`id`, `data_type_id`, `field`, `type`, `display_name`, `required`, `browse`, `read`, `edit`, `add`, `delete`, `details`, `order`) VALUES
(1,	1,	'id',	'number',	'ID',	1,	0,	0,	0,	0,	0,	NULL,	1),
(2,	1,	'name',	'text',	'Name',	1,	1,	1,	1,	1,	1,	NULL,	2),
(3,	1,	'email',	'text',	'Email',	1,	1,	1,	1,	1,	1,	NULL,	3),
(4,	1,	'password',	'password',	'Password',	1,	0,	0,	1,	1,	0,	NULL,	4),
(5,	1,	'remember_token',	'text',	'Remember Token',	0,	0,	0,	0,	0,	0,	NULL,	5),
(6,	1,	'created_at',	'timestamp',	'Created At',	0,	1,	1,	0,	0,	0,	NULL,	6),
(7,	1,	'updated_at',	'timestamp',	'Updated At',	0,	0,	0,	0,	0,	0,	NULL,	7),
(8,	1,	'avatar',	'image',	'Avatar',	0,	1,	1,	1,	1,	1,	NULL,	8),
(9,	1,	'user_belongsto_role_relationship',	'relationship',	'Role',	0,	1,	1,	1,	1,	0,	'{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsTo\",\"column\":\"role_id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"roles\",\"pivot\":0}',	10),
(10,	1,	'user_belongstomany_role_relationship',	'relationship',	'Roles',	0,	1,	1,	1,	1,	0,	'{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"user_roles\",\"pivot\":\"1\",\"taggable\":\"0\"}',	11),
(11,	1,	'settings',	'hidden',	'Settings',	0,	0,	0,	0,	0,	0,	NULL,	12),
(12,	2,	'id',	'number',	'ID',	1,	0,	0,	0,	0,	0,	NULL,	1),
(13,	2,	'name',	'text',	'Name',	1,	1,	1,	1,	1,	1,	NULL,	2),
(14,	2,	'created_at',	'timestamp',	'Created At',	0,	0,	0,	0,	0,	0,	NULL,	3),
(15,	2,	'updated_at',	'timestamp',	'Updated At',	0,	0,	0,	0,	0,	0,	NULL,	4),
(16,	3,	'id',	'number',	'ID',	1,	0,	0,	0,	0,	0,	NULL,	1),
(17,	3,	'name',	'text',	'Name',	1,	1,	1,	1,	1,	1,	NULL,	2),
(18,	3,	'created_at',	'timestamp',	'Created At',	0,	0,	0,	0,	0,	0,	NULL,	3),
(19,	3,	'updated_at',	'timestamp',	'Updated At',	0,	0,	0,	0,	0,	0,	NULL,	4),
(20,	3,	'display_name',	'text',	'Display Name',	1,	1,	1,	1,	1,	1,	NULL,	5),
(21,	1,	'role_id',	'text',	'Role',	1,	1,	1,	1,	1,	1,	NULL,	9),
(69,	11,	'id',	'text',	'Id',	1,	0,	0,	0,	0,	0,	'{}',	1),
(70,	11,	'player_club_id',	'text',	'Player Club Id',	1,	1,	1,	1,	1,	1,	'{}',	2),
(71,	11,	'first_name',	'text',	'First Name',	0,	1,	1,	1,	1,	1,	'{}',	3),
(72,	11,	'last_name',	'text',	'Last Name',	0,	1,	1,	1,	1,	1,	'{}',	4),
(73,	11,	'email',	'text',	'Email',	0,	1,	1,	1,	1,	1,	'{}',	5),
(74,	11,	'tier',	'text',	'Tier',	0,	1,	1,	1,	1,	1,	'{}',	6),
(75,	11,	'tier_score',	'text',	'Tier Score',	0,	1,	1,	1,	1,	1,	'{}',	7),
(76,	11,	'offer',	'text',	'Offer',	0,	1,	1,	1,	1,	1,	'{}',	8),
(77,	11,	'created_at',	'timestamp',	'Created At',	0,	1,	1,	1,	0,	1,	'{}',	9),
(78,	11,	'updated_at',	'timestamp',	'Updated At',	0,	0,	0,	0,	0,	0,	'{}',	10),
(79,	11,	'deleted_at',	'timestamp',	'Deleted At',	0,	1,	1,	1,	1,	1,	'{}',	11),
(80,	11,	'date',	'date',	'Date',	0,	1,	1,	1,	1,	1,	'{}',	12),
(81,	12,	'id',	'text',	'Id',	1,	0,	0,	0,	0,	0,	'{}',	1),
(82,	12,	'csv_filename',	'text',	'Csv Filename',	0,	1,	1,	1,	1,	1,	'{}',	2),
(83,	12,	'csv_header',	'text',	'Csv Header',	0,	1,	1,	1,	1,	1,	'{}',	3),
(84,	12,	'csv_data',	'text',	'Csv Data',	0,	1,	1,	1,	1,	1,	'{}',	4),
(85,	12,	'created_at',	'timestamp',	'Created At',	0,	1,	1,	1,	0,	1,	'{}',	5),
(86,	12,	'updated_at',	'timestamp',	'Updated At',	0,	0,	0,	0,	0,	0,	'{}',	6);

DROP TABLE IF EXISTS `data_types`;
CREATE TABLE `data_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_singular` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_plural` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `controller` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generate_permissions` tinyint(1) NOT NULL DEFAULT '0',
  `server_side` tinyint(4) NOT NULL DEFAULT '0',
  `details` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `data_types_name_unique` (`name`),
  UNIQUE KEY `data_types_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `data_types` (`id`, `name`, `slug`, `display_name_singular`, `display_name_plural`, `icon`, `model_name`, `policy_name`, `controller`, `description`, `generate_permissions`, `server_side`, `details`, `created_at`, `updated_at`) VALUES
(1,	'users',	'users',	'User',	'Users',	'voyager-person',	'TCG\\Voyager\\Models\\User',	'TCG\\Voyager\\Policies\\UserPolicy',	'TCG\\Voyager\\Http\\Controllers\\VoyagerUserController',	'',	1,	0,	NULL,	'2021-03-18 22:56:07',	'2021-03-18 22:56:07'),
(2,	'menus',	'menus',	'Menu',	'Menus',	'voyager-list',	'TCG\\Voyager\\Models\\Menu',	NULL,	'',	'',	1,	0,	NULL,	'2021-03-18 22:56:07',	'2021-03-18 22:56:07'),
(3,	'roles',	'roles',	'Role',	'Roles',	'voyager-lock',	'TCG\\Voyager\\Models\\Role',	NULL,	'TCG\\Voyager\\Http\\Controllers\\VoyagerRoleController',	'',	1,	0,	NULL,	'2021-03-18 22:56:07',	'2021-03-18 22:56:07'),
(11,	'Datas',	'datas',	'Data',	'Data',	NULL,	'App\\Data',	NULL,	NULL,	NULL,	1,	0,	'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}',	'2021-03-29 12:30:06',	'2021-03-29 14:22:39'),
(12,	'csv_data',	'csv-data',	'Csv Datum',	'Csv Data',	NULL,	'App\\CsvDatum',	NULL,	NULL,	NULL,	1,	0,	'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}',	'2021-03-29 16:08:32',	'2021-03-29 16:08:32');

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `menus`;
CREATE TABLE `menus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `menus_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `menus` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1,	'admin',	'2021-03-18 22:56:07',	'2021-03-18 22:56:07');

DROP TABLE IF EXISTS `menu_items`;
CREATE TABLE `menu_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` int(10) unsigned DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
  `icon_class` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `route` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parameters` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `menu_items_menu_id_foreign` (`menu_id`),
  CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `menu_items` (`id`, `menu_id`, `title`, `url`, `target`, `icon_class`, `color`, `parent_id`, `order`, `created_at`, `updated_at`, `route`, `parameters`) VALUES
(1,	1,	'Dashboard',	'',	'_self',	'voyager-boat',	NULL,	NULL,	1,	'2021-03-18 22:56:07',	'2021-03-18 22:56:07',	'voyager.dashboard',	NULL),
(2,	1,	'Media',	'',	'_self',	'voyager-images',	NULL,	NULL,	6,	'2021-03-18 22:56:07',	'2021-03-29 16:10:01',	'voyager.media.index',	NULL),
(3,	1,	'Users',	'',	'_self',	'voyager-person',	NULL,	NULL,	5,	'2021-03-18 22:56:07',	'2021-03-29 16:10:04',	'voyager.users.index',	NULL),
(4,	1,	'Roles',	'',	'_self',	'voyager-lock',	NULL,	NULL,	4,	'2021-03-18 22:56:07',	'2021-03-29 16:10:04',	'voyager.roles.index',	NULL),
(5,	1,	'Tools',	'',	'_self',	'voyager-tools',	NULL,	NULL,	7,	'2021-03-18 22:56:07',	'2021-03-29 16:10:01',	NULL,	NULL),
(6,	1,	'Menu Builder',	'',	'_self',	'voyager-list',	NULL,	5,	1,	'2021-03-18 22:56:07',	'2021-03-19 10:57:32',	'voyager.menus.index',	NULL),
(7,	1,	'Database',	'',	'_self',	'voyager-data',	NULL,	5,	2,	'2021-03-18 22:56:07',	'2021-03-19 10:57:32',	'voyager.database.index',	NULL),
(8,	1,	'Compass',	'',	'_self',	'voyager-compass',	NULL,	5,	3,	'2021-03-18 22:56:07',	'2021-03-19 10:57:32',	'voyager.compass.index',	NULL),
(9,	1,	'BREAD',	'',	'_self',	'voyager-bread',	NULL,	5,	4,	'2021-03-18 22:56:07',	'2021-03-19 10:57:32',	'voyager.bread.index',	NULL),
(10,	1,	'Settings',	'',	'_self',	'voyager-settings',	NULL,	NULL,	8,	'2021-03-18 22:56:07',	'2021-03-29 16:10:01',	'voyager.settings.index',	NULL),
(14,	1,	'Hooks',	'',	'_self',	'voyager-hook',	NULL,	5,	5,	'2021-03-18 22:56:07',	'2021-03-19 10:57:32',	'voyager.hooks',	NULL),
(19,	1,	'Data',	'',	'_self',	'voyager-upload',	'#000000',	NULL,	2,	'2021-03-29 12:30:06',	'2021-03-29 14:01:31',	'voyager.datas.index',	'null'),
(20,	1,	'Csv Data',	'',	'_self',	'voyager-harddrive',	'#000000',	NULL,	3,	'2021-03-29 16:08:32',	'2021-03-29 16:10:04',	'voyager.csv-data.index',	'null');

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1,	'2014_10_12_000000_create_users_table',	1),
(2,	'2014_10_12_100000_create_password_resets_table',	1),
(3,	'2016_01_01_000000_add_voyager_user_fields',	1),
(4,	'2016_01_01_000000_create_data_types_table',	1),
(5,	'2016_05_19_173453_create_menu_table',	1),
(6,	'2016_10_21_190000_create_roles_table',	1),
(7,	'2016_10_21_190000_create_settings_table',	1),
(8,	'2016_11_30_135954_create_permission_table',	1),
(9,	'2016_11_30_141208_create_permission_role_table',	1),
(10,	'2016_12_26_201236_data_types__add__server_side',	1),
(11,	'2017_01_13_000000_add_route_to_menu_items_table',	1),
(12,	'2017_01_14_005015_create_translations_table',	1),
(13,	'2017_01_15_000000_make_table_name_nullable_in_permissions_table',	1),
(14,	'2017_03_06_000000_add_controller_to_data_types_table',	1),
(15,	'2017_04_21_000000_add_order_to_data_rows_table',	1),
(16,	'2017_07_05_210000_add_policyname_to_data_types_table',	1),
(17,	'2017_08_05_000000_add_group_to_settings_table',	1),
(18,	'2017_11_26_013050_add_user_role_relationship',	1),
(19,	'2017_11_26_015000_create_user_roles_table',	1),
(20,	'2018_03_11_000000_add_user_settings',	1),
(21,	'2018_03_14_000000_add_details_to_data_types_table',	1),
(22,	'2018_03_16_000000_make_settings_value_nullable',	1),
(23,	'2019_08_19_000000_create_failed_jobs_table',	1),
(24,	'2016_01_01_000000_create_pages_table',	2),
(25,	'2016_01_01_000000_create_posts_table',	2),
(26,	'2016_02_15_204651_create_categories_table',	2),
(27,	'2017_04_11_000000_alter_post_nullable_fields_table',	2);

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('son@coi.vn',	'ByCBMhOeu2E6YU5HyLyhDqrrMz2e0jLQJfMfHn0P1lhe7hUUrg3XGbVlr7I8',	'2021-03-22 12:08:19'),
('son@coi.vn',	'v058jWEzelqa7tHTiD0mFOcIBnBidKMonJlACbog5DZkfKfflsdiXegKvnS4',	'2021-03-22 12:08:35'),
('son@coi.vn',	'Acd87HTTRSSJ5w6l2fZeOu5xE9YeLwTNq4eSB5bcT6woMPUNvVSZSCHkb0Bj',	'2021-03-22 12:08:44'),
('son@coi.vn',	'QTwndSzPLM4XpYIve0Zks2QgpmDhTq6eTwecORzWpo4B2c96DEbiKtnh5KS9',	'2021-03-22 12:09:24'),
('son@coi.vn',	'T0VOPvdAGzHQUzfGaKhjLL4D7BRJdLtmZJZVMrcfsYXpR9UYCr1Zors6zeiA',	'2021-03-22 12:09:41'),
('son@coi.vn',	'YE4L4nFyrRXkGDQ96zs7ohxg7ilVqeLibIx027XUhQECpzZNABYIwXeBF0di',	'2021-03-22 12:11:16'),
('son@coi.vn',	'aYH5wtr72TOSpN1dGFRPAp2lKvSWPSWcHDAioHXhrR1XOtNq5vcJVSm8sJAV',	'2021-03-22 12:11:58'),
('son@coi.vn',	'Jq7veIcsiN7H8QKrWMAsxKkYu9lBGNuRy5vUArtuE1iZfBQActNBegk9N4fq',	'2021-03-22 12:18:33'),
('son@coi.vn',	'm8XLKBVR0Wi8Qzc7OPYn2lhpX1kUPX5iZgFrTiosxrX5Ez1sB1hrsnyNJy5q',	'2021-03-22 12:18:43'),
('son@coi.vn',	'Vp2a9UzysnXQGtqsb9wtBa0FedFTK6ouSMSNfmSUgAhfOENgFtZs4nSaGlHc',	'2021-03-22 12:20:36'),
('son@coi.vn',	'KdY7GkPA7ysEkXYXFroKB6xRU8WaYyHOBeug3zf7tXOjkJ1Y9BHrgnhxAFgl',	'2021-03-22 12:22:43'),
('son@coi.vn',	'sf2LHfwThpFJtwwZoKBOdvoRl5EIp53dXYB9k9jvO4c6bh6gExqf0T1cKvo2',	'2021-03-22 12:22:49'),
('son@coi.vn',	'yLQE03lLcB22i3uA0nCcJWlq4oKEd0hLNP7rxbprPwxAoNDeWrvnLtOdd2RQ',	'2021-03-22 12:37:30'),
('son@coi.vn',	'vh4vEAOTwKdND37fRyqwO3gOCkUrDH70WBsDahUQoFhDvKQt1PKPwa6S7CAM',	'2021-03-22 12:40:03'),
('son@coi.vn',	'VcU5N4ONhggN3UBJhw3URHCWFN3zJkQreJ4SaGW3PZb0VhobyBfO1gtfA3p8',	'2021-03-22 12:49:07'),
('son@coi.vn',	'F3vxR9BJwTn4qjGNQ6s9J3NosoDtJOOgkAcCSHczVUzIXLkaZmZs8jJnEK3d',	'2021-03-22 12:50:26'),
('son@coi.vn',	'bkfPyJBplQZuoVqWx4gTsHwvQ4iXkn08tK0v6BCcpUVG3xyq4HM0a8ZyqLx3',	'2021-03-22 12:50:43'),
('son@coi.vn',	'naKRj5LzoHY7AldnCvcxXyLt5mmxVVx5WAJXplH9zivLYDGAWR90ch4nbaYS',	'2021-03-22 12:55:38'),
('son@coi.vn',	'lTnfej4EbdkN2aJKetOKDx9s2MdDNIuGbs5B9BAQNuexGT0pvCgnRrKt3D18',	'2021-03-22 12:56:37');

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `permissions_key_index` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `permissions` (`id`, `key`, `table_name`, `created_at`, `updated_at`) VALUES
(1,	'browse_admin',	NULL,	'2021-03-18 22:56:07',	'2021-03-18 22:56:07'),
(2,	'browse_bread',	NULL,	'2021-03-18 22:56:07',	'2021-03-18 22:56:07'),
(3,	'browse_database',	NULL,	'2021-03-18 22:56:07',	'2021-03-18 22:56:07'),
(4,	'browse_media',	NULL,	'2021-03-18 22:56:07',	'2021-03-18 22:56:07'),
(5,	'browse_compass',	NULL,	'2021-03-18 22:56:07',	'2021-03-18 22:56:07'),
(6,	'browse_menus',	'menus',	'2021-03-18 22:56:07',	'2021-03-18 22:56:07'),
(7,	'read_menus',	'menus',	'2021-03-18 22:56:07',	'2021-03-18 22:56:07'),
(8,	'edit_menus',	'menus',	'2021-03-18 22:56:07',	'2021-03-18 22:56:07'),
(9,	'add_menus',	'menus',	'2021-03-18 22:56:07',	'2021-03-18 22:56:07'),
(10,	'delete_menus',	'menus',	'2021-03-18 22:56:07',	'2021-03-18 22:56:07'),
(11,	'browse_roles',	'roles',	'2021-03-18 22:56:07',	'2021-03-18 22:56:07'),
(12,	'read_roles',	'roles',	'2021-03-18 22:56:07',	'2021-03-18 22:56:07'),
(13,	'edit_roles',	'roles',	'2021-03-18 22:56:07',	'2021-03-18 22:56:07'),
(14,	'add_roles',	'roles',	'2021-03-18 22:56:07',	'2021-03-18 22:56:07'),
(15,	'delete_roles',	'roles',	'2021-03-18 22:56:07',	'2021-03-18 22:56:07'),
(16,	'browse_users',	'users',	'2021-03-18 22:56:07',	'2021-03-18 22:56:07'),
(17,	'read_users',	'users',	'2021-03-18 22:56:07',	'2021-03-18 22:56:07'),
(18,	'edit_users',	'users',	'2021-03-18 22:56:07',	'2021-03-18 22:56:07'),
(19,	'add_users',	'users',	'2021-03-18 22:56:07',	'2021-03-18 22:56:07'),
(20,	'delete_users',	'users',	'2021-03-18 22:56:07',	'2021-03-18 22:56:07'),
(21,	'browse_settings',	'settings',	'2021-03-18 22:56:07',	'2021-03-18 22:56:07'),
(22,	'read_settings',	'settings',	'2021-03-18 22:56:07',	'2021-03-18 22:56:07'),
(23,	'edit_settings',	'settings',	'2021-03-18 22:56:07',	'2021-03-18 22:56:07'),
(24,	'add_settings',	'settings',	'2021-03-18 22:56:07',	'2021-03-18 22:56:07'),
(25,	'delete_settings',	'settings',	'2021-03-18 22:56:07',	'2021-03-18 22:56:07'),
(41,	'browse_hooks',	NULL,	'2021-03-18 22:56:07',	'2021-03-18 22:56:07'),
(62,	'browse_Datas',	'Datas',	'2021-03-29 12:30:06',	'2021-03-29 12:30:06'),
(63,	'read_Datas',	'Datas',	'2021-03-29 12:30:06',	'2021-03-29 12:30:06'),
(64,	'edit_Datas',	'Datas',	'2021-03-29 12:30:06',	'2021-03-29 12:30:06'),
(65,	'add_Datas',	'Datas',	'2021-03-29 12:30:06',	'2021-03-29 12:30:06'),
(66,	'delete_Datas',	'Datas',	'2021-03-29 12:30:06',	'2021-03-29 12:30:06'),
(67,	'browse_csv_data',	'csv_data',	'2021-03-29 16:08:32',	'2021-03-29 16:08:32'),
(68,	'read_csv_data',	'csv_data',	'2021-03-29 16:08:32',	'2021-03-29 16:08:32'),
(69,	'edit_csv_data',	'csv_data',	'2021-03-29 16:08:32',	'2021-03-29 16:08:32'),
(70,	'add_csv_data',	'csv_data',	'2021-03-29 16:08:32',	'2021-03-29 16:08:32'),
(71,	'delete_csv_data',	'csv_data',	'2021-03-29 16:08:32',	'2021-03-29 16:08:32');

DROP TABLE IF EXISTS `permission_role`;
CREATE TABLE `permission_role` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_permission_id_index` (`permission_id`),
  KEY `permission_role_role_id_index` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1,	1),
(1,	2),
(2,	1),
(3,	1),
(4,	1),
(5,	1),
(6,	1),
(7,	1),
(8,	1),
(9,	1),
(10,	1),
(11,	1),
(12,	1),
(13,	1),
(14,	1),
(15,	1),
(16,	1),
(17,	1),
(18,	1),
(19,	1),
(20,	1),
(21,	1),
(22,	1),
(23,	1),
(24,	1),
(25,	1),
(62,	1),
(63,	1),
(64,	1),
(65,	1),
(66,	1),
(67,	1),
(68,	1),
(69,	1),
(70,	1),
(71,	1);

DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
(1,	'admin',	'Administrator',	'2021-03-18 22:56:07',	'2021-03-18 22:56:07'),
(2,	'Player',	'Player',	'2021-03-18 22:56:07',	'2021-03-18 23:00:05');

DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `details` text COLLATE utf8mb4_unicode_ci,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT '1',
  `group` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `settings_key_unique` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `settings` (`id`, `key`, `display_name`, `value`, `details`, `type`, `order`, `group`) VALUES
(1,	'site.title',	'Site Title',	'BallySac Player Portal',	'',	'text',	1,	'Site'),
(2,	'site.description',	'Site Description',	'BallySac Player Prtal',	'',	'text',	2,	'Site'),
(3,	'site.logo',	'Site Logo',	'settings/March2021/XXJJQy6XNkMshVlBNX6b.png',	'',	'image',	3,	'Site'),
(4,	'site.google_analytics_tracking_id',	'Google Analytics Tracking ID',	NULL,	'',	'text',	4,	'Site'),
(5,	'admin.bg_image',	'Admin Background Image',	'settings/March2021/q3tKmtwlOf3LowsE7m2u.jpg',	'',	'image',	5,	'Admin'),
(6,	'admin.title',	'Admin Title',	'BallySac Player Portal',	'',	'text',	1,	'Admin'),
(7,	'admin.description',	'Admin Description',	'Welcome to BallySac Player Portal!',	'',	'text',	2,	'Admin'),
(8,	'admin.loader',	'Admin Loader',	'settings/March2021/BhN51dZseHcKm6Od3asS.png',	'',	'image',	3,	'Admin'),
(9,	'admin.icon_image',	'Admin Icon Image',	'settings/March2021/qvL63KGYubmEoViktLpx.png',	'',	'image',	4,	'Admin'),
(10,	'admin.google_analytics_client_id',	'Google Analytics Client ID (used for admin dashboard)',	NULL,	'',	'text',	1,	'Admin');

DROP TABLE IF EXISTS `translations`;
CREATE TABLE `translations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `table_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `column_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foreign_key` int(10) unsigned NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `translations_table_name_column_name_foreign_key_locale_unique` (`table_name`,`column_name`,`foreign_key`,`locale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `translations` (`id`, `table_name`, `column_name`, `foreign_key`, `locale`, `value`, `created_at`, `updated_at`) VALUES
(1,	'data_types',	'display_name_singular',	5,	'pt',	'Post',	'2021-03-18 22:56:07',	'2021-03-18 22:56:07'),
(2,	'data_types',	'display_name_singular',	6,	'pt',	'Página',	'2021-03-18 22:56:07',	'2021-03-18 22:56:07'),
(3,	'data_types',	'display_name_singular',	1,	'pt',	'Utilizador',	'2021-03-18 22:56:07',	'2021-03-18 22:56:07'),
(4,	'data_types',	'display_name_singular',	4,	'pt',	'Categoria',	'2021-03-18 22:56:07',	'2021-03-18 22:56:07'),
(5,	'data_types',	'display_name_singular',	2,	'pt',	'Menu',	'2021-03-18 22:56:07',	'2021-03-18 22:56:07'),
(6,	'data_types',	'display_name_singular',	3,	'pt',	'Função',	'2021-03-18 22:56:07',	'2021-03-18 22:56:07'),
(7,	'data_types',	'display_name_plural',	5,	'pt',	'Posts',	'2021-03-18 22:56:07',	'2021-03-18 22:56:07'),
(8,	'data_types',	'display_name_plural',	6,	'pt',	'Páginas',	'2021-03-18 22:56:07',	'2021-03-18 22:56:07'),
(9,	'data_types',	'display_name_plural',	1,	'pt',	'Utilizadores',	'2021-03-18 22:56:07',	'2021-03-18 22:56:07'),
(10,	'data_types',	'display_name_plural',	4,	'pt',	'Categorias',	'2021-03-18 22:56:07',	'2021-03-18 22:56:07'),
(11,	'data_types',	'display_name_plural',	2,	'pt',	'Menus',	'2021-03-18 22:56:07',	'2021-03-18 22:56:07'),
(12,	'data_types',	'display_name_plural',	3,	'pt',	'Funções',	'2021-03-18 22:56:07',	'2021-03-18 22:56:07'),
(13,	'categories',	'slug',	1,	'pt',	'categoria-1',	'2021-03-18 22:56:07',	'2021-03-18 22:56:07'),
(14,	'categories',	'name',	1,	'pt',	'Categoria 1',	'2021-03-18 22:56:07',	'2021-03-18 22:56:07'),
(15,	'categories',	'slug',	2,	'pt',	'categoria-2',	'2021-03-18 22:56:07',	'2021-03-18 22:56:07'),
(16,	'categories',	'name',	2,	'pt',	'Categoria 2',	'2021-03-18 22:56:07',	'2021-03-18 22:56:07'),
(17,	'pages',	'title',	1,	'pt',	'Olá Mundo',	'2021-03-18 22:56:07',	'2021-03-18 22:56:07'),
(18,	'pages',	'slug',	1,	'pt',	'ola-mundo',	'2021-03-18 22:56:07',	'2021-03-18 22:56:07'),
(19,	'pages',	'body',	1,	'pt',	'<p>Olá Mundo. Scallywag grog swab Cat o\'nine tails scuttle rigging hardtack cable nipper Yellow Jack. Handsomely spirits knave lad killick landlubber or just lubber deadlights chantey pinnace crack Jennys tea cup. Provost long clothes black spot Yellow Jack bilged on her anchor league lateen sail case shot lee tackle.</p>\r\n<p>Ballast spirits fluke topmast me quarterdeck schooner landlubber or just lubber gabion belaying pin. Pinnace stern galleon starboard warp carouser to go on account dance the hempen jig jolly boat measured fer yer chains. Man-of-war fire in the hole nipperkin handsomely doubloon barkadeer Brethren of the Coast gibbet driver squiffy.</p>',	'2021-03-18 22:56:07',	'2021-03-18 22:56:07'),
(20,	'menu_items',	'title',	1,	'pt',	'Painel de Controle',	'2021-03-18 22:56:07',	'2021-03-18 22:56:07'),
(21,	'menu_items',	'title',	2,	'pt',	'Media',	'2021-03-18 22:56:07',	'2021-03-18 22:56:07'),
(22,	'menu_items',	'title',	12,	'pt',	'Publicações',	'2021-03-18 22:56:07',	'2021-03-18 22:56:07'),
(23,	'menu_items',	'title',	3,	'pt',	'Utilizadores',	'2021-03-18 22:56:07',	'2021-03-18 22:56:07'),
(24,	'menu_items',	'title',	11,	'pt',	'Categorias',	'2021-03-18 22:56:07',	'2021-03-18 22:56:07'),
(25,	'menu_items',	'title',	13,	'pt',	'Páginas',	'2021-03-18 22:56:07',	'2021-03-18 22:56:07'),
(26,	'menu_items',	'title',	4,	'pt',	'Funções',	'2021-03-18 22:56:07',	'2021-03-18 22:56:07'),
(27,	'menu_items',	'title',	5,	'pt',	'Ferramentas',	'2021-03-18 22:56:07',	'2021-03-18 22:56:07'),
(28,	'menu_items',	'title',	6,	'pt',	'Menus',	'2021-03-18 22:56:07',	'2021-03-18 22:56:07'),
(29,	'menu_items',	'title',	7,	'pt',	'Base de dados',	'2021-03-18 22:56:07',	'2021-03-18 22:56:07'),
(30,	'menu_items',	'title',	10,	'pt',	'Configurações',	'2021-03-18 22:56:07',	'2021-03-18 22:56:07');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` bigint(20) unsigned DEFAULT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'users/default.png',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `settings` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `player_club_id` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date DEFAULT NULL,
  `secure_question1` text COLLATE utf8mb4_unicode_ci,
  `secure_question2` text COLLATE utf8mb4_unicode_ci,
  `secure_question3` text COLLATE utf8mb4_unicode_ci,
  `secure_answer1` text COLLATE utf8mb4_unicode_ci,
  `secure_answer2` text COLLATE utf8mb4_unicode_ci,
  `secure_answer3` text COLLATE utf8mb4_unicode_ci,
  `user_name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_player_club_id_unique` (`player_club_id`),
  KEY `users_role_id_foreign` (`role_id`),
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `role_id`, `first_name`, `email`, `avatar`, `email_verified_at`, `password`, `remember_token`, `settings`, `created_at`, `updated_at`, `last_name`, `player_club_id`, `birthday`, `secure_question1`, `secure_question2`, `secure_question3`, `secure_answer1`, `secure_answer2`, `secure_answer3`, `user_name`, `deleted_at`) VALUES
(1,	1,	'Admin',	'admin@admin.com',	'users/default.png',	NULL,	'$2y$10$yOQipBUygCYcFGfZ7JGP..5ughDeza/EK1QIgtCijuMS8TaiISWWK',	'gHIH7tkJWp8YZS5ldGxmcDDt5Lau3oAS31zseiUU533uXEdS5gvPO1uUlhEP',	NULL,	'2021-03-18 22:56:07',	'2021-03-18 22:56:07',	'0',	'1',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'1',	NULL),
(2,	2,	'player1',	'player1@gmail.com',	'users/default.png',	NULL,	'$2y$10$GJKHn.RTpD2rlV13RTtLLO.7teAYoQGHLm9NjfMVYiRandJrzcMPy',	'yFIzrGtfpB3kGZYCEHiW6AH8b4bKtR0p1VWoGWaZFilEFtCjVXuxJC2twseS',	'{\"locale\":\"en\"}',	'2021-03-19 10:47:39',	'2021-03-19 10:47:39',	'0',	'1234',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'2',	NULL),
(5,	2,	'Kenneth',	'kmarks@mapledirect.com',	'users/default.png',	NULL,	'$2y$10$WyacogsNhEgu9e8C8HdCnuCfAdxtAdQOwpfUaW1JXXJQusmzbLGba',	'scWHPoqeWc5wYKt7wyfPPVtvrBxHogFHITbUupwRxZSuHzK8howlMXifCGoy',	NULL,	'2021-03-22 12:31:35',	'2021-03-22 12:31:35',	'Marks',	'123456',	'1965-03-01',	NULL,	NULL,	NULL,	'st martins',	'mx6',	'ron',	'4',	NULL);

DROP TABLE IF EXISTS `user_roles`;
CREATE TABLE `user_roles` (
  `user_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `user_roles_user_id_index` (`user_id`),
  KEY `user_roles_role_id_index` (`role_id`),
  CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- 2021-03-30 20:36:07
