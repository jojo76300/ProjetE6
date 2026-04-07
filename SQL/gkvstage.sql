-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 02 avr. 2026 à 08:08
-- Version du serveur : 8.3.0
-- Version de PHP : 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gkvstage`
--
CREATE DATABASE IF NOT EXISTS `gkvstage` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `gkvstage`;

-- --------------------------------------------------------

--
-- Structure de la table `archive_entreprise`
--

DROP TABLE IF EXISTS `archive_entreprise`;
CREATE TABLE IF NOT EXISTS `archive_entreprise` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_entreprise` int NOT NULL,
  `type` varchar(12) NOT NULL,
  `nom_old` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nom_new` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `adresse_old` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `adresse_new` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `ville_old` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `ville_new` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `cp_old` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `cp_new` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `contact_old` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `contact_new` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `tel_old` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `tel_new` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email_old` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email_new` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `date_changement` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déclencheurs `archive_entreprise`
--
DROP TRIGGER IF EXISTS `Tri_History_Entreprise`;
DELIMITER $$
CREATE TRIGGER `Tri_History_Entreprise` AFTER INSERT ON `archive_entreprise` FOR EACH ROW BEGIN
        INSERT INTO history (idarchiveentreprise)
        VALUES (new.id);
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `archive_etudiant`
--

DROP TABLE IF EXISTS `archive_etudiant`;
CREATE TABLE IF NOT EXISTS `archive_etudiant` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_etudiant` int NOT NULL,
  `type` varchar(12) NOT NULL,
  `nom_old` varchar(38) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nom_new` varchar(38) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `prenom_old` varchar(38) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `prenom_new` varchar(38) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `filiere_old` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `filiere_new` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `ann_promotion_old` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `ann_promotion_new` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `is_archived_old` tinyint(1) NOT NULL,
  `is_archived_new` tinyint(1) NOT NULL,
  `date_changement` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `archive_etudiant`
--

INSERT INTO `archive_etudiant` (`id`, `id_etudiant`, `type`, `nom_old`, `nom_new`, `prenom_old`, `prenom_new`, `filiere_old`, `filiere_new`, `ann_promotion_old`, `ann_promotion_new`, `is_archived_old`, `is_archived_new`, `date_changement`) VALUES
(27, 105, 'Ajout', '', 'test', '', 'test', '', 'test', '', '2025', 0, 0, '2026-03-24 11:50:44'),
(28, 106, 'Ajout', '', 'tester', '', 'tester', '', 'tester', '', '2024-2026', 0, 1, '2026-03-24 11:51:37'),
(29, 106, 'Suppression', 'tester', '', 'tester', '', 'tester', '', '2024-2026', '', 1, 0, '2026-03-24 11:55:53'),
(30, 107, 'Ajout', '', 'nom', '', 'prenom', '', 'slam', '', '2025', 0, 0, '2026-04-02 08:15:10'),
(31, 107, 'Modification', 'nom', 'nom', 'prenom', 'prenom', 'slam', 'SLAM', '2025', '2025', 0, 0, '2026-04-02 08:15:42'),
(32, 107, 'Modification', 'nom', 'nom', 'prenom', 'prenom', 'SLAM', 'slam', '2025', '2025', 0, 0, '2026-04-02 08:16:07'),
(33, 6, 'Modification', 'Leblanc', 'Leblanc', 'Alice', 'Alice', 'SLAM', 'SLAM', '2024', '0', 0, 0, '2026-04-02 08:41:49'),
(34, 7, 'Modification', 'Moreau', 'Moreau', 'Baptiste', 'Baptiste', 'SISR', 'SISR', '2024', '0', 0, 0, '2026-04-02 08:41:50'),
(35, 8, 'Modification', 'Girard', 'Girard', 'Célia', 'Célia', 'SISR', 'SISR', '2024', '0', 0, 0, '2026-04-02 08:41:50'),
(36, 9, 'Modification', 'Fontaine', 'Fontaine', 'David', 'David', 'SLAM', 'SLAM', '2024', '0', 0, 0, '2026-04-02 08:41:50'),
(37, 10, 'Modification', 'Rousseau', 'Rousseau', 'Emma', 'Emma', 'SLAM', 'SLAM', '2025', '0', 0, 0, '2026-04-02 08:41:50'),
(38, 105, 'Modification', 'test', 'test', 'test', 'test', 'test', 'test', '2025', '0', 0, 0, '2026-04-02 08:41:50'),
(39, 107, 'Modification', 'nom', 'nom', 'prenom', 'prenom', 'slam', 'slam', '2025', '0', 0, 0, '2026-04-02 08:41:50'),
(40, 6, 'Modification', 'Leblanc', 'Leblanc', 'Alice', 'Alice', 'SLAM', 'SLAM', '0', '1', 0, 0, '2026-04-02 08:42:34'),
(41, 7, 'Modification', 'Moreau', 'Moreau', 'Baptiste', 'Baptiste', 'SISR', 'SISR', '0', '1', 0, 0, '2026-04-02 08:42:34'),
(42, 8, 'Modification', 'Girard', 'Girard', 'Célia', 'Célia', 'SISR', 'SISR', '0', '2', 0, 0, '2026-04-02 08:42:34'),
(43, 9, 'Modification', 'Fontaine', 'Fontaine', 'David', 'David', 'SLAM', 'SLAM', '0', '1', 0, 0, '2026-04-02 08:42:34'),
(44, 10, 'Modification', 'Rousseau', 'Rousseau', 'Emma', 'Emma', 'SLAM', 'SLAM', '0', '2', 0, 0, '2026-04-02 08:42:34'),
(45, 105, 'Modification', 'test', 'test', 'test', 'test', 'test', 'test', '0', '2', 0, 0, '2026-04-02 08:42:34'),
(46, 107, 'Modification', 'nom', 'nom', 'prenom', 'prenom', 'slam', 'slam', '0', '1', 0, 0, '2026-04-02 08:42:34');

--
-- Déclencheurs `archive_etudiant`
--
DROP TRIGGER IF EXISTS `Tri_History_Etudiant`;
DELIMITER $$
CREATE TRIGGER `Tri_History_Etudiant` AFTER INSERT ON `archive_etudiant` FOR EACH ROW BEGIN
        INSERT INTO history (idarchiveetudiant)
        VALUES (new.id);
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `archive_stage`
--

DROP TABLE IF EXISTS `archive_stage`;
CREATE TABLE IF NOT EXISTS `archive_stage` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_stage` int NOT NULL,
  `type` varchar(12) NOT NULL,
  `date_debut_old` date NOT NULL,
  `date_debut_new` date NOT NULL,
  `date_fin_old` date NOT NULL,
  `date_fin_new` date NOT NULL,
  `entreprise_id_old` int NOT NULL,
  `entreprise_id_new` int NOT NULL,
  `prof_suivi_id_old` int NOT NULL,
  `prof_suivi_id_new` int NOT NULL,
  `prof_visite_id_old` int NOT NULL,
  `prof_visite_id_new` int NOT NULL,
  `etudiant_id_old` int NOT NULL,
  `etudiant_id_new` int NOT NULL,
  `date_changement` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `archive_stage`
