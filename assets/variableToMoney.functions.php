<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function convertToMoney($variable){
    
    //komma's en punten verwijderen
    if (strstr($variable, ",") || strstr($variable, ".")) {
        if(substr($variable, -2, 1) == "," || substr($variable, -2, 1) == "."){
            $variable .= "0";
        }
        $variable = str_replace(",", "", str_replace(".", "", $variable));
    }
    
    //is het een nummer, of zaten we onzin-invoer te checken?
    $numberCheck = preg_match('(^[0-9]*$)', $variable);
    
    if($numberCheck === 0){
        throw new \InvalidArgumentException('Bedrag is geen nummer. ('.$variable.')');
    } 
    
    //Nu hebben we een nummer waarvan de laatste 2 cijfers achter de komma moeten. 
    $bedrag = ($variable / 100);
    
    if(substr($bedrag, -2, 1) == "."){
            $bedrag .= "0";
        }
    
    return $bedrag;
}
