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
        <title>Goederen verkavelen</title>
        
            <script>
              $(function() {
                $( ".sortable" ).sortable({
                  connectWith: ".sortable",
                  handle: ".goedNaam",
                  cancel: ".goedOms",
                  placeholder: "portlet-placeholder ui-corner-all"
                }, 
                {
                    receive: function(){
                               $("#hidden").empty();
                               var aantal = 0;
                               $(".sortableFieldRight .goed").each(function(){
                                   var result = this.id;
                                   aantal ++;
                                   $("#hidden").append('<input type="hidden" name="goedNummers[]" value="'+ result +'">');
                               });
                               if(aantal > 0){
                                   document.getElementById("submit").disabled = false;
                                } else {
                                   document.getElementById("submit").disabled = true;
                               }
                   }
                });

                $( ".goed" )
                  .addClass( "ui-widget ui-widget-content ui-helper-clearfix ui-corner-all" )
                  .find( ".goedNaam" )
                    .addClass( "ui-widget-header ui-corner-all" )
                    .prepend( "<span class='ui-icon ui-icon-minusthick portlet-toggle'></span>");

                $( ".portlet-toggle" ).click(function() {
                  var icon = $( this );
                  icon.toggleClass( "ui-icon-minusthick ui-icon-plusthick" );
                  icon.closest( ".goed" ).find( ".goedOms" ).toggle();
                });
              });
            </script>
    </head>
    <body>
        <div id="outsideBorder">
            <div class="sortableFieldLeft sortable">
                <div class="goed" id="ID1">
                    <div class="goedNaam">
                        naam
                    </div>
                    <div class="goedOms">
                        Omschrijving
                    </div>
                </div>
            </div>
            
            <div class="sortableFieldRight sortable">
                <div class="goed" id="ID2">
                    <div class="goedNaam">
                        naam
                    </div>
                    <div class="goedOms">
                        Omschrijving
                    </div>
                </div>
            </div>
            
            <div class="spaceForButtons">
                <table class="tableVerkavelGoederen">
                    <tr>
                        <td>
                            <button type="button" onclick="location.href='index.php'" class="terugKnop">
                                Terug
                            </button>
                        </td>
                        <td class="right-aligned-cell">
                            <form method="post" action="Controler/kavel/voegToeAanKavel.php">
                                <div id="hidden"></div>
                                <input type="submit" id="submit" value="Bevestigen" disabled>
                            </form>
                        </td>
                    </tr>
                </table>
            </div>
            
        </div>
    </body>
</html>
