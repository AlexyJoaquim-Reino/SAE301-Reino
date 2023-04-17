

CREATE DATABASE mmi-champs;

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `id_article` int(11) NOT NULL AUTO_INCREMENT,
  `nom_article` varchar(100) NOT NULL,
  `contenu_article` varchar(1000) NOT NULL,
  `date_article` date NOT NULL,
  `synopsis` varchar(200) NOT NULL,
  `miniature_article` varchar(50) DEFAULT NULL,
  `auteur` varchar(40) NOT NULL,
  PRIMARY KEY (`id_article`)
);

DROP TABLE IF EXISTS `projet`;
CREATE TABLE IF NOT EXISTS `projet` (
  `id_projet` int(11) NOT NULL AUTO_INCREMENT,
  `nom_projet` varchar(50) NOT NULL,
  `etudiants` varchar(100) NOT NULL,
  `date_debut_projet` date NOT NULL,
  `date_fin_projet` date NOT NULL,
  `niveau` varchar(10) NOT NULL,
  `description` varchar(500) NOT NULL,
  `img_projet` varchar(50) DEFAULT NULL,
  `iframe_projet` varchar(50) DEFAULT NULL,
  `lien` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_projet`)
);

DROP TABLE IF EXISTS `matiere`;
CREATE TABLE IF NOT EXISTS `matiere` (
  `id_matiere` int(11) NOT NULL AUTO_INCREMENT,
  `nom_matiere` varchar(60) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id_matiere`)
);

DROP TABLE IF EXISTS `temoignage`;
CREATE TABLE IF NOT EXISTS `temoignage` (
  `id_temoignage` int(11) NOT NULL AUTO_INCREMENT,
  `etudiant` varchar(100) NOT NULL,
  `promo` varchar(15) NOT NULL,
  `nom_temoignage` varchar(50) NOT NULL,
  `contenu_temoignage` varchar(1000) NOT NULL,
  PRIMARY KEY (`id_temoignage`)
);

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `login` varchar(20) NOT NULL,
  `mdp` varchar(20) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `url_photo` varchar(70) DEFAULT NULL,
  `bio` varchar(500) DEFAULT NULL,
  `role_articles` tinyint(4) NOT NULL,
  `role_projets` tinyint(4) NOT NULL,
  `role_temoignages` tinyint(4) NOT NULL,
  `role_admin` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
);