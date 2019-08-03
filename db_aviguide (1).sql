-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 03, 2019 at 02:07 PM
-- Server version: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_aviguide`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrateur`
--

DROP TABLE IF EXISTS `administrateur`;
CREATE TABLE IF NOT EXISTS `administrateur` (
  `idadministrateur` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) DEFAULT NULL,
  `prenom` varchar(45) DEFAULT NULL,
  `telephone` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `login` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idadministrateur`),
  UNIQUE KEY `administrateurcol_UNIQUE` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `adresse`
--

DROP TABLE IF EXISTS `adresse`;
CREATE TABLE IF NOT EXISTS `adresse` (
  `idadresse` int(11) NOT NULL AUTO_INCREMENT,
  `vendeur_idvendeur` int(11) NOT NULL,
  `ville_idville` int(11) NOT NULL,
  PRIMARY KEY (`idadresse`,`ville_idville`),
  KEY `fk_adresse_vendeur1_idx` (`vendeur_idvendeur`),
  KEY `fk_adresse_ville1_idx` (`ville_idville`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `idclient` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) DEFAULT NULL,
  `prenom` varchar(45) DEFAULT NULL,
  `telephone` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `login` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idclient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `idcommande` int(11) NOT NULL AUTO_INCREMENT,
  `produit_idproduit` int(11) NOT NULL,
  `client_idclient` int(11) NOT NULL,
  `date_cmd` datetime DEFAULT NULL,
  PRIMARY KEY (`idcommande`),
  KEY `fk_commande_produit1_idx` (`produit_idproduit`),
  KEY `fk_commande_client1_idx` (`client_idclient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE IF NOT EXISTS `commentaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `objet` varchar(256) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `commentaire`
--

INSERT INTO `commentaire` (`id`, `nom`, `email`, `telephone`, `objet`, `message`) VALUES
(8, 'livraison requise', 'fdfdd@dfgff.ghyt', '12345678IO', 'ddd', 'cfghgfdsfgf'),
(9, 'ali', 'batourimaidadi@gmail.com', '12345678IO', 'ddd', 'sdrftgyhuj'),
(10, 'livraison requise', 'batourimaidadi@gmail.com', '12345678IO', 'ddd', 'sdfg'),
(11, 'livraison requise', 'batourimaidadi@gmail.com', '12345678IO', 'sdrf', 'dfgh'),
(12, 'livraison requise', 'batourimaidadi@gmail.com', '12345678IO', 'sdrf', 'xcdfghjk');

-- --------------------------------------------------------

--
-- Table structure for table `pays`
--

DROP TABLE IF EXISTS `pays`;
CREATE TABLE IF NOT EXISTS `pays` (
  `idpays` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) DEFAULT NULL,
  `code` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idpays`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `idproduit` int(11) NOT NULL AUTO_INCREMENT,
  `vendeur` int(11) NOT NULL,
  `nom_produit` varchar(45) DEFAULT NULL,
  `prix_u` varchar(45) DEFAULT NULL,
  `qte_produit` int(11) NOT NULL,
  `type_produit` int(11) NOT NULL,
  `details_produit` text,
  `Date_enreg` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `img_produit` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idproduit`),
  KEY `fk_produit_vendeur_idx` (`vendeur`),
  KEY `fk_produit_type_produit1_idx` (`type_produit`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `produit`
--

INSERT INTO `produit` (`idproduit`, `vendeur`, `nom_produit`, `prix_u`, `qte_produit`, `type_produit`, `details_produit`, `Date_enreg`, `img_produit`) VALUES
(1, 1, 'Blé', '400', 50, 2, 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.', '2019-07-15 02:52:30', 'aviguide.png'),
(2, 1, 'Sorgho', '500', 50, 2, 'Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?', '2019-07-15 03:13:02', 'aviguide.png'),
(3, 1, 'Sorgho', '500', 20, 2, 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.', '2019-07-18 12:43:40', 'Prod_2_Sorgho3.jpg'),
(4, 1, 'Poussins de chair', '500', 100, 1, 'Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.', '2019-07-18 15:26:51', 'Prod_1_Poussins_de_chair.JPG'),
(5, 1, 'Poussins', '350', 500, 1, 'Poussins de 07 jours', '2019-07-18 15:30:15', 'Prod_1_Poussins.JPG'),
(6, 1, 'Portion de terrain', '5000', 100, 3, '', '2019-07-18 15:33:19', 'Prod_3_Terrain.png'),
(7, 1, 'Essai', '0', 0, 6, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2019-07-18 16:23:35', 'Prod_6_Essai.jpg'),
(8, 1, 'Arachide', '1000', 100, 2, '', '2019-08-02 11:39:34', 'Prod_2_Arachide1.jpg'),
(9, 1, 'Maïs', '1500', 30, 2, '', '2019-08-02 11:48:46', 'Prod_2_Maïs.jpg'),
(10, 1, 'Maïs', '1500', 30, 2, '', '2019-08-02 11:49:52', 'Prod_2_Maïs1.jpg'),
(11, 1, 'Maïs', '1500', 30, 2, '', '2019-08-02 11:50:30', 'Prod_2_Maïs2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `type_produit`
--

DROP TABLE IF EXISTS `type_produit`;
CREATE TABLE IF NOT EXISTS `type_produit` (
  `idtype_produit` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idtype_produit`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `type_produit`
