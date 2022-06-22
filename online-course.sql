-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 20, 2022 at 06:52 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online-course`
--

-- --------------------------------------------------------

--
-- Table structure for table `cours`
--

DROP TABLE IF EXISTS `cours`;
CREATE TABLE IF NOT EXISTS `cours` (
  `idcours` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(45) NOT NULL,
  `description` varchar(300) NOT NULL,
  `enseignant_idenseignant` int(11) DEFAULT NULL,
  PRIMARY KEY (`idcours`),
  KEY `fk_cours_enseignant1_idx` (`enseignant_idenseignant`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cours`
--

INSERT INTO `cours` (`idcours`, `titre`, `description`, `enseignant_idenseignant`) VALUES
(1, 'Programmation Web avancées', 'Cours portant sur la programmation orientée objet avec PHP. Introduction au patron de conception utile en Web pour le traitement des requêtes HTTP.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cours_has_groupe`
--

DROP TABLE IF EXISTS `cours_has_groupe`;
CREATE TABLE IF NOT EXISTS `cours_has_groupe` (
  `cours_idcours` int(11) NOT NULL,
  `groupe_idgroupe` int(11) NOT NULL,
  PRIMARY KEY (`cours_idcours`,`groupe_idgroupe`),
  KEY `fk_cours_has_groupe_groupe1_idx` (`groupe_idgroupe`),
  KEY `fk_cours_has_groupe_cours1_idx` (`cours_idcours`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cours_has_groupe`
--

INSERT INTO `cours_has_groupe` (`cours_idcours`, `groupe_idgroupe`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `enseignant`
--

DROP TABLE IF EXISTS `enseignant`;
CREATE TABLE IF NOT EXISTS `enseignant` (
  `idenseignant` int(11) NOT NULL AUTO_INCREMENT,
  `prenom` varchar(30) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `courriel` varchar(100) NOT NULL,
  PRIMARY KEY (`idenseignant`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `enseignant`
--

INSERT INTO `enseignant` (`idenseignant`, `prenom`, `nom`, `phone`, `courriel`) VALUES
(1, 'Marcos', 'Sanches', '111-111-1111', 'marcosSanches@cmaisonneuve.qc.ca'),
(2, 'Guillaume', 'Harvey', '222-222-2222', 'guillaumeHarvey@cmaisonneuve.qc.ca\r\n'),
(3, 'Simon ', 'Côté-Bouchard', '333-333-3333', 'simonCote@cmaisonneuve.qc.ca'),
(4, 'Marc-André', 'Charpentier', '444-444-4444', 'marcChaprentier@cmaisonneuve.qc.ca');

-- --------------------------------------------------------

--
-- Table structure for table `etudiant`
--

DROP TABLE IF EXISTS `etudiant`;
CREATE TABLE IF NOT EXISTS `etudiant` (
  `idetudiant` int(11) NOT NULL AUTO_INCREMENT,
  `prenom` varchar(30) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `courriel` varchar(100) NOT NULL,
  `groupe_idgroupe` int(11) DEFAULT NULL,
  PRIMARY KEY (`idetudiant`),
  KEY `fk_etudiant_groupe_idx` (`groupe_idgroupe`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `etudiant`
--

INSERT INTO `etudiant` (`idetudiant`, `prenom`, `nom`, `phone`, `courriel`, `groupe_idgroupe`) VALUES
(1, 'Jane', 'Kim', '131-232-5252', 'janeKim@cmaisonneuve.qc.ca', 1),
(2, 'Lila', 'Perron', '225-433-2019', 'lilaPerron@cmaisonneuve.qc.ca', 1),
(3, 'aaa', 'bbb', 'ccc', 'ddd', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `groupe`
--

DROP TABLE IF EXISTS `groupe`;
CREATE TABLE IF NOT EXISTS `groupe` (
  `idgroupe` int(11) NOT NULL,
  `nom` varchar(45) NOT NULL,
  PRIMARY KEY (`idgroupe`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groupe`
--

INSERT INTO `groupe` (`idgroupe`, `nom`) VALUES
(1, '21906');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cours`
--
ALTER TABLE `cours`
  ADD CONSTRAINT `fk_cours_enseignant1` FOREIGN KEY (`enseignant_idenseignant`) REFERENCES `enseignant` (`idenseignant`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `cours_has_groupe`
--
ALTER TABLE `cours_has_groupe`
  ADD CONSTRAINT `fk_cours_has_groupe_cours1` FOREIGN KEY (`cours_idcours`) REFERENCES `cours` (`idcours`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cours_has_groupe_groupe1` FOREIGN KEY (`groupe_idgroupe`) REFERENCES `groupe` (`idgroupe`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `etudiant`
--
ALTER TABLE `etudiant`
  ADD CONSTRAINT `fk_etudiant_groupe` FOREIGN KEY (`groupe_idgroupe`) REFERENCES `groupe` (`idgroupe`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
