-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Sam 18 Juin 2016 à 20:25
-- Version du serveur :  5.5.42
-- Version de PHP :  7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `zer0`
--
CREATE DATABASE IF NOT EXISTS `zer0` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `zer0`;

-- --------------------------------------------------------

--
-- Structure de la table `billets`
--

CREATE TABLE IF NOT EXISTS `billets` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) DEFAULT NULL,
  `contenu` text,
  `date_creation` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `billets`
--

INSERT INTO `billets` (`id`, `titre`, `contenu`, `date_creation`) VALUES
(1, 'Mon premier billet', 'Il fait beau il fait chaud', '2016-06-15 00:00:00'),
(2, 'Un peu de musique', 'Nouveau groupe favori: BK Benjamin', '0000-00-00 00:00:00'),
(3, 'Arrivee de mon chat à Londres', 'Que c''est bon d''avoir un aristo''cat', '0000-00-00 00:00:00'),
(4, 'Mon dernier repas', 'Un super BBQ avec ma famille', '0000-00-00 00:00:00'),
(5, 'Dernier billet', 'Déjà 100 000 visites, merci c''est super chic ! :)', '0000-00-00 00:00:00'),
(6, 'J''ai menti', 'Le blog a été rénové', '0000-00-00 00:00:00'),
(7, 'Rouverture du blog', 'Ouverture grand public dès juillet 2016', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE IF NOT EXISTS `commentaires` (
  `id` int(11) NOT NULL,
  `id_billet` int(11) NOT NULL,
  `auteur` varchar(255) DEFAULT NULL,
  `commentaire` text,
  `date_commentaire` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `id_billet`, `auteur`, `commentaire`, `date_commentaire`) VALUES
(1, 0, 'bubull', 'C''est trop ça !', '2016-06-16 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `minichat`
--

CREATE TABLE IF NOT EXISTS `minichat` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(255) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `minichat`
--

INSERT INTO `minichat` (`id`, `pseudo`, `message`) VALUES
(1, 'Tom', 'Il fait beau aujourd''hui, vous ne trouvez pas ?'),
(2, 'John', 'Ouais, ça faisait un moment qu''on n''avait pas vu la lumière du soleil !'),
(3, 'Patrice', 'Ça vous tente d''aller à la plage aujourd''hui ? Y''a de super vagues !'),
(4, 'Tom', 'Cool, bonne idée ! J''amène ma planche !'),
(5, 'John', 'Comptez sur moi !');

-- --------------------------------------------------------

--
-- Structure de la table `prive`
--

CREATE TABLE IF NOT EXISTS `prive` (
  `id` int(11) NOT NULL,
  `type_compte` varchar(7) NOT NULL DEFAULT 'general',
  `pseudo` varchar(40) DEFAULT NULL,
  `motdepasse` varchar(40) DEFAULT NULL,
  `e_mail` varchar(40) DEFAULT NULL,
  `date_creation` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `prive`
--

INSERT INTO `prive` (`id`, `type_compte`, `pseudo`, `motdepasse`, `e_mail`, `date_creation`) VALUES
(1, 'general', 'madameweb', '098f6bcd4621d373cade4e832627b4f6', 'ophelie.toumine@gmail.com', '2016-06-16 00:00:00'),
(17, 'general', 'aristo', 'aa8af3ebe14831a7cd1b6d1383a03755', '', '2016-06-16 00:00:00'),
(18, 'general', 'SG', 'c7660c356e340012e7f21d12e56a91da', 'info@biocodex.fr', '2016-06-16 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `public`
--

CREATE TABLE IF NOT EXISTS `public` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(40) DEFAULT 'public',
  `motdepasse` varchar(40) DEFAULT 'public'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `public`
--

INSERT INTO `public` (`id`, `pseudo`, `motdepasse`) VALUES
(1, 'public', '4c9184f37cff01bcdc32dc486ec36961');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `billets`
--
ALTER TABLE `billets`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `minichat`
--
ALTER TABLE `minichat`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `message` (`message`);

--
-- Index pour la table `prive`
--
ALTER TABLE `prive`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pseudo` (`pseudo`);

--
-- Index pour la table `public`
--
ALTER TABLE `public`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `billets`
--
ALTER TABLE `billets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `minichat`
--
ALTER TABLE `minichat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `prive`
--
ALTER TABLE `prive`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT pour la table `public`
--
ALTER TABLE `public`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD CONSTRAINT `id_billet` FOREIGN KEY (`id`) REFERENCES `billets` (`id`);
