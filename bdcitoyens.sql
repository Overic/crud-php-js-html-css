-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 27 jan. 2023 à 17:13
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bdcitoyens`
--

-- --------------------------------------------------------

--
-- Structure de la table `citoyens`
--

CREATE TABLE `citoyens` (
  `idCli` int(11) NOT NULL,
  `nom` varchar(500) NOT NULL,
  `prenom` varchar(500) NOT NULL,
  `dateDeNaissance` date NOT NULL,
  `email` varchar(500) NOT NULL,
  `nDeTelephone` int(11) NOT NULL,
  `profession` varchar(500) NOT NULL,
  `idCom` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `citoyens`
--

INSERT INTO `citoyens` (`idCli`, `nom`, `prenom`, `dateDeNaissance`, `email`, `nDeTelephone`, `profession`, `idCom`) VALUES
(6, 'bobo', 'adjanou', '2023-01-06', 'ddds@gmail.com', 78887288, 'banquier', 0),
(47, 'houdjenoukon', 'zopa', '2023-01-10', 'bobo@gmail.com', 58587555, 'pasteur', 0),
(50, 'haya', 'mika', '2022-12-30', 'bobko@gmail.com', 0, 'pasteur', 0),
(74, 'HOROCHIMARU', 'SENSEI', '1969-02-14', 'horochisensei@gmail.com', 75456365, 'déserteur', 48),
(75, 'AMARU', 'KONO', '1967-07-21', 'konoamaru@gmail.com', 45656565, 'genin', 34);

-- --------------------------------------------------------

--
-- Structure de la table `commune`
--

CREATE TABLE `commune` (
  `id` int(11) NOT NULL,
  `libelleCom` varchar(50) NOT NULL,
  `idDep` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commune`
--

INSERT INTO `commune` (`id`, `libelleCom`, `idDep`) VALUES
(1, 'Banikoara', 1),
(2, 'Gogounou', 1),
(3, 'Kandi', 1),
(4, 'Karimama', 1),
(5, 'Malanville', 1),
(6, 'Segbana', 1),
(7, 'Boukoumbé', 2),
(8, 'Cobly', 2),
(9, 'Kérou', 2),
(10, 'Kouandé', 2),
(11, 'Matéri', 2),
(12, 'Natitingou', 2),
(13, 'Péhunco', 2),
(14, 'Tanguiéta', 2),
(15, 'Toucountoun', 2),
(16, 'Abomey-Calavi', 3),
(17, 'Allada', 3),
(18, 'Kpomassè ', 3),
(19, 'Ouidah ', 3),
(20, 'Sô-Ava', 3),
(21, 'Toffo', 3),
(22, 'Tori-Bossito ', 3),
(23, 'Zè ', 3),
(24, 'Bembéréké ', 4),
(25, 'Kalalé ', 4),
(26, 'N\'Dali ', 4),
(27, 'Nikki ', 4),
(28, 'Parakou ', 4),
(29, 'Pèrèrè', 4),
(30, 'Sinendé ', 4),
(31, 'Tchaourou ', 4),
(32, 'Bantè ', 5),
(33, 'Dassa-Zoumè ', 5),
(34, 'Glazoué ', 5),
(35, 'Ouèssè ', 5),
(36, 'Savalou ', 5),
(37, 'Savè ', 5),
(38, 'Aplahoué ', 6),
(39, 'Djakotomey ', 6),
(40, 'Dogbo-Tota ', 6),
(41, 'Klouékanmè ', 6),
(42, 'Lalo ', 6),
(43, 'Toviklin', 6),
(44, 'Bassila ', 7),
(45, 'Copargo ', 7),
(46, 'Djougou ', 7),
(47, 'Ouaké ', 7),
(48, 'Cotonou ', 8),
(49, 'Athiémé ', 9),
(50, 'Bopa', 9),
(51, 'Comè', 9),
(52, ' Grand-Popo ', 9),
(53, 'Houéyogbé ', 9),
(54, 'Lokossa ', 9),
(55, 'Adjarra ', 10),
(56, 'Adjohoun ', 10),
(57, 'Aguégués', 10),
(58, ' Akpro-Missérété', 10),
(59, ' Avrankou ', 10),
(60, 'Bonou ', 10),
(61, 'Dangbo', 10),
(62, ' Porto-Novo ', 10),
(63, 'Sèmè-Kpodj', 10),
(64, 'Adja-Ouèrè ', 11),
(65, 'Ifangni', 11),
(66, ' Kétou', 11),
(67, 'Pobè', 11),
(68, ' Sakété', 11),
(69, ' Abomey ', 12),
(70, 'Agbangnizoun', 12),
(71, ' Bohicon', 12),
(72, ' Covè', 12),
(73, ' Djidja ', 12),
(74, 'Ouinhi', 12),
(75, ' Zagnanado', 12),
(76, ' Za-Kpota ', 12),
(77, 'Zogbodome', 12);

-- --------------------------------------------------------

--
-- Structure de la table `departement`
--

CREATE TABLE `departement` (
  `id` int(11) NOT NULL,
  `libelleDep` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `departement`
--

INSERT INTO `departement` (`id`, `libelleDep`) VALUES
(1, 'Alibori'),
(2, 'Atacora'),
(3, 'Atlantique'),
(4, 'Borgou'),
(5, 'Collines'),
(6, 'Couffo'),
(7, 'Donga'),
(8, 'Littoral'),
(9, 'Mono'),
(10, 'Ouémé'),
(11, 'Plateau'),
(12, 'Zou');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `citoyens`
--
ALTER TABLE `citoyens`
  ADD PRIMARY KEY (`idCli`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `nDeTelephone` (`nDeTelephone`);

--
-- Index pour la table `commune`
--
ALTER TABLE `commune`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `departement`
--
ALTER TABLE `departement`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `citoyens`
--
ALTER TABLE `citoyens`
  MODIFY `idCli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT pour la table `commune`
--
ALTER TABLE `commune`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT pour la table `departement`
--
ALTER TABLE `departement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
