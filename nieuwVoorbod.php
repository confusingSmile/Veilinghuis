<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


require_once 'vendor/autoload.php';
    $loader = new Twig_Loader_Filesystem('C:\xampp\htdocs\ProjectVeilinghuis\twig-templates');
    $twig = new Twig_Environment($loader);

$bedragGeboden = 1;
$tokenNummer = 5;
$kavelNummer = 2;
$tijdVeiling = new DateTimeImmutable('next saturday');

$bod = array('bedragGeboden' => $bedragGeboden, 'tokenNummer' => $tokenNummer, 
        'kavelNummer'=> $kavelNummer, 'tijdVeiling'=> $tijdVeiling);

echo $twig->render('nieuwVoorbod.html', array('bod' => $bod));
exit;