/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.1.13-MariaDB : Database - coffrefort
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`coffrefort` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `coffrefort`;

/*Table structure for table `application` */

DROP TABLE IF EXISTS `application`;

CREATE TABLE `application` (
  `idApplication` int(11) NOT NULL AUTO_INCREMENT,
  `libelleApplication` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idApplication`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `application` */

/*Table structure for table `categorie` */

DROP TABLE IF EXISTS `categorie`;

CREATE TABLE `categorie` (
  `idCategorie` int(11) NOT NULL AUTO_INCREMENT,
  `libelleCategorie` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idCategorie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `categorie` */

/*Table structure for table `categoriedocument` */

DROP TABLE IF EXISTS `categoriedocument`;

CREATE TABLE `categoriedocument` (
  `idCategorieDocument` int(11) NOT NULL AUTO_INCREMENT,
  `libelleCategorieDocument` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`idCategorieDocument`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `categoriedocument` */

/*Table structure for table `categoriser` */

DROP TABLE IF EXISTS `categoriser`;

CREATE TABLE `categoriser` (
  `idCategorie` int(11) NOT NULL,
  `idContact` int(11) NOT NULL,
  PRIMARY KEY (`idCategorie`,`idContact`),
  KEY `idContact` (`idContact`),
  CONSTRAINT `idCategorie` FOREIGN KEY (`idCategorie`) REFERENCES `categorie` (`idCategorie`),
  CONSTRAINT `idContact` FOREIGN KEY (`idContact`) REFERENCES `contact` (`idContact`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `categoriser` */

/*Table structure for table `contact` */

DROP TABLE IF EXISTS `contact`;

CREATE TABLE `contact` (
  `idContact` int(11) NOT NULL AUTO_INCREMENT,
  `idPays` int(11) DEFAULT NULL,
  `nomContact` varchar(255) DEFAULT NULL,
  `prenomContact` varchar(255) DEFAULT NULL,
  `emailContact` varchar(255) DEFAULT NULL,
  `bpContact` varchar(50) DEFAULT NULL,
  `descriptionContact` text,
  `dateCreationContact` varchar(50) DEFAULT NULL,
  `idQuartierContact` int(11) DEFAULT NULL,
  `telephoneContact` int(11) DEFAULT NULL,
  `evenementContact` text,
  `dateEvenementContact` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idContact`),
  KEY `idPays` (`idPays`),
  KEY `idQuartier` (`idQuartierContact`),
  KEY `idTelephone` (`telephoneContact`),
  CONSTRAINT `idPays` FOREIGN KEY (`idPays`) REFERENCES `pays` (`idPays`),
  CONSTRAINT `idQuartier` FOREIGN KEY (`idQuartierContact`) REFERENCES `quartier` (`idQuartier`),
  CONSTRAINT `idTelephone` FOREIGN KEY (`telephoneContact`) REFERENCES `telephone` (`idTelephone`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `contact` */

/*Table structure for table `document` */

DROP TABLE IF EXISTS `document`;

CREATE TABLE `document` (
  `idDocument` int(11) NOT NULL AUTO_INCREMENT,
  `libelleDocument` varchar(100) DEFAULT NULL,
  `idCategorieDocument` int(11) DEFAULT NULL,
  `auteurDocument` varchar(200) NOT NULL,
  PRIMARY KEY (`idDocument`),
  KEY `idCategorieDocument` (`idCategorieDocument`),
  CONSTRAINT `idCategorieDocument` FOREIGN KEY (`idCategorieDocument`) REFERENCES `categoriedocument` (`idCategorieDocument`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `document` */

/*Table structure for table `gererpassword` */

DROP TABLE IF EXISTS `gererpassword`;

CREATE TABLE `gererpassword` (
  `idPassword` int(11) NOT NULL,
  `idApplication` int(11) NOT NULL,
  PRIMARY KEY (`idPassword`,`idApplication`),
  KEY `idApplication` (`idApplication`),
  CONSTRAINT `idApplication` FOREIGN KEY (`idApplication`) REFERENCES `application` (`idApplication`),
  CONSTRAINT `idPassword` FOREIGN KEY (`idPassword`) REFERENCES `password` (`idPassword`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `gererpassword` */

/*Table structure for table `operateur` */

DROP TABLE IF EXISTS `operateur`;

CREATE TABLE `operateur` (
  `idOperateur` int(11) NOT NULL AUTO_INCREMENT,
  `libelleOperateur` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`idOperateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `operateur` */

/*Table structure for table `password` */

DROP TABLE IF EXISTS `password`;

CREATE TABLE `password` (
  `idPassword` int(11) NOT NULL AUTO_INCREMENT,
  `libellePassword` varchar(100) DEFAULT NULL,
  `indicePassword` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idPassword`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `password` */

/*Table structure for table `pays` */

DROP TABLE IF EXISTS `pays`;

CREATE TABLE `pays` (
  `idPays` int(11) NOT NULL AUTO_INCREMENT,
  `libellePays` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idPays`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `pays` */

/*Table structure for table `quartier` */

DROP TABLE IF EXISTS `quartier`;

CREATE TABLE `quartier` (
  `idQuartier` int(11) NOT NULL AUTO_INCREMENT,
  `libelleQuartier` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idQuartier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `quartier` */

/*Table structure for table `telephone` */

DROP TABLE IF EXISTS `telephone`;

CREATE TABLE `telephone` (
  `idTelephone` int(11) NOT NULL AUTO_INCREMENT,
  `libelleTelephone` varchar(30) DEFAULT NULL,
  `operateur` int(11) NOT NULL,
  PRIMARY KEY (`idTelephone`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `telephone` */

/*Table structure for table `utilisateur` */

DROP TABLE IF EXISTS `utilisateur`;

CREATE TABLE `utilisateur` (
  `login` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `sexe` varchar(10) DEFAULT NULL,
  `anniversaire` varchar(10) DEFAULT NULL,
  `langueUtilisateur` varchar(15) DEFAULT NULL,
  `aidePass` varchar(300) NOT NULL,
  PRIMARY KEY (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `utilisateur` */

insert  into `utilisateur`(`login`,`password`,`nom`,`prenom`,`sexe`,`anniversaire`,`langueUtilisateur`,`aidePass`) values ('default','default','default','default','male','25/03/2019','fr','default');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
