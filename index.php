<?php
require_once 'vendor/autoload.php';
    $loader = new Twig_Loader_Filesystem('C:\xampp\htdocs\ProjectVeilinghuis\twig-templates');
    $twig = new Twig_Environment($loader);
    
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Controller\KlantController;

$a = new KlantController();
$a->geefKlanten($request, $response);

if(!isset($_GET['params'])){
    
    echo $twig->render('index.html');
    exit;
}
$url = $_GET['params'];
$router = new League\Route\RouteCollection;

$router->addRoute('GET', 'index.php', function(Request $request, Response $response){
    return $response;
});

$router->addRoute('GET', 'Controller/klant/geefKlanten', 'KlantController::geefKlanten');

$dispatcher = $router->getDispatcher();


$response = $dispatcher->dispatch('GET', $url);

$response->send();


exit;