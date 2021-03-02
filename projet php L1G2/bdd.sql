-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 01 mars 2021 à 09:02
-- Version du serveur :  8.0.21
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `apprendre`
--

DROP TABLE IF EXISTS `apprendre`;
CREATE TABLE IF NOT EXISTS `apprendre` (
  `id_cours` int NOT NULL,
  `id_etudiant` int NOT NULL,
  KEY `id_etudiant` (`id_etudiant`),
  KEY `id_cours` (`id_cours`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `apprendre`
--

INSERT INTO `apprendre` (`id_cours`, `id_etudiant`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(2, 5),
(2, 6),
(2, 7),
(2, 8),
(2, 9),
(2, 10),
(3, 1),
(3, 2),
(3, 3),
(3, 4),
(3, 5),
(3, 6),
(3, 7),
(3, 8),
(3, 9),
(3, 10),
(4, 1),
(4, 2),
(4, 3),
(4, 4),
(4, 5),
(4, 6),
(4, 7),
(4, 8),
(4, 9),
(4, 10),
(5, 1),
(5, 2),
(5, 3),
(5, 4),
(5, 5),
(5, 6),
(5, 7),
(5, 8),
(5, 9),
(5, 10),
(6, 1),
(6, 2),
(6, 3),
(6, 4),
(6, 5),
(6, 6),
(6, 7),
(6, 8),
(6, 9),
(6, 10);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id_cat` int NOT NULL AUTO_INCREMENT,
  `designation_cat` varchar(100) NOT NULL,
  PRIMARY KEY (`id_cat`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id_cat`, `designation_cat`) VALUES
(1, 'INFORMATIQUE'),
(2, 'GESTION'),
(3, 'COMMUNICATION');

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

DROP TABLE IF EXISTS `cours`;
CREATE TABLE IF NOT EXISTS `cours` (
  `id_cours` int NOT NULL AUTO_INCREMENT,
  `nom_cours` varchar(50) NOT NULL,
  `id_cat` int NOT NULL,
  `id_professeur` int NOT NULL,
  PRIMARY KEY (`id_cours`),
  KEY `id_cat` (`id_cat`),
  KEY `id_professeur` (`id_professeur`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `cours`
--

INSERT INTO `cours` (`id_cours`, `nom_cours`, `id_cat`, `id_professeur`) VALUES
(1, 'Programmation', 1, 1),
(2, 'Maintenance', 1, 1),
(3, 'Anglais', 3, 2),
(4, 'Leadership', 3, 2),
(5, 'Comptabilite', 2, 3),
(6, 'Statistique', 2, 3);

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

DROP TABLE IF EXISTS `etudiant`;
CREATE TABLE IF NOT EXISTS `etudiant` (
  `id_etudiant` int NOT NULL AUTO_INCREMENT,
  `nom_etudiant` varchar(100) NOT NULL,
  `prenom_etudiant` varchar(100) NOT NULL,
  `email_etudiant` varchar(100) NOT NULL,
  `mdp_etudiant` varchar(500) NOT NULL,
  `tel_etudiant` double NOT NULL,
  `image_etudiant` varchar(500) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_etudiant`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `etudiant`
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

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `id_mess` int NOT NULL AUTO_INCREMENT,
  `date_mess` datetime NOT NULL,
  `contenu_mess` text NOT NULL,
  `id_etudiant` int NOT NULL,
  PRIMARY KEY (`id_mess`),
  KEY `id_etudiant` (`id_etudiant`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id_mess`, `date_mess`, `contenu_mess`, `id_etudiant`) VALUES
(1, '2021-03-01 10:48:47', 'hello!', 1),
(2, '2021-03-01 10:50:13', 'Bonjour les amis! Je vous invite pour mon anniversaire qui aura lieu demain soir chez moi! Merci', 1),
(3, '2021-03-01 10:50:13', 'Bonjour les amis! Je vous invite pour mon anniversaire qui aura lieu demain soir chez moi! Merci', 1),
(4, '2021-03-01 10:50:13', 'Bonjour les amis! Je vous invite pour mon anniversaire qui aura lieu demain soir chez moi! Merci', 1),
(5, '2021-03-01 10:50:13', 'Bonjour les amis! Je vous invite pour mon anniversaire qui aura lieu demain soir chez moi! Merci', 1),
(6, '2021-03-01 10:52:04', 'hello! je suis désolée Abdoul, je ne peux pas venir pour ton anniversaire. ', 4),
(7, '2021-03-01 10:52:40', 'bonjour! tu arrives quand?', 4),
(8, '2021-03-01 10:53:38', 'coucou!', 5),
(9, '2021-03-01 10:54:17', 'ok Abdoul!', 8);

-- --------------------------------------------------------

--
-- Structure de la table `professeur`
--

DROP TABLE IF EXISTS `professeur`;
CREATE TABLE IF NOT EXISTS `professeur` (
  `id_professeur` int NOT NULL AUTO_INCREMENT,
  `nom_professeur` varchar(100) NOT NULL,
  `prenom_professeur` varchar(100) NOT NULL,
  `email_professeur` varchar(100) NOT NULL,
  `mdp_professeur` varchar(500) NOT NULL,
  `tel_professeur` double NOT NULL,
  `image_professeur` varchar(500) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_professeur`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `professeur`
--

INSERT INTO `professeur` (`id_professeur`, `nom_professeur`, `prenom_professeur`, `email_professeur`, `mdp_professeur`, `tel_professeur`, `image_professeur`, `admin`) VALUES
(1, 'NANTENAINA', 'Rochel', 'rochel@esti.mg', '$2y$10$nIXdwferkRzB/NsrZIGMUuy21KmD255YBYObg.i1Yb3IdDNF6qBC2', 345285571, 'mrRochel.jpg', 0),
(2, 'RALAIMANISA', 'Ndrina', 'ndrina@esti.mg', '$2y$10$nsqay/3BL1IhhQBqxkgcJeKM2x6wbi87dmLbc9Qnec4ecMCwatVNS', 336622211, 'mrNdrina.jpg', 1),
(3, 'RAZAFINDRAMINTSA', 'Jean', 'jean@esti.mg', '$2y$10$85p3un2pPotjJLvhJiOFQep/mUNPQVQjaklWp9EH9JEE92SKyWDoS', 321100022, 'Jean.jpg', 0);

-- --------------------------------------------------------

--
-- Structure de la table `publicationcours`
--

DROP TABLE IF EXISTS `publicationcours`;
CREATE TABLE IF NOT EXISTS `publicationcours` (
  `id_pub` int NOT NULL AUTO_INCREMENT,
  `titre_pub` varchar(100) NOT NULL,
  `id_cours` int NOT NULL,
  `id_professeur` int NOT NULL,
  `contenu_pub` text NOT NULL,
  `date_pub` date NOT NULL,
  PRIMARY KEY (`id_pub`),
  KEY `id_cours` (`id_cours`),
  KEY `id` (`id_professeur`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `publicationcours`
--

INSERT INTO `publicationcours` (`id_pub`, `titre_pub`, `id_cours`, `id_professeur`, `contenu_pub`, `date_pub`) VALUES
(1, 'Examen', 1, 1, 'N\'oubliez pas, vous avez un examen demain à 14h', '2021-03-01'),
(2, 'Slide', 4, 2, 'Envoyez-moi vos slide concernant le gestion de changement', '2021-03-01'),
(3, 'Exam', 3, 2, 'We have an exam tomorrow', '2021-03-01'),
(4, 'Réseau', 2, 1, 'Configurez ssh pour ce lundi ', '2021-03-01'),
(5, 'PCG', 5, 3, 'Apportez votre PCG demain matin', '2021-03-01'),
(6, 'Cours annulé', 6, 3, 'Le cours de demain est annulé ', '2021-03-01');

-- --------------------------------------------------------

--
-- Structure de la table `recevoir`
--

DROP TABLE IF EXISTS `recevoir`;
CREATE TABLE IF NOT EXISTS `recevoir` (
  `id_etudiant` int NOT NULL AUTO_INCREMENT,
  `id_mess` int NOT NULL,
  KEY `id_etudiant` (`id_etudiant`),
  KEY `id_mess` (`id_mess`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `recevoir`
--

INSERT INTO `recevoir` (`id_etudiant`, `id_mess`) VALUES
(5, 1),
(4, 2),
(7, 3),
(8, 4),
(9, 5),
(1, 6),
(10, 7),
(1, 8),
(1, 9);

-- --------------------------------------------------------

--
-- Structure de la table `specialite`
--

DROP TABLE IF EXISTS `specialite`;
CREATE TABLE IF NOT EXISTS `specialite` (
  `id_specialite` int NOT NULL AUTO_INCREMENT,
  `designation_specialite` varchar(50) NOT NULL,
  PRIMARY KEY (`id_specialite`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
