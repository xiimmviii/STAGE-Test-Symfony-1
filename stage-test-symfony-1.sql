-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 09 oct. 2019 à 15:06
-- Version du serveur :  5.7.26
-- Version de PHP :  7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `stage-test-symfony-1`
--

-- --------------------------------------------------------

--
-- Structure de la table `competences`
--

DROP TABLE IF EXISTS `competences`;
CREATE TABLE IF NOT EXISTS `competences` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `competence` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `contenu`
--

DROP TABLE IF EXISTS `contenu`;
CREATE TABLE IF NOT EXISTS `contenu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sous_titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `texte` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_affichage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `contenu`
--

INSERT INTO `contenu` (`id`, `titre`, `sous_titre`, `texte`, `date_affichage`) VALUES
(2, 'Histoire de l\'entreprise', 'Voici l\'histoire', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus et ipsum malesuada, dictum nisi sit amet, iaculis erat. Fusce maximus in leo et cursus. Donec at leo efficitur, fringilla lectus ut, tristique urna. Praesent tellus dui, interdum in eros et, dignissim ultricies justo. Etiam in euismod justo. Praesent ut neque pretium odio sollicitudin faucibus sit amet quis ipsum. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Phasellus molestie magna ac tempus suscipit. Nullam sodales justo at dapibus rutrum. Praesent tempor lorem nisl, id volutpat massa gravida ac. Morbi eget suscipit diam, dictum pretium ipsum. Aliquam varius turpis in tempus congue. Praesent sollicitudin tellus et congue congue. Suspendisse ac urna congue turpis ornare egestas. Aliquam arcu odio, blandit id urna sed, venenatis commodo elit. Suspendisse consequat sit amet lorem eget ullamcorper. Curabitur vel ante at leo pellentesque convallis. Nulla blandit enim eget laoreet scelerisque. Suspendisse at vulputate massa, sit amet vestibulum dui. Suspendisse tempor quam eget pulvinar luctus. Nulla sem nisl, aliquet vel porttitor eget, faucibus ac erat.</p>', '2019-10-09 12-38-05'),
(3, 'Test non-visible', 'Invisiblee', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In id tempor dolor. Donec auctor blandit est vel eleifend. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Proin sollicitudin nisl id leo imperdiet malesuada. Fusce quis ipsum eu mauris faucibus varius et sit amet magna. Morbi nulla orci, pretium ut mauris sed, laoreet dignissim erat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce iaculis scelerisque orci ut accumsan. Fusce metus nulla, congue a egestas vel, consectetur eu arcu. Vivamus eu imperdiet lacus. Sed in diam urna. Fusce ac rhoncus lectus, non faucibus justo. Nunc gravida ultricies porta. Aliquam imperdiet nec sapien non porttitor.</p>', '2019-10-09 11-57-11');

-- --------------------------------------------------------

--
-- Structure de la table `couleur`
--

DROP TABLE IF EXISTS `couleur`;
CREATE TABLE IF NOT EXISTS `couleur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `couleur` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_affichage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `couleur`
--

INSERT INTO `couleur` (`id`, `couleur`, `date_affichage`) VALUES
(1, 'jaune', '02-10-2019');

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

DROP TABLE IF EXISTS `entreprise`;
CREATE TABLE IF NOT EXISTS `entreprise` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `statut_rcs` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ville` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(17) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_gerant` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail_contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `siren` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `siret` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activite` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_gerant` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `entreprise`
--

INSERT INTO `entreprise` (`id`, `nom`, `statut_rcs`, `adresse`, `cp`, `ville`, `telephone`, `mail_gerant`, `mail_contact`, `siren`, `siret`, `activite`, `nom_gerant`) VALUES
(1, 'Nom de l\'Entreprise', NULL, '1 rue de l\'adresse', '78000', 'Ville', '01 01 01 01 01', 'mailgerant@mail.com', 'mailentreprise@mail.com', NULL, '1111111111', 'Type de société', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `galerie`
--

DROP TABLE IF EXISTS `galerie`;
CREATE TABLE IF NOT EXISTS `galerie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `galerie`
--

INSERT INTO `galerie` (`id`, `nom`, `description`, `updated_at`) VALUES
(4, 'TEST 1', '<p>Lorem&nbsp;ipsum&nbsp;dolor&nbsp;sit&nbsp;amet&nbsp;consectetur,&nbsp;adipisicing&nbsp;elit.&nbsp;Cupiditate,&nbsp;nesciunt?&nbsp;Tempora,&nbsp;autem?&nbsp;Necessitatibus&nbsp;totam,&nbsp;quo&nbsp;dicta&nbsp;consectetur&nbsp;repudiandae&nbsp;adipisci&nbsp;maxime?&nbsp;Magni&nbsp;corrupti&nbsp;vero&nbsp;qui&nbsp;perspiciatis,&nbsp;ipsa&nbsp;ad&nbsp;illo&nbsp;ratione&nbsp;quia&nbsp;quaerat&nbsp;debitis&nbsp;a&nbsp;placeat&nbsp;voluptas.&nbsp;Reprehenderit&nbsp;aut&nbsp;ipsam&nbsp;corporis&nbsp;ullam.</p>', '2019-10-09 09:09:34'),
(5, 'TEST AGAIN', '<p>Lorem&nbsp;ipsum&nbsp;dolor&nbsp;sit&nbsp;amet&nbsp;consectetur,&nbsp;adipisicing&nbsp;elit.&nbsp;Cupiditate,&nbsp;nesciunt?&nbsp;Tempora,&nbsp;autem?&nbsp;Necessitatibus&nbsp;totam,&nbsp;quo&nbsp;dicta&nbsp;consectetur&nbsp;repudiandae&nbsp;adipisci&nbsp;maxime?&nbsp;Magni&nbsp;corrupti&nbsp;vero&nbsp;qui&nbsp;perspiciatis,&nbsp;ipsa&nbsp;ad&nbsp;illo&nbsp;ratione&nbsp;quia&nbsp;quaerat&nbsp;debitis&nbsp;a&nbsp;placeat&nbsp;voluptas.&nbsp;Reprehenderit&nbsp;aut&nbsp;ipsam&nbsp;corporis&nbsp;ullam.</p>', '2019-10-09 09:31:36'),
(6, 'TEST 309582039U8', '<p>JFBERIGERLZEUIHVGRIVUHGRTIUVORTIUGTROVH RBEUGH EFIGSRLIGHSRLIVHSRB SRIHBSHB&nbsp;</p>', '2019-10-09 09:35:26');

-- --------------------------------------------------------

--
-- Structure de la table `horaires`
--

DROP TABLE IF EXISTS `horaires`;
CREATE TABLE IF NOT EXISTS `horaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jour` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ouverture` time NOT NULL,
  `fermeture` time NOT NULL,
  `debut_pause` time DEFAULT NULL,
  `fin_pause` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `horaires`
--

INSERT INTO `horaires` (`id`, `jour`, `ouverture`, `fermeture`, `debut_pause`, `fin_pause`) VALUES
(1, 'lundi', '05:00:00', '10:00:00', '17:34:00', '16:16:00');

-- --------------------------------------------------------

--
-- Structure de la table `localisation`
--

DROP TABLE IF EXISTS `localisation`;
CREATE TABLE IF NOT EXISTS `localisation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `secteur` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `localisation`
--

INSERT INTO `localisation` (`id`, `secteur`) VALUES
(1, 'paris');

-- --------------------------------------------------------

--
-- Structure de la table `migration_versions`
--

DROP TABLE IF EXISTS `migration_versions`;
CREATE TABLE IF NOT EXISTS `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `partenaires`
--

DROP TABLE IF EXISTS `partenaires`;
CREATE TABLE IF NOT EXISTS `partenaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_partenaire` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_partenaire` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `partenaires`
--

INSERT INTO `partenaires` (`id`, `nom_partenaire`, `site_partenaire`, `logo`) VALUES
(1, 'Partenaire 1', 'http://www.google.com', 'logo1.jpg'),
(2, 'Partenaire 2', 'http://www.yahoo.com', 'logo2.jpg'),
(3, 'Partenaire 3', 'http://www.amazon.fr', 'logo3.jpg'),
(4, 'Partenaire 4', 'http://www.fnac.com', 'logo4.jpg'),
(5, 'Partenaire 5', 'http://www.imdb.com', 'logo5.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `picture`
--

DROP TABLE IF EXISTS `picture`;
CREATE TABLE IF NOT EXISTS `picture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `galerie_id` int(11) NOT NULL,
  `filename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_16DB4F89825396CB` (`galerie_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `picture`
--

INSERT INTO `picture` (`id`, `galerie_id`, `filename`) VALUES
(8, 4, '5d9da3e816c1f354736347.jpg'),
(9, 4, '5d9da481ddb62145531538.jpg'),
(10, 5, '5d9da9c60edec942191939.jpg'),
(11, 6, '5d9da9df09f16835752356.jpg'),
(12, 4, '5d9db1b442c78156925075.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `reseaux`
--

DROP TABLE IF EXISTS `reseaux`;
CREATE TABLE IF NOT EXISTS `reseaux` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `reseaux`
--

INSERT INTO `reseaux` (`id`, `instagram`, `facebook`, `google`) VALUES
(1, 'instagram', 'kzgberibg', 'jrenbgejrgb');

-- --------------------------------------------------------

--
-- Structure de la table `specificites`
--

DROP TABLE IF EXISTS `specificites`;
CREATE TABLE IF NOT EXISTS `specificites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_google` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `localisation1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `localisation2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `localisation3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `localisation4` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `localisation5` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `localisation6` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `localisation7` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `localisation8` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `localisation9` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `localisation10` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `competence1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `competence2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `competence3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `competence4` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `competence5` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `competence6` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `competence7` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `competence8` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `competence9` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `competence10` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `specificites`
--

INSERT INTO `specificites` (`id`, `facebook`, `instagram`, `page_google`, `localisation1`, `localisation2`, `localisation3`, `localisation4`, `localisation5`, `localisation6`, `localisation7`, `localisation8`, `localisation9`, `localisation10`, `competence1`, `competence2`, `competence3`, `competence4`, `competence5`, `competence6`, `competence7`, `competence8`, `competence9`, `competence10`) VALUES
(1, 'http://www.facebook.com', 'http://www.instagram.com', 'http://www.google.com', 'Ville 1', 'Ville 2', 'Ville 3', 'Ville 4', 'Ville 5', 'Ville 6', 'Ville 7', 'Ville 8', 'Ville 9', 'Ville 10', 'Une compétence', 'Une autre compétence', 'Une autre compétence', 'Une autre compétence', 'Une autre compétence', 'Une autre compétence', 'Une autre compétence', 'Une autre compétence', 'Une autre compétence', 'La dernière compétence');

-- --------------------------------------------------------

--
-- Structure de la table `tarifs`
--

DROP TABLE IF EXISTS `tarifs`;
CREATE TABLE IF NOT EXISTS `tarifs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prestation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tarif` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `tarifs`
--

INSERT INTO `tarifs` (`id`, `prestation`, `description`, `tarif`) VALUES
(1, 'changement d\'ampoule', '', '0.00'),
(2, 'installation lustre', '', '0.00'),
(3, 'lumières de jardin', '', '0.00'),
(4, 'pose compteur électrique', '', '0.00');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reset_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `role`, `reset_token`) VALUES
(1, 'admin@test.com', '$argon2i$v=19$m=65536,t=4,p=1$ZVp2WElaUTBoOGJIS3pncg$5pB9LwkGh35Zwl1hmXKc9e3fhKHjiZ8xx9xf3oh/WII', 'ROLE_ADMIN', NULL),
(2, 'superadmin@test.com', '$argon2i$v=19$m=65536,t=4,p=1$SGVYRkljUm94MmhqWnVHeQ$L8I/gwjnoiAQwaQADM3DAPXO6pyTHgIgqFr/bLWqreY', 'ROLE_SUPER_ADMIN', NULL);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `picture`
--
ALTER TABLE `picture`
  ADD CONSTRAINT `FK_16DB4F89825396CB` FOREIGN KEY (`galerie_id`) REFERENCES `galerie` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
