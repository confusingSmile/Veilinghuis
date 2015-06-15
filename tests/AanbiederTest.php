<?php

require __DIR__.'\..\Veilinghuis\Aanbieder.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use Veilinghuis\Aanbieder;
use Veilinghuis\Entities\Naam;
use Veilinghuis\Entities\Adres;
/**
 * Description of AanbiederTest
 *
 * @author Walter
 */
class AanbiederTest extends \PHPUnit_Framework_TestCase{
    //put your code here
    function testAlleInputIsJuist(){
        $aanbiederNaam = new Naam('voornaam', 'tussen', 'achternaam');
        $aanbiederAdres = new Adres('straat', 2, 'b', 'Gouda', '1234AB');
        $aanbieder = new Aanbieder($aanbiederNaam, $aanbiederAdres);
        $aanbieder->setAanbiederID(4);
        $this->assertSame(4, $aanbieder->getAanbiederID());
    }
}
