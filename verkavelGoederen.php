<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php

session_start();

if(!isSet($_SESSION['user'])){
    header("location: /index.php");
    exit;
} 


use Database\EntityManager;

require_once 'vendor/autoload.php';

    $em = new EntityManager();
    
    //array van Goederen
    $goederenIn = $em->vindOnverkaveldeGoederen();
    //array van waardes uit Goederen
    $goederenUit = array();
    
    for($i=0; $i < count($goederenIn); $i++){
            $goederenUit[$i]['naam'] = $goederenIn[$i]->getNaam();
            $goederenUit[$i]['omschrijving'] = $goederenIn[$i]->getOmschrijving();
            $goederenUit[$i]['id'] = $goederenIn[$i]->getGoedNummer();
    }
    
    $error = "";
    if(isSet($_GET['error'])){
        $error = $_GET['error'];
    }

    $loader = new \Twig_Loader_Filesystem('C:\xampp\htdocs\ProjectVeilinghuis\twig-templates');
    $twig = new \Twig_Environment($loader);

    echo $twig->render('verkavelGoederen.html', array('error' => $error, 'goederen' => $goederenUit));
exit;
