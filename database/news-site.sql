-- Adminer 4.8.1 MySQL 5.5.5-10.3.39-MariaDB-0ubuntu0.20.04.2 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `event`;
CREATE TABLE `event` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `event_date` varchar(50) NOT NULL,
  `author` int(11) NOT NULL,
  `event_img` varchar(100) NOT NULL,
  PRIMARY KEY (`event_id`),
  UNIQUE KEY `post_id` (`event_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO `event` (`event_id`, `title`, `description`, `event_date`, `author`, `event_img`) VALUES
(43,	'affsd',	'sadfsadf',	'09 Aug, 2024',	27,	'1723187601-dhulikhel.jpg'),
(44,	'wed',	'cvasd',	'09 Aug, 2024',	27,	'1723187615-pngtree-simple-v-logo-design-png-image_3632479.jpg');

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `websitename` varchar(60) NOT NULL,
  `logo` varchar(50) NOT NULL,
  `footerdesc` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `settings` (`id`, `websitename`, `logo`, `footerdesc`) VALUES
(1,	'Events Notification',	'pngtree-simple-v-logo-design-png-image_3632479.jpg',	'© Copyright 2020 Manju Nath | Powered On <a href=\"https://www.php.net\">PHP</a>');

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `role` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `username`, `password`, `role`) VALUES
(27,	'Manju Nath',	'Sonju',	'manjunath',	'21232f297a57a5a743894a0e4a801fc3',	1);

-- 2024-08-09 07:18:19