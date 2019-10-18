-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 18 oct. 2019 à 09:35
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `competences`
--

INSERT INTO `competences` (`id`, `competence`) VALUES
(1, '24/7'),
(2, 'meilleur artisan de france'),
(3, 'lorem ipsum'),
(4, 'lorem ipsum 2');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `contenu`
--

INSERT INTO `contenu` (`id`, `titre`, `sous_titre`, `texte`, `date_affichage`) VALUES
(2, 'Histoire de l\'entreprise', 'Voici l\'histoire', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus et ipsum malesuada, dictum nisi sit amet, iaculis erat. Fusce maximus in leo et cursus. Donec at leo efficitur, fringilla lectus ut, tristique urna. Praesent tellus dui, interdum in eros et, dignissim ultricies justo. Etiam in euismod justo. Praesent ut neque pretium odio sollicitudin faucibus sit amet quis ipsum. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Phasellus molestie magna ac tempus suscipit. Nullam sodales justo at dapibus rutrum. Praesent tempor lorem nisl, id volutpat massa gravida ac. Morbi eget suscipit diam, dictum pretium ipsum. Aliquam varius turpis in tempus congue. Praesent sollicitudin tellus et congue congue. Suspendisse ac urna congue turpis ornare egestas. Aliquam arcu odio, blandit id urna sed, venenatis commodo elit. Suspendisse consequat sit amet lorem eget ullamcorper. Curabitur vel ante at leo pellentesque convallis. Nulla blandit enim eget laoreet scelerisque. Suspendisse at vulputate massa, sit amet vestibulum dui. Suspendisse tempor quam eget pulvinar luctus. Nulla sem nisl, aliquet vel porttitor eget, faucibus ac erat.</p>', '2019-10-16 07-14-04'),
(3, 'Test non-visible', 'Invisiblee', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In id tempor dolor. Donec auctor blandit est vel eleifend. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Proin sollicitudin nisl id leo imperdiet malesuada. Fusce quis ipsum eu mauris faucibus varius et sit amet magna. Morbi nulla orci, pretium ut mauris sed, laoreet dignissim erat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce iaculis scelerisque orci ut accumsan. Fusce metus nulla, congue a egestas vel, consectetur eu arcu. Vivamus eu imperdiet lacus. Sed in diam urna. Fusce ac rhoncus lectus, non faucibus justo. Nunc gravida ultricies porta. Aliquam imperdiet nec sapien non porttitor.</p>', '0'),
(5, 'SVG', '', '            <svg version=\"1.1\" id=\"compt\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\"\r\n                x=\"0px\" y=\"0px\" viewbox=\"0 0 150 150\" enable-background=\"new 0 0 150 150\" xml:space=\"preserve\">\r\n                <g display=\"none\">\r\n                    <path id=\"XMLID_82_\" display=\"inline\" d=\"M-101.901,33.299h-4.978V28.32c0-2.406-1.952-4.358-4.358-4.358\r\n                                                               c-2.407,0-4.358,1.952-4.358,4.358v4.979h-19.291V28.32c0-2.406-1.952-4.358-4.358-4.358c-2.407,0-4.358,1.952-4.358,4.358v4.979\r\n                                                               h-14.624V4.981c0-2.407-1.951-4.358-4.358-4.358h-18.671c-2.407,0-4.358,1.951-4.358,4.358v28.318h-14.623V28.32\r\n                                                               c0-2.406-1.952-4.358-4.358-4.358c-2.407,0-4.358,1.952-4.358,4.358v4.979h-19.292V28.32c0-2.406-1.951-4.358-4.358-4.358\r\n                                                               c-2.406,0-4.358,1.952-4.358,4.358v4.979h-4.978c-2.407,0-4.358,1.951-4.358,4.358v18.671c0,2.407,1.951,4.358,4.358,4.358h26.203\r\n                                                               l30.122,30.122v7.84h-18.981c-2.407,0-4.358,1.952-4.358,4.358v28.008c0,2.407,1.951,4.358,4.358,4.358h18.981v9.645\r\n                                                               c0,2.407,1.951,4.358,4.358,4.358c2.407,0,4.358-1.951,4.358-4.358V60.687h9.955v84.332c0,2.407,1.952,4.358,4.358,4.358\r\n                                                               c2.407,0,4.358-1.951,4.358-4.358v-9.645h18.982c2.406,0,4.358-1.951,4.358-4.358v-28.008c0-2.406-1.952-4.358-4.358-4.358h-18.982\r\n                                                               v-7.84l30.122-30.122h26.203c2.407,0,4.358-1.952,4.358-4.358V37.656C-97.543,35.25-99.493,33.299-101.901,33.299z M-176.897,9.339\r\n                                                               h9.955v23.96h-9.955V9.339z M-200.238,126.657v-19.292h14.624v19.292H-200.238z M-185.613,78.483l-17.796-17.796h17.796V78.483z\r\n                                                                M-143.601,107.365v19.292h-14.624v-19.292H-143.601z M-158.226,78.483V60.687h17.796L-158.226,78.483z M-106.259,51.971H-237.58\r\n                                                               v-9.956h131.322V51.971z\" />\r\n                </g>\r\n                <g>\r\n                    <path id=\"XMLID_129_\"\r\n                        d=\"M126.571,0.3H23.429C10.676,0.3,0.3,10.676,0.3,23.429v103.141\r\n                                                                   c0,12.754,10.376,23.129,23.129,23.129h103.141c12.754,0,23.129-10.376,23.129-23.129V23.429C149.7,10.676,139.324,0.3,126.571,0.3\r\n                                                                   z M140.946,126.571c0,7.926-6.449,14.376-14.376,14.376H23.429c-7.926,0-14.376-6.449-14.376-14.376V23.429\r\n                                                                   c0-7.926,6.449-14.376,14.376-14.376h103.141c7.926,0,14.376,6.449,14.376,14.376V126.571z\" />\r\n                    <g>\r\n                        <path id=\"XMLID_121_\"\r\n                            d=\"M126.571,23.741H23.429c-2.416,0-4.377,1.96-4.377,4.377v37.506\r\n                                                                           c0,2.416,1.961,4.377,4.377,4.377h103.141c2.418,0,4.377-1.961,4.377-4.377V28.118C130.948,25.701,128.988,23.741,126.571,23.741z\r\n                                                                            M27.806,32.494h56.881v28.752H27.806V32.494z M122.194,61.247H93.441V32.494h28.752V61.247z\" />\r\n                        <path\r\n                            d=\"M114.842,43.757h-3.91v-3.911c0-1.332-1.083-2.415-2.415-2.415h-1.398c-1.331,0-2.414,1.083-2.414,2.415\r\n                                                                           v3.911h-3.91c-1.332,0-2.415,1.083-2.415,2.414v1.399c0,1.331,1.083,2.414,2.415,2.414h3.91v3.911\r\n                                                                           c0,1.332,1.083,2.415,2.414,2.415h1.398c1.332,0,2.415-1.083,2.415-2.415v-3.911h3.91c1.331,0,2.414-1.083,2.414-2.414v-1.399\r\n                                                                           C117.256,44.84,116.173,43.757,114.842,43.757z\" />\r\n                        <path\r\n                            d=\"M53.986,50.395H39.913c-1.473,0-2.666-1.194-2.666-2.666v-1.716c0-1.473,1.194-2.666,2.666-2.666h14.073\r\n                                                                       c1.473,0,2.666,1.194,2.666,2.666v1.716C56.653,49.201,55.459,50.395,53.986,50.395z\" />\r\n                    </g>\r\n                    <g>\r\n                        <path id=\"XMLID_1_\"\r\n                            d=\"M23.429,127.187h103.141c2.416,0,4.377-1.96,4.377-4.377V85.304\r\n                                                                           c0-2.416-1.961-4.377-4.377-4.377H23.429c-2.418,0-4.377,1.961-4.377,4.377v37.506C19.052,125.227,21.012,127.187,23.429,127.187z\r\n                                                                            M122.194,118.434H65.312V89.681h56.881V118.434z M27.806,89.681h28.752v28.752H27.806V89.681z\" />\r\n                        <path\r\n                            d=\"M35.158,107.171h3.91v3.911c0,1.332,1.083,2.415,2.415,2.415h1.398c1.331,0,2.414-1.083,2.414-2.415\r\n                                                                           v-3.911h3.91c1.332,0,2.415-1.083,2.415-2.414v-1.399c0-1.331-1.083-2.414-2.415-2.414h-3.91v-3.911\r\n                                                                           c0-1.332-1.083-2.415-2.414-2.415h-1.398c-1.332,0-2.415,1.083-2.415,2.415v3.911h-3.91c-1.331,0-2.414,1.083-2.414,2.414v1.399\r\n                                                                           C32.744,106.088,33.827,107.171,35.158,107.171z\" />\r\n                        <path\r\n                            d=\"M96.013,100.533h14.073c1.473,0,2.666,1.194,2.666,2.666v1.716c0,1.473-1.194,2.666-2.666,2.666H96.013\r\n                                                                       c-1.473,0-2.666-1.194-2.666-2.666v-1.716C93.347,101.727,94.541,100.533,96.013,100.533z\" />\r\n                    </g>\r\n                </g>\r\n                <g display=\"none\">\r\n                    <path id=\"XMLID_131_\" display=\"inline\" d=\"M351.882-180.091c-14.901,0-26.985,12.056-26.985,26.985v70.056\r\n                                                                   c0,10.872-8.845,19.718-19.718,19.718c-10.872,0-19.718-8.845-19.718-19.718v-8.043h4.15c2.006,0,3.634-1.626,3.634-3.633v-11.934\r\n                                                                   h0.257c6.278,0,11.418-5.076,11.418-11.417v-42.812c0-2.006-1.628-3.634-3.634-3.634h-4.151v-11.934\r\n                                                                   c0-2.007-1.627-3.634-3.634-3.634h-23.351c-2.006,0-3.633,1.627-3.633,3.634v11.934h-4.15c-2.007,0-3.634,1.628-3.634,3.634v42.812\r\n                                                                   c0,6.372,5.172,11.417,11.417,11.417h0.258v11.934c0,2.007,1.627,3.633,3.634,3.633h4.15v8.043\r\n                                                                   c0,14.88,12.106,26.985,26.986,26.985s26.985-12.105,26.985-26.985v-70.056c0-10.887,8.808-19.718,19.718-19.718\r\n                                                                   c10.873,0,19.719,8.846,19.719,19.718v93.408c0,2.007,1.627,3.634,3.634,3.634c2.006,0,3.634-1.627,3.634-3.634v-93.408\r\n                                                                   C378.868-167.985,366.763-180.091,351.882-180.091z M273.785-172.823h16.084v8.3h-16.084V-172.823z M266.001-118.078v-39.178\r\n                                                                   h31.653v39.178c0,2.262-1.828,4.15-4.151,4.15h-23.351C267.89-113.927,266.001-115.756,266.001-118.078z M277.677-106.66h8.301v8.3\r\n                                                                   h-8.301V-106.66z\" />\r\n                    <path display=\"inline\"\r\n                        d=\"M283.9-140.475l3.086-6.018c0.637-1.241,0.146-2.764-1.095-3.4l-0.696-0.357\r\n                                                               c-1.241-0.637-2.763-0.146-3.4,1.095l-7.004,13.656c-0.385,0.751,0.159,1.644,1.003,1.646l4.074,0.009\r\n                                                               c0.189,0,0.31,0.2,0.224,0.368l-2.883,5.621c-0.637,1.241-0.146,2.764,1.095,3.4l0.696,0.357c1.241,0.637,2.763,0.146,3.4-1.095\r\n                                                               l6.724-13.111c0.377-0.735-0.136-1.613-0.961-1.645l-4.049-0.159C283.93-140.114,283.815-140.31,283.9-140.475z\" />\r\n                </g>\r\n            </svg>', '2019-10-15 00:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `couleur`
--

INSERT INTO `couleur` (`id`, `couleur`, `date_affichage`) VALUES
(1, 'jaune', '2019-10-10 10-10-53'),
(2, 'vert', '2019-10-14 07-54-39'),
(3, 'bleu', '2019-10-14 14-52-41'),
(4, 'turquoise', NULL),
(5, 'orange', NULL),
(6, 'rouge', NULL),
(7, 'gris', NULL),
(8, 'violet', '2019-10-15 07-48-26'),
(9, 'marron', '2019-10-15 12-03-27'),
(10, 'rose', '2019-10-16 07-21-08');

-- --------------------------------------------------------

--
-- Structure de la table `design`
--

DROP TABLE IF EXISTS `design`;
CREATE TABLE IF NOT EXISTS `design` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categorie` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_affichage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bottom_trs_w` longtext COLLATE utf8mb4_unicode_ci,
  `bottom_trs_c` longtext COLLATE utf8mb4_unicode_ci,
  `top_trs_w` longtext COLLATE utf8mb4_unicode_ci,
  `top_trs_c` longtext COLLATE utf8mb4_unicode_ci,
  `soustitre_icon_w` longtext COLLATE utf8mb4_unicode_ci,
  `soustitre_icon_c` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `design`
--

INSERT INTO `design` (`id`, `categorie`, `date_affichage`, `bottom_trs_w`, `bottom_trs_c`, `top_trs_w`, `top_trs_c`, `soustitre_icon_w`, `soustitre_icon_c`) VALUES
(1, 'Artisan', '2019-10-18 08-32-23', '<svg version=\"1.1\" id=\"bottom-trs-artisan\" class=\"svg-color-w\"  xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"	 viewBox=\"0 0 150 10.2\" style=\"enable-background:new 0 0 150 10.2;\" xml:space=\"preserve\"><polygon class=\"st0\" points=\"150,10.2 0,10.2 0,6.8 103.2,0 150,6.8 \"/></svg>', '<svg version=\"1.1\" id=\"bottom-trs-artisan\" class=\"svg-color-c\"  xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"	 viewBox=\"0 0 150 10.2\" style=\"enable-background:new 0 0 150 10.2;\" xml:space=\"preserve\"><polygon class=\"st0\" points=\"150,10.2 0,10.2 0,6.8 103.2,0 150,6.8 \"/></svg>', '<svg version=\"1.1\" id=\"top-trs-artisan\" class=\"svg-color-w\"  xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"	 viewBox=\"0 0 150 10.2\" style=\"enable-background:new 0 0 150 10.2;\" xml:space=\"preserve\"><polygon class=\"st0\" points=\"150,10.2 0,10.2 0,6.8 103.2,0 150,6.8 \"/></svg>', '<svg version=\"1.1\" id=\"top-trs-artisan\" class=\"svg-color-c\"  xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"	 viewBox=\"0 0 150 10.2\" style=\"enable-background:new 0 0 150 10.2;\" xml:space=\"preserve\"><polygon class=\"st0\" points=\"150,10.2 0,10.2 0,6.8 103.2,0 150,6.8 \"/></svg>', NULL, NULL),
(2, 'Avocat', '2019-10-18 08-33-32', '<svg version=\"1.1\" id=\"bottom-trs-avocat\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"	 viewBox=\"0 0 1920 218.6\" style=\"enable-background:new 0 0 1920 218.6;\" xml:space=\"preserve\"><polygon class=\"svg-color-w1\" points=\"1,0 1921,0 1921,160.6 1,51.9 \"/><polygon class=\"svg-color-w2\" points=\"1,51.7 1,196.2 946.5,105.2 \"/></svg>', '<svg version=\"1.1\" id=\"bottom-trs-avocat\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"	 viewBox=\"0 0 1920 218.6\" style=\"enable-background:new 0 0 1920 218.6;\" xml:space=\"preserve\"><polygon class=\"svg-color-c1\" points=\"1,0 1921,0 1921,160.6 1,51.9 \"/><polygon class=\"svg-color-c2\" points=\"1,51.7 1,196.2 946.5,105.2 \"/></svg>', '<svg version=\"1.1\" id=\"top-trs-avocat\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"	 viewBox=\"0 0 1920 218.6\" style=\"enable-background:new 0 0 1920 218.6;\" xml:space=\"preserve\"><polygon class=\"svg-color-w1\" points=\"1,0 1921,0 1921,160.6 1,51.9 \"/><polygon class=\"svg-color-w2\" points=\"1,51.7 1,196.2 946.5,105.2 \"/></svg>', '<svg version=\"1.1\" id=\"top-trs-avocat\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"	 viewBox=\"0 0 1920 218.6\" style=\"enable-background:new 0 0 1920 218.6;\" xml:space=\"preserve\"><polygon class=\"svg-color-c1\" points=\"1,0 1921,0 1921,160.6 1,51.9 \"/><polygon class=\"svg-color-c2\" points=\"1,51.7 1,196.2 946.5,105.2 \"/></svg>', NULL, NULL),
(3, 'Boulanger', '2019-10-18 08-34-01', '<svg version=\"1.1\" id=\"bottom-trs-boulanger\" class=\"svg-color-w\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"	 viewBox=\"0 0 841.9 50\" style=\"enable-background:new 0 0 841.9 50;\" xml:space=\"preserve\"><path d=\"M0,22.9c24.7,14.9,203,11.8,420.1,11.8c216,0,394.9,2.7,421.9-12.2V50H0V22.9z\"/></svg>', '<svg version=\"1.1\" id=\"bottom-trs-boulanger\" class=\"svg-color-c\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"	 viewBox=\"0 0 841.9 50\" style=\"enable-background:new 0 0 841.9 50;\" xml:space=\"preserve\"><path d=\"M0,22.9c24.7,14.9,203,11.8,420.1,11.8c216,0,394.9,2.7,421.9-12.2V50H0V22.9z\"/></svg>', '<svg version=\"1.1\" id=\"top-trs-boulanger\" class=\"svg-color-w\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"	 viewBox=\"0 0 841.9 51\" style=\"enable-background:new 0 0 841.9 51;\" xml:space=\"preserve\"><path d=\"M842,38.5c-25-15.3-203.6-12.1-420.5-12.1C205.7,26.4,27,23.5,0,38.4V51h842V38.5z\"/></svg>', '<svg version=\"1.1\" id=\"top-trs-boulanger\" class=\"svg-color-c\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"	 viewBox=\"0 0 841.9 51\" style=\"enable-background:new 0 0 841.9 51;\" xml:space=\"preserve\"><path d=\"M842,38.5c-25-15.3-203.6-12.1-420.5-12.1C205.7,26.4,27,23.5,0,38.4V51h842V38.5z\"/></svg>', NULL, NULL),
(4, 'Coiffeur', '2019-10-18 08-33-09', '<svg version=\"1.1\" id=\"bottom-trs-coiffeur\" class=\"svg-color-w\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"	 viewBox=\"0 0 150.2 12.1\" style=\"enable-background:new 0 0 150.2 12.1;\" xml:space=\"preserve\"><path id=\"XMLID_732_\" d=\"M148.5,6c-4.3,0-7.9,0.4-11,1.1c-1.8,0.4-3.5,0.8-5.3,1.2c-4.7,1-10.3,1-15,0c-1.8-0.4-3.4-0.8-5.2-1.2	c-7-1.5-16.3-1.5-23.3,0c-1.8,0.4-3.4,0.8-5.1,1.2c-4.7,1-10.3,1-15,0c-1.7-0.4-3.3-0.8-5-1.2c-7.2-1.5-16.5-1.5-23.6,0	c-1.7,0.4-3.2,0.8-4.9,1.1c-4.7,1-10.3,1-15.1,0c-1.9-0.4-3.6-0.8-5.4-1.3C11.8,6.3,8.4,6,4.3,5.9C1.9,5.8,0.3,6,0.1,6.5	c0,0,0,0,0,0H0v0c0,0.1,0,0.1,0,0.2l0,5.6l150.1,0.1l0-6.1C149.9,6.1,149.3,6,148.5,6z\"/></svg>', '<svg version=\"1.1\" id=\"bottom-trs-coiffeur\" class=\"svg-color-c\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"	 viewBox=\"0 0 150.2 12.1\" style=\"enable-background:new 0 0 150.2 12.1;\" xml:space=\"preserve\"><path id=\"XMLID_732_\" d=\"M148.5,6c-4.3,0-7.9,0.4-11,1.1c-1.8,0.4-3.5,0.8-5.3,1.2c-4.7,1-10.3,1-15,0c-1.8-0.4-3.4-0.8-5.2-1.2	c-7-1.5-16.3-1.5-23.3,0c-1.8,0.4-3.4,0.8-5.1,1.2c-4.7,1-10.3,1-15,0c-1.7-0.4-3.3-0.8-5-1.2c-7.2-1.5-16.5-1.5-23.6,0	c-1.7,0.4-3.2,0.8-4.9,1.1c-4.7,1-10.3,1-15.1,0c-1.9-0.4-3.6-0.8-5.4-1.3C11.8,6.3,8.4,6,4.3,5.9C1.9,5.8,0.3,6,0.1,6.5	c0,0,0,0,0,0H0v0c0,0.1,0,0.1,0,0.2l0,5.6l150.1,0.1l0-6.1C149.9,6.1,149.3,6,148.5,6z\"/></svg>', '<svg version=\"1.1\" id=\"top-trs-coiffeur\" class=\"svg-color-w\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"	 viewBox=\"0 0 150.2 12.1\" style=\"enable-background:new 0 0 150.2 12.1;\" xml:space=\"preserve\"><path id=\"XMLID_732_\" d=\"M148.5,6c-4.3,0-7.9,0.4-11,1.1c-1.8,0.4-3.5,0.8-5.3,1.2c-4.7,1-10.3,1-15,0c-1.8-0.4-3.4-0.8-5.2-1.2	c-7-1.5-16.3-1.5-23.3,0c-1.8,0.4-3.4,0.8-5.1,1.2c-4.7,1-10.3,1-15,0c-1.7-0.4-3.3-0.8-5-1.2c-7.2-1.5-16.5-1.5-23.6,0	c-1.7,0.4-3.2,0.8-4.9,1.1c-4.7,1-10.3,1-15.1,0c-1.9-0.4-3.6-0.8-5.4-1.3C11.8,6.3,8.4,6,4.3,5.9C1.9,5.8,0.3,6,0.1,6.5	c0,0,0,0,0,0H0v0c0,0.1,0,0.1,0,0.2l0,5.6l150.1,0.1l0-6.1C149.9,6.1,149.3,6,148.5,6z\"/></svg>', '<svg version=\"1.1\" id=\"top-trs-coiffeur\" class=\"svg-color-c\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"	 viewBox=\"0 0 150.2 12.1\" style=\"enable-background:new 0 0 150.2 12.1;\" xml:space=\"preserve\"><path id=\"XMLID_732_\" d=\"M148.5,6c-4.3,0-7.9,0.4-11,1.1c-1.8,0.4-3.5,0.8-5.3,1.2c-4.7,1-10.3,1-15,0c-1.8-0.4-3.4-0.8-5.2-1.2	c-7-1.5-16.3-1.5-23.3,0c-1.8,0.4-3.4,0.8-5.1,1.2c-4.7,1-10.3,1-15,0c-1.7-0.4-3.3-0.8-5-1.2c-7.2-1.5-16.5-1.5-23.6,0	c-1.7,0.4-3.2,0.8-4.9,1.1c-4.7,1-10.3,1-15.1,0c-1.9-0.4-3.6-0.8-5.4-1.3C11.8,6.3,8.4,6,4.3,5.9C1.9,5.8,0.3,6,0.1,6.5	c0,0,0,0,0,0H0v0c0,0.1,0,0.1,0,0.2l0,5.6l150.1,0.1l0-6.1C149.9,6.1,149.3,6,148.5,6z\"/></svg>', '<svg version=\"1.1\" id=\"soustitre-icon-coiffeur\" class=\"svg-color-w\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"	 viewBox=\"0 0 398.1 150\" style=\"enable-background:new 0 0 398.1 150;\" xml:space=\"preserve\"><style type=\"text/css\">	.st0{fill:#FFFFFF;}</style><path id=\"XMLID_245_\" class=\"st0\" d=\"M1943.2,1049.2c-56.8,0.5-104.8,5.4-144.6,14.1c-24.1,5.3-46.3,10.9-70.4,16.2	c-61.8,13.5-135.7,13.5-197.6-0.1c-23.6-5.2-45-10.8-69-15.9c-92.5-19.5-215.9-19.3-307.6,0.4c-23.3,5-44.4,10.5-67.5,15.6	c-61.8,13.5-135.8,13.4-197.6-0.1c-22.6-5-43.2-10.4-66.1-15.3c-94.6-20.2-218.3-20.1-312,0.2c-22.3,4.8-42.5,10.1-64.7,15	c-62.6,13.7-136.7,13.8-199.1,0c-24.5-5.4-47.1-11.2-71.9-16.5c-37.8-8.1-82.7-13.2-136.2-14.3c-32.6-0.7-52.5,2-55.7,8.1	c-0.1,0.1-0.2,0.2-0.2,0.3l-0.1,0v0.1c0,0.7-0.2,1.3,0.1,1.9L-17,1133h1993v-66.6c7-1.1,12.4-2.8,15.2-5.1	C2000.1,1054.2,1979.4,1048.9,1943.2,1049.2z\"/><path id=\"XMLID_55_\" d=\"M167.4,96.7c-46.6,0-106.3-15.3-109.9-16.2l1.5-5.8c1.1,0.3,101.2,25.9,141.7,11.9c-6.5-6.3-8.1-14.3-8.4-19	c-0.6-8.8,3.2-14.1,5.6-16.5c2.9-3,6.7-4.6,10-4.4c6,0.4,15,6.2,15.2,20.6c0.2,7.7-2.7,14-8.7,18.8c-0.5,0.4-1,0.8-1.5,1.1	c11.6,4.5,34.1,4.5,77.5-14.4l2.4,5.5c-40.7,17.8-69.8,22-86.4,12.5C196.4,95,182.6,96.7,167.4,96.7z M207.3,52.7	c-1.2,0-3.2,0.7-5.1,2.6c-1.6,1.6-4.3,5.4-3.8,11.8c0.3,4.2,1.9,11.6,8.6,16.8c1.4-0.8,2.6-1.6,3.8-2.5c4.5-3.6,6.6-8.2,6.4-14	c-0.1-10.3-5.9-14.5-9.5-14.7C207.4,52.7,207.3,52.7,207.3,52.7z\"/></svg>', '<svg version=\"1.1\" id=\"soustitre-icon-coiffeur\" class=\"svg-color-c\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"	 viewBox=\"0 0 398.1 150\" style=\"enable-background:new 0 0 398.1 150;\" xml:space=\"preserve\"><style type=\"text/css\">	.st0{fill:#FFFFFF;}</style><path id=\"XMLID_245_\" class=\"st0\" d=\"M1943.2,1049.2c-56.8,0.5-104.8,5.4-144.6,14.1c-24.1,5.3-46.3,10.9-70.4,16.2	c-61.8,13.5-135.7,13.5-197.6-0.1c-23.6-5.2-45-10.8-69-15.9c-92.5-19.5-215.9-19.3-307.6,0.4c-23.3,5-44.4,10.5-67.5,15.6	c-61.8,13.5-135.8,13.4-197.6-0.1c-22.6-5-43.2-10.4-66.1-15.3c-94.6-20.2-218.3-20.1-312,0.2c-22.3,4.8-42.5,10.1-64.7,15	c-62.6,13.7-136.7,13.8-199.1,0c-24.5-5.4-47.1-11.2-71.9-16.5c-37.8-8.1-82.7-13.2-136.2-14.3c-32.6-0.7-52.5,2-55.7,8.1	c-0.1,0.1-0.2,0.2-0.2,0.3l-0.1,0v0.1c0,0.7-0.2,1.3,0.1,1.9L-17,1133h1993v-66.6c7-1.1,12.4-2.8,15.2-5.1	C2000.1,1054.2,1979.4,1048.9,1943.2,1049.2z\"/><path id=\"XMLID_55_\" d=\"M167.4,96.7c-46.6,0-106.3-15.3-109.9-16.2l1.5-5.8c1.1,0.3,101.2,25.9,141.7,11.9c-6.5-6.3-8.1-14.3-8.4-19	c-0.6-8.8,3.2-14.1,5.6-16.5c2.9-3,6.7-4.6,10-4.4c6,0.4,15,6.2,15.2,20.6c0.2,7.7-2.7,14-8.7,18.8c-0.5,0.4-1,0.8-1.5,1.1	c11.6,4.5,34.1,4.5,77.5-14.4l2.4,5.5c-40.7,17.8-69.8,22-86.4,12.5C196.4,95,182.6,96.7,167.4,96.7z M207.3,52.7	c-1.2,0-3.2,0.7-5.1,2.6c-1.6,1.6-4.3,5.4-3.8,11.8c0.3,4.2,1.9,11.6,8.6,16.8c1.4-0.8,2.6-1.6,3.8-2.5c4.5-3.6,6.6-8.2,6.4-14	c-0.1-10.3-5.9-14.5-9.5-14.7C207.4,52.7,207.3,52.7,207.3,52.7z\"/></svg>'),
(5, 'Eclair', '2019-10-18 08-31-29', '<svg version=\"1.1\" id=\"bottom-trs-eclair\" class=\"svg-color-w\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"	 viewBox=\"0 0 150 6.2\" style=\"enable-background:new 0 0 150 6.2;\" xml:space=\"preserve\"><polygon id=\"XMLID_224_\" points=\"0,2.4 75.7,2.4 72.8,5.7 150,5.7 150,0.7 0,0.7 \"/></svg>', '<svg version=\"1.1\" id=\"bottom-trs-eclair\" class=\"svg-color-c\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"	 viewBox=\"0 0 150 6.2\" style=\"enable-background:new 0 0 150 6.2;\" xml:space=\"preserve\"><polygon id=\"XMLID_224_\" points=\"0,2.4 75.7,2.4 72.8,5.7 150,5.7 150,0.7 0,0.7 \"/></svg>', '<svg version=\"1.1\" id=\"top-trs-eclair\" class=\"svg-color-w\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"	 viewBox=\"0 0 150 6.2\" style=\"enable-background:new 0 0 150 6.2;\" xml:space=\"preserve\"><polygon id=\"XMLID_224_\" points=\"0,2.4 75.7,2.4 72.8,5.7 150,5.7 150,0.7 0,0.7 \"/></svg>', '<svg version=\"1.1\" id=\"top-trs-eclair\" class=\"svg-color-c\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"	 viewBox=\"0 0 150 6.2\" style=\"enable-background:new 0 0 150 6.2;\" xml:space=\"preserve\"><polygon id=\"XMLID_224_\" points=\"0,2.4 75.7,2.4 72.8,5.7 150,5.7 150,0.7 0,0.7 \"/></svg>', '<svg version=\"1.1\" id=\"soustitre-icon-eclair\" class=\"svg-color-w\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\"                x=\"0px\" y=\"0px\" viewbox=\"0 0 150 43.25\" enable-background=\"new 0 0 150 43.25\" xml:space=\"preserve\">                <g id=\"XMLID_67_\">                    <path d=\"M78.736,28.291c-0.41,0-0.795-0.215-1.007-0.575c-0.238-0.402-0.214-0.907,0.061-1.285l6.501-8.939                                                   l-75.403,5.8c-0.646,0.053-1.208-0.433-1.258-1.078c-0.05-0.645,0.433-1.208,1.078-1.258l77.932-5.995                                                   c0.451-0.035,0.889,0.198,1.112,0.597c0.223,0.399,0.194,0.891-0.075,1.26l-6.399,8.798l60.256-7.652                                                   c0.642-0.084,1.227,0.373,1.309,1.014c0.081,0.642-0.373,1.228-1.014,1.309l-62.945,7.993                                                   C78.835,28.288,78.785,28.291,78.736,28.291z\" />                </g>            </svg>', '<svg version=\"1.1\" id=\"soustitre-icon-eclair\" class=\"svg-color-c\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\"                x=\"0px\" y=\"0px\" viewbox=\"0 0 150 43.25\" enable-background=\"new 0 0 150 43.25\" xml:space=\"preserve\">                <g id=\"XMLID_67_\">                    <path d=\"M78.736,28.291c-0.41,0-0.795-0.215-1.007-0.575c-0.238-0.402-0.214-0.907,0.061-1.285l6.501-8.939                                                   l-75.403,5.8c-0.646,0.053-1.208-0.433-1.258-1.078c-0.05-0.645,0.433-1.208,1.078-1.258l77.932-5.995                                                   c0.451-0.035,0.889,0.198,1.112,0.597c0.223,0.399,0.194,0.891-0.075,1.26l-6.399,8.798l60.256-7.652                                                   c0.642-0.084,1.227,0.373,1.309,1.014c0.081,0.642-0.373,1.228-1.014,1.309l-62.945,7.993                                                   C78.835,28.288,78.785,28.291,78.736,28.291z\" />                </g>            </svg>'),
(6, 'Fleur', '2019-10-18 08-32-48', '<svg version=\"1.1\" id=\"bottom-trs-fleur\" class=\"svg-color-w\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"	 viewBox=\"0 0 150.2 8.9\" style=\"enable-background:new 0 0 150.2 8.9;\" xml:space=\"preserve\"><polygon id=\"XMLID_262_\" points=\"0,5.1 133.2,0.9 150,5.1 150,9 0,9 \"/></svg>', '<svg version=\"1.1\" id=\"bottom-trs-fleur\" class=\"svg-color-c\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"	 viewBox=\"0 0 150.2 8.9\" style=\"enable-background:new 0 0 150.2 8.9;\" xml:space=\"preserve\"><polygon id=\"XMLID_262_\" points=\"0,5.1 133.2,0.9 150,5.1 150,9 0,9 \"/></svg>', '<svg version=\"1.1\" id=\"top-trs-fleur\" class=\"svg-color-w\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"	 viewBox=\"0 0 150.2 8.9\" style=\"enable-background:new 0 0 150.2 8.9;\" xml:space=\"preserve\"><polygon id=\"XMLID_262_\" points=\"0,5.1 133.2,0.9 150,5.1 150,9 0,9 \"/></svg>', '<svg version=\"1.1\" id=\"top-trs-fleur\" class=\"svg-color-c\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"	 viewBox=\"0 0 150.2 8.9\" style=\"enable-background:new 0 0 150.2 8.9;\" xml:space=\"preserve\"><polygon id=\"XMLID_262_\" points=\"0,5.1 133.2,0.9 150,5.1 150,9 0,9 \"/></svg>', '<svg version=\"1.1\" id=\"soustitre-icon-fleur\" class=\"svg-color-w\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"	 viewBox=\"0 0 2002.4 195\" style=\"enable-background:new 0 0 2002.4 195;\" xml:space=\"preserve\"></svg>', '<svg version=\"1.1\" id=\"soustitre-icon-fleur\" class=\"svg-color-c\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"	 viewBox=\"0 0 2002.4 195\" style=\"enable-background:new 0 0 2002.4 195;\" xml:space=\"preserve\"></svg>'),
(7, 'Peinture', '2019-10-18 08-31-57', '<svg version=\"1.1\" id=\"bottom-trs-peinture\" class=\"svg-color-w\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"	 viewBox=\"0 0 150.2 12.1\" style=\"enable-background:new 0 0 150.2 12.1;\" xml:space=\"preserve\"><polygon id=\"XMLID_1214_\" points=\"0,0 150,8.2 150.2,11.6 0,12.1 \"/></svg>', '<svg version=\"1.1\" id=\"bottom-trs-peinture\" class=\"svg-color-c\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"	 viewBox=\"0 0 150.2 12.1\" style=\"enable-background:new 0 0 150.2 12.1;\" xml:space=\"preserve\"><polygon id=\"XMLID_1214_\" points=\"0,0 150,8.2 150.2,11.6 0,12.1 \"/></svg>', '<svg version=\"1.1\" id=\"top-trs-peinture\" class=\"svg-color-w\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"	 viewBox=\"0 0 150.2 12.1\" style=\"enable-background:new 0 0 150.2 12.1;\" xml:space=\"preserve\"><polygon id=\"XMLID_1214_\" points=\"0,0 150,8.2 150.2,11.6 0,12.1 \"/></svg>', '<svg version=\"1.1\" id=\"top-trs-peinture\" class=\"svg-color-c\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"	 viewBox=\"0 0 150.2 12.1\" style=\"enable-background:new 0 0 150.2 12.1;\" xml:space=\"preserve\"><polygon id=\"XMLID_1214_\" points=\"0,0 150,8.2 150.2,11.6 0,12.1 \"/></svg>', '<svg version=\"1.1\" id=\"soustitre-icon-peinture\" class=\"svg-color-w\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"	 viewBox=\"0 0 398.1 150\" style=\"enable-background:new 0 0 398.1 150;\" xml:space=\"preserve\"><g id=\"XMLID_75_\">	<path id=\"XMLID_122_\" class=\"st0\" d=\"M86.9,67.2c0.2,0,0.4,0,0.6,0.1c-0.4,0-1,0.1-1.7,0.1c6.7,0.4,15.6-0.2,21.3-0.8		c2.1,0,3.9-0.3,4.1-0.5c0.2-0.2-1.3-0.4-3.4-0.3c-0.5,0-1,0-1.3,0c-3-0.3-6.6-0.4-10.6-0.4c0.8,0,1.6,0.1,2.3,0.1		c-1.2,0-2.3,0-3.6,0c0.1,0,0.3,0.1,0.4,0.1c-4-0.2-9.4,0-12.2,0.5c-2.7,0.5-1.8,1,2.2,1.2L86.9,67.2z\"/>	<path id=\"XMLID_121_\" class=\"st0\" d=\"M94.4,68.3c-2.4-0.1-4.7-0.2-7-0.3l-0.5-0.1l0.2,0.3l0,0c2.1-0.3,5.7-0.5,8.9-0.7l1.2-0.1		c0.6-0.1,0.9-0.1,1-0.2c0.3-0.2-0.8-0.3-2.3-0.3l-1.7,0c-4.3-0.1-11,0-13.3,0.6c-0.5,0.1-0.1,0.3,0.1,0.4c-0.2,0.2,1.4,0.4,3.6,0.3		c2.1,0,4-0.2,4.1-0.5c0.4,0,0.7,0,1.1,0c-0.3,0-0.6,0.1-0.9,0.1c0.6-0.2,2.5-0.3,4-0.4l2.2-0.1l-1.2-0.5l-1.1,0.1		c0.1,0,0.3,0,0.2,0.1c-2.1,0.2-4.2,0.4-6.5,0.5L83.5,68c-0.8,0.1-0.7,0.3,0.2,0.3l1.3,0.1c-0.2,0-0.4,0-0.6-0.1		c3,0,6.2,0.1,9.2,0.1c0.5,0,1,0,1.3-0.1C95.1,68.4,94.9,68.3,94.4,68.3z\"/>	<g id=\"XMLID_102_\">		<path id=\"XMLID_120_\" class=\"st0\" d=\"M83.7,68.6c-0.5,0-1-0.1-1.7,0c-0.2,0-0.3,0-0.3,0c0.3,0,0.6,0,1,0.1			C83.4,68.7,83.7,68.7,83.7,68.6z\"/>		<path id=\"XMLID_119_\" class=\"st0\" d=\"M81.8,68.6c-0.2,0-0.4,0-0.4,0c0.1,0,0.2,0,0.3,0C81.7,68.6,81.7,68.6,81.8,68.6			C81.7,68.6,81.7,68.6,81.8,68.6z\"/>		<path id=\"XMLID_118_\" class=\"st0\" d=\"M213.5,62.2c9.3-0.5,18.7-1,28.1-1.7c0.3,0,0.6-0.1,0.6-0.1c0,0-0.2,0-0.5,0			c-9.4,0.6-18.7,1.2-28,1.7c-0.3,0-0.6,0.1-0.6,0.1C213,62.2,213.2,62.2,213.5,62.2z\"/>		<path id=\"XMLID_117_\" class=\"st0\" d=\"M283.6,60C283.4,60.1,283.4,60.1,283.6,60c0.2,0.1,0.6,0.1,0.8,0c0.2,0,0.2-0.1,0-0.1			C284.1,60,283.8,60,283.6,60z\"/>		<path id=\"XMLID_103_\" class=\"st0\" d=\"M281.8,62.7c-1.3,0.2-2.5,0.3-3.6,0.5c-0.2,0-0.4,0-0.6,0c0.1,0-0.2,0.1-0.6,0.2			c-9.3,1.2-19.3,2.2-29.1,3.1c-0.1,0-0.2,0.1-0.4,0.1c-0.7,0.2-2,0.3-3.5,0.4l-1.1,0c-4.3,0.2-8.7,0.5-13,0.7			c-0.9,0.1-1.9,0.2-3,0.3c-3.7,0.4-7.4,0.8-11.3,1.2c0.2,0,0.4,0.1,0.4,0.1c-0.1,0.1-0.9,0.3-2,0.3l-1.6,0.1c1.5-0.1,3-0.1,4.5-0.2			c0.2,0,0.4,0,0.6,0c1.6-0.1,3.3-0.2,5-0.3c14.7-1.1,28.5-2.5,42.1-4.1c0.2,0,0.6-0.1,0.8-0.1c0.1,0,0.1,0.1-0.1,0.1			c-8.6,1.2-16,2.5-25.7,3.6c-11.6,1.3-23.1,2.4-35,3.4c-12.5,0.7-24,1.7-36.7,2.4c-17.2,1.1-33.4,1.8-50.3,2.3			c-6.3,0.3-12.1,0-12.9-0.6c-0.5-0.4,0.9-0.8,3.5-1.1c-0.5,0-1,0-1.5,0l-2.4,0c-2.3,0-4.3-0.1-5.5-0.3l-1.7-0.2			c-2.3-0.4-6-0.8-7.8-1.3l0.4-0.2l-0.4,0c-1.5-0.1-2.4-0.3-2.8-0.5l0.1-0.2c0.3-0.3,1-0.6,2.2-0.8c0-0.1,0.1-0.2,0.4-0.3			c-1-0.2-1.5-0.5-0.7-0.8c-0.6-0.1-0.5-0.3,0.2-0.4c0.2,0,0.5-0.2,0.8-0.2c0,0,0,0,0,0c-0.3,0-0.4,0.1-0.9,0c-0.6,0-0.9,0-0.9,0			c-1.6,0-1.6,0-2.9,0c-1.2-0.1-1.9-0.1-1.9-0.1c-1.3-0.4-1.3-0.4-1.1-0.6c0.1,0,0.2,0,0.3-0.1c-1,0-1.1,0-1.4-0.1			c-0.3,0-0.5-0.1-0.5-0.1c0-0.1,0-0.1-0.2-0.1c-0.1,0,0-0.1,0-0.1c0.6-0.1,0.6-0.1,0.6-0.2c0.1,0,0.3-0.1,0.3-0.1			c0.7,0,1-0.1,1.1-0.1c1.5,0.2,1.5,0.2,1.5,0.2c0.3-0.1,0.3-0.1,0.3-0.1c0.3,0.1,0.3,0.1,0.3,0.1c-0.2-0.1-0.2-0.1-0.2-0.1			c0.7,0.1,0.7,0.1,0.7,0.1c-0.8-0.1-0.8-0.1-0.8-0.1c1.7,0,1.7,0,2.4,0c0.7,0,1.3,0,1.4,0c-0.1,0-0.1-0.1-0.1-0.1			c1.9,0,1.9,0,3.7,0c0.2,0,0.3,0,0.4,0.1c0.2,0,0.5-0.1,0.9-0.1l1,0c0.1,0,0.1,0,0.2,0c0,0,0,0,0,0c0.3,0,0.5,0,0.8-0.1			c0.2,0,0.2,0,0.2,0l0,0c0.6-0.1,1.4-0.1,3.5-0.3c0.6,0,1.1,0,1.6,0c-0.2,0-0.3,0-0.5,0c-0.3,0,0-0.1-0.2-0.1			c-4-0.1-8.3-0.1-12.6-0.1c-0.8,0-1.5,0-1.6-0.1c-0.1-0.1,0.4-0.2,1.2-0.2c8.7-0.7,19.3-0.9,28.3-0.8c2.4,0,4.7-0.1,7.1-0.1l-0.3,0			l1.8,0l0.2,0c-0.5,0-0.9-0.1-1.4-0.1c-0.3,0-0.6,0-1,0c-5.5,0.1-10.5,0-15.8-0.1c-2.9,0-5.3-0.1-8-0.2c-0.7,0-1.2,0-1.1-0.1			c0.1-0.1,0.7-0.1,1.4-0.1c9-0.3,19.3-0.5,26.5-0.2c1.6-0.1,3.2,0,4.5,0h0.1c-0.3,0-0.7-0.1-1-0.1c1.2,0,1.9,0.1,3,0.1			c-0.1-0.1-0.3-0.1-0.4-0.2c6.1-0.1,12.6-0.4,18.2-0.3c0.2,0,0.4,0,0.6,0c2.4-0.2,4.8-0.5,7.7-0.6c-1,0-1.9,0-2.9,0.1			c2.1-0.2,4.1-0.3,6.4-0.4c6-0.2,12.8-0.3,16,0.1c11.7-0.7,23.4-1.4,35-2.2c0.6,0,1.1,0,1.3,0c0.1,0.1-0.3,0.1-0.9,0.2			c-8.3,0.7-16.8,1.3-25.3,1.9c7.1-0.3,14.2-0.6,21.5-1c0.9-0.1,1.9-0.1,2.8-0.2c0.9-0.1,1.8-0.1,2.8-0.1c9.3-0.6,18.1-1.1,27.6-2			c8.1-0.7,15.1-1.4,23.2-2.2c11.3-1.2,21.5-2.3,32.7-3.3c1.5-0.2,2.9-0.2,3.1,0c0.2,0.1-0.9,0.4-2.4,0.5c-23.2,2.6-46.1,5-70.4,6.6			c-2.6,0.2-5.2,0.3-7.8,0.5c0,0,0.1,0,0.1,0.1c0,0.1-0.2,0.2-0.6,0.3c2.9-0.2,5.9-0.3,8.8-0.5c8.2-0.7,16.4-1.5,25.2-2.1			c6-0.4,11.5-0.6,17-0.9c7-0.7,14-1.4,21.2-2.1c0.3,0,0.6,0,0.7,0c0.1,0,0,0.1-0.3,0.1c-4.9,0.6-9.9,1.2-14.9,1.8			c0.8,0,1.3,0.1,1.2,0.3c-0.1,0.1-0.7,0.3-1.6,0.5l3.4-0.3c0.7-0.1,1.3,0,1.3,0c0,0.1-0.6,0.2-1.2,0.2c-4.7,0.4-9.4,0.8-14,1.1			c-5.6,0.5-11.2,1-16.8,1.5c0.8,0,1.4,0.1,1.7,0.2l0,0c0.9-0.1,1.7-0.1,2.6-0.2c15.9-1.6,32.1-3.2,48.5-4.6c0.3,0,0.6,0,0.6,0			c0,0-0.2,0.2-0.5,0.2C295.9,59,291,59,286,60h0c0.2,0,0.2-0.1,0,0c-0.2,0-0.6,0-0.8,0c-0.2,0-0.2-0.1,0-0.1			c-9.1,0.9-18.2,1.8-27.2,2.6c8.3-0.7,16.7-1.4,25-2.1c0.9-0.1,1.8-0.2,2.7-0.4c0.2,0,0.6,0,0.7,0c0.1,0-0.1,0.1-0.4,0.1l-0.8,0.1			c1.6-0.1,2.8-0.1,2.8,0.1c-0.1,0.2-1.4,0.4-3.1,0.6c-4.4,0.4-8.8,0.8-13.1,1.2l-1.4,0.1c-0.5,0.1-0.9,0.1-1.4,0.2			c6.8-0.5,13.6-1,20.3-1.5c0.6-0.1,1.1-0.1,1.1,0c0,0.1-0.4,0.2-1,0.2c-11.9,1.3-23.9,2.5-36,3.5c-4,0.6-7.9,1.1-12,1.7			c0.5,0,1-0.1,1.5-0.1c13.2-1,24.3-2.6,37-3.8c0.3,0,0.6,0,0.6,0c0,0-0.2,0.1-0.5,0.1c-6.2,0.6-11.8,1.3-18,2			c-5.1,0.6-9.9,1-14.7,1.6c9.7-0.8,19-1.9,28.6-2.8c0.4,0,0.8-0.1,1.1-0.1c0,0,0.1,0,0.2-0.1c1.2-0.2,2.5-0.4,3.8-0.5			c0.3,0,0.6-0.1,0.7,0C282.2,62.6,282.1,62.6,281.8,62.7z M112.6,69c-0.1,0-0.2,0-0.2,0c0.3,0,0.5,0,0.9,0c0,0,0,0,1.2,0.2			C114.4,69.2,113.5,69.1,112.6,69z M97.8,70.3C97.8,70.3,97.8,70.3,97.8,70.3c-0.4-0.1-0.7-0.1-0.7-0.1			C97.4,70.2,97.6,70.2,97.8,70.3z M192.7,64.3c-5.1,0.3-10.2,0.5-15.2,0.6c1.2-0.1,2.5-0.2,3.7-0.2C185,64.5,188.8,64.4,192.7,64.3			z M102.6,68.3c1.3,0.1,2.4,0.2,3.4,0.4c0.9-0.1,1.8-0.1,2.7-0.1c2.5,0,5-0.1,7.4-0.1c-0.3-0.1,0.3-0.1,0.6-0.1c0.3,0,0.6,0,0.9,0			c-2.6,0-5.2,0-7.8,0C107.5,68.4,104.9,68.4,102.6,68.3z M84.7,69.1c-0.1,0-0.1,0-0.2,0c0,0,0,0,0.5-0.1			C84.9,68.9,84.8,69,84.7,69.1z M83.9,69.3c0.1,0,0.2,0,0.4,0C84.2,69.4,84,69.4,83.9,69.3z M87.3,69.4c-0.2,0-0.3,0-0.5-0.1			C87.3,69.4,87.3,69.4,87.3,69.4z M89.8,73.1l1.3-0.7l-1.4,0.6L89.8,73.1z\"/>	</g></g></svg>', '<svg version=\"1.1\" id=\"soustitre-icon-peinture\" class=\"svg-color-c\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"	 viewBox=\"0 0 398.1 150\" style=\"enable-background:new 0 0 398.1 150;\" xml:space=\"preserve\"><g id=\"XMLID_75_\">	<path id=\"XMLID_122_\" class=\"st0\" d=\"M86.9,67.2c0.2,0,0.4,0,0.6,0.1c-0.4,0-1,0.1-1.7,0.1c6.7,0.4,15.6-0.2,21.3-0.8		c2.1,0,3.9-0.3,4.1-0.5c0.2-0.2-1.3-0.4-3.4-0.3c-0.5,0-1,0-1.3,0c-3-0.3-6.6-0.4-10.6-0.4c0.8,0,1.6,0.1,2.3,0.1		c-1.2,0-2.3,0-3.6,0c0.1,0,0.3,0.1,0.4,0.1c-4-0.2-9.4,0-12.2,0.5c-2.7,0.5-1.8,1,2.2,1.2L86.9,67.2z\"/>	<path id=\"XMLID_121_\" class=\"st0\" d=\"M94.4,68.3c-2.4-0.1-4.7-0.2-7-0.3l-0.5-0.1l0.2,0.3l0,0c2.1-0.3,5.7-0.5,8.9-0.7l1.2-0.1		c0.6-0.1,0.9-0.1,1-0.2c0.3-0.2-0.8-0.3-2.3-0.3l-1.7,0c-4.3-0.1-11,0-13.3,0.6c-0.5,0.1-0.1,0.3,0.1,0.4c-0.2,0.2,1.4,0.4,3.6,0.3		c2.1,0,4-0.2,4.1-0.5c0.4,0,0.7,0,1.1,0c-0.3,0-0.6,0.1-0.9,0.1c0.6-0.2,2.5-0.3,4-0.4l2.2-0.1l-1.2-0.5l-1.1,0.1		c0.1,0,0.3,0,0.2,0.1c-2.1,0.2-4.2,0.4-6.5,0.5L83.5,68c-0.8,0.1-0.7,0.3,0.2,0.3l1.3,0.1c-0.2,0-0.4,0-0.6-0.1		c3,0,6.2,0.1,9.2,0.1c0.5,0,1,0,1.3-0.1C95.1,68.4,94.9,68.3,94.4,68.3z\"/>	<g id=\"XMLID_102_\">		<path id=\"XMLID_120_\" class=\"st0\" d=\"M83.7,68.6c-0.5,0-1-0.1-1.7,0c-0.2,0-0.3,0-0.3,0c0.3,0,0.6,0,1,0.1			C83.4,68.7,83.7,68.7,83.7,68.6z\"/>		<path id=\"XMLID_119_\" class=\"st0\" d=\"M81.8,68.6c-0.2,0-0.4,0-0.4,0c0.1,0,0.2,0,0.3,0C81.7,68.6,81.7,68.6,81.8,68.6			C81.7,68.6,81.7,68.6,81.8,68.6z\"/>		<path id=\"XMLID_118_\" class=\"st0\" d=\"M213.5,62.2c9.3-0.5,18.7-1,28.1-1.7c0.3,0,0.6-0.1,0.6-0.1c0,0-0.2,0-0.5,0			c-9.4,0.6-18.7,1.2-28,1.7c-0.3,0-0.6,0.1-0.6,0.1C213,62.2,213.2,62.2,213.5,62.2z\"/>		<path id=\"XMLID_117_\" class=\"st0\" d=\"M283.6,60C283.4,60.1,283.4,60.1,283.6,60c0.2,0.1,0.6,0.1,0.8,0c0.2,0,0.2-0.1,0-0.1			C284.1,60,283.8,60,283.6,60z\"/>		<path id=\"XMLID_103_\" class=\"st0\" d=\"M281.8,62.7c-1.3,0.2-2.5,0.3-3.6,0.5c-0.2,0-0.4,0-0.6,0c0.1,0-0.2,0.1-0.6,0.2			c-9.3,1.2-19.3,2.2-29.1,3.1c-0.1,0-0.2,0.1-0.4,0.1c-0.7,0.2-2,0.3-3.5,0.4l-1.1,0c-4.3,0.2-8.7,0.5-13,0.7			c-0.9,0.1-1.9,0.2-3,0.3c-3.7,0.4-7.4,0.8-11.3,1.2c0.2,0,0.4,0.1,0.4,0.1c-0.1,0.1-0.9,0.3-2,0.3l-1.6,0.1c1.5-0.1,3-0.1,4.5-0.2			c0.2,0,0.4,0,0.6,0c1.6-0.1,3.3-0.2,5-0.3c14.7-1.1,28.5-2.5,42.1-4.1c0.2,0,0.6-0.1,0.8-0.1c0.1,0,0.1,0.1-0.1,0.1			c-8.6,1.2-16,2.5-25.7,3.6c-11.6,1.3-23.1,2.4-35,3.4c-12.5,0.7-24,1.7-36.7,2.4c-17.2,1.1-33.4,1.8-50.3,2.3			c-6.3,0.3-12.1,0-12.9-0.6c-0.5-0.4,0.9-0.8,3.5-1.1c-0.5,0-1,0-1.5,0l-2.4,0c-2.3,0-4.3-0.1-5.5-0.3l-1.7-0.2			c-2.3-0.4-6-0.8-7.8-1.3l0.4-0.2l-0.4,0c-1.5-0.1-2.4-0.3-2.8-0.5l0.1-0.2c0.3-0.3,1-0.6,2.2-0.8c0-0.1,0.1-0.2,0.4-0.3			c-1-0.2-1.5-0.5-0.7-0.8c-0.6-0.1-0.5-0.3,0.2-0.4c0.2,0,0.5-0.2,0.8-0.2c0,0,0,0,0,0c-0.3,0-0.4,0.1-0.9,0c-0.6,0-0.9,0-0.9,0			c-1.6,0-1.6,0-2.9,0c-1.2-0.1-1.9-0.1-1.9-0.1c-1.3-0.4-1.3-0.4-1.1-0.6c0.1,0,0.2,0,0.3-0.1c-1,0-1.1,0-1.4-0.1			c-0.3,0-0.5-0.1-0.5-0.1c0-0.1,0-0.1-0.2-0.1c-0.1,0,0-0.1,0-0.1c0.6-0.1,0.6-0.1,0.6-0.2c0.1,0,0.3-0.1,0.3-0.1			c0.7,0,1-0.1,1.1-0.1c1.5,0.2,1.5,0.2,1.5,0.2c0.3-0.1,0.3-0.1,0.3-0.1c0.3,0.1,0.3,0.1,0.3,0.1c-0.2-0.1-0.2-0.1-0.2-0.1			c0.7,0.1,0.7,0.1,0.7,0.1c-0.8-0.1-0.8-0.1-0.8-0.1c1.7,0,1.7,0,2.4,0c0.7,0,1.3,0,1.4,0c-0.1,0-0.1-0.1-0.1-0.1			c1.9,0,1.9,0,3.7,0c0.2,0,0.3,0,0.4,0.1c0.2,0,0.5-0.1,0.9-0.1l1,0c0.1,0,0.1,0,0.2,0c0,0,0,0,0,0c0.3,0,0.5,0,0.8-0.1			c0.2,0,0.2,0,0.2,0l0,0c0.6-0.1,1.4-0.1,3.5-0.3c0.6,0,1.1,0,1.6,0c-0.2,0-0.3,0-0.5,0c-0.3,0,0-0.1-0.2-0.1			c-4-0.1-8.3-0.1-12.6-0.1c-0.8,0-1.5,0-1.6-0.1c-0.1-0.1,0.4-0.2,1.2-0.2c8.7-0.7,19.3-0.9,28.3-0.8c2.4,0,4.7-0.1,7.1-0.1l-0.3,0			l1.8,0l0.2,0c-0.5,0-0.9-0.1-1.4-0.1c-0.3,0-0.6,0-1,0c-5.5,0.1-10.5,0-15.8-0.1c-2.9,0-5.3-0.1-8-0.2c-0.7,0-1.2,0-1.1-0.1			c0.1-0.1,0.7-0.1,1.4-0.1c9-0.3,19.3-0.5,26.5-0.2c1.6-0.1,3.2,0,4.5,0h0.1c-0.3,0-0.7-0.1-1-0.1c1.2,0,1.9,0.1,3,0.1			c-0.1-0.1-0.3-0.1-0.4-0.2c6.1-0.1,12.6-0.4,18.2-0.3c0.2,0,0.4,0,0.6,0c2.4-0.2,4.8-0.5,7.7-0.6c-1,0-1.9,0-2.9,0.1			c2.1-0.2,4.1-0.3,6.4-0.4c6-0.2,12.8-0.3,16,0.1c11.7-0.7,23.4-1.4,35-2.2c0.6,0,1.1,0,1.3,0c0.1,0.1-0.3,0.1-0.9,0.2			c-8.3,0.7-16.8,1.3-25.3,1.9c7.1-0.3,14.2-0.6,21.5-1c0.9-0.1,1.9-0.1,2.8-0.2c0.9-0.1,1.8-0.1,2.8-0.1c9.3-0.6,18.1-1.1,27.6-2			c8.1-0.7,15.1-1.4,23.2-2.2c11.3-1.2,21.5-2.3,32.7-3.3c1.5-0.2,2.9-0.2,3.1,0c0.2,0.1-0.9,0.4-2.4,0.5c-23.2,2.6-46.1,5-70.4,6.6			c-2.6,0.2-5.2,0.3-7.8,0.5c0,0,0.1,0,0.1,0.1c0,0.1-0.2,0.2-0.6,0.3c2.9-0.2,5.9-0.3,8.8-0.5c8.2-0.7,16.4-1.5,25.2-2.1			c6-0.4,11.5-0.6,17-0.9c7-0.7,14-1.4,21.2-2.1c0.3,0,0.6,0,0.7,0c0.1,0,0,0.1-0.3,0.1c-4.9,0.6-9.9,1.2-14.9,1.8			c0.8,0,1.3,0.1,1.2,0.3c-0.1,0.1-0.7,0.3-1.6,0.5l3.4-0.3c0.7-0.1,1.3,0,1.3,0c0,0.1-0.6,0.2-1.2,0.2c-4.7,0.4-9.4,0.8-14,1.1			c-5.6,0.5-11.2,1-16.8,1.5c0.8,0,1.4,0.1,1.7,0.2l0,0c0.9-0.1,1.7-0.1,2.6-0.2c15.9-1.6,32.1-3.2,48.5-4.6c0.3,0,0.6,0,0.6,0			c0,0-0.2,0.2-0.5,0.2C295.9,59,291,59,286,60h0c0.2,0,0.2-0.1,0,0c-0.2,0-0.6,0-0.8,0c-0.2,0-0.2-0.1,0-0.1			c-9.1,0.9-18.2,1.8-27.2,2.6c8.3-0.7,16.7-1.4,25-2.1c0.9-0.1,1.8-0.2,2.7-0.4c0.2,0,0.6,0,0.7,0c0.1,0-0.1,0.1-0.4,0.1l-0.8,0.1			c1.6-0.1,2.8-0.1,2.8,0.1c-0.1,0.2-1.4,0.4-3.1,0.6c-4.4,0.4-8.8,0.8-13.1,1.2l-1.4,0.1c-0.5,0.1-0.9,0.1-1.4,0.2			c6.8-0.5,13.6-1,20.3-1.5c0.6-0.1,1.1-0.1,1.1,0c0,0.1-0.4,0.2-1,0.2c-11.9,1.3-23.9,2.5-36,3.5c-4,0.6-7.9,1.1-12,1.7			c0.5,0,1-0.1,1.5-0.1c13.2-1,24.3-2.6,37-3.8c0.3,0,0.6,0,0.6,0c0,0-0.2,0.1-0.5,0.1c-6.2,0.6-11.8,1.3-18,2			c-5.1,0.6-9.9,1-14.7,1.6c9.7-0.8,19-1.9,28.6-2.8c0.4,0,0.8-0.1,1.1-0.1c0,0,0.1,0,0.2-0.1c1.2-0.2,2.5-0.4,3.8-0.5			c0.3,0,0.6-0.1,0.7,0C282.2,62.6,282.1,62.6,281.8,62.7z M112.6,69c-0.1,0-0.2,0-0.2,0c0.3,0,0.5,0,0.9,0c0,0,0,0,1.2,0.2			C114.4,69.2,113.5,69.1,112.6,69z M97.8,70.3C97.8,70.3,97.8,70.3,97.8,70.3c-0.4-0.1-0.7-0.1-0.7-0.1			C97.4,70.2,97.6,70.2,97.8,70.3z M192.7,64.3c-5.1,0.3-10.2,0.5-15.2,0.6c1.2-0.1,2.5-0.2,3.7-0.2C185,64.5,188.8,64.4,192.7,64.3			z M102.6,68.3c1.3,0.1,2.4,0.2,3.4,0.4c0.9-0.1,1.8-0.1,2.7-0.1c2.5,0,5-0.1,7.4-0.1c-0.3-0.1,0.3-0.1,0.6-0.1c0.3,0,0.6,0,0.9,0			c-2.6,0-5.2,0-7.8,0C107.5,68.4,104.9,68.4,102.6,68.3z M84.7,69.1c-0.1,0-0.1,0-0.2,0c0,0,0,0,0.5-0.1			C84.9,68.9,84.8,69,84.7,69.1z M83.9,69.3c0.1,0,0.2,0,0.4,0C84.2,69.4,84,69.4,83.9,69.3z M87.3,69.4c-0.2,0-0.3,0-0.5-0.1			C87.3,69.4,87.3,69.4,87.3,69.4z M89.8,73.1l1.3-0.7l-1.4,0.6L89.8,73.1z\"/>	</g></g></svg>'),
(8, 'Plombier', '2019-10-18 08-34-28', '<svg version=\"1.1\" id=\"bottom-trs-plombier\" class=\"svg-color-w\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"	 viewBox=\"0 0 1956.7 168.8\" style=\"enable-background:new 0 0 1956.7 168.8;\" xml:space=\"preserve\"><path id=\"XMLID_27_\" d=\"M1956.7,91.4c0,0-334.3,68.5-746.1,27.4S709.3,25.3,0,16.2V-4.4h1956.7V91.4z\"/></svg>', '<svg version=\"1.1\" id=\"bottom-trs-plombier\" class=\"svg-color-c\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"	 viewBox=\"0 0 1956.7 168.8\" style=\"enable-background:new 0 0 1956.7 168.8;\" xml:space=\"preserve\"><path id=\"XMLID_27_\" d=\"M1956.7,91.4c0,0-334.3,68.5-746.1,27.4S709.3,25.3,0,16.2V-4.4h1956.7V91.4z\"/></svg>', '<svg version=\"1.1\" id=\"top-trs-plombier\" class=\"svg-color-w\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"	 viewBox=\"0 0 1956.7 168.8\" style=\"enable-background:new 0 0 1956.7 168.8;\" xml:space=\"preserve\"><path id=\"XMLID_27_\" d=\"M1956.7,91.4c0,0-334.3,68.5-746.1,27.4S709.3,25.3,0,16.2V-4.4h1956.7V91.4z\"/></svg>', '<svg version=\"1.1\" id=\"top-trs-plombier\" class=\"svg-color-c\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"	 viewBox=\"0 0 1956.7 168.8\" style=\"enable-background:new 0 0 1956.7 168.8;\" xml:space=\"preserve\"><path id=\"XMLID_27_\" d=\"M1956.7,91.4c0,0-334.3,68.5-746.1,27.4S709.3,25.3,0,16.2V-4.4h1956.7V91.4z\"/></svg>', '<svg version=\"1.1\" id=\"soustitre-icon-plombier\" class=\"svg-color-w\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"	 viewBox=\"0 0 398.1 150\" style=\"enable-background:new 0 0 398.1 150;\" xml:space=\"preserve\"><path id=\"XMLID_84_\" d=\"M343,69.1c0-0.7-0.5-1.6-1.1-1.7c-0.1,0-0.2-0.4-0.3-0.4H77.9l0-12.4c0-0.8-0.6-1.3-1.4-1.3l-1.9,0.1	c-0.8,0-1.4,0.7-1.4,1.5l0,16c0,0.8,0.6,1.4,1.4,1.4l1.9-0.2c0,0,0.1-0.2,0.1-0.2h261.7l0,12.9c0,0.8,0.6,1.5,1.4,1.5l1.9,0	c0.8,0,1.4-0.6,1.4-1.4L343,69.1z\"/></svg>', '<svg version=\"1.1\" id=\"soustitre-icon-plombier\" class=\"svg-color-c\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"	 viewBox=\"0 0 398.1 150\" style=\"enable-background:new 0 0 398.1 150;\" xml:space=\"preserve\"><path id=\"XMLID_84_\" d=\"M343,69.1c0-0.7-0.5-1.6-1.1-1.7c-0.1,0-0.2-0.4-0.3-0.4H77.9l0-12.4c0-0.8-0.6-1.3-1.4-1.3l-1.9,0.1	c-0.8,0-1.4,0.7-1.4,1.5l0,16c0,0.8,0.6,1.4,1.4,1.4l1.9-0.2c0,0,0.1-0.2,0.1-0.2h261.7l0,12.9c0,0.8,0.6,1.5,1.4,1.5l1.9,0	c0.8,0,1.4-0.6,1.4-1.4L343,69.1z\"/></svg>');

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `galerie`
--

INSERT INTO `galerie` (`id`, `nom`, `description`, `updated_at`) VALUES
(4, 'TEST 1', '<p>Lorem&nbsp;ipsum&nbsp;dolor&nbsp;sit&nbsp;amet&nbsp;consectetur,&nbsp;adipisicing&nbsp;elit.&nbsp;Cupiditate,&nbsp;nesciunt?&nbsp;Tempora,&nbsp;autem?&nbsp;Necessitatibus&nbsp;totam,&nbsp;quo&nbsp;dicta&nbsp;consectetur&nbsp;repudiandae&nbsp;adipisci&nbsp;maxime?&nbsp;Magni&nbsp;corrupti&nbsp;vero&nbsp;qui&nbsp;perspiciatis,&nbsp;ipsa&nbsp;ad&nbsp;illo&nbsp;ratione&nbsp;quia&nbsp;quaerat&nbsp;debitis&nbsp;a&nbsp;placeat&nbsp;voluptas.&nbsp;Reprehenderit&nbsp;aut&nbsp;ipsam&nbsp;corporis&nbsp;ullam.</p>', '2019-10-09 09:09:34'),
(5, 'TEST AGAIN', '<p>Lorem&nbsp;ipsum&nbsp;dolor&nbsp;sit&nbsp;amet&nbsp;consectetur,&nbsp;adipisicing&nbsp;elit.&nbsp;Cupiditate,&nbsp;nesciunt?&nbsp;Tempora,&nbsp;autem?&nbsp;Necessitatibus&nbsp;totam,&nbsp;quo&nbsp;dicta&nbsp;consectetur&nbsp;repudiandae&nbsp;adipisci&nbsp;maxime?&nbsp;Magni&nbsp;corrupti&nbsp;vero&nbsp;qui&nbsp;perspiciatis,&nbsp;ipsa&nbsp;ad&nbsp;illo&nbsp;ratione&nbsp;quia&nbsp;quaerat&nbsp;debitis&nbsp;a&nbsp;placeat&nbsp;voluptas.&nbsp;Reprehenderit&nbsp;aut&nbsp;ipsam&nbsp;corporis&nbsp;ullam.</p>', '2019-10-09 09:31:36'),
(6, 'TEST 309582039U8', '<p>JFBERIGERLZEUIHVGRIVUHGRTIUVORTIUGTROVH RBEUGH EFIGSRLIGHSRLIVHSRB SRIHBSHB&nbsp;</p>', '2019-10-09 09:35:26'),
(7, 'jgbitg\'tihgitug\'tiu\'tohg otigho\'tig', '<p>iiuhgitughtiught bhrhborbhrujrbujrgjiijb</p>', '2019-10-11 09:18:04');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `horaires`
--

INSERT INTO `horaires` (`id`, `jour`, `ouverture`, `fermeture`, `debut_pause`, `fin_pause`) VALUES
(1, 'lundi', '05:00:00', '10:00:00', '17:34:00', '16:16:00'),
(2, 'lkdgnn', '17:00:00', '07:05:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `icons`
--

DROP TABLE IF EXISTS `icons`;
CREATE TABLE IF NOT EXISTS `icons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `icons`
--

INSERT INTO `icons` (`id`, `code`, `nom`) VALUES
(3, '<svg version=\"1.1\" id=\"icon_label\" class=\"svg-color-c\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"\r\n	 viewBox=\"0 0 150 150\" enable-background=\"new 0 0 150 150\" xml:space=\"preserve\">\r\n<g>\r\n	<path d=\"M78.8,46.9c-1.3,1.3-1.3,3.5,0,4.8c1.3,1.3,3.5,1.3,4.8,0l2.8-2.8c1-1,1.3-2.5,0.7-3.8c-1.9-4-2.8-8.1-2.8-12.3\r\n		c0-8.5,3.7-16.5,9.9-22l0,22.1c0,1.1,0.5,2.1,1.5,2.8l16,11.1c1.2,0.8,2.7,0.8,3.8,0l16-11.1c0.9-0.6,1.5-1.7,1.5-2.8l0-22.1\r\n		c6.2,5.5,9.9,13.5,9.9,22c0,7.8-3.1,15.2-8.6,20.8c-5.5,5.5-12.9,8.6-20.7,8.6c0,0,0,0,0,0c-2.7,0-8-1.3-9.8-1.8\r\n		c-1.2-0.3-2.4,0-3.3,0.9L90.2,71.5c-1.3,1.3-1.3,3.5,0,4.8c0.7,0.7,1.5,1,2.4,1s1.7-0.3,2.4-1l8.9-8.9c2.5,0.6,6.8,1.6,9.7,1.6\r\n		c0,0,0,0,0,0c9.6,0,18.7-3.8,25.5-10.6c6.8-6.8,10.6-15.9,10.6-25.5c0-13-7.1-25-18.4-31.5c-1-0.6-2.3-0.6-3.4,0\r\n		c-1,0.6-1.7,1.7-1.7,2.9l0,26.9l-12.7,8.8L101,31.2l0-26.9c0-1.2-0.6-2.3-1.7-2.9c-1-0.6-2.3-0.6-3.4,0\r\n		C84.6,7.7,77.5,19.8,77.5,32.8c0,4.4,0.8,8.7,2.5,13L78.8,46.9z\"/>\r\n	<path d=\"M69.9,91.8L23,138.7c-1.8,1.8-4.1,2.7-6.6,2.7c0,0,0,0,0,0c-2.5,0-4.8-1-6.6-2.7C8,137,7,134.6,7,132.1\r\n		c0-2.5,1-4.8,2.7-6.6l40.3-40.3c1.3-1.3,1.3-3.5,0-4.8c-1.3-1.3-3.5-1.3-4.8,0L5,120.8c-3,3-4.7,7.1-4.7,11.4\r\n		c0,4.3,1.7,8.4,4.7,11.4c3,3,7.1,4.7,11.4,4.7c0,0,0,0,0,0c4.3,0,8.3-1.7,11.4-4.7l46.9-46.9c1.3-1.3,1.3-3.5,0-4.8\r\n		C73.3,90.5,71.2,90.5,69.9,91.8z\"/>\r\n	<path d=\"M16.3,128c-1.1,0-2.2,0.4-2.9,1.2c-1.6,1.6-1.6,4.3,0,5.9c0,0,0,0,0,0c0.8,0.8,1.9,1.2,2.9,1.2c1.1,0,2.1-0.4,3-1.2\r\n		c1.6-1.6,1.6-4.3,0-5.9C18.5,128.5,17.4,128,16.3,128C16.3,128,16.3,128,16.3,128z\"/>\r\n	<path d=\"M126.9,110.9c-0.4-0.3-0.8-0.6-1.2-0.8l-9.7-3.5l-35-35l5.7-5.7c1.3-1.3,1.3-3.5,0-4.8c-1-1-2.5-1.2-3.7-0.7l-53-53\r\n		c-3.2-3.2-7.5-5-12-5c0,0,0,0,0,0c-4.5,0-8.8,1.8-12,5c-3.2,3.2-5,7.5-5,12c0,4.5,1.8,8.8,5,12l53,53c-0.5,1.2-0.3,2.7,0.7,3.7\r\n		c1.3,1.3,3.5,1.3,4.8,0l5.7-5.7l35,35l3.5,9.7c0.2,0.5,0.4,0.9,0.8,1.2l19.7,19.7c0.7,0.7,1.5,1,2.4,1c0.9,0,1.7-0.3,2.4-1\r\n		l12.8-12.8c0.6-0.6,1-1.5,1-2.4s-0.4-1.8-1-2.4L126.9,110.9z M73.7,69.2C73.7,69.2,73.7,69.2,73.7,69.2L63.4,79.5L10.6,26.7\r\n		c-1.9-1.9-3-4.5-3-7.3c0-2.7,1.1-5.3,3-7.3c1.9-1.9,4.5-3,7.2-3c0,0,0,0,0,0c2.7,0,5.3,1.1,7.2,3L77.9,65L73.7,69.2\r\n		C73.7,69.2,73.7,69.2,73.7,69.2z M131.3,140.9l-16.7-16.7l-3.5-9.7c-0.2-0.5-0.4-0.9-0.8-1.2L74.7,77.7l1.4-1.4l35.6,35.6\r\n		c0.4,0.3,0.8,0.6,1.2,0.8l9.7,3.5l16.7,16.7L131.3,140.9z\"/>\r\n	<path d=\"M20.2,17c-1.3-1.3-3.5-1.3-4.8,0c-1.3,1.3-1.3,3.5,0,4.8l46.6,46.6c0.7,0.7,1.5,1,2.4,1c0.9,0,1.7-0.3,2.4-1\r\n		c1.3-1.3,1.3-3.5,0-4.8L20.2,17z\"/>\r\n</g>\r\n</svg>', 'Outils 1'),
(4, '<svg id=\"icon_label\" class=\"svg-color-c\" version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 315 315\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" enable-background=\"new 0 0 315 315\">\r\n  <g>\r\n    <path d=\"m315,100.426c0-37.044-35.359-65.777-65.777-65.777-27.818,0-136.408,19.515-141.017,20.346-3.334,0.601-5.759,3.502-5.759,6.889v77.086c0,3.387 2.425,6.288 5.759,6.889 3.364,0.606 62.13,11.168 104.445,16.828v90.127c0,15.185 12.354,27.539 27.538,27.539 15.184,0 27.538-12.354 27.538-27.539v-89.906c24.632-8.539 47.273-32.842 47.273-62.482zm-57.88,3.394c-6.159,0-9.96-2.246-10.814-3.395 0.854-1.148 4.655-3.394 10.814-3.394 6.159,0 9.959,2.246 10.814,3.394-0.855,1.149-4.655,3.395-10.814,3.395zm-24.921-3.394c0,7.883 6.773,14.22 16.687,16.49-1.928,12.539-6.094,24.352-12.21,34.525-24.275-2.297-67.514-9.303-96.476-14.225v-73.581c28.816-4.898 71.77-11.858 96.112-14.189 6.216,10.146 10.474,21.94 12.48,34.512-9.862,2.288-16.593,8.61-16.593,16.468zm-115.752-32.678c2.546-0.449 5.853-1.03 9.753-1.708v68.771c-3.9-0.678-7.207-1.259-9.753-1.708v-65.355zm137.28,185.065c0,7.466-6.073,13.539-13.538,13.539-7.465,0-13.538-6.073-13.538-13.539v-88.373c9.507,1.094 17.424,1.764 22.571,1.764 1.49,0 2.995-0.089 4.505-0.225v86.834zm-1.423-100.754c5.323-10.583 8.95-22.362 10.666-34.686 11.196-1.744 19.07-8.447 19.07-16.947 0-8.523-7.917-15.24-19.162-16.961-1.787-12.356-5.484-24.135-10.896-34.7 22.856,1.702 49.018,24.095 49.018,51.661 0,27.436-25.917,49.746-48.696,51.633z\"/>\r\n    <path d=\"m75.538,78.785c-1.179,0-1.542-0.236-3.533-2.299-2.528-2.617-6.348-6.572-13.603-6.572-7.255,0-11.074,3.955-13.603,6.572-1.992,2.063-2.354,2.299-3.533,2.299-1.178,0-1.541-0.236-3.532-2.299-2.527-2.617-6.348-6.572-13.602-6.572-7.255,0-11.074,3.955-13.601,6.573-1.991,2.062-2.354,2.298-3.531,2.298-3.866,0-7,3.134-7,7 0,3.866 3.134,7 7,7 7.255,0 11.074-3.955 13.602-6.573 1.991-2.062 2.354-2.298 3.531-2.298 1.177,0 1.54,0.236 3.531,2.298 2.527,2.617 6.348,6.573 13.603,6.573s11.075-3.955 13.603-6.573c1.991-2.062 2.355-2.298 3.532-2.298 1.178,0 1.541,0.236 3.532,2.298 2.528,2.618 6.349,6.573 13.604,6.573 3.866,0 7-3.134 7-7 0-3.866-3.134-7-7-7z\"/>\r\n    <path d=\"m75.538,116.939c-1.178,0-1.541-0.236-3.533-2.299-2.527-2.618-6.348-6.574-13.603-6.574-7.255,0-11.075,3.956-13.603,6.574-1.992,2.063-2.355,2.299-3.533,2.299-1.177,0-1.54-0.236-3.531-2.299-2.528-2.618-6.348-6.574-13.603-6.574s-11.075,3.956-13.602,6.574c-1.991,2.063-2.354,2.299-3.53,2.299-3.866,0-7,3.134-7,7 0,3.866 3.134,7 7,7 7.255,0 11.075-3.956 13.603-6.574 1.991-2.063 2.354-2.299 3.53-2.299 1.177,0 1.539,0.236 3.53,2.299 2.528,2.618 6.348,6.574 13.604,6.574s11.076-3.956 13.604-6.574c1.991-2.063 2.354-2.299 3.531-2.299 1.177,0 1.54,0.236 3.531,2.299 2.528,2.618 6.349,6.574 13.604,6.574 3.866,0 7-3.134 7-7 0.001-3.866-3.133-7-6.999-7z\"/>\r\n  </g>\r\n</svg>\r\n', 'Sèche-cheveux 1'),
(5, '<svg id=\"icon_label\" class=\"svg-color-c\" enable-background=\"new 0 0 510.28 510.28\"  viewBox=\"0 0 510.28 510.28\" xmlns=\"http://www.w3.org/2000/svg\"><path id=\"XMLID_438_\" d=\"m378.309 457.613v-223.143h40.427v-106.616h-40.427v-15.973h-30v15.973h-40.427v18.479l-30.769-29.096c.546-2.103 1.047-4.224 1.451-6.381 4.609-24.565-.623-49.456-14.734-70.085s-35.411-34.529-59.977-39.139c-24.565-4.611-49.456.624-70.085 14.734-20.664 14.134-34.831 36.092-39.263 60.659l-40.628 60.773 147.434 91.992 40.577-60.701c8.763-6.407 16.208-14.165 22.156-22.924l43.838 41.455v46.848h40.427v223.144h-77.428v52.667h30v-22.667h125.522v22.667h30v-52.667h-78.094zm-185.783-268.664-96.504-60.213 17.181-25.7 96.66 59.979zm37.384-48.8-104.229-64.677c4.143-13.879 12.945-26.082 25.024-34.344 14.016-9.588 30.927-13.143 47.615-10.011 16.689 3.132 31.161 12.575 40.748 26.591 9.587 14.015 13.142 30.925 10.01 47.615-2.541 13.545-9.241 25.629-19.168 34.826zm107.971 17.705h50.854v46.616h-50.854z\"/></svg>', 'Sèche-cheveux 2'),
(6, '<svg id=\"icon_label\" class=\"svg-color-c\" enable-background=\"new 0 0 513.364 513.364\" viewBox=\"0 0 513.364 513.364\" xmlns=\"http://www.w3.org/2000/svg\"><path id=\"XMLID_494_\" d=\"m424.294 458.56c7.657-5.581 14.421-12.648 19.809-21.112 23.12-36.323 12.379-84.685-23.943-107.806-24.356-15.504-54.114-15.762-78.056-3.313l-35.521-55.718 105.895-166.358c9.994-15.701 13.275-34.354 9.24-52.524s-14.904-33.68-30.605-43.674l-12.656-8.055-154.479 242.683-20.869-32.785 35.721-22.953-16.217-25.238-35.613 22.884-16.115-25.316 34.427-22.432-16.377-25.136-34.161 22.258-15.495-24.343 33.261-21.203-16.126-25.297-33.021 21.05c-3.921-8.032-5.016-17.085-3.049-25.939 2.298-10.347 8.487-19.179 17.429-24.871l-16.109-25.307c-15.701 9.994-26.57 25.504-30.605 43.674s-.754 36.823 9.24 52.524l105.936 166.422-34.913 55.639c-35.521-18.58-80.098-7.154-102.011 27.27-11.2 17.596-14.878 38.5-10.355 58.862 4.521 20.362 16.703 37.744 34.299 48.944 12.688 8.076 27.094 12.241 41.778 12.241 5.681 0 11.403-.624 17.083-1.885 20.362-4.522 37.744-16.703 48.944-34.298.012-.019.022-.038.034-.057h.001l55.351-87.82 55.894 87.873.026-.016c5.943 9.371 13.968 17.621 23.931 23.963 12.967 8.254 27.468 12.193 41.807 12.193 6.317 0 12.602-.77 18.712-2.266 8.468 24.442 31.705 42.048 58.992 42.048v-30c-15.256-.002-28.076-10.593-31.514-24.806zm-278.683-16.1c-12.536 2.786-25.412.521-36.248-6.377-10.836-6.897-18.337-17.602-21.122-30.141s-.52-25.412 6.378-36.248c9.156-14.384 24.736-22.252 40.644-22.252 8.829 0 17.761 2.426 25.745 7.508 22.368 14.239 28.982 44.021 14.743 66.389-6.896 10.835-17.601 18.336-30.14 21.121zm110.719-148.969-47.694 75.672c-3.092-8.648-7.694-16.792-13.741-23.975l41.737-66.516 149.443-234.772c9.019 12.768 9.993 30.261 1.093 44.243l-116.156 182.48 47.535 74.562c-2.216 2.631-4.297 5.42-6.194 8.399-3.235 5.082-5.783 10.404-7.715 15.855zm96.075 142.592c-22.368-14.239-28.982-44.021-14.744-66.389 9.156-14.384 24.736-22.252 40.644-22.252 8.829 0 17.761 2.426 25.745 7.508 22.368 14.238 28.982 44.021 14.744 66.389-14.239 22.368-44.019 28.982-66.389 14.744z\"/></svg>', 'Ciseaux 1 '),
(8, '<svg version=\"1.1\" id=\"icon_label\" class=\"svg-color-c\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"\r\n	 viewBox=\"0 0 150 150.9\" style=\"enable-background:new 0 0 150 150.9;\" xml:space=\"preserve\">\r\n<g id=\"XMLID_93_\">\r\n	<path id=\"XMLID_95_\" d=\"M75.3,1.5C34.7,1.5,1.8,34.5,1.8,75c0,40.6,32.9,73.5,73.5,73.5c40.6,0,73.5-32.9,73.5-73.5\r\n		C148.8,34.5,115.9,1.5,75.3,1.5z M75.3,139.7c-35.7,0-64.7-29-64.7-64.7c0-35.7,29-64.7,64.7-64.7c35.7,0,64.7,29,64.7,64.7\r\n		C140,110.8,111,139.7,75.3,139.7z\"/>\r\n	<path id=\"XMLID_67_\" d=\"M80.3,42.4c3.6,0,6.6,1.1,9.1,3.5c2.5,2.4,4.4,5.8,5.5,10.2l0.2,0.8h10.5l-0.1-1.2\r\n		c-0.9-6.5-3.7-11.9-8.4-16.1c-4.7-4.2-10.3-6.3-16.7-6.3c-8.6,0-15.7,4-21.2,11.8c-3.5,5.1-5.9,11.2-7.2,18.2h-7l0,9.2h6.1\r\n		c0,0.8,0,1.6,0,2.5v2.5H45l0,9.2h6.9c1.2,7.4,3.5,13.7,6.9,18.7c5.2,7.5,12.5,11.2,21.6,11.2c6.5,0,12.2-2.2,16.9-6.5\r\n		c4.7-4.3,7.5-9.8,8.2-16.4l0.1-1.1H95.3l-0.2,0.8c-1.1,4.5-2.9,8.1-5.5,10.5c-2.5,2.4-5.6,3.6-9.2,3.6c-5.6,0-10.1-2.9-13.5-8.7\r\n		c-2-3.4-3.5-7.5-4.3-12.1h23.6l0-9.2H61.5l0-5.1h27.8l0-9.2h-27c1-4.7,2.4-8.8,4.4-12.1C70.3,45.3,74.7,42.4,80.3,42.4z\"/>\r\n</g>\r\n</svg>', 'Euros 1'),
(9, '<svg id=\"icon_label\" class=\"svg-color-c\" viewBox=\"0 0 512 512\" xmlns=\"http://www.w3.org/2000/svg\"><path d=\"m497 112.46875h-17.132812v-17.136719c0-8.28125-6.71875-15-15-15-8.285157 0-15 6.71875-15 15v17.136719h-66.398438v-17.136719c0-8.28125-6.71875-15-15-15-8.285156 0-15 6.71875-15 15v17.136719h-50.335938v-97.46875c0-8.285156-6.714843-15-15-15h-64.265624c-8.285157 0-15 6.714844-15 15v97.46875h-50.332032v-17.136719c0-8.28125-6.71875-15-15-15-8.285156 0-15 6.71875-15 15v17.136719h-66.402344v-17.136719c0-8.28125-6.714843-15-15-15-8.28125 0-15 6.71875-15 15v17.136719h-17.132812c-8.285156 0-15 6.714844-15 15v64.265625c0 8.285156 6.714844 15 15 15h90.1875l103.679688 103.679687v26.984376h-65.332032c-8.285156 0-15 6.71875-15 15v96.402343c0 8.285157 6.714844 15 15 15h65.332032v33.199219c0 8.285156 6.714843 15 15 15 8.285156 0 15-6.714844 15-15v-290.265625h34.265624v290.265625c0 8.285156 6.71875 15 15 15 8.285157 0 15-6.714844 15-15v-33.199219h65.335938c8.28125 0 15-6.714843 15-15v-96.402343c0-8.28125-6.71875-15-15-15h-65.335938v-26.984376l103.679688-103.679687h90.1875c8.285156 0 15-6.71875 15-15v-64.269531c0-8.28125-6.714844-14.996094-15-14.996094zm-258.132812-82.46875h34.265624v82.46875h-34.265624zm-80.335938 403.800781v-66.402343h50.335938v66.402343zm50.335938-165.8125-61.253907-61.253906h61.253907zm144.601562 99.410157v66.402343h-50.335938v-66.402343zm-50.335938-99.410157v-61.253906h61.253907zm178.867188-91.253906h-452v-34.269531h452zm0 0\"/></svg>', 'Electricité 1'),
(10, '<svg id=\"icon_label\" class=\"svg-color-c\" viewBox=\"0 0 512 512\" xmlns=\"http://www.w3.org/2000/svg\"><path d=\"m432.734375 0h-353.46875c-43.707031 0-79.265625 35.558594-79.265625 79.265625v353.46875c0 43.707031 35.558594 79.265625 79.265625 79.265625h353.46875c43.707031 0 79.265625-35.558594 79.265625-79.265625v-353.46875c0-43.707031-35.558594-79.265625-79.265625-79.265625zm49.265625 432.734375c0 27.164063-22.101562 49.265625-49.265625 49.265625h-353.46875c-27.164063 0-49.265625-22.101562-49.265625-49.265625v-353.46875c0-27.164063 22.101562-49.265625 49.265625-49.265625h353.46875c27.164063 0 49.265625 22.101562 49.265625 49.265625zm0 0\"/><path d=\"m432.734375 273.132812h-353.46875c-8.28125 0-15 6.71875-15 15v128.535157c0 8.28125 6.71875 15 15 15h353.46875c8.285156 0 15-6.71875 15-15v-128.535157c0-8.28125-6.714844-15-15-15zm-338.46875 128.535157v-98.535157h98.535156v98.535157zm323.46875 0h-194.933594v-98.535157h194.933594zm0 0\"/><path d=\"m432.734375 80.332031h-353.46875c-8.28125 0-15 6.71875-15 15v128.535157c0 8.28125 6.71875 15 15 15h353.46875c8.285156 0 15-6.71875 15-15v-128.535157c0-8.28125-6.714844-15-15-15zm-338.46875 30h194.933594v98.535157h-194.933594zm323.46875 98.535157h-98.535156v-98.535157h98.535156zm0 0\"/><path d=\"m159.601562 144.601562h-32.132812c-8.285156 0-15 6.714844-15 15 0 8.28125 6.714844 15 15 15h32.132812c8.28125 0 15-6.71875 15-15 0-8.285156-6.71875-15-15-15zm0 0\"/><path d=\"m352.398438 367.398438h32.132812c8.285156 0 15-6.714844 15-15 0-8.28125-6.714844-15-15-15h-32.132812c-8.28125 0-15 6.71875-15 15 0 8.285156 6.71875 15 15 15zm0 0\"/><path d=\"m352.398438 174.601562h1.070312v1.066407c0 8.28125 6.714844 15 15 15 8.28125 0 15-6.71875 15-15v-1.066407h1.0625c8.285156 0 15-6.71875 15-15 0-8.285156-6.714844-15-15-15h-1.0625v-1.066406c0-8.285156-6.71875-15-15-15-8.285156 0-15 6.714844-15 15v1.066406h-1.070312c-8.28125 0-15 6.714844-15 15 0 8.28125 6.71875 15 15 15zm0 0\"/><path d=\"m159.601562 337.398438h-1.070312v-1.066407c0-8.28125-6.714844-15-15-15-8.28125 0-15 6.71875-15 15v1.066407h-1.0625c-8.285156 0-15 6.71875-15 15 0 8.285156 6.714844 15 15 15h1.0625v1.066406c0 8.285156 6.71875 15 15 15 8.285156 0 15-6.714844 15-15v-1.066406h1.070312c8.28125 0 15-6.714844 15-15 0-8.28125-6.71875-15-15-15zm0 0\"/></svg>', 'Batterie 1'),
(11, '<svg id=\"icon-label\" class=\"svg-color-c\" viewBox=\"-8 0 512 512\"  xmlns=\"http://www.w3.org/2000/svg\"><path d=\"m79.265625 198.699219h7.863281l-5.210937 10.425781c-3.707031 7.410156-.703125 16.417969 6.707031 20.125 7.40625 3.703125 16.417969.703125 20.125-6.707031l16.066406-32.132813c2.324219-4.652344 2.078125-10.175781-.65625-14.597656s-7.5625-7.113281-12.761718-7.113281h-7.863282l5.214844-10.425781c3.703125-7.410157.699219-16.417969-6.710938-20.125-7.40625-3.703126-16.417968-.699219-20.121093 6.710937l-16.066407 32.132813c-2.324218 4.648437-2.078124 10.171874.65625 14.59375 2.730469 4.421874 7.5625 7.113281 12.757813 7.113281zm0 0\"/><path d=\"m384.53125 0c-61.515625 0-111.398438 49.769531-111.398438 111.398438v289.203124c0 44.882813-36.515624 81.398438-81.398437 81.398438s-81.398437-36.515625-81.398437-81.398438v-33.203124h17.132812c8.28125 0 15-6.714844 15-15v-49.265626h1.0625c25.917969 0 47.136719-20.953124 47.136719-47.132812v-176.734375c0-8.28125-6.71875-15-15-15h-17.136719v-49.265625c0-8.285156-6.714844-15-15-15h-96.398438c-8.28125 0-15 6.714844-15 15v49.265625h-17.132812c-8.285156 0-15 6.71875-15 15v176.734375c0 26.304688 21.351562 47.132812 47.132812 47.132812h1.066407v49.265626c0 8.285156 6.714843 15 15 15h17.132812v33.203124c0 61.425782 49.976563 111.398438 111.402344 111.398438s111.398437-49.972656 111.398437-111.398438v-289.203124c0-44.945313 36.363282-81.398438 81.398438-81.398438 44.886719 0 81.402344 36.515625 81.402344 81.398438v385.601562c0 8.285156 6.714844 15 15 15 8.28125 0 15-6.714844 15-15v-385.601562c0-61.425782-49.972656-111.398438-111.402344-111.398438zm-322.398438 30h66.398438v34.265625h-66.398438zm-32.132812 226v-161.734375h130.667969v161.734375c0 9.335938-7.546875 17.132812-17.136719 17.132812h-96.398438c-9.335937 0-17.132812-7.546874-17.132812-17.132812zm48.199219 47.132812h34.269531v34.265626h-34.269531zm0 0\"/></svg>', 'Electricité 2');

-- --------------------------------------------------------

--
-- Structure de la table `labels`
--

DROP TABLE IF EXISTS `labels`;
CREATE TABLE IF NOT EXISTS `labels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `svg_nom_id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_B5D10211B2E6104` (`svg_nom_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `localisation`
--

DROP TABLE IF EXISTS `localisation`;
CREATE TABLE IF NOT EXISTS `localisation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `secteur` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `localisation`
--

INSERT INTO `localisation` (`id`, `secteur`) VALUES
(1, 'paris'),
(2, 'Mantes-la-Jolie'),
(3, 'Epône');

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
-- Structure de la table `mobile`
--

DROP TABLE IF EXISTS `mobile`;
CREATE TABLE IF NOT EXISTS `mobile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contenu` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_affichage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `partenaires`
--

INSERT INTO `partenaires` (`id`, `nom_partenaire`, `site_partenaire`, `logo`) VALUES
(1, 'Github', 'http://github.com', 'logo_1570783676_37955_logo.jpg'),
(2, 'instagram', 'http://instagram.com', 'logo_1571039004_52345_logo.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `picture`
--

DROP TABLE IF EXISTS `picture`;
CREATE TABLE IF NOT EXISTS `picture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `galerie_id` int(11) NOT NULL,
  `filename` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_16DB4F89825396CB` (`galerie_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `picture`
--

INSERT INTO `picture` (`id`, `galerie_id`, `filename`) VALUES
(8, 4, '5d9da3e816c1f354736347.jpg'),
(9, 4, '5d9da481ddb62145531538.jpg'),
(10, 5, '5d9da9c60edec942191939.jpg'),
(11, 6, '5d9da9df09f16835752356.jpg'),
(12, 4, '5d9db1b442c78156925075.jpg'),
(13, 5, '5d9f22f0d7e69467715507.jpg'),
(14, 5, '5d9f234db96de708094007.jpg'),
(15, 7, '5da048cd4ad80738022178.jpg');

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
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `reseaux`
--

INSERT INTO `reseaux` (`id`, `instagram`, `facebook`, `google`, `twitter`) VALUES
(1, 'http://www.instagram.com', 'kjfa\'ejf', 'jrenbgejrgb', NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `tarifs`
--

INSERT INTO `tarifs` (`id`, `prestation`, `description`, `tarif`) VALUES
(1, 'changement d\'ampoule', '', '0.00'),
(3, 'lumières de jardin', 'ça illumine, c\'est beau !', '200.00'),
(4, 'pose compteur électrique', '', '0.00'),
(5, 'Pose de lustre', 'Installation de votre lustre', '90.00');

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
-- Contraintes pour la table `labels`
--
ALTER TABLE `labels`
  ADD CONSTRAINT `FK_B5D10211B2E6104` FOREIGN KEY (`svg_nom_id`) REFERENCES `icons` (`id`);

--
-- Contraintes pour la table `picture`
--
ALTER TABLE `picture`
  ADD CONSTRAINT `FK_16DB4F89825396CB` FOREIGN KEY (`galerie_id`) REFERENCES `galerie` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
