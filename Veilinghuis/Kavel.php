<?php
namespace Veilinghuis;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Kavel
 *
 * @author Walter
 */
class Kavel {
    //put your code here
    private $kavelNummer;
    private $naam;
    private $omschrijving;
    private $kavellijstNummer;
    
    function __construct($naam, $omschrijving){
        $this->setNaam($naam);
        $this->setOmschrijving($omschrijving);
    }
    
    function setNaam($naam){
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

    function setOmschrijving($omschrijving){
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
    
    function getKavelNummer(){
        return $this->kavelNummer;
    }

    function getKavellijstNummer(){
        return $this->kavellijstNummer;
    }

    function setKavelNummer($kavelNummer){
        if(!$kavelNummer){
            throw new \InvalidArgumentException('kavelNummer mag niet leeg zijn');  
        }
        if(!is_numeric($kavelNummer)){
            throw new \InvalidArgumentException('kavelNummer moet numeriek zijn');
        }
        $this->kavelNummer = $kavelNummer;
    }

    function setKavellijstNummer($kavellijstNummer){
        $this->kavellijstNummer = $kavellijstNummer;
    }
    function getNaam(){
        return $this->naam;
    }

    function getOmschrijving(){
        return $this->omschrijving;
    }



    
    
}
