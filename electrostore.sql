-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 20, 2023 at 06:26 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `electrostore`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id_cat` int NOT NULL AUTO_INCREMENT,
  `nom_cat` varchar(30) NOT NULL,
  `descr` varchar(50) DEFAULT NULL,
  `dateCategorie` date DEFAULT NULL,
  PRIMARY KEY (`id_cat`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`id_cat`, `nom_cat`, `descr`, `dateCategorie`) VALUES
(1, 'phone', NULL, NULL),
(2, 'tablet', NULL, NULL),
(3, 'laptob', NULL, NULL),
(4, 'watch', NULL, NULL),
(5, 'headphone', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id_client` int NOT NULL AUTO_INCREMENT,
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
-- Dumping data for table `client`
--

INSERT INTO `client` (`id_client`, `nom_client`, `prenom_client`, `adr_client`, `email`, `num_tele`, `mot_passe`, `user_name`, `photo`) VALUES
(1, 'yassine', 'elk', 'assilah', 'elkyassin@gmail.com', '0631074983', '1234', 'yassin', ''),
(2, 'yons', 'radi', 'assilah', 'radi@hmail.com', '0631074983', '12345', 'yons', ''),
(3, 'yassin', 'elk', 'assilah', 'elkyassin5555@gamil.com', '564165.230', '1234', 'admin', ''),
(4, 'yassin', 'elk', 'assilah', 'z3ama@gmail.com', '564165.230', '1234', 'admin', 'image/image4.jpg'),
(5, 'yassin', 'elk', 'assilah', 'elkyassin@gmail.comz', '564165.230', '123', 'admin', 'image/image4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id_com` int NOT NULL AUTO_INCREMENT,
  `date_com` date NOT NULL,
  `id_client` int DEFAULT NULL,
  `items` int DEFAULT NULL,
  `total` double DEFAULT NULL,
  `user_name` varchar(30) DEFAULT NULL,
  `montent_total` int DEFAULT NULL,
  PRIMARY KEY (`id_com`),
  KEY `id_client` (`id_client`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `commande`
--

INSERT INTO `commande` (`id_com`, `date_com`, `id_client`, `items`, `total`, `user_name`, `montent_total`) VALUES
(1, '2023-04-12', NULL, 2, 1632, 'elkyassin@gmail.comz', NULL),
(2, '2023-04-12', 5, 2, 2010, 'elkyassin@gmail.comz', NULL),
(3, '2023-04-12', 5, 2, 2010, 'elkyassin@gmail.comz', NULL),
(4, '2023-04-12', 5, 2, 2010, 'elkyassin@gmail.comz', NULL),
(5, '2023-04-12', 5, 2, 2010, 'elkyassin@gmail.comz', NULL),
(6, '2023-04-12', 5, 2, 2010, 'elkyassin@gmail.comz', NULL),
(7, '2023-04-12', 5, 2, 2010, 'elkyassin@gmail.comz', NULL),
(8, '2023-04-12', 5, 2, 2010, 'elkyassin@gmail.comz', NULL),
(9, '2023-04-12', 5, 2, 2010, 'elkyassin@gmail.comz', NULL),
(10, '2023-04-12', 5, 2, 2010, 'elkyassin@gmail.comz', NULL),
(11, '2023-04-12', 5, 2, 2010, 'elkyassin@gmail.comz', NULL),
(12, '2023-04-12', 5, 2, 2010, 'elkyassin@gmail.comz', NULL),
(13, '2023-04-12', 5, 2, 2010, 'elkyassin@gmail.comz', NULL),
(14, '2023-04-12', 5, 2, 2010, 'elkyassin@gmail.comz', NULL),
(15, '2023-04-12', 5, 2, 2010, 'elkyassin@gmail.comz', NULL),
(16, '2023-04-12', 5, 2, 2010, 'elkyassin@gmail.comz', NULL),
(17, '2023-04-12', 5, 2, 2010, 'elkyassin@gmail.comz', NULL),
(18, '2023-04-12', 5, 2, 2010, 'elkyassin@gmail.comz', NULL),
(19, '2023-04-12', 5, 2, 2010, 'elkyassin@gmail.comz', NULL),
(20, '2023-04-12', 5, 2, 2010, 'elkyassin@gmail.comz', NULL),
(21, '2023-04-12', 5, 2, 2010, 'elkyassin@gmail.comz', NULL),
(22, '2023-04-12', 5, 2, 2010, 'elkyassin@gmail.comz', NULL),
(23, '2023-04-12', 5, 2, 2010, 'elkyassin@gmail.comz', NULL),
(24, '2023-04-12', 5, 2, 2010, 'elkyassin@gmail.comz', NULL),
(25, '2023-04-12', 5, 2, 2010, 'elkyassin@gmail.comz', NULL),
(26, '2023-04-12', 5, 2, 2010, 'elkyassin@gmail.comz', NULL),
(27, '2023-04-12', 5, 2, 2010, 'elkyassin@gmail.comz', NULL),
(28, '2023-04-12', 5, 2, 2010, 'elkyassin@gmail.comz', NULL),
(29, '2023-04-12', 5, 2, 2232, 'elkyassin@gmail.comz', NULL),
(30, '2023-04-12', 4, 2, 3498, 'z3ama@gmail.com', NULL),
(31, '2023-04-12', 4, 2, 3498, 'z3ama@gmail.com', NULL),
(32, '2023-04-12', 5, 2, 2232, 'elkyassin@gmail.comz', NULL),
(33, '2023-04-12', 4, 2, 3498, 'z3ama@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `compte`
--

DROP TABLE IF EXISTS `compte`;
CREATE TABLE IF NOT EXISTS `compte` (
  `login` varchar(30) NOT NULL,
  `motPasse` varchar(30) NOT NULL,
  `id_client` int DEFAULT NULL,
  `photoProfil` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`login`),
  KEY `id_client` (`id_client`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `favorite`
--

DROP TABLE IF EXISTS `favorite`;
CREATE TABLE IF NOT EXISTS `favorite` (
  `id_client` int DEFAULT NULL,
  `id_pro` int DEFAULT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  KEY `id_pro` (`id_pro`),
  KEY `id_client` (`id_client`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `favorite`
--

INSERT INTO `favorite` (`id_client`, `id_pro`, `user_name`) VALUES
(NULL, 2, 'elkyassin@gmail.comz');

-- --------------------------------------------------------

--
-- Table structure for table `livraison`
--

DROP TABLE IF EXISTS `livraison`;
CREATE TABLE IF NOT EXISTS `livraison` (
  `id_client` int DEFAULT NULL,
  `id_com` int DEFAULT NULL,
  `date_livr` date DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `country` varchar(30) DEFAULT NULL,
  `adress` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `total_com` int DEFAULT NULL,
  KEY `id_com` (`id_com`),
  KEY `id_client` (`id_client`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `livraison`
--

INSERT INTO `livraison` (`id_client`, `id_com`, `date_livr`, `city`, `country`, `adress`, `email`, `total_com`) VALUES
(5, 2, '2023-03-07', 'tanger', 'Maroc', 'hdgdgdgd', 'elkyassin@gmail.comz', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `marque`
--

DROP TABLE IF EXISTS `marque`;
CREATE TABLE IF NOT EXISTS `marque` (
  `id_mar` int NOT NULL AUTO_INCREMENT,
  `nom_mar` varchar(30) NOT NULL,
  `descr` varchar(50) DEFAULT NULL,
  `startDate` date DEFAULT NULL,
  PRIMARY KEY (`id_mar`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marque`
--

INSERT INTO `marque` (`id_mar`, `nom_mar`, `descr`, `startDate`) VALUES
(1, 'Apple', NULL, '2023-06-07');

-- --------------------------------------------------------

--
-- Table structure for table `panier`
--

DROP TABLE IF EXISTS `panier`;
CREATE TABLE IF NOT EXISTS `panier` (
  `id_client` int DEFAULT NULL,
  `id_pro` int DEFAULT NULL,
  `quantite` int DEFAULT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  KEY `id_pro` (`id_pro`),
  KEY `id_client` (`id_client`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `panier`
--

INSERT INTO `panier` (`id_client`, `id_pro`, `quantite`, `user_name`) VALUES
(NULL, 2, 6, 'elkyassin@gmail.comz'),
(NULL, 2, 9, 'z3ama@gmail.com'),
(NULL, 1, 5, 'z3ama@gmail.com'),
(NULL, 1, 3, 'elkyassin@gmail.comz');

-- --------------------------------------------------------

--
-- Table structure for table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id_pro` int NOT NULL AUTO_INCREMENT,
  `nom_pro` varchar(30) NOT NULL,
  `prix` double NOT NULL,
  `quantite` int DEFAULT NULL,
  `photo` varchar(60) DEFAULT NULL,
  `id_mar` int DEFAULT NULL,
  `id_cat` int DEFAULT NULL,
  `purchase_price` int DEFAULT NULL,
  `purchase_date` date DEFAULT NULL,
  PRIMARY KEY (`id_pro`),
  KEY `id_mar` (`id_mar`),
  KEY `id_cat` (`id_cat`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produit`
--

INSERT INTO `produit` (`id_pro`, `nom_pro`, `prix`, `quantite`, `photo`, `id_mar`, `id_cat`, `purchase_price`, `purchase_date`) VALUES
(1, 'Iphon Pro Max', 300, 2, 'images/iphon.jpg', 1, 1, NULL, NULL),
(2, 'Lenovo', 222, 12, 'images/lenovo1.png', 1, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `responsable`
--

DROP TABLE IF EXISTS `responsable`;
CREATE TABLE IF NOT EXISTS `responsable` (
  `id_responsable` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mot_pass` varchar(100) NOT NULL,
  `nom_responsable` varchar(40) NOT NULL,
  `prenom_responsable` varchar(40) NOT NULL,
  `adress` varchar(40) DEFAULT NULL,
  `nmr_tele` varchar(20) DEFAULT NULL,
  `photo` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_responsable`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `responsable`
--

INSERT INTO `responsable` (`id_responsable`, `email`, `mot_pass`, `nom_responsable`, `prenom_responsable`, `adress`, `nmr_tele`, `photo`) VALUES
('soma01', 'soma01@gmail.com', 'soma01', 'hatmi', 'somaya', 'tanger', '0693028884', NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`) ON DELETE SET NULL;

--
-- Constraints for table `compte`
--
ALTER TABLE `compte`
  ADD CONSTRAINT `compte_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`) ON DELETE SET NULL;

--
-- Constraints for table `favorite`
--
ALTER TABLE `favorite`
  ADD CONSTRAINT `favorite_ibfk_1` FOREIGN KEY (`id_pro`) REFERENCES `produit` (`id_pro`) ON DELETE SET NULL,
  ADD CONSTRAINT `favorite_ibfk_2` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`) ON DELETE SET NULL;

--
-- Constraints for table `livraison`
--
ALTER TABLE `livraison`
  ADD CONSTRAINT `livraison_ibfk_1` FOREIGN KEY (`id_com`) REFERENCES `commande` (`id_com`) ON DELETE SET NULL,
  ADD CONSTRAINT `livraison_ibfk_2` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`) ON DELETE SET NULL;

--
-- Constraints for table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `panier_ibfk_1` FOREIGN KEY (`id_pro`) REFERENCES `produit` (`id_pro`) ON DELETE SET NULL,
  ADD CONSTRAINT `panier_ibfk_2` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`) ON DELETE SET NULL;

--
-- Constraints for table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`id_mar`) REFERENCES `marque` (`id_mar`) ON DELETE SET NULL,
  ADD CONSTRAINT `produit_ibfk_2` FOREIGN KEY (`id_cat`) REFERENCES `categorie` (`id_cat`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
