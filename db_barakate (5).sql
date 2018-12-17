-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 13 juil. 2018 à 15:58
-- Version du serveur :  10.1.25-MariaDB
-- Version de PHP :  7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `db_barakate`
--

-- --------------------------------------------------------

--
-- Structure de la table `achat`
--

CREATE TABLE `achat` (
  `idachat` int(11) NOT NULL,
  `datecreation` datetime DEFAULT NULL,
  `datemodification` datetime DEFAULT NULL,
  `idpatient` int(11) NOT NULL,
  `payer` tinyint(1) DEFAULT NULL,
  `payerassuran` int(11) NOT NULL,
  `autorisation` tinyint(1) DEFAULT NULL,
  `echeance` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `achat`
--

INSERT INTO `achat` (`idachat`, `datecreation`, `datemodification`, `idpatient`, `payer`, `payerassuran`, `autorisation`, `echeance`) VALUES
(1, NULL, NULL, 1, 1, 1, 0, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `analysemedicale`
--

CREATE TABLE `analysemedicale` (
  `idanalysemedicale` int(11) NOT NULL,
  `idsoustypeanalysemedicale` int(11) DEFAULT NULL,
  `libanalysemedicale` varchar(150) NOT NULL,
  `coutanalyse` decimal(10,0) NOT NULL,
  `normes` varchar(255) DEFAULT NULL,
  `assure` tinyint(1) NOT NULL,
  `iduser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `analysemedicale`
--

INSERT INTO `analysemedicale` (`idanalysemedicale`, `idsoustypeanalysemedicale`, `libanalysemedicale`, `coutanalyse`, `normes`, `assure`, `iduser`) VALUES
(2, 2, 'GOUTE EPAISE(GE)', '1000', '<=10000', 0, 1),
(3, 2, 'SELLES (K.O.P)', '1200', NULL, 0, 1),
(4, 2, 'RECHERCHE DE MICROFILIARES', '1000', NULL, 0, 1),
(5, 2, 'RECHERCHE D\'OEUFS DE BILHARZIE(Urines)', '2000', 'superieur à 5', 0, 1),
(8, 1, 'NUMÉRATION FORMULE SANGUINE(NFS)', '4000', 'compris entre 5 et 8', 0, 1),
(10, 1, 'VITESSE DE SEDIMENTATION (VS)', '1000', NULL, 0, 1),
(12, 1, 'Groupage Rhésus', '3500', NULL, 0, 1),
(14, 2, 'TS', '3000', '18 et 24', 0, 1),
(16, 2, 'TP-INR', '4000', NULL, 0, 1),
(17, 2, 'TP-INR', '3200', NULL, 1, 1),
(18, 2, 'TCA', '4000', NULL, 0, 1),
(19, 2, 'TCA', '3200', NULL, 1, 1),
(20, 1, 'Électrophorèse de l\'hémoglobine', '5000', NULL, 0, 1),
(22, 3, 'Sérologie de WIdal et Félix (SDWF)', '5000', NULL, 0, 1),
(24, 3, 'Proteine C Réactive (CRP)', '4000', NULL, 0, 1),
(26, 3, 'Anti Strptolysines O (ASLO)', '6000', NULL, 1, 1),
(28, 3, 'Sérologie de Toxoplasmose', '8000', NULL, 0, 1),
(30, 6, 'ELECTROPHORESE DES PROTEINES', '10000', NULL, 0, 1),
(31, 6, 'ELECTROPHORESE DES PROTEINES', '10000', NULL, 0, 1),
(33, 1, 'TP-INR', '4000', NULL, 0, 1),
(34, 1, 'TCA', '4000', NULL, 0, 1),
(35, 1, 'ÉLECTROPHORÈSE DES PROTÉINES', '10000', NULL, 0, 1),
(36, 3, 'Sérologie de Rubéole', '10000', NULL, 0, 1),
(37, 3, 'Sérologie de VIH(SRV)', '3000', NULL, 0, 1),
(38, 3, 'Sérologie de l\'Hépatite A', '15000', NULL, 0, 1),
(39, 3, 'Sérologie de l\'Hépatite B(AgHbs)', '8000', NULL, 0, 1),
(40, 3, 'Sérologie de l\'Hépatite C', '15000', NULL, 0, 1),
(41, 3, 'Sérologie de Syphillis (TPHA-VDRL)', '5000', NULL, 0, 1),
(42, 3, 'Sérologie de Chlamidiae', '15000', NULL, 0, 1),
(43, 3, 'Taux de Lymphocyte TCD4', '5000', NULL, 0, 1),
(44, 3, 'IgE', '14000', NULL, 0, 1),
(45, 3, 'PSA Total', '12000', NULL, 0, 1),
(46, 3, 'PSA Libre', '16000', NULL, 0, 1),
(47, 3, 'AFP(a-foetroprotéine)', '16000', NULL, 0, 1),
(48, 3, 'Ag Hbe', '15000', NULL, 0, 1),
(49, 3, 'Anticorps anti HBc IgM', '15000', NULL, 0, 1),
(50, 3, '	Anticorps anti HBc Total', '15000', NULL, 0, 1),
(51, 3, 'Prolactine (PRL)', '14000', NULL, 0, 1),
(52, 3, 'Estradiol(E2)', '18000', NULL, 0, 1),
(53, 3, 'Progestérone(PRG)', '15000', NULL, 0, 1),
(54, 3, 'Testosterone', '17000', NULL, 0, 1),
(55, 3, 'TSH', '15000', NULL, 0, 1),
(56, 3, 'T3', '15000', NULL, 0, 1),
(57, 3, 'T4', '15000', NULL, 0, 1),
(58, 3, 'Béta HCG', '13000', NULL, 0, 1),
(59, 3, 'LH', '12000', NULL, 0, 1),
(60, 3, 'FSH', '14000', NULL, 0, 1),
(61, 4, 'Urée', '2000', NULL, 0, 1),
(62, 4, 'Glycémie', '2000', NULL, 0, 1),
(63, 4, 'Créatininémie', '2000', NULL, 0, 1),
(64, 4, 'Transminase(ASAT, ALAT)', '3000', NULL, 0, 1),
(65, 4, 'Cholestérol Total', '3000', NULL, 0, 1),
(66, 4, 'Triglycérides', '3000', NULL, 0, 1),
(67, 4, 'HDL-Cholestérol', '2500', NULL, 0, 1),
(68, 4, 'LDL-Cholestérol', '2500', NULL, 0, 1),
(69, 4, 'Hémoglobine glycosilée(HBA1c)', '15000', NULL, 0, 1),
(70, 4, 'Gamma-GT', '4000', NULL, 0, 1),
(71, 4, 'Phosphatase-Alcaline(PAL)', '4000', NULL, 0, 1),
(72, 4, 'Calcémie', '3500', NULL, 0, 1),
(73, 4, 'Magnesemie', '3000', NULL, 0, 1),
(74, 4, 'Bilribine(Direct,Total)', '4000', NULL, 0, 1),
(75, 4, 'Protidinemie', '1050', NULL, 0, 1),
(76, 4, 'Uricémie', '3500', NULL, 0, 1),
(77, 4, 'Ionogramme sanguin', '12000', NULL, 0, 1),
(78, 4, 'Protéinurie et Glucosurie (Urines)', '3000', NULL, 0, 1),
(79, 4, 'Coproculture', '7000', NULL, 0, 1),
(80, 4, 'Amylasémie', '7000', NULL, 0, 1),
(81, 4, 'Spermoculture', '4000', NULL, 0, 1),
(82, 4, 'Spermogramme', '4000', NULL, 0, 1),
(83, 4, 'Hémoculture', '2000', NULL, 0, 1),
(84, 4, 'BU', '5000', NULL, 0, 1),
(85, 4, 'Facteur Rhumatoide', '8000', NULL, 0, 1),
(86, 4, 'Dosage de G6Dp', '16000', NULL, 0, 1),
(87, 4, 'ECBU+ATB', '4000', NULL, 0, 1),
(88, 4, 'PV+ATB', '4000', NULL, 0, 1),
(89, 4, 'PU', '4000', NULL, 0, 1),
(90, 7, 'Hématies', '5000', 'H=4500-500*10^3/mm^3\r\nF=4300-500*10^3/mm^3\r\nBébé=4000-6000*10^3/mm^3', 0, 1),
(91, 7, 'leucocyte', '5000', '4000-10000/mm^3', 0, 1),
(92, 7, 'Hémoglobine', '6000', 'H=13.0-17.0 g/dl\r\nF=12.0-16.0 g/dl\r\nBébé=14.0-20.0 g/dl', 0, 1),
(93, 7, 'Hématocrite', '4000', 'H=40-54%\r\nF=12.0-16.0%\r\nBébé=14.0-20.0 g/dl', 0, 1),
(94, 7, 'Plaquette', '5500', '150000-400000/mm^3', 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `analysemedicale1`
--

CREATE TABLE `analysemedicale1` (
  `idanalysemedicale` int(11) NOT NULL,
  `idsoustypeanalysemedicale` int(11) DEFAULT NULL,
  `libanalysemedicale` varchar(150) NOT NULL,
  `coutanalyse` decimal(10,0) NOT NULL,
  `assure` tinyint(1) NOT NULL,
  `iduser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `analysemedicale1`
--

INSERT INTO `analysemedicale1` (`idanalysemedicale`, `idsoustypeanalysemedicale`, `libanalysemedicale`, `coutanalyse`, `assure`, `iduser`) VALUES
(2, 1, 'GOUTE EPAISE(GE)', '1000', 0, 1),
(3, 1, 'SELLES (K.O.P)', '1200', 0, 1),
(4, 1, 'RECHERCHE DE MICROFILIARES', '1000', 0, 1),
(5, 1, 'RECHERCHE D\'OEUFS DE BILHARZIE', '2000', 0, 1),
(6, 1, 'GOUTE EPAISE(GE)', '360', 1, 1),
(7, 1, 'SELLES (K.O.P)', '400', 1, 1),
(8, 2, 'NUMÉRATION FORMULE SANGUINE(NFS)', '4000', 0, 1),
(9, 2, 'NUMÉRATION FORMULE SANGUINE(NFS)', '1200', 1, 1),
(10, 2, 'VITESSE DE SEDIMENTATION (VS)', '1000', 0, 1),
(11, 2, 'VITESSE DE SEDIMENTATION (VS)', '200', 1, 1),
(12, 2, 'Groupage Rhésus', '3500', 0, 1),
(13, 2, 'Groupage Rhésus', '1500', 1, 1),
(14, 2, 'TS', '3000', 0, 1),
(15, 2, 'TS', '2200', 1, 1),
(16, 2, 'TP-INR', '4000', 0, 1),
(17, 2, 'TP-INR', '3200', 1, 1),
(18, 2, 'TCA', '4000', 0, 1),
(19, 2, 'TCA', '3200', 1, 1),
(20, 2, 'Électrophorèse de l\'hémoglobine', '5000', 0, 1),
(21, 2, 'Électrophorèse de l\'hémoglobine', '2200', 1, 1),
(22, 3, 'Sérologie de Idal et Félix (SDWF)', '5000', 0, 1),
(23, 3, 'Sérologie de Idal et Félix (SDWF)', '600', 1, 1),
(24, 3, 'Proteine C Réactive (CRP)', '4000', 0, 1),
(25, 3, 'Proteine C Réactive (CRP)', '3040', 1, 1),
(26, 3, 'Anti Strptolysines O (ASLO)', '6000', 1, 1),
(27, 3, 'Anti Strptolysines O (ASLO)', '3600', 1, 1),
(28, 3, 'Sérologie de Toxoplasmose', '8000', 0, 1),
(29, 3, 'Sérologie de Toxoplasmose', '3600', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `antecedant`
--

CREATE TABLE `antecedant` (
  `idantecedant` int(11) NOT NULL,
  `idpatient` int(11) NOT NULL,
  `descripantec` varchar(255) DEFAULT NULL,
  `familiaux` varchar(150) DEFAULT NULL,
  `medicaux` varchar(150) DEFAULT NULL,
  `chirurgicaux` varchar(150) DEFAULT NULL,
  `obsteriques` varchar(150) DEFAULT NULL,
  `gestite` varchar(150) DEFAULT NULL,
  `nbregrossess` int(11) DEFAULT NULL,
  `nbreavortement` int(11) DEFAULT NULL,
  `dureeregle` int(11) DEFAULT NULL,
  `dureecycle` int(11) DEFAULT NULL,
  `parite` varchar(150) DEFAULT NULL,
  `avortement` varchar(150) DEFAULT NULL,
  `typeavortement` varchar(255) DEFAULT NULL,
  `agepremregle` int(11) DEFAULT NULL,
  `dysmenorrhe` varchar(150) DEFAULT NULL,
  `syndromeintmenstru` varchar(150) DEFAULT NULL,
  `doulpelvienne` varchar(150) DEFAULT NULL,
  `dyspareunie` varchar(150) DEFAULT NULL,
  `leucorrhees` varchar(150) DEFAULT NULL,
  `trtsterilite` varchar(150) DEFAULT NULL,
  `contrception` varchar(150) DEFAULT NULL,
  `methcontracep` varchar(150) DEFAULT NULL,
  `durecontrac` varchar(60) DEFAULT NULL,
  `autreaffectgyne` varchar(150) DEFAULT NULL,
  `datedebut` date DEFAULT NULL,
  `datefin` date DEFAULT NULL,
  `typetraitement` varchar(50) DEFAULT NULL,
  `duretraitement` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `antecedant`
--

INSERT INTO `antecedant` (`idantecedant`, `idpatient`, `descripantec`, `familiaux`, `medicaux`, `chirurgicaux`, `obsteriques`, `gestite`, `nbregrossess`, `nbreavortement`, `dureeregle`, `dureecycle`, `parite`, `avortement`, `typeavortement`, `agepremregle`, `dysmenorrhe`, `syndromeintmenstru`, `doulpelvienne`, `dyspareunie`, `leucorrhees`, `trtsterilite`, `contrception`, `methcontracep`, `durecontrac`, `autreaffectgyne`, `datedebut`, `datefin`, `typetraitement`, `duretraitement`) VALUES
(1, 1, NULL, 'DIABETE , DREPANOCYTOSE , ', 'ANEMIE , ', 'ABLATION , ', NULL, 'OUI', 4, 1, 3, 28, '3', 'OUI', 'PROVOQUE', 12, 'OUI', 'OUI', 'Aïgues', 'OUI', 'NON', 'OUI', 'OUI', 'DIU', '12', '', NULL, NULL, 'Traditionnel', 5);

-- --------------------------------------------------------

--
-- Structure de la table `antecedant1`
--

CREATE TABLE `antecedant1` (
  `idancedant1` decimal(10,0) NOT NULL,
  `libelleantecant1` varchar(150) DEFAULT NULL,
  `idtypeantecedant` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `antecedant1`
--

INSERT INTO `antecedant1` (`idancedant1`, `libelleantecant1`, `idtypeantecedant`) VALUES
('1', 'HTA', '1'),
('2', 'DIABETE', '1'),
('3', 'DREPANOCYTOSE', '1'),
('4', 'PHLEBITE', '1'),
('5', 'ASTHME', '1'),
('6', 'PALUDISME', '5'),
('7', 'ANEMIE', '5'),
('9', 'CESARIENNE', '3'),
('11', 'ABLATION', '3'),
('12', 'AUCUN', '1'),
('13', 'AUCUN', '3'),
('14', 'AUCUN', '5');

-- --------------------------------------------------------

--
-- Structure de la table `antecedant11`
--

CREATE TABLE `antecedant11` (
  `idantecedant` int(11) NOT NULL,
  `idpatient` int(11) NOT NULL,
  `descripantec` varchar(255) DEFAULT NULL,
  `familiaux` varchar(150) DEFAULT NULL,
  `medicaux` varchar(150) DEFAULT NULL,
  `chirurgicaux` varchar(150) DEFAULT NULL,
  `obsteriques` varchar(150) DEFAULT NULL,
  `gestite` varchar(150) DEFAULT NULL,
  `parite` varchar(150) DEFAULT NULL,
  `avortement` varchar(150) DEFAULT NULL,
  `agepremregle` int(11) DEFAULT NULL,
  `dysmenorrhe` varchar(150) DEFAULT NULL,
  `syndromeintmenstru` varchar(150) DEFAULT NULL,
  `doulpelvienne` varchar(150) DEFAULT NULL,
  `dyspareunie` varchar(150) DEFAULT NULL,
  `leucorrhees` varchar(150) DEFAULT NULL,
  `trtsterilite` varchar(150) DEFAULT NULL,
  `contrception` varchar(150) DEFAULT NULL,
  `methcontracep` varchar(150) DEFAULT NULL,
  `durecontrac` varchar(60) DEFAULT NULL,
  `autreaffectgyne` varchar(150) DEFAULT NULL,
  `datedebut` date DEFAULT NULL,
  `datefin` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `antecedanttt`
--

CREATE TABLE `antecedanttt` (
  `idantecedant` int(11) NOT NULL,
  `idpatient` int(11) NOT NULL,
  `descripantec` varchar(255) DEFAULT NULL,
  `familiaux` varchar(150) DEFAULT NULL,
  `medicaux` varchar(150) DEFAULT NULL,
  `chirurgicaux` varchar(150) DEFAULT NULL,
  `obsteriques` varchar(150) DEFAULT NULL,
  `gestite` varchar(150) DEFAULT NULL,
  `parite` varchar(150) DEFAULT NULL,
  `avortement` varchar(150) DEFAULT NULL,
  `typeavortement` varchar(255) DEFAULT NULL,
  `agepremregle` int(11) DEFAULT NULL,
  `dysmenorrhe` varchar(150) DEFAULT NULL,
  `syndromeintmenstru` varchar(150) DEFAULT NULL,
  `doulpelvienne` varchar(150) DEFAULT NULL,
  `dyspareunie` varchar(150) DEFAULT NULL,
  `leucorrhees` varchar(150) DEFAULT NULL,
  `trtsterilite` varchar(150) DEFAULT NULL,
  `contrception` varchar(150) DEFAULT NULL,
  `methcontracep` varchar(150) DEFAULT NULL,
  `durecontrac` varchar(60) DEFAULT NULL,
  `autreaffectgyne` varchar(150) DEFAULT NULL,
  `datedebut` date DEFAULT NULL,
  `datefin` date DEFAULT NULL,
  `typetraitement` varchar(50) DEFAULT NULL,
  `duretraitement` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `aspectprelevement`
--

CREATE TABLE `aspectprelevement` (
  `idaspectprelevement` int(11) NOT NULL,
  `libeapect` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `aspectprelevement`
--

INSERT INTO `aspectprelevement` (`idaspectprelevement`, `libeapect`) VALUES
(1, 'A jeun'),
(2, 'Veineux'),
(3, 'Post prandial'),
(4, 'Capillaire');

-- --------------------------------------------------------

--
-- Structure de la table `assurance`
--

CREATE TABLE `assurance` (
  `idassurance` int(11) NOT NULL,
  `sigleassurance` varchar(10) DEFAULT NULL,
  `libassurance` varchar(150) DEFAULT NULL,
  `adrassurance` varchar(150) DEFAULT NULL,
  `telassurance` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `assurance`
--

INSERT INTO `assurance` (`idassurance`, `sigleassurance`, `libassurance`, `adrassurance`, `telassurance`) VALUES
(1, 'SUNU', 'SUNU Assurance', 'Bd du 13 Janvier', '22-21-36-56'),
(2, 'ACA', 'ACA Assurance', '', ''),
(3, 'SAHAM', 'SAHAM Assurance', '', ''),
(4, 'GTA', 'GTA Assurance', '', ''),
(5, 'NSIA', 'NSIA Assurance', '', ''),
(6, 'GRAS', 'GRAS Assurance', '', ''),
(7, 'INAM', 'INAM Assurance', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `categoriechambre`
--

CREATE TABLE `categoriechambre` (
  `idcategoriechbr` int(11) NOT NULL,
  `libcategoriechbr` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categoriechambre`
--

INSERT INTO `categoriechambre` (`idcategoriechbr`, `libcategoriechbr`) VALUES
(1, 'Climatisé'),
(2, 'Ventilé');

-- --------------------------------------------------------

--
-- Structure de la table `chambre`
--

CREATE TABLE `chambre` (
  `idchbre` int(11) NOT NULL,
  `idcategoriechbr` int(11) NOT NULL,
  `nomchbre` varchar(100) NOT NULL,
  `nbrelit` int(11) NOT NULL,
  `coutchbre` decimal(10,0) NOT NULL,
  `assure` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `chambre`
--

INSERT INTO `chambre` (`idchbre`, `idcategoriechbr`, `nomchbre`, `nbrelit`, `coutchbre`, `assure`) VALUES
(1, 1, 'ALEDJO', 4, '7500', 0),
(2, 2, 'ALEDJO', 4, '5000', 0),
(3, 1, '14', 2, '12500', 0),
(4, 2, '14', 2, '10000', 0),
(5, 1, '16', 2, '12500', 0),
(6, 2, '16', 2, '10000', 0),
(7, 1, '21', 2, '12500', 0),
(8, 2, '21', 2, '10000', 0),
(9, 1, '23', 2, '12500', 0),
(10, 2, '23', 2, '10000', 0),
(11, 1, '11', 1, '15000', 0),
(12, 2, '11', 1, '12500', 0),
(13, 1, '12', 1, '15000', 0),
(14, 2, '12', 1, '12500', 0),
(15, 1, '17', 1, '15000', 0),
(16, 2, '17', 1, '12500', 0),
(17, 1, '22', 1, '15000', 0),
(18, 2, '22', 1, '12500', 0),
(19, 1, '24', 1, '15000', 0),
(20, 2, '24', 1, '12500', 0),
(21, 1, '25', 1, '15000', 0),
(22, 2, '25', 1, '12500', 0),
(23, 1, '26', 1, '15000', 0),
(24, 2, '26', 1, '12500', 0),
(25, 1, '27', 1, '15000', 0),
(26, 2, '27', 1, '12500', 0),
(27, 1, '13(VIP)', 1, '25000', 0),
(28, 2, '23(VIP)', 1, '25000', 0),
(29, 1, '30(VIP)', 1, '30000', 0),
(30, 2, '30(VIP)', 1, '30000', 0),
(31, 1, 'ADULTE', 1, '20000', 0),
(32, 1, 'PEDIATRIE', 1, '20000', 0),
(33, 1, 'COUVEUSE', 1, '20000', 0);

-- --------------------------------------------------------

--
-- Structure de la table `conjoint`
--

CREATE TABLE `conjoint` (
  `idconj` int(11) NOT NULL,
  `idpatient` int(11) NOT NULL COMMENT 'Patient N°',
  `nomconj` varchar(100) DEFAULT NULL,
  `prenomconj` varchar(150) DEFAULT NULL,
  `datenaissconj` date DEFAULT NULL,
  `ageconj` int(11) DEFAULT NULL,
  `nationaliteconj` varchar(200) DEFAULT NULL,
  `professionconj` varchar(200) DEFAULT NULL,
  `adresseconj` varchar(255) DEFAULT NULL,
  `telconj` varchar(50) DEFAULT NULL,
  `gsrhconj` varchar(50) DEFAULT NULL,
  `hbconj` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `conjoint`
--

INSERT INTO `conjoint` (`idconj`, `idpatient`, `nomconj`, `prenomconj`, `datenaissconj`, `ageconj`, `nationaliteconj`, `professionconj`, `adresseconj`, `telconj`, `gsrhconj`, `hbconj`) VALUES
(1, 1, 'AMANA', 'komi', '2000-01-11', 18, NULL, 'Enseignant', 'zogo', '986655', '0-', '');

-- --------------------------------------------------------

--
-- Structure de la table `consultation`
--

CREATE TABLE `consultation` (
  `idconsultation` int(11) NOT NULL,
  `idtypeconsultation` int(11) NOT NULL,
  `libconsultation` varchar(150) NOT NULL,
  `coutconsultation` decimal(10,0) NOT NULL,
  `assure` tinyint(1) NOT NULL,
  `rdv` datetime DEFAULT NULL,
  `iduser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `consultation`
--

INSERT INTO `consultation` (`idconsultation`, `idtypeconsultation`, `libconsultation`, `coutconsultation`, `assure`, `rdv`, `iduser`) VALUES
(1, 2, 'CONSULTATION GENERALE', '5000', 0, NULL, 1),
(2, 1, 'CONSULTATION SPECIALISEE', '5000', 0, NULL, 1),
(3, 1, 'CONSULTATION PEDIATRIQUE', '5000', 0, NULL, 1),
(4, 2, 'SOINS INFIRMIERS DE 4H ET PLUS', '5000', 0, NULL, 1),
(5, 2, 'SOINS INFIRMIER DE MOINS DE 2H ', '2500', 0, NULL, 1),
(6, 1, 'ECHOGRAPHIE PELVIENNE', '8000', 0, NULL, 1),
(7, 1, 'ECHOGRAPHIE OBSTRETICALE', '8000', 0, NULL, 1),
(8, 1, 'ECHOGRAPHIE MAMMAIRE', '15000', 0, NULL, 1),
(9, 1, 'ECHOGRAPHIE ABDOMINALE', '16000', 0, NULL, 1),
(10, 1, 'ABDOMINO PELVIENNE', '18000', 0, NULL, 1),
(11, 1, 'ECG', '10000', 0, NULL, 1),
(12, 1, 'RCF', '5000', 0, NULL, 1),
(13, 1, 'AMIU', '25000', 0, NULL, 1),
(14, 1, 'ACCOUCHEMENT + SALE D\'ACCOUCHEMENT', '60000', 0, NULL, 1),
(15, 2, ' CONSULTATION GENERALE', '6000', 1, NULL, 1),
(16, 1, 'CONSULTATION SPECIALISEE', '7500', 0, NULL, 1),
(17, 1, 'SOINS INFIRMIER DE 4H ET PLUS', '8000', 1, NULL, 1),
(18, 1, 'SOINS INFIRMIER DE MOINS DE 2H ', '8000', 1, NULL, 1),
(19, 1, 'ECHOGRAPHIE PELVIENNE', '20000', 1, NULL, 1),
(20, 1, 'ECHOGRAPHIE OBSTETRICALE', '20000', 1, NULL, 1),
(21, 1, 'ECHOGRAPHIE MAMMAIRE', '20000', 1, NULL, 1),
(22, 1, 'ECHOGRAPHIE ABDOMINALE', '20000', 1, NULL, 1),
(23, 1, 'ECHOGRAPHIE ABDOMINO-PELVIENNE', '20000', 1, NULL, 1),
(24, 1, 'ECG', '11500', 1, NULL, 1),
(25, 1, 'RCF', '16000', 1, NULL, 1),
(26, 1, 'AMIU', '25000', 1, NULL, 1),
(27, 1, 'ACCOUCHEMENT + SALE D\'ACCOUCHEMENT', '92500', 1, NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `demanderanalyse`
--

CREATE TABLE `demanderanalyse` (
  `iddemandeanalyse` int(11) NOT NULL,
  `libdemandeanalyse` varchar(150) DEFAULT NULL,
  `statut` int(1) DEFAULT NULL,
  `degre` varchar(25) DEFAULT NULL,
  `datedemande` datetime DEFAULT NULL,
  `datemodification` datetime DEFAULT NULL,
  `diagnostic` varchar(150) DEFAULT NULL,
  `idpatient` int(11) DEFAULT NULL,
  `idanalysemedicale` int(11) DEFAULT NULL,
  `payer` tinyint(1) DEFAULT NULL,
  `indigeant` tinyint(1) DEFAULT NULL,
  `autorisation` tinyint(1) DEFAULT NULL,
  `echeance` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `demanderanalyse`
--

INSERT INTO `demanderanalyse` (`iddemandeanalyse`, `libdemandeanalyse`, `statut`, `degre`, `datedemande`, `datemodification`, `diagnostic`, `idpatient`, `idanalysemedicale`, `payer`, `indigeant`, `autorisation`, `echeance`) VALUES
(1, NULL, NULL, '', '2018-07-10 10:21:00', NULL, 'anémie', 1, 1, NULL, 0, 0, NULL),
(2, NULL, NULL, '', '2018-07-10 16:54:59', NULL, 'nb', 2, 1, NULL, 0, 0, NULL),
(3, NULL, NULL, '', '2018-07-13 11:31:23', '2018-07-13 11:31:50', 'anémie', 3, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `detailachat`
--

CREATE TABLE `detailachat` (
  `idachat` int(11) NOT NULL,
  `idproduit` int(11) NOT NULL,
  `coutproduit` decimal(10,0) NOT NULL,
  `tauxassurance` int(11) DEFAULT NULL,
  `qteprod` int(11) DEFAULT NULL,
  `fraisachatpatient` decimal(10,0) DEFAULT NULL,
  `fraisachatassurance` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `detailachat`
--

INSERT INTO `detailachat` (`idachat`, `idproduit`, `coutproduit`, `tauxassurance`, `qteprod`, `fraisachatpatient`, `fraisachatassurance`) VALUES
(1, 1, '1500', 0, 10, NULL, NULL),
(1, 3, '2000', 0, 10, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `detailantecedant`
--

CREATE TABLE `detailantecedant` (
  `iddetailantecedant` int(5) NOT NULL,
  `familiaux` varchar(80) DEFAULT NULL,
  `chirurgicaux` varchar(80) DEFAULT NULL,
  `medicaux` varchar(80) DEFAULT NULL,
  `idancedant1` int(5) DEFAULT NULL,
  `idpatient` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `detailantecedant1`
--

CREATE TABLE `detailantecedant1` (
  `iddetailantecedant` int(5) NOT NULL,
  `familiaux` varchar(80) DEFAULT NULL,
  `chirurgicaux` varchar(80) DEFAULT NULL,
  `medicaux` varchar(80) DEFAULT NULL,
  `idancedant1` decimal(10,0) NOT NULL,
  `idpatient` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `detaildemandeanalyse`
--

CREATE TABLE `detaildemandeanalyse` (
  `iddetaildeamndanalyse` int(11) NOT NULL,
  `tauxreduction` float DEFAULT NULL,
  `coutanalyse` int(11) DEFAULT NULL,
  `fraispatient` float DEFAULT NULL,
  `fraisassurance` float DEFAULT NULL,
  `idpatient` int(11) DEFAULT NULL,
  `idanalysemedicale` int(11) DEFAULT NULL,
  `statut` int(11) NOT NULL,
  `resultat` int(11) NOT NULL,
  `iddemandeanalyse` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `detaildemandeanalyse`
--

INSERT INTO `detaildemandeanalyse` (`iddetaildeamndanalyse`, `tauxreduction`, `coutanalyse`, `fraispatient`, `fraisassurance`, `idpatient`, `idanalysemedicale`, `statut`, `resultat`, `iddemandeanalyse`) VALUES
(46, 75, 1000, 250, 750, 1, 4, 1, 0, 1),
(47, 75, 2000, 500, 1500, 1, 5, 1, 0, 1),
(48, 75, 4000, 1000, 3000, 1, 8, 1, 0, 1),
(49, 80, 1000, 200, 800, 2, 2, 1, 0, 2),
(50, 80, 1200, 240, 960, 2, 3, 0, 0, 2),
(51, 80, 3000, 600, 2400, 2, 14, 0, 0, 2),
(52, 80, 4000, 800, 3200, 2, 8, 0, 0, 2),
(54, 70, 1000, 300, 700, 3, 4, 0, 0, 3),
(55, 70, 3000, 900, 2100, 3, 14, 1, 0, 3),
(56, 70, 5000, 1500, 3500, 3, 22, 1, 0, 3);

-- --------------------------------------------------------

--
-- Structure de la table `detaildonnesoins`
--

CREATE TABLE `detaildonnesoins` (
  `iddonnesoins` int(11) NOT NULL,
  `idsoin` int(11) NOT NULL,
  `coutsoin` decimal(10,0) NOT NULL,
  `dose` int(11) NOT NULL,
  `tauxassurance` decimal(10,0) NOT NULL DEFAULT '0',
  `fraissoins` decimal(10,0) DEFAULT NULL,
  `fraisassurance` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `detaildonnesoins`
--

INSERT INTO `detaildonnesoins` (`iddonnesoins`, `idsoin`, `coutsoin`, `dose`, `tauxassurance`, `fraissoins`, `fraisassurance`) VALUES
(1, 1, '125', 4, '75', '500', '375'),
(1, 15, '475', 2, '75', '1900', '1425'),
(1, 19, '125', 5, '75', '500', '375'),
(2, 18, '120', 11, '80', '600', '480'),
(2, 20, '100', 10, '80', '500', '400'),
(3, 17, '200', 10, '75', '800', '600'),
(3, 18, '150', 20, '75', '600', '450'),
(4, 1, '125', 10, '75', '500', '375'),
(4, 9, '50', 50, '75', '200', '150'),
(4, 17, '200', 10, '75', '800', '600');

-- --------------------------------------------------------

--
-- Structure de la table `detaileffectuerconsultation`
--

CREATE TABLE `detaileffectuerconsultation` (
  `ideffectuerconsul` int(11) NOT NULL,
  `idconsultation` int(11) NOT NULL,
  `tauxreductionassurance` decimal(10,0) NOT NULL DEFAULT '0',
  `coutconsultation` decimal(10,0) NOT NULL,
  `coutassurance` decimal(10,0) DEFAULT NULL,
  `fraisconsultation` decimal(10,0) DEFAULT NULL,
  `creerpar` varchar(150) DEFAULT NULL,
  `modifierpar` varchar(150) DEFAULT NULL,
  `datecreation` datetime DEFAULT NULL,
  `datemodification` datetime DEFAULT NULL,
  `payer` int(11) NOT NULL,
  `payerassuran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `detaileffectuerconsultation`
--

INSERT INTO `detaileffectuerconsultation` (`ideffectuerconsul`, `idconsultation`, `tauxreductionassurance`, `coutconsultation`, `coutassurance`, `fraisconsultation`, `creerpar`, `modifierpar`, `datecreation`, `datemodification`, `payer`, `payerassuran`) VALUES
(1, 1, '75', '1250', '3750', '5000', NULL, NULL, NULL, NULL, 0, 0),
(1, 20, '75', '5000', '15000', '20000', NULL, NULL, NULL, NULL, 0, 0),
(2, 11, '75', '2500', '7500', '10000', NULL, NULL, NULL, NULL, 0, 0),
(2, 13, '75', '6250', '18750', '25000', NULL, NULL, NULL, NULL, 0, 0),
(3, 1, '80', '1000', '4000', '5000', NULL, NULL, NULL, NULL, 0, 0),
(3, 7, '80', '1600', '6400', '8000', NULL, NULL, NULL, NULL, 0, 0),
(3, 18, '80', '1600', '6400', '8000', NULL, NULL, NULL, NULL, 0, 0),
(4, 12, '75', '1250', '3750', '5000', NULL, NULL, NULL, NULL, 0, 0),
(4, 14, '75', '15000', '45000', '60000', NULL, NULL, NULL, NULL, 0, 0),
(5, 5, '75', '625', '1875', '2500', NULL, NULL, NULL, NULL, 0, 0),
(5, 7, '75', '2000', '6000', '8000', NULL, NULL, NULL, NULL, 0, 0),
(6, 1, '75', '1250', '3750', '5000', NULL, NULL, NULL, NULL, 0, 0),
(6, 11, '75', '2500', '7500', '10000', NULL, NULL, NULL, NULL, 0, 0),
(7, 1, '75', '1250', '3750', '5000', NULL, NULL, NULL, NULL, 0, 0),
(7, 11, '75', '2500', '7500', '10000', NULL, NULL, NULL, NULL, 0, 0),
(8, 1, '75', '1250', '3750', '5000', NULL, NULL, NULL, NULL, 0, 0),
(8, 12, '75', '1250', '3750', '5000', NULL, NULL, NULL, NULL, 0, 0),
(9, 1, '80', '1000', '4000', '5000', NULL, NULL, NULL, NULL, 0, 0),
(9, 6, '80', '1600', '6400', '8000', NULL, NULL, NULL, NULL, 0, 0),
(9, 13, '80', '5000', '20000', '25000', NULL, NULL, NULL, NULL, 0, 0),
(10, 11, '75', '2500', '7500', '10000', NULL, NULL, NULL, NULL, 0, 0),
(10, 12, '75', '1250', '3750', '5000', NULL, NULL, NULL, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `detailordonnance`
--

CREATE TABLE `detailordonnance` (
  `idproduit` varchar(255) NOT NULL,
  `idordonnance` int(11) NOT NULL,
  `prixproduit` int(11) DEFAULT NULL,
  `tauxassurance` decimal(10,0) NOT NULL DEFAULT '0',
  `qte` int(11) DEFAULT NULL,
  `posologie` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `detailordonnance`
--

INSERT INTO `detailordonnance` (`idproduit`, `idordonnance`, `prixproduit`, `tauxassurance`, `qte`, `posologie`) VALUES
('coatème', 2, NULL, '75', 2, '1 matin ,1 midi 1 soir'),
('Anadol', 2, NULL, '75', 3, '1 mat 2 le soir');

-- --------------------------------------------------------

--
-- Structure de la table `detailpayement`
--

CREATE TABLE `detailpayement` (
  `idpayement` int(11) NOT NULL,
  `prestation` varchar(150) NOT NULL,
  `codeprestation` varchar(70) NOT NULL,
  `montant` decimal(10,0) NOT NULL,
  `montantpatient` decimal(10,0) DEFAULT NULL,
  `montanttotal` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `detailpayement`
--

INSERT INTO `detailpayement` (`idpayement`, `prestation`, `codeprestation`, `montant`, `montantpatient`, `montanttotal`) VALUES
(1, 'Soin', '1', '2075', NULL, NULL),
(3, 'Soin', '2', '2320', NULL, NULL),
(4, 'Consultation', '3', '16800', NULL, NULL),
(4, 'Soin', '2', '2320', NULL, NULL),
(5, 'Consultation', '2', '8750', NULL, NULL),
(5, 'Consultation', '4', '16250', NULL, NULL),
(6, 'Consultation', '5', '2625', NULL, NULL),
(8, 'Hospitalisation', '6', '6250', NULL, NULL),
(9, 'Consultation', '1', '18750', NULL, NULL),
(9, 'Consultation', '2', '26250', NULL, NULL),
(9, 'Consultation', '4', '48750', NULL, NULL),
(9, 'Consultation', '5', '7875', NULL, NULL),
(9, 'Consultation', '6', '11250', NULL, NULL),
(9, 'Consultation', '7', '11250', NULL, NULL),
(9, 'Hospitalisation', '6', '6250', NULL, NULL),
(9, 'Soin', '1', '2075', NULL, NULL),
(10, 'Consultation', '8', '2500', NULL, NULL),
(10, 'Soin', '3', '5000', NULL, NULL),
(11, 'Consultation', '8', '7500', NULL, NULL),
(11, 'Soin', '3', '5000', NULL, NULL),
(12, 'Consultation', '9', '30400', NULL, NULL),
(13, 'Consultation', '10', '3750', NULL, NULL),
(13, 'Pharmacie', '1', '35000', NULL, NULL),
(13, 'Soin', '4', '5750', NULL, NULL),
(14, 'Consultation', '10', '11250', NULL, NULL),
(14, 'Pharmacie', '1', '35000', NULL, NULL),
(14, 'Soin', '4', '5750', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `detailrecu`
--

CREATE TABLE `detailrecu` (
  `idrecu` int(11) NOT NULL,
  `prestation` varchar(150) NOT NULL,
  `codeprestation` varchar(70) NOT NULL,
  `montant` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `donnesoins`
--

CREATE TABLE `donnesoins` (
  `iddonnesoins` int(11) NOT NULL,
  `idpatient` int(11) NOT NULL,
  `observation` varchar(255) DEFAULT NULL,
  `datedonnesoins` datetime NOT NULL,
  `payer` tinyint(1) NOT NULL,
  `payerassuran` int(11) NOT NULL,
  `indigeant` tinyint(1) DEFAULT NULL,
  `autorisation` tinyint(1) DEFAULT NULL,
  `echeance` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `donnesoins`
--

INSERT INTO `donnesoins` (`iddonnesoins`, `idpatient`, `observation`, `datedonnesoins`, `payer`, `payerassuran`, `indigeant`, `autorisation`, `echeance`) VALUES
(1, 1, NULL, '2018-06-05 16:25:57', 1, 1, 0, 0, '0000-00-00'),
(2, 2, NULL, '2018-06-06 15:52:21', 1, 1, 0, 0, '0000-00-00'),
(3, 1, NULL, '2018-06-08 09:41:28', 1, 1, 0, 0, '0000-00-00'),
(4, 1, NULL, '2018-06-08 15:41:38', 1, 1, 0, 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `effectueranalyse`
--

CREATE TABLE `effectueranalyse` (
  `ideffectueanalyse` int(11) NOT NULL,
  `idpatient` int(11) NOT NULL,
  `idprelevement` int(11) NOT NULL,
  `idanalysemedicale` int(11) NOT NULL,
  `dateanalyse` datetime NOT NULL,
  `payer` tinyint(1) NOT NULL,
  `payerassuran` int(11) DEFAULT NULL,
  `coutanalyse` decimal(10,0) NOT NULL,
  `indigeant` tinyint(1) DEFAULT NULL,
  `autorisation` tinyint(1) DEFAULT NULL,
  `echeance` date DEFAULT NULL,
  `rdv` datetime DEFAULT NULL,
  `libresultat` varchar(150) DEFAULT NULL,
  `normes` varchar(255) DEFAULT NULL,
  `descriptionresultat` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `effectueranalyse`
--

INSERT INTO `effectueranalyse` (`ideffectueanalyse`, `idpatient`, `idprelevement`, `idanalysemedicale`, `dateanalyse`, `payer`, `payerassuran`, `coutanalyse`, `indigeant`, `autorisation`, `echeance`, `rdv`, `libresultat`, `normes`, `descriptionresultat`) VALUES
(4, 1, 4, 8, '2018-07-10 10:21:00', 0, NULL, '4000', NULL, NULL, NULL, NULL, 'recherche négative', 'compris entre 5 et 8', ''),
(2, 3, 5, 14, '2018-07-13 11:31:23', 0, NULL, '3000', NULL, NULL, NULL, NULL, 'recherche négative', '18 et 24', '');

-- --------------------------------------------------------

--
-- Structure de la table `effectuerconsultation`
--

CREATE TABLE `effectuerconsultation` (
  `ideffectuerconsul` int(11) NOT NULL,
  `idpatient` int(11) NOT NULL,
  `indigeant` tinyint(1) NOT NULL,
  `autorisation` tinyint(1) NOT NULL,
  `echeance` date NOT NULL,
  `dateconsultation` datetime DEFAULT NULL,
  `payer` tinyint(1) NOT NULL,
  `payerassuran` tinyint(1) NOT NULL,
  `payerpatient` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `effectuerconsultation`
--

INSERT INTO `effectuerconsultation` (`ideffectuerconsul`, `idpatient`, `indigeant`, `autorisation`, `echeance`, `dateconsultation`, `payer`, `payerassuran`, `payerpatient`) VALUES
(1, 1, 0, 0, '0000-00-00', '2018-06-06 12:18:25', 1, 1, 0),
(2, 1, 0, 0, '0000-00-00', '2018-06-06 14:15:39', 1, 1, 0),
(3, 2, 0, 0, '0000-00-00', '2018-06-06 15:51:21', 1, 1, 0),
(4, 1, 0, 0, '0000-00-00', '2018-06-07 11:46:08', 1, 1, 0),
(5, 1, 0, 0, '0000-00-00', '2018-06-07 17:46:28', 1, 1, 0),
(6, 1, 0, 0, '0000-00-00', '2018-06-07 17:53:08', 1, 1, 0),
(7, 1, 0, 0, '0000-00-00', '2018-06-08 08:12:19', 1, 1, 0),
(8, 1, 0, 0, '0000-00-00', '2018-06-08 09:35:29', 1, 1, 0),
(9, 2, 0, 0, '0000-00-00', '2018-06-08 12:35:19', 0, 1, 0),
(10, 1, 0, 0, '0000-00-00', '2018-06-08 15:41:09', 1, 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `effectuerexamen`
--

CREATE TABLE `effectuerexamen` (
  `idpatient` int(11) NOT NULL,
  `idexamen` int(11) NOT NULL,
  `dateexamen` datetime NOT NULL,
  `payer` tinyint(1) NOT NULL,
  `indigeant` tinyint(1) NOT NULL,
  `autorisation` tinyint(1) NOT NULL,
  `echeance` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `examen`
--

CREATE TABLE `examen` (
  `idexamen` int(11) NOT NULL,
  `idtypeexamen` int(11) NOT NULL,
  `libexamen` varchar(255) NOT NULL,
  `dateexamen` datetime DEFAULT NULL,
  `motifexamen` varchar(255) DEFAULT NULL,
  `abdomen` varchar(150) DEFAULT NULL,
  `perinetevulve` varchar(150) DEFAULT NULL,
  `speculum` varchar(150) DEFAULT NULL,
  `touchevaginal` varchar(150) DEFAULT NULL,
  `tr` varchar(150) DEFAULT NULL,
  `resume` varchar(150) DEFAULT NULL,
  `hypothesediagnostic` varchar(150) DEFAULT NULL,
  `examcomplementaire` varchar(150) DEFAULT NULL,
  `traitement` varchar(150) DEFAULT NULL,
  `consigne` varchar(150) DEFAULT NULL,
  `ddr` date DEFAULT NULL,
  `terme` varchar(150) DEFAULT NULL,
  `plaintes` varchar(255) DEFAULT NULL,
  `maf` varchar(150) DEFAULT NULL,
  `tepouls` varchar(150) DEFAULT NULL,
  `urines` varchar(150) DEFAULT NULL,
  `omi` varchar(150) DEFAULT NULL,
  `hu` varchar(150) DEFAULT NULL,
  `bdg` varchar(150) DEFAULT NULL,
  `tv` varchar(150) DEFAULT NULL,
  `presentation` varchar(150) DEFAULT NULL,
  `bassin` varchar(150) DEFAULT NULL,
  `analyses` varchar(150) DEFAULT NULL,
  `rdv` datetime DEFAULT NULL,
  `iduser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `examenclinic`
--

CREATE TABLE `examenclinic` (
  `idexamen` int(11) NOT NULL,
  `idpatient` int(11) NOT NULL COMMENT 'Patient N°',
  `hdm` text,
  `appcardivascu` varchar(255) DEFAULT NULL,
  `apprespiratoire` varchar(255) DEFAULT NULL,
  `appdigestif` varchar(255) DEFAULT NULL,
  `appurogenital` varchar(255) DEFAULT NULL,
  `motifconsultation` text,
  `dateexamen` datetime DEFAULT NULL,
  `coeur` varchar(150) DEFAULT NULL,
  `poumon` varchar(150) DEFAULT NULL,
  `abdomen` varchar(150) DEFAULT NULL,
  `urogenital` varchar(150) DEFAULT NULL,
  `locomoteur` varchar(150) DEFAULT NULL,
  `autres` varchar(150) DEFAULT NULL,
  `diagnostic` varchar(150) DEFAULT NULL,
  `paraclinic` varchar(255) DEFAULT NULL,
  `cat` text,
  `createdat` datetime NOT NULL,
  `updatedat` datetime DEFAULT NULL,
  `deletedat` datetime DEFAULT NULL,
  `createdby` int(11) DEFAULT NULL,
  `updatedby` int(11) DEFAULT NULL,
  `deletedby` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `examengyneco`
--

CREATE TABLE `examengyneco` (
  `idexamengyneco` int(11) NOT NULL,
  `idpatient` int(11) NOT NULL COMMENT 'Patient N°',
  `seins` varchar(200) DEFAULT NULL,
  `abdomen` varchar(150) DEFAULT NULL,
  `perineetvulve` varchar(250) DEFAULT NULL,
  `speculum` varchar(150) DEFAULT NULL,
  `tv` varchar(150) DEFAULT NULL,
  `tr` varchar(150) DEFAULT NULL,
  `resume` text,
  `hypothese` text,
  `examencomplementaire` text,
  `traitement` text,
  `consigne` text,
  `dateentree` datetime DEFAULT NULL,
  `datesortie` datetime DEFAULT NULL,
  `adresseepar` varchar(255) DEFAULT NULL,
  `pour` varchar(255) DEFAULT NULL,
  `hbpatient` varchar(50) DEFAULT NULL,
  `createdat` datetime DEFAULT NULL,
  `updatedat` datetime DEFAULT NULL,
  `deletedat` datetime DEFAULT NULL,
  `createdby` int(11) DEFAULT NULL,
  `updatedby` int(11) DEFAULT NULL,
  `deletedby` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `historique`
--

CREATE TABLE `historique` (
  `idhistorique` bigint(20) NOT NULL,
  `iduser` int(11) NOT NULL,
  `action` varchar(70) NOT NULL,
  `model` varchar(255) DEFAULT NULL,
  `idmodel` varchar(255) DEFAULT NULL,
  `date` datetime NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `historique`
--

INSERT INTO `historique` (`idhistorique`, `iduser`, `action`, `model`, `idmodel`, `date`, `description`) VALUES
(1, 2, 'Log in', NULL, NULL, '2018-03-30 19:28:54', 'igbataou s\'est connecté(e)'),
(2, 2, 'Log out', NULL, NULL, '2018-03-30 19:42:14', 'igbataou s\'est déconnecté(e)'),
(3, 2, 'Log in', NULL, NULL, '2018-04-05 18:33:25', 'igbataou s\'est connecté(e)'),
(4, 14, 'Log out', NULL, NULL, '2018-04-05 18:33:46', 'ouro-gaffou s\'est déconnecté(e)'),
(5, 1, 'Log in', NULL, NULL, '2018-04-05 18:33:55', 'admin s\'est connecté(e)'),
(6, 1, 'Log in', NULL, NULL, '2018-04-05 19:04:33', 'admin s\'est connecté(e)'),
(7, 1, 'Create user', NULL, NULL, '2018-04-05 19:12:50', 'admin a enregistrer l\'utilisateur N°23'),
(8, 1, 'Log out', NULL, NULL, '2018-04-05 19:12:56', 'admin s\'est déconnecté(e)'),
(9, 23, 'Log in', NULL, NULL, '2018-04-05 19:13:07', 'atcha-alaza s\'est connecté(e)'),
(10, 23, 'Log out', NULL, NULL, '2018-04-05 19:14:28', 'atcha-alaza s\'est déconnecté(e)'),
(11, 2, 'Log out', NULL, NULL, '2018-04-05 19:50:40', 'igbataou s\'est déconnecté(e)'),
(12, 1, 'Log in', NULL, NULL, '2018-04-25 17:24:03', 'admin s\'est connecté(e)'),
(13, 1, 'Log in', NULL, NULL, '2018-04-25 18:47:37', 'admin s\'est connecté(e)'),
(14, 1, 'Log in', NULL, NULL, '2018-04-26 18:18:45', 'admin s\'est connecté(e)'),
(15, 1, 'Log in', NULL, NULL, '2018-05-04 18:36:57', 'admin s\'est connecté(e)'),
(16, 13, 'Log in', NULL, NULL, '2018-05-04 21:37:02', 'missihu s\'est connecté(e)'),
(17, 1, 'Create Patient', NULL, NULL, '2018-05-11 15:06:32', 'admin a créé le patient N° 1'),
(18, 1, 'Create demanderanalyse', NULL, NULL, '2018-05-12 08:53:22', 'admin a enregistré les demande analyse N°8 du patient N° 1'),
(19, 1, 'Read Historique', NULL, NULL, '2018-05-12 08:54:49', 'admin a consulté la liste des historiques'),
(20, 1, 'Create demanderanalyse', NULL, NULL, '2018-05-12 08:57:05', 'admin a enregistré les demande analyse N°1 du patient N° 1'),
(21, 1, 'Create Patient', NULL, NULL, '2018-05-13 09:42:23', 'admin a créé le patient N° 2'),
(22, 1, 'Create Patient', NULL, NULL, '2018-05-13 09:47:54', 'admin a créé le patient N° 3'),
(23, 1, 'Create donnesoin', NULL, NULL, '2018-05-13 09:50:20', 'admin a enregistré les soins N°1 du patient N° 1'),
(24, 1, 'Create demanderanalyse', NULL, NULL, '2018-05-13 11:34:43', 'admin a enregistré les demande analyse N°2 du patient N° 2'),
(25, 1, 'Create demanderanalyse', NULL, NULL, '2018-05-13 11:46:50', 'admin a enregistré les demande analyse N°2 du patient N° 2'),
(26, 1, 'Create demanderanalyse', NULL, NULL, '2018-05-13 11:47:27', 'admin a enregistré les demande analyse N°2 du patient N° 2'),
(27, 1, 'Create demanderanalyse', NULL, NULL, '2018-05-13 11:54:46', 'admin a enregistré les demande analyse N°2 du patient N° 2'),
(28, 1, 'Create demanderanalyse', NULL, NULL, '2018-05-13 11:55:18', 'admin a enregistré les demande analyse N°2 du patient N° 2'),
(29, 1, 'Create demanderanalyse', NULL, NULL, '2018-05-13 11:59:00', 'admin a enregistré les demande analyse N°3 du patient N° 2'),
(30, 1, 'Create demanderanalyse', NULL, NULL, '2018-05-13 12:07:24', 'admin a enregistré les demande analyse N°3 du patient N° 2'),
(31, 1, 'Create demanderanalyse', NULL, NULL, '2018-05-13 12:55:10', 'admin a enregistré les demande analyse N°3 du patient N° 2'),
(32, 1, 'Create demanderanalyse', NULL, NULL, '2018-05-13 12:55:42', 'admin a enregistré les demande analyse N°3 du patient N° 2'),
(33, 1, 'Create demanderanalyse', NULL, NULL, '2018-05-13 12:59:04', 'admin a enregistré les demande analyse N°4 du patient N° 3'),
(34, 1, 'Create demanderanalyse', NULL, NULL, '2018-05-13 13:04:12', 'admin a enregistré les demande analyse N°4 du patient N° 3'),
(35, 1, 'Create demanderanalyse', NULL, NULL, '2018-05-13 13:07:51', 'admin a enregistré les demande analyse N°1 du patient N° 1'),
(36, 1, 'Create demanderanalyse', NULL, NULL, '2018-05-13 13:08:08', 'admin a enregistré les demande analyse N°1 du patient N° 1'),
(37, 1, 'Create', 'Effectuerconsultation', NULL, '2018-05-13 20:04:31', 'admin a enregistré la consultation N°2 du patient N° 1'),
(38, 1, 'Create antecedent', NULL, NULL, '2018-05-13 20:10:33', 'admin a enregistré l\'antécédent N°1'),
(39, 1, 'Create donnesoin', NULL, NULL, '2018-05-13 20:11:23', 'admin a enregistré les soins N°2 du patient N° 2'),
(40, 1, 'Create Ordonnance', NULL, NULL, '2018-05-13 20:46:06', 'admin a enregistré l\'ordonnance N°2 du patient N° 1'),
(41, 1, 'Create demanderanalyse', NULL, NULL, '2018-05-13 20:54:21', 'admin a enregistré les demande analyse N°2 du patient N° 3'),
(42, 1, 'Create', 'Effectuerconsultation', NULL, '2018-05-14 20:44:56', 'admin a enregistré la consultation N°3 du patient N° 2'),
(43, 1, 'Create Patient', NULL, NULL, '2018-05-15 14:47:03', 'admin a créé le patient N° 4'),
(44, 1, 'Create', 'Effectuerconsultation', NULL, '2018-05-15 14:50:43', 'admin a enregistré la consultation N°4 du patient N° 4'),
(45, 1, 'Create demanderanalyse', NULL, NULL, '2018-05-15 16:18:32', 'admin a enregistré les demande analyse N°3 du patient N° 4'),
(46, 1, 'Log in', NULL, NULL, '2018-05-16 10:42:08', 'admin s\'est connecté(e)'),
(47, 1, 'Create', 'Effectuerconsultation', NULL, '2018-05-16 10:59:51', 'admin a enregistré la consultation N°5 du patient N° 1'),
(48, 1, 'Create donnesoin', NULL, NULL, '2018-05-16 17:17:40', 'admin a enregistré les soins N°3 du patient N° 1'),
(49, 1, 'Create', 'Effectuerconsultation', NULL, '2018-05-22 09:12:23', 'admin a enregistré la consultation N°1 du patient N° 1'),
(50, 1, 'Create', 'Effectuerconsultation', NULL, '2018-05-22 09:14:56', 'admin a enregistré la consultation N°2 du patient N° 1'),
(51, 1, 'Create donnesoin', NULL, NULL, '2018-05-22 09:47:06', 'admin a enregistré les soins N°1 du patient N° 1'),
(52, 1, 'Create donnesoin', NULL, NULL, '2018-05-22 11:02:00', 'admin a enregistré les soins N°2 du patient N° 2'),
(53, 1, 'Create', 'Effectuerconsultation', NULL, '2018-05-22 12:42:05', 'admin a enregistré la consultation N°3 du patient N° 3'),
(54, 1, 'Create', 'Effectuerconsultation', NULL, '2018-05-22 12:47:07', 'admin a enregistré la consultation N°4 du patient N° 3'),
(55, 1, 'Create', 'Effectuerconsultation', NULL, '2018-05-22 12:53:51', 'admin a enregistré la consultation N°5 du patient N° 3'),
(56, 1, 'Create', 'Effectuerconsultation', NULL, '2018-05-22 12:57:31', 'admin a enregistré la consultation N°6 du patient N° 2'),
(57, 1, 'Create', 'Effectuerconsultation', NULL, '2018-05-22 12:58:46', 'admin a enregistré la consultation N°7 du patient N° 2'),
(58, 1, 'Create', 'Effectuerconsultation', NULL, '2018-05-22 16:09:01', 'admin a enregistré la consultation N°8 du patient N° 1'),
(59, 1, 'Create', 'Effectuerconsultation', NULL, '2018-05-22 16:14:08', 'admin a enregistré la consultation N°8 du patient N° 1'),
(60, 1, 'Create', 'Effectuerconsultation', NULL, '2018-05-25 11:53:57', 'admin a enregistré la consultation N°1 du patient N° 1'),
(61, 1, 'Create', 'Effectuerconsultation', NULL, '2018-06-04 14:58:16', 'admin a enregistré la consultation N°2 du patient N° 2'),
(62, 1, 'Create', 'Effectuerconsultation', NULL, '2018-06-04 16:59:14', 'admin a enregistré la consultation N°3 du patient N° 1'),
(63, 1, 'Create', 'Effectuerconsultation', NULL, '2018-06-05 16:25:24', 'admin a enregistré la consultation N°4 du patient N° 1'),
(64, 1, 'Create donnesoin', NULL, NULL, '2018-06-05 16:25:58', 'admin a enregistré les soins N°1 du patient N° 1'),
(65, 1, 'Create', 'Effectuerconsultation', NULL, '2018-06-06 11:43:42', 'admin a enregistré la consultation N°1 du patient N° 1'),
(66, 1, 'Create', 'Effectuerconsultation', NULL, '2018-06-06 12:18:26', 'admin a enregistré la consultation N°1 du patient N° 1'),
(67, 1, 'Log in', NULL, NULL, '2018-06-06 14:14:19', 'admin s\'est connecté(e)'),
(68, 1, 'Create', 'Effectuerconsultation', NULL, '2018-06-06 14:15:39', 'admin a enregistré la consultation N°2 du patient N° 1'),
(69, 1, 'Create', 'Effectuerconsultation', NULL, '2018-06-06 15:51:21', 'admin a enregistré la consultation N°3 du patient N° 2'),
(70, 1, 'Create donnesoin', NULL, NULL, '2018-06-06 15:52:21', 'admin a enregistré les soins N°2 du patient N° 2'),
(71, 1, 'Create', 'Effectuerconsultation', NULL, '2018-06-07 11:46:08', 'admin a enregistré la consultation N°4 du patient N° 1'),
(72, 1, 'Create', 'Effectuerconsultation', NULL, '2018-06-07 17:46:29', 'admin a enregistré la consultation N°5 du patient N° 1'),
(73, 1, 'Create', 'Effectuerconsultation', NULL, '2018-06-07 17:53:09', 'admin a enregistré la consultation N°6 du patient N° 1'),
(74, 1, 'Create', 'Effectuerconsultation', NULL, '2018-06-08 08:12:19', 'admin a enregistré la consultation N°7 du patient N° 1'),
(75, 1, 'Create', 'Effectuerconsultation', NULL, '2018-06-08 09:35:29', 'admin a enregistré la consultation N°8 du patient N° 1'),
(76, 1, 'Create donnesoin', NULL, NULL, '2018-06-08 09:41:28', 'admin a enregistré les soins N°3 du patient N° 1'),
(77, 1, 'Create', 'Effectuerconsultation', NULL, '2018-06-08 12:35:20', 'admin a enregistré la consultation N°9 du patient N° 2'),
(78, 1, 'Create', 'Effectuerconsultation', NULL, '2018-06-08 15:41:09', 'admin a enregistré la consultation N°10 du patient N° 1'),
(79, 1, 'Create donnesoin', NULL, NULL, '2018-06-08 15:41:38', 'admin a enregistré les soins N°4 du patient N° 1'),
(80, 1, 'Create demanderanalyse', NULL, NULL, '2018-06-12 11:05:46', 'admin a enregistré les demande analyse N°4 du patient N° 1'),
(81, 1, 'Create demanderanalyse', NULL, NULL, '2018-07-07 11:05:02', 'admin a enregistré les demande analyse N°5 du patient N° 4'),
(82, 1, 'Create demanderanalyse', NULL, NULL, '2018-07-07 11:16:22', 'admin a enregistré les demande analyse N°5 du patient N° 2'),
(83, 1, 'Create demanderanalyse', NULL, NULL, '2018-07-10 10:21:00', 'admin a enregistré les demande analyse N°1 du patient N° 1'),
(84, 1, 'Create demanderanalyse', NULL, NULL, '2018-07-10 16:55:00', 'admin a enregistré les demande analyse N°2 du patient N° 2'),
(85, 1, 'Log in', NULL, NULL, '2018-07-13 10:19:17', 'admin s\'est connecté(e)'),
(86, 1, 'Create demanderanalyse', NULL, NULL, '2018-07-13 11:31:24', 'admin a enregistré les demande analyse N°3 du patient N° 3'),
(87, 1, 'Create demanderanalyse', NULL, NULL, '2018-07-13 11:31:51', 'admin a enregistré les demande analyse N°3 du patient N° 3');

-- --------------------------------------------------------

--
-- Structure de la table `hospitalisation`
--

CREATE TABLE `hospitalisation` (
  `idhospitalisation` int(11) NOT NULL,
  `libhospitalisation` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `hospitalisation`
--

INSERT INTO `hospitalisation` (`idhospitalisation`, `libhospitalisation`) VALUES
(1, 'maux de ventre'),
(2, 'maux de ventre'),
(3, 'maux de ventre'),
(4, 'paludisme'),
(5, 'paludisme'),
(6, 'Anémie');

-- --------------------------------------------------------

--
-- Structure de la table `hospitaliser`
--

CREATE TABLE `hospitaliser` (
  `idpatient` int(11) NOT NULL,
  `idhospitalisation` int(11) NOT NULL,
  `idchbre` int(11) NOT NULL,
  `datedebut` date NOT NULL,
  `datefin` date DEFAULT NULL,
  `payer` tinyint(1) NOT NULL,
  `payerassuran` int(11) NOT NULL,
  `indigeant` tinyint(1) DEFAULT NULL,
  `autorisation` tinyint(1) DEFAULT NULL,
  `echeance` date DEFAULT NULL,
  `coutunitchbre` int(11) DEFAULT NULL,
  `tauxassurance` int(3) DEFAULT NULL,
  `coutbrut` int(11) DEFAULT NULL,
  `coutassurance` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `hospitaliser`
--

INSERT INTO `hospitaliser` (`idpatient`, `idhospitalisation`, `idchbre`, `datedebut`, `datefin`, `payer`, `payerassuran`, `indigeant`, `autorisation`, `echeance`, `coutunitchbre`, `tauxassurance`, `coutbrut`, `coutassurance`) VALUES
(1, 6, 9, '2018-06-07', '2018-06-08', 1, 1, 0, 0, '0000-00-00', 3125, 75, 12500, 9375),
(2, 3, 2, '2018-06-06', NULL, 0, 0, 0, 0, '0000-00-00', 5000, 0, NULL, NULL),
(2, 5, 5, '2018-06-07', NULL, 0, 0, 0, 0, '0000-00-00', 2499, 80, 12500, 10000),
(3, 4, 5, '2018-06-07', NULL, 0, 0, 0, 0, '0000-00-00', 3750, 70, 12500, 8750);

-- --------------------------------------------------------

--
-- Structure de la table `maitriser`
--

CREATE TABLE `maitriser` (
  `idspecialite` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `natureprelev`
--

CREATE TABLE `natureprelev` (
  `idnature` int(11) NOT NULL,
  `libnature` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `natureprelev`
--

INSERT INTO `natureprelev` (`idnature`, `libnature`) VALUES
(1, 'Sang'),
(2, 'Urine'),
(3, 'Autre');

-- --------------------------------------------------------

--
-- Structure de la table `ordonnance`
--

CREATE TABLE `ordonnance` (
  `idordonnance` int(11) NOT NULL,
  `idpatient` int(11) NOT NULL,
  `observation` varchar(255) DEFAULT NULL,
  `datecreation` datetime NOT NULL,
  `datemodification` datetime DEFAULT NULL,
  `iduser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ordonnance`
--

INSERT INTO `ordonnance` (`idordonnance`, `idpatient`, `observation`, `datecreation`, `datemodification`, `iduser`) VALUES
(1, 1, '', '2018-05-13 20:44:42', NULL, 1),
(2, 1, '', '2018-05-13 20:46:05', NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `parametrepatient`
--

CREATE TABLE `parametrepatient` (
  `idparametre` int(11) NOT NULL,
  `idpatient` int(11) NOT NULL,
  `tention` varchar(50) DEFAULT NULL,
  `temperature` float DEFAULT NULL,
  `poids` float DEFAULT NULL,
  `nbreenfant` int(11) DEFAULT NULL,
  `dateprelev` datetime DEFAULT NULL,
  `pouls` varchar(50) DEFAULT NULL,
  `taille` decimal(10,0) DEFAULT NULL,
  `etatgeneral` varchar(150) DEFAULT NULL,
  `muqueuses` varchar(150) DEFAULT NULL,
  `coeur` varchar(150) DEFAULT NULL,
  `appdigest` varchar(150) DEFAULT NULL,
  `ddr` date DEFAULT NULL,
  `autrappareil` varchar(255) DEFAULT NULL,
  `datecreation` datetime DEFAULT NULL,
  `datemodification` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `patient`
--

CREATE TABLE `patient` (
  `idpatient` int(11) NOT NULL,
  `idassurance` int(11) DEFAULT NULL,
  `nompatient` varchar(50) NOT NULL,
  `prenompatient` varchar(70) NOT NULL,
  `photopatient` varchar(150) DEFAULT NULL,
  `datenaisspatient` date DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `sexpatient` char(1) DEFAULT NULL,
  `tel1patient` varchar(20) DEFAULT NULL,
  `tel2patient` varchar(20) DEFAULT NULL,
  `proffesionpatient` varchar(150) DEFAULT NULL,
  `statutmatripatient` varchar(150) DEFAULT NULL,
  `gsphpatient` varchar(25) DEFAULT NULL,
  `personneaprevenir` varchar(200) DEFAULT NULL,
  `datecreation` datetime NOT NULL,
  `datemodification` datetime DEFAULT NULL,
  `tauxassu` int(3) UNSIGNED ZEROFILL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `patient`
--

INSERT INTO `patient` (`idpatient`, `idassurance`, `nompatient`, `prenompatient`, `photopatient`, `datenaisspatient`, `age`, `sexpatient`, `tel1patient`, `tel2patient`, `proffesionpatient`, `statutmatripatient`, `gsphpatient`, `personneaprevenir`, `datecreation`, `datemodification`, `tauxassu`) VALUES
(1, 2, 'DEGUE', 'akouvi', NULL, '1998-11-11', 19, 'M', '90112233', '', '', 'Célibataire', 'O+', '', '2018-05-11 15:06:32', NULL, 075),
(2, 1, 'HLOMEGBE', 'Mariam', NULL, '1994-06-05', 23, 'F', '91223366', '98756321', 'assistante médicale ', 'Marié', 'O+', '', '2018-05-13 09:42:23', NULL, 080),
(3, 1, 'BEMA ', 'GADO', NULL, '1997-11-11', 20, 'M', '97979797', '99886633', 'Chef d\'entreprise', 'Marié avec enfants', 'O+', '', '2018-05-13 09:47:54', NULL, 070),
(4, 7, 'DERMANE', 'TAIBA', NULL, '2000-10-10', 17, 'F', '96332211', '', '', 'Célibataire', 'B-', '', '2018-05-15 14:47:03', NULL, 080);

-- --------------------------------------------------------

--
-- Structure de la table `patient2`
--

CREATE TABLE `patient2` (
  `idpatient` int(11) NOT NULL,
  `idassurance` int(11) DEFAULT NULL,
  `nompatient` varchar(50) NOT NULL,
  `prenompatient` varchar(70) NOT NULL,
  `photopatient` varchar(150) DEFAULT NULL,
  `datenaisspatient` date DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `sexpatient` char(1) DEFAULT NULL,
  `tel1patient` varchar(20) DEFAULT NULL,
  `tel2patient` varchar(20) DEFAULT NULL,
  `proffesionpatient` varchar(150) DEFAULT NULL,
  `statutmatripatient` varchar(150) DEFAULT NULL,
  `gsphpatient` varchar(25) DEFAULT NULL,
  `personneaprevenir` varchar(200) DEFAULT NULL,
  `datecreation` datetime NOT NULL,
  `datemodification` datetime DEFAULT NULL,
  `tauxassu` int(10) UNSIGNED ZEROFILL DEFAULT '0000000000'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `payement`
--

CREATE TABLE `payement` (
  `idpayement` int(11) NOT NULL,
  `idpatient` int(11) NOT NULL,
  `refpayement` varchar(150) NOT NULL,
  `montantrecu` decimal(10,0) NOT NULL,
  `montantasurance` decimal(10,0) DEFAULT NULL,
  `montanttotal` decimal(10,0) DEFAULT NULL,
  `datepayement` datetime NOT NULL,
  `iduser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `payement`
--

INSERT INTO `payement` (`idpayement`, `idpatient`, `refpayement`, `montantrecu`, `montantasurance`, `montanttotal`, `datepayement`, `iduser`) VALUES
(1, 1, 'payement N° 1', '8325', NULL, NULL, '2018-06-06 12:38:23', 1),
(2, 1, 'payement N° 2', '6250', NULL, NULL, '2018-06-06 14:14:49', 1),
(3, 2, 'payement N° 3', '6520', NULL, NULL, '2018-06-07 11:25:13', 1),
(4, 2, 'payement N° 4', '20000', '19120', NULL, '2018-06-07 11:27:02', 1),
(5, 1, 'payement N° 5', '25000', NULL, NULL, '2018-06-07 17:43:41', 1),
(6, 1, 'payement N° 6', '2625', NULL, NULL, '2018-06-07 17:47:13', 1),
(7, 1, 'payement N° 7', '3750', NULL, NULL, '2018-06-08 08:10:03', 1),
(8, 1, 'payement N° 8', '10000', NULL, NULL, '2018-06-08 09:27:36', 1),
(9, 1, 'payement N° 9', '126200', '126200', NULL, '2018-06-08 09:34:32', 1),
(10, 1, 'payement N° 10', '7500', NULL, NULL, '2018-06-08 09:41:44', 1),
(11, 1, 'payement N° 11', '130000', '12500', NULL, '2018-06-08 12:34:07', 1),
(12, 2, 'payement N° 12', '31000', '30400', NULL, '2018-06-08 14:32:55', 1),
(13, 1, 'payement N° 13', '44500', NULL, NULL, '2018-06-08 15:42:42', 1),
(14, 1, 'payement N° 14', '52000', NULL, NULL, '2018-06-08 15:45:48', 1);

-- --------------------------------------------------------

--
-- Structure de la table `prelevement`
--

CREATE TABLE `prelevement` (
  `idprelevement` int(11) NOT NULL,
  `preleveur` varchar(150) DEFAULT NULL,
  `coutanalyse` float NOT NULL,
  `dateanalyse` datetime DEFAULT NULL,
  `payer` int(11) NOT NULL,
  `statutresul` int(11) NOT NULL,
  `payerassuran` int(11) NOT NULL,
  `indigeant` int(11) NOT NULL,
  `dateprelev` datetime DEFAULT NULL,
  `datereception` datetime DEFAULT NULL,
  `conforme` varchar(150) DEFAULT NULL,
  `Urgent` varchar(25) DEFAULT NULL,
  `idnature` int(11) DEFAULT NULL,
  `autre` varchar(255) DEFAULT NULL,
  `idaspectprelevement` int(11) DEFAULT NULL,
  `infoPrelevement` varchar(255) DEFAULT NULL,
  `idpatient` int(11) DEFAULT NULL,
  `idanalysemedicale` int(11) DEFAULT NULL,
  `iddemandeanalyse` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `prelevement`
--

INSERT INTO `prelevement` (`idprelevement`, `preleveur`, `coutanalyse`, `dateanalyse`, `payer`, `statutresul`, `payerassuran`, `indigeant`, `dateprelev`, `datereception`, `conforme`, `Urgent`, `idnature`, `autre`, `idaspectprelevement`, `infoPrelevement`, `idpatient`, `idanalysemedicale`, `iddemandeanalyse`) VALUES
(2, 'sama', 2000, '2018-07-10 10:21:00', 0, 0, 0, 0, '2018-07-06 09:50:06', '2018-07-06 14:50:04', NULL, '', 1, '', 1, 'Veineux , ', 1, 5, 1),
(3, 'SENA', 1000, '2018-07-10 10:21:00', 0, 0, 0, 0, '2018-07-20 14:10:15', '2018-07-06 14:50:04', NULL, 'OUI', 1, '', 1, 'A jeun , Veineux , ', 1, 4, 1),
(4, 'abou', 4000, '2018-07-10 10:21:00', 0, 0, 0, 0, '2018-07-06 09:30:04', '2018-07-06 13:00:06', NULL, 'NON', 2, '', 1, 'Capillaire , ', 1, 8, 1),
(5, 'sama', 3000, '2018-07-13 11:31:23', 0, 1, 0, 0, '2018-07-13 11:30:01', '2018-07-13 12:30:01', NULL, 'NON', 1, '', 1, 'Post prandial , ', 3, 14, 3),
(6, 'rachide', 5000, '2018-07-13 11:31:23', 0, 0, 0, 0, '2018-07-06 09:30:04', '2018-07-06 13:00:06', NULL, 'OUI', 1, '', 1, 'Veineux , ', 3, 22, 3),
(7, 'abou', 1000, '2018-07-10 16:54:59', 0, 0, 0, 0, '2018-07-06 09:50:06', '2018-07-06 14:50:04', NULL, 'OUI', 3, 'bbbb', 1, 'Veineux , Post prandial , ', 2, 2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `idproduit` int(11) NOT NULL,
  `libproduit` varchar(255) NOT NULL,
  `prixproduit` decimal(10,0) NOT NULL,
  `assure` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`idproduit`, `libproduit`, `prixproduit`, `assure`) VALUES
(1, 'Arthémether', '1500', 0),
(2, 'Paracetamol', '1000', 0),
(3, 'Cofantrine', '2000', 0),
(4, 'Ciproflaxacin', '4500', 0),
(5, 'Métronidazol', '2500', 0);

-- --------------------------------------------------------

--
-- Structure de la table `profil`
--

CREATE TABLE `profil` (
  `idprof` int(11) NOT NULL,
  `nomprof` varchar(70) NOT NULL,
  `gespat` int(10) UNSIGNED DEFAULT NULL,
  `createpat` int(10) UNSIGNED DEFAULT NULL,
  `createparampat` int(10) UNSIGNED DEFAULT NULL,
  `readpat` int(10) UNSIGNED DEFAULT NULL,
  `updatepat` int(10) UNSIGNED DEFAULT NULL,
  `deletepat` int(10) UNSIGNED DEFAULT NULL,
  `gescons` int(10) UNSIGNED DEFAULT NULL,
  `createcons` int(10) UNSIGNED DEFAULT NULL,
  `updatecons` int(10) UNSIGNED DEFAULT NULL,
  `readcons` int(10) UNSIGNED DEFAULT NULL,
  `printcons` int(10) UNSIGNED DEFAULT NULL,
  `deletecons` int(10) UNSIGNED DEFAULT NULL,
  `geshos` int(10) UNSIGNED DEFAULT NULL,
  `createhos` int(10) UNSIGNED DEFAULT NULL,
  `updatehos` int(10) UNSIGNED DEFAULT NULL,
  `readhos` int(10) UNSIGNED DEFAULT NULL,
  `deletehos` int(10) UNSIGNED DEFAULT NULL,
  `printhos` int(10) UNSIGNED DEFAULT NULL,
  `gessoin` int(10) UNSIGNED DEFAULT NULL,
  `createsoin` int(10) UNSIGNED DEFAULT NULL,
  `updatesoin` int(10) UNSIGNED DEFAULT NULL,
  `readsoin` int(10) UNSIGNED DEFAULT NULL,
  `deletesoin` int(10) UNSIGNED DEFAULT NULL,
  `printsoin` int(10) UNSIGNED DEFAULT NULL,
  `gesord` int(10) UNSIGNED DEFAULT NULL,
  `createord` int(10) UNSIGNED DEFAULT NULL,
  `updateord` int(10) UNSIGNED DEFAULT NULL,
  `readord` int(10) UNSIGNED DEFAULT NULL,
  `printord` int(10) UNSIGNED DEFAULT NULL,
  `gesexamed` int(10) UNSIGNED DEFAULT NULL,
  `createexamed` int(10) UNSIGNED DEFAULT NULL,
  `updateexamed` int(10) UNSIGNED DEFAULT NULL,
  `readexamed` int(10) UNSIGNED DEFAULT NULL,
  `deleteexamed` int(10) UNSIGNED DEFAULT NULL,
  `gesana` int(10) UNSIGNED DEFAULT NULL,
  `createana` int(10) UNSIGNED DEFAULT NULL,
  `updateana` int(10) UNSIGNED DEFAULT NULL,
  `readana` int(10) UNSIGNED DEFAULT NULL,
  `deleteana` int(10) UNSIGNED DEFAULT NULL,
  `printana` int(10) UNSIGNED DEFAULT NULL,
  `createdemandanal` int(10) UNSIGNED DEFAULT NULL,
  `updatedemandanal` int(10) UNSIGNED DEFAULT NULL,
  `readdemandanal` int(10) UNSIGNED DEFAULT NULL,
  `deletedemandanal` int(10) UNSIGNED DEFAULT NULL,
  `printdemandanal` int(10) UNSIGNED DEFAULT NULL,
  `createprelev` int(10) UNSIGNED DEFAULT NULL,
  `readprelev` int(10) UNSIGNED DEFAULT NULL,
  `updateprelev` int(10) UNSIGNED DEFAULT NULL,
  `deleteprelev` int(10) UNSIGNED DEFAULT NULL,
  `printprelev` int(10) UNSIGNED DEFAULT NULL,
  `gesuser` int(11) DEFAULT NULL,
  `createuser` int(11) DEFAULT NULL,
  `updateuser` int(11) DEFAULT NULL,
  `readuser` int(11) DEFAULT NULL,
  `deleteuser` int(11) DEFAULT NULL,
  `gescaisse` int(11) DEFAULT NULL,
  `createpaye` int(11) DEFAULT NULL,
  `readpaye` int(11) DEFAULT NULL,
  `updatepaye` int(11) DEFAULT NULL,
  `deletepaye` int(11) DEFAULT NULL,
  `gesprofil` int(11) DEFAULT NULL,
  `createprof` int(11) DEFAULT NULL,
  `readprof` int(11) DEFAULT NULL,
  `updateprof` int(11) DEFAULT NULL,
  `deleteprof` int(11) DEFAULT NULL,
  `gespharma` int(11) DEFAULT NULL,
  `createachaprod` int(11) DEFAULT NULL,
  `readachaprod` int(11) DEFAULT NULL,
  `updateachaprod` int(11) DEFAULT NULL,
  `deleteachaprod` int(11) DEFAULT NULL,
  `gesetat` int(11) DEFAULT NULL,
  `gesstat` int(11) DEFAULT NULL,
  `gesparam` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `profil`
--

INSERT INTO `profil` (`idprof`, `nomprof`, `gespat`, `createpat`, `createparampat`, `readpat`, `updatepat`, `deletepat`, `gescons`, `createcons`, `updatecons`, `readcons`, `printcons`, `deletecons`, `geshos`, `createhos`, `updatehos`, `readhos`, `deletehos`, `printhos`, `gessoin`, `createsoin`, `updatesoin`, `readsoin`, `deletesoin`, `printsoin`, `gesord`, `createord`, `updateord`, `readord`, `printord`, `gesexamed`, `createexamed`, `updateexamed`, `readexamed`, `deleteexamed`, `gesana`, `createana`, `updateana`, `readana`, `deleteana`, `printana`, `createdemandanal`, `updatedemandanal`, `readdemandanal`, `deletedemandanal`, `printdemandanal`, `createprelev`, `readprelev`, `updateprelev`, `deleteprelev`, `printprelev`, `gesuser`, `createuser`, `updateuser`, `readuser`, `deleteuser`, `gescaisse`, `createpaye`, `readpaye`, `updatepaye`, `deletepaye`, `gesprofil`, `createprof`, `readprof`, `updateprof`, `deleteprof`, `gespharma`, `createachaprod`, `readachaprod`, `updateachaprod`, `deleteachaprod`, `gesetat`, `gesstat`, `gesparam`) VALUES
(1, 'Administrateur', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(2, 'Medecin', 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 0, 1, 0, 0, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, NULL),
(3, 'Stagiaire', 1, 0, 0, 1, 0, 0, 1, 0, 0, 1, 0, 0, 1, 0, 0, 1, 0, 0, 1, 0, 0, 1, 0, 0, 1, 0, 0, 1, 0, 1, 0, 0, 1, 0, 1, 0, 0, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 1, 0, 1, 0, 1, 0, 0, 1, 0, 1, 0, 0, 1, 0, 1, 0, 0, 1, 1, NULL),
(4, 'DOCTEUR', 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 1, NULL),
(5, 'INFIRMIER', 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 0, 0, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, NULL),
(6, 'SAGE FEMME', 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, NULL),
(7, 'LABORATOIRE', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL),
(8, 'SECRETARIAT', 1, 1, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `recu`
--

CREATE TABLE `recu` (
  `idrecu` int(11) NOT NULL,
  `refrecu` varchar(150) NOT NULL,
  `montantrecu` decimal(10,0) NOT NULL,
  `daterecu` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `reductionanalyse`
--

CREATE TABLE `reductionanalyse` (
  `idassurance` int(11) NOT NULL,
  `idsoustypeanalysemedicale` int(11) NOT NULL,
  `taux` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `reductionchambre`
--

CREATE TABLE `reductionchambre` (
  `idcategoriechbr` int(11) NOT NULL,
  `idassurance` int(11) NOT NULL,
  `taux` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `reductionconsultation`
--

CREATE TABLE `reductionconsultation` (
  `idassurance` int(11) NOT NULL,
  `idtypeconsultation` int(11) NOT NULL,
  `taux` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `reductionexamen`
--

CREATE TABLE `reductionexamen` (
  `idtypeexamen` int(11) NOT NULL,
  `idassurance` int(11) NOT NULL,
  `taux` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `reductionproduit`
--

CREATE TABLE `reductionproduit` (
  `idproduit` int(11) NOT NULL,
  `idassurance` int(11) NOT NULL,
  `taux` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `reductionsoin`
--

CREATE TABLE `reductionsoin` (
  `idsoin` int(11) NOT NULL,
  `idassurance` int(11) NOT NULL,
  `taux` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `soin`
--

CREATE TABLE `soin` (
  `idsoin` int(11) NOT NULL,
  `libsoin` varchar(150) NOT NULL,
  `coutsoin` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `soin`
--

INSERT INTO `soin` (`idsoin`, `libsoin`, `coutsoin`) VALUES
(1, 'Cathéter', '500'),
(2, 'Perfuseur', '300'),
(3, 'SGI 250', '650'),
(4, 'SGI 500', '650'),
(5, 'SGH 250', '650'),
(6, 'SGH 500', '650'),
(7, 'RL', '950'),
(8, 'SSI', '650'),
(9, 'Ca2+', '200'),
(10, 'Na Cl', '200'),
(11, 'Kcal', '200'),
(12, 'VIT C', '200'),
(13, 'VIT B', '200'),
(14, 'VIT K1', '1000'),
(15, 'Paracétamol perf 1g', '1900'),
(16, 'Paracétamol perf 500', '1900'),
(17, 'Tramadol', '800'),
(18, 'Acupan', '600'),
(19, 'Spasfon', '500'),
(20, 'Vicéralgine', '500'),
(21, 'Ketoprofen', '500'),
(22, 'Diclofenac', '500'),
(23, 'Ceftriaxone', '2900'),
(24, 'Ciplacef', '1400'),
(25, 'Kefotax', '1900'),
(26, 'Curam', '2990'),
(27, 'Métronidazol 500', '1000'),
(28, 'Ampiciline 1 g', '200'),
(29, 'Ciproflaxacine pef', '1200'),
(30, 'Ofloxacine perf 200', '1500'),
(31, 'Dexamethasone', '500'),
(32, 'Célestine', '1100'),
(33, 'Salbutamol', '500'),
(34, 'Progestérone', '2500'),
(35, 'Syntocinon', '300'),
(36, 'Methergin', '500'),
(37, 'Catapressan', '900'),
(38, 'Loxen', '1800'),
(39, 'Solcer', '3500'),
(40, 'Azantac', '1000'),
(41, 'Vogalene', '500'),
(42, 'Dislep', '1000'),
(43, 'Primperan', '500'),
(44, 'Quinine 300', '300'),
(45, 'Quinine (venimax) 600', '300'),
(46, 'Quinimax (Q philo)', '1000'),
(47, 'Lovenox', '3640'),
(48, 'Dicynone', '650'),
(49, 'Valium', '500'),
(50, 'Gardenal', '1200'),
(51, 'Lasilix', '1200'),
(52, 'Triam 40', '1200'),
(53, 'VAT', '1500'),
(54, 'VAT SPECIALITE', '2650'),
(55, 'Test de Z', '1500'),
(56, 'Bandes', '500'),
(57, 'Gentamycine', '300'),
(58, 'Ketess', '1000'),
(59, 'Astymin', '6000');

-- --------------------------------------------------------

--
-- Structure de la table `soustypeanalysemedicale`
--

CREATE TABLE `soustypeanalysemedicale` (
  `idsoustypeanalysemedicale` int(11) NOT NULL,
  `idtypeanalysemedicale` int(11) NOT NULL,
  `libsoustypeanalysemedicale` varchar(255) NOT NULL,
  `istypeanalysemedicale` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `soustypeanalysemedicale`
--

INSERT INTO `soustypeanalysemedicale` (`idsoustypeanalysemedicale`, `idtypeanalysemedicale`, `libsoustypeanalysemedicale`, `istypeanalysemedicale`) VALUES
(1, 1, 'Analyse Immunologique', 1),
(2, 2, 'SELLES KOP', 0),
(3, 2, 'SANG', 0),
(4, 2, 'Urines', 0),
(5, 2, 'Peau', 0),
(6, 1, 'Immuno-hématologie', 0),
(7, 5, 'HEMATOLOGIE', 0);

-- --------------------------------------------------------

--
-- Structure de la table `specialite`
--

CREATE TABLE `specialite` (
  `idspecialite` int(11) NOT NULL,
  `libspecialite` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `typeanalysemedicale`
--

CREATE TABLE `typeanalysemedicale` (
  `idtypeanalysemedicale` int(11) NOT NULL,
  `libtypeanalysemedicale` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `typeanalysemedicale`
--

INSERT INTO `typeanalysemedicale` (`idtypeanalysemedicale`, `libtypeanalysemedicale`) VALUES
(1, 'Analyse Immunologie-Immunohematologie'),
(2, 'PARASITOLOGIE'),
(3, 'SEROLOGIE INFECTUEUSE ET PARASITOLOGIE'),
(4, 'CYTOPATHOLOGIE-ANATOMOPATHOLOGIE-BIOLOGIE DE LA REPRODUCTION'),
(5, 'HEMATOLOGIE');

-- --------------------------------------------------------

--
-- Structure de la table `typeantecedant`
--

CREATE TABLE `typeantecedant` (
  `idtypeantecedant` decimal(10,0) NOT NULL,
  `libelletypeAntecedant` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `typeantecedant`
--

INSERT INTO `typeantecedant` (`idtypeantecedant`, `libelletypeAntecedant`) VALUES
('1', 'Familiaux'),
('3', 'Chirurgicaux'),
('5', 'Médicaux');

-- --------------------------------------------------------

--
-- Structure de la table `typeconsultation`
--

CREATE TABLE `typeconsultation` (
  `idtypeconsultation` int(11) NOT NULL,
  `libtypeconsultation` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `typeconsultation`
--

INSERT INTO `typeconsultation` (`idtypeconsultation`, `libtypeconsultation`) VALUES
(1, 'Consultation Gynécologique'),
(2, 'PARASITOLOGIE'),
(3, 'IMMUNO-HEMATOLOGIE'),
(4, 'SEROLOGIE PARASITAIRE');

-- --------------------------------------------------------

--
-- Structure de la table `typeexamen`
--

CREATE TABLE `typeexamen` (
  `idtypeexamen` int(11) NOT NULL,
  `libtypeexamen` varchar(255) DEFAULT NULL,
  `coutexamen` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `typeexamen`
--

INSERT INTO `typeexamen` (`idtypeexamen`, `libtypeexamen`, `coutexamen`) VALUES
(1, 'Examen gynécologique', '3000'),
(2, 'Examen pédiatrique', '5000');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `idprof` int(11) NOT NULL,
  `username` varchar(150) DEFAULT NULL,
  `auth_key` varchar(255) DEFAULT NULL,
  `password_hash` varchar(255) DEFAULT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `first_name` varchar(70) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `contact1` varchar(20) DEFAULT NULL,
  `contact2` varchar(20) DEFAULT NULL,
  `quartier` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `idprof`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `first_name`, `last_name`, `contact1`, `contact2`, `quartier`) VALUES
(1, 1, 'admin', 'YidOV_8g81qdyoNfLp7JNOd_2PUHctbd', '$2y$13$150x7wV2igp6frChihDy2uqirLhStQ2UJeF9EksNW4KnueI1DFalO', NULL, 'rachide@yahoo.fr', 10, 1496850628, 1496850628, 'rachide', 'Abdoulaye', '', '', ''),
(2, 4, 'igbataou', NULL, '$2y$13$y5iD2jx/QOpKIaHGyZJ/6uSYKlUj0fHhiD46eWPXOewYfo1VBHLCC', NULL, '', 10, NULL, NULL, 'Tcha-Ibome', 'IGBATAOU', '', '', ''),
(3, 2, 'yezou', NULL, '$2y$13$7kAhxmJdXrcTIOoSjxE5tuga6XGiFSEN1OVK3hZCx9vS6K5d4lwga', NULL, '', 10, NULL, NULL, 'DJOBO', 'YEZOU', '', '', ''),
(4, 2, 'monkam', NULL, '$2y$13$3UdcTL.piXFAidury3dhEOwd0HuZEHO2NpV9i2kM/Wme8oo2NiqWi', NULL, '', 10, NULL, NULL, 'Yvette', 'MONKAM', '', '', ''),
(5, 2, 'afansinou', NULL, '$2y$13$Mlcj7I.JmTh8gSUU1w4Z6ODSv87/MtLrhfk6aY2E3Lu42cRM2ap72', NULL, '', 10, NULL, NULL, 'AFANSINOU', 'AFANSINOU', '', '', ''),
(6, 2, 'anayo', NULL, '$2y$13$bJ8bVIicN0CDvGoGOr1M4euSVvk9QRlrKmMaUv0zQcKI2Mtt3UCV2', NULL, '', 10, NULL, NULL, 'anayo', 'anayo', '', '', ''),
(7, 5, 'tignokpa', NULL, '$2y$13$FJsOk.2WE2VNtjMI.atSFO.y7tZUG9Qra27frITUOGjgwZ68qF/tO', NULL, '', 10, NULL, NULL, 'oubote', 'tignokpa', '', '', ''),
(8, 5, 'azouaro', NULL, '$2y$13$gZWh/T94md4mURI4OPkpIeWooQoWOxZOA7FF/BOBWxI6M.PJc24.a', NULL, '', 10, NULL, NULL, 'hakim', 'azouaro', '', '', ''),
(9, 5, 'kotogbe', NULL, '$2y$13$R2Q7ASOV3b0c4zvABrmvd.NmrUuR6vfxsx/72NhlSP29JDqMza.kK', NULL, '', 10, NULL, NULL, 'dédé', 'kotogbe', '', '', ''),
(10, 5, 'gbechi', NULL, '$2y$13$Y7btAMBHaG25U5PVsMKM7eB.6m8C3xLIhrWl4i0YHSdb.jopZOgdy', NULL, '', 10, NULL, NULL, 'Chimène', 'gbechi', '', '', ''),
(11, 6, 'bawa', NULL, '$2y$13$mGJ9MyDPhzqdwZwqy94.6Ow1qFyv3uwxwWyOVffmv5G9Ojm03jOim', NULL, '', 10, NULL, NULL, 'saoudatou', 'bawa', '', '', ''),
(12, 6, 'akakpo', NULL, '$2y$13$/V2i.3FJ/oraClqgktc5YeV3Sq0SC3cIVkB1TfXZA/ZE8TbIV1lDu', NULL, '', 10, NULL, NULL, 'dédé', 'akakpo', '', '', ''),
(13, 6, 'missihu', NULL, '$2y$13$LiquoU/2AFPx6uT0S8wQKO6mU1SOLQFaHnB/3Nusfk17KdBkjDMBe', NULL, '', 10, NULL, NULL, 'Mawuta  Essi', 'missihu', '', '', ''),
(14, 6, 'ouro-gaffou', NULL, '$2y$13$ZtQVFX882gM5QTcZT9.6QOaJUsrNfp62jz964FGlGjkKNlP8ilsf2', NULL, '', 10, NULL, NULL, 'Talahatou', 'OURO-GAFFOU', '', '', ''),
(15, 2, 'kumessi', NULL, '$2y$13$0OVZwXn2mADuJ/0roLlYPemJKU7wAZU3pd/.k/XxmVw4RBjIDz3gq', NULL, '', 10, NULL, NULL, 'komi', 'kumessi', '', '', ''),
(16, 5, 'anagba', NULL, '$2y$13$xKCxfrWNZtJgcS16SsjaXeedd0VRRwsVXuLtliMZP43IBIXXHeLDW', NULL, '', 10, NULL, NULL, 'alice', 'anagba', '', '', ''),
(17, 5, 'kumeclan', NULL, '$2y$13$iadqSAgOpH.sDzgYcMVul.sM5aJMcRnutsdusa.csjVyxuDpcpq3u', NULL, '', 10, NULL, NULL, 'lucia', 'kumeclan', '', '', ''),
(18, 5, 'amedeka', NULL, '$2y$13$9R9BxfQ7n33oWbzctywVVOjdE84EbD1gU4c4YYehp2BWNx1POTnJ6', NULL, '', 10, NULL, NULL, 'Dela', 'amedeka', '', '', ''),
(19, 5, 'djobo', NULL, '$2y$13$A6hz1ocTT1FJTpiXLb611eQXW25owtwBdnMlFRQaehW2Z6r1Swu.W', NULL, '', 10, NULL, NULL, 'Amoudia', 'djobo', '', '', ''),
(20, 5, 'kalipe', NULL, '$2y$13$uzJoMl88bU5ztQcnAiEsg.7YZfM95tMSNFCFxg75o0.cajSvRwP8G', NULL, '', 10, NULL, NULL, 'Dodji', 'kalipe', '', '', ''),
(21, 5, 'amegnaglo', NULL, '$2y$13$f51w6gPwbJG53JMNYlX4keBQ0s7slEbRJ0cEQhuYb.NPjbvcMliby', NULL, '', 10, NULL, NULL, 'kokouvi', 'amegnaglo', '', '', ''),
(22, 7, 'simlea', NULL, '$2y$13$knuBC57bC.Ew0LHKZgi8FuLYzpsPf0Cl.vnvQhMIkjLaB6CRkv23G', NULL, '', 10, NULL, NULL, 'Tola', 'SIMLEA', '', '', ''),
(23, 8, 'atcha-alaza', NULL, '$2y$13$IIv5EPqwlBzd/qq4johuqe/NPKdrkm3RFGwEu8zT2n85Jcl5tkBIC', NULL, '', 10, NULL, NULL, 'zarifou', 'atcha-alaza', '', '', '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `achat`
--
ALTER TABLE `achat`
  ADD PRIMARY KEY (`idachat`),
  ADD KEY `fk_acheter` (`idpatient`);

--
-- Index pour la table `analysemedicale`
--
ALTER TABLE `analysemedicale`
  ADD PRIMARY KEY (`idanalysemedicale`),
  ADD KEY `fk_avoir2` (`idsoustypeanalysemedicale`);

--
-- Index pour la table `analysemedicale1`
--
ALTER TABLE `analysemedicale1`
  ADD PRIMARY KEY (`idanalysemedicale`),
  ADD KEY `fk_avoir2` (`idsoustypeanalysemedicale`);

--
-- Index pour la table `antecedant`
--
ALTER TABLE `antecedant`
  ADD PRIMARY KEY (`idantecedant`),
  ADD KEY `fk_avoirantecedant` (`idpatient`);

--
-- Index pour la table `antecedant1`
--
ALTER TABLE `antecedant1`
  ADD PRIMARY KEY (`idancedant1`),
  ADD KEY `FK_antecedant_idtypeantecedant` (`idtypeantecedant`);

--
-- Index pour la table `antecedant11`
--
ALTER TABLE `antecedant11`
  ADD PRIMARY KEY (`idantecedant`),
  ADD KEY `fk_avoirantecedant` (`idpatient`);

--
-- Index pour la table `antecedanttt`
--
ALTER TABLE `antecedanttt`
  ADD PRIMARY KEY (`idantecedant`),
  ADD KEY `fk_avoirantecedant` (`idpatient`);

--
-- Index pour la table `aspectprelevement`
--
ALTER TABLE `aspectprelevement`
  ADD PRIMARY KEY (`idaspectprelevement`);

--
-- Index pour la table `assurance`
--
ALTER TABLE `assurance`
  ADD PRIMARY KEY (`idassurance`);

--
-- Index pour la table `categoriechambre`
--
ALTER TABLE `categoriechambre`
  ADD PRIMARY KEY (`idcategoriechbr`);

--
-- Index pour la table `chambre`
--
ALTER TABLE `chambre`
  ADD PRIMARY KEY (`idchbre`),
  ADD KEY `fk_appartenir` (`idcategoriechbr`);

--
-- Index pour la table `conjoint`
--
ALTER TABLE `conjoint`
  ADD PRIMARY KEY (`idconj`),
  ADD KEY `fk_avoir7` (`idpatient`);

--
-- Index pour la table `consultation`
--
ALTER TABLE `consultation`
  ADD PRIMARY KEY (`idconsultation`),
  ADD KEY `fk_lier_a` (`idtypeconsultation`);

--
-- Index pour la table `demanderanalyse`
--
ALTER TABLE `demanderanalyse`
  ADD PRIMARY KEY (`iddemandeanalyse`),
  ADD KEY `FK_demanderanalyse_idpatient` (`idpatient`);

--
-- Index pour la table `detailachat`
--
ALTER TABLE `detailachat`
  ADD PRIMARY KEY (`idachat`,`idproduit`),
  ADD KEY `fk_detailachat2` (`idproduit`);

--
-- Index pour la table `detailantecedant`
--
ALTER TABLE `detailantecedant`
  ADD PRIMARY KEY (`iddetailantecedant`),
  ADD KEY `FK_detailantecedant_idpatient` (`idpatient`);

--
-- Index pour la table `detailantecedant1`
--
ALTER TABLE `detailantecedant1`
  ADD KEY `idancedant1` (`idancedant1`,`idpatient`);

--
-- Index pour la table `detaildemandeanalyse`
--
ALTER TABLE `detaildemandeanalyse`
  ADD PRIMARY KEY (`iddetaildeamndanalyse`),
  ADD KEY `FK_detaildemandeanalyse_idpatient` (`idpatient`),
  ADD KEY `FK_detaildemandeanalyse_idanalysemedicale` (`idanalysemedicale`),
  ADD KEY `FK_detaildemandeanalyse_iddemandeanalyse` (`iddemandeanalyse`);

--
-- Index pour la table `detaildonnesoins`
--
ALTER TABLE `detaildonnesoins`
  ADD PRIMARY KEY (`iddonnesoins`,`idsoin`),
  ADD KEY `fk_detaildonnesoins2` (`idsoin`);

--
-- Index pour la table `detaileffectuerconsultation`
--
ALTER TABLE `detaileffectuerconsultation`
  ADD PRIMARY KEY (`ideffectuerconsul`,`idconsultation`),
  ADD KEY `fk_detaileffectuerconsultation2` (`idconsultation`);

--
-- Index pour la table `detailordonnance`
--
ALTER TABLE `detailordonnance`
  ADD KEY `fk_detailordonnance2` (`idordonnance`);

--
-- Index pour la table `detailpayement`
--
ALTER TABLE `detailpayement`
  ADD KEY `FK_detailpayement_payement` (`idpayement`);

--
-- Index pour la table `detailrecu`
--
ALTER TABLE `detailrecu`
  ADD KEY `fk_avoir4` (`idrecu`);

--
-- Index pour la table `donnesoins`
--
ALTER TABLE `donnesoins`
  ADD PRIMARY KEY (`iddonnesoins`),
  ADD KEY `fk_beneficier` (`idpatient`);

--
-- Index pour la table `effectueranalyse`
--
ALTER TABLE `effectueranalyse`
  ADD PRIMARY KEY (`idpatient`,`idanalysemedicale`,`ideffectueanalyse`) USING BTREE,
  ADD KEY `fk_effectueranalyse2` (`idanalysemedicale`),
  ADD KEY `dateanalyse` (`dateanalyse`),
  ADD KEY `ideffectueanalyse` (`ideffectueanalyse`);

--
-- Index pour la table `effectuerconsultation`
--
ALTER TABLE `effectuerconsultation`
  ADD PRIMARY KEY (`ideffectuerconsul`),
  ADD KEY `fk_effectuer1` (`idpatient`);

--
-- Index pour la table `effectuerexamen`
--
ALTER TABLE `effectuerexamen`
  ADD PRIMARY KEY (`idpatient`,`idexamen`,`dateexamen`),
  ADD KEY `fk_effectuerexamen2` (`idexamen`);

--
-- Index pour la table `examen`
--
ALTER TABLE `examen`
  ADD PRIMARY KEY (`idexamen`),
  ADD KEY `fk_lier1` (`idtypeexamen`);

--
-- Index pour la table `examenclinic`
--
ALTER TABLE `examenclinic`
  ADD PRIMARY KEY (`idexamen`),
  ADD KEY `fk_effectuerexamenclinic` (`idpatient`);

--
-- Index pour la table `examengyneco`
--
ALTER TABLE `examengyneco`
  ADD PRIMARY KEY (`idexamengyneco`),
  ADD KEY `fk_effectuerexamgyneco` (`idpatient`);

--
-- Index pour la table `historique`
--
ALTER TABLE `historique`
  ADD PRIMARY KEY (`idhistorique`);

--
-- Index pour la table `hospitalisation`
--
ALTER TABLE `hospitalisation`
  ADD PRIMARY KEY (`idhospitalisation`);

--
-- Index pour la table `hospitaliser`
--
ALTER TABLE `hospitaliser`
  ADD PRIMARY KEY (`idpatient`,`idhospitalisation`,`idchbre`),
  ADD KEY `fk_hospitaliser2` (`idhospitalisation`),
  ADD KEY `fk_hospitaliser3` (`idchbre`);

--
-- Index pour la table `maitriser`
--
ALTER TABLE `maitriser`
  ADD PRIMARY KEY (`idspecialite`,`id`),
  ADD KEY `fk_maitriser2` (`id`);

--
-- Index pour la table `natureprelev`
--
ALTER TABLE `natureprelev`
  ADD PRIMARY KEY (`idnature`);

--
-- Index pour la table `ordonnance`
--
ALTER TABLE `ordonnance`
  ADD PRIMARY KEY (`idordonnance`),
  ADD KEY `fk_attribuer` (`idpatient`);

--
-- Index pour la table `parametrepatient`
--
ALTER TABLE `parametrepatient`
  ADD PRIMARY KEY (`idparametre`),
  ADD KEY `fk_lier` (`idpatient`);

--
-- Index pour la table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`idpatient`),
  ADD KEY `fk_avoir1` (`idassurance`);

--
-- Index pour la table `patient2`
--
ALTER TABLE `patient2`
  ADD PRIMARY KEY (`idpatient`),
  ADD KEY `fk_avoir1` (`idassurance`);

--
-- Index pour la table `payement`
--
ALTER TABLE `payement`
  ADD PRIMARY KEY (`idpayement`),
  ADD KEY `fk_concerner` (`idpatient`);

--
-- Index pour la table `prelevement`
--
ALTER TABLE `prelevement`
  ADD PRIMARY KEY (`idprelevement`),
  ADD KEY `FK_prelevement_idnature` (`idnature`),
  ADD KEY `FK_prelevement_idaspectprelevement` (`idaspectprelevement`),
  ADD KEY `FK_prelevement_idpatient` (`idpatient`),
  ADD KEY `FK_prelevement_idanalysemedicale` (`idanalysemedicale`),
  ADD KEY `FK_prelevement_iddemandeanalyse` (`iddemandeanalyse`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`idproduit`);

--
-- Index pour la table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`idprof`);

--
-- Index pour la table `recu`
--
ALTER TABLE `recu`
  ADD PRIMARY KEY (`idrecu`);

--
-- Index pour la table `reductionanalyse`
--
ALTER TABLE `reductionanalyse`
  ADD PRIMARY KEY (`idassurance`,`idsoustypeanalysemedicale`),
  ADD KEY `fk_reductionanalyse2` (`idsoustypeanalysemedicale`);

--
-- Index pour la table `reductionchambre`
--
ALTER TABLE `reductionchambre`
  ADD PRIMARY KEY (`idcategoriechbr`,`idassurance`),
  ADD KEY `fk_reductionchambre2` (`idassurance`);

--
-- Index pour la table `reductionconsultation`
--
ALTER TABLE `reductionconsultation`
  ADD PRIMARY KEY (`idassurance`,`idtypeconsultation`),
  ADD KEY `fk_reductionconsultation2` (`idtypeconsultation`);

--
-- Index pour la table `reductionexamen`
--
ALTER TABLE `reductionexamen`
  ADD PRIMARY KEY (`idtypeexamen`,`idassurance`),
  ADD KEY `fk_reductionexamen2` (`idassurance`);

--
-- Index pour la table `reductionproduit`
--
ALTER TABLE `reductionproduit`
  ADD PRIMARY KEY (`idproduit`,`idassurance`),
  ADD KEY `fk_reductionproduit2` (`idassurance`);

--
-- Index pour la table `reductionsoin`
--
ALTER TABLE `reductionsoin`
  ADD PRIMARY KEY (`idsoin`,`idassurance`),
  ADD KEY `fk_reductionsoin2` (`idassurance`);

--
-- Index pour la table `soin`
--
ALTER TABLE `soin`
  ADD PRIMARY KEY (`idsoin`);

--
-- Index pour la table `soustypeanalysemedicale`
--
ALTER TABLE `soustypeanalysemedicale`
  ADD PRIMARY KEY (`idsoustypeanalysemedicale`),
  ADD KEY `fk_avoir` (`idtypeanalysemedicale`);

--
-- Index pour la table `specialite`
--
ALTER TABLE `specialite`
  ADD PRIMARY KEY (`idspecialite`);

--
-- Index pour la table `typeanalysemedicale`
--
ALTER TABLE `typeanalysemedicale`
  ADD PRIMARY KEY (`idtypeanalysemedicale`);

--
-- Index pour la table `typeantecedant`
--
ALTER TABLE `typeantecedant`
  ADD PRIMARY KEY (`idtypeantecedant`);

--
-- Index pour la table `typeconsultation`
--
ALTER TABLE `typeconsultation`
  ADD PRIMARY KEY (`idtypeconsultation`);

--
-- Index pour la table `typeexamen`
--
ALTER TABLE `typeexamen`
  ADD PRIMARY KEY (`idtypeexamen`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_avoir3` (`idprof`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `conjoint`
--
ALTER TABLE `conjoint`
  MODIFY `idconj` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `detailantecedant`
--
ALTER TABLE `detailantecedant`
  MODIFY `iddetailantecedant` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `detaildemandeanalyse`
--
ALTER TABLE `detaildemandeanalyse`
  MODIFY `iddetaildeamndanalyse` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT pour la table `profil`
--
ALTER TABLE `profil`
  MODIFY `idprof` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `achat`
--
ALTER TABLE `achat`
  ADD CONSTRAINT `fk_acheter` FOREIGN KEY (`idpatient`) REFERENCES `patient` (`idpatient`);

--
-- Contraintes pour la table `analysemedicale1`
--
ALTER TABLE `analysemedicale1`
  ADD CONSTRAINT `fk_avoir2` FOREIGN KEY (`idsoustypeanalysemedicale`) REFERENCES `soustypeanalysemedicale` (`idsoustypeanalysemedicale`);

--
-- Contraintes pour la table `antecedant1`
--
ALTER TABLE `antecedant1`
  ADD CONSTRAINT `FK_antecedant_idtypeantecedant` FOREIGN KEY (`idtypeantecedant`) REFERENCES `typeantecedant` (`idtypeantecedant`);

--
-- Contraintes pour la table `antecedant11`
--
ALTER TABLE `antecedant11`
  ADD CONSTRAINT `fk_avoirantecedant` FOREIGN KEY (`idpatient`) REFERENCES `patient` (`idpatient`);

--
-- Contraintes pour la table `chambre`
--
ALTER TABLE `chambre`
  ADD CONSTRAINT `fk_appartenir` FOREIGN KEY (`idcategoriechbr`) REFERENCES `categoriechambre` (`idcategoriechbr`);

--
-- Contraintes pour la table `consultation`
--
ALTER TABLE `consultation`
  ADD CONSTRAINT `fk_lier_a` FOREIGN KEY (`idtypeconsultation`) REFERENCES `typeconsultation` (`idtypeconsultation`);

--
-- Contraintes pour la table `demanderanalyse`
--
ALTER TABLE `demanderanalyse`
  ADD CONSTRAINT `FK_demanderanalyse_idpatient` FOREIGN KEY (`idpatient`) REFERENCES `patient` (`idpatient`);

--
-- Contraintes pour la table `detailachat`
--
ALTER TABLE `detailachat`
  ADD CONSTRAINT `fk_detailachat` FOREIGN KEY (`idachat`) REFERENCES `achat` (`idachat`),
  ADD CONSTRAINT `fk_detailachat2` FOREIGN KEY (`idproduit`) REFERENCES `produit` (`idproduit`);

--
-- Contraintes pour la table `detailantecedant1`
--
ALTER TABLE `detailantecedant1`
  ADD CONSTRAINT `FK_detailantecedant_idancedant` FOREIGN KEY (`idancedant1`) REFERENCES `antecedant1` (`idancedant1`);

--
-- Contraintes pour la table `detaildemandeanalyse`
--
ALTER TABLE `detaildemandeanalyse`
  ADD CONSTRAINT `FK_detaildemandeanalyse_idanalysemedicale` FOREIGN KEY (`idanalysemedicale`) REFERENCES `analysemedicale` (`idanalysemedicale`),
  ADD CONSTRAINT `FK_detaildemandeanalyse_iddemandeanalyse` FOREIGN KEY (`iddemandeanalyse`) REFERENCES `demanderanalyse` (`iddemandeanalyse`),
  ADD CONSTRAINT `FK_detaildemandeanalyse_idpatient` FOREIGN KEY (`idpatient`) REFERENCES `patient` (`idpatient`);

--
-- Contraintes pour la table `detaildonnesoins`
--
ALTER TABLE `detaildonnesoins`
  ADD CONSTRAINT `fk_detaildonnesoins` FOREIGN KEY (`iddonnesoins`) REFERENCES `donnesoins` (`iddonnesoins`),
  ADD CONSTRAINT `fk_detaildonnesoins2` FOREIGN KEY (`idsoin`) REFERENCES `soin` (`idsoin`);

--
-- Contraintes pour la table `detaileffectuerconsultation`
--
ALTER TABLE `detaileffectuerconsultation`
  ADD CONSTRAINT `fk_detaileffectuerconsultation` FOREIGN KEY (`ideffectuerconsul`) REFERENCES `effectuerconsultation` (`ideffectuerconsul`),
  ADD CONSTRAINT `fk_detaileffectuerconsultation2` FOREIGN KEY (`idconsultation`) REFERENCES `consultation` (`idconsultation`);

--
-- Contraintes pour la table `detailordonnance`
--
ALTER TABLE `detailordonnance`
  ADD CONSTRAINT `fk_detailordonnance2` FOREIGN KEY (`idordonnance`) REFERENCES `ordonnance` (`idordonnance`);

--
-- Contraintes pour la table `detailpayement`
--
ALTER TABLE `detailpayement`
  ADD CONSTRAINT `FK_detailpayement_payement` FOREIGN KEY (`idpayement`) REFERENCES `payement` (`idpayement`);

--
-- Contraintes pour la table `detailrecu`
--
ALTER TABLE `detailrecu`
  ADD CONSTRAINT `fk_avoir4` FOREIGN KEY (`idrecu`) REFERENCES `recu` (`idrecu`);

--
-- Contraintes pour la table `donnesoins`
--
ALTER TABLE `donnesoins`
  ADD CONSTRAINT `fk_beneficier` FOREIGN KEY (`idpatient`) REFERENCES `patient` (`idpatient`);

--
-- Contraintes pour la table `effectueranalyse`
--
ALTER TABLE `effectueranalyse`
  ADD CONSTRAINT `fk_effectueranalyse` FOREIGN KEY (`idpatient`) REFERENCES `patient` (`idpatient`),
  ADD CONSTRAINT `fk_effectueranalyse2` FOREIGN KEY (`idanalysemedicale`) REFERENCES `analysemedicale1` (`idanalysemedicale`);

--
-- Contraintes pour la table `effectuerconsultation`
--
ALTER TABLE `effectuerconsultation`
  ADD CONSTRAINT `fk_effectuer1` FOREIGN KEY (`idpatient`) REFERENCES `patient` (`idpatient`);

--
-- Contraintes pour la table `effectuerexamen`
--
ALTER TABLE `effectuerexamen`
  ADD CONSTRAINT `fk_effectuerexamen` FOREIGN KEY (`idpatient`) REFERENCES `patient` (`idpatient`),
  ADD CONSTRAINT `fk_effectuerexamen2` FOREIGN KEY (`idexamen`) REFERENCES `examen` (`idexamen`);

--
-- Contraintes pour la table `examen`
--
ALTER TABLE `examen`
  ADD CONSTRAINT `fk_lier1` FOREIGN KEY (`idtypeexamen`) REFERENCES `typeexamen` (`idtypeexamen`);

--
-- Contraintes pour la table `examenclinic`
--
ALTER TABLE `examenclinic`
  ADD CONSTRAINT `fk_effectuerexamenclinic` FOREIGN KEY (`idpatient`) REFERENCES `patient` (`idpatient`);

--
-- Contraintes pour la table `examengyneco`
--
ALTER TABLE `examengyneco`
  ADD CONSTRAINT `fk_effectuerexamgyneco` FOREIGN KEY (`idpatient`) REFERENCES `patient` (`idpatient`);

--
-- Contraintes pour la table `hospitaliser`
--
ALTER TABLE `hospitaliser`
  ADD CONSTRAINT `fk_hospitaliser` FOREIGN KEY (`idpatient`) REFERENCES `patient` (`idpatient`),
  ADD CONSTRAINT `fk_hospitaliser2` FOREIGN KEY (`idhospitalisation`) REFERENCES `hospitalisation` (`idhospitalisation`),
  ADD CONSTRAINT `fk_hospitaliser3` FOREIGN KEY (`idchbre`) REFERENCES `chambre` (`idchbre`);

--
-- Contraintes pour la table `maitriser`
--
ALTER TABLE `maitriser`
  ADD CONSTRAINT `fk_maitriser` FOREIGN KEY (`idspecialite`) REFERENCES `specialite` (`idspecialite`),
  ADD CONSTRAINT `fk_maitriser2` FOREIGN KEY (`id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `ordonnance`
--
ALTER TABLE `ordonnance`
  ADD CONSTRAINT `fk_attribuer` FOREIGN KEY (`idpatient`) REFERENCES `patient` (`idpatient`);

--
-- Contraintes pour la table `parametrepatient`
--
ALTER TABLE `parametrepatient`
  ADD CONSTRAINT `fk_lier` FOREIGN KEY (`idpatient`) REFERENCES `patient` (`idpatient`);

--
-- Contraintes pour la table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `fk_avoir1` FOREIGN KEY (`idassurance`) REFERENCES `assurance` (`idassurance`);

--
-- Contraintes pour la table `payement`
--
ALTER TABLE `payement`
  ADD CONSTRAINT `fk_concerner` FOREIGN KEY (`idpatient`) REFERENCES `patient` (`idpatient`);

--
-- Contraintes pour la table `prelevement`
--
ALTER TABLE `prelevement`
  ADD CONSTRAINT `FK_prelevement_idanalysemedicale` FOREIGN KEY (`idanalysemedicale`) REFERENCES `analysemedicale` (`idanalysemedicale`),
  ADD CONSTRAINT `FK_prelevement_idaspectprelevement` FOREIGN KEY (`idaspectprelevement`) REFERENCES `aspectprelevement` (`idaspectprelevement`),
  ADD CONSTRAINT `FK_prelevement_iddemandeanalyse` FOREIGN KEY (`iddemandeanalyse`) REFERENCES `demanderanalyse` (`iddemandeanalyse`),
  ADD CONSTRAINT `FK_prelevement_idnature` FOREIGN KEY (`idnature`) REFERENCES `natureprelev` (`idnature`),
  ADD CONSTRAINT `FK_prelevement_idpatient` FOREIGN KEY (`idpatient`) REFERENCES `patient` (`idpatient`);

--
-- Contraintes pour la table `reductionanalyse`
--
ALTER TABLE `reductionanalyse`
  ADD CONSTRAINT `fk_reductionanalyse` FOREIGN KEY (`idassurance`) REFERENCES `assurance` (`idassurance`),
  ADD CONSTRAINT `fk_reductionanalyse2` FOREIGN KEY (`idsoustypeanalysemedicale`) REFERENCES `soustypeanalysemedicale` (`idsoustypeanalysemedicale`);

--
-- Contraintes pour la table `reductionchambre`
--
ALTER TABLE `reductionchambre`
  ADD CONSTRAINT `fk_reductionchambre` FOREIGN KEY (`idcategoriechbr`) REFERENCES `categoriechambre` (`idcategoriechbr`),
  ADD CONSTRAINT `fk_reductionchambre2` FOREIGN KEY (`idassurance`) REFERENCES `assurance` (`idassurance`);

--
-- Contraintes pour la table `reductionconsultation`
--
ALTER TABLE `reductionconsultation`
  ADD CONSTRAINT `fk_reductionconsultation` FOREIGN KEY (`idassurance`) REFERENCES `assurance` (`idassurance`),
  ADD CONSTRAINT `fk_reductionconsultation2` FOREIGN KEY (`idtypeconsultation`) REFERENCES `typeconsultation` (`idtypeconsultation`);

--
-- Contraintes pour la table `reductionexamen`
--
ALTER TABLE `reductionexamen`
  ADD CONSTRAINT `fk_reductionexamen` FOREIGN KEY (`idtypeexamen`) REFERENCES `typeexamen` (`idtypeexamen`),
  ADD CONSTRAINT `fk_reductionexamen2` FOREIGN KEY (`idassurance`) REFERENCES `assurance` (`idassurance`);

--
-- Contraintes pour la table `reductionproduit`
--
ALTER TABLE `reductionproduit`
  ADD CONSTRAINT `fk_reductionproduit` FOREIGN KEY (`idproduit`) REFERENCES `produit` (`idproduit`),
  ADD CONSTRAINT `fk_reductionproduit2` FOREIGN KEY (`idassurance`) REFERENCES `assurance` (`idassurance`);

--
-- Contraintes pour la table `reductionsoin`
--
ALTER TABLE `reductionsoin`
  ADD CONSTRAINT `fk_reductionsoin` FOREIGN KEY (`idsoin`) REFERENCES `soin` (`idsoin`),
  ADD CONSTRAINT `fk_reductionsoin2` FOREIGN KEY (`idassurance`) REFERENCES `assurance` (`idassurance`);

--
-- Contraintes pour la table `soustypeanalysemedicale`
--
ALTER TABLE `soustypeanalysemedicale`
  ADD CONSTRAINT `fk_avoir` FOREIGN KEY (`idtypeanalysemedicale`) REFERENCES `typeanalysemedicale` (`idtypeanalysemedicale`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_avoir3` FOREIGN KEY (`idprof`) REFERENCES `profil` (`idprof`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
