-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Sam 27 Février 2021 à 06:38
-- Version du serveur :  10.1.9-MariaDB
-- Version de PHP :  5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `apprendre`
--

CREATE TABLE `apprendre` (
  `id_cours` int(11) NOT NULL,
  `id_etudiant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id_cat` int(11) NOT NULL,
  `designation_cat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `categorie`
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
  `nom_cours` varchar(50) NOT NULL,
  `id_cat` int(11) NOT NULL,
  `id_professeur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `cours`
--

INSERT INTO `cours` (`id_cours`, `nom_cours`, `id_cat`, `id_professeur`) VALUES
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
  `nom_etudiant` varchar(100) NOT NULL,
  `prenom_etudiant` varchar(100) DEFAULT NULL,
  `email_etudiant` varchar(100) NOT NULL,
  `mdp_etudiant` varchar(500) NOT NULL,
  `tel_etudiant` double NOT NULL,
  `image_etudiant` varchar(500) NOT NULL,
  `admin` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `etudiant`
--

INSERT INTO `etudiant` (`id_etudiant`, `nom_etudiant`, `prenom_etudiant`, `email_etudiant`, `mdp_etudiant`, `tel_etudiant`, `image_etudiant`, `admin`) VALUES
(1, 'lala', 'jaja', 'la@gmai.com', '$2y$10$wSjGU/lmsqYNe37M/UR2l.i8b4IqgazmydviGo9HvFG7B2ajwV/FW', 2345610, 'abdoul.png', 0),
(2, 'Rasoanaivo', 'Kanto', 'kanto.muriel.rasoanaivo@esti.mg', '$2y$10$6kM3DgxhgnmpDFqEzW.z4.vpT6NPxp/b0a1Ux184PBPZjBiOTHvx.', 261325083158, '', 1);

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id_mess` int(11) NOT NULL,
  `date_mess` datetime NOT NULL,
  `contenu_mess` text NOT NULL,
  `id_professeur` int(11) NOT NULL,
  `id_etudiant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `posseder`
--

CREATE TABLE `posseder` (
  `id_specialite` int(11) NOT NULL,
  `id_professeur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `professeur`
--

CREATE TABLE `professeur` (
  `id_professeur` int(11) NOT NULL,
  `nom_professeur` varchar(100) NOT NULL,
  `prenom_professeur` varchar(100) DEFAULT NULL,
  `email_professeur` varchar(100) NOT NULL,
  `mdp_professeur` varchar(500) NOT NULL,
  `tel_professeur` double NOT NULL,
  `image_professeur` varchar(500) NOT NULL,
  `admin` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `professeur`
--

INSERT INTO `professeur` (`id_professeur`, `nom_professeur`, `prenom_professeur`, `email_professeur`, `mdp_professeur`, `tel_professeur`, `image_professeur`, `admin`) VALUES
(1, 'Rakoto', 'Antsa', 'antsa@gmail.com', 'mmmmm', 12005548, 'lllll.png', 0),
(2, 'Randa', 'Lolo', 'lolo@gmail.com', 'lllll', 5269974, 'pppp.png', 0),
(3, 'Rasoa', 'lala', 'momo@gmai.com', '$2y$10$Q.MF6wl8uzYpHOU0eIJ.TOA.ZShYIa2A.o4goypbOVG9riPRE7Dja', 2531045, 'nasandratra.jpg', 0),
(4, 'Rasoanaivo', 'Kanto', 'kanto.muriel.rasoanaivo@esti.mg', '$2y$10$bQxHc6HZHioHDdtN2Vn9ieOLTKhd.62yxdIVsmHbZXJ73eL1YBLfK', 261325083158, 'fiderana.jpg', 0),
(5, 'Rasoanaivo', 'mm', 'kanto.muriel.rasoanaivo@esti.mg', '$2y$10$md5TB.blIkaX8W6FymNusuo2VwhKygdteZwc5GXaV76Of4Tvn0JMa', 261325083158, 'ainasoa.jpg', 0);

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

--
-- Contenu de la table `publicationcours`
--

INSERT INTO `publicationcours` (`id_pub`, `titre_pub`, `id_cours`, `id_professeur`, `contenu_pub`, `date_pub`) VALUES
(1, 'the title', 1, 2, 'ammamaiad, bd', '2021-02-03'),
(2, 'lalal', 2, 1, 'buejn ie', '2021-02-02');

-- --------------------------------------------------------

--
-- Structure de la table `recevoir`
--

CREATE TABLE `recevoir` (
  `id_etudiant` int(11) NOT NULL,
  `id_mess` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `specialite`
--

CREATE TABLE `specialite` (
  `id_specialite` int(11) NOT NULL,
  `designation_specialite` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `specialite`
--

INSERT INTO `specialite` (`id_specialite`, `designation_specialite`) VALUES
(1, 'Programmation'),
(2, 'Maintenance'),
(3, 'Architecture'),
(4, 'Comptabilite'),
(5, 'Economie'),
(6, 'Leadership'),
(7, 'Français');

--
-- Index pour les tables exportées
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
  ADD KEY `message_professeur_FK` (`id_professeur`),
  ADD KEY `message_etudiant0_FK` (`id_etudiant`);

--
-- Index pour la table `posseder`
--
ALTER TABLE `posseder`
  ADD PRIMARY KEY (`id_specialite`,`id_professeur`),
  ADD KEY `posseder_professeur0_FK` (`id_professeur`);

--
-- Index pour la table `professeur`
--
ALTER TABLE `professeur`
  ADD PRIMARY KEY (`id_professeur`);

--
-- Index pour la table `publicationcours`
--
ALTER TABLE `publicationcours`
  ADD PRIMARY KEY (`id_pub`),
  ADD KEY `id_cours` (`id_cours`),
  ADD KEY `id_professeur` (`id_professeur`);

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
-- AUTO_INCREMENT pour les tables exportées
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
  MODIFY `id_etudiant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id_mess` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `professeur`
--
ALTER TABLE `professeur`
  MODIFY `id_professeur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `publicationcours`
--
ALTER TABLE `publicationcours`
  MODIFY `id_pub` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `specialite`
--
ALTER TABLE `specialite`
  MODIFY `id_specialite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Contraintes pour les tables exportées
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
  ADD CONSTRAINT `message_etudiant0_FK` FOREIGN KEY (`id_etudiant`) REFERENCES `etudiant` (`id_etudiant`),
  ADD CONSTRAINT `message_professeur_FK` FOREIGN KEY (`id_professeur`) REFERENCES `professeur` (`id_professeur`);

--
-- Contraintes pour la table `posseder`
--
ALTER TABLE `posseder`
  ADD CONSTRAINT `posseder_professeur0_FK` FOREIGN KEY (`id_professeur`) REFERENCES `professeur` (`id_professeur`),
  ADD CONSTRAINT `posseder_specialite_FK` FOREIGN KEY (`id_specialite`) REFERENCES `specialite` (`id_specialite`);

--
-- Contraintes pour la table `recevoir`
--
ALTER TABLE `recevoir`
  ADD CONSTRAINT `recevoir_etudiant_FK` FOREIGN KEY (`id_etudiant`) REFERENCES `etudiant` (`id_etudiant`),
  ADD CONSTRAINT `recevoir_message0_FK` FOREIGN KEY (`id_mess`) REFERENCES `message` (`id_mess`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
