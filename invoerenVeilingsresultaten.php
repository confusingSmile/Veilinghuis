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
            
            function todo(ui){
                //functie voor bij de select om Ajax te gebruiken om de jusite tabel te renderen.
                var veiling = document.getElementById("selectboxVeiling").value;
                var url = 'invoerenVeilingsresultaten.php?/veiling='+veiling+'';
                location.href = url;
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
                        <select class="selectVeiling" id="selectboxVeiling" onchange="todo(this)">
                            <option>Kies een veiling...
                            </option>
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
                                # <input type="text" name="tokenNummer[]" maxlength="7" placeholder="tokennummer">
                            </td>
                            <td>
                                € <input type="text" name="bod[]" maxlength="20" placeholder="bedrag">
                            </td>
                        </tr>
                        <tr class="veilingsresultaat" onclick="select(this)">
                            <td>
                                Kavel 2
                            </td>
                            <td>
                                # <input type="text" name="tokenNummer[]" maxlength="7" placeholder="tokennummer">
                            </td>
                            <td>
                                € <input type="text" name="bod[]" maxlength="20" placeholder="bedrag">
                            </td>
                        </tr>
                        <tr class="veilingsresultaat" onclick="select(this)">
                            <td>
                                Kavel 3
                            </td>
                            <td>
                                # <input type="text" name="tokenNummer[]" maxlength="7" placeholder="tokennummer">
                            </td>
                            <td>
                                € <input type="text" name="bod[]" maxlength="20" placeholder="bedrag">
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
