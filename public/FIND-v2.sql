-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : mar. 31 jan. 2023 à 10:50
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
(1, 'Interfilière', 'IF', '2020-02-01', 'Test', 'test', 'Paris', 'France'),
(2, 'Ingénieurs Puceaux Parisien', 'IPP', '2023-01-19', NULL, '', 'Paris', 'France'),
(3, 'Régionale-Tournai-Mouscron', 'RTM', '2023-01-11', 'test', '', 'Namur', 'Belgique');

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
('DoctrineMigrations\\Version20230122214133', '2023-01-22 21:41:46', 178);

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
-- Index pour la table `ville`
--
ALTER TABLE `ville`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

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
-- AUTO_INCREMENT pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `ville`
--
ALTER TABLE `ville`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
