-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 15 avr. 2022 à 15:59
-- Version du serveur : 10.4.19-MariaDB
-- Version de PHP : 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `jesuislehero_renaud_leger`
--
CREATE DATABASE IF NOT EXISTS `jesuislehero_renaud_leger` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `jesuislehero_renaud_leger`;

-- --------------------------------------------------------

--
-- Structure de la table `choix`
--

CREATE TABLE IF NOT EXISTS `choix` (
  `CH_NUM` int(11) NOT NULL AUTO_INCREMENT,
  `CH_TEXTE` varchar(2000) NOT NULL,
  `CH_INDEX` int(11) NOT NULL,
  `NARR_INDEX` int(11) NOT NULL,
  PRIMARY KEY (`CH_NUM`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `histoire`
--

CREATE TABLE IF NOT EXISTS `histoire` (
  `HIST_NUM` int(11) NOT NULL AUTO_INCREMENT,
  `HIST_TITRE` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `HIST_AUTEUR` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `HIST_RESUME` varchar(2000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `HIST_DATE` date NOT NULL,
  `HIST_IMAGE` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`HIST_NUM`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `histoire`
--

INSERT INTO `histoire` (`HIST_NUM`, `HIST_TITRE`, `HIST_AUTEUR`, `HIST_RESUME`, `HIST_DATE`, `HIST_IMAGE`) VALUES
(1, 'HISTOIRE_1', 'AUTEUR_1', 'RESUME_1', '0000-00-00', 'IMAGE_1');

-- --------------------------------------------------------

--
-- Structure de la table `narration`
--

CREATE TABLE IF NOT EXISTS `narration` (
  `NARR_INDEX` int(11) NOT NULL AUTO_INCREMENT,
  `NARR_TEXTE` varchar(2000) NOT NULL,
  `NARR_NBCHOIX` int(5) NOT NULL,
  `HIST_NUM` int(11) NOT NULL,
  PRIMARY KEY (`NARR_INDEX`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `USR_ID` int(11) NOT NULL AUTO_INCREMENT,
  `USR_LOGIN` varchar(50) NOT NULL,
  `USR_PASSWORD` varchar(50) NOT NULL,
  PRIMARY KEY (`USR_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
