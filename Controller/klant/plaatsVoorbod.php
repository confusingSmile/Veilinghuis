<?php

namespace Controller;
session_start();

if(!isSet($_SESSION['user'])){
    header("location: /index.php");
    exit;
} 




require_once '../../vendor/autoload.php';
include('/../../assets/variableToMoney.functions.php');
use Database\EntityManager;
use Veilinghuis\Bod;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$em = new EntityManager();

if(isSet($_POST['bieder_id'])){
    $biedernummer = $_POST['bieder_id'];
    $kavelnummer = $_POST['kavelNummer'];
    $bedrag = $_POST['bedrag'];
    
    $bieder = $em->vindBiederMetBiederID($biedernummer);
    $kavel = $em->vindKavelMetKavelNummer($kavelnummer);
    
    $errorMessage = "";
    if($bieder && $kavel){
        try{
            $bedrag = convertToMoney($bedrag);
            $bod = new Bod($bieder->getBiederID(), $kavel->getKavelNummer(), $bedrag);
            $em->registreerVoorbod($bod);
        } catch (\InvalidArgumentException $ex) {
        $errorMessage .= "".$ex->getMessage();
    } catch (\Doctrine\DBAL\Exception\UniqueConstraintViolationException $ex2) {
        $em->verwijderVoorbod($bieder, $kavel);
        $em->registreerVoorbod($bieder, $kavel, $bedrag);
    }
    
    
    } else {
        $errorMessage .= "Het Biedernumemr en/of het Kavelnummer is/zijn incorrect.";
    }
    
    $loader = new \Twig_Loader_Filesystem('C:\xampp\htdocs\ProjectVeilinghuis\twig-templates');
    $twig = new \Twig_Environment($loader);
    
    if($errorMessage !== ""){
        echo $twig->render('nieuwVoorbod.html', array('error' => $errorMessage));
        exit;
    }
}

header("location: /index.php");
exit;

