<?php
namespace Veilinghuis;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Bod
 *
 * @author Walter
 */
class Bod {
    //put your code here
    private $tokenNummer;
    private $kavelNummer;
    private $bedragGeboden;
    private $betaald = false;
    
    function __construct($tokenNummer, $kavelNummer, 
                         $bedragGeboden){
        $this->setTokenNummer($tokenNummer);
        $this->setKavelNummer($kavelNummer);
        $this->setBedragGeboden($bedragGeboden);
    }
    
    function getTokenNummer(){
        return $this->tokenNummer;
    }

    function getPlaatsVeiling(){
        return $this->plaatsVeiling;
    }
    
    function getKavelNummer(){
        return $this->kavelNummer;
    }

    function getBedragGeboden(){
        return $this->bedragGeboden;
    }

    function getBetaald(){
        return $this->betaald;
    }

    private function setTokenNummer($tokenNummer){
        if(!$tokenNummer){
            throw new \InvalidArgumentException('tokenNummer mag niet leeg zijn');
        }
        if(!is_numeric($tokenNummer)){
            throw new \InvalidArgumentException('tokenNummer moet numeriek zijn');
        }
        $this->tokenNummer = $tokenNummer;
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

    private function setBedragGeboden($bedragGeboden){
        if(!$bedragGeboden && $bedragGeboden !== 0){
            throw new \InvalidArgumentException('geboden bedrag mag niet leeg zijn');
        }
        if(!is_numeric($bedragGeboden)){
            throw new \InvalidArgumentException('geboden bedrag moet numeriek zijn');
        }
        if($bedragGeboden <= 0){
            throw new \InvalidArgumentException('geboden bedrag is te laag');
        }
        $this->bedragGeboden = $bedragGeboden;
    }

    function setBetaald(){
        $this->betaald = true;
    }


}
