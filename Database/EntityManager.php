<?php

namespace Database;

use Doctrine\DBAL\Configuration;
use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Connection;
use Veilinghuis\Aanbieder;
use Veilinghuis\Bieder;
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
}
