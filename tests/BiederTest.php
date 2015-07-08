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
    
    function testAlleInputIsJuist(){
        $biederNaam = new Naam('voornaam', 'tussen', 'achternaam');
        $biederAdres = new Adres('straat', 2, 'b', 'Gouda', '1234AB');
        $bieder = new Bieder($biederNaam, $biederAdres, 20);
        $this->assertSame(20, $bieder->geTokennummer());
        $this->assertSame($biederNaam, $bieder->getNaam());
        $this->assertSame($biederAdres, $bieder->getAdres());
    }
    
    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage tokenNummer mag niet leeg zijn
     */
    function testTokenNummerMagNietLeegZijn(){
        $biederNaam = new Naam('voornaam', 'tussen', 'achternaam');
        $biederAdres = new Adres('straat', 2, 'b', 'Gouda', '1234AB');
        $bieder = new Bieder($biederNaam, $biederAdres, null);
    }
    
    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage tokenNummer moet numeriek zijn
     */
    function testTokenNummerMoetNumeriekZijn(){
        $biederNaam = new Naam('voornaam', 'tussen', 'achternaam');
        $biederAdres = new Adres('straat', 2, 'b', 'Gouda', '1234AB');
        $bieder = new Bieder($biederNaam, $biederAdres, 'aap');
    }
}
