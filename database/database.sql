DROP TABLE IF EXISTS `links`;

CREATE TABLE `links` (
  `id` varchar(10) CHARACTER SET latin1 NOT NULL DEFAULT '0',
  `name` varchar(100) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `url` varchar(200) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `status` int(1) NOT NULL DEFAULT '1',
  `parent` varchar(10) CHARACTER SET latin1 NOT NULL DEFAULT '1',
  `type` int(2) NOT NULL DEFAULT '1',
  `date` int(10) DEFAULT NULL,
  `icon` varchar(11) CHARACTER SET latin1 NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `links` WRITE;

INSERT INTO `links` (`id`, `name`, `url`, `status`, `parent`, `type`, `date`, `icon`)
VALUES
  ('1187194984','Google drive','https://drive.google.com',1,'1655763047',1,1502477998,'fa-file-o'),
  ('1655763047','Google','',1,'0',0,NULL,'fa-folder-o'),
  ('1760558932','Apple','',1,'0',0,NULL,'fa-folder-o'),
  ('1836673958','Apple store','http://store.apple.com/us',1,'1760558932',1,1502478044,'fa-file-o'),
  ('2785078488','Apple developer','https://developer.apple.com',1,'1760558932',1,1502478057,'fa-file-o'),
  ('565725474','Google mail','https://mail.google.com',1,'1760558932',1,1502478031,'fa-file-o'),
  ('857627499','Google search','https://www.google.com',1,'1655763047',1,1502478018,'fa-file-o');

UNLOCK TABLES;