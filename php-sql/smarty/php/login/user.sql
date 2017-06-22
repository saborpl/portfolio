CREATE TABLE IF NOT EXISTS `user` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) CHARACTER SET utf8 NOT NULL,
  `email` varchar(200) CHARACTER SET utf8 NOT NULL,
  `password` varchar(200) CHARACTER SET utf8 NOT NULL,
  `salt` varchar(200) CHARACTER SET utf8 NOT NULL,
  `registration-date` datetime DEFAULT NULL,
  `active` int(11) DEFAULT '0',
  `admin` int(11) DEFAULT '0',
  PRIMARY KEY (`userID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

INSERT INTO `user` (`userID`, `username`, `email`, `password`, `salt`, `registration-date`, `active`, `admin`) VALUES
(1, 'admin', 'admin@example.com', 'f731c59df55d5d9097c5731b66f38789c2a6c575', '889', '2010-07-04 11:34:27', 1, 1);
