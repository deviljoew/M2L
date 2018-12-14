-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 14 Décembre 2018 à 21:58
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `m2l`
--

-- --------------------------------------------------------

--
-- Structure de la table `adherents`
--

CREATE TABLE IF NOT EXISTS `adherents` (
  `NUMERO_LICENCE` bigint(12) NOT NULL DEFAULT '0',
  `NUM_CLUB` char(3) NOT NULL,
  `NOM` varchar(50) DEFAULT NULL,
  `PRENOM` varchar(50) DEFAULT NULL,
  `SEXE` char(1) DEFAULT NULL,
  `RUE` char(32) DEFAULT NULL,
  `CP` int(5) DEFAULT NULL,
  `VILLE` char(32) DEFAULT NULL,
  `DATEN` date DEFAULT NULL,
  PRIMARY KEY (`NUMERO_LICENCE`),
  KEY `I_FK_ADHERENTS_CLUBS` (`NUM_CLUB`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `adherents`
--

INSERT INTO `adherents` (`NUMERO_LICENCE`, `NUM_CLUB`, `NOM`, `PRENOM`, `SEXE`, `RUE`, `CP`, `VILLE`, `DATEN`) VALUES
(170540010340, '002', 'BERBIER', 'LUCILLE', 'F', '12 rue de Marron', 54600, 'Villers lès Nancy', '1998-07-26'),
(170540010443, '001', 'BANDILELLA', 'CLEMENT', 'M', '30 rue Widric 1er', 54600, 'Villers lès Nancy', '1998-03-24'),
(170540050444, '002', 'Lagarde', 'Dylan', 'M', 'Balard', 31325, 'Lafon', '2018-11-23');

-- --------------------------------------------------------

--
-- Structure de la table `clubs`
--

CREATE TABLE IF NOT EXISTS `clubs` (
  `NUM_CLUB` char(3) NOT NULL,
  `NUM_LIGUE` bigint(4) NOT NULL DEFAULT '0',
  `NOM` char(32) DEFAULT NULL,
  `RUE` char(32) DEFAULT NULL,
  `CP` int(5) DEFAULT NULL,
  `VILLE` char(32) DEFAULT NULL,
  PRIMARY KEY (`NUM_CLUB`),
  KEY `I_FK_CLUBS_LIGUES` (`NUM_LIGUE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `clubs`
--

INSERT INTO `clubs` (`NUM_CLUB`, `NUM_LIGUE`, `NOM`, `RUE`, `CP`, `VILLE`) VALUES
('001', 1, 'Club de football', '94 boulevard de la marquette', 31000, 'Toulouse'),
('002', 1, 'Club de golf', '27 avenue jean moulin', 31320, 'Muret');

-- --------------------------------------------------------

--
-- Structure de la table `demandeurs`
--

CREATE TABLE IF NOT EXISTS `demandeurs` (
  `ADRESSE_MAIL` varchar(50) NOT NULL,
  `NOM` varchar(50) DEFAULT NULL,
  `PRENOM` varchar(50) DEFAULT NULL,
  `RUE` varchar(50) DEFAULT NULL,
  `CP` varchar(50) DEFAULT NULL,
  `VILLE` varchar(50) DEFAULT NULL,
  `NUM_RECU` bigint(4) DEFAULT '0',
  `MDP` char(32) DEFAULT NULL,
  `SEXE` char(1) DEFAULT NULL,
  `DATEN` date DEFAULT NULL,
  PRIMARY KEY (`ADRESSE_MAIL`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `demandeurs`
--

INSERT INTO `demandeurs` (`ADRESSE_MAIL`, `NOM`, `PRENOM`, `RUE`, `CP`, `VILLE`, `NUM_RECU`, `MDP`, `SEXE`, `DATEN`) VALUES
('fesfes@fes', 'BERBIER', 'LUCILLE', '12 rue de Marron', '54600', 'Villers lès Nancy', 0, '12', 'F', '1998-07-26'),
('gibi@gmail.com', 'Gibi', 'Eva', '15 brue Alberti Damien', '31000', 'Toulouse', 0, '5t9xt556', 'F', '2018-12-11'),
('lagarde@gmail.com', 'Lagarde', 'Dylan', 'Balard', '31325', 'Lafon', 0, '1234', 'M', '2018-11-23'),
('sylviecortacero@orange.fr', 'CORTACERO', 'Sylvie', '27 Avenue Jean Moulin', '31320', 'Castanet-Tolosan', 0, 'Caline31', 'F', '1968-05-14');

-- --------------------------------------------------------

--
-- Structure de la table `lien`
--

CREATE TABLE IF NOT EXISTS `lien` (
  `NUMERO_LICENCE` bigint(4) NOT NULL DEFAULT '0',
  `ADRESSE_MAIL` varchar(50) NOT NULL,
  PRIMARY KEY (`NUMERO_LICENCE`,`ADRESSE_MAIL`),
  KEY `I_FK_LIEN_ADHERENTS` (`NUMERO_LICENCE`),
  KEY `I_FK_LIEN_DEMANDEURS` (`ADRESSE_MAIL`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `lien`
--

INSERT INTO `lien` (`NUMERO_LICENCE`, `ADRESSE_MAIL`) VALUES
(170540010340, 'fesfes@fes'),
(170540050444, 'lagarde@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `lignes_frais`
--

CREATE TABLE IF NOT EXISTS `lignes_frais` (
  `ADRESSE_MAIL` varchar(50) NOT NULL,
  `DATE` datetime NOT NULL,
  `LIBELLE` varchar(50) DEFAULT NULL,
  `TRAJET` varchar(50) DEFAULT NULL,
  `KM` bigint(4) DEFAULT '0',
  `COUT_PEAGE` bigint(4) DEFAULT '0',
  `COUT_REPAS` bigint(4) DEFAULT '0',
  `COUT_HEBERGEMENT` bigint(4) DEFAULT '0',
  `valider` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ADRESSE_MAIL`,`DATE`),
  KEY `I_FK_LIGNES_FRAIS_MOTIFS` (`LIBELLE`),
  KEY `I_FK_LIGNES_FRAIS_DEMANDEURS` (`ADRESSE_MAIL`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `lignes_frais`
--

INSERT INTO `lignes_frais` (`ADRESSE_MAIL`, `DATE`, `LIBELLE`, `TRAJET`, `KM`, `COUT_PEAGE`, `COUT_REPAS`, `COUT_HEBERGEMENT`, `valider`) VALUES
('fesfes@es', '2018-08-29 00:00:00', 'Réunion', 'fsdf', 5, 4, 5, 7, 0),
('lagarde@gmail.com', '2012-12-10 00:00:00', 'Compétition internationale', 'jioj', 8, 6, 1, 2, 1),
('lagarde@gmail.com', '2014-12-07 00:00:00', 'Compétition internationale', 'jioj', 8, 1, 1, 2, 1),
('lagarde@gmail.com', '2018-12-05 00:00:00', 'Compétition nationale', 'Paris_Lyon', 300, 52, 80, 100, 0),
('lagarde@gmail.com', '2018-12-18 00:00:00', 'Réunion', 'vcd', 25, 24, 25, 36, 0),
('sylviecortacero@orange.fr', '2018-11-28 00:00:00', 'compétition régionale', 'Toulouse_Paris', 700, 29, 20, 50, 1),
('sylviecortacero@orange.fr', '2018-12-11 00:00:00', 'Stage', 'Limoges_Paris', 700, 100, 150, 100, 1);

-- --------------------------------------------------------

--
-- Structure de la table `ligues`
--

CREATE TABLE IF NOT EXISTS `ligues` (
  `NUM_LIGUE` bigint(4) NOT NULL DEFAULT '0',
  `OBJET` varchar(50) DEFAULT NULL,
  `SIGLE` varchar(50) DEFAULT NULL,
  `PRESIDENT` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`NUM_LIGUE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `ligues`
--

INSERT INTO `ligues` (`NUM_LIGUE`, `OBJET`, `SIGLE`, `PRESIDENT`) VALUES
(1, 'Ligue de lorraine', 'ldl', 'macron');

-- --------------------------------------------------------

--
-- Structure de la table `motifs`
--

CREATE TABLE IF NOT EXISTS `motifs` (
  `LIBELLE` varchar(50) NOT NULL,
  PRIMARY KEY (`LIBELLE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `motifs`
--

INSERT INTO `motifs` (`LIBELLE`) VALUES
('Compétition internationale'),
('Compétition nationale'),
('Compétition régionale'),
('Réunion'),
('Stage');

-- --------------------------------------------------------

--
-- Structure de la table `tresorier`
--

CREATE TABLE IF NOT EXISTS `tresorier` (
  `ADRESSE_MAIL` varchar(45) NOT NULL,
  `NUMERO_LICENCE` bigint(4) NOT NULL DEFAULT '0',
  `MDP` char(32) DEFAULT NULL,
  `tarifKM` float NOT NULL,
  PRIMARY KEY (`ADRESSE_MAIL`),
  KEY `I_FK_TRESORIER_ADHERENTS` (`NUMERO_LICENCE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `tresorier`
--

INSERT INTO `tresorier` (`ADRESSE_MAIL`, `NUMERO_LICENCE`, `MDP`, `tarifKM`) VALUES
('estelle@gmail.com', 170540010340, '1234', 0.27);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `clubs`
--
ALTER TABLE `clubs`
  ADD CONSTRAINT `clubs_ibfk_1` FOREIGN KEY (`NUM_CLUB`) REFERENCES `adherents` (`NUM_CLUB`);

--
-- Contraintes pour la table `lien`
--
ALTER TABLE `lien`
  ADD CONSTRAINT `lien_ibfk_1` FOREIGN KEY (`ADRESSE_MAIL`) REFERENCES `demandeurs` (`ADRESSE_MAIL`),
  ADD CONSTRAINT `lien_ibfk_2` FOREIGN KEY (`NUMERO_LICENCE`) REFERENCES `adherents` (`NUMERO_LICENCE`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
