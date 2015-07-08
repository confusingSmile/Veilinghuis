<?php
namespace Controller;
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
        echo "assuming this constructs objects from the DB, no checks should be needed";
        echo "for each (Bieder/Aanbieder), put Naam, Adres and \"Classname: id\" in an array";
        echo "render klantenregister";
    }
    
}
