-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : mer. 22 fév. 2023 à 19:13
-- Version du serveur : 5.7.39
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `FIND-v2`
--

-- --------------------------------------------------------

--
-- Structure de la table `anecdotes`
--

CREATE TABLE `anecdotes` (
  `id` int(11) NOT NULL,
  `idcorporation` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anecdote` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `anecdotes`
--

INSERT INTO `anecdotes` (`id`, `idcorporation`, `title`, `anecdote`) VALUES
(1, 1, 'Créatrice de Croix', 'L’Interfilière a créé les croix Dentaire, Sage-Femme, Jaunes, Créteil avec l’aide des autres croix Parisiennes et a re-réintronisé la croix Sciences.'),
(2, 1, '2nde anecdote', 'C\'est la 2nde anecdote, j\'espère qu\'elle est cool');

-- --------------------------------------------------------

--
-- Structure de la table `chant`
--

CREATE TABLE `chant` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idcorporation` int(11) NOT NULL,
  `texte` varchar(10000) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `chant`
--

INSERT INTO `chant` (`id`, `name`, `author`, `idcorporation`, `texte`) VALUES
(1, 'La Rouie', NULL, 1, 'Depuis mon baptême, la révélation<br>La Filière que j’aime, qui domine le con<br />\\r\\nLe con de ta mère par devant derrière<br />\\r\\nPar l’interfilière, toujours il prend cher<br />\\r\\n<br />\\r\\nHabitant du côté d’la Seine<br />\\r\\nJe n’ai jamais touché ton hymen<br />\\r\\nJe remplace par un verre de bière<br />\\r\\nJe suis fier d’être interfilière<br />\\r\\nEt je suis fier (ter) d’être interfilière<br />\\r\\nEt je suis fier (ter) de r’tourner ta mère<br />\\r\\n<br />\\r\\nEté comme hiver, ta mère ou ton père<br />\\r\\nCraignant l’adultère, c’est nous qu’elle préfère<br />\\r\\nNon l’interfilière ne se laisse pas faire<br />\\r\\nC’est une vraie guerrière toujours volontaire<br />\\r\\n');

-- --------------------------------------------------------

--
-- Structure de la table `chicken`
--

CREATE TABLE `chicken` (
  `id` int(11) NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `test` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `corporations`
--

CREATE TABLE `corporations` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abreviation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resume` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ville` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pays` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `corporations`
--

INSERT INTO `corporations` (`id`, `nom`, `abreviation`, `date`, `logo`, `resume`, `ville`, `pays`) VALUES
(1, 'Interfilière', 'IF', '2020-02-01', 'assets/img/corporations/IF.png', 'test', 'Paris', 'France'),
(2, 'Ingénieurs Puceaux Parisien', 'IPP', '2023-01-19', 'assets/img/corporations/IPP.png', '', 'Paris', 'France'),
(3, 'Régionale-Tournai-Mouscron', 'RTM', '2023-01-11', 'test', '', 'Namur', 'Belgique');

-- --------------------------------------------------------

--
-- Structure de la table `decorum`
--

CREATE TABLE `decorum` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `source` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idcorporation` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `decorum`
--

INSERT INTO `decorum` (`id`, `name`, `source`, `description`, `idcorporation`) VALUES
(1, 'Croix GC 2020', 'assets/img/decorum/Paris/Interfiliere/croix.jpg', 'Elle remplace la croix qui a été perdue', 1),
(2, 'Croix 2', 'assets/img/decorum/Paris/Interfiliere/croix.jpg', 'test tableau', 1);

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20230117212812', '2023-01-19 23:59:33', 91),
('DoctrineMigrations\\Version20230120000839', '2023-01-20 00:08:47', 121),
('DoctrineMigrations\\Version20230120011636', '2023-01-20 01:17:00', 107),
('DoctrineMigrations\\Version20230120013050', '2023-01-20 01:30:58', 61),
('DoctrineMigrations\\Version20230120181730', '2023-01-20 18:17:41', 64),
('DoctrineMigrations\\Version20230121084948', '2023-01-21 08:49:54', 112),
('DoctrineMigrations\\Version20230122184113', '2023-01-22 18:41:27', 135),
('DoctrineMigrations\\Version20230122214133', '2023-01-22 21:41:46', 178),
('DoctrineMigrations\\Version20230222105813', '2023-02-22 10:58:26', 90),
('DoctrineMigrations\\Version20230222114204', '2023-02-22 11:42:08', 124),
('DoctrineMigrations\\Version20230222134518', '2023-02-22 13:45:27', 74);

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `particularites`
--

CREATE TABLE `particularites` (
  `id` int(11) NOT NULL,
  `id_corporation` int(11) NOT NULL,
  `particularite` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `particularites`
--

INSERT INTO `particularites` (`id`, `id_corporation`, `particularite`) VALUES
(1, 1, 'Test 1'),
(2, 1, 'Test 2');

-- --------------------------------------------------------

--
-- Structure de la table `ville`
--

CREATE TABLE `ville` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blason` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `region` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `ville`
--

INSERT INTO `ville` (`id`, `nom`, `blason`, `country`, `region`) VALUES
(1, 'Paris', 'assets/img/villes/Paris.jpg', 'France', 'Ile-de-France'),
(2, 'Créteil', 'assets/img/villes/Créteil.jpg', 'France', 'Ile-de-France'),
(3, 'Lille', 'assets/img/villes/Lille.jpg', 'France', 'Haut-de-France'),
(4, 'Valenciennes', 'assets/img/villes/Valenciennes.png', 'France', 'Haut-de-France'),
(5, 'Metz', 'assets/img/villes/Metz.png', 'France', 'Grand Est'),
(6, 'Tours', 'assets/img/villes/Tours.jpg', 'France', 'Centre-Val de Loire'),
(7, 'Namur', 'assets/img/villes/Namur.jpg', 'Belgique', 'Namur'),
(8, 'Liège', 'assets/img/villes/Liège.jpg', 'Belgique', 'Liège'),
(9, 'Louvain-la-Neuve', 'assets/img/villes/Louvain-la-Neuve.jpg', 'Belgique', 'Brabant Wallon'),
(10, 'Charleroi', 'assets/img/villes/Charleroi.jpg', 'Belgique', 'Hainaut');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `anecdotes`
--
ALTER TABLE `anecdotes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `chant`
--
ALTER TABLE `chant`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `chicken`
--
ALTER TABLE `chicken`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8826BE9CE7927C74` (`email`);

--
-- Index pour la table `corporations`
--
ALTER TABLE `corporations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `decorum`
--
ALTER TABLE `decorum`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Index pour la table `particularites`
--
ALTER TABLE `particularites`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ville`
--
ALTER TABLE `ville`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `anecdotes`
--
ALTER TABLE `anecdotes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `chant`
--
ALTER TABLE `chant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `chicken`
--
ALTER TABLE `chicken`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `corporations`
--
ALTER TABLE `corporations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `decorum`
--
ALTER TABLE `decorum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `particularites`
--
ALTER TABLE `particularites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `ville`
--
ALTER TABLE `ville`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
