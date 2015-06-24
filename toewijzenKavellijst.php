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
        <title>Kavellijst toewijzen aan veiling</title>
        
            <script>
              $(function() {
                $( ".sortable" ).sortable({
                  connectWith: ".sortable",
                  cancel: ".ui-icon",
                  placeholder: "portlet-placeholder ui-corner-all"
                }, 
                {
                    receive: function(){
                               $("#hidden").empty();
                               var aantal = 0;
                               $(".sortableFieldRight .kavellijstVoorVeiling").each(function(){
                                   var result = this.id;
                                   aantal ++;
                                   $("#hidden").append('<input type="hidden" name="kavellijstNummers[]" value="'+ result +'">');
                               });
                               if(aantal === 1){
                                   document.getElementById("submit").disabled = false;
                                } else {
                                   document.getElementById("submit").disabled = true;
                               }
                   }
                });

                $( ".kavel" )
                  .addClass( "ui-widget ui-widget-content ui-helper-clearfix ui-corner-all" )
                  .find( ".kavelNaam" )
                    .addClass( "ui-widget-header ui-corner-all" )
                    .prepend( "<span class='ui-icon ui-icon-minusthick portlet-toggle'></span>");
               
                $( ".portlet-toggle" ).click(function() {
                  var icon = $( this );
                  icon.toggleClass( "ui-icon-minusthick ui-icon-plusthick" );
                  icon.closest( ".kavel" ).find( ".kavelOms" ).toggle();
                });
              });
            </script>
    </head>
    <body>
        <div id="outsideBorder">
            <form method="post" action="Controler/kavellijst/voegToeAanVeiling.php" id="formToewijzenKavel">
                <div class="selectVeilingToewijzenContainer">
                    &nbsp;
                    <div class="selectVeilingToewijzen"> Veiling: 
                        <select class="selectSelectVeiling" class="selectVeiling">
                            <option value="next Saturday"><?php $t = new DateTimeImmutable("next saturday");
                            echo $t->format('Y-m-d');
                            ; ?>
                            </option>
                            <option value="next Saturday"><?php $t = new DateTimeImmutable("next week saturday");
                            echo $t->format('Y-m-d');
                            ; ?>
                            </option>
                        </select>
                    </div>
                </div>
                <div class="sortableFieldLeft sortable">
                    <div class="kavellijstVoorVeiling" id="KLid2">
                        Lijstnaam
                        <div class="kavel">
                            <div class="kavelNaam">
                                Naam
                            </div>
                            <div class="kavelOms">
                                Omschrijving
                            </div>
                        </div>
                        <div class="kavel">
                            <div class="kavelNaam">
                                Naam2
                            </div>
                            <div class="kavelOms">
                                Omschrijving2
                            </div>
                        </div>
                    </div>
                    <div class="kavellijstVoorVeiling" id="KLid3">
                        Lijstnaam
                        <div class="kavel">
                            <div class="kavelNaam">
                                Naam
                            </div>
                            <div class="kavelOms">
                                Omschrijving
                            </div>
                        </div>
                        <div class="kavel">
                            <div class="kavelNaam">
                                Naam2
                            </div>
                            <div class="kavelOms">
                                Omschrijving2
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sortableFieldRight sortable">
                    <div class="kavellijstVoorVeiling" id="KLid3">
                        Lijstnaam
                        <div class="kavel">
                            <div class="kavelNaam">
                                Naam
                            </div>
                            <div class="kavelOms">
                                Omschrijving
                            </div>
                        </div>
                        <div class="kavel">
                            <div class="kavelNaam">
                                Naam2
                            </div>
                            <div class="kavelOms">
                                Omschrijving2
                            </div>
                        </div>
                    </div>
                </div>

                <div class="spaceForButtons">
                    <table class="tableVoegToeAanVeiling">
                        <tr>
                            <td>
                                <button type="button" onclick="location.href='index.php'" class="terugKnop">
                                    Terug
                                </button>
                            </td>
                            <td class="right-aligned-cell">
                                    <div id="hidden"></div>
                                    <input type="submit" id="submit" value="Bevestigen" disabled>
                            </td>
                        </tr>
                    </table>
                </div>
          
            </form>  
        </div>
    </body>
</html>
