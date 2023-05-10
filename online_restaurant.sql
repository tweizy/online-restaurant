-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 10, 2023 at 05:35 PM
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
-- Database: `online_restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `commandes`
--

DROP TABLE IF EXISTS `commandes`;
CREATE TABLE IF NOT EXISTS `commandes` (
  `cid` int NOT NULL AUTO_INCREMENT,
  `uid` int NOT NULL,
  `statut` varchar(50) NOT NULL,
  `cdate` date NOT NULL,
  `bill` float NOT NULL,
  PRIMARY KEY (`cid`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `commandes`
--

INSERT INTO `commandes` (`cid`, `uid`, `statut`, `cdate`, `bill`) VALUES
(1, 1, 'Livrée', '2023-04-05', 200),
(3, 1, 'Livrée', '2023-04-16', 50);

-- --------------------------------------------------------

--
-- Table structure for table `commande_plat`
--

DROP TABLE IF EXISTS `commande_plat`;
CREATE TABLE IF NOT EXISTS `commande_plat` (
  `cid` int NOT NULL,
  `pid` int NOT NULL,
  `qty` int NOT NULL,
  PRIMARY KEY (`cid`,`pid`),
  KEY `pid` (`pid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `commande_plat`
--

INSERT INTO `commande_plat` (`cid`, `pid`, `qty`) VALUES
(1, 6, 3),
(1, 11, 2),
(3, 7, 1),
(3, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `plats`
--

DROP TABLE IF EXISTS `plats`;
CREATE TABLE IF NOT EXISTS `plats` (
  `pid` int NOT NULL AUTO_INCREMENT,
  `pname` varchar(100) NOT NULL,
  `ptype` varchar(50) NOT NULL,
  `pdescription` varchar(100) DEFAULT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`pid`),
  UNIQUE KEY `pname` (`pname`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `plats`
--

INSERT INTO `plats` (`pid`, `pname`, `ptype`, `pdescription`, `price`) VALUES
(1, 'Pizza Margherita', 'plat', 'Tomate, mozzarella, basilic', 12.5),
(2, 'Steak Frites', 'plat', 'Steak de bœuf, frites maison, salade verte', 18),
(3, 'Sushi Assortiment', 'portion', 'Sushi variés, wasabi, sauce soja', 22.5),
(4, 'Pad Thai', 'plat', 'Nouilles de riz, crevettes, poulet, légumes, cacahuètes', 14),
(11, 'lasagne', 'portion', 'lasagne avec de la viande hâchée', 20),
(6, 'Salade César', 'portion', 'Salade romaine, poulet grillé, croûtons, parmesan, sauce césar', 9.5),
(9, 'Pizza Thon', 'plat du jour', 'pizza avec du thon et du fromage', 15);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `uid` int NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `utype` enum('client','admin') NOT NULL,
  `hashed_password` char(60) DEFAULT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `username`, `email`, `utype`, `hashed_password`) VALUES
(1, 'ilyas', 'ilyas@gmail.com', 'admin', '$2y$10$LkRJ4Gm1n8z2ukYmJMt/SuRLE5bRCqgeTlvJrzqHPz8brfksxkZKS');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
