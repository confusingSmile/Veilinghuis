<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php

use Database\EntityManager;
use Veilinghuis\Bieder;
use Veilinghuis\Bod;
use Veilinghuis\Kavel;

require_once '../../vendor/autoload.php';
include('/../../assets/variableToMoney.functions.php');

$em = new EntityManager();
$errorMessage = "";

if(isSet($_POST['kavel'][0])){
    //using the first 'kavel' entry to base the date on, because we just confirmed its existance.
    $datum = new DateTime($em->vindDatumMetKavelnummer($_POST['kavel'][0]));
    $kavels = $_POST['kavel'];
    $tokenNummers = $_POST['tokenNummer'];
    $biedingen = $_POST['bod'];
    
    for($i=0; $i<count($kavels); $i++){
        if($biedingen[$i] === "" || $tokenNummers[$i] === ""){
            $errorMessage = "Niet genoeg gegevens ingevuld. ";
        }
    }
    
} else {
    $errorMessage .= "Niet genoeg gegevens";
}
    
    try{
       if($datum){
           for($i=0; $i<count($kavels); $i++){
               $bieder = $em->vindBiederMetTokenEnDatum($tokenNummers[$i], $datum);
               //todo, replace || with &&
               if($bieder instanceof Veilinghuis\Bieder){
                   $kavel = $em->vindKavelMetKavelNummer($kavels[$i]);
                   $bod = new Bod($bieder->getBiederID(), $kavel->getKavelNummer(), convertToMoney($biedingen[$i]));
                   $em->nieuweBieding($bod);
               } else {
                   $errorMessage .= "Ongeldige bieder/kavel";
               }
           }
       } else {
           $errorMessage = "Ongeldige gegevens";
       }
    } catch (\InvalidArgumentException $ex) {
        $errorMessage .= $ex->getMessage();
    } catch (\Doctrine\DBAL\Exception\UniqueConstraintViolationException $ex2) {
        $errorMessage = "De resultaten van deze veiling zijn al ingevoerd. ";
    }
    
    
    
    if($errorMessage != ""){
        header("location: /invoerenVeilingsresultaten.php?error=".$errorMessage."");
        exit;
    }
    
header("location: /index.php");
exit;
