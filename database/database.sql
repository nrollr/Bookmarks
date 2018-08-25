DROP TABLE IF EXISTS `links`;
CREATE TABLE `links` (
  `id` varchar(10) CHARACTER SET latin1 NOT NULL DEFAULT '0',
  `name` varchar(100) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `url` varchar(200) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `status` int(1) NOT NULL DEFAULT '1',
  `parent` varchar(10) CHARACTER SET latin1 NOT NULL DEFAULT '1',
  `type` int(2) NOT NULL DEFAULT '1',
  `date` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `links` WRITE;
INSERT INTO `links` (`id`, `name`, `url`, `status`, `parent`, `type`, `date`)
VALUES
	('1655763047','Google','',1,'0',0,NULL),
	('1760558932','Apple','',1,'0',0,NULL),
	('1864410662','Google Fonts','https://fonts.google.com/',1,'1655763047',1,1535212035),
	('1965167539','Apple iPhone','https://www.apple.com/iphone/',1,'1760558932',1,1535211926),
	('2315540463','Apple iPad','https://www.apple.com/ipad/',1,'1760558932',1,1535211987),
	('3276929215','Google Drive','https://www.google.com/drive/',1,'1655763047',1,1535212073),
	('4091854276','Google Maps','https://www.google.com/maps',1,'1655763047',1,1535212000);
UNLOCK TABLES;