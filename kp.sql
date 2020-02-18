/*
SQLyog Enterprise v10.42 
MySQL - 5.5.5-10.1.19-MariaDB : Database - kp
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`kp` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `kp`;

/*Table structure for table `pelanggan` */

DROP TABLE IF EXISTS `pelanggan`;

CREATE TABLE `pelanggan` (
  `no_pelanggan` int(15) NOT NULL AUTO_INCREMENT,
  `nama` varchar(20) DEFAULT NULL,
  `telp` varchar(15) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`no_pelanggan`)
) ENGINE=InnoDB AUTO_INCREMENT=145 DEFAULT CHARSET=latin1;

/*Data for the table `pelanggan` */

insert  into `pelanggan`(`no_pelanggan`,`nama`,`telp`,`email`) values (123,'shinta sekar','0856545666998','shintasekar#gmail.co'),(126,'m ihsan','085665422255','ihsanm@gmail.co.id'),(127,'rose tika','0854796332158','rose_tika@rocketmail'),(128,'mei rota','081447785569','meirota456@gmail.com'),(130,'chandra daniel','085644525587','chandradermawan@yaho'),(131,'theresia bella','082254453358','theresiabella@gmail.'),(133,'michael hernando','0896632555578','michaelhernando@gmai'),(134,'steven gunawan','0814756698555','steveng@gmail.com'),(136,'jason sirengkar','085677898855','jasonnison@yahoo.com'),(137,'rendi maulana','0896659966524','maulanarosirendo@gma'),(138,'justin','085669887741','jessnolimtit99@gmail'),(139,'abdul rahman','085640479795','abdul21rahman@gmail.'),(140,'ismail','085854778965','ismail99@gmail.com'),(141,'bowo widodo','085698745655','bowowidodori1@gmail.'),(142,'agung okta','081258369887','agung1141@gmail.com'),(143,'ahmad pahlevi','082221457888','pahleviahmad@gmail.c'),(144,'bimo prakoso','081447789556','bimipp@gmail.com');

/*Table structure for table `temp` */

DROP TABLE IF EXISTS `temp`;

CREATE TABLE `temp` (
  `no_pelanggan` varchar(15) DEFAULT NULL,
  `recency` int(11) DEFAULT NULL,
  `frequency` int(11) DEFAULT NULL,
  `monetary` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `temp` */

/*Table structure for table `transaksi` */

DROP TABLE IF EXISTS `transaksi`;

CREATE TABLE `transaksi` (
  `no_transaksi` int(255) NOT NULL,
  `no_pelanggan` varchar(255) DEFAULT NULL,
  `tgl_transaksi` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `harga_transaksi` int(255) DEFAULT NULL,
  `jasa` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`no_transaksi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `transaksi` */

insert  into `transaksi`(`no_transaksi`,`no_pelanggan`,`tgl_transaksi`,`harga_transaksi`,`jasa`) values (56,'123','2018-01-02 18:31:43.000000',3000000,'prawedding gold'),(58,'136','2018-01-17 17:22:30.000000',1200000,'dokumentasi acara silver'),(59,'140','2018-02-10 17:22:30.000000',1200000,'prawedding economic'),(60,'126','2018-02-20 17:22:30.000000',3000000,'birthday party gold'),(61,'127','2018-03-07 17:22:30.000000',2500000,'company profile silver'),(62,'128','2018-03-22 17:22:30.000000',600000,'dokumentasi acara'),(64,'130','2018-04-25 17:22:30.000000',2500000,'company profile silver'),(65,'131','2018-04-30 17:22:30.000000',600000,'dokumentasi acara economic'),(66,'140','2018-05-17 17:22:30.000000',4000000,'company profile gold'),(67,'133','2018-06-14 17:22:30.000000',2000000,'prawedding silver'),(68,'134','2018-06-26 17:22:30.000000',3000000,'prawedding gold'),(69,'142','2018-06-28 17:22:30.000000',2000000,'birthday party silver'),(70,'136','2018-06-30 17:22:30.000000',4000000,'company profile gold'),(71,'137','2018-07-05 17:22:30.000000',3000000,'birthday party gold'),(72,'138','2018-07-26 17:22:30.000000',2000000,'birthday party silver'),(73,'139','2018-09-11 17:22:30.000000',1200000,'dokumentasi acara silver'),(74,'140','2018-09-19 17:22:30.000000',3200000,'wedding gold'),(75,'141','2018-09-25 17:22:30.000000',2200000,'wedding silver'),(76,'142','2018-09-30 17:22:30.000000',2200000,'wedding silver'),(77,'143','2018-11-02 17:22:30.000000',2000000,'birthday party silver'),(78,'144','2018-11-15 17:22:30.000000',4000000,'company profile gold'),(79,'139','2018-12-13 17:22:30.000000',3000000,'prawedding gold'),(80,'123','2018-12-25 17:22:30.000000',3200000,'wedding gold');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `username` varchar(9) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`username`,`password`) values ('inu','c4ca4238a0b923820dcc509a6f75849b');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
