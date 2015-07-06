<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
require_once 'vendor/autoload.php';
    $loader = new Twig_Loader_Filesystem('C:\xampp\htdocs\ProjectVeilinghuis\twig-templates');
    $twig = new Twig_Environment($loader);
    
    $klant1 = array('naam' => 'Henk', 'adres' => 'straat ##b', 'woonplaats' =>'woonplaats', 'id' => 'tokenNummer');
    $klant2 = array('naam' => 'Piet', 'adres' => 'straat ###c', 'woonplaats' =>'woonplaats', 'id' => 'biederId'); 
    $klanten = array(0 => $klant1, 1 => $klant2);

echo $twig->render('klantenregister.html', array('klanten' => $klanten));
exit;
