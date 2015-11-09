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
    private $biederID;
    
    //Naam($voornaam, $achternaam, $tussenvoegsel)
    //Adres($straatnaam, $huisnummer, $achtervoegsel, $woonplaats)
    function __construct(Naam $naam, Adres $adres, $biederID){
        $this->naam = $naam;
        $this->adres = $adres;
        $this->setBiederID($biederID);
        
    }
    
    
    function getNaam() {
        return $this->naam;
    }

    function getAdres() {
        return $this->adres;
    }
    
    private function setBiederID($biederID){
        if(!$biederID){
            throw new \InvalidArgumentException('biederNummer mag niet leeg zijn');
        }
        if(!is_numeric($biederID)){
            throw new \InvalidArgumentException('biederNummer moet numeriek zijn');
        }
        $this->biederID = $biederID;
    }
    
    function getBiederID() {
        return $this->biederID;
    }

    
}
