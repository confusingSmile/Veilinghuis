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
    $kavel1 = array('kavelId' => 1, 'kavelNaam' => 'variabele naam',
                                                                    'kavelOmschrijving' => 'Dit is een kavel blabla voorbeeld etc. ');
    $kavel2 = array('kavelId' => 2, 'kavelNaam' => 'variabele naam',
                                                                    'kavelOmschrijving' => 'Dit is een kavel blabla voorbeeld etc. ');
    $kavels = array('kavel1' => $kavel1, 'kavel2' => $kavel2);

echo $twig->render('bekijkKavellijst.html', array('kavels' => $kavels));
exit;
