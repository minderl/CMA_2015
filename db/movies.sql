CREATE TABLE IF NOT EXISTS `movies` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `title` varchar(64) NOT NULL,
  `cover` varchar(255) NOT NULL,
  `genre` int(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;