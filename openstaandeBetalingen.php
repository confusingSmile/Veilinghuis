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
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <title>Openstaande betalingen</title>
        
        <script>
            function select(ui){
                $(".openstaandItem").removeClass("ui-selected");
                $(ui).addClass("ui-selected");
            }
        </script>
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
            <form method="post" action="Controler/kasboek/sluitOpenstaandeBetalingen.php">
                    <table class="openstaandeItems" id="selectable">
                        <tr class="headerOpenstaandeItems openstaandItem">
                            <th>
                                Bod/Kavel
                            </th>
                            <th>
                                Naam klant
                            </th> 
                            <th>
                                Bedrag
                            </th>
                            <th>
                                Datum
                            </th> 
                            <th>
                                Betaald Ja/Nee
                            </th> 
                        </tr>
                        <tr class="openstaandItem" onclick="select(this)">
                            <td>
                                Kavel 1
                            </td>
                            <td>
                                bedrag geboden.
                            </td>
                            <td>
                                bedrag geboden.
                            </td>
                            <td>
                                bedrag geboden.
                            </td>
                            <td>
                                <input type="checkbox" name="betaald[]" class="checkboxBetaald">
                            </td>
                        </tr>
                        <tr class="openstaandItem" onclick="select(this)">
                            <td>
                                Kavel 2
                            </td>
                            <td> 
                                bedrag geboden.
                            </td>
                            <td>
                                bedrag geboden.
                            </td>
                            <td>
                                bedrag geboden.
                            </td>
                            <td>
                                <input type="checkbox" name="betaald[]" class="checkboxBetaald">
                            </td>
                        </tr>
                        <tr class="openstaandItem" onclick="select(this)">
                            <td>
                                Bod 1
                            </td>
                            <td> 
                                bedrag geboden.
                            </td>
                            <td>
                                bedrag geboden.
                            </td>
                            <td>
                                bedrag geboden.
                            </td>
                            <td>
                                <input type="checkbox" name="betaald[]" class="checkboxBetaald">
                            </td>
                        </tr>
                    </table>
                    <button type="button" onclick="location.href='kasboek.php'" class="terugKnop">
                        Terug
                    </button>
                    <input type="submit" value="Wijzigingen opslaan">
                </form>
            
           
                
            
            <?php
            
            ?>
            
            
        </div>
    </body>
</html>
