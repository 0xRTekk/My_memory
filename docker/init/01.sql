--
-- Base de données : `memory`
--
CREATE DATABASE IF NOT EXISTS `memory` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `memory`;

-- --------------------------------------------------------

--
-- Structure de la table `card`
--

CREATE TABLE IF NOT EXISTS `card` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `card`
--

INSERT INTO `card` (`id`, `name`, `description`) VALUES
(1, 'cerises-jaunes', 'Carte de cerises jaunes'),
(2, 'abricot', 'Carte d\'abricot'),
(3, 'pomme-rouge', 'Carte de pomme rouge'),
(4, 'bananes', 'Carte de bananes'),
(5, 'prune', 'carte de prune'),
(6, 'cersies-rouges', 'Carte de cerises rouges'),
(7, 'fraise', 'Carte de fraise'),
(8, 'framboise', 'Carte de framboise'),
(9, 'pomme-verte', 'Carte de pomme verte'),
(10, 'citron-vert', 'Carte de citron vert'),
(11, 'grenade', 'Carte de grenade'),
(12, 'citron-jaune', 'Carte de citron jaune'),
(13, 'mangue', 'Carte de mangue'),
(14, 'orange', 'Carte d\'orange'),
(15, 'pasteque', 'Carte de pasteque'),
(16, 'peche', 'Carte de peche'),
(17, 'poire', 'Carte de poire'),
(18, 'raisin', 'Carte de raisin');

-- --------------------------------------------------------

--
-- Structure de la table `game`
--

CREATE TABLE IF NOT EXISTS `game` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `start_date` varchar(50) NOT NULL,
  `win` tinyint(1) NOT NULL,
  `time_played` float NOT NULL,
  `id_user` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `game`
--

INSERT INTO `game` (`id`, `start_date`, `win`, `time_played`, `id_user`) VALUES
(1, '25-02-2121', 1, 1.62, 1),
(2, '25-02-2121', 0, 5.00, 1),
(3, '25-02-2121', 1, 2.34, 1),
(4, '25-02-2121', 1, 1.20, 1),
(5, '25-02-2121', 1, 2.2, 1),
(6, '25-02-2121', 1, 1.6, 1),
(7, '26-02-2121', 1, 4.4, 1),
(8, '26-02-2121', 1, 1.21, 1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nickname` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `nickname`) VALUES
(1, 'Rémi'),
(2, 'Nicolas'),
(3, 'Elsa');