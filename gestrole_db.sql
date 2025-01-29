-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 28 jan. 2025 à 09:03
-- Version du serveur : 8.3.0
-- Version de PHP : 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestrole_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id_users` int NOT NULL AUTO_INCREMENT,
  `nom_users` varchar(50) NOT NULL,
  `email_users` varchar(50) NOT NULL,
  `mot_de_passe` text NOT NULL,
  `role` varchar(20) NOT NULL DEFAULT 'user',
  PRIMARY KEY (`id_users`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id_users`, `nom_users`, `email_users`, `mot_de_passe`, `role`) VALUES
(1, 'Kamga', 'kamga@gmail.com', '$2y$10$19oIzOH2ItfN2yGw.4SNP.nZOBkBF1CzkhyM6yXgjqaBPwcA5zgsK', 'user'),
(2, 'alex', 'alex@gmail.com', '$2y$10$bjC92A6ANiyZ.1g.xcoBTuFIyH2KBFGd8BRd8jhGmX7Ty5M0voLFC', 'admin'),
(3, 'brice', 'bricesayang7@gmail.com', '$2y$10$NdL27ZKwuxCnomCF6j5zJ.sWW/WXcgkw5rLTsLVdrn0A5AgH/Lim6', 'user'),
(4, 'pellamie', 'pellamie@gmail.com', '$2y$10$09gz1VYjZcT6YA2VAXL.9.nqe7Xj3AUOWz3J3ry4AcUI01DETUWVy', 'user'),
(5, 'gl2b2025', 'gl2b2025@gmail.com', '$2y$10$oD4igNksVBou1LnxSWKfn.hTbYwMFUcswy2L1WqWGGYiIN1iogVKm', 'user');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
