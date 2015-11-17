<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
require_once 'vendor/autoload.php';

use Database\EntityManager;

$em = new EntityManager();

$betalingen = $em->vindAlleOpenBodBetalingen();

    $loader = new Twig_Loader_Filesystem('C:\xampp\htdocs\ProjectVeilinghuis\twig-templates');
    $twig = new Twig_Environment($loader);

echo $twig->render('openstaandeBetalingen.html', array('betalingen' => $betalingen));
exit;
