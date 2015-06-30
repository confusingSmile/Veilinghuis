<?php
require_once 'vendor/autoload.php';
    $loader = new Twig_Loader_Filesystem('C:\xampp\htdocs\ProjectVeilinghuis\twig-templates');
    $twig = new Twig_Environment($loader, array(
    'cache' => 'compilation_cache.txt',
));

echo $twig->render('index.html');
exit;