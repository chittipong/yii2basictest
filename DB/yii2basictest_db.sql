-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.25 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL version:             7.0.0.4053
-- Date/time:                    2018-04-13 17:34:15
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;

-- Dumping structure for table yii2basictest.migration
CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table yii2basictest.migration: ~2 rows (approximately)
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;
INSERT INTO `migration` (`version`, `apply_time`) VALUES
	('m000000_000000_base', 1444834612),
	('m151014_145837_create_news_table', 1444834893);
/*!40000 ALTER TABLE `migration` ENABLE KEYS */;


-- Dumping structure for table yii2basictest.news
CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table yii2basictest.news: ~4 rows (approximately)
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` (`id`, `title`, `content`) VALUES
	(1, 'แก้ไข', 'แก้ไข แก้ไข'),
	(2, 'bbbb', 'bbbbbb'),
	(3, 'cccc', 'cccc cccc cccc');
/*!40000 ALTER TABLE `news` ENABLE KEYS */;


-- Dumping structure for table yii2basictest.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) DEFAULT NULL,
  `detail` text,
  `photo` varchar(50) DEFAULT NULL,
  `type_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`type_id`),
  KEY `fk_products_type_idx` (`type_id`),
  CONSTRAINT `fk_products_type` FOREIGN KEY (`type_id`) REFERENCES `type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- Dumping data for table yii2basictest.products: ~9 rows (approximately)
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`id`, `name`, `detail`, `photo`, `type_id`) VALUES
	(1, 'Dreamweaver', 'Dreamweaver Tutorial', 'uploads/products/Chrysanthemum.jpg', 1),
	(2, 'Photoshop CS6', 'Photoshop CS6 Tutorial', NULL, 1),
	(3, 'Illustrator CS6', 'Ilustrator CS6 Tutorial', NULL, 1),
	(4, 'Flash', 'sdfsdfsdsdfsdfsdf', NULL, 1),
	(5, 'aaaa', 'zxczxczxczxc', NULL, 2),
	(6, 'ccccc', 'ccccccc', 'uploads/products/0417.jpg', 3),
	(7, 'ccccc', 'cccccccc', 'uploads/products/35754.jpg', 2),
	(8, 'ttttt', 'ttttt', 'uploads/products/aaaa.jpg', 1),
	(9, 'hhhhhhhh', 'hhhhhhhhh', 'uploads/products/20151017083738.jpg', 1);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;


-- Dumping structure for table yii2basictest.type
CREATE TABLE IF NOT EXISTS `type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL COMMENT 'ประเภท',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table yii2basictest.type: ~2 rows (approximately)
/*!40000 ALTER TABLE `type` DISABLE KEYS */;
INSERT INTO `type` (`id`, `name`) VALUES
	(1, 'Graphic Design'),
	(2, 'Programming'),
	(3, 'Marketing');
/*!40000 ALTER TABLE `type` ENABLE KEYS */;
/*!40014 SET FOREIGN_KEY_CHECKS=1 */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
