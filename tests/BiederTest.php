<?php

require __DIR__.'\..\Veilinghuis\Bieder.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use Veilinghuis\Bieder;
use Veilinghuis\Entities\Naam;
use Veilinghuis\Entities\Adres;
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
        $biederNaam = new Naam('voornaam', 'tussen', 'achternaam');
        $biederAdres = new Adres('straat', 2, 'b', 'Gouda', '1234AB');
        $bieder = new Bieder($biederNaam, $biederAdres, 20);
        $bieder->setMaxVoorbod(-5);
    }
    
    function testVoorbodIsJuist(){
        $biederNaam = new Naam('voornaam', 'tussen', 'achternaam');
        $biederAdres = new Adres('straat', 2, 'b', 'Gouda', '1234AB');
        $bieder = new Bieder($biederNaam, $biederAdres, 20);
        $bieder->setMaxVoorbod(5);
        $this->assertSame(5, $bieder->getMaxVoorbod());
    }
    
    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Voorbod moet numeriek zijn
     */ 
    function testVoorbodMoetEenGetalZijn(){
        $biederNaam = new Naam('voornaam', 'tussen', 'achternaam');
        $biederAdres = new Adres('straat', 2, 'b', 'Gouda', '1234AB');
        $bieder = new Bieder($biederNaam, $biederAdres, 20);
        $bieder->setMaxVoorbod('aap');
    }
    
}
