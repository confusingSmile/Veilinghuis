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
    function setVoornaam($voornaam){
        if(!is_string($voornaam)){
                throw new \InvalidArgumentException('voornaam moet een string zijn');
        }
        $this->voornaam = $voornaam;
    }
    
    /**
     * 
     * @param type $tussenvoegsel
     * @throws InvalidArgumentException
     */
    function setTussenvoegsel($tussenvoegsel) {
        if($tussenvoegsel && !is_string($tussenvoegsel)){
                throw new \InvalidArgumentException('tussenvoegsel moet een string zijn');
        }
        //TODO catch this off in the GUI by limiting the input to max 10
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
    function setAchternaam($achternaam) {
        if(!is_string($achternaam)){
                throw new \InvalidArgumentException('achternaam moet een string zijn');
        }
        $this->achternaam = $achternaam;
    }

    function getVoornaam() {
        return $this->voornaam;
    }

    function getTussenvoegsel() {
        return $this->tussenvoegsel;
    }

    function getAchternaam() {
        return $this->achternaam;
    }



}
