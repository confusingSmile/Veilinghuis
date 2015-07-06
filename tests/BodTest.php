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
        $bod = new Bod(null, 2, 200);
    }
    
    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage tokenNummer moet numeriek zijn
     */
    function testTokenNummerMoetNumeriekZijn(){
        $bod = new Bod('aap', 2, 200);
    }
    
    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage kavelNummer mag niet leeg zijn
     */
    function testKavelNummerMagNietLeegZijn(){
        $bod = new Bod(22, null, 200); 
    }
    
    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage kavelNummer moet numeriek zijn
     */
    function testKavelNummerMoetNumeriekZijn(){
        $bod = new Bod(22, 'aap', 200); 
    }
    
    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage geboden bedrag mag niet leeg zijn
     */
    function testBedragGebodenMagNietLeegZijn(){
        $bod = new Bod(1, 2, null);
    }
    
    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage geboden bedrag moet numeriek zijn
     */
    function testBedragGebodenMoetNumeriekZijn(){
        $bod = new Bod(1, 2, 'aap');
    }
    
    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage geboden bedrag is te laag
     */
    function testBedragGebodenMagNietNegatiefZijn(){
       $bod = new Bod(1, 2, -2); 
    }
    
    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage geboden bedrag is te laag
     */
    function testBedragGebodenMagNietNulZijn(){
       $bod = new Bod(1, 2, 0); 
    }
    
    function testBodWordtBetaald(){
        $bod = new Bod(22, 2, 200); 
        $this->assertSame(false, $bod->getBetaald()); 
        $bod->setBetaald();
        $this->assertSame(true, $bod->getBetaald());
    }
    
    function testAlleInputIsJuist(){
        $bod = new Bod(22, 2, 200); 
        $this->assertSame(22, $bod->getTokenNummer());
        $this->assertSame(2, $bod->getKavelNummer());
        $this->assertSame(200, $bod->getBedragGeboden());
    }
}
