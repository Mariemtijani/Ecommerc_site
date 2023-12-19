-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 12 juin 2023 à 12:07
-- Version du serveur : 5.7.40
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `electrostore`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id_cat` int(11) NOT NULL AUTO_INCREMENT,
  `nom_cat` varchar(30) NOT NULL,
  `descr` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_cat`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id_cat`, `nom_cat`, `descr`) VALUES
(1, 'phone', NULL),
(2, 'tablet', NULL),
(3, 'laptob', NULL),
(4, 'watch', NULL),
(5, 'headphone', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id_client` int(11) NOT NULL AUTO_INCREMENT,
  `nom_client` varchar(30) NOT NULL,
  `prenom_client` varchar(30) NOT NULL,
  `adr_client` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `num_tele` varchar(10) NOT NULL,
  `mot_passe` varchar(50) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `photo` varchar(100) NOT NULL,
  PRIMARY KEY (`id_client`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id_client`, `nom_client`, `prenom_client`, `adr_client`, `email`, `num_tele`, `mot_passe`, `user_name`, `photo`) VALUES
(1, 'yassine', 'elk', 'assilah', 'elkyassin@gmail.com', '0631074983', '1234', 'yassin', ''),
(2, 'yons', 'radi', 'assilah', 'radi@hmail.com', '0631074983', '12345', 'yons', ''),
(3, 'yassin', 'elk', 'assilah', 'elkyassin5555@gamil.com', '564165.230', '1234', 'admin', ''),
(4, 'yassin', 'elk', 'assilah', 'z3ama@gmail.com', '564165.230', '1234', 'admin', 'image/image4.jpg'),
(5, 'yassin', 'elk', 'assilah', 'elkyassin@gmail.comz', '564165.230', '123', 'admin', 'image/image4.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id_com` int(11) NOT NULL AUTO_INCREMENT,
  `date_com` date NOT NULL,
  `id_client` int(11) DEFAULT NULL,
  `items` int(11) DEFAULT NULL,
  `total` double DEFAULT NULL,
  `user_name` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_com`),
  KEY `id_client` (`id_client`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id_com`, `date_com`, `id_client`, `items`, `total`, `user_name`) VALUES
