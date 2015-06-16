<?php
require __DIR__.'\..\Veilinghuis\Kavellijst.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use veilinghuis\Kavellijst;
/**
 * Description of KavellijstTest
 *
 * @author Walter
 */
class KavellijstTest extends \PHPUnit_Framework_TestCase{
    //put your code here
    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage kavellijstId mag niet leeg zijn
     */
    function testKavellijstIdMagNietLeegZijn(){
        $lijst = new Kavellijst(null);
    }
    
    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage kavellijstId moet numeriek zijn
     */
    function testKavellijstIdMoetNumeriekZijn(){
        $lijst = new Kavellijst('aap');
    }
    
    function alleInputIsJuist(){
        $lijst = new Kavellijst(3);
        $this->assertSame(3, $lijst->getKavellijstId());
    }
}
