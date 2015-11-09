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
 * Description of Aanbieder
 *
 * @author Walter
 */
class Aanbieder {
    private $naam;
    private $adres;
    private $aanbiederID;
    
    //Naam($voornaam, $achternaam, $tussenvoegsel)
    //Adres($straatnaam, $huisnummer, $achtervoegsel, $woonplaats)
    function __construct(Naam $naam, Adres $adres, $aanbiederID = null){
        $this->naam = $naam;
        $this->adres = $adres;
        $this->setAanbiederID($aanbiederID);
        
    }
    
    
    function getNaam() {
        return $this->naam;
    }

    function getAdres() {
        return $this->adres;
    }
    
    private function setAanbiederID($aanbiederID){
        if($aanbiederID && !is_numeric($aanbiederID)){
            throw new \InvalidArgumentException('aanbiederNummer moet numeriek zijn');
        }
        $this->aanbiederID = $aanbiederID;
    }
    
    function getAanbiederID() {
        return $this->aanbiederID;
    }

    
}
