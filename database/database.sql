
# Dump of table "links"
# Contains some example links and folder structure
# ------------------------------------------------------------

DROP TABLE IF EXISTS `links`;

CREATE TABLE `links` (
  `id` varchar(32) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `url` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `status` int(1) NOT NULL DEFAULT '1',
  `parent` varchar(32) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `type` int(2) NOT NULL DEFAULT '1',
  `date` int(10) DEFAULT NULL,
  `icon` varchar(11) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `links` WRITE;

INSERT INTO `links` (`id`, `name`, `url`, `status`, `parent`, `type`, `date`, `icon`)
VALUES
  ('8b36e9207c24c76e6719268e49201d94','Google','',1,'0',0,NULL,'fa-folder-o'),
  ('9f6290f4436e5a2351f12e03b6433c3c','Apple','',1,'0',0,NULL,'fa-folder-o'),
  ('b078cb962140bcbfde199198b403bb61','Google drive','https://drive.google.com',1,'8b36e9207c24c76e6719268e49201d94',1,1450288803,'fa-file-o'),
  ('8ffdefbdec956b595d257f0aaeefd623','Google search','https://www.google.com',1,'8b36e9207c24c76e6719268e49201d94',1,1450288826,'fa-file-o'),
  ('c57db1d85b3dcdb2bf3a063f9c69407d','Google mail','https://mail.google.com',1,'8b36e9207c24c76e6719268e49201d94',1,1450288851,'fa-file-o'),
  ('ee0b56109079d1b2dc478f425e641f53','Apple store','http://store.apple.com/us',1,'9f6290f4436e5a2351f12e03b6433c3c',1,1450288872,'fa-file-o'),
  ('a2d2c6f008dee64f2192a54470d41ba4','Apple developer','https://developer.apple.com',1,'9f6290f4436e5a2351f12e03b6433c3c',1,1450288885,'fa-file-o');

UNLOCK TABLES;