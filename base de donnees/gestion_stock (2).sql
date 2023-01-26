-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 22 déc. 2021 à 08:29
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion_stock`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id_categorie` int(11) NOT NULL AUTO_INCREMENT,
  `categorie` varchar(255) NOT NULL,
  PRIMARY KEY (`id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `categorie`) VALUES
(1, 'brut'),
(2, 'finis');

-- --------------------------------------------------------

--
-- Structure de la table `designation`
--

DROP TABLE IF EXISTS `designation`;
CREATE TABLE IF NOT EXISTS `designation` (
  `id_designation` int(11) NOT NULL AUTO_INCREMENT,
  `designation` varchar(255) NOT NULL,
  PRIMARY KEY (`id_designation`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `designation`
--

INSERT INTO `designation` (`id_designation`, `designation`) VALUES
(1, 'restauration'),
(2, 'chambre'),
(3, 'entretient');

-- --------------------------------------------------------

--
-- Structure de la table `journal_entrer`
--

DROP TABLE IF EXISTS `journal_entrer`;
CREATE TABLE IF NOT EXISTS `journal_entrer` (
  `id_prod` int(11) NOT NULL AUTO_INCREMENT,
  `date_prod` datetime NOT NULL,
  `nom_prod` varchar(30) NOT NULL,
  `quantite_prod` int(11) NOT NULL,
  `prix_unit_prod` int(11) NOT NULL,
  `valeur_prod` int(11) NOT NULL,
  `seuil_prod` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `id_designation` int(11) NOT NULL,
  `libellee` text NOT NULL,
  PRIMARY KEY (`id_prod`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `journal_sortie`
--

DROP TABLE IF EXISTS `journal_sortie`;
CREATE TABLE IF NOT EXISTS `journal_sortie` (
  `id_prod` int(11) NOT NULL AUTO_INCREMENT,
  `date_prod` varchar(255) NOT NULL,
  `nom_prod` varchar(30) NOT NULL,
  `quantite_prod` int(11) NOT NULL,
  `prix_unit_prod` int(11) NOT NULL,
  `valeur_prod` int(11) NOT NULL,
  `seuil_prod` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `id_designation` int(11) NOT NULL,
  `libellee` text NOT NULL,
  PRIMARY KEY (`id_prod`,`id_categorie`,`id_designation`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `mouvement`
--

DROP TABLE IF EXISTS `mouvement`;
CREATE TABLE IF NOT EXISTS `mouvement` (
  `id_mvt` int(11) NOT NULL AUTO_INCREMENT,
  `mvt` varchar(30) NOT NULL,
  PRIMARY KEY (`id_mvt`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `mouvement`
--

INSERT INTO `mouvement` (`id_mvt`, `mvt`) VALUES
(1, 'entrer'),
(2, 'sortir');

-- --------------------------------------------------------

--
-- Structure de la table `personnel`
--

DROP TABLE IF EXISTS `personnel`;
CREATE TABLE IF NOT EXISTS `personnel` (
  `id_l` int(11) NOT NULL AUTO_INCREMENT,
  `log` varchar(30) NOT NULL,
  `mdp` varchar(30) NOT NULL,
  PRIMARY KEY (`id_l`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `stock`
--

DROP TABLE IF EXISTS `stock`;
CREATE TABLE IF NOT EXISTS `stock` (
  `id_prod` int(11) NOT NULL AUTO_INCREMENT,
  `date_prod` date NOT NULL,
  `nom_prod` varchar(30) NOT NULL,
  `quantite_prod` int(11) NOT NULL,
  `prix_unit_prod` int(11) NOT NULL,
  `valeur_prod` int(11) NOT NULL,
  `seuil_prod` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `id_designation` int(11) NOT NULL,
  `libellee` text NOT NULL,
  PRIMARY KEY (`id_prod`,`id_categorie`,`id_designation`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