--

INSERT INTO `archive_stage` (`id`, `id_stage`, `type`, `date_debut_old`, `date_debut_new`, `date_fin_old`, `date_fin_new`, `entreprise_id_old`, `entreprise_id_new`, `prof_suivi_id_old`, `prof_suivi_id_new`, `prof_visite_id_old`, `prof_visite_id_new`, `etudiant_id_old`, `etudiant_id_new`, `date_changement`) VALUES
(1, 11, 'Modification', '2000-10-10', '2000-10-10', '2000-12-18', '2000-02-19', 7, 7, 6, 6, 7, 7, 10, 10, '2026-03-24 10:40:13'),
(2, 12, 'Ajout', '0000-00-00', '2000-05-05', '0000-00-00', '2000-05-10', 0, 5, 0, 5, 0, 5, 0, 6, '2026-03-24 10:40:52'),
(3, 12, 'Suppression', '2000-05-05', '0000-00-00', '2000-05-10', '0000-00-00', 5, 0, 5, 0, 5, 0, 6, 0, '2026-03-24 10:41:18'),
(4, 13, 'Ajout', '0000-00-00', '2026-03-01', '0000-00-00', '2026-03-31', 0, 6, 0, 6, 0, 6, 0, 8, '2026-03-24 11:12:53'),
(5, 13, 'Modification', '2026-03-01', '2026-03-01', '2026-03-31', '2026-03-31', 6, 6, 6, 6, 6, 5, 8, 8, '2026-03-24 11:13:04'),
(6, 13, 'Suppression', '2026-03-01', '0000-00-00', '2026-03-31', '0000-00-00', 6, 0, 6, 0, 5, 0, 8, 0, '2026-03-24 11:13:10'),
(7, 14, 'Ajout', '0000-00-00', '2000-02-02', '0000-00-00', '2026-04-02', 0, 5, 0, 5, 0, 6, 0, 6, '2026-03-24 12:12:24'),
(8, 14, 'Modification', '2000-02-02', '2026-04-01', '2026-04-02', '2026-04-02', 5, 5, 5, 5, 6, 6, 6, 6, '2026-03-26 08:29:45'),
(9, 14, 'Suppression', '2026-04-01', '0000-00-00', '2026-04-02', '0000-00-00', 5, 0, 5, 0, 6, 0, 6, 0, '2026-03-26 09:58:12'),
(10, 15, 'Ajout', '0000-00-00', '5000-05-05', '0000-00-00', '2026-03-28', 0, 5, 0, 5, 0, 5, 0, 6, '2026-03-26 09:58:38'),
(11, 15, 'Modification', '5000-05-05', '2025-05-05', '2026-03-28', '2026-03-28', 5, 5, 5, 5, 5, 5, 6, 6, '2026-03-26 09:58:53');

