-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 17 avr. 2020 à 13:46
-- Version du serveur :  8.0.18
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet`
--

-- --------------------------------------------------------

--
-- Structure de la table `acheteur`
--

DROP TABLE IF EXISTS `acheteur`;
CREATE TABLE IF NOT EXISTS `acheteur` (
  `Id_acheteur` int(11) NOT NULL AUTO_INCREMENT,
  `Email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Mot de passe` varchar(255) NOT NULL,
  `Nom et prénom` varchar(255) NOT NULL,
  `Adresse` varchar(255) NOT NULL,
  `Numéro de téléphone` varchar(255) NOT NULL,
  PRIMARY KEY (`Id_acheteur`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `acheteur`
--

INSERT INTO `acheteur` (`Id_acheteur`, `Email`, `Mot de passe`, `Nom et prénom`, `Adresse`, `Numéro de téléphone`) VALUES
(1, 'linaelallem@gmail.com', 'lina123', 'El allem Lina', '21 rue de la montagne', '0767782084'),
(2, 'aissatou@gmail.com', 'aissatou123', 'Thiam Aissatou', '21 boulevard de l\'esperou', '0778902030'),
(3, 'taha@gmail.com', 'taha123', 'Taha Med', '20 rue de cauchy', '0720304050');

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `Email` varchar(255) NOT NULL,
  `Mot de passe` varchar(255) NOT NULL,
  PRIMARY KEY (`Email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`Email`, `Mot de passe`) VALUES
('amarcherrif@gmail.com', 'amar123');

-- --------------------------------------------------------

--
-- Structure de la table `carte bancaire`
--

DROP TABLE IF EXISTS `carte bancaire`;
CREATE TABLE IF NOT EXISTS `carte bancaire` (
  `Numero de carte` varchar(255) NOT NULL,
  `Nom sur carte` varchar(255) NOT NULL,
  `Date expiration` date NOT NULL,
  `Code sécurité` int(11) NOT NULL,
  PRIMARY KEY (`Numero de carte`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `enchere`
--

DROP TABLE IF EXISTS `enchere`;
CREATE TABLE IF NOT EXISTS `enchere` (
  `Id_enchere` int(11) NOT NULL AUTO_INCREMENT,
  `Id_item` int(11) NOT NULL,
  `Prixsuggere` int(11) NOT NULL,
  `Id_acheteur` int(11) NOT NULL,
  PRIMARY KEY (`Id_enchere`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE IF NOT EXISTS `item` (
  `Id_item` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Categorie` varchar(255) NOT NULL,
  `Type_achat` varchar(255) NOT NULL,
  `Prix` int(11) NOT NULL,
  `Photo` varchar(255) NOT NULL,
  `Id_vendeur` int(11) NOT NULL,
  PRIMARY KEY (`Id_item`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

DROP TABLE IF EXISTS `panier`;
CREATE TABLE IF NOT EXISTS `panier` (
  `Id_acheteur` int(11) NOT NULL,
  `Id_item` int(11) NOT NULL,
  `Prix` int(11) NOT NULL,
  PRIMARY KEY (`Id_acheteur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `vendeur`
--

DROP TABLE IF EXISTS `vendeur`;
CREATE TABLE IF NOT EXISTS `vendeur` (
  `Pseudo` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `Photo` varchar(255) NOT NULL,
  `Image de fond` varchar(255) NOT NULL,
  PRIMARY KEY (`Pseudo`,`Email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `vendeur`
--

INSERT INTO `vendeur` (`Pseudo`, `Email`, `Nom`, `Photo`, `Image de fond`) VALUES
('', '', '', '', 'element.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
