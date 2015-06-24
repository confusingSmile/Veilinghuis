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
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <title>Invoeren veilingsresultaten</title>
        
        <script>
            function select(ui){
                $(".veilingsresultaat").removeClass("ui-selected");
                $(ui).addClass("ui-selected");
            }
            
            function todo(){
                //functie voor bij de select om Ajax te gebruiken om de jusite tabel te renderen. 
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
            <form method="post" action="Controler/veiling/verwerkVeilingsuitslagen.php">
                    <div class="selectVeilingToewijzenContainer">
                    &nbsp;
                        Veiling: 
                        <select class="selectVeiling" onchange="todo()">
                            <option value="next Saturday"><?php $t = new DateTimeImmutable("next saturday");
                            echo $t->format('Y-m-d');
                             ?>
                            </option>
                            <option value="next Saturday"><?php $t = new DateTimeImmutable("next week saturday");
                            echo $t->format('Y-m-d');
                             ?>
                            </option>
                        </select>
                    </div>
                    <table class="veilingsresultaten" id="selectable">
                        <tr class="headerVeilingresultaten veilingsresultaat">
                            <th>
                                Kavel
                            </th>
                            <th>
                                Tokennummer <br> bieder
                            </th> 
                            <th>
                                Bod
                            </th>
                        </tr>
                        <tr class="veilingsresultaat" onclick="select(this)">
                            <td>
                                Kavel 1
                            </td>
                            <td>
                                bieder1
                            </td>
                            <td>
                                € 1
                            </td>
                        </tr>
                        <tr class="veilingsresultaat" onclick="select(this)">
                            <td>
                                Kavel 2
                            </td>
                            <td> 
                                bieder2
                            </td>
                            <td>
                                € 2
                            </td>
                        </tr>
                        <tr class="veilingsresultaat" onclick="select(this)">
                            <td>
                                Kavel 3
                            </td>
                            <td> 
                                bieder3
                            </td>
                            <td>
                                € 5
                            </td>
                        </tr>
                    </table>
                    <button type="button" onclick="location.href='index.php'" class="terugKnop">
                        Terug
                    </button>
                    <input type="submit" value="Resultaten opslaan">
                </form>
            
        </div>
    </body>
</html>
