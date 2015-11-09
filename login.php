<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    require('vendor/autoload.php');
    include('config/config_db_local.php');
    use Doctrine\DBAL\Configuration;
    use Doctrine\DBAL\DriverManager;

    $username = $_POST['username'];
    $password = $_POST['password'];

    $conn = DriverManager::getConnection($connectionParams, new Configuration());
    $correctPassword = "";
    //consider hard-coding user info, saving this for a future version
//    $password = md5($password);
//    $sql = "SELECT password
//                      FROM users
//                      WHERE username = :username"; 
//    $stmt = $conn->prepare($sql); 
//    $stmt->bindValue('username', $username);
//    $stmt->execute();
//
//    while ($row = $stmt->fetch()) {                              
//            $correctPassword = $row['password'];	
//    } 

    if($correctPassword == $password){
            session_start();
            $_SESSION['user'] = $username;
            header('Location: index.php'); 
    }
    echo "<a href=\"index.php\">Try again.</a>";
    