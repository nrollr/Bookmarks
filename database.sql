
# Dump of table links
# ------------------------------------------------------------

DROP TABLE IF EXISTS `links`;

CREATE TABLE `links` (
  `id` int(4) NOT NULL DEFAULT '0',
  `name` varchar(100) NOT NULL DEFAULT '',
  `url` varchar(200) NOT NULL DEFAULT '',
  `status` int(1) NOT NULL DEFAULT '1',
  `parent` int(2) NOT NULL DEFAULT '1',
  `type` int(2) NOT NULL DEFAULT '1',
  `date` int(10) DEFAULT NULL,
  `icon` varchar(11) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `links` WRITE;

INSERT INTO `links` (`id`, `name`, `url`, `status`, `parent`, `type`, `date`, `icon`)
VALUES
	(2289,'Google drive','https://drive.google.com',1,5868,1,1404249788,'fa-file-o'),
	(2344,'Apple','#',1,0,0,NULL,'fa-folder-o'),
	(5395,'Apple developer','https://developer.apple.com/',1,2344,1,1404249827,'fa-file-o'),
	(5868,'Google links','#',1,0,0,NULL,'fa-folder-o'),
	(7093,'Apple store','http://store.apple.com/us',1,2344,1,1404249832,'fa-file-o'),
	(7152,'Google search','https://www.google.com',1,5868,1,1404249803,'fa-file-o'),
	(9196,'Google mail','https://mail.google.com',1,5868,1,1404249770,'fa-file-o');


UNLOCK TABLES;

