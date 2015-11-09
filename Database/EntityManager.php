<?php

namespace Database;

use Doctrine\DBAL\Configuration;
use Doctrine\DBAL\DriverManager;
use Veilinghuis\Aanbieder;
use Veilinghuis\Bieder;
use Veilinghuis\Goed;
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
        
        include('../../config/config_db_local.php');
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
        $stmt->bindValue('biederID', $$biederID);
        $stmt->execute();

        while ($row = $stmt->fetch()) {                              
                $bieder = new Bieder(
                        new Naam($row['voornaam'], $row['tussenvoegsel'], $row['achternaam']), 
                        new Adres($row['straatnaam'], (int) $row['huisnummer'], $row['toevoeging'], $row['woonplaats'], $row['postcode']), 
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
        $sql = "SELECT max(aanbieder_id) FROM aanbieder";
        
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
        
        $sql = "SELECT FROM goed WHERE kavel_id is null";
        
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        
        while($row = $stmt->fetch()){
            $goederen[] = new Goed($row['goed_naam']. $row['omschrijving'], $row['aanbieder_id']);
        }
        
        return $goederen;
    }
}
