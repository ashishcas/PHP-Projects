CREATE TABLE IF NOT EXISTS `upload` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `image` longblob NOT NULL,
  PRIMARY KEY (`id`)
)