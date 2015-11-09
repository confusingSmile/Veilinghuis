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
    
    function __construct($connectionParams){
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
}
