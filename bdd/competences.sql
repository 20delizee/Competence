-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 04, 2021 at 03:11 PM
-- Server version: 8.0.22-0ubuntu0.20.04.3
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `competences`
--

-- --------------------------------------------------------

--
-- Table structure for table `Activite`
--

CREATE TABLE `Activite` (
  `id_activite` varchar(50) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `id_bloc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Bloc`
--

CREATE TABLE `Bloc` (
  `id_bloc` varchar(50) NOT NULL,
  `nom` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Choisir`
--

CREATE TABLE `Choisir` (
  `id_EGNOM` varchar(50) NOT NULL,
  `id_option` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Competences`
--

CREATE TABLE `Competences` (
  `id_competence` varchar(50) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `detail` varchar(50) DEFAULT NULL,
  `id_activite` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Contexte`
--

CREATE TABLE `Contexte` (
  `id_contexte` varchar(50) NOT NULL,
  `contexte` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Creer`
--

CREATE TABLE `Creer` (
  `id_EGNOM` varchar(50) NOT NULL,
  `id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Liens`
--

CREATE TABLE `Liens` (
  `id_liens` varchar(50) NOT NULL,
  `URl` varchar(50) DEFAULT NULL,
  `details` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Options`
--

CREATE TABLE `Options` (
  `id_options` varchar(50) NOT NULL,
  `options` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Situation`
--

CREATE TABLE `Situation` (
  `id` varchar(50) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `date_debut` date DEFAULT NULL,
  `details` varchar(50) DEFAULT NULL,
  `date_creation` date DEFAULT NULL,
  `duree` int DEFAULT NULL,
  `type_duree` varchar(50) DEFAULT NULL,
  `id_liens` varchar(50) DEFAULT NULL,
  `id_contexte` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Type_de_compte`
--

CREATE TABLE `Type_de_compte` (
  `id_type_compte` varchar(50) NOT NULL,
  `contexte` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Utilisateur`
--

CREATE TABLE `Utilisateur` (
  `id_EGNOM` varchar(50) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `mdp` varchar(50) DEFAULT NULL,
  `type_de_compte` varchar(50) DEFAULT NULL,
  `options` varchar(50) DEFAULT NULL,
  `id_type_compte` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Viser`
--

CREATE TABLE `Viser` (
  `id` varchar(50) DEFAULT NULL,
  `id_competence` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Activite`
--
ALTER TABLE `Activite`
  ADD PRIMARY KEY (`id_activite`),
  ADD KEY `id_bloc` (`id_bloc`);

--
-- Indexes for table `Bloc`
--
ALTER TABLE `Bloc`
  ADD PRIMARY KEY (`id_bloc`);

--
-- Indexes for table `Choisir`
--
ALTER TABLE `Choisir`
  ADD PRIMARY KEY (`id_EGNOM`,`id_option`),
  ADD KEY `id_option` (`id_option`);

--
-- Indexes for table `Competences`
--
ALTER TABLE `Competences`
  ADD PRIMARY KEY (`id_competence`),
  ADD KEY `id_activite` (`id_activite`);

--
-- Indexes for table `Contexte`
--
ALTER TABLE `Contexte`
  ADD PRIMARY KEY (`id_contexte`);

--
-- Indexes for table `Creer`
--
ALTER TABLE `Creer`
  ADD PRIMARY KEY (`id_EGNOM`,`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `Liens`
--
ALTER TABLE `Liens`
  ADD PRIMARY KEY (`id_liens`);

--
-- Indexes for table `Options`
--
ALTER TABLE `Options`
  ADD PRIMARY KEY (`id_options`);

--
-- Indexes for table `Situation`
--
ALTER TABLE `Situation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_liens` (`id_liens`),
  ADD KEY `id_contexte` (`id_contexte`);

--
-- Indexes for table `Type_de_compte`
--
ALTER TABLE `Type_de_compte`
  ADD PRIMARY KEY (`id_type_compte`);

--
-- Indexes for table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  ADD PRIMARY KEY (`id_EGNOM`),
  ADD KEY `id_type_compte` (`id_type_compte`);

--
-- Indexes for table `Viser`
--
ALTER TABLE `Viser`
  ADD PRIMARY KEY (`id_competence`),
  ADD KEY `id` (`id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Activite`
--
ALTER TABLE `Activite`
  ADD CONSTRAINT `Activite_ibfk_1` FOREIGN KEY (`id_bloc`) REFERENCES `Bloc` (`id_bloc`);

--
-- Constraints for table `Choisir`
--
ALTER TABLE `Choisir`
  ADD CONSTRAINT `Choisir_ibfk_1` FOREIGN KEY (`id_EGNOM`) REFERENCES `Utilisateur` (`id_EGNOM`),
  ADD CONSTRAINT `Choisir_ibfk_2` FOREIGN KEY (`id_option`) REFERENCES `Options` (`id_options`);

--
-- Constraints for table `Competences`
--
ALTER TABLE `Competences`
  ADD CONSTRAINT `Competences_ibfk_1` FOREIGN KEY (`id_activite`) REFERENCES `Activite` (`id_activite`);

--
-- Constraints for table `Creer`
--
ALTER TABLE `Creer`
  ADD CONSTRAINT `Creer_ibfk_1` FOREIGN KEY (`id_EGNOM`) REFERENCES `Utilisateur` (`id_EGNOM`),
  ADD CONSTRAINT `Creer_ibfk_2` FOREIGN KEY (`id`) REFERENCES `Situation` (`id`);

--
-- Constraints for table `Situation`
--
ALTER TABLE `Situation`
  ADD CONSTRAINT `Situation_ibfk_1` FOREIGN KEY (`id_liens`) REFERENCES `Liens` (`id_liens`),
  ADD CONSTRAINT `Situation_ibfk_2` FOREIGN KEY (`id_contexte`) REFERENCES `Contexte` (`id_contexte`);

--
-- Constraints for table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  ADD CONSTRAINT `Utilisateur_ibfk_1` FOREIGN KEY (`id_type_compte`) REFERENCES `Type_de_compte` (`id_type_compte`);

--
-- Constraints for table `Viser`
--
ALTER TABLE `Viser`
  ADD CONSTRAINT `Viser_ibfk_1` FOREIGN KEY (`id`) REFERENCES `Situation` (`id`),
  ADD CONSTRAINT `Viser_ibfk_2` FOREIGN KEY (`id_competence`) REFERENCES `Competences` (`id_competence`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