--
-- Déclencheurs `archive_stage`
--
DROP TRIGGER IF EXISTS `Tri_History_Stage`;
DELIMITER $$
CREATE TRIGGER `Tri_History_Stage` AFTER INSERT ON `archive_stage` FOR EACH ROW BEGIN
        INSERT INTO history (idarchivestage)
        VALUES (new.id);
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `avoir`
--

DROP TABLE IF EXISTS `avoir`;
CREATE TABLE IF NOT EXISTS `avoir` (
  `id` int NOT NULL AUTO_INCREMENT,
  `utilisateur_id` int NOT NULL,
  `role_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_659B1A43FB88E14F` (`utilisateur_id`),
  KEY `IDX_659B1A43D60322AC` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `avoir`
--

INSERT INTO `avoir` (`id`, `utilisateur_id`, `role_id`) VALUES
(5, 5, 4),
(6, 6, 5),
(7, 7, 5),
(8, 8, 5);

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20260309095318', '2026-03-10 07:28:09', 363),
('DoctrineMigrations\\Version20260310094312', '2026-03-10 09:43:34', 73),
('DoctrineMigrations\\Version20260316074714', '2026-03-16 07:47:24', 168),
('DoctrineMigrations\\Version20260319084539', '2026-03-24 07:52:51', 7),
('DoctrineMigrations\\Version20260402063313', '2026-04-02 06:36:23', 76);

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

DROP TABLE IF EXISTS `entreprise`;
CREATE TABLE IF NOT EXISTS `entreprise` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ville` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cp` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `entreprise`
--

INSERT INTO `entreprise` (`id`, `nom`, `adresse`, `ville`, `cp`, `contact`, `tel`, `email`) VALUES
(5, 'TechSolutions SARL', '42, rue de la Innovation', 'Lyon', '69000', 'Pierre Durand', '04 72 XX XX XX', 'contact@techsolutions.fr'),
(6, 'Digital Consulting', '15, avenue des Champs', 'Paris', '75008', 'Marie Laurent', '01 XX XX XX XX', 'rh@digitalconsulting.fr'),
(7, 'MecaTech Industries', 'Parc industriel de Blavozy', 'Saint-Étienne', '42000', 'Jean Rivière', '04 77 XX XX XX', 'recrutement@mecarech.fr'),
(8, 'ElectroMaster SAS', 'Zone commerciale de Villeurbanne', 'Villeurbanne', '69100', 'Sophie Bernard', '04 37 XX XX XX', 'contact@electromaster.fr');

--
-- Déclencheurs `entreprise`
--
DROP TRIGGER IF EXISTS `Tri_Archive_Entreprise_Ajout`;
DELIMITER $$
CREATE TRIGGER `Tri_Archive_Entreprise_Ajout` AFTER INSERT ON `entreprise` FOR EACH ROW BEGIN
        INSERT INTO archive_entreprise (id_entreprise, type, nom_new, adresse_new, ville_new, cp_new, contact_new, tel_new, email_new, date_changement)
        VALUES (NEW.id, 'Ajout', NEW.nom, NEW.adresse, NEW.ville, NEW.cp, NEW.contact, NEW.tel, NEW.email, NOW());
    END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `Tri_Archive_Entreprise_Modification`;
DELIMITER $$
CREATE TRIGGER `Tri_Archive_Entreprise_Modification` AFTER UPDATE ON `entreprise` FOR EACH ROW BEGIN
        INSERT INTO archive_entreprise (id_entreprise, type, nom_old, nom_new, adresse_old, adresse_new, ville_old, ville_new, cp_old, cp_new, contact_old, contact_new, tel_old, tel_new, email_old, email_new, date_changement)
        VALUES (NEW.id, 'Modification', OLD.nom, NEW.nom, OLD.adresse, NEW.adresse, OLD.ville, NEW.ville, OLD.cp, NEW.cp, OLD.contact, NEW.contact, OLD.tel, NEW.tel, OLD.email, NEW.email, NOW());
    END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `Tri_Archive_Entreprise_Suppression`;
DELIMITER $$
CREATE TRIGGER `Tri_Archive_Entreprise_Suppression` AFTER DELETE ON `entreprise` FOR EACH ROW BEGIN
        INSERT INTO archive_entreprise (id_entreprise, type, nom_old, adresse_old, ville_old, cp_old, contact_old, tel_old, email_old, date_changement)
        VALUES (OLD.id, 'Suppression', OLD.nom, OLD.adresse, OLD.ville, OLD.cp, OLD.contact, OLD.tel, OLD.email, NOW());
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

DROP TABLE IF EXISTS `etudiant`;
CREATE TABLE IF NOT EXISTS `etudiant` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(38) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(38) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `filiere` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ann_promotion` int NOT NULL,
  `is_archived` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_EtudiantPromotion` (`ann_promotion`)
) ENGINE=InnoDB AUTO_INCREMENT=108 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`id`, `nom`, `prenom`, `filiere`, `ann_promotion`, `is_archived`) VALUES
(6, 'Leblanc', 'Alice', 'SLAM', 1, 0),
(7, 'Moreau', 'Baptiste', 'SISR', 1, 0),
(8, 'Girard', 'Célia', 'SISR', 2, 0),
(9, 'Fontaine', 'David', 'SLAM', 1, 0),
(10, 'Rousseau', 'Emma', 'SLAM', 2, 0),
(105, 'test', 'test', 'test', 2, 0),
(107, 'nom', 'prenom', 'slam', 1, 0);

