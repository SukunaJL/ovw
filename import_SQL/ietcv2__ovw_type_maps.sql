-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 13 avr. 2023 à 07:55
-- Version du serveur :  10.6.5-MariaDB
-- Version de PHP : 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `toolzik_imprimetcom_v2`
--

-- --------------------------------------------------------

--
-- Structure de la table `ietcv2__ovw_type_maps`
--

DROP TABLE IF EXISTS `ietcv2__ovw_type_maps`;
CREATE TABLE IF NOT EXISTS `ietcv2__ovw_type_maps` (
  `id_type_map` int(11) NOT NULL AUTO_INCREMENT,
  `name_type` varchar(255) CHARACTER SET utf8mb3 NOT NULL,
  PRIMARY KEY (`id_type_map`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ietcv2__ovw_type_maps`
--

INSERT INTO `ietcv2__ovw_type_maps` (`id_type_map`, `name_type`) VALUES
(1, 'Escort'),
(2, 'Hybrid'),
(3, 'Control'),
(4, 'Push'),
(5, 'Assault'),
(6, 'Arcades/Autres');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
