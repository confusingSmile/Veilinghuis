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
    private $biederNummer;
    private $kavelNummer;
    private $bedragGeboden;
    private $betaald = false;
    
    function __construct($biederNummer, $kavelNummer, 
                         $bedragGeboden){
        $this->setBiederNummer($biederNummer);
        $this->setKavelNummer($kavelNummer);
        $this->setBedragGeboden($bedragGeboden);
    }
    
    function getBiederNummer(){
        return $this->biederNummer;
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

    private function setBiederNummer($biederNummer){
        if(!$biederNummer){
            throw new \InvalidArgumentException('biederNummer mag niet leeg zijn');
        }
        if(!is_numeric($biederNummer)){
            throw new \InvalidArgumentException('biederNummer moet numeriek zijn');
        }
        $this->biederNummer = $biederNummer;
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
