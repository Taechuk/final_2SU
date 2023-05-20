DROP DATABASE IF EXISTS `final`;
CREATE DATABASE `final`;
USE `final`;

CREATE TABLE `game` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `rules` varchar(200) NULL,
  `gameid` int(10) unsigned NOT NULL,
  `fullgame` bit NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `run` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `categoryid` int(10) unsigned NOT NULL,
  `userid` int(10) unsigned NOT NULL,
  `comments` varchar(200) NULL,
  `hours` int(2) unsigned NOT NULL,
  `minutes` int(2) unsigned NOT NULL,
  `seconds` int(2) unsigned NOT NULL,
  `emulator` bit NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT, 
  `user` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `pwd` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `user` VALUES(NULL,'zeldafreakglitcha4@someemailservice.com', 'ZFG1', 'OMSWinnerMaybe');
INSERT INTO `user` VALUES(NULL,'cheeseofour@someemailservice.com', 'Cheese', 'MarioGOAT');
INSERT INTO `user` VALUES(NULL,'lfp@someemailservice.com', 'Taechuk', 'thatsme');
INSERT INTO `user` VALUES(NULL,'playerfive@someemailservice.com', 'Player 5', 'BLSSForLife');


INSERT INTO `game` VALUES(NULL,'Super Mario 64');
INSERT INTO `game` VALUES(NULL,'The Legend Of Zelda : Ocarina of Time');
INSERT INTO `game` VALUES(NULL,'The Legend Of Zelda : Breath of The Wild');


INSERT INTO `category` VALUES(NULL,'16 Stars', 'Beat the game, Side Backwards Long Jumps are banned', 1, 1);
INSERT INTO `category` VALUES(NULL,'120 Stars', 'Beat the game while obtaining every stars', 1, 1);

INSERT INTO `category` VALUES(NULL,'100% No SRM', 'Defeat Ganon, all goal items must be obtained from their natural sources, Stale Reference Manipulation is banned', 2, 1);
INSERT INTO `category` VALUES(NULL,'100% SRM', 'Defeat Ganon, all goal items must be obtained from their natural sources', 2, 1);
INSERT INTO `category` VALUES(NULL,'Defeat Ganon No SRM', 'Defeat Ganon, Stale Reference Manipulation is banned', 2, 1);
INSERT INTO `category` VALUES(NULL,'Defeat Ganon SRM', 'Defeat Ganon', 2, 1);
INSERT INTO `category` VALUES(NULL,'any%', 'Reach the end credits by any means necessary', 2, 1);
INSERT INTO `category` VALUES(NULL,'Max% Child', 'Obtain as many items possible while remaining a child. Time ends when collecting the Master Sword. Stale Reference Manipulation is banned. Item List : https://pastebin.com/JxXxehFJ', 2, 0);

INSERT INTO `category` VALUES(NULL,'any%', 'Defeat Dark Beast Ganon', 3, 1);

INSERT INTO `run` VALUES(NULL,1, 2, NULL, 0, 15, 13, 0);
INSERT INTO `run` VALUES(NULL,2, 2, 'World Record on February 28th 2022', 1, 37, 50, 0);
INSERT INTO `run` VALUES(NULL,1, 3, 'PB from 2017', 0, 20, 16, 1);

INSERT INTO `run` VALUES(NULL,3, 1, 'World Record on June 29th 2019', 3, 48, 47, 0);
INSERT INTO `run` VALUES(NULL,4, 1, 'World Record since March 11th 2021', 3, 0, 39, 0);
INSERT INTO `run` VALUES(NULL,5, 1, NULL, 0, 18, 53, 0);
INSERT INTO `run` VALUES(NULL,5, 3, 'More of a segmented "No Wrong Warp" run, I am bad', 1, 50, 53, 0);
INSERT INTO `run` VALUES(NULL,6, 1, NULL, 0, 11, 13, 0);
INSERT INTO `run` VALUES(NULL,7, 1, NULL, 0, 4, 34, 0);
INSERT INTO `run` VALUES(NULL,8, 1, 'Hardest category', 5, 49, 39, 0);

INSERT INTO `run` VALUES(NULL,9, 4, 'World Record since May 5th 2023', 0, 23, 42, false);









