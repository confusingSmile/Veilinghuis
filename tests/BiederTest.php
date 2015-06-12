<?php

require __DIR__.'\..\Veilinghuis\Bieder.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use Veilinghuis\Bieder;
use Veilinghuis\Entities\Naam;
/**
 * Description of BiederTest
 *
 * @author Walter
 */
class BiederTest extends \PHPUnit_Framework_TestCase{
    //put your code here
    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Voorbod moet positief zijn
     */
    function testVoorbodMagNietNegatiefZijn(){
        $bieder = new Bieder(new Naam('voornaam', 'tussen', 'achternaam'), 'adres 2b', 'woonplaats', 20);
        $bieder->setMaxVoorbod(-5);
    }
    
    function testVoorbodIsJuist(){
        $bieder = new Bieder(new Naam('voornaam', 'tussen', 'achternaam'), 'adres 2b', 'woonplaats', 20);
        $bieder->setMaxVoorbod(5);
        $this->assertSame(5, $bieder->getMaxVoorbod());
    }
    
    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Voorbod moet numeriek zijn
     */ 
    function testVoorbodMoetEenGetalZijn(){
        $bieder = new Bieder(new Naam('voornaam', 'tussen', 'achternaam'), 'adres 2b', 'woonplaats', 20);
        $bieder->setMaxVoorbod('aap');
    }
    
    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Naam moet een string zijn
     */ 
    function testNaamIsNaam(){
        $bieder = new Bieder('array()', 'adres 2b', 'woonplaats', 20);
    }
    
    function testNaamIsJuist(){
        $biederNaam = new Naam('voornaam', 'tussen', 'achternaam');
        $bieder = new Bieder($biederNaam, 'adres 2b', 'woonplaats', 20);
        $this->assertSame($biederNaam, $bieder->getNaam());
    }
}
