-- Adminer 4.2.0 MySQL dump

SET NAMES utf8mb4;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `email_queue`;
CREATE TABLE `email_queue` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL COMMENT '1 is pending, 2 is sent pass, 3 is sent fail',
  `fail_cnt` int(11) NOT NULL,
  `last_update` date NOT NULL,
  `guid` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `msg` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tos` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ccs` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `bccs` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `attchs` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `email_queue` (`id`, `status`, `fail_cnt`, `last_update`, `guid`, `subject`, `msg`, `tos`, `ccs`, `bccs`, `attchs`) VALUES
('A0000000001',	2,	0,	'2015-06-30',	'5387g43a8f',	'testing',	'this is sample message',	'a:1:{s:3:\"qwe\";s:11:\"qwe@zxc.com\";}',	'N;',	'N;',	'N;'),
('A0000000002',	1,	0,	'2015-06-30',	'627g3a456b7c',	'Kelopok',	'Kelopok sangat sedap.... ',	'a:1:{s:3:\"asd\";s:11:\"asd@abc.com\";}',	'N;',	'N;',	'N;'),
('A0000000003',	1,	0,	'2015-07-01',	'68g23a76f',	'gogogo',	'....',	'a:1:{s:3:\"asd\";s:11:\"asd@abc.com\";}',	'N;',	'N;',	'N;');

-- 2015-06-30 16:19:53