-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 06 mars 2019 à 08:22
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `clairierepro`
--

-- --------------------------------------------------------

--
-- Structure de la table `clair_artworkinterest`
--

DROP TABLE IF EXISTS `clair_artworkinterest`;
CREATE TABLE IF NOT EXISTS `clair_artworkinterest` (
  `idArtWorkInterest` int(11) NOT NULL AUTO_INCREMENT,
  `idArtwork` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  PRIMARY KEY (`idArtWorkInterest`),
  KEY `artWorkInterest_clair_artworks_FK` (`idArtwork`),
  KEY `artWorkInterest_clair_users0_FK` (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `clair_artworks`
--

DROP TABLE IF EXISTS `clair_artworks`;
CREATE TABLE IF NOT EXISTS `clair_artworks` (
  `idArtWork` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `picture` varchar(200) NOT NULL,
  `technicalDescription` varchar(2000) NOT NULL,
  `optionalDescription` varchar(2000) NOT NULL,
  `date` year(4) NOT NULL,
  `price` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idWorkStyle` int(11) NOT NULL,
  `idModality` int(11) NOT NULL,
  PRIMARY KEY (`idArtWork`),
  KEY `clair_artworks_clair_users_FK` (`idUser`),
  KEY `clair_artworks_clair_workStyles0_FK` (`idWorkStyle`),
  KEY `clair_artworks_modalities1_FK` (`idModality`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `clair_artworks`
--

INSERT INTO `clair_artworks` (`idArtWork`, `title`, `picture`, `technicalDescription`, `optionalDescription`, `date`, `price`, `idUser`, `idWorkStyle`, `idModality`) VALUES
(3, 'MOMA NYC', 'moma_nyc_angela.jpg', 'c est une photo de 1616px', 'elle a ete prise au moma de new york', 2015, 0, 30, 3, 1),
(4, 'Happy', 'happy_angela.jpg', 'illustration 21*29,7', '', 2018, 111, 30, 3, 1),
(9, 'EgoVSÃ©gaux', 'angela_egoVSegaux.jpg', 'Illustration numÃ©rique 25 cm sur 25 cm', '', 2015, 250, 30, 1, 1),
(14, 'spirale', 'hundertwasserr_pisrale.jpg', 'peinture de quasi 2 mÃ¨tres de long quand meme', 'en tre autres, le liant de la peinture est fait avec du blanc d\'oeuf', 2009, 765, 37, 2, 1),
(15, 'sans titre', 'hunderwasserUnknown.jpg', 'peinture de quasi 2 mÃ¨tres de long quand meme', '', 2009, 765, 37, 2, 3),
(16, 'irinaland', 'hunderwasser_irinaland.jpeg', '', '', 1978, 78, 37, 2, 2),
(17, 'papy good', 'the-old-man-1998604_1280.jpg', 'je vous laiss e deviner la technique', 'je vous laisse decider du pourquoi', 2011, 125, 38, 5, 2),
(18, 'ollie', 'split-1562275_1920.jpg', 'un arret sur image', '', 2014, 134, 38, 7, 3),
(26, 'Terminus', 'railroad-track-3963706_1920.jpg', 'photo numÃ©rique rÃ©alisÃ©e dans un lieu tenu secret ;)', '', 2012, 0, 55, 8, 1),
(27, 'Smoking Mountains', 'homberg-1959229_1920.jpg', 'photo rÃ©alisÃ©e durant l\'un de mes nombreux voyages', '', 2017, 200, 55, 8, 3);

-- --------------------------------------------------------

--
-- Structure de la table `clair_biographies`
--

DROP TABLE IF EXISTS `clair_biographies`;
CREATE TABLE IF NOT EXISTS `clair_biographies` (
  `idBiography` int(11) NOT NULL AUTO_INCREMENT,
  `present` varchar(1000) DEFAULT NULL,
  `profilePicture` varchar(100) NOT NULL,
  `idSpeciality` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  PRIMARY KEY (`idBiography`),
  UNIQUE KEY `clair_biographies_clair_users_AK` (`idUser`),
  KEY `clair_biographies_clair_specialities_FK` (`idSpeciality`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `clair_biographies`
--

INSERT INTO `clair_biographies` (`idBiography`, `present`, `profilePicture`, `idSpeciality`, `idUser`) VALUES
(2, 'Un peu en panne d\'inspiration, dÃ©solÃ© Peu importe la technique utilisÃ© tant que j\'arrive (re)transmettre ', 'angela_profil.jpg', 5, 30),
(13, 'Je pratique toutes les formes d\'art nÃ©cessaire Ã  la poÃ©sie que je souhaite sur le moment', 'portrait.jpg', 1, 27),
(20, 'artiste multi suupports aux idÃ©es avant gardistes voire utopistes qui mÃªlent reflexion sur la sociÃ©tÃ© du spectacle et ironie du sort.', 'RobertFilliouProfil.jpeg', 1, 36),
(21, 'peintre, sculpteur, architecte mÃªme, Hunderwasser deverse ses idÃ©es dans tous les champs possibles de la crÃ©ation', 'Hundertwasser_profil.jpg', 2, 37),
(22, 'du graff, du graff avec aussi un peu de graff !! ;)', 'man-114257_1920.jpg', 6, 38),
(26, 'Globetrotteuse nocturne', 'night-1927265_1920.jpg', 8, 55);

-- --------------------------------------------------------

--
-- Structure de la table `clair_messages`
--

DROP TABLE IF EXISTS `clair_messages`;
CREATE TABLE IF NOT EXISTS `clair_messages` (
  `idMessage` int(11) NOT NULL AUTO_INCREMENT,
  `message` varchar(5000) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idUser_clair_users` int(11) NOT NULL,
  PRIMARY KEY (`idMessage`),
  KEY `clair_messages_clair_users_FK` (`idUser`),
  KEY `clair_messages_clair_users0_FK` (`idUser_clair_users`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `clair_modalities`
--

DROP TABLE IF EXISTS `clair_modalities`;
CREATE TABLE IF NOT EXISTS `clair_modalities` (
  `idModality` int(11) NOT NULL AUTO_INCREMENT,
  `modalityType` varchar(200) NOT NULL,
  PRIMARY KEY (`idModality`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `clair_modalities`
--

INSERT INTO `clair_modalities` (`idModality`, `modalityType`) VALUES
(1, 'EN EXPOSITION VIRTUELLE(seulement consultable)'),
(2, 'FAIRE OFFRE (je laisse la possibilité aux visiteurs de me faire une offre d\'achat) '),
(3, 'FIXER UN PRIX (je fixe un prix)'),
(4, 'VENDU');

-- --------------------------------------------------------

--
-- Structure de la table `clair_specialities`
--

DROP TABLE IF EXISTS `clair_specialities`;
CREATE TABLE IF NOT EXISTS `clair_specialities` (
  `idSpeciality` int(11) NOT NULL AUTO_INCREMENT,
  `speciality` varchar(2000) DEFAULT NULL,
  PRIMARY KEY (`idSpeciality`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `clair_specialities`
--

INSERT INTO `clair_specialities` (`idSpeciality`, `speciality`) VALUES
(1, 'multi-supports'),
(2, 'peintre'),
(3, 'dessinateur'),
(4, 'sculpteur'),
(5, 'street-artiste'),
(6, 'illustrateur'),
(7, 'graphiste'),
(8, 'photographe');

-- --------------------------------------------------------

--
-- Structure de la table `clair_users`
--

DROP TABLE IF EXISTS `clair_users`;
CREATE TABLE IF NOT EXISTS `clair_users` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `nickName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `idUserType` int(11) NOT NULL,
  PRIMARY KEY (`idUser`),
  KEY `clair_users_clair_userTypes_FK` (`idUserType`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `clair_users`
--

INSERT INTO `clair_users` (`idUser`, `nickName`, `lastName`, `firstName`, `password`, `mail`, `idUserType`) VALUES
(1, 'Lebourg', 'Jonathan', 'Jon', 'jonjon76', 'jonjonlebourg@gmail.fr', 1),
(27, 'Jon', 'Lebourg', 'Jonathan', 'jojojojo', 'jonjon76@hotmail.fr', 2),
(30, 'Angela', 'Mallet Camelotti', 'Angela', 'azertyui', 'angela@ange.la', 2),
(36, 'Robbert Filliou', 'Filliou', 'Robert', 'azertyui', 'roro.fifi@fifi.ro', 2),
(37, 'Hundertwasser', 'Hundertwasser', 'Friederisch', 'azertyui', 'hundert.wasseer@fed.fr', 2),
(38, 'DelBru', 'Delgado', 'Bruno', 'qsdfghjk', 'del.bru@gado.no', 2),
(53, 'mammy', 'lebourg', 'martine', 'jojeva76', 'martine.lebourg@wanadoo.fr', 3),
(55, 'Bambi', 'Tann', 'Elodie', 'azertyui', 'bambiTan@elod.ie', 2),
(56, 'Fab1', 'CÃ´tÃ©', 'Fabien', 'azertyui', 'fabien@fabien.fab', 3);

-- --------------------------------------------------------

--
-- Structure de la table `clair_usertypes`
--

DROP TABLE IF EXISTS `clair_usertypes`;
CREATE TABLE IF NOT EXISTS `clair_usertypes` (
  `idUserType` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) NOT NULL,
  PRIMARY KEY (`idUserType`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `clair_usertypes`
--

INSERT INTO `clair_usertypes` (`idUserType`, `type`) VALUES
(1, 'administrateur'),
(2, 'artiste'),
(3, 'client');

-- --------------------------------------------------------

--
-- Structure de la table `clair_workstyles`
--

DROP TABLE IF EXISTS `clair_workstyles`;
CREATE TABLE IF NOT EXISTS `clair_workstyles` (
  `idWorkStyle` int(11) NOT NULL AUTO_INCREMENT,
  `workStyle` varchar(50) NOT NULL,
  PRIMARY KEY (`idWorkStyle`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `clair_workstyles`
--

INSERT INTO `clair_workstyles` (`idWorkStyle`, `workStyle`) VALUES
(1, 'autre'),
(2, 'peinture'),
(3, 'dessin'),
(4, 'sculpture'),
(5, 'street-art'),
(6, 'illustration'),
(7, 'graphisme'),
(8, 'photographie');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `clair_artworkinterest`
--
ALTER TABLE `clair_artworkinterest`
  ADD CONSTRAINT `artWorkInterest_clair_artworks_FK` FOREIGN KEY (`idArtwork`) REFERENCES `clair_artworks` (`idArtWork`),
  ADD CONSTRAINT `artWorkInterest_clair_users0_FK` FOREIGN KEY (`idUser`) REFERENCES `clair_users` (`idUser`) ON DELETE CASCADE;

--
-- Contraintes pour la table `clair_artworks`
--
ALTER TABLE `clair_artworks`
  ADD CONSTRAINT `clair_artworks_clair_users_FK` FOREIGN KEY (`idUser`) REFERENCES `clair_users` (`idUser`),
  ADD CONSTRAINT `clair_artworks_clair_workStyles0_FK` FOREIGN KEY (`idWorkStyle`) REFERENCES `clair_workstyles` (`idWorkStyle`),
  ADD CONSTRAINT `clair_artworks_modalities1_FK` FOREIGN KEY (`idModality`) REFERENCES `clair_modalities` (`idModality`);

--
-- Contraintes pour la table `clair_biographies`
--
ALTER TABLE `clair_biographies`
  ADD CONSTRAINT `clair_biographies_clair_specialities_FK` FOREIGN KEY (`idSpeciality`) REFERENCES `clair_specialities` (`idSpeciality`),
  ADD CONSTRAINT `clair_biographies_clair_users0_FK` FOREIGN KEY (`idUser`) REFERENCES `clair_users` (`idUser`) ON DELETE CASCADE;

--
-- Contraintes pour la table `clair_messages`
--
ALTER TABLE `clair_messages`
  ADD CONSTRAINT `clair_messages_clair_users0_FK` FOREIGN KEY (`idUser_clair_users`) REFERENCES `clair_users` (`idUser`),
  ADD CONSTRAINT `clair_messages_clair_users_FK` FOREIGN KEY (`idUser`) REFERENCES `clair_users` (`idUser`);

--
-- Contraintes pour la table `clair_users`
--
ALTER TABLE `clair_users`
  ADD CONSTRAINT `clair_users_clair_userTypes_FK` FOREIGN KEY (`idUserType`) REFERENCES `clair_usertypes` (`idUserType`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
