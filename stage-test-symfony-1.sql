-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Sep 24, 2019 at 09:23 AM
-- Server version: 5.7.26
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `stage-test-symfony-1`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `societe` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(17) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `objet` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contenu`
--

CREATE TABLE `contenu` (
  `id` int(11) NOT NULL,
  `section` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sous_titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `texte` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `statut` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contenu`
--

INSERT INTO `contenu` (`id`, `section`, `titre`, `sous_titre`, `texte`, `statut`) VALUES
(1, 'presentation', 'Une super entreprise', 'Du code, du code, du code', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin in nulla felis. Suspendisse posuere ipsum magna, nec dignissim dui pulvinar eget. Maecenas sagittis justo vitae tempor laoreet. Sed sit amet egestas erat. Integer blandit nec arcu id sollicitudin. Mauris justo lorem, condimentum a iaculis ut, fermentum id neque. Aenean tellus ex, dictum at elit eget, molestie rutrum dolor. Morbi pharetra lacus ligula, eget gravida diam vulputate non. Nullam semper pretium sollicitudin. Nam enim purus, elementum eget nulla vitae, iaculis commodo ante. Morbi non dolor sodales, dictum est vel, consequat quam. Suspendisse porta, mi ac volutpat finibus, felis odio auctor eros, ut sollicitudin nulla massa at mi.\r\n\r\nPhasellus euismod nec tellus sit amet rutrum. Nullam eu tempor ante, in imperdiet tellus. Vestibulum pulvinar erat lobortis, pretium risus quis, posuere odio. Suspendisse libero dui, semper vitae nibh id, blandit sodales dolor. In at urna ligula. Nunc eget venenatis lectus, in tempus eros. Fusce sed lacinia mauris, facilisis dictum augue. Mauris mi erat, luctus non bibendum ut, varius sed nulla. Donec vitae dignissim turpis. Donec id mattis mauris, eget ornare diam. Morbi cursus nisi ipsum, id eleifend nulla molestie vel. Donec non mauris eget lectus lobortis efficitur id et neque. Nullam gravida quam felis, eget vestibulum nunc porta sit amet. Sed aliquet lacus vitae dui hendrerit, vitae egestas diam aliquet. Cras sed ligula vitae tortor suscipit fringilla ac ac elit.', '1'),
(2, 'historique', 'Histoire :) ', 'Voici l\'histoire ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus et ipsum malesuada, dictum nisi sit amet, iaculis erat. Fusce maximus in leo et cursus. Donec at leo efficitur, fringilla lectus ut, tristique urna. Praesent tellus dui, interdum in eros et, dignissim ultricies justo. Etiam in euismod justo. Praesent ut neque pretium odio sollicitudin faucibus sit amet quis ipsum. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Phasellus molestie magna ac tempus suscipit. Nullam sodales justo at dapibus rutrum. Praesent tempor lorem nisl, id volutpat massa gravida ac. Morbi eget suscipit diam, dictum pretium ipsum. Aliquam varius turpis in tempus congue. Praesent sollicitudin tellus et congue congue. Suspendisse ac urna congue turpis ornare egestas.\r\n\r\nAliquam arcu odio, blandit id urna sed, venenatis commodo elit. Suspendisse consequat sit amet lorem eget ullamcorper. Curabitur vel ante at leo pellentesque convallis. Nulla blandit enim eget laoreet scelerisque. Suspendisse at vulputate massa, sit amet vestibulum dui. Suspendisse tempor quam eget pulvinar luctus. Nulla sem nisl, aliquet vel porttitor eget, faucibus ac erat.', '1'),
(3, 'historique', 'Test non-visible', 'Invisible ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In id tempor dolor. Donec auctor blandit est vel eleifend. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Proin sollicitudin nisl id leo imperdiet malesuada. Fusce quis ipsum eu mauris faucibus varius et sit amet magna. Morbi nulla orci, pretium ut mauris sed, laoreet dignissim erat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce iaculis scelerisque orci ut accumsan. Fusce metus nulla, congue a egestas vel, consectetur eu arcu. Vivamus eu imperdiet lacus. Sed in diam urna. Fusce ac rhoncus lectus, non faucibus justo. Nunc gravida ultricies porta. Aliquam imperdiet nec sapien non porttitor.', '0');

-- --------------------------------------------------------

--
-- Table structure for table `entreprise`
--

CREATE TABLE `entreprise` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `statut_rcs` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cp` int(11) NOT NULL,
  `ville` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(17) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail_gerant` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail_contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `siren` int(11) DEFAULT NULL,
  `siret` int(11) DEFAULT NULL,
  `activite` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_gerant` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `entreprise`
--

INSERT INTO `entreprise` (`id`, `nom`, `statut_rcs`, `adresse`, `cp`, `ville`, `telephone`, `mail_gerant`, `mail_contact`, `siren`, `siret`, `activite`, `nom_gerant`) VALUES
(1, 'Entreprise MBMP :)', NULL, '1 Chemin de la Salle', 75001, 'Paris', '0123456789', 'test.mbmp@gmail.com', 'test.mbmp@gmail.com', NULL, NULL, 'Société qui tente de coder', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `galerie`
--

CREATE TABLE `galerie` (
  `id` int(11) NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galerie`
--

INSERT INTO `galerie` (`id`, `photo`) VALUES
(1, 'test-photo-1.jpg'),
(2, 'test-photo-1.jpg'),
(3, 'test-photo-1.jpg'),
(4, 'test-photo-2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `migration_versions`
--

CREATE TABLE `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migration_versions`
--

INSERT INTO `migration_versions` (`version`, `executed_at`) VALUES
('20190923062313', '2019-09-23 06:23:40'),
('20190923070546', '2019-09-23 07:05:55'),
('20190923080344', '2019-09-23 08:04:01');

-- --------------------------------------------------------

--
-- Table structure for table `partenaires`
--

CREATE TABLE `partenaires` (
  `id` int(11) NOT NULL,
  `nom_partenaire` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_partenaire` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `partenaires`
--

INSERT INTO `partenaires` (`id`, `nom_partenaire`, `site_partenaire`, `logo`) VALUES
(1, 'TEST1', 'http://wwww.google.com', 'logo1.jpg'),
(2, 'TEST2', 'http://wwwW.yahoo.com', 'logo2.jpg'),
(3, 'test3', 'http://wwww.amazon.fr', 'logo3.jpg'),
(4, 'test4', 'http://www.fnac.com', 'logo4.jpg'),
(5, 'test5', 'http://www.imdb.com', 'logo5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `specificites`
--

CREATE TABLE `specificites` (
  `id` int(11) NOT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_google` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `localisation1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `localisation2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `localisation3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `localisation4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `localisation5` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `competence10` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `specificites`
--

INSERT INTO `specificites` (`id`, `facebook`, `instagram`, `page_google`, `localisation1`, `localisation2`, `localisation3`, `localisation4`, `localisation5`, `localisation6`, `localisation7`, `localisation8`, `localisation9`, `localisation10`, `competence1`, `competence2`, `competence3`, `competence4`, `competence5`, `competence6`, `competence7`, `competence8`, `competence9`, `competence10`) VALUES
(1, 'http://www.facebook.com', 'http://www.instagram.com', 'http://www.google.com', 'Mantes-la-Jolie', 'Buchelay', 'Rosny-Sur-Seine', 'Breuil-Bois-Robert', 'Magnanville', 'Limay', 'Mantes-la-Ville', 'Epônes', 'Les Mureaux', 'Lisbonne', 'Conseil', 'Devis gratuit', 'Installation de panneau solaires', 'LED', 'Lustres', 'Gentillesse', 'Café offert', 'Tableau électrique', 'Rechargement de batteries', 'Lumière douce');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `role`) VALUES
(1, 'magali@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$RWhLbll4R0tmOEZVaGQzVw$Bo4HOBpT454C0Pim2Fp6DchuW1jkhVRECIlfBHXDnwI', 'ROLE_ADMIN');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contenu`
--
ALTER TABLE `contenu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `entreprise`
--
ALTER TABLE `entreprise`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galerie`
--
ALTER TABLE `galerie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migration_versions`
--
ALTER TABLE `migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `partenaires`
--
ALTER TABLE `partenaires`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specificites`
--
ALTER TABLE `specificites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contenu`
--
ALTER TABLE `contenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `entreprise`
--
ALTER TABLE `entreprise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `galerie`
--
ALTER TABLE `galerie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `partenaires`
--
ALTER TABLE `partenaires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `specificites`
--
ALTER TABLE `specificites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
