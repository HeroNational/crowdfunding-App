-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 22 Mai 2020 à 22:53
-- Version du serveur :  10.1.13-MariaDB
-- Version de PHP :  5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `abodah`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE `administrateur` (
  `idad` int(4) NOT NULL,
  `login` varchar(70) DEFAULT NULL,
  `password` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `administrateur`
--

INSERT INTO `administrateur` (`idad`, `login`, `password`) VALUES
(1, 'default', 'default');

-- --------------------------------------------------------

--
-- Structure de la table `anonyme`
--

CREATE TABLE `anonyme` (
  `id` int(11) NOT NULL,
  `idprojet` int(11) DEFAULT NULL,
  `montant` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `anonyme`
--

INSERT INTO `anonyme` (`id`, `idprojet`, `montant`, `email`, `date`) VALUES
(1, 9, 100, 'wootarkovski25032019@gmail.com', '2020-05-22'),
(2, 9, 100, 'wootarkovski25032019@gmail.com', '2020-05-22');

-- --------------------------------------------------------

--
-- Structure de la table `appreciation`
--

CREATE TABLE `appreciation` (
  `utilisateur` int(11) NOT NULL,
  `article` int(11) NOT NULL,
  `commentaire` text,
  `like` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `idArt` int(11) NOT NULL,
  `titre` varchar(200) DEFAULT NULL,
  `contenu` text,
  `auteur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `idcat` int(11) NOT NULL,
  `categorie` varchar(100) DEFAULT NULL,
  `etat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`idcat`, `categorie`, `etat`) VALUES
(1, 'Informatique', 1),
(2, 'Agricole', 1),
(3, 'Cosmetique', 1),
(4, 'Not categorised', 1);

-- --------------------------------------------------------

--
-- Structure de la table `financement`
--

CREATE TABLE `financement` (
  `idFin` int(11) NOT NULL,
  `internaute` int(11) NOT NULL,
  `projet` int(11) NOT NULL,
  `montant` int(2) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `financement`
--

INSERT INTO `financement` (`idFin`, `internaute`, `projet`, `montant`, `date`) VALUES
(1, 1, 1, 2000000, '2020-03-13'),
(2, 1, 10, 1000000, '2020-03-13'),
(3, 12, 9, 1000000, '2020-03-13'),
(7, 9, 12, 250000, '2020-03-16'),
(8, 9, 12, 100000, '2020-03-16'),
(11, 14, 12, 250000, '2020-03-16'),
(12, 1, 1, 0, '2020-03-19'),
(13, 1, 19, 0, '2020-03-19'),
(14, 1, 21, 0, NULL),
(15, 1, 22, 0, NULL),
(20, 1, 11, 0, '2020-05-13'),
(21, 15, 22, 100, '2020-05-14'),
(22, 15, 22, 12365, '2020-05-14'),
(23, 15, 22, 12, '2020-05-21'),
(24, 15, 10, 1000000, '2020-05-21'),
(25, 15, 10, 1000000, '2020-05-21'),
(26, 1, 23, 0, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `internaute`
--

CREATE TABLE `internaute` (
  `idu` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `description` text NOT NULL,
  `sexe` varchar(20) DEFAULT NULL,
  `date` date NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `etatU` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `internaute`
--

INSERT INTO `internaute` (`idu`, `email`, `nom`, `prenom`, `password`, `description`, `sexe`, `date`, `token`, `etatU`) VALUES
(1, 'default@gmail.com', 'woo', 'tarkovski', '', '', 'masculin', '2019-02-05', 'ztS4hf0azddWusjruS4ev5irAoQ574gsU0S8kftusAdlXsofkhJdkgeioP4aa9s8skwK', 1),
(3, 'woofer@bhdf.comdd', 'Woo', 'Tarkovski d', 'passwordere d', '', 'feminin', '2019-02-05', 'WQzhj09feU4srowshX4iAsrs8kSieSgS5gKuduJodoako07d4aofvWs5szkP8Ak4fTrd ', 1),
(4, 'yal@gmail.com', 'Yalakou', 'Alice', 'Yal', '', 'feminin', '2019-02-05', 'uoeaXru7UsyaAJ4ScY4Kihdues50aWA4fjPk9kd4kzlfgzSl5SAs8ldsha0isQ8g', 1),
(6, 'tft@q.w', 'gergreg', 'referas', 'tft', '', 'feminin', '2019-02-05', 'gf40Szh4jrd85deeUWSzfssteQ4u0t5S8iksg7APegrggrukrfaeXArsdfahK9ss4J', 1),
(7, 'sdgergr@hjf.e', 'rdhgsrth', 'srthrth', 'ergsreg', '', 'masculin', '2019-02-05', 'd9drArguS4hhszssk5tsfhKhhfrtjdrs8Jk4sg847PSWeihrtS5ggr4r0UzsauAd0gsXeQd', 1),
(8, 'sdgergr@hjf.et', 'rthrth', 'rrgrtsh', 'rthrthrth', '', 'feminin', '2019-02-05', 'dhjrrsSgfh4re4isttSzgstWa8kPgdU74Xhd0dJs9ksKh4Qehrzu8sgA50Srrrf5rAsgu', 1),
(9, 'sdgergr@hjf.ef', 'y45ye65y', 'rthujtrh', 'tgstrg', '', 'feminin', '2019-02-05', 'e5j674gdg9hr55Qdhg0dsty4yuSkP4SsfXJ48igUk4SAjruedfWA8t0srzKruy5rasszhshe', 1),
(10, 'sdgergr@hjf.etg', 'gffgfg', 'fgf', 'gfgfb', '', 'feminin', '2019-02-05', 'ei8zu7ds0ff45zAkSJ4r0d5QjSgrfWgrsgd9dKgesssfghXfUuSAgkfa48g4Psghf', 1),
(11, 'sdgergr@hjf.eyu', 'rtytr', 'rthrth', 'drtytr', '', 'feminin', '2019-02-05', 'WdfeA8SdSjgsh4JtUht75iryfrhdgzsQtguarrK0ksdXk4gu8Srrsht4A04Perssz59', 1),
(12, 'sdgergr@hjf.etdf', 'wefwef', 'ewfdwe', 'efwefdwf', '', '', '2019-02-05', '9f0hswUe8e5fdreXjAi87JeSAs5zddWSKkeg4kssgPf4QSh40uzwdw4wfsauf', 1),
(14, 'mervie@gmail.com', 'Mahout', 'Mervie', 'mervie', '', 'feminin', '2019-02-05', '0dh4zdeaik8eshs4sUKuruffPWgoSzM9ik4Ase4S8gjXAMu5drJs0hSv7Qat5', 1),
(15, 'daniel@gmail.com', 'Fokou', 'Daniel', 'daniel', '', 'masculin', '2019-02-05', 'd5lJ9uQaisKS4f0hgUngSzh4isDuarkk0PAdkszAn4sueifFeoXSjl5sea4o87dWd8', 1),
(21, 'yal@gmail.come', 'Barrtt', 'Baro', 'yal', 'rthgrth', 'masculin', '2020-04-25', 'da4tUssK5dhySgsarA84AruPlosaeSWrJz05uBkf4zSjs8Bg0d4fi9aQXhr7tk', 1),
(22, 'querty@gmail.com', 'Baro', 'Bar', 'qwerty', 'retergsregsegffd', 'feminin', '2020-05-22', '8Q4B0SgABso8sd94sk5XuhzsddSfk5KW4jrhgaaaeAuPirJr07z4fUSs', 1);

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `texte` text NOT NULL,
  `date` varchar(70) DEFAULT NULL,
  `etat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `message`
--

INSERT INTO `message` (`id`, `email`, `nom`, `texte`, `date`, `etat`) VALUES
(1, 'default@gmail.com', 'woo tarkovski', ' Voici ce message...', 'Tue, 10 Mar 2020 01:22:50 +0100', 0),
(2, 'wooh@gmail.com', 'Wahid', ' Message', 'Tue, 10 Mar 2020 08:43:02 +0100', 0),
(3, 'default@gmail.com', 'woo tarkovski', ' Voila', 'Tue, 10 Mar 2020 09:09:29 +0100', 0),
(4, 'default@gmail.com', 'woo tarkovski', ' VoilÃ  ', 'Tue, 10 Mar 2020 09:10:34 +0100', 0),
(5, 'default@gmail.com', 'woo tarkovski', ' dfsdgdegdr', 'Tue, 10 Mar 2020 09:12:13 +0100', 0),
(6, 'default@gmail.com', 'woo tarkovski', ' ewfergesgergvfsgberg', 'Tue, 10 Mar 2020 09:13:02 +0100', 0),
(7, 'default@gmail.com', 'woo tarkovski', '\r\n        $_SESSION[''notification'']=true;\r\n        $_SESSION[''notification''][''text'']="Le projet est bien soumis et en attente de validation.";\r\n        $_SESSION[''notification''][''status'']="positive";', 'Tue, 10 Mar 2020 09:46:23 +0100', 0),
(8, 'default@gmail.com', 'woo tarkovski', ' test contact', 'Tue, 10 Mar 2020 09:52:52 +0100', 0),
(9, 'default@gmail.com', 'woo tarkovski', ' erthdrthdrtgrdtgrthydrth', 'Tue, 10 Mar 2020 09:55:38 +0100', 0),
(10, 'default@gmail.com', 'woo tarkovski', ' voilÃƒÂ  voilÃƒÂ   voilÃƒÂ  voilÃƒÂ   voilÃƒÂ  voilÃƒÂ   voilÃƒÂ  voilÃƒÂ   voilÃƒÂ  voilÃƒÂ  ', 'Tue, 10 Mar 2020 09:57:22 +0100', 0),
(11, 'default@gmail.com', 'woo tarkovski', ' fjkku', 'Tue, 10 Mar 2020 11:06:45 +0100', 0),
(12, 'default@gmail.com', 'woo tarkovski', ' fyjhyfchdj', 'Tue, 10 Mar 2020 11:13:09 +0100', 0),
(13, 'default@gmail.com', 'woo tarkovski', ' ', 'Tue, 10 Mar 2020 11:18:08 +0100', 0),
(14, 'default@gmail.com', 'woo tarkovski', ' gfjngfcngnfgnfgngfxdn', 'Tue, 10 Mar 2020 23:55:55 +0100', 0),
(15, 'default@gmail.com', 'woo tarkovski', ' zgdsfgersgesgbsevfresg', 'Tue, 10 Mar 2020 23:58:44 +0100', 0),
(16, 'default@gmail.com', 'woo tarkovski', ' ', 'Wed, 11 Mar 2020 01:02:17 +0100', 0),
(17, 'default@gmail.com', 'ethggrtshg tarkovski', ' tyjjuyf', 'Wed, 11 Mar 2020 03:55:57 +0100', 0),
(18, 'default@gmail.com', 'ethggrtshg tarkovski', ' fgnjtdgjtyjfxhnrtfj', 'Wed, 11 Mar 2020 03:57:53 +0100', 0),
(19, 'default@gmail.com', 'woo tarkovski', ' frgergfregergerfgf', 'Wed, 11 Mar 2020 04:47:06 +0100', 0),
(20, 'erer@hhf.gk', 'wfwfagegerg', 'rferrg', 'Wed, 18 Mar 2020 05:39:05 +0100', 0);

-- --------------------------------------------------------

--
-- Structure de la table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `newsletter`
--

INSERT INTO `newsletter` (`id`, `email`) VALUES
(1, 'sfsef@hf.ck'),
(2, 'daniel@gmail.com'),
(3, 'sfsef@hf.ck'),
(4, 'daniel@gmail.com'),
(5, 'hjrtu@ghgklbn.cklg'),
(6, 'hjrtu@ghgklbn.cklgfgdeee'),
(7, 'hjrtu@ghgklbn.cklg');

-- --------------------------------------------------------

--
-- Structure de la table `projet`
--

CREATE TABLE `projet` (
  `idpro` int(11) NOT NULL,
  `nomProjet` varchar(250) DEFAULT NULL,
  `image` varchar(20) NOT NULL,
  `descriptionProjet` text NOT NULL,
  `slogan` varchar(200) DEFAULT NULL,
  `objectif` int(11) DEFAULT NULL,
  `date` varchar(255) NOT NULL,
  `duree` date DEFAULT NULL,
  `etat` int(11) DEFAULT NULL,
  `administrateur` int(11) DEFAULT NULL,
  `internaute` int(11) DEFAULT NULL,
  `categorieProjet` int(11) DEFAULT NULL,
  `vue` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `projet`
--

INSERT INTO `projet` (`idpro`, `nomProjet`, `image`, `descriptionProjet`, `slogan`, `objectif`, `date`, `duree`, `etat`, `administrateur`, `internaute`, `categorieProjet`, `vue`) VALUES
(1, 'Women Insigh', '411639144', 'La femme au centre \r\n                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Similique enim consequatur quo voluptates reprehenderit et minima, explicabo tempore, ut dolorum eius harum repudiandae. Corrupti quod odio omnis esse sint ad!\r\n                Quaerat consequatur amet tempora saepe possimus labore quibusdam aliquam, nemo aut. Fugiat doloremque soluta quo fugit eum officia exercitationem, mollitia earum quaerat ipsa itaque unde nemo, odio obcaecati libero. Quod!\r\n                Facere ex corporis, distinctio laudantium odit error omnis, eius sed dolores explicabo accusamus impedit nobis, earum ut provident! Minus, sapiente qui vel ducimus mollitia nisi iusto unde. Cumque, amet sed.\r\n                Nemo amet, nobis eius autem dolorem eligendi cum quaerat fugiat nisi. Ipsam cumque sit, hic tenetur laboriosam autem obcaecati facere consequatur, voluptatibus veniam fugiat ad, ullam nisi earum quae harum!\r\n                Dolore natus ex sint, laboriosam autem corporis recusandae in molestiae obcaecati ut, voluptas quis nobis laudantium rem. Provident, natus voluptatem aliquam vel, nobis pariatur, recusandae suscipit animi fugiat hic dolorem.\r\n                Qui earum eum quas rerum suscipit, sunt nesciunt blanditiis mollitia quidem saepe in perferendis at neque rem sint fuga totam iusto autem nisi. Expedita enim velit voluptatem quod dolore quasi?\r\n                Modi quisquam, quas accusantium voluptatibus nobis odio reprehenderit rem at debitis mollitia labore similique repudiandae accusamus a aut eveniet temporibus repellat veritatis eaque quibusdam officiis quod facere. Consectetur, nobis at.\r\n                Eos quod, quaerat molestiae maiores cupiditate eius modi mollitia voluptatibus incidunt ab sed qui explicabo ea temporibus beatae rem, blanditiis fugit reiciendis voluptas. Laudantium possimus adipisci eius quia enim quasi?\r\n                Reprehenderit earum officia ipsum quos maiores voluptas quasi aliquid rerum exercitationem similique. Fugiat asperiores dolores sint, consectetur, id aut tenetur odit nam debitis rerum qui assumenda pariatur tempora non delectus!\r\n                Enim dignissimos alias aliquam. Dolores alias modi commodi distinctio sint quis vel necessitatibus iste, consequuntur obcaecati consectetur molestiae nihil tempore id cumque iusto nobis natus molestias vero ut libero excepturi!', 'Ceci n''est rien que du blablabla, du serieux blablabla.', 1000000, 'Thu, 12 Mar 2020 04:18:43 +0100', '2021-04-10', 1, NULL, 15, 4, NULL),
(9, 'Building', '1101089651', 'Entreprise de travaux publics et personnels offrant les services suivant:\r\n- Plomberie,\r\n- Chaudronerie,\r\n- Construction Gobale...\r\n\r\n\r\n                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cupiditate fugiat incidunt nesciunt doloribus aspernatur fugit minus in nostrum nulla magni ducimus adipisci porro, id numquam saepe veniam quae eum dicta?\r\n                Cum, vero aliquam ea odio debitis natus commodi nulla totam veniam dolores deserunt velit adipisci, corrupti, ex omnis iure voluptate enim optio veritatis quibusdam necessitatibus? Nulla aliquam natus beatae dicta?\r\n                Vel, necessitatibus totam? Ipsam animi iste cumque tenetur natus vel, accusantium amet ratione corporis voluptates veritatis nemo harum repellendus officia nobis commodi quibusdam eaque nulla reprehenderit rerum iure quasi. Provident.\r\n                Quo dolorem cum assumenda est? Nihil consequatur quos sunt suscipit rem eius porro totam explicabo quo nobis, temporibus tempora laborum omnis deserunt accusamus laudantium? Itaque perferendis neque sint necessitatibus maiores.\r\n                Quos iusto odit at suscipit harum assumenda. Odit itaque doloremque doloribus, tempora quis saepe dolorem impedit illo dolorum beatae accusantium officia assumenda, magni quas reiciendis veniam eius incidunt modi. Accusamus?\r\n                Ipsum exercitationem dolore obcaecati inventore officiis. Consequuntur, ex veniam aut nostrum molestiae, odio nihil pariatur ipsa qui earum ea aperiam quidem culpa. Nisi reprehenderit repellendus, nostrum perspiciatis harum ipsam suscipit?\r\n                Doloremque quis commodi inventore enim dolore itaque, quibusdam iure! Dicta, aut. Ab accusantium vero blanditiis similique animi labore quisquam culpa voluptatum magni suscipit. Delectus exercitationem ipsa eveniet harum sequi asperiores?\r\n                Asperiores pariatur voluptatem quos hic eum autem praesentium dignissimos eligendi nemo eius fugiat ullam minus, sed itaque. Voluptatem laborum similique ipsa eius obcaecati expedita saepe, tenetur quaerat commodi praesentium. Ad!\r\n                Dignissimos, sapiente? Dolorum at soluta vitae aliquam est totam, ex rerum deleniti, optio natus quo pariatur. Est atque eius ducimus debitis delectus, asperiores eveniet, veritatis ut, ratione dolorem enim consequatur?\r\n                Cumque inventore quos deserunt vitae eum impedit, minima commodi consequuntur? Nisi necessitatibus cum beatae provident porro cupiditate, quas facere ab, sequi nesciunt eius ut velit, impedit nobis consequuntur iusto consequatur?', 'Au service du solide.', 20000000, 'Fri, 13 Mar 2020 16:37:57 +0100', '2021-08-31', 1, NULL, 15, 1, 2),
(10, 'Christmas', '1101089653', 'L''arbre de noel. La plus attendue de toutes les fets par les tout petits merite d''etre celebree.\r\n\r\n\r\n    Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta quasi non distinctio dolorem ea veritatis praesentium assumenda, eveniet officiis. Nisi dolor perferendis cum quia debitis tempora delectus! Quae, esse aliquid?\r\n    Quisquam consectetur facilis ducimus nam laboriosam! Vero, illum odio minima voluptate voluptatibus temporibus distinctio nihil libero enim esse. Officiis odit sequi quam alias ipsam ex eum harum. Illo, ipsa cum!\r\n    Nesciunt amet ducimus aperiam expedita praesentium beatae ipsum sapiente id libero maxime nostrum sed iusto quod voluptatem, officia obcaecati, sint possimus accusantium odio molestiae ad! Quo impedit quae quam consequuntur.\r\n    Temporibus optio repellat, eos recusandae praesentium nam cum repudiandae illo maiores, minima, nemo nesciunt? Deleniti, commodi excepturi! Dolorem, nihil! Quas quos ex expedita labore nam, dicta doloremque illum. Voluptatem, architecto.\r\n    Debitis, officiis cumque libero quisquam ab ipsam dolor qui unde laudantium deleniti fuga laboriosam nostrum dolores perspiciatis maiores neque culpa aliquid rem commodi sed! Deserunt dicta distinctio eius maiores quidem?', 'Le dÃƒÂ©sir, la joie tout en un.', 20000000, 'Fri, 13 Mar 2020 17:05:12 +0100', '2021-08-26', 1, NULL, 14, 4, 3),
(11, 'Maria', '873099074', ' 4etgrghrthgrthfdhn 4etgrghrthgrthfdhn 4etgrghrthgrthfdhn 4etgrghrthgrthfdhn 4etgrghrthgrthfdhn 4etgrghrthgrthfdhn 4etgrghrthgrthfdhn 4etgrghrthgrthfdhn 4etgrghrthgrthfdhn 4etgrghrthgrthfdhn 4etgrghrthgrthfdhn', 'Certificate', 1000000, '2020-15-03', '2020-03-29', 1, NULL, 15, 1, NULL),
(12, 'DMJ Collecte', '600090663', ' La DMJ est la solution de collecte la plus Ã¢ÂžÂ• pratique pour la gestion de vos dÃƒÂ©chets. Aidez les rues et la population en les respectant et en faisant pareillement pour votre environnement.', 'Les ordures sont mieux au bon endroit.', 10000000, '2020-16-03', '2020-09-16', 1, NULL, 15, 4, NULL),
(13, 'WaterGate', '1275103200', 'fdghfdxgdrhrgzergresgesesrdf wwefrwefe4t4trds', 'De l''eau, une vie!', 19000000, '2020-18-03', '2022-05-12', 1, NULL, 15, 2, NULL),
(19, 'ergsreg', '1352999098', ' regesge', 'rdtgrgt', 3434, '2020-18-03', '2020-03-26', 1, NULL, 15, 2, NULL),
(21, 'rtrthrthrthrtdhrtdhrthrthrt4hrt', 'default', ' ergergergreregerg', 'rthrthrt', 12220202, '2020-25-04', '2020-04-30', 1, NULL, 21, 2, NULL),
(22, 'Mega Soft', '1174239930', 'Application de reseautage social mettant en relation des personnes de tout age pour des projets communautaires et professionnels.\r\n\r\nLa joie de nous voir reussir des entreprises est partagee. \r\n\r\n\r\n    Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis fugiat magni veritatis voluptatum fuga ipsum quidem facere, adipisci consectetur accusamus ducimus commodi possimus deserunt perspiciatis quam labore error quo asperiores.\r\n    Tempora, quis accusamus consequuntur maiores molestiae consectetur. Eius quam pariatur animi perferendis! Quam excepturi quia est sequi, molestias iste provident adipisci, nulla, repudiandae tempore vitae rerum aspernatur asperiores harum necessitatibus.\r\n    Eligendi quae aperiam pariatur natus voluptate aspernatur perspiciatis, aut commodi repudiandae libero ullam illum dolores sit adipisci architecto. Numquam magnam possimus eaque corrupti quia voluptatibus omnis obcaecati aperiam cupiditate illo?\r\n    Unde praesentium dolor corrupti fuga quas, qui optio excepturi odio. Ex sit itaque facere. Debitis at pariatur magni quod similique! Eveniet dignissimos, eos ratione ex illum quidem itaque et? Ab!\r\n    Rem laboriosam, porro quos, repudiandae voluptatem nobis quidem, atque optio voluptate eos ad corporis pariatur ipsa architecto. In ab quia voluptatem laboriosam soluta molestiae, quos dolorem quod rerum eum dicta!\r\n    Doloremque laboriosam repudiandae, quia veritatis quae dignissimos accusantium temporibus illo cupiditate laudantium porro beatae itaque, quos maxime repellat facere quis dolor rerum. Libero repellat, delectus nesciunt natus tempora animi quod?\r\n    Quod consequatur ducimus a nulla facere eveniet exercitationem est labore nobis aut aliquam et debitis natus autem eligendi quidem accusantium cum consectetur, hic dicta saepe repudiandae similique architecto? Dolorem, reprehenderit.\r\n    Amet, praesentium sunt! Obcaecati repellendus eligendi ab quia et! Excepturi quos ullam enim incidunt? Aut deserunt, inventore tenetur cumque itaque ab aperiam dignissimos cupiditate, dolor, sapiente eius! Cumque, repellendus sit?\r\n    Aperiam, praesentium temporibus blanditiis pariatur in nam, autem quam cumque sequi natus harum modi alias debitis, fugiat provident dicta culpa! Voluptatem maiores quisquam, corrupti eos asperiores earum ea dignissimos fugit!\r\n    Porro aspernatur asperiores ducimus, maxime ipsam sapiente sunt laborum molestias iusto quia quaerat eos labore voluptas autem commodi perspiciatis nostrum odio? Earum obcaecati, officia quod modi illo hic cupiditate eum!\r\n    Ut nisi perferendis unde dolorum. Pariatur itaque, fugit eaque iure tempora et voluptatum debitis porro rem sequi similique, obcaecati mollitia ea recusandae dolor cupiditate distinctio assumenda dolorem nisi saepe repudiandae!\r\n    Id dicta, aspernatur magni fugit ipsa ratione odit! Asperiores similique ea natus necessitatibus minima aut possimus? Quos magnam molestiae suscipit rem praesentium, accusantium dolorem natus, optio modi nesciunt alias nihil.\r\n    Numquam nulla vel aliquam corporis dolorum architecto iure harum unde dolore, quisquam atque ex iusto consectetur nisi necessitatibus debitis explicabo, deserunt optio ipsum ab voluptatum? Dolor perspiciatis tenetur cumque recusandae.\r\n    Quae aliquam dolorum distinctio, quidem doloremque libero exercitationem cum aut ratione laborum, culpa atque reprehenderit sed dicta fugiat? Laboriosam consequatur ad expedita ipsum placeat laborum, perferendis facilis esse cupiditate? Obcaecati!', 'L''entrepreneuriat collectif', 450000, '2020-12-05', '2020-09-05', 1, NULL, 15, 2, NULL),
(23, 'default@gmail.com', '922087597', ' dgffffffffffffffffffffhyu', 'rthrthrt', 120000, '2020-05-22', '2020-05-16', 1, NULL, 15, 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `reunion`
--

CREATE TABLE `reunion` (
  `administrateur` int(11) NOT NULL,
  `internaute` int(11) NOT NULL,
  `outil` varchar(150) DEFAULT NULL,
  `sujet` varchar(150) DEFAULT NULL,
  `date` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`idad`);

--
-- Index pour la table `anonyme`
--
ALTER TABLE `anonyme`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idprojet` (`idprojet`);

--
-- Index pour la table `appreciation`
--
ALTER TABLE `appreciation`
  ADD PRIMARY KEY (`utilisateur`,`article`),
  ADD KEY `article` (`article`);

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`idArt`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`idcat`);

--
-- Index pour la table `financement`
--
ALTER TABLE `financement`
  ADD PRIMARY KEY (`idFin`),
  ADD KEY `projet` (`projet`),
  ADD KEY `internaute` (`internaute`);

--
-- Index pour la table `internaute`
--
ALTER TABLE `internaute`
  ADD PRIMARY KEY (`idu`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `projet`
--
ALTER TABLE `projet`
  ADD PRIMARY KEY (`idpro`),
  ADD KEY `administrateur` (`administrateur`),
  ADD KEY `internaute` (`internaute`),
  ADD KEY `categorie` (`categorieProjet`);

--
-- Index pour la table `reunion`
--
ALTER TABLE `reunion`
  ADD PRIMARY KEY (`administrateur`,`internaute`),
  ADD KEY `internaute` (`internaute`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `administrateur`
--
ALTER TABLE `administrateur`
  MODIFY `idad` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `anonyme`
--
ALTER TABLE `anonyme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `idArt` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `idcat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `financement`
--
ALTER TABLE `financement`
  MODIFY `idFin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT pour la table `internaute`
--
ALTER TABLE `internaute`
  MODIFY `idu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT pour la table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `projet`
--
ALTER TABLE `projet`
  MODIFY `idpro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `anonyme`
--
ALTER TABLE `anonyme`
  ADD CONSTRAINT `anonyme_ibfk_1` FOREIGN KEY (`idprojet`) REFERENCES `projet` (`idpro`);

--
-- Contraintes pour la table `appreciation`
--
ALTER TABLE `appreciation`
  ADD CONSTRAINT `appreciation_ibfk_1` FOREIGN KEY (`utilisateur`) REFERENCES `internaute` (`idu`),
  ADD CONSTRAINT `appreciation_ibfk_2` FOREIGN KEY (`article`) REFERENCES `article` (`idArt`);

--
-- Contraintes pour la table `financement`
--
ALTER TABLE `financement`
  ADD CONSTRAINT `financement_ibfk_1` FOREIGN KEY (`internaute`) REFERENCES `internaute` (`idu`),
  ADD CONSTRAINT `financement_ibfk_2` FOREIGN KEY (`projet`) REFERENCES `projet` (`idpro`);

--
-- Contraintes pour la table `projet`
--
ALTER TABLE `projet`
  ADD CONSTRAINT `projet_ibfk_1` FOREIGN KEY (`administrateur`) REFERENCES `administrateur` (`idad`),
  ADD CONSTRAINT `projet_ibfk_2` FOREIGN KEY (`internaute`) REFERENCES `internaute` (`idu`),
  ADD CONSTRAINT `projet_ibfk_3` FOREIGN KEY (`categorieProjet`) REFERENCES `categorie` (`idcat`);

--
-- Contraintes pour la table `reunion`
--
ALTER TABLE `reunion`
  ADD CONSTRAINT `reunion_ibfk_1` FOREIGN KEY (`administrateur`) REFERENCES `administrateur` (`idad`),
  ADD CONSTRAINT `reunion_ibfk_2` FOREIGN KEY (`internaute`) REFERENCES `internaute` (`idu`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
