<?php

namespace Controllers;


require_once '../../vendor/autoload.php';
use Database\EntityManager;

$em = new EntityManager();
$klanten = array();
$bieders = $em->vindAlleBieders();
foreach($bieders as $bieder){
    $klanten[] = array('naam' => $bieder->getNaam()->getVoornaam()." ".$bieder->getNaam()->getTussenvoegsel()." ". 
        $bieder->getNaam()->getAchternaam(), 'adres' => $bieder->getAdres()->getStraat()." ".$bieder->getAdres()->getHuisnummer()
            ." ".$bieder->getAdres()->getToevoeging(), 'woonplaats' => $bieder->getAdres()->getWoonplaats(), 
            'id' => $bieder->getBiederID());
}
    
$aanbieders = $em->vindAlleAanbieders();
foreach($aanbieders as $aanbieder){
    $klanten[] = array('naam' => $aanbieder->getNaam()->getVoornaam()." ".$aanbieder->getNaam()->getTussenvoegsel()." ". 
        $aanbieder->getNaam()->getAchternaam(), 'adres' => $aanbieder->getAdres()->getStraat()." ".$aanbieder->getAdres()->getHuisnummer()
            ." ".$aanbieder->getAdres()->getToevoeging(), 'woonplaats' => $aanbieder->getAdres()->getWoonplaats(), 
            'id' => $aanbieder->getAanbiederID());
}
    
    $loader = new \Twig_Loader_Filesystem('C:\xampp\htdocs\ProjectVeilinghuis\twig-templates');
    $twig = new \Twig_Environment($loader);
    

echo $twig->render('klantenregister.html', array('klanten' => $klanten));
exit;
