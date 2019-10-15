-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  mar. 15 oct. 2019 à 13:42
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
  `categorie` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_affichage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bottom_trs_w` longtext COLLATE utf8mb4_unicode_ci,
  `bottom_trs_c` longtext COLLATE utf8mb4_unicode_ci,
  `top_trs_w` longtext COLLATE utf8mb4_unicode_ci,
  `top_trs_c` longtext COLLATE utf8mb4_unicode_ci,
  `soustitre_icon_w` longtext COLLATE utf8mb4_unicode_ci,
  `soustitre_icon_c` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `design`
--

INSERT INTO `design` (`id`, `categorie`, `date_affichage`, `bottom_trs_w`, `bottom_trs_c`, `top_trs_w`, `top_trs_c`, `soustitre_icon_w`, `soustitre_icon_c`) VALUES
(1, 'Artisan', NULL, '<svg version=\"1.1\" id=\"bottom-trs-artisan\" class=\"svg-color-w\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"\r\n	 viewBox=\"0 0 1920 841.89\" enable-background=\"new 0 0 1920 841.89\" xml:space=\"preserve\">\r\n<polygon stroke=\"#FFFFFF\" stroke-miterlimit=\"10\" points=\"1920.031,486.539 0.031,486.539 0.031,442.482 1320.345,355.839 \r\n	1920.031,442.482 \"/>\r\n</svg>', '<svg version=\"1.1\" id=\"bottom-trs-artisan\" class=\"svg-color-c\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"\r\n	 viewBox=\"0 0 1920 841.89\" enable-background=\"new 0 0 1920 841.89\" xml:space=\"preserve\">\r\n<polygon stroke=\"#FFFFFF\" stroke-miterlimit=\"10\" points=\"1920.031,486.539 0.031,486.539 0.031,442.482 1320.345,355.839 \r\n	1920.031,442.482 \"/>\r\n</svg>', '<svg version=\"1.1\" id=\"top-trs-artisan\" class=\"svg-color-w\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"\r\n	 viewBox=\"0 0 1920 841.89\" enable-background=\"new 0 0 1920 841.89\" xml:space=\"preserve\">\r\n<polygon stroke=\"#FFFFFF\" stroke-miterlimit=\"10\" points=\"1920.031,486.539 0.031,486.539 0.031,442.482 1320.345,355.839 \r\n	1920.031,442.482 \"/>\r\n</svg>', '<svg version=\"1.1\" id=\"top-trs-artisan\" class=\"svg-color-c\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"\r\n	 viewBox=\"0 0 1920 841.89\" enable-background=\"new 0 0 1920 841.89\" xml:space=\"preserve\">\r\n<polygon stroke=\"#FFFFFF\" stroke-miterlimit=\"10\" points=\"1920.031,486.539 0.031,486.539 0.031,442.482 1320.345,355.839 \r\n	1920.031,442.482 \"/>\r\n</svg>', NULL, NULL),
(2, 'Avocat', NULL, '<svg version=\"1.1\" id=\"bottom-trs-avocat\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"\r\n	 viewBox=\"0 0 1920 437.286\" enable-background=\"new 0 0 1920 437.286\" xml:space=\"preserve\">\r\n<polygon class=\"svg-color-w1\" points=\"1.021,120.88 1921.021,120.88 1921.021,281.484 1.021,172.795 \"/>\r\n<polygon class=\"svg-color-w2\" points=\"0.835,172.795 0.835,317.281 946.346,226.309 \"/>\r\n</svg>', '<svg version=\"1.1\" id=\"bottom-trs-avocat\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"\r\n	 viewBox=\"0 0 1920 437.286\" enable-background=\"new 0 0 1920 437.286\" xml:space=\"preserve\">\r\n<polygon class=\"svg-color-c1\" points=\"1.021,120.88 1921.021,120.88 1921.021,281.484 1.021,172.795 \"/>\r\n<polygon class=\"svg-color-c2\" points=\"0.835,172.795 0.835,317.281 946.346,226.309 \"/>\r\n</svg>', '<svg version=\"1.1\" id=\"top-trs-avocat\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"\r\n	 viewBox=\"0 0 1920 437.286\" enable-background=\"new 0 0 1920 437.286\" xml:space=\"preserve\">\r\n<polygon class=\"svg-color-w1\" points=\"1.021,120.88 1921.021,120.88 1921.021,281.484 1.021,172.795 \"/>\r\n<polygon class=\"svg-color-w2\" points=\"0.835,172.795 0.835,317.281 946.346,226.309 \"/>\r\n</svg>', '<svg version=\"1.1\" id=\"top-trs-avocat\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"\r\n	 viewBox=\"0 0 1920 437.286\" enable-background=\"new 0 0 1920 437.286\" xml:space=\"preserve\">\r\n<polygon class=\"svg-color-c1\" points=\"1.021,120.88 1921.021,120.88 1921.021,281.484 1.021,172.795 \"/>\r\n<polygon class=\"svg-color-c2\" points=\"0.835,172.795 0.835,317.281 946.346,226.309 \"/>\r\n</svg>', NULL, NULL),
(3, 'Boulanger', NULL, '<svg version=\"1.1\" id=\"bottom-trs-boulanger\" class=\"svg-color-w\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"\r\n	 viewBox=\"0 0 841.89 79\" enable-background=\"new 0 0 841.89 79\" xml:space=\"preserve\">\r\n<path d=\"M0,22.911C24.748,37.82,203.045,34.724,420.127,34.724C636.169,34.724,815,37.388,842,22.479V50H0V22.911z\"/>\r\n</svg>\r\n', '<svg version=\"1.1\" id=\"bottom-trs-boulanger\" class=\"svg-color-c\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"\r\n	 viewBox=\"0 0 841.89 79\" enable-background=\"new 0 0 841.89 79\" xml:space=\"preserve\">\r\n<path d=\"M0,22.911C24.748,37.82,203.045,34.724,420.127,34.724C636.169,34.724,815,37.388,842,22.479V50H0V22.911z\"/>\r\n</svg>\r\n', '<svg version=\"1.1\" id=\"top-trs-boulanger\" class=\"svg-color-w\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"\r\n	 viewBox=\"0 0 841.89 79\" enable-background=\"new 0 0 841.89 79\" xml:space=\"preserve\">\r\n<path d=\"M842,38.489c-25-15.331-203.605-12.052-420.458-12.052C205.727,26.438,27,23.5,0,38.393V51h842V38.489z\"/>\r\n</svg>', '<svg version=\"1.1\" id=\"top-trs-boulanger\" class=\"svg-color-c\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"\r\n	 viewBox=\"0 0 841.89 79\" enable-background=\"new 0 0 841.89 79\" xml:space=\"preserve\">\r\n<path d=\"M842,38.489c-25-15.331-203.605-12.052-420.458-12.052C205.727,26.438,27,23.5,0,38.393V51h842V38.489z\"/>\r\n</svg>', NULL, NULL),
(4, 'Coiffeur', NULL, '<svg version=\"1.1\" id=\"bottom-trs-coiffeur\" class=\"svg-color-w\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"\r\n	 viewBox=\"0 0 2033.3 150\" style=\"enable-background:new 0 0 2033.3 150;\" xml:space=\"preserve\">\r\n<style type=\"text/css\">\r\n	.st0{fill:#FFFFFF;}\r\n</style>\r\n<path id=\"XMLID_245_\" class=\"st0\" d=\"M2685.8,1049.2c-56.8,0.5-104.8,5.4-144.6,14.1c-24.1,5.3-46.3,10.9-70.4,16.2\r\n	c-61.8,13.5-135.7,13.5-197.6-0.1c-23.6-5.2-45-10.8-69-15.9c-92.5-19.5-215.9-19.3-307.6,0.4c-23.3,5-44.4,10.5-67.5,15.6\r\n	c-61.8,13.5-135.8,13.4-197.6-0.1c-22.6-5-43.2-10.4-66.1-15.3c-94.6-20.2-218.3-20.1-312,0.2c-22.3,4.8-42.5,10.1-64.7,15\r\n	c-62.6,13.7-136.7,13.8-199.1,0c-24.5-5.4-47.1-11.2-71.9-16.5c-37.8-8.1-82.7-13.2-136.2-14.3c-32.6-0.7-52.5,2-55.7,8.1\r\n	c-0.1,0.1-0.2,0.2-0.2,0.3l-0.1,0v0.1c0,0.7-0.2,1.3,0.1,1.9l-0.1,74.1h1993v-66.6c7-1.1,12.4-2.8,15.2-5.1\r\n	C2742.6,1054.2,2722,1048.9,2685.8,1049.2z\"/>\r\n<path id=\"XMLID_54_\" d=\"M1979.8,31.2c-56.8,0.5-104.8,5.4-144.6,14.1c-24.1,5.3-46.3,10.9-70.4,16.2C1703,75,1629,75,1567.2,61.4\r\n	c-23.6-5.2-45-10.8-69-15.9c-92.5-19.5-215.9-19.3-307.6,0.4c-23.3,5-44.4,10.5-67.5,15.6c-61.8,13.5-135.8,13.4-197.6-0.1\r\n	c-22.6-5-43.2-10.4-66.1-15.3c-94.6-20.2-218.3-20.1-312,0.2c-22.3,4.8-42.5,10.1-64.7,15C420.1,75,346,75,283.6,61.3\r\n	c-24.5-5.4-47.1-11.2-71.9-16.5C174,36.7,129.1,31.7,75.6,30.5c-32.6-0.7-52.5,2-55.7,8.1c-0.1,0.1-0.2,0.2-0.2,0.3l-0.1,0V39\r\n	c0,0.7-0.2,1.3,0.1,1.9L19.6,115h1993V48.4c0.1,0-0.3-15.6-0.1-15.5C2004.1,31.7,1992.9,31.1,1979.8,31.2z\"/>\r\n</svg>\r\n', '<svg version=\"1.1\" id=\"bottom-trs-coiffeur\" class=\"svg-color-c\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"\r\n	 viewBox=\"0 0 2033.3 150\" style=\"enable-background:new 0 0 2033.3 150;\" xml:space=\"preserve\">\r\n<style type=\"text/css\">\r\n	.st0{fill:#FFFFFF;}\r\n</style>\r\n<path id=\"XMLID_245_\" class=\"st0\" d=\"M2685.8,1049.2c-56.8,0.5-104.8,5.4-144.6,14.1c-24.1,5.3-46.3,10.9-70.4,16.2\r\n	c-61.8,13.5-135.7,13.5-197.6-0.1c-23.6-5.2-45-10.8-69-15.9c-92.5-19.5-215.9-19.3-307.6,0.4c-23.3,5-44.4,10.5-67.5,15.6\r\n	c-61.8,13.5-135.8,13.4-197.6-0.1c-22.6-5-43.2-10.4-66.1-15.3c-94.6-20.2-218.3-20.1-312,0.2c-22.3,4.8-42.5,10.1-64.7,15\r\n	c-62.6,13.7-136.7,13.8-199.1,0c-24.5-5.4-47.1-11.2-71.9-16.5c-37.8-8.1-82.7-13.2-136.2-14.3c-32.6-0.7-52.5,2-55.7,8.1\r\n	c-0.1,0.1-0.2,0.2-0.2,0.3l-0.1,0v0.1c0,0.7-0.2,1.3,0.1,1.9l-0.1,74.1h1993v-66.6c7-1.1,12.4-2.8,15.2-5.1\r\n	C2742.6,1054.2,2722,1048.9,2685.8,1049.2z\"/>\r\n<path id=\"XMLID_54_\" d=\"M1979.8,31.2c-56.8,0.5-104.8,5.4-144.6,14.1c-24.1,5.3-46.3,10.9-70.4,16.2C1703,75,1629,75,1567.2,61.4\r\n	c-23.6-5.2-45-10.8-69-15.9c-92.5-19.5-215.9-19.3-307.6,0.4c-23.3,5-44.4,10.5-67.5,15.6c-61.8,13.5-135.8,13.4-197.6-0.1\r\n	c-22.6-5-43.2-10.4-66.1-15.3c-94.6-20.2-218.3-20.1-312,0.2c-22.3,4.8-42.5,10.1-64.7,15C420.1,75,346,75,283.6,61.3\r\n	c-24.5-5.4-47.1-11.2-71.9-16.5C174,36.7,129.1,31.7,75.6,30.5c-32.6-0.7-52.5,2-55.7,8.1c-0.1,0.1-0.2,0.2-0.2,0.3l-0.1,0V39\r\n	c0,0.7-0.2,1.3,0.1,1.9L19.6,115h1993V48.4c0.1,0-0.3-15.6-0.1-15.5C2004.1,31.7,1992.9,31.1,1979.8,31.2z\"/>\r\n</svg>\r\n', '<svg version=\"1.1\" id=\"top-trs-coiffeur\" class=\"svg-color-w\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"\r\n	 viewBox=\"0 0 2033.3 150\" style=\"enable-background:new 0 0 2033.3 150;\" xml:space=\"preserve\">\r\n<style type=\"text/css\">\r\n	.st0{fill:#FFFFFF;}\r\n</style>\r\n<path id=\"XMLID_245_\" class=\"st0\" d=\"M2685.8,1049.2c-56.8,0.5-104.8,5.4-144.6,14.1c-24.1,5.3-46.3,10.9-70.4,16.2\r\n	c-61.8,13.5-135.7,13.5-197.6-0.1c-23.6-5.2-45-10.8-69-15.9c-92.5-19.5-215.9-19.3-307.6,0.4c-23.3,5-44.4,10.5-67.5,15.6\r\n	c-61.8,13.5-135.8,13.4-197.6-0.1c-22.6-5-43.2-10.4-66.1-15.3c-94.6-20.2-218.3-20.1-312,0.2c-22.3,4.8-42.5,10.1-64.7,15\r\n	c-62.6,13.7-136.7,13.8-199.1,0c-24.5-5.4-47.1-11.2-71.9-16.5c-37.8-8.1-82.7-13.2-136.2-14.3c-32.6-0.7-52.5,2-55.7,8.1\r\n	c-0.1,0.1-0.2,0.2-0.2,0.3l-0.1,0v0.1c0,0.7-0.2,1.3,0.1,1.9l-0.1,74.1h1993v-66.6c7-1.1,12.4-2.8,15.2-5.1\r\n	C2742.6,1054.2,2722,1048.9,2685.8,1049.2z\"/>\r\n<path id=\"XMLID_54_\" d=\"M1979.8,31.2c-56.8,0.5-104.8,5.4-144.6,14.1c-24.1,5.3-46.3,10.9-70.4,16.2C1703,75,1629,75,1567.2,61.4\r\n	c-23.6-5.2-45-10.8-69-15.9c-92.5-19.5-215.9-19.3-307.6,0.4c-23.3,5-44.4,10.5-67.5,15.6c-61.8,13.5-135.8,13.4-197.6-0.1\r\n	c-22.6-5-43.2-10.4-66.1-15.3c-94.6-20.2-218.3-20.1-312,0.2c-22.3,4.8-42.5,10.1-64.7,15C420.1,75,346,75,283.6,61.3\r\n	c-24.5-5.4-47.1-11.2-71.9-16.5C174,36.7,129.1,31.7,75.6,30.5c-32.6-0.7-52.5,2-55.7,8.1c-0.1,0.1-0.2,0.2-0.2,0.3l-0.1,0V39\r\n	c0,0.7-0.2,1.3,0.1,1.9L19.6,115h1993V48.4c0.1,0-0.3-15.6-0.1-15.5C2004.1,31.7,1992.9,31.1,1979.8,31.2z\"/>\r\n</svg>\r\n', '<svg version=\"1.1\" id=\"top-trs-coiffeur\" class=\"svg-color-c\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"\r\n	 viewBox=\"0 0 2033.3 150\" style=\"enable-background:new 0 0 2033.3 150;\" xml:space=\"preserve\">\r\n<style type=\"text/css\">\r\n	.st0{fill:#FFFFFF;}\r\n</style>\r\n<path id=\"XMLID_245_\" class=\"st0\" d=\"M2685.8,1049.2c-56.8,0.5-104.8,5.4-144.6,14.1c-24.1,5.3-46.3,10.9-70.4,16.2\r\n	c-61.8,13.5-135.7,13.5-197.6-0.1c-23.6-5.2-45-10.8-69-15.9c-92.5-19.5-215.9-19.3-307.6,0.4c-23.3,5-44.4,10.5-67.5,15.6\r\n	c-61.8,13.5-135.8,13.4-197.6-0.1c-22.6-5-43.2-10.4-66.1-15.3c-94.6-20.2-218.3-20.1-312,0.2c-22.3,4.8-42.5,10.1-64.7,15\r\n	c-62.6,13.7-136.7,13.8-199.1,0c-24.5-5.4-47.1-11.2-71.9-16.5c-37.8-8.1-82.7-13.2-136.2-14.3c-32.6-0.7-52.5,2-55.7,8.1\r\n	c-0.1,0.1-0.2,0.2-0.2,0.3l-0.1,0v0.1c0,0.7-0.2,1.3,0.1,1.9l-0.1,74.1h1993v-66.6c7-1.1,12.4-2.8,15.2-5.1\r\n	C2742.6,1054.2,2722,1048.9,2685.8,1049.2z\"/>\r\n<path id=\"XMLID_54_\" d=\"M1979.8,31.2c-56.8,0.5-104.8,5.4-144.6,14.1c-24.1,5.3-46.3,10.9-70.4,16.2C1703,75,1629,75,1567.2,61.4\r\n	c-23.6-5.2-45-10.8-69-15.9c-92.5-19.5-215.9-19.3-307.6,0.4c-23.3,5-44.4,10.5-67.5,15.6c-61.8,13.5-135.8,13.4-197.6-0.1\r\n	c-22.6-5-43.2-10.4-66.1-15.3c-94.6-20.2-218.3-20.1-312,0.2c-22.3,4.8-42.5,10.1-64.7,15C420.1,75,346,75,283.6,61.3\r\n	c-24.5-5.4-47.1-11.2-71.9-16.5C174,36.7,129.1,31.7,75.6,30.5c-32.6-0.7-52.5,2-55.7,8.1c-0.1,0.1-0.2,0.2-0.2,0.3l-0.1,0V39\r\n	c0,0.7-0.2,1.3,0.1,1.9L19.6,115h1993V48.4c0.1,0-0.3-15.6-0.1-15.5C2004.1,31.7,1992.9,31.1,1979.8,31.2z\"/>\r\n</svg>\r\n', '<svg version=\"1.1\" id=\"soustitre-icon-coiffeur\" class=\"svg-color-w\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"\r\n	 viewBox=\"0 0 398.1 150\" style=\"enable-background:new 0 0 398.1 150;\" xml:space=\"preserve\">\r\n<style type=\"text/css\">\r\n	.st0{fill:#FFFFFF;}\r\n</style>\r\n<path id=\"XMLID_245_\" class=\"st0\" d=\"M1943.2,1049.2c-56.8,0.5-104.8,5.4-144.6,14.1c-24.1,5.3-46.3,10.9-70.4,16.2\r\n	c-61.8,13.5-135.7,13.5-197.6-0.1c-23.6-5.2-45-10.8-69-15.9c-92.5-19.5-215.9-19.3-307.6,0.4c-23.3,5-44.4,10.5-67.5,15.6\r\n	c-61.8,13.5-135.8,13.4-197.6-0.1c-22.6-5-43.2-10.4-66.1-15.3c-94.6-20.2-218.3-20.1-312,0.2c-22.3,4.8-42.5,10.1-64.7,15\r\n	c-62.6,13.7-136.7,13.8-199.1,0c-24.5-5.4-47.1-11.2-71.9-16.5c-37.8-8.1-82.7-13.2-136.2-14.3c-32.6-0.7-52.5,2-55.7,8.1\r\n	c-0.1,0.1-0.2,0.2-0.2,0.3l-0.1,0v0.1c0,0.7-0.2,1.3,0.1,1.9L-17,1133h1993v-66.6c7-1.1,12.4-2.8,15.2-5.1\r\n	C2000.1,1054.2,1979.4,1048.9,1943.2,1049.2z\"/>\r\n<path id=\"XMLID_55_\" d=\"M167.4,96.7c-46.6,0-106.3-15.3-109.9-16.2l1.5-5.8c1.1,0.3,101.2,25.9,141.7,11.9c-6.5-6.3-8.1-14.3-8.4-19\r\n	c-0.6-8.8,3.2-14.1,5.6-16.5c2.9-3,6.7-4.6,10-4.4c6,0.4,15,6.2,15.2,20.6c0.2,7.7-2.7,14-8.7,18.8c-0.5,0.4-1,0.8-1.5,1.1\r\n	c11.6,4.5,34.1,4.5,77.5-14.4l2.4,5.5c-40.7,17.8-69.8,22-86.4,12.5C196.4,95,182.6,96.7,167.4,96.7z M207.3,52.7\r\n	c-1.2,0-3.2,0.7-5.1,2.6c-1.6,1.6-4.3,5.4-3.8,11.8c0.3,4.2,1.9,11.6,8.6,16.8c1.4-0.8,2.6-1.6,3.8-2.5c4.5-3.6,6.6-8.2,6.4-14\r\n	c-0.1-10.3-5.9-14.5-9.5-14.7C207.4,52.7,207.3,52.7,207.3,52.7z\"/>\r\n</svg>', '<svg version=\"1.1\" id=\"soustitre-icon-coiffeur\" class=\"svg-color-c\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"\r\n	 viewBox=\"0 0 398.1 150\" style=\"enable-background:new 0 0 398.1 150;\" xml:space=\"preserve\">\r\n<style type=\"text/css\">\r\n	.st0{fill:#FFFFFF;}\r\n</style>\r\n<path id=\"XMLID_245_\" class=\"st0\" d=\"M1943.2,1049.2c-56.8,0.5-104.8,5.4-144.6,14.1c-24.1,5.3-46.3,10.9-70.4,16.2\r\n	c-61.8,13.5-135.7,13.5-197.6-0.1c-23.6-5.2-45-10.8-69-15.9c-92.5-19.5-215.9-19.3-307.6,0.4c-23.3,5-44.4,10.5-67.5,15.6\r\n	c-61.8,13.5-135.8,13.4-197.6-0.1c-22.6-5-43.2-10.4-66.1-15.3c-94.6-20.2-218.3-20.1-312,0.2c-22.3,4.8-42.5,10.1-64.7,15\r\n	c-62.6,13.7-136.7,13.8-199.1,0c-24.5-5.4-47.1-11.2-71.9-16.5c-37.8-8.1-82.7-13.2-136.2-14.3c-32.6-0.7-52.5,2-55.7,8.1\r\n	c-0.1,0.1-0.2,0.2-0.2,0.3l-0.1,0v0.1c0,0.7-0.2,1.3,0.1,1.9L-17,1133h1993v-66.6c7-1.1,12.4-2.8,15.2-5.1\r\n	C2000.1,1054.2,1979.4,1048.9,1943.2,1049.2z\"/>\r\n<path id=\"XMLID_55_\" d=\"M167.4,96.7c-46.6,0-106.3-15.3-109.9-16.2l1.5-5.8c1.1,0.3,101.2,25.9,141.7,11.9c-6.5-6.3-8.1-14.3-8.4-19\r\n	c-0.6-8.8,3.2-14.1,5.6-16.5c2.9-3,6.7-4.6,10-4.4c6,0.4,15,6.2,15.2,20.6c0.2,7.7-2.7,14-8.7,18.8c-0.5,0.4-1,0.8-1.5,1.1\r\n	c11.6,4.5,34.1,4.5,77.5-14.4l2.4,5.5c-40.7,17.8-69.8,22-86.4,12.5C196.4,95,182.6,96.7,167.4,96.7z M207.3,52.7\r\n	c-1.2,0-3.2,0.7-5.1,2.6c-1.6,1.6-4.3,5.4-3.8,11.8c0.3,4.2,1.9,11.6,8.6,16.8c1.4-0.8,2.6-1.6,3.8-2.5c4.5-3.6,6.6-8.2,6.4-14\r\n	c-0.1-10.3-5.9-14.5-9.5-14.7C207.4,52.7,207.3,52.7,207.3,52.7z\"/>\r\n</svg>'),
(5, 'Eclair', NULL, '<svg version=\"1.1\" id=\"bottom-trs-eclair\" class=\"svg-color-w\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\" viewbox=\"0 0 1920 132.013\" enable-background=\"new 0 0 1920 132.013\" xml:space=\"preserve\">\r\n        <polygon id=\"XMLID_250_\" points=\"1920,82.188 951,82.188 988.341,40.188 0,40.188 0,104.188 1920,104.188 \"/>\r\n    </svg>', '<svg version=\"1.1\" id=\"bottom-trs-eclair\" class=\"svg-color-c\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\" viewbox=\"0 0 1920 132.013\" enable-background=\"new 0 0 1920 132.013\" xml:space=\"preserve\">\r\n        <polygon id=\"XMLID_250_\" points=\"1920,82.188 951,82.188 988.341,40.188 0,40.188 0,104.188 1920,104.188 \"/>\r\n    </svg>', '<svg version=\"1.1\" id=\"top-trs-eclair\" class=\"svg-color-w\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\" viewbox=\"0 0 1920 132.013\" enable-background=\"new 0 0 1920 132.013\" xml:space=\"preserve\">\r\n        <polygon id=\"XMLID_250_\" points=\"1920,82.188 951,82.188 988.341,40.188 0,40.188 0,104.188 1920,104.188 \"/>\r\n    </svg>', '<svg version=\"1.1\" id=\"top-trs-eclair\" class=\"svg-color-c\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\" viewbox=\"0 0 1920 132.013\" enable-background=\"new 0 0 1920 132.013\" xml:space=\"preserve\">\r\n        <polygon id=\"XMLID_250_\" points=\"1920,82.188 951,82.188 988.341,40.188 0,40.188 0,104.188 1920,104.188 \"/>\r\n    </svg>', '<svg version=\"1.1\" id=\"soustitre-icon-eclair\" class=\"svg-color-w\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\"\r\n                x=\"0px\" y=\"0px\" viewbox=\"0 0 150 43.25\" enable-background=\"new 0 0 150 43.25\" xml:space=\"preserve\">\r\n                <g id=\"XMLID_67_\">\r\n                    <path d=\"M78.736,28.291c-0.41,0-0.795-0.215-1.007-0.575c-0.238-0.402-0.214-0.907,0.061-1.285l6.501-8.939\r\n                                                   l-75.403,5.8c-0.646,0.053-1.208-0.433-1.258-1.078c-0.05-0.645,0.433-1.208,1.078-1.258l77.932-5.995\r\n                                                   c0.451-0.035,0.889,0.198,1.112,0.597c0.223,0.399,0.194,0.891-0.075,1.26l-6.399,8.798l60.256-7.652\r\n                                                   c0.642-0.084,1.227,0.373,1.309,1.014c0.081,0.642-0.373,1.228-1.014,1.309l-62.945,7.993\r\n                                                   C78.835,28.288,78.785,28.291,78.736,28.291z\" />\r\n                </g>\r\n            </svg>', '<svg version=\"1.1\" id=\"soustitre-icon-eclair\" class=\"svg-color-c\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\"\r\n                x=\"0px\" y=\"0px\" viewbox=\"0 0 150 43.25\" enable-background=\"new 0 0 150 43.25\" xml:space=\"preserve\">\r\n                <g id=\"XMLID_67_\">\r\n                    <path d=\"M78.736,28.291c-0.41,0-0.795-0.215-1.007-0.575c-0.238-0.402-0.214-0.907,0.061-1.285l6.501-8.939\r\n                                                   l-75.403,5.8c-0.646,0.053-1.208-0.433-1.258-1.078c-0.05-0.645,0.433-1.208,1.078-1.258l77.932-5.995\r\n                                                   c0.451-0.035,0.889,0.198,1.112,0.597c0.223,0.399,0.194,0.891-0.075,1.26l-6.399,8.798l60.256-7.652\r\n                                                   c0.642-0.084,1.227,0.373,1.309,1.014c0.081,0.642-0.373,1.228-1.014,1.309l-62.945,7.993\r\n                                                   C78.835,28.288,78.785,28.291,78.736,28.291z\" />\r\n                </g>\r\n            </svg>'),
(6, 'Fleur', NULL, '<svg version=\"1.1\" id=\"bottom-trs-fleur\" class=\"svg-color-w\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"\r\n	 viewBox=\"0 0 2002.4 150\" style=\"enable-background:new 0 0 2002.4 150;\" xml:space=\"preserve\">\r\n</svg>\r\n', '<svg version=\"1.1\" id=\"bottom-trs-fleur\" class=\"svg-color-c\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"\r\n	 viewBox=\"0 0 2002.4 150\" style=\"enable-background:new 0 0 2002.4 150;\" xml:space=\"preserve\">\r\n</svg>\r\n', '<svg version=\"1.1\" id=\"top-trs-fleur\" class=\"svg-color-w\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"\r\n	 viewBox=\"0 0 2002.4 150\" style=\"enable-background:new 0 0 2002.4 150;\" xml:space=\"preserve\">\r\n</svg>\r\n', '<svg version=\"1.1\" id=\"top-trs-fleur\" class=\"svg-color-c\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"\r\n	 viewBox=\"0 0 2002.4 150\" style=\"enable-background:new 0 0 2002.4 150;\" xml:space=\"preserve\">\r\n</svg>\r\n', '<svg version=\"1.1\" id=\"soustitre-icon-fleur\" class=\"svg-color-w\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"\r\n	 viewBox=\"0 0 2002.4 195\" style=\"enable-background:new 0 0 2002.4 195;\" xml:space=\"preserve\">\r\n</svg>', '<svg version=\"1.1\" id=\"soustitre-icon-fleur\" class=\"svg-color-c\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"\r\n	 viewBox=\"0 0 2002.4 195\" style=\"enable-background:new 0 0 2002.4 195;\" xml:space=\"preserve\">\r\n</svg>'),
(7, 'Peinture', NULL, '<svg version=\"1.1\" id=\"bottom-trs-peinture\" call=\"svg-color-w\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"\r\n	 viewBox=\"0 0 1947.5 183.9\" style=\"enable-background:new 0 0 1947.5 183.9;\" xml:space=\"preserve\">\r\n<polygon id=\"XMLID_94_\" points=\"16.7,17.4 1934,128.3 1936,171.9 16,171.9 \"/>\r\n</svg>', '<svg version=\"1.1\" id=\"bottom-trs-peinture\" call=\"svg-color-C\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"\r\n	 viewBox=\"0 0 1947.5 183.9\" style=\"enable-background:new 0 0 1947.5 183.9;\" xml:space=\"preserve\">\r\n<polygon id=\"XMLID_94_\" points=\"16.7,17.4 1934,128.3 1936,171.9 16,171.9 \"/>\r\n</svg>', '<svg version=\"1.1\" id=\"top-trs-peinture\" call=\"svg-color-w\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"\r\n	 viewBox=\"0 0 1947.5 183.9\" style=\"enable-background:new 0 0 1947.5 183.9;\" xml:space=\"preserve\">\r\n<polygon id=\"XMLID_94_\" points=\"16.7,17.4 1934,128.3 1936,171.9 16,171.9 \"/>\r\n</svg>', '<svg version=\"1.1\" id=\"top-trs-peinture\" call=\"svg-color-c\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"\r\n	 viewBox=\"0 0 1947.5 183.9\" style=\"enable-background:new 0 0 1947.5 183.9;\" xml:space=\"preserve\">\r\n<polygon id=\"XMLID_94_\" points=\"16.7,17.4 1934,128.3 1936,171.9 16,171.9 \"/>\r\n</svg>', '<svg version=\"1.1\" id=\"soustitre-icon-peinture\" class=\"svg-color-w\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"\r\n	 viewBox=\"0 0 398.1 150\" style=\"enable-background:new 0 0 398.1 150;\" xml:space=\"preserve\">\r\n<g id=\"XMLID_75_\">\r\n	<path id=\"XMLID_122_\" class=\"st0\" d=\"M86.9,67.2c0.2,0,0.4,0,0.6,0.1c-0.4,0-1,0.1-1.7,0.1c6.7,0.4,15.6-0.2,21.3-0.8\r\n		c2.1,0,3.9-0.3,4.1-0.5c0.2-0.2-1.3-0.4-3.4-0.3c-0.5,0-1,0-1.3,0c-3-0.3-6.6-0.4-10.6-0.4c0.8,0,1.6,0.1,2.3,0.1\r\n		c-1.2,0-2.3,0-3.6,0c0.1,0,0.3,0.1,0.4,0.1c-4-0.2-9.4,0-12.2,0.5c-2.7,0.5-1.8,1,2.2,1.2L86.9,67.2z\"/>\r\n	<path id=\"XMLID_121_\" class=\"st0\" d=\"M94.4,68.3c-2.4-0.1-4.7-0.2-7-0.3l-0.5-0.1l0.2,0.3l0,0c2.1-0.3,5.7-0.5,8.9-0.7l1.2-0.1\r\n		c0.6-0.1,0.9-0.1,1-0.2c0.3-0.2-0.8-0.3-2.3-0.3l-1.7,0c-4.3-0.1-11,0-13.3,0.6c-0.5,0.1-0.1,0.3,0.1,0.4c-0.2,0.2,1.4,0.4,3.6,0.3\r\n		c2.1,0,4-0.2,4.1-0.5c0.4,0,0.7,0,1.1,0c-0.3,0-0.6,0.1-0.9,0.1c0.6-0.2,2.5-0.3,4-0.4l2.2-0.1l-1.2-0.5l-1.1,0.1\r\n		c0.1,0,0.3,0,0.2,0.1c-2.1,0.2-4.2,0.4-6.5,0.5L83.5,68c-0.8,0.1-0.7,0.3,0.2,0.3l1.3,0.1c-0.2,0-0.4,0-0.6-0.1\r\n		c3,0,6.2,0.1,9.2,0.1c0.5,0,1,0,1.3-0.1C95.1,68.4,94.9,68.3,94.4,68.3z\"/>\r\n	<g id=\"XMLID_102_\">\r\n		<path id=\"XMLID_120_\" class=\"st0\" d=\"M83.7,68.6c-0.5,0-1-0.1-1.7,0c-0.2,0-0.3,0-0.3,0c0.3,0,0.6,0,1,0.1\r\n			C83.4,68.7,83.7,68.7,83.7,68.6z\"/>\r\n		<path id=\"XMLID_119_\" class=\"st0\" d=\"M81.8,68.6c-0.2,0-0.4,0-0.4,0c0.1,0,0.2,0,0.3,0C81.7,68.6,81.7,68.6,81.8,68.6\r\n			C81.7,68.6,81.7,68.6,81.8,68.6z\"/>\r\n		<path id=\"XMLID_118_\" class=\"st0\" d=\"M213.5,62.2c9.3-0.5,18.7-1,28.1-1.7c0.3,0,0.6-0.1,0.6-0.1c0,0-0.2,0-0.5,0\r\n			c-9.4,0.6-18.7,1.2-28,1.7c-0.3,0-0.6,0.1-0.6,0.1C213,62.2,213.2,62.2,213.5,62.2z\"/>\r\n		<path id=\"XMLID_117_\" class=\"st0\" d=\"M283.6,60C283.4,60.1,283.4,60.1,283.6,60c0.2,0.1,0.6,0.1,0.8,0c0.2,0,0.2-0.1,0-0.1\r\n			C284.1,60,283.8,60,283.6,60z\"/>\r\n		<path id=\"XMLID_103_\" class=\"st0\" d=\"M281.8,62.7c-1.3,0.2-2.5,0.3-3.6,0.5c-0.2,0-0.4,0-0.6,0c0.1,0-0.2,0.1-0.6,0.2\r\n			c-9.3,1.2-19.3,2.2-29.1,3.1c-0.1,0-0.2,0.1-0.4,0.1c-0.7,0.2-2,0.3-3.5,0.4l-1.1,0c-4.3,0.2-8.7,0.5-13,0.7\r\n			c-0.9,0.1-1.9,0.2-3,0.3c-3.7,0.4-7.4,0.8-11.3,1.2c0.2,0,0.4,0.1,0.4,0.1c-0.1,0.1-0.9,0.3-2,0.3l-1.6,0.1c1.5-0.1,3-0.1,4.5-0.2\r\n			c0.2,0,0.4,0,0.6,0c1.6-0.1,3.3-0.2,5-0.3c14.7-1.1,28.5-2.5,42.1-4.1c0.2,0,0.6-0.1,0.8-0.1c0.1,0,0.1,0.1-0.1,0.1\r\n			c-8.6,1.2-16,2.5-25.7,3.6c-11.6,1.3-23.1,2.4-35,3.4c-12.5,0.7-24,1.7-36.7,2.4c-17.2,1.1-33.4,1.8-50.3,2.3\r\n			c-6.3,0.3-12.1,0-12.9-0.6c-0.5-0.4,0.9-0.8,3.5-1.1c-0.5,0-1,0-1.5,0l-2.4,0c-2.3,0-4.3-0.1-5.5-0.3l-1.7-0.2\r\n			c-2.3-0.4-6-0.8-7.8-1.3l0.4-0.2l-0.4,0c-1.5-0.1-2.4-0.3-2.8-0.5l0.1-0.2c0.3-0.3,1-0.6,2.2-0.8c0-0.1,0.1-0.2,0.4-0.3\r\n			c-1-0.2-1.5-0.5-0.7-0.8c-0.6-0.1-0.5-0.3,0.2-0.4c0.2,0,0.5-0.2,0.8-0.2c0,0,0,0,0,0c-0.3,0-0.4,0.1-0.9,0c-0.6,0-0.9,0-0.9,0\r\n			c-1.6,0-1.6,0-2.9,0c-1.2-0.1-1.9-0.1-1.9-0.1c-1.3-0.4-1.3-0.4-1.1-0.6c0.1,0,0.2,0,0.3-0.1c-1,0-1.1,0-1.4-0.1\r\n			c-0.3,0-0.5-0.1-0.5-0.1c0-0.1,0-0.1-0.2-0.1c-0.1,0,0-0.1,0-0.1c0.6-0.1,0.6-0.1,0.6-0.2c0.1,0,0.3-0.1,0.3-0.1\r\n			c0.7,0,1-0.1,1.1-0.1c1.5,0.2,1.5,0.2,1.5,0.2c0.3-0.1,0.3-0.1,0.3-0.1c0.3,0.1,0.3,0.1,0.3,0.1c-0.2-0.1-0.2-0.1-0.2-0.1\r\n			c0.7,0.1,0.7,0.1,0.7,0.1c-0.8-0.1-0.8-0.1-0.8-0.1c1.7,0,1.7,0,2.4,0c0.7,0,1.3,0,1.4,0c-0.1,0-0.1-0.1-0.1-0.1\r\n			c1.9,0,1.9,0,3.7,0c0.2,0,0.3,0,0.4,0.1c0.2,0,0.5-0.1,0.9-0.1l1,0c0.1,0,0.1,0,0.2,0c0,0,0,0,0,0c0.3,0,0.5,0,0.8-0.1\r\n			c0.2,0,0.2,0,0.2,0l0,0c0.6-0.1,1.4-0.1,3.5-0.3c0.6,0,1.1,0,1.6,0c-0.2,0-0.3,0-0.5,0c-0.3,0,0-0.1-0.2-0.1\r\n			c-4-0.1-8.3-0.1-12.6-0.1c-0.8,0-1.5,0-1.6-0.1c-0.1-0.1,0.4-0.2,1.2-0.2c8.7-0.7,19.3-0.9,28.3-0.8c2.4,0,4.7-0.1,7.1-0.1l-0.3,0\r\n			l1.8,0l0.2,0c-0.5,0-0.9-0.1-1.4-0.1c-0.3,0-0.6,0-1,0c-5.5,0.1-10.5,0-15.8-0.1c-2.9,0-5.3-0.1-8-0.2c-0.7,0-1.2,0-1.1-0.1\r\n			c0.1-0.1,0.7-0.1,1.4-0.1c9-0.3,19.3-0.5,26.5-0.2c1.6-0.1,3.2,0,4.5,0h0.1c-0.3,0-0.7-0.1-1-0.1c1.2,0,1.9,0.1,3,0.1\r\n			c-0.1-0.1-0.3-0.1-0.4-0.2c6.1-0.1,12.6-0.4,18.2-0.3c0.2,0,0.4,0,0.6,0c2.4-0.2,4.8-0.5,7.7-0.6c-1,0-1.9,0-2.9,0.1\r\n			c2.1-0.2,4.1-0.3,6.4-0.4c6-0.2,12.8-0.3,16,0.1c11.7-0.7,23.4-1.4,35-2.2c0.6,0,1.1,0,1.3,0c0.1,0.1-0.3,0.1-0.9,0.2\r\n			c-8.3,0.7-16.8,1.3-25.3,1.9c7.1-0.3,14.2-0.6,21.5-1c0.9-0.1,1.9-0.1,2.8-0.2c0.9-0.1,1.8-0.1,2.8-0.1c9.3-0.6,18.1-1.1,27.6-2\r\n			c8.1-0.7,15.1-1.4,23.2-2.2c11.3-1.2,21.5-2.3,32.7-3.3c1.5-0.2,2.9-0.2,3.1,0c0.2,0.1-0.9,0.4-2.4,0.5c-23.2,2.6-46.1,5-70.4,6.6\r\n			c-2.6,0.2-5.2,0.3-7.8,0.5c0,0,0.1,0,0.1,0.1c0,0.1-0.2,0.2-0.6,0.3c2.9-0.2,5.9-0.3,8.8-0.5c8.2-0.7,16.4-1.5,25.2-2.1\r\n			c6-0.4,11.5-0.6,17-0.9c7-0.7,14-1.4,21.2-2.1c0.3,0,0.6,0,0.7,0c0.1,0,0,0.1-0.3,0.1c-4.9,0.6-9.9,1.2-14.9,1.8\r\n			c0.8,0,1.3,0.1,1.2,0.3c-0.1,0.1-0.7,0.3-1.6,0.5l3.4-0.3c0.7-0.1,1.3,0,1.3,0c0,0.1-0.6,0.2-1.2,0.2c-4.7,0.4-9.4,0.8-14,1.1\r\n			c-5.6,0.5-11.2,1-16.8,1.5c0.8,0,1.4,0.1,1.7,0.2l0,0c0.9-0.1,1.7-0.1,2.6-0.2c15.9-1.6,32.1-3.2,48.5-4.6c0.3,0,0.6,0,0.6,0\r\n			c0,0-0.2,0.2-0.5,0.2C295.9,59,291,59,286,60h0c0.2,0,0.2-0.1,0,0c-0.2,0-0.6,0-0.8,0c-0.2,0-0.2-0.1,0-0.1\r\n			c-9.1,0.9-18.2,1.8-27.2,2.6c8.3-0.7,16.7-1.4,25-2.1c0.9-0.1,1.8-0.2,2.7-0.4c0.2,0,0.6,0,0.7,0c0.1,0-0.1,0.1-0.4,0.1l-0.8,0.1\r\n			c1.6-0.1,2.8-0.1,2.8,0.1c-0.1,0.2-1.4,0.4-3.1,0.6c-4.4,0.4-8.8,0.8-13.1,1.2l-1.4,0.1c-0.5,0.1-0.9,0.1-1.4,0.2\r\n			c6.8-0.5,13.6-1,20.3-1.5c0.6-0.1,1.1-0.1,1.1,0c0,0.1-0.4,0.2-1,0.2c-11.9,1.3-23.9,2.5-36,3.5c-4,0.6-7.9,1.1-12,1.7\r\n			c0.5,0,1-0.1,1.5-0.1c13.2-1,24.3-2.6,37-3.8c0.3,0,0.6,0,0.6,0c0,0-0.2,0.1-0.5,0.1c-6.2,0.6-11.8,1.3-18,2\r\n			c-5.1,0.6-9.9,1-14.7,1.6c9.7-0.8,19-1.9,28.6-2.8c0.4,0,0.8-0.1,1.1-0.1c0,0,0.1,0,0.2-0.1c1.2-0.2,2.5-0.4,3.8-0.5\r\n			c0.3,0,0.6-0.1,0.7,0C282.2,62.6,282.1,62.6,281.8,62.7z M112.6,69c-0.1,0-0.2,0-0.2,0c0.3,0,0.5,0,0.9,0c0,0,0,0,1.2,0.2\r\n			C114.4,69.2,113.5,69.1,112.6,69z M97.8,70.3C97.8,70.3,97.8,70.3,97.8,70.3c-0.4-0.1-0.7-0.1-0.7-0.1\r\n			C97.4,70.2,97.6,70.2,97.8,70.3z M192.7,64.3c-5.1,0.3-10.2,0.5-15.2,0.6c1.2-0.1,2.5-0.2,3.7-0.2C185,64.5,188.8,64.4,192.7,64.3\r\n			z M102.6,68.3c1.3,0.1,2.4,0.2,3.4,0.4c0.9-0.1,1.8-0.1,2.7-0.1c2.5,0,5-0.1,7.4-0.1c-0.3-0.1,0.3-0.1,0.6-0.1c0.3,0,0.6,0,0.9,0\r\n			c-2.6,0-5.2,0-7.8,0C107.5,68.4,104.9,68.4,102.6,68.3z M84.7,69.1c-0.1,0-0.1,0-0.2,0c0,0,0,0,0.5-0.1\r\n			C84.9,68.9,84.8,69,84.7,69.1z M83.9,69.3c0.1,0,0.2,0,0.4,0C84.2,69.4,84,69.4,83.9,69.3z M87.3,69.4c-0.2,0-0.3,0-0.5-0.1\r\n			C87.3,69.4,87.3,69.4,87.3,69.4z M89.8,73.1l1.3-0.7l-1.4,0.6L89.8,73.1z\"/>\r\n	</g>\r\n</g>\r\n</svg>', '<svg version=\"1.1\" id=\"soustitre-icon-peinture\" class=\"svg-color-c\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"\r\n	 viewBox=\"0 0 398.1 150\" style=\"enable-background:new 0 0 398.1 150;\" xml:space=\"preserve\">\r\n<g id=\"XMLID_75_\">\r\n	<path id=\"XMLID_122_\" class=\"st0\" d=\"M86.9,67.2c0.2,0,0.4,0,0.6,0.1c-0.4,0-1,0.1-1.7,0.1c6.7,0.4,15.6-0.2,21.3-0.8\r\n		c2.1,0,3.9-0.3,4.1-0.5c0.2-0.2-1.3-0.4-3.4-0.3c-0.5,0-1,0-1.3,0c-3-0.3-6.6-0.4-10.6-0.4c0.8,0,1.6,0.1,2.3,0.1\r\n		c-1.2,0-2.3,0-3.6,0c0.1,0,0.3,0.1,0.4,0.1c-4-0.2-9.4,0-12.2,0.5c-2.7,0.5-1.8,1,2.2,1.2L86.9,67.2z\"/>\r\n	<path id=\"XMLID_121_\" class=\"st0\" d=\"M94.4,68.3c-2.4-0.1-4.7-0.2-7-0.3l-0.5-0.1l0.2,0.3l0,0c2.1-0.3,5.7-0.5,8.9-0.7l1.2-0.1\r\n		c0.6-0.1,0.9-0.1,1-0.2c0.3-0.2-0.8-0.3-2.3-0.3l-1.7,0c-4.3-0.1-11,0-13.3,0.6c-0.5,0.1-0.1,0.3,0.1,0.4c-0.2,0.2,1.4,0.4,3.6,0.3\r\n		c2.1,0,4-0.2,4.1-0.5c0.4,0,0.7,0,1.1,0c-0.3,0-0.6,0.1-0.9,0.1c0.6-0.2,2.5-0.3,4-0.4l2.2-0.1l-1.2-0.5l-1.1,0.1\r\n		c0.1,0,0.3,0,0.2,0.1c-2.1,0.2-4.2,0.4-6.5,0.5L83.5,68c-0.8,0.1-0.7,0.3,0.2,0.3l1.3,0.1c-0.2,0-0.4,0-0.6-0.1\r\n		c3,0,6.2,0.1,9.2,0.1c0.5,0,1,0,1.3-0.1C95.1,68.4,94.9,68.3,94.4,68.3z\"/>\r\n	<g id=\"XMLID_102_\">\r\n		<path id=\"XMLID_120_\" class=\"st0\" d=\"M83.7,68.6c-0.5,0-1-0.1-1.7,0c-0.2,0-0.3,0-0.3,0c0.3,0,0.6,0,1,0.1\r\n			C83.4,68.7,83.7,68.7,83.7,68.6z\"/>\r\n		<path id=\"XMLID_119_\" class=\"st0\" d=\"M81.8,68.6c-0.2,0-0.4,0-0.4,0c0.1,0,0.2,0,0.3,0C81.7,68.6,81.7,68.6,81.8,68.6\r\n			C81.7,68.6,81.7,68.6,81.8,68.6z\"/>\r\n		<path id=\"XMLID_118_\" class=\"st0\" d=\"M213.5,62.2c9.3-0.5,18.7-1,28.1-1.7c0.3,0,0.6-0.1,0.6-0.1c0,0-0.2,0-0.5,0\r\n			c-9.4,0.6-18.7,1.2-28,1.7c-0.3,0-0.6,0.1-0.6,0.1C213,62.2,213.2,62.2,213.5,62.2z\"/>\r\n		<path id=\"XMLID_117_\" class=\"st0\" d=\"M283.6,60C283.4,60.1,283.4,60.1,283.6,60c0.2,0.1,0.6,0.1,0.8,0c0.2,0,0.2-0.1,0-0.1\r\n			C284.1,60,283.8,60,283.6,60z\"/>\r\n		<path id=\"XMLID_103_\" class=\"st0\" d=\"M281.8,62.7c-1.3,0.2-2.5,0.3-3.6,0.5c-0.2,0-0.4,0-0.6,0c0.1,0-0.2,0.1-0.6,0.2\r\n			c-9.3,1.2-19.3,2.2-29.1,3.1c-0.1,0-0.2,0.1-0.4,0.1c-0.7,0.2-2,0.3-3.5,0.4l-1.1,0c-4.3,0.2-8.7,0.5-13,0.7\r\n			c-0.9,0.1-1.9,0.2-3,0.3c-3.7,0.4-7.4,0.8-11.3,1.2c0.2,0,0.4,0.1,0.4,0.1c-0.1,0.1-0.9,0.3-2,0.3l-1.6,0.1c1.5-0.1,3-0.1,4.5-0.2\r\n			c0.2,0,0.4,0,0.6,0c1.6-0.1,3.3-0.2,5-0.3c14.7-1.1,28.5-2.5,42.1-4.1c0.2,0,0.6-0.1,0.8-0.1c0.1,0,0.1,0.1-0.1,0.1\r\n			c-8.6,1.2-16,2.5-25.7,3.6c-11.6,1.3-23.1,2.4-35,3.4c-12.5,0.7-24,1.7-36.7,2.4c-17.2,1.1-33.4,1.8-50.3,2.3\r\n			c-6.3,0.3-12.1,0-12.9-0.6c-0.5-0.4,0.9-0.8,3.5-1.1c-0.5,0-1,0-1.5,0l-2.4,0c-2.3,0-4.3-0.1-5.5-0.3l-1.7-0.2\r\n			c-2.3-0.4-6-0.8-7.8-1.3l0.4-0.2l-0.4,0c-1.5-0.1-2.4-0.3-2.8-0.5l0.1-0.2c0.3-0.3,1-0.6,2.2-0.8c0-0.1,0.1-0.2,0.4-0.3\r\n			c-1-0.2-1.5-0.5-0.7-0.8c-0.6-0.1-0.5-0.3,0.2-0.4c0.2,0,0.5-0.2,0.8-0.2c0,0,0,0,0,0c-0.3,0-0.4,0.1-0.9,0c-0.6,0-0.9,0-0.9,0\r\n			c-1.6,0-1.6,0-2.9,0c-1.2-0.1-1.9-0.1-1.9-0.1c-1.3-0.4-1.3-0.4-1.1-0.6c0.1,0,0.2,0,0.3-0.1c-1,0-1.1,0-1.4-0.1\r\n			c-0.3,0-0.5-0.1-0.5-0.1c0-0.1,0-0.1-0.2-0.1c-0.1,0,0-0.1,0-0.1c0.6-0.1,0.6-0.1,0.6-0.2c0.1,0,0.3-0.1,0.3-0.1\r\n			c0.7,0,1-0.1,1.1-0.1c1.5,0.2,1.5,0.2,1.5,0.2c0.3-0.1,0.3-0.1,0.3-0.1c0.3,0.1,0.3,0.1,0.3,0.1c-0.2-0.1-0.2-0.1-0.2-0.1\r\n			c0.7,0.1,0.7,0.1,0.7,0.1c-0.8-0.1-0.8-0.1-0.8-0.1c1.7,0,1.7,0,2.4,0c0.7,0,1.3,0,1.4,0c-0.1,0-0.1-0.1-0.1-0.1\r\n			c1.9,0,1.9,0,3.7,0c0.2,0,0.3,0,0.4,0.1c0.2,0,0.5-0.1,0.9-0.1l1,0c0.1,0,0.1,0,0.2,0c0,0,0,0,0,0c0.3,0,0.5,0,0.8-0.1\r\n			c0.2,0,0.2,0,0.2,0l0,0c0.6-0.1,1.4-0.1,3.5-0.3c0.6,0,1.1,0,1.6,0c-0.2,0-0.3,0-0.5,0c-0.3,0,0-0.1-0.2-0.1\r\n			c-4-0.1-8.3-0.1-12.6-0.1c-0.8,0-1.5,0-1.6-0.1c-0.1-0.1,0.4-0.2,1.2-0.2c8.7-0.7,19.3-0.9,28.3-0.8c2.4,0,4.7-0.1,7.1-0.1l-0.3,0\r\n			l1.8,0l0.2,0c-0.5,0-0.9-0.1-1.4-0.1c-0.3,0-0.6,0-1,0c-5.5,0.1-10.5,0-15.8-0.1c-2.9,0-5.3-0.1-8-0.2c-0.7,0-1.2,0-1.1-0.1\r\n			c0.1-0.1,0.7-0.1,1.4-0.1c9-0.3,19.3-0.5,26.5-0.2c1.6-0.1,3.2,0,4.5,0h0.1c-0.3,0-0.7-0.1-1-0.1c1.2,0,1.9,0.1,3,0.1\r\n			c-0.1-0.1-0.3-0.1-0.4-0.2c6.1-0.1,12.6-0.4,18.2-0.3c0.2,0,0.4,0,0.6,0c2.4-0.2,4.8-0.5,7.7-0.6c-1,0-1.9,0-2.9,0.1\r\n			c2.1-0.2,4.1-0.3,6.4-0.4c6-0.2,12.8-0.3,16,0.1c11.7-0.7,23.4-1.4,35-2.2c0.6,0,1.1,0,1.3,0c0.1,0.1-0.3,0.1-0.9,0.2\r\n			c-8.3,0.7-16.8,1.3-25.3,1.9c7.1-0.3,14.2-0.6,21.5-1c0.9-0.1,1.9-0.1,2.8-0.2c0.9-0.1,1.8-0.1,2.8-0.1c9.3-0.6,18.1-1.1,27.6-2\r\n			c8.1-0.7,15.1-1.4,23.2-2.2c11.3-1.2,21.5-2.3,32.7-3.3c1.5-0.2,2.9-0.2,3.1,0c0.2,0.1-0.9,0.4-2.4,0.5c-23.2,2.6-46.1,5-70.4,6.6\r\n			c-2.6,0.2-5.2,0.3-7.8,0.5c0,0,0.1,0,0.1,0.1c0,0.1-0.2,0.2-0.6,0.3c2.9-0.2,5.9-0.3,8.8-0.5c8.2-0.7,16.4-1.5,25.2-2.1\r\n			c6-0.4,11.5-0.6,17-0.9c7-0.7,14-1.4,21.2-2.1c0.3,0,0.6,0,0.7,0c0.1,0,0,0.1-0.3,0.1c-4.9,0.6-9.9,1.2-14.9,1.8\r\n			c0.8,0,1.3,0.1,1.2,0.3c-0.1,0.1-0.7,0.3-1.6,0.5l3.4-0.3c0.7-0.1,1.3,0,1.3,0c0,0.1-0.6,0.2-1.2,0.2c-4.7,0.4-9.4,0.8-14,1.1\r\n			c-5.6,0.5-11.2,1-16.8,1.5c0.8,0,1.4,0.1,1.7,0.2l0,0c0.9-0.1,1.7-0.1,2.6-0.2c15.9-1.6,32.1-3.2,48.5-4.6c0.3,0,0.6,0,0.6,0\r\n			c0,0-0.2,0.2-0.5,0.2C295.9,59,291,59,286,60h0c0.2,0,0.2-0.1,0,0c-0.2,0-0.6,0-0.8,0c-0.2,0-0.2-0.1,0-0.1\r\n			c-9.1,0.9-18.2,1.8-27.2,2.6c8.3-0.7,16.7-1.4,25-2.1c0.9-0.1,1.8-0.2,2.7-0.4c0.2,0,0.6,0,0.7,0c0.1,0-0.1,0.1-0.4,0.1l-0.8,0.1\r\n			c1.6-0.1,2.8-0.1,2.8,0.1c-0.1,0.2-1.4,0.4-3.1,0.6c-4.4,0.4-8.8,0.8-13.1,1.2l-1.4,0.1c-0.5,0.1-0.9,0.1-1.4,0.2\r\n			c6.8-0.5,13.6-1,20.3-1.5c0.6-0.1,1.1-0.1,1.1,0c0,0.1-0.4,0.2-1,0.2c-11.9,1.3-23.9,2.5-36,3.5c-4,0.6-7.9,1.1-12,1.7\r\n			c0.5,0,1-0.1,1.5-0.1c13.2-1,24.3-2.6,37-3.8c0.3,0,0.6,0,0.6,0c0,0-0.2,0.1-0.5,0.1c-6.2,0.6-11.8,1.3-18,2\r\n			c-5.1,0.6-9.9,1-14.7,1.6c9.7-0.8,19-1.9,28.6-2.8c0.4,0,0.8-0.1,1.1-0.1c0,0,0.1,0,0.2-0.1c1.2-0.2,2.5-0.4,3.8-0.5\r\n			c0.3,0,0.6-0.1,0.7,0C282.2,62.6,282.1,62.6,281.8,62.7z M112.6,69c-0.1,0-0.2,0-0.2,0c0.3,0,0.5,0,0.9,0c0,0,0,0,1.2,0.2\r\n			C114.4,69.2,113.5,69.1,112.6,69z M97.8,70.3C97.8,70.3,97.8,70.3,97.8,70.3c-0.4-0.1-0.7-0.1-0.7-0.1\r\n			C97.4,70.2,97.6,70.2,97.8,70.3z M192.7,64.3c-5.1,0.3-10.2,0.5-15.2,0.6c1.2-0.1,2.5-0.2,3.7-0.2C185,64.5,188.8,64.4,192.7,64.3\r\n			z M102.6,68.3c1.3,0.1,2.4,0.2,3.4,0.4c0.9-0.1,1.8-0.1,2.7-0.1c2.5,0,5-0.1,7.4-0.1c-0.3-0.1,0.3-0.1,0.6-0.1c0.3,0,0.6,0,0.9,0\r\n			c-2.6,0-5.2,0-7.8,0C107.5,68.4,104.9,68.4,102.6,68.3z M84.7,69.1c-0.1,0-0.1,0-0.2,0c0,0,0,0,0.5-0.1\r\n			C84.9,68.9,84.8,69,84.7,69.1z M83.9,69.3c0.1,0,0.2,0,0.4,0C84.2,69.4,84,69.4,83.9,69.3z M87.3,69.4c-0.2,0-0.3,0-0.5-0.1\r\n			C87.3,69.4,87.3,69.4,87.3,69.4z M89.8,73.1l1.3-0.7l-1.4,0.6L89.8,73.1z\"/>\r\n	</g>\r\n</g>\r\n</svg>'),
(8, 'Plombier', NULL, '<svg version=\"1.1\" id=\"bottom-trs-plombier\" class=\"svg-color-w\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"\r\n	 viewBox=\"0 0 1956.7 168.8\" style=\"enable-background:new 0 0 1956.7 168.8;\" xml:space=\"preserve\">\r\n<path id=\"XMLID_27_\" d=\"M1941,108.8c0,0-328,68.5-732.1,27.4S717,42.7,21,33.6V13h1920V108.8z\"/>\r\n</svg>', '<svg version=\"1.1\" id=\"bottom-trs-plombier\" class=\"svg-color-c\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"\r\n	 viewBox=\"0 0 1956.7 168.8\" style=\"enable-background:new 0 0 1956.7 168.8;\" xml:space=\"preserve\">\r\n<path id=\"XMLID_27_\" d=\"M1941,108.8c0,0-328,68.5-732.1,27.4S717,42.7,21,33.6V13h1920V108.8z\"/>\r\n</svg>', '<svg version=\"1.1\" id=\"top-trs-plombier\" class=\"svg-color-w\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"\r\n	 viewBox=\"0 0 1956.7 168.8\" style=\"enable-background:new 0 0 1956.7 168.8;\" xml:space=\"preserve\">\r\n<path id=\"XMLID_27_\" d=\"M1941,108.8c0,0-328,68.5-732.1,27.4S717,42.7,21,33.6V13h1920V108.8z\"/>\r\n</svg>', '<svg version=\"1.1\" id=\"top-trs-plombier\" class=\"svg-color-c\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"\r\n	 viewBox=\"0 0 1956.7 168.8\" style=\"enable-background:new 0 0 1956.7 168.8;\" xml:space=\"preserve\">\r\n<path id=\"XMLID_27_\" d=\"M1941,108.8c0,0-328,68.5-732.1,27.4S717,42.7,21,33.6V13h1920V108.8z\"/>\r\n</svg>', '<svg version=\"1.1\" id=\"soustitre-icon-plombier\" class=\"svg-color-w\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"\r\n	 viewBox=\"0 0 398.1 150\" style=\"enable-background:new 0 0 398.1 150;\" xml:space=\"preserve\">\r\n<path id=\"XMLID_84_\" d=\"M343,69.1c0-0.7-0.5-1.6-1.1-1.7c-0.1,0-0.2-0.4-0.3-0.4H77.9l0-12.4c0-0.8-0.6-1.3-1.4-1.3l-1.9,0.1\r\n	c-0.8,0-1.4,0.7-1.4,1.5l0,16c0,0.8,0.6,1.4,1.4,1.4l1.9-0.2c0,0,0.1-0.2,0.1-0.2h261.7l0,12.9c0,0.8,0.6,1.5,1.4,1.5l1.9,0\r\n	c0.8,0,1.4-0.6,1.4-1.4L343,69.1z\"/>\r\n</svg>', '<svg version=\"1.1\" id=\"soustitre-icon-plombier\" class=\"svg-color-c\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"\r\n	 viewBox=\"0 0 398.1 150\" style=\"enable-background:new 0 0 398.1 150;\" xml:space=\"preserve\">\r\n<path id=\"XMLID_84_\" d=\"M343,69.1c0-0.7-0.5-1.6-1.1-1.7c-0.1,0-0.2-0.4-0.3-0.4H77.9l0-12.4c0-0.8-0.6-1.3-1.4-1.3l-1.9,0.1\r\n	c-0.8,0-1.4,0.7-1.4,1.5l0,16c0,0.8,0.6,1.4,1.4,1.4l1.9-0.2c0,0,0.1-0.2,0.1-0.2h261.7l0,12.9c0,0.8,0.6,1.5,1.4,1.5l1.9,0\r\n	c0.8,0,1.4-0.6,1.4-1.4L343,69.1z\"/>\r\n</svg>');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
