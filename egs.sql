-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : Dim 10 avr. 2022 à 17:16
-- Version du serveur :  5.7.31
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `egs`
--

-- --------------------------------------------------------

--
-- Structure de la table `gravite`
--

DROP TABLE IF EXISTS `gravite`;
CREATE TABLE IF NOT EXISTS `gravite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `niveau` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `gravite`
--

INSERT INTO `gravite` (`id`, `niveau`) VALUES
(1, 'Pas urgent'),
(2, 'Important'),
(3, 'Urgent');

-- --------------------------------------------------------

--
-- Structure de la table `postit`
--

DROP TABLE IF EXISTS `postit`;
CREATE TABLE IF NOT EXISTS `postit` (
  `numPostIt` int(11) NOT NULL AUTO_INCREMENT,
  `idRedacteur` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `message` text COLLATE utf8_bin NOT NULL,
  `gravite` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`numPostIt`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `postitprive`
--

DROP TABLE IF EXISTS `postitprive`;
CREATE TABLE IF NOT EXISTS `postitprive` (
  `numPostIt` int(11) NOT NULL AUTO_INCREMENT,
  `idRedacteur` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `message` text COLLATE utf8_bin NOT NULL,
  `gravite` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`numPostIt`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `postitprive`
--

INSERT INTO `postitprive` (`numPostIt`, `idRedacteur`, `date`, `message`, `gravite`) VALUES
(2, 1, '2021-06-19 19:55:39', 'Ceci est un post-it privÃ©', 'Pas urgent');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `nom` text COLLATE utf8_bin NOT NULL,
  `lg` text COLLATE utf8_bin NOT NULL,
  `mdp` text COLLATE utf8_bin NOT NULL,
  `avatar` text COLLATE utf8_bin NOT NULL,
  `admin` int(11) NOT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUser`, `nom`, `lg`, `mdp`, `avatar`, `admin`) VALUES
(19, 'test', 'test10', ' ', '', 0),
(1, 'Bivash', 'bivash15', 'bivash', '../img/avatars/bivash15.PNG', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
