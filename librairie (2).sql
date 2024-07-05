-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 05 juil. 2024 à 16:40
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `librairie`
--

-- --------------------------------------------------------

--
-- Structure de la table `cdes`
--

DROP TABLE IF EXISTS `cdes`;
CREATE TABLE IF NOT EXISTS `cdes` (
  `IdCde` tinyint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `produits` varchar(200) NOT NULL DEFAULT '',
  `montantCde` float(10,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `nomPrenomCli` varchar(100) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `adressecli` varchar(30) DEFAULT NULL,
  `dateCde` datetime NOT NULL DEFAULT '2024-04-07 10:30:00',
  PRIMARY KEY (`IdCde`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `cdes`
--

INSERT INTO `cdes` (`IdCde`, `produits`, `montantCde`, `nomPrenomCli`, `email`, `adressecli`, `dateCde`) VALUES
(10, ' REF001', 1016.99, 'MELI ERIC', '', 'DOUALA', '2024-04-27 02:56:13'),
(9, ' REF004,REF004,REF004', 1044.25, 'MELI ERIC', '', 'DOUALA', '2024-04-24 19:48:55'),
(8, ' REF006', 1013.45, 'MELI ERIC', '', 'DOUALA', '2024-04-24 19:48:22'),
(7, ' REF006,REF006,REF006,REF006', 1053.80, 'MELI ERIC', '', 'DOUALA', '2024-04-24 19:47:15'),
(11, ' REF001,REF001,REF005,REF005', 1056.48, 'DIVINE GRACE', '', 'Village', '2024-05-20 15:35:05'),
(12, ' REF002,REF008,REF008', 278980.00, 'FOUEGANG KEMKA MELI ERIC', '', 'Camtel Bepanda', '2024-07-05 11:07:38'),
(13, ' REF029', 76000.00, 'FOUEGANG KEMKA MELI ERIC', '', 'Camtel Bepanda', '2024-07-05 16:30:53');

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) DEFAULT NULL,
  `commentaire` varchar(400) DEFAULT NULL,
  `date_create` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `email`, `commentaire`, `date_create`) VALUES
(1, 'john.doe@example.com', 'Excellent article !', '2024-04-22 00:40:24'),
(2, 'jane.doe@example.com', 'J\'ai beaucoup appris de cet article.', '2024-04-22 00:40:24'),
(3, 'bob.smith@example.com', 'Merci pour cet article informatif.', '2024-04-22 00:40:24'),
(4, 'alice.johnson@example.com', 'Article tres interessant !', '2024-04-22 00:40:24'),
(5, 'tom.williams@example.com', 'J\'ai adore lire cet article.', '2024-04-22 00:40:24'),
(6, 'mary.johnson@example.com', 'Article tres bien ecrit.', '2024-04-22 00:40:24'),
(7, 'david.smith@example.com', 'Article tres utile.', '2024-04-22 00:40:24'),
(8, 'sarah.jones@example.com', 'Merci pour le partage.', '2024-04-22 00:40:24'),
(9, 'mark.wilson@example.com', 'Article tres complet.', '2024-04-22 00:40:24'),
(10, 'linda.brown@example.com', 'Article tres interessant.', '2024-04-22 00:40:24'),
(11, 'admineric@gmail.com', 'je l\'adore vraiment le site', '2024-04-27 03:03:38'),
(12, 'admineric@gmail.com', 'je l\'adore de tout mon coeur le site', '2024-04-27 03:05:04'),
(13, 'laurine@gmail.com', '', '2024-05-23 07:11:53'),
(14, 'laurine@gmail.com', '', '2024-05-23 07:13:52'),
(15, 'admineric@gmail.com', 'je l\\\'adore grave', '2024-07-05 11:11:11'),
(16, 'admineric@gmail.com', 'jhkjhkjhkjhkjhkjhkjhkj', '2024-07-05 11:11:32');

-- --------------------------------------------------------

--
-- Structure de la table `livres`
--

DROP TABLE IF EXISTS `livres`;
CREATE TABLE IF NOT EXISTS `livres` (
  `codeLivre` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `REF` char(10) NOT NULL DEFAULT '',
  `ISBN` char(16) DEFAULT NULL,
  `titre` char(60) DEFAULT NULL,
  `auteur` char(30) DEFAULT NULL,
  `stock` tinyint(3) UNSIGNED DEFAULT NULL,
  `pu` float(10,2) NOT NULL DEFAULT '0.00',
  `resumer` varchar(500) DEFAULT ' ',
  PRIMARY KEY (`codeLivre`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `livres`
--

INSERT INTO `livres` (`codeLivre`, `REF`, `ISBN`, `titre`, `auteur`, `stock`, `pu`, `resumer`) VALUES
(1, 'REF001', '978-0140449266', 'L\'odyssee d\'Homere', 'Homere', 86, 16500.00, ' '),
(2, 'REF002', '978-0553213257', 'Orgueil et prejuges', 'Jane Austen', 54, 122000.00, ' '),
(3, 'REF003', '978-1449613319', 'Le Petit Prince', 'Antoine', 22, 20500.00, ' '),
(5, 'REF005', '978-1451673319', 'Le vieil homme et la mer', 'Paul cyngale', 30, 55000.00, ' '),
(8, 'REF008', '978-0060937894', 'Demon slayer', 'Tokiko kayaba', 76, 77990.00, ' '),
(9, 'REF009', '9780596009201', 'The Hitchhiker\'s Guide to the Galaxy', 'Douglas Adams', 42, 129500.00, ' '),
(10, 'REF010', '9780307274515', 'The Lord of the Rings', 'J.R.R. Tolkien', 50, 30000.00, ' '),
(11, 'REF011', '9780439023580', 'The Catcher in the Rye', 'J.D. Salinger', 35, 8500.00, ' '),
(12, 'REF012', '9780060913939', 'To Kill a Mockingbird', 'Harper Lee', 40, 150500.00, ' '),
(13, 'REF013', '9780316769532', 'The Great Gatsby', 'F. Scott Fitzgerald', 30, 10550.00, ' '),
(14, 'REF014', '9780451524935', 'The Da Vinci Code', 'Dan Brown', 55, 10050.00, ' '),
(15, 'REF015', '9780061122415', 'The Hunger Games', 'Suzanne Collins', 48, 140950.00, ' '),
(16, 'REF016', '9780446679790', 'The Fault in Our Stars', 'John Green', 33, 33000.00, ' '),
(28, 'REF028', '987-113456789', 'sangoku', 'marvel', 76, 75000.00, 'resumer'),
(18, 'REF018', '9780062421090', 'Divergent', 'Veronica Roth', 40, 55005.00, ' '),
(19, 'REF019', '9780385534204', 'The Martian', 'Andy Weir', 38, 32000.00, ' '),
(20, 'REF020', '9780553283998', 'Ready Player One', 'Ernest Cline', 43, 17500.00, ' '),
(21, 'REF021', '9780062380980', 'The Hate U Give', 'Angie Thomas', 36, 18000.00, ' '),
(22, 'REF022', '9780062452083', 'Children of Blood and Bone', 'Tomi Adeyemi', 41, 16750.00, ' '),
(23, 'REF023', '9780063092501', 'The Testaments', 'Margaret Atwood', 47, 8850.00, ' '),
(24, 'REF024', '978-0140449269', 'Konan L\'aventurier', 'Michael Laplace', 76, 14000.00, 'resumer'),
(25, 'REF025', '978-0140449269', 'Detective Conan', 'john Ferere', 0, 1400.00, 'resumer'),
(29, 'REF029', '987-113456789', 'sangoku', 'marvel', 75, 75000.00, 'resumer');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `pwd` varchar(200) DEFAULT NULL,
  `date_create` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`email`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `email`, `nom`, `pwd`, `date_create`) VALUES
(1, 'john.doe@example.com', 'John Doe', 'secret', '2024-04-22 00:38:39'),
(2, 'jane.doe@example.com', 'Jane Doe', 'password', '2024-04-22 00:38:39'),
(3, 'bob.smith@example.com', 'Bob Smith', 'secure', '2024-04-22 00:38:39'),
(4, 'alice.johnson@example.com', 'Alice Johnson', 'protected', '2024-04-22 00:38:39'),
(5, 'tom.williams@example.com', 'Tom Williams', 'mysecret', '2024-04-22 00:38:39'),
(6, 'mary.johnson@example.com', 'Mary Johnson', 'verystrong', '2024-04-22 00:38:39'),
(7, 'david.smith@example.com', 'David Smith', 'supersecret', '2024-04-22 00:38:39'),
(8, 'sarah.jones@example.com', 'Sarah Jones', 'password123', '2024-04-22 00:38:39'),
(9, 'mark.wilson@example.com', 'Mark Wilson', 'secret456', '2024-04-22 00:38:39'),
(10, 'linda.brown@example.com', 'Linda Brown', 'mypassword', '2024-04-22 00:38:39'),
(11, 'hilarynyami@gmail.com', 'Hilary NYAMI', '10470c3b4b1fed12c3baac014be15fac67c6e815', '2024-04-25 13:25:00'),
(13, 'fouegangmeli@gmail.com', 'MELI ERIC', '10470c3b4b1fed12c3baac014be15fac67c6e815', '2024-04-27 00:57:51'),
(14, 'adimin@gmail.com', 'MELI ERIC', '10470c3b4b1fed12c3baac014be15fac67c6e815', '2024-04-27 00:58:27'),
(15, 'adminmeli@gmail.com', 'MELI ERIC', '10470c3b4b1fed12c3baac014be15fac67c6e815', '2024-04-27 02:53:37'),
(16, 'admineric@gmail.com', 'MELI ERIC', '10470c3b4b1fed12c3baac014be15fac67c6e815', '2024-04-27 02:54:43'),
(17, '', '', '67a74306b06d0c01624fe0d0249a570f4d093747', '2024-04-27 11:40:57'),
(18, 'divine@gmail.com', 'DIVINE GRACE', '10470c3b4b1fed12c3baac014be15fac67c6e815', '2024-05-22 09:41:44'),
(19, 'laurine@gmail.com', 'dongmo', '10470c3b4b1fed12c3baac014be15fac67c6e815', '2024-05-25 06:59:55');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
