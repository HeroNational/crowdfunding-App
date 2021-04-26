-- --------------------------------------------------------
-- Hôte :                        localhost
-- Version du serveur:           5.1.72-community - MySQL Community Server (GPL)
-- SE du serveur:                Win32
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Listage de la structure de la base pour api
DROP DATABASE IF EXISTS `api`;
CREATE DATABASE IF NOT EXISTS `api` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `api`;

-- Listage de la structure de la table api. compte
DROP TABLE IF EXISTS `compte`;
CREATE TABLE IF NOT EXISTS `compte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numeroClient` int(11) NOT NULL DEFAULT '0',
  `token` text NOT NULL,
  `solde` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK__utilisateur` (`numeroClient`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Listage des données de la table api.compte : 2 rows
/*!40000 ALTER TABLE `compte` DISABLE KEYS */;
INSERT INTO `compte` (`id`, `numeroClient`, `token`, `solde`) VALUES
	(1, 699277263, 'iwerwefojwdfvwaefiufdvsdfgsergweagfgfrnherg5454y5f45y54ttg54y54erw45ye4tg5yvgy5serergresag34t3445tt5454erst5ty5rtgrtg54g63rtg4rg56erg56hgytet4h5rthy6rthrtgb65rth', 19223280),
	(2, 657675216, 'werttttttttttttttt645655b 5 56 u56h', 6185200);
/*!40000 ALTER TABLE `compte` ENABLE KEYS */;

-- Listage de la structure de la table api. utilisateur
DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `nom` varchar(250) NOT NULL,
  `phone` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`phone`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Listage des données de la table api.utilisateur : ~4 rows (environ)
/*!40000 ALTER TABLE `utilisateur` DISABLE KEYS */;
INSERT INTO `utilisateur` (`nom`, `phone`) VALUES
	('Daniel Fokou', 657675216),
	('Lover Mother', 675120936),
	('Mbarga', 677881982),
	('plateformeAbodah', 699277263);
/*!40000 ALTER TABLE `utilisateur` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
