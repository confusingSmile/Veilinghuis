<?php
require_once 'vendor/autoload.php';
use Database\EntityManager;

    $em = new EntityManager();

//initiate variables for template
    //haal alle datums op
    $times = array();
    $time = new DateTime("previous saturday");
    $week = new DateInterval("P7D");
    //chose not to use DateTimeImmutable because I calculate the next weeks 
    for($i=0; $i<3; $i++){
        $time->add($week);
        $times[] = $time->format('Y-m-d');
    }
    
    //haal eventuele error message op
    $error = "";
    if(isSet($_GET['error'])){
        $error = $_GET['error'];
    }
    
    //haal kavellijsten op
    $kavellijstObjecten = $em->vindKavellijstenZonderVeiling();
    $kavellijsten = null;
    for($k=0; $k < count($kavellijstObjecten); $k++){
        $kavelObjecten = $em->vindKavelsMetKavellijstnummer($kavellijstObjecten[$k]->getKavellijstId());
        $kavels = "";
        if (is_array($kavelObjecten)) {
            for ($m=0; $m <count($kavelObjecten);$m++) {
                $kavels[$m] = array('naam' => $kavelObjecten[$m]->getNaam(), 'omschrijving' => $kavelObjecten[$m]->getOmschrijving());
            }
            $kavellijsten[$k] = array('id' => $kavellijstObjecten[$k]->getKavellijstId(), 'kavel' => $kavels);
        } 
        
        
        
    }
    
    
//end initiating variables for template 
    
    $loader = new Twig_Loader_Filesystem('C:\xampp\htdocs\ProjectVeilinghuis\twig-templates');
    $twig = new Twig_Environment($loader);
    
   
echo $twig->render('toewijzenKavellijst.html', array('error' => $error, 'veilingen' => $times, 'kavellijsten' => $kavellijsten));
exit;