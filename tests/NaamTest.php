<?php

require '..\Veilinghuis\entities\Naam.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use Veilinghuis\Entities\Naam;
/**
 * Description of NaamTest
 *
 * @author Walter
 */
class NaamTest extends \PHPUnit_Framework_TestCase{
    //put your code here
    
    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage voornaam moet een string zijn
     */
    function testVoornaamMoetStringZijn(){
        $naam = new Naam(1, 'voor de', 'test');
    }
    
    function testVoornaamIsJuist(){
        $naam = new Naam('juisteNaam', 'voor de', 'test');
    }
    
    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage tussenvoegsel moet een string zijn
     */
    function testTussenvoegselMoetStringZijn(){
        $naam = new Naam('juisteNaam', 3, 'test');
    }
    
    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage tussenvoegsel mag maximaal uit 10 tekens bestaan
     */
    function testTussenvoegselMaxLengte(){
        $naam = new Naam('juisteNaam', 'maar dit tussenvoegsel is te lang', 'test');
    }
    
    function testTussenvoegselIsJuist(){
        $naam = new Naam('juisteNaam', 'voor de', 'test');
    }
    
    function testTussenvoegselIsOptioneel(){
        $naam = new Naam('juisteNaam', null, 'test');
    }
    
    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage achternaam moet een string zijn
     */
    function testAchternaamMoetStringZijn(){
        $naam = new Naam('juisteNaam', 'voor de', 4);
    }
    
    function testAchternaamIsJuist(){
        $naam = new Naam('juisteNaam', 'voor de', 'test');
    }
}