(1, '2023-04-12', NULL, 2, 1632, 'elkyassin@gmail.comz'),
(2, '2023-04-12', 5, 2, 2010, 'elkyassin@gmail.comz'),
(3, '2023-04-12', 5, 2, 2010, 'elkyassin@gmail.comz'),
(4, '2023-04-12', 5, 2, 2010, 'elkyassin@gmail.comz'),
(5, '2023-04-12', 5, 2, 2010, 'elkyassin@gmail.comz'),
(6, '2023-04-12', 5, 2, 2010, 'elkyassin@gmail.comz'),
(7, '2023-04-12', 5, 2, 2010, 'elkyassin@gmail.comz'),
(8, '2023-04-12', 5, 2, 2010, 'elkyassin@gmail.comz'),
(9, '2023-04-12', 5, 2, 2010, 'elkyassin@gmail.comz'),
(10, '2023-04-12', 5, 2, 2010, 'elkyassin@gmail.comz'),
(11, '2023-04-12', 5, 2, 2010, 'elkyassin@gmail.comz'),
(12, '2023-04-12', 5, 2, 2010, 'elkyassin@gmail.comz'),
(13, '2023-04-12', 5, 2, 2010, 'elkyassin@gmail.comz'),
(14, '2023-04-12', 5, 2, 2010, 'elkyassin@gmail.comz'),
(15, '2023-04-12', 5, 2, 2010, 'elkyassin@gmail.comz'),
(16, '2023-04-12', 5, 2, 2010, 'elkyassin@gmail.comz'),
(17, '2023-04-12', 5, 2, 2010, 'elkyassin@gmail.comz'),
(18, '2023-04-12', 5, 2, 2010, 'elkyassin@gmail.comz'),
(19, '2023-04-12', 5, 2, 2010, 'elkyassin@gmail.comz'),
(20, '2023-04-12', 5, 2, 2010, 'elkyassin@gmail.comz'),
(21, '2023-04-12', 5, 2, 2010, 'elkyassin@gmail.comz'),
(22, '2023-04-12', 5, 2, 2010, 'elkyassin@gmail.comz'),
(23, '2023-04-12', 5, 2, 2010, 'elkyassin@gmail.comz'),
(24, '2023-04-12', 5, 2, 2010, 'elkyassin@gmail.comz'),
(25, '2023-04-12', 5, 2, 2010, 'elkyassin@gmail.comz'),
(26, '2023-04-12', 5, 2, 2010, 'elkyassin@gmail.comz'),
(27, '2023-04-12', 5, 2, 2010, 'elkyassin@gmail.comz'),
(28, '2023-04-12', 5, 2, 2010, 'elkyassin@gmail.comz'),
(29, '2023-04-12', 5, 2, 2232, 'elkyassin@gmail.comz'),
(30, '2023-04-12', 4, 2, 3498, 'z3ama@gmail.com'),
(31, '2023-04-12', 4, 2, 3498, 'z3ama@gmail.com'),
(32, '2023-04-12', 5, 2, 2232, 'elkyassin@gmail.comz'),
(33, '2023-04-12', 4, 2, 3498, 'z3ama@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

DROP TABLE IF EXISTS `compte`;
CREATE TABLE IF NOT EXISTS `compte` (
  `login` varchar(30) NOT NULL,
  `motPasse` varchar(30) NOT NULL,
  `id_client` int(11) DEFAULT NULL,
  `photoProfil` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`login`),
  KEY `id_client` (`id_client`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `favorite`
--

DROP TABLE IF EXISTS `favorite`;
CREATE TABLE IF NOT EXISTS `favorite` (
  `id_client` int(11) DEFAULT NULL,
  `id_pro` int(11) DEFAULT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  KEY `id_pro` (`id_pro`),
  KEY `id_client` (`id_client`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `favorite`
--

INSERT INTO `favorite` (`id_client`, `id_pro`, `user_name`) VALUES
(NULL, 2, 'elkyassin@gmail.comz');

-- --------------------------------------------------------

--
-- Structure de la table `livraison`
--

DROP TABLE IF EXISTS `livraison`;
CREATE TABLE IF NOT EXISTS `livraison` (
  `id_client` int(11) DEFAULT NULL,
  `id_com` int(11) DEFAULT NULL,
  `date_livr` date DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `country` varchar(30) DEFAULT NULL,
  `adress` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `total_com` int(11) DEFAULT NULL,
  KEY `id_com` (`id_com`),
  KEY `id_client` (`id_client`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `livraison`
--

INSERT INTO `livraison` (`id_client`, `id_com`, `date_livr`, `city`, `country`, `adress`, `email`, `total_com`) VALUES
(5, 2, '2023-03-07', 'tanger', 'Maroc', 'hdgdgdgd', 'elkyassin@gmail.comz', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `marque`
--

DROP TABLE IF EXISTS `marque`;
CREATE TABLE IF NOT EXISTS `marque` (
  `id_mar` int(11) NOT NULL AUTO_INCREMENT,
  `nom_mar` varchar(30) NOT NULL,
  `descr` varchar(50) DEFAULT NULL,
  `startDate` date DEFAULT NULL,
  PRIMARY KEY (`id_mar`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `marque`
--

INSERT INTO `marque` (`id_mar`, `nom_mar`, `descr`, `startDate`) VALUES
(1, 'Apple', NULL, '2023-06-07');

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

DROP TABLE IF EXISTS `panier`;
CREATE TABLE IF NOT EXISTS `panier` (
  `id_client` int(11) DEFAULT NULL,
  `id_pro` int(11) DEFAULT NULL,
  `quantite` int(11) DEFAULT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  KEY `id_pro` (`id_pro`),
  KEY `id_client` (`id_client`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `panier`
--

INSERT INTO `panier` (`id_client`, `id_pro`, `quantite`, `user_name`) VALUES
(NULL, 2, 6, 'elkyassin@gmail.comz'),
(NULL, 2, 9, 'z3ama@gmail.com'),
(NULL, 1, 5, 'z3ama@gmail.com'),
(NULL, 1, 3, 'elkyassin@gmail.comz');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id_pro` int(11) NOT NULL AUTO_INCREMENT,
  `nom_pro` varchar(30) NOT NULL,
  `prix` double NOT NULL,
  `quantite` int(11) DEFAULT NULL,
  `photo` varchar(60) DEFAULT NULL,
  `id_mar` int(11) DEFAULT NULL,
  `id_cat` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_pro`),
  KEY `id_mar` (`id_mar`),
  KEY `id_cat` (`id_cat`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id_pro`, `nom_pro`, `prix`, `quantite`, `photo`, `id_mar`, `id_cat`) VALUES
(1, 'Iphon Pro Max', 300, 2, 'images/iphon.jpg', 1, 1),
(2, 'Lenovo', 222, 12, 'images/lenovo1.png', 1, 2);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`) ON DELETE SET NULL;

--
-- Contraintes pour la table `compte`
--
ALTER TABLE `compte`
  ADD CONSTRAINT `compte_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`) ON DELETE SET NULL;

--
-- Contraintes pour la table `favorite`
--
ALTER TABLE `favorite`
  ADD CONSTRAINT `favorite_ibfk_1` FOREIGN KEY (`id_pro`) REFERENCES `produit` (`id_pro`) ON DELETE SET NULL,
  ADD CONSTRAINT `favorite_ibfk_2` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`) ON DELETE SET NULL;

--
-- Contraintes pour la table `livraison`
--
ALTER TABLE `livraison`
  ADD CONSTRAINT `livraison_ibfk_1` FOREIGN KEY (`id_com`) REFERENCES `commande` (`id_com`) ON DELETE SET NULL,
  ADD CONSTRAINT `livraison_ibfk_2` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`) ON DELETE SET NULL;

--
-- Contraintes pour la table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `panier_ibfk_1` FOREIGN KEY (`id_pro`) REFERENCES `produit` (`id_pro`) ON DELETE SET NULL,
  ADD CONSTRAINT `panier_ibfk_2` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`) ON DELETE SET NULL;

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`id_mar`) REFERENCES `marque` (`id_mar`) ON DELETE SET NULL,
  ADD CONSTRAINT `produit_ibfk_2` FOREIGN KEY (`id_cat`) REFERENCES `categorie` (`id_cat`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
