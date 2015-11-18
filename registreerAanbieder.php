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
        <link rel="shortcut icon" href="Veilinghuis/images/auctionHammer.ico">
        <title>Aanbieder registreren</title>
    </head>
    <body>
        <div id="outsideBorder">
            <?php
            // put your code here
            session_start();
            if(!isset($_SESSION['user'])){
                header('Location: index.php');
                exit;
            }
            
                ?>
            <form action="Controller/klant/nieuweAanbieder.php" method="post">
                <table class="formtable">
                    <tr>
                        <td>
                            Voornaam: 
                        </td>
                        <td>
                            <input type="text" name="voornaam" size="30" maxlength="50" placeholder="Voornaam">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Tussenvoegsel(s):
                        </td>  
                        <td>
                            <input type="text" name="tussenvoegsel" size="30" maxlength="10" placeholder="Tussenvoegsel">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Achternaam:
                        </td>
                        <td>
                            <input type="text" name="achternaam" size="30" maxlength="51" placeholder="Achternaam">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Straat: 
                        </td>
                        <td>
                            <input type="text" name="straatnaam" size="30" maxlength="46" placeholder="Straat">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Huisnummer:
                        </td>
                        <td>
                            <input type="text" name="huisnummer" size="7" maxlength="4" placeholder="Nummer">
                            Toev.
                            <input type="text" name="toevoeging" size="12" maxlength="25" placeholder="Toevoeging"> 
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Postcode:
                        </td>
                        <td>
                            <input type="text" name="postcode" size="30" maxlength="6" placeholder="Postcode">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Woonplaats: 
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
                        <td>
                            <input type="submit" class="submitKnop" value="Bevestigen">
                        </td>
                    </tr>
                </table>
            </form>
            
        </div>
    </body>
</html>
