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
        <title>Kasboek</title>
        
        <script>
            function select(ui){
                $(".kasboekItem").removeClass("ui-selected");
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
                <table class="BiedingenLijstKasboek" id="selectable">
                    <tr class="kasboekItem" onclick="select(this)">
                        <td>
                            Kavel 1
                        </td>
                        <td>
                            bedrag geboden.
                        </td> 
                    </tr>
                    <tr class="kasboekItem" onclick="select(this)">
                        <td>
                            Kavel 2
                        </td>
                        <td> 
                            bedrag geboden.
                        </td> 
                    </tr>
                    <tr class="kasboekItem" onclick="select(this)">
                        <td>
                            Kavel 3
                        </td>
                        <td> 
                            bedrag geboden.
                        </td> 
                    </tr>
                </table>
                <button type="button" onclick="location.href='index.php'" class="terugKnop">
                    Terug
                </button>
                <button type="button" onclick="location.href='openstaandeBetalingen.php'" class="terugKnop">
                    Openstaande betalingen
                </button>
            
            
           
                
            
            <?php
            
            ?>
            
            
        </div>
    </body>
</html>
