-- Adminer 4.2.0 MySQL dump

SET NAMES utf8mb4;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `key_value`;
CREATE TABLE `key_value` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key_pair` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `key` (`key_pair`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `key_value` (`id`, `key_pair`, `value`) VALUES
('A0000000001',	'secret',	's:11:\"sample text\";');

-- 2015-06-29 17:05:38