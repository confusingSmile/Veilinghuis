<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="csslayout.css" />
        <title>Hoofdmenu</title>
    </head>
    <body>
        <div id="outsideBorder">
            <?php
            // put your code here
            session_start();
            if(isset($_SESSION['user'])){
                ?>
                    <form action="login.php" method="post">
                        <input type="text" name="username" placeholder="gebruikersnaam"><br>
                        <input type="password" name="password" placeholder="wachtwoord"><br>
                        <input type="submit" value="Log in">
                    </form>
                <?php
                exit;
            }
            
                ?>
            
            <table class="hoofdmenuTable">
                <tr>
                    <td>
                        <button onclick="location.href='registreerBieder.php'" class="optionButton">
                            Nieuwe bieder
                        </button>
                    </td>
                    <td>
                        <button onclick="location.href='registreerAanbieder.php'" class="optionButton">
                            Nieuwe aanbieder
                        </button>
                    </td>
                    <td>
                        <button onclick="location.href='klantenregister.php'" class="optionButton">
                            klantenregister
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <button onclick="location.href='registreerGoederen.php'" class="optionButton">
                            Goederen registreren
                        </button>
                    </td>
                    <td>
                        <button onclick="location.href='verkavelGoederen.php'" class="optionButton">
                            Goederen verkavelen
                        </button>
                    </td>
                    <td>
                        <button onclick="location.href='ordenGoederen.php'" class="optionButton">
                            Goederen ordenen
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <button onclick="location.href='opstellenKavellijst.php'" class="optionButton">
                            Kavellijst opstellen
                        </button>
                    </td>
                    <td>
                        <button onclick="location.href='toewijzenKavellijst.php'" class="optionButton">
                            Kavellijst toewijzen aan veiling
                        </button>
                    </td>
                    <td>
                        <button onclick="location.href='bekijkKavellijst.php'" class="optionButton">
                            Kavellijst bekijken
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <button onclick="location.href='invoerenVeilingsresultaten.php'" class="optionButton">
                            Veilingsresultaten invoeren
                        </button>
                    </td>
                    <td>
                        <button onclick="location.href='kasboek.php'" class="optionButton">
                            Kasboek
                        </button>
                    </td>
                    <td>
                        <button onclick="location.href='logout.php'" class="optionButton">
                            Uitloggen
                        </button>
                    </td>
                </tr>
            </table>

            
        </div>
    </body>
</html>
