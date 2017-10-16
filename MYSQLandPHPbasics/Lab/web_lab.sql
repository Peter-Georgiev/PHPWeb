-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.25-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5174
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for web_lab
CREATE DATABASE IF NOT EXISTS `web_lab` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `web_lab`;

-- Dumping structure for table web_lab.users
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) DEFAULT '0',
  `first_name` varchar(50) DEFAULT '0',
  `last_name` varchar(50) DEFAULT '0',
  `create_date` datetime DEFAULT NULL,
  `years` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_name` (`user_name`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- Dumping data for table web_lab.users: ~12 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`user_id`, `user_name`, `first_name`, `last_name`, `create_date`, `years`) VALUES
	(1, 'pero', 'Pero', 'Georgiev', '2017-10-16 15:05:05', '43'),
	(2, 'peter', 'Peter', 'Georgiev', '2017-10-16 15:06:12', '24'),
	(3, 'vanko', 'Ivan', 'Ivanov', '2017-10-16 15:46:40', '33'),
	(4, 'ivan', 'Ivan', 'Ivanov', '2017-10-16 15:43:19', '37'),
	(5, 'pesho', 'Peter', 'Ivanov', '2017-10-16 15:43:29', '30'),
	(6, 'minko', 'Minko', 'Ivanov', '2017-10-16 15:43:40', '26'),
	(7, 'stamat', 'Stamat', 'Stamatov', '2017-10-16 16:47:23', '18'),
	(8, 'ivan55', 'Ivan55', 'Ivanov55', NULL, NULL),
	(10, 'ivan556', 'Ivan556', 'Ivanov556', NULL, NULL),
	(11, 'ivan557', 'Ivan557', 'Ivanov557', NULL, NULL),
	(12, 'ivan558', 'Ivan559464', 'Ivanov558', '2017-10-16 17:25:52', NULL),
	(13, 'ivan559', 'Ivan559', 'Ivanov559', '2017-10-16 17:27:43', '32');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
