<?php
use Database\EntityManager;
use Veilinghuis\Bod;

require_once 'vendor/autoload.php';

$em = new EntityManager();


//retreiving dates for the Veilingen
    $times = array();
    $time = new DateTime("previous saturday");
    $week = new DateInterval("P7D");
    //chose not to use DateTimeImmutable because I calculate the next weeks 
    for($i=0; $i<2; $i++){
        if ($em->vindKavellijstMetDatum($time)) {
            $times[] = $time->format('Y-m-d');
        }
        $time->add($week);
    }
    
    //defaulting to next auction
    $datum = new DateTime("previous saturday");
    $datum->format('Y-m-d');
    $kavellijst = $em->vindKavellijstMetDatum($datum);
    $tableData = null;
    
    //keeping it flexible enough to grant more leeway in how many weeks later it will check
    for($i=0; $i<2; $i++){
        if(!$kavellijst){
            $datum->add($week);
            $kavellijst = $em->vindKavellijstMetDatum($datum);
        } else {
            break;
        }
    }
    
    if($kavellijst){
        $kavellijstNummer = $kavellijst->getKavellijstId();
        $kavels = $em->vindKavelsMetKavellijstnummer($kavellijstNummer);
        
        if(is_array($kavels)){
            
            unset($tableData);
            
            foreach($kavels as $kavel){
                $tokenNummer = null;
                $bedrag = null;
                $voorbod = $em->vindVoorbodOpKavel($kavel);
                if($voorbod || $voorbod instanceof Bod){
                    $bieder = $em->vindBiederMetBiederID($voorbod->getBiederNummer());
                    $tokenNummer = $em->vindTokenMetBiederEnDatum($bieder, $datum);
                    $bedrag = $voorbod->getBedragGeboden();
                }
                $tableData[] = array('kavel' => $kavel->getKavelNummer(), 
                    'kavelNaam' => $kavel->getNaam(), 'tokenNummer' => $tokenNummer,
                    'bedrag' => $bedrag);
            }
            //if there's only 1 Kavel on auction
        }else if($kavels){
            $tokenNummer = null;
            $bedrag = null;
            $voorbod = $em->vindVoorbodOpKavel($kavels);
            if($voorbod || $voorbod instanceof Bod){
                $bieder = $em->vindBiederMetBiederID($voorbod->getBiederNummer());
                $tokenNummer = $em->vindTokenMetBiederEnDatum($bieder, $datum);
                $bedrag = $voorbod->getBedragGeboden();
            }
            unset($tableData);
            $tableData[] = array('kavel' => $kavels->getKavelNummer(), 
                'kavelNaam' => $kavels->getNaam(), 'tokenNummer' => $tokenNummer,
                'bedrag' => $bedrag);
        }
    }
     
    
    
//end initiating variables for template 
        $loader = new Twig_Loader_Filesystem('C:\xampp\htdocs\ProjectVeilinghuis\twig-templates');
        $twig = new Twig_Environment($loader);
    
    
echo $twig->render('invoerenVeilingsresultaten.html', array('veilingen' => $times, 'tableData' => $tableData));
exit;