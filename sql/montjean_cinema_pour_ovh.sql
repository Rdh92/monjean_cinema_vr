-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  sam. 09 avr. 2022 à 18:00
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

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id_contact` int(3) NOT NULL,
  `pseudo` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contenu` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `films`
--

CREATE TABLE `films` (
  `id_film` int(3) NOT NULL,
  `titre` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categorie` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acteurs` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `realisateur` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pays` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `films`
--

INSERT INTO `films` (`id_film`, `titre`, `categorie`, `acteurs`, `realisateur`, `pays`, `description`, `photo`) VALUES
(1, 'Batman', 'Films à l\'affiche', 'Robert Pattinson', 'Matt Reeves', 'Etats-Unis', 'Dans sa deuxième année de lutte contre le crime, le milliardaire et justicier masqué Batman...', 'affiches/batman.jpg'),
(2, 'Goliath', 'Films à l\'affiche', 'Gilles Lellouche', 'Frédéric Tellier', 'France', 'France, professeure de sport de jour, ouvrière la nuit, milite activement contre l\'usage des pesticides', 'affiches/goliath.jpg'),
(3, 'Notre-Dame Brûle', 'Films à l\'affiche', 'Jean-Paul Bordes', 'Jean-Jacques Annaud', 'France', 'Le long métrage de Jean-Jacques Annaud reconstitue heure par heure l\'invraissemblable réalité...', 'affiches/notre_dame_brule.jpg'),
(4, 'Morbius', 'Films à l\'affiche', 'Jared Leto, Adria Arjona', 'Daniel Espinosa', 'Etats-Unis', 'Gravement atteint d\'une rare maladie sanguine, le Dr Morbius tent un pari désespéré', 'affiches/morbius.jpg'),
(5, 'Le Seigneur des Anne', 'on', 'Elijah Wood', 'Peter Jackson', 'pays', 'La comté, Isengard, Rohan, Gondor, Mordor', 'affiches/batman.jpg'),
(6, 'Casablanca', 'on', 'Humphrey Bogart', 'Peter Jackson', 'pays', 'Film Maroc', 'affiches/goliath.jpg'),
(7, 'Les Indestructibles', 'Films à l\'affiche', 'Bob Paar', 'Disney Pixar', 'ETATS-UNIS', 'Film animé', 'affiches/morbius.jpg'),
(8, 'James Bond', 'Films à venir', 'Sean Connery', 'Peter Jackson', 'ETATS-UNIS', '007', 'affiches/le_temps_des_secrets.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

CREATE TABLE `membres` (
  `id_membre` int(3) NOT NULL,
  `pseudo` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mdp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `civilite` enum('m','f') COLLATE utf8mb4_unicode_ci NOT NULL,
  `ville` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_postal` int(5) NOT NULL,
  `adresse` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `statut` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `membres`
--

INSERT INTO `membres` (`id_membre`, `pseudo`, `mdp`, `nom`, `prenom`, `email`, `civilite`, `ville`, `code_postal`, `adresse`, `statut`) VALUES
(20, 'AdminRedha', '$2y$10$PIKpJIHzUTtOQ6MG8knTS.9siBhy3myKkskP6cp52ugBmCjr.4enu', 'Talamine', 'Redha', 'redha.talamine@colombbus.org', 'm', 'Suresnes', 92150, '8, Boulevard Louis Loucheur', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id_contact`);

--
-- Index pour la table `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`id_film`);

--
-- Index pour la table `membres`
--
ALTER TABLE `membres`
  ADD PRIMARY KEY (`id_membre`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id_contact` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `films`
--
ALTER TABLE `films`
  MODIFY `id_film` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `membres`
--
ALTER TABLE `membres`
  MODIFY `id_membre` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
