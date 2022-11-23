-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               10.4.25-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for monchercosmetics
CREATE DATABASE IF NOT EXISTS `monchercosmetics` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `monchercosmetics`;

-- Dumping structure for table monchercosmetics.category
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Category Name` varchar(100) DEFAULT NULL,
  `Description` varchar(100) DEFAULT NULL,
  `Meta Tag Keywords` varchar(100) DEFAULT NULL,
  `Meta Tag Description` varchar(100) DEFAULT NULL,
  `Category Val` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table monchercosmetics.countries
CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Country Name` varchar(100) DEFAULT NULL,
  `ISO Code` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table monchercosmetics.coupons
CREATE TABLE IF NOT EXISTS `coupons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Coupon Name` varchar(200) DEFAULT NULL,
  `Code` varchar(200) DEFAULT NULL,
  `Coupon Description` varchar(200) DEFAULT NULL,
  `Type` varchar(200) DEFAULT NULL,
  `Free Shipping` varchar(200) DEFAULT NULL,
  `Categories` varchar(200) DEFAULT NULL,
  `Discount` int(11) DEFAULT NULL,
  `UsedFrom` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `Date Start` varchar(50) DEFAULT NULL,
  `Date End` varchar(50) DEFAULT NULL,
  `Status` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table monchercosmetics.currencies
CREATE TABLE IF NOT EXISTS `currencies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Currency Title` varchar(50) DEFAULT NULL,
  `Code` varchar(50) DEFAULT NULL,
  `Value` float DEFAULT NULL,
  `Last Updated` datetime DEFAULT NULL,
  `Status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table monchercosmetics.customers
CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `First Name` varchar(250) DEFAULT NULL,
  `Last Name` varchar(250) DEFAULT NULL,
  `username` varchar(250) NOT NULL DEFAULT '0',
  `email` varchar(250) NOT NULL DEFAULT '0',
  `Phone` int(11) DEFAULT NULL,
  `Fax` int(11) DEFAULT NULL,
  `password` varchar(500) NOT NULL DEFAULT '0',
  `description` varchar(250) DEFAULT NULL,
  `avatar` varchar(250) DEFAULT NULL,
  `newsletter` int(11) DEFAULT NULL,
  `token` varchar(50) DEFAULT NULL,
  `token_expire` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table monchercosmetics.delivery
CREATE TABLE IF NOT EXISTS `delivery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Placed on` timestamp NULL DEFAULT current_timestamp(),
  `status` varchar(1000) DEFAULT NULL,
  `From` varchar(1000) DEFAULT NULL,
  `Address` varchar(1000) DEFAULT NULL,
  `country/region` varchar(1000) DEFAULT NULL,
  `city` varchar(1000) DEFAULT NULL,
  `Postal Code` varchar(1000) DEFAULT NULL,
  `phone number` int(11) DEFAULT NULL,
  `Product Name` varchar(1000) DEFAULT NULL,
  `Quantity` int(255) DEFAULT NULL,
  `Delivery cost` int(11) DEFAULT NULL COMMENT 'Default EUR',
  `Sub Total` int(11) DEFAULT NULL COMMENT 'Default EUR',
  `Total` int(11) DEFAULT NULL COMMENT 'Default EUR',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table monchercosmetics.image
CREATE TABLE IF NOT EXISTS `image` (
  `imageId` varchar(50) DEFAULT NULL,
  `imageType` varchar(50) DEFAULT NULL,
  `imageData` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table monchercosmetics.invoices
CREATE TABLE IF NOT EXISTS `invoices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Placed on` timestamp NULL DEFAULT current_timestamp(),
  `status` varchar(1000) DEFAULT NULL,
  `From` varchar(1000) DEFAULT NULL,
  `Address` varchar(1000) DEFAULT NULL,
  `country/region` varchar(1000) DEFAULT NULL,
  `city` varchar(1000) DEFAULT NULL,
  `Postal Code` varchar(1000) DEFAULT NULL,
  `phone number` int(11) DEFAULT NULL,
  `Product Name` varchar(1000) DEFAULT NULL,
  `Quantity` int(255) DEFAULT NULL,
  `Delivery cost` int(11) DEFAULT NULL COMMENT 'Default EUR',
  `Sub Total` int(11) DEFAULT NULL COMMENT 'Default EUR',
  `Total` int(11) DEFAULT NULL COMMENT 'Default EUR',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table monchercosmetics.newsletter
CREATE TABLE IF NOT EXISTS `newsletter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) DEFAULT NULL,
  `email` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table monchercosmetics.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created on` timestamp NULL DEFAULT current_timestamp(),
  `status` varchar(50) NOT NULL,
  `stock` int(11) NOT NULL,
  `image_id` varchar(50) NOT NULL,
  `Product Name` varchar(500) NOT NULL,
  `Product Price` int(11) NOT NULL COMMENT 'Default Euro',
  `Discount` int(11) DEFAULT 0,
  `Product Description` longtext NOT NULL,
  `Category` varchar(50) NOT NULL,
  `tags` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=180 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table monchercosmetics.social
CREATE TABLE IF NOT EXISTS `social` (
  `facebook` varchar(1200) DEFAULT NULL,
  `twitter` varchar(1200) DEFAULT NULL,
  `TikTok` varchar(1200) DEFAULT NULL,
  `youtube` varchar(1200) DEFAULT NULL,
  `instagram` varchar(1200) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table monchercosmetics.store config
CREATE TABLE IF NOT EXISTS `store config` (
  `id` int(11) DEFAULT NULL,
  `Store Name` varchar(50) DEFAULT NULL,
  `Title` int(11) DEFAULT NULL,
  `Meta Tag Description` int(11) DEFAULT NULL,
  `Meta Keywords` int(11) DEFAULT NULL,
  `Welcome Message` int(11) DEFAULT NULL,
  `Store Owner` int(11) DEFAULT NULL,
  `Address` int(11) DEFAULT NULL,
  `E-Mail` int(11) DEFAULT NULL,
  `Telephone` int(11) DEFAULT NULL,
  `Country` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table monchercosmetics.system
CREATE TABLE IF NOT EXISTS `system` (
  `Control Panel Session Expiration` int(11) DEFAULT NULL,
  `Maintenance Mode` int(11) DEFAULT NULL,
  `Cache enabled` int(11) DEFAULT NULL,
  `Display Errors` int(11) DEFAULT NULL,
  `Log Errors` varchar(50) DEFAULT NULL,
  `Error Log Filename` varchar(50) DEFAULT NULL,
  `System Check` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
