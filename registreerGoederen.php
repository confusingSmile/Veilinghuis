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
        <title>Goed registreren</title>
    </head>
    <body>
        <div id="outsideBorder">
            <?php
            // put your code here
            session_start();
            if(isset($_SESSION['user'])){
                header('Location: index.php');
                exit;
            }
            
                ?>
            <form action="Controler/kavel/nieuwGoed.php" method="post">
                <table class="formtable">
                    <tr>
                        <td>
                            Gegevens over de aanbieder: 
                        </td>
                        <td>
                            
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Voornaam aanbieder: 
                        </td>
                        <td>
                            <input type="text" name="voornaam" size="30" maxlength="50" placeholder="Voornaam">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Tussenvoegsel(s) aanbieder:
                        </td>  
                        <td>
                            <input type="text" name="tussenvoegsel" size="30" maxlength="10" placeholder="Tussenvoegsel">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Achternaam aanbieder:
                        </td>
                        <td>
                            <input type="text" name="achternaam" size="30" maxlength="51" placeholder="Achternaam">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Straat aanbieder: 
                        </td>
                        <td>
                            <input type="text" name="straatnaam" size="30" maxlength="46" placeholder="Straat">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Huisnummer aanbieder:
                        </td>
                        <td>
                            <input type="text" name="huisnummer" size="7" maxlength="4" placeholder="Nummer">
                            Toev.
                            <input type="text" name="toevoeging" size="12" maxlength="25" placeholder="Toevoeging"> 
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Postcode aanbieder:
                        </td>
                        <td>
                            <input type="text" name="postcode" size="30" maxlength="6" placeholder="Postcode">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Woonplaats aanbieder: 
                        </td>
                        <td>
                            <input type="text" name="woonplaats" size="30" maxlength="28" placeholder="Woonplaats">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <button type="button" onclick="location.href='index.php'" class="terugKnop">
                                Terug
                            </button>
                        </td>
                    </tr>
                </table>
                <table class="formtable">
                    <tr>
                        <td>
                            Gegevens over het goed: 
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Naam van het goed:
                        </td>
                    </tr>
                    <tr>
                        <td>
<!--                            //TODO get maxlength for these fields-->
                            <input type="text" name="goednaam" size="30" placeholder="Naam van het goed">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Omschrijving: 
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <textarea class="omschrijving" rows="5" cols="31" name="omschrijving" placeholder="Omschrijving"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            &nbsp;
                        </td>
                    </tr>
                        
                    <tr>
                        <td>
                            <input type="submit" class="submitKnop" value="Bevestigen">
                        </td>
                    </tr>
                </table>
            </form>
            
        </div>
    </body>
</html>
