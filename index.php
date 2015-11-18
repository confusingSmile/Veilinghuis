<?php
require_once __DIR__.'/vendor/autoload.php';
    $loader = new Twig_Loader_Filesystem('C:\xampp\htdocs\ProjectVeilinghuis\twig-templates');
    $twig = new Twig_Environment($loader);
    

session_start();

if(isSet($_SESSION['user'])){
    echo $twig->render('index.html');
    exit;
} 

echo $twig->render('login.html');
