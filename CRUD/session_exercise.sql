-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.25-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5184
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for session_exercise
CREATE DATABASE IF NOT EXISTS `session_exercise` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `session_exercise`;

-- Dumping structure for table session_exercise.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `born_on` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table session_exercise.users: ~2 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
REPLACE INTO `users` (`id`, `username`, `password`, `first_name`, `last_name`, `born_on`) VALUES
	(1, 'peter', '$2y$10$n/zTqN0HrwlBvfF18e.WfO/38rXQ4AwHVBUJHuIvFNttmV49u3o2S', 'Петър', 'Георгиев', '1987-02-18 22:00:00'),
	(2, 'pesho', '$2y$10$IhfoeqFJxv0dQSd3GP6ex.woQ3ECz.OnmrNx.OKB1fKDgaSJBPRL6', 'Петър', 'Петров', '1978-02-01 22:00:00'),
	(3, 'mincho', '$2y$10$fguracD9dv0ai8/.r68eaO1sOdXDXlhZcAxH32FNXMTcOPzH11sM6', 'Mincho', 'Praznikov', '1978-02-01 22:00:00'),
	(4, 'boyan', '$2y$10$yE4OX7RUJxvNXPKFKet9Z.l12Ocg/2ccay/XmL.TkGNTch1OF9iI2', 'Boyan', 'Boyanov', '1997-02-11 22:00:00'),
	(5, 'ivan', '$2y$10$8xrhuImLqnptasTwjYXj3.lCunAS4AG0uj96rJjsPJXHdt6I/yiuW', 'Ivan', 'Kozmov', '1989-02-18 22:00:00');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
