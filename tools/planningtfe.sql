-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 09 sep. 2022 à 18:26
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
(1, 'testUSERNAME', 'test@test.test', '$2y$10$SNuKUct6l0sRcky87vFOdevwMqIV3.8Qly2w.KtbH/coOLEgiBU4W', 'Pipart', 'Denis', '474aed66d2f8348d.1662712440', '2022-09-09 10:34:00', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `ecole`
--

DROP TABLE IF EXISTS `ecole`;
CREATE TABLE IF NOT EXISTS `ecole` (
  `pk` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `adresse` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`pk`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ecole`
--

INSERT INTO `ecole` (`pk`, `nom`, `adresse`) VALUES
(2, 'L\'Ã©cole du Bonheur', 'Rue du bonheur 66'),
(3, 'Institut Saint Jean Baptiste', 'Rue Matagne 1'),
(4, 'L\'Ã®le aux trÃ©sors', 'Avenue des moussons 5');

-- --------------------------------------------------------

--
-- Structure de la table `enfant`
--

DROP TABLE IF EXISTS `enfant`;
CREATE TABLE IF NOT EXISTS `enfant` (
  `pk` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
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
(4, 'Baivier', 'Arthur', 2, 6, 46),
(5, 'Pipart', 'Denis', 3, 5, 45),
(6, 'Dupuit', 'Bruno', 2, 6, 40),
(7, 'Liesse', 'Laura', 4, 7, 39),
(8, 'Dupont', 'Abdel', 2, 6, 42),
(9, 'Baivier', 'Sacha', 3, 5, 43);

-- --------------------------------------------------------

--
-- Structure de la table `planning`
--

DROP TABLE IF EXISTS `planning`;
CREATE TABLE IF NOT EXISTS `planning` (
  `pk` int(11) NOT NULL AUTO_INCREMENT,
  `lundi` varchar(50) NOT NULL,
  `mardi` varchar(50) NOT NULL,
  `mercredi` varchar(50) NOT NULL,
  `jeudi` varchar(50) NOT NULL,
  `vendredi` varchar(50) NOT NULL,
  PRIMARY KEY (`pk`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `planning`
--

INSERT INTO `planning` (`pk`, `lundi`, `mardi`, `mercredi`, `jeudi`, `vendredi`) VALUES
(39, 'false,true,false,false,true,true', 'true,true,false,false,true,true', 'true,true,false,false', 'false,false,true,true,true,true', 'true,true,false,false,false,false'),
(40, 'false,false,false,false,true,true', 'true,true,true,false,false,false', 'false,false,false,false', 'false,false,true,false,false,true', 'true,false,false,true,false,false'),
(42, 'false,true,false,true,true,false', 'true,false,true,true,true,true', 'false,true,true,false', 'true,true,false,false,true,true', 'false,true,true,false,false,true'),
(43, 'true,true,true,true,true,true', 'true,true,true,true,true,true', 'true,true,false,true', 'true,true,true,true,true,false', 'true,false,true,true,true,true'),
(45, 'false,false,true,true,false,true', 'true,true,false,true,true,false', 'true,true,true,true', 'false,false,false,true,true,false', 'false,true,false,false,false,false'),
(46, 'true,true,true,true,true,true', 'true,true,true,true,true,true', 'true,true,true,true', 'true,true,true,true,true,true', 'true,true,true,true,true,true');

-- --------------------------------------------------------

--
-- Structure de la table `semainier`
--

DROP TABLE IF EXISTS `semainier`;
CREATE TABLE IF NOT EXISTS `semainier` (
  `pk` int(11) NOT NULL AUTO_INCREMENT,
  `lundi` varchar(50) NOT NULL,
  `mardi` varchar(50) NOT NULL,
  `mercredi` varchar(50) NOT NULL,
  `jeudi` varchar(50) NOT NULL,
  `vendredi` varchar(50) NOT NULL,
  `planningupdated` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`pk`)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `titulaire`
--

DROP TABLE IF EXISTS `titulaire`;
CREATE TABLE IF NOT EXISTS `titulaire` (
  `pk` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `ecole_id` int(11) NOT NULL,
  PRIMARY KEY (`pk`),
  KEY `ecole` (`ecole_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `titulaire`
--

INSERT INTO `titulaire` (`pk`, `nom`, `prenom`, `ecole_id`) VALUES
(5, 'Delvigne', 'Corentin', 2),
(6, 'Raskin', 'Nicolas', 3),
(7, 'Dekimpe', 'FranÃ§ois', 4);

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
