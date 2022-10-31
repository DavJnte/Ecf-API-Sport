-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 31 oct. 2022 à 11:15
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `user_management`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$v9rIeqW/TMS9rvewvH2cDuq9PH7SWqVImlqgDfnIXSnfjZ3/4re9q');

-- --------------------------------------------------------

--
-- Structure de la table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `permissions`
--

INSERT INTO `permissions` (`id`, `nom`, `created_at`, `updated_at`) VALUES
(9, 'Vendre des boissons', '2022-10-23 19:22:43', '2022-10-23 19:22:43'),
(14, 'Gérer planning équipe', '2022-10-24 08:41:45', '2022-10-24 08:41:45'),
(15, 'Promotions', '2022-10-24 08:41:59', '2022-10-24 08:41:59'),
(16, 'Mailing', '2022-10-24 08:42:43', '2022-10-24 08:43:04'),
(17, 'Vendre des Vêtements', '2022-10-24 10:34:13', '2022-10-27 12:05:47'),
(18, 'Restauration', '2022-10-27 12:01:48', '2022-10-27 12:01:48'),
(19, 'Distributeur de marchandise', '2022-10-27 12:02:18', '2022-10-27 12:02:18'),
(20, 'Abonnement Mensuel', '2022-10-27 12:03:24', '2022-10-27 12:03:24'),
(21, 'Abonnement Annuel', '2022-10-27 12:03:51', '2022-10-29 10:52:54'),
(22, 'Entré Automatisé', '2022-10-27 12:05:21', '2022-10-27 12:05:21');

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libellé` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`id`, `libellé`) VALUES
(2, 'Franchise'),
(3, 'Structure');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `token` varchar(100) NOT NULL,
  `token_expire` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL,
  `verified` tinyint(4) NOT NULL DEFAULT '0',
  `parent` int(11) DEFAULT '0',
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  `role` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `role` (`role`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `adresse`, `token`, `token_expire`, `created_at`, `updated_at`, `verified`, `parent`, `deleted`, `role`) VALUES
(29, 'Madness Club', 'mad@orange.fr', '$2y$10$uruXWReTXopKeUPwP2R37eaDW/lbQ1OgEJp9Zc/vqD/5EXcIobN2W', '5 place du fief', 'mad888', '2022-10-30 23:01:56', '2022-10-25 11:08:28', '2022-10-27 12:41:06', 0, 0, 0, 2),
(36, 'Club Célestin', 'lecelestin@gmail.com', '$2y$10$obAdCtKoqZ7ncC1vkwBde.vwOK/H6.N6ISbu1SOrjvVP4xQ0z6SMa', '58 rue du paradis', 'celst77', '2022-10-30 23:02:08', '2022-10-27 12:08:40', '2022-10-27 12:40:13', 0, 0, 0, 2),
(38, 'Basic Fitness', 'bfitness@gmail.com', '$2y$10$XMB4X4YJ4jyy3lo6DDsPcebF6.ScpAW0q.ur58fOIRMeJR0FNTTpK', 'place du centre', 'basi404', '2022-10-30 23:02:15', '2022-10-27 12:43:51', '2022-10-27 12:43:51', 0, 0, 0, 2),
(39, 'Venusta', 'venus.cref@orange.fr', '$2y$10$HS.cernag7fK/RSThhaOa.RrD2X30ihwleLJxXRPPsrja/8xGHs7m', '7 rue de la fontaine', 'yoump88', '2022-10-30 23:02:23', '2022-10-27 12:46:52', '2022-10-27 12:46:52', 0, 0, 0, 2),
(40, 'Pharos', 'pharos.grof@gmail.com', '$2y$10$TOP.rYRLzyfRaRPgphjbVeP6Oi33Ati4Q4XdZ63j1sKH3v0PAqygG', 'place de Paris', '555clopm', '2022-10-30 23:02:31', '2022-10-27 12:48:22', '2022-10-27 12:48:22', 0, 0, 0, 2),
(41, 'AgfaOne', 'ag.afa@gmail.com', '$2y$10$QsGVcVOGj7OAhD4nVM/sHO0aKColMki/pyh3gceCv.JUeLWjbUmwK', '42 rue de Baudry', '7f7pp555', '2022-10-30 23:02:38', '2022-10-27 12:50:51', '2022-10-27 12:50:51', 0, 0, 0, 2),
(42, 'Telcom', 'tel.com88@gmail.com', '$2y$10$R6.iAeS23N7AQ5rKjyPqrujP9s4TgcfOAw8NO3d.vFLz49GCKOR.S', '3 place Letellier', 'lllop887dd', '2022-10-30 23:02:45', '2022-10-27 12:51:57', '2022-10-27 14:30:09', 0, 0, 0, 2),
(43, 'AquaBasic', 'aquab@orange.fr', '$2y$10$fe4xF5DV6.amlYCZCEBLNOKL2vjZuqGejduvQ4wgcfMLv84FMt.DK', '92 rue de Gautier', 'ppssc887', '2022-10-30 23:02:51', '2022-10-27 12:53:31', '2022-10-27 12:53:31', 0, 0, 0, 2),
(44, 'AquaBasic Nantes', 'io.hector@orange.fr', '$2y$10$wQPs9ZCjtQNV4rI4.Pq44OLpAuHSbQbMPmFnVVJAVWQtLvRJCyOLi', '8 place de la mairie', 'youin8ll9', '2022-10-27 16:08:51', '2022-10-27 13:54:16', '2022-10-27 14:08:51', 0, 43, 0, 3),
(45, 'Telcom Paris', 'hubert.tel@gmail.com', '$2y$10$.SyZX/M7Ru9VutaWkHuJ7umyyWfVZLLxOhhqdggg/00zC6KpE7WAa', '1 boulevard Blanchard', '44nnppf6', '2022-10-28 20:32:13', '2022-10-27 14:14:11', '2022-10-27 14:14:11', 0, 42, 1, 3),
(46, 'Telcom Moulins', 'george.senprin@orange.fr', '$2y$10$kFni8ccjXzWl9PFJkoSDwe4Ag.woU1SUWE29r9/td5778sp1v957m', 'place de Aubert', 'tty77cxs', '2022-10-27 16:15:46', '2022-10-27 14:15:46', '2022-10-27 14:15:46', 0, 42, 0, 3),
(47, 'AgfaOne Lyon', 'xavier.north@gmail.com', '$2y$10$WE1GVtLLCa2chtwwJ/K1B.U2qMD0x5C6OxI4rocVNyvjTXB2EYQla', '46 avenue Denise Ollivier', 'xxx23pp77', '2022-10-27 16:16:49', '2022-10-27 14:16:49', '2022-10-27 14:16:49', 0, 41, 0, 3),
(48, 'Venusta Nevers', 'corentin.nerty@orange.fr', '$2y$10$j2XraLVS68W7crkjoIW3k.IEwRaKjssBU4OifncxePsh9Fd/mG1iG', '91 chemin de Dupuy', '77gg5bn', '2022-10-27 16:19:13', '2022-10-27 14:19:13', '2022-10-27 14:19:13', 0, 39, 0, 3),
(49, 'Madness Bordeaux', 'fific.got@gmail.com', '$2y$10$KaefWkzh/LyZyFmUtfk7..zftZyQvUnAIrRFhb4i79.PAq.dWZE.a', '2 impasse de Marques', 'ciciv45', '2022-10-27 16:21:57', '2022-10-27 14:21:57', '2022-10-27 14:21:57', 0, 29, 0, 3),
(50, 'Pharos Lille', 'kokorico.vio@gmail.com', '$2y$10$kO5hmsUPq8di9mXA2OHzyO9kapZIdMGf6f5aXy19owMW3dHSIYr82', '7 rue Paul Roger', 'fvkko89', '2022-10-27 16:24:43', '2022-10-27 14:24:43', '2022-10-27 14:24:43', 0, 40, 0, 3),
(51, 'Club Célestin Paris', 'beaugrand@gmail.com', '$2y$10$62QO1YxWupePWoDijxnbYucSLlbZOGYV1gUAA6mP.4WRPvk91BoXW', '43 chemin de Grondin', 'ww1ss55', '2022-10-28 20:32:07', '2022-10-27 14:27:00', '2022-10-27 14:27:00', 0, 36, 1, 3),
(52, 'Basic Fitness Marseille', 'fivio.corthe@gmail.com', '$2y$10$WbBGnTi3LtbV.olfhZiCpuDIM1OCf7nGPW92UGOjzEoVeS0czHbsO', '13 rue Delaunay', 'dd77v1', '2022-10-27 16:29:29', '2022-10-27 14:29:29', '2022-10-27 14:29:29', 0, 38, 0, 3);

-- --------------------------------------------------------

--
-- Structure de la table `user_permissions`
--

DROP TABLE IF EXISTS `user_permissions`;
CREATE TABLE IF NOT EXISTS `user_permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) NOT NULL,
  `permission` int(11) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=144 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user_permissions`
--

INSERT INTO `user_permissions` (`id`, `user`, `permission`, `created_at`, `updated_at`) VALUES
(115, 36, 15, '2022-10-27 12:40:13', '2022-10-27 12:40:13'),
(116, 36, 18, '2022-10-27 12:40:13', '2022-10-27 12:40:13'),
(117, 36, 19, '2022-10-27 12:40:13', '2022-10-27 12:40:13'),
(118, 36, 22, '2022-10-27 12:40:13', '2022-10-27 12:40:13'),
(119, 29, 9, '2022-10-27 12:41:06', '2022-10-27 12:41:06'),
(120, 29, 15, '2022-10-27 12:41:06', '2022-10-27 12:41:06'),
(121, 38, 9, '2022-10-27 12:43:51', '2022-10-27 12:43:51'),
(122, 38, 16, '2022-10-27 12:43:51', '2022-10-27 12:43:51'),
(123, 38, 20, '2022-10-27 12:43:51', '2022-10-27 12:43:51'),
(124, 39, 15, '2022-10-27 12:46:52', '2022-10-27 12:46:52'),
(125, 39, 16, '2022-10-27 12:46:52', '2022-10-27 12:46:52'),
(126, 39, 22, '2022-10-27 12:46:52', '2022-10-27 12:46:52'),
(127, 40, 9, '2022-10-27 12:48:22', '2022-10-27 12:48:22'),
(128, 40, 15, '2022-10-27 12:48:22', '2022-10-27 12:48:22'),
(129, 40, 18, '2022-10-27 12:48:22', '2022-10-27 12:48:22'),
(130, 40, 20, '2022-10-27 12:48:22', '2022-10-27 12:48:22'),
(131, 40, 22, '2022-10-27 12:48:22', '2022-10-27 12:48:22'),
(132, 41, 17, '2022-10-27 12:50:51', '2022-10-27 12:50:51'),
(136, 43, 21, '2022-10-27 12:53:31', '2022-10-27 12:53:31'),
(137, 42, 9, '2022-10-27 14:30:09', '2022-10-27 14:30:09'),
(138, 42, 14, '2022-10-27 14:30:09', '2022-10-27 14:30:09'),
(139, 42, 20, '2022-10-27 14:30:09', '2022-10-27 14:30:09'),
(140, 53, 16, '2022-10-28 14:09:11', '2022-10-28 14:09:11'),
(141, 54, 14, '2022-10-28 19:31:52', '2022-10-28 19:31:52'),
(142, 55, 15, '2022-10-30 21:16:36', '2022-10-30 21:16:36'),
(143, 57, 15, '2022-10-30 22:04:31', '2022-10-30 22:04:31');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `role` FOREIGN KEY (`role`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
