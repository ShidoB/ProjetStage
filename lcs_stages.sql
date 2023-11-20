-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3307
-- Généré le : sam. 18 fév. 2023 à 13:22
-- Version du serveur : 10.5.13-MariaDB
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `lcs_stages`
--
CREATE DATABASE IF NOT EXISTS `lcs_stages` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `lcs_stages`;

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idUser` (`idUser`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `idUser`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

DROP TABLE IF EXISTS `etudiant`;
CREATE TABLE IF NOT EXISTS `etudiant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `option` char(4) DEFAULT NULL,
  `tel` varchar(50) DEFAULT NULL,
  `mail` varchar(50) DEFAULT NULL,
  `anneeExam` year(4) DEFAULT NULL,
  `idUser` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idUser` (`idUser`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`id`, `nom`, `prenom`, `option`, `tel`, `mail`, `anneeExam`, `idUser`) VALUES
(1, 'Deshorties', 'Matthéo', 'SLAM', NULL, NULL, 2023, 3),
(2, 'Deshorties', 'Joshua', 'SISR', NULL, NULL, 2023, 5);

-- --------------------------------------------------------

--
-- Structure de la table `niveau`
--

DROP TABLE IF EXISTS `niveau`;
CREATE TABLE IF NOT EXISTS `niveau` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` char(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `organisation`
--

DROP TABLE IF EXISTS `organisation`;
CREATE TABLE IF NOT EXISTS `organisation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) DEFAULT NULL,
  `siret` varchar(100) DEFAULT NULL,
  `ape` varchar(50) DEFAULT NULL,
  `secteurActivite` varchar(50) DEFAULT NULL,
  `adr` varchar(50) DEFAULT NULL,
  `cP` int(5) DEFAULT NULL,
  `ville` varchar(50) DEFAULT NULL,
  `pays` varchar(50) DEFAULT NULL,
  `tel` varchar(10) DEFAULT NULL,
  `mail` varchar(50) DEFAULT NULL,
  `commentaire` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `siret` (`siret`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `pdfentities`
--

DROP TABLE IF EXISTS `pdfentities`;
CREATE TABLE IF NOT EXISTS `pdfentities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `conventionViergePDF` mediumblob DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `periode`
--

DROP TABLE IF EXISTS `periode`;
CREATE TABLE IF NOT EXISTS `periode` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dateDebut` date DEFAULT NULL,
  `dateFin` date DEFAULT NULL,
  `niveau` char(4) DEFAULT NULL,
  `idNiv` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idNiv` (`idNiv`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `professeur`
--

DROP TABLE IF EXISTS `professeur`;
CREATE TABLE IF NOT EXISTS `professeur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `matiere` varchar(50) DEFAULT NULL,
  `idUser` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `professeur`
--

INSERT INTO `professeur` (`id`, `nom`, `prenom`, `matiere`, `idUser`) VALUES
(1, 'L&#39;Helguen', 'Hervé', 'Developpement', 4);

-- --------------------------------------------------------

--
-- Structure de la table `stage`
--

DROP TABLE IF EXISTS `stage`;
CREATE TABLE IF NOT EXISTS `stage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `maitreStage` varchar(50) DEFAULT NULL,
  `profRef` varchar(50) DEFAULT NULL,
  `telMaitreStage` varchar(50) DEFAULT NULL,
  `mailMaitreStage` varchar(50) DEFAULT NULL,
  `descriptionStage` varchar(250) DEFAULT NULL,
  `commentMaitreStage` varchar(250) DEFAULT NULL,
  `adr` varchar(50) DEFAULT NULL,
  `cP` int(5) DEFAULT NULL,
  `ville` varchar(50) DEFAULT NULL,
  `pays` varchar(50) DEFAULT NULL,
  `conventionElevePDF` mediumblob DEFAULT NULL,
  `idEtudiant` int(11) NOT NULL,
  `idProf` int(11) NOT NULL,
  `idOrga` int(11) NOT NULL,
  `idPeriode` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_1` (`idEtudiant`),
  KEY `id_2` (`idProf`),
  KEY `id_3` (`idOrga`),
  KEY `id_4` (`idPeriode`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(50) NOT NULL,
  `mdp` varchar(250) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `login`, `mdp`) VALUES
(1, 'lcs-admin', '$2y$10$zbk2D0.LhpZOvqKLp93rI.YMhPy3EVKtSRWbGIUuvCvKvufmZkI56'),
(2, 'd.duma', '$2y$10$f29onR.EBvhjRHtu47PIc.zuCCJA203pImyVaUzrZcAoNugbXhqEu'),
(3, 'm.deshorties', '$2y$10$LyXIh56U7l8TS/NWw2z8o.fi14UTEX6VjbRU9YSn.MLk73hhU4y1y'),
(4, 'h.lhelguen', '$2y$10$E0BXYokKfCcJpFhDM.t36ukTiSrsNpQgBdoz8Bf0/9r/PRXFAiq6G'),
(5, 'j.deshorties', '$2y$10$aSElwlKKe/4cv3LrLxBh5eoMOiNyO7WavRGlF3FsfMt2gXSor1Ava');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
