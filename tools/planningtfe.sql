-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 15, 2022 at 08:39 AM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `planningtfe`
--

-- --------------------------------------------------------

--
-- Table structure for table `aidepeda`
--

CREATE TABLE `aidepeda` (
  `pk` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `session_token` varchar(255) DEFAULT NULL,
  `lastlog` varchar(255) DEFAULT NULL,
  `semainier_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aidepeda`
--

INSERT INTO `aidepeda` (`pk`, `username`, `email`, `password`, `nom`, `prenom`, `session_token`, `lastlog`, `semainier_id`) VALUES
(1, 'testUSERNAME', 'test@test.test', '$2y$10$SNuKUct6l0sRcky87vFOdevwMqIV3.8Qly2w.KtbH/coOLEgiBU4W', 'Pipart', 'Denis', 'f3360e8e90680ccd.1660550917', '2022-08-15 10:08:37', 31);

-- --------------------------------------------------------

--
-- Table structure for table `ecole`
--

CREATE TABLE `ecole` (
  `pk` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `adresse` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ecole`
--

INSERT INTO `ecole` (`pk`, `nom`, `adresse`) VALUES
(2, 'L\'école du Bonheur', 'rue du bonheur 66, 1300 Wavre'),
(3, 'Institut Saint Jean Baptiste', 'Wavre');

-- --------------------------------------------------------

--
-- Table structure for table `enfant`
--

CREATE TABLE `enfant` (
  `pk` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `ecole_id` int(11) NOT NULL,
  `titulaire_id` int(11) NOT NULL,
  `planning_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `enfant`
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
-- Table structure for table `planning`
--

CREATE TABLE `planning` (
  `pk` int(11) NOT NULL,
  `lundi` varchar(255) NOT NULL,
  `mardi` varchar(255) NOT NULL,
  `mercredi` varchar(255) NOT NULL,
  `jeudi` varchar(255) NOT NULL,
  `vendredi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `planning`
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
-- Table structure for table `semainier`
--

CREATE TABLE `semainier` (
  `pk` int(11) NOT NULL,
  `lundi` varchar(255) NOT NULL,
  `mardi` varchar(255) NOT NULL,
  `mercredi` varchar(255) NOT NULL,
  `jeudi` varchar(255) NOT NULL,
  `vendredi` varchar(255) NOT NULL,
  `planningUpdated` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `semainier`
--

INSERT INTO `semainier` (`pk`, `lundi`, `mardi`, `mercredi`, `jeudi`, `vendredi`, `planningUpdated`) VALUES
(31, '5,5,4', '4,8,7', '6,6', '8,7, ', ' ,9,9', 1);

-- --------------------------------------------------------

--
-- Table structure for table `titulaire`
--

CREATE TABLE `titulaire` (
  `pk` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `ecole_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `titulaire`
--

INSERT INTO `titulaire` (`pk`, `nom`, `prenom`, `ecole_id`) VALUES
(5, 'Delvigne', 'Corentin', 2),
(6, 'Raskin', 'Nicolas', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aidepeda`
--
ALTER TABLE `aidepeda`
  ADD PRIMARY KEY (`pk`),
  ADD KEY `semainier_id` (`semainier_id`);

--
-- Indexes for table `ecole`
--
ALTER TABLE `ecole`
  ADD PRIMARY KEY (`pk`);

--
-- Indexes for table `enfant`
--
ALTER TABLE `enfant`
  ADD PRIMARY KEY (`pk`),
  ADD KEY `ecole_id` (`ecole_id`),
  ADD KEY `titulaire_id` (`titulaire_id`),
  ADD KEY `planning` (`planning_id`);

--
-- Indexes for table `planning`
--
ALTER TABLE `planning`
  ADD PRIMARY KEY (`pk`);

--
-- Indexes for table `semainier`
--
ALTER TABLE `semainier`
  ADD PRIMARY KEY (`pk`);

--
-- Indexes for table `titulaire`
--
ALTER TABLE `titulaire`
  ADD PRIMARY KEY (`pk`),
  ADD KEY `ecole` (`ecole_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aidepeda`
--
ALTER TABLE `aidepeda`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ecole`
--
ALTER TABLE `ecole`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `enfant`
--
ALTER TABLE `enfant`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `planning`
--
ALTER TABLE `planning`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `semainier`
--
ALTER TABLE `semainier`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `titulaire`
--
ALTER TABLE `titulaire`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aidepeda`
--
ALTER TABLE `aidepeda`
  ADD CONSTRAINT `aidepeda_ibfk_1` FOREIGN KEY (`semainier_id`) REFERENCES `semainier` (`pk`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `enfant`
--
ALTER TABLE `enfant`
  ADD CONSTRAINT `enfant_ibfk_1` FOREIGN KEY (`ecole_id`) REFERENCES `ecole` (`pk`),
  ADD CONSTRAINT `enfant_ibfk_2` FOREIGN KEY (`titulaire_id`) REFERENCES `titulaire` (`pk`),
  ADD CONSTRAINT `enfant_ibfk_3` FOREIGN KEY (`planning_id`) REFERENCES `planning` (`pk`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `titulaire`
--
ALTER TABLE `titulaire`
  ADD CONSTRAINT `titulaire_ibfk_1` FOREIGN KEY (`ecole_id`) REFERENCES `ecole` (`pk`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
