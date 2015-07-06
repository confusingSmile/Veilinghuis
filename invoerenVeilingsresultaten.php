<?php
require_once 'vendor/autoload.php';
    $loader = new Twig_Loader_Filesystem('C:\xampp\htdocs\ProjectVeilinghuis\twig-templates');
    $twig = new Twig_Environment($loader);

//initiate variables for template
    $times = array();
    $time = new DateTime("previous saturday");
    $week = new DateInterval("P7D");
    //chose not to use DateTimeImmutable because I calculate the next weeks 
    for($i=0; $i<3; $i++){
        $times[] = $time->format('Y-m-d');
        $time->add($week);
    }
    
    $kavel1 = array('kavelId' => 1, 'kavelNaam' => 'variabele naam'); 
    
    $bieding1 = array('kavelNaam' => 11, 'tokenNummer' => 12, 'bedrag' => '15,50');
    $bieding2 = array('kavelNaam' => 12, 'tokenNummer' => 15, 'bedrag' => '17,50');
    $biedingen = array(0 => $bieding1, 1 => $bieding2);
    
//end initiating variables for template 
    
echo $twig->render('invoerenVeilingsresultaten.html', array('veilingen' => $times, 'biedingen' => $biedingen));
exit;