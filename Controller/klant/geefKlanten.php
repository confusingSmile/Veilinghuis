<?php

namespace Controllers;


require_once '../../vendor/autoload.php';
include('../../config/config_db_local.php');
use Database\EntityManager;

$em = new EntityManager($connectionParams);
$klanten = array();
$bieders = $em->vindAlleBieders();
    foreach($bieders as $bieder){
        $klanten[] = array('naam' => $bieder->getNaam()->getVoornaam()." ".$bieder->getNaam()->getTussenvoegsel()." ". 
            $bieder->getNaam()->getAchternaam(), 'adres' => $bieder->getAdres()->getStraat()." ".$bieder->getAdres()->getHuisnummer()
                ." ".$bieder->getAdres()->getToevoeging(), 'woonplaats' => $bieder->getAdres()->getWoonplaats(), 
                'id' => $bieder->getBiederID());
    }
    session_start();
$_SESSION['klanten'] = $klanten;
header("location: ../../klantenregister.php");
