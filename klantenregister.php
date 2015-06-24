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
        <title>Klantenregister</title>
        
        <script>
            function select(ui){
                $(".ui-widget-content").removeClass("ui-selected");
                $(ui).addClass("ui-selected");
                document.getElementById("hidden").value = ui.id;
                document.getElementById("submit").disabled = false;
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
            
            if(!isset($_POST['klanten'])){
                ?>
                    <ol class="klantenLijst" id="selectable">
                        <li class="ui-widget-content" id="ID1" onclick="select(this)">
                            Geen klanten om weer te geven. 
                        </li>
                        <li class="ui-widget-content" id="ID2" onclick="select(this)">
                            item 2
                        </li>
                        <li class="ui-widget-content" id="ID3" onclick="select(this)">
                            item 3
                        </li>
                    </ol>
                    <form action="" method="post">
                        <input type="hidden" id="hidden" value="">
                        <button type="button" onclick="location.href='index.php'" class="terugKnop">
                            Terug
                        </button>
                        <input type="submit" id="submit" value="Wijzig" disabled>
                    </form>
            
                <?php
                exit;
            }
            
            ?>
                <ol class="klantenLijst" id="selectable">
            <?php
            foreach($_POST['klanten'] as $klant){
                //TODO finalize
                echo '<li class="ui-widget-content" id='.$klant['type'].''.$klant['id'].'>'.$klant['naam'].', '.
                        $klant['adres'].'</li>';
            }
            
            ?>
            </ol>
            
            
            <form action="" method="post">
                <input type="hidden" id="hidden" value="">
                <button type="button" onclick="location.href='index.php'" class="terugKnop">
                    Terug
                </button>
                <input type="submit" id="submit" value="Wijzig">
            </form>
            
            <?php
            
            ?>
            
            
        </div>
    </body>
</html>
