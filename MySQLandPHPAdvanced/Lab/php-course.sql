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

-- Dumping structure for table php-course.courses
CREATE TABLE IF NOT EXISTS `courses` (
  `course_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`course_id`),
  UNIQUE KEY `course_name` (`course_name`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- Dumping data for table php-course.courses: ~4 rows (approximately)
/*!40000 ALTER TABLE `courses` DISABLE KEYS */;
REPLACE INTO `courses` (`course_id`, `course_name`) VALUES
	(4, 'C#'),
	(12, 'Java'),
	(13, 'JS'),
	(3, 'PHP-WEB');
/*!40000 ALTER TABLE `courses` ENABLE KEYS */;

-- Dumping structure for table php-course.students
CREATE TABLE IF NOT EXISTS `students` (
  `student_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `student_number` int(11) DEFAULT NULL,
  PRIMARY KEY (`student_id`),
  UNIQUE KEY `student_number` (`student_number`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- Dumping data for table php-course.students: ~5 rows (approximately)
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
REPLACE INTO `students` (`student_id`, `first_name`, `last_name`, `student_number`) VALUES
	(3, 'Minko', 'Georgiev', 997977987),
	(4, 'Peter', 'Georgiev', 997977982),
	(5, 'Pesho', 'Georgiev', 123123987),
	(14, 'Emil', 'Georgiev', 123125437),
	(15, 'Georgi', 'Georgiev', 153555437);
/*!40000 ALTER TABLE `students` ENABLE KEYS */;

-- Dumping structure for table php-course.student_subscriptions
CREATE TABLE IF NOT EXISTS `student_subscriptions` (
  `course_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  KEY `FK_student_subscriptions_courses` (`course_id`),
  KEY `FK_student_subscriptions_students` (`student_id`),
  CONSTRAINT `FK_student_subscriptions_courses` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`),
  CONSTRAINT `FK_student_subscriptions_students` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table php-course.student_subscriptions: ~4 rows (approximately)
/*!40000 ALTER TABLE `student_subscriptions` DISABLE KEYS */;
REPLACE INTO `student_subscriptions` (`course_id`, `student_id`) VALUES
	(3, 3),
	(4, 5),
	(12, 14),
	(13, 15);
/*!40000 ALTER TABLE `student_subscriptions` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
