use wheat_statements
/*
Navicat MySQL Data Transfer

Source Server         : Server
Source Server Version : 50505
Source Host           : 10.10.10.8:3306
Source Database       : plant

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2022-03-29 16:23:47
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for regions
-- ----------------------------
DROP TABLE IF EXISTS `regions`;
CREATE TABLE `regions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `special` enum('0','1') NOT NULL DEFAULT '0',
  `visible` enum('0','1') NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3;

-- ----------------------------
-- Records of regions
-- ----------------------------

SET IDENTITY_INSERT regions ON

INSERT INTO regions(id, title, special, visible) VALUES ('2', N'აჭარა', '0', '1');
INSERT INTO regions(id, title, special, visible) VALUES ('3', N'გურია', '0', '1');
INSERT INTO regions(id, title, special, visible) VALUES ('4', N'კახეთი', '1', '1');
INSERT INTO regions(id, title, special, visible) VALUES ('5', N'მცხეთა-მთიანეთი', '1', '1');
INSERT INTO regions(id, title, special, visible) VALUES ('6', N'რაჭა-ლეჩხუმი და ქვემო სვანეთი', '1', '1');
INSERT INTO regions(id, title, special, visible) VALUES ('7', N'სამეგრელო-ზემო სვანეთი', '0', '1');
INSERT INTO regions(id, title, special, visible) VALUES ('8', N'სამცხე-ჯავახეთი', '1', '1');
INSERT INTO regions(id, title, special, visible) VALUES ('9', N'შიდა ქართლი', '1', '1');
INSERT INTO regions(id, title, special, visible) VALUES ('10', N'ქვემო ქართლი', '1', '1');
INSERT INTO regions(id, title, special, visible) VALUES ('11', N'იმერეთი', '1', '1');
INSERT INTO regions(id, title, special, visible) VALUES ('12', N'თბილისი', '1', '1');
