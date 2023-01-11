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

Date: 2022-03-29 16:23:39
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for municipalities
-- ----------------------------
DROP TABLE IF EXISTS `municipalities`;
CREATE TABLE `municipalities` (
  id int(11) NOT NULL IDENTITY(1,1),
  title nvarchar(255) NOT NULL,
  region int(11) NOT NULL,
  visible enum('0','1') NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of municipalities
-- ----------------------------
SET IDENTITY_INSERT municipalities ON

INSERT INTO municipalities(id, title, region_id, visible) VALUES ('2', N'ქობულეთი', '2', '1');
INSERT INTO municipalities(id, title, region_id, visible) VALUES ('3', N'ხელვაჩაური', '2', '1');
INSERT INTO municipalities(id, title, region_id, visible) VALUES ('4', N'ქედა', '2', '1');
INSERT INTO municipalities(id, title, region_id, visible) VALUES ('5', N'შუახევი', '2', '1');
INSERT INTO municipalities(id, title, region_id, visible) VALUES ('6', N'ხულო', '2', '1');
INSERT INTO municipalities(id, title, region_id, visible) VALUES ('7', N'ლანჩხუთი', '3', '1');
INSERT INTO municipalities(id, title, region_id, visible) VALUES ('8', N'ოზურგეთი', '3', '1');
INSERT INTO municipalities(id, title, region_id, visible) VALUES ('9', N'ჩოხატაური', '3', '1');
INSERT INTO municipalities(id, title, region_id, visible) VALUES ('11', N'ზესტაფონი', '11', '1');
INSERT INTO municipalities(id, title, region_id, visible) VALUES ('12', N'წყალტუბო', '11', '1');
INSERT INTO municipalities(id, title, region_id, visible) VALUES ('13', N'სამტრედია', '11', '1');
INSERT INTO municipalities(id, title, region_id, visible) VALUES ('14', N'ჭიათურა', '11', '1');
INSERT INTO municipalities(id, title, region_id, visible) VALUES ('15', N'თერჯოლა', '11', '1');
INSERT INTO municipalities(id, title, region_id, visible) VALUES ('16', N'ვანი', '11', '1');
INSERT INTO municipalities(id, title, region_id, visible) VALUES ('17', N'ხონი', '11', '1');
INSERT INTO municipalities(id, title, region_id, visible) VALUES ('18', N'ტყიბული', '11', '1');
INSERT INTO municipalities(id, title, region_id, visible) VALUES ('19', N'ბაღდათი', '11', '1');
INSERT INTO municipalities(id, title, region_id, visible) VALUES ('20', N'ხარაგაული', '11', '1');
INSERT INTO municipalities(id, title, region_id, visible) VALUES ('21', N'თელავი', '4', '1');
INSERT INTO municipalities(id, title, region_id, visible) VALUES ('22', N'ახმეტა', '4', '1');
INSERT INTO municipalities(id, title, region_id, visible) VALUES ('23', N'გურჯაანი', '4', '1');
INSERT INTO municipalities(id, title, region_id, visible) VALUES ('24', N'ყვარელი', '4', '1');
INSERT INTO municipalities(id, title, region_id, visible) VALUES ('25', N'დედოფლისწყარო', '4', '1');
INSERT INTO municipalities(id, title, region_id, visible) VALUES ('26', N'ლაგოდეხი', '4', '1');
INSERT INTO municipalities(id, title, region_id, visible) VALUES ('27', N'საგარეჯო', '4', '1');
INSERT INTO municipalities(id, title, region_id, visible) VALUES ('28', N'სიღნაღი', '4', '1');
INSERT INTO municipalities(id, title, region_id, visible) VALUES ('29', N'ახალგორი', '5', '1');
INSERT INTO municipalities(id, title, region_id, visible) VALUES ('30', N'დუშეთი', '5', '1');
INSERT INTO municipalities(id, title, region_id, visible) VALUES ('31', N'თიანეთი', '5', '1');
INSERT INTO municipalities(id, title, region_id, visible) VALUES ('32', N'მცხეთა', '5', '1');
INSERT INTO municipalities(id, title, region_id, visible) VALUES ('33', N'ყაზბეგი', '5', '1');
INSERT INTO municipalities(id, title, region_id, visible) VALUES ('34', N'ამბროლაური', '6', '1');
INSERT INTO municipalities(id, title, region_id, visible) VALUES ('35', N'ლენტეხი', '6', '1');
INSERT INTO municipalities(id, title, region_id, visible) VALUES ('36', N'ონი', '6', '1');
INSERT INTO municipalities(id, title, region_id, visible) VALUES ('37', N'ცაგერი', '6', '1');
INSERT INTO municipalities(id, title, region_id, visible) VALUES ('39', N'აბაშა', '7', '1');
INSERT INTO municipalities(id, title, region_id, visible) VALUES ('40', N'სენაკი', '7', '1');
INSERT INTO municipalities(id, title, region_id, visible) VALUES ('42', N'ზუგდიდი', '7', '1');
INSERT INTO municipalities(id, title, region_id, visible) VALUES ('43', N'მარტვილი', '7', '1');
INSERT INTO municipalities(id, title, region_id, visible) VALUES ('44', N'წალენჯიხა', '7', '1');
INSERT INTO municipalities(id, title, region_id, visible) VALUES ('45', N'ხობი', '7', '1');
INSERT INTO municipalities(id, title, region_id, visible) VALUES ('46', N'ჩხოროწყუ', '7', '1');
INSERT INTO municipalities(id, title, region_id, visible) VALUES ('47', N'მესტია', '7', '1');
INSERT INTO municipalities(id, title, region_id, visible) VALUES ('48', N'ადიგენი', '8', '1');
INSERT INTO municipalities(id, title, region_id, visible) VALUES ('49', N'ასპინძა', '8', '1');
INSERT INTO municipalities(id, title, region_id, visible) VALUES ('50', N'ახალქალაქი', '8', '1');
INSERT INTO municipalities(id, title, region_id, visible) VALUES ('51', N'ბორჯომი', '8', '1');
INSERT INTO municipalities(id, title, region_id, visible) VALUES ('52', N'ნინოწმინდა', '8', '1');
INSERT INTO municipalities(id, title, region_id, visible) VALUES ('54', N'გარდაბანი', '10', '1');
INSERT INTO municipalities(id, title, region_id, visible) VALUES ('55', N'ბოლნისი', '10', '1');
INSERT INTO municipalities(id, title, region_id, visible) VALUES ('56', N'მარნეული', '10', '1');
INSERT INTO municipalities(id, title, region_id, visible) VALUES ('57', N'დმანისი', '10', '1');
INSERT INTO municipalities(id, title, region_id, visible) VALUES ('58', N'თეთრიწყარო', '10', '1');
INSERT INTO municipalities(id, title, region_id, visible) VALUES ('59', N'წალკა', '10', '1');
INSERT INTO municipalities(id, title, region_id, visible) VALUES ('60', N'გორი', '9', '1');
INSERT INTO municipalities(id, title, region_id, visible) VALUES ('61', N'კასპი', '9', '1');
INSERT INTO municipalities(id, title, region_id, visible) VALUES ('62', N'ქარელი', '9', '1');
INSERT INTO municipalities(id, title, region_id, visible) VALUES ('63', N'ხაშური', '9', '1');
INSERT INTO municipalities(id, title, region_id, visible) VALUES ('64', N'ერედვი', '9', '1');
INSERT INTO municipalities(id, title, region_id, visible) VALUES ('65', N'ქურთი', '9', '1');
INSERT INTO municipalities(id, title, region_id, visible) VALUES ('66', N'თიღვი', '9', '1');
INSERT INTO municipalities(id, title, region_id, visible) VALUES ('67', N'ახალციხე', '8', '1');
INSERT INTO municipalities(id, title, region_id, visible) VALUES ('68', N'საჩხერე', '11', '1');
INSERT INTO municipalities(id, title, region_id, visible) VALUES ('69', N'ქუთაისი', '11', '1');
INSERT INTO municipalities(id, title, region_id, visible) VALUES ('70', N'ბათუმი', '2', '1');
INSERT INTO municipalities(id, title, region_id, visible) VALUES ('71', N'რუსთავი', '10', '1');
INSERT INTO municipalities(id, title, region_id, visible) VALUES ('72', N'თბილისი', '12', '1');
INSERT INTO municipalities(id, title, region_id, visible) VALUES ('73', N'ფოთი', '7', '1');