--
-- Déclencheurs `etudiant`
--
DROP TRIGGER IF EXISTS `Tri_Archive_Etudiant_Ajout`;
DELIMITER $$
CREATE TRIGGER `Tri_Archive_Etudiant_Ajout` AFTER INSERT ON `etudiant` FOR EACH ROW BEGIN
        INSERT INTO archive_etudiant (id_etudiant, type, nom_new, prenom_new, filiere_new, ann_promotion_new, is_archived_new, date_changement)
        VALUES (NEW.id, 'Ajout', NEW.nom, NEW.prenom, NEW.filiere, NEW.ann_promotion, NEW.is_archived, NOW());
    END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `Tri_Archive_Etudiant_Modification`;
DELIMITER $$
CREATE TRIGGER `Tri_Archive_Etudiant_Modification` AFTER UPDATE ON `etudiant` FOR EACH ROW BEGIN
        INSERT INTO archive_etudiant (id_etudiant, type, nom_old, nom_new, prenom_old, prenom_new, filiere_old, filiere_new, ann_promotion_old, ann_promotion_new, is_archived_old, is_archived_new, date_changement)
        VALUES (NEW.id, 'Modification', OLD.nom, NEW.nom, OLD.prenom, NEW.prenom, OLD.filiere, NEW.filiere, OLD.ann_promotion, NEW.ann_promotion, OLD.is_archived, NEW.is_archived, NOW());
    END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `Tri_Archive_Etudiant_Suppression`;
DELIMITER $$
CREATE TRIGGER `Tri_Archive_Etudiant_Suppression` AFTER DELETE ON `etudiant` FOR EACH ROW BEGIN
        INSERT INTO archive_etudiant (id_etudiant, type, nom_old, prenom_old, filiere_old, ann_promotion_old, is_archived_old, date_changement)
        VALUES (OLD.id, 'Suppression', OLD.nom, OLD.prenom, OLD.filiere, OLD.ann_promotion, OLD.is_archived, NOW());
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `history`
--

