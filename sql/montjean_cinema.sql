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

CREATE TABLE `reservation` (
  `id_reservation` int(3) NOT NULL,
  `id_membre` int(3) DEFAULT NULL,
  `montant` int(3) NOT NULL,
  `date_enregistrement` datetime NOT NULL,
  `etat` enum('réservé') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `details_reservation`
--

CREATE TABLE `details_reservation` (
  `id_details_reservation` int(3) NOT NULL,
  `id_reservation` int(3) DEFAULT NULL,
  `id_produit` int(3) DEFAULT NULL,
  `quantite` int(3) NOT NULL,
  `prix` int(3) NOT NULL
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
-- Structure de la table `films`
--

CREATE TABLE `films` (
  `id_film` int(3) NOT NULL,
  `reference` varchar(20) NOT NULL,
  `categorie` varchar(20) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `photo` varchar(250) NOT NULL,
  `prix` float NOT NULL,
  `stock` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `films`
--

INSERT INTO `films` (`id_film`, `reference`, `categorie`, `titre`, `description`, `photo`, `prix`, `stock`) VALUES
(01, '111', 'Films à l\'affiche', 'Ambulance', 'NOUVEAU','affiches/ambulance.jpg', 12, 30),
<<<<<<< Updated upstream
(02, '222', 'Films à l\'affiche', 'Batman', 'NOUVEAU', 'affiches/batman.jpg', 12, 30),
(03, '333', 'Films à l\'affiche', 'Goliath', 'NOUVEAU', 'affiches/goliath.jpg', 12, 30),
(04, '444', 'Films à l\'affiche', 'Le Temps des secrets', 'NOUVEAU','affiches/le_temps_des_secrets.jpg', 12, 30);
(05, '555', 'Films à l\'affiche', 'Notre-Dâme brûle', 'NOUVEAU','affiches/notre_dame_brule.jpg',12, 30);
(06, '666', 'Films à l\'affiche', 'Permis de construire', 'NOUVEAU','affiches/permis_de_construire.jpg', 12, 30);
=======
(02, '222', 'Films à l'affiche', 'Batman', 'NOUVEAU', 'affiches/batman.jpg', 12, 25),
(03, '333', 'Films à l\'affiche', 'Goliath', 'NOUVEAU', 'affiches/goliath.jpg', 12, 20),
(04, '444', 'Films à l'affiche', 'Le Temps des secrets', 'NOUVEAU','affiches/le_temps_des_secrets.jpg', 12, 15);
(05, '555', 'Films à l'affiche', 'Notre-Dâme brûle', 'NOUVEAU','affiches/notre_dame_brule.jpg',12, 10);
(06, '666', 'Films à l'affiche', 'Permis de construire', 'NOUVEAU','affiches/permis_de_construire.jpg', 12, 5);

>>>>>>> Stashed changes

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
