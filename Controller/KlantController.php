<?php
namespace Controller;
require_once 'vendor/autoload.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
/**
 * Description of KavelController
 *
 * @author Walter
 */
class KlantController {
    //put your code here
    
    public function geefKlanten(Request $request, Response $response){
        echo "entity manager -> give all Bieders AND Aanbieders<br>";
        echo "assuming this constructs objects from the DB, no checks should be needed<br>";
        echo "for each (Bieder/Aanbieder), put Naam, Adres and \"Classname: id\" in an array<br>";
        echo "render klantenregister<br>";
        
        
        $loader = new \Twig_Loader_Filesystem('C:\xampp\htdocs\ProjectVeilinghuis\twig-templates');
        
        $twig = new \Twig_Environment($loader);

        $klant1 = array('naam' => 'Henk', 'adres' => 'straat ##b', 'woonplaats' =>'woonplaats', 'id' => 'tokenNummer');
        $klant2 = array('naam' => 'Piet', 'adres' => 'straat ###c', 'woonplaats' =>'woonplaats', 'id' => 'biederId'); 
        $klanten = array(0 => $klant1, 1 => $klant2);

        echo $twig->render('klantenregister.html', array('klanten' => $klanten));
        exit;
        return $response;
    }
    
}
