/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50621
Source Host           : localhost:3306
Source Database       : employee_management

Target Server Type    : MYSQL
Target Server Version : 50621
File Encoding         : 65001

Date: 2015-01-31 16:20:12
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
INSERT INTO `ci_sessions` VALUES ('ca381c1d777f5372ceb947b6049b061f', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:36.0) Gecko/20100101 Firefox/36.0', '1422699330', 'a:3:{s:9:\"user_data\";s:0:\"\";s:9:\"user_name\";s:5:\"4axiz\";s:12:\"is_logged_in\";b:1;}');
INSERT INTO `ci_sessions` VALUES ('f9f0adb0552e9bd5cb9671a45ad8fe9c', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:36.0) Gecko/20100101 Firefox/36.0', '1422693945', 'a:3:{s:9:\"user_data\";s:0:\"\";s:9:\"user_name\";s:5:\"4axiz\";s:12:\"is_logged_in\";b:1;}');

-- ----------------------------
-- Table structure for `company`
-- ----------------------------
DROP TABLE IF EXISTS `company`;
CREATE TABLE `company` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `company_logo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

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
INSERT INTO `company` VALUES ('11', 'arif', 'image-property.jpg');

-- ----------------------------
-- Table structure for `department`
-- ----------------------------
DROP TABLE IF EXISTS `department`;
CREATE TABLE `department` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of department
-- ----------------------------
INSERT INTO `department` VALUES ('1', 'HR', '1');
INSERT INTO `department` VALUES ('2', 'gdfgdf', '1');
INSERT INTO `department` VALUES ('3', 'admin', '3');
INSERT INTO `department` VALUES ('4', 'admin', '4');
INSERT INTO `department` VALUES ('5', 'HR', '11');

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
  `voter_id` int(17) DEFAULT NULL,
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
  `basic` int(200) DEFAULT NULL,
  `dearness_allow` int(11) DEFAULT NULL,
  `house_rent` double DEFAULT NULL,
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
  `punctuality` varchar(255) DEFAULT NULL,
  `job_knowledge` varchar(255) DEFAULT NULL,
  `initiative` varchar(255) DEFAULT NULL,
  `short_coming` varchar(255) DEFAULT NULL,
  `last_increment_date` date DEFAULT NULL,
  `increment_amount` double DEFAULT NULL,
  `is_active` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of employee
-- ----------------------------
INSERT INTO `employee` VALUES ('1', '3', '2', 'account.png', '98798', 'Shahriar', 'Officer', 'MBA', '', '', '2008-05-11', '2008-05-11', 'gazipur', '1200', '20131029', 'Permanent address', 'Present address', '01710033444', '122342341335', '0000-00-00', '0000-00-00', '0171454354300', 'Sheuli', '1', '', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, 'yes');
INSERT INTO `employee` VALUES ('2', '9', '4', 'hot.png', '987900', 'ABC', 'Habib', '0171454354300', 'shamima', '01710033444', 'srromyfb@gmail.com', '2009-07-15', '5 years', 'A+', '2147483647', 'Dhkkkk', 'Dhk', 'MBBS', 'Officer', '2005-02-01', '2003-12-29', 'gazipur', 'Arif', 'jhaskjdas', 'jhkjhklj', '12', '12', '0', '0', '0', '0', '0', '0', '0', '0', '24', 'yes', 'sdfdf', 'yes', 'sdfds', 'Laptop', 'good', 'good', 'average', 'yes', null, null, 'no');
INSERT INTO `employee` VALUES ('4', '0', '3', '209708058_b5a5fb07a6_z.jpg', '4446', 'arif', 'aaaa', '01725338699', 'bbbb', '01725338699', 'shaheen@4axiz.com', '2004-01-04', '0', 'A+', '2147483647', 'jessore', 'dhaka', 'bsc895', 'gfhg', '2004-01-04', '2003-12-26', 'dohs', 'romy', 'no', 'fghgfh', '100', '100', '100', '100', '100', '100', '100', '100', '100', '100', '1000', 'no', 'no', 'no', 'no', 'Laptop', 'average', 'average', 'average', 'yes', '2015-01-29', '500', 'yes');
INSERT INTO `employee` VALUES ('6', '4', '4', '', '420', 'Romy', 'aass', '67567', 'hgfh', '756765', 'shaheen@4axiz.com', '1992-05-04', '22 years', 'A+', '2147483647', 'Dhk', 'Dhk', 'bsc', 'student', '2005-02-01', '2006-02-07', 'dohs', 'romy', 'no', 'no', '100', '100', '100', '100', '100', '100', '100', '100', '100', '100', '1000', 'yes', 'no', 'no', 'no', 'Laptop', '0', '0', '0', '0', null, null, 'yes');
INSERT INTO `employee` VALUES ('7', null, null, '209708058_b5a5fb07a6_z2.jpg', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `employee` VALUES ('8', null, null, 'images.jpg', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `employee` VALUES ('9', null, null, '209708058_b5a5fb07a6_z3.jpg', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `employee` VALUES ('10', null, null, 'demo-img1.jpg', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `employee` VALUES ('11', null, null, 'demo-img2.jpg', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `employee` VALUES ('12', null, null, '209708058_b5a5fb07a6_z4.jpg', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `employee` VALUES ('13', '1', '1', '209708058_b5a5fb07a6_z5.jpg', '3000', 'romy', 'aaaa', '67567', 'bbbb', '756765', 'shaheen@4axiz.com', '2003-12-29', '11 years', 'A+', '0', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', '0', '0', '0', '0', '0', null, null, '0');
INSERT INTO `employee` VALUES ('14', '0', '0', '209708058_b5a5fb07a6_z6.jpg', '0', 'romy', '', '0', '', '', '', '0000-00-00', '', 'A+', '0', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', '0', '0', '0', '0', '0', null, null, '0');

-- ----------------------------
-- Table structure for `leave`
-- ----------------------------
DROP TABLE IF EXISTS `leave`;
CREATE TABLE `leave` (
  `id` int(11) NOT NULL,
  `casual_max` int(11) DEFAULT NULL,
  `casual_taken` int(11) DEFAULT NULL,
  `casual_balance` int(11) DEFAULT NULL,
  `privileged_max` int(11) DEFAULT NULL,
  `privileged_taken` int(11) DEFAULT NULL,
  `privileged_balance` int(11) DEFAULT NULL,
  `sick_max` int(11) DEFAULT NULL,
  `sick_taken` int(11) DEFAULT NULL,
  `sick_balance` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of leave
-- ----------------------------
INSERT INTO `leave` VALUES ('4', '4', '8', '6', '7', null, null, null, null, null);
INSERT INTO `leave` VALUES ('1', '10', '0', '10', '5', '0', '5', '6', '0', '6');
INSERT INTO `leave` VALUES ('7', '10', '0', '10', '1', '0', '1', '3', '0', '3');
INSERT INTO `leave` VALUES ('8', '10', '0', '10', '5', '0', '5', '6', '0', '6');
INSERT INTO `leave` VALUES ('1', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `leave` VALUES ('1', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `leave` VALUES ('1', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `leave` VALUES ('1', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `leave` VALUES ('1', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `leave` VALUES ('1', '0', '0', '0', '0', '0', '0', '0', '0', '0');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of membership
-- ----------------------------
INSERT INTO `membership` VALUES ('1', 'shahriar', 'romy', 'romy@4axiz.com', 'romy', 'e10adc3949ba59abbe56e057f20f883e');
INSERT INTO `membership` VALUES ('2', '4axiz', 'ltd', 'info@4axiz.com', '4axiz', 'e10adc3949ba59abbe56e057f20f883e');

-- ----------------------------
-- View structure for `v_employee`
-- ----------------------------
DROP VIEW IF EXISTS `v_employee`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_employee` AS select `employee`.`id` AS `id`,`company`.`name` AS `company_name`,`department`.`name` AS `department_name`,`employee`.`employee_pic` AS `employee_pic`,`employee`.`designation` AS `designation`,`employee`.`contact_number` AS `contact_number`,`employee`.`employee_name` AS `employee_name`,`employee`.`last_increment_date` AS `last_increment_date`,`employee`.`increment_amount` AS `increment_amount`,`employee`.`is_active` AS `is_active` from ((`employee` left join `department` on((`employee`.`department_id` = `department`.`id`))) left join `company` on((`employee`.`company_id` = `company`.`id`))) ;
