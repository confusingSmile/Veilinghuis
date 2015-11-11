<?php

namespace Database;

use Doctrine\DBAL\Configuration;
use Doctrine\DBAL\DriverManager;
use Veilinghuis\Aanbieder;
use Veilinghuis\Bieder;
use Veilinghuis\Goed;
use Veilinghuis\Kavel;
use Veilinghuis\Kavellijst;
use Veilinghuis\Entities\Naam;
use Veilinghuis\Entities\Adres;


/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EntityManager
 *
 * @author Walter
 */
class EntityManager {
    //put your code here
    
    private $connection;
    
    function __construct(){
        
        include('/../config/config_db_local.php');
        $this->connection = DriverManager::getConnection($connectionParams, new Configuration());
    }
    
    function vindBiederMetTokennummer($tokenNummer){
            
    }
    
    function vindBiederMetBiederID($biederID){
        $bieder = null;
        $sql = "SELECT * 
                FROM bieder
                WHERE bieder_id = :biederID"; 

        $stmt = $this->connection->prepare($sql); 
        $stmt->bindValue('biederID', $biederID);
        $stmt->execute();

        while ($row = $stmt->fetch()) {                              
                $bieder = new Bieder(
                        new Naam($row['voornaam'], $row['tussenvoegsel'], $row['achternaam']), 
                        new Adres($row['straat'], (int) $row['huisnummer'], $row['toevoeging'], $row['woonplaats'], $row['postcode']), 
                        $row['bieder_id']);
        }

        return $bieder;
    }
    
    function vindAlleBieders(){
        $bieders = null;
        $sql = "SELECT * 
                FROM bieder"; 

        $stmt = $this->connection->prepare($sql); 
        $stmt->execute();

        while ($row = $stmt->fetch()) {                              
                $bieders[] = new Bieder(
                        new Naam($row['voornaam'], $row['tussenvoegsel'], $row['achternaam']), 
                        new Adres($row['straat'], (int) $row['huisnummer'], $row['toevoeging'], $row['woonplaats'], $row['postcode']), 
                        $row['bieder_id']);
        }

        return $bieders;
    }
    
    function vindAanbiederMetAanbiederID($aanbiederID){
        $aanbieder = null;
        $sql = "SELECT * 
                FROM aanbieder
                WHERE aanbieder_id = :aanbiederID"; 

        $stmt = $this->connection->prepare($sql); 
        $stmt->bindValue('aanbiederID', $aanbiederID);
        $stmt->execute();

        while ($row = $stmt->fetch()) {                              
                $aanbieder = new Bieder(
                        new Naam($row['voornaam'], $row['tussenvoegsel'], $row['achternaam']), 
                        new Adres($row['straat'], (int) $row['huisnummer'], $row['toevoeging'], $row['woonplaats'], $row['postcode']), 
                        $row['aanbieder_id']);
        }

        return $aanbieder;
    }
    
    function vindNieuwsteBiederID(){
        $id = null;
        $sql = "SELECT max(bieder_id) FROM bieder";
        
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        
        while($row = $stmt->fetch()){
            $id = $row['bieder_id'];
        }
        
        return $id;
    }
    
    function vindNieuwsteAanbiederID(){
        $id = null;
        $sql = "SELECT max(aanbieder_id) as aanbieder_id FROM aanbieder";
        
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        
        while($row = $stmt->fetch()){
            $id = $row['aanbieder_id'];
        }
        
        return $id;
    }
    
    function vindAlleAanbieders(){
        $aanbieders = null;
        $sql = "SELECT * 
                FROM aanbieder"; 

        $stmt = $this->connection->prepare($sql); 
        $stmt->execute();

        while ($row = $stmt->fetch()) {                              
                $aanbieders[] = new Aanbieder(
                        new Naam($row['voornaam'], $row['tussenvoegsel'], $row['achternaam']), 
                        new Adres($row['straat'], (int) $row['huisnummer'], $row['toevoeging'], $row['woonplaats'], $row['postcode']), 
                        $row['aanbieder_id']);
        }

        return $aanbieders;
    }
    
