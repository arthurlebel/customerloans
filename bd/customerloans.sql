-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Ven 12 Octobre 2018 à 02:13
-- Version du serveur :  5.6.37
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `customerloans`
--

-- --------------------------------------------------------

--
-- Structure de la table `contracts`
--

CREATE TABLE IF NOT EXISTS `contracts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `loan_type_id` int(11) NOT NULL,
  `interest_rate_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `amount_due` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `payment_frequency` enum('Weekly','Monthly','Yearly','') COLLATE utf8_unicode_ci NOT NULL,
  `payment_due_date` date NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `contracts`
--

INSERT INTO `contracts` (`id`, `user_id`, `start`, `end`, `loan_type_id`, `interest_rate_id`, `amount`, `amount_due`, `payment_id`, `payment_frequency`, `payment_due_date`, `created`, `modified`) VALUES
(5, 2, '2018-10-10', '2018-10-10', 1, 1, 2500, 2500, 2, 'Weekly', '2018-10-10', '2018-10-10 19:18:46', '2018-10-10 19:18:46');

-- --------------------------------------------------------

--
-- Structure de la table `i18n`
--

CREATE TABLE IF NOT EXISTS `i18n` (
  `id` int(11) NOT NULL,
  `locale` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `foreign_key` int(10) NOT NULL,
  `field` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `interest_rates`
--

CREATE TABLE IF NOT EXISTS `interest_rates` (
  `id` int(11) NOT NULL,
  `interest_rate` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `interest_rates`
--

INSERT INTO `interest_rates` (`id`, `interest_rate`, `created`, `modified`) VALUES
(1, '5', '2018-10-10 15:16:32', '2018-10-10 15:16:32');

-- --------------------------------------------------------

--
-- Structure de la table `loan_types`
--

CREATE TABLE IF NOT EXISTS `loan_types` (
  `id` int(11) NOT NULL,
  `loan_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `loan_types`
--

INSERT INTO `loan_types` (`id`, `loan_type`, `created`, `modified`) VALUES
(1, 'mortgage', '2018-10-10 15:14:28', '2018-10-10 15:14:28');

-- --------------------------------------------------------

--
-- Structure de la table `payments`
--

CREATE TABLE IF NOT EXISTS `payments` (
  `id` int(11) NOT NULL,
  `payment_type_code` int(11) NOT NULL,
  `date` date NOT NULL,
  `amount` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `payments`
--

INSERT INTO `payments` (`id`, `payment_type_code`, `date`, `amount`, `created`, `modified`) VALUES
(2, 1, '2018-10-10', 1000, '2018-10-10 15:18:10', '2018-10-10 15:18:10');

-- --------------------------------------------------------

--
-- Structure de la table `payment_types`
--

CREATE TABLE IF NOT EXISTS `payment_types` (
  `id` int(11) NOT NULL,
  `payment_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `payment_types`
--

INSERT INTO `payment_types` (`id`, `payment_type`, `created`, `modified`) VALUES
(1, 'credit', '2018-10-10 15:17:42', '2018-10-10 15:17:42'),
(2, 'check', '2018-10-10 15:53:14', '2018-10-10 15:53:14');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `user_type` enum('Customer','Collector','Admin','Visitor') COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `user_type`, `email`, `password`, `created`, `modified`) VALUES
(2, 'Admin', 'admin@admin.com', '$2y$10$S9R1YzNIdPFHbHy5/PLFk.BGPB7DRrWViFiNBSNAoLVeBxnHmezJC', '2018-10-10 19:03:18', '2018-10-10 20:08:25'),
(3, 'Customer', 'arthur.lebel@hotmail.com', '$2y$10$YkenGDyXIIBzS/FDp5B4SeD5T8VI48gvV3PzV3WzSkr/T0Qrb3KUi', '2018-10-10 20:18:22', '2018-10-10 20:18:22'),
(4, 'Customer', 'lolxdmdre@yopmail.com', '$2y$10$WM7mKjKpU1gmjvnyYl9Yp.BGbG9r7/NkwXYAzwGYpWPzbuRoF8iZC', '2018-10-12 01:05:34', '2018-10-12 01:08:01');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `contracts`
--
ALTER TABLE `contracts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `loan_type_id` (`loan_type_id`),
  ADD KEY `interest_rate_id` (`interest_rate_id`),
  ADD KEY `payment_id` (`payment_id`);

--
-- Index pour la table `i18n`
--
ALTER TABLE `i18n`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `I18N_LOCALE_FIELD` (`locale`,`model`,`foreign_key`,`field`),
  ADD KEY `I18N_FIELD` (`model`,`foreign_key`,`field`);

--
-- Index pour la table `interest_rates`
--
ALTER TABLE `interest_rates`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `loan_types`
--
ALTER TABLE `loan_types`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payment_type_code` (`payment_type_code`);

--
-- Index pour la table `payment_types`
--
ALTER TABLE `payment_types`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `contracts`
--
ALTER TABLE `contracts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `i18n`
--
ALTER TABLE `i18n`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `interest_rates`
--
ALTER TABLE `interest_rates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `loan_types`
--
ALTER TABLE `loan_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `payment_types`
--
ALTER TABLE `payment_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `contracts`
--
ALTER TABLE `contracts`
  ADD CONSTRAINT `contracts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `contracts_ibfk_2` FOREIGN KEY (`loan_type_id`) REFERENCES `loan_types` (`id`),
  ADD CONSTRAINT `contracts_ibfk_3` FOREIGN KEY (`interest_rate_id`) REFERENCES `interest_rates` (`id`),
  ADD CONSTRAINT `contracts_ibfk_4` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`);

--
-- Contraintes pour la table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`payment_type_code`) REFERENCES `payment_types` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
