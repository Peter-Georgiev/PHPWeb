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


-- Dumping database structure for php-course
CREATE DATABASE IF NOT EXISTS `php-course` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `php-course`;

-- Dumping structure for table php-course.students
CREATE TABLE IF NOT EXISTS `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `student_number` int(11) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `home_address` varchar(255) DEFAULT NULL,
  `date_record` datetime DEFAULT NULL,
  `date_last_change` datetime DEFAULT NULL,
  `student_active` enum('Y','N') DEFAULT NULL,
  `motivation_letter` text,
  `notes` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `student_number` (`student_number`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Dumping data for table php-course.students: ~8 rows (approximately)
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
REPLACE INTO `students` (`id`, `first_name`, `last_name`, `student_number`, `phone`, `home_address`, `date_record`, `date_last_change`, `student_active`, `motivation_letter`, `notes`) VALUES
	(1, 'Petar', 'Georgiev', 200077286, '+359 894 622 954', '6, Osvobozhdenie Street, Karlovo', '2017-10-16 22:46:43', '2017-10-16 22:46:43', 'Y', 'Creating a new programme is always an interesting challenge for me.', 'Exciting'),
	(2, 'Peter', 'Georgiev', 203077286, '+359 2 999 976', '64, Osvobozhdenie Street, Sofia', '2017-10-16 22:47:14', '2017-10-16 22:47:14', 'Y', 'The new software makes people\'s lives easier.', 'Practical'),
	(3, 'Ivan', 'Georgiev', 203237286, '0983 876 232', '64, Karzov Street, Sofia', '2017-10-16 22:49:28', '2017-10-16 22:49:28', 'Y', NULL, NULL),
	(4, 'Ivan', 'Ivanov', 278372878, '0983 876 232', '4, Pomorie Street, Varna', '2017-10-16 22:49:28', '2017-10-16 22:49:28', 'N', NULL, NULL),
	(5, 'Georgi', 'Petrov', 183237286, '0983 845 232', '64, Vazov Street, Varna', '2017-10-16 22:53:58', '2017-10-16 22:53:58', 'Y', NULL, NULL),
	(6, 'Ivan', 'Simeonov', 209872860, '0985 435 232', '4, Pomorie Street, Sopot', '2017-10-16 22:53:58', '2017-10-16 22:53:58', 'N', NULL, NULL),
	(7, 'Anna', 'Popova', 209000035, '0894 232 232', '4, Pomorie Street, Sofia', '2017-10-16 22:53:58', '2017-10-16 22:53:58', 'Y', NULL, NULL),
	(8, 'Mery', 'Doncheva', 209120286, '0888 223 111', '4, I.Kostov Street, Stara Zagora', '2017-10-16 22:53:58', '2017-10-16 22:53:58', 'Y', NULL, NULL);
/*!40000 ALTER TABLE `students` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