    function nieuweBieder(Bieder $bieder){
        $biederVoornaam = $bieder->getNaam()->getVoornaam();
        $biederTussenvoegsel = $bieder->getNaam()->getTussenvoegsel();
        $biederAchternaam = $bieder->getNaam()->getAchternaam();
        
        $biederStraatnaam = $bieder->getAdres()->getStraat();
        $biederHuisnummer = $bieder->getAdres()->getHuisnummer();
        $biederHuisnummerToevoeging = $bieder->getAdres()->getToevoeging();
        $biederPostcode = $bieder->getAdres()->getPostcode();
        $biederWoonplaats = $bieder->getAdres()->getWoonplaats();
        
        $sql = "INSERT INTO bieder(voornaam, tussenvoegsel, achternaam, straat, huisnummer, toevoeging"
                . ", postcode, woonplaats) VALUES(:voornaam, :tussenvoegsel, :achternaam, "
                . ":straat, :huisnummer, :toevoeging, :postcode, :woonplaats)"; 
        
        $stmt = $this->connection->prepare($sql); 
        $stmt->bindValue('voornaam', $biederVoornaam);
        $stmt->bindValue('tussenvoegsel', $biederTussenvoegsel);
        $stmt->bindValue('achternaam', $biederAchternaam);
        $stmt->bindValue('straat', $biederStraatnaam);
        $stmt->bindValue('huisnummer', $biederHuisnummer);
        $stmt->bindValue('toevoeging', $biederHuisnummerToevoeging);
        $stmt->bindValue('postcode', $biederPostcode);
        $stmt->bindValue('woonplaats', $biederWoonplaats);
        $stmt->execute();
    }
    
    function nieuweAanbieder(Aanbieder $aanbieder){
        $aanbiederVoornaam = $aanbieder->getNaam()->getVoornaam();
        $aanbiederTussenvoegsel = $aanbieder->getNaam()->getTussenvoegsel();
        $aanbiederAchternaam = $aanbieder->getNaam()->getAchternaam();
        
        $aanbiederStraatnaam = $aanbieder->getAdres()->getStraat();
        $aanbiederHuisnummer = $aanbieder->getAdres()->getHuisnummer();
        $aanbiederHuisnummerToevoeging = $aanbieder->getAdres()->getToevoeging();
        $aanbiederPostcode = $aanbieder->getAdres()->getPostcode();
        $aanbiederWoonplaats = $aanbieder->getAdres()->getWoonplaats();
        
        $sql = "INSERT INTO aanbieder(voornaam, tussenvoegsel, achternaam, straat, huisnummer, toevoeging"
                . ", postcode, woonplaats) VALUES(:voornaam, :tussenvoegsel, :achternaam, "
                . ":straat, :huisnummer, :toevoeging, :postcode, :woonplaats)"; 
        
        $stmt = $this->connection->prepare($sql); 
        $stmt->bindValue('voornaam', $aanbiederVoornaam);
        $stmt->bindValue('tussenvoegsel', $aanbiederTussenvoegsel);
        $stmt->bindValue('achternaam', $aanbiederAchternaam);
        $stmt->bindValue('straat', $aanbiederStraatnaam);
        $stmt->bindValue('huisnummer', $aanbiederHuisnummer);
        $stmt->bindValue('toevoeging', $aanbiederHuisnummerToevoeging);
        $stmt->bindValue('postcode', $aanbiederPostcode);
        $stmt->bindValue('woonplaats', $aanbiederWoonplaats);
        $stmt->execute();
    }
    
