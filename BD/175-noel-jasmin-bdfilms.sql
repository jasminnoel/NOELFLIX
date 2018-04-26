-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 23 fév. 2018 à 21:11
-- Version du serveur :  5.7.17
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `175-noel-jasmin-bdfilms`
--

-- --------------------------------------------------------

--
-- Structure de la table `connexion`
--

CREATE TABLE `connexion` (
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `motdepasse` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `connexion`
--

INSERT INTO `connexion` (`username`, `motdepasse`) VALUES
('joeblo1', 'test123'),
('testuser1', 'motdepasse1'),
('jasminnoel1', 'password'),
('admin', 'admin'),
('user', 'user'),
('allo1', 'all01');

-- --------------------------------------------------------

--
-- Structure de la table `films`
--

CREATE TABLE `films` (
  `idfilm` int(3) NOT NULL,
  `titrefilm` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `catfilm` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `dureefilm` time NOT NULL,
  `realfilm` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `anneefilm` year(4) NOT NULL,
  `imgfilm` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `trailerfilm` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `synopsis` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `prix` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `films`
--

INSERT INTO `films` (`idfilm`, `titrefilm`, `catfilm`, `dureefilm`, `realfilm`, `anneefilm`, `imgfilm`, `trailerfilm`, `synopsis`, `prix`) VALUES
(5, 'Les Ã©vadÃ©s', 'Drama', '02:22:00', 'Frank Darabont', 1994, '7e2caa0304e591321ee1382e3d123ac01b48a0c4.jpg', '//v.traileraddict.com/1385', 'Two imprisoned men bond over a number of years, finding solace and eventual redemption through acts of common decency.', '3.50'),
(7, 'The dark knight', 'Action', '02:32:00', 'Christopher Nolan', 2008, 'c48024cad830ce8ee6085a26559e5aa299ba9a1d.jpg', '//v.traileraddict.com/5284', 'When the menace known as the Joker emerges from his mysterious past, he wreaks havoc and chaos on the people of Gotham, the Dark Knight must accept one of the greatest psychological and physical tests of his ability to fight injustice.', '4.50'),
(8, 'Pulp fiction', 'Action', '02:34:00', 'Quentin Tarantino', 1994, 'dacdd7ed3ee91ad29c7c3027068821aee163f323.jpg', '//v.traileraddict.com/46632', 'The lives of two mob hitmen, a boxer, a gangster\'s wife, and a pair of diner bandits intertwine in four tales of violence and redemption.', '3.50'),
(9, 'Le seigneur des Anneaux', 'Aventure', '02:58:00', 'Peter Jackson', 1994, '2b989ac81c7abe8a533fe3f4602813b64233885e.jpg', '//v.traileraddict.com/16998', 'The lives of two mob hitmen, a boxer, a gangster\'s wife, and a pair of diner bandits intertwine in four tales of violence and redemption.', '3.50'),
(10, 'Fight Club', 'Action', '02:19:00', 'David Fincher', 1999, '82320b6af987303ad4d6de7a30a48d0228b0d355.jpg', '//v.traileraddict.com/123', 'An insomniac office worker, looking for a way to change his life, crosses paths with a devil-may-care soapmaker, forming an underground fight club that evolves into something much, much more.', '4.50'),
(12, 'La belle et la bete', 'Fantastique', '01:52:00', 'Christopher Gans', 2014, '5c3a082a230bd4c6081f180c495e90f2c2d606a3.jpg', '//v.traileraddict.com/116784', 'An unexpected romance blooms after the the youngest daughter of a merchant who has fallen on hard times offers herself to the mysterious beast to which her father has become indebted.', '5.50'),
(13, 'La citÃ© de Dieu', 'Drama', '02:10:00', ' Fernando Meirelles', 2002, '48aa13d5d9852ea587ac08fdd25f681f1d662666.jpg', '//v.traileraddict.com/1958', 'Two boys growing up in a violent neighborhood of Rio de Janeiro take different paths: one becomes a photographer, the other a drug dealer.', '5.50'),
(14, 'La forme de l\'eau', 'Fantastique', '02:03:00', 'Guillermo Del Toro', 2017, '726146b1a6bf73cc713c652e488e353dc96978ab.jpg', '//v.traileraddict.com/119888', 'At a top secret research facility in the 1960s, a lonely janitor forms a unique relationship with an amphibious creature that is being held in captivity.', '8.00'),
(15, 'Venom', 'Action', '02:44:00', 'Ruben Fleisher', 2018, 'f8cf14c8420b28a16f8e1ef4813204b14cc93f2c.jpg', '//v.traileraddict.com/122580', 'One of Marvel\'s most enigmatic, complex and badass characters comes to the big screen, starring Academy Award-nominated actor Tom Hardy as the lethal protector Venom.', '2.20'),
(16, 'Game Night', 'Fantastique', '01:40:00', 'John Francis', 2018, '76d645bfc026ee68a7931c4648b18228753b3974.jpg', '//v.traileraddict.com/121613', 'A group of friends who meet regularly for game nights find themselves trying to solve a murder mystery.', '5.50'),
(17, 'L\'Ã®le aux chiens', 'Aventure', '01:41:00', 'Wes Anderson', 2018, '50618747f5646554ac8ec9365309ca695a2fe5f5.jpg', '//v.traileraddict.com/120873', 'Set in Japan, Isle of Dogs follows a boy\'s odyssey in search of his dog.', '2.99'),
(18, 'Red Sparrow', 'Drama', '02:19:00', 'Francis Lawrence', 2018, 'cf90c083bef49b8e78a75d5b00e318dbbd5c569f.jpg', '//v.traileraddict.com/120776', 'Ballerina Dominika Egorova is recruited to \'Sparrow School\' a Russian intelligence service where she is forced to use her body as a weapon. But her first mission, targeting a CIA agent, threatens to unravel the security of both nations.', '3.99');

-- --------------------------------------------------------

--
-- Structure de la table `locations`
--

CREATE TABLE `locations` (
  `idfilm` int(3) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `datelocation` date NOT NULL,
  `dureelocation` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `locations`
--

INSERT INTO `locations` (`idfilm`, `username`, `datelocation`, `dureelocation`) VALUES
(8, 'user', '2018-02-23', 4),
(9, 'user', '2018-02-23', 2),
(8, 'user', '2018-02-23', 4),
(9, 'user', '2018-02-23', 2),
(5, 'user', '2018-02-23', 1),
(10, 'user', '2018-02-23', 5),
(8, 'user', '2018-02-23', 1),
(9, 'user', '2018-02-23', 3),
(10, 'user', '2018-02-23', 2);

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

CREATE TABLE `membres` (
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `datenaiss` date NOT NULL,
  `sexe` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `courriel` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `role` enum('admin','user') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `membres`
--

INSERT INTO `membres` (`username`, `prenom`, `datenaiss`, `sexe`, `courriel`, `role`) VALUES
('admin', 'jasmin', '1990-02-15', 'm', 'jasmin.noel@usherbrooke.ca', 'admin'),
('allo1', 'Monsieur test', '2018-02-02', 'F', 'piopolis22@hotmail.com', 'user'),
('jasminnoel1', 'Jasmin', '1990-12-02', 'M', 'jas.minnoel.22@gmail.com', 'user'),
('joeblo1', 'joe', '2018-02-07', 'M', 'sdfwf@dxvsdcv.com', 'user'),
('testuser1', 'George', '2018-02-07', 'M', 'sdfwf@dxvsdcv.com', 'user'),
('user', 'Monsieur test', '1998-02-21', 'M', 'piopolis22@hotmail.com', 'user');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `connexion`
--
ALTER TABLE `connexion`
  ADD KEY `username` (`username`);

--
-- Index pour la table `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`idfilm`);

--
-- Index pour la table `locations`
--
ALTER TABLE `locations`
  ADD KEY `loc_idfilm_fk` (`idfilm`),
  ADD KEY `loc_username_fk` (`username`);

--
-- Index pour la table `membres`
--
ALTER TABLE `membres`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `films`
--
ALTER TABLE `films`
  MODIFY `idfilm` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `connexion`
--
ALTER TABLE `connexion`
  ADD CONSTRAINT `connexion_username_fk` FOREIGN KEY (`username`) REFERENCES `membres` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `locations`
--
ALTER TABLE `locations`
  ADD CONSTRAINT `loc_idfilm_fk` FOREIGN KEY (`idfilm`) REFERENCES `films` (`idfilm`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `loc_username_fk` FOREIGN KEY (`username`) REFERENCES `membres` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
