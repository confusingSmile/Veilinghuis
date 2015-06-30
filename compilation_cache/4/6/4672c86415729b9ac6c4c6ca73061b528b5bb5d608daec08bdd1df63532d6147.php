<?php

/* toewijzenKavellijst.html */
class __TwigTemplate_4672c86415729b9ac6c4c6ca73061b528b5bb5d608daec08bdd1df63532d6147 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset=\"UTF-8\">
        <link rel=\"stylesheet\" type=\"text/css\" href=\"csslayout.css\" />
        <link rel=\"shortcut icon\" href=\"Veilinghuis/images/auctionHammer.ico\">
        <script src=\"//code.jquery.com/jquery-1.10.2.js\"></script>
        <script src=\"//code.jquery.com/ui/1.11.4/jquery-ui.js\"></script>
        <title>Kavellijst toewijzen aan veiling</title>
        
            <script>
              \$(function() {
                \$( \".sortable\" ).sortable({
                  connectWith: \".sortable\",
                  cancel: \".ui-icon\",
                  placeholder: \"portlet-placeholder ui-corner-all\"
                }, 
                {
                    receive: function(){
                               \$(\"#hidden\").empty();
                               var aantal = 0;
                               \$(\".sortableFieldRight .kavellijstVoorVeiling\").each(function(){
                                   var result = this.id;
                                   aantal ++;
                                   \$(\"#hidden\").append('<input type=\"hidden\" name=\"kavellijstNummers[]\" value=\"'+ result +'\">');
                               });
                               if(aantal === 1){
                                   document.getElementById(\"submit\").disabled = false;
                                } else {
                                   document.getElementById(\"submit\").disabled = true;
                               }
                   }
                });

                \$( \".kavel\" )
                  .addClass( \"ui-widget ui-widget-content ui-helper-clearfix ui-corner-all\" )
                  .find( \".kavelNaam\" )
                    .addClass( \"ui-widget-header ui-corner-all\" )
                    .prepend( \"<span class='ui-icon ui-icon-minusthick portlet-toggle'></span>\");
               
                \$( \".portlet-toggle\" ).click(function() {
                  var icon = \$( this );
                  icon.toggleClass( \"ui-icon-minusthick ui-icon-plusthick\" );
                  icon.closest( \".kavel\" ).find( \".kavelOms\" ).toggle();
                });
              });
            </script>
    </head>
    <body>
        <div id=\"outsideBorder\">
            <form method=\"post\" action=\"Controler/kavellijst/voegToeAanVeiling.php\" id=\"formToewijzenKavel\">
                <div class=\"selectVeilingToewijzenContainer\">
                    &nbsp;
                    <div class=\"selectVeilingToewijzen\"> Veiling: 
                        <select class=\"selectVeiling\" id=\"selectboxVeiling\" onchange=\"changeVeiling(this)\">
                            <option>Kies een veiling...
                            </option>
                            ";
        // line 63
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["veilingen"]) ? $context["veilingen"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["veiling"]) {
            // line 64
            echo "                                <option value=\"";
            echo twig_escape_filter($this->env, $context["veiling"], "html", null, true);
            echo "\">
                                    ";
            // line 65
            echo twig_escape_filter($this->env, $context["veiling"], "html", null, true);
            echo "
                                </option>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['veiling'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 68
        echo "                        </select>
                    </div>
                </div>
                <div class=\"sortableFieldLeft sortable\">
                    <div class=\"kavellijstVoorVeiling\" id=\"KLid2\">
                        Lijstnaam
                        <div class=\"kavel\">
                            <div class=\"kavelNaam\">
                                Naam
                            </div>
                            <div class=\"kavelOms\">
                                Omschrijving
                            </div>
                        </div>
                        <div class=\"kavel\">
                            <div class=\"kavelNaam\">
                                Naam2
                            </div>
                            <div class=\"kavelOms\">
                                Omschrijving2
                            </div>
                        </div>
                    </div>
                    <div class=\"kavellijstVoorVeiling\" id=\"KLid3\">
                        Lijstnaam
                        <div class=\"kavel\">
                            <div class=\"kavelNaam\">
                                Naam
                            </div>
                            <div class=\"kavelOms\">
                                Omschrijving
                            </div>
                        </div>
                        <div class=\"kavel\">
                            <div class=\"kavelNaam\">
                                Naam2
                            </div>
                            <div class=\"kavelOms\">
                                Omschrijving2
                            </div>
                        </div>
                    </div>
                </div>
                <div class=\"sortableFieldRight sortable\">
                    <div class=\"kavellijstVoorVeiling\" id=\"KLid3\">
                        Lijstnaam
                        <div class=\"kavel\">
                            <div class=\"kavelNaam\">
                                Naam
                            </div>
                            <div class=\"kavelOms\">
                                Omschrijving
                            </div>
                        </div>
                        <div class=\"kavel\">
                            <div class=\"kavelNaam\">
                                Naam2
                            </div>
                            <div class=\"kavelOms\">
                                Omschrijving2
                            </div>
                        </div>
                    </div>
                </div>

                <div class=\"spaceForButtons\">
                    <table class=\"tableVoegToeAanVeiling\">
                        <tr>
                            <td>
                                <button type=\"button\" onclick=\"location.href='index.php'\" class=\"terugKnop\">
                                    Terug
                                </button>
                            </td>
                            <td class=\"right-aligned-cell\">
                                    <div id=\"hidden\"></div>
                                    <input type=\"submit\" id=\"submit\" value=\"Bevestigen\" disabled>
                            </td>
                        </tr>
                    </table>
                </div>
          
            </form>  
        </div>
    </body>
</html>
";
    }

    public function getTemplateName()
    {
        return "toewijzenKavellijst.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  101 => 68,  92 => 65,  87 => 64,  83 => 63,  19 => 1,);
    }
}
