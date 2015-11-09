<?php

namespace Controllers;
use Veilinghuis\Goed;
use Database\EntityManager;

require_once '../../vendor/autoload.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
if(!isSet($_SESSION['aanbiederID'])){
    header("location: /index.php");
}

$em = new EntityManager();

$goednaam = $_SESSION['goedNaam'];
$goedOmschrijving = $_SESSION['goedOmschrijving'];
$goedAanbiederID = $_SESSION['aanbiederID'];

$errorMessage = "";

try {
    $goed = new Goed($goednaam, $goedOmschrijving, $goedAanbiederID);
    $em->nieuwGoed($goed);
} catch (\InvalidArgumentException $ex) {
        $errorMessage .= "".$ex->getMessage();
    }
    
    $loader = new \Twig_Loader_Filesystem('C:\xampp\htdocs\ProjectVeilinghuis\twig-templates');
    $twig = new \Twig_Environment($loader);
    
    if($errorMessage !== ""){
        echo $twig->render('registreerGoederen.html', array('error' => $errorMessage, 'aanbiederID' => $goedAanbiederID));
        exit;
    }
    
header("location: /index.php");
exit;