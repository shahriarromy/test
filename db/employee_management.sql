/*
Navicat MySQL Data Transfer

Source Server         : Localhost
Source Server Version : 50616
Source Host           : localhost:3306
Source Database       : employee_management

Target Server Type    : MYSQL
Target Server Version : 50616
File Encoding         : 65001

Date: 2015-01-27 12:52:40
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `ci_cookies`
-- ----------------------------
DROP TABLE IF EXISTS `ci_cookies`;
CREATE TABLE `ci_cookies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cookie_id` varchar(255) DEFAULT NULL,
  `netid` varchar(255) DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `orig_page_requested` varchar(120) DEFAULT NULL,
  `php_session_id` varchar(40) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ci_cookies
-- ----------------------------

-- ----------------------------
-- Table structure for `ci_sessions`
-- ----------------------------
DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ci_sessions
-- ----------------------------
INSERT INTO `ci_sessions` VALUES ('71d1a1a7285f5df1ff45e3c1a27c7876', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:35.0) Gecko/20100101 Firefox/35.0', '1422286907', '');

-- ----------------------------
-- Table structure for `company`
-- ----------------------------
DROP TABLE IF EXISTS `company`;
CREATE TABLE `company` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `company_logo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of company
-- ----------------------------
INSERT INTO `company` VALUES ('1', '4axizz', 'ffeed.png');
INSERT INTO `company` VALUES ('3', 'Advances', '0');
INSERT INTO `company` VALUES ('4', 'Men', '0');
INSERT INTO `company` VALUES ('5', 'dfsf', 'cards.png');
INSERT INTO `company` VALUES ('6', 'shahriar', 'dashed-nav.png');
INSERT INTO `company` VALUES ('7', 'dfsf', 'cards.png');
INSERT INTO `company` VALUES ('8', 'dfsf', 'frsshover.png');
INSERT INTO `company` VALUES ('9', 'pran', 'sleft.png');
INSERT INTO `company` VALUES ('10', 'ajira', 'hot.png');

-- ----------------------------
-- Table structure for `department`
-- ----------------------------
DROP TABLE IF EXISTS `department`;
CREATE TABLE `department` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of department
-- ----------------------------
INSERT INTO `department` VALUES ('1', 'HR', '1');
INSERT INTO `department` VALUES ('2', 'gdfgdf', '1');
INSERT INTO `department` VALUES ('3', 'admin', '3');
INSERT INTO `department` VALUES ('4', 'admin', '4');

-- ----------------------------
-- Table structure for `employee`
-- ----------------------------
DROP TABLE IF EXISTS `employee`;
CREATE TABLE `employee` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `company_id` int(11) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `employee_pic` varchar(255) DEFAULT NULL,
  `id_no` int(11) DEFAULT NULL,
  `employee_name` varchar(255) DEFAULT NULL,
  `father_name` varchar(255) DEFAULT NULL,
  `father_contact` varchar(255) DEFAULT NULL,
  `mother_name` varchar(255) DEFAULT NULL,
  `contact_number` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `d_o_b` date DEFAULT NULL,
  `present_age` varchar(255) DEFAULT NULL,
  `blood_group` varchar(255) DEFAULT NULL,
  `voter_id` int(11) DEFAULT NULL,
  `permanent_address` varchar(255) DEFAULT NULL,
  `present_address` varchar(255) DEFAULT NULL,
  `qualification` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `joining_date` date DEFAULT NULL,
  `confirmation_date` date DEFAULT NULL,
  `place_of_work` varchar(255) DEFAULT NULL,
  `guarantor` varchar(255) DEFAULT NULL,
  `show_cause` varchar(255) DEFAULT NULL,
  `penalty` varchar(255) DEFAULT NULL,
  `consolidate_salary` int(11) DEFAULT NULL,
  `basic` int(11) DEFAULT NULL,
  `dearness_allow` int(11) DEFAULT NULL,
  `house_rent` int(11) DEFAULT NULL,
  `special_allow` int(11) DEFAULT NULL,
  `mobile_allow` int(11) DEFAULT NULL,
  `heavy_duty` int(11) DEFAULT NULL,
  `washing_allow` int(11) DEFAULT NULL,
  `conveyance_allow` int(11) DEFAULT NULL,
  `misc` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `appointment_as` varchar(255) DEFAULT NULL,
  `target_given` varchar(255) DEFAULT NULL,
  `target_achieved` varchar(255) DEFAULT NULL,
  `liability_recovery` varchar(255) DEFAULT NULL,
  `personal_equipment` varchar(255) DEFAULT NULL,
  `privileges_leave` varchar(255) DEFAULT NULL,
  `casual_leave` varchar(255) DEFAULT NULL,
  `sick_leave` varchar(255) DEFAULT NULL,
  `awol` varchar(255) DEFAULT NULL,
  `punctuality` varchar(255) DEFAULT NULL,
  `job_knowledge` varchar(255) DEFAULT NULL,
  `initiative` varchar(255) DEFAULT NULL,
  `short_coming` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of employee
-- ----------------------------
INSERT INTO `employee` VALUES ('1', '3', '2', 'account.png', '98798', 'Shahriar', 'Officer', 'MBA', '', '', '2008-05-11', '2008-05-11', 'gazipur', '1200', '20131029', 'Permanent address', 'Present address', '01710033444', '122342341335', '0000-00-00', '0000-00-00', '0171454354300', 'Sheuli', '1', '', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `employee` VALUES ('2', '1', '0', 'demo-img.jpg', '98798', 'Shahriar', 'Habib', '0171454354300', 'shamima', '01710033444', 'srromyfb@gmail.com', '2005-02-01', '0', 'O+', '2147483647', 'Permanent address', 'Present address', 'MBA', 'Officer', '2005-02-01', '2003-12-29', 'gazipur', 'Arif', 'jhaskjdas', 'jhkjhklj', '12', '12', '0', '0', '0', '0', '0', '0', '0', '0', '24', 'yes', 'sdfdf', 'yes', 'sdfds', 'Laptop', '12', '12', '12', '12', 'good', 'good', 'good', 'yes');

-- ----------------------------
-- Table structure for `membership`
-- ----------------------------
DROP TABLE IF EXISTS `membership`;
CREATE TABLE `membership` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email_addres` varchar(255) DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `pass_word` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of membership
-- ----------------------------
INSERT INTO `membership` VALUES ('1', 'shahriar', 'romy', 'romy@4axiz.com', 'romy', 'e10adc3949ba59abbe56e057f20f883e');

-- ----------------------------
-- View structure for `v_employee`
-- ----------------------------
DROP VIEW IF EXISTS `v_employee`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_employee` AS select `employee`.`id` AS `id`,`company`.`name` AS `company_name`,`department`.`name` AS `department_name`,`employee`.`employee_pic` AS `employee_pic`,`employee`.`designation` AS `designation`,`employee`.`contact_number` AS `contact_number`,`employee`.`employee_name` AS `employee_name` from ((`employee` left join `department` on((`employee`.`department_id` = `department`.`id`))) left join `company` on((`employee`.`company_id` = `company`.`id`))) ;
