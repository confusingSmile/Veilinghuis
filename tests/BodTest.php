<?php
require __DIR__.'\..\Veilinghuis\Bod.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use Veilinghuis\Bod;
/**
 * Description of BodTest
 *
 * @author Walter
 */
class BodTest extends \PHPUnit_Framework_TestCase{
    //put your code here
    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage tokenNummer mag niet leeg zijn
     */
    function testTokenNummerMagNietLeegZijn(){
        $tijd = new \DateTimeImmutable();
        $bod = new Bod(null, 2, $tijd, 'hier', 200);
    }
    
    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage tokenNummer moet numeriek zijn
     */
    function testTokenNummerMoetNumeriekZijn(){
        $tijd = new \DateTimeImmutable();
        $bod = new Bod('aap', 2, $tijd, 'hier', 200);
    }
    
    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage kavelNummer mag niet leeg zijn
     */
    function testKavelNummerMagNietLeegZijn(){
        $tijd = new \DateTimeImmutable();
        $bod = new Bod(22, null, $tijd, 'hier', 200); 
    }
    
    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage kavelNummer moet numeriek zijn
     */
    function testKavelNummerMoetNumeriekZijn(){
        $tijd = new \DateTimeImmutable();
        $bod = new Bod(22, 'aap', $tijd, 'hier', 200); 
    }
    
    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage locatie mag niet leeg zijn
     */
    function testPlaatsVeilingMagNietLeegZijn(){
        $tijd = new \DateTimeImmutable();
        $bod = new Bod(1, 2, $tijd, null, 200);
    }
    
    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage locatie moet een string zijn
     */
    function testPlaatsVeilingMoetStringZijn(){
        $tijd = new \DateTimeImmutable();
        $bod = new Bod(1, 2, $tijd, 4, 200);
    } 
    
    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage geboden bedrag mag niet leeg zijn
     */
    function testBedragGebodenMagNietLeegZijn(){
        $tijd = new \DateTimeImmutable();
        $bod = new Bod(1, 2, $tijd, 'hier', null);
    }
    
    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage geboden bedrag moet numeriek zijn
     */
    function testBedragGebodenMoetNumeriekZijn(){
        $tijd = new \DateTimeImmutable();
        $bod = new Bod(1, 2, $tijd, 'hier', 'aap');
    }
    
    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage geboden bedrag is te laag
     */
    function testBedragGebodenMagNietNegatiefZijn(){
       $tijd = new \DateTimeImmutable();
       $bod = new Bod(1, 2, $tijd, 'hier', -2); 
    }
    
    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage geboden bedrag is te laag
     */
    function testBedragGebodenMagNietNulZijn(){
       $tijd = new \DateTimeImmutable();
       $bod = new Bod(1, 2, $tijd, 'hier', 0); 
    }
    
    function testBodWordtBetaald(){
        $tijd = new \DateTimeImmutable();
        $bod = new Bod(22, 2, $tijd, 'hier', 200); 
        $this->assertSame(false, $bod->getBetaald()); 
        $bod->setBetaald();
        $this->assertSame(true, $bod->getBetaald());
    }
    
    function testAlleInputIsJuist(){
        $tijd = new \DateTimeImmutable();
        $bod = new Bod(22, 2, $tijd, 'hier', 200); 
        $this->assertSame(22, $bod->getTokenNummer());
        $this->assertSame(2, $bod->getKavelNummer());
        $this->assertSame($tijd, $bod->getTijdVeiling());
        $this->assertSame('hier', $bod->getPlaatsveiling());
        $this->assertSame(200, $bod->getBedragGeboden());
    }
}
