<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function convertToMoney($variable){
    $bedrag = null;
    
    //komma's en punten verwijderen
    if (strstr($variable, ",") || strstr($variable, ".")) {
        if(substr($variable, -2, 1) == "," || substr($variable, -2, 1) == "."){
            $variable .= "0";
        }
        $variable = str_replace(".", "", str_replace(".", "", $variable));
    }
    
    //is het een nummer, of zaten we onzin-invoer te checken?
    $numberCheck = preg_match('(^([1-9][0-9]{*})$)', $variable);
    
    if($numberCheck === false){
        throw new \InvalidArgumentException('Bedrag is geen nummer.('.$variable.')');
    } else {
        $variable = (int) $variable;
    }
    
    //Nu hebben we een nummer waarvan de laatste 2 cijfers achter de komma moeten. 
    $achterDeKomma = $variable % 100;
    $voorDeKomma = $variable / 100;
    $bedrag = $voorDeKomma.".".$achterDeKomma;
    
    return $bedrag;
}