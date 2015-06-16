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
    
    function __construct($kavellijstId){
        $this->setKavellijstId($kavellijstId);
    }
    
    function getKavellijstId(){
        return $this->kavellijstId;
    }

    private function setKavellijstId($kavellijstId){
        if(!$kavellijstId){
            throw new \InvalidArgumentException('kavellijstId mag niet leeg zijn');
        }
        if(!is_numeric($kavellijstId)){
            throw new \InvalidArgumentException('kavellijstId moet numeriek zijn');
        }
        $this->kavellijstId = $kavellijstId;
    }




}
