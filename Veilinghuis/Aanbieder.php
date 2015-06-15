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
    function __construct(Naam $naam, Adres $adres){
        $this->naam = $naam;
        $this->adres = $adres;
        
    }
    
    function getNaam() {
        return $this->naam;
    }

    function getAdres() {
        return $this->adres;
    }

    function getAanbiederID() {
        return $this->aanbiederID;
    }

    function setAanbiederID($aanbiederID) {
        //TODO validation
        $this->aanbiederID = $aanbiederID;
    }


}
