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
class VeilingTest {
    //put your code here
    function testLocatieMagNietLeegZijn(){
        $tijd = new DateTimeImmutable();
        $veiling = new Veiling($tijd, null, 1);
    }
    
    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage locatie moet een string zijn
     */
    function testLocatieMoetStringZijn(){
        $tijd = new DateTimeImmutable();
        $veiling = new Veiling($tijd, 300, 1);
    }
    
    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage locatie mag maximaal uit 25 tekens bestaan
     */
    function testLocatieMaxLengte(){
        $tijd = new DateTimeImmutable();
        $veiling = new Veiling($tijd, 'achter de boom in de achtertuin van de buurman', 1);
    }
    
    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage kavellijstId mag niet leeg zijn
     */
    function testKavellijstIdMagNietLeegZijn(){
        
    }
    
    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage kavellijstId moet numeriek zijn
     */
    function testKavellijstIdMoetNumeriekZijn(){
        
    }
    
    function testAlleInputIsJuist(){
        $tijd = new DateTimeImmutable();
        $veiling = new Veiling($tijd, 'achter de koektrommel', 1);
    }
}
