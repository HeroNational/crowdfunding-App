-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 22 Mai 2020 à 01:26
-- Version du serveur :  10.1.13-MariaDB
-- Version de PHP :  5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `api`
--

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

CREATE TABLE `compte` (
  `id` varchar(35) COLLATE utf8_croatian_mysql561_ci NOT NULL,
  `token` text COLLATE utf8_croatian_mysql561_ci NOT NULL,
  `solde` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_mysql561_ci;

--
-- Contenu de la table `compte`
--

INSERT INTO `compte` (`id`, `token`, `solde`) VALUES
('237657675216', 'ageefeg3wfg5Gww4aeawggrrej5rfgweefeebheFaawhfg2h5w4s2egkwfw34g44El', 7999588),
('675120936', 'ageefeg3wfg5Gww4aeawggrrej5rfgweefeebheFaawhfg2h5w4s2egkwfw34g44E', 6000409),
('677881982', 'ageefeg3wfg5Gww4aeawggrrej5rfgweefeebheFaawhfg2h5w4s2egkwfw34g44Ert4', 1);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `nom` varchar(250) COLLATE utf8_croatian_mysql561_ci NOT NULL,
  `phone` varchar(35) COLLATE utf8_croatian_mysql561_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_mysql561_ci;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`nom`, `phone`) VALUES
('Daniel Fokou', '237657675216'),
('iwerwefojwdfvwaefiufdvsdfgsergweagfgfrnherg5454y5f45y54ttg54y54erw45ye4tg5yvgy5serergresag34t3445tt5454erst5ty5rtgrtg54g63rtg4rg56erg56hgytet4h5rthy6rthrtgb65rth', '675120936'),
('Mbarga', '677881982');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `compte`
--
ALTER TABLE `compte`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`phone`);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `compte`
--
ALTER TABLE `compte`
  ADD CONSTRAINT `compte_ibfk_1` FOREIGN KEY (`id`) REFERENCES `utilisateur` (`phone`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
