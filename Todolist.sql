-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Lun 25 Mars 2019 à 20:25
-- Version du serveur :  5.7.25-0ubuntu0.18.04.2
-- Version de PHP :  7.2.15-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `Todolist`
--

-- --------------------------------------------------------

--
-- Structure de la table `Todos`
--

CREATE TABLE `Todos` (
  `ID_Taches` int(11) NOT NULL,
  `Taches` varchar(255) NOT NULL,
  `etat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Todos`
--

INSERT INTO `Todos` (`ID_Taches`, `Taches`, `etat`) VALUES
(2, 'manger', 0),
(3, 'jouer', 1),
(4, 'rire', 1),
(5, 'sauter', 1),
(6, 'faire les courses', 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `Todos`
--
ALTER TABLE `Todos`
  ADD PRIMARY KEY (`ID_Taches`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `Todos`
--
ALTER TABLE `Todos`
  MODIFY `ID_Taches` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
