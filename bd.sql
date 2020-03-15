/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.1.13-MariaDB : Database - abodah
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`abodah` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `abodah`;

/*Table structure for table `administrateur` */

DROP TABLE IF EXISTS `administrateur`;

CREATE TABLE `administrateur` (
  `idad` int(4) NOT NULL AUTO_INCREMENT,
  `login` varchar(70) DEFAULT NULL,
  `password` varchar(70) DEFAULT NULL,
  PRIMARY KEY (`idad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `administrateur` */

/*Table structure for table `anonyme` */

DROP TABLE IF EXISTS `anonyme`;

CREATE TABLE `anonyme` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idprojet` int(11) DEFAULT NULL,
  `montant` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `dte` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idprojet` (`idprojet`),
  CONSTRAINT `anonyme_ibfk_1` FOREIGN KEY (`idprojet`) REFERENCES `projet` (`idpro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `anonyme` */

/*Table structure for table `appreciation` */

DROP TABLE IF EXISTS `appreciation`;

CREATE TABLE `appreciation` (
  `utilisateur` int(11) NOT NULL,
  `article` int(11) NOT NULL,
  `commentaire` text,
  `like` int(11) DEFAULT NULL,
  PRIMARY KEY (`utilisateur`,`article`),
  KEY `article` (`article`),
  CONSTRAINT `appreciation_ibfk_1` FOREIGN KEY (`utilisateur`) REFERENCES `internaute` (`idu`),
  CONSTRAINT `appreciation_ibfk_2` FOREIGN KEY (`article`) REFERENCES `article` (`idArt`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `appreciation` */

/*Table structure for table `article` */

DROP TABLE IF EXISTS `article`;

CREATE TABLE `article` (
  `idArt` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(200) DEFAULT NULL,
  `contenu` text,
  `auteur` int(11) DEFAULT NULL,
  PRIMARY KEY (`idArt`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `article` */

/*Table structure for table `categorie` */

DROP TABLE IF EXISTS `categorie`;

CREATE TABLE `categorie` (
  `idcat` int(11) NOT NULL AUTO_INCREMENT,
  `categorie` varchar(100) DEFAULT NULL,
  `etat` int(11) DEFAULT NULL,
  PRIMARY KEY (`idcat`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `categorie` */

insert  into `categorie`(`idcat`,`categorie`,`etat`) values (1,'Informatique',1),(2,'Agricole',1),(3,'Cosmetique',1),(4,'Not categorised',1);

/*Table structure for table `financement` */

DROP TABLE IF EXISTS `financement`;

CREATE TABLE `financement` (
  `idFin` int(11) NOT NULL AUTO_INCREMENT,
  `internaute` int(11) NOT NULL,
  `projet` int(11) NOT NULL,
  `montant` int(2) DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`idFin`),
  KEY `projet` (`projet`),
  KEY `internaute` (`internaute`),
  CONSTRAINT `financement_ibfk_1` FOREIGN KEY (`internaute`) REFERENCES `internaute` (`idu`),
  CONSTRAINT `financement_ibfk_2` FOREIGN KEY (`projet`) REFERENCES `projet` (`idpro`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `financement` */

insert  into `financement`(`idFin`,`internaute`,`projet`,`montant`,`date`) values (1,1,1,2000000,'2020-03-13'),(2,1,10,1000000,'2020-03-13'),(3,12,9,1000000,'2020-03-13'),(4,15,10,100000,'2020-03-13'),(5,15,10,200000,'2020-03-13'),(6,15,10,250000,'2020-03-14');

/*Table structure for table `internaute` */

DROP TABLE IF EXISTS `internaute`;

CREATE TABLE `internaute` (
  `idu` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) DEFAULT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `sexe` varchar(20) DEFAULT NULL,
  `date` date NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `etat` int(11) DEFAULT '1',
  PRIMARY KEY (`idu`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

/*Data for the table `internaute` */

insert  into `internaute`(`idu`,`email`,`nom`,`prenom`,`password`,`sexe`,`date`,`token`,`etat`) values (1,'default@gmail.com','woo','tarkovski','default','masculin','0000-00-00','sdferwfsfswwefwffr3frfwefwwafwf445wefwefwfwe',1),(3,'woofer@bhdf.comdd','Woo','Tarkovski d','passwordere d','feminin d','0000-00-00','WQzhj09feU4srowshX4iAsrs8kSieSgS5gKuduJodoako07d4aofvWs5szkP8Ak4fTrd ',1),(4,'yal@gmail.com','Yalakou','Alice','Yal','feminin','0000-00-00','uoeaXru7UsyaAJ4ScY4Kihdues50aWA4fjPk9kd4kzlfgzSl5SAs8ldsha0isQ8g',1),(5,'tft@g.c','werfewrfweaf','ewdfwdefveawr','tft','masculin','0000-00-00','Jtahwfgvffsfz448egfUh5SwXAfwr7afQwusA4e9KrdtjSr8a5WkduSwdze0ekewsei4rdssfed0P',1),(6,'tft@q.w','gergreg','referas','tft','feminin','0000-00-00','gf40Szh4jrd85deeUWSzfssteQ4u0t5S8iksg7APegrggrukrfaeXArsdfahK9ss4J',1),(7,'sdgergr@hjf.e','rdhgsrth','srthrth','ergsreg','masculin','0000-00-00','d9drArguS4hhszssk5tsfhKhhfrtjdrs8Jk4sg847PSWeihrtS5ggr4r0UzsauAd0gsXeQd',1),(8,'sdgergr@hjf.et','rthrth','rrgrtsh','rthrthrth','feminin','0000-00-00','dhjrrsSgfh4re4isttSzgstWa8kPgdU74Xhd0dJs9ksKh4Qehrzu8sgA50Srrrf5rAsgu',1),(9,'sdgergr@hjf.ef','y45ye65y','rthujtrh','tgstrg','feminin','0000-00-00','e5j674gdg9hr55Qdhg0dsty4yuSkP4SsfXJ48igUk4SAjruedfWA8t0srzKruy5rasszhshe',1),(10,'sdgergr@hjf.etg','gffgfg','fgf','gfgfb','feminin','0000-00-00','ei8zu7ds0ff45zAkSJ4r0d5QjSgrfWgrsgd9dKgesssfghXfUuSAgkfa48g4Psghf',1),(11,'sdgergr@hjf.eyu','rtytr','rthrth','drtytr','feminin','0000-00-00','WdfeA8SdSjgsh4JtUht75iryfrhdgzsQtguarrK0ksdXk4gu8Srrsht4A04Perssz59',1),(12,'sdgergr@hjf.etdf','wefwef','ewfdwe','efwefdwf','','0000-00-00','9f0hswUe8e5fdreXjAi87JeSAs5zddWSKkeg4kssgPf4QSh40uzwdw4wfsauf',1),(14,'mervie@gmail.com','Mahout','Mervie','mervie','feminin','0000-00-00','0dh4zdeaik8eshs4sUKuruffPWgoSzM9ik4Ase4S8gjXAMu5drJs0hSv7Qat5',1),(15,'daniel@gmail.com','Fokou','Daniel','daniel','masculin','0000-00-00','0afiJgUKreWl8SQs8Au4skd0hka9P7hfzs5Sung44sk4oz5odFdijXuSsAeD',1),(17,'flora@gmail.com','My Flower','Flora','flora','feminin','2020-03-15','KJezrgSM44dP5lgSseFwzuka8oQf srkSf4d4y9AhFjX8WUr0i7lshd0A5osuas',1);

/*Table structure for table `message` */

DROP TABLE IF EXISTS `message`;

CREATE TABLE `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `texte` text NOT NULL,
  `date` varchar(70) DEFAULT NULL,
  `etat` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

/*Data for the table `message` */

insert  into `message`(`id`,`email`,`nom`,`texte`,`date`,`etat`) values (1,'default@gmail.com','woo tarkovski',' Voici ce message...','Tue, 10 Mar 2020 01:22:50 +0100',0),(2,'wooh@gmail.com','Wahid',' Message','Tue, 10 Mar 2020 08:43:02 +0100',0),(3,'default@gmail.com','woo tarkovski',' Voila','Tue, 10 Mar 2020 09:09:29 +0100',0),(4,'default@gmail.com','woo tarkovski',' VoilÃ  ','Tue, 10 Mar 2020 09:10:34 +0100',0),(5,'default@gmail.com','woo tarkovski',' dfsdgdegdr','Tue, 10 Mar 2020 09:12:13 +0100',0),(6,'default@gmail.com','woo tarkovski',' ewfergesgergvfsgberg','Tue, 10 Mar 2020 09:13:02 +0100',0),(7,'default@gmail.com','woo tarkovski','\r\n        $_SESSION[\'notification\']=true;\r\n        $_SESSION[\'notification\'][\'text\']=\"Le projet est bien soumis et en attente de validation.\";\r\n        $_SESSION[\'notification\'][\'status\']=\"positive\";','Tue, 10 Mar 2020 09:46:23 +0100',0),(8,'default@gmail.com','woo tarkovski',' test contact','Tue, 10 Mar 2020 09:52:52 +0100',0),(9,'default@gmail.com','woo tarkovski',' erthdrthdrtgrdtgrthydrth','Tue, 10 Mar 2020 09:55:38 +0100',0),(10,'default@gmail.com','woo tarkovski',' voilÃƒÂ  voilÃƒÂ   voilÃƒÂ  voilÃƒÂ   voilÃƒÂ  voilÃƒÂ   voilÃƒÂ  voilÃƒÂ   voilÃƒÂ  voilÃƒÂ  ','Tue, 10 Mar 2020 09:57:22 +0100',0),(11,'default@gmail.com','woo tarkovski',' fjkku','Tue, 10 Mar 2020 11:06:45 +0100',0),(12,'default@gmail.com','woo tarkovski',' fyjhyfchdj','Tue, 10 Mar 2020 11:13:09 +0100',0),(13,'default@gmail.com','woo tarkovski',' ','Tue, 10 Mar 2020 11:18:08 +0100',0),(14,'default@gmail.com','woo tarkovski',' gfjngfcngnfgnfgngfxdn','Tue, 10 Mar 2020 23:55:55 +0100',0),(15,'default@gmail.com','woo tarkovski',' zgdsfgersgesgbsevfresg','Tue, 10 Mar 2020 23:58:44 +0100',0),(16,'default@gmail.com','woo tarkovski',' ','Wed, 11 Mar 2020 01:02:17 +0100',0),(17,'default@gmail.com','ethggrtshg tarkovski',' tyjjuyf','Wed, 11 Mar 2020 03:55:57 +0100',0),(18,'default@gmail.com','ethggrtshg tarkovski',' fgnjtdgjtyjfxhnrtfj','Wed, 11 Mar 2020 03:57:53 +0100',0),(19,'default@gmail.com','woo tarkovski',' frgergfregergerfgf','Wed, 11 Mar 2020 04:47:06 +0100',0);

/*Table structure for table `newsletter` */

DROP TABLE IF EXISTS `newsletter`;

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `newsletter` */

insert  into `newsletter`(`id`,`email`) values (1,'sfsef@hf.ck'),(2,'daniel@gmail.com'),(3,'sfsef@hf.ck'),(4,'daniel@gmail.com');

/*Table structure for table `projet` */

DROP TABLE IF EXISTS `projet`;

CREATE TABLE `projet` (
  `idpro` int(11) NOT NULL AUTO_INCREMENT,
  `nomProjet` varchar(250) DEFAULT NULL,
  `image` varchar(20) NOT NULL,
  `description` varchar(255) NOT NULL,
  `slogan` varchar(200) DEFAULT NULL,
  `objectif` int(11) DEFAULT NULL,
  `date` varchar(255) NOT NULL,
  `duree` date DEFAULT NULL,
  `etat` int(11) DEFAULT NULL,
  `administrateur` int(11) DEFAULT NULL,
  `internaute` int(11) DEFAULT NULL,
  `categorie` int(11) DEFAULT NULL,
  `vue` int(11) DEFAULT NULL,
  PRIMARY KEY (`idpro`),
  KEY `administrateur` (`administrateur`),
  KEY `internaute` (`internaute`),
  KEY `categorie` (`categorie`),
  CONSTRAINT `projet_ibfk_1` FOREIGN KEY (`administrateur`) REFERENCES `administrateur` (`idad`),
  CONSTRAINT `projet_ibfk_2` FOREIGN KEY (`internaute`) REFERENCES `internaute` (`idu`),
  CONSTRAINT `projet_ibfk_3` FOREIGN KEY (`categorie`) REFERENCES `categorie` (`idcat`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

/*Data for the table `projet` */

insert  into `projet`(`idpro`,`nomProjet`,`image`,`description`,`slogan`,`objectif`,`date`,`duree`,`etat`,`administrateur`,`internaute`,`categorie`,`vue`) values (1,'Woman Lives','411639144','La femme est celle lÃƒÂ  qui survient ÃƒÂ  chaque fois que nous pensons que tout est terminÃƒÂ©.','Woman are all, woman are ours.',1000000,'Thu, 12 Mar 2020 04:18:43 +0100','0000-00-00',1,NULL,15,4,NULL),(9,'rest','1101089651',' xdfgxdfgdfhgxfdhgfdhgdf','sloganedrgsraf',232333,'Fri, 13 Mar 2020 16:37:57 +0100','0000-00-00',1,NULL,15,1,NULL),(10,'Aomor','1101089653','ahgdwswadfkj.awsefwsaecfkjasdv.ksajdvfedsvfsewdkjAhgdwswadfkj.awsefwsaecfkjasdv.ksajdvfedsvfsewdkjahgdwswadfkj.awsefwsaecfkjasdv.ksajdvfedsvfsewdkjAhgdwswadfkj.awsefwsaecfkjasdv.ksajdvfedsvfsewdkjahgdwswadfkj.awsefwsaecfkjasdv.ksajdvfedsvfsewdkjAhgdwswadf','Le dÃƒÂ©sir, l\'amour en est un.',20000000,'Fri, 13 Mar 2020 17:05:12 +0100','2021-05-03',1,NULL,15,4,NULL);

/*Table structure for table `reunion` */

DROP TABLE IF EXISTS `reunion`;

CREATE TABLE `reunion` (
  `administrateur` int(11) NOT NULL,
  `internaute` int(11) NOT NULL,
  `outil` varchar(150) DEFAULT NULL,
  `sujet` varchar(150) DEFAULT NULL,
  `date` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`administrateur`,`internaute`),
  KEY `internaute` (`internaute`),
  CONSTRAINT `reunion_ibfk_1` FOREIGN KEY (`administrateur`) REFERENCES `administrateur` (`idad`),
  CONSTRAINT `reunion_ibfk_2` FOREIGN KEY (`internaute`) REFERENCES `internaute` (`idu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `reunion` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
