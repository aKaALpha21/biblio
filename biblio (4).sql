-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 21 mars 2023 à 12:22
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `biblio`
--

-- --------------------------------------------------------

--
-- Structure de la table `adherent`
--

CREATE TABLE `adherent` (
  `id_adherent` int(11) NOT NULL,
  `type_adherent` varchar(20) NOT NULL,
  `firstname_adherent` varchar(20) NOT NULL,
  `lastname_adherent` varchar(20) NOT NULL,
  `adresse` varchar(200) NOT NULL,
  `email` varchar(250) NOT NULL,
  `telephone` int(9) NOT NULL,
  `n_cin` varchar(8) NOT NULL,
  `pénalité` varchar(2) NOT NULL,
  `date_naissance` date NOT NULL,
  `surnom_adh` varchar(30) NOT NULL,
  `pswd_adh` varchar(30) NOT NULL,
  `date_creation` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `adherent`
--

INSERT INTO `adherent` (`id_adherent`, `type_adherent`, `firstname_adherent`, `lastname_adherent`, `adresse`, `email`, `telephone`, `n_cin`, `pénalité`, `date_naissance`, `surnom_adh`, `pswd_adh`, `date_creation`) VALUES
(1, 'etudiant', 'hamza', 'bakkali', 'branes 1 N 30, tanger\r\n', 'SOLICODE5@gmail.com', 694535165, 'K11111', '1', '2013-02-01', 'its_me', 'aaaa', '2023-03-02'),
(2, 'etudiant', 'younes', 'hamdan', 'malabata 1 N 540, tanger', 'SOLICODE6@gmail.com', 694535165, 'K22222', '2', '2014-03-06', 'test2013', '2013', '2023-03-02'),
(5, '', 'tt', 'rrr', '', 'Souiri@GMAIL.COM', 2147483647, 'k111113', '', '0000-00-00', '', 'HHHH', '2023-03-08'),
(6, '', 'aazz', 'ZZZ', '', 'SOLICODE2222@gmail.com', 123456, 'k111113', '', '0000-00-00', '', 'AAAA', '2023-03-08'),
(7, '', 'HAITAM', 'SOUIRI', '', 'HAITAMSOUIRI3@gmail.com', 2147483647, 'K6666', '', '0000-00-00', '', 'hhhh', '2023-03-21');

-- --------------------------------------------------------

--
-- Structure de la table `gerente`
--

CREATE TABLE `gerente` (
  `id_gerente` int(11) NOT NULL,
  `email_ger` varchar(250) NOT NULL,
  `pswd_ger` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `gerente`
--

INSERT INTO `gerente` (`id_gerente`, `email_ger`, `pswd_ger`) VALUES
(1, 'SOLICODE1@gmail.com', 'AAAA'),
(2, 'SOLICODE2@gmail.com', 'ZZZZ'),
(3, 'SOLICODE3@gmail.com', 'EEEE');

-- --------------------------------------------------------

--
-- Structure de la table `ouvrages`
--

CREATE TABLE `ouvrages` (
  `id_ouvrage` int(11) NOT NULL,
  `id_gerente` int(11) NOT NULL,
  `titre` varchar(250) NOT NULL,
  `nom_auteur` varchar(50) NOT NULL,
  `image_cover` varchar(250) NOT NULL,
  `etat` varchar(30) NOT NULL,
  `type` varchar(30) NOT NULL,
  `date_edition` date NOT NULL,
  `date_achat` date NOT NULL,
  `nombre_pages` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `ouvrages`
--

INSERT INTO `ouvrages` (`id_ouvrage`, `id_gerente`, `titre`, `nom_auteur`, `image_cover`, `etat`, `type`, `date_edition`, `date_achat`, `nombre_pages`) VALUES
(1, 1, 'FORTRESS OF BLOOD ', 'L.D GOFFIGAN', 'pic/fortress.jpeg', 'neuf', 'roman', '2020-02-03', '2022-05-13', 188),
(2, 2, 'GOLD AND BLOOD ', 'RICHARD ', 'pic/gold.jpg', 'neuf', 'livre', '2019-03-09', '2021-03-20', 200),
(3, 3, 'HARRY POTTER', 'J.K ROWOLING ', 'pic/harrypotter.jpg', 'neuf', 'DVD', '2016-03-12', '2017-05-19', 333),
(6, 1, 'FORTRESS OF BLOOD ', 'L.D GOFFIGAN', 'pic/fortress.jpeg', 'neuf', 'roman', '2020-02-03', '2022-05-13', 188),
(8, 3, 'HARRY POTTER', 'J.K ROWOLING ', 'pic/harrypotter.jpg', 'neuf', 'DVD', '2016-03-12', '2017-05-19', 333),
(10, 2, 'THE KING OF DRUGS', 'NORA BARRETT', 'pic/theking.jpg', 'occasion', 'livre', '2013-03-16', '2014-07-02', 300),
(12, 2, 'GOLD AND BLOOD ', 'RICHARD ', 'pic/gold.jpg', 'neuf', 'livre', '2019-03-09', '2021-03-20', 200),
(13, 3, 'HARRY POTTER', 'J.K ROWOLING ', 'pic/harrypotter.jpg', 'neuf', 'DVD', '2016-03-12', '2017-05-19', 333),
(14, 1, 'PRINT MONEY LEGALLY ', 'LUIS ENRIQUE MAÑON', 'pic/print.jpg', 'occasion', 'livre', '2015-03-06', '2015-06-20', 234),
(15, 2, 'THE KING OF DRUGS', 'NORA BARRETT', 'pic/theking.jpg', 'occasion', 'livre', '2013-03-16', '2014-07-02', 300),
(16, 1, 'FORTRESS OF BLOOD ', 'L.D GOFFIGAN', 'pic/fortress.jpeg', 'neuf', 'roman', '2020-02-03', '2022-05-13', 188),
(17, 2, 'GOLD AND BLOOD ', 'RICHARD ', 'pic/gold.jpg', 'neuf', 'livre', '2019-03-09', '2021-03-20', 200),
(18, 3, 'HARRY POTTER', 'J.K ROWOLING ', 'pic/harrypotter.jpg', 'neuf', 'DVD', '2016-03-12', '2017-05-19', 333);

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `id_reservation` int(11) NOT NULL,
  `id_adherent` int(11) NOT NULL,
  `id_ouvrage` int(11) NOT NULL,
  `date_reservation` date NOT NULL,
  `date_validation` date NOT NULL,
  `date_retour` date DEFAULT NULL,
  `id_gerente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `adherent`
--
ALTER TABLE `adherent`
  ADD PRIMARY KEY (`id_adherent`);

--
-- Index pour la table `gerente`
--
ALTER TABLE `gerente`
  ADD PRIMARY KEY (`id_gerente`);

--
-- Index pour la table `ouvrages`
--
ALTER TABLE `ouvrages`
  ADD PRIMARY KEY (`id_ouvrage`),
  ADD KEY `id_gerente` (`id_gerente`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id_reservation`),
  ADD KEY `id_adherent` (`id_adherent`),
  ADD KEY `id_ouvrage` (`id_ouvrage`),
  ADD KEY `id_gerente` (`id_gerente`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `adherent`
--
ALTER TABLE `adherent`
  MODIFY `id_adherent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `gerente`
--
ALTER TABLE `gerente`
  MODIFY `id_gerente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `ouvrages`
--
ALTER TABLE `ouvrages`
  MODIFY `id_ouvrage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id_reservation` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `ouvrages`
--
ALTER TABLE `ouvrages`
  ADD CONSTRAINT `ouvrages_ibfk_1` FOREIGN KEY (`id_gerente`) REFERENCES `gerente` (`id_gerente`);

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`id_adherent`) REFERENCES `adherent` (`id_adherent`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`id_ouvrage`) REFERENCES `ouvrages` (`id_ouvrage`),
  ADD CONSTRAINT `reservation_ibfk_3` FOREIGN KEY (`id_gerente`) REFERENCES `gerente` (`id_gerente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
