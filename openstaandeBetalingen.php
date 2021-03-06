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


require_once 'vendor/autoload.php';

use Database\EntityManager;

$em = new EntityManager();

$betalingenBod = $em->vindAlleOpenBodBetalingen();
$betalingenKavel = $em->vindAlleOpenKavelBetalingen();
$betalingen = array_merge($betalingenKavel, $betalingenBod);

    $loader = new Twig_Loader_Filesystem('C:\xampp\htdocs\ProjectVeilinghuis\twig-templates');
    $twig = new Twig_Environment($loader);

echo $twig->render('openstaandeBetalingen.html', array('betalingen' => $betalingen));
exit;
