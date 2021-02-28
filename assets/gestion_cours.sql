-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : Dim 28 fév. 2021 à 14:10
-- Version du serveur :  10.5.8-MariaDB
-- Version de PHP : 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion_cours`
--

-- --------------------------------------------------------

--
-- Structure de la table `apprendre`
--

CREATE TABLE `apprendre` (
  `id_cours` int(11) NOT NULL,
  `id_etudiant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id_cat` int(11) NOT NULL,
  `designation_cat` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id_cat`, `designation_cat`) VALUES
(1, 'INFO_XXX'),
(2, 'GEST_XXX'),
(3, 'COMM_XXX');

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

CREATE TABLE `cours` (
  `id_cours` int(11) NOT NULL,
  `nom_cours` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_cat` int(11) NOT NULL,
  `id_professeur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `cours`
--

INSERT INTO `cours` (`id_cours`, `nom_cours`, `id_cat`, `id_professeur`) VALUES
(1, 'Programmation', 1, 2),
(2, 'Maintenance', 1, 1),
(3, 'Architecture', 1, 1),
(4, 'Comptabilite', 2, 1),
(5, 'Economie', 2, 1),
(6, 'Leadership', 3, 2),
(7, 'Anglais', 3, 2);

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `id_etudiant` int(11) NOT NULL,
  `nom_etudiant` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom_etudiant` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_etudiant` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mdp_etudiant` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel_etudiant` double NOT NULL,
  `image_etudiant` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`id_etudiant`, `nom_etudiant`, `prenom_etudiant`, `email_etudiant`, `mdp_etudiant`, `tel_etudiant`, `image_etudiant`, `admin`) VALUES
(1, 'RAJERISON', 'Fabien Julio', 'fabienjulio5@gmail.com', '$2y$10$5oiL2O2SGUnh9MXo31xbyOiyNrGE4hNd7IlGgPbtwLXhwhCtAbY2S', 345256857, '/run/media/fabien/DATA/ETUDE/cv/images/moi.png', 1),
(2, 'Jackson', 'Michael', 'michael@gmail.com', '$2y$10$bkwTBFCup0WBsBA.Niyayu6OkoNH6YzQIRschbw066zaoJmKb5wJC', 322856957, '/run/media/fabien/DATA/ETUDE/cv/images/moi.png', 0),
(3, 'Briant', 'Kobe', 'briant@gmail.com', '$2y$10$XOU1pN9lx2p4xJoqA5A3pOynbGb.aWUXVWaKxvpGigV/g5G0GMNoC', 338768512, '/run/media/fabien/DATA/ETUDE/cv/images/moi.png', 0),
(4, 'Onintsoa', 'Francelle', 'onintsoa@gmail.com', '$2y$10$EHlXXUFbCI2KZfWCgj0LxuCDaBWwBXcKmT0hcfGqUIt7N7IcgtAoW', 342053056, 'HD KDE Plasma Abstract 345 NO LOGO.png', 0);

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id_mess` int(11) NOT NULL,
  `date_mess` datetime NOT NULL,
  `contenu_mess` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_etudiant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id_mess`, `date_mess`, `contenu_mess`, `id_etudiant`) VALUES
(3, '2021-02-24 22:31:51', 'Je suis Fabien.\r\nJe suis un peu perdu là\r\nPouvez-vous m\'aider s\'il vous plait ?', 2),
(4, '2021-02-24 22:32:14', 'bonjour tout le monde', 2),
(5, '2021-02-24 22:34:20', 'Je suis fabien julio', 2),
(6, '2021-02-24 22:46:15', 'Salut tout le monde, je suis l\'homme le plus intelligent du monde', 2),
(7, '2021-02-24 23:06:23', 'Salut tout le monde, je suis l\'homme le plus intelligent du monde', 2),
(8, '2021-02-24 23:08:26', 'Bonsoir la famille', 2),
(9, '2021-02-24 23:08:54', 'Bonsoir la famille', 2),
(10, '2021-02-25 07:12:16', 'Bonjour c\'était comment la nuit ?', 2),
(11, '2021-02-25 07:14:43', 'Coucou', 2),
(12, '2021-02-25 07:17:31', 'Bonjour tout le monde', 2),
(14, '2021-02-25 11:36:13', 'Salut les mecs', 1),
(15, '2021-02-25 11:36:13', 'Salut les mecs', 1),
(17, '2021-02-25 11:42:13', 'Salut les mecs', 1),
(19, '2021-02-25 14:53:40', 'Salut', 1),
(20, '2021-02-27 09:11:22', 'Bonjour tout le monde\r\n', 2),
(21, '2021-02-27 09:11:23', 'Bonjour tout le monde\r\n', 2),
(22, '2021-02-27 09:11:41', 'Bonjour tout le monde\r\n', 2),
(23, '2021-02-27 09:11:41', 'Bonjour tout le monde\r\n', 2),
(24, '2021-02-27 09:12:50', 'Bonjour tout le monde\r\n', 2),
(27, '2021-02-27 10:01:29', 'Bonjour tout le monde', 2),
(28, '2021-02-27 10:01:29', 'Bonjour tout le monde', 2),
(29, '2021-02-28 09:29:36', 'Salut', 1),
(30, '2021-02-28 09:29:36', 'Salut', 1);

-- --------------------------------------------------------

--
-- Structure de la table `professeur`
--

