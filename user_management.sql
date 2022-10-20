-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mar. 18 oct. 2022 à 08:34
-- Version du serveur : 8.0.26
-- Version de PHP : 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données : `user_management`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$v9rIeqW/TMS9rvewvH2cDuq9PH7SWqVImlqgDfnIXSnfjZ3/4re9q');

-- --------------------------------------------------------

--
-- Structure de la table `feedback`
--

CREATE TABLE `feedback` (
  `id` int NOT NULL,
  `uid` int NOT NULL,
  `subject` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `feedback` mediumtext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `replied` tinyint NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `feedback`
--

INSERT INTO `feedback` (`id`, `uid`, `subject`, `feedback`, `created_at`, `replied`) VALUES
(6, 1, 'Changer adresse Mail', 'Bonjour, \r\nJ&#039;aimerai changer mot adresse email car celle-ci &agrave; &eacute;t&eacute; pirat&eacute; merci !', '2022-10-11 20:40:58', 0),
(7, 1, 'Hello', 'Merci', '2022-10-11 20:41:52', 1);

-- --------------------------------------------------------

--
-- Structure de la table `notification`
--

CREATE TABLE `notification` (
  `id` int NOT NULL,
  `uid` int NOT NULL,
  `type` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `message` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `notification`
--

INSERT INTO `notification` (`id`, `uid`, `type`, `message`, `created_at`) VALUES
(52, 1, 'admin', 'Profile Updated.', '2022-10-12 14:15:37');

-- --------------------------------------------------------

--
-- Structure de la table `permissions`
--

CREATE TABLE `permissions` (
  `id` int NOT NULL,
  `nom` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `permissions`
--

INSERT INTO `permissions` (`id`, `nom`, `code`, `created_at`, `updated_at`) VALUES
(2, 'Accueil', 'home_view', '2022-10-17 20:31:42', '2022-10-17 20:32:59');

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `id` int NOT NULL,
  `libellé` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`id`, `libellé`) VALUES
(2, 'Franchise'),
(3, 'Structure');

-- --------------------------------------------------------

--
-- Structure de la table `structure`
--

CREATE TABLE `structure` (
  `id` int NOT NULL,
  `address` varchar(50) NOT NULL,
  `city` text NOT NULL,
  `mail_gerant` varchar(50) NOT NULL,
  `ui_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `structure`
--

INSERT INTO `structure` (`id`, `address`, `city`, `mail_gerant`, `ui_id`) VALUES
(1, '28 rue de la croix', 'Nantes', 'Jean.miro@gmail.om', 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `photo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `token` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `token_expire` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL,
  `verified` tinyint NOT NULL DEFAULT '0',
  `parent` int DEFAULT NULL,
  `deleted` tinyint NOT NULL DEFAULT '0',
  `role` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `photo`, `token`, `token_expire`, `created_at`, `updated_at`, `verified`, `parent`, `deleted`, `role`) VALUES
(1, 'Madness Lyon', 'vivi@gmail.com', '$2y$10$9d4t4x1XMuTyWddwMVHQheQEWA3EZ6uvMaCLmam7Ozkjh1ZO4DJyC', 'uploads/12518570_0.png', '96a05d24f2334', '2022-10-13 15:56:38', '2022-10-11 13:16:06', '0000-00-00 00:00:00', 0, NULL, 0, 3),
(3, 'Madness', 'george.dim@gmail.com', 'roro1234', '', '', '2022-10-13 13:38:20', '2022-10-13 09:53:22', '0000-00-00 00:00:00', 1, NULL, 0, 2),
(4, 'Crosfit Club', 'corsfit.c@gmail.com', 'croscros71', '', '', '2022-10-13 13:55:32', '2022-10-13 13:55:32', '0000-00-00 00:00:00', 0, NULL, 0, 2),
(5, 'Crosfit Paris', 'jean.dimi@orange.fr', 'jjdimi4456', '', '', '2022-10-13 13:57:02', '2022-10-13 13:57:02', '0000-00-00 00:00:00', 0, NULL, 0, 3),
(14, 'Nezha', 'nezh@is.god', '$2y$10$gVEYdCX.VLlHU2V0qeiWZudAHR7ZnWLB7SWHOiJL/t./3KobnJZBq', NULL, 'azerty', '2022-10-18 07:38:52', '2022-10-18 06:38:52', '2022-10-18 06:38:52', 0, NULL, 0, 2),
(15, 'Sherlock', 'admin@admin.com', '$2y$10$uvsk/WlarYN8cNoB56oPP.0AvOYhWKO/PNLHdKPgtoeDntcyjBWNe', NULL, 'azaza', '2022-10-18 08:29:17', '2022-10-18 07:22:15', '2022-10-18 07:29:17', 0, 14, 0, 3);

-- --------------------------------------------------------

--
-- Structure de la table `user_permissions`
--

CREATE TABLE `user_permissions` (
  `id` int NOT NULL,
  `user` int NOT NULL,
  `permission` int NOT NULL,
  `active_flag` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user_permissions`
--

INSERT INTO `user_permissions` (`id`, `user`, `permission`, `active_flag`, `created_at`, `updated_at`) VALUES
(1, 14, 2, 1, '2022-10-18 06:38:52', '2022-10-18 06:38:52');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid` (`uid`);

--
-- Index pour la table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid` (`uid`);

--
-- Index pour la table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `structure`
--
ALTER TABLE `structure`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posseder` (`ui_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role` (`role`);

--
-- Index pour la table `user_permissions`
--
ALTER TABLE `user_permissions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT pour la table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `structure`
--
ALTER TABLE `structure`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `user_permissions`
--
ALTER TABLE `user_permissions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `structure`
--
ALTER TABLE `structure`
  ADD CONSTRAINT `posseder` FOREIGN KEY (`ui_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `role` FOREIGN KEY (`role`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
