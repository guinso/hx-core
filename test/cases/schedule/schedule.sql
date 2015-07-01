-- Adminer 4.2.0 MySQL dump

SET NAMES utf8mb4;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `schedule`;
CREATE TABLE `schedule` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `function_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `month` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `day` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weekday` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hour` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `minute` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `schedule` (`id`, `class_name`, `function_name`, `description`, `status`, `month`, `day`, `weekday`, `hour`, `minute`) VALUES
('A0000000001',	'SchScheduleTest',	'foobar',	'test run dummy function, it will never able to run',	1,	'20',	'*',	'*/10',	'0',	'0'),
('A0000000002',	'SchScheduleTest',	'dupFile',	'duplicate sample file',	1,	'*',	'*',	'*',	'*',	'*'),
('A0000000003',	'SchScheduleTest',	'dupFile2',	'duplicate sample file',	1,	'*',	'*',	'*',	'*',	'*');

-- 2015-07-01 12:27:06