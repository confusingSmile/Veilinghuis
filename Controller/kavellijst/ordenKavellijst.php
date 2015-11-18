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

require_once '../../vendor/autoload.php';

  $em = new EntityManager();
  
$errorMessage = "";
if(!isSet($_POST['kavelNummers'])){
    header("location: /sorteerKavellijst.php");
}

$volgorde = array_reverse($_POST['kavelNummers']);
$em->ordenKavellijst($volgorde);
    
    
    $loader = new Twig_Loader_Filesystem('C:\xampp\htdocs\ProjectVeilinghuis\twig-templates');
    $twig = new Twig_Environment($loader);
    

header("location: /index.php");
exit;
