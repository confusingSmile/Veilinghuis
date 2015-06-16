<?php

namespace Veilinghuis;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Goed
 *
 * @author Walter
 */
class Goed {
    //put your code here
    private $goedNummer;
    private $naam;
    private $omschrijving;
    private $kavelNummer;
    private $aanbiederId;
    private $fooibetaald = false;
    
    //TODO goedNummer dependency nodig?
    function __construct($naam, $omschrijving, $aanbiederId){
        $this->setNaam($naam);
        $this->setOmschrijving($omschrijving);
        $this->setAanbiederId($aanbiederId);
    }
    
    function getNaam(){
        return $this->naam;
    }

    function getOmschrijving(){
        return $this->omschrijving;
    }

    function getKavelNummer(){
        return $this->kavelNummer;
    }

    function getAanbiederId(){
        return $this->aanbiederId;
    }

    function getFooiBetaald(){
        return $this->fooibetaald;
    }
    function getGoedNummer(){
        return $this->goedNummer;
    }

    function setGoedNummer($goedNummer){
        if(!$goedNummer){
            throw new \InvalidArgumentException('goedNummer mag niet leeg zijn');  
        }
        if(!is_numeric($goedNummer)){
            throw new \InvalidArgumentException('goedNummer moet numeriek zijn');
        }
        $this->goedNummer = $goedNummer;
    }

    private function setNaam($naam){
        if(!$naam){
            throw new \InvalidArgumentException('naam mag niet leeg zijn');
        }
        if(!is_string($naam)){
            throw new \InvalidArgumentException('naam moet een string zijn');
        }
        if(strlen($naam) > 100){
            throw new \InvalidArgumentException('naam mag maximaal uit 100 tekens bestaan');
        }
        $this->naam = $naam;
    }

    private function setOmschrijving($omschrijving){
        if(!$omschrijving){
            throw new \InvalidArgumentException('omschrijving mag niet leeg zijn');
        }
        if(!is_string($omschrijving)){
            throw new \InvalidArgumentException('omschrijving moet een string zijn');
        }
        if(strlen($omschrijving) > 250){
            throw new \InvalidArgumentException('omschrijving mag maximaal uit 250 tekens bestaan');
        }
        $this->omschrijving = $omschrijving;
    }

    function voegToeAanKavel($kavelNummer){
        //TODO check of kavel bestaat
        $this->kavelNummer = $kavelNummer;
    }

    private function setAanbiederId($aanbiederId){
        //TODO check of aanbieder bestaat
        $this->aanbiederId = $aanbiederId;
    }

    function setFooiBetaald(){
        $this->fooibetaald = true;
    }


}
