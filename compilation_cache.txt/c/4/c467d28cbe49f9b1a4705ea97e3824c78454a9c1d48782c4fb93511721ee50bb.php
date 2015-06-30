<?php

/* openstaandeBetalingen.html */
class __TwigTemplate_c467d28cbe49f9b1a4705ea97e3824c78454a9c1d48782c4fb93511721ee50bb extends Twig_Template
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
        <title>Openstaande betalingen</title>
        
        <script>
            function select(ui){
                \$(\".openstaandItem\").removeClass(\"ui-selected\");
                \$(ui).addClass(\"ui-selected\");
            }
        </script>
    </head>
    <body>
        <div id=\"outsideBorder\">
            <?php
            // put your code here
            session_start();
            if(isset(\$_SESSION['user'])){
                header('Location: index.php');
                exit;
            }
            
            ?>
            <form method=\"post\" action=\"Controler/kasboek/sluitOpenstaandeBetalingen.php\">
                    <table class=\"openstaandeItems\" id=\"selectable\">
                        <tr class=\"headerOpenstaandeItems openstaandItem\">
                            <th>
                                Bod/Kavel
                            </th>
                            <th>
                                Naam klant
                            </th> 
                            <th>
                                Bedrag
                            </th>
                            <th>
                                Datum
                            </th> 
                            <th>
                                Betaald Ja/Nee
                            </th> 
                        </tr>
                        <tr class=\"openstaandItem\" onclick=\"select(this)\">
                            <td>
                                Kavel 1
                            </td>
                            <td>
                                aanbieder1
                            </td>
                            <td>
                                € 1
                            </td>
                            <td>
                                22-06-2014
                            </td>
                            <td>
                                <input type=\"checkbox\" name=\"betaald[]\" class=\"checkboxBetaald\">
                            </td>
                        </tr>
                        <tr class=\"openstaandItem\" onclick=\"select(this)\">
                            <td>
                                Kavel 2
                            </td>
                            <td> 
                                aanbieder2
                            </td>
                            <td>
                                € 2
                            </td>
                            <td>
                                11-11-2011
                            </td>
                            <td>
                                <input type=\"checkbox\" name=\"betaald[]\" class=\"checkboxBetaald\">
                            </td>
                        </tr>
                        <tr class=\"openstaandItem\" onclick=\"select(this)\">
                            <td>
                                Bod 1
                            </td>
                            <td> 
                                bieder1
                            </td>
                            <td>
                                € 5
                            </td>
                            <td>
                                23-09-2012
                            </td>
                            <td>
                                <input type=\"checkbox\" name=\"betaald[]\" class=\"checkboxBetaald\">
                            </td>
                        </tr>
                    </table>
                    <button type=\"button\" onclick=\"location.href='kasboek.php'\" class=\"terugKnop\">
                        Terug
                    </button>
                    <input type=\"submit\" value=\"Wijzigingen opslaan\">
                </form>
            
           
                
            
            <?php
            
            ?>
            
            
        </div>
    </body>
</html>
";
    }

    public function getTemplateName()
    {
        return "openstaandeBetalingen.html";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }
}
