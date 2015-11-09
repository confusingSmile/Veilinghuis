<?php

namespace Veilinghuis;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Veiling
 *
 * @author Walter
 * Deprecated class! Will be removed!
 */
class Veiling {
    //put your code here
    private $aanvangstijd;
    private $locatie;
    private $kavellijstId;
    
    function __construct(\DateTimeImmutable $aanvangstijd, $locatie){
        $this->aanvangstijd = $aanvangstijd;
        $this->setLocatie($locatie);
    }
    
    function getAanvangstijd(){
        return $this->aanvangstijd;
    }

    function getLocatie(){
        return $this->locatie;
    }

    function getKavellijstId(){
        return $this->kavellijstId;
    }

    private function setLocatie($locatie){
        if(!$locatie){
            throw new \InvalidArgumentException('locatie mag niet leeg zijn');
        }
        if(!is_string($locatie)){
            throw new \InvalidArgumentException('locatie moet een string zijn');
        }
        if(strlen($locatie) > 25){
            throw new \InvalidArgumentException('locatie mag maximaal uit 25 tekens bestaan');
        }
        $this->locatie = $locatie;
    }

    function setKavellijstId($kavellijstId){
        //TODO probably need to test if kavellijst exists
        if(!$kavellijstId){
            throw new \InvalidArgumentException('kavellijstId mag niet leeg zijn');
        }
        if(!is_numeric($kavellijstId)){
            throw new \InvalidArgumentException('kavellijstId moet numeriek zijn');
        }
        $this->kavellijstId = $kavellijstId;
    }



    
}
