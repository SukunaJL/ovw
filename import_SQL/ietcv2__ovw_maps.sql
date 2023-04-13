-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 13 avr. 2023 à 07:54
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
-- Structure de la table `ietcv2__ovw_maps`
--

DROP TABLE IF EXISTS `ietcv2__ovw_maps`;
CREATE TABLE IF NOT EXISTS `ietcv2__ovw_maps` (
  `id_map` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb3 NOT NULL,
  `id_type_map` int(11) NOT NULL,
  `avatar` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `plan` varchar(255) CHARACTER SET utf8mb3 DEFAULT NULL,
  PRIMARY KEY (`id_map`)
) ENGINE=MyISAM AUTO_INCREMENT=71 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ietcv2__ovw_maps`
--

INSERT INTO `ietcv2__ovw_maps` (`id_map`, `name`, `id_type_map`, `avatar`, `plan`) VALUES
(31, 'Observatoire : Gibraltar', 1, 'gibraltar.jpg', 'gibraltar_plan.jpg'),
(30, 'Route 66', 1, 'route_66.webp', 'route_66_plan.jpg'),
(29, 'Rialto', 1, 'rialto.jpg', 'rialto_plan.jpg'),
(28, 'Monastère Shambali', 1, 'shambali.jpg', NULL),
(27, 'Junkertown', 1, 'junkertown.webp', 'junkertown_plan.jpg'),
(26, 'Havana', 1, 'havana.jpg', 'havana_plan.jpg'),
(24, 'Dorado', 1, 'dorado.jpg', 'dorado_plan.jpg'),
(25, 'Circuit Royal', 1, 'circuit_royal.png', NULL),
(32, 'Blizzard World', 2, 'blizzard_world.webp', 'blizzard_world_plan.jpg'),
(33, 'Eichenwalde', 2, 'eichenwalde.jpg', 'eichenwalde_plan.jpg'),
(34, 'Hollywood', 2, 'hollywood.jpg', 'hollywood_plan.jpg'),
(35, 'King\'s Row', 2, 'kings_row.jpg', 'kings_row_plan.jpg'),
(36, 'Midtown', 2, 'midtown.webp', NULL),
(37, 'Numbani', 2, 'numbani.jpg', 'numbani_plan.jpg'),
(38, 'Paraíso', 2, 'paraiso.webp', NULL),
(39, 'Busan : Centre-Ville', 3, 'busan_centreville.avif', 'busan_centreville_plan.jpg'),
(40, 'Busan : Sanctuaire', 3, 'buson_sanctuaire.webp', 'busan_plan.jpg'),
(41, 'Busan : Base des MEKA', 3, 'busan_basemeka.jpg', 'busan_basemeka_plan.jpg'),
(42, 'Ilios : Phare', 3, 'ilios_phare.jpg', 'ilios_phare_plan.jpg'),
(43, 'Ilios : Puit', 3, 'ilios_puit.jpg', 'ilios_puit_plan.jpg'),
(44, 'Ilios : Ruines', 3, 'ilios_ruines.webp', 'ilios_ruines_plan.jpg'),
(45, 'Tour de Lijiang : Marché de nuit', 3, 'lijiang_marchenuit.webp', 'lijiang_marchenuit_plan.jpg'),
(46, 'Tour de Lijiang : Centre de Contrôle', 3, 'lijiang_centrecontrole.webp', 'lijiang_centrecontrole_plan.jpg'),
(47, 'Tour de Lijiang : Jardin', 3, 'lijiang_jardin.webp', 'lijiang_jardin_plan.jpg'),
(48, 'Népal : Sanctuaire', 3, 'nepal_sanctuaire.jpg', 'nepal_sanctuaire_plan.jpg'),
(49, 'Népal : Temple', 3, 'nepal_temple.webp', 'nepal_temple_plan.jpg'),
(50, 'Népal : Village', 3, 'nepal_village.webp', 'nepal_village_plan.jpg'),
(51, 'Oasis : Centre-Ville', 3, 'oasis_centreville.jpg', 'oasis_centreville_plan.jpg'),
(52, 'Oasis : Jardin', 3, 'oasis_jardin.jpg', 'oasis_jardin_plan.jpg'),
(53, 'Oasis : Université', 3, 'oasis_universite.jpg', 'oasis_universite_plan.jpg'),
(54, 'Colosseo', 4, 'colosseo.webp', NULL),
(55, 'New Queen Street', 4, 'new_queen_street.webp', NULL),
(56, 'Esperança', 4, 'esperanca.jpg', NULL),
(57, 'Hanamura', 5, 'hanamura.webp', 'hanamura_plan.jpg'),
(58, 'Colonie Lunaire Horizon', 5, 'colonie_lunaire_horizon.webp', 'colonie_lunaire_horizon_plan.jpg'),
(59, 'Paris', 5, 'Paris.webp', 'Paris_plan.jpg'),
(60, 'Temple d\'Anubis', 5, 'temple_anubis.webp', 'temple_anubis_plan.jpg'),
(61, 'Usine Volskaya', 5, 'usine_volskaya.webp', 'usine_volskaya_plan.jpg'),
(62, 'Forêt Noire', 6, 'Black-Forest.webp', NULL),
(63, 'Castillo', 6, 'Castillo.webp', NULL),
(64, 'Ecolab - Antarctique', 6, 'Ecopoint_Antarctica.webp', NULL),
(65, 'Nécropole', 6, 'Necropolis.webp', NULL),
(66, 'Château Guillard', 6, 'Chateau_Guillard.webp', NULL),
(67, 'Kanezaka', 6, 'Kanezaka.webp', NULL),
(68, 'Malevento', 6, 'Malevento.webp', NULL),
(69, 'Petra', 6, 'Petra.webp', NULL),
(70, 'Ayutthaya', 6, 'Ayutthaya.webp', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
