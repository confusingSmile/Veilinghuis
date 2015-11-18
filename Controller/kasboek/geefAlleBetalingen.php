<?php

namespace Controllers;
session_start();

if(!isSet($_SESSION['user'])){
    header("location: /index.php");
    exit;
} 





require_once '../../vendor/autoload.php';
use Database\EntityManager;

$em = new EntityManager();





    $loader = new \Twig_Loader_Filesystem('C:\xampp\htdocs\ProjectVeilinghuis\twig-templates');
    $twig = new \Twig_Environment($loader);
    

echo $twig->render('klantenregister.html', array('klanten' => $klanten));
exit;