--

INSERT INTO `type_produit` (`idtype_produit`, `nom`) VALUES
(1, 'Poussins'),
(2, 'Aliments'),
(3, 'Terrains'),
(4, 'Médicaments'),
(6, 'RAS');

-- --------------------------------------------------------

--
-- Table structure for table `vendeur`
--

DROP TABLE IF EXISTS `vendeur`;
CREATE TABLE IF NOT EXISTS `vendeur` (
  `idvendeur` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `prenom` varchar(45) DEFAULT NULL,
  `telephone` varchar(45) NOT NULL,
  `fax` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `site_web` varchar(250) DEFAULT NULL,
  `Activites` text,
  `Adresse` varchar(250) DEFAULT NULL,
  `login` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idvendeur`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vendeur`
--

INSERT INTO `vendeur` (`idvendeur`, `nom`, `prenom`, `telephone`, `fax`, `email`, `site_web`, `Activites`, `Adresse`, `login`, `password`) VALUES
(1, 'TF', 'Carin', '697223656', '', 'tfcarin02@gmail.com', NULL, NULL, NULL, 'TFCarin', '7c4a8d09ca3762af61e59520943dc26494f8941b'),
(2, 'Ferme avicole du centre de la ville', NULL, '+237 699 994 570', '', 'batourimaidadi@gmail.com', '', 'Vente d\'aliments composés pour volaille', 'Dang, Ngaoundéré, Cameroun', NULL, NULL),
(3, 'Ferme avicole du centre de la ville', NULL, '+237 699 994 570', '', 'batourimaidadi@gmail.com', '', 'Vente d\'aliments composés pour volaille', 'Dang, Ngaoundéré, Cameroun', NULL, NULL),
(4, 'Ferme avicole du centre de la ville', NULL, '+237 699 994 570', '', 'batourimaidadi@gmail.com', '', 'Vente d\'aliments composés pour volaille', 'Dang, Ngaoundéré, Cameroun', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ville`
--

DROP TABLE IF EXISTS `ville`;
CREATE TABLE IF NOT EXISTS `ville` (
  `idville` int(11) NOT NULL,
  `pays_idpays` int(11) NOT NULL,
  `nom` varchar(45) DEFAULT NULL,
  `code` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idville`),
  KEY `fk_ville_pays1_idx` (`pays_idpays`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adresse`
--
ALTER TABLE `adresse`
  ADD CONSTRAINT `fk_adresse_vendeur1` FOREIGN KEY (`vendeur_idvendeur`) REFERENCES `vendeur` (`idvendeur`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_adresse_ville1` FOREIGN KEY (`ville_idville`) REFERENCES `ville` (`idville`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `fk_commande_client1` FOREIGN KEY (`client_idclient`) REFERENCES `client` (`idclient`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_commande_produit1` FOREIGN KEY (`produit_idproduit`) REFERENCES `produit` (`idproduit`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `fk_produit_vendeur` FOREIGN KEY (`vendeur`) REFERENCES `vendeur` (`idvendeur`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`type_produit`) REFERENCES `type_produit` (`idtype_produit`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ville`
--
ALTER TABLE `ville`
  ADD CONSTRAINT `fk_ville_pays1` FOREIGN KEY (`pays_idpays`) REFERENCES `pays` (`idpays`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
