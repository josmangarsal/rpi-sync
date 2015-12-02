CREATE TABLE IF NOT EXISTS `pi_raspberry` (
  `user` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `ip` varchar(250) NOT NULL,
  `lastupdate` datetime NOT NULL,
  PRIMARY KEY (`user`),
  UNIQUE KEY `user` (`user`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
