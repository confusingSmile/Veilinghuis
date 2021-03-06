<?php

namespace Controllers;
session_start();

if(!isSet($_SESSION['user'])){
    header("location: /index.php");
    exit;
} 





require_once '../../vendor/autoload.php';
use Database\EntityManager;
use Veilinghuis\Kavel;

$em = new EntityManager();

if(isset($_POST['kavelOmschrijving'])){
    $kavelOmschrijving = $_POST['kavelOmschrijving'];
    $kavelNaam = $_POST['kavelNaam'];
    $geselecteerdeGoednummers = $_POST['goedNummers'];
    
    $kavelnummer = $em->volgendKavelnummer();
    
    $errorMessage = "";
    
    try{
        $kavel = new Kavel($kavelNaam, $kavelOmschrijving);
        $em->maakNieuwKavel($kavel);
        foreach($geselecteerdeGoednummers as $nummer){
            $goedTeVerkavelen = $em->vindGoedMetGoednummer($nummer);
            $em->verkavelGoed($goedTeVerkavelen, $kavelnummer);
        }
        
    } catch (\InvalidArgumentException $ex) {
        $errorMessage .= "".$ex->getMessage();
    }
    
    $loader = new \Twig_Loader_Filesystem('C:\xampp\htdocs\ProjectVeilinghuis\twig-templates');
    $twig = new \Twig_Environment($loader);
    
    if($errorMessage !== ""){
        header("location: /verkavelGoederen.php?error=".$errorMessage."");
        exit;
    }
    
}

header("location: /index.php");
exit;

