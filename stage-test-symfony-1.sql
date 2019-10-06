-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 04 oct. 2019 à 08:47
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
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `societe` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(17) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `objet` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `contenu`
--

DROP TABLE IF EXISTS `contenu`;
CREATE TABLE IF NOT EXISTS `contenu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `section` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sous_titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `texte` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_affichage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `contenu`
--

INSERT INTO `contenu` (`id`, `section`, `titre`, `sous_titre`, `texte`, `date_affichage`) VALUES
(1, 'presentation', 'Présentation de l\'entreprise', 'Ceci est le texte de présentation', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin in nulla felis. Suspendisse posuere ipsum magna, nec dignissim dui pulvinar eget. Maecenas sagittis justo vitae tempor laoreet. Sed sit amet egestas erat. Integer blandit nec arcu id sollicitudin. Mauris justo lorem, condimentum a iaculis ut, fermentum id neque. Aenean tellus ex, dictum at elit eget, molestie rutrum dolor. Morbi pharetra lacus ligula, eget gravida diam vulputate non. Nullam semper pretium sollicitudin. Nam enim purus, elementum eget nulla vitae, iaculis commodo ante. Morbi non dolor sodales, dictum est vel, consequat quam. Suspendisse porta, mi ac volutpat finibus, felis odio auctor eros, ut sollicitudin nulla massa at mi.\r\n\r\nPhasellus euismod nec tellus sit amet rutrum. Nullam eu tempor ante, in imperdiet tellus. Vestibulum pulvinar erat lobortis, pretium risus quis, posuere odio. Suspendisse libero dui, semper vitae nibh id, blandit sodales dolor. In at urna ligula. Nunc eget venenatis lectus, in tempus eros. Fusce sed lacinia mauris, facilisis dictum augue. Mauris mi erat, luctus non bibendum ut, varius sed nulla. Donec vitae dignissim turpis. Donec id mattis mauris, eget ornare diam. Morbi cursus nisi ipsum, id eleifend nulla molestie vel. Donec non mauris eget lectus lobortis efficitur id et neque. Nullam gravida quam felis, eget vestibulum nunc porta sit amet. Sed aliquet lacus vitae dui hendrerit, vitae egestas diam aliquet. Cras sed ligula vitae tortor suscipit fringilla ac ac elit.', '2019-09-26 10-19-41'),
(2, 'historique', 'Histoire de l\'entreprise', 'Voici l\'histoire', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus et ipsum malesuada, dictum nisi sit amet, iaculis erat. Fusce maximus in leo et cursus. Donec at leo efficitur, fringilla lectus ut, tristique urna. Praesent tellus dui, interdum in eros et, dignissim ultricies justo. Etiam in euismod justo. Praesent ut neque pretium odio sollicitudin faucibus sit amet quis ipsum. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Phasellus molestie magna ac tempus suscipit. Nullam sodales justo at dapibus rutrum. Praesent tempor lorem nisl, id volutpat massa gravida ac. Morbi eget suscipit diam, dictum pretium ipsum. Aliquam varius turpis in tempus congue. Praesent sollicitudin tellus et congue congue. Suspendisse ac urna congue turpis ornare egestas.\r\n\r\nAliquam arcu odio, blandit id urna sed, venenatis commodo elit. Suspendisse consequat sit amet lorem eget ullamcorper. Curabitur vel ante at leo pellentesque convallis. Nulla blandit enim eget laoreet scelerisque. Suspendisse at vulputate massa, sit amet vestibulum dui. Suspendisse tempor quam eget pulvinar luctus. Nulla sem nisl, aliquet vel porttitor eget, faucibus ac erat.', '2019-09-27 12-13-31'),
(3, 'historique', 'Test non-visible', 'Invisible', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In id tempor dolor. Donec auctor blandit est vel eleifend. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Proin sollicitudin nisl id leo imperdiet malesuada. Fusce quis ipsum eu mauris faucibus varius et sit amet magna. Morbi nulla orci, pretium ut mauris sed, laoreet dignissim erat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce iaculis scelerisque orci ut accumsan. Fusce metus nulla, congue a egestas vel, consectetur eu arcu. Vivamus eu imperdiet lacus. Sed in diam urna. Fusce ac rhoncus lectus, non faucibus justo. Nunc gravida ultricies porta. Aliquam imperdiet nec sapien non porttitor.', '2019-09-27 12-03-55'),
(6, 'presentation', 'Un test de présentation', 'Sous-titre du test de présentation', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin in nulla felis. Suspendisse posuere ipsum magna, nec dignissim dui pulvinar eget. Maecenas sagittis justo vitae tempor laoreet. Sed sit amet egestas erat. Integer blandit nec arcu id sollicitudin. Mauris justo lorem, condimentum a iaculis ut, fermentum id neque. Aenean tellus ex, dictum at elit eget, molestie rutrum dolor. Morbi pharetra lacus ligula, eget gravida diam vulputate non. Nullam semper pretium sollicitudin. Nam enim purus, elementum eget nulla vitae, iaculis commodo ante. Morbi non dolor sodales, dictum est vel, consequat quam. Suspendisse porta, mi ac volutpat finibus, felis odio auctor eros, ut sollicitudin nulla massa at mi.\r\n\r\nPhasellus euismod nec tellus sit amet rutrum. Nullam eu tempor ante, in imperdiet tellus. Vestibulum pulvinar erat lobortis, pretium risus quis, posuere odio. Suspendisse libero dui, semper vitae nibh id, blandit sodales dolor. In at urna ligula. Nunc eget venenatis lectus, in tempus eros. Fusce sed lacinia mauris, facilisis dictum augue. Mauris mi erat, luctus non bibendum ut, varius sed nulla. Donec vitae dignissim turpis. Donec id mattis mauris, eget ornare diam. Morbi cursus nisi ipsum, id eleifend nulla molestie vel. Donec non mauris eget lectus lobortis efficitur id et neque. Nullam gravida quam felis, eget vestibulum nunc porta sit amet. Sed aliquet lacus vitae dui hendrerit, vitae egestas diam aliquet. Cras sed ligula vitae tortor suscipit fringilla ac ac elit.', '0');

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `galerie`
--

INSERT INTO `galerie` (`id`, `nom`, `description`) VALUES
(5, 'GALERIE TEST 1', '<p>pjgvoevjemoihg epb dilb dfk;n doflhb sodfhin glkvn cvk;n ifeuhb efoibh foqsihklgfksdflksdbdf olhdvkbjn lvxc:jnbsdlfbnlkvbndklnbfhneoofgvh jcvo&egrave;bjodfiv nfiskvbskjfnbasfbvb fdbodffosuhUHFVSLVNX.BNKLBN HGDUIHBHOFHB BOHBFDIHBDFIHBDFIBHDFIBHDFIBDIHBS VBBHB UGOVUV? KUF?NXNVXVBVXVBVBVBVBVB ISSIUHCXHVXIKBV</p>'),
(6, 'GALERIE TEST 2', '<p>DS?NVKD Iob ouibfds obibj vjbib oaqzs ,cn,vn oeihgrug vubjkjbv vfhisdbj jvb khjr bfhb seybyfbhbyh gbg g hfibgibhfg ibhbhu g hihbibi hbihbihb svupsv kclnnwxn vjbvzi uvhd&nbsp;ziufsldkfkdjkghksjfs;nx,xcvb uhizhvskn n vhkjsvb ohvdivd bvjdvbd&nbsp; dvhidvb iduvhiduv&nbsp;</p>'),
(7, 'Galerie TEST 3', '<p>kjvdj v zkvb ksjbv kjvb svui iquf hfvbb hs&nbsp; vbcjbhv iuhzgh ghg od spcv&nbsp; u ijfhbdkjbdkj ofihb iuhbdfb db fubh ihuhvhv ghb b hbbh</p>'),
(8, 'iefhzeig', '<p>jhfbhbrhvvvh</p>'),
(9, 'ahfgzejhfuzef', '<p>jhzbjhbzjhebh</p>'),
(10, 'jzfhbejfbzjvf', '<p>jhbzfjhfbjzhfbzjhbf</p>'),
(11, 'zfbzjhfvzjhfzjhvf', '<p>jfbcjhfvjfzjfzfvfzfgv</p>'),
(12, 'fnbfvzdhfvzhv', '<p>bvbv nbv nbvnbvbv</p>'),
(13, 'dvsjhvbsjhvb', '<p>sbv snbvsdnbvds,b&nbsp;</p>'),
(14, 'sjdhvbsjdhfbsjdhv', '<p>sdbvfsdbvfshdv&nbsp;</p>'),
(15, 'sdnbfsndbfsdfvsnsbf', '<p>jsdhdhdfbsdjhbfjsdhbjsdhfs</p>'),
(16, 'nfsgbfbgfndgb', '<p>fnbvg fdngbdfbgdfngb&nbsp;</p>');

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

--
-- Déchargement des données de la table `migration_versions`
--

INSERT INTO `migration_versions` (`version`, `executed_at`) VALUES
('20190923062313', '2019-09-23 06:23:40'),
('20190923070546', '2019-09-23 07:05:55'),
('20190923080344', '2019-09-23 08:04:01');

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
-- Structure de la table `photo`
--

DROP TABLE IF EXISTS `photo`;
CREATE TABLE IF NOT EXISTS `photo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `galerie` int(11) DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_affichage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_14B784189E7D1590` (`galerie`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `photo`
--

INSERT INTO `photo` (`id`, `galerie`, `photo`, `date_affichage`) VALUES
(5, 5, 'photo_1570109780_56352_electrician-2755682_1920.jpg', NULL),
(6, 5, 'photo_1570109808_80368_electricity-3962788_1920.jpg', NULL),
(7, 6, 'photo_1570109983_42678_switchgear-2069791_1920.jpg', NULL);

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
  `tarif_jour` decimal(10,2) DEFAULT NULL,
  `tarif_nuit` decimal(10,2) DEFAULT NULL,
  `tarif_weekend` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `tarifs`
--

INSERT INTO `tarifs` (`id`, `prestation`, `tarif_jour`, `tarif_nuit`, `tarif_weekend`) VALUES
(1, 'changement d\'ampoule', '10.00', '12.20', '15.90'),
(2, 'installation lustre', '15.00', '18.90', NULL),
(3, 'lumières de jardin', '50.00', NULL, NULL),
(4, 'pose compteur électrique', '250.00', NULL, NULL),
(5, 'Réparation chauffage électrique', '285.00', '305.50', '400.55');

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
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `role`) VALUES
(1, 'admin@test.com', '$argon2i$v=19$m=65536,t=4,p=1$ZVp2WElaUTBoOGJIS3pncg$5pB9LwkGh35Zwl1hmXKc9e3fhKHjiZ8xx9xf3oh/WII', 'ROLE_ADMIN'),
(2, 'superadmin@test.com', '$argon2i$v=19$m=65536,t=4,p=1$SGVYRkljUm94MmhqWnVHeQ$L8I/gwjnoiAQwaQADM3DAPXO6pyTHgIgqFr/bLWqreY', 'ROLE_SUPER_ADMIN');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `photo`
--
ALTER TABLE `photo`
  ADD CONSTRAINT `FK_14B784189E7D1590` FOREIGN KEY (`galerie`) REFERENCES `galerie` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
