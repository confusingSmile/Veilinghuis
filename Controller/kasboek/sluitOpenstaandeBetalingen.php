<?php

namespace Controllers;


require_once '../../vendor/autoload.php';
use Database\EntityManager;

$em = new EntityManager();


if(isSet($_POST['betaald'])){
    foreach(array_keys($_POST['betaald']) as $kavelnummer){
        $kavel = $em->vindKavelMetKavelNummer($kavelnummer);
        $em->sluitBetalingenOpKavel($kavel);
    }
}

header("location: /openstaandeBetalingen.php");
exit;