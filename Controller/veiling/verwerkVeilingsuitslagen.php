<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php

use Database\EntityManager;

require_once 'vendor/autoload.php';

    $em = new EntityManager();
    
    
    
    $loader = new Twig_Loader_Filesystem('C:\xampp\htdocs\ProjectVeilinghuis\twig-templates');
    $twig = new Twig_Environment($loader);
    

echo $twig->render('/index.html', array('kavels' => $kavels));
exit;
