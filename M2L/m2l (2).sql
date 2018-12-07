-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 06 déc. 2018 à 10:40
-- Version du serveur :  5.7.17
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `m2l`
--

-- --------------------------------------------------------

--
-- Structure de la table `adherents`
--

CREATE TABLE `adherents` (
  `NUMERO_LICENCE` bigint(12) NOT NULL DEFAULT '0',
  `NUM_CLUB` char(3) NOT NULL,
  `NOM` varchar(50) DEFAULT NULL,
  `PRENOM` varchar(50) DEFAULT NULL,
  `SEXE` char(1) DEFAULT NULL,
  `RUE` char(32) DEFAULT NULL,
  `CP` int(5) DEFAULT NULL,
  `VILLE` char(32) DEFAULT NULL,
  `DATEN` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `adherents`
--

INSERT INTO `adherents` (`NUMERO_LICENCE`, `NUM_CLUB`, `NOM`, `PRENOM`, `SEXE`, `RUE`, `CP`, `VILLE`, `DATEN`) VALUES
(170540010340, '002', 'BERBIER', 'LUCILLE', 'F', '12 rue de Marron', 54600, 'Villers lès Nancy', '1998-07-26'),
(170540010443, '001', 'BANDILELLA', 'CLEMENT', 'M', '30 rue Widric 1er', 54600, 'Villers lès Nancy', '1998-03-24'),
(170540050444, '002', 'Lagarde', 'Dylan', 'M', 'Balard', 31325, 'Lafon', '2018-11-23');

-- --------------------------------------------------------

--
-- Structure de la table `clubs`
--

CREATE TABLE `clubs` (
  `NUM_CLUB` char(3) NOT NULL,
  `NUM_LIGUE` bigint(4) NOT NULL DEFAULT '0',
  `NOM` char(32) DEFAULT NULL,
  `RUE` char(32) DEFAULT NULL,
  `CP` int(5) DEFAULT NULL,
  `VILLE` char(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `clubs`
--

INSERT INTO `clubs` (`NUM_CLUB`, `NUM_LIGUE`, `NOM`, `RUE`, `CP`, `VILLE`) VALUES
('001', 1, 'Club de football', '94 boulevard de la marquette', 31000, 'Toulouse'),
('002', 1, 'Club de golf', '27 avenue jean moulin', 31320, 'Muret');

-- --------------------------------------------------------

--
-- Structure de la table `demandeurs`
--

CREATE TABLE `demandeurs` (
  `ADRESSE_MAIL` varchar(50) NOT NULL,
  `NOM` varchar(50) DEFAULT NULL,
  `PRENOM` varchar(50) DEFAULT NULL,
  `RUE` varchar(50) DEFAULT NULL,
  `CP` varchar(50) DEFAULT NULL,
  `VILLE` varchar(50) DEFAULT NULL,
  `NUM_RECU` bigint(4) DEFAULT '0',
  `MDP` char(32) DEFAULT NULL,
  `SEXE` char(1) DEFAULT NULL,
  `DATEN` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `demandeurs`
--

INSERT INTO `demandeurs` (`ADRESSE_MAIL`, `NOM`, `PRENOM`, `RUE`, `CP`, `VILLE`, `NUM_RECU`, `MDP`, `SEXE`, `DATEN`) VALUES
('fesfes@fes', 'BERBIER', 'LUCILLE', '12 rue de Marron', '54600', 'Villers lès Nancy', 0, '12', 'F', '1998-07-26'),
('lagarde@gmail.com', 'Lagarde', 'Dylan', 'Balard', '31325', 'Lafon', 0, '1234', 'M', '2018-11-23');

-- --------------------------------------------------------

--
-- Structure de la table `lien`
--

CREATE TABLE `lien` (
  `NUMERO_LICENCE` bigint(4) NOT NULL DEFAULT '0',
  `ADRESSE_MAIL` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `lien`
--

INSERT INTO `lien` (`NUMERO_LICENCE`, `ADRESSE_MAIL`) VALUES
(170540010340, 'fesfes@fes'),
(170540050444, 'lagarde@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `lignes_frais`
--

CREATE TABLE `lignes_frais` (
  `ADRESSE_MAIL` varchar(50) NOT NULL,
  `DATE` datetime NOT NULL,
  `LIBELLE` varchar(50) DEFAULT NULL,
  `TRAJET` varchar(50) DEFAULT NULL,
  `KM` bigint(4) DEFAULT '0',
  `COUT_PEAGE` bigint(4) DEFAULT '0',
  `COUT_REPAS` bigint(4) DEFAULT '0',
  `COUT_HEBERGEMENT` bigint(4) DEFAULT '0',
  `valider` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `lignes_frais`
--

INSERT INTO `lignes_frais` (`ADRESSE_MAIL`, `DATE`, `LIBELLE`, `TRAJET`, `KM`, `COUT_PEAGE`, `COUT_REPAS`, `COUT_HEBERGEMENT`, `valider`) VALUES
('fesfes@es', '2018-08-29 00:00:00', 'Réunion', 'fsdf', 5, 4, 5, 7, 0),
('lagarde@gmail.com', '2012-12-10 00:00:00', 'Compétition internationale', 'jioj', 8, 6, 1, 2, 1),
('lagarde@gmail.com', '2014-12-07 00:00:00', 'Compétition internationale', 'jioj', 8, 1, 1, 2, 1),
('lagarde@gmail.com', '2018-12-05 00:00:00', 'Compétition nationale', 'Paris_Lyon', 300, 52, 80, 100, 0),
('lagarde@gmail.com', '2018-12-16 00:00:00', 'Compétition internationale', 'jioj', 8, 66, 1, 2, 0),
('lagarde@gmail.com', '2018-12-18 00:00:00', 'Réunion', 'vcd', 25, 24, 25, 36, 0);

-- --------------------------------------------------------

--
-- Structure de la table `ligues`
--

CREATE TABLE `ligues` (
  `NUM_LIGUE` bigint(4) NOT NULL DEFAULT '0',
  `OBJET` varchar(50) DEFAULT NULL,
  `SIGLE` varchar(50) DEFAULT NULL,
  `PRESIDENT` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ligues`
--

INSERT INTO `ligues` (`NUM_LIGUE`, `OBJET`, `SIGLE`, `PRESIDENT`) VALUES
(1, 'Ligue de lorraine', 'ldl', 'macron');

-- --------------------------------------------------------

--
-- Structure de la table `motifs`
--

CREATE TABLE `motifs` (
  `LIBELLE` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `motifs`
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

CREATE TABLE `tresorier` (
  `ADRESSE_MAIL` varchar(45) NOT NULL,
  `NUMERO_LICENCE` bigint(4) NOT NULL DEFAULT '0',
  `MDP` char(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tresorier`
--

INSERT INTO `tresorier` (`ADRESSE_MAIL`, `NUMERO_LICENCE`, `MDP`) VALUES
('estelle@gmail.com', 170540010340, '1234'),
('etoiledu65@gmail.com', 170540010443, '1234');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `adherents`
--
ALTER TABLE `adherents`
  ADD PRIMARY KEY (`NUMERO_LICENCE`),
  ADD KEY `I_FK_ADHERENTS_CLUBS` (`NUM_CLUB`);

--
-- Index pour la table `clubs`
--
ALTER TABLE `clubs`
  ADD PRIMARY KEY (`NUM_CLUB`),
  ADD KEY `I_FK_CLUBS_LIGUES` (`NUM_LIGUE`);

--
-- Index pour la table `demandeurs`
--
ALTER TABLE `demandeurs`
  ADD PRIMARY KEY (`ADRESSE_MAIL`);

--
-- Index pour la table `lien`
--
ALTER TABLE `lien`
  ADD PRIMARY KEY (`NUMERO_LICENCE`,`ADRESSE_MAIL`),
  ADD KEY `I_FK_LIEN_ADHERENTS` (`NUMERO_LICENCE`),
  ADD KEY `I_FK_LIEN_DEMANDEURS` (`ADRESSE_MAIL`);

--
-- Index pour la table `lignes_frais`
--
ALTER TABLE `lignes_frais`
  ADD PRIMARY KEY (`ADRESSE_MAIL`,`DATE`),
  ADD KEY `I_FK_LIGNES_FRAIS_MOTIFS` (`LIBELLE`),
  ADD KEY `I_FK_LIGNES_FRAIS_DEMANDEURS` (`ADRESSE_MAIL`);

--
-- Index pour la table `ligues`
--
ALTER TABLE `ligues`
  ADD PRIMARY KEY (`NUM_LIGUE`);

--
-- Index pour la table `motifs`
--
ALTER TABLE `motifs`
  ADD PRIMARY KEY (`LIBELLE`);

--
-- Index pour la table `tresorier`
--
ALTER TABLE `tresorier`
  ADD PRIMARY KEY (`ADRESSE_MAIL`),
  ADD KEY `I_FK_TRESORIER_ADHERENTS` (`NUMERO_LICENCE`);

--
-- Contraintes pour les tables déchargées
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

--
-- Contraintes pour la table `lignes_frais`
--
ALTER TABLE `lignes_frais`
  ADD CONSTRAINT `lignes_frais_ibfk_1` FOREIGN KEY (`ADRESSE_MAIL`) REFERENCES `demandeurs` (`ADRESSE_MAIL`),
  ADD CONSTRAINT `lignes_frais_ibfk_2` FOREIGN KEY (`LIBELLE`) REFERENCES `motifs` (`LIBELLE`);

--
-- Contraintes pour la table `ligues`
--
ALTER TABLE `ligues`
  ADD CONSTRAINT `ligues_ibfk_1` FOREIGN KEY (`NUM_LIGUE`) REFERENCES `clubs` (`NUM_LIGUE`);

--
-- Contraintes pour la table `tresorier`
--
ALTER TABLE `tresorier`
  ADD CONSTRAINT `tresorier_ibfk_1` FOREIGN KEY (`NUMERO_LICENCE`) REFERENCES `adherents` (`NUMERO_LICENCE`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
