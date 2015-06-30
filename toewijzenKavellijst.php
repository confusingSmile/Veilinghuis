<?php
require_once 'vendor/autoload.php';
    $loader = new Twig_Loader_Filesystem('C:\xampp\htdocs\ProjectVeilinghuis\twig-templates');
    $twig = new Twig_Environment($loader, array(
    'cache' => 'compilation_cache',
));

//initiate variables for template
    $times = array();
    $time = new DateTime("previous saturday");
    $week = new DateInterval("P7D");
    //chose not to use DateTimeImmutable because I calculate the next weeks 
    for($i=0; $i<3; $i++){
        $time->add($week);
        $times[] = $time->format('Y-m-d');
    }
    
    
//end initiating variables for template 
    
echo $twig->render('toewijzenKavellijst.html', array('veilingen' => $times));
exit;