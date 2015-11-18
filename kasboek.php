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

$inkomstenBod = $em->vindAlleGeslotenBodBetalingen();
    $inkomstenKavel = $em->vindAlleGeslotenKavelBetalingen();
    $inkomsten = array_merge($inkomstenKavel, $inkomstenBod);

    $loader = new Twig_Loader_Filesystem('C:\xampp\htdocs\ProjectVeilinghuis\twig-templates');
    $twig = new Twig_Environment($loader);

echo $twig->render('kasboek.html', array('inkomsten' => $inkomsten));
exit;
