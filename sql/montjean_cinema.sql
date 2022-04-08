-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  mar. 18 jan. 2022 à 12:20
-- Version du serveur :  5.7.26
-- Version de PHP :  7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `montjean_cinema`
--
CREATE DATABASE IF NOT EXISTS `montjean_cinema` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `montjean_cinema`;

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `films` (
  `id_film` int(3) NOT NULL,
  `titre` varchar(20) DEFAULT NULL,
  `categorie` varchar(20) DEFAULT NULL,
  `acteurs`varchar(30) NOT NULL,
  `realisateur` varchar(30) NOT NULL
  `description` text(50) NOT NULL
  `photo` varchar NOT NULL
  `prix` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

CREATE TABLE `membres` (
  `id_membre` int(3) NOT NULL,
  `pseudo` varchar(20) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `civilite` enum('m','f') NOT NULL,
  `ville` varchar(20) NOT NULL,
  `code_postal` int(5) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `statut` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `membres`
--

INSERT INTO `membres` (`id_membre`, `pseudo`, `mdp`, `nom`, `prenom`, `email`, `civilite`, `ville`, `code_postal`, `adresse`, `statut`) VALUES
(19, 'Redha92', 'cestdanslaboite', 'talamine', 'redha', 'redhatalamine@gmail.com', 'm', 'antony', 92160, '1 allée du Lac Tchad', 1);

-- --------------------------------------------------------



--
-- Déchargement des données de la table `films`
--

INSERT INTO `films` (`id_film`, `titre`, `categorie`, `acteurs`, `realisateur`, `description`, `photo`, `prix`) VALUES
(01, 'Batman', 'Films à l\'affiche', 'Robert Pattinson','Matt Reeves','Dans sa deuxième année de lutte contre le crime, le milliardaire et justicier masqué Batman...''affiches/ambulance.jpg', 12),
(02, 'Goliath', 'Films à l\'affiche', 'Gilles Lellouche','Frédéric Tellier','France, professeure de sport de jour, ouvrière la nuit, milite activement contre l\'usage des pesticides', 'affiches/goliath.jpg', 12),
(03, 'Notre-Dame Brûle','Films à l\'affiche','Jean-Paul Bordes, Mikaël Chirinian', 'Jean-Jacques Annaud', 'Le long métrage de Jean-Jacques Annaud, reconstitue heure par heure l\'invraissemblable réalité...', 12),
(04, 'Morbius', 'Films à l\'affiche', 'Jared Leto, Adria Arjona','Daniel Espinosa','Gravement atteint d\'une rare maladie sanguine, le Dr Morbius tent un pari désespéré', 'affiches/le_temps_des_secrets.jpg', 12);


--
-- Index pour les tables déchargées
--


--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id_reservation`);

--
-- Index pour la table `details_reservation`
--
ALTER TABLE `details_reservation`
  ADD PRIMARY KEY (`id_detail_reservation`);

--
-- Index pour la table `membres`
--
ALTER TABLE `membres`
  ADD PRIMARY KEY (`id_membre`);

--
-- Index pour la table `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`id_film`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commandes`
--
ALTER TABLE `reservation`
  MODIFY `id_reservation` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `details_commandes`
--
ALTER TABLE `details_reservation`
  MODIFY `id_detail_reservation` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `membres`
--
ALTER TABLE `membres`
  MODIFY `id_membre` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `films`
--
ALTER TABLE `films`
  MODIFY `id_film` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