    function nieuwGoed(Goed $goed){
        $goedNaam = $goed->getNaam();
        $goedAanbiederID = $goed->getAanbiederId();
        $goedOmschrijving = $goed->getOmschrijving();
        
        $sql = "INSERT INTO goed(goed_naam, omschrijving, aanbieder_id)"
                . "VALUES(:goed_naam, :omschrijving, :aanbieder_id)";
        
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue('goed_naam', $goedNaam);
        $stmt->bindValue('omschrijving', $goedOmschrijving);
        $stmt->bindValue('aanbieder_id', $goedAanbiederID);
        $stmt->execute();
    }
    
    function vindOnverkaveldeGoederen(){
        $goederen = array();
        
        $sql = "SELECT * FROM goed WHERE kavel_id is null";
        
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        
        while($row = $stmt->fetch()){
            $goed = new Goed($row['goed_naam'], $row['omschrijving'], $row['aanbieder_id']);
            $goed ->setGoedNummer($row['goed_id']);
            $goederen[] = $goed;
        }
        
        return $goederen;
    }
    
    function vindGoedMetGoednummer($goednummer){
        $goed = null;
        $sql = "SELECT * FROM goed WHERE goed_id = :goedNummer";
        
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue('goedNummer', $goednummer);
        $stmt->execute();
        
        while($row = $stmt->fetch()){
            $eenGoed = new Goed($row['goed_naam'], $row['omschrijving'], $row['aanbieder_id']);
            $eenGoed->setGoedNummer($row['goed_id']);
            $goed = $eenGoed;
        }
        
        return $goed;
    }
    
    function volgendKavelnummer(){
        $maxKavelNummer = 0;
        $sql = "SELECT max(kavel_id) as kavel_id FROM goed";
        
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        
        while($row = $stmt->fetch()){
            if ($row['kavel_id'] != null) {
                $maxKavelNummer = $row['kavel_id'];
            }
        }
        
        return $maxKavelNummer + 1;
    }
    
    function maakNieuwKavel(Kavel $kavel){
        $sql = "INSERT INTO kavel(kavel_naam, omschrijving) VALUES(:naam, :omschrijving)";
        
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue('naam', $kavel->getNaam());
        $stmt->bindValue('omschrijving', $kavel->getOmschrijving());
        $stmt->execute();
    }
    
    function verkavelGoed(Goed $goed, $kavelnummer){
        $sql = "UPDATE goed SET kavel_id = :kavelnummer WHERE goed_id = :goed_id";
        
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue('kavelnummer', $kavelnummer);
        $stmt->bindValue('goed_id', $goed->getGoedNummer());
        $stmt->execute();
    }
    
    function vindKavelsZonderLijst(){
        $kavels = array();
        
        $sql = "SELECT * FROM kavel WHERE kavellijst_id is null";
        
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        
        while($row = $stmt->fetch()){
            $kavel = new Kavel($row['kavel_naam'], $row['omschrijving']);
            $kavel ->setKavelNummer($row['kavel_id']);
            $kavels[] = $kavel;
        }
        
        return $kavels;
    }
    
    function vindGoederenOpKavelnummer($kavelNummer){
        $goederen = array();
        
        $sql = "SELECT * FROM goed WHERE kavel_id = :kavelNummer";
        
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue('kavelNummer', $kavelNummer);
        $stmt->execute();
        
        while($row = $stmt->fetch()){
            $goed = new Goed($row['goed_naam'], $row['omschrijving'], $row['aanbieder_id']);
            $goed ->setGoedNummer($row['goed_id']);
            $goederen[] = $goed;
        }
        
        return $goederen;
    }
    
    function volgendKavellijstnummer(){
        $maxKavellijstNummer = 0;
        $sql = "SELECT max(kavellijst_id) as kavellijst_id FROM kavel";
        
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        
        while($row = $stmt->fetch()){
            if ($row['kavellijst_id'] != null) {
                $maxKavellijstNummer = $row['kavellijst_id'];
            }
        }
        
        return $maxKavellijstNummer + 1;
    }
    
    function maakKavellijstAan(){
        $sql = "INSERT INTO kavellijst(kavellijst_id, veilingsdatum) VALUES( null, null)";
        
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
    }
    
