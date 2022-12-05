-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 15 oct. 2022 à 14:22
-- Version du serveur : 8.0.27
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sae`
--

-- --------------------------------------------------------

--
-- Structure de la table `adherent`
--

DROP TABLE IF EXISTS `adherent`;
CREATE TABLE IF NOT EXISTS `adherent` (
  `ID_adherent` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `sexe` varchar(15) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `date_de_naissance` varchar(50) NOT NULL,
  `adresse_mail` varchar(150) NOT NULL,
  `numero_de_telephone` varchar(100) NOT NULL,
  `numero_de_licence` int NOT NULL,
  `login` varchar(200) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `adresse` varchar(200) NOT NULL,
  `ID_ville` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`ID_adherent`),
  UNIQUE KEY `ID_adhérent` (`ID_adherent`),
  UNIQUE KEY `login` (`login`),
  UNIQUE KEY `Numéro_de_licence` (`numero_de_licence`),
  KEY `Id_ville_adherent` (`ID_ville`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `assurance`
--

DROP TABLE IF EXISTS `assurance`;
CREATE TABLE IF NOT EXISTS `assurance` (
  `ID_assurance` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `option 1` tinyint(1) NOT NULL,
  `option 2` tinyint(1) NOT NULL,
  `refus_option` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID_assurance`),
  UNIQUE KEY `ID_assurance` (`ID_assurance`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `ID_commentaires` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `texte` text NOT NULL,
  `ID_Adherent` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`ID_commentaires`),
  UNIQUE KEY `ID_commentaires` (`ID_commentaires`),
  KEY `ID_Adherent_commentaire` (`ID_Adherent`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

DROP TABLE IF EXISTS `evenement`;
CREATE TABLE IF NOT EXISTS `evenement` (
  `ID_evenement` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `date_evenement` datetime NOT NULL,
  `evenement` text NOT NULL,
  `ID_gymnase` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`ID_evenement`),
  UNIQUE KEY `ID_évènement` (`ID_evenement`),
  KEY `ID_gymnase_evenement` (`ID_gymnase`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `gymnase`
--

DROP TABLE IF EXISTS `gymnase`;
CREATE TABLE IF NOT EXISTS `gymnase` (
  `ID_gymnase` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `adresse` varchar(100) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `ID_ville` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`ID_gymnase`),
  UNIQUE KEY `ID_gymnase` (`ID_gymnase`),
  KEY `ID_ville_gymnase` (`ID_ville`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `info_inscription`
--

DROP TABLE IF EXISTS `info_inscription`;
CREATE TABLE IF NOT EXISTS `info_inscription` (
  `ID_inscription` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `reinscription` tinyint(1) NOT NULL,
  `profession` varchar(100) NOT NULL,
  `nationalite` varchar(100) NOT NULL,
  `saison` varchar(15) NOT NULL,
  `club` varchar(150) NOT NULL,
  `ID_Adherent` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`ID_inscription`),
  UNIQUE KEY `ID_inscription` (`ID_inscription`),
  KEY `ID_Adherent_inscrip` (`ID_Adherent`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `info_licence`
--

DROP TABLE IF EXISTS `info_licence`;
CREATE TABLE IF NOT EXISTS `info_licence` (
  `ID_licence` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `renouvellement` tinyint(1) NOT NULL,
  `premiere_licence` tinyint(1) NOT NULL,
  `ID_Adherent` bigint UNSIGNED NOT NULL,
  `ID_assurance` bigint UNSIGNED NOT NULL,
  `ID_tarif` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`ID_licence`),
  UNIQUE KEY `ID_licence` (`ID_licence`),
  KEY `ID_Adherent_incrip` (`ID_Adherent`),
  KEY `ID_tarif_incrip` (`ID_tarif`),
  KEY `ID_assurance_inscrip` (`ID_assurance`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `pièces_justificatives`
--

DROP TABLE IF EXISTS `pièces_justificatives`;
CREATE TABLE IF NOT EXISTS `pièces_justificatives` (
  `ID_pieces_justificatives` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `ID_Adherent` bigint UNSIGNED NOT NULL,
  `ID_type` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`ID_pieces_justificatives`),
  UNIQUE KEY `ID_pièces_justificatives` (`ID_pieces_justificatives`),
  KEY `ID_Adherent_pieces` (`ID_Adherent`),
  KEY `ID_type_piece` (`ID_type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tarif`
--

DROP TABLE IF EXISTS `tarif`;
CREATE TABLE IF NOT EXISTS `tarif` (
  `ID_tarif` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `Tarif_etranger` int NOT NULL,
  `Tarif_mineur` int NOT NULL,
  `Tarif_etudiant` int NOT NULL,
  `Tarif_adulte` int NOT NULL,
  PRIMARY KEY (`ID_tarif`),
  UNIQUE KEY `ID_tarif` (`ID_tarif`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `type_de_pièces`
--

DROP TABLE IF EXISTS `type_de_pièces`;
CREATE TABLE IF NOT EXISTS `type_de_pièces` (
  `ID_type` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `Piece_identite` int NOT NULL,
  `Attestation_de_sante` int NOT NULL,
  `Droit_image` tinyint(1) NOT NULL,
  `Certificat_medical` int NOT NULL,
  `Autorisation parentale` int NOT NULL,
  PRIMARY KEY (`ID_type`),
  UNIQUE KEY `ID_type` (`ID_type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `ville`
--

DROP TABLE IF EXISTS `ville`;
CREATE TABLE IF NOT EXISTS `ville` (
  `ID_ville` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `Code_postal` varchar(20) NOT NULL,
  `ville` varchar(20) NOT NULL,
  PRIMARY KEY (`ID_ville`),
  UNIQUE KEY `ID_ville` (`ID_ville`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `adherent`
--
ALTER TABLE `adherent`
  ADD CONSTRAINT `adherent_ibfk_1` FOREIGN KEY (`ID_ville`) REFERENCES `ville` (`ID_ville`);

--
-- Contraintes pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD CONSTRAINT `étrangère adhèrent_assurance` FOREIGN KEY (`ID_Adherent`) REFERENCES `adherent` (`ID_adherent`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD CONSTRAINT `étrangère gymnase_evenement` FOREIGN KEY (`ID_gymnase`) REFERENCES `gymnase` (`ID_gymnase`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `gymnase`
--
ALTER TABLE `gymnase`
  ADD CONSTRAINT `étrangère ville_gymnase` FOREIGN KEY (`ID_ville`) REFERENCES `ville` (`ID_ville`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `info_inscription`
--
ALTER TABLE `info_inscription`
  ADD CONSTRAINT `étrangère adhèrent_inscrip` FOREIGN KEY (`ID_Adherent`) REFERENCES `adherent` (`ID_adherent`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `info_licence`
--
ALTER TABLE `info_licence`
  ADD CONSTRAINT `étrangère adhèrent_licence` FOREIGN KEY (`ID_Adherent`) REFERENCES `adherent` (`ID_adherent`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `étrangère tarif_licence` FOREIGN KEY (`ID_tarif`) REFERENCES `tarif` (`ID_tarif`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `étrangère asurance_licence` FOREIGN KEY (`ID_assurance`) REFERENCES `assurance` (`ID_assurance`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `pièces_justificatives`
--
ALTER TABLE `pièces_justificatives`
  ADD CONSTRAINT `étrangère adhèrent_pieces` FOREIGN KEY (`ID_Adherent`) REFERENCES `adherent` (`ID_adherent`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `étrangère type_pieces` FOREIGN KEY (`ID_type`) REFERENCES `type_de_pièces` (`ID_type`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;