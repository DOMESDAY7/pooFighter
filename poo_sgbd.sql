-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 18 fév. 2022 à 10:37
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `poo_sgbd`
--

-- --------------------------------------------------------

--
-- Structure de la table `personnages`
--

CREATE TABLE `personnages` (
  `id` int(11) NOT NULL,
  `atk` int(5) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `pv` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `personnages`
--

INSERT INTO `personnages` (`id`, `atk`, `nom`, `pv`) VALUES
(3, 55, 'frozone', 225),
(4, 55, 'flash', 225),
(5, 36, 'mr_indestructible', 65),
(6, 22, 'syndrome', 564),
(7, 25, 'violette', 225);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `personnages`
--
ALTER TABLE `personnages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `personnages`
--
ALTER TABLE `personnages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
