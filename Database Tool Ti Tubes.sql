/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 10.4.11-MariaDB : Database - tokofurnitur
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`tokofurnitur` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `tokofurnitur`;

/*Table structure for table `kategori` */

DROP TABLE IF EXISTS `kategori`;

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4;

/*Data for the table `kategori` */

insert  into `kategori`(`id`,`nama`) values 
(32,'Electrical Bike'),
(33,'Classic Bike'),
(34,'Touring Bike'),
(35,'Motocross Bike'),
(36,'Bike Electric'),
(37,'Matic Bike'),
(38,'Custom Bike');

/*Table structure for table `produk` */

DROP TABLE IF EXISTS `produk`;

CREATE TABLE `produk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori_id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` double NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `detail` text DEFAULT NULL,
  `ketersediaan_stok` enum('habis','tersedia') DEFAULT 'tersedia',
  PRIMARY KEY (`id`),
  KEY `nama` (`nama`),
  KEY `kategori_produk` (`kategori_id`),
  CONSTRAINT `kategori_produk` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;

/*Data for the table `produk` */

insert  into `produk`(`id`,`kategori_id`,`nama`,`harga`,`foto`,`detail`,`ketersediaan_stok`) values 
(13,36,'Honda Electric',50000,'xSEVL0taqM7X9jmMpa1g.png','','tersedia'),
(15,34,'Yamaha CBR 250cc',100000,'dwSJO7F285ogQSNqS1u6.jpg','','tersedia'),
(16,35,'Moto Cross',100000,'McHx9MbgQMWj8BjLDrs1.jpg','','tersedia'),
(17,37,'Vario 125zzz',25000,'Tgfa5z4kSkEvAKXZKrCi.jpg','                                                                                                                                                                                                                                                                    ','tersedia'),
(20,37,'Scoopy Honda',25000,'giUZ4WCIYEvjwcYheQmU.jpg','','tersedia');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `admin` varchar(100) DEFAULT NULL,
  `passAdmin` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`pass`,`admin`,`passAdmin`) values 
(13,'rifki','$2y$10$Z4KoWWS1NegqxwEbIXuSheoHrbgmPlQoWG6kMdfxvCdP2BEt2LPFS','RifCanDev','denpasar01'),
(14,'basudewa','$2y$10$gUQSQSNbON1xj.2Afo89xuUjr6qnlMB8Ru/sZ6QEgrDxqNuGozACS',NULL,NULL),
(15,'Putu Rifki Dirkayuda','$2y$10$FVlebCepUVS9QADiW2Aetufr/xiDt9XQTlBNOD2c/7fYKo5Ll6zoS',NULL,NULL),
(16,'candra56','$2y$10$/taDJevefkWyhCm4.2qHB.EUL2Hwrg1r9f2K/z9BU.Uizxm5Szn5m',NULL,NULL),
(17,'candra56','$2y$10$0qh0MAbY1SXNyK3AFqMpw.CzCEK97bxhrt/J.rOa9TVjwXR1IsTbK',NULL,NULL),
(18,'candra56','$2y$10$jMVbqcqB3zf3aGMIwi0UEuHQb8dA4jkf4A0Kwa0akGb6S7DOsKEwu',NULL,NULL),
(19,'septino123','$2y$10$nEGD9917XihBW8B/5nfaHOXEOD1wQ5N4kqlexikUckjUwHKo.eqxK',NULL,NULL),
(20,'septino33','$2y$10$xOqQMibsPDNvN31ahuvf3O.7V4qPe14MJCFAfJiyNixQuH.n6ATIq',NULL,NULL),
(21,'candra56','$2y$10$Vy0dmFZi4fi.UvG9tmsyFezAfBcoxPSfvsREpYdJZpmqZZG.RqpGG',NULL,NULL),
(22,'dira123','$2y$10$B6Cxyte90LngEqcuCORfhu/2X5SPqXR3l8hjnGVzMhUIWgBOBKjuS',NULL,NULL),
(23,'rifkicandra','$2y$10$M15JpD1n6NRcp3mFuI/3/uZr/hQrRWsa1laIv97QkEtTqe0vmVPeC',NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
