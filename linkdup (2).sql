-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : ven. 26 mai 2023 à 16:30
-- Version du serveur : 5.7.39
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `linkdup`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `article_id` int(11) NOT NULL,
  `content` text CHARACTER SET utf8mb4 NOT NULL,
  `date` datetime NOT NULL,
  `tag` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `picture` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`article_id`, `content`, `date`, `tag`, `user_id`, `picture`) VALUES
(21, 'fjiugvhfdiu', '2023-05-17 15:30:38', 'lifestyle', '6', '../asset/css/img/img_6464f31eb35cf.jpeg'),
(24, 'je veux dormir ', '2023-05-17 15:31:44', 'lifestyle', '6', '../asset/css/img/img_6464f360bef04.jpeg'),
(26, 'hey ', '2023-05-17 19:40:45', 'lifestyle', '9', '../asset/css/img/img_64652dbd86856.jpeg'),
(36, 'hey ', '2023-05-25 18:45:46', 'jeux', '13', '../asset/css/img/img_646facda4a096.jpeg'),
(37, 'hufvhfu', '2023-05-25 19:11:20', 'voyage', '13', '../asset/css/img/img_646fb2d84f1fc.jpg'),
(38, 'vfbguhbfgiu', '2023-05-26 13:13:00', 'jeux', '13', '../asset/css/img/img_6470b05c2b44b.jpeg');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `pseudo` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `passwords` text CHARACTER SET utf8mb4 NOT NULL,
  `email` text CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`user_id`, `pseudo`, `passwords`, `email`) VALUES
(1, 'googog', 'tototo', 'vkigv@gmail.com'),
(4, 'Laly ', '&&&&&&', 'fiovert1192@gmail.com'),
(5, 'fx', '111111', 'fiovert1192@gmail.com'),
(6, 'Laly ', '222222', 'laly@gmail.com'),
(9, 'lala', '$2y$10$zg6J.sWdsO1A26vErWaEg.P08XgHQ2ImunkaD/RDj0b3FbFzr1yYa', 'test@gmail.com'),
(10, 'lala', '$2y$10$zCDaDwyvWVblN3.sqQ5ruefFEYEFgalcs3irVCN3tjyAhwJndRE22', 'texte2@gmail.com'),
(11, 'yo', '$2y$10$fMVtFek7nurvXydk7rBsM.KiQ/oXro7/Rpj0ia7n9gQgv2HTJxNv.', 'test@gmail.com4'),
(12, 'test', '$2y$10$hvLSzZYQEexDpHRA4UcIT.cUvmTlrrwfqSQtWJzO.ErWxiQSjvhP6', 'fiona@gmail.com'),
(13, 'laly', '$2y$10$2cX8rZQzHZL8hKVILmvmVuzBIH7tyKmBOdEqm90Jorz0IOve.PnYq', 'test6@gmail.com');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`article_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
