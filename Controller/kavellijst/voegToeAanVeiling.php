<?php

namespace Controllers;


require_once '../../vendor/autoload.php';
use Database\EntityManager;
use Veilinghuis\Kavellijst;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//TODO start programming this for real
$em = new EntityManager();
if(isSet($_POST['kavellijstNummers'])){
    $kavellijstnummers = $_POST['kavellijstNummers'];
    $veilingsdatum = $_POST['datumVeiling'];
   
    
    $errorMessage = "";
   
    try{
        foreach($kavellijstnummers as $nummer){
            $em->wijsKavellijstToeAanVeiling(new Kavellijst($nummer), $veilingsdatum);
        }
    } catch (\InvalidArgumentException $ex) {
        $errorMessage .= "".$ex->getMessage();
    } catch (\Doctrine\DBAL\Exception\UniqueConstraintViolationException $ex2) {
        $errorMessage .= "Deze veiling heeft al een kavellijst toegewezen gekregen";
    }


    if($errorMessage !== ""){
        header("location: /toewijzenKavellijst.php?error=".$errorMessage."");
        exit;
    }
}

header("location: /index.php");
exit;

