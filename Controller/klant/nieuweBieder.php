<?php

namespace Controllers;


require_once '../../vendor/autoload.php';
use Database\EntityManager;
use Veilinghuis\Bieder;
use Veilinghuis\Entities\Naam;
use Veilinghuis\Entities\Adres;

$em = new EntityManager();

if(isset($_POST['voornaam'])){
    $biederVoornaam = $_POST['voornaam'];
    $biederTussenvoegsel = $_POST['tussenvoegsel'];
    $biederAchternaam = $_POST['achternaam'];

    $biederStraatnaam = $_POST['straatnaam'];
    $biederHuisnummer = $_POST['huisnummer'];
    $biederHuisnummerToevoeging = $_POST['toevoeging'];
    $biederPostcode = str_replace(" ", "", $_POST['postcode']);
    $biederWoonplaats = $_POST['woonplaats'];
    
    $errorMessage = "";
    try{
        $bieder = new Bieder(new Naam($biederVoornaam, $biederTussenvoegsel, $biederAchternaam), 
                new Adres($biederStraatnaam, (int) $biederHuisnummer, $biederHuisnummerToevoeging,
                        $biederWoonplaats, $biederPostcode));
        $em->nieuweBieder($bieder);
    } catch (\InvalidArgumentException $ex) {
        $errorMessage .= "".$ex->getMessage();
    }
    
    $loader = new \Twig_Loader_Filesystem('C:\xampp\htdocs\ProjectVeilinghuis\twig-templates');
    $twig = new \Twig_Environment($loader);
    
    if($errorMessage !== ""){
        echo $twig->render('registreerBieder.html', array('error' => $errorMessage));
        exit;
    }

header("location: /index.php");
exit;
}
