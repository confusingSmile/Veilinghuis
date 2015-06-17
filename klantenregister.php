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
        <title>Klantenregister</title>
        
        <script>
            $(function() {
                $( "#selectable" ).selectable({
                  start: function() {
                    $( ".ui-selected", this ).each(function() {
                        $(this).removeClass('ui-selected');
                    });                                      
                  },  
                  selected: function( event, ui ) {
                    var aantalSelected = 0;
                    $( ".ui-selected", this ).each(function() {
                        aantalSelected ++;
                    });
                    if(aantalSelected > 1){
                        $(".ui-selected").removeClass('ui-selected');
                    }
                    
                  }
                });
              });
        </script>
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
            
            if(!isset($_POST['klanten'])){
                ?>
                    <ol class="klantenLijst" id="selectable">
                        <li class="ui-widget-content" id="ID1">
                            Geen klanten om weer te geven. 
                        </li>
                        <li class="ui-widget-content" id="ID2">
                            item 2
                        </li>
                        <li class="ui-widget-content" id="ID3">
                            item 3
                        </li>
                    </ol>
                    <form>
                        <input type="hidden" id="hidden" value="">
                        <input type="submit" id="submit" value="Wijzig">
                    </form>
            
                <?php
                exit;
            }
            
            ?>
                <ol class="klantenLijst" id="selectable">
            <?php
            foreach($_POST['klanten'] as $klant){
                echo '<li class="ui-widget-content" id='.$klant['type'].''.$klant['id'].'>'.$klant['naam'].', '.
                        $klant['adres'].'</li>';
            }
            
            ?>
                </ol>
            <form>
                <input type="hidden" id="hidden" value="">
                <input type="submit" id="submit" value="Wijzig">
            </form>
            
            <?php
            
            ?>
            
            
        </div>
    </body>
</html>
