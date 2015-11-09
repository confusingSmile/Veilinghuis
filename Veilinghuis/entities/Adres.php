<?php

namespace Veilinghuis\Entities;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Adres
 *
 * @author Walter
 */
class Adres {
    //put your code here
    private $straat;
    private $huisnummer;
    private $toevoeging;
    private $woonplaats;
    private $postcode; 
    
    function __construct($straat, $huisnummer, $toevoeging, $woonplaats, $postcode){
        $this->setStraat($straat);
        $this->setHuisnummer($huisnummer);
        $this->setToevoeging($toevoeging);
        $this->setWoonplaats($woonplaats);
        $this->setPostcode($postcode);
    }

    
    function getStraat(){
        return $this->straat;
    }

    function getHuisnummer(){
        return (int) $this->huisnummer;
    }

    function getWoonplaats(){
        return $this->woonplaats;
    }

    function getPostcode(){
        
        return $this->postcode;
    }

    private function setStraat($straat){
        if(!$straat){
            throw new \InvalidArgumentException('straatnaam mag niet leeg zijn');
        }
        if(!is_string($straat)){
            throw new \InvalidArgumentException('straatnaam moet een string zijn');
        }
        if(strlen($straat) > 46){
            throw new \InvalidArgumentException('straatnaam mag maximaal uit 46 tekens bestaan');
        }
        $this->straat = $straat;
    }

    private function setHuisnummer($huisnummer){
        if(!$huisnummer){
            throw new \InvalidArgumentException('huisnummer mag niet leeg zijn');
        }
        if(!is_int($huisnummer)){
            throw new \InvalidArgumentException('huisnummer moet een integer zijn');
        }
        if($huisnummer <= 0){
            throw new \InvalidArgumentException('huisnummer moet groter zijn dan 0');
        }
        
        $this->huisnummer = $huisnummer;
    }
    function getToevoeging() {
        return (string) $this->toevoeging;
    }

    private function setToevoeging($toevoeging) {
        if(is_object($toevoeging)){
            throw new \InvalidArgumentException('toevoeging mag niet van het type Object zijn');
        }
        if(strlen($toevoeging) > 25){
            throw new \InvalidArgumentException('toevoeging mag maximaal uit 25 tekens bestaan');
        }
        $this->toevoeging = $toevoeging;
    }

    private function setWoonplaats($woonplaats){
        if(!$woonplaats){
            throw new \InvalidArgumentException('woonplaats mag niet leeg zijn');
        }
        if(!is_string($woonplaats)){
            throw new \InvalidArgumentException('woonplaats moet een string zijn');
        }
        if(strlen($woonplaats) > 28){
            throw new \InvalidArgumentException('woonplaats mag maximaal uit 28 tekens bestaan');
        }
        
        $this->woonplaats = $woonplaats;
    }

    private function setPostcode($postcode){
        $matchThis = preg_match('(^([1-9][0-9]{3}\w*[a-zA-Z]{2})$)', $postcode);
        if($matchThis === false || strlen($postcode) > 8){
            throw new \InvalidArgumentException('er is een fout opgetreden in Adres->setPostcode');
        } elseif ($matchThis === 0) {
            throw new \InvalidArgumentException('ongeldige postcode');
        }
        
        $this->postcode = $postcode;
    }


}
