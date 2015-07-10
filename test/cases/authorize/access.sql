-- Adminer 4.2.0 MySQL dump

SET NAMES utf8mb4;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `access`;
CREATE TABLE `access` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `can_access` tinyint(4) NOT NULL,
  `role_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `criteria_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `criteria_id` (`criteria_id`),
  KEY `role_id` (`role_id`),
  CONSTRAINT `access_ibfk_1` FOREIGN KEY (`criteria_id`) REFERENCES `access_criteria` (`id`),
  CONSTRAINT `access_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `access` (`id`, `can_access`, `role_id`, `criteria_id`) VALUES
('A0000000001',	1,	'A0000000001',	'A0000000001'),
('A0000000002',	1,	'A0000000002',	'A0000000001'),
('A0000000003',	0,	'A0000000001',	'A0000000002'),
('A0000000004',	1,	'A0000000002',	'A0000000002'),
('A0000000005',	0,	'A0000000001',	'A0000000003'),
('A0000000006',	1,	'A0000000002',	'A0000000003');

DROP TABLE IF EXISTS `access_criteria`;
CREATE TABLE `access_criteria` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `access_criteria` (`id`, `name`) VALUES
('A0000000001',	'view user'),
('A0000000002',	'create user'),
('A0000000003',	'update user');

DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `role` (`id`, `name`) VALUES
('A0000000001',	'user'),
('A0000000002',	'admin'),
('A0000000003',	'manager');

-- 2015-07-10 00:13:55