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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- Dumping data for table cars.cars: ~10 rows (approximately)
/*!40000 ALTER TABLE `cars` DISABLE KEYS */;
REPLACE INTO `cars` (`id`, `make`, `model`, `year`) VALUES
	(1, 'Audi', 'A4', 2004),
	(6, 'Ford', 'Cortina', 2010),
	(7, 'BMW', '116', 2012),
	(8, 'Ford', 'c-max', 2007),
	(9, 'Audi', 'A4', 2004),
	(10, 'BMW', '116', 2010),
	(19, 'Audi', 'A4', 2008),
	(20, 'Opel', 'Vectra B', 2010),
	(21, 'Audi', 'A8', 2009),
	(22, 'Opel', 'Vectra B', 2008),
	(23, 'Opel', 'Vectra B', 1996);
/*!40000 ALTER TABLE `cars` ENABLE KEYS */;

-- Dumping structure for table cars.customers
CREATE TABLE IF NOT EXISTS `customers` (
  `customer_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- Dumping data for table cars.customers: ~10 rows (approximately)
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
REPLACE INTO `customers` (`customer_id`, `first_name`, `last_name`) VALUES
	(1, ' Ilia', ' Petrov'),
	(3, 'Stoyan', 'Zahariev'),
	(4, ' Iliana', ' Petrova'),
	(5, ' Stoyan', ' Lazarov'),
	(6, 'Ivan', 'Ivanov'),
	(7, 'Ilia', 'Petrov'),
	(16, 'Ivan', 'Petrov'),
	(17, 'Peter', 'Ivanov'),
	(18, 'Minko', 'Antonov'),
	(19, 'Milen', 'Soilov'),
	(20, 'Петър', 'Георгиев');
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
	`sale_id` INT(10) UNSIGNED NOT NULL,
	`date_time_sale` DATETIME NOT NULL,
	`amount` DOUBLE NULL,
	`currency` CHAR(3) NULL COLLATE 'utf8_general_ci',
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
  `amount` double unsigned DEFAULT '0',
  `currency` char(3) DEFAULT NULL,
  PRIMARY KEY (`sale_id`),
  KEY `FK_sales_cars` (`car_id`),
  KEY `FK_sales_customers` (`customer_id`),
  CONSTRAINT `FK_sales_cars` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_sales_customers` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- Dumping data for table cars.sales: ~10 rows (approximately)
/*!40000 ALTER TABLE `sales` DISABLE KEYS */;
REPLACE INTO `sales` (`sale_id`, `customer_id`, `car_id`, `date_time_sale`, `amount`, `currency`) VALUES
	(1, 1, 1, '2017-10-24 19:39:38', 3800, NULL),
	(2, 3, 6, '2017-10-24 19:48:31', 10000, NULL),
	(3, 4, 7, '2017-10-24 20:14:21', 23100, NULL),
	(4, 5, 8, '2017-10-24 20:16:44', 7600, NULL),
	(5, 6, 9, '2017-10-27 23:21:19', 7000, 'BGN'),
	(6, 7, 10, '2017-10-27 23:21:31', 24000, 'BGN'),
	(15, 16, 19, '2017-10-28 18:26:33', 8000, 'BGN'),
	(16, 17, 20, '2017-10-28 18:33:42', 8000, 'BGN'),
	(17, 18, 21, '2017-10-28 18:37:19', 8000, 'BGN'),
	(18, 19, 22, '2017-10-28 18:42:24', 8000, 'BGN'),
	(19, 20, 23, '2017-10-30 00:00:00', 2310, 'USD');
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
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `deal` AS SELECT s.sale_id, s.date_time_sale, s.amount, s.currency, cr.make, cr.model, cr.`year`, c.first_name, c.last_name
FROM sales AS s 
JOIN customers AS c
USING(customer_id)
JOIN cars AS cr
ON s.car_id = cr.id ;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
