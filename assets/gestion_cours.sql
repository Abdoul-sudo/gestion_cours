-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 01 Mars 2021 à 08:32
-- Version du serveur :  10.1.9-MariaDB
-- Version de PHP :  5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gestion_cours`
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
(1, 'INFORMATIQUE'),
(2, 'GESTION'),
(3, 'COMMUNICATION');

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

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `id_etudiant` int(11) NOT NULL,
  `nom_etudiant` varchar(100) NOT NULL,
  `prenom_etudiant` varchar(100) NOT NULL,
  `email_etudiant` varchar(100) NOT NULL,
  `mdp_etudiant` varchar(500) NOT NULL,
  `tel_etudiant` double NOT NULL,
  `image_etudiant` varchar(500) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `etudiant`
--

INSERT INTO `etudiant` (`id_etudiant`, `nom_etudiant`, `prenom_etudiant`, `email_etudiant`, `mdp_etudiant`, `tel_etudiant`, `image_etudiant`, `admin`) VALUES
(1, 'ISMAEL', 'Abdoul', 'abdoul@esti.mg', '$2y$10$WD.LEBxXHqQ3IFhrcX3ZluokCN8N8WKkHKP58VA.4Wkgg0OBR/Usm', 343314543, 'abdoul.png', 1),
(2, 'ANDRIAMAMPITA', 'Ainasoa', 'ainasoa@esti.mg', '$2y$10$O7ZslUtUFnCWws9Wnu94eOeg2kIUQxkHp0WNODKEnm.jkmuJ7smY6', 348046640, 'ainasoa.jpg', 0),
(3, 'RAJERISON', 'Fabien', 'fabien@esti.mg', '$2y$10$tiJnlkauGsftURFNSRTjDOX4.ioFkFPmz7x6PVuSrGI0EPn98Qd7C', 329256610, 'fabien.jpg', 0),
(4, 'ANONA', 'Darcia', 'darcia@esti.mg', '$2y$10$Da.L6aJJIs7Uubb/9pPaRuwJvcqltkdme5AMPinWSOh2jVn6ss/VK', 338522136, 'darcia.jpg', 0),
(5, 'RAKOTO-ANDRIANALY', 'Arielle', 'arielle@esti.mg', '$2y$10$jlxFq1G93akNN10HDY12e.j9Ujz5AgGIcYRx0LhHjuc/ahQDBKv6q', 341252108, 'arielle.jpg', 0),
(6, 'RAKOTONIRINA', 'Fiderana', 'fiderana@esti.mg', '$2y$10$kMycCKbOK8HCaXFM91j90egzEKHp80q8TCHZrGCbxJUOtMHfu6KrW', 331265498, 'fiderana.jpg', 0),
(7, 'RAZAFIMAHALEO', 'Nasandratra', 'nasandratra@esti.mg', '$2y$10$WcAQ.AmD4bjq3NEMavezCORUIA9HUJrYxNmhVY6pOW1eWpp7Xe0iq', 325261134, 'nasandratra.jpg', 0),
(8, 'RAJAONARIVONY', 'Rivo', 'rivo@esti.mg', '$2y$10$l73fVAtRURNGadUZx46lr.ue5gPvCz.iZFtJFOtlGX36jXqrdaao6', 331122266, 'rivo.jpg', 0),
(9, 'RANAIVOSON', 'Hery', 'hery@esti.mg', '$2y$10$kvRJ0AfcNRTlVMWgUfpV.eK.w1QDu6xg3jRFOZg7Xd13YtWbfW/S.', 345262291, 'hery.jpg', 0),
(10, 'RADANIELSON', 'Santatra', 'santatra@esti.mg', '$2y$10$9Egrivkj9A35e7Gy8Dji7OZFOBJJJ9LB98EFlWylCaYiNR7hNEwr.', 331144455, 'santatra.jpg', 0);

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id_mess` int(11) NOT NULL,
  `date_mess` datetime NOT NULL,
  `contenu_mess` text NOT NULL,
  `id_etudiant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `professeur`
--

CREATE TABLE `professeur` (
  `id_professeur` int(11) NOT NULL,
  `nom_professeur` varchar(100) NOT NULL,
  `prenom_professeur` varchar(100) NOT NULL,
  `email_professeur` varchar(100) NOT NULL,
  `mdp_professeur` int(200) NOT NULL,
  `tel_professeur` double NOT NULL,
  `image_professeur` varchar(500) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `professeur`
--

INSERT INTO `professeur` (`id_professeur`, `nom_professeur`, `prenom_professeur`, `email_professeur`, `mdp_professeur`, `tel_professeur`, `image_professeur`, `admin`) VALUES
(1, 'NANTENAINA', 'Rochel', 'rochel@esti.mg', 0, 345285571, 'mrRochel.jpg', 0),
(2, 'RALAIMANISA', 'Ndrina', 'ndrina@esti.mg', 0, 336622211, 'mrNdrina.jpg', 0),
(3, 'RAZAFINDRAMINTSA', 'Jean', 'jean@esti.mg', 0, 321100022, 'Jean.jpg', 0);

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
-- Index pour les tables exportées
--

--
-- Index pour la table `apprendre`
--
ALTER TABLE `apprendre`
  ADD KEY `id_etudiant` (`id_etudiant`),
  ADD KEY `id_cours` (`id_cours`);

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
  ADD KEY `id_cat` (`id_cat`),
  ADD KEY `id_professeur` (`id_professeur`);

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
  ADD KEY `id_etudiant` (`id_etudiant`);

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
  ADD KEY `id` (`id_professeur`);

--
-- Index pour la table `recevoir`
--
ALTER TABLE `recevoir`
  ADD KEY `id_etudiant` (`id_etudiant`),
  ADD KEY `id_mess` (`id_mess`);

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
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `cours`
--
ALTER TABLE `cours`
  MODIFY `id_cours` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `id_etudiant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id_mess` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `professeur`
--
ALTER TABLE `professeur`
  MODIFY `id_professeur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `publicationcours`
--
ALTER TABLE `publicationcours`
  MODIFY `id_pub` int(15) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `recevoir`
--
ALTER TABLE `recevoir`
  MODIFY `id_etudiant` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `specialite`
--
ALTER TABLE `specialite`
  MODIFY `id_specialite` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
