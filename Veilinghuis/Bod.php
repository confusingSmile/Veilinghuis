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
    private $tijdVeiling;
    private $plaatsVeiling;
    private $kavelNummer;
    private $bedragGeboden;
    private $betaald = false;
    
    function __construct($tokenNummer, $kavelNummer, \DateTimeImmutable $tijdVeiling, $plaatsVeiling,
                         $bedragGeboden){
        $this->setTokenNummer($tokenNummer);
        $this->setKavelNummer($kavelNummer);
        $this->setTijdVeiling($tijdVeiling);
        $this->setPlaatsVeiling($plaatsVeiling);
        $this->setBedragGeboden($bedragGeboden);
    }
    
    function getTokenNummer(){
        return $this->tokenNummer;
    }

    function getTijdVeiling(){
        return $this->tijdVeiling;
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

    private function setTijdVeiling($tijdVeiling){
        $this->tijdVeiling = $tijdVeiling;
    }

    private function setPlaatsVeiling($plaatsVeiling){
        if(!$plaatsVeiling){
            throw new \InvalidArgumentException('locatie mag niet leeg zijn');
        }
        if(!is_string($plaatsVeiling)){
            throw new \InvalidArgumentException('locatie moet een string zijn');
        }
        $this->plaatsVeiling = $plaatsVeiling;
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
