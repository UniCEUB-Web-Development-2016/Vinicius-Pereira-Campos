--difficulty	
CREATE TABLE `difficulty` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `difficulty` varchar(250) DEFAULT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1
project	CREATE TABLE `project` (
 `Id` int(11) NOT NULL AUTO_INCREMENT,
 `name` varchar(250) NOT NULL,
 `team` int(11) NOT NULL,
 `createdOn` date NOT NULL,
 `estimatedDeadline` date NOT NULL,
 `description` varchar(250) NOT NULL,
 `active` tinyint(1) NOT NULL,
 PRIMARY KEY (`Id`),
 CONSTRAINT `project_ibfk_1` FOREIGN KEY (`Id`) REFERENCES `team` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1
state	CREATE TABLE `state` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `state` varchar(255) DEFAULT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1
task	CREATE TABLE `task` (
 `Id` int(11) NOT NULL AUTO_INCREMENT,
 `name` varchar(250) NOT NULL,
 `description` varchar(250) NOT NULL,
 `estimate` varchar(250) NOT NULL,
 `difficulty` int(11) NOT NULL,
 `owner` int(11) NOT NULL,
 `createdBy` int(11) NOT NULL,
 `state` int(11) NOT NULL,
 `project` int(11) NOT NULL,
 `createdOn` datetime NOT NULL,
 `active` tinyint(1) NOT NULL,
 PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1
team	CREATE TABLE `team` (
 `Id` int(11) NOT NULL AUTO_INCREMENT,
 `name` varchar(250) NOT NULL,
 `createdBy` int(11) NOT NULL,
 `createdOn` date NOT NULL,
 `active` tinyint(1) NOT NULL,
 PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1
user	CREATE TABLE `user` (
 `ID` int(11) NOT NULL AUTO_INCREMENT,
 `Name` varchar(250) NOT NULL,
 `lastName` varchar(250) NOT NULL,
 `CPF` varchar(11) NOT NULL,
 `Password` varchar(250) NOT NULL,
 `email` varchar(250) NOT NULL,
 `role` varchar(250) NOT NULL,
 `birthday` date NOT NULL,
 `experience` int(11) NOT NULL,
 `alias` varchar(250) NOT NULL,
 `trophies` int(11) NOT NULL,
 `level` int(11) NOT NULL,
 `active` tinyint(1) NOT NULL,
 PRIMARY KEY (`ID`),
 UNIQUE KEY `CPF` (`CPF`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1