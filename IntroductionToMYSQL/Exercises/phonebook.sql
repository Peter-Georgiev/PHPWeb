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


-- Dumping database structure for phonebook
CREATE DATABASE IF NOT EXISTS `phonebook` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `phonebook`;

-- Dumping structure for table phonebook.cities
CREATE TABLE IF NOT EXISTS `cities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `city` varchar(255) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table phonebook.cities: ~0 rows (approximately)
/*!40000 ALTER TABLE `cities` DISABLE KEYS */;
REPLACE INTO `cities` (`id`, `city`) VALUES
	(1, 'Sofia'),
	(2, 'Plovdiv'),
	(3, 'Karlovo');
/*!40000 ALTER TABLE `cities` ENABLE KEYS */;

-- Dumping structure for table phonebook.phones
CREATE TABLE IF NOT EXISTS `phones` (
  `person_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `city_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`person_id`),
  KEY `FK_phones_address` (`city_id`),
  CONSTRAINT `FK_phones_address` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table phonebook.phones: ~0 rows (approximately)
/*!40000 ALTER TABLE `phones` DISABLE KEYS */;
REPLACE INTO `phones` (`person_id`, `first_name`, `last_name`, `number`, `city_id`) VALUES
	(1, 'Ivan', 'Ivanov', '894123456', 1),
	(2, 'Ivan', 'Stoyanov', '359894123456', 1),
	(3, 'Stanimir', 'Kirqzov\r\n', '359 89 435 678', 2),
	(4, 'Georgi', 'Petrov', '+35932 786 789', 2),
	(5, 'Peter', 'Georgiev', '+359 89 786 789', 3);
/*!40000 ALTER TABLE `phones` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
