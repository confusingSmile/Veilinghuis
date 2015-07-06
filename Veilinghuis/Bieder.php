<?php

namespace Veilinghuis;
use Veilinghuis\Entities\Naam;
use Veilinghuis\Entities\Adres;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Bieder
 *
 * @author Walter
 */
class Bieder {
    private $naam;
    private $adres;
    private $tokenNummer;
    
    //Naam($voornaam, $achternaam, $tussenvoegsel)
    //Adres($straatnaam, $huisnummer, $achtervoegsel, $woonplaats)
    function __construct(Naam $naam, Adres $adres, $tokenNummer){
        $this->naam = $naam;
        $this->adres = $adres;
        $this->setTokenNummer($tokenNummer);
        
    }
    
    
    function getNaam() {
        return $this->naam;
    }

    function getAdres() {
        return $this->adres;
    }

    function getMaxVoorbod() {
        return $this->maxVoorbod;
    }
    
    private function setTokenNummer($tokenNummer){
        if(!$tokenNummer){
            throw new \InvalidArgumentException('tokenNummer mag niet leeg zijn');
        }
        if(!is_numeric($tokenNummer)){
            throw new \InvalidArgumentException('tokenNummer moet numeriek zijn');
        }
        $this->tokenNummer = $tokenNummer;
    }
    
    function getTokenNummer() {
        return $this->tokenNummer;
    }

    
}
