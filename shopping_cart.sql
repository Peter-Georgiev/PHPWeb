-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.25-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5186
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for shopping_cart
CREATE DATABASE IF NOT EXISTS `shopping_cart` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `shopping_cart`;

-- Dumping structure for table shopping_cart.operations
CREATE TABLE IF NOT EXISTS `operations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_operations_operations_type` (`type_id`),
  CONSTRAINT `FK_operations_operations_type` FOREIGN KEY (`type_id`) REFERENCES `operations_type` (`type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table shopping_cart.operations: ~0 rows (approximately)
/*!40000 ALTER TABLE `operations` DISABLE KEYS */;
/*!40000 ALTER TABLE `operations` ENABLE KEYS */;

-- Dumping structure for table shopping_cart.operations_type
CREATE TABLE IF NOT EXISTS `operations_type` (
  `type_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table shopping_cart.operations_type: ~0 rows (approximately)
/*!40000 ALTER TABLE `operations_type` DISABLE KEYS */;
INSERT INTO `operations_type` (`type_id`, `name`) VALUES
	(1, 'Purchase');
/*!40000 ALTER TABLE `operations_type` ENABLE KEYS */;

-- Dumping structure for table shopping_cart.payments
CREATE TABLE IF NOT EXISTS `payments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `types_id` int(10) unsigned NOT NULL,
  `products_id` int(10) unsigned NOT NULL,
  `users_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_payments_payments_types` (`types_id`),
  KEY `FK_payments_products` (`products_id`),
  KEY `FK_payments_users` (`users_id`),
  CONSTRAINT `FK_payments_payments_types` FOREIGN KEY (`types_id`) REFERENCES `payments_types` (`types_id`),
  CONSTRAINT `FK_payments_products` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`),
  CONSTRAINT `FK_payments_users` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table shopping_cart.payments: ~0 rows (approximately)
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
/*!40000 ALTER TABLE `payments` ENABLE KEYS */;

