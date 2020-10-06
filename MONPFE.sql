-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 13 juin 2019 à 23:42
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
-- Base de données :  `monpfe`
--

-- --------------------------------------------------------

--
-- Structure de la table `affecter_sujet`
--

DROP TABLE IF EXISTS `affecter_sujet`;
CREATE TABLE IF NOT EXISTS `affecter_sujet` (
  `N__SOM` varchar(20) NOT NULL,
  `Num_groupe` int(11) NOT NULL,
  `Sujet` varchar(100) NOT NULL,
  PRIMARY KEY (`N__SOM`,`Num_groupe`),
  KEY `Num_groupe` (`Num_groupe`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `annee_universitaire`
--

DROP TABLE IF EXISTS `annee_universitaire`;
CREATE TABLE IF NOT EXISTS `annee_universitaire` (
  `Annee_univ` varchar(20) NOT NULL,
  PRIMARY KEY (`Annee_univ`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `archive`
--

DROP TABLE IF EXISTS `archive`;
CREATE TABLE IF NOT EXISTS `archive` (
  `Code_archive` int(11) NOT NULL AUTO_INCREMENT,
  `Sujet_PFE` varchar(100) NOT NULL,
  `Encadrant` varchar(20) NOT NULL,
  `Nom_filiere` varchar(20) NOT NULL,
  `Rapport` varchar(100) NOT NULL,
  `Presentation` varchar(100) NOT NULL,
  `Annee_univ` varchar(20) NOT NULL,
  PRIMARY KEY (`Code_archive`),
  KEY `Annee_univ` (`Annee_univ`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `attacher`
--

DROP TABLE IF EXISTS `attacher`;
CREATE TABLE IF NOT EXISTS `attacher` (
  `N__SOM` varchar(20) NOT NULL,
  `Nom_filiere` varchar(20) NOT NULL,
  PRIMARY KEY (`N__SOM`,`Nom_filiere`),
  KEY `attacher_ibfk_2` (`Nom_filiere`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `enseignant`
--

DROP TABLE IF EXISTS `enseignant`;
CREATE TABLE IF NOT EXISTS `enseignant` (
  `N__SOM` varchar(20) NOT NULL,
  `Nom_enseignant` varchar(20) NOT NULL,
  `Prenom_enseignant` varchar(20) NOT NULL,
  `E_mail_enseignant` varchar(100) NOT NULL,
  `Password_enseignant` varchar(20) NOT NULL,
  `Image` varchar(100) NOT NULL,
  `Nom_filiere` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`N__SOM`),
  KEY `enseignant_filiere0_FK` (`Nom_filiere`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

DROP TABLE IF EXISTS `etudiant`;
CREATE TABLE IF NOT EXISTS `etudiant` (
  `CNE` varchar(20) NOT NULL,
  `Nom_etudiant` varchar(20) DEFAULT NULL,
  `Prenom_etudiant` varchar(20) DEFAULT NULL,
  `Cycle` varchar(20) NOT NULL,
  `Option_S6` varchar(20) DEFAULT NULL,
  `Password_etudiant` varchar(20) DEFAULT NULL,
  `E_mail_etudiant` varchar(100) DEFAULT NULL,
  `Image` varchar(100) DEFAULT NULL,
  `Convention` varchar(255) DEFAULT NULL,
  `Code_soutenance` int(11) DEFAULT NULL,
  `Num_groupe` int(11) DEFAULT NULL,
  `Nom_filiere` varchar(20) DEFAULT NULL,
  `N__SOM` varchar(20) DEFAULT NULL,
  `Code_PFE` int(11) DEFAULT NULL,
  PRIMARY KEY (`CNE`),
  KEY `Nom_filiere` (`Nom_filiere`),
  KEY `Num_groupe` (`Num_groupe`),
  KEY `N__SOM` (`N__SOM`),
  KEY `Code_soutenance` (`Code_soutenance`),
  KEY `Code_PFE` (`Code_PFE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `filiere`
--

DROP TABLE IF EXISTS `filiere`;
CREATE TABLE IF NOT EXISTS `filiere` (
  `Nom_filiere` varchar(20) NOT NULL,
  `Cycle` varchar(20) NOT NULL,
  `N__SOM` varchar(20) NOT NULL,
  PRIMARY KEY (`Nom_filiere`),
  KEY `N__SOM` (`N__SOM`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `pfe`
--

DROP TABLE IF EXISTS `pfe`;
CREATE TABLE IF NOT EXISTS `pfe` (
  `Code_PFE` int(11) NOT NULL AUTO_INCREMENT,
  `Sujet_PFE` varchar(100) NOT NULL,
  `Rapport` varchar(100) NOT NULL,
  `Presentation` varchar(100) NOT NULL,
  `Statut_PFE` tinyint(4) DEFAULT NULL,
  `Code_archive` int(11) DEFAULT NULL,
  `N__SOM` varchar(20) DEFAULT NULL,
  `Annee_univ` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`Code_PFE`),
  KEY `Code_archive` (`Code_archive`),
  KEY `N__SOM` (`N__SOM`),
  KEY `pfe_Annee_universitaire0_FK` (`Annee_univ`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `soutenance`
--

DROP TABLE IF EXISTS `soutenance`;
CREATE TABLE IF NOT EXISTS `soutenance` (
  `Code_soutenance` int(11) NOT NULL AUTO_INCREMENT,
  `Date_soutenance` date NOT NULL,
  `Annee_univ` varchar(20) NOT NULL,
  `Code_PFE` int(11) DEFAULT NULL,
  PRIMARY KEY (`Code_soutenance`),
  KEY `Annee_univ` (`Annee_univ`),
  KEY `Code_PFE` (`Code_PFE`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `trombinoscope`
--

DROP TABLE IF EXISTS `trombinoscope`;
CREATE TABLE IF NOT EXISTS `trombinoscope` (
  `Num_groupe` int(11) NOT NULL AUTO_INCREMENT,
  `Etudiant_e_1` varchar(30) DEFAULT NULL,
  `Etudiant_e_2` varchar(30) DEFAULT NULL,
  `Etudiant_e_3` varchar(30) DEFAULT NULL,
  `Option_S6` varchar(20) DEFAULT NULL,
  `Encadrant` varchar(20) DEFAULT NULL,
  `Statut_sujet` tinyint(1) DEFAULT NULL,
  `Nom_filiere` varchar(20) DEFAULT NULL,
  `Code_archive` int(11) DEFAULT NULL,
  `N__SOM` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`Num_groupe`),
  KEY `Nom_filiere` (`Nom_filiere`),
  KEY `N__SOM` (`N__SOM`),
  KEY `Code_archive` (`Code_archive`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `affecter_sujet`
--
ALTER TABLE `affecter_sujet`
  ADD CONSTRAINT `affecter_sujet_ibfk_1` FOREIGN KEY (`Num_groupe`) REFERENCES `trombinoscope` (`Num_groupe`),
  ADD CONSTRAINT `affecter_sujet_ibfk_2` FOREIGN KEY (`N__SOM`) REFERENCES `enseignant` (`N__SOM`);

--
-- Contraintes pour la table `archive`
--
ALTER TABLE `archive`
  ADD CONSTRAINT `archive_ibfk_1` FOREIGN KEY (`Annee_univ`) REFERENCES `annee_universitaire` (`Annee_univ`);

--
-- Contraintes pour la table `attacher`
--
ALTER TABLE `attacher`
  ADD CONSTRAINT `attacher_ibfk_1` FOREIGN KEY (`N__SOM`) REFERENCES `enseignant` (`N__SOM`),
  ADD CONSTRAINT `attacher_ibfk_2` FOREIGN KEY (`Nom_filiere`) REFERENCES `filiere` (`Nom_filiere`);

--
-- Contraintes pour la table `enseignant`
--
ALTER TABLE `enseignant`
  ADD CONSTRAINT `enseignant_filiere0_FK` FOREIGN KEY (`Nom_filiere`) REFERENCES `filiere` (`Nom_filiere`);

--
-- Contraintes pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD CONSTRAINT `etudiant_ibfk_1` FOREIGN KEY (`Nom_filiere`) REFERENCES `filiere` (`Nom_filiere`),
  ADD CONSTRAINT `etudiant_ibfk_2` FOREIGN KEY (`Num_groupe`) REFERENCES `trombinoscope` (`Num_groupe`),
  ADD CONSTRAINT `etudiant_ibfk_3` FOREIGN KEY (`N__SOM`) REFERENCES `enseignant` (`N__SOM`),
  ADD CONSTRAINT `etudiant_ibfk_4` FOREIGN KEY (`Code_soutenance`) REFERENCES `soutenance` (`Code_soutenance`),
  ADD CONSTRAINT `etudiant_ibfk_5` FOREIGN KEY (`Code_PFE`) REFERENCES `pfe` (`Code_PFE`);

--
-- Contraintes pour la table `filiere`
--
ALTER TABLE `filiere`
  ADD CONSTRAINT `filiere_ibfk_1` FOREIGN KEY (`N__SOM`) REFERENCES `enseignant` (`N__SOM`);

--
-- Contraintes pour la table `pfe`
--
ALTER TABLE `pfe`
  ADD CONSTRAINT `pfe_Annee_universitaire0_FK` FOREIGN KEY (`Annee_univ`) REFERENCES `annee_universitaire` (`Annee_univ`),
  ADD CONSTRAINT `pfe_ibfk_1` FOREIGN KEY (`Code_archive`) REFERENCES `archive` (`Code_archive`),
  ADD CONSTRAINT `pfe_ibfk_2` FOREIGN KEY (`N__SOM`) REFERENCES `enseignant` (`N__SOM`);

--
-- Contraintes pour la table `soutenance`
--
ALTER TABLE `soutenance`
  ADD CONSTRAINT `soutenance_ibfk_1` FOREIGN KEY (`Annee_univ`) REFERENCES `annee_universitaire` (`Annee_univ`),
  ADD CONSTRAINT `soutenance_ibfk_2` FOREIGN KEY (`Code_PFE`) REFERENCES `pfe` (`Code_PFE`);

--
-- Contraintes pour la table `trombinoscope`
--
ALTER TABLE `trombinoscope`
  ADD CONSTRAINT `trombinoscope_ibfk_1` FOREIGN KEY (`Nom_filiere`) REFERENCES `filiere` (`Nom_filiere`),
  ADD CONSTRAINT `trombinoscope_ibfk_2` FOREIGN KEY (`N__SOM`) REFERENCES `enseignant` (`N__SOM`),
  ADD CONSTRAINT `trombinoscope_ibfk_3` FOREIGN KEY (`Code_archive`) REFERENCES `archive` (`Code_archive`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