    function vindKavelMetKavelNummer($kavelNummer){
        $kavel = null;
        
        $sql = "SELECT * FROM kavel WHERE kavel_id = :kavelNummer";
        
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue('kavelNummer', $kavelNummer);
        $stmt->execute();
        
        while($row = $stmt->fetch()){
            $kavel = new Kavel($row['kavel_naam'], $row['omschrijving']);
            $kavel->setKavelNummer($row['kavel_id']);
        }
        
        return $kavel;
    }
    
    function voegToeAanKavellijst(Kavel $kavel, $kavellijstNummer){
        $sql = "UPDATE kavel SET kavellijst_id = :kavellijstNummer WHERE kavel_id = :kavelID";
        
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue('kavellijstNummer', $kavellijstNummer);
        $stmt->bindValue('kavelID', $kavel->getKavelNummer());
        $stmt->execute();
    }
    
    function registreerVoorbod(Bieder $bieder, Kavel $kavel, $bedrag){
        $sql = "INSERT INTO voorbod(bieder_id, kavel_id, bedrag) VALUES(:bieder_id, :kavel_id, :bedrag)";
        
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue('bieder_id', $bieder->getBiederID());
        $stmt->bindValue('kavel_id', $kavel->getKavelNummer());
        $stmt->bindValue('bedrag', $bedrag);
        $stmt->execute();
    }
    
    function verwijderVoorbod(Bieder $bieder, Kavel $kavel){
        $sql = "DELETE FROM voorbod WHERE bieder_id = :bieder_id AND kavel_id = :kavel_id";
        
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue('bieder_id', $bieder->getBiederID());
        $stmt->bindValue('kavel_id', $kavel->getKavelNummer());
        $stmt->execute();
    }
    
    function vindKavelsMetKavellijstnummer($kavellijstnummer){
        $kavels = null;
        
        $sql = "SELECT * FROM kavel WHERE kavellijst_id = :kavellijstnummer";
        
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue('kavellijstnummer', $kavellijstnummer);
        $stmt->execute();
        
        while($row = $stmt->fetch()){
            $kavel = new Kavel($row['kavel_naam'], $row['omschrijving']);
            $kavel->setKavelNummer($row['kavel_id']);
            $kavels[] = $kavel;
        }
        
        return $kavels;
    }
    
    function vindKavellijstenZonderVeiling(){
        $kavellijsten = array();
        $sql = "SELECT kavellijst_id FROM kavellijst WHERE veilingsdatum is null";
        
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        
        while($row = $stmt->fetch()){
            $kavellijsten[] = new Kavellijst($row['kavellijst_id']);
        }
        
        return $kavellijsten;
    }
    
    function vindKavellijstMetKavellijstNummer($kavellijstnummer){
        $kavellijst = array();
        $sql = "SELECT kavellijst_id FROM kavellijst WHERE kavellijst_id = :kavellijstnummer";
        
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue('kavellijstnummer', $kavellijstnummer);
        $stmt->execute();
        
        while($row = $stmt->fetch()){
            $kavellijst = new Kavellijst($row['kavellijst_id']);
        }
        
        return $kavellijst;
    }
    
    function wijsKavellijstToeAanVeiling(Kavellijst $kavellijst, $datum){
        $sql = "UPDATE kavellijst SET veilingsdatum = :datum WHERE kavellijst_id = :kavellijstnummer";
        
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue('datum', $datum);
        $stmt->bindValue('kavellijstnummer', $kavellijst->getKavellijstId());
        $stmt->execute();
    }
    
    function vindKavellijstMetDatum($datum){
        $kavellijst = "";
        $sql = "SELECT kavellijst_id FROM kavellijst WHERE veilingsdatum = :datum";
        
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue('datum', date_format($datum, "Y-m-d"));
        $stmt->execute();
        
        while($row = $stmt->fetch()){
            $kavellijst = new Kavellijst($row['kavellijst_id']);
        }
        
        return $kavellijst;
    }
}
