-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : portfolio_mysql
-- Généré le : mer. 09 mars 2022 à 06:25
-- Version du serveur :  5.7.31
-- Version de PHP : 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `portfolio`
--

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
('DoctrineMigrations\\Version20220209111241', '2022-02-09 11:15:09', 31),
('DoctrineMigrations\\Version20220209112638', '2022-02-09 11:26:58', 62),
('DoctrineMigrations\\Version20220209114435', '2022-02-09 11:44:53', 64),
('DoctrineMigrations\\Version20220224082619', '2022-02-24 08:26:46', 23);

-- --------------------------------------------------------

--
-- Structure de la table `feature`
--

CREATE TABLE `feature` (
  `id` int(11) NOT NULL,
  `projects_id` int(11) NOT NULL,
  `text` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `updated_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `feature`
--

INSERT INTO `feature` (`id`, `projects_id`, `text`, `created_at`, `updated_at`) VALUES
(1, 1, 'zone d\'administration', '2022-02-24 15:28:27', '2022-02-24 15:28:27'),
(2, 1, 'rôles et permissions', '2022-02-24 15:28:27', '2022-02-24 15:28:27'),
(3, 1, 'formulaire d\'inscription', '2022-02-24 15:28:27', '2022-02-24 15:28:27'),
(4, 1, 'mot de passe oublié', '2022-02-24 15:28:27', '2022-02-24 15:28:27'),
(5, 3, 'authentification des clients via JWT', '2022-02-24 15:28:27', '2022-02-24 15:28:27'),
(6, 3, 'documentation de l\'API via swagger', '2022-02-24 15:28:27', '2022-02-24 15:28:27'),
(7, 3, 'modèle de maturité de Richardson (niveau 1, 2 et 3)', '2022-02-24 15:28:27', '2022-02-24 15:28:27'),
(8, 2, 'corrections des anomalies (rôle et permissions)', '2022-02-24 15:28:27', '2022-02-24 15:28:27'),
(9, 2, 'implémentation de tests unitaires et fonctionnels', '2022-02-24 15:28:27', '2022-02-24 15:28:27'),
(10, 2, 'audit qualité de code (Codacy) & de performance (Blackfire)', '2022-02-24 15:28:27', '2022-02-24 15:28:27'),
(11, 2, 'documentation technique', '2022-02-24 15:28:27', '2022-02-24 15:28:27'),
(12, 4, 'intégration d\'un thème (Ocean WP)', '2022-02-24 15:28:27', '2022-02-24 15:28:27'),
(13, 4, 'intégration de différents plugins (SEOPress, Wordfency Sécurité, WP Mail SMTP, WP Form Lite ...)', '2022-02-24 15:28:27', '2022-02-24 15:28:27'),
(14, 4, 'documentation d\'utilisation du site pour le client', '2022-02-24 15:28:27', '2022-02-24 15:28:27');

-- --------------------------------------------------------

--
-- Structure de la table `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url_site` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url_github` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activated` tinyint(1) DEFAULT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `updated_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `project`
--

INSERT INTO `project` (`id`, `name`, `description`, `image`, `url_site`, `url_github`, `activated`, `created_at`, `updated_at`) VALUES
(1, 'SnowTricks', 'site communautaire autour du snowboard', 'snowtricks.png', 'https://projet6.fleurdeveley.fr/', 'https://github.com/fleurdeveley/OC_P6_SnowTricks', 1, '2022-02-24 15:28:27', '2022-02-24 15:28:27'),
(2, 'ToDoList', 'amélioration d’une application existante sur la gestion d’une To Do List', 'todolist.png', '', 'https://github.com/fleurdeveley/OC_P8_ToDo-Co', 1, '2022-02-24 15:28:27', '2022-02-24 15:28:27'),
(3, 'BileMo', 'création d\'un service web exposant une API mettant à disposition un catalogue de smartphones, pour du B2B', 'api.png', '', 'https://github.com/fleurdeveley/OC_P7_BileMo', 1, '2022-02-24 15:28:27', '2022-02-24 15:28:27'),
(4, 'Chalets et caviar', 'site d\'une agence immobilière de prestige à Courchevel', 'chaletsetcaviar.png', '', 'https://projet2.fleurdeveley.fr/', 1, '2022-02-24 15:28:27', '2022-02-24 15:28:27');

-- --------------------------------------------------------

--
-- Structure de la table `skill`
--

CREATE TABLE `skill` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `updated_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `skill`
--

INSERT INTO `skill` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'symfony', '2022-02-24 15:28:27', '2022-02-24 15:28:27'),
(2, 'composer', '2022-02-24 15:28:27', '2022-02-24 15:28:27'),
(3, 'bootstrap', '2022-02-24 15:28:27', '2022-02-24 15:28:27'),
(4, 'uml', '2022-02-24 15:28:27', '2022-02-24 15:28:27'),
(5, 'api rest', '2022-02-24 15:28:27', '2022-02-24 15:28:27'),
(6, 'phpunit', '2022-02-24 15:28:27', '2022-02-24 15:28:27'),
(7, 'wordpress', '2022-02-24 15:28:27', '2022-02-24 15:28:27'),
(8, 'integration', '2022-02-24 15:28:27', '2022-02-24 15:28:27');

-- --------------------------------------------------------

--
-- Structure de la table `skill_project`
--

CREATE TABLE `skill_project` (
  `skill_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `skill_project`
--

INSERT INTO `skill_project` (`skill_id`, `project_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 1),
(3, 1),
(4, 1),
(5, 3),
(6, 2),
(7, 4),
(8, 4);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`) VALUES
(1, 'fleurdeveley@gmail.com', '[\"ROLE_ADMIN\"]', '$2y$13$IvH2RSffBAvSU1Eg606fk.R.2fW5zUm/py0UABdmAJOr5oZnrbxsm');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `feature`
--
ALTER TABLE `feature`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_1FD775661EDE0F55` (`projects_id`);

--
-- Index pour la table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `skill`
--
ALTER TABLE `skill`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `skill_project`
--
ALTER TABLE `skill_project`
  ADD PRIMARY KEY (`skill_id`,`project_id`),
  ADD KEY `IDX_35464EC75585C142` (`skill_id`),
  ADD KEY `IDX_35464EC7166D1F9C` (`project_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `feature`
--
ALTER TABLE `feature`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `skill`
--
ALTER TABLE `skill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `feature`
--
ALTER TABLE `feature`
  ADD CONSTRAINT `FK_1FD775661EDE0F55` FOREIGN KEY (`projects_id`) REFERENCES `project` (`id`);

--
-- Contraintes pour la table `skill_project`
--
ALTER TABLE `skill_project`
  ADD CONSTRAINT `FK_35464EC7166D1F9C` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_35464EC75585C142` FOREIGN KEY (`skill_id`) REFERENCES `skill` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
