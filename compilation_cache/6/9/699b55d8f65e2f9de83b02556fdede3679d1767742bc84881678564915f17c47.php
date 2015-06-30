<?php

/* invoerenVeilingsresultaten.html */
class __TwigTemplate_699b55d8f65e2f9de83b02556fdede3679d1767742bc84881678564915f17c47 extends Twig_Template
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
        <title>Invoeren veilingsresultaten</title>
        
        <script>
            function select(ui){
                \$(\".veilingsresultaat\").removeClass(\"ui-selected\");
                \$(ui).addClass(\"ui-selected\");
            }
            
            function changeVeiling(ui){
                //functie voor bij de select om Ajax te gebruiken om de jusite tabel te renderen.
                var veiling = document.getElementById(\"selectboxVeiling\").value;
                var url = 'invoerenVeilingsresultaten.php?/veiling='+veiling+'';
                location.href = url;
            }
        </script>
    </head>
    <body>
        <div id=\"outsideBorder\">
            <form method=\"post\" action=\"Controler/veiling/verwerkVeilingsuitslagen.php\">
                    <div class=\"selectVeilingToewijzenContainer\">
                    &nbsp;
                        Veiling: 
                        <select class=\"selectVeiling\" id=\"selectboxVeiling\" onchange=\"changeVeiling(this)\">
                            <option>Kies een veiling...
                            </option>
                            ";
        // line 39
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["veilingen"]) ? $context["veilingen"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["veiling"]) {
            // line 40
            echo "                                <option value=\"";
            echo twig_escape_filter($this->env, $context["veiling"], "html", null, true);
            echo "\">
                                    ";
            // line 41
            echo twig_escape_filter($this->env, $context["veiling"], "html", null, true);
            echo "
                                </option>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['veiling'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 44
        echo "                        </select>
                    </div>
                    <table class=\"veilingsresultaten\" id=\"selectable\">
                        <tr class=\"headerVeilingresultaten veilingsresultaat\">
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
                        <tr class=\"veilingsresultaat\" onclick=\"select(this)\">
                            <td>
                                Kavel 1
                            </td>
                            <td>
                                # <input type=\"text\" name=\"tokenNummer[]\" maxlength=\"7\" placeholder=\"tokennummer\">
                            </td>
                            <td>
                                € <input type=\"text\" name=\"bod[]\" maxlength=\"20\" placeholder=\"bedrag\">
                            </td>
                        </tr>
                        <tr class=\"veilingsresultaat\" onclick=\"select(this)\">
                            <td>
                                Kavel 2
                            </td>
                            <td>
                                # <input type=\"text\" name=\"tokenNummer[]\" maxlength=\"7\" placeholder=\"tokennummer\">
                            </td>
                            <td>
                                € <input type=\"text\" name=\"bod[]\" maxlength=\"20\" placeholder=\"bedrag\">
                            </td>
                        </tr>
                        <tr class=\"veilingsresultaat\" onclick=\"select(this)\">
                            <td>
                                Kavel 3
                            </td>
                            <td>
                                # <input type=\"text\" name=\"tokenNummer[]\" maxlength=\"7\" placeholder=\"tokennummer\">
                            </td>
                            <td>
                                € <input type=\"text\" name=\"bod[]\" maxlength=\"20\" placeholder=\"bedrag\">
                            </td>
                        </tr>
                    </table>
                    <button type=\"button\" onclick=\"location.href='index.php'\" class=\"terugKnop\">
                        Terug
                    </button>
                    <input type=\"submit\" value=\"Resultaten opslaan\">
                </form>
            
        </div>
    </body>
</html>
";
    }

    public function getTemplateName()
    {
        return "invoerenVeilingsresultaten.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  77 => 44,  68 => 41,  63 => 40,  59 => 39,  19 => 1,);
    }
}
