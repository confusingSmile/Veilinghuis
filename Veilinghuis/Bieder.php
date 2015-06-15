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
    private $maxVoorbod = 0;
    private $biederId;
    
    //Naam($voornaam, $achternaam, $tussenvoegsel)
    //Adres($straatnaam, $huisnummer, $achtervoegsel, $woonplaats)
    function __construct(Naam $naam, Adres $adres){
        $this->naam = $naam;
        $this->adres = $adres;
        
    }
    
    /**
     * throws exception
     * @param type numeric
     */
    function setMaxVoorbod($maxVoorbod){
        $this->valideerVoorbod($maxVoorbod);
        $this->maxVoorbod = $maxVoorbod;    
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
    function getBiederId() {
        return $this->biederId;
    }

    function setBiederId($biederId) {
        $this->biederId = $biederId;
    }

    
    public function valideerVoorbod($maxVoorbod) {
        if(!is_numeric($maxVoorbod)){
            throw new \InvalidArgumentException('Voorbod moet numeriek zijn');
        
        }
        if ($maxVoorbod < 0) {
            throw new \InvalidArgumentException('Voorbod moet positief zijn');
        }
    }

    
}
