<?php
require __DIR__.'\..\Veilinghuis\Goed.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use Veilinghuis\Goed;
/**
 * Description of GoedTest
 *
 * @author Walter
 */
class GoedTest {
    //put your code here
    
    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage naam mag niet leeg zijn
     */
    function testNaamMagNietLeegZijn(){
        $goed = new Goed(null, 'test', 1);
    }
    
    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage naam moet een string zijn
     */
    function testNaamMoetStringZijn(){
        $goed = new Goed(2, 'test', 1);
    }
    
    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage naam mag maximaal uit 100 tekens bestaan
     */
    function testNaamMaxLengte(){
        $goed = new Goed('123456789098765432112345678909876543211234567890987654321'
                . '123456789098a65432112345678909876543211234567890987654321'
                . '123456789098765432112345678909876543211234567890987654321'
                . '12345678909876543211234567890987654321', 'test', 1);
    }
    
    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage omschrijving mag niet leeg zijn
     */
    function testOmschrijvingMagNietLeegZijn(){
        $goed = new Goed('naam', null, 1);
    }
    
     /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage omschrijving moet een string zijn
     */
    function testOmschrijvingMoetStringZijn(){
        $goed = new Goed('naam', 2, 1);
    }
    
     /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage omschrijving mag maximaal uit 250 tekens bestaan
     */
    function testOmschrijvingMaxLengte(){
        $goed = new Goed('naam', '123456789009876543211234567890098765432112345678900987654321'
                . '12345678900987654321123456789009876543211234567890098765432112345678900987654321'
                . '12345678900987654321123456789009876543211234567890098765432112345678900987654321'
                . '12345678900987654321123456789009876543211234567890098765432112345678900987654321'
                . '', 1);
    }
    
    function testGoedWordtBetaald(){
        $goed = new Goed('test', 'test', 1);
        $this->assertSame(false, $goed->getFooiBetaald());
        $goed->setFooiBetaald();
        $this->assertSame(true, $goed->getFooiBetaald());
        
    }
    
    function testKavelNummerSetter(){
        $goed = new Goed('test', 'testing', 1);
        $goed->voegToeAanKavel(3);
        $this->assertSame(3, $goed->getKavelNummer());
    }
    
    function testAlleInputIsJuist(){
        $goed = new Goed('test', 'testing', 1);
        $this->assertSame('test', $goed->getNaam());
        $this->assertSame('testing', $goed->getOmschrijving());
        $this->assertSame(1, $goed->getAanbiederId());
        
    }
}
