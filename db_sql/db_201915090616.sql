-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.5-10.1.36-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL version:             7.0.0.4053
-- Date/time:                    2021-09-15 06:27:06
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;

-- Dumping structure for table db_wrms.tb_role
DROP TABLE IF EXISTS `tb_role`;
CREATE TABLE IF NOT EXISTS `tb_role` (
  `role_sid` varchar(20) NOT NULL DEFAULT '',
  `role_name` varchar(100) DEFAULT NULL,
  `role_admindashboard` varchar(5) DEFAULT NULL,
  `role_adminairbaku` varchar(5) DEFAULT NULL,
  `role_adminpendayagunaan` varchar(5) DEFAULT NULL,
  `role_adminkonservasi` varchar(5) DEFAULT NULL,
  `role_adminpengendalian` varchar(5) DEFAULT NULL,
  `role_adminpengaturan` varchar(5) DEFAULT NULL,
  `sys_createdon` datetime DEFAULT NULL,
  `sys_createdby` varchar(100) DEFAULT NULL,
  `sys_modifiedon` datetime DEFAULT NULL,
  `sys_modifiedby` varchar(100) DEFAULT NULL,
  `sys_deleted` char(1) DEFAULT 'N',
  PRIMARY KEY (`role_sid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_wrms.tb_role: ~0 rows (approximately)
DELETE FROM `tb_role`;
/*!40000 ALTER TABLE `tb_role` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_role` ENABLE KEYS */;


-- Dumping structure for table db_wrms.tb_user
DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE IF NOT EXISTS `tb_user` (
  `usr_sid` varchar(20) NOT NULL DEFAULT '',
  `usr_name` varchar(100) DEFAULT NULL,
  `usr_designation` varchar(50) DEFAULT NULL,
  `usr_department` varchar(50) DEFAULT NULL,
  `usr_email` varchar(50) DEFAULT NULL,
  `usr_mobile` varchar(20) DEFAULT NULL,
  `usr_password` varchar(100) DEFAULT NULL,
  `usr_status` varchar(50) DEFAULT NULL,
  `usr_hash` varchar(200) DEFAULT NULL,
  `usr_hashedon` datetime DEFAULT NULL,
  `sys_createdon` datetime DEFAULT NULL,
  `sys_createdby` varchar(100) DEFAULT NULL,
  `sys_modifiedon` datetime DEFAULT NULL,
  `sys_modifiedby` varchar(100) DEFAULT NULL,
  `sys_deleted` char(1) DEFAULT 'N',
  PRIMARY KEY (`usr_sid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_wrms.tb_user: ~2 rows (approximately)
DELETE FROM `tb_user`;
/*!40000 ALTER TABLE `tb_user` DISABLE KEYS */;
INSERT INTO `tb_user` (`usr_sid`, `usr_name`, `usr_designation`, `usr_department`, `usr_email`, `usr_mobile`, `usr_password`, `usr_status`, `usr_hash`, `usr_hashedon`, `sys_createdon`, `sys_createdby`, `sys_modifiedon`, `sys_modifiedby`, `sys_deleted`) VALUES
	('01', 'Administrator', 'Administrator', 'IT', 'admin@admin.com', NULL, '$2y$10$C3z0Hfirezev1OgEmk65QOiIpqTnTJkXyBXV9VzStQcVuflrZ2c/u', NULL, NULL, NULL, '0000-00-00 00:00:00', 'Admin', '2021-09-13 14:37:41', 'Admin', 'N'),
	('02', 'Administrator 2', 'Administrator 2', 'IT', 'abc@abc.com', NULL, '$2y$10$C3z0Hfirezev1OgEmk65QOiIpqTnTJkXyBXV9VzStQcVuflrZ2c/u', NULL, NULL, NULL, '0000-00-00 00:00:00', 'Admin', '2021-09-13 14:37:41', 'Admin', 'N');
/*!40000 ALTER TABLE `tb_user` ENABLE KEYS */;
/*!40014 SET FOREIGN_KEY_CHECKS=1 */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
