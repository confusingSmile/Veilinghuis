<?php

/* index.html */
class __TwigTemplate_4a2eb7112021bea3576e2a26b4e862cf07adb202b49252564f2bbe87f86d782e extends Twig_Template
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
        <title>Hoofdmenu</title>
    </head>
    <body>
        <div id=\"outsideBorder\">
            
            
            <table class=\"hoofdmenuTable\">
                <tr>
                    <td>
                        <button onclick=\"location.href='registreerBieder.php'\" class=\"hoofdmenuOptionButton\">
                            Nieuwe bieder
                        </button>
                    </td>
                    <td>
                        <button onclick=\"location.href='registreerAanbieder.php'\" class=\"hoofdmenuOptionButton\">
                            Nieuwe aanbieder
                        </button>
                    </td>
                    <td>
                        <button onclick=\"location.href='klantenregister.php'\" class=\"hoofdmenuOptionButton\">
                            klantenregister
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <button onclick=\"location.href='registreerGoederen.php'\" class=\"hoofdmenuOptionButton\">
                            Goederen registreren
                        </button>
                    </td>
                    <td>
                        <button onclick=\"location.href='verkavelGoederen.php'\" class=\"hoofdmenuOptionButton\">
                            Goederen verkavelen
                        </button>
                    </td>
                    <td>
                        <button  class=\"hoofdmenuOptionButton\">
                            Goederen ordenen
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <button onclick=\"location.href='opstellenKavellijst.php'\" class=\"hoofdmenuOptionButton\">
                            Kavellijst opstellen
                        </button>
                    </td>
                    <td>
                        <button onclick=\"location.href='toewijzenKavellijst.php'\" class=\"hoofdmenuOptionButton\">
                            Kavellijst toewijzen aan veiling
                        </button>
                    </td>
                    <td>
                        <button onclick=\"location.href='bekijkKavellijst.php'\" class=\"hoofdmenuOptionButton\">
                            Kavellijst bekijken
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <button onclick=\"location.href='invoerenVeilingsresultaten.php'\" class=\"hoofdmenuOptionButton\">
                            Veilingsresultaten invoeren
                        </button>
                    </td>
                    <td>
                        <button onclick=\"location.href='kasboek.php'\" class=\"hoofdmenuOptionButton\">
                            Kasboek
                        </button>
                    </td>
                    <td>
                        <button onclick=\"location.href='logout.php'\" class=\"hoofdmenuOptionButton\">
                            Uitloggen
                        </button>
                    </td>
                </tr>
            </table>

            
        </div>
    </body>
</html>
";
    }

    public function getTemplateName()
    {
        return "index.html";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }
}
