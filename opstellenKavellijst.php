<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
use Database\EntityManager;
require_once 'vendor/autoload.php';

$em = new EntityManager();
    
    //array van Kavels
    $kavelsIn = $em->vindKavelsZonderLijst();
    //array van waardes uit Kavels
    $kavelsUit = array();

    
    for($i=0; $i < count($kavelsIn); $i++){
            $kavelsUit[$i]['naam'] = $kavelsIn[$i]->getNaam();
            $kavelsUit[$i]['omschrijving'] = $kavelsIn[$i]->getOmschrijving();
            $kavelsUit[$i]['id'] = $kavelsIn[$i]->getKavelNummer();
    }
    
    $loader = new Twig_Loader_Filesystem('C:\xampp\htdocs\ProjectVeilinghuis\twig-templates');
    $twig = new Twig_Environment($loader);

echo $twig->render('opstellenKavellijst.html', array('kavels' => $kavelsUit));
exit;
