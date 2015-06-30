<?php

/* bekijkKavellijst.html */
class __TwigTemplate_dc53f72adf2b418780891a91da11fd8c427ba41506fe640b468ece58fd08eeb0 extends Twig_Template
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
        <title>Kavellijst weergeven</title>
        
            <script>
              \$(function() {
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
            <div class=\"kavellijst\">
                <div class=\"kavel\" id=\"ID1\">
                    <div class=\"kavelNaam\">
                        naam
                    </div>
                    <div class=\"kavelOms\">
                        Omschrijving
                    </div>
                </div>
                ";
        // line 43
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["kavels"]) ? $context["kavels"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["kavel"]) {
            // line 44
            echo "                    <div class=\"kavel\" id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["kavel"], "kavelId", array(), "array"), "html", null, true);
            echo "}\">
                        <div class=\"kavelNaam\">
                            ";
            // line 46
            echo twig_escape_filter($this->env, $this->getAttribute($context["kavel"], "naam", array(), "array"), "html", null, true);
            echo "
                        </div>
                        <div class=\"kavelOms\">
                            ";
            // line 49
            echo twig_escape_filter($this->env, (isset($context["kavelOmschrijving"]) ? $context["kavelOmschrijving"] : null), "html", null, true);
            echo "
                        </div>
                    </div>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['kavel'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 53
        echo "            </div>
            
            <div class=\"spaceForButtons\">
                <button type=\"button\" onclick=\"location.href='index.php'\" class=\"terugKnop\">
                    Terug
                </button>
            </div>
            
        </div>
    </body>
</html>
";
    }

    public function getTemplateName()
    {
        return "bekijkKavellijst.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  89 => 53,  79 => 49,  73 => 46,  67 => 44,  63 => 43,  19 => 1,);
    }
}
