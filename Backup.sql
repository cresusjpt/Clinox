/*
SQLyog Professional v12.09 (64 bit)
MySQL - 10.1.16-MariaDB : Database - db_barakate
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_barakate` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_barakate`;

/*Table structure for table `achat` */

DROP TABLE IF EXISTS `achat`;

CREATE TABLE `achat` (
  `idachat` int(11) NOT NULL,
  `datecreation` datetime DEFAULT NULL,
  `datemodification` datetime DEFAULT NULL,
  `idpatient` int(11) NOT NULL,
  `payer` tinyint(1) DEFAULT NULL,
  `payerassuran` int(11) NOT NULL,
  `autorisation` tinyint(1) DEFAULT NULL,
  `echeance` date DEFAULT NULL,
  PRIMARY KEY (`idachat`),
  KEY `fk_acheter` (`idpatient`),
  CONSTRAINT `fk_acheter` FOREIGN KEY (`idpatient`) REFERENCES `patient` (`idpatient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `achat` */

insert  into `achat`(`idachat`,`datecreation`,`datemodification`,`idpatient`,`payer`,`payerassuran`,`autorisation`,`echeance`) values (1,NULL,NULL,3,1,1,0,NULL),(2,NULL,NULL,1,1,1,0,NULL),(3,NULL,NULL,6,1,1,0,NULL),(4,NULL,NULL,4,1,1,0,NULL),(5,NULL,NULL,1,0,0,0,NULL),(6,NULL,NULL,2,0,0,0,NULL),(7,NULL,NULL,6,0,0,0,NULL),(8,NULL,NULL,3,1,0,0,NULL);

/*Table structure for table `analysemedicale` */

DROP TABLE IF EXISTS `analysemedicale`;

CREATE TABLE `analysemedicale` (
  `idanalysemedicale` int(11) NOT NULL,
  `idsoustypeanalysemedicale` int(11) DEFAULT NULL,
  `libanalysemedicale` varchar(150) NOT NULL,
  `coutanalyse` decimal(10,0) NOT NULL,
  `normes` varchar(255) DEFAULT NULL,
  `assure` tinyint(1) NOT NULL,
  `iduser` int(11) NOT NULL,
  PRIMARY KEY (`idanalysemedicale`),
  KEY `fk_avoir2` (`idsoustypeanalysemedicale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `analysemedicale` */

insert  into `analysemedicale`(`idanalysemedicale`,`idsoustypeanalysemedicale`,`libanalysemedicale`,`coutanalyse`,`normes`,`assure`,`iduser`) values (2,2,'GOUTE EPAISE(GE)','1000','<=10000',0,1),(3,2,'SELLES (K.O.P)','1200',NULL,0,1),(4,2,'RECHERCHE DE MICROFILIARES','1000',NULL,0,1),(5,2,'RECHERCHE D\'OEUFS DE BILHARZIE(Urines)','2000','superieur à 5',0,1),(8,7,'NUMÉRATION FORMULE SANGUINE(NFS)','4000','compris entre 5 et 8',0,1),(10,1,'VITESSE DE SEDIMENTATION (VS)','1000',NULL,0,1),(12,1,'Groupage Rhésus','3500',NULL,0,1),(14,2,'TS','3000','18 et 24',0,1),(16,2,'TP-INR','4000',NULL,0,1),(17,2,'TP-INR','3200',NULL,1,1),(18,2,'TCA','4000',NULL,0,1),(19,2,'TCA','3200',NULL,1,1),(20,1,'Électrophorèse de l\'hémoglobine','5000',NULL,0,1),(22,3,'Sérologie de WIdal et Félix (SDWF)','5000',NULL,0,1),(24,3,'Proteine C Réactive (CRP)','4000',NULL,0,1),(26,3,'Anti Strptolysines O (ASLO)','6000',NULL,1,1),(28,3,'Sérologie de Toxoplasmose','8000',NULL,0,1),(30,6,'ELECTROPHORESE DES PROTEINES','10000',NULL,0,1),(31,6,'ELECTROPHORESE DES PROTEINES','10000',NULL,0,1),(33,1,'TP-INR','4000',NULL,0,1),(34,1,'TCA','4000',NULL,0,1),(35,1,'ÉLECTROPHORÈSE DES PROTÉINES','10000',NULL,0,1),(36,3,'Sérologie de Rubéole','10000',NULL,0,1),(37,3,'Sérologie de VIH(SRV)','3000',NULL,0,1),(38,3,'Sérologie de l\'Hépatite A','15000',NULL,0,1),(39,3,'Sérologie de l\'Hépatite B(AgHbs)','8000',NULL,0,1),(40,3,'Sérologie de l\'Hépatite C','15000',NULL,0,1),(41,3,'Sérologie de Syphillis (TPHA-VDRL)','5000',NULL,0,1),(42,3,'Sérologie de Chlamidiae','15000',NULL,0,1),(43,3,'Taux de Lymphocyte TCD4','5000',NULL,0,1),(44,3,'IgE','14000',NULL,0,1),(45,3,'PSA Total','12000',NULL,0,1),(46,3,'PSA Libre','16000',NULL,0,1),(47,3,'AFP(a-foetroprotéine)','16000',NULL,0,1),(48,3,'Ag Hbe','15000',NULL,0,1),(49,3,'Anticorps anti HBc IgM','15000',NULL,0,1),(50,3,'	Anticorps anti HBc Total','15000',NULL,0,1),(51,3,'Prolactine (PRL)','14000',NULL,0,1),(52,3,'Estradiol(E2)','18000',NULL,0,1),(53,3,'Progestérone(PRG)','15000',NULL,0,1),(54,3,'Testosterone','17000',NULL,0,1),(55,3,'TSH','15000',NULL,0,1),(56,3,'T3','15000',NULL,0,1),(57,3,'T4','15000',NULL,0,1),(58,3,'Béta HCG','13000',NULL,0,1),(59,3,'LH','12000',NULL,0,1),(60,3,'FSH','14000',NULL,0,1),(61,4,'Urée','2000',NULL,0,1),(62,4,'Glycémie','2000',NULL,0,1),(63,4,'Créatininémie','2000',NULL,0,1),(64,4,'Transminase(ASAT, ALAT)','3000',NULL,0,1),(65,4,'Cholestérol Total','3000',NULL,0,1),(66,4,'Triglycérides','3000',NULL,0,1),(67,4,'HDL-Cholestérol','2500',NULL,0,1),(68,4,'LDL-Cholestérol','2500',NULL,0,1),(69,4,'Hémoglobine glycosilée(HBA1c)','15000',NULL,0,1),(70,4,'Gamma-GT','4000',NULL,0,1),(71,4,'Phosphatase-Alcaline(PAL)','4000',NULL,0,1),(72,4,'Calcémie','3500',NULL,0,1),(73,4,'Magnesemie','3000',NULL,0,1),(74,4,'Bilribine(Direct,Total)','4000',NULL,0,1),(75,4,'Protidinemie','1050',NULL,0,1),(76,4,'Uricémie','3500',NULL,0,1),(77,4,'Ionogramme sanguin','12000',NULL,0,1),(78,4,'Protéinurie et Glucosurie (Urines)','3000',NULL,0,1),(79,4,'Coproculture','7000',NULL,0,1),(80,4,'Amylasémie','7000',NULL,0,1),(81,4,'Spermoculture','4000',NULL,0,1),(82,4,'Spermogramme','4000',NULL,0,1),(83,4,'Hémoculture','2000',NULL,0,1),(84,4,'BU','5000',NULL,0,1),(85,4,'Facteur Rhumatoide','8000',NULL,0,1),(86,4,'Dosage de G6Dp','16000',NULL,0,1),(87,4,'ECBU+ATB','4000',NULL,0,1),(88,4,'PV+ATB','4000',NULL,0,1),(89,4,'PU','4000',NULL,0,1),(90,7,'Hématies','5000','H=4500-500*10^3/mm^3\r\nF=4300-500*10^3/mm^3\r\nBébé=4000-6000*10^3/mm^3',0,1),(91,7,'leucocyte','5000','4000-10000/mm^3',0,1),(92,7,'Hémoglobine','6000','H=13.0-17.0 g/dl\r\nF=12.0-16.0 g/dl\r\nBébé=14.0-20.0 g/dl',0,1),(93,7,'Hématocrite','4000','H=40-54%\r\nF=12.0-16.0%\r\nBébé=14.0-20.0 g/dl',0,1),(94,7,'Plaquette','5500','150000-400000/mm^3',0,1),(95,7,'NFS','4000',NULL,0,1),(96,1,'NFS1','4000',NULL,0,2),(97,1,'NFS1','4000',NULL,0,2),(98,6,'NFS2','4000',NULL,0,2);

/*Table structure for table `analysemedicale1` */

DROP TABLE IF EXISTS `analysemedicale1`;

CREATE TABLE `analysemedicale1` (
  `idanalysemedicale` int(11) NOT NULL,
  `idsoustypeanalysemedicale` int(11) DEFAULT NULL,
  `libanalysemedicale` varchar(150) NOT NULL,
  `coutanalyse` decimal(10,0) NOT NULL,
  `assure` tinyint(1) NOT NULL,
  `iduser` int(11) NOT NULL,
  PRIMARY KEY (`idanalysemedicale`),
  KEY `fk_avoir2` (`idsoustypeanalysemedicale`),
  CONSTRAINT `fk_avoir2` FOREIGN KEY (`idsoustypeanalysemedicale`) REFERENCES `soustypeanalysemedicale` (`idsoustypeanalysemedicale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `analysemedicale1` */

insert  into `analysemedicale1`(`idanalysemedicale`,`idsoustypeanalysemedicale`,`libanalysemedicale`,`coutanalyse`,`assure`,`iduser`) values (2,1,'GOUTE EPAISE(GE)','1000',0,1),(3,1,'SELLES (K.O.P)','1200',0,1),(4,1,'RECHERCHE DE MICROFILIARES','1000',0,1),(5,1,'RECHERCHE D\'OEUFS DE BILHARZIE','2000',0,1),(6,1,'GOUTE EPAISE(GE)','360',1,1),(7,1,'SELLES (K.O.P)','400',1,1),(8,2,'NUMÉRATION FORMULE SANGUINE(NFS)','4000',0,1),(9,2,'NUMÉRATION FORMULE SANGUINE(NFS)','1200',1,1),(10,2,'VITESSE DE SEDIMENTATION (VS)','1000',0,1),(11,2,'VITESSE DE SEDIMENTATION (VS)','200',1,1),(12,2,'Groupage Rhésus','3500',0,1),(13,2,'Groupage Rhésus','1500',1,1),(14,2,'TS','3000',0,1),(15,2,'TS','2200',1,1),(16,2,'TP-INR','4000',0,1),(17,2,'TP-INR','3200',1,1),(18,2,'TCA','4000',0,1),(19,2,'TCA','3200',1,1),(20,2,'Électrophorèse de l\'hémoglobine','5000',0,1),(21,2,'Électrophorèse de l\'hémoglobine','2200',1,1),(22,3,'Sérologie de Idal et Félix (SDWF)','5000',0,1),(23,3,'Sérologie de Idal et Félix (SDWF)','600',1,1),(24,3,'Proteine C Réactive (CRP)','4000',0,1),(25,3,'Proteine C Réactive (CRP)','3040',1,1),(26,3,'Anti Strptolysines O (ASLO)','6000',1,1),(27,3,'Anti Strptolysines O (ASLO)','3600',1,1),(28,3,'Sérologie de Toxoplasmose','8000',0,1),(29,3,'Sérologie de Toxoplasmose','3600',1,1);

/*Table structure for table `antecedant` */

DROP TABLE IF EXISTS `antecedant`;

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
  `duretraitement` int(11) DEFAULT NULL,
  PRIMARY KEY (`idantecedant`),
  KEY `fk_avoirantecedant` (`idpatient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `antecedant` */

insert  into `antecedant`(`idantecedant`,`idpatient`,`descripantec`,`familiaux`,`medicaux`,`chirurgicaux`,`obsteriques`,`gestite`,`nbregrossess`,`nbreavortement`,`dureeregle`,`dureecycle`,`parite`,`avortement`,`typeavortement`,`agepremregle`,`dysmenorrhe`,`syndromeintmenstru`,`doulpelvienne`,`dyspareunie`,`leucorrhees`,`trtsterilite`,`contrception`,`methcontracep`,`durecontrac`,`autreaffectgyne`,`datedebut`,`datefin`,`typetraitement`,`duretraitement`) values (1,1,NULL,'DIABETE , DREPANOCYTOSE , ','ANEMIE , ','ABLATION , ',NULL,'OUI',4,1,3,28,'3','OUI','PROVOQUE',12,'OUI','OUI','Aïgues','OUI','NON','OUI','OUI','DIU','12','',NULL,NULL,'Traditionnel',5),(2,7,NULL,'HTA , DIABETE , DREPANOCYTOSE , ASTHME , ','PALUDISME , ','CESARIENNE , ABLATION , ',NULL,'OUI',2,0,5,30,'2','NON','PROVOQUE',12,'OUI','OUI','Aïgues','NON','OUI','NON','OUI','DIU','6','RAS',NULL,NULL,'Traditionnel',NULL),(3,8,NULL,'HTA , DIABETE , ','PALUDISME , ','CESARIENNE , ',NULL,'OUI',5,NULL,4,26,'6','NON','PROVOQUE',16,'OUI','OUI','Aïgues','OUI','OUI','NON','OUI','Préservatif masculin','24','RAS',NULL,NULL,'Traditionnel',NULL);

/*Table structure for table `antecedant1` */

DROP TABLE IF EXISTS `antecedant1`;

CREATE TABLE `antecedant1` (
  `idancedant1` decimal(10,0) NOT NULL,
  `libelleantecant1` varchar(150) DEFAULT NULL,
  `idtypeantecedant` decimal(10,0) NOT NULL,
  PRIMARY KEY (`idancedant1`),
  KEY `FK_antecedant_idtypeantecedant` (`idtypeantecedant`),
  CONSTRAINT `FK_antecedant_idtypeantecedant` FOREIGN KEY (`idtypeantecedant`) REFERENCES `typeantecedant` (`idtypeantecedant`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `antecedant1` */

insert  into `antecedant1`(`idancedant1`,`libelleantecant1`,`idtypeantecedant`) values ('1','HTA','1'),('2','DIABETE','1'),('3','DREPANOCYTOSE','1'),('4','PHLEBITE','1'),('5','ASTHME','1'),('6','PALUDISME','5'),('7','ANEMIE','5'),('9','CESARIENNE','3'),('11','ABLATION','3'),('12','AUCUN','1'),('13','AUCUN','3'),('14','AUCUN','5'),('15','cc','5');

/*Table structure for table `antecedant11` */

DROP TABLE IF EXISTS `antecedant11`;

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
  `datefin` date DEFAULT NULL,
  PRIMARY KEY (`idantecedant`),
  KEY `fk_avoirantecedant` (`idpatient`),
  CONSTRAINT `fk_avoirantecedant` FOREIGN KEY (`idpatient`) REFERENCES `patient` (`idpatient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `antecedant11` */

/*Table structure for table `antecedanttt` */

DROP TABLE IF EXISTS `antecedanttt`;

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
  `duretraitement` int(11) DEFAULT NULL,
  PRIMARY KEY (`idantecedant`),
  KEY `fk_avoirantecedant` (`idpatient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `antecedanttt` */

/*Table structure for table `aspectprelevement` */

DROP TABLE IF EXISTS `aspectprelevement`;

CREATE TABLE `aspectprelevement` (
  `idaspectprelevement` int(11) NOT NULL,
  `libeapect` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`idaspectprelevement`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `aspectprelevement` */

insert  into `aspectprelevement`(`idaspectprelevement`,`libeapect`) values (1,'A jeun'),(2,'Veineux'),(3,'Post prandial'),(4,'Capillaire');

/*Table structure for table `assurance` */

DROP TABLE IF EXISTS `assurance`;

CREATE TABLE `assurance` (
  `idassurance` int(11) NOT NULL,
  `sigleassurance` varchar(10) DEFAULT NULL,
  `libassurance` varchar(150) DEFAULT NULL,
  `adrassurance` varchar(150) DEFAULT NULL,
  `telassurance` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idassurance`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `assurance` */

insert  into `assurance`(`idassurance`,`sigleassurance`,`libassurance`,`adrassurance`,`telassurance`) values (1,'SUNU','SUNU Assurance','Bd du 13 Janvier','22-21-36-56'),(2,'ACA','ACA Assurance','',''),(3,'SAHAM','SAHAM Assurance','',''),(4,'GTA','GTA Assurance','',''),(5,'NSIA','NSIA Assurance','',''),(6,'GRAS','GRAS Assurance','',''),(7,'INAM','INAM Assurance','','');

/*Table structure for table `categoriechambre` */

DROP TABLE IF EXISTS `categoriechambre`;

CREATE TABLE `categoriechambre` (
  `idcategoriechbr` int(11) NOT NULL,
  `libcategoriechbr` varchar(100) NOT NULL,
  PRIMARY KEY (`idcategoriechbr`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `categoriechambre` */

insert  into `categoriechambre`(`idcategoriechbr`,`libcategoriechbr`) values (1,'Climatisé'),(2,'Ventilé'),(3,'catégorie1'),(4,'catégorie2'),(5,'catégorie3');

/*Table structure for table `chambre` */

DROP TABLE IF EXISTS `chambre`;

CREATE TABLE `chambre` (
  `idchbre` int(11) NOT NULL,
  `idcategoriechbr` int(11) NOT NULL,
  `nomchbre` varchar(100) NOT NULL,
  `nbrelit` int(11) NOT NULL,
  `coutchbre` int(11) NOT NULL,
  `assure` tinyint(1) NOT NULL,
  PRIMARY KEY (`idchbre`),
  KEY `fk_appartenir` (`idcategoriechbr`),
  CONSTRAINT `fk_appartenir` FOREIGN KEY (`idcategoriechbr`) REFERENCES `categoriechambre` (`idcategoriechbr`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `chambre` */

insert  into `chambre`(`idchbre`,`idcategoriechbr`,`nomchbre`,`nbrelit`,`coutchbre`,`assure`) values (1,1,'ALEDJO',4,7500,0),(2,2,'ALEDJO',4,5000,0),(3,1,'14',2,12500,0),(4,2,'14',2,10000,0),(5,1,'16',2,12500,0),(6,2,'16',2,10000,0),(7,1,'21',2,12500,0),(8,2,'21',2,10000,0),(9,1,'23',2,12500,0),(10,2,'23',2,10000,0),(11,1,'11',1,15000,0),(12,2,'11',1,12500,0),(13,1,'12',1,15000,0),(14,2,'12',1,12500,0),(15,1,'17',1,15000,0),(16,2,'17',1,12500,0),(17,1,'22',1,15000,0),(18,2,'22',1,12500,0),(19,1,'24',1,15000,0),(20,2,'24',1,12500,0),(21,1,'25',1,15000,0),(22,2,'25',1,12500,0),(23,1,'26',1,15000,0),(24,2,'26',1,12500,0),(25,1,'27',1,15000,0),(26,2,'27',1,12500,0),(27,1,'13(VIP)',1,25000,0),(28,2,'23(VIP)',1,25000,0),(29,1,'30(VIP)',1,30000,0),(30,2,'30(VIP)',1,30000,0),(31,1,'ADULTE',1,20000,0),(32,1,'PEDIATRIE',1,20000,0),(33,1,'COUVEUSE',1,20000,0),(34,3,'Assuré',1,9000,0),(35,4,'asuré',1,14000,0),(36,5,'Assuré',1,20000,0);

/*Table structure for table `conjoint` */

DROP TABLE IF EXISTS `conjoint`;

CREATE TABLE `conjoint` (
  `idconj` int(11) NOT NULL AUTO_INCREMENT,
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
  `hbconj` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idconj`),
  KEY `fk_avoir7` (`idpatient`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `conjoint` */

insert  into `conjoint`(`idconj`,`idpatient`,`nomconj`,`prenomconj`,`datenaissconj`,`ageconj`,`nationaliteconj`,`professionconj`,`adresseconj`,`telconj`,`gsrhconj`,`hbconj`) values (1,1,'AMANA','komi','2000-01-11',18,NULL,'Enseignant','zogo','986655','0-',''),(2,7,'adam','inoussa','1992-12-31',25,NULL,'commerçant','agoè assiyéyé','92383838','O+','AA'),(3,8,'anagba','David','1990-10-08',27,NULL,'Ménusier','Agoè- atchanvé','70292929','B+','AA');

/*Table structure for table `consultation` */

DROP TABLE IF EXISTS `consultation`;

CREATE TABLE `consultation` (
  `idconsultation` int(11) NOT NULL,
  `idtypeconsultation` int(11) NOT NULL,
  `libconsultation` varchar(150) NOT NULL,
  `coutconsultation` decimal(10,0) NOT NULL,
  `assure` tinyint(1) NOT NULL,
  `rdv` datetime DEFAULT NULL,
  `iduser` int(11) NOT NULL,
  PRIMARY KEY (`idconsultation`),
  KEY `fk_lier_a` (`idtypeconsultation`),
  CONSTRAINT `fk_lier_a` FOREIGN KEY (`idtypeconsultation`) REFERENCES `typeconsultation` (`idtypeconsultation`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `consultation` */

insert  into `consultation`(`idconsultation`,`idtypeconsultation`,`libconsultation`,`coutconsultation`,`assure`,`rdv`,`iduser`) values (1,2,'CONSULTATION GENERALE','6000',0,NULL,1),(2,2,'CONSULTATION SPECIALISEE','7500',0,NULL,1),(3,2,'CONSULTATION PEDIATRIQUE','7500',0,NULL,1),(6,7,'ECHOGRAPHIE PELVIENNE','8000',0,NULL,1),(7,7,'ECHOGRAPHIE OBSTRETICALE','8000',0,NULL,1),(8,7,'ECHOGRAPHIE MAMMAIRE','15000',0,NULL,1),(9,7,'ECHOGRAPHIE ABDOMINALE','16000',0,NULL,1),(10,7,'ABDOMINO PELVIENNE','18000',0,NULL,1),(11,1,'ECG','10000',0,NULL,1),(12,1,'RCF','5000',0,NULL,1),(15,2,' CONSULTATION GENERALE','6000',1,NULL,1),(16,1,'CONSULTATION SPECIALISEE','7500',0,NULL,1),(19,1,'ECHOGRAPHIE PELVIENNE','20000',1,NULL,1),(20,1,'ECHOGRAPHIE OBSTETRICALE','20000',1,NULL,1),(21,1,'ECHOGRAPHIE MAMMAIRE','20000',1,NULL,1),(22,1,'ECHOGRAPHIE ABDOMINALE','20000',1,NULL,1),(23,1,'ECHOGRAPHIE ABDOMINO-PELVIENNE','20000',1,NULL,1),(24,1,'ECG','11500',1,NULL,1),(25,1,'RCF','16000',1,NULL,1),(26,1,'AMIU','25000',1,NULL,1),(27,1,'ACCOUCHEMENT + SALE D\'ACCOUCHEMENT','92500',1,NULL,1),(28,2,'CONSULTATION ','5000',0,NULL,1),(30,2,'ECHOGRAPHIE ','20000',0,NULL,1),(31,1,'ECG','11500',0,NULL,1),(32,1,'ECG','5104',0,NULL,1),(33,1,'RCF','16000',0,NULL,1),(34,5,'AMIU','20000',0,NULL,1),(35,2,'CONSULTATION','3000',0,NULL,1);

/*Table structure for table `decaissement` */

DROP TABLE IF EXISTS `decaissement`;

CREATE TABLE `decaissement` (
  `id_decaiss` int(11) NOT NULL AUTO_INCREMENT,
  `reference_decaiss` varchar(250) NOT NULL,
  `montant` float(10,2) NOT NULL,
  `date_decaiss` date NOT NULL,
  `ressource` varchar(255) DEFAULT NULL,
  `motif_decaiss` text NOT NULL,
  PRIMARY KEY (`id_decaiss`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `decaissement` */

insert  into `decaissement`(`id_decaiss`,`reference_decaiss`,`montant`,`date_decaiss`,`ressource`,`motif_decaiss`) values (2,'REFERENCE N° 1',100000.00,'2018-12-19','uploads/decaissement_ressource/2018-12-19REFERENCE_N°_11000001545126954.pdf','La machine d\'échographie est tombé en panne. Le réparateur est venu le chercher.'),(3,'REFERENCE 2',200000.00,'2018-12-18','uploads/decaissement_ressource/2018-12-18REFERENCE_22000001545127273.pdf','INSTALLATION DU NOUVEAU SYSTEME DE BIP DES PATIENTS'),(4,'REFERENCE 3',10000.00,'2018-12-18','uploads/decaissement_ressource/2018-12-18REFERENCE_3100001545127955.docx','cotisation pour organisation du personnel'),(5,'REFERENCE 4',102000.00,'2018-12-18','uploads/decaissement_ressource/2018-12-18REFERENCE_41020001545128085.pdf','Décaissons tous en'),(6,'REFERENCE 5',150000.00,'2018-12-19','uploads/decaissement_ressource/2018-12-19REFERENCE_51500001545128273.pdf','Don pour l\'organisation d\'une fête aux enfants hospitalisé le soir du 25 Décembre');

/*Table structure for table `demanderanalyse` */

DROP TABLE IF EXISTS `demanderanalyse`;

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
  `payer` tinyint(1) NOT NULL DEFAULT '0',
  `indigeant` tinyint(1) NOT NULL,
  `autorisation` tinyint(1) DEFAULT NULL,
  `echeance` date DEFAULT NULL,
  PRIMARY KEY (`iddemandeanalyse`),
  KEY `FK_demanderanalyse_idpatient` (`idpatient`),
  CONSTRAINT `FK_demanderanalyse_idpatient` FOREIGN KEY (`idpatient`) REFERENCES `patient` (`idpatient`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `demanderanalyse` */

insert  into `demanderanalyse`(`iddemandeanalyse`,`libdemandeanalyse`,`statut`,`degre`,`datedemande`,`datemodification`,`diagnostic`,`idpatient`,`idanalysemedicale`,`payer`,`indigeant`,`autorisation`,`echeance`) values (1,NULL,NULL,'','2018-07-10 10:21:00',NULL,'anémie',1,1,0,0,0,NULL),(2,NULL,NULL,'','2018-07-10 16:54:59',NULL,'nb',2,1,0,0,0,NULL),(3,NULL,NULL,'','2018-07-13 11:31:23','2018-09-11 18:33:55','anémie',3,1,0,0,NULL,NULL),(4,NULL,NULL,'OUI','2018-08-01 16:50:03',NULL,'paludisme gastrite vaginite',7,1,0,0,NULL,NULL),(5,NULL,NULL,'OUI','2018-08-02 17:17:04',NULL,'IST',7,1,0,0,NULL,NULL),(6,NULL,NULL,'NON','2018-08-02 17:25:19',NULL,'anémie',8,1,0,0,NULL,NULL),(7,NULL,NULL,'NON','2018-08-07 11:15:46','2018-08-07 11:18:34','anémie',13,1,0,0,NULL,NULL),(8,NULL,NULL,'OUI','2018-09-06 11:54:44',NULL,'anémie',16,1,0,0,NULL,NULL),(9,NULL,NULL,'','2018-09-21 15:09:07',NULL,'paludisme gastrite vaginite',12,1,0,0,NULL,NULL),(10,NULL,NULL,'OUI','2018-09-21 17:48:04',NULL,'paludisme gastrite vaginite',15,1,0,0,NULL,NULL),(11,NULL,NULL,'NON','2018-09-22 06:21:58',NULL,'anémie',5,1,0,0,NULL,NULL),(12,NULL,NULL,'','2018-09-25 18:05:27',NULL,'anémie',1,1,0,0,NULL,NULL),(13,NULL,NULL,'','2018-09-25 18:19:09',NULL,'paludisme gastrite vaginite',2,1,0,0,NULL,NULL),(14,NULL,NULL,'','2018-09-29 18:33:53',NULL,'paludisme gastrite vaginite',5,1,0,0,NULL,NULL),(15,NULL,NULL,'','2018-09-30 20:03:50',NULL,'anémie',9,1,0,0,NULL,NULL),(16,NULL,NULL,'','2018-09-30 21:20:14',NULL,'anémie',1,1,0,0,NULL,NULL),(17,NULL,NULL,'NON','2018-10-01 15:45:11',NULL,'anémie',4,1,0,0,NULL,NULL),(18,NULL,NULL,'','2018-10-13 17:01:06',NULL,'paludisme gastrite vaginite',6,1,0,0,NULL,NULL),(19,NULL,NULL,'','2018-10-23 10:48:51',NULL,'anémie',2,1,0,0,NULL,NULL),(20,NULL,NULL,'','2018-10-23 15:59:32',NULL,'anémie',4,1,0,0,NULL,NULL),(21,NULL,NULL,'','2018-10-24 09:39:06',NULL,'anémie',4,1,0,0,NULL,NULL),(22,NULL,NULL,'','2018-10-31 10:49:50',NULL,'anémie',3,1,0,0,NULL,NULL),(23,NULL,NULL,'','2018-11-15 18:09:09',NULL,'anémie',2,1,0,0,NULL,NULL),(24,NULL,NULL,'','2018-12-15 00:25:10',NULL,'je suis en qhkj fa',NULL,1,0,0,NULL,NULL),(25,NULL,NULL,'','2018-12-15 00:25:32',NULL,'',1,1,0,0,NULL,NULL);

/*Table structure for table `detailachat` */

DROP TABLE IF EXISTS `detailachat`;

CREATE TABLE `detailachat` (
  `idachat` int(11) NOT NULL,
  `idproduit` int(11) NOT NULL,
  `coutproduit` decimal(10,0) NOT NULL,
  `tauxassurance` int(11) DEFAULT NULL,
  `qteprod` int(11) DEFAULT NULL,
  `fraisachatpatient` decimal(10,0) DEFAULT NULL,
  `fraisachatassurance` decimal(10,0) DEFAULT NULL,
  `payer` int(11) DEFAULT NULL,
  `payerassuran` int(11) DEFAULT NULL,
  PRIMARY KEY (`idachat`,`idproduit`),
  KEY `fk_detailachat2` (`idproduit`),
  CONSTRAINT `fk_detailachat` FOREIGN KEY (`idachat`) REFERENCES `achat` (`idachat`),
  CONSTRAINT `fk_detailachat2` FOREIGN KEY (`idproduit`) REFERENCES `produit` (`idproduit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `detailachat` */

insert  into `detailachat`(`idachat`,`idproduit`,`coutproduit`,`tauxassurance`,`qteprod`,`fraisachatpatient`,`fraisachatassurance`,`payer`,`payerassuran`) values (1,1,'1500',0,2,NULL,NULL,1,1),(1,2,'1000',0,5,NULL,NULL,1,1),(1,5,'2500',0,2,NULL,NULL,1,1),(2,1,'1500',0,10,NULL,NULL,1,1),(2,3,'2000',0,5,NULL,NULL,1,1),(3,1,'1500',0,1,NULL,NULL,1,1),(3,2,'1000',0,2,NULL,NULL,1,1),(3,4,'4500',0,1,NULL,NULL,1,1),(4,1,'1500',0,2,NULL,NULL,1,1),(4,2,'1000',0,10,NULL,NULL,1,1),(5,2,'1000',0,5,NULL,NULL,NULL,NULL),(5,3,'2000',0,2,NULL,NULL,NULL,NULL),(6,1,'1500',0,1,NULL,NULL,NULL,NULL),(6,2,'1000',0,1,NULL,NULL,NULL,NULL),(7,1,'1500',0,5,NULL,NULL,NULL,NULL),(7,4,'4500',0,2,NULL,NULL,NULL,NULL),(8,1,'1500',0,5,NULL,NULL,1,NULL),(8,5,'2500',0,3,NULL,NULL,1,NULL);

/*Table structure for table `detailanalyse` */

DROP TABLE IF EXISTS `detailanalyse`;

CREATE TABLE `detailanalyse` (
  `iddetailanalyse` int(11) NOT NULL AUTO_INCREMENT,
  `libdetailanalyse` varchar(255) NOT NULL,
  `norme` varchar(255) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `idanalysemedicale` int(11) NOT NULL,
  `normesF` varchar(255) DEFAULT NULL,
  `normesB` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`iddetailanalyse`),
  KEY `DETAILANALYSE__ANALYSEMEDICALE_FK` (`idanalysemedicale`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

/*Data for the table `detailanalyse` */

insert  into `detailanalyse`(`iddetailanalyse`,`libdetailanalyse`,`norme`,`numero`,`idanalysemedicale`,`normesF`,`normesB`) values (7,'Hématie','H=4500-5500*10^3/mm^3  F=4300-5000*10^3/mm^3  Enft=4000-6000*10^3/mm^3',1,95,NULL,NULL),(8,'Leucocyte','F=4300-5000*10^3/mm^3  Enft=4000-6000*10^3/mm^3',1,95,NULL,NULL),(9,'Hémoglobine',' Enft=4000-6000*10^3/mm^3',1,95,NULL,NULL),(10,'Hem','  Enft=4000-6000*10^3/mm^3',1,97,NULL,NULL),(11,'Leucocyte','H=4500-5500*10^3/mm^3  F=4300-5000*10^3/mm^3  Enft=4000-6000*10^3/mm^3',1,97,NULL,NULL),(12,'Hématie','  Enft=4000-6000*10^3/mm^3',1,97,NULL,NULL),(16,'Hématie','4500-5500*10^3/mm^3',1,98,'4300-5000*10^3/mm^3','4000-6000*10^3/mm^3'),(17,'Leucocyte','5500-15.000/mm^3',1,98,'',''),(18,'Hémoglobine','13.0-17.0g/dl',1,98,'12.0-16.0g/dl','11-14.0g/dl'),(19,'Hem','H=4500-5500*10^3/mm^3  ',1,96,'F=4300-5000*10^3/mm^3 ',' Enft=4000-6000*10^3/mm^3'),(20,'Leucocyte','13.0-17.0g/dl',1,96,'',''),(21,'Hémoglobine','H=4800-5000*10^3/mm^3  ',1,96,'F=3000-46000*10^3/mm^3','Enft=2000-3000*10^3/mm^3'),(22,'Hématies','4500-5500*10^3/mm^3',1,95,'4300-5000*10^3/mm^3','4000-6000*10^3/mm^3'),(23,'Leucocyte','5500-15.000/mm^3',1,95,'',''),(24,'Hémoglobine','13.0-17.0g/dl',1,95,'12.0-16.0g/dl','11-14.0g/dl'),(25,'Plaquette','150000-400000/mm^3',1,95,'',''),(26,'Neutrophiles','2000-6500/mm^3  | 50-70%',1,95,'',''),(27,'Éosinophiles','100-500/mm^3   | <=3%',1,95,'',''),(28,'Basophiles','0-1000/mm^3  |  <=1%',1,95,'',''),(29,'Lymphocytes ','2500-8500/mm^3',1,95,'',''),(30,'Monocytes','100-800/mm^3',1,95,'',''),(31,'VGM','80-100 fl',1,95,'','70 - 86'),(32,'TCMHb','24 - 31',1,95,'',''),(33,'CCMHb','28 - 33 g/dl',1,95,'',''),(34,'VS 1ere heure','<16  mm',1,95,'< 20',''),(35,'Hématie','4500 - 5500 * 10^3/mm^3',1,8,'4300 - 5000 * 10^3/mm^3','4000 - 6000 * 10^3/mm^3'),(36,'Leucocyte','5500-15.000/mm^3',1,8,'',''),(37,'Hémoglobine','13.0 - 17.0 g/dl',1,8,'12.0 - 16.0 g/dl','11 - 14.0 g/dl'),(38,'Hématocrite','40 - 54 %',1,8,'35 - 47 %','30 - 39 %'),(39,'Plaquette','150000 - 400000/mm^3',1,8,'',''),(40,'Neutrophiles','2000 - 6500/mm^3 | 50  - 70%',1,8,'',''),(41,'Éosinophiles','100 - 500/mm^3 | <3%',1,8,'',''),(42,'Basophiles','0 - 100/mm^3',1,8,'',''),(43,'Lymphocytes','2500 - 8500/mm^3 | 20 -40%',1,8,'',''),(44,'Monocytes','100 -800/mm^3| 2-8%',1,8,'',''),(45,'VGM','80 - 100 fl',1,8,'','70 -86'),(46,'TCMHb','24-31',1,8,'',''),(47,'CCMHb','28 - 33 g/dl',1,8,'',''),(48,'VS 1ere heure','<16  mm',1,8,'< 20','');

/*Table structure for table `detailantecedant` */

DROP TABLE IF EXISTS `detailantecedant`;

CREATE TABLE `detailantecedant` (
  `iddetailantecedant` int(5) NOT NULL AUTO_INCREMENT,
  `familiaux` varchar(80) DEFAULT NULL,
  `chirurgicaux` varchar(80) DEFAULT NULL,
  `medicaux` varchar(80) DEFAULT NULL,
  `idancedant1` int(5) DEFAULT NULL,
  `idpatient` int(5) DEFAULT NULL,
  PRIMARY KEY (`iddetailantecedant`),
  KEY `FK_detailantecedant_idpatient` (`idpatient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `detailantecedant` */

/*Table structure for table `detailantecedant1` */

DROP TABLE IF EXISTS `detailantecedant1`;

CREATE TABLE `detailantecedant1` (
  `iddetailantecedant` int(5) NOT NULL,
  `familiaux` varchar(80) DEFAULT NULL,
  `chirurgicaux` varchar(80) DEFAULT NULL,
  `medicaux` varchar(80) DEFAULT NULL,
  `idancedant1` decimal(10,0) NOT NULL,
  `idpatient` int(5) NOT NULL,
  KEY `idancedant1` (`idancedant1`,`idpatient`),
  CONSTRAINT `FK_detailantecedant_idancedant` FOREIGN KEY (`idancedant1`) REFERENCES `antecedant1` (`idancedant1`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `detailantecedant1` */

/*Table structure for table `detaildemandeanalyse` */

DROP TABLE IF EXISTS `detaildemandeanalyse`;

CREATE TABLE `detaildemandeanalyse` (
  `iddetaildeamndanalyse` int(11) NOT NULL AUTO_INCREMENT,
  `tauxreduction` float DEFAULT NULL,
  `coutanalyse` int(11) DEFAULT NULL,
  `fraispatient` float DEFAULT NULL,
  `fraisassurance` float DEFAULT NULL,
  `idpatient` int(11) DEFAULT NULL,
  `idanalysemedicale` int(11) DEFAULT NULL,
  `statut` int(11) NOT NULL,
  `resultat` int(11) NOT NULL,
  `iddemandeanalyse` int(11) NOT NULL,
  PRIMARY KEY (`iddetaildeamndanalyse`),
  KEY `FK_detaildemandeanalyse_idpatient` (`idpatient`),
  KEY `FK_detaildemandeanalyse_idanalysemedicale` (`idanalysemedicale`),
  KEY `FK_detaildemandeanalyse_iddemandeanalyse` (`iddemandeanalyse`),
  CONSTRAINT `FK_detaildemandeanalyse_idanalysemedicale` FOREIGN KEY (`idanalysemedicale`) REFERENCES `analysemedicale` (`idanalysemedicale`),
  CONSTRAINT `FK_detaildemandeanalyse_iddemandeanalyse` FOREIGN KEY (`iddemandeanalyse`) REFERENCES `demanderanalyse` (`iddemandeanalyse`),
  CONSTRAINT `FK_detaildemandeanalyse_idpatient` FOREIGN KEY (`idpatient`) REFERENCES `patient` (`idpatient`)
) ENGINE=InnoDB AUTO_INCREMENT=115 DEFAULT CHARSET=latin1;

/*Data for the table `detaildemandeanalyse` */

insert  into `detaildemandeanalyse`(`iddetaildeamndanalyse`,`tauxreduction`,`coutanalyse`,`fraispatient`,`fraisassurance`,`idpatient`,`idanalysemedicale`,`statut`,`resultat`,`iddemandeanalyse`) values (46,75,1000,250,750,1,4,1,0,1),(47,75,2000,500,1500,1,5,1,0,1),(48,75,4000,1000,3000,1,8,1,0,1),(49,80,1000,200,800,2,2,1,0,2),(50,80,1200,240,960,2,3,1,0,2),(51,80,3000,600,2400,2,14,1,0,2),(52,80,4000,800,3200,2,8,0,0,2),(54,70,1000,300,700,3,4,0,0,3),(55,70,3000,900,2100,3,14,1,0,3),(56,70,5000,1500,3500,3,22,1,0,3),(57,80,1200,240,960,7,3,1,0,4),(58,80,1000,200,800,7,4,1,0,4),(59,80,4000,800,3200,7,8,1,0,4),(60,80,5000,1000,4000,7,22,1,0,4),(61,80,4000,800,3200,7,24,1,0,5),(62,80,3000,600,2400,7,37,0,0,5),(63,80,5000,1000,4000,7,41,0,0,5),(64,80,1000,200,800,8,2,1,0,6),(65,80,4000,800,3200,8,8,1,0,6),(66,80,2000,400,1600,8,61,1,0,6),(67,80,2000,400,1600,8,62,1,0,6),(68,80,2000,400,1600,8,63,1,0,6),(71,75,1200,300,900,13,3,1,0,7),(72,75,1000,250,750,13,4,1,0,7),(73,75,2000,500,1500,13,5,1,0,7),(74,75,4000,1000,3000,16,95,0,0,8),(75,75,4000,1000,3000,16,96,1,0,8),(76,75,4000,1000,3000,16,97,0,0,8),(77,70,4000,1200,2800,3,8,1,0,3),(78,70,6000,1800,4200,3,92,0,0,3),(79,0,4000,4000,0,12,96,1,0,9),(80,0,5000,5000,0,12,22,1,0,9),(81,0,15000,15000,0,12,40,0,0,9),(82,0,10000,10000,0,12,31,0,0,9),(83,0,1200,1200,0,15,3,0,0,10),(84,0,4000,4000,0,15,95,1,0,10),(85,0,4000,4000,0,15,97,0,0,10),(86,80,1000,200,800,5,2,0,0,11),(87,80,4000,800,3200,5,16,1,0,11),(88,80,4000,800,3200,5,8,1,0,11),(89,80,4000,800,3200,5,96,0,0,11),(90,75,4000,1000,3000,1,96,1,0,12),(91,80,4000,800,3200,2,98,1,0,13),(92,80,4000,800,3200,5,96,1,0,14),(93,0,4000,4000,0,9,8,1,0,15),(94,75,1000,250,750,1,2,0,0,16),(95,75,2000,500,1500,1,5,1,0,16),(96,80,4000,800,3200,4,8,1,0,17),(97,80,5000,1000,4000,4,90,0,0,17),(98,80,6000,1200,4800,4,92,0,0,17),(99,80,1000,200,800,6,2,0,0,18),(100,80,1000,200,800,6,4,0,0,18),(101,80,4000,800,3200,6,8,1,0,18),(102,80,1000,200,800,2,2,0,0,19),(103,80,3000,600,2400,2,14,0,0,19),(104,80,4000,800,3200,2,8,1,0,19),(105,80,1000,200,800,4,2,1,0,20),(106,80,1000,200,800,4,4,0,0,20),(107,80,2000,400,1600,4,5,0,0,20),(108,80,4000,800,3200,4,8,1,0,21),(109,80,5000,1000,4000,4,90,1,0,21),(110,70,1200,360,840,3,3,0,0,22),(111,70,4000,1200,2800,3,8,0,0,22),(112,80,1000,200,800,2,2,0,0,23),(113,80,1000,200,800,2,4,0,0,23),(114,80,4000,800,3200,2,8,0,0,23);

/*Table structure for table `detaildonnesoins` */

DROP TABLE IF EXISTS `detaildonnesoins`;

CREATE TABLE `detaildonnesoins` (
  `iddonnesoins` int(11) NOT NULL,
  `idsoin` int(11) NOT NULL,
  `coutsoin` decimal(10,0) NOT NULL,
  `dose` int(11) NOT NULL,
  `tauxassurance` decimal(10,0) NOT NULL DEFAULT '0',
  `fraissoins` decimal(10,0) DEFAULT NULL,
  `fraisassurance` decimal(10,0) DEFAULT NULL,
  `payer` int(11) DEFAULT NULL,
  `payerassuran` int(11) DEFAULT NULL,
  PRIMARY KEY (`iddonnesoins`,`idsoin`),
  KEY `fk_detaildonnesoins2` (`idsoin`),
  CONSTRAINT `fk_detaildonnesoins` FOREIGN KEY (`iddonnesoins`) REFERENCES `donnesoins` (`iddonnesoins`),
  CONSTRAINT `fk_detaildonnesoins2` FOREIGN KEY (`idsoin`) REFERENCES `soin` (`idsoin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `detaildonnesoins` */

insert  into `detaildonnesoins`(`iddonnesoins`,`idsoin`,`coutsoin`,`dose`,`tauxassurance`,`fraissoins`,`fraisassurance`,`payer`,`payerassuran`) values (1,6,'195',5,'70','650','455',1,1),(1,17,'240',4,'70','800','560',1,1),(1,19,'150',10,'70','500','350',1,1),(2,14,'200',2,'80','1000','800',1,1),(2,18,'120',10,'80','600','480',1,1),(3,1,'100',10,'80','500','400',1,1),(3,14,'200',2,'80','1000','800',1,1),(4,1,'125',10,'75','500','375',1,1),(4,3,'163',3,'75','650','488',1,1),(4,17,'200',5,'75','800','600',1,1),(5,1,'100',1,'80','500','400',1,1),(5,18,'120',10,'80','600','480',1,1),(6,1,'100',2,'80','500','400',1,1),(6,14,'200',3,'80','1000','800',1,1),(6,17,'160',5,'80','800','640',1,1),(7,1,'100',10,'80','500','400',1,1),(7,17,'160',5,'80','800','640',1,1),(8,4,'130',1,'80','650','520',NULL,NULL),(8,13,'40',2,'80','200','160',NULL,NULL),(8,26,'598',2,'80','2990','2392',NULL,NULL);

/*Table structure for table `detaileffectuerconsultation` */

DROP TABLE IF EXISTS `detaileffectuerconsultation`;

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
  `payerassuran` int(11) NOT NULL,
  PRIMARY KEY (`ideffectuerconsul`,`idconsultation`),
  KEY `fk_detaileffectuerconsultation2` (`idconsultation`),
  CONSTRAINT `fk_detaileffectuerconsultation` FOREIGN KEY (`ideffectuerconsul`) REFERENCES `effectuerconsultation` (`ideffectuerconsul`),
  CONSTRAINT `fk_detaileffectuerconsultation2` FOREIGN KEY (`idconsultation`) REFERENCES `consultation` (`idconsultation`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `detaileffectuerconsultation` */

insert  into `detaileffectuerconsultation`(`ideffectuerconsul`,`idconsultation`,`tauxreductionassurance`,`coutconsultation`,`coutassurance`,`fraisconsultation`,`creerpar`,`modifierpar`,`datecreation`,`datemodification`,`payer`,`payerassuran`) values (1,1,'80','1200','4800','6000',NULL,NULL,NULL,NULL,1,1),(1,20,'80','4000','16000','20000',NULL,NULL,NULL,NULL,1,1),(2,1,'75','1500','4500','6000',NULL,NULL,NULL,NULL,1,1),(2,12,'75','1250','3750','5000',NULL,NULL,NULL,NULL,1,1),(3,1,'80','1200','4800','6000',NULL,NULL,NULL,NULL,1,1),(4,25,'80','3200','12800','16000',NULL,NULL,NULL,NULL,1,1),(5,1,'75','1500','4500','6000',NULL,NULL,NULL,NULL,0,0),(6,2,'80','1500','6000','7500',NULL,NULL,NULL,NULL,1,1),(7,3,'80','1500','6000','7500',NULL,NULL,NULL,NULL,1,1),(8,1,'80','1200','4800','6000',NULL,NULL,NULL,NULL,1,1),(8,12,'80','1000','4000','5000',NULL,NULL,NULL,NULL,1,1),(9,11,'80','2000','8000','10000',NULL,NULL,NULL,NULL,0,0);

/*Table structure for table `detailordonnance` */

DROP TABLE IF EXISTS `detailordonnance`;

CREATE TABLE `detailordonnance` (
  `idproduit` varchar(255) NOT NULL,
  `idordonnance` int(11) NOT NULL,
  `prixproduit` int(11) DEFAULT NULL,
  `tauxassurance` decimal(10,0) NOT NULL DEFAULT '0',
  `qte` int(11) DEFAULT NULL,
  `posologie` varchar(255) DEFAULT NULL,
  KEY `fk_detailordonnance2` (`idordonnance`),
  CONSTRAINT `fk_detailordonnance2` FOREIGN KEY (`idordonnance`) REFERENCES `ordonnance` (`idordonnance`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `detailordonnance` */

insert  into `detailordonnance`(`idproduit`,`idordonnance`,`prixproduit`,`tauxassurance`,`qte`,`posologie`) values ('coatème',2,NULL,'75',2,'1 matin ,1 midi 1 soir'),('Anadol',2,NULL,'75',3,'1 mat 2 le soir'),('sirp ',3,NULL,'70',2,'1 matin ,1 midi 1 soir'),('coatème',3,NULL,'70',4,'1 matin ,1 midi 1 soir'),('biba sirop ',3,NULL,'70',1,'1 matin ,1 midi 1 soir'),('progesterone',3,NULL,'70',4,'1 matin ,1 midi 1 soir'),('biba sirop',4,NULL,'80',1,'10 ml x 3/jours'),('Paracetamol 500ml comprimé',4,NULL,'80',1,'2 matin 2midi 2 soir'),('para',5,NULL,'80',2,'1matin     1 le soir'),('quinimax',5,NULL,'80',3,'1matin    1 midi  1 le soir'),('lysanxia',6,NULL,'80',13,'1-3/j'),('parafizz',6,NULL,'80',2,'1-3/j'),('stymol',6,NULL,'80',1,'5');

/*Table structure for table `detailpayement` */

DROP TABLE IF EXISTS `detailpayement`;

CREATE TABLE `detailpayement` (
  `idpayement` int(11) NOT NULL,
  `prestation` varchar(150) NOT NULL,
  `codeprestation` varchar(70) NOT NULL,
  `montant` decimal(10,0) NOT NULL,
  `montantassurance` decimal(10,0) DEFAULT NULL,
  `montanttotal` decimal(10,0) DEFAULT NULL,
  `detailprestation` varchar(255) DEFAULT NULL,
  `statutassur` int(11) NOT NULL,
  KEY `FK_detailpayement_payement` (`idpayement`),
  CONSTRAINT `FK_detailpayement_payement` FOREIGN KEY (`idpayement`) REFERENCES `payement` (`idpayement`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `detailpayement` */

insert  into `detailpayement`(`idpayement`,`prestation`,`codeprestation`,`montant`,`montantassurance`,`montanttotal`,`detailprestation`,`statutassur`) values (1,'Analyse','2','200',NULL,NULL,'GOUTE EPAISE(GE)',0),(1,'Analyse','98','800',NULL,NULL,'NFS2',0),(1,'Consultation','1','1200',NULL,NULL,'CONSULTATION GENERALE',0),(1,'Consultation','1','4000',NULL,NULL,'ECHOGRAPHIE OBSTETRICALE',0),(2,'Pharmacie','1','900',NULL,NULL,'Arthémether',0),(2,'Pharmacie','1','1500',NULL,NULL,'Paracetamol',0),(2,'Pharmacie','1','1500',NULL,NULL,'Métronidazol',0),(2,'Soin','1','975',NULL,NULL,'SGH 500',0),(2,'Soin','1','960',NULL,NULL,'Tramadol',0),(2,'Soin','1','1500',NULL,NULL,'Spasfon',0),(3,'Hospitalisation','3','585000',NULL,NULL,'ALEDJO',0),(3,'Hospitalisation','5','289884',NULL,NULL,'16',0),(4,'Analyse','2','800',NULL,NULL,'GOUTE EPAISE(GE)',0),(4,'Analyse','98','3200',NULL,NULL,'NFS2',0),(4,'Consultation','1','4800',NULL,NULL,'CONSULTATION GENERALE',0),(4,'Consultation','1','16000',NULL,NULL,'ECHOGRAPHIE OBSTETRICALE',0),(4,'Hospitalisation','3','585000',NULL,NULL,'ALEDJO',0),(4,'Hospitalisation','5','289884',NULL,NULL,'16',0),(5,'Hospitalisation','15','2997',NULL,NULL,'ALEDJO',0),(5,'Soin','2','400',NULL,NULL,'VIT K1',0),(5,'Soin','2','1200',NULL,NULL,'Acupan',0),(5,'Soin','3','1000',NULL,NULL,'Cathéter',0),(5,'Soin','3','400',NULL,NULL,'VIT K1',0),(6,'Hospitalisation','15','11988',NULL,NULL,'ALEDJO',0),(6,'Soin','2','1600',NULL,NULL,'VIT K1',0),(6,'Soin','2','4800',NULL,NULL,'Acupan',0),(6,'Soin','3','4000',NULL,NULL,'Cathéter',0),(6,'Soin','3','1600',NULL,NULL,'VIT K1',0),(7,'Pharmacie','1','2100',NULL,NULL,'Arthémether',0),(7,'Pharmacie','1','3500',NULL,NULL,'Paracetamol',0),(7,'Pharmacie','1','3500',NULL,NULL,'Métronidazol',0),(7,'Soin','1','2275',NULL,NULL,'SGH 500',0),(7,'Soin','1','2240',NULL,NULL,'Tramadol',0),(7,'Soin','1','3500',NULL,NULL,'Spasfon',0),(8,'Analyse','8','4000',NULL,NULL,'NUMÉRATION FORMULE SANGUINE(NFS)',0),(9,'Analyse','96','1000',NULL,NULL,'NFS1',0),(9,'Analyse','5','500',NULL,NULL,'RECHERCHE D\'OEUFS DE BILHARZIE(Urines)',0),(9,'Consultation','2','1500',NULL,NULL,'CONSULTATION GENERALE',0),(9,'Consultation','2','1250',NULL,NULL,'RCF',0),(9,'Pharmacie','2','3750',NULL,NULL,'Arthémether',0),(9,'Pharmacie','2','2500',NULL,NULL,'Cofantrine',0),(9,'Hospitalisation','16','5625',NULL,NULL,'ALEDJO',0),(9,'Soin','4','1250',NULL,NULL,'Cathéter',0),(9,'Soin','4','489',NULL,NULL,'SGI 250',0),(9,'Soin','4','1000',NULL,NULL,'Tramadol',0),(10,'Analyse','96','3000',NULL,NULL,'NFS1',0),(10,'Analyse','5','1500',NULL,NULL,'RECHERCHE D\'OEUFS DE BILHARZIE(Urines)',0),(10,'Consultation','2','4500',NULL,NULL,'CONSULTATION GENERALE',0),(10,'Consultation','2','3750',NULL,NULL,'RCF',0),(10,'Pharmacie','2','11250',NULL,NULL,'Arthémether',0),(10,'Pharmacie','2','7500',NULL,NULL,'Cofantrine',0),(10,'Hospitalisation','16','16875',NULL,NULL,'ALEDJO',0),(10,'Soin','4','3750',NULL,NULL,'Cathéter',0),(10,'Soin','4','1464',NULL,NULL,'SGI 250',0),(10,'Soin','4','3000',NULL,NULL,'Tramadol',0),(11,'Consultation','3','1200',NULL,NULL,'CONSULTATION GENERALE',0),(11,'Consultation','4','3200',NULL,NULL,'RCF',0),(11,'Soin','5','100',NULL,NULL,'Cathéter',0),(11,'Soin','5','1200',NULL,NULL,'Acupan',0),(12,'Consultation','7','1500',NULL,NULL,'CONSULTATION PEDIATRIQUE',0),(13,'Analyse','8','800',NULL,NULL,'NUMÉRATION FORMULE SANGUINE(NFS)',0),(14,'Pharmacie','3','300',NULL,NULL,'Arthémether',0),(14,'Pharmacie','3','400',NULL,NULL,'Paracetamol',0),(14,'Pharmacie','3','900',NULL,NULL,'Ciproflaxacin',0),(14,'Hospitalisation','17','2998',NULL,NULL,'ALEDJO',0),(14,'Soin','6','200',NULL,NULL,'Cathéter',0),(14,'Soin','6','600',NULL,NULL,'VIT K1',0),(14,'Soin','6','800',NULL,NULL,'Tramadol',0),(16,'Analyse','8','0','3200',NULL,'NUMÉRATION FORMULE SANGUINE(NFS)',0),(16,'Analyse','8','0','3200',NULL,'NUMÉRATION FORMULE SANGUINE(NFS)',0),(16,'Consultation','6','0','6000',NULL,'CONSULTATION SPECIALISEE',0),(17,'Analyse','4','0','750',NULL,'RECHERCHE DE MICROFILIARES',0),(17,'Analyse','3','0','900',NULL,'SELLES (K.O.P)',0),(17,'Analyse','5','0','1500',NULL,'RECHERCHE D\'OEUFS DE BILHARZIE(Urines)',0),(17,'Hospitalisation','11','0','28125',NULL,'23',0),(18,'Consultation','8','1200',NULL,NULL,'CONSULTATION GENERALE',0),(18,'Consultation','8','1000',NULL,NULL,'RCF',0),(18,'Soin','7','1000',NULL,NULL,'Cathéter',0),(18,'Soin','7','800',NULL,NULL,'Tramadol',0),(19,'Consultation','3','0','4800',NULL,'CONSULTATION GENERALE',0),(19,'Consultation','4','0','12800',NULL,'RCF',0),(19,'Consultation','8','0','4800',NULL,'CONSULTATION GENERALE',0),(19,'Consultation','8','0','4000',NULL,'RCF',0),(19,'Soin','5','0','400',NULL,'Cathéter',0),(19,'Soin','5','0','4800',NULL,'Acupan',0),(19,'Soin','7','0','4000',NULL,'Cathéter',0),(19,'Soin','7','0','3200',NULL,'Tramadol',0),(23,'Analyse','8','800',NULL,NULL,'NUMÉRATION FORMULE SANGUINE(NFS)',0),(23,'Analyse','90','1000',NULL,NULL,'Hématies',0),(23,'Consultation','6','1500',NULL,NULL,'CONSULTATION SPECIALISEE',0),(23,'Pharmacie','4','600',NULL,NULL,'Arthémether',0),(23,'Pharmacie','4','2000',NULL,NULL,'Paracetamol',0),(24,'Analyse','2','800',NULL,NULL,'GOUTE EPAISE(GE)',0),(24,'Analyse','8','3200',NULL,NULL,'NUMÉRATION FORMULE SANGUINE(NFS)',0),(24,'Analyse','90','4000',NULL,NULL,'Hématies',0),(24,'Pharmacie','4','2400',NULL,NULL,'Arthémether',0),(24,'Pharmacie','4','8000',NULL,NULL,'Paracetamol',0),(25,'Analyse','96','800',NULL,NULL,'NFS1',0),(26,'Pharmacie','8','2250',NULL,NULL,'Arthémether',0),(26,'Pharmacie','8','2250',NULL,NULL,'Métronidazol',0);

/*Table structure for table `detailpayementass` */

DROP TABLE IF EXISTS `detailpayementass`;

CREATE TABLE `detailpayementass` (
  `idpayement` int(11) NOT NULL,
  `prestation` varchar(150) NOT NULL,
  `codeprestation` varchar(70) NOT NULL,
  `montant` decimal(10,0) NOT NULL,
  `montantpatient` decimal(10,0) DEFAULT NULL,
  `montanttotal` decimal(10,0) DEFAULT NULL,
  `detailprestation` varchar(255) DEFAULT NULL,
  `statutassur` int(11) NOT NULL,
  KEY `FK_detailpayement_payement` (`idpayement`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `detailpayementass` */

/*Table structure for table `detailrecu` */

DROP TABLE IF EXISTS `detailrecu`;

CREATE TABLE `detailrecu` (
  `idrecu` int(11) NOT NULL,
  `prestation` varchar(150) NOT NULL,
  `codeprestation` varchar(70) NOT NULL,
  `montant` decimal(10,0) NOT NULL,
  KEY `fk_avoir4` (`idrecu`),
  CONSTRAINT `fk_avoir4` FOREIGN KEY (`idrecu`) REFERENCES `recu` (`idrecu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `detailrecu` */

/*Table structure for table `detailresultats` */

DROP TABLE IF EXISTS `detailresultats`;

CREATE TABLE `detailresultats` (
  `iddetailrsultat` int(11) NOT NULL AUTO_INCREMENT,
  `ideffectueanalyse` int(11) DEFAULT NULL,
  `valeurtrouve1` varchar(70) DEFAULT NULL,
  `iddetailanalyse` int(11) NOT NULL,
  `normesF` varchar(255) NOT NULL,
  `normeH` varchar(255) NOT NULL,
  `normeB` varchar(255) NOT NULL,
  `detaillib` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`iddetailrsultat`),
  KEY `fk_detairesultat` (`iddetailrsultat`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=116 DEFAULT CHARSET=latin1;

/*Data for the table `detailresultats` */

insert  into `detailresultats`(`iddetailrsultat`,`ideffectueanalyse`,`valeurtrouve1`,`iddetailanalyse`,`normesF`,`normeH`,`normeB`,`detaillib`) values (12,17,'13',19,'F=4300-5000*10^3/mm^3 ','H=4500-5500*10^3/mm^3  ',' Enft=4000-6000*10^3/mm^3',NULL),(13,17,'15',20,'','13.0-17.0g/dl','',NULL),(14,17,'22',21,'F=3000-46000*10^3/mm^3','H=4800-5000*10^3/mm^3  ','Enft=2000-3000*10^3/mm^3',NULL),(15,18,'10',19,'F=4300-5000*10^3/mm^3 ','H=4500-5500*10^3/mm^3  ',' Enft=4000-6000*10^3/mm^3','Hem'),(16,18,'13',20,'','13.0-17.0g/dl','','Leucocyte'),(17,18,'4',21,'F=3000-46000*10^3/mm^3','H=4800-5000*10^3/mm^3  ','Enft=2000-3000*10^3/mm^3','Hémoglobine'),(18,19,'10',35,'4300 - 5000 * 10^3/mm^3','4500 - 5500 * 10^3/mm^3','4000 - 6000 * 10^3/mm^3','Hématie'),(19,19,'14',36,'','5500-15.000/mm^3','','Leucocyte'),(20,19,'8',37,'12.0 - 16.0 g/dl','13.0 - 17.0 g/dl','11 - 14.0 g/dl','Hémoglobine'),(21,19,'9',38,'35 - 47 %','40 - 54 %','30 - 39 %','Hématocrite'),(22,19,'8 | 13',39,'','150000 - 400000/mm^3','','Plaquette'),(23,19,'13  | 80',40,'','2000 - 6500/mm^3 | 50  - 70%','','Neutrophiles'),(24,19,'',41,'','100 - 500/mm^3 | <3%','','Éosinophiles'),(25,19,'',42,'','0 - 100/mm^3','','Basophiles'),(26,19,'89',43,'','2500 - 8500/mm^3 | 20 -40%','','Lymphocytes'),(27,19,'16',44,'','100 -800/mm^3| 2-8%','','Monocytes'),(28,19,'12',45,'','80 - 100 fl','70 -86','VGM'),(29,19,'',46,'','24-31','','TCMHb'),(30,19,'19',47,'','28 - 33 g/dl','','CCMHb'),(31,19,'23',48,'< 20','<16  mm','','VS 1ere heure'),(32,20,'10',35,'4300 - 5000 * 10^3/mm^3','4500 - 5500 * 10^3/mm^3','4000 - 6000 * 10^3/mm^3','Hématie'),(33,20,'14',36,'','5500-15.000/mm^3','','Leucocyte'),(34,20,'10',37,'12.0 - 16.0 g/dl','13.0 - 17.0 g/dl','11 - 14.0 g/dl','Hémoglobine'),(35,20,'08',38,'35 - 47 %','40 - 54 %','30 - 39 %','Hématocrite'),(36,20,'77  | 66',39,'','150000 - 400000/mm^3','','Plaquette'),(37,20,'7',40,'','2000 - 6500/mm^3 | 50  - 70%','','Neutrophiles'),(38,20,'',41,'','100 - 500/mm^3 | <3%','','Éosinophiles'),(39,20,'88',42,'','0 - 100/mm^3','','Basophiles'),(40,20,'45',43,'','2500 - 8500/mm^3 | 20 -40%','','Lymphocytes'),(41,20,'13',44,'','100 -800/mm^3| 2-8%','','Monocytes'),(42,20,'',45,'','80 - 100 fl','70 -86','VGM'),(43,20,'10',46,'','24-31','','TCMHb'),(44,20,'13',47,'','28 - 33 g/dl','','CCMHb'),(45,20,'77',48,'< 20','<16  mm','','VS 1ere heure'),(46,21,'10',35,'4300 - 5000 * 10^3/mm^3','4500 - 5500 * 10^3/mm^3','4000 - 6000 * 10^3/mm^3','Hématie'),(47,21,'14',36,'','5500-15.000/mm^3','','Leucocyte'),(48,21,'10',37,'12.0 - 16.0 g/dl','13.0 - 17.0 g/dl','11 - 14.0 g/dl','Hémoglobine'),(49,21,'08',38,'35 - 47 %','40 - 54 %','30 - 39 %','Hématocrite'),(50,21,'77  | 66',39,'','150000 - 400000/mm^3','','Plaquette'),(51,21,'7',40,'','2000 - 6500/mm^3 | 50  - 70%','','Neutrophiles'),(52,21,'',41,'','100 - 500/mm^3 | <3%','','Éosinophiles'),(53,21,'88',42,'','0 - 100/mm^3','','Basophiles'),(54,21,'45',43,'','2500 - 8500/mm^3 | 20 -40%','','Lymphocytes'),(55,21,'13',44,'','100 -800/mm^3| 2-8%','','Monocytes'),(56,21,'',45,'','80 - 100 fl','70 -86','VGM'),(57,21,'10',46,'','24-31','','TCMHb'),(58,21,'13',47,'','28 - 33 g/dl','','CCMHb'),(59,21,'77',48,'< 20','<16  mm','','VS 1ere heure'),(60,22,'10',35,'4300 - 5000 * 10^3/mm^3','4500 - 5500 * 10^3/mm^3','4000 - 6000 * 10^3/mm^3','Hématie'),(61,22,'7',36,'','5500-15.000/mm^3','','Leucocyte'),(62,22,'5',37,'12.0 - 16.0 g/dl','13.0 - 17.0 g/dl','11 - 14.0 g/dl','Hémoglobine'),(63,22,'88',38,'35 - 47 %','40 - 54 %','30 - 39 %','Hématocrite'),(64,22,'4',39,'','150000 - 400000/mm^3','','Plaquette'),(65,22,'',40,'','2000 - 6500/mm^3 | 50  - 70%','','Neutrophiles'),(66,22,'',41,'','100 - 500/mm^3 | <3%','','Éosinophiles'),(67,22,'',42,'','0 - 100/mm^3','','Basophiles'),(68,22,'',43,'','2500 - 8500/mm^3 | 20 -40%','','Lymphocytes'),(69,22,'',44,'','100 -800/mm^3| 2-8%','','Monocytes'),(70,22,'10',45,'','80 - 100 fl','70 -86','VGM'),(71,22,'',46,'','24-31','','TCMHb'),(72,22,'',47,'','28 - 33 g/dl','','CCMHb'),(73,22,'',48,'< 20','<16  mm','','VS 1ere heure'),(74,23,'10',35,'4300 - 5000 * 10^3/mm^3','4500 - 5500 * 10^3/mm^3','4000 - 6000 * 10^3/mm^3','Hématie'),(75,23,'10',36,'','5500-15.000/mm^3','','Leucocyte'),(76,23,'10',37,'12.0 - 16.0 g/dl','13.0 - 17.0 g/dl','11 - 14.0 g/dl','Hémoglobine'),(77,23,'10',38,'35 - 47 %','40 - 54 %','30 - 39 %','Hématocrite'),(78,23,'13',39,'','150000 - 400000/mm^3','','Plaquette'),(79,23,'',40,'','2000 - 6500/mm^3 | 50  - 70%','','Neutrophiles'),(80,23,'',41,'','100 - 500/mm^3 | <3%','','Éosinophiles'),(81,23,'13',42,'','0 - 100/mm^3','','Basophiles'),(82,23,'44',43,'','2500 - 8500/mm^3 | 20 -40%','','Lymphocytes'),(83,23,'22',44,'','100 -800/mm^3| 2-8%','','Monocytes'),(84,23,'10',45,'','80 - 100 fl','70 -86','VGM'),(85,23,'',46,'','24-31','','TCMHb'),(86,23,'25',47,'','28 - 33 g/dl','','CCMHb'),(87,23,'',48,'< 20','<16  mm','','VS 1ere heure'),(88,31,'13',35,'4300 - 5000 * 10^3/mm^3','4500 - 5500 * 10^3/mm^3','4000 - 6000 * 10^3/mm^3','Hématie'),(89,31,'',36,'','5500-15.000/mm^3','','Leucocyte'),(90,31,'',37,'12.0 - 16.0 g/dl','13.0 - 17.0 g/dl','11 - 14.0 g/dl','Hémoglobine'),(91,31,'',38,'35 - 47 %','40 - 54 %','30 - 39 %','Hématocrite'),(92,31,'',39,'','150000 - 400000/mm^3','','Plaquette'),(93,31,'',40,'','2000 - 6500/mm^3 | 50  - 70%','','Neutrophiles'),(94,31,'',41,'','100 - 500/mm^3 | <3%','','Éosinophiles'),(95,31,'10',42,'','0 - 100/mm^3','','Basophiles'),(96,31,'13',43,'','2500 - 8500/mm^3 | 20 -40%','','Lymphocytes'),(97,31,'10',44,'','100 -800/mm^3| 2-8%','','Monocytes'),(98,31,'10',45,'','80 - 100 fl','70 -86','VGM'),(99,31,'13',46,'','24-31','','TCMHb'),(100,31,'10',47,'','28 - 33 g/dl','','CCMHb'),(101,31,'',48,'< 20','<16  mm','','VS 1ere heure'),(102,32,'13',35,'4300 - 5000 * 10^3/mm^3','4500 - 5500 * 10^3/mm^3','4000 - 6000 * 10^3/mm^3','Hématie'),(103,32,'',36,'','5500-15.000/mm^3','','Leucocyte'),(104,32,'',37,'12.0 - 16.0 g/dl','13.0 - 17.0 g/dl','11 - 14.0 g/dl','Hémoglobine'),(105,32,'',38,'35 - 47 %','40 - 54 %','30 - 39 %','Hématocrite'),(106,32,'',39,'','150000 - 400000/mm^3','','Plaquette'),(107,32,'',40,'','2000 - 6500/mm^3 | 50  - 70%','','Neutrophiles'),(108,32,'',41,'','100 - 500/mm^3 | <3%','','Éosinophiles'),(109,32,'10',42,'','0 - 100/mm^3','','Basophiles'),(110,32,'13',43,'','2500 - 8500/mm^3 | 20 -40%','','Lymphocytes'),(111,32,'10',44,'','100 -800/mm^3| 2-8%','','Monocytes'),(112,32,'10',45,'','80 - 100 fl','70 -86','VGM'),(113,32,'13',46,'','24-31','','TCMHb'),(114,32,'10',47,'','28 - 33 g/dl','','CCMHb'),(115,32,'',48,'< 20','<16  mm','','VS 1ere heure');

/*Table structure for table `donnesoins` */

DROP TABLE IF EXISTS `donnesoins`;

CREATE TABLE `donnesoins` (
  `iddonnesoins` int(11) NOT NULL,
  `idpatient` int(11) NOT NULL,
  `observation` varchar(255) DEFAULT NULL,
  `datedonnesoins` datetime NOT NULL,
  `payer` tinyint(1) NOT NULL,
  `payerassuran` int(11) NOT NULL,
  `indigeant` tinyint(1) DEFAULT NULL,
  `autorisation` tinyint(1) DEFAULT NULL,
  `echeance` date DEFAULT NULL,
  PRIMARY KEY (`iddonnesoins`),
  KEY `fk_beneficier` (`idpatient`),
  CONSTRAINT `fk_beneficier` FOREIGN KEY (`idpatient`) REFERENCES `patient` (`idpatient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `donnesoins` */

insert  into `donnesoins`(`iddonnesoins`,`idpatient`,`observation`,`datedonnesoins`,`payer`,`payerassuran`,`indigeant`,`autorisation`,`echeance`) values (1,3,NULL,'2018-09-30 17:12:50',1,1,0,0,'0000-00-00'),(2,2,NULL,'2018-09-30 19:10:05',1,1,0,0,'0000-00-00'),(3,2,NULL,'2018-09-30 19:34:24',1,1,0,0,'0000-00-00'),(4,1,NULL,'2018-09-30 21:18:44',1,1,0,0,'0000-00-00'),(5,2,NULL,'2018-10-13 15:40:40',1,1,0,0,'0000-00-00'),(6,6,NULL,'2018-10-13 16:53:10',1,1,0,0,'0000-00-00'),(7,2,NULL,'2018-10-19 18:37:30',1,1,0,0,'0000-00-00'),(8,2,NULL,'2018-12-14 18:39:09',0,0,0,0,'0000-00-00');

/*Table structure for table `effectueranalyse` */

DROP TABLE IF EXISTS `effectueranalyse`;

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
  `descriptionresultat` text,
  PRIMARY KEY (`idpatient`,`idanalysemedicale`,`ideffectueanalyse`) USING BTREE,
  KEY `fk_effectueranalyse2` (`idanalysemedicale`),
  KEY `dateanalyse` (`dateanalyse`),
  KEY `ideffectueanalyse` (`ideffectueanalyse`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `effectueranalyse` */

insert  into `effectueranalyse`(`ideffectueanalyse`,`idpatient`,`idprelevement`,`idanalysemedicale`,`dateanalyse`,`payer`,`payerassuran`,`coutanalyse`,`indigeant`,`autorisation`,`echeance`,`rdv`,`libresultat`,`normes`,`descriptionresultat`) values (4,1,4,8,'2018-07-10 10:21:00',0,NULL,'4000',NULL,NULL,NULL,NULL,'recherche négative','compris entre 5 et 8',''),(10,1,50,96,'2018-09-25 18:05:27',0,NULL,'4000',NULL,NULL,NULL,NULL,'Normal','interprétation 5',''),(3,2,7,2,'2018-07-10 16:54:59',0,NULL,'1000',NULL,NULL,NULL,NULL,'positif','<=10000',''),(24,2,59,3,'2018-07-10 16:54:59',0,NULL,'1200',NULL,NULL,NULL,NULL,'Normal','HHHHH',''),(23,2,58,8,'2018-10-23 10:48:51',0,NULL,'4000',NULL,NULL,NULL,NULL,'positif','interprétation 7',''),(25,2,60,14,'2018-07-10 16:54:59',0,NULL,'3000',NULL,NULL,NULL,NULL,'Normal','gtttt',''),(11,2,51,98,'2018-09-25 18:19:09',0,NULL,'4000',NULL,NULL,NULL,NULL,'Normal','interprétation 7',''),(9,3,44,8,'2018-07-13 11:31:23',0,NULL,'4000',NULL,NULL,NULL,NULL,'positif','interprétation 1',''),(31,3,44,8,'2018-07-13 11:31:23',0,NULL,'4000',NULL,NULL,NULL,NULL,'positif','interprétation 5',''),(32,3,44,8,'2018-07-13 11:31:23',0,NULL,'4000',NULL,NULL,NULL,NULL,'positif','interprétation 5',''),(2,3,5,14,'2018-07-13 11:31:23',0,NULL,'3000',NULL,NULL,NULL,NULL,'recherche négative','18 et 24',''),(26,4,61,2,'2018-10-23 15:59:32',0,NULL,'1000',NULL,NULL,NULL,NULL,'recherche négative','interprétation 1',''),(27,4,61,2,'2018-10-23 15:59:32',0,NULL,'1000',NULL,NULL,NULL,NULL,'recherche négative','interprétation 1',''),(14,4,56,8,'2018-10-01 15:45:11',0,NULL,'4000',NULL,NULL,NULL,NULL,'recherche négative','interprétation 1',''),(15,4,56,8,'2018-10-01 15:45:11',0,NULL,'4000',NULL,NULL,NULL,NULL,'recherche négative','interprétation 1',''),(22,4,56,8,'2018-10-01 15:45:11',0,NULL,'4000',NULL,NULL,NULL,NULL,'positif','interprétation 5',''),(12,5,52,96,'2018-09-29 18:33:53',0,NULL,'4000',NULL,NULL,NULL,NULL,'Normal','HHHHH',''),(16,5,52,96,'2018-09-29 18:33:53',0,NULL,'4000',NULL,NULL,NULL,NULL,'recherche négative','gtttt',''),(17,5,52,96,'2018-09-29 18:33:53',0,NULL,'4000',NULL,NULL,NULL,NULL,'positif','HHHHH',''),(18,5,52,96,'2018-09-29 18:33:53',0,NULL,'4000',NULL,NULL,NULL,NULL,'recherche négative','interprétation 5',''),(19,6,57,8,'2018-10-13 17:01:06',0,NULL,'4000',NULL,NULL,NULL,NULL,'recherche négative','interprétation 1',''),(20,6,57,8,'2018-10-13 17:01:06',0,NULL,'4000',NULL,NULL,NULL,NULL,'recherche négative','interprétation 7','L\'analyse a pris un certain temps cause de la non presence à l\'heure du patient sus mentioné'),(21,6,57,8,'2018-10-13 17:01:06',0,NULL,'4000',NULL,NULL,NULL,NULL,'recherche négative','interprétation 7',''),(30,7,37,4,'2018-08-01 16:50:03',0,NULL,'1000',NULL,NULL,NULL,NULL,'Normal','HHHHH',''),(6,7,33,24,'2018-08-02 17:17:04',0,NULL,'4000',NULL,NULL,NULL,NULL,'recherche négative','',''),(28,8,24,2,'2018-08-02 17:25:19',0,NULL,'1000',NULL,NULL,NULL,NULL,'positif','interprétation 7',''),(29,8,24,2,'2018-08-02 17:25:19',0,NULL,'1000',NULL,NULL,NULL,NULL,'positif','interprétation 7',''),(5,8,31,8,'2018-08-02 17:25:19',0,NULL,'4000',NULL,NULL,NULL,NULL,'positif','compris entre 5 et 8',''),(13,9,53,8,'2018-09-30 20:03:50',0,NULL,'4000',NULL,NULL,NULL,NULL,'Normal','compris entre 5 et 8',''),(4,16,43,2,'2018-09-06 11:54:44',0,NULL,'4000',NULL,NULL,NULL,NULL,'recherche négative','',''),(7,16,43,96,'2018-09-06 11:54:44',0,NULL,'4000',NULL,NULL,NULL,NULL,'recherche négative','gtttt','bndppqp'),(8,16,43,96,'2018-09-06 11:54:44',0,NULL,'4000',NULL,NULL,NULL,NULL,'recherche négative','','bndppqp');

/*Table structure for table `effectuerconsultation` */

DROP TABLE IF EXISTS `effectuerconsultation`;

CREATE TABLE `effectuerconsultation` (
  `ideffectuerconsul` int(11) NOT NULL,
  `idpatient` int(11) NOT NULL,
  `indigeant` tinyint(1) NOT NULL,
  `autorisation` tinyint(1) NOT NULL,
  `echeance` date DEFAULT NULL,
  `dateconsultation` datetime DEFAULT NULL,
  `payer` tinyint(1) NOT NULL,
  `payerassuran` tinyint(1) NOT NULL,
  `payerpatient` tinyint(1) NOT NULL,
  PRIMARY KEY (`ideffectuerconsul`),
  KEY `fk_effectuer1` (`idpatient`),
  CONSTRAINT `fk_effectuer1` FOREIGN KEY (`idpatient`) REFERENCES `patient` (`idpatient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `effectuerconsultation` */

insert  into `effectuerconsultation`(`ideffectuerconsul`,`idpatient`,`indigeant`,`autorisation`,`echeance`,`dateconsultation`,`payer`,`payerassuran`,`payerpatient`) values (1,2,0,0,'0000-00-00','2018-09-30 16:53:43',1,1,0),(2,1,0,0,'0000-00-00','2018-09-30 21:18:04',1,1,0),(3,2,0,0,'0000-00-00','2018-10-13 15:40:15',1,1,0),(4,2,0,0,'0000-00-00','2018-10-13 15:40:57',1,1,0),(5,1,0,0,'0000-00-00','2018-10-13 15:43:02',0,0,0),(6,4,0,0,'0000-00-00','2018-10-13 16:07:58',1,1,0),(7,6,0,0,'0000-00-00','2018-10-13 16:42:27',1,1,0),(8,2,0,0,'0000-00-00','2018-10-19 18:37:05',1,1,0),(9,6,0,0,'0000-00-00','2018-11-14 17:23:17',0,0,0);

/*Table structure for table `effectuerexamen` */

DROP TABLE IF EXISTS `effectuerexamen`;

CREATE TABLE `effectuerexamen` (
  `idpatient` int(11) NOT NULL,
  `idexamen` int(11) NOT NULL,
  `dateexamen` datetime NOT NULL,
  `payer` tinyint(1) NOT NULL,
  `indigeant` tinyint(1) NOT NULL,
  `autorisation` tinyint(1) NOT NULL,
  `echeance` date DEFAULT NULL,
  PRIMARY KEY (`idpatient`,`idexamen`,`dateexamen`),
  KEY `fk_effectuerexamen2` (`idexamen`),
  CONSTRAINT `fk_effectuerexamen` FOREIGN KEY (`idpatient`) REFERENCES `patient` (`idpatient`),
  CONSTRAINT `fk_effectuerexamen2` FOREIGN KEY (`idexamen`) REFERENCES `examen` (`idexamen`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `effectuerexamen` */

/*Table structure for table `examen` */

DROP TABLE IF EXISTS `examen`;

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
  `iduser` int(11) NOT NULL,
  PRIMARY KEY (`idexamen`),
  KEY `fk_lier1` (`idtypeexamen`),
  CONSTRAINT `fk_lier1` FOREIGN KEY (`idtypeexamen`) REFERENCES `typeexamen` (`idtypeexamen`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `examen` */

/*Table structure for table `examenclinic` */

DROP TABLE IF EXISTS `examenclinic`;

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
  `deletedby` int(11) DEFAULT NULL,
  PRIMARY KEY (`idexamen`),
  KEY `fk_effectuerexamenclinic` (`idpatient`),
  CONSTRAINT `fk_effectuerexamenclinic` FOREIGN KEY (`idpatient`) REFERENCES `patient` (`idpatient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `examenclinic` */

insert  into `examenclinic`(`idexamen`,`idpatient`,`hdm`,`appcardivascu`,`apprespiratoire`,`appdigestif`,`appurogenital`,`motifconsultation`,`dateexamen`,`coeur`,`poumon`,`abdomen`,`urogenital`,`locomoteur`,`autres`,`diagnostic`,`paraclinic`,`cat`,`createdat`,`updatedat`,`deletedat`,`createdby`,`updatedby`,`deletedby`) values (1,7,'ça a commencé hier ,','normal','normal','douleurs','vaginite','Céphalées, asthénies ,anorexie,vomissements,diarrhée','2018-08-01 00:00:00','RAS','RAS','','colorés','RAS','RAS',NULL,'GE ,NFS, CRP,SDW','Perfalgan  gramme','2018-08-01 16:19:40',NULL,NULL,1,NULL,NULL);

/*Table structure for table `examengyneco` */

DROP TABLE IF EXISTS `examengyneco`;

CREATE TABLE `examengyneco` (
  `idexamengyneco` int(11) NOT NULL,
  `idpatient` int(11) NOT NULL COMMENT 'Patient N°',
  `seins` varchar(200) DEFAULT NULL,
  `abdomen` varchar(150) DEFAULT NULL,
  `perineetvulve` varchar(250) DEFAULT NULL,
  `speculum` varchar(150) DEFAULT NULL,
  `tv` varchar(150) DEFAULT NULL,
  `tr` varchar(150) DEFAULT NULL,
  `ddr` varchar(20) DEFAULT NULL,
  `resume` text,
  `hypothese` text,
  `examencomplementaire` text,
  `motifconsultation` varchar(255) DEFAULT NULL,
  `traitement` text,
  `consigne` text,
  `dateentree` varchar(50) DEFAULT NULL,
  `datesortie` datetime DEFAULT NULL,
  `adresseepar` varchar(255) DEFAULT NULL,
  `pour` varchar(255) DEFAULT NULL,
  `hbpatient` varchar(50) DEFAULT NULL,
  `createdat` datetime DEFAULT NULL,
  `updatedat` datetime DEFAULT NULL,
  `deletedat` datetime DEFAULT NULL,
  `createdby` int(11) DEFAULT NULL,
  `updatedby` int(11) DEFAULT NULL,
  `deletedby` int(11) DEFAULT NULL,
  PRIMARY KEY (`idexamengyneco`),
  KEY `fk_effectuerexamgyneco` (`idpatient`),
  CONSTRAINT `fk_effectuerexamgyneco` FOREIGN KEY (`idpatient`) REFERENCES `patient` (`idpatient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `examengyneco` */

insert  into `examengyneco`(`idexamengyneco`,`idpatient`,`seins`,`abdomen`,`perineetvulve`,`speculum`,`tv`,`tr`,`ddr`,`resume`,`hypothese`,`examencomplementaire`,`motifconsultation`,`traitement`,`consigne`,`dateentree`,`datesortie`,`adresseepar`,`pour`,`hbpatient`,`createdat`,`updatedat`,`deletedat`,`createdby`,`updatedby`,`deletedby`) values (1,7,'normaux','douleure','propre','vaginite','col posterieur','RAS',NULL,'douleur abdominale + vaginites + céphalées','paludisme ,gastrite, vaginite','GS\r\nNFS\r\nCRP\r\nPV',NULL,'perfalgan 1gramme','surveillance générale',NULL,NULL,'naya','consulatation ',NULL,'2018-08-01 16:42:10',NULL,NULL,1,NULL,NULL),(2,3,'normaux','abd1','propre','vaginité','','',NULL,'','','',NULL,'','',NULL,NULL,NULL,NULL,NULL,'2018-08-31 09:30:25',NULL,NULL,1,NULL,NULL),(3,5,'normaux','abd1','propre','vaginité','col posterieur','RAS','2018-09-15','','','',NULL,'','',NULL,NULL,NULL,NULL,NULL,'2018-09-19 11:51:48',NULL,NULL,1,NULL,NULL),(4,3,'normaux','abd1','propre','vaginité','col posterieur','RAS','2018-11-11','nn','','',NULL,'','','2018-11-13 13:37:18',NULL,NULL,NULL,NULL,'2018-11-13 13:37:18',NULL,NULL,1,NULL,NULL),(5,2,'normaux','abd1','propre','','','','2018-05-10','','','','fièvre ','','','2018-11-15 11:37:49',NULL,NULL,NULL,NULL,'2018-11-15 11:37:49',NULL,NULL,1,NULL,NULL);

/*Table structure for table `historique` */

DROP TABLE IF EXISTS `historique`;

CREATE TABLE `historique` (
  `idhistorique` bigint(20) NOT NULL,
  `iduser` int(11) NOT NULL,
  `action` varchar(70) NOT NULL,
  `model` varchar(255) DEFAULT NULL,
  `idmodel` varchar(255) DEFAULT NULL,
  `date` datetime NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`idhistorique`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `historique` */

insert  into `historique`(`idhistorique`,`iduser`,`action`,`model`,`idmodel`,`date`,`description`) values (1,2,'Log in',NULL,NULL,'2018-03-30 19:28:54','igbataou s\'est connecté(e)'),(2,2,'Log out',NULL,NULL,'2018-03-30 19:42:14','igbataou s\'est déconnecté(e)'),(3,2,'Log in',NULL,NULL,'2018-04-05 18:33:25','igbataou s\'est connecté(e)'),(4,14,'Log out',NULL,NULL,'2018-04-05 18:33:46','ouro-gaffou s\'est déconnecté(e)'),(5,1,'Log in',NULL,NULL,'2018-04-05 18:33:55','admin s\'est connecté(e)'),(6,1,'Log in',NULL,NULL,'2018-04-05 19:04:33','admin s\'est connecté(e)'),(7,1,'Create user',NULL,NULL,'2018-04-05 19:12:50','admin a enregistrer l\'utilisateur N°23'),(8,1,'Log out',NULL,NULL,'2018-04-05 19:12:56','admin s\'est déconnecté(e)'),(9,23,'Log in',NULL,NULL,'2018-04-05 19:13:07','atcha-alaza s\'est connecté(e)'),(10,23,'Log out',NULL,NULL,'2018-04-05 19:14:28','atcha-alaza s\'est déconnecté(e)'),(11,2,'Log out',NULL,NULL,'2018-04-05 19:50:40','igbataou s\'est déconnecté(e)'),(12,1,'Log in',NULL,NULL,'2018-04-25 17:24:03','admin s\'est connecté(e)'),(13,1,'Log in',NULL,NULL,'2018-04-25 18:47:37','admin s\'est connecté(e)'),(14,1,'Log in',NULL,NULL,'2018-04-26 18:18:45','admin s\'est connecté(e)'),(15,1,'Log in',NULL,NULL,'2018-05-04 18:36:57','admin s\'est connecté(e)'),(16,13,'Log in',NULL,NULL,'2018-05-04 21:37:02','missihu s\'est connecté(e)'),(17,1,'Create Patient',NULL,NULL,'2018-05-11 15:06:32','admin a créé le patient N° 1'),(18,1,'Create demanderanalyse',NULL,NULL,'2018-05-12 08:53:22','admin a enregistré les demande analyse N°8 du patient N° 1'),(19,1,'Read Historique',NULL,NULL,'2018-05-12 08:54:49','admin a consulté la liste des historiques'),(20,1,'Create demanderanalyse',NULL,NULL,'2018-05-12 08:57:05','admin a enregistré les demande analyse N°1 du patient N° 1'),(21,1,'Create Patient',NULL,NULL,'2018-05-13 09:42:23','admin a créé le patient N° 2'),(22,1,'Create Patient',NULL,NULL,'2018-05-13 09:47:54','admin a créé le patient N° 3'),(23,1,'Create donnesoin',NULL,NULL,'2018-05-13 09:50:20','admin a enregistré les soins N°1 du patient N° 1'),(24,1,'Create demanderanalyse',NULL,NULL,'2018-05-13 11:34:43','admin a enregistré les demande analyse N°2 du patient N° 2'),(25,1,'Create demanderanalyse',NULL,NULL,'2018-05-13 11:46:50','admin a enregistré les demande analyse N°2 du patient N° 2'),(26,1,'Create demanderanalyse',NULL,NULL,'2018-05-13 11:47:27','admin a enregistré les demande analyse N°2 du patient N° 2'),(27,1,'Create demanderanalyse',NULL,NULL,'2018-05-13 11:54:46','admin a enregistré les demande analyse N°2 du patient N° 2'),(28,1,'Create demanderanalyse',NULL,NULL,'2018-05-13 11:55:18','admin a enregistré les demande analyse N°2 du patient N° 2'),(29,1,'Create demanderanalyse',NULL,NULL,'2018-05-13 11:59:00','admin a enregistré les demande analyse N°3 du patient N° 2'),(30,1,'Create demanderanalyse',NULL,NULL,'2018-05-13 12:07:24','admin a enregistré les demande analyse N°3 du patient N° 2'),(31,1,'Create demanderanalyse',NULL,NULL,'2018-05-13 12:55:10','admin a enregistré les demande analyse N°3 du patient N° 2'),(32,1,'Create demanderanalyse',NULL,NULL,'2018-05-13 12:55:42','admin a enregistré les demande analyse N°3 du patient N° 2'),(33,1,'Create demanderanalyse',NULL,NULL,'2018-05-13 12:59:04','admin a enregistré les demande analyse N°4 du patient N° 3'),(34,1,'Create demanderanalyse',NULL,NULL,'2018-05-13 13:04:12','admin a enregistré les demande analyse N°4 du patient N° 3'),(35,1,'Create demanderanalyse',NULL,NULL,'2018-05-13 13:07:51','admin a enregistré les demande analyse N°1 du patient N° 1'),(36,1,'Create demanderanalyse',NULL,NULL,'2018-05-13 13:08:08','admin a enregistré les demande analyse N°1 du patient N° 1'),(37,1,'Create','Effectuerconsultation',NULL,'2018-05-13 20:04:31','admin a enregistré la consultation N°2 du patient N° 1'),(38,1,'Create antecedent',NULL,NULL,'2018-05-13 20:10:33','admin a enregistré l\'antécédent N°1'),(39,1,'Create donnesoin',NULL,NULL,'2018-05-13 20:11:23','admin a enregistré les soins N°2 du patient N° 2'),(40,1,'Create Ordonnance',NULL,NULL,'2018-05-13 20:46:06','admin a enregistré l\'ordonnance N°2 du patient N° 1'),(41,1,'Create demanderanalyse',NULL,NULL,'2018-05-13 20:54:21','admin a enregistré les demande analyse N°2 du patient N° 3'),(42,1,'Create','Effectuerconsultation',NULL,'2018-05-14 20:44:56','admin a enregistré la consultation N°3 du patient N° 2'),(43,1,'Create Patient',NULL,NULL,'2018-05-15 14:47:03','admin a créé le patient N° 4'),(44,1,'Create','Effectuerconsultation',NULL,'2018-05-15 14:50:43','admin a enregistré la consultation N°4 du patient N° 4'),(45,1,'Create demanderanalyse',NULL,NULL,'2018-05-15 16:18:32','admin a enregistré les demande analyse N°3 du patient N° 4'),(46,1,'Log in',NULL,NULL,'2018-05-16 10:42:08','admin s\'est connecté(e)'),(47,1,'Create','Effectuerconsultation',NULL,'2018-05-16 10:59:51','admin a enregistré la consultation N°5 du patient N° 1'),(48,1,'Create donnesoin',NULL,NULL,'2018-05-16 17:17:40','admin a enregistré les soins N°3 du patient N° 1'),(49,1,'Create','Effectuerconsultation',NULL,'2018-05-22 09:12:23','admin a enregistré la consultation N°1 du patient N° 1'),(50,1,'Create','Effectuerconsultation',NULL,'2018-05-22 09:14:56','admin a enregistré la consultation N°2 du patient N° 1'),(51,1,'Create donnesoin',NULL,NULL,'2018-05-22 09:47:06','admin a enregistré les soins N°1 du patient N° 1'),(52,1,'Create donnesoin',NULL,NULL,'2018-05-22 11:02:00','admin a enregistré les soins N°2 du patient N° 2'),(53,1,'Create','Effectuerconsultation',NULL,'2018-05-22 12:42:05','admin a enregistré la consultation N°3 du patient N° 3'),(54,1,'Create','Effectuerconsultation',NULL,'2018-05-22 12:47:07','admin a enregistré la consultation N°4 du patient N° 3'),(55,1,'Create','Effectuerconsultation',NULL,'2018-05-22 12:53:51','admin a enregistré la consultation N°5 du patient N° 3'),(56,1,'Create','Effectuerconsultation',NULL,'2018-05-22 12:57:31','admin a enregistré la consultation N°6 du patient N° 2'),(57,1,'Create','Effectuerconsultation',NULL,'2018-05-22 12:58:46','admin a enregistré la consultation N°7 du patient N° 2'),(58,1,'Create','Effectuerconsultation',NULL,'2018-05-22 16:09:01','admin a enregistré la consultation N°8 du patient N° 1'),(59,1,'Create','Effectuerconsultation',NULL,'2018-05-22 16:14:08','admin a enregistré la consultation N°8 du patient N° 1'),(60,1,'Create','Effectuerconsultation',NULL,'2018-05-25 11:53:57','admin a enregistré la consultation N°1 du patient N° 1'),(61,1,'Create','Effectuerconsultation',NULL,'2018-06-04 14:58:16','admin a enregistré la consultation N°2 du patient N° 2'),(62,1,'Create','Effectuerconsultation',NULL,'2018-06-04 16:59:14','admin a enregistré la consultation N°3 du patient N° 1'),(63,1,'Create','Effectuerconsultation',NULL,'2018-06-05 16:25:24','admin a enregistré la consultation N°4 du patient N° 1'),(64,1,'Create donnesoin',NULL,NULL,'2018-06-05 16:25:58','admin a enregistré les soins N°1 du patient N° 1'),(65,1,'Create','Effectuerconsultation',NULL,'2018-06-06 11:43:42','admin a enregistré la consultation N°1 du patient N° 1'),(66,1,'Create','Effectuerconsultation',NULL,'2018-06-06 12:18:26','admin a enregistré la consultation N°1 du patient N° 1'),(67,1,'Log in',NULL,NULL,'2018-06-06 14:14:19','admin s\'est connecté(e)'),(68,1,'Create','Effectuerconsultation',NULL,'2018-06-06 14:15:39','admin a enregistré la consultation N°2 du patient N° 1'),(69,1,'Create','Effectuerconsultation',NULL,'2018-06-06 15:51:21','admin a enregistré la consultation N°3 du patient N° 2'),(70,1,'Create donnesoin',NULL,NULL,'2018-06-06 15:52:21','admin a enregistré les soins N°2 du patient N° 2'),(71,1,'Create','Effectuerconsultation',NULL,'2018-06-07 11:46:08','admin a enregistré la consultation N°4 du patient N° 1'),(72,1,'Create','Effectuerconsultation',NULL,'2018-06-07 17:46:29','admin a enregistré la consultation N°5 du patient N° 1'),(73,1,'Create','Effectuerconsultation',NULL,'2018-06-07 17:53:09','admin a enregistré la consultation N°6 du patient N° 1'),(74,1,'Create','Effectuerconsultation',NULL,'2018-06-08 08:12:19','admin a enregistré la consultation N°7 du patient N° 1'),(75,1,'Create','Effectuerconsultation',NULL,'2018-06-08 09:35:29','admin a enregistré la consultation N°8 du patient N° 1'),(76,1,'Create donnesoin',NULL,NULL,'2018-06-08 09:41:28','admin a enregistré les soins N°3 du patient N° 1'),(77,1,'Create','Effectuerconsultation',NULL,'2018-06-08 12:35:20','admin a enregistré la consultation N°9 du patient N° 2'),(78,1,'Create','Effectuerconsultation',NULL,'2018-06-08 15:41:09','admin a enregistré la consultation N°10 du patient N° 1'),(79,1,'Create donnesoin',NULL,NULL,'2018-06-08 15:41:38','admin a enregistré les soins N°4 du patient N° 1'),(80,1,'Create demanderanalyse',NULL,NULL,'2018-06-12 11:05:46','admin a enregistré les demande analyse N°4 du patient N° 1'),(81,1,'Create demanderanalyse',NULL,NULL,'2018-07-07 11:05:02','admin a enregistré les demande analyse N°5 du patient N° 4'),(82,1,'Create demanderanalyse',NULL,NULL,'2018-07-07 11:16:22','admin a enregistré les demande analyse N°5 du patient N° 2'),(83,1,'Create demanderanalyse',NULL,NULL,'2018-07-10 10:21:00','admin a enregistré les demande analyse N°1 du patient N° 1'),(84,1,'Create demanderanalyse',NULL,NULL,'2018-07-10 16:55:00','admin a enregistré les demande analyse N°2 du patient N° 2'),(85,1,'Log in',NULL,NULL,'2018-07-13 10:19:17','admin s\'est connecté(e)'),(86,1,'Create demanderanalyse',NULL,NULL,'2018-07-13 11:31:24','admin a enregistré les demande analyse N°3 du patient N° 3'),(87,1,'Create demanderanalyse',NULL,NULL,'2018-07-13 11:31:51','admin a enregistré les demande analyse N°3 du patient N° 3'),(88,3,'Log in',NULL,NULL,'2018-07-14 11:36:23','yezou s\'est connecté(e)'),(89,3,'Log out',NULL,NULL,'2018-07-14 11:51:24','yezou s\'est déconnecté(e)'),(90,1,'Update user',NULL,NULL,'2018-07-16 11:21:47','admin a modifier l\'utilisateur N°17'),(91,1,'Create user',NULL,NULL,'2018-07-16 11:32:43','admin a enregistrer l\'utilisateur N°24'),(92,1,'Create user',NULL,NULL,'2018-07-16 11:33:44','admin a enregistrer l\'utilisateur N°25'),(93,1,'Log out',NULL,NULL,'2018-07-19 11:28:07','admin s\'est déconnecté(e)'),(94,1,'Log in',NULL,NULL,'2018-07-19 11:29:36','admin s\'est connecté(e)'),(95,25,'Log in',NULL,NULL,'2018-07-19 11:32:30','RABIATOU s\'est connecté(e)'),(96,25,'Create Patient',NULL,NULL,'2018-07-19 11:36:16','RABIATOU a créé le patient N° 5'),(97,25,'Create','Effectuerconsultation',NULL,'2018-07-19 12:59:37','RABIATOU a enregistré la consultation N°11 du patient N° 5'),(98,1,'Log out',NULL,NULL,'2018-07-19 14:08:20','admin s\'est déconnecté(e)'),(99,23,'Log in',NULL,NULL,'2018-07-19 14:08:47','atcha-alaza s\'est connecté(e)'),(100,23,'Log out',NULL,NULL,'2018-07-19 14:10:16','atcha-alaza s\'est déconnecté(e)'),(101,1,'Log in',NULL,NULL,'2018-07-19 14:10:24','admin s\'est connecté(e)'),(102,1,'Update consultation',NULL,NULL,'2018-07-19 14:15:00','admin a modifié la consultation N°2'),(103,1,'Update consultation',NULL,NULL,'2018-07-19 14:15:41','admin a modifié la consultation N°3'),(104,1,'Update consultation',NULL,NULL,'2018-07-19 14:16:13','admin a modifié la consultation N°1'),(105,1,'Create consultation',NULL,NULL,'2018-07-19 14:19:13','admin a enregistré la consultation N°28'),(106,1,'Create consultation',NULL,NULL,'2018-07-19 14:21:20','admin a enregistré la consultation N°29'),(107,1,'Create consultation',NULL,NULL,'2018-07-19 14:23:28','admin a enregistré la consultation N°30'),(108,1,'Create consultation',NULL,NULL,'2018-07-19 14:25:19','admin a enregistré la consultation N°31'),(109,1,'Create consultation',NULL,NULL,'2018-07-19 14:26:15','admin a enregistré la consultation N°32'),(110,1,'Create consultation',NULL,NULL,'2018-07-19 14:27:21','admin a enregistré la consultation N°33'),(111,1,'Create typeConsultation',NULL,NULL,'2018-07-19 14:33:37','admin a enregistrer le type de consultation N°5'),(112,1,'Create consultation',NULL,NULL,'2018-07-19 14:34:01','admin a enregistré la consultation N°34'),(113,1,'Create consultation',NULL,NULL,'2018-07-19 14:34:30','admin a enregistré la consultation N°35'),(114,1,'Create typeConsultation',NULL,NULL,'2018-07-19 14:36:27','admin a enregistrer le type de consultation N°6'),(115,1,'Create Patient',NULL,NULL,'2018-07-19 14:41:45','admin a créé le patient N° 6'),(116,1,'Create','Effectuerconsultation',NULL,'2018-07-19 14:42:15','admin a enregistré la consultation N°12 du patient N° 6'),(117,1,'Update effectuerconsultation',NULL,NULL,'2018-07-19 14:44:03','admin a modifié la consultation N°12 du patient N° 6'),(118,1,'Create','Effectuerconsultation',NULL,'2018-07-19 14:45:04','admin a enregistré la consultation N°12 du patient N° 6'),(119,1,'Create donnesoin',NULL,NULL,'2018-07-19 14:46:44','admin a enregistré les soins N°5 du patient N° 6'),(120,1,'Create soin',NULL,NULL,'2018-07-19 14:48:56','admin a enregistré le soin  N° 60'),(121,1,'Update donnesoin',NULL,NULL,'2018-07-19 14:52:30','admin a modifié les soins N°5 du patient N° 6'),(122,1,'Create donnesoin',NULL,NULL,'2018-07-19 14:54:48','admin a enregistré les soins N°5 du patient N° 6'),(123,1,'Create Categoriechambre',NULL,NULL,'2018-07-19 15:06:16','admin a enregistré la catégorie de chambre N°3'),(124,1,'Create Categoriechambre',NULL,NULL,'2018-07-19 15:06:31','admin a enregistré la catégorie de chambre N°4'),(125,1,'Create Categoriechambre',NULL,NULL,'2018-07-19 15:06:45','admin a enregistré la catégorie de chambre N°5'),(126,1,'Update typeconsultation',NULL,NULL,'2018-07-20 08:57:27','admin a modifier le type de consultation N°1'),(127,1,'Update typeconsultation',NULL,NULL,'2018-07-20 08:57:51','admin a modifier le type de consultation N°2'),(128,1,'Update typeconsultation',NULL,NULL,'2018-07-20 08:58:14','admin a modifier le type de consultation N°1'),(129,1,'Update typeconsultation',NULL,NULL,'2018-07-20 08:59:11','admin a modifier le type de consultation N°3'),(130,1,'Update consultation',NULL,NULL,'2018-07-20 09:00:16','admin a modifié la consultation N°3'),(131,1,'Create typeConsultation',NULL,NULL,'2018-07-20 09:03:49','admin a enregistrer le type de consultation N°7'),(132,1,'Update consultation',NULL,NULL,'2018-07-20 09:50:04','admin a modifié la consultation N°2'),(133,1,'Update consultation',NULL,NULL,'2018-07-20 09:50:47','admin a modifié la consultation N°6'),(134,1,'Update consultation',NULL,NULL,'2018-07-20 09:51:21','admin a modifié la consultation N°7'),(135,1,'Update consultation',NULL,NULL,'2018-07-20 10:24:57','admin a modifié la consultation N°8'),(136,1,'Update consultation',NULL,NULL,'2018-07-20 10:25:20','admin a modifié la consultation N°9'),(137,1,'Update consultation',NULL,NULL,'2018-07-20 10:25:44','admin a modifié la consultation N°10'),(138,1,'Create soin',NULL,NULL,'2018-07-20 10:29:46','admin a enregistré le soin  N° 61'),(139,1,'Create soin',NULL,NULL,'2018-07-20 10:30:22','admin a enregistré le soin  N° 62'),(140,1,'Create soin',NULL,NULL,'2018-07-20 10:35:40','admin a enregistré le soin  N° 63'),(141,1,'Create soin',NULL,NULL,'2018-07-20 10:36:18','admin a enregistré le soin  N° 64'),(142,1,'Create soin',NULL,NULL,'2018-07-20 10:55:00','admin a enregistré le soin  N° 65'),(143,1,'Create soin',NULL,NULL,'2018-07-20 10:55:31','admin a enregistré le soin  N° 66'),(144,1,'Create soin',NULL,NULL,'2018-07-20 10:56:13','admin a enregistré le soin  N° 67'),(145,1,'Create soin',NULL,NULL,'2018-07-20 10:58:04','admin a enregistré le soin  N° 68'),(146,1,'Create soin',NULL,NULL,'2018-07-20 10:58:53','admin a enregistré le soin  N° 69'),(147,1,'Create','Effectuerconsultation',NULL,'2018-07-20 11:57:58','admin a enregistré la consultation N°1 du patient N° 1'),(148,1,'Update effectuerconsultation',NULL,NULL,'2018-07-20 11:58:26','admin a modifié la consultation N°1 du patient N° 1'),(149,1,'Update effectuerconsultation',NULL,NULL,'2018-07-20 12:00:05','admin a modifié la consultation N°1 du patient N° 1'),(150,1,'Update donnesoin',NULL,NULL,'2018-07-20 14:51:04','admin a modifié les soins N°1 du patient N° 1'),(151,1,'Update donnesoin',NULL,NULL,'2018-07-20 14:55:58','admin a modifié les soins N°1 du patient N° 1'),(152,1,'Create Ordonnance',NULL,NULL,'2018-07-20 17:23:55','admin a enregistré l\'ordonnance N°3 du patient N° 1'),(153,1,'Create Ordonnance',NULL,NULL,'2018-07-20 17:26:57','admin a enregistré l\'ordonnance N°3 du patient N° 1'),(154,1,'Log out',NULL,NULL,'2018-08-01 15:26:16','admin s\'est déconnecté(e)'),(155,1,'Log in',NULL,NULL,'2018-08-01 15:27:01','admin s\'est connecté(e)'),(156,1,'Create Patient',NULL,NULL,'2018-08-01 15:31:17','admin a créé le patient N° 7'),(157,1,'Log in',NULL,NULL,'2018-08-01 15:33:57','admin s\'est connecté(e)'),(158,1,'Create Patient',NULL,NULL,'2018-08-01 15:37:41','admin a créé le patient N° 7'),(159,1,'Create','Effectuerconsultation',NULL,'2018-08-01 15:39:08','admin a enregistré la consultation N°2 du patient N° 7'),(160,1,'Update Patient',NULL,NULL,'2018-08-01 15:52:34','admin a modifié le patient N° 7'),(161,1,'Create Parametre Patient',NULL,NULL,'2018-08-01 15:55:03','admin a créé le parametre patient N° 1'),(162,1,'Create antecedent',NULL,NULL,'2018-08-01 16:03:53','admin a enregistré l\'antécédent N°2'),(163,1,'Create Examen gynecologuique',NULL,NULL,'2018-08-01 16:19:40','admin a créé l\'examen N° 1'),(164,1,'Create Examen gynecologuique',NULL,NULL,'2018-08-01 16:42:11','admin a créé l\'examen N° 1'),(165,1,'Create donnesoin',NULL,NULL,'2018-08-01 16:44:25','admin a enregistré les soins N°6 du patient N° 7'),(166,1,'Create demanderanalyse',NULL,NULL,'2018-08-01 16:50:04','admin a enregistré les demande analyse N°4 du patient N° 7'),(167,1,'Log out',NULL,NULL,'2018-08-02 15:51:08','admin s\'est déconnecté(e)'),(168,1,'Log in',NULL,NULL,'2018-08-02 15:51:29','admin s\'est connecté(e)'),(169,1,'Log out',NULL,NULL,'2018-08-02 15:53:52','admin s\'est déconnecté(e)'),(170,1,'Log in',NULL,NULL,'2018-08-02 15:54:05','admin s\'est connecté(e)'),(171,1,'Create Patient',NULL,NULL,'2018-08-02 16:01:43','admin a créé le patient N° 8'),(172,1,'Create','Effectuerconsultation',NULL,'2018-08-02 16:03:56','admin a enregistré la consultation N°3 du patient N° 8'),(173,1,'Update Patient',NULL,NULL,'2018-08-02 16:13:45','admin a modifié le patient N° 8'),(174,1,'Update Patient',NULL,NULL,'2018-08-02 16:16:58','admin a modifié le patient N° 8'),(175,1,'Update Patient',NULL,NULL,'2018-08-02 16:17:31','admin a modifié le patient N° 8'),(176,1,'Create antecedent',NULL,NULL,'2018-08-02 16:29:24','admin a enregistré l\'antécédent N°3'),(177,1,'Create Parametre Patient',NULL,NULL,'2018-08-02 16:32:55','admin a créé le parametre patient N° 2'),(178,1,'Create donnesoin',NULL,NULL,'2018-08-02 16:48:30','admin a enregistré les soins N°7 du patient N° 8'),(179,1,'Create Ordonnance',NULL,NULL,'2018-08-02 17:09:44','admin a enregistré l\'ordonnance N°4 du patient N° 1'),(180,1,'Create demanderanalyse',NULL,NULL,'2018-08-02 17:17:04','admin a enregistré les demande analyse N°5 du patient N° 7'),(181,1,'Create demanderanalyse',NULL,NULL,'2018-08-02 17:25:20','admin a enregistré les demande analyse N°6 du patient N° 8'),(182,1,'Create Patient',NULL,NULL,'2018-08-03 18:47:47','admin a créé le patient N° 9'),(183,1,'Create','Effectuerconsultation',NULL,'2018-08-03 19:01:27','admin a enregistré la consultation N°5 du patient N° 9'),(184,1,'Create Patient',NULL,NULL,'2018-08-03 19:02:00','admin a créé le patient N° 10'),(185,1,'Create Patient',NULL,NULL,'2018-08-03 19:06:26','admin a créé le patient N° 11'),(186,1,'Create Patient',NULL,NULL,'2018-08-03 19:12:53','admin a créé le patient N° 12'),(187,1,'Create','Effectuerconsultation',NULL,'2018-08-03 19:13:41','admin a enregistré la consultation N°6 du patient N° 12'),(188,1,'Create Patient',NULL,NULL,'2018-08-03 19:14:20','admin a créé le patient N° 13'),(189,1,'Create demanderanalyse',NULL,NULL,'2018-08-07 11:15:46','admin a enregistré les demande analyse N°7 du patient N° 13'),(190,1,'Create demanderanalyse',NULL,NULL,'2018-08-07 11:18:35','admin a enregistré les demande analyse N°7 du patient N° 13'),(191,1,'Create Parametre Patient',NULL,NULL,'2018-08-10 17:28:17','admin a créé le parametre patient N° 3'),(192,1,'Create Patient',NULL,NULL,'2018-08-12 12:32:20','admin a créé le patient N° 14'),(193,1,'Create Patient',NULL,NULL,'2018-08-12 12:34:20','admin a créé le patient N° 15'),(194,1,'Create Patient',NULL,NULL,'2018-08-12 12:35:19','admin a créé le patient N° 16'),(195,1,'Update user',NULL,NULL,'2018-08-13 10:32:00','admin a modifier l\'utilisateur N°2'),(196,1,'Log out',NULL,NULL,'2018-08-13 10:32:05','admin s\'est déconnecté(e)'),(197,2,'Log in',NULL,NULL,'2018-08-13 10:32:23','igbataou s\'est connecté(e)'),(198,2,'Log out',NULL,NULL,'2018-08-13 10:32:45','igbataou s\'est déconnecté(e)'),(199,1,'Log in',NULL,NULL,'2018-08-13 10:33:49','admin s\'est connecté(e)'),(200,1,'Log out',NULL,NULL,'2018-08-13 10:38:38','admin s\'est déconnecté(e)'),(201,1,'Log in',NULL,NULL,'2018-08-13 10:38:46','admin s\'est connecté(e)'),(202,1,'Update user',NULL,NULL,'2018-08-13 10:42:59','admin a modifier l\'utilisateur N°2'),(203,1,'Log out',NULL,NULL,'2018-08-13 10:43:02','admin s\'est déconnecté(e)'),(204,2,'Log in',NULL,NULL,'2018-08-13 10:43:13','igbataou s\'est connecté(e)'),(205,2,'Log out',NULL,NULL,'2018-08-16 13:18:04','igbataou s\'est déconnecté(e)'),(206,1,'Log in',NULL,NULL,'2018-08-16 13:18:15','admin s\'est connecté(e)'),(207,1,'Création  antécédant',NULL,NULL,'2018-08-31 08:57:30','admin a Créeé l\'antécédant N° 15'),(208,1,'Create Examen gynecologuique',NULL,NULL,'2018-08-31 09:30:26','admin a créé l\'examen N° 2'),(209,1,'Create demanderanalyse',NULL,NULL,'2018-09-06 11:54:44','admin a enregistré les demande analyse N°8 du patient N° 16'),(210,1,'Log in',NULL,NULL,'2018-09-10 16:37:11','admin s\'est connecté(e)'),(211,1,'Update Patient',NULL,NULL,'2018-09-10 17:43:28','admin a modifié le patient N° 16'),(212,1,'Create demanderanalyse',NULL,NULL,'2018-09-11 18:33:56','admin a enregistré les demande analyse N°3 du patient N° 3'),(213,1,'Read Historique',NULL,NULL,'2018-09-17 13:21:10','admin a consulté la liste des historiques'),(214,1,'Create Examen gynecologuique',NULL,NULL,'2018-09-19 11:51:48','admin a créé l\'examen N° 3'),(215,1,'Create demanderanalyse',NULL,NULL,'2018-09-21 15:09:07','admin a enregistré les demande analyse N°9 du patient N° 12'),(216,1,'Create demanderanalyse',NULL,NULL,'2018-09-21 17:48:05','admin a enregistré les demande analyse N°10 du patient N° 15'),(217,1,'Create demanderanalyse',NULL,NULL,'2018-09-22 06:21:59','admin a enregistré les demande analyse N°11 du patient N° 5'),(218,1,'Create','Effectuerconsultation',NULL,'2018-09-22 12:20:00','admin a enregistré la consultation N°7 du patient N° 14'),(219,1,'Create','Effectuerconsultation',NULL,'2018-09-22 15:45:55','admin a enregistré la consultation N°8 du patient N° 11'),(220,1,'Create','Effectuerconsultation',NULL,'2018-09-24 16:30:01','admin a enregistré la consultation N°9 du patient N° 3'),(221,1,'Create donnesoin',NULL,NULL,'2018-09-24 19:33:02','admin a enregistré les soins N°8 du patient N° 6'),(222,1,'Create donnesoin',NULL,NULL,'2018-09-26 14:47:12','admin a enregistré les soins N°9 du patient N° 8'),(223,1,'Log in',NULL,NULL,'2018-09-27 16:41:01','admin s\'est connecté(e)'),(224,1,'Create donnesoin',NULL,NULL,'2018-09-27 19:08:14','admin a enregistré les soins N°10 du patient N° 16'),(225,1,'Create','Effectuerconsultation',NULL,'2018-09-28 11:20:07','admin a enregistré la consultation N°10 du patient N° 6'),(226,1,'Create','Effectuerconsultation',NULL,'2018-09-28 11:21:21','admin a enregistré la consultation N°11 du patient N° 2'),(227,1,'Create','Effectuerconsultation',NULL,'2018-09-28 14:17:26','admin a enregistré la consultation N°12 du patient N° 2'),(228,1,'Create donnesoin',NULL,NULL,'2018-09-28 14:18:31','admin a enregistré les soins N°11 du patient N° 6'),(229,1,'Create donnesoin',NULL,NULL,'2018-09-28 16:26:26','admin a enregistré les soins N°12 du patient N° 2'),(230,1,'Create','Effectuerconsultation',NULL,'2018-09-28 17:40:17','admin a enregistré la consultation N°13 du patient N° 3'),(231,1,'Create','Effectuerconsultation',NULL,'2018-09-28 17:56:49','admin a enregistré la consultation N°14 du patient N° 3'),(232,1,'Create','Effectuerconsultation',NULL,'2018-09-28 19:45:29','admin a enregistré la consultation N°15 du patient N° 2'),(233,1,'Create','Effectuerconsultation',NULL,'2018-09-29 15:52:19','admin a enregistré la consultation N°16 du patient N° 16'),(234,1,'Create','Effectuerconsultation',NULL,'2018-09-29 16:00:02','admin a enregistré la consultation N°17 du patient N° 3'),(235,1,'Create donnesoin',NULL,NULL,'2018-09-29 16:15:04','admin a enregistré les soins N°13 du patient N° 3'),(236,1,'Create','Effectuerconsultation',NULL,'2018-09-29 17:06:49','admin a enregistré la consultation N°18 du patient N° 2'),(237,1,'Create','Effectuerconsultation',NULL,'2018-09-29 17:09:22','admin a enregistré la consultation N°19 du patient N° 4'),(238,1,'Create donnesoin',NULL,NULL,'2018-09-29 17:10:50','admin a enregistré les soins N°14 du patient N° 4'),(239,1,'Create','Effectuerconsultation',NULL,'2018-09-25 17:27:45','admin a enregistré la consultation N°20 du patient N° 5'),(240,1,'Create demanderanalyse',NULL,NULL,'2018-09-25 18:05:27','admin a enregistré les demande analyse N°12 du patient N° 1'),(241,1,'Create demanderanalyse',NULL,NULL,'2018-09-25 18:19:09','admin a enregistré les demande analyse N°13 du patient N° 2'),(242,1,'Create demanderanalyse',NULL,NULL,'2018-09-29 18:33:53','admin a enregistré les demande analyse N°14 du patient N° 5'),(243,1,'Create','Effectuerconsultation',NULL,'2018-09-30 16:53:44','admin a enregistré la consultation N°1 du patient N° 2'),(244,1,'Create donnesoin',NULL,NULL,'2018-09-30 17:12:50','admin a enregistré les soins N°1 du patient N° 3'),(245,1,'Create donnesoin',NULL,NULL,'2018-09-30 19:34:24','admin a enregistré les soins N°3 du patient N° 2'),(246,1,'Create demanderanalyse',NULL,NULL,'2018-09-30 20:03:51','admin a enregistré les demande analyse N°15 du patient N° 9'),(247,1,'Create','Effectuerconsultation',NULL,'2018-09-30 21:18:04','admin a enregistré la consultation N°2 du patient N° 1'),(248,1,'Create donnesoin',NULL,NULL,'2018-09-30 21:18:44','admin a enregistré les soins N°4 du patient N° 1'),(249,1,'Create demanderanalyse',NULL,NULL,'2018-09-30 21:20:14','admin a enregistré les demande analyse N°16 du patient N° 1'),(250,1,'Create demanderanalyse',NULL,NULL,'2018-10-01 15:45:11','admin a enregistré les demande analyse N°17 du patient N° 4'),(251,1,'Log in',NULL,NULL,'2018-10-12 16:14:24','admin s\'est connecté(e)'),(252,1,'Create','Effectuerconsultation',NULL,'2018-10-13 15:40:15','admin a enregistré la consultation N°3 du patient N° 2'),(253,1,'Create donnesoin',NULL,NULL,'2018-10-13 15:40:40','admin a enregistré les soins N°5 du patient N° 2'),(254,1,'Create','Effectuerconsultation',NULL,'2018-10-13 15:40:58','admin a enregistré la consultation N°4 du patient N° 2'),(255,1,'Create','Effectuerconsultation',NULL,'2018-10-13 15:43:02','admin a enregistré la consultation N°5 du patient N° 1'),(256,1,'Create','Effectuerconsultation',NULL,'2018-10-13 16:07:58','admin a enregistré la consultation N°6 du patient N° 4'),(257,1,'Log out',NULL,NULL,'2018-10-13 16:14:37','admin s\'est déconnecté(e)'),(258,1,'Log in',NULL,NULL,'2018-10-13 16:29:53','admin s\'est connecté(e)'),(259,1,'Log out',NULL,NULL,'2018-10-13 16:40:22','admin s\'est déconnecté(e)'),(260,1,'Log in',NULL,NULL,'2018-10-13 16:40:33','admin s\'est connecté(e)'),(261,1,'Create','Effectuerconsultation',NULL,'2018-10-13 16:42:28','admin a enregistré la consultation N°7 du patient N° 6'),(262,1,'Create donnesoin',NULL,NULL,'2018-10-13 16:53:10','admin a enregistré les soins N°6 du patient N° 6'),(263,1,'Create Ordonnance',NULL,NULL,'2018-10-13 17:00:09','admin a enregistré l\'ordonnance N°5 du patient N° 1'),(264,1,'Create demanderanalyse',NULL,NULL,'2018-10-13 17:01:06','admin a enregistré les demande analyse N°18 du patient N° 6'),(265,1,'Update Patient',NULL,NULL,'2018-10-16 15:31:51','admin a modifié le patient N° 5'),(266,1,'Log in',NULL,NULL,'2018-10-19 09:00:16','admin s\'est connecté(e)'),(267,1,'Create','Effectuerconsultation',NULL,'2018-10-19 18:37:06','admin a enregistré la consultation N°8 du patient N° 2'),(268,1,'Create donnesoin',NULL,NULL,'2018-10-19 18:37:30','admin a enregistré les soins N°7 du patient N° 2'),(269,1,'Log out',NULL,NULL,'2018-10-23 10:23:56','admin s\'est déconnecté(e)'),(270,22,'Log in',NULL,NULL,'2018-10-23 10:24:05','simlea s\'est connecté(e)'),(271,22,'Log out',NULL,NULL,'2018-10-23 10:24:11','simlea s\'est déconnecté(e)'),(272,1,'Log in',NULL,NULL,'2018-10-23 10:26:55','admin s\'est connecté(e)'),(273,1,'Log out',NULL,NULL,'2018-10-23 10:26:59','admin s\'est déconnecté(e)'),(274,1,'Log in',NULL,NULL,'2018-10-23 10:27:07','admin s\'est connecté(e)'),(275,1,'Log out',NULL,NULL,'2018-10-23 10:27:50','admin s\'est déconnecté(e)'),(276,2,'Log in',NULL,NULL,'2018-10-23 10:28:26','igbataou s\'est connecté(e)'),(277,2,'Create demanderanalyse',NULL,NULL,'2018-10-23 10:48:52','igbataou a enregistré les demande analyse N°19 du patient N° 2'),(278,1,'Log in',NULL,NULL,'2018-10-23 13:35:30','admin s\'est connecté(e)'),(279,2,'Create demanderanalyse',NULL,NULL,'2018-10-23 15:59:32','igbataou a enregistré les demande analyse N°20 du patient N° 4'),(280,2,'Create demanderanalyse',NULL,NULL,'2018-10-24 09:39:06','igbataou a enregistré les demande analyse N°21 du patient N° 4'),(281,2,'Log out',NULL,NULL,'2018-10-24 09:49:58','igbataou s\'est déconnecté(e)'),(282,1,'Log in',NULL,NULL,'2018-10-24 09:50:06','admin s\'est connecté(e)'),(283,1,'Log in',NULL,NULL,'2018-10-29 14:31:54','admin s\'est connecté(e)'),(284,1,'Log in',NULL,NULL,'2018-10-30 16:43:46','admin s\'est connecté(e)'),(285,1,'Create demanderanalyse',NULL,NULL,'2018-10-31 10:49:51','admin a enregistré les demande analyse N°22 du patient N° 3'),(286,1,'Log in',NULL,NULL,'2018-11-02 08:59:11','admin s\'est connecté(e)'),(287,1,'Log in',NULL,NULL,'2018-11-12 16:48:17','admin s\'est connecté(e)'),(288,1,'Create Examen gynecologuique',NULL,NULL,'2018-11-13 13:37:18','admin a créé l\'examen N° 4'),(289,1,'Log in',NULL,NULL,'2018-11-13 19:26:50','admin s\'est connecté(e)'),(290,1,'Create','Effectuerconsultation',NULL,'2018-11-14 17:23:17','admin a enregistré la consultation N°9 du patient N° 6'),(291,1,'Update effectuerconsultation',NULL,NULL,'2018-11-14 17:23:38','admin a modifié la consultation N°9 du patient N° 6'),(292,1,'Create Examen gynecologuique',NULL,NULL,'2018-11-15 11:37:49','admin a créé l\'examen N° 5'),(293,1,'Create demanderanalyse',NULL,NULL,'2018-11-15 18:09:09','admin a enregistré les demande analyse N°23 du patient N° 2'),(294,1,'Log in',NULL,NULL,'2018-12-14 18:14:01','admin s\'est connecté(e)'),(295,1,'Create Ordonnance',NULL,NULL,'2018-12-14 18:24:32','admin a enregistré l\'ordonnance N°6 du patient N° 1'),(296,1,'Read Historique',NULL,NULL,'2018-12-14 18:25:41','admin a consulté la liste des historiques'),(297,1,'Read Historique',NULL,NULL,'2018-12-14 18:26:19','admin a consulté la liste des historiques'),(298,1,'Read Historique',NULL,NULL,'2018-12-14 18:26:24','admin a consulté la liste des historiques'),(299,1,'Read Historique',NULL,NULL,'2018-12-14 18:26:28','admin a consulté la liste des historiques'),(300,1,'Create donnesoin',NULL,NULL,'2018-12-14 18:39:09','admin a enregistré les soins N°8 du patient N° 2'),(301,1,'Log out',NULL,NULL,'2018-12-14 18:44:15','admin s\'est déconnecté(e)'),(302,1,'Log in',NULL,NULL,'2018-12-14 18:44:44','admin s\'est connecté(e)'),(303,1,'Log out',NULL,NULL,'2018-12-14 18:44:58','admin s\'est déconnecté(e)'),(304,1,'Log in',NULL,NULL,'2018-12-14 18:45:31','admin s\'est connecté(e)'),(305,1,'Log out',NULL,NULL,'2018-12-14 18:50:53','admin s\'est déconnecté(e)'),(306,1,'Log in',NULL,NULL,'2018-12-15 00:20:00','admin s\'est connecté(e)'),(307,1,'Log in',NULL,NULL,'2018-12-17 10:05:18','admin s\'est connecté(e)'),(308,1,'Log out',NULL,NULL,'2018-12-18 00:43:58','admin s\'est déconnecté(e)'),(309,1,'Log in',NULL,NULL,'2018-12-18 00:44:07','admin s\'est connecté(e)'),(310,1,'Log in',NULL,NULL,'2018-12-18 11:28:07','admin s\'est connecté(e)');

/*Table structure for table `hospitalisation` */

DROP TABLE IF EXISTS `hospitalisation`;

CREATE TABLE `hospitalisation` (
  `idhospitalisation` int(11) NOT NULL,
  `libhospitalisation` varchar(150) NOT NULL,
  PRIMARY KEY (`idhospitalisation`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `hospitalisation` */

insert  into `hospitalisation`(`idhospitalisation`,`libhospitalisation`) values (1,'maux de ventre'),(2,'maux de ventre'),(3,'maux de ventre'),(4,'paludisme'),(5,'paludisme'),(6,'Anémie'),(7,'syndrome non infectueux'),(8,'Paludisme grave'),(9,'maux de ventre'),(10,'maux de ventre'),(11,'Paludisme grave'),(12,'maux de ventre'),(13,'maux de ventre'),(14,'maux de ventre'),(15,'Paludisme grave'),(16,'maux de ventre'),(17,'maux de ventre'),(18,'15200');

/*Table structure for table `hospitaliser` */

DROP TABLE IF EXISTS `hospitaliser`;

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
  `tauxassurance` int(10) DEFAULT NULL,
  `coutbrut` int(11) DEFAULT NULL,
  `coutassurance` int(11) DEFAULT NULL,
  PRIMARY KEY (`idpatient`,`idhospitalisation`,`idchbre`),
  KEY `fk_hospitaliser2` (`idhospitalisation`),
  KEY `fk_hospitaliser3` (`idchbre`),
  CONSTRAINT `fk_hospitaliser` FOREIGN KEY (`idpatient`) REFERENCES `patient` (`idpatient`),
  CONSTRAINT `fk_hospitaliser2` FOREIGN KEY (`idhospitalisation`) REFERENCES `hospitalisation` (`idhospitalisation`),
  CONSTRAINT `fk_hospitaliser3` FOREIGN KEY (`idchbre`) REFERENCES `chambre` (`idchbre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `hospitaliser` */

insert  into `hospitaliser`(`idpatient`,`idhospitalisation`,`idchbre`,`datedebut`,`datefin`,`payer`,`payerassuran`,`indigeant`,`autorisation`,`echeance`,`coutunitchbre`,`tauxassurance`,`coutbrut`,`coutassurance`) values (1,6,9,'2018-06-07','2018-06-08',1,1,0,0,'0000-00-00',3125,75,12500,9375),(1,16,1,'2018-09-28','2018-10-01',1,1,0,0,'0000-00-00',1875,75,7500,5625),(2,3,2,'2018-06-06','2018-09-30',1,1,0,0,'0000-00-00',5000,0,NULL,NULL),(2,5,5,'2018-06-07','2018-09-30',1,1,0,0,'0000-00-00',2499,80,12500,10000),(2,13,29,'2018-09-24','2018-09-26',1,1,0,0,'0000-00-00',5999,80,30000,24000),(2,15,2,'2018-09-28','2018-09-30',1,1,0,0,'0000-00-00',999,80,5000,4000),(2,18,34,'2018-12-15',NULL,0,0,0,0,'0000-00-00',1799,80,9000,7200),(3,4,5,'2018-06-07',NULL,0,0,0,0,'0000-00-00',3750,70,12500,8750),(5,12,5,'2018-09-24','2018-09-25',1,0,0,0,'0000-00-00',2499,80,12500,10000),(6,7,35,'2018-07-20','2018-07-19',1,1,0,0,'0000-00-00',2799,80,14000,11200),(6,17,1,'2018-10-12','2018-10-13',1,1,0,0,'0000-00-00',1499,80,7500,6000),(7,9,3,'2018-08-02','2018-08-03',0,0,0,0,'0000-00-00',2499,80,12500,10000),(8,8,29,'2018-08-02','2018-08-02',1,1,0,0,'0000-00-00',5999,80,30000,24000),(8,14,3,'2018-09-25','2018-09-26',1,1,0,0,'0000-00-00',2499,80,12500,10000),(13,11,9,'2018-09-24','2018-09-26',1,1,0,0,'0000-00-00',3125,75,12500,9375),(15,10,1,'2018-09-24','2018-09-24',0,0,0,0,'0000-00-00',7500,0,7500,0);

/*Table structure for table `maitriser` */

DROP TABLE IF EXISTS `maitriser`;

CREATE TABLE `maitriser` (
  `idspecialite` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  PRIMARY KEY (`idspecialite`,`id`),
  KEY `fk_maitriser2` (`id`),
  CONSTRAINT `fk_maitriser` FOREIGN KEY (`idspecialite`) REFERENCES `specialite` (`idspecialite`),
  CONSTRAINT `fk_maitriser2` FOREIGN KEY (`id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `maitriser` */

/*Table structure for table `natureprelev` */

DROP TABLE IF EXISTS `natureprelev`;

CREATE TABLE `natureprelev` (
  `idnature` int(11) NOT NULL,
  `libnature` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`idnature`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `natureprelev` */

insert  into `natureprelev`(`idnature`,`libnature`) values (1,'Sang'),(2,'Urine'),(3,'Autre');

/*Table structure for table `ordonnance` */

DROP TABLE IF EXISTS `ordonnance`;

CREATE TABLE `ordonnance` (
  `idordonnance` int(11) NOT NULL,
  `idpatient` int(11) NOT NULL,
  `observation` varchar(255) DEFAULT NULL,
  `datecreation` datetime NOT NULL,
  `datemodification` datetime DEFAULT NULL,
  `iduser` int(11) NOT NULL,
  PRIMARY KEY (`idordonnance`),
  KEY `fk_attribuer` (`idpatient`),
  CONSTRAINT `fk_attribuer` FOREIGN KEY (`idpatient`) REFERENCES `patient` (`idpatient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `ordonnance` */

insert  into `ordonnance`(`idordonnance`,`idpatient`,`observation`,`datecreation`,`datemodification`,`iduser`) values (1,1,'','2018-05-13 20:44:42',NULL,1),(2,1,'','2018-05-13 20:46:05',NULL,1),(3,3,'','2018-07-20 17:23:54','2018-07-20 17:26:57',1),(4,8,'','2018-08-02 17:09:44',NULL,1),(5,6,'','2018-10-13 17:00:09',NULL,1),(6,2,'A prendre rigoureusement','2018-12-14 18:24:31',NULL,1);

/*Table structure for table `parametrepatient` */

DROP TABLE IF EXISTS `parametrepatient`;

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
  `datemodification` datetime DEFAULT NULL,
  PRIMARY KEY (`idparametre`),
  KEY `fk_lier` (`idpatient`),
  CONSTRAINT `fk_lier` FOREIGN KEY (`idpatient`) REFERENCES `patient` (`idpatient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `parametrepatient` */

insert  into `parametrepatient`(`idparametre`,`idpatient`,`tention`,`temperature`,`poids`,`nbreenfant`,`dateprelev`,`pouls`,`taille`,`etatgeneral`,`muqueuses`,`coeur`,`appdigest`,`ddr`,`autrappareil`,`datecreation`,`datemodification`) values (1,7,'118/68',37,60,NULL,'0000-00-00 00:00:00','80','150',NULL,NULL,NULL,NULL,NULL,NULL,'2018-08-01 15:55:03',NULL),(2,8,'125/75',39,102,NULL,'0000-00-00 00:00:00','99','180',NULL,NULL,NULL,NULL,NULL,NULL,'2018-08-02 16:32:55',NULL),(3,5,'13/7',37.5,58,NULL,'0000-00-00 00:00:00','22','178',NULL,NULL,NULL,NULL,NULL,NULL,'2018-08-10 17:28:17',NULL);

/*Table structure for table `patient` */

DROP TABLE IF EXISTS `patient`;

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
  `tauxassu` int(3) unsigned DEFAULT '0',
  PRIMARY KEY (`idpatient`),
  KEY `fk_avoir1` (`idassurance`),
  CONSTRAINT `fk_avoir1` FOREIGN KEY (`idassurance`) REFERENCES `assurance` (`idassurance`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `patient` */

insert  into `patient`(`idpatient`,`idassurance`,`nompatient`,`prenompatient`,`photopatient`,`datenaisspatient`,`age`,`sexpatient`,`tel1patient`,`tel2patient`,`proffesionpatient`,`statutmatripatient`,`gsphpatient`,`personneaprevenir`,`datecreation`,`datemodification`,`tauxassu`) values (1,2,'DEGUE','akouvi',NULL,'1998-11-11',19,'M','90112233','','','Célibataire','O+','','2018-05-11 15:06:32',NULL,75),(2,1,'HLOMEGBE','Mariam',NULL,'1994-06-05',23,'F','91223366','98756321','assistante médicale ','Marié','O+','','2018-05-13 09:42:23',NULL,80),(3,1,'BEMA ','GADO',NULL,'1997-11-11',20,'M','97979797','99886633','Chef d\'entreprise','Marié avec enfants','O+','','2018-05-13 09:47:54',NULL,70),(4,7,'DERMANE','TAIBA',NULL,'2000-10-10',17,'F','96332211','','','Célibataire','B-','','2018-05-15 14:47:03',NULL,80),(5,5,'AMAKA','ibro',NULL,'1999-07-04',19,'M','97885522','','','Célibataire','O+','','2018-07-19 11:36:16','2018-10-16 15:31:51',80),(6,1,'KODJO','KOKOU',NULL,'1990-12-31',27,'M','98556633','','','','','','2018-07-19 14:41:45',NULL,80),(7,1,'bawa','barakate',NULL,'1997-12-31',20,'F','90181818','','ETUDIANTE','Marié','O+','adam inoussa','2018-08-01 15:37:41','2018-08-01 15:52:34',80),(8,7,'tignonkpa','amélé',NULL,'1992-04-27',26,'F','90010200','90999999','Sage-Femme','Marié avec enfants','O+','Amédéka Déla','2018-08-02 16:01:42','2018-08-02 16:17:31',80),(9,NULL,'amadou','kondo',NULL,'2018-08-03',NULL,'','','','','','','','2018-08-03 18:47:47',NULL,0),(10,NULL,'ALAWEH','azia',NULL,'2018-08-03',NULL,'','','','','','','','2018-08-03 19:02:00',NULL,0),(11,NULL,'bamok','koko',NULL,'2018-08-03',NULL,'','','','','','','','2018-08-03 19:06:26',NULL,0),(12,NULL,'samata','adjo',NULL,'2018-08-03',NULL,'','','','','','','','2018-08-03 19:12:53',NULL,0),(13,6,'akapkovi','komla',NULL,'2018-08-03',NULL,'','','','','','','','2018-08-03 19:14:20',NULL,75),(14,NULL,'GNITOU','Komla',NULL,'2018-08-12',25,'M','','','','','','','2018-08-12 12:32:20',NULL,0),(15,NULL,'agbanavon','martin',NULL,NULL,29,'','','','','','','','2018-08-12 12:34:20',NULL,0),(16,6,'Edeh','chadaa',NULL,'1992-12-31',25,'M','','','','','','','2018-08-12 12:35:18','2018-09-10 17:43:28',75);

/*Table structure for table `patient2` */

DROP TABLE IF EXISTS `patient2`;

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
  `tauxassu` int(10) unsigned zerofill DEFAULT '0000000000',
  PRIMARY KEY (`idpatient`),
  KEY `fk_avoir1` (`idassurance`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `patient2` */

/*Table structure for table `payement` */

DROP TABLE IF EXISTS `payement`;

CREATE TABLE `payement` (
  `idpayement` int(11) NOT NULL,
  `idassurance` int(11) NOT NULL,
  `idpatient` int(11) NOT NULL,
  `refpayement` varchar(150) NOT NULL,
  `montantrecu` decimal(10,0) NOT NULL,
  `montantasurance` decimal(10,0) DEFAULT NULL,
  `montanttotal` decimal(10,0) NOT NULL,
  `datepayement` date NOT NULL,
  `iduser` int(11) NOT NULL,
  `statutassur` int(11) NOT NULL,
  `naturepayement` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idpayement`),
  KEY `fk_concerner` (`idpatient`),
  KEY `fk_concerner1` (`idassurance`) USING BTREE,
  CONSTRAINT `fk_concerner` FOREIGN KEY (`idpatient`) REFERENCES `patient` (`idpatient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `payement` */

insert  into `payement`(`idpayement`,`idassurance`,`idpatient`,`refpayement`,`montantrecu`,`montantasurance`,`montanttotal`,`datepayement`,`iduser`,`statutassur`,`naturepayement`) values (1,0,2,'payement N° 1','6200',NULL,'0','2018-09-30',1,1,NULL),(2,0,3,'payement N° 2','7335',NULL,'0','2018-09-30',1,1,NULL),(3,0,2,'payement N° 3','874884',NULL,'0','2018-09-30',1,1,NULL),(4,0,2,'payement N° 4','3524336',NULL,'0','2018-09-30',1,2,NULL),(5,0,2,'payement N° 5','5997',NULL,'0','2018-09-30',1,1,NULL),(6,0,2,'payement N° 6','23988',NULL,'0','2018-09-30',1,2,NULL),(7,0,3,'payement N° 7','17115',NULL,'0','2018-09-30',1,2,NULL),(8,0,9,'payement N° 8','4000',NULL,'0','2018-09-30',1,1,NULL),(9,0,1,'payement N° 9','18864',NULL,'0','2018-09-30',1,1,NULL),(10,0,1,'payement N° 10','56592',NULL,'0','2018-09-30',1,2,NULL),(11,0,2,'payement N° 11','5700',NULL,'0','2018-10-13',1,1,NULL),(12,0,6,'payement N° 12','1500',NULL,'0','2018-10-13',1,1,NULL),(13,0,6,'payement N° 13','6998',NULL,'0','2018-10-13',1,1,NULL),(14,0,6,'payement N° 14','6998',NULL,'0','2018-10-13',1,1,NULL),(15,0,6,'payement N° 15','34000','33992','0','2018-10-19',1,2,NULL),(16,0,4,'payement N° 16','13000','12400','0','2018-10-19',1,2,NULL),(17,0,13,'payement N° 17','31276','31275','0','2018-10-19',1,2,NULL),(18,0,2,'payement N° 18','4000',NULL,'0','2018-10-19',1,1,NULL),(19,0,2,'payement N° 19','38800','38800','0','2018-10-19',1,2,NULL),(20,0,4,'payement N° 20','7700',NULL,'0','2018-11-05',1,1,NULL),(21,0,4,'payement N° 21','6900',NULL,'0','2018-11-05',1,1,NULL),(22,0,4,'payement N° 22','6100',NULL,'0','2018-11-05',1,1,NULL),(23,0,4,'payement N° 23','6100',NULL,'0','2018-11-05',1,1,NULL),(24,0,4,'payement N° 24','18400',NULL,'0','2018-11-14',1,2,'Payement Assurance'),(25,0,5,'payement N° 25','800',NULL,'0','2018-11-14',1,1,'Payement Assuré'),(26,0,3,'payement N° 26','4500',NULL,'0','2018-12-17',1,1,NULL);

/*Table structure for table `payementass` */

DROP TABLE IF EXISTS `payementass`;

CREATE TABLE `payementass` (
  `idpayement` int(11) NOT NULL,
  `idassurance` int(11) NOT NULL,
  `idpatient` int(11) NOT NULL,
  `refpayement` varchar(150) NOT NULL,
  `montantrecu` decimal(10,0) NOT NULL,
  `montantasurance` decimal(10,0) DEFAULT NULL,
  `montanttotal` decimal(10,0) DEFAULT NULL,
  `datepayement` date NOT NULL,
  `iduser` int(11) NOT NULL,
  `statutassur` int(11) NOT NULL,
  PRIMARY KEY (`idpayement`),
  KEY `fk_concerner` (`idpatient`),
  KEY `fk_concerner1` (`idassurance`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `payementass` */

/*Table structure for table `prelevement` */

DROP TABLE IF EXISTS `prelevement`;

CREATE TABLE `prelevement` (
  `idprelevement` int(11) NOT NULL,
  `preleveur` varchar(150) DEFAULT NULL,
  `idpatient` int(11) DEFAULT NULL,
  `coutanalyse` float NOT NULL,
  `dateanalyse` datetime DEFAULT NULL,
  `payer` int(11) NOT NULL,
  `statutresul` int(11) NOT NULL,
  `payerassuran` int(11) NOT NULL,
  `indigeant` int(11) NOT NULL,
  `dateprelev` varchar(20) DEFAULT NULL,
  `datereception` varchar(20) DEFAULT NULL,
  `conforme` varchar(150) DEFAULT NULL,
  `Urgent` varchar(25) DEFAULT NULL,
  `idnature` int(11) DEFAULT NULL,
  `autre` varchar(255) DEFAULT NULL,
  `idaspectprelevement` int(11) DEFAULT NULL,
  `infoPrelevement` varchar(255) DEFAULT NULL,
  `idanalysemedicale` int(11) DEFAULT NULL,
  `iddemandeanalyse` int(11) DEFAULT NULL,
  PRIMARY KEY (`idprelevement`),
  KEY `FK_prelevement_idnature` (`idnature`),
  KEY `FK_prelevement_idaspectprelevement` (`idaspectprelevement`),
  KEY `FK_prelevement_idpatient` (`idpatient`),
  KEY `FK_prelevement_idanalysemedicale` (`idanalysemedicale`),
  KEY `FK_prelevement_iddemandeanalyse` (`iddemandeanalyse`),
  CONSTRAINT `FK_prelevement_idanalysemedicale` FOREIGN KEY (`idanalysemedicale`) REFERENCES `analysemedicale` (`idanalysemedicale`),
  CONSTRAINT `FK_prelevement_idaspectprelevement` FOREIGN KEY (`idaspectprelevement`) REFERENCES `aspectprelevement` (`idaspectprelevement`),
  CONSTRAINT `FK_prelevement_iddemandeanalyse` FOREIGN KEY (`iddemandeanalyse`) REFERENCES `demanderanalyse` (`iddemandeanalyse`),
  CONSTRAINT `FK_prelevement_idnature` FOREIGN KEY (`idnature`) REFERENCES `natureprelev` (`idnature`),
  CONSTRAINT `FK_prelevement_idpatient` FOREIGN KEY (`idpatient`) REFERENCES `patient` (`idpatient`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `prelevement` */

insert  into `prelevement`(`idprelevement`,`preleveur`,`idpatient`,`coutanalyse`,`dateanalyse`,`payer`,`statutresul`,`payerassuran`,`indigeant`,`dateprelev`,`datereception`,`conforme`,`Urgent`,`idnature`,`autre`,`idaspectprelevement`,`infoPrelevement`,`idanalysemedicale`,`iddemandeanalyse`) values (2,'sama',1,2000,'2018-07-10 10:21:00',1,0,1,0,'2018-07-06 09:50:06','2018-07-06 14:50:04',NULL,'',1,'',1,'Veineux , ',5,1),(3,'SENA',1,1000,'2018-07-10 10:21:00',1,0,1,0,'2018-07-20 14:10:15','2018-07-06 14:50:04',NULL,'OUI',1,'',1,'A jeun , Veineux , ',4,1),(4,'abou',1,4000,'2018-07-10 10:21:00',1,0,1,0,'2018-07-06 09:30:04','2018-07-06 13:00:06',NULL,'NON',2,'',1,'Capillaire , ',8,1),(5,'sama',3,3000,'2018-07-13 11:31:23',1,1,1,0,'2018-07-13 11:30:01','2018-07-13 12:30:01',NULL,'NON',1,'',1,'Post prandial , ',14,3),(6,'rachide',3,5000,'2018-07-13 11:31:23',1,0,1,0,'2018-07-06 09:30:04','2018-07-06 13:00:06',NULL,'OUI',1,'',1,'Veineux , ',22,3),(7,'abou',2,1000,'2018-07-10 16:54:59',1,0,1,0,'2018-07-06 09:50:06','2018-07-06 14:50:04',NULL,'OUI',3,'bbbb',1,'Veineux , Post prandial , ',2,2),(24,'Tola',8,1000,'2018-08-02 17:25:19',1,0,1,0,'2018-08-09 11:30:31','2018-08-09 00:00:00',NULL,'NON',1,'',1,'A jeun , ',2,6),(31,'abou',8,4000,'2018-08-02 17:25:19',1,1,1,0,'05/08/2018 10:45','06/08/2018 07:00',NULL,'OUI',1,'',1,'A jeun , ',8,6),(32,'nnnnnnnn',8,2000,'2018-08-02 17:25:19',1,0,1,0,'08/08/2018 08:05','08/08/2018 10:50',NULL,'NON',1,'',1,'A jeun , ',62,6),(33,'rachide',7,4000,'2018-08-02 17:17:04',0,0,0,0,'08/08/2018 10:30','09-Aou-2018 11:31',NULL,'NON',3,'salivaire',1,'Veineux , ',24,5),(34,'Talatou',7,4000,'2018-08-01 16:50:03',0,0,0,0,'08/08/2018 10:30','09/12/2018 11:31',NULL,'NON',1,'',1,'A jeun , ',8,4),(35,'tola',7,1200,'2018-08-01 16:50:03',0,0,0,0,'07/12/2018 09:25','08/12/2018 00:00',NULL,'OUI',1,'sels',1,'A jeun , ',3,4),(36,'tola',8,2000,'2018-08-02 17:25:19',1,0,1,0,'08/08/2018 10:30','08/12/2018 11:00',NULL,'OUI',1,'',1,'A jeun , ',61,6),(37,'SENA',7,1000,'2018-08-01 16:50:03',0,0,0,0,'06/08/2018 10:37','07/12/2018 05:50',NULL,'OUI',2,'',1,'A jeun , ',4,4),(38,'SENA',7,5000,'2018-08-01 16:50:03',0,0,0,0,'06/08/2018 10:37','31/12/1899 00:00',NULL,'OUI',1,'',1,'A jeun , ',22,4),(39,'sama',13,1000,'2018-08-07 11:15:46',1,0,1,0,'06/08/2018 10:37','07/12/2018 15:00',NULL,'NON',1,'',1,'A jeun , ',4,7),(40,'sama',13,1200,'2018-08-07 11:15:46',1,0,1,0,'06/08/2018 10:37','08/12/2018 14:05',NULL,'NON',1,'',1,'A jeun , ',3,7),(41,'Razak',13,2000,'2018-08-07 11:15:46',1,0,1,0,'07/08/2018 09:25','09/08/2018 09:25',NULL,'OUI',1,'',1,'A jeun , ',5,7),(42,'nnnnnnnn',8,2000,'2018-08-02 17:25:19',1,0,1,0,'05/09/2018 10:50','06/09/2018 11:55',NULL,'OUI',1,'',1,'Veineux , ',63,6),(43,'rachide',16,4000,'2018-09-06 11:54:44',1,0,1,0,'06/09/2018 10:45','06/09/2018 11:50',NULL,'OUI',1,'',1,'Post prandial , ',96,8),(44,'rachide',3,4000,'2018-07-13 11:31:23',1,1,1,0,'11/09/2018 17:30','11/09/2018 18:30',NULL,'',1,'',1,'A jeun , ',8,3),(45,'SENA',12,4000,'2018-09-21 15:09:07',1,0,0,0,'19/08/2018 10:30','20/09/2018 15:05',NULL,'OUI',1,'',1,'Veineux , ',96,9),(46,'SENA',12,5000,'2018-09-21 15:09:07',1,0,0,0,'19/08/2018 10:30','20/09/2018 15:05',NULL,'OUI',1,'',1,'Veineux , ',22,9),(47,'rachide',15,4000,'2018-09-21 17:48:04',1,0,0,0,'14/09/2018 14:45','15/09/2018 17:20',NULL,'',1,'',1,'Post prandial , ',95,10),(48,'rachide',5,4000,'2018-09-22 06:21:58',1,0,0,0,'22/09/2018 06:20','22/09/2018 07:00',NULL,'OUI',2,'',1,'Veineux , ',8,11),(49,'rachide',5,4000,'2018-09-22 06:21:58',1,0,0,0,'22/09/2018 06:20','22/09/2018 07:00',NULL,'OUI',2,'',1,'Veineux , ',16,11),(50,'nnnnnnnn',1,4000,'2018-09-25 18:05:27',1,0,1,0,'25/09/2018 17:05','25/09/2018 18:05',NULL,'',1,'',1,'Veineux , ',96,12),(51,'Razak',2,4000,'2018-09-25 18:19:09',1,0,1,0,'25/09/2018 18:15','25/09/2018 18:20',NULL,'OUI',1,'',1,'A jeun , ',98,13),(52,'sama',5,4000,'2018-09-29 18:33:53',1,1,0,0,'06/09/2018 10:30','29/09/2018 18:30',NULL,'',1,'',1,'Capillaire , ',96,14),(53,'rachide',9,4000,'2018-09-30 20:03:50',0,0,0,0,'08/08/2018 10:30','09/12/2018 14:40',NULL,'',1,'',1,'A jeun , ',8,15),(54,'nnnnnnnn',1,2000,'2018-09-30 21:20:14',0,0,1,0,'29/09/2018 21:20','30/09/2018 22:20',NULL,'OUI',1,'',1,'Veineux , ',5,16),(55,'abou',4,4000,'2018-10-01 15:45:11',1,0,1,0,'08/08/2018 10:30','08/12/2018 00:00',NULL,'',1,'',1,'Veineux , ',8,17),(56,'abou',4,4000,'2018-10-01 15:45:11',1,1,1,0,'08/08/2018 10:30','08/12/2018 00:00',NULL,'',1,'',1,'Veineux , ',8,17),(57,'SENA',6,4000,'2018-10-13 17:01:06',1,1,1,0,'12/10/2018 17:00','13/10/2018 17:00',NULL,'OUI',2,'',1,'Veineux , ',8,18),(58,'yyyy',2,4000,'2018-10-23 10:48:51',0,1,0,0,'24/10/2018 10:50','24/10/2018 11:50',NULL,'OUI',1,'',1,'Veineux , ',8,19),(59,'sama',2,1200,'2018-07-10 16:54:59',0,1,0,0,'08/08/2018 10:30','11/09/2018 18:30',NULL,'OUI',1,'',1,'Veineux , ',3,2),(60,'',2,3000,'2018-07-10 16:54:59',0,1,0,0,'08/08/2018 10:30','20/09/2018 15:05',NULL,'',1,'',1,'Veineux , ',14,2),(61,'abou',4,1000,'2018-10-23 15:59:32',1,1,1,0,'19/08/2018 10:30','15/09/2018 17:20',NULL,'',1,'',1,'Veineux , ',2,20),(62,'SENA',4,4000,'2018-10-24 09:39:06',1,0,1,0,'08/08/2018 10:30','08/12/2018 00:00',NULL,'NON',1,'',1,'Veineux , ',8,21),(63,'SENA',4,5000,'2018-10-24 09:39:06',1,0,1,0,'08/08/2018 10:30','11/09/2018 18:30',NULL,'OUI',1,'',1,'Veineux , ',90,21);

/*Table structure for table `produit` */

DROP TABLE IF EXISTS `produit`;

CREATE TABLE `produit` (
  `idproduit` int(11) NOT NULL,
  `libproduit` varchar(255) NOT NULL,
  `prixproduit` decimal(10,0) NOT NULL,
  `assure` tinyint(1) NOT NULL,
  PRIMARY KEY (`idproduit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `produit` */

insert  into `produit`(`idproduit`,`libproduit`,`prixproduit`,`assure`) values (1,'Arthémether','1500',0),(2,'Paracetamol','1000',0),(3,'Cofantrine','2000',0),(4,'Ciproflaxacin','4500',0),(5,'Métronidazol','2500',0);

/*Table structure for table `profil` */

DROP TABLE IF EXISTS `profil`;

CREATE TABLE `profil` (
  `idprof` int(11) NOT NULL AUTO_INCREMENT,
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
  `createdemandanal` int(10) unsigned DEFAULT NULL,
  `updatedemandanal` int(10) unsigned DEFAULT NULL,
  `readdemandanal` int(10) unsigned DEFAULT NULL,
  `deletedemandanal` int(10) unsigned DEFAULT NULL,
  `printdemandanal` int(10) unsigned DEFAULT NULL,
  `createprelev` int(10) unsigned DEFAULT NULL,
  `readprelev` int(10) unsigned DEFAULT NULL,
  `updateprelev` int(10) unsigned DEFAULT NULL,
  `deleteprelev` int(10) unsigned DEFAULT NULL,
  `printprelev` int(10) unsigned DEFAULT NULL,
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
  `createdecaiss` int(11) DEFAULT '0',
  `readdecaiss` int(11) DEFAULT '0',
  `updatedecaiss` int(11) DEFAULT '0',
  `deletedecaiss` int(11) DEFAULT '0',
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
  `gesparam` int(11) DEFAULT NULL,
  PRIMARY KEY (`idprof`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `profil` */

insert  into `profil`(`idprof`,`nomprof`,`gespat`,`createpat`,`createparampat`,`readpat`,`updatepat`,`deletepat`,`gescons`,`createcons`,`updatecons`,`readcons`,`printcons`,`deletecons`,`geshos`,`createhos`,`updatehos`,`readhos`,`deletehos`,`printhos`,`gessoin`,`createsoin`,`updatesoin`,`readsoin`,`deletesoin`,`printsoin`,`gesord`,`createord`,`updateord`,`readord`,`printord`,`gesexamed`,`createexamed`,`updateexamed`,`readexamed`,`deleteexamed`,`gesana`,`createana`,`updateana`,`readana`,`deleteana`,`printana`,`createdemandanal`,`updatedemandanal`,`readdemandanal`,`deletedemandanal`,`printdemandanal`,`createprelev`,`readprelev`,`updateprelev`,`deleteprelev`,`printprelev`,`gesuser`,`createuser`,`updateuser`,`readuser`,`deleteuser`,`gescaisse`,`createpaye`,`readpaye`,`updatepaye`,`deletepaye`,`createdecaiss`,`readdecaiss`,`updatedecaiss`,`deletedecaiss`,`gesprofil`,`createprof`,`readprof`,`updateprof`,`deleteprof`,`gespharma`,`createachaprod`,`readachaprod`,`updateachaprod`,`deleteachaprod`,`gesetat`,`gesstat`,`gesparam`) values (1,'Administrateur',1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1),(2,'Medecin',1,1,1,1,1,0,1,1,1,1,1,0,1,1,1,1,0,1,1,1,1,1,0,1,1,1,1,1,0,1,1,1,1,0,1,0,0,1,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,0,0,0,0,NULL),(3,'Stagiaire',1,0,0,1,0,0,1,0,0,1,0,0,1,0,0,1,0,0,1,0,0,1,0,0,1,0,0,1,0,1,0,0,1,0,1,0,0,1,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,0,0,1,0,1,0,1,0,0,0,0,0,0,1,0,1,0,0,1,0,1,0,0,1,1,NULL),(4,'DOCTEUR',1,1,1,1,1,0,1,1,1,1,1,0,1,1,1,1,0,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,0,1,1,1,1,0,1,1,1,1,0,1,0,0,0,0,0,0,0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,1,0,0,1,1,1),(5,'INFIRMIER',1,1,1,1,1,0,1,1,1,1,1,0,1,1,1,1,0,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,0,1,0,0,1,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,0,0,0,0,NULL),(6,'SAGE FEMME',1,1,1,1,1,0,1,1,1,1,1,0,1,1,1,1,0,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,0,0,0,0,1,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,0,0,0,0,NULL),(7,'LABORATOIRE',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,1,1,1,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL),(8,'SECRETARIAT',1,1,0,1,1,0,1,1,1,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,1,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);

/*Table structure for table `recu` */

DROP TABLE IF EXISTS `recu`;

CREATE TABLE `recu` (
  `idrecu` int(11) NOT NULL,
  `refrecu` varchar(150) NOT NULL,
  `montantrecu` decimal(10,0) NOT NULL,
  `daterecu` datetime DEFAULT NULL,
  PRIMARY KEY (`idrecu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `recu` */

/*Table structure for table `reductionanalyse` */

DROP TABLE IF EXISTS `reductionanalyse`;

CREATE TABLE `reductionanalyse` (
  `idassurance` int(11) NOT NULL,
  `idsoustypeanalysemedicale` int(11) NOT NULL,
  `taux` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`idassurance`,`idsoustypeanalysemedicale`),
  KEY `fk_reductionanalyse2` (`idsoustypeanalysemedicale`),
  CONSTRAINT `fk_reductionanalyse` FOREIGN KEY (`idassurance`) REFERENCES `assurance` (`idassurance`),
  CONSTRAINT `fk_reductionanalyse2` FOREIGN KEY (`idsoustypeanalysemedicale`) REFERENCES `soustypeanalysemedicale` (`idsoustypeanalysemedicale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `reductionanalyse` */

/*Table structure for table `reductionchambre` */

DROP TABLE IF EXISTS `reductionchambre`;

CREATE TABLE `reductionchambre` (
  `idcategoriechbr` int(11) NOT NULL,
  `idassurance` int(11) NOT NULL,
  `taux` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`idcategoriechbr`,`idassurance`),
  KEY `fk_reductionchambre2` (`idassurance`),
  CONSTRAINT `fk_reductionchambre` FOREIGN KEY (`idcategoriechbr`) REFERENCES `categoriechambre` (`idcategoriechbr`),
  CONSTRAINT `fk_reductionchambre2` FOREIGN KEY (`idassurance`) REFERENCES `assurance` (`idassurance`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `reductionchambre` */

/*Table structure for table `reductionconsultation` */

DROP TABLE IF EXISTS `reductionconsultation`;

CREATE TABLE `reductionconsultation` (
  `idassurance` int(11) NOT NULL,
  `idtypeconsultation` int(11) NOT NULL,
  `taux` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`idassurance`,`idtypeconsultation`),
  KEY `fk_reductionconsultation2` (`idtypeconsultation`),
  CONSTRAINT `fk_reductionconsultation` FOREIGN KEY (`idassurance`) REFERENCES `assurance` (`idassurance`),
  CONSTRAINT `fk_reductionconsultation2` FOREIGN KEY (`idtypeconsultation`) REFERENCES `typeconsultation` (`idtypeconsultation`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `reductionconsultation` */

/*Table structure for table `reductionexamen` */

DROP TABLE IF EXISTS `reductionexamen`;

CREATE TABLE `reductionexamen` (
  `idtypeexamen` int(11) NOT NULL,
  `idassurance` int(11) NOT NULL,
  `taux` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`idtypeexamen`,`idassurance`),
  KEY `fk_reductionexamen2` (`idassurance`),
  CONSTRAINT `fk_reductionexamen` FOREIGN KEY (`idtypeexamen`) REFERENCES `typeexamen` (`idtypeexamen`),
  CONSTRAINT `fk_reductionexamen2` FOREIGN KEY (`idassurance`) REFERENCES `assurance` (`idassurance`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `reductionexamen` */

/*Table structure for table `reductionproduit` */

DROP TABLE IF EXISTS `reductionproduit`;

CREATE TABLE `reductionproduit` (
  `idproduit` int(11) NOT NULL,
  `idassurance` int(11) NOT NULL,
  `taux` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`idproduit`,`idassurance`),
  KEY `fk_reductionproduit2` (`idassurance`),
  CONSTRAINT `fk_reductionproduit` FOREIGN KEY (`idproduit`) REFERENCES `produit` (`idproduit`),
  CONSTRAINT `fk_reductionproduit2` FOREIGN KEY (`idassurance`) REFERENCES `assurance` (`idassurance`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `reductionproduit` */

/*Table structure for table `reductionsoin` */

DROP TABLE IF EXISTS `reductionsoin`;

CREATE TABLE `reductionsoin` (
  `idsoin` int(11) NOT NULL,
  `idassurance` int(11) NOT NULL,
  `taux` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`idsoin`,`idassurance`),
  KEY `fk_reductionsoin2` (`idassurance`),
  CONSTRAINT `fk_reductionsoin` FOREIGN KEY (`idsoin`) REFERENCES `soin` (`idsoin`),
  CONSTRAINT `fk_reductionsoin2` FOREIGN KEY (`idassurance`) REFERENCES `assurance` (`idassurance`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `reductionsoin` */

/*Table structure for table `soin` */

DROP TABLE IF EXISTS `soin`;

CREATE TABLE `soin` (
  `idsoin` int(11) NOT NULL,
  `libsoin` varchar(150) NOT NULL,
  `coutsoin` decimal(10,0) NOT NULL,
  PRIMARY KEY (`idsoin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `soin` */

insert  into `soin`(`idsoin`,`libsoin`,`coutsoin`) values (1,'Cathéter','500'),(2,'Perfuseur','300'),(3,'SGI 250','650'),(4,'SGI 500','650'),(5,'SGH 250','650'),(6,'SGH 500','650'),(7,'RL','950'),(8,'SSI','650'),(9,'Ca2+','200'),(10,'Na Cl','200'),(11,'Kcal','200'),(12,'VIT C','200'),(13,'VIT B','200'),(14,'VIT K1','1000'),(15,'Paracétamol perf 1g','1900'),(16,'Paracétamol perf 500','1900'),(17,'Tramadol','800'),(18,'Acupan','600'),(19,'Spasfon','500'),(20,'Vicéralgine','500'),(21,'Ketoprofen','500'),(22,'Diclofenac','500'),(23,'Ceftriaxone','2900'),(24,'Ciplacef','1400'),(25,'Kefotax','1900'),(26,'Curam','2990'),(27,'Métronidazol 500','1000'),(28,'Ampiciline 1 g','200'),(29,'Ciproflaxacine pef','1200'),(30,'Ofloxacine perf 200','1500'),(31,'Dexamethasone','500'),(32,'Célestine','1100'),(33,'Salbutamol','500'),(34,'Progestérone','2500'),(35,'Syntocinon','300'),(36,'Methergin','500'),(37,'Catapressan','900'),(38,'Loxen','1800'),(39,'Solcer','3500'),(40,'Azantac','1000'),(41,'Vogalene','500'),(42,'Dislep','1000'),(43,'Primperan','500'),(44,'Quinine 300','300'),(45,'Quinine (venimax) 600','300'),(46,'Quinimax (Q philo)','1000'),(47,'Lovenox','3640'),(48,'Dicynone','650'),(49,'Valium','500'),(50,'Gardenal','1200'),(51,'Lasilix','1200'),(52,'Triam 40','1200'),(53,'VAT','1500'),(54,'VAT SPECIALITE','2650'),(55,'Test de Z','1500'),(56,'Bandes','500'),(57,'Gentamycine','300'),(58,'Ketess','1000'),(59,'Astymin','6000'),(60,'SOINS INFIRMIERS DE 4H ET PLUS','5000'),(61,'AMIU','25000'),(62,'AMIU','20000'),(63,'ACCOUCHEMENT + SALE D\'ACCOUCHEMENT','60000'),(64,'ACCOUCHEMENT + SALE D\'ACCOUCHEMENT','92500'),(65,'SOINS INFIRMIERS DE 4H ET PLUS','5000'),(66,'SOINS INFIRMIERS DE 4H ET PLUS','8000'),(67,'SOINS INFIRMIER DE MOINS DE 2H','8000'),(68,'SOINS INFIRMIER DE MOINS DE 2H','2500'),(69,'EXPULSION','70000');

/*Table structure for table `soustypeanalysemedicale` */

DROP TABLE IF EXISTS `soustypeanalysemedicale`;

CREATE TABLE `soustypeanalysemedicale` (
  `idsoustypeanalysemedicale` int(11) NOT NULL,
  `idtypeanalysemedicale` int(11) NOT NULL,
  `libsoustypeanalysemedicale` varchar(255) NOT NULL,
  `istypeanalysemedicale` tinyint(1) NOT NULL,
  PRIMARY KEY (`idsoustypeanalysemedicale`),
  KEY `fk_avoir` (`idtypeanalysemedicale`),
  CONSTRAINT `fk_avoir` FOREIGN KEY (`idtypeanalysemedicale`) REFERENCES `typeanalysemedicale` (`idtypeanalysemedicale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `soustypeanalysemedicale` */

insert  into `soustypeanalysemedicale`(`idsoustypeanalysemedicale`,`idtypeanalysemedicale`,`libsoustypeanalysemedicale`,`istypeanalysemedicale`) values (1,1,'Analyse Immunologique',1),(2,2,'SELLES KOP',0),(3,2,'SANG',0),(4,2,'Urines',0),(5,2,'Peau',0),(6,1,'Immuno-hématologie',0),(7,5,'HEMATOLOGIE',0);

/*Table structure for table `specialite` */

DROP TABLE IF EXISTS `specialite`;

CREATE TABLE `specialite` (
  `idspecialite` int(11) NOT NULL,
  `libspecialite` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`idspecialite`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `specialite` */

/*Table structure for table `typeanalysemedicale` */

DROP TABLE IF EXISTS `typeanalysemedicale`;

CREATE TABLE `typeanalysemedicale` (
  `idtypeanalysemedicale` int(11) NOT NULL,
  `libtypeanalysemedicale` varchar(255) NOT NULL,
  PRIMARY KEY (`idtypeanalysemedicale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `typeanalysemedicale` */

insert  into `typeanalysemedicale`(`idtypeanalysemedicale`,`libtypeanalysemedicale`) values (1,'Analyse Immunologie-Immunohematologie'),(2,'PARASITOLOGIE'),(3,'SEROLOGIE INFECTUEUSE ET PARASITOLOGIE'),(4,'CYTOPATHOLOGIE-ANATOMOPATHOLOGIE-BIOLOGIE DE LA REPRODUCTION'),(5,'HEMATOLOGIE');

/*Table structure for table `typeantecedant` */

DROP TABLE IF EXISTS `typeantecedant`;

CREATE TABLE `typeantecedant` (
  `idtypeantecedant` decimal(10,0) NOT NULL,
  `libelletypeAntecedant` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`idtypeantecedant`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `typeantecedant` */

insert  into `typeantecedant`(`idtypeantecedant`,`libelletypeAntecedant`) values ('1','Familiaux'),('3','Chirurgicaux'),('5','Médicaux');

/*Table structure for table `typeconsultation` */

DROP TABLE IF EXISTS `typeconsultation`;

CREATE TABLE `typeconsultation` (
  `idtypeconsultation` int(11) NOT NULL,
  `libtypeconsultation` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idtypeconsultation`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `typeconsultation` */

insert  into `typeconsultation`(`idtypeconsultation`,`libtypeconsultation`) values (1,'GYNECOLOGIE'),(2,'CONSULTATION'),(3,'CESARIENNE'),(4,'SEROLOGIE PARASITAIRE'),(5,'EXAMEN'),(6,'ACCOUCHEMENT'),(7,'ECHOGRAPHIE');

/*Table structure for table `typeexamen` */

DROP TABLE IF EXISTS `typeexamen`;

CREATE TABLE `typeexamen` (
  `idtypeexamen` int(11) NOT NULL,
  `libtypeexamen` varchar(255) DEFAULT NULL,
  `coutexamen` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`idtypeexamen`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `typeexamen` */

insert  into `typeexamen`(`idtypeexamen`,`libtypeexamen`,`coutexamen`) values (1,'Examen gynécologique','3000'),(2,'Examen pédiatrique','5000');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

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
  `quartier` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_avoir3` (`idprof`),
  CONSTRAINT `fk_avoir3` FOREIGN KEY (`idprof`) REFERENCES `profil` (`idprof`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `user` */

insert  into `user`(`id`,`idprof`,`username`,`auth_key`,`password_hash`,`password_reset_token`,`email`,`status`,`created_at`,`updated_at`,`first_name`,`last_name`,`contact1`,`contact2`,`quartier`) values (1,1,'admin','YidOV_8g81qdyoNfLp7JNOd_2PUHctbd','$2y$13$150x7wV2igp6frChihDy2uqirLhStQ2UJeF9EksNW4KnueI1DFalO',NULL,'rachide@yahoo.fr',10,1496850628,1496850628,'rachide','Abdoulaye','','',''),(2,4,'igbataou',NULL,'$2y$13$y5iD2jx/QOpKIaHGyZJ/6uSYKlUj0fHhiD46eWPXOewYfo1VBHLCC',NULL,'',10,NULL,NULL,'Tcha-Ibome','IGBATAOU','','',''),(3,2,'yezou',NULL,'$2y$13$7kAhxmJdXrcTIOoSjxE5tuga6XGiFSEN1OVK3hZCx9vS6K5d4lwga',NULL,'',10,NULL,NULL,'DJOBO','YEZOU','','',''),(4,2,'monkam',NULL,'$2y$13$3UdcTL.piXFAidury3dhEOwd0HuZEHO2NpV9i2kM/Wme8oo2NiqWi',NULL,'',10,NULL,NULL,'Yvette','MONKAM','','',''),(5,2,'afansinou',NULL,'$2y$13$Mlcj7I.JmTh8gSUU1w4Z6ODSv87/MtLrhfk6aY2E3Lu42cRM2ap72',NULL,'',10,NULL,NULL,'AFANSINOU','AFANSINOU','','',''),(6,2,'anayo',NULL,'$2y$13$bJ8bVIicN0CDvGoGOr1M4euSVvk9QRlrKmMaUv0zQcKI2Mtt3UCV2',NULL,'',10,NULL,NULL,'anayo','anayo','','',''),(7,5,'tignokpa',NULL,'$2y$13$FJsOk.2WE2VNtjMI.atSFO.y7tZUG9Qra27frITUOGjgwZ68qF/tO',NULL,'',10,NULL,NULL,'oubote','tignokpa','','',''),(8,5,'azouaro',NULL,'$2y$13$gZWh/T94md4mURI4OPkpIeWooQoWOxZOA7FF/BOBWxI6M.PJc24.a',NULL,'',10,NULL,NULL,'hakim','azouaro','','',''),(9,5,'kotogbe',NULL,'$2y$13$R2Q7ASOV3b0c4zvABrmvd.NmrUuR6vfxsx/72NhlSP29JDqMza.kK',NULL,'',10,NULL,NULL,'dédé','kotogbe','','',''),(10,5,'gbechi',NULL,'$2y$13$Y7btAMBHaG25U5PVsMKM7eB.6m8C3xLIhrWl4i0YHSdb.jopZOgdy',NULL,'',10,NULL,NULL,'Chimène','gbechi','','',''),(11,6,'bawa',NULL,'$2y$13$mGJ9MyDPhzqdwZwqy94.6Ow1qFyv3uwxwWyOVffmv5G9Ojm03jOim',NULL,'',10,NULL,NULL,'saoudatou','bawa','','',''),(12,6,'akakpo',NULL,'$2y$13$/V2i.3FJ/oraClqgktc5YeV3Sq0SC3cIVkB1TfXZA/ZE8TbIV1lDu',NULL,'',10,NULL,NULL,'dédé','akakpo','','',''),(13,6,'missihu',NULL,'$2y$13$LiquoU/2AFPx6uT0S8wQKO6mU1SOLQFaHnB/3Nusfk17KdBkjDMBe',NULL,'',10,NULL,NULL,'Mawuta  Essi','missihu','','',''),(14,6,'ouro-gaffou',NULL,'$2y$13$ZtQVFX882gM5QTcZT9.6QOaJUsrNfp62jz964FGlGjkKNlP8ilsf2',NULL,'',10,NULL,NULL,'Talahatou','OURO-GAFFOU','','',''),(15,2,'kumessi',NULL,'$2y$13$0OVZwXn2mADuJ/0roLlYPemJKU7wAZU3pd/.k/XxmVw4RBjIDz3gq',NULL,'',10,NULL,NULL,'komi','kumessi','','',''),(16,5,'anagba',NULL,'$2y$13$xKCxfrWNZtJgcS16SsjaXeedd0VRRwsVXuLtliMZP43IBIXXHeLDW',NULL,'',10,NULL,NULL,'alice','anagba','','',''),(17,5,'kumecla',NULL,'$2y$13$iadqSAgOpH.sDzgYcMVul.sM5aJMcRnutsdusa.csjVyxuDpcpq3u',NULL,'',10,NULL,NULL,'lucia','kumecla','','',''),(18,5,'amedeka',NULL,'$2y$13$9R9BxfQ7n33oWbzctywVVOjdE84EbD1gU4c4YYehp2BWNx1POTnJ6',NULL,'',10,NULL,NULL,'Dela','amedeka','','',''),(19,5,'djobo',NULL,'$2y$13$A6hz1ocTT1FJTpiXLb611eQXW25owtwBdnMlFRQaehW2Z6r1Swu.W',NULL,'',10,NULL,NULL,'Amoudia','djobo','','',''),(20,5,'kalipe',NULL,'$2y$13$uzJoMl88bU5ztQcnAiEsg.7YZfM95tMSNFCFxg75o0.cajSvRwP8G',NULL,'',10,NULL,NULL,'Dodji','kalipe','','',''),(21,5,'amegnaglo',NULL,'$2y$13$f51w6gPwbJG53JMNYlX4keBQ0s7slEbRJ0cEQhuYb.NPjbvcMliby',NULL,'',10,NULL,NULL,'kokouvi','amegnaglo','','',''),(22,7,'simlea',NULL,'$2y$13$knuBC57bC.Ew0LHKZgi8FuLYzpsPf0Cl.vnvQhMIkjLaB6CRkv23G',NULL,'',10,NULL,NULL,'Tola','SIMLEA','','',''),(23,8,'atcha-alaza',NULL,'$2y$13$IIv5EPqwlBzd/qq4johuqe/NPKdrkm3RFGwEu8zT2n85Jcl5tkBIC',NULL,'',10,NULL,NULL,'zarifou','atcha-alaza','','',''),(24,5,'taibatou',NULL,'$2y$13$PNlCcHSbWoKh81QJjNffp.qTy/ItSe96ORoCVdUWwtAtYVhjXxd0.',NULL,'',10,NULL,NULL,'TAIBATOU','DERMANE','','',''),(25,8,'RABIATOU',NULL,'$2y$13$mS6iMEQfxuVXyJagZLa2S.VH72UH474XnQY.OevXF0bWf.b7XUaT2',NULL,'',10,NULL,NULL,'RABI','ALASSANI','','','');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
