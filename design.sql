-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  mar. 15 oct. 2019 à 09:52
-- Version du serveur :  5.7.26
-- Version de PHP :  7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `stage-test-symfony-1`
--

-- --------------------------------------------------------

--
-- Structure de la table `design`
--

CREATE TABLE `design` (
  `id` int(11) NOT NULL,
  `code` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categorie` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_affichage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `design`
--

INSERT INTO `design` (`id`, `code`, `nom`, `categorie`, `date_affichage`) VALUES
(2, '<svg version=\"1.1\" id=\"soustitre-icon\" class=\"svg-color-w\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\"\r\n                x=\"0px\" y=\"0px\" viewbox=\"0 0 150 43.25\" enable-background=\"new 0 0 150 43.25\" xml:space=\"preserve\">\r\n                <g id=\"XMLID_67_\">\r\n                    <path d=\"M78.736,28.291c-0.41,0-0.795-0.215-1.007-0.575c-0.238-0.402-0.214-0.907,0.061-1.285l6.501-8.939\r\n                                                   l-75.403,5.8c-0.646,0.053-1.208-0.433-1.258-1.078c-0.05-0.645,0.433-1.208,1.078-1.258l77.932-5.995\r\n                                                   c0.451-0.035,0.889,0.198,1.112,0.597c0.223,0.399,0.194,0.891-0.075,1.26l-6.399,8.798l60.256-7.652\r\n                                                   c0.642-0.084,1.227,0.373,1.309,1.014c0.081,0.642-0.373,1.228-1.014,1.309l-62.945,7.993\r\n                                                   C78.835,28.288,78.785,28.291,78.736,28.291z\" />\r\n                </g>\r\n            </svg>', 'soustitre-icon-w', 'eclair', NULL),
(3, '<svg version=\"1.1\" id=\"soustitre-icon\" class=\"svg-color-c\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\"\r\n                x=\"0px\" y=\"0px\" viewbox=\"0 0 150 43.25\" enable-background=\"new 0 0 150 43.25\" xml:space=\"preserve\">\r\n                <g id=\"XMLID_67_\">\r\n                    <path d=\"M78.736,28.291c-0.41,0-0.795-0.215-1.007-0.575c-0.238-0.402-0.214-0.907,0.061-1.285l6.501-8.939\r\n                                                   l-75.403,5.8c-0.646,0.053-1.208-0.433-1.258-1.078c-0.05-0.645,0.433-1.208,1.078-1.258l77.932-5.995\r\n                                                   c0.451-0.035,0.889,0.198,1.112,0.597c0.223,0.399,0.194,0.891-0.075,1.26l-6.399,8.798l60.256-7.652\r\n                                                   c0.642-0.084,1.227,0.373,1.309,1.014c0.081,0.642-0.373,1.228-1.014,1.309l-62.945,7.993\r\n                                                   C78.835,28.288,78.785,28.291,78.736,28.291z\" />\r\n                </g>\r\n            </svg>', 'soustitre-icon-c', 'eclair', NULL),
(4, '<svg version=\"1.1\" id=\"bottom-trs\" class=\"svg-color-w\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\" viewbox=\"0 0 1920 132.013\" enable-background=\"new 0 0 1920 132.013\" xml:space=\"preserve\">\r\n        <polygon id=\"XMLID_250_\" points=\"1920,82.188 951,82.188 988.341,40.188 0,40.188 0,104.188 1920,104.188 \"/>\r\n    </svg>', 'bottom-trs-w', 'eclair', NULL),
(5, '<svg version=\"1.1\" id=\"bottom-trs\" class=\"svg-color-c\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\" viewbox=\"0 0 1920 132.013\" enable-background=\"new 0 0 1920 132.013\" xml:space=\"preserve\">\r\n        <polygon id=\"XMLID_250_\" points=\"1920,82.188 951,82.188 988.341,40.188 0,40.188 0,104.188 1920,104.188 \"/>\r\n    </svg>', 'bottom-trs-c', 'eclair', NULL),
(6, '<svg version=\"1.1\" id=\"top-trs\" class=\"svg-color-w\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\" viewbox=\"0 0 1920 132.013\" enable-background=\"new 0 0 1920 132.013\" xml:space=\"preserve\">\r\n        <polygon id=\"XMLID_250_\" points=\"1920,82.188 951,82.188 988.341,40.188 0,40.188 0,104.188 1920,104.188 \"/>\r\n    </svg>', 'top-trs-w', 'eclair', NULL),
(7, '<svg version=\"1.1\" id=\"top-trs\" class=\"svg-color-c\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\" viewbox=\"0 0 1920 132.013\" enable-background=\"new 0 0 1920 132.013\" xml:space=\"preserve\">\r\n        <polygon id=\"XMLID_250_\" points=\"1920,82.188 951,82.188 988.341,40.188 0,40.188 0,104.188 1920,104.188 \"/>\r\n    </svg>', 'top-trs-c', 'eclair', NULL),
(8, '<svg version=\"1.1\" id=\"soustitre-icon\" class=\"svg-color-w\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"\r\n	 viewBox=\"0 0 2002.4 195\" style=\"enable-background:new 0 0 2002.4 195;\" xml:space=\"preserve\">\r\n</svg>', 'soustitre-icon-w', 'fleur', NULL),
(9, '<svg version=\"1.1\" id=\"soustitre-icon\" class=\"svg-color-c\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"\r\n	 viewBox=\"0 0 2002.4 195\" style=\"enable-background:new 0 0 2002.4 195;\" xml:space=\"preserve\">\r\n</svg>', 'soustitre-icon-c', 'fleur', NULL),
(10, '<svg version=\"1.1\" id=\"top-trs\" class=\"svg-color-w\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"\r\n	 viewBox=\"0 0 2002.4 150\" style=\"enable-background:new 0 0 2002.4 150;\" xml:space=\"preserve\">\r\n</svg>\r\n', 'top-trs-w', 'fleur', NULL),
(11, '<svg version=\"1.1\" id=\"top-trs\" class=\"svg-color-w\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"\r\n	 viewBox=\"0 0 2002.4 150\" style=\"enable-background:new 0 0 2002.4 150;\" xml:space=\"preserve\">\r\n</svg>\r\n', 'top-trs-c', 'fleur', NULL),
(12, '<svg version=\"1.1\" id=\"bottom-trs\" class=\"svg-color-w\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"\r\n	 viewBox=\"0 0 2002.4 150\" style=\"enable-background:new 0 0 2002.4 150;\" xml:space=\"preserve\">\r\n</svg>\r\n', 'bottom-trs-w', 'fleur', NULL),
(13, '<svg version=\"1.1\" id=\"bottom-trs\" class=\"svg-color-c\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"\r\n	 viewBox=\"0 0 2002.4 150\" style=\"enable-background:new 0 0 2002.4 150;\" xml:space=\"preserve\">\r\n</svg>\r\n', 'bottom-trs-c', 'fleur', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `design`
--
ALTER TABLE `design`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `design`
--
ALTER TABLE `design`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
