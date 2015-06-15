<?php
require __DIR__.'\..\Veilinghuis\Veiling.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use Veilinghuis\Veiling;
use Veilinghuis\Entities\Tijd;
/**
 * Description of VeilingTest
 *
 * @author Walter
 */
class VeilingTest extends \PHPUnit_Framework_TestCase{
    //put your code here
    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage locatie mag niet leeg zijn
     */
    function testLocatieMagNietLeegZijn(){
        $tijd = new \DateTimeImmutable();
        $veiling = new Veiling($tijd, null, 1);
    }
    
    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage locatie moet een string zijn
     */
    function testLocatieMoetStringZijn(){
        $tijd = new \DateTimeImmutable();
        $veiling = new Veiling($tijd, 300, 1);
    }
    
    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage locatie mag maximaal uit 25 tekens bestaan
     */
    function testLocatieMaxLengte(){
        $tijd = new \DateTimeImmutable();
        $veiling = new Veiling($tijd, 'achter de boom in de achtertuin van de buurman', 1);
    }
    
    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage kavellijstId mag niet leeg zijn
     */
    function testKavellijstIdMagNietLeegZijn(){
        $tijd = new \DateTimeImmutable();
        $veiling = new Veiling($tijd, 'achter de koektrommel', 1);
        $veiling->setKavellijstId(null);
    }
    
    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage kavellijstId moet numeriek zijn
     */
    function testKavellijstIdMoetNumeriekZijn(){
        $tijd = new \DateTimeImmutable();
        $veiling = new Veiling($tijd, 'achter de koektrommel', 1);
        $veiling->setKavellijstId('ditIsEenString');
    }
    
    function testAlleInputIsJuist(){
        $tijd = new \DateTimeImmutable();
        $veiling = new Veiling($tijd, 'achter de koektrommel', 1);
        $this->assertSame($tijd, $veiling->getAanvangstijd());
        $this->assertSame('achter de koektrommel', $veiling->getLocatie());
        $this->assertSame(1, $veiling->getKavellijstId());
    }
}
