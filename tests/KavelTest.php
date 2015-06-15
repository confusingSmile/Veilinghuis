<?php
require __DIR__.'\..\Veilinghuis\Kavel.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use Veilinghuis\Kavel;
/**
 * Description of KavelTest
 *
 * @author Walter
 */
class KavelTest extends \PHPUnit_Framework_TestCase{
    //put your code here
    
    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage naam mag niet leeg zijn
     */
    function testNaamMagNietLeegZijn(){
        $kavel = new Kavel(null, 'test');
    }
    
    
    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage naam moet een string zijn
     */
    function testNaamMoetStringZijn(){
        $kavel = new Kavel(2, 'test');
    }
    
    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage naam mag maximaal uit 100 tekens bestaan
     */
    function testNaamMaxLengte(){
        $kavel = new Kavel('123456789098765432112345678909876543211234567890987654321'
                . '123456789098a65432112345678909876543211234567890987654321'
                . '123456789098765432112345678909876543211234567890987654321'
                . '12345678909876543211234567890987654321', 'test');
    }
    
    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage omschrijving mag niet leeg zijn
     */
    function testOmschrijvingMagNietLeegZijn(){
        $kavel = new Kavel('naam', null);
    }
    
     /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage omschrijving moet een string zijn
     */
    function testOmschrijvingMoetStringZijn(){
        $kavel = new Kavel('naam', 2);
    }
    
     /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage omschrijving mag maximaal uit 250 tekens bestaan
     */
    function testOmschrijvingMaxLengte(){
        $kavel = new Kavel('naam', '123456789009876543211234567890098765432112345678900987654321'
                . '12345678900987654321123456789009876543211234567890098765432112345678900987654321'
                . '12345678900987654321123456789009876543211234567890098765432112345678900987654321'
                . '12345678900987654321123456789009876543211234567890098765432112345678900987654321'
                . '');
    }
    
    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage kavelNummer mag niet leeg zijn
     */
    function testKavelNummerMagNietLeegZijn(){
        $kavel = new Kavel('test', 'testing');
        $kavel->setKavelNummer(null);
    }
    
    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage kavelNummer moet numeriek zijn
     */
    function testKavelNummerMoetNumeriekZijn(){
        $kavel = new Kavel('test', 'testing');
        $kavel->setKavelNummer('hallo, ik ben een kavelnummer');
    }
    
    function testAlleInputIsJuist(){
        $kavel = new Kavel('test', 'testing');
        $this->assertSame('test', $kavel->getNaam());
        $this->assertSame('testing', $kavel->getOmschrijving());
        
    }
}
