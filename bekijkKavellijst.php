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
    
    $datum = new DateTime("next saturday");
    $datum->format('Y-m-d');
    
    
    $kavellijst = $em->vindKavellijstMetDatum($datum);
    $kavels = "";
    
    if($kavellijst){
        $kavelObjecten = $em->vindKavelsMetKavellijstnummer($kavellijst->getKavellijstId());
        foreach($kavelObjecten as $kavel){
            $kavels[] = array('naam' => $kavel->getNaam(), 
                              'omschrijving' => $kavel->getOmschrijving(),
                              'kavelnummer' => $kavel->getKavelNummer());
        }
    }
    
    $loader = new Twig_Loader_Filesystem('C:\xampp\htdocs\ProjectVeilinghuis\twig-templates');
    $twig = new Twig_Environment($loader);
    

echo $twig->render('bekijkKavellijst.html', array('kavels' => $kavels));
exit;
