--
-- Database: `Adress`
--
-- Table structure for table `address`
--
DROP TABLE address IF EXISTS;
CREATE TABLE IF NOT EXISTS `address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `street` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;
--
-- Dumping data for table `address`
--
INSERT INTO `address` (`id`, `name`, `street`, `phone` ) VALUES
(1, 'Michal', 'Michalowskiego 41', '506088156'),
(2, 'Marcin', 'Opata Rybickiego 1', '502145785'),
(3, 'Piotr', 'Horacego 23', '504212369'),
(4, 'Albert', 'Jan Pawła', '605458547');
