<?php
namespace Veilinghuis\Entities;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * is a value Object
 *
 * @author Walter
 */
class Naam {
    
    private $voornaam;
    private $tussenvoegsel;
    private $achternaam;
    
    function __construct($voornaam, $tussenvoegsel, $achternaam){
        $this->setVoornaam($voornaam);
        $this->setTussenvoegsel($tussenvoegsel);
        $this->setAchternaam($achternaam);
    }
    
    /**
     * 
     * @param type $voornaam
     * @throws InvalidArgumentException
     */
    private function setVoornaam($voornaam){
        if(!$voornaam){
            throw new \InvalidArgumentException('voornaam mag niet leeg zijn');
        }
        if(!is_string($voornaam)){
            throw new \InvalidArgumentException('voornaam moet een string zijn');
        }
        if(strlen($voornaam) > 50){
            throw new \InvalidArgumentException('voornaam mag maximaal uit 50 tekens bestaan');
        }
        $this->voornaam = $voornaam;
    }
    
    /**
     * 
     * @param type $tussenvoegsel
     * @throws InvalidArgumentException
     */
    private function setTussenvoegsel($tussenvoegsel){
        if($tussenvoegsel && !is_string($tussenvoegsel)){
                throw new \InvalidArgumentException('tussenvoegsel moet een string zijn');
        }
        if(strlen($tussenvoegsel) > 10){
            throw new \InvalidArgumentException('tussenvoegsel mag maximaal uit 10 tekens bestaan');
        }
        $this->tussenvoegsel = $tussenvoegsel;
    }

    /**
     * 
     * @param type $achternaam
     * @throws InvalidArgumentException
     */
    private function setAchternaam($achternaam){
        if(!$achternaam){
            throw new \InvalidArgumentException('achternaam mag niet leeg zijn');
        }
        if(!is_string($achternaam)){
                throw new \InvalidArgumentException('achternaam moet een string zijn');
        }
        if(strlen($achternaam) > 51){
            throw new \InvalidArgumentException('achternaam mag maximaal uit 51 tekens bestaan');
        }
        $this->achternaam = $achternaam;
    }

    function getVoornaam(){
        return $this->voornaam;
    }

    function getTussenvoegsel(){
        if(!$this->tussenvoegsel){
            return "";
        }
        return (string) $this->tussenvoegsel;
    }

    function getAchternaam(){
        return $this->achternaam;
    }



}
