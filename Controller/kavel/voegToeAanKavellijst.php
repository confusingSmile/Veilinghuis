<?php

namespace Controllers;
session_start();

if(!isSet($_SESSION['user'])){
    header("location: /index.php");
    exit;
} 





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
if(isSet($_POST['kavelNummers'])){
    $kavelnummers = $_POST['kavelNummers'];
    $kavellijstnummer = $em->volgendKavellijstnummer();
    
    $errorMessage = "";
    try{
        $kavellijst = new Kavellijst($kavellijstnummer);
        $em->verwijderLozeKavellijsten();
        $em->maakKavellijstAan();
        $plaats_op_lijst = 1;
        foreach($kavelnummers as $kavelnummer){
            $kavel = $em->vindKavelMetKavelNummer($kavelnummer);
            $em->voegToeAanKavellijst($kavel, $kavellijstnummer, $plaats_op_lijst);
            $plaats_op_lijst ++;
        }
    } catch (\InvalidArgumentException $ex) {
        $errorMessage .= "".$ex->getMessage();
    }

    $loader = new \Twig_Loader_Filesystem('C:\xampp\htdocs\ProjectVeilinghuis\twig-templates');
    $twig = new \Twig_Environment($loader);

    if($errorMessage !== ""){
        echo $twig->render('verkavelGoederen.html');
        exit;
    }
}

header("location: /index.php");
exit;

