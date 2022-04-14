-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 12 avr. 2022 à 22:37
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `montjean_cinema`
--
CREATE DATABASE IF NOT EXISTS `montjean_cinema` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `montjean_cinema`;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id_categorie` int(3) NOT NULL,
  `type_event` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nom_event` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_event` date NOT NULL,
  `photo_event` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `type_event`, `nom_event`, `date_event`, `photo_event`) VALUES
(1, 'Soirées à thèmes', 'Harry Potter', '2022-06-20', 'affiches/harry_potter.png'),
(2, 'Expositions', 'L\'univers de J.R.R. Tolkien', '2022-07-15', 'affiches/Tolkien.jpg'),
(4, 'Débats', 'Banlieusard, le film', '2022-10-15', 'affiches/banlieusard.png');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id_contact` int(3) NOT NULL,
  `prenom` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nom` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id_contact`, `prenom`, `nom`, `email`, `message`) VALUES
(2, 'Fatima', 'Chine', 'fatima.chine@colombbus.org', 'Coucou, Vanusa et Redha !  Bonne chance !'),
(3, 'Vanusa', 'Santos', 'vanusa.santos@colombbus.org', 'Bonjour, j\'aimerais être bénévole ;-)'),
(4, 'Redha', 'Talamine', 'redha.talamine@colombbus.org', 'Bonjour, à quand une soirée autour des films Jean Gabin ?');

-- --------------------------------------------------------

--
-- Structure de la table `films`
--

