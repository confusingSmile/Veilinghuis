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

    
    $inkomst1 = array('kavelNaam' => 12, 'bedrag' => '17,50'); 
    $inkomst2 = array('kavelNaam' => 16, 'bedrag' => '21,45');
    $inkomsten = array(0 => $inkomst1, 1 => $inkomst2);
    
echo $twig->render('kasboek.html', array('inkomsten' => $inkomsten));
exit;
