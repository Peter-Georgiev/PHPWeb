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


-- Dumping database structure for cars
CREATE DATABASE IF NOT EXISTS `cars` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `cars`;

-- Dumping structure for table cars.cars
CREATE TABLE IF NOT EXISTS `cars` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `make` varchar(255) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `year` smallint(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;

-- Dumping data for table cars.cars: ~17 rows (approximately)
/*!40000 ALTER TABLE `cars` DISABLE KEYS */;
REPLACE INTO `cars` (`id`, `make`, `model`, `year`) VALUES
	(4, 'Audi', 'A4', 2004),
	(5, 'Audi', 'A4', 2004),
	(7, 'Audi', 'A4', 2004),
	(8, 'Audi', 'A4', 2004),
	(9, 'Audi', 'A4', 2004),
	(10, 'Audi', 'A4', 2004),
	(11, 'Audi', 'A4', 2004),
	(12, 'Audi', 'A4', 2004),
	(13, 'Audi', 'A4', 2004),
	(14, 'Audi', 'A4', 2004),
	(15, 'Audi', 'A4', 2004),
	(16, 'Audi', 'A4', 2004),
	(17, 'Audi', 'A4', 2004),
	(18, 'BMW', '116', 2010),
	(19, 'Ford', 'Focus', 2004),
	(20, 'Ford', 'Focus', 2004),
	(21, 'Ford', 'Focus', 2004),
	(22, 'Ford', 'Focus', 2004),
	(23, 'Audi', 'A4', 2004),
	(24, 'Audi', 'A4', 2004),
	(28, 'Audi', 'A4', 2004),
	(29, 'Audi', 'A4', 2004),
	(30, 'Audi', 'A4', 2004),
	(31, 'Audi', 'A4', 2004),
	(32, 'Audi', 'A4', 2004),
	(33, 'Audi', 'A4', 2004),
	(34, 'Audi', 'A4', 2004),
	(35, 'Audi', 'A4', 2004),
	(36, 'Audi', 'A4', 2004),
	(37, 'Audi', 'A4', 2004),
	(38, 'Audi', 'A4', 2004),
	(39, 'Audi', 'A4', 2004),
	(40, 'Audi', 'A4', 2004),
	(41, 'Audi', 'A4', 2004),
	(42, 'Audi', 'A4', 2004),
	(43, 'Audi', 'A4', 2004),
	(44, 'Audi', 'A4', 2004),
	(45, 'Audi', 'A4', 2004),
	(46, 'Audi', 'A4', 2004),
	(47, 'Audi', 'A4', 2004),
	(48, 'Audi', 'A4', 2004),
	(49, 'Audi', 'A4', 2004);
/*!40000 ALTER TABLE `cars` ENABLE KEYS */;

-- Dumping structure for table cars.customers
CREATE TABLE IF NOT EXISTS `customers` (
  `customer_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;

-- Dumping data for table cars.customers: ~18 rows (approximately)
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
REPLACE INTO `customers` (`customer_id`, `first_name`, `last_name`) VALUES
	(4, 'Ivan', 'Ivanov'),
	(5, 'Ivan', 'Ivanov'),
	(7, 'Ivan', 'Ivanov'),
	(8, 'Ivan', 'Ivanov'),
	(9, 'Ivan', 'Ivanov'),
	(10, 'Ivan', 'Ivanov'),
	(11, 'Ivan', 'Ivanov'),
	(12, 'Ivan', 'Ivanov'),
	(13, 'Ivan', 'Ivanov'),
	(14, 'Ivan', 'Ivanov'),
	(15, 'Ivan', 'Ivanov'),
	(16, 'Ivan', 'Ivanov'),
	(17, 'Ivan', 'Ivanov'),
	(18, 'Ilia', 'Petrov'),
	(19, 'Stoyan', 'Lazarov'),
	(20, 'Stoyan', 'Lazarov'),
	(21, 'Stoyan', 'Lazarov'),
	(22, 'Stoyan', 'Lazarov'),
	(23, 'Ivan', 'Ivanov'),
	(24, 'Ivan', 'Ivanov'),
	(28, 'Ivan', 'Ivanov'),
	(29, 'Ivan', 'Ivanov'),
	(30, 'Ivan', 'Ivanov'),
	(31, 'Ivan', 'Ivanov'),
	(32, 'Ivan', 'Ivanov'),
	(33, 'Ivan', 'Ivanov'),
	(34, 'Ivan', 'Ivanov'),
	(35, 'Ivan', 'Ivanov'),
	(36, 'Ivan', 'Ivanov'),
	(37, 'Ivan', 'Ivanov'),
	(38, 'Ivan', 'Ivanov'),
	(39, 'Ivan', 'Ivanov'),
	(40, 'Ivan', 'Ivanov'),
	(41, 'Ivan', 'Ivanov'),
	(42, 'Ivan', 'Ivanov'),
	(43, 'Ivan', 'Ivanov'),
	(44, 'Ivan', 'Ivanov'),
	(45, 'Ivan', 'Ivanov'),
	(46, 'Ivan', 'Ivanov'),
	(47, 'Ivan', 'Ivanov'),
	(48, 'Ivan', 'Ivanov'),
	(49, 'Ivan', 'Ivanov');
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;

-- Dumping structure for view cars.customer_names
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `customer_names` (
	`first_name` VARCHAR(255) NULL COLLATE 'utf8_general_ci',
	`last_name` VARCHAR(255) NULL COLLATE 'utf8_general_ci'
) ENGINE=MyISAM;

-- Dumping structure for view cars.deal
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `deal` (
	`date_time_sale` DATETIME NOT NULL,
	`amount` INT(10) UNSIGNED NULL,
	`make` VARCHAR(255) NULL COLLATE 'utf8_general_ci',
	`model` VARCHAR(255) NULL COLLATE 'utf8_general_ci',
	`year` SMALLINT(10) NULL,
	`first_name` VARCHAR(255) NULL COLLATE 'utf8_general_ci',
	`last_name` VARCHAR(255) NULL COLLATE 'utf8_general_ci'
) ENGINE=MyISAM;

-- Dumping structure for function cars.get_full_name
DELIMITER //
CREATE DEFINER=`root`@`localhost` FUNCTION `get_full_name`(first_name VARCHAR(250), last_name VARCHAR(250)) RETURNS varchar(250) CHARSET utf8
BEGIN
		DECLARE full_name VARCHAR(250);
		SET full_name = CONCAT(first_name, ' ', last_name);
		RETURN full_name;	
	END//
DELIMITER ;

-- Dumping structure for procedure cars.get_sales
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_sales`()
BEGIN
    SELECT SUM(`amount`) AS total FROM `sales`;
END//
DELIMITER ;

-- Dumping structure for table cars.sales
CREATE TABLE IF NOT EXISTS `sales` (
  `sale_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int(10) unsigned DEFAULT NULL,
  `car_id` int(10) unsigned DEFAULT NULL,
  `date_time_sale` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `amount` int(10) unsigned DEFAULT '0',
  PRIMARY KEY (`sale_id`),
  KEY `FK_sales_cars` (`car_id`),
  KEY `FK_sales_customers` (`customer_id`),
  CONSTRAINT `FK_sales_cars` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_sales_customers` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8;

-- Dumping data for table cars.sales: ~18 rows (approximately)
/*!40000 ALTER TABLE `sales` DISABLE KEYS */;
REPLACE INTO `sales` (`sale_id`, `customer_id`, `car_id`, `date_time_sale`, `amount`) VALUES
	(1, 4, 4, '2017-01-24 19:52:36', 7000),
	(2, 5, 5, '2017-02-24 20:00:41', 7000),
	(3, 7, 7, '2017-03-24 20:01:00', 7000),
	(4, 8, 8, '2017-03-23 20:03:01', 7000),
	(5, 9, 9, '2017-03-24 20:03:06', 7000),
	(6, 10, 10, '2017-04-24 20:03:19', 7000),
	(7, 11, 11, '2017-04-24 20:05:27', 7000),
	(8, 12, 12, '2017-05-24 20:07:14', 7000),
	(9, 13, 13, '2017-05-24 20:09:35', 7000),
	(10, 14, 14, '2017-06-24 20:11:16', 7000),
	(11, 15, 15, '2017-06-24 20:11:40', 7000),
	(12, 16, 16, '2017-07-24 20:12:48', 7000),
	(13, 17, 17, '2017-07-24 20:17:07', 7000),
	(14, 18, 18, '2017-08-24 20:17:31', 24000),
	(15, 19, 19, '2010-08-24 20:17:38', 3800),
	(16, 20, 20, '2017-09-24 20:17:49', 3490),
	(17, 21, 21, '2017-09-24 20:19:02', 9876),
	(18, 22, 22, '2017-10-24 20:22:18', 3800),
	(26, 23, 23, '2017-10-25 20:06:56', 7000),
	(27, 24, 24, '2017-10-25 20:13:31', 7000),
	(39, 28, 28, '2017-10-25 21:08:18', 7000),
	(40, 28, 28, '2017-10-25 21:08:18', 7000),
	(41, 29, 29, '2017-10-25 21:08:31', 7000),
	(42, 29, 29, '2017-10-25 21:08:31', 7000),
	(43, 30, 30, '2017-10-25 21:13:13', 7000),
	(44, 30, 30, '2017-10-25 21:13:13', 7000),
	(45, 31, 31, '2017-10-25 21:13:55', 7000),
	(46, 31, 31, '2017-10-25 21:13:55', 7000),
	(47, 32, 32, '2017-10-25 21:14:32', 7000),
	(48, 32, 32, '2017-10-25 21:14:32', 7000),
	(49, 33, 33, '2017-10-25 21:15:01', 7000),
	(50, 33, 33, '2017-10-25 21:15:01', 7000),
	(51, 34, 34, '2017-10-25 21:15:30', 7000),
	(52, 34, 34, '2017-10-25 21:15:30', 7000),
	(53, 35, 35, '2017-10-25 21:15:31', 7000),
	(54, 35, 35, '2017-10-25 21:15:31', 7000),
	(55, 36, 36, '2017-10-25 21:15:33', 7000),
	(56, 36, 36, '2017-10-25 21:15:33', 7000),
	(57, 37, 37, '2017-10-25 21:16:34', 7000),
	(58, 37, 37, '2017-10-25 21:16:34', 7000),
	(59, 38, 38, '2017-10-25 21:16:43', 7000),
	(60, 38, 38, '2017-10-25 21:16:43', 7000),
	(61, 39, 39, '2017-10-25 21:17:38', 7000),
	(62, 39, 39, '2017-10-25 21:17:38', 7000),
	(63, 40, 40, '2017-10-25 21:18:34', 7000),
	(64, 40, 40, '2017-10-25 21:18:34', 7000),
	(65, 41, 41, '2017-10-25 21:19:20', 7000),
	(66, 41, 41, '2017-10-25 21:19:20', 7000),
	(67, 42, 42, '2017-10-25 21:19:29', 7000),
	(68, 42, 42, '2017-10-25 21:19:29', 7000),
	(69, 43, 43, '2017-10-25 21:19:41', 7000),
	(70, 43, 43, '2017-10-25 21:19:41', 7000),
	(71, 44, 44, '2017-10-25 21:20:19', 7000),
	(72, 44, 44, '2017-10-25 21:20:19', 7000),
	(73, 45, 45, '2017-10-25 21:20:45', 7000),
	(74, 45, 45, '2017-10-25 21:20:45', 7000),
	(75, 46, 46, '2017-10-25 21:25:19', 7000),
	(76, 46, 46, '2017-10-25 21:25:19', 7000),
	(77, 47, 47, '2017-10-25 21:25:34', 7000),
	(78, 47, 47, '2017-10-25 21:25:34', 7000),
	(79, 48, 48, '2017-10-25 21:25:45', 7000),
	(80, 48, 48, '2017-10-25 21:25:45', 7000),
	(81, 49, 49, '2017-10-25 21:25:54', 7000),
	(82, 49, 49, '2017-10-25 21:25:54', 7000);
/*!40000 ALTER TABLE `sales` ENABLE KEYS */;

-- Dumping structure for trigger cars.total_sales
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `total_sales` BEFORE INSERT ON `sales` FOR EACH ROW BEGIN
	SET @sum = @sum + NEW.amount;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Dumping structure for view cars.customer_names
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `customer_names`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `customer_names` AS SELECT `first_name`, `last_name`
FROM customers ;

-- Dumping structure for view cars.deal
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `deal`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `deal` AS SELECT s.date_time_sale, s.amount, cr.make, cr.model, cr.`year`, c.first_name,c.last_name 
FROM sales AS s 
JOIN customers AS c
USING(customer_id)
JOIN cars AS cr
ON s.car_id = cr.id ;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
