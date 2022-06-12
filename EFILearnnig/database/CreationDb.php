<?php
$user='root';
$pass='root';

try {
    $bd = new PDO ('mysql:host=localhost',$user,$pass);
} catch (PDOException $e) {
   print "Erreur :". $e->getMessage() ." <br/>";
   die;
}
    $bd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    //die(var_dump(PDO::ATTR_ERRMODE));

 
    $dbi= $bd->exec('CREATE DATABASE sitelpdl;


CREATE TABLE  IF NOT EXISTS `sitelpdl`.`Commande` (
  `idCommande` INT NOT NULL AUTO_INCREMENT,
  `Nom` VARCHAR(45) NULL,
  `Email` VARCHAR(45) NULL,
  `Téléphone` INT NULL,
  `Adresse` VARCHAR(45) NULL,
  `ville` VARCHAR(45) NULL,
  `cp` INT NULL,
  `RefPatient` VARCHAR(45) NULL,
  `NatureTravaux` VARCHAR(100) NULL,
  `EssayageMetal` VARCHAR(100) NULL,
  `Collet` VARCHAR(45) NULL,
  `Dentine` VARCHAR(45) NULL,
  `Incisal` VARCHAR(45) NULL,
  `Sillon` VARCHAR(45) NULL,
  `Caractérisation` VARCHAR(45) NULL,
  `DateLivraison` DATE NULL,
  `Observation` VARCHAR(1000) NULL,
  `Biscuit` VARCHAR(110) NULL,
  PRIMARY KEY (`idCommande`)
  );


CREATE TABLE IF NOT EXISTS `sitelpdl`.`Article` (
  `idArticle` INT NOT NULL AUTO_INCREMENT,
  `TitreArticles` VARCHAR(45) NULL,
  `ObjetArticles` VARCHAR(45) NULL,
  `PhotoArticle` LONGBLOB NULL,
  `SujetArticle` LONGTEXT NULL,
  `DateArticles` DATE NULL,
  PRIMARY KEY (`idArticle`)
  );



CREATE TABLE IF NOT EXISTS `sitelpdl`.`Offre` (
  `idOffres` INT NOT NULL AUTO_INCREMENT,
  `PosteOffres` VARCHAR(45) NULL,
  `Lentreprise` LONGTEXT NULL,
  `TachesOffres` LONGTEXT NULL,
  `ProfilOffres` LONGTEXT NULL,
  `CompétencesOffres` LONGTEXT NULL,
  `SalaireOffres` VARCHAR(45) NULL,
  `TypedemploiOffres` VARCHAR(45) NULL,
  PRIMARY KEY (`idOffres`)
  );


CREATE TABLE IF NOT EXISTS `sitelpdl`.`Candidat` (
  `idCandidat` INT NOT NULL AUTO_INCREMENT,
  `NomCandidat` VARCHAR(45) NULL,
  `TéléphoneCandidat` INT NULL,
  `EmailCandidat` VARCHAR(45) NULL,
  `CvCandidat` LONGBLOB NULL,
  PRIMARY KEY (`idCandidat`));



CREATE TABLE IF NOT EXISTS `sitelpdl`.`Admin` (
  `idAdmin` INT NOT NULL AUTO_INCREMENT,
  `IdentifiantAdmin` VARCHAR(45) NULL,
  `MotDePasseAdmin` VARCHAR(45) NULL,
  PRIMARY KEY (`idAdmin`))
;


');
var_dump($dbi);

    
?>