<?php
namespace Veilinghuis;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Kavellijst
 *
 * @author Walter
 */
class Kavellijst {
    //put your code here
    private $kavellijstId;
    private $tijdVanVeiling;
    private $locatievanVeiling;
    
    function __construct($kavellijstId){
        $this->setKavellijstId;
    }
    
    function getKavellijstId(){
        return $this->kavellijstId;
    }

    function getTijdVanVeiling(){
        return $this->tijdVanVeiling;
    }

    function getLocatievanVeiling(){
        return $this->locatievanVeiling;
    }

    function setKavellijstId($kavellijstId){
        $this->kavellijstId = $kavellijstId;
    }

    function setTijdVanVeiling(\DateTimeImmutable $tijdVanVeiling){
        $this->tijdVanVeiling = $tijdVanVeiling;
    }

    function setLocatievanVeiling($locatievanVeiling){
        $this->locatievanVeiling = $locatievanVeiling;
    }


}
