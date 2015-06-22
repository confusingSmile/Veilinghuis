<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//TODO start programming this for real
if(isSet($_POST['kavelNummers'])){
    $a = $_POST['kavelNummers'];
    foreach($a as $item){
        echo ''.$item.'<br>';
    }
    echo 'set';
} else {
        echo 'jammer';
    }

