<?php

namespace Controllers;


require_once '../../vendor/autoload.php';
use Database\EntityManager;
use Veilinghuis\Aanbieder;
use Veilinghuis\Entities\Naam;
use Veilinghuis\Entities\Adres;

$em = new EntityManager();

session_start();
//in order to inform the appropriate controller. they're still a bit wonky here...
$_SESSION['goedNaam'] = $_POST['goednaam'];
$_SESSION['goedOmschrijving'] = $_POST['omschrijving'];
$_SESSION['aanbiederID'] = $_POST['aanbiederID'];

if(isSet($_POST['aanbiederID']) && $em->vindAanbiederMetAanbiederID($_POST['aanbiederID'])){
    
    header("location: /Controller/kavel/nieuwGoed.php");
}else if(isset($_POST['voornaam'])){
    $aanbiederVoornaam = $_POST['voornaam'];
    $aanbiederTussenvoegsel = $_POST['tussenvoegsel'];
    $aanbiederAchternaam = $_POST['achternaam'];

    $aanbiederStraatnaam = $_POST['straatnaam'];
    $aanbiederHuisnummer = $_POST['huisnummer'];
    $aanbiederHuisnummerToevoeging = $_POST['toevoeging'];
    $aanbiederPostcode = str_replace(" ", "", $_POST['postcode']);
    $aanbiederWoonplaats = $_POST['woonplaats'];
    
    $errorMessage = "";
    try{
        $aanbieder = new AanBieder(new Naam($aanbiederVoornaam, $aanbiederTussenvoegsel, $aanbiederAchternaam), 
                new Adres($aanbiederStraatnaam, (int) $aanbiederHuisnummer, $aanbiederHuisnummerToevoeging,
                        $aanbiederWoonplaats, $aanbiederPostcode));
        $em->nieuweAanbieder($aanbieder);
        $_SESSION['aanbiederID'] = $em->vindNieuwsteAanbiederID();
    } catch (\InvalidArgumentException $ex) {
        $errorMessage .= "".$ex->getMessage();
    }
    
    $loader = new \Twig_Loader_Filesystem('C:\xampp\htdocs\ProjectVeilinghuis\twig-templates');
    $twig = new \Twig_Environment($loader);
    
    if($errorMessage !== ""){
        echo $twig->render('registreerGoederen.html', array('error' => $errorMessage));
        exit;
    }

header("location: /Controller/kavel/nieuwGoed.php");
exit;
}
