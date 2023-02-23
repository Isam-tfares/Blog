-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 23 fév. 2023 à 22:57
-- Version du serveur : 10.4.25-MariaDB
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `comment_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `author`, `comment`, `comment_date`) VALUES
(1, 1, 'user2', 'Preum\'s', '2022-03-03 13:00:42'),
(2, 1, 'user2', 'Quelqu\'un a un avis là-dessus ? Je ne sais pas quoi en penser.', '2022-03-03 13:01:42'),
(3, 2, 'user5', 'JJJJJ', '2023-02-20 13:56:15'),
(4, 2, 'user1', 'POPOPOO', '2023-02-20 13:56:22'),
(5, 2, 'user3', 'LJOIJDISKOSINATGHATSAYFATNALKOZINATWATIMALKHADAGHIIHTIMALMA3ANDHAHTAIHTIMAMINTIBAH', '2023-02-20 13:57:10'),
(6, 2, 'user3', 'i just writte somthing but dady has a job ........', '2023-02-20 20:43:44'),
(7, 2, 'user1', 'f', '2023-02-20 21:57:29'),
(8, 7, 'user4', 'PPPPppeoeoeo', '2023-02-22 16:40:56'),
(9, 4, 'user1', 'Good Post ', '2023-02-23 12:15:18'),
(10, 4, 'user1', 'Second Comment Good Job', '2023-02-23 13:58:52'),
(12, 3, 'user2', 'Hi It\'is good post HHHHHHHHHHHH HAcker', '2023-02-23 14:12:05'),
(13, 3, 'user1', 'HHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHH', '2023-02-23 14:13:11'),
(14, 6, 'user3', 'Good Article Keep wrtting', '2023-02-23 14:56:10');

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `auteur` text DEFAULT NULL,
  `content` text NOT NULL,
  `creation_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `auteur`, `content`, `creation_date`) VALUES
(1, 'Bienvenue sur le blog de l\'AVBN !', '1', 'Je vous souhaite à toutes et à tous la bienvenue sur le blog qui parlera de... l\'Association de VolleyBall de Nuelly !', '2022-02-17 16:28:41'),
(2, 'L\'AVBN à la conquête du good monde  !', '3', 'C\'est officiel, le club a annoncé à la radio hier soir \"J\'ai l\'intention de conquérir le monde !\".\r\nIl a en outre précisé que le monde serait à sa botte en moins de temps qu\'il n\'en fallait pour dire \"Association de VolleyBall de Nuelly\". Pas dur, ceci dit entre nous...', '2022-02-17 16:28:42'),
(3, 'Article labellisé du jour', '2', 'Il existe un tutoiement dans la langue anglaise, mais tombé en désuétude.\nLe plus grand polygone régulier ayant un nombre premier de côtés et dont on sait qu’il peut être construit à la règle et au compas est un polygone à 65 537 côtés.\nPensé comme un foyer national juif, l’oblast autonome juif a été peuplé au maximum de 25 % de Juifs en 1948, et il n’en compte qu’environ 1 % en 2010.\nPratiquement aveugle à partir de ses 19 ans, la danseuse étoile et chorégraphe Alicia Alonso se repérait grâce aux lumières de la scène et aux voix de ses partenaires.', '2023-02-20 23:03:07'),
(4, 'l\'empereur Justinien décide de reconstruire la basilique Sainte-Sophie de Constantinople.', '1', 'hhBien que les pièces de collection en argent à 40 % se soient bien vendues, les nouveaux dollars en métal commun n\'ont pas réussi à circuler dans une certaine mesure, sauf dans les casinos du Nevada et aux alentours, où ils remplacent les jetons émis par des particuliers. Il n\'existe pas de dollars datés de 1975 ; les pièces de cette année-là ainsi que celles de 1976 portent une double date 1776-1976 et un revers spécial réalisé par Dennis R. Williams en l\'honneur du bicentenaire de l\'indépendance américaine. À partir de 1977, la Monnaie cherche à remplacer le dollar Eisenhower par une pièce de plus petite taille', '2023-02-20 22:08:55'),
(5, 'les sociaux-démocrates aux élections régionales à Berlin,', '5', 'En 1965, en raison de la hausse du prix des lingots, la Monnaie commence à frapper des pièces plaquées de cuivre-nickel au lieu d\'argent. Aucune pièce d\'un dollar n\'a été émise depuis trente ans, mais, à partir de 1969, les législateurs cherchent à réintroduire une pièce d\'un dollar dans le commerce. Après la mort d\'Eisenhower en mars de la même année, un certain nombre de propositions sont faites pour lui rendre hommage avec une nouvelle pièce. Bien que ces projets de loi bénéficient généralement d\'un large soutien, leur adoption est retardée par un conflit sur la question de savoir si la nouvelle pièce doit être en métal semi-précieux ou en argent à 40 %.', '2023-02-20 22:09:15'),
(6, 'en Moldavie, Dorin Recean (photo) est nommé Premier ministre.', '4', 'La pièce de 1 dollar américain Eisenhower est une pièce d\'un dollar émise par la Monnaie des États-Unis de 1971 à 1978 ; c\'est la première pièce de cette dénomination émise par la Monnaie depuis la fin de la série des dollars Peace en 1935. La pièce représente le président Dwight D. Eisenhower sur l\'avers et, sur le revers, une image stylisée honorant la mission lunaire Apollo 11 de 1969, inspirée de l\'écusson de mission conçu par l\'astronaute Michael Collins. Les deux faces sont conçues par Frank Gasparro. Il s\'agit de la seule pièce de grande taille en dollars américains dont les frappes de circulation ne contiennent pas d\'argent.', '2023-02-20 22:10:25'),
(7, 'Comment contribuer ? Portails thématiques', '3', 'Wikipédia est un projet d’encyclopédie collective en ligne, universelle, multilingue et fonctionnant sur le principe du wiki. Ce projet vise à offrir un contenu librement réutilisable, objectif et vérifiable, que chacun peut modifier et améliorer.\n\nWikipédia est définie par des principes fondateurs. Son contenu est sous licence Creative Commons BY-SA. Il peut être copié et réutilisé sous la même licence, sous réserve d\'en respecter les conditions. Wikipédia fournit tous ses contenus gratuitement, sans publicité, et sans recourir à l\'exploitation des données personnelles de ses utilisateurs.', '2023-02-20 22:11:37');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'user1', 'user1@gmail.com', 'user1password'),
(2, 'user2', 'user2@gmail.com', 'user2password'),
(3, 'user3', 'user3@gmail.com', 'user3password'),
(4, 'user4', 'user4@gmail.com', 'user4password'),
(5, 'user5', 'user5@gmail.com', 'user5password');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
