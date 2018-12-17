-- --------------------------------------------------------
-- Hôte :                        127.0.0.1
-- Version du serveur:           10.2.7-MariaDB - mariadb.org binary distribution
-- SE du serveur:                Win64
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Export de la structure de la base pour gesclinic
DROP DATABASE IF EXISTS `gesclinic`;
CREATE DATABASE IF NOT EXISTS `gesclinic` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `gesclinic`;

-- Export de la structure de la table gesclinic. analyse_medicale
DROP TABLE IF EXISTS `analyse_medicale`;
CREATE TABLE IF NOT EXISTS `analyse_medicale` (
  `idAnalyseMedic` int(11) NOT NULL AUTO_INCREMENT,
  `libAnalyseMedic` text DEFAULT NULL,
  `natureAnalyse` text DEFAULT NULL,
  `TypeEchantillon` varchar(15) DEFAULT NULL,
  `dateAnalyseMedic` varchar(25) DEFAULT NULL,
  `datePrelevement` date DEFAULT NULL,
  `dateReception` date DEFAULT NULL,
  `NomPreleveur` varchar(25) DEFAULT NULL,
  `fraisAnalyse` float DEFAULT NULL,
  `idPatient` int(11) DEFAULT NULL,
  `idTechnicien` int(11) DEFAULT NULL,
  `id` int(11) DEFAULT NULL,
  `idTypeAnalyse` int(11) NOT NULL,
  `idt` int(11) DEFAULT NULL,
  PRIMARY KEY (`idAnalyseMedic`),
  KEY `FK_ANALYSE_MEDICALE_idPatient` (`idPatient`),
  KEY `FK_ANALYSE_MEDICALE_id` (`id`),
  KEY `FK_ANALYSE_MEDICALE_idTypeAnalyse` (`idTypeAnalyse`),
  KEY `FK_ANALYSE_MEDICALE_idTechnicie` (`idTechnicien`),
  CONSTRAINT `FK_ANALYSE_MEDICALE_id` FOREIGN KEY (`id`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_ANALYSE_MEDICALE_idPatient` FOREIGN KEY (`idPatient`) REFERENCES `patient` (`idPatient`),
  CONSTRAINT `FK_ANALYSE_MEDICALE_idTechnicie` FOREIGN KEY (`idTechnicien`) REFERENCES `technicien` (`idTechnicien`),
  CONSTRAINT `FK_ANALYSE_MEDICALE_idTechnicien` FOREIGN KEY (`idTechnicien`) REFERENCES `technicien` (`idTechnicien`),
  CONSTRAINT `FK_ANALYSE_MEDICALE_idTypeAnalyse` FOREIGN KEY (`idTypeAnalyse`) REFERENCES `type_analyse` (`idTypeAnalyse`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Export de données de la table gesclinic.analyse_medicale : ~6 rows (environ)
/*!40000 ALTER TABLE `analyse_medicale` DISABLE KEYS */;
INSERT INTO `analyse_medicale` (`idAnalyseMedic`, `libAnalyseMedic`, `natureAnalyse`, `TypeEchantillon`, `dateAnalyseMedic`, `datePrelevement`, `dateReception`, `NomPreleveur`, `fraisAnalyse`, `idPatient`, `idTechnicien`, `id`, `idTypeAnalyse`, `idt`) VALUES
	(1, 'spermogramme', 'Sang , ', NULL, '2017-09-2', '2017-09-03', NULL, '', 6500, 1, 1, 1, 1, NULL),
	(2, 'spermogramme', '', NULL, '2017-09-2', '2017-09-03', '2017-09-20', 'bambino', 4000, 1, NULL, 32, 1, NULL),
	(3, 'CU', 'Biologie , Imagerie , ', NULL, '2017-09-5', '2017-09-06', '2017-09-08', 'essowavana', 4200, 3, NULL, 1, 1, NULL),
	(5, 'Glycemie', 'Imagerie , ', NULL, '2017-09-5', '2017-09-06', NULL, '', NULL, 2, NULL, 1, 1, NULL),
	(6, 'scanner', 'Imagerie , ', NULL, '2017-09-8', '2017-09-06', '2017-09-14', 'dobila', 4000, 3, 2, 1, 1, NULL),
	(7, 'sels, Hémophorèse', 'Sang , Biologie , ', NULL, '2017-09-6', '2017-09-06', NULL, '', 4000, 3, 2, 1, 1, NULL);
/*!40000 ALTER TABLE `analyse_medicale` ENABLE KEYS */;

-- Export de la structure de la table gesclinic. antecedant
DROP TABLE IF EXISTS `antecedant`;
CREATE TABLE IF NOT EXISTS `antecedant` (
  `idAntecedent` int(11) NOT NULL AUTO_INCREMENT,
  `descripAntec` text DEFAULT NULL,
  `familiaux` varchar(25) DEFAULT NULL,
  `medicaux` varchar(25) DEFAULT NULL,
  `chirurgicaux` varchar(25) DEFAULT NULL,
  `obstetriques` varchar(25) DEFAULT NULL,
  `gestite` varchar(25) DEFAULT NULL,
  `parite` varchar(25) DEFAULT NULL,
  `avortement` varchar(25) DEFAULT NULL,
  `agePremRegle` int(11) DEFAULT NULL,
  `dysmenorrhe` varchar(25) DEFAULT NULL,
  `syndromeIntMenstru` varchar(25) DEFAULT NULL,
  `doulPelvienne` varchar(25) DEFAULT NULL,
  `dyspareunie` varchar(25) DEFAULT NULL,
  `leucorrhees` varchar(25) DEFAULT NULL,
  `trtSterilite` varchar(25) DEFAULT NULL,
  `contrception` varchar(25) DEFAULT NULL,
  `methContracep` varchar(25) DEFAULT NULL,
  `dureContrac` int(11) DEFAULT NULL,
  `autreAffectGyne` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`idAntecedent`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Export de données de la table gesclinic.antecedant : ~0 rows (environ)
/*!40000 ALTER TABLE `antecedant` DISABLE KEYS */;
/*!40000 ALTER TABLE `antecedant` ENABLE KEYS */;

-- Export de la structure de la table gesclinic. assurance
DROP TABLE IF EXISTS `assurance`;
CREATE TABLE IF NOT EXISTS `assurance` (
  `idAssurance` int(11) NOT NULL AUTO_INCREMENT,
  `nomAssurance` varchar(25) DEFAULT NULL,
  `adrAssurance` varchar(25) DEFAULT NULL,
  `telAssurance` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`idAssurance`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Export de données de la table gesclinic.assurance : ~3 rows (environ)
/*!40000 ALTER TABLE `assurance` DISABLE KEYS */;
INSERT INTO `assurance` (`idAssurance`, `nomAssurance`, `adrAssurance`, `telAssurance`) VALUES
	(1, 'ACA', 'AGOE', '22111310'),
	(2, 'SAHAM', 'CACAVELI', '22223300'),
	(3, 'SUNU', 'AGBALEPEDO', '90332211');
/*!40000 ALTER TABLE `assurance` ENABLE KEYS */;

-- Export de la structure de la table gesclinic. auth_assignment
DROP TABLE IF EXISTS `auth_assignment`;
CREATE TABLE IF NOT EXISTS `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Export de données de la table gesclinic.auth_assignment : ~2 rows (environ)
/*!40000 ALTER TABLE `auth_assignment` DISABLE KEYS */;
INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
	('Gestion de Patient', '1', 1508833553),
	('updatePost', '1', 1508833548);
/*!40000 ALTER TABLE `auth_assignment` ENABLE KEYS */;

-- Export de la structure de la table gesclinic. auth_item
DROP TABLE IF EXISTS `auth_item`;
CREATE TABLE IF NOT EXISTS `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`),
  CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Export de données de la table gesclinic.auth_item : ~59 rows (environ)
/*!40000 ALTER TABLE `auth_item` DISABLE KEYS */;
INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/admin/*', 2, NULL, NULL, NULL, 1508782820, 1508782820),
	('/admin/assignment/*', 2, NULL, NULL, NULL, 1508782855, 1508782855),
	('/admin/assignment/assign', 2, NULL, NULL, NULL, 1508782802, 1508782802),
	('/admin/assignment/index', 2, NULL, NULL, NULL, 1508782763, 1508782763),
	('/admin/assignment/revoke', 2, NULL, NULL, NULL, 1508782806, 1508782806),
	('/admin/assignment/view', 2, NULL, NULL, NULL, 1508782858, 1508782858),
	('/admin/default/*', 2, NULL, NULL, NULL, 1508782631, 1508782631),
	('/admin/default/index', 2, NULL, NULL, NULL, 1508782634, 1508782634),
	('/admin/menu/*', 2, NULL, NULL, NULL, 1508782849, 1508782849),
	('/admin/menu/create', 2, NULL, NULL, NULL, 1508782876, 1508782876),
	('/admin/menu/index', 2, NULL, NULL, NULL, 1508782912, 1508782912),
	('/admin/menu/update', 2, NULL, NULL, NULL, 1508782844, 1508782844),
	('/admin/menu/view', 2, NULL, NULL, NULL, 1508782798, 1508782798),
	('/admin/permission/*', 2, NULL, NULL, NULL, 1508782871, 1508782871),
	('/admin/permission/assign', 2, NULL, NULL, NULL, 1508782835, 1508782835),
	('/admin/permission/create', 2, NULL, NULL, NULL, 1508782833, 1508782833),
	('/admin/permission/delete', 2, NULL, NULL, NULL, 1508782658, 1508782658),
	('/admin/permission/index', 2, NULL, NULL, NULL, 1508782640, 1508782640),
	('/admin/permission/remove', 2, NULL, NULL, NULL, 1508782940, 1508782940),
	('/admin/permission/update', 2, NULL, NULL, NULL, 1508782839, 1508782839),
	('/admin/permission/view', 2, NULL, NULL, NULL, 1508782777, 1508782777),
	('/admin/role/*', 2, NULL, NULL, NULL, 1508782655, 1508782655),
	('/admin/role/assign', 2, NULL, NULL, NULL, 1508782655, 1508782655),
	('/admin/role/create', 2, NULL, NULL, NULL, 1508782655, 1508782655),
	('/admin/role/delete', 2, NULL, NULL, NULL, 1508782655, 1508782655),
	('/admin/role/index', 2, NULL, NULL, NULL, 1508782655, 1508782655),
	('/admin/role/remove', 2, NULL, NULL, NULL, 1508782655, 1508782655),
	('/admin/role/update', 2, NULL, NULL, NULL, 1508782655, 1508782655),
	('/admin/role/view', 2, NULL, NULL, NULL, 1508782655, 1508782655),
	('/admin/route/*', 2, NULL, NULL, NULL, 1508782880, 1508782880),
	('/admin/route/assign', 2, NULL, NULL, NULL, 1508782899, 1508782899),
	('/admin/route/create', 2, NULL, NULL, NULL, 1508782792, 1508782792),
	('/admin/route/index', 2, NULL, NULL, NULL, 1508782869, 1508782869),
	('/admin/route/refresh', 2, NULL, NULL, NULL, 1508782902, 1508782902),
	('/admin/route/remove', 2, NULL, NULL, NULL, 1508782789, 1508782789),
	('/admin/rule/*', 2, NULL, NULL, NULL, 1508782823, 1508782823),
	('/admin/rule/create', 2, NULL, NULL, NULL, 1508782864, 1508782864),
	('/admin/rule/index', 2, NULL, NULL, NULL, 1508782905, 1508782905),
	('/admin/rule/update', 2, NULL, NULL, NULL, 1508782920, 1508782920),
	('/admin/rule/view', 2, NULL, NULL, NULL, 1508782866, 1508782866),
	('/admin/user/*', 2, NULL, NULL, NULL, 1508782816, 1508782816),
	('/admin/user/activate', 2, NULL, NULL, NULL, 1508782813, 1508782813),
	('/admin/user/delete', 2, NULL, NULL, NULL, 1508782891, 1508782891),
	('/admin/user/index', 2, NULL, NULL, NULL, 1508782925, 1508782925),
	('/admin/user/login', 2, NULL, NULL, NULL, 1508782772, 1508782772),
	('/admin/user/logout', 2, NULL, NULL, NULL, 1508782937, 1508782937),
	('/admin/user/request-password-reset', 2, NULL, NULL, NULL, 1508782768, 1508782768),
	('/admin/user/signup', 2, NULL, NULL, NULL, 1508782786, 1508782786),
	('/admin/user/view', 2, NULL, NULL, NULL, 1508782927, 1508782927),
	('/auth/*', 2, NULL, NULL, NULL, 1508782808, 1508782808),
	('/auth/default/*', 2, NULL, NULL, NULL, 1508782758, 1508782758),
	('/auth/default/index', 2, NULL, NULL, NULL, 1508782914, 1508782914),
	('Admin', 1, 'Administrateur de l\'application', NULL, NULL, 1508836386, 1508836386),
	('Docteur', 1, 'Chef de la clinique', NULL, NULL, 1508784429, 1508784429),
	('Gestion de Patient', 2, 'gérer les patients', NULL, NULL, 1508833296, 1508833296),
	('Infirmier', 1, 'personnel soigant', NULL, NULL, 1508836355, 1508836355),
	('Secretaire', 1, 'chargé de saisi', NULL, NULL, 1508836303, 1508836303),
	('updateOwnPost', 2, 'modifier sa propre post', 'Author', NULL, 1508782734, 1508783460),
	('updatePost', 2, 'modifier post', NULL, NULL, 1508782448, 1508782448);
/*!40000 ALTER TABLE `auth_item` ENABLE KEYS */;

-- Export de la structure de la table gesclinic. auth_item_child
DROP TABLE IF EXISTS `auth_item_child`;
CREATE TABLE IF NOT EXISTS `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Export de données de la table gesclinic.auth_item_child : ~4 rows (environ)
/*!40000 ALTER TABLE `auth_item_child` DISABLE KEYS */;
INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
	('Admin', '/admin/assignment/*'),
	('Admin', 'Docteur'),
	('Admin', 'updateOwnPost'),
	('updateOwnPost', 'updatePost');
/*!40000 ALTER TABLE `auth_item_child` ENABLE KEYS */;

-- Export de la structure de la table gesclinic. auth_rule
DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE IF NOT EXISTS `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Export de données de la table gesclinic.auth_rule : ~4 rows (environ)
/*!40000 ALTER TABLE `auth_rule` DISABLE KEYS */;
INSERT INTO `auth_rule` (`name`, `data`, `created_at`, `updated_at`) VALUES
	('admin', _binary 0x4F3A32393A226261636B656E645C636F6D706F6E656E74735C417574686F7252756C65223A333A7B733A343A226E616D65223B733A353A2261646D696E223B733A393A22637265617465644174223B693A313530383738323333373B733A393A22757064617465644174223B693A313530383738323333373B7D, 1508782337, 1508782337),
	('Author', _binary 0x4F3A32393A226261636B656E645C636F6D706F6E656E74735C417574686F7252756C65223A333A7B733A343A226E616D65223B733A363A22417574686F72223B733A393A22637265617465644174223B693A313530383738323336313B733A393A22757064617465644174223B693A313530383738323336313B7D, 1508782361, 1508782361),
	('Docteur', _binary 0x4F3A32393A226261636B656E645C636F6D706F6E656E74735C417574686F7252756C65223A333A7B733A343A226E616D65223B733A373A22446F6374657572223B733A393A22637265617465644174223B693A313530383833333632383B733A393A22757064617465644174223B693A313530383833333632383B7D, 1508833628, 1508833628),
	('Soignant', _binary 0x4F3A32393A226261636B656E645C636F6D706F6E656E74735C417574686F7252756C65223A333A7B733A343A226E616D65223B733A383A22536F69676E616E74223B733A393A22637265617465644174223B693A313530383833333631313B733A393A22757064617465644174223B693A313530383833333631313B7D, 1508833611, 1508833611);
/*!40000 ALTER TABLE `auth_rule` ENABLE KEYS */;

-- Export de la structure de la table gesclinic. avoirantec
DROP TABLE IF EXISTS `avoirantec`;
CREATE TABLE IF NOT EXISTS `avoirantec` (
  `dateDebut` date DEFAULT NULL,
  `dateFin` date DEFAULT NULL,
  `idPatient` int(11) NOT NULL,
  `idAntecedent` int(11) NOT NULL,
  PRIMARY KEY (`idPatient`,`idAntecedent`),
  KEY `FK_avoirAntec_idAntecedent` (`idAntecedent`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Export de données de la table gesclinic.avoirantec : ~0 rows (environ)
/*!40000 ALTER TABLE `avoirantec` DISABLE KEYS */;
/*!40000 ALTER TABLE `avoirantec` ENABLE KEYS */;

-- Export de la structure de la table gesclinic. branche
DROP TABLE IF EXISTS `branche`;
CREATE TABLE IF NOT EXISTS `branche` (
  `BRANCH_ID` int(11) NOT NULL AUTO_INCREMENT,
  `COMPANY_ID` int(11) DEFAULT NULL,
  `BRANCH_NAME` longtext DEFAULT NULL,
  `BRANCH_ADDRESS` longtext DEFAULT NULL,
  `BRANCH_CREATED_DATE` datetime DEFAULT NULL,
  `BRANCHE_STATUS` tinyint(1) DEFAULT NULL,
  `ATTRIBUT_15` char(10) DEFAULT NULL,
  PRIMARY KEY (`BRANCH_ID`),
  KEY `FK_RELATION_2` (`COMPANY_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Export de données de la table gesclinic.branche : 3 rows
/*!40000 ALTER TABLE `branche` DISABLE KEYS */;
INSERT INTO `branche` (`BRANCH_ID`, `COMPANY_ID`, `BRANCH_NAME`, `BRANCH_ADDRESS`, `BRANCH_CREATED_DATE`, `BRANCHE_STATUS`, `ATTRIBUT_15`) VALUES
	(1, 10, 'PEMIUM', 'Lome', '2017-07-17 12:07:35', NULL, NULL),
	(2, 11, 'srilanka', 'Mango', '2017-07-18 02:07:53', NULL, NULL),
	(3, 12, 'corrée du nord', 'sokode', '2017-07-18 02:07:21', NULL, NULL);
/*!40000 ALTER TABLE `branche` ENABLE KEYS */;

-- Export de la structure de la table gesclinic. categorie
DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `idCategorie` int(11) NOT NULL AUTO_INCREMENT,
  `libCategorie` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`idCategorie`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Export de données de la table gesclinic.categorie : ~4 rows (environ)
/*!40000 ALTER TABLE `categorie` DISABLE KEYS */;
INSERT INTO `categorie` (`idCategorie`, `libCategorie`) VALUES
	(1, 'DOCTEUR'),
	(2, 'INFIRMIER'),
	(3, 'SAGE FEMME'),
	(4, 'Techniciens');
/*!40000 ALTER TABLE `categorie` ENABLE KEYS */;

-- Export de la structure de la table gesclinic. categoriechbr
DROP TABLE IF EXISTS `categoriechbr`;
CREATE TABLE IF NOT EXISTS `categoriechbr` (
  `idCategChambre` int(11) NOT NULL AUTO_INCREMENT,
  `idHospitalise` int(11) DEFAULT NULL,
  `libCategorieChbr` varchar(25) DEFAULT NULL,
  `prixCateg` float DEFAULT NULL,
  PRIMARY KEY (`idCategChambre`),
  KEY `FK_CATEGORIECHBR_idHospitalise` (`idHospitalise`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Export de données de la table gesclinic.categoriechbr : ~8 rows (environ)
/*!40000 ALTER TABLE `categoriechbr` DISABLE KEYS */;
INSERT INTO `categoriechbr` (`idCategChambre`, `idHospitalise`, `libCategorieChbr`, `prixCateg`) VALUES
	(1, 1, 'CATEGORIE2', 15000),
	(2, 1, 'CATEGORIE1', 21000),
	(3, 1, 'CATEGORIE3', 10000),
	(4, 1, 'CATEGORIE4', 7000),
	(5, 2, 'CATEGORIE1', 20000),
	(6, 2, 'CATEGORIE2', 14000),
	(7, 2, 'CATEGORIE3', 9000),
	(8, 2, 'CATEGORIE4', 6000)
	(9, 1, 'MEDECINE', 9000),
	(10, 1, 'CHIRURGIE', 10000),
	(11, 2, 'CLIMATISEE', 7500),
	(12, 2, 'VENTILEE', 5000);
/*!40000 ALTER TABLE `categoriechbr` ENABLE KEYS */;

-- Export de la structure de la table gesclinic. chambre
DROP TABLE IF EXISTS `chambre`;
CREATE TABLE IF NOT EXISTS `chambre` (
  `idChambre` int(11) NOT NULL AUTO_INCREMENT,
  `libChambre` varchar(25) DEFAULT NULL,
  `nbreLit` int(11) DEFAULT NULL,
  `prixChambre` float DEFAULT NULL,
  `idCategChambre` int(11) DEFAULT NULL,
  PRIMARY KEY (`idChambre`),
  KEY `FK_CHAMBRE_idCategChambre` (`idCategChambre`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Export de données de la table gesclinic.chambre : ~4 rows (environ)
/*!40000 ALTER TABLE `chambre` DISABLE KEYS */;
INSERT INTO `chambre` (`idChambre`, `libChambre`, `nbreLit`, `prixChambre`, `idCategChambre`) VALUES
	(4, 'chambre 06 R+1', 6, 10000, 3),
	(6, 'chambre 2 rez', 3, 9000, 7),
	(7, 'chambre 02 R+1', 11, 10000, 3),
	(8, 'chambre 06 R+1', 6, 21000, 2)
	(9, 'ALEDJO', 4, 7500, 11),
	(10, 'ALEDJO', 4, 5000, 12),
	(11, '14-16-21-23', 2, 7500, 11),
	(12, '14-16-21-23', 2, 5000, 12),
	(13, '11-12-17-22-24-25-26-27', 1, 7500, 11),
	(14, '11-12-17-22-24-25-26-27', 1, 5000, 12);
/*!40000 ALTER TABLE `chambre` ENABLE KEYS */;

-- Export de la structure de la table gesclinic. companies
DROP TABLE IF EXISTS `companies`;
CREATE TABLE IF NOT EXISTS `companies` (
  `COMPANY_ID` int(11) NOT NULL AUTO_INCREMENT,
  `COMPANY_NAME` varchar(1024) DEFAULT NULL,
  `COMPANY_MAIL` varchar(1024) DEFAULT NULL,
  `company_start_date` date NOT NULL,
  `COMPANY_CREATED` datetime DEFAULT NULL,
  `COMPANY_STATUS` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`COMPANY_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Export de données de la table gesclinic.companies : 4 rows
/*!40000 ALTER TABLE `companies` DISABLE KEYS */;
INSERT INTO `companies` (`COMPANY_ID`, `COMPANY_NAME`, `COMPANY_MAIL`, `company_start_date`, `COMPANY_CREATED`, `COMPANY_STATUS`) VALUES
	(1, 'Comp1', 'comp@ya.com', '0000-00-00', '2017-03-30 02:03:39', NULL),
	(10, 'Comp1', 'comp@ya.com', '0000-00-00', '2017-03-30 02:03:39', NULL),
	(11, 'cheval blanc', 'cheva@blanc.com', '2017-07-12', '2017-07-13 00:00:00', NULL),
	(12, 'ETRAB', 'etrab@gmail.com', '2017-07-07', '2017-07-13 00:00:00', NULL);
/*!40000 ALTER TABLE `companies` ENABLE KEYS */;

-- Export de la structure de la table gesclinic. concerner
DROP TABLE IF EXISTS `concerner`;
CREATE TABLE IF NOT EXISTS `concerner` (
  `dateSortie` date DEFAULT NULL,
  `dateEntre` date DEFAULT NULL,
  `motif` text DEFAULT NULL,
  `diagnostique` text DEFAULT NULL,
  `traitement` text DEFAULT NULL,
  `evolution` varchar(255) DEFAULT NULL,
  `idModeSortie` int(11) NOT NULL,
  `idPatient` int(11) NOT NULL,
  PRIMARY KEY (`idModeSortie`,`idPatient`),
  KEY `FK_concerner_idPatient` (`idPatient`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Export de données de la table gesclinic.concerner : ~0 rows (environ)
/*!40000 ALTER TABLE `concerner` DISABLE KEYS */;
/*!40000 ALTER TABLE `concerner` ENABLE KEYS */;

-- Export de la structure de la table gesclinic. consultation
DROP TABLE IF EXISTS `consultation`;
CREATE TABLE IF NOT EXISTS `consultation` (
  `idConsultation` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) DEFAULT NULL,
  `dateconsultation` date DEFAULT NULL,
  `daterendezVous` date DEFAULT NULL,
  `descriptionConsulation` text DEFAULT NULL,
  `motifConsul` varchar(25) DEFAULT NULL,
  `chargeAssurance` float DEFAULT NULL,
  `chargePatient` float DEFAULT NULL,
  `fraisConsulation` float DEFAULT NULL,
  `temperature` float DEFAULT NULL,
  `poids` float DEFAULT NULL,
  `taille` float NOT NULL,
  `etatGene` varchar(25) DEFAULT NULL,
  `pouls` varchar(10) DEFAULT NULL,
  `tension` float NOT NULL,
  `muqueuse` varchar(25) DEFAULT NULL,
  `coeur` varchar(25) DEFAULT NULL,
  `poumon` varchar(25) DEFAULT NULL,
  `appdigestif` varchar(25) DEFAULT NULL,
  `autreAppareil` varchar(25) DEFAULT NULL,
  `idPatient` int(11) DEFAULT NULL,
  `idSoignant` int(11) DEFAULT NULL,
  `idConsultation_TYPECONSULTATION` int(11) DEFAULT NULL,
  `refRecu` int(11) DEFAULT NULL,
  `dateCreation` date DEFAULT NULL,
  `dateModification` date DEFAULT NULL,
  PRIMARY KEY (`idConsultation`),
  KEY `FK_CONSULTATION_idPatient` (`idPatient`),
  KEY `FK_CONSULTATION_idSoignant` (`idSoignant`),
  KEY `FK_CONSULTATION_idConsultation_TYPECONSULTATION` (`idConsultation_TYPECONSULTATION`),
  KEY `FK_CONSULTATION_refRecu` (`refRecu`),
  KEY `FK_consultation_id` (`id`),
  CONSTRAINT `FK_consultation_id` FOREIGN KEY (`id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- Export de données de la table gesclinic.consultation : ~14 rows (environ)
/*!40000 ALTER TABLE `consultation` DISABLE KEYS */;
INSERT INTO `consultation` (`idConsultation`, `id`, `dateconsultation`, `daterendezVous`, `descriptionConsulation`, `motifConsul`, `chargeAssurance`, `chargePatient`, `fraisConsulation`, `temperature`, `poids`, `taille`, `etatGene`, `pouls`, `tension`, `muqueuse`, `coeur`, `poumon`, `appdigestif`, `autreAppareil`, `idPatient`, `idSoignant`, `idConsultation_TYPECONSULTATION`, `refRecu`, `dateCreation`, `dateModification`) VALUES
	(1, NULL, '2017-07-13', '2017-07-20', 'maux de tête, courbatures, corps chaudbbbbbbbbbbbbbcccccccccccccccc', 'soupson de paludisme', NULL, 0, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1, 1, 4, NULL, '0000-00-00', '0000-00-00'),
	(2, NULL, '2017-07-06', '2017-07-19', 'vomissement, fatigue générale', 'fièvre', NULL, 0, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1, 1, 2, NULL, '0000-00-00', '0000-00-00'),
	(3, NULL, '2017-07-12', '2017-07-15', 'fatigue général', 'fièvre', NULL, 0, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 2, 2, 2, NULL, '0000-00-00', '0000-00-00'),
	(5, NULL, '2017-07-12', '2017-07-19', 'fatigue générale, courbature', 'soupson de paludisme', 270, 2730, 3000, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 2, 3, 3, NULL, '0000-00-00', '0000-00-00'),
	(16, 31, NULL, NULL, 'bbbbbbbbbbbbbbbbbbbbuacccccccccccccc', 'soupson de paludisme', 180, 1820, 2000, 37, 50, 1.75, '', '3', 12, 'muque', 'coeur anormal', '', '', '', 2, 2, 2, NULL, '0000-00-00', '0000-00-00'),
	(17, 31, '2017-08-08', '2017-08-16', 'buiolgyhhhh', 'fièvre', 210, 2790, 3000, 37, 50, 1.75, '', '3', 12, 'M1', 'coeur normal', '', '', '', 1, NULL, 3, NULL, '0000-00-00', '0000-00-00'),
	(18, 1, '2017-09-07', '2017-09-09', 'bbbbbbbbbbbbbbbbbbbbbbbttttttttttttttttttttttpppppppppppppppp\r\naaaaaaaaaaaaaaaaaaaaaaaaaaajjjjjjjjjjjjjjjjjjjjjjjjjjjj', 'maux de tête', 270, 2730, 3000, 37, 50, 1.69, 'normal', '5', 11, 'moyen', 'battement normal', 'apné', 'trouble digstiv', 'autrr', 2, NULL, 3, NULL, '2017-09-14', NULL),
	(19, 1, '0000-00-00', '0000-00-00', ' lzvhhyvoahcbgYTCFuvibxlhhhhSNXB', 'maux de tête', 270, 2730, 3000, 37, 50, 1.69, 'normal', '5', 11, 'moyen', 'battement normal', 'apné', 'trouble digstiv', 'autrr', 2, NULL, 3, NULL, '2017-09-14', NULL),
	(20, 1, '2017-01-03', '2017-11-06', ' lzvhhyvoahcbgYTCFuvibxlhhhhSNXB', 'maux de tête', 270, 2730, 3000, 37, 50, 1.69, 'normal', '5', 11, 'moyen', 'battement normal', 'apné', 'trouble digstiv', 'autrr', 2, NULL, 2, NULL, '2017-09-14', NULL),
	(21, 1, '2017-09-14', '2017-09-16', 'bqghjkokooooooooooooooooooooooocv', 'paludisme', 800, 1200, 2000, 41, 25, 1.1, 'dors un peu trop', '6', 9, 'muque', 'gros', '', '', '', 3, NULL, 5, NULL, '2017-09-14', NULL),
	(22, 1, '2017-09-07', '2017-09-03', '', '', 270, 2730, 3000, 37, 50, 1.69, 'normal', '5', 11, 'moyen', 'battement normal', 'apné', 'trouble digstiv', 'autrr', 2, NULL, 3, NULL, '2017-09-14', NULL),
	(23, 1, '2017-09-16', '2017-09-04', 'vbqhsqnqpoghdbqhk ', 'maux de tête', 270, 2730, 3000, 37, 50, 1.69, 'normal', '5', 11, 'moyen', 'battement normal', 'apné', 'trouble digstiv', 'autrr', 2, NULL, 3, NULL, '2017-09-18', NULL),
	(24, 1, '2017-09-16', '2017-09-15', 'vbqhsqnqpoghdbqhk ', 'maux de tête', 270, 2730, 3000, 37, 50, 1.69, 'normal', '5', 11, 'moyen', 'battement normal', 'apné', 'trouble digstiv', 'autrr', 2, NULL, 3, NULL, '2017-09-18', NULL),
	(25, 1, '2017-10-09', '2017-10-12', 'cccccccccccccccccccccccccccccccccccccc', 'fievre', 750, 4250, 5000, 37, 50, 1.75, '', '3', 12, 'M11223', 'coeur normal', 'pmmm', '', '', 1, NULL, 2, NULL, '2017-10-05', NULL);
/*!40000 ALTER TABLE `consultation` ENABLE KEYS */;

-- Export de la structure de la table gesclinic. correspond
DROP TABLE IF EXISTS `correspond`;
CREATE TABLE IF NOT EXISTS `correspond` (
  `idSpecialite` int(11) NOT NULL,
  `idSoignant` int(11) NOT NULL,
  PRIMARY KEY (`idSpecialite`,`idSoignant`),
  KEY `FK_correspond_idSoignant` (`idSoignant`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Export de données de la table gesclinic.correspond : ~0 rows (environ)
/*!40000 ALTER TABLE `correspond` DISABLE KEYS */;
/*!40000 ALTER TABLE `correspond` ENABLE KEYS */;

-- Export de la structure de la table gesclinic. departement
DROP TABLE IF EXISTS `departement`;
CREATE TABLE IF NOT EXISTS `departement` (
  `DEPARTEMENT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `BRANCH_ID` int(11) DEFAULT NULL,
  `COMPANY_ID` int(11) DEFAULT NULL,
  `DEPARTEMENT_NAME` varchar(1024) DEFAULT NULL,
  `DEPARTEMENT_CREATED_DATE` datetime DEFAULT NULL,
  `DEPARTEMENT_STATUS` tinyint(1) DEFAULT NULL,
  `ATTRIBUT_16` char(10) DEFAULT NULL,
  PRIMARY KEY (`DEPARTEMENT_ID`),
  KEY `FK_RELATION_3` (`COMPANY_ID`),
  KEY `FK_RELATION_4` (`BRANCH_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Export de données de la table gesclinic.departement : 1 rows
/*!40000 ALTER TABLE `departement` DISABLE KEYS */;
INSERT INTO `departement` (`DEPARTEMENT_ID`, `BRANCH_ID`, `COMPANY_ID`, `DEPARTEMENT_NAME`, `DEPARTEMENT_CREATED_DATE`, `DEPARTEMENT_STATUS`, `ATTRIBUT_16`) VALUES
	(1, 1, 1, 'FDS', '2017-07-17 12:07:29', NULL, NULL);
/*!40000 ALTER TABLE `departement` ENABLE KEYS */;

-- Export de la structure de la table gesclinic. detaildonnesoins
DROP TABLE IF EXISTS `detaildonnesoins`;
CREATE TABLE IF NOT EXISTS `detaildonnesoins` (
  `iddonnesoins` int(11) DEFAULT NULL,
  `idsoins` int(11) DEFAULT NULL,
  `coutunisoins` int(11) DEFAULT NULL,
  `dose` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Export de données de la table gesclinic.detaildonnesoins : ~5 rows (environ)
/*!40000 ALTER TABLE `detaildonnesoins` DISABLE KEYS */;
INSERT INTO `detaildonnesoins` (`iddonnesoins`, `idsoins`, `coutunisoins`, `dose`) VALUES
	(43, 1, 4500, 1),
	(43, 10, 8000, 2),
	(43, 9, 9000, 2),
	(44, 1, 4500, 5),
	(44, 9, 9000, 6);
/*!40000 ALTER TABLE `detaildonnesoins` ENABLE KEYS */;

-- Export de la structure de la table gesclinic. detailordonnance
DROP TABLE IF EXISTS `detailordonnance`;
CREATE TABLE IF NOT EXISTS `detailordonnance` (
  `idordonnance` int(11) DEFAULT NULL,
  `idproduit` int(11) DEFAULT NULL,
  `prixuniproduit` int(11) DEFAULT NULL,
  `qteproduit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Export de données de la table gesclinic.detailordonnance : ~4 rows (environ)
/*!40000 ALTER TABLE `detailordonnance` DISABLE KEYS */;
INSERT INTO `detailordonnance` (`idordonnance`, `idproduit`, `prixuniproduit`, `qteproduit`) VALUES
	(8, 5, 8000, 1),
	(9, 0, 2100, 1),
	(9, 6, 1750, 2),
	(9, 2, 5200, 3);
/*!40000 ALTER TABLE `detailordonnance` ENABLE KEYS */;

-- Export de la structure de la table gesclinic. donnesoins
DROP TABLE IF EXISTS `donnesoins`;
CREATE TABLE IF NOT EXISTS `donnesoins` (
  `idDonneSoins` int(11) NOT NULL AUTO_INCREMENT,
  `libSoins` text DEFAULT NULL,
  `nomSoins` text DEFAULT NULL,
  `fraisSoins` float DEFAULT NULL,
  `fraisSoinTotal` float DEFAULT NULL,
  `fraiHospAssur` float DEFAULT NULL,
  `fraiHospPat` int(11) DEFAULT NULL,
  `fraisHospitalisation` float DEFAULT NULL,
  `fraiSointPatient` float NOT NULL,
  `fraiSoinAssurance` float NOT NULL,
  `idSoignant` int(11) NOT NULL,
  `idPatient` int(11) NOT NULL,
  `idSoins` int(11) NOT NULL,
  `id` int(11) DEFAULT NULL,
  `dateModification` date DEFAULT NULL,
  `dateCreation` date DEFAULT NULL,
  PRIMARY KEY (`idDonneSoins`,`idPatient`,`idSoins`),
  KEY `FK_donneSoins_idPatient` (`idPatient`),
  KEY `FK_donneSoins_idSoins` (`idSoins`),
  KEY `FK_donnesoins_id` (`id`),
  KEY `FK_donnesoins_idSoignant` (`idSoignant`),
  CONSTRAINT `FK_Patient_idDonneSoins` FOREIGN KEY (`idPatient`) REFERENCES `patient` (`idPatient`),
  CONSTRAINT `FK_Soins_idSoins` FOREIGN KEY (`idSoins`) REFERENCES `soins` (`idSoins`),
  CONSTRAINT `FK_donnesoins_id` FOREIGN KEY (`id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

-- Export de données de la table gesclinic.donnesoins : ~26 rows (environ)
/*!40000 ALTER TABLE `donnesoins` DISABLE KEYS */;
INSERT INTO `donnesoins` (`idDonneSoins`, `libSoins`, `nomSoins`, `fraisSoins`, `fraisSoinTotal`, `fraiHospAssur`, `fraiHospPat`, `fraisHospitalisation`, `fraiSointPatient`, `fraiSoinAssurance`, `idSoignant`, `idPatient`, `idSoins`, `id`, `dateModification`, `dateCreation`) VALUES
	(16, NULL, NULL, 0, 2500, 0, 0, 0, 2275, 225, 1, 2, 6, 1, NULL, '2017-08-29'),
	(17, 'diabète  = 9000, ', 'diabète , ', 9000, 9000, 0, 0, 0, 8370, 630, 1, 1, 1, 1, '2017-09-11', NULL),
	(20, NULL, NULL, 0, 2500, 0, 0, 0, 2275, 225, 1, 2, 6, 1, NULL, '2017-08-30'),
	(21, NULL, NULL, 0, 2500, 0, 0, 0, 2275, 225, 1, 2, 6, 1, NULL, '2017-09-06'),
	(22, NULL, NULL, 0, 9000, 0, 0, 0, 8190, 810, 1, 2, 9, 1, NULL, '2017-09-06'),
	(23, NULL, NULL, 0, 58000, 0, 0, 0, 34800, 23200, 1, 3, 8, 1, NULL, '2017-09-07'),
	(24, NULL, NULL, 0, 7000, 0, 0, 0, 4200, 2800, 1, 3, 6, 1, NULL, '2017-09-07'),
	(25, 'Hernie,PV,Toux,grippe,', NULL, 0, 64500, 0, 0, 0, 58695, 5805, 1, 2, 1, 1, NULL, '2017-09-08'),
	(26, 'PV,Toux,grippe,', NULL, 0, 9500, 0, 0, 0, 8645, 855, 1, 2, 1, 1, NULL, '2017-09-08'),
	(27, 'PV,grippe,diabète,', NULL, 0, 14500, 0, 0, 0, 13485, 1015, 1, 1, 1, 1, NULL, '2017-09-08'),
	(28, 'Hemorroide  ,grippe  ,diabète  ,', NULL, 0, 16500, 0, 0, 0, 15345, 1155, 1, 1, 1, 1, NULL, '2017-09-08'),
	(29, 'Toux  , grippe  , diabète  , ', NULL, 0, 16000, 0, 0, 0, 14880, 1120, 1, 1, 1, 1, NULL, '2017-09-08'),
	(30, 'Toux  , grippe  , ', NULL, 7000, 7000, 0, 0, 0, 6510, 490, 1, 1, 1, 1, NULL, '2017-09-08'),
	(31, 'PV  , Toux  , ', NULL, 6500, 88500, 7380, 74620, 82000, 5915, 585, 1, 2, 1, 1, NULL, '2017-09-08'),
	(32, 'Hemorroide  , Toux  , ', NULL, 8500, 8500, 0, 0, 0, 7735, 765, 1, 2, 1, 1, NULL, '2017-09-08'),
	(33, 'Toux  = 4000, grippe  = 3000, ', NULL, 7000, 7000, 0, 0, 0, 6370, 630, 1, 2, 1, 1, NULL, '2017-09-08'),
	(34, 'Hemorroide  = 4500, Hernie  = 55000, Toux  = 4000, grippe  = 3000, diabète  = 9000, ', NULL, 75500, 75500, 0, 0, 0, 68705, 6795, 1, 2, 1, 1, NULL, '2017-09-08'),
	(35, 'Hemorroide  = 4500, PV  = 2500, Toux  = 4000, diabète  = 9000, ', 'Hemorroide , PV , Toux , diabète , ', 20000, 60000, 2800, 37200, 40000, 18600, 1400, 1, 1, 1, 1, NULL, '2017-09-08'),
	(36, 'Hemorroide  = 4500, PV  = 2500, ', 'Hemorroide , PV , ', 7000, 7000, 0, 0, 0, 4200, 2800, 1, 3, 1, 1, NULL, '2017-09-11'),
	(37, 'Hemorroide  = 4500, ', 'Hemorroide , ', 4500, 4500, 0, 0, 0, 4185, 315, 1, 1, 1, 1, '2017-09-12', '2017-09-12'),
	(38, 'Hemorroide  = 4500, Hernie  = 55000, PV  = 2500, ', 'Hemorroide , Hernie , PV , ', 62000, 62000, 0, 0, 0, 56420, 5580, 1, 2, 1, 1, NULL, '2017-09-12'),
	(39, 'Hemorroide  = 4500, PV  = 2500, ', 'Hemorroide , PV , ', 7000, 7000, 0, 0, 0, 4200, 2800, 1, 3, 1, 1, NULL, '2017-09-14'),
	(40, 'Hemorroide  = 4500, PV  = 2500, Toux  = 4000, ', 'Hemorroide , PV , Toux , ', 11000, 11000, 0, 0, 0, 6600, 4400, 1, 3, 1, 1, NULL, '2017-10-05'),
	(41, '', '', 0, 0, 0, 0, 0, 0, 0, 1, 2, 1, 1, NULL, '2017-12-01'),
	(43, '', '', 0, 0, 0, 0, 0, 0, 0, 1, 3, 1, 1, NULL, '2017-12-01'),
	(44, '', '', 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, NULL, '2017-12-03');
/*!40000 ALTER TABLE `donnesoins` ENABLE KEYS */;

-- Export de la structure de la table gesclinic. dossierpat
DROP TABLE IF EXISTS `dossierpat`;
CREATE TABLE IF NOT EXISTS `dossierpat` (
  `idDossier` int(11) NOT NULL AUTO_INCREMENT,
  `libDossier` varchar(25) DEFAULT NULL,
  `idPatient` int(11) DEFAULT NULL,
  PRIMARY KEY (`idDossier`),
  KEY `FK_DOSSIERPAT_idPatient` (`idPatient`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Export de données de la table gesclinic.dossierpat : ~2 rows (environ)
/*!40000 ALTER TABLE `dossierpat` DISABLE KEYS */;
INSERT INTO `dossierpat` (`idDossier`, `libDossier`, `idPatient`) VALUES
	(1, 'dossier n°1', 1),
	(2, 'dossier n°4', 2);
/*!40000 ALTER TABLE `dossierpat` ENABLE KEYS */;

-- Export de la structure de la table gesclinic. examen
DROP TABLE IF EXISTS `examen`;
CREATE TABLE IF NOT EXISTS `examen` (
  `idExamen` int(11) NOT NULL AUTO_INCREMENT,
  `libExamen` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`idExamen`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Export de données de la table gesclinic.examen : ~3 rows (environ)
/*!40000 ALTER TABLE `examen` DISABLE KEYS */;
INSERT INTO `examen` (`idExamen`, `libExamen`) VALUES
	(1, 'Examen gynecologique'),
	(2, 'Examen clinique'),
	(3, 'examens obstreticaux');
/*!40000 ALTER TABLE `examen` ENABLE KEYS */;

-- Export de la structure de la table gesclinic. examenclinique
DROP TABLE IF EXISTS `examenclinique`;
CREATE TABLE IF NOT EXISTS `examenclinique` (
  `idExamen` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) NOT NULL,
  `libExamen` varchar(25) NOT NULL,
  `dateExamen` datetime DEFAULT NULL,
  `tempExam` varchar(25) DEFAULT NULL,
  `T_A_Exam` varchar(25) DEFAULT NULL,
  `poids` varchar(25) DEFAULT NULL,
  `pouleExam` varchar(25) DEFAULT NULL,
  `etatGeneral` varchar(25) DEFAULT NULL,
  `muqeuses` varchar(25) DEFAULT NULL,
  `coeur` varchar(25) DEFAULT NULL,
  `poumon` varchar(25) DEFAULT NULL,
  `appDigest` varchar(25) DEFAULT NULL,
  `motifConsul` varchar(25) DEFAULT NULL,
  `DDR` varchar(25) DEFAULT NULL,
  `idPatient` int(11) NOT NULL,
  `idSoignant` int(11) NOT NULL DEFAULT 1,
  `idPeriode` int(11) DEFAULT NULL,
  `idParametre` int(11) NOT NULL,
  PRIMARY KEY (`idExamen`,`idSoignant`,`idPatient`),
  KEY `FK_EXAMENCLINIQUE_idPatient` (`idPatient`),
  KEY `FK_EXAMENCLINIQUE_idSoignant` (`idSoignant`),
  KEY `FK_EXAMENCLINIQUE_idPeriode` (`idPeriode`),
  KEY `FK_EXAMENCLINIQUE_idParametre` (`idParametre`),
  KEY `FK_examen_clinique_id` (`id`),
  CONSTRAINT `FK_EXAMENCLINIQUE_idParametre` FOREIGN KEY (`idParametre`) REFERENCES `parametre_patient` (`idParametre`),
  CONSTRAINT `FK_EXAMENCLINIQUE_idPatient` FOREIGN KEY (`idPatient`) REFERENCES `patient` (`idPatient`),
  CONSTRAINT `FK_EXAMENCLINIQUE_idPeriode` FOREIGN KEY (`idPeriode`) REFERENCES `periode` (`idPeriode`),
  CONSTRAINT `FK_EXAMENCLINIQUE_idSoignant` FOREIGN KEY (`idSoignant`) REFERENCES `soignant` (`idSoignant`),
  CONSTRAINT `FK_examen_clinique_id` FOREIGN KEY (`id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

-- Export de données de la table gesclinic.examenclinique : ~4 rows (environ)
/*!40000 ALTER TABLE `examenclinique` DISABLE KEYS */;
INSERT INTO `examenclinique` (`idExamen`, `id`, `libExamen`, `dateExamen`, `tempExam`, `T_A_Exam`, `poids`, `pouleExam`, `etatGeneral`, `muqeuses`, `coeur`, `poumon`, `appDigest`, `motifConsul`, `DDR`, `idPatient`, `idSoignant`, `idPeriode`, `idParametre`) VALUES
	(21, 31, 'examen clinique', '2017-08-25 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'bb', '', 1, 1, 1, 1),
	(22, 31, 'examen de contole', '2017-08-14 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'qqqqqqqqqqqqq', 'yyk', 1, 1, 1, 1),
	(23, 31, 'examen général', '2017-08-01 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'céphalés', '', 2, 1, 2, 2),
	(24, 1, 'examen post natal', '2017-09-07 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'contôle', '', 3, 1, 2, 5);
/*!40000 ALTER TABLE `examenclinique` ENABLE KEYS */;

-- Export de la structure de la table gesclinic. examengynecologique
DROP TABLE IF EXISTS `examengynecologique`;
CREATE TABLE IF NOT EXISTS `examengynecologique` (
  `idExamen` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) NOT NULL,
  `libExamen` varchar(25) NOT NULL,
  `abdomen` varchar(25) DEFAULT NULL,
  `perineEtVulve` varchar(25) DEFAULT NULL,
  `speculum` varchar(25) DEFAULT NULL,
  `toucheVaginal` varchar(25) DEFAULT NULL,
  `TR` varchar(25) DEFAULT NULL,
  `resume` text DEFAULT NULL,
  `hypotheseDiagnostique` text DEFAULT NULL,
  `examComplementaire` text DEFAULT NULL,
  `traitement` text DEFAULT NULL,
  `consigne` text DEFAULT NULL,
  `idPatient` int(11) NOT NULL,
  `idPeriode` int(11) DEFAULT NULL,
  `idSoignant` int(11) NOT NULL,
  `idParametre` int(11) NOT NULL,
  PRIMARY KEY (`idExamen`,`idPatient`,`idSoignant`),
  KEY `FK_EXAMENGYNECOLOGIQUE1_idPatient` (`idPatient`),
  KEY `FK_EXAMENGYNECOLOGIQUE1_idPeriode` (`idPeriode`),
  KEY `FK_EXAMENGYNECOLOGIQUE1_idSoignant` (`idSoignant`),
  KEY `FK_EXAMENGYNECOLOGIQUE1_id` (`id`),
  KEY `FK_EXAMENGYNECOLOGIQUE1_idParametre` (`idParametre`),
  CONSTRAINT `FK_EXAMENGYNECOLOGIQUE1_id` FOREIGN KEY (`id`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_EXAMENGYNECOLOGIQUE1_idParametre` FOREIGN KEY (`idParametre`) REFERENCES `parametre_patient` (`idParametre`),
  CONSTRAINT `FK_EXAMENGYNECOLOGIQUE1_idPatient` FOREIGN KEY (`idPatient`) REFERENCES `patient` (`idPatient`),
  CONSTRAINT `FK_EXAMENGYNECOLOGIQUE1_idPeriode` FOREIGN KEY (`idPeriode`) REFERENCES `periode` (`idPeriode`),
  CONSTRAINT `FK_EXAMENGYNECOLOGIQUE1_idSoignant` FOREIGN KEY (`idSoignant`) REFERENCES `soignant` (`idSoignant`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Export de données de la table gesclinic.examengynecologique : ~0 rows (environ)
/*!40000 ALTER TABLE `examengynecologique` DISABLE KEYS */;
INSERT INTO `examengynecologique` (`idExamen`, `id`, `libExamen`, `abdomen`, `perineEtVulve`, `speculum`, `toucheVaginal`, `TR`, `resume`, `hypotheseDiagnostique`, `examComplementaire`, `traitement`, `consigne`, `idPatient`, `idPeriode`, `idSoignant`, `idParametre`) VALUES
	(1, 1, 'infection ', 'nbbb', 'cqnmc', 'nieea', 'tv', 'gg', 'qsddfggghhh', 'hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh', 'bbbbceyyyyyyyyyyyyo', 'aaaaaaaaaaaaaaaaabbbbbbbbbbbbbbbbbbbbbbbbbbbdddddddddddp', 'vvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv', 2, 1, 1, 2);
/*!40000 ALTER TABLE `examengynecologique` ENABLE KEYS */;

-- Export de la structure de la table gesclinic. examen_obstreticaux
DROP TABLE IF EXISTS `examen_obstreticaux`;
CREATE TABLE IF NOT EXISTS `examen_obstreticaux` (
  `idExamen` int(11) NOT NULL AUTO_INCREMENT,
  `libExamen` varchar(75) NOT NULL,
  `motifConsul` text NOT NULL,
  `DDR` varchar(75) DEFAULT NULL,
  `abdomen` varchar(75) NOT NULL,
  `terme` varchar(75) DEFAULT NULL,
  `plaintes` varchar(75) DEFAULT NULL,
  `MAF` varchar(75) DEFAULT NULL,
  `TA_Pouls` varchar(25) DEFAULT NULL,
  `urines` varchar(75) DEFAULT NULL,
  `OMI` varchar(25) DEFAULT NULL,
  `HU` varchar(75) DEFAULT NULL,
  `BDC` varchar(25) DEFAULT NULL,
  `speculum` varchar(75) DEFAULT NULL,
  `TV` varchar(75) DEFAULT NULL,
  `presentation` varchar(75) DEFAULT NULL,
  `bassin` varchar(75) DEFAULT NULL,
  `analyses` varchar(75) DEFAULT NULL,
  `traitements` varchar(75) DEFAULT NULL,
  `RDV` varchar(25) DEFAULT NULL,
  `idPatient` int(11) NOT NULL,
  `idPeriode` int(11) NOT NULL,
  `idSoignant` int(11) NOT NULL,
  `idParametre` int(11) NOT NULL,
  PRIMARY KEY (`idExamen`,`idPatient`,`idSoignant`),
  KEY `FK_EXAMEN_OBSTRETICAUX_idPatient` (`idPatient`),
  KEY `FK_EXAMEN_OBSTRETICAUX_idPeriode` (`idPeriode`),
  KEY `FK_EXAMEN_OBSTRETICAUX_idSoignant` (`idSoignant`),
  KEY `FK_EXAMEN_OBSTRETICAUX_idParametre` (`idParametre`),
  CONSTRAINT `FK_EXAMEN_OBSTRETICAUX_idParametre` FOREIGN KEY (`idParametre`) REFERENCES `parametre_patient` (`idParametre`),
  CONSTRAINT `FK_EXAMEN_OBSTRETICAUX_idPatient` FOREIGN KEY (`idPatient`) REFERENCES `patient` (`idPatient`),
  CONSTRAINT `FK_EXAMEN_OBSTRETICAUX_idPeriode` FOREIGN KEY (`idPeriode`) REFERENCES `periode` (`idPeriode`),
  CONSTRAINT `FK_EXAMEN_OBSTRETICAUX_idSoignant` FOREIGN KEY (`idSoignant`) REFERENCES `soignant` (`idSoignant`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Export de données de la table gesclinic.examen_obstreticaux : ~0 rows (environ)
/*!40000 ALTER TABLE `examen_obstreticaux` DISABLE KEYS */;
/*!40000 ALTER TABLE `examen_obstreticaux` ENABLE KEYS */;

-- Export de la structure de la table gesclinic. faireexamen
DROP TABLE IF EXISTS `faireexamen`;
CREATE TABLE IF NOT EXISTS `faireexamen` (
  `idFaireExamen` int(11) NOT NULL,
  `temperExam` varchar(25) DEFAULT NULL,
  `pouls` varchar(25) DEFAULT NULL,
  `T_A_Exam` varchar(25) DEFAULT NULL,
  `poids` varchar(25) DEFAULT NULL,
  `taille` varchar(25) DEFAULT NULL,
  `etatGeneral` varchar(25) DEFAULT NULL,
  `muqueuse` varchar(25) DEFAULT NULL,
  `coeur` varchar(25) DEFAULT NULL,
  `poumon` varchar(25) DEFAULT NULL,
  `appDigest` varchar(25) DEFAULT NULL,
  `autreApp` varchar(25) DEFAULT NULL,
  `seins` varchar(25) DEFAULT NULL,
  `abdomen` varchar(25) DEFAULT NULL,
  `perinee_vulve` varchar(25) DEFAULT NULL,
  `speculum` varchar(25) DEFAULT NULL,
  `toucheVaginal` varchar(25) DEFAULT NULL,
  `tr` varchar(25) DEFAULT NULL,
  `resume` text DEFAULT NULL,
  `hypothesDiagn` text DEFAULT NULL,
  `examenComplemen` text DEFAULT NULL,
  `traitement` text DEFAULT NULL,
  `consignes` text DEFAULT NULL,
  `terme` varchar(25) DEFAULT NULL,
  `plaintes` varchar(25) DEFAULT NULL,
  `maf` varchar(25) DEFAULT NULL,
  `urines` varchar(25) DEFAULT NULL,
  `omi` varchar(25) DEFAULT NULL,
  `hu` varchar(25) DEFAULT NULL,
  `bdc` varchar(25) DEFAULT NULL,
  `tv` varchar(25) DEFAULT NULL,
  `presentation` varchar(25) DEFAULT NULL,
  `bassin` varchar(25) DEFAULT NULL,
  `analyses` varchar(25) DEFAULT NULL,
  `rdv` varchar(25) DEFAULT NULL,
  `idExamen` int(11) NOT NULL,
  `idPatient` int(11) NOT NULL,
  `idSoignant` int(11) NOT NULL,
  `idPeriode` int(11) NOT NULL,
  PRIMARY KEY (`idFaireExamen`,`idPatient`,`idSoignant`,`idPeriode`),
  KEY `FK_faireExamen_idPatient` (`idPatient`),
  KEY `FK_faireExamen_idSoignant` (`idSoignant`),
  KEY `FK_faireExamen_idPeriode` (`idPeriode`),
  KEY `idFaireExamen` (`idFaireExamen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Export de données de la table gesclinic.faireexamen : ~0 rows (environ)
/*!40000 ALTER TABLE `faireexamen` DISABLE KEYS */;
/*!40000 ALTER TABLE `faireexamen` ENABLE KEYS */;

-- Export de la structure de la table gesclinic. grossesse
DROP TABLE IF EXISTS `grossesse`;
CREATE TABLE IF NOT EXISTS `grossesse` (
  `idGrossesse` int(11) NOT NULL,
  `libGrossese` varchar(25) DEFAULT NULL,
  `anneGross` int(11) DEFAULT NULL,
  `evolutionGross` varchar(25) DEFAULT NULL,
  `modeAcouchement` varchar(25) DEFAULT NULL,
  `nbrEnfant` int(11) DEFAULT NULL,
  `idPatient` int(11) DEFAULT NULL,
  PRIMARY KEY (`idGrossesse`),
  KEY `FK_GROSSESSE_idPatient` (`idPatient`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Export de données de la table gesclinic.grossesse : ~0 rows (environ)
/*!40000 ALTER TABLE `grossesse` DISABLE KEYS */;
/*!40000 ALTER TABLE `grossesse` ENABLE KEYS */;

-- Export de la structure de la table gesclinic. hospitalisation
DROP TABLE IF EXISTS `hospitalisation`;
CREATE TABLE IF NOT EXISTS `hospitalisation` (
  `idHospitalise` int(11) NOT NULL,
  `libHospitalisation` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idHospitalise`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Export de données de la table gesclinic.hospitalisation : ~2 rows (environ)
/*!40000 ALTER TABLE `hospitalisation` DISABLE KEYS */;
INSERT INTO `hospitalisation` (`idHospitalise`, `libHospitalisation`) VALUES
	(1, 'hospitalisation chirurgique'),
	(2, 'hospitalisation medecine');
/*!40000 ALTER TABLE `hospitalisation` ENABLE KEYS */;

-- Export de la structure de la table gesclinic. menu
DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `route` varchar(255) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `data` blob DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `parent` (`parent`),
  CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `menu` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Export de données de la table gesclinic.menu : ~0 rows (environ)
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;

-- Export de la structure de la table gesclinic. migration
DROP TABLE IF EXISTS `migration`;
CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Export de données de la table gesclinic.migration : 10 rows
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;
INSERT INTO `migration` (`version`, `apply_time`) VALUES
	('m000000_000000_base', 1487686121),
	('m130524_201442_init', 1487686629),
	('m140506_102106_rbac_init', 1501747879),
	('m140602_111327_create_menu_table', 1506334936),
	('m160312_050000_create_user', 1506334936),
	('m171012_162331_rbac_init', 1507996790),
	('m171014_154457_creat_post', 1507996790),
	('m171014_171512_creat_post', 1508001817),
	('m171014_172055_creat_post', 1508001817),
	('m171014_172521_creat_post', 1508002629);
/*!40000 ALTER TABLE `migration` ENABLE KEYS */;

-- Export de la structure de la table gesclinic. mode_sortie
DROP TABLE IF EXISTS `mode_sortie`;
CREATE TABLE IF NOT EXISTS `mode_sortie` (
  `idModeSortie` int(11) NOT NULL,
  `typeModeSortie` varchar(25) DEFAULT NULL,
  `libModeSortie` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`idModeSortie`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Export de données de la table gesclinic.mode_sortie : ~0 rows (environ)
/*!40000 ALTER TABLE `mode_sortie` DISABLE KEYS */;
/*!40000 ALTER TABLE `mode_sortie` ENABLE KEYS */;

-- Export de la structure de la table gesclinic. occupe
DROP TABLE IF EXISTS `occupe`;
CREATE TABLE IF NOT EXISTS `occupe` (
  `dateDebut` date DEFAULT NULL,
  `dateFin` date DEFAULT NULL,
  `numLit` int(11) DEFAULT NULL,
  `partPatient` float NOT NULL,
  `partAssurance` float NOT NULL,
  `fraisHospita` float DEFAULT NULL,
  `idChambre` int(11) NOT NULL,
  `id` int(11) DEFAULT NULL,
  `dateCreation` date DEFAULT NULL,
  `dateModification` date DEFAULT NULL,
  `idPatient` int(11) NOT NULL,
  `idHospitalise` int(11) NOT NULL,
  `idSoignant` int(11) NOT NULL,
  `statut` int(11) DEFAULT NULL,
  PRIMARY KEY (`idChambre`,`idPatient`,`idHospitalise`,`idSoignant`),
  KEY `FK_occupe_idPatient` (`idPatient`),
  KEY `FK_occupe_idHospitalise` (`idHospitalise`),
  KEY `FK_occupe_idSoignant` (`idSoignant`),
  KEY `FK_occupe_id` (`id`),
  CONSTRAINT `FK_occupe_id` FOREIGN KEY (`id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Export de données de la table gesclinic.occupe : ~6 rows (environ)
/*!40000 ALTER TABLE `occupe` DISABLE KEYS */;
INSERT INTO `occupe` (`dateDebut`, `dateFin`, `numLit`, `partPatient`, `partAssurance`, `fraisHospita`, `idChambre`, `id`, `dateCreation`, `dateModification`, `idPatient`, `idHospitalise`, `idSoignant`, `statut`) VALUES
	('2017-08-22', '2017-08-18', 1, 37200, 2800, 40000, 4, 1, '2017-08-29', NULL, 1, 1, 1, 1),
	('2017-06-01', '2017-06-02', 1, 9100, 900, 10000, 4, NULL, '0000-00-00', '0000-00-00', 2, 1, 1, 1),
	('2017-09-10', '2017-09-12', 2, 12000, 8000, 20000, 4, 1, '2017-09-14', NULL, 3, 1, 1, NULL),
	('2017-06-01', '2017-06-05', 2, 8370, 630, 9000, 6, NULL, '0000-00-00', '0000-00-00', 1, 1, 2, 1),
	('2017-07-13', '2017-07-21', 2, 65520, 6480, 72000, 6, NULL, '0000-00-00', '0000-00-00', 2, 1, 1, 1),
	('2017-05-03', '2017-06-12', 5, 8190, 810, 360000, 6, NULL, '0000-00-00', '0000-00-00', 2, 1, 2, 1);
/*!40000 ALTER TABLE `occupe` ENABLE KEYS */;

-- Export de la structure de la table gesclinic. ordonnance
DROP TABLE IF EXISTS `ordonnance`;
CREATE TABLE IF NOT EXISTS `ordonnance` (
  `idOrdonnance` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) DEFAULT NULL,
  `libProduit` text DEFAULT NULL,
  `infoProduit` text DEFAULT NULL,
  `dateCreation` date DEFAULT NULL,
  `dateModification` date DEFAULT NULL,
  `dateordonnance` date DEFAULT NULL,
  `observation` text DEFAULT NULL,
  `idPatient` int(11) NOT NULL,
  `idSoignant` int(11) NOT NULL,
  `idProduit` int(11) NOT NULL,
  PRIMARY KEY (`idOrdonnance`,`idSoignant`,`idProduit`),
  KEY `FK_ordonnance_idSoignant` (`idSoignant`),
  KEY `FK_ordonnance_idProduit` (`idProduit`),
  KEY `FK_ordonnance_id` (`id`),
  KEY `FK_ordonnance_idPatient` (`idPatient`),
  CONSTRAINT `FK_ordonnance_id` FOREIGN KEY (`id`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_ordonnance_idPatient` FOREIGN KEY (`idPatient`) REFERENCES `patient` (`idPatient`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Export de données de la table gesclinic.ordonnance : ~9 rows (environ)
/*!40000 ALTER TABLE `ordonnance` DISABLE KEYS */;
INSERT INTO `ordonnance` (`idOrdonnance`, `id`, `libProduit`, `infoProduit`, `dateCreation`, `dateModification`, `dateordonnance`, `observation`, `idPatient`, `idSoignant`, `idProduit`) VALUES
	(1, NULL, NULL, NULL, NULL, NULL, '2017-07-06', 'doit surveiller son régime', 2, 2, 2),
	(2, NULL, NULL, NULL, NULL, NULL, '2017-08-02', '', 2, 2, 2),
	(3, 1, NULL, NULL, '2017-08-30', NULL, '2017-08-15', 'bbbbbbbbbbbbbbbbbbbbbbbbjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjssssssssssssssssssssssssssss\r\neeeeeeeeeeeeeeeeeeeeeeeeeeee', 2, 1, 1),
	(4, 1, NULL, NULL, '2017-09-18', NULL, '2017-09-07', 'bfdsq', 2, 1, 1),
	(5, 1, 'Cathéter , Epiveine , SG5%250cc , ', 'Cathéter  = 4500, Epiveine  = 5200, SG5%250cc  = 950, ', '2017-09-19', NULL, '2017-09-07', 'bdttttttttttttttttttttttttttttttt\r\nddddddddddddddddddddp', 1, 1, 1),
	(6, 1, '', '', '2017-12-05', NULL, NULL, '', 3, 1, 1),
	(7, 1, '', '', '2017-12-05', NULL, '2017-12-05', 'Rien à dire', 2, 1, 1),
	(8, 1, '', '', '2017-12-05', NULL, '2017-12-05', 'Rien à dire', 2, 1, 1),
	(9, 1, '', '', '2017-12-05', NULL, '2017-12-05', 'Rien à dire', 2, 1, 1);
/*!40000 ALTER TABLE `ordonnance` ENABLE KEYS */;

-- Export de la structure de la table gesclinic. parametre_patient
DROP TABLE IF EXISTS `parametre_patient`;
CREATE TABLE IF NOT EXISTS `parametre_patient` (
  `idParametre` int(11) NOT NULL AUTO_INCREMENT,
  `tention` varchar(25) DEFAULT NULL,
  `temperature` float DEFAULT NULL,
  `poids` float DEFAULT NULL,
  `nbrEnfant` int(11) DEFAULT NULL,
  `datePrelev` date DEFAULT NULL,
  `pouls` varchar(25) DEFAULT NULL,
  `taille` double DEFAULT NULL,
  `etatGeneral` varchar(25) DEFAULT NULL,
  `muqeuses` varchar(25) DEFAULT NULL,
  `coeur` varchar(25) DEFAULT NULL,
  `poumon` varchar(25) DEFAULT NULL,
  `appDigest` varchar(25) DEFAULT NULL,
  `autreAppreil` varchar(25) DEFAULT NULL,
  `idPatient` int(11) DEFAULT NULL,
  `idSoignant` int(11) DEFAULT NULL,
  `id` int(11) DEFAULT NULL,
  `dateCreation` datetime DEFAULT NULL,
  `dateModification` datetime DEFAULT NULL,
  PRIMARY KEY (`idParametre`),
  KEY `FK_PARAMETRE_PATIENT_idPatient` (`idPatient`),
  KEY `FK_PARAMETRE_PATIENT_idSoignant` (`idSoignant`),
  KEY `FK_parametre_patient_id` (`id`),
  CONSTRAINT `FK_parametre_patient_id` FOREIGN KEY (`id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Export de données de la table gesclinic.parametre_patient : ~6 rows (environ)
/*!40000 ALTER TABLE `parametre_patient` DISABLE KEYS */;
INSERT INTO `parametre_patient` (`idParametre`, `tention`, `temperature`, `poids`, `nbrEnfant`, `datePrelev`, `pouls`, `taille`, `etatGeneral`, `muqeuses`, `coeur`, `poumon`, `appDigest`, `autreAppreil`, `idPatient`, `idSoignant`, `id`, `dateCreation`, `dateModification`) VALUES
	(1, '12', 37, 50, 3, '2017-09-14', '3', 1.75, '', 'M11223', 'coeur normal', 'pmmm', '', '', 1, 1, 1, NULL, NULL),
	(2, '12', 37, 50, 3, '2017-07-16', '3', 1.75, '', 'muque', 'coeur anormal', '', '', '', 2, 1, NULL, NULL, NULL),
	(3, '11', 36, 75, 0, '2017-07-13', '5', 1.65, '', '', '', '', '', '', 3, 2, NULL, NULL, NULL),
	(4, '11', 36, 50, 1, '2017-07-17', '5', 1.69, '', '', '', '', '', '', 3, 2, NULL, NULL, NULL),
	(5, '9', 41, 25, 5, '2017-07-17', '6', 1.1, 'dors un peu trop', 'muque', 'gros', '', '', '', 3, 2, NULL, NULL, NULL),
	(6, '11', 37, 50, 2, '2017-08-28', '5', 1.69, 'normal', 'moyen', 'battement normal', 'apné', 'trouble digstiv', 'autrr', 2, 1, 1, NULL, NULL);
/*!40000 ALTER TABLE `parametre_patient` ENABLE KEYS */;

-- Export de la structure de la table gesclinic. patient
DROP TABLE IF EXISTS `patient`;
CREATE TABLE IF NOT EXISTS `patient` (
  `idPatient` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) DEFAULT NULL,
  `nomPatient` varchar(25) DEFAULT NULL,
  `prenPatient` varchar(25) DEFAULT NULL,
  `photoPatient` varchar(255) DEFAULT NULL,
  `datNaisPatient` date DEFAULT NULL,
  `sexPatient` varchar(25) DEFAULT NULL,
  `tel1Patient` int(11) DEFAULT NULL,
  `tel2Patient` int(11) DEFAULT NULL,
  `professionPatient` varchar(25) DEFAULT NULL,
  `statutMatriPatient` varchar(25) DEFAULT NULL,
  `Gs_RhPat` varchar(25) DEFAULT NULL,
  `persAprevenir` varchar(25) DEFAULT NULL,
  `tauxAssur` decimal(10,0) DEFAULT NULL,
  `idParametre` int(11) DEFAULT NULL,
  `idAssurance` int(11) DEFAULT NULL,
  `dateCreation` date NOT NULL,
  `dateModification` date NOT NULL,
  PRIMARY KEY (`idPatient`),
  KEY `FK_PATIENT_idParametre` (`idParametre`),
  KEY `FK_PATIENT_idAssurance` (`idAssurance`),
  KEY `FK_patient_id` (`id`),
  CONSTRAINT `FK_patient_id` FOREIGN KEY (`id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- Export de données de la table gesclinic.patient : ~15 rows (environ)
/*!40000 ALTER TABLE `patient` DISABLE KEYS */;
INSERT INTO `patient` (`idPatient`, `id`, `nomPatient`, `prenPatient`, `photoPatient`, `datNaisPatient`, `sexPatient`, `tel1Patient`, `tel2Patient`, `professionPatient`, `statutMatriPatient`, `Gs_RhPat`, `persAprevenir`, `tauxAssur`, `idParametre`, `idAssurance`, `dateCreation`, `dateModification`) VALUES
	(1, NULL, 'alassani', 'salifou', NULL, '2003-02-04', '', 98956630, 90115588, 'plombier', 'Marié(e)', '9', 'camal', 15, NULL, 2, '0000-00-00', '0000-00-00'),
	(2, NULL, 'Abdoulaye', 'Rachide', '', '2000-03-10', 'M', 98956633, 93125566, 'maçon', '', '10', 'sanaaaa', 9, NULL, 3, '0000-00-00', '0000-00-00'),
	(3, NULL, 'DEUE', 'Akouvi', NULL, '2003-03-05', 'M', 90823202, NULL, 'Etudiante', 'Célibataire', '10', 'Belei', 40, NULL, 2, '0000-00-00', '0000-00-00'),
	(4, NULL, 'gabadamassi', 'razak', NULL, '2000-03-10', '0', 98956633, NULL, 'informaticien', 'marié', '12', 'camal', 45, NULL, 3, '0000-00-00', '0000-00-00'),
	(5, NULL, 'affo ', 'rakib', NULL, '2017-07-05', '0', 90823202, NULL, 'informaticien', 'celibataire', '10', 'camal', 40, NULL, 2, '0000-00-00', '0000-00-00'),
	(7, NULL, 'Dazimwè', 'Solim', NULL, NULL, '0', NULL, NULL, 'animateur', '', '', '', 55, NULL, 1, '0000-00-00', '0000-00-00'),
	(8, NULL, 'Kolani', 'soulé', NULL, NULL, '0', 91313233, NULL, '', '', '', '', 55, NULL, 2, '0000-00-00', '0000-00-00'),
	(9, NULL, 'laré', 'mondika', NULL, NULL, '1', NULL, NULL, '', '', '', '', 65, NULL, 3, '0000-00-00', '0000-00-00'),
	(10, NULL, 'Tchatakpara', 'Richala', NULL, '1998-01-05', '1', 22114455, NULL, 'Economiste', '', '', '', 45, NULL, 2, '0000-00-00', '0000-00-00'),
	(11, NULL, 'Tchalla', 'Abalo', NULL, '1996-06-11', '0', NULL, NULL, 'Etudiant', 'Célibataire', '0-', 'Tchalla esso', 40, NULL, 3, '0000-00-00', '0000-00-00'),
	(12, NULL, 'laré', 'mondika', NULL, '2000-09-01', '0', NULL, NULL, 'chauffeur', 'Marié(e)', '', '', 50, NULL, 3, '0000-00-00', '0000-00-00'),
	(13, 1, 'Kolani', 'Solim', NULL, '2000-06-13', 'M', NULL, NULL, 'Economiste', 'Marié(e)', '', '', 75, NULL, 3, '2017-09-15', '0000-00-00'),
	(14, 1, 'laré', 'Solim', 'pat_.jpg', '2017-10-01', 'F', NULL, NULL, 'Artiste', 'Célibataire', 'AB+', '', 35, NULL, 2, '2017-10-05', '0000-00-00'),
	(15, 1, 'Tchatakpara', 'soulé', 'pat_.jpg', '2017-10-01', 'F', NULL, NULL, 'Etudiant', 'Marié(e)', '0-', '', 80, NULL, 3, '2017-10-05', '0000-00-00'),
	(16, 1, 'Tchalla', 'soulé', 'pat_16.jpg', '2017-10-20', 'M', 98774411, NULL, 'Artiste', 'Marié(e)', '', '', 70, NULL, 2, '2017-10-05', '0000-00-00');
/*!40000 ALTER TABLE `patient` ENABLE KEYS */;

-- Export de la structure de la table gesclinic. periode
DROP TABLE IF EXISTS `periode`;
CREATE TABLE IF NOT EXISTS `periode` (
  `idPeriode` int(11) NOT NULL AUTO_INCREMENT,
  `libPeriode` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`idPeriode`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Export de données de la table gesclinic.periode : ~2 rows (environ)
/*!40000 ALTER TABLE `periode` DISABLE KEYS */;
INSERT INTO `periode` (`idPeriode`, `libPeriode`) VALUES
	(1, 'Deuxième mois'),
	(2, 'premier mois');
/*!40000 ALTER TABLE `periode` ENABLE KEYS */;

-- Export de la structure de la table gesclinic. post
DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Export de données de la table gesclinic.post : ~3 rows (environ)
/*!40000 ALTER TABLE `post` DISABLE KEYS */;
INSERT INTO `post` (`id`, `title`, `description`, `user_id`) VALUES
	(1, 'post 1', 'premier post', 1),
	(2, 'post 2', 'deuxième post', 24),
	(3, 'post 3', 'troisième post', 1);
/*!40000 ALTER TABLE `post` ENABLE KEYS */;

-- Export de la structure de la table gesclinic. prescrire
DROP TABLE IF EXISTS `prescrire`;
CREATE TABLE IF NOT EXISTS `prescrire` (
  `resultats` varchar(255) DEFAULT NULL,
  `observation` text NOT NULL,
  `dateAnalyse` date DEFAULT NULL,
  `idAnalyseMedic` int(11) NOT NULL,
  `idPatient` int(11) NOT NULL,
  `idSoignant` int(11) NOT NULL,
  `idTechnicien` int(11) NOT NULL,
  `partPatient` float DEFAULT NULL,
  `partAssurance` float DEFAULT NULL,
  `fraisTotal` float DEFAULT NULL,
  PRIMARY KEY (`idAnalyseMedic`,`idSoignant`,`idTechnicien`),
  KEY `FK_prescrire_idSoignant` (`idSoignant`),
  KEY `FK_prescrire_idTechnicien` (`idTechnicien`),
  KEY `FK_prescrire_idPatient` (`idPatient`),
  CONSTRAINT `FK_prescrire_idPatient` FOREIGN KEY (`idPatient`) REFERENCES `patient` (`idPatient`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Export de données de la table gesclinic.prescrire : ~0 rows (environ)
/*!40000 ALTER TABLE `prescrire` DISABLE KEYS */;
INSERT INTO `prescrire` (`resultats`, `observation`, `dateAnalyse`, `idAnalyseMedic`, `idPatient`, `idSoignant`, `idTechnicien`, `partPatient`, `partAssurance`, `fraisTotal`) VALUES
	('presence de kystecccccccc', 'b a', '2017-08-09', 1, 1, 2, 1, 3255, 245, 3500);
/*!40000 ALTER TABLE `prescrire` ENABLE KEYS */;

-- Export de la structure de la table gesclinic. produit
DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `idProduit` int(11) NOT NULL,
  `libProduit` varchar(25) DEFAULT NULL,
  `prixProduit` float NOT NULL,
  PRIMARY KEY (`idProduit`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Export de données de la table gesclinic.produit : ~7 rows (environ)
/*!40000 ALTER TABLE `produit` DISABLE KEYS */;
INSERT INTO `produit` (`idProduit`, `libProduit`, `prixProduit`) VALUES
	(0, 'arthémether', 2100),
	(1, 'Cathéter', 4500),
	(2, 'Epiveine', 5200),
	(3, 'Perfuseur', 2900),
	(4, 'SG5%250cc', 950),
	(5, 'SG5%500cc', 8000),
	(6, 'Magnésium 1g', 1750);
/*!40000 ALTER TABLE `produit` ENABLE KEYS */;

-- Export de la structure de la table gesclinic. profil
DROP TABLE IF EXISTS `profil`;
CREATE TABLE IF NOT EXISTS `profil` (
  `idprof` int(11) NOT NULL,
  `nomprof` varchar(70) NOT NULL,
  `gespat` int(10) unsigned DEFAULT NULL,
  `createpat` int(10) unsigned DEFAULT NULL,
  `createparampat` int(10) unsigned DEFAULT NULL,
  `readpat` int(10) unsigned DEFAULT NULL,
  `updatepat` int(10) unsigned DEFAULT NULL,
  `deletepat` int(10) unsigned DEFAULT NULL,
  `gescons` int(10) unsigned DEFAULT NULL,
  `createcons` int(10) unsigned DEFAULT NULL,
  `updatecons` int(10) unsigned DEFAULT NULL,
  `readcons` int(10) unsigned DEFAULT NULL,
  `printcons` int(10) unsigned DEFAULT NULL,
  `deletecons` int(10) unsigned DEFAULT NULL,
  `geshos` int(10) unsigned DEFAULT NULL,
  `createhos` int(10) unsigned DEFAULT NULL,
  `updatehos` int(10) unsigned DEFAULT NULL,
  `readhos` int(10) unsigned DEFAULT NULL,
  `deletehos` int(10) unsigned DEFAULT NULL,
  `printhos` int(10) unsigned DEFAULT NULL,
  `gessoin` int(10) unsigned DEFAULT NULL,
  `createsoin` int(10) unsigned DEFAULT NULL,
  `updatesoin` int(10) unsigned DEFAULT NULL,
  `readsoin` int(10) unsigned DEFAULT NULL,
  `deletesoin` int(10) unsigned DEFAULT NULL,
  `printsoin` int(10) unsigned DEFAULT NULL,
  `gesord` int(10) unsigned DEFAULT NULL,
  `createord` int(10) unsigned DEFAULT NULL,
  `updateord` int(10) unsigned DEFAULT NULL,
  `readord` int(10) unsigned DEFAULT NULL,
  `printord` int(10) unsigned DEFAULT NULL,
  `gesexamed` int(10) unsigned DEFAULT NULL,
  `createexamed` int(10) unsigned DEFAULT NULL,
  `updateexamed` int(10) unsigned DEFAULT NULL,
  `readexamed` int(10) unsigned DEFAULT NULL,
  `deleteexamed` int(10) unsigned DEFAULT NULL,
  `gesana` int(10) unsigned DEFAULT NULL,
  `createana` int(10) unsigned DEFAULT NULL,
  `updateana` int(10) unsigned DEFAULT NULL,
  `readana` int(10) unsigned DEFAULT NULL,
  `deleteana` int(10) unsigned DEFAULT NULL,
  `printana` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`idprof`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Export de données de la table gesclinic.profil : ~2 rows (environ)
/*!40000 ALTER TABLE `profil` DISABLE KEYS */;
INSERT INTO `profil` (`idprof`, `nomprof`, `gespat`, `createpat`, `createparampat`, `readpat`, `updatepat`, `deletepat`, `gescons`, `createcons`, `updatecons`, `readcons`, `printcons`, `deletecons`, `geshos`, `createhos`, `updatehos`, `readhos`, `deletehos`, `printhos`, `gessoin`, `createsoin`, `updatesoin`, `readsoin`, `deletesoin`, `printsoin`, `gesord`, `createord`, `updateord`, `readord`, `printord`, `gesexamed`, `createexamed`, `updateexamed`, `readexamed`, `deleteexamed`, `gesana`, `createana`, `updateana`, `readana`, `deleteana`, `printana`) VALUES
	(1, 'Administrateur', 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL),
	(2, 'Medecin', 1, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `profil` ENABLE KEYS */;

-- Export de la structure de la table gesclinic. recu
DROP TABLE IF EXISTS `recu`;
CREATE TABLE IF NOT EXISTS `recu` (
  `refRecu` int(11) NOT NULL,
  `typeRecu` varchar(25) DEFAULT NULL,
  `montantRecu` float DEFAULT NULL,
  `dateRecu` date DEFAULT NULL,
  `idPatient` int(11) DEFAULT NULL,
  `idConsultation` int(11) DEFAULT NULL,
  PRIMARY KEY (`refRecu`),
  KEY `FK_RECU_idPatient` (`idPatient`),
  KEY `FK_RECU_idConsultation` (`idConsultation`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Export de données de la table gesclinic.recu : ~0 rows (environ)
/*!40000 ALTER TABLE `recu` DISABLE KEYS */;
/*!40000 ALTER TABLE `recu` ENABLE KEYS */;

-- Export de la structure de la table gesclinic. resultat
DROP TABLE IF EXISTS `resultat`;
CREATE TABLE IF NOT EXISTS `resultat` (
  `idResultat` int(11) NOT NULL,
  `libResultat` varchar(75) NOT NULL,
  `descriptionResul` text DEFAULT NULL,
  PRIMARY KEY (`idResultat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Export de données de la table gesclinic.resultat : ~0 rows (environ)
/*!40000 ALTER TABLE `resultat` DISABLE KEYS */;
/*!40000 ALTER TABLE `resultat` ENABLE KEYS */;

-- Export de la structure de la table gesclinic. soignant
DROP TABLE IF EXISTS `soignant`;
CREATE TABLE IF NOT EXISTS `soignant` (
  `idSoignant` int(11) NOT NULL AUTO_INCREMENT,
  `nomSoigant` varchar(25) DEFAULT NULL,
  `idSpecialite` int(11) DEFAULT NULL,
  `prenomSoigant` varchar(25) DEFAULT NULL,
  `password` varchar(80) DEFAULT NULL,
  `username` varchar(80) DEFAULT NULL,
  `adrSoignant` varchar(25) DEFAULT NULL,
  `telSoignant` varchar(25) DEFAULT NULL,
  `idCategorie` int(11) DEFAULT NULL,
  PRIMARY KEY (`idSoignant`),
  KEY `FK_SOIGNANT_idCategorie` (`idCategorie`),
  KEY `FK_soignant_idSpecialite` (`idSpecialite`),
  CONSTRAINT `FK_soignant_idSpecialite` FOREIGN KEY (`idSpecialite`) REFERENCES `specialite` (`idSpecialite`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Export de données de la table gesclinic.soignant : ~8 rows (environ)
/*!40000 ALTER TABLE `soignant` DISABLE KEYS */;
INSERT INTO `soignant` (`idSoignant`, `nomSoigant`, `idSpecialite`, `prenomSoigant`, `password`, `username`, `adrSoignant`, `telSoignant`, `idCategorie`) VALUES
	(1, 'Mokam', NULL, 'rachide', '123456', NULL, 'Agbalepedo', '90123366', 2),
	(2, 'YEZOU ', NULL, 'Djobo', NULL, NULL, 'Agoè Minamadou', '90123367', 1),
	(3, 'TIGNKPA', NULL, 'Oubote', NULL, NULL, 'Agbalepedo', '99102233', 2),
	(4, 'GBECHI ', NULL, 'Chimène', NULL, NULL, 'KEGUE', '98776655', 2),
	(5, 'Mokam', NULL, 'Yvette', NULL, NULL, 'Agoe', '91236540', 1),
	(6, 'barakat', 2, 'clinic', '123456789', NULL, 'adeticopé', '98989898', 2),
	(7, 'abalo', 2, 'abalo1', '123456789', NULL, 'adeticopé', '', 2),
	(8, 'abalo', 1, 'dd', '123456', NULL, 'adeticopé', '90123366', 1);
/*!40000 ALTER TABLE `soignant` ENABLE KEYS */;

-- Export de la structure de la table gesclinic. soins
DROP TABLE IF EXISTS `soins`;
CREATE TABLE IF NOT EXISTS `soins` (
  `idSoins` int(11) NOT NULL AUTO_INCREMENT,
  `idSpecialite` int(11) NOT NULL,
  `libSoins` varchar(25) DEFAULT NULL,
  `coutSoins` float DEFAULT NULL,
  PRIMARY KEY (`idSoins`),
  KEY `FK_SOINS_idSpecialite` (`idSpecialite`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Export de données de la table gesclinic.soins : ~8 rows (environ)
/*!40000 ALTER TABLE `soins` DISABLE KEYS */;
INSERT INTO `soins` (`idSoins`, `idSpecialite`, `libSoins`, `coutSoins`) VALUES
	(1, NULL, 'CONSULTATION GENERALE', 5000),
	(5, NULL, 'CONSULTATION SPECIALISEE', 5000),
	(6, NULL, 'CONSULTATION PEDIATRIQUE', 5000),
	(7, NULL, 'SOINS INFIRMIERS DE 4H ET  PLUS', 5000),
	(8, NULL, 'SOINS INFIRMIERS DE MOINS 2H', 2500),
	(17, NULL, 'ECHOGRAPHIE PELVIENNE', 8000),
	(16, NULL, 'ECHOGRAPHIE OBSTRETICALE', 8000),
	(9, NULL, 'ECHOGRAPHIE MAMMAIRE', 15000),
	(10, NULL, 'ECHOGRAPHIE ABDOMINALE', 16000),
	(11, NULL, 'ECHOGRAPHIE ABDOMINO-PELVIENNE', 18000),
	(12, NULL, 'ECG', 10000),
	(13, NULL, 'RCF', 5000),
	(14, NULL, 'AMIU', 25000),
	(15, NULL, 'ACCOUCHEMENT + SALE D''ACCOUCHEMENT', 40000);
/*!40000 ALTER TABLE `soins` ENABLE KEYS */;

-- Export de la structure de la table gesclinic. specialite
DROP TABLE IF EXISTS `specialite`;
CREATE TABLE IF NOT EXISTS `specialite` (
  `idSpecialite` int(11) NOT NULL AUTO_INCREMENT,
  `libSpecialite` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`idSpecialite`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Export de données de la table gesclinic.specialite : ~7 rows (environ)
/*!40000 ALTER TABLE `specialite` DISABLE KEYS */;
INSERT INTO `specialite` (`idSpecialite`, `libSpecialite`) VALUES
	(1, 'Gynecologue'),
	(2, 'Chirurgien'),
	(3, 'Pédiatre'),
	(4, 'Cardiologue'),
	(5, 'Neurologue'),
	(6, 'Assistant'),
	(7, 'Techniciens');
/*!40000 ALTER TABLE `specialite` ENABLE KEYS */;

-- Export de la structure de la table gesclinic. technicien
DROP TABLE IF EXISTS `technicien`;
CREATE TABLE IF NOT EXISTS `technicien` (
  `idTechnicien` int(11) NOT NULL AUTO_INCREMENT,
  `nomTech` varchar(25) DEFAULT NULL,
  `prenomTech` varchar(25) DEFAULT NULL,
  `adresseTech` varchar(25) DEFAULT NULL,
  `telephoneTech` int(11) DEFAULT NULL,
  PRIMARY KEY (`idTechnicien`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Export de données de la table gesclinic.technicien : ~2 rows (environ)
/*!40000 ALTER TABLE `technicien` DISABLE KEYS */;
INSERT INTO `technicien` (`idTechnicien`, `nomTech`, `prenomTech`, `adresseTech`, `telephoneTech`) VALUES
	(1, 'mamadou', 'issaka', 'agoe', 99999999),
	(2, 'fifi', 'rafia', 'Bè', 90909096);
/*!40000 ALTER TABLE `technicien` ENABLE KEYS */;

-- Export de la structure de la table gesclinic. typeconsultation
DROP TABLE IF EXISTS `typeconsultation`;
CREATE TABLE IF NOT EXISTS `typeconsultation` (
  `idConsultation` int(11) NOT NULL AUTO_INCREMENT,
  `libTypConsult` varchar(50) DEFAULT NULL,
  `fraisTypeConsultation` float NOT NULL,
  PRIMARY KEY (`idConsultation`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- Export de données de la table gesclinic.typeconsultation : ~18 rows (environ)
/*!40000 ALTER TABLE `typeconsultation` DISABLE KEYS */;
INSERT INTO `typeconsultation` (`idConsultation`, `libTypConsult`, `fraisTypeConsultation`) VALUES
	(2, 'Consultation Chirurgie Dentaire', 5000),
	(3, 'Consultation Spécialisée', 3000),
	(4, 'Consultation Spécialisée interne', 2000),
	(5, 'Consultation de reference', 2000),
	(6, 'CONSULTATION GENERALE', 5000),
	(7, 'CONSULTATION SPECIALISEE', 5000),
	(8, 'CONSULTATION PEDIATRIQUE', 5000),
	(9, 'SOINS INFIRMIERS DE 4H ET PLUS', 5000),
	(10, 'SOINS INFIRMIERS MOINS DE 2H ', 2500),
	(11, 'ECOGRAPHIE PELVIENNE', 8000),
	(12, 'ECOGRAPHIE OBSTRETICALE', 8000),
	(13, 'ECOGRAPHIE MAMMAIRE', 15000),
	(14, 'ECOGRAPHIE ABDOMINALE', 16000),
	(15, 'ECOGRAPHIE ABDOMINO-PELVIENNE', 18000),
	(16, 'ECG', 10000),
	(17, 'RCF', 5000),
	(18, 'AMIU', 25000),
	(19, 'ACCOUCHEMENT+ SALLE D\'ACCOUCHEMENT', 40000);
/*!40000 ALTER TABLE `typeconsultation` ENABLE KEYS */;

-- Export de la structure de la table gesclinic. type_analyse
DROP TABLE IF EXISTS `type_analyse`;
CREATE TABLE IF NOT EXISTS `type_analyse` (
  `idTypeAnalyse` int(11) NOT NULL AUTO_INCREMENT,
  `libTypeAnalyse` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`idTypeAnalyse`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Export de données de la table gesclinic.type_analyse : ~4 rows (environ)
/*!40000 ALTER TABLE `type_analyse` DISABLE KEYS */;
INSERT INTO `type_analyse` (`idTypeAnalyse`, `libTypeAnalyse`) VALUES
	(1, 'Sang'),
	(2, 'Biologie'),
	(3, 'Imagerie'),
	(4, 'Sperme');
/*!40000 ALTER TABLE `type_analyse` ENABLE KEYS */;

-- Export de la structure de la table gesclinic. user
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idprof` int(11) NOT NULL DEFAULT 0,
  `idCategorie` int(11) DEFAULT NULL,
  `idSpecialite` int(11) DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `first_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `contact1` int(11) DEFAULT NULL,
  `contact2` int(11) DEFAULT NULL,
  `quartier` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`),
  KEY `FK_user_idSpecialite` (`idSpecialite`),
  KEY `FK_user_idCategorie` (`idCategorie`),
  KEY `FK_user_idprof` (`idprof`),
  CONSTRAINT `FK_user_idCategorie` FOREIGN KEY (`idCategorie`) REFERENCES `categorie` (`idCategorie`),
  CONSTRAINT `FK_user_idSpecialite` FOREIGN KEY (`idSpecialite`) REFERENCES `specialite` (`idSpecialite`),
  CONSTRAINT `FK_user_idprof` FOREIGN KEY (`idprof`) REFERENCES `profil` (`idprof`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Export de données de la table gesclinic.user : ~11 rows (environ)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `idprof`, `idCategorie`, `idSpecialite`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `first_name`, `last_name`, `contact1`, `contact2`, `quartier`) VALUES
	(1, 1, NULL, NULL, 'admin', 'YidOV_8g81qdyoNfLp7JNOd_2PUHctbd', '$2y$13$bYYXBHvpB4Yg8nkWfh5wpOZQwyq/ajkzm0hVrVAsIG4PMBfDqwGTu', NULL, 'rachide@yahoo.fr', 10, 1496850628, 1496850628, 'rachide', 'Abdoulaye', NULL, NULL, NULL),
	(24, 1, 2, 4, 'rachid', 'pUz22WOfg_Ma3p3hAfKQbZLBS89ynSzu', '$2y$13$2xqCvWYynhU2k/6.Yi2ioOEYyvNgOvL9Bk06qJi53Rng0x5Ttns92', NULL, NULL, 10, 1503754158, 1503754158, 'rachide', 'abdou', NULL, NULL, NULL),
	(31, 2, 2, 5, 'aziz', 'P0LucScrxzjg4p8diZu0FcaDe8gh5m6o', '123456789', NULL, NULL, 10, 1503823686, 1503823686, 'Salifou abdel-aziz', 'KARAMON', NULL, NULL, NULL),
	(32, 2, 4, 7, 'salifou', 'Nu_ooGAyyYeHHu3PJl1OtUoyD3JHsAsF', '$2y$13$bYYXBHvpB4Yg8nkWfh5wpOZQwyq/ajkzm0hVrVAsIG4PMBfDqwGTu', NULL, NULL, 10, 1505125738, 1505125738, 'salifou', 'Azoumana', NULL, NULL, NULL),
	(36, 1, NULL, NULL, 'assana', 'V3Dotx85M9uxOaAuOt0dX0ETqXfCLS8c', '123456789', NULL, NULL, 10, 1505209991, 1505209991, '', '', NULL, NULL, NULL),
	(37, 1, NULL, NULL, 'ggg', 'pD4708t1B1g5_R_FmIN1I8cepLi9P2OU', 'rachide', NULL, NULL, 10, 1505210140, 1505210140, '', '', NULL, NULL, NULL),
	(38, 2, NULL, NULL, 'tttt', 'kpwJHrI7J266p_iTHMloSBwwGSCUvOyx', '$2y$13$eo60W6EJudk3pC9iWspAIuSbDhqqDDB47QnNSvXTt7QoQkwVt3vuC', NULL, 'ttt@g.co', 10, 1505210345, 1505210345, '', '', NULL, NULL, NULL),
	(39, 1, 4, 7, 'ama', 'DaBi-9dZsABy2KpOPPk8sDk2Bf3qpBnL', '$2y$13$mF4LlyQrQDhjP8KxKljowuS9Hw3KZm8ynqURFvfLvyk6Rxt7WyaIi', NULL, 'ama@gmail.com', 10, 1505210649, 1505210649, 'Adamou', 'abdala', NULL, NULL, NULL),
	(40, 1, NULL, NULL, 'sysadmin', 'nVbYCNP2ix91tXFK_Kqb1a521phymTEw', '$2y$13$FAuYdC4ezspaF9k1Lq60.u2oWBqOOxN20GdPXyUYNn0dRChFrx4ji', NULL, 'rachid@yahoo.fr', 10, 1506098067, 1506098067, '', '', NULL, NULL, NULL),
	(41, 1, 4, 7, 'razak1', '3mOS1Tlfw4bmRh1Wm2a_Z6WzrEcCGUYz', '$2y$13$btXpDD28v1O8j1A9caC9zOCeNmrDdsamIZ8PnEchi2C8yV0EHY1ZG', NULL, 'donne@gmail.com', 10, 1506158642, 1506158642, '', '', NULL, NULL, NULL),
	(42, 2, 4, 7, 'kokou', '--3KAWawrXJOt_GnF23JQj9weacwOeG7', '$2y$13$KZMJXIfW733iEXZR9u2OeO9HDQ4yDQcKRmk4UJF31eEOFU15yfEa6', NULL, 'kokou@gmail.com', 10, 1506333820, 1506333820, '', '', NULL, NULL, NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
