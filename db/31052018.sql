/*
SQLyog Ultimate v9.02 
MySQL - 5.5.5-10.1.28-MariaDB : Database - masterapp
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `ms_menu` */

DROP TABLE IF EXISTS `ms_menu`;

CREATE TABLE `ms_menu` (
  `id_inc` int(11) NOT NULL AUTO_INCREMENT,
  `nama_menu` varchar(100) DEFAULT NULL,
  `link_menu` varchar(100) DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `icon` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_inc`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `ms_menu` */

insert  into `ms_menu`(`id_inc`,`nama_menu`,`link_menu`,`parent`,`sort`,`icon`) values (1,'Sistem','#',0,99,'fa fa-cogs'),(2,'role','role',1,1,'fa fa-angle-right'),(3,'menu','menu',1,2,'fa fa-angle-right'),(6,'Pengguna','Pengguna',1,3,'fa fa-users');

/*Table structure for table `ms_pengguna` */

DROP TABLE IF EXISTS `ms_pengguna`;

CREATE TABLE `ms_pengguna` (
  `id_inc` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `ms_role_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_inc`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `ms_pengguna` */

insert  into `ms_pengguna`(`id_inc`,`nama`,`username`,`password`,`ms_role_id`) values (1,'Wahyu Dewantoro','admin','f10e2821bbbea527ea02200352313bc059445190',1),(2,'Pengguna A','user1','f10e2821bbbea527ea02200352313bc059445190',2);

/*Table structure for table `ms_privilege` */

DROP TABLE IF EXISTS `ms_privilege`;

CREATE TABLE `ms_privilege` (
  `id_inc` int(11) NOT NULL AUTO_INCREMENT,
  `ms_role_id` int(11) DEFAULT NULL,
  `ms_menu_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_inc`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `ms_privilege` */

insert  into `ms_privilege`(`id_inc`,`ms_role_id`,`ms_menu_id`,`status`) values (1,1,1,1),(2,1,2,1),(3,1,3,1),(4,2,1,NULL),(5,2,2,NULL),(6,2,3,NULL),(7,2,6,NULL),(8,1,6,1);

/*Table structure for table `ms_role` */

DROP TABLE IF EXISTS `ms_role`;

CREATE TABLE `ms_role` (
  `id_inc` int(11) NOT NULL AUTO_INCREMENT,
  `nama_role` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_inc`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `ms_role` */

insert  into `ms_role`(`id_inc`,`nama_role`) values (1,'Super User'),(2,'Member');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
