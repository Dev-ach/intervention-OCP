-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 30 Mai 2016 à 09:17
-- Version du serveur :  5.7.9
-- Version de PHP :  5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `intervention`
--

-- --------------------------------------------------------

--
-- Structure de la table `demande`
--

DROP TABLE IF EXISTS `demande`;
CREATE TABLE IF NOT EXISTS `demande` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dest` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `urg` varchar(255) NOT NULL,
  `serv` varchar(255) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `materiel` varchar(255) NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `date` date NOT NULL,
  `edit` varchar(255) NOT NULL,
  `valid` varchar(255) DEFAULT NULL,
  `hpdescription` text,
  `hpedit` varchar(255) DEFAULT NULL,
  `hpdate` date DEFAULT NULL,
  `renvoyer` tinyint(4) DEFAULT NULL,
  `ocpedit` varchar(255) DEFAULT NULL,
  `ocpdate` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `demande`
--

INSERT INTO `demande` (`id`, `dest`, `contact`, `categorie`, `urg`, `serv`, `titre`, `description`, `materiel`, `file`, `date`, `edit`, `valid`, `hpdescription`, `hpedit`, `hpdate`, `renvoyer`, `ocpedit`, `ocpdate`) VALUES
(18, 'amine', 'c1223547', 'reclamation', 'Élevée', 'commercial', 'pc ne matche plus', 'pc ne matche plus pc ne matche plus pc ne matche plus pc ne matche plus pc ne matche plus pc ne matche plus pc ne matche plus pc ne matche plus pc ne matche plus pc ne matche plus pc ne matche plus pc ne matche plus pc ne matche plus pc ne matche plus pc ne matche plus pc ne matche plus pc ne matche plus pc ne matche plus pc ne matche plus pc ne matche plus pc ne matche plus pc ne matche plus pc ne matche plus pc ne matche plus pc ne matche plus pc ne matche plus pc ne matche plus pc ne matche plus pc ne matche plus pc ne matche plus pc ne matche plus pc ne matche plus pc ne matche plus pc ne matche plus pc ne matche plus pc ne matche plus', 'D775589', NULL, '2016-05-19', 'anass@ocp.com', 'ocp', 'pc ne matche plus pc ne matche plus pc ne matche plus pc ne matche plus pc ne matche plus pc ne matche plus pc ne matche plus pc ne matche plus pc ne matche plus pc ne matche plus pc ne matche plus pc ne matche plus pc ne matche plus pc ne matche plus pc ne matche plus pc ne matche plus pc ne matche plus pc ne matche plus pc ne matche plus pc ne matche plus pc ne matche plus pc ne matche plus pc ne matche plus pc ne matche plus pc ne matche plus pc ne matche plus pc ne matche plus pc ne matche plus pc ne matche plus pc ne matche plus pc ne matche plus pc ne matche plus pc ne matche plus pc ne matche plus pc ne matche plus pc ne matche plus', 'achraf@ocp.com', '2016-05-19', 1, 'amine@ocp.com', '2016-05-19'),
(19, 'anass', 'op1223448', 'incident', 'Élevée', 'commercial', 'mon pc ne matche plus', 'mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus', 'D775589', NULL, '2016-05-19', 'anass@ocp.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'achgege', 'c1223547', 'reclamation', 'Moyenne', 'Achat', 'arsgrsag', 'mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus', 'DR5547', NULL, '2016-05-18', 'simo@ocp.com', NULL, 'mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus', 'achraf@ocp.com', '2016-05-19', 1, NULL, NULL),
(16, 'amine', 'c1223547', 'incident', 'Moyenne', 'commercial', 'mon pc ne matche plus', 'mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus', 'D775589', NULL, '2016-05-18', 'anass@ocp.com', 'hp', NULL, 'achraf@ocp.com', '2016-05-18', NULL, NULL, NULL),
(15, 'anass', 'c1247jd', 'reclamation', 'Moyenne', 'Finance/Comptabilité', 'l''impriment', 'l''impriment ne marche plus  l''impriment ne marche plus  l''impriment ne marche plus  l''impriment ne marche plus  l''impriment ne marche plus  l''impriment ne marche plus  l''impriment ne marche plus  l''impriment ne marche plus  l''impriment ne marche plus  l''impriment ne marche plus  l''impriment ne marche plus  l''impriment ne marche plus  l''impriment ne marche plus  l''impriment ne marche plus  l''impriment ne marche plus  l''impriment ne marche plus  l''impriment ne marche plus', 'RE44587', NULL, '2016-05-18', 'karim@ocp.com', 'hp', NULL, 'achraf@ocp.com', '2016-05-18', NULL, NULL, NULL),
(13, 'achraf', 'c1223547', 'reclamation', 'Critique', 'Achat', 'mon pc ne matche plus', 'mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus mon pc ne matche plus', 'D775589', NULL, '2016-05-18', 'anass@ocp.com', 'ocp', 'son pc ne matche plus son pc ne matche plus son pc ne matche plus son pc ne matche plus son pc ne matche plus son pc ne matche plus son pc ne matche plus son pc ne matche plus son pc ne matche plus son pc ne matche plus son pc ne matche plus son pc ne matche plus son pc ne matche plus son pc ne matche plus son pc ne matche plus son pc ne matche plus son pc ne matche plus', 'achraf@ocp.com', '2016-05-18', 1, 'amine@ocp.com', '2016-05-18'),
(14, 'amine', 'op1223448', 'incident', 'Élevée', 'BPM', 'pc portable ne marche plus', 'pc portable ne marche plus pc portable ne marche plus pc portable ne marche plus pc portable ne marche plus pc portable ne marche plus pc portable ne marche plus pc portable ne marche plus pc portable ne marche plus pc portable ne marche plus pc portable ne marche plus pc portable ne marche plus pc portable ne marche plus pc portable ne marche plus pc portable ne marche plus pc portable ne marche plus pc portable ne marche plus pc portable ne marche plus', 'DR5547', NULL, '2016-05-18', 'simo@ocp.com', 'ocp', 'son pc portable ne marche plus son pc portable ne marche plus son pc portable ne marche plus son pc portable ne marche plus son pc portable ne marche plus son pc portable ne marche plus son pc portable ne marche plus son pc portable ne marche plus son pc portable ne marche plus son pc portable ne marche plus son pc portable ne marche plus son pc portable ne marche plus son pc portable ne marche plus son pc portable ne marche plus son pc portable ne marche plus son pc portable ne marche plus son pc portable ne marche plus', 'achraf@ocp.com', '2016-05-18', 1, 'amine@ocp.com', '2016-05-18');

-- --------------------------------------------------------

--
-- Structure de la table `fournisseurs`
--

DROP TABLE IF EXISTS `fournisseurs`;
CREATE TABLE IF NOT EXISTS `fournisseurs` (
  `idFourniseur` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`idFourniseur`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `fournisseurs`
--

INSERT INTO `fournisseurs` (`idFourniseur`, `name`, `telephone`, `email`) VALUES
(1, 'HP', '0658874575', 'hp@fournis.com'),
(2, 'DELL', '0655879945', 'DELL@four.com');

-- --------------------------------------------------------

--
-- Structure de la table `materiels`
--

DROP TABLE IF EXISTS `materiels`;
CREATE TABLE IF NOT EXISTS `materiels` (
  `idMateriel` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `user` int(11) DEFAULT NULL,
  `fournisseur` int(11) DEFAULT NULL,
  `fingarantie` date DEFAULT NULL,
  PRIMARY KEY (`idMateriel`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `materiels`
--

INSERT INTO `materiels` (`idMateriel`, `nom`, `type`, `user`, `fournisseur`, `fingarantie`) VALUES
('D775589', 'HP-997', 'ordinateur', 2, 1, '2017-05-13'),
('DR5547', 'DELL-750', 'ordinateur', 4, 2, '2017-05-13'),
('RE44587', 'DELL-4478', 'imprimante', 5, 2, '2017-09-20'),
('RS255478', 'HP-per55', 'ordinateur', 8, 1, '2017-05-13'),
('ETG77', 'dell-144', 'ordinateur', NULL, 2, '2017-05-13');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `rol` varchar(255) NOT NULL,
  `usmateriel` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `email`, `pass`, `rol`, `usmateriel`) VALUES
(1, 'achraf', 'achraf@ocp.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'hp', NULL),
(2, 'anass', 'anass@ocp.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'utilisateur', 'D775589'),
(3, 'Amine', 'amine@ocp.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'ocp', NULL),
(4, 'simo', 'simo@ocp.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'utilisateur', 'DR5547'),
(5, 'karim', 'karim@ocp.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'utilisateur', 'RE44587'),
(8, 'ilham', 'ilham@ocp.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'utilisateur', 'RS255478'),
(9, 'admin', 'admin@ad.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'admin', NULL),
(10, 'youssef', 'youssef@ocp.com', 'bf8759494480995e23af85ae51c170512c6e99f2', 'hp', '3OPPfnDk4oZKHRwKaaXPDRSY6ouRVF'),
(11, 'kamal', 'kamal@ocp.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'ocp', 'yW6XnOzDSKqTwDuy4d1qIXCY6lWmE5'),
(12, 'layla', 'layla@ocp.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'hp', '9qCR1hUU3MvVCSLWtC8JOApRPU3bkY'),
(13, 'kira', 'kira@ocp.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'ocp', 'htUzmV1lGZLhhHZCXfyNsTGlkv07TH');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