DROP TABLE IF EXISTS `history`;
CREATE TABLE IF NOT EXISTS `history` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idarchiveetudiant` int DEFAULT NULL,
  `idarchiveentreprise` int DEFAULT NULL,
  `idarchivestage` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_27BA704B4EE739A4` (`idarchiveentreprise`),
  KEY `IDX_27BA704BE9D34AE0` (`idarchivestage`),
  KEY `IDX_27BA704B8909C2E8` (`idarchiveetudiant`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `history`
--

INSERT INTO `history` (`id`, `idarchiveetudiant`, `idarchiveentreprise`, `idarchivestage`) VALUES
(35, 29, NULL, NULL),
(36, NULL, NULL, 7),
(37, NULL, NULL, 8),
(38, NULL, NULL, 9),
(39, NULL, NULL, 10),
(40, NULL, NULL, 11),
(41, 30, NULL, NULL),
(42, 31, NULL, NULL),
(43, 32, NULL, NULL),
(44, 33, NULL, NULL),
(45, 34, NULL, NULL),
(46, 35, NULL, NULL),
(47, 36, NULL, NULL),
(48, 37, NULL, NULL),
(49, 38, NULL, NULL),
(50, 39, NULL, NULL),
(51, 40, NULL, NULL),
(52, 41, NULL, NULL),
(53, 42, NULL, NULL),
(54, 43, NULL, NULL),
(55, 44, NULL, NULL),
(56, 45, NULL, NULL),
(57, 46, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

DROP TABLE IF EXISTS `messenger_messages`;
CREATE TABLE IF NOT EXISTS `messenger_messages` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `body` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_75EA56E0FB7336F0E3BD61CE16BA31DBBF396750` (`queue_name`,`available_at`,`delivered_at`,`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `promotion`
--

DROP TABLE IF EXISTS `promotion`;
CREATE TABLE IF NOT EXISTS `promotion` (
  `id` int NOT NULL AUTO_INCREMENT,
  `classe` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `session` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_debut_stage` date NOT NULL,
  `date_fin_stage` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `promotion`
--

INSERT INTO `promotion` (`id`, `classe`, `session`, `date_debut_stage`, `date_fin_stage`) VALUES
(1, '2SIO', '2025/2026', '2026-01-05', '2026-02-13'),
(2, '1SIO', '2024/2025', '2025-05-29', '2025-06-28');

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `id` int NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`id`, `libelle`, `description`) VALUES
(4, 'Administrateur', 'Accès complet à l\'application'),
(5, 'Professeur', 'Peut suivre et visiter les stages des étudiants'),
(6, 'Étudiant', 'Peut consulter ses stages');

-- --------------------------------------------------------

--
-- Structure de la table `stage`
--

DROP TABLE IF EXISTS `stage`;
CREATE TABLE IF NOT EXISTS `stage` (
  `id` int NOT NULL AUTO_INCREMENT,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `entreprise_id` int NOT NULL,
  `prof_suivi_id` int NOT NULL,
  `prof_visite_id` int NOT NULL,
  `etudiant_id` int NOT NULL,
  `commentaire` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `IDX_C27C9369A4AEAFEA` (`entreprise_id`),
  KEY `IDX_C27C9369D5073BAA` (`prof_suivi_id`),
  KEY `IDX_C27C93696C08B97D` (`prof_visite_id`),
  KEY `IDX_C27C9369DDEAB1A3` (`etudiant_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `stage`
--

INSERT INTO `stage` (`id`, `date_debut`, `date_fin`, `entreprise_id`, `prof_suivi_id`, `prof_visite_id`, `etudiant_id`, `commentaire`) VALUES
(6, '2024-09-01', '2024-12-15', 5, 6, 7, 6, NULL),
(7, '2024-10-15', '2025-01-30', 6, 6, 8, 7, NULL),
(8, '2025-02-01', '2025-05-31', 7, 7, 6, 8, NULL),
(9, '2024-09-15', '2024-12-20', 8, 8, 7, 9, NULL),
(11, '2000-10-10', '2000-02-19', 7, 6, 7, 10, NULL),
(15, '2025-05-05', '2026-03-28', 5, 5, 5, 6, NULL);

--
-- Déclencheurs `stage`
--
DROP TRIGGER IF EXISTS `Tri_Archive_Stage_Ajout`;
DELIMITER $$
CREATE TRIGGER `Tri_Archive_Stage_Ajout` AFTER INSERT ON `stage` FOR EACH ROW BEGIN
        INSERT INTO archive_stage (id_stage, type, date_debut_new, date_fin_new, entreprise_id_new, prof_suivi_id_new, prof_visite_id_new, etudiant_id_new, date_changement)
        VALUES (NEW.id, 'Ajout', NEW.date_debut, NEW.date_fin, NEW.entreprise_id, NEW.prof_suivi_id, NEW.prof_visite_id, NEW.etudiant_id, NOW());
    END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `Tri_Archive_Stage_Modification`;
DELIMITER $$
CREATE TRIGGER `Tri_Archive_Stage_Modification` AFTER UPDATE ON `stage` FOR EACH ROW BEGIN
        INSERT INTO archive_stage (id_stage, type, date_debut_old, date_debut_new, date_fin_old, date_fin_new, entreprise_id_old, entreprise_id_new, prof_suivi_id_old, prof_suivi_id_new, prof_visite_id_old, prof_visite_id_new, etudiant_id_old, etudiant_id_new, date_changement)
        VALUES (NEW.id, 'Modification', OLD.date_debut, NEW.date_debut, OLD.date_fin, NEW.date_fin, OLD.entreprise_id, NEW.entreprise_id, OLD.prof_suivi_id, NEW.prof_suivi_id, OLD.prof_visite_id, NEW.prof_visite_id, OLD.etudiant_id, NEW.etudiant_id, NOW());
    END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `Tri_Archive_Stage_Suppression`;
DELIMITER $$
CREATE TRIGGER `Tri_Archive_Stage_Suppression` AFTER DELETE ON `stage` FOR EACH ROW BEGIN
        INSERT INTO archive_stage (id_stage, type, date_debut_old, date_fin_old, entreprise_id_old, prof_suivi_id_old, prof_visite_id_old, etudiant_id_old, date_changement)
        VALUES (OLD.id, 'Suppression', OLD.date_debut, OLD.date_fin, OLD.entreprise_id, OLD.prof_suivi_id, OLD.prof_visite_id, OLD.etudiant_id, NOW());
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(180) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mdp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_1D1C63B3E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `email`, `mdp`, `status`) VALUES
(5, 'admin@school.fr', '$2y$13$dM7pIgFZ1qMcthn1T3wkmOuBs2j9ZM2ARVPPXtdC4qAbRgs4aJvAW', 1),
(6, 'dupont.jean@school.fr', '$2y$13$wxXWwxPPx2oLsVIKZoQUp.F/APJLFoB6zx4ugBWMZUPeUvWjVnhM6', 1),
(7, 'martin.sophie@school.fr', '$2y$13$9YUSSgw6seA6.zHYfhh2QOnWqunknxQ80WC/4XKa3s9cw6uU78bR6', 1),
(8, 'bernard.michel@school.fr', '$2y$13$whiacgONbga.KCg.yXhqCuRA0jTPdjPnn822ffGpLkklB4IYu2Gzi', 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `avoir`
--
ALTER TABLE `avoir`
  ADD CONSTRAINT `FK_659B1A43D60322AC` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`),
  ADD CONSTRAINT `FK_659B1A43FB88E14F` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD CONSTRAINT `FK_EtudiantPromotion` FOREIGN KEY (`ann_promotion`) REFERENCES `promotion` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `FK_HistoriqueEntreprise` FOREIGN KEY (`idarchiveentreprise`) REFERENCES `archive_entreprise` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `FK_HistoriqueEtudiant` FOREIGN KEY (`idarchiveetudiant`) REFERENCES `archive_etudiant` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `FK_HistoriqueStage` FOREIGN KEY (`idarchivestage`) REFERENCES `archive_stage` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `stage`
--
ALTER TABLE `stage`
  ADD CONSTRAINT `FK_C27C93696C08B97D` FOREIGN KEY (`prof_visite_id`) REFERENCES `utilisateur` (`id`),
  ADD CONSTRAINT `FK_C27C9369A4AEAFEA` FOREIGN KEY (`entreprise_id`) REFERENCES `entreprise` (`id`),
  ADD CONSTRAINT `FK_C27C9369D5073BAA` FOREIGN KEY (`prof_suivi_id`) REFERENCES `utilisateur` (`id`),
  ADD CONSTRAINT `FK_C27C9369DDEAB1A3` FOREIGN KEY (`etudiant_id`) REFERENCES `etudiant` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
