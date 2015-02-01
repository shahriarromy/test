/*
Navicat MySQL Data Transfer

Source Server         : Localhost
Source Server Version : 50616
Source Host           : localhost:3306
Source Database       : employee_management

Target Server Type    : MYSQL
Target Server Version : 50616
File Encoding         : 65001

Date: 2015-02-01 20:35:37
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
INSERT INTO `ci_sessions` VALUES ('cd3dc3c134917968514d4643a16970ed', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:35.0) Gecko/20100101 Firefox/35.0', '1422800588', 'a:7:{s:9:\"user_data\";s:0:\"\";s:9:\"user_name\";s:5:\"admin\";s:12:\"is_logged_in\";b:1;s:16:\"company_selected\";N;s:22:\"search_string_selected\";N;s:5:\"order\";N;s:10:\"order_type\";N;}');

-- ----------------------------
-- Table structure for `company`
-- ----------------------------
DROP TABLE IF EXISTS `company`;
CREATE TABLE `company` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `company_logo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of company
-- ----------------------------
INSERT INTO `company` VALUES ('12', 'Rangs Electronics Limited', 'Profile_Icon8.png');
INSERT INTO `company` VALUES ('13', 'REL Petro Chemicals Limited', 'Profile_Icon8.png');

-- ----------------------------
-- Table structure for `department`
-- ----------------------------
DROP TABLE IF EXISTS `department`;
CREATE TABLE `department` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of department
-- ----------------------------
INSERT INTO `department` VALUES ('6', 'Admin', '12');
INSERT INTO `department` VALUES ('7', 'Commercial', '12');
INSERT INTO `department` VALUES ('8', 'Marketing', '12');
INSERT INTO `department` VALUES ('9', 'Legal', '12');
INSERT INTO `department` VALUES ('10', 'IT', '12');
INSERT INTO `department` VALUES ('11', 'State', '12');
INSERT INTO `department` VALUES ('12', 'Accounts', '12');
INSERT INTO `department` VALUES ('13', 'Finance', '12');
INSERT INTO `department` VALUES ('14', 'Audit', '12');
INSERT INTO `department` VALUES ('15', 'Purchase', '12');
INSERT INTO `department` VALUES ('16', 'Tax', '12');
INSERT INTO `department` VALUES ('17', 'Service', '12');
INSERT INTO `department` VALUES ('18', 'REL Factory', '12');
INSERT INTO `department` VALUES ('19', 'RME', '12');
INSERT INTO `department` VALUES ('20', 'Security', '12');
INSERT INTO `department` VALUES ('21', 'Fan Project', '12');
INSERT INTO `department` VALUES ('22', 'Rangs Mobile', '12');
INSERT INTO `department` VALUES ('23', 'White Goods & Kitchen Applience', '12');
INSERT INTO `department` VALUES ('24', 'Panasonic', '12');
INSERT INTO `department` VALUES ('25', 'Mobile Division', '12');
INSERT INTO `department` VALUES ('26', 'EPD', '12');
INSERT INTO `department` VALUES ('27', 'Petro', '13');

-- ----------------------------
-- Table structure for `employee`
-- ----------------------------
DROP TABLE IF EXISTS `employee`;
CREATE TABLE `employee` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `company_id` int(11) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `employee_pic` varchar(255) DEFAULT NULL,
  `id_no` varchar(255) DEFAULT NULL,
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
  `is_laptop` varchar(255) DEFAULT NULL,
  `is_car` varchar(255) DEFAULT NULL,
  `is_mc` varchar(255) DEFAULT NULL,
  `is_fuel` varchar(255) DEFAULT NULL,
  `other_equipment` varchar(255) DEFAULT NULL,
  `punctuality` varchar(255) DEFAULT NULL,
  `job_knowledge` varchar(255) DEFAULT NULL,
  `initiative` varchar(255) DEFAULT NULL,
  `short_coming` varchar(255) DEFAULT NULL,
  `last_increment_date` date DEFAULT NULL,
  `increment_amount` double(30,0) DEFAULT NULL,
  `is_active` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of employee
-- ----------------------------
INSERT INTO `employee` VALUES ('1', '13', '27', '8.jpg', '0', 'Mohammad Abdul Alim', 'Md. Abdul Mannan', 'N/A', 'Mrs Obiran Nesa', '01722491017, 01736742472', 'N/A', '1978-02-01', '37 years', 'A+', '2147483647', '', 'Vill-Puraton Bazar, P.O+P.S-Parbatipur, Dist-Dinajpur', 'H.S.C', 'Store Asst Cum Delivery', '2014-06-21', '2005-02-01', 'REL Petro Chemicals Ltd', '', '', '', '6000', '0', '0', '0', '0', '0', '0', '0', '0', '0', '6000', '0', '', '', '', '0', '0', '0', '0', '', '0', '0', '0', '0', '0000-00-00', '0', '0');
INSERT INTO `employee` VALUES ('2', '13', '27', '10.jpg', '0', 'Md. jasimuddin', ': Late Md. Moniruddin', 'N/A', 'Mrs Jubeda Khatun', '017456423321', 'N/A', '1962-04-03', '52 years', 'A+', '2147483647', 'Vill-South Luhajuri, P.O-Luhajuri, P.S-Kotiadi  Dist- Kishorgonj', '', 'Eight Pass', 'Ware House Helper', '2010-06-06', '0000-00-00', 'REL Petro Chemicals Ltd', '', '', '', '5500', '0', '0', '0', '0', '0', '0', '0', '0', '500', '6000', '0', '', '', '', '0', '0', '0', '0', null, '0', '0', '0', '0', null, null, '0');
INSERT INTO `employee` VALUES ('3', '13', '27', '9.jpg', '0', 'Md. Kabir Hossain', 'Late Md. Abdur Rob Magi', 'N/A', 'Mrs Nur Zahan Begum', '01748455776', 'N/a', '1989-01-02', '26 years', 'A+', '2147483647', '237/1, Tejkunipara, Tejgaon, Dhaka-1215', '', 'Class Ten', 'Peon', '2010-04-03', '0000-00-00', 'REL Petro Chemicals Ltd', '', '', '', '4200', '0', '0', '0', '0', '0', '0', '0', '0', '0', '4200', '0', '', '', '', '0', '0', '0', '0', null, '0', '0', '0', '0', null, null, '0');
INSERT INTO `employee` VALUES ('4', '13', '27', '13.jpg', '0', 'Masud Rana', 'Md. Sahalam', 'N/A', 'Mrs. Majeda Begum', '01778104548', 'N/A', '1994-03-12', '20 years', 'A+', '0', '', 'vill- Tarani, P.O-Tantor, P.S-Nolitabari, Sherpur', 'Eight Pass', 'Loader', '2013-01-11', '0000-00-00', 'REL Petro Chemicals Ltd', '', '', '', '4700', '0', '0', '0', '0', '0', '0', '0', '0', '500', '5200', '0', '', '', '', '0', '0', '0', '0', null, '0', '0', '0', '0', null, null, '0');
INSERT INTO `employee` VALUES ('5', '13', '27', '11.jpg', '0', 'Md. Sariful Islam', 'Md. Nurmohammad', 'N/A', 'Mrs. Tambia', '01780392235', 'N/A', '1999-09-05', '15 years', 'A+', '0', 'Vill-Panihata, P.S-Tantor, P.S- Nalitabari, Sherpur', '', 'Eight Pass', 'Loader', '2013-07-02', '0000-00-00', 'REL Petro Chemicals Ltd', '', '', '', '5500', '0', '0', '0', '0', '0', '0', '0', '0', '500', '6000', '0', '', '', '', '0', '0', '0', '0', null, '0', '0', '0', '0', null, null, '0');
INSERT INTO `employee` VALUES ('6', '13', '27', 'md_yasin_ali_khan.jpg', '0', 'Md. Yeasin Ali Khan', 'Md. Abdul Mazid Khan', 'N/A', 'Mrs Holenur Begum', '01715826479, 01712534708', 'N/A', '1980-11-29', '34 years', 'A+', '2147483647', 'Vill+Post-Kalitoli, Ps-Katowali, Dist-Dinajpur', 'House-85, (flat-4th floor), Road-14, Block-H, South Bonosree, Housing project', 'MBA (Marketing)', 'Sales Manager', '2013-07-01', '0000-00-00', 'REL Petro Chemicals Ltd', '', '', '', '60000', '0', '0', '0', '0', '0', '0', '0', '0', '0', '60000', '0', '', '', '', '0', '0', '0', '0', null, '0', '0', '0', '0', null, null, '0');
INSERT INTO `employee` VALUES ('7', '13', '27', 'Md_Imran_Hossain_.jpg', '0', 'Md. Imran Hossain', 'Md. Kabirul Islam', 'N/A', 'Mst. Hawa Begum', '01711233585', 'N/A', '1987-12-10', '27 years', 'A+', '0', 'Vill-Mew market, 80,BD, P.O+P.S-Mathbaria, Pirojpur', 'House-40 ka, Priangon 6th B floor, Road-6, P.C euttra housing , mohammadpur', '(B.B.A)', 'Jr. Executive (Account)', '2013-07-17', '2014-02-01', 'REL Petro Chemicals Ltd', '', '', '', '0', '8250', '4125', '1250', '0', '0', '0', '0', '0', '0', '13625', '0', '', '', '', '0', '0', '0', '0', null, '0', '0', '0', '0', null, null, '0');
INSERT INTO `employee` VALUES ('8', '13', '27', 'Md_Forhadul_Islam.jpg', '0', 'Md. Forhadul Islam', 'Md. Abdul Hey Sarker', 'N/A', 'Misses Foridha Begum', '01553648444, 01676755155', 'N/A', '1986-01-01', '29 years', 'A+', '2147483647', 'Parbotipur Road, Madda Para South Babubari , P.S-Kotoyali, Dinajpur', 'House-163, Bank Para Vuyapara, P.S-Khilga, Dhaka', 'B.S.C (Engineer)', 'Sales Executive Indistrial Lube', '2014-12-01', '0000-00-00', 'REL Petro Chemicals Ltd', '', '', '', '13500', '0', '0', '0', '0', '0', '0', '0', '0', '0', '13500', '0', '', '', '', '0', '0', '0', '0', '', '0', '0', '0', '0', '0000-00-00', '0', 'yes');
INSERT INTO `employee` VALUES ('9', '13', '27', 'Md_Abul_Kalam_Azad.jpg', '0', 'Md. Abul Kalam Azad', 'Late Sekhayet Ullan', 'N/A', 'Rahima Begum', '0165446568', 'N/A', '1961-03-03', '53 years', 'B+', '2147483647', 'Vill-Laxmanpur, P.O-Palla bazaar, P.S-Chatkhil, Noakhali', 'House-1,Road-9, Block-D Bonosree projet Rampura, Dhaka', 'B.A ( Appeared)', 'Area Asst. Manager Sales', '2014-09-15', '0000-00-00', 'REL Petro Chemicals Ltd', '', '', '', '30000', '0', '0', '0', '0', '0', '0', '0', '0', '0', '30000', '0', '', '', '', '0', '0', '0', '0', null, '0', '0', '0', '0', null, null, '0');

-- ----------------------------
-- Table structure for `leave`
-- ----------------------------
DROP TABLE IF EXISTS `leave`;
CREATE TABLE `leave` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `year` int(11) DEFAULT NULL,
  `casual_max` int(11) DEFAULT NULL,
  `casual_taken` int(11) DEFAULT NULL,
  `casual_balance` int(11) DEFAULT NULL,
  `privileged_max` int(11) DEFAULT NULL,
  `privileged_taken` int(11) DEFAULT NULL,
  `privileged_balance` int(11) DEFAULT NULL,
  `sick_max` int(11) DEFAULT NULL,
  `sick_taken` int(11) DEFAULT NULL,
  `sick_balance` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of leave
-- ----------------------------
INSERT INTO `leave` VALUES ('1', '4', null, '10', '0', '10', '5', '0', '5', '6', '0', '6');
INSERT INTO `leave` VALUES ('2', '1', null, '10', '0', '10', '5', '0', '5', '6', '0', '6');
INSERT INTO `leave` VALUES ('3', '7', null, '10', '0', '10', '1', '0', '1', '3', '0', '3');
INSERT INTO `leave` VALUES ('4', '8', null, '10', '0', '10', '5', '0', '5', '6', '0', '6');
INSERT INTO `leave` VALUES ('5', '1', null, '10', '0', '10', '5', '0', '5', '6', '0', '6');
INSERT INTO `leave` VALUES ('6', '1', null, '10', '0', '10', '5', '0', '5', '6', '0', '6');
INSERT INTO `leave` VALUES ('7', '1', null, '10', '0', '10', '5', '0', '5', '6', '0', '6');
INSERT INTO `leave` VALUES ('8', '1', null, '10', '0', '10', '5', '0', '5', '6', '0', '6');
INSERT INTO `leave` VALUES ('9', '1', null, '10', '0', '10', '5', '0', '5', '6', '0', '6');
INSERT INTO `leave` VALUES ('10', '1', null, '10', '0', '10', '5', '0', '5', '6', '0', '6');
INSERT INTO `leave` VALUES ('11', '1', null, '10', '0', '10', '5', '0', '5', '6', '0', '6');
INSERT INTO `leave` VALUES ('12', '2', null, '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `leave` VALUES ('13', '3', null, '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `leave` VALUES ('14', '4', null, '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `leave` VALUES ('15', '5', null, '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `leave` VALUES ('16', '6', null, '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `leave` VALUES ('17', '7', null, '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `leave` VALUES ('18', '8', null, '10', '0', '10', '5', '0', '5', '6', '0', '6');
INSERT INTO `leave` VALUES ('19', '9', null, '0', '0', '0', '0', '0', '0', '0', '0', '0');

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
INSERT INTO `membership` VALUES ('1', 'shahriar', 'romy', 'romy@4axiz.com', 'admin', 'e10adc3949ba59abbe56e057f20f883e');
INSERT INTO `membership` VALUES ('2', '4axiz', 'ltd', 'info@4axiz.com', '4axiz', 'e10adc3949ba59abbe56e057f20f883e');

-- ----------------------------
-- View structure for `v_employee`
-- ----------------------------
DROP VIEW IF EXISTS `v_employee`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_employee` AS select `employee`.`id` AS `id`,`company`.`name` AS `company_name`,`department`.`name` AS `department_name`,`employee`.`employee_pic` AS `employee_pic`,`employee`.`designation` AS `designation`,`employee`.`contact_number` AS `contact_number`,`employee`.`employee_name` AS `employee_name`,`employee`.`last_increment_date` AS `last_increment_date`,`employee`.`increment_amount` AS `increment_amount`,`employee`.`is_active` AS `is_active` from ((`employee` left join `department` on((`employee`.`department_id` = `department`.`id`))) left join `company` on((`employee`.`company_id` = `company`.`id`))) ;
