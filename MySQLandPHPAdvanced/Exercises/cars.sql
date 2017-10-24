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

-- Dumping structure for table cars.customers
CREATE TABLE IF NOT EXISTS `customers` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table cars.customers: ~0 rows (approximately)
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;

-- Dumping structure for table cars.sales
CREATE TABLE IF NOT EXISTS `sales` (
  `sale_id` int(11) NOT NULL AUTO_INCREMENT,
  `car_id` int(11) DEFAULT NULL,
  `custoner_id` int(11) DEFAULT NULL,
  `datetime_sale` datetime DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  PRIMARY KEY (`sale_id`),
  KEY `FK_sales_used_cars` (`car_id`),
  KEY `FK_sales_customers` (`custoner_id`),
  CONSTRAINT `FK_sales_customers` FOREIGN KEY (`custoner_id`) REFERENCES `customers` (`customer_id`),
  CONSTRAINT `FK_sales_used_cars` FOREIGN KEY (`car_id`) REFERENCES `used_cars` (`car_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table cars.sales: ~0 rows (approximately)
/*!40000 ALTER TABLE `sales` DISABLE KEYS */;
/*!40000 ALTER TABLE `sales` ENABLE KEYS */;

-- Dumping structure for table cars.used_cars
CREATE TABLE IF NOT EXISTS `used_cars` (
  `car_id` int(11) NOT NULL AUTO_INCREMENT,
  `make` varchar(50) DEFAULT NULL,
  `model` varchar(50) DEFAULT NULL,
  `year` int(10) DEFAULT NULL,
  PRIMARY KEY (`car_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table cars.used_cars: ~0 rows (approximately)
/*!40000 ALTER TABLE `used_cars` DISABLE KEYS */;
/*!40000 ALTER TABLE `used_cars` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
