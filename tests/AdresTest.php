<?php

require __DIR__.'\..\Veilinghuis\entities\Adres.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use Veilinghuis\Entities\Adres;
/**
 * Description of AdresTest
 *
 * @author Walter
 */
class AdresTest extends \PHPUnit_Framework_TestCase{
    //put your code here
    
    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage straatnaam mag niet leeg zijn
     */
    function testStraatMagNietLeegZijn(){
        $adres = new Adres(null, 2, 'b', 'Gouda', '1234AB');
    }
    
    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage straatnaam moet een string zijn
     */
    function testStraatMoetEenStringZijn(){
        $adres = new Adres(2, 2, 'b', 'Gouda', '1234AB');
    }
    
    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage straatnaam mag maximaal uit 46 tekens bestaan
     */
    function testStraatMaxLengte(){
         $adres = new Adres('Burgemeester Jonkheer teken Hesselt van Dinterstraat', 
                             2, 'b', 'Gouda', '1234AB');
    }
    
    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage huisnummer mag niet leeg zijn
     */
    function testHuisnummerMagNietLeegZijn(){
        $adres = new Adres('straat', null, 'b', 'Gouda', '1234AB');
    }
    
    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage huisnummer moet een integer zijn
     */
    function testHuisnummerMoetEenIntZijn(){
        $adres = new Adres('straat', 'aap', 'b', 'Gouda', '1234AB');
    }
    
    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage huisnummer moet groter zijn dan 0
     */
    function testHuisnummerMoetGroterZijnDanNul(){
        $adres = new Adres('straat', -5, 'b', 'Gouda', '1234AB');
    }
    
    function testToevoegingIsOptioneel(){
        $adres = new Adres('straat', 2, null, 'Gouda', '1234AB');
        $this->assertSame('', $adres->getToevoeging());
    }
    
    function testToevoegingIsOptioneel2(){
        $adres = new Adres('straat', 2, 203, 'Gouda', '1234AB');
        $this->assertSame('203', $adres->getToevoeging());
    }
    
    function testToevoegingIsOptioneel3(){
        $adres = new Adres('straat', 2, 'b', 'Gouda', '1234AB');
        $this->assertSame('b', $adres->getToevoeging());
    }
    
    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage woonplaats mag niet leeg zijn
     */
    function testWoonplaatsMagNietLeegZijn(){
        $adres = new Adres('straat', 2, 'b', null, '1234AB');
    }
    
    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage woonplaats moet een string zijn
     */
    function testWoonplaatsMoetEenStringZijn(){
        $adres = new Adres('straat', 2, 'b', 3, '1234AB');
    }
    
    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage woonplaats mag maximaal uit 28 tekens bestaan
     */
    function testWoonplaatsMaxLengte(){
        $adres = new Adres('straat', 2, 'b', 'Westerhaar-teken-Vriezenveensewijk', '1234AB');
    }
    
    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage ongeldige postcode
     */
    function testPostcodeFormat(){
        $adres = new Adres('straat', 2, 'b', 'woonplaats', '123ABC');
    }
    
    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage ongeldige postcode
     */
    function testPostcodeFormat2(){
        $adres = new Adres('straat', 2, 'b', 'woonplaats', '0123AB');
    }
    
    function testAlleInputIsJuist(){
        $adres = new Adres('straat', 2, 'b', 'Gouda', '1234AB');
        $this->assertSame($adres->getStraat(), 'straat');
        $this->assertSame($adres->getHuisnummer(), 2);
        $this->assertSame($adres->getToevoeging(), 'b');
        $this->assertSame($adres->getWoonplaats(), 'Gouda');
        $this->assertSame($adres->getPostcode(), '1234AB');
        
    }
}