-- Dumping structure for table shopping_cart.payments_types
CREATE TABLE IF NOT EXISTS `payments_types` (
  `types_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`types_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table shopping_cart.payments_types: ~0 rows (approximately)
/*!40000 ALTER TABLE `payments_types` DISABLE KEYS */;
/*!40000 ALTER TABLE `payments_types` ENABLE KEYS */;

-- Dumping structure for table shopping_cart.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `categories_id` int(10) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `measure` varchar(20) NOT NULL,
  `qtty` double NOT NULL,
  `price` decimal(10,4) NOT NULL,
  `deleted` bit(1) NOT NULL DEFAULT b'0',
  `promotions_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_products_products_categories` (`categories_id`),
  CONSTRAINT `FK_products_products_categories` FOREIGN KEY (`categories_id`) REFERENCES `products_categories` (`categories_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table shopping_cart.products: ~0 rows (approximately)
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

-- Dumping structure for table shopping_cart.products_categories
CREATE TABLE IF NOT EXISTS `products_categories` (
  `categories_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `discount` float(5,2) DEFAULT NULL,
  PRIMARY KEY (`categories_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table shopping_cart.products_categories: ~4 rows (approximately)
/*!40000 ALTER TABLE `products_categories` DISABLE KEYS */;
INSERT INTO `products_categories` (`categories_id`, `name`, `discount`) VALUES
	(1, 'Laptop', 0.00),
	(2, 'Phone', 0.00),
	(3, 'Keyboard', 0.00),
	(4, 'Mouse', 0.00);
/*!40000 ALTER TABLE `products_categories` ENABLE KEYS */;

-- Dumping structure for table shopping_cart.promotions
CREATE TABLE IF NOT EXISTS `promotions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `discount` float(5,2) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `type_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_promotions_promotions_type` (`type_id`),
  CONSTRAINT `FK_promotions_promotions_type` FOREIGN KEY (`type_id`) REFERENCES `promotions_type` (`type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table shopping_cart.promotions: ~0 rows (approximately)
/*!40000 ALTER TABLE `promotions` DISABLE KEYS */;
/*!40000 ALTER TABLE `promotions` ENABLE KEYS */;

-- Dumping structure for table shopping_cart.promotions_type
CREATE TABLE IF NOT EXISTS `promotions_type` (
  `type_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`type_id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table shopping_cart.promotions_type: ~0 rows (approximately)
/*!40000 ALTER TABLE `promotions_type` DISABLE KEYS */;
/*!40000 ALTER TABLE `promotions_type` ENABLE KEYS */;

-- Dumping structure for table shopping_cart.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `reg_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `groups_id` int(10) unsigned NOT NULL,
  `discount` float(5,2) DEFAULT NULL,
  `deleted` bit(1) NOT NULL DEFAULT b'0',
  UNIQUE KEY `username` (`username`),
  KEY `id` (`id`),
  KEY `FK_users_users_groups` (`groups_id`),
  CONSTRAINT `FK_users_users_groups` FOREIGN KEY (`groups_id`) REFERENCES `users_groups` (`groups_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Dumping data for table shopping_cart.users: ~0 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `username`, `password`, `first_name`, `last_name`, `reg_time`, `groups_id`, `discount`, `deleted`) VALUES
	(4, 'enter', '$2y$10$LXFdYsoRidg4IDoOnl8gueqT.02D6mrKx/7hnIl8rJ75Hedlp8Wq6', NULL, NULL, '2017-11-19 22:04:10', 3, NULL, b'0'),
	(6, 'enter42', '$2y$10$8uNK6IT/tjplU7kiSnDRYuJr82UxcRHjmfsHtxasGI2Uj5Nb3/rQK', NULL, NULL, '2017-11-19 22:42:39', 3, NULL, b'0'),
	(2, 'minko', '$2y$10$I39RRaxQOBs55Oy3hlU4iu.RLdKYEveS3VcMJ5MA66vf4E5rNigpm', NULL, NULL, '2017-11-19 21:17:28', 3, NULL, b'0'),
	(3, 'pesho', '$2y$10$B/AJw91mjiXf2rgDwraD2.bW1tAQ83eZ3OTbtHpqgBcg4oG.tQiIy', NULL, NULL, '2017-11-19 21:19:12', 3, NULL, b'0'),
	(1, 'peter', '$2y$10$KgBb1Qm/YhmNUvDR4utKIeiWXy7kEsANVj6Y6v0RWV2ARoLbmZisG', NULL, NULL, '2017-11-19 20:53:22', 3, NULL, b'0'),
	(5, 'peter34', '$2y$10$2efabI3Sax/wLh3bOPuaweRHiumV2Ta0tuH55ywTNbxajc5TkEDSa', NULL, NULL, '2017-11-19 22:38:18', 3, NULL, b'0'),
	(7, 'peterdasd', '$2y$10$2wlevhHY/EEAagBZU28oh.9JgVIGn1l0Gr5xPMMdbmbHIMbKLEMii', NULL, NULL, '2017-11-19 22:45:29', 3, NULL, b'0'),
	(8, 'peterewr', '$2y$10$mkrXMqbIO9TZiHuQ.pHm8Ot7mGKQmz1/DmSGkffPAtlR6nYdBpGsS', NULL, NULL, '2017-11-19 22:54:54', 3, NULL, b'0');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table shopping_cart.users_groups
CREATE TABLE IF NOT EXISTS `users_groups` (
  `groups_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`groups_id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table shopping_cart.users_groups: ~2 rows (approximately)
/*!40000 ALTER TABLE `users_groups` DISABLE KEYS */;
INSERT INTO `users_groups` (`groups_id`, `name`) VALUES
	(1, 'Administrator'),
	(4, 'Client'),
	(2, 'Editor'),
	(3, 'User');
/*!40000 ALTER TABLE `users_groups` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