CREATE TABLE `professeur` (
  `id_professeur` int(11) NOT NULL,
  `nom_professeur` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom_professeur` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_professeur` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mdp_professeur` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel_professeur` double NOT NULL,
  `image_professeur` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `professeur`
--

INSERT INTO `professeur` (`id_professeur`, `nom_professeur`, `prenom_professeur`, `email_professeur`, `mdp_professeur`, `tel_professeur`, `image_professeur`, `admin`) VALUES
(1, 'Rakoto', 'Antsa', 'rakoto@gmail.com', '$2y$10$I.ToiJqI/t1z7n1s4kLeDO5ZMj/sEoTIAd/xwqrLex0YmdcrF2Ayu', 12005548, 'lllll.png', 0),
(2, 'Randa', 'Lolo', 'randa@gmail.com', '$2y$10$QlMp9QPqxnMNfi1sRS0dx.9/ge5rFKAYrnzA11vV3P7feJeprXSa2', 5269974, 'pppp.png', 0),
(3, 'Rasoa', 'lala', 'rasoa@gmail.com', '$2y$10$Q.MF6wl8uzYpHOU0eIJ.TOA.ZShYIa2A.o4goypbOVG9riPRE7Dja', 2531045, 'nasandratra.jpg', 0),
(4, 'Rasoanaivo', 'Kanto', 'kanto.muriel.rasoanaivo@esti.mg', '$2y$10$bQxHc6HZHioHDdtN2Vn9ieOLTKhd.62yxdIVsmHbZXJ73eL1YBLfK', 261325083158, 'fiderana.jpg', 0),
(5, 'Rasoanaivo', 'CaCa', 'kanto.muriel.rasoanaivo@esti.mg', '$2y$10$md5TB.blIkaX8W6FymNusuo2VwhKygdteZwc5GXaV76Of4Tvn0JMa', 261325083158, 'ainasoa.jpg', 0);

-- --------------------------------------------------------

--
-- Structure de la table `publicationcours`
--

CREATE TABLE `publicationcours` (
  `id_pub` int(15) NOT NULL,
  `titre_pub` varchar(100) NOT NULL,
  `id_cours` int(15) NOT NULL,
  `id_professeur` int(15) NOT NULL,
  `contenu_pub` text NOT NULL,
  `date_pub` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `recevoir`
--

CREATE TABLE `recevoir` (
  `id_etudiant` int(11) NOT NULL,
  `id_mess` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `recevoir`
--

INSERT INTO `recevoir` (`id_etudiant`, `id_mess`) VALUES
(1, 20),
(1, 22),
(1, 24),
(2, 12),
(2, 27),
(2, 29),
(3, 14),
(3, 17),
(3, 19),
(3, 21),
(3, 23),
(3, 28),
(4, 30);

-- --------------------------------------------------------

--
-- Structure de la table `specialite`
--

CREATE TABLE `specialite` (
  `id_specialite` int(11) NOT NULL,
  `designation_specialite` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `apprendre`
--
ALTER TABLE `apprendre`
  ADD PRIMARY KEY (`id_cours`,`id_etudiant`),
  ADD KEY `apprendre_etudiant0_FK` (`id_etudiant`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_cat`);

--
-- Index pour la table `cours`
--
ALTER TABLE `cours`
  ADD PRIMARY KEY (`id_cours`),
  ADD KEY `cours_categorie_FK` (`id_cat`),
  ADD KEY `cours_professeur0_FK` (`id_professeur`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`id_etudiant`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id_mess`),
  ADD KEY `message_etudiant0_FK` (`id_etudiant`);

--
-- Index pour la table `professeur`
--
ALTER TABLE `professeur`
  ADD PRIMARY KEY (`id_professeur`);

--
-- Index pour la table `recevoir`
--
ALTER TABLE `recevoir`
  ADD PRIMARY KEY (`id_etudiant`,`id_mess`),
  ADD KEY `recevoir_message0_FK` (`id_mess`);

--
-- Index pour la table `specialite`
--
ALTER TABLE `specialite`
  ADD PRIMARY KEY (`id_specialite`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `cours`
--
ALTER TABLE `cours`
  MODIFY `id_cours` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `id_etudiant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id_mess` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `professeur`
--
ALTER TABLE `professeur`
  MODIFY `id_professeur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `specialite`
--
ALTER TABLE `specialite`
  MODIFY `id_specialite` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `apprendre`
--
ALTER TABLE `apprendre`
  ADD CONSTRAINT `apprendre_cours_FK` FOREIGN KEY (`id_cours`) REFERENCES `cours` (`id_cours`),
  ADD CONSTRAINT `apprendre_etudiant0_FK` FOREIGN KEY (`id_etudiant`) REFERENCES `etudiant` (`id_etudiant`);

--
-- Contraintes pour la table `cours`
--
ALTER TABLE `cours`
  ADD CONSTRAINT `cours_categorie_FK` FOREIGN KEY (`id_cat`) REFERENCES `categorie` (`id_cat`),
  ADD CONSTRAINT `cours_professeur0_FK` FOREIGN KEY (`id_professeur`) REFERENCES `professeur` (`id_professeur`);

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_etudiant0_FK` FOREIGN KEY (`id_etudiant`) REFERENCES `etudiant` (`id_etudiant`);

--
-- Contraintes pour la table `recevoir`
--
ALTER TABLE `recevoir`
  ADD CONSTRAINT `recevoir_etudiant_FK` FOREIGN KEY (`id_etudiant`) REFERENCES `etudiant` (`id_etudiant`),
  ADD CONSTRAINT `recevoir_message0_FK` FOREIGN KEY (`id_mess`) REFERENCES `message` (`id_mess`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
