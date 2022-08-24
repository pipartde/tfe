-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 24 août 2022 à 13:37
-- Version du serveur : 5.7.36
-- Version de PHP : 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `planningtfe`
--

-- --------------------------------------------------------

--
-- Structure de la table `aidepeda`
--

DROP TABLE IF EXISTS `aidepeda`;
CREATE TABLE IF NOT EXISTS `aidepeda` (
  `pk` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `session_token` varchar(255) DEFAULT NULL,
  `lastlog` varchar(255) DEFAULT NULL,
  `semainier_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`pk`),
  KEY `semainier_id` (`semainier_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `aidepeda`
--

INSERT INTO `aidepeda` (`pk`, `username`, `email`, `password`, `nom`, `prenom`, `session_token`, `lastlog`, `semainier_id`) VALUES
(1, 'testUSERNAME', 'test@test.test', '$2y$10$SNuKUct6l0sRcky87vFOdevwMqIV3.8Qly2w.KtbH/coOLEgiBU4W', 'Pipart', 'Denis', 'e4e18d3235757c74.1661342844', '2022-08-24 14:07:24', 77);

-- --------------------------------------------------------

--
-- Structure de la table `ecole`
--

DROP TABLE IF EXISTS `ecole`;
CREATE TABLE IF NOT EXISTS `ecole` (
  `pk` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`pk`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ecole`
--

INSERT INTO `ecole` (`pk`, `nom`, `adresse`) VALUES
(2, 'L\'Ã©cole du Bonheur', 'rue du bonheur 66, 1300 Wavre'),
(3, 'Institut Saint Jean Baptiste', 'Wavre');

-- --------------------------------------------------------

--
-- Structure de la table `enfant`
--

DROP TABLE IF EXISTS `enfant`;
CREATE TABLE IF NOT EXISTS `enfant` (
  `pk` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `ecole_id` int(11) NOT NULL,
  `titulaire_id` int(11) NOT NULL,
  `planning_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`pk`),
  KEY `ecole_id` (`ecole_id`),
  KEY `titulaire_id` (`titulaire_id`),
  KEY `planning` (`planning_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `enfant`
--

INSERT INTO `enfant` (`pk`, `nom`, `prenom`, `ecole_id`, `titulaire_id`, `planning_id`) VALUES
(4, 'Baivier', 'Arthur', 2, 6, 41),
(5, 'Pipart', 'Denis', 3, 5, 31),
(6, 'Dupuit', 'Bruno', 2, 6, 40),
(7, 'Liesse', 'Laura', 2, 6, 39),
(8, 'Dupont', 'Abdel', 2, 6, 42),
(9, 'Baivier', 'Sacha', 2, 5, 43);

-- --------------------------------------------------------

--
-- Structure de la table `planning`
--

DROP TABLE IF EXISTS `planning`;
CREATE TABLE IF NOT EXISTS `planning` (
  `pk` int(11) NOT NULL AUTO_INCREMENT,
  `lundi` varchar(255) NOT NULL,
  `mardi` varchar(255) NOT NULL,
  `mercredi` varchar(255) NOT NULL,
  `jeudi` varchar(255) NOT NULL,
  `vendredi` varchar(255) NOT NULL,
  PRIMARY KEY (`pk`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `planning`
--

INSERT INTO `planning` (`pk`, `lundi`, `mardi`, `mercredi`, `jeudi`, `vendredi`) VALUES
(31, 'true,true,true,true,false,false', 'false,false,true,false,false,false', 'false,true,true,true', 'true,true,false,false,false,false', 'false,false,true,true,true,true'),
(39, 'true,true,false,false,true,true', 'true,true,false,false,true,true', 'true,true,false,false', 'false,false,true,true,true,true', 'true,true,false,false,true,true'),
(40, 'false,false,false,false,true,true', 'true,true,true,false,false,false', 'true,true,true,true', 'true,true,true,false,false,true', 'true,false,false,true,true,true'),
(41, 'true,false,false,true,true,true', 'true,true,false,true,true,true', 'true,false,false,true', 'true,true,false,false,true,true', 'true,true,false,false,false,false'),
(42, 'false,true,false,true,true,false', 'true,false,true,true,true,true', 'false,true,true,false', 'true,true,false,false,true,true', 'false,true,true,false,false,true'),
(43, 'true,true,true,true,true,true', 'true,true,true,true,true,true', 'true,true,false,true', 'true,true,true,true,true,false', 'true,false,true,true,true,true');

-- --------------------------------------------------------

--
-- Structure de la table `semainier`
--

DROP TABLE IF EXISTS `semainier`;
CREATE TABLE IF NOT EXISTS `semainier` (
  `pk` int(11) NOT NULL AUTO_INCREMENT,
  `lundi` varchar(255) NOT NULL,
  `mardi` varchar(255) NOT NULL,
  `mercredi` varchar(255) NOT NULL,
  `jeudi` varchar(255) NOT NULL,
  `vendredi` varchar(255) NOT NULL,
  `planningupdated` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`pk`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `semainier`
--

INSERT INTO `semainier` (`pk`, `lundi`, `mardi`, `mercredi`, `jeudi`, `vendredi`, `planningupdated`) VALUES
(77, '5,5,4', '4,8,8', '6,6', '9,7,7', 'off,9,off', 1);

-- --------------------------------------------------------

--
-- Structure de la table `titulaire`
--

DROP TABLE IF EXISTS `titulaire`;
CREATE TABLE IF NOT EXISTS `titulaire` (
  `pk` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `ecole_id` int(11) NOT NULL,
  PRIMARY KEY (`pk`),
  KEY `ecole` (`ecole_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `titulaire`
--

INSERT INTO `titulaire` (`pk`, `nom`, `prenom`, `ecole_id`) VALUES
(5, 'Delvigne', 'Corentin', 2),
(6, 'Raskin', 'Nicolas', 3);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `aidepeda`
--
ALTER TABLE `aidepeda`
  ADD CONSTRAINT `aidepeda_ibfk_1` FOREIGN KEY (`semainier_id`) REFERENCES `semainier` (`pk`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Contraintes pour la table `enfant`
--
ALTER TABLE `enfant`
  ADD CONSTRAINT `enfant_ibfk_1` FOREIGN KEY (`ecole_id`) REFERENCES `ecole` (`pk`),
  ADD CONSTRAINT `enfant_ibfk_2` FOREIGN KEY (`titulaire_id`) REFERENCES `titulaire` (`pk`),
  ADD CONSTRAINT `enfant_ibfk_3` FOREIGN KEY (`planning_id`) REFERENCES `planning` (`pk`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `titulaire`
--
ALTER TABLE `titulaire`
  ADD CONSTRAINT `titulaire_ibfk_1` FOREIGN KEY (`ecole_id`) REFERENCES `ecole` (`pk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