CREATE TABLE `films` (
  `id_film` int(3) NOT NULL,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categorie` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `acteurs` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `realisateur` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pays` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bande_annonce` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `films`
--

INSERT INTO `films` (`id_film`, `titre`, `categorie`, `acteurs`, `realisateur`, `pays`, `description`, `photo`, `bande_annonce`) VALUES
(1, 'Batman', 'Films à l\'affiche', 'Robert Pattinson', 'Matt Reeves', 'Etats-Unis', 'Dans sa deuxième année de lutte contre le crime, le milliardaire et justicier masqué Batman...', 'affiches/batman.png', 'https://www.youtube.com/watch?v=hGQo1axtj60'),
(2, 'Goliath', 'Films à l\'affiche', 'Gilles Lellouche', 'Frédéric Tellier', 'France', 'France, professeure de sport de jour, ouvrière la nuit, milite activement contre l\'usage des pesticides', 'affiches/goliath.png', 'https://www.youtube.com/watch?v=bFUxLeAfUeQ'),
(3, 'Notre-Dame Brûle', 'Films à l\'affiche', 'Jean-Paul Bordes', 'Jean-Jacques Annaud', 'France', 'Le long métrage de Jean-Jacques Annaud reconstitue heure par heure l\'invraissemblable réalité...', 'affiches/notre_dame_brule.png', 'https://www.youtube.com/watch?v=YlDXdPSEtgk'),
(4, 'Morbius', 'Films à l\'affiche', 'Jared Leto, Adria Arjona', 'Daniel Espinosa', 'Etats-Unis', 'Gravement atteint d\'une rare maladie sanguine, le Dr Morbius tent un pari désespéré', 'affiches/morbius.png', 'https://www.youtube.com/watch?v=6pGgkOcIyQA&amp;t='),
(7, 'Doctor Strange - in the Multiverse of Madness', 'Films à venir', 'Benedict Cumberbatch, Elizabet', 'Sam Raimi', 'Etats-Unis', 'Dans ce nouveau film Marvel Studios, l’univers cinématographique Marvel déverrouille et repousse les limites du multivers encore plus loin. Voyagez dans l’inconnu avec Doctor Strange, qui avec l’aide d’anciens et de nouveaux alliés mystiques, traverse les réalités hallucinantes et dangereuses du multivers pour affronter un nouvel adversaire mystérieux. ', 'affiches/doctor_strange_2.jpg', 'https://www.youtube.com/watch?v=i6zjrsyBhFU'),
(10, 'Les Animaux Fantastiques 3 : Les secrets de Dumbledore', 'Films à venir', 'Eddie Redmayne, Jude Law', 'David Yates', 'Etats-Unis', 'Le professeur Albus Dumbledore sait que le puissant mage noir Gellert Grindelwald cherche à prendre le contrôle du monde des sorciers. Incapable de l\'empêcher d\'agir seul, il sollicite le magizoologiste Norbert Dragonneau pour qu\'il réunisse des sorciers, des sorcières et un boulanger moldu au sein d\'une équipe intrépide', 'affiches/les_animaux_fantastiques_3.png', 'https://www.youtube.com/watch?v=k39acJCDSKY'),
(11, 'Le tigre qui s\'invita prendre le thé', 'Films à venir', 'David Oyelowo', 'Kariem Saleh, An Vrombaut, Ben', 'Angleterre', 'Un mystérieux tigre fait son apparition sans s\'être annoncé, s\'invitant à l\'heure du thé. La jeune Sophie et sa maman l\'observent avec fascination tandis qu\'il dévore non seulement leur thé, mais tout ce qu\'il y a d\'autre dans la maison.', 'affiches/le_tigre_qui_sinvita_prendre_le_thé.png', 'https://www.youtube.com/watch?v=-xUm2FnIfZM'),
(12, 'Ogre', 'Films à venir', 'Ana Girardot, Giovanni Pucci', 'Arnaud Malherbe, Sebastian Sep', 'France', 'Fuyant un passé douloureux, Chloé démarre une nouvelle vie d\'institutrice dans le Morvan avec son fils Jules, 8 ans. Accueillie chaleureusement par les habitants du village, elle tombe sous le charme de Mathieu, un médecin charismatique et mystérieux. Mais de terribles événements perturbent la tranquillité des villageois : un enfant a disparu et une bête sauvage s’attaque au bétail. Jules est en alerte, il le sent, quelque chose rôde la nuit autour de la maison... ', 'affiches/ogre.png', 'https://www.youtube.com/watch?v=1J2KnMxKkgQ');

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
  `statut` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `membres`
--

INSERT INTO `membres` (`id_membre`, `pseudo`, `mdp`, `nom`, `prenom`, `email`, `civilite`, `ville`, `code_postal`, `adresse`, `statut`) VALUES
(20, 'AdminRedha', '$2y$10$PIKpJIHzUTtOQ6MG8knTS.9siBhy3myKkskP6cp52ugBmCjr.4enu', 'Talamine', 'Redha', 'redha.talamine@colombbus.org', 'm', 'Suresnes', 92150, '8, Boulevard Louis Loucheur', 1),
(21, 'aguamarinha', '$2y$10$bhca3txPq48K7aJdbrlQmOk.4vlmn.J44uLRg7ayEGOy8GdWVdJXu', 'Mar', 'Mira', 'baianissima@gmail.com', 'f', 'Ramatuelle', 83350, 'Rue du Soleil Bleu', 0),
(22, 'AdminVanusa', '$2y$10$/W5KTG2RgQqpe99sxfKzSuGDN8nnjN3VPYj1hfuE/RCzfFwvD4GLq', 'Santos', 'Vanusa', 'vanusa.santos@colombbus.org', 'f', 'Saint-Cloud', 92210, '12, Parc de la Bérengère', 1),
(23, 'Rick92', '$2y$10$OflSn04.Sh49nnW5TId3uex0.Myu2UHpaqxgbga48SsDGWtNi1nmO', 'Blaine', 'Rick', 'rick.blaine@casablanca.org', 'm', 'Maroc', 20000, 'Maroc - Casablanca', 0),
(24, 'Youb92', '$2y$10$sFsbcNj07jl1w4CTL4ic4uT13gDrMMOlGfsMlxDc.XH60na1BHqOi', 'Talamine', 'Youb', 'youbtalamine@yahoo.fr', 'm', 'Antony', 92160, '1, allée du Lac Tchad', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_categorie`),
  ADD KEY `date_event` (`date_event`);

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
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_categorie` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id_contact` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `films`
--
ALTER TABLE `films`
  MODIFY `id_film` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `membres`
--
ALTER TABLE `membres`
  MODIFY `id_membre` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
