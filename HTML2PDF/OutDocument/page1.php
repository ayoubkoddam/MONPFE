<?php


	require __DIR__.'/vendor/autoload.php';

	use Spipu\Html2Pdf\Html2Pdf;
	ob_start();
?>
<page>

	<qrcode value="http://www.fsac.ac.ma" style="width: 15mm;background-color: white; color: black;"></qrcode>
	<style type="text/css">
<!--
    table.page_header {width: 100%; border: none; background-color: #DDDDFF; border-bottom: solid 1mm #AAAADD; padding: 2mm }
    table.page_footer {width: 100%; border: none; background-color: #DDDDFF; border-top: solid 1mm #AAAADD; padding: 2mm}
    div.note {border: solid 1mm #DDDDDD;background-color: #EEEEEE; padding: 2mm; border-radius: 2mm; width: 100%; }
    ul.main { width: 95%; list-style-type: square; }
    ul.main li { padding-bottom: 2mm; }
    h1 { text-align: center; font-size: 20mm}
    h3 { text-align: center; font-size: 14mm}
-->
</style>
<page backtop="14mm" backbottom="14mm" backleft="10mm" backright="10mm" style="font-size: 12pt">
    <page_header>
        <table class="page_header">
            <tr>
                <td style="width: 50%; text-align: left">
                    A propos de ...
                </td>
                <td style="width: 50%; text-align: right">
                    HTML2PDF v<?php echo __CLASS_HTML2PDF__; ?>
                </td>
            </tr>
        </table>
    </page_header>
    <page_footer>
        <table class="page_footer">
            <tr>
                <td style="width: 33%; text-align: left;">
                    http://html2pdf.fr/
                </td>
                <td style="width: 34%; text-align: center">
                    page [[page_cu]]/[[page_nb]]
                </td>
                <td style="width: 33%; text-align: right">
                    &copy;Spipu 2008-2011
                </td>
            </tr>
        </table>
    </page_footer>
    <bookmark title="Présentation" level="0" ></bookmark>
    <br><br><br><br><br><br><br><br>
    <h1>HTML2PDF</h1>
    <h3>v<?php echo __CLASS_HTML2PDF__; ?></h3><br>
    <br><br><br><br><br>
    <div style="text-align: center; width: 100%;">
        <br>
<!--         <img src="./res/logo.png" alt="Logo HTML2PDF" style="width: 150mm">
 -->        <br>
    </div>
    <br><br><br><br><br>
    <div class="note">
        HTML2PDF est un convertisseur de code HTML vers PDF écrit en PHP5, utilisant la librairie <a href="http://tcpdf.org">TCPDF.</a><br>
        <br>
        Il permet la conversion d'HTML et d'xHTML valide au format PDF, et est distribué sous licence LGPL.<br>
        <br>
        Cette librairie a été conçue pour gérer principalement les TABLE imbriquées afin de générer des factures, bon de livraison, et autres documents officiels.<br>
        <br>
        Vous pouvez télécharger la dernière version de HTML2PDF ici : <a href="http://html2pdf.fr/">http://html2pdf.fr/</a>.<br>
    </div>
</page>
<page pageset="old">
    <bookmark title="Sommaire" level="0" ></bookmark>
    <!-- here will be the automatic index -->
</page>
<page pageset="old">
    <bookmark title="Compatibilité" level="0" ></bookmark>
    <bookmark title="Balises HTML" level="1" ></bookmark>
    <bookmark title="Balises classiques" level="2" ></bookmark>
    <div class="note">
        La liste des balises HTML utilisables est la suivante :<br>
    </div>
    <br>
    <ul class="main">
        <li>&lt;a&gt; : Ceci est un lien vers <a href="http://html2pdf.fr">le site de HTML2PDF</a></li>
        <li>&lt;b&gt;, &lt;strong&gt; : Ecrire en <b>gras</b>.</li>
        <li>&lt;big&gt; : Ecrire plus <big>gros</big>.</li>
        <li>&lt;br&gt; : Permet d'aller à la ligne</li>
        <li>&lt;cite&gt; : <cite>Ceci est une citation</cite></li>
        <li>&lt;code&gt;, &lt;pre&gt;</li>
        <li>&lt;div&gt; :&nbsp;<div style="border: solid 1px #AADDAA; background: #DDFFDD; text-align: center; width: 50mm">exemple de DIV</div></li>
        <li>&lt;em&gt;, &lt;i&gt;, &lt;samp&gt; : Ecrire en <em>italique</em>.</li>
        <li>&lt;font&gt;, &lt;span&gt; : <font style="color: #000066; font-family: times">Exemple d'utilisation</font></li>
        <li>&lt;h1&gt;, &lt;h2&gt;, &lt;h3&gt;, &lt;h4&gt;, &lt;h5&gt;, &lt;h6&gt;</li>
        <li>&lt;hr&gt; : barre horizontale</li>
        <li>&lt;img&gt; : <!-- <img src="./res/tcpdf_logo.jpg" style="width: 10mm"> --></li>
        <li>&lt;p&gt; : Ecrire dans un paragraphe</li>
        <li>&lt;s&gt; : Texte <s>barré</s></li>
        <li>&lt;small&gt; : Ecrire plus <small>petit</small>.</li>
        <li>&lt;style&gt;</li>
        <li>&lt;sup&gt; : Exemple<sup>haut</sup>.</li>
        <li>&lt;sub&gt; : Exemple<sub>bas</sub>.</li>
        <li>&lt;u&gt; : Texte <u>souligné</u></li>
        <li>&lt;table&gt;, &lt;td&gt;, &lt;th&gt;, &lt;tr&gt;, &lt;thead&gt;, &lt;tbody&gt;, &lt;tfoot&gt;, &lt;col&gt; </li>
        <li>&lt;ol&gt;, &lt;ul&gt;, &lt;li&gt;</li>
        <li>&lt;form&gt;, &lt;input&gt;, &lt;textarea&gt;, &lt;select&gt;, &lt;option&gt;</li>
        <li>&lt;fieldset&gt;, &lt;legend&gt;</li>
        <li>&lt;del&gt;, &lt;ins&gt;</li>
        <li>&lt;draw&gt;, &lt;line&gt;, &lt;rect&gt;, &lt;circle&gt;, &lt;ellipse&gt;, &lt;polygone&gt;, &lt;polyline&gt;, &lt;path&gt;</li>
    </ul>
    <bookmark title="Balises spécifiques" level="2" ></bookmark>
    <div class="note">
        Les balises spécifiques suivantes ont été ajoutées :<br>
    </div>
    <br>
    <ul class="main" >
        <li>&lt;page&gt;</li>
        <li>&lt;page_header&gt;</li>
        <li>&lt;page_footer&gt;</li>
        <li>&lt;nobreak&gt;</li>
        <li>&lt;barcode&gt;</li>
        <li>&lt;bookmark&gt;</li>
        <li>&lt;qrcode&gt;</li>
    </ul>
</page>
<page pageset="old">
    <bookmark title="Styles CSS" level="1" ></bookmark>
    <div class="note">
        La liste des styles CSS utilisables est la suivante :<br>
    </div>
    <br>
    <table style="width: 100%">
        <tr style="vertical-align: top">
            <td style="width: 50%">
                <ul class="main">
                    <li>color</li>
                    <li>font-family</li>
                    <li>font-weight</li>
                    <li>font-style</li>
                    <li>font-size</li>
                    <li>text-decoration</li>
                    <li>text-indent</li>
                    <li>text-align</li>
                    <li>text-transform</li>
                    <li>vertical-align</li>
                    <li>width</li>
                    <li>height</li>
                    <li>line-height</li>
                    <li>padding</li>
                    <li>padding-top</li>
                    <li>padding-right</li>
                    <li>padding-bottom</li>
                    <li>padding-left</li>
                    <li>margin</li>
                    <li>margin-top</li>
                    <li>margin-right</li>
                    <li>margin-bottom</li>
                    <li>margin-left</li>
                    <li>position</li>
                    <li>top</li>
                    <li>bottom</li>
                    <li>left</li>
                    <li>right</li>
                    <li>float</li>
                    <li>rotate</li>
                    <li>background</li>
                    <li>background-color</li>
                    <li>background-image</li>
                    <li>background-position</li>
                    <li>background-repeat</li>
                </ul>
            </td>
            <td style="width: 50%">
                <ul class="main">
                    <li>border</li>
                    <li>border-style</li>
                    <li>border-color</li>
                    <li>border-width</li>
                    <li>border-collapse</li>
                    <li>border-top</li>
                    <li>border-top-style</li>
                    <li>border-top-color</li>
                    <li>border-top-width</li>
                    <li>border-right</li>
                    <li>border-right-style</li>
                    <li>border-right-color</li>
                    <li>border-right-width</li>
                    <li>border-bottom</li>
                    <li>border-bottom-style</li>
                    <li>border-bottom-color</li>
                    <li>border-bottom-width</li>
                    <li>border-left</li>
                    <li>border-left-style</li>
                    <li>border-left-color</li>
                    <li>border-left-width</li>
                    <li>border-radius</li>
                    <li>border-top-left-radius</li>
                    <li>border-top-right-radius</li>
                    <li>border-bottom-left-radius</li>
                    <li>border-bottom-right-radius</li>
                    <li>list-style</li>
                    <li>list-style-type</li>
                    <li>list-style-image</li>
                </ul>
            </td>
        </tr>
    </table>
</page>
<page pageset="old">
    <bookmark title="Propriétés" level="1" ></bookmark>
    <div class="note">
        La liste des propriétés utilisables est la suivante :<br>
    </div>
    <br>
    <table style="width: 100%">
        <tr style="vertical-align: top">
            <td style="width: 50%">
                <ul class="main">
                    <li>cellpadding</li>
                    <li>cellspacing</li>
                    <li>colspan</li>
                    <li>rowspan</li>
                    <li>width</li>
                    <li>height</li>
                </ul>
            </td>
            <td style="width: 50%">
                <ul class="main">
                    <li>align</li>
                    <li>valign</li>
                    <li>bgcolor</li>
                    <li>bordercolor</li>
                    <li>border</li>
                    <li>type</li>
                    <li>value</li>
                </ul>
            </td>
        </tr>
    </table>
    <bookmark title="Limitations" level="0" ></bookmark>
    <div class="note">
        Cette librairie comporte des limitations :<br>
    </div>
    <br>
    <ul class="main">
        <li>Les float ne sont gérés que pour la balise IMG.</li>
        <li>Elle ne permet généralement pas la conversion directe d'une page HTML en PDF, ni la conversion du résultat d'un WYSIWYG en PDF.</li>
        <li>Cette librairie est là pour faciliter la génération de documents PDF, pas pour convertir n'importe quelle page HTML.</li>
        <li>Les formulaires ne marchent pas avec tous les viewers PDFs...</li>
        <li>Lisez bien le wiki : <a href="http://wiki.spipu.net/doku.php?id=html2pdf:Accueil">http://wiki.spipu.net/doku.php?id=html2pdf:Accueil</a>.</li>
    </ul>
</page>
<!-- <div style="position:absolute;top:2.83in;left:3.04in;width:2.98in;line-height:0.17in;"><span style="font-style:normal;font-weight:bold;font-size:11pt;font-family:BCDEEE+Calibri-Bold;color:#000000">Faculté des Sciences A</span><span style="font-style:normal;font-weight:bold;font-size:11pt;font-family:BCDEEE+Calibri-Bold;color:#1c1c1c">ïn Chock-Casablanca</span><span style="font-style:normal;font-weight:bold;font-size:11pt;font-family:BCDEEE+Calibri-Bold;color:#000000"> </span><br/></SPAN></div>
<img style="position:absolute;top:11.14in;left:3.15in;width:4.06in;height:0.17in" src="vi_2.png" />
<div style="position:absolute;top:11.17in;left:1.82in;width:5.43in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:9pt;font-family:BCDFEE+Calibri;color:#000000">Faculté des Sciences </span><span style="font-style:normal;font-weight:normal;font-size:9pt;font-family:BCDGEE+Calibri;color:#000000">–</span><span style="font-style:normal;font-weight:normal;font-size:9pt;font-family:BCDFEE+Calibri;color:#000000"> A</span><span style="font-style:normal;font-weight:normal;font-size:9pt;font-family:BCDGEE+Calibri;color:#000000">ïnChock Km 8 Route d’El Jadida B.P 5366 Mâarif Casablanca 20100 Maroc</span>
<span style="font-style:normal;font-weight:normal;font-size:9pt;font-family:BCDFEE+Calibri;color:#000000"> </span><br/></SPAN></div>
<img style="position:absolute;top:11.31in;left:3.45in;width:2.12in;height:0.17in" src="vi_3.png" />
<div style="position:absolute;top:11.33in;left:3.45in;width:2.15in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:9pt;font-family:BCDFEE+Calibri;color:#000000">Tel.: 0522 23 06 80 Fax: 0522 23 06 74</span><span style="font-style:normal;font-weight:normal;font-size:9pt;font-family:BCDFEE+Calibri;color:#000000"> </span><br/></SPAN></div>
<img style="position:absolute;top:1.33in;left:3.18in;width:2.66in;height:1.08in" src="ri_1.png" />
<div style="position:absolute;top:4.32in;left:1.51in;width:0.61in;line-height:0.15in;"><span style="font-style:normal;font-weight:bold;font-size:10pt;font-family:BCDEEE+Calibri-Bold;color:#000000">Article 1-</span><span style="font-style:normal;font-weight:bold;font-size:10pt;font-family:BCDEEE+Calibri-Bold;color:#000000"> </span><br/></SPAN></div>
<div style="position:absolute;top:4.64in;left:1.51in;width:4.58in;line-height:0.15in;"><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:BCDFEE+Calibri;color:#000000">La présente convention de stage a pour objet de régler les rapports entre:</span><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:BCDFEE+Calibri;color:#000000"> </span><br/></SPAN></div>
<img style="position:absolute;top:4.93in;left:3.03in;width:3.47in;height:0.19in" src="vi_4.png" />
<div style="position:absolute;top:4.96in;left:1.51in;width:5.03in;line-height:0.15in;"><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:BCDFEE+Calibri;color:#000000">La faculté des Sciences Aïn Chock, représentée par son Doyen </span><span style="font-style:normal;font-weight:normal;font-size:9pt;font-family:BCDFEE+Calibri;color:#000000">: </span><span style="font-style:normal;font-weight:bold;font-size:10pt;font-family:BCDEEE+Calibri-Bold;color:#000000">Pr.Omar SADDIQI</span><span style="font-style:normal;font-weight:bold;font-size:9pt;font-family:BCDEEE+Calibri-Bold;color:#1c1c1c"> </span><br/></SPAN></div>
<img style="position:absolute;top:5.25in;left:1.51in;width:3.74in;height:0.19in" src="vi_5.png" />
<div style="position:absolute;top:5.28in;left:1.51in;width:0.57in;line-height:0.15in;"><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:BCDFEE+Calibri;color:#000000">Adresse </span><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:BCDFEE+Calibri;color:#000000"> </span><br/></SPAN></div>
<div style="position:absolute;top:5.28in;left:2.58in;width:2.70in;line-height:0.15in;"><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:BCDFEE+Calibri;color:#000000">:Km </span><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:BCDGEE+Calibri;color:#000000">7 Route d’El Jadida Casablanca, Maroc,</span><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:BCDFEE+Calibri;color:#000000"> </span><br/></SPAN></div>
<img style="position:absolute;top:5.57in;left:1.51in;width:2.43in;height:0.19in" src="vi_6.png" />
<div style="position:absolute;top:5.60in;left:1.51in;width:0.69in;line-height:0.15in;"><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:BCDFEE+Calibri;color:#000000">Téléphone</span><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:BCDFEE+Calibri;color:#000000"> </span><br/></SPAN></div>
<div style="position:absolute;top:5.60in;left:2.58in;width:1.39in;line-height:0.15in;"><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:BCDFEE+Calibri;color:#000000">: 00 212 5 22 23 06 84</span><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:BCDFEE+Calibri;color:#000000"> </span><br/></SPAN></div>
<img style="position:absolute;top:5.89in;left:1.51in;width:1.89in;height:0.19in" src="vi_7.png" />
<div style="position:absolute;top:5.92in;left:1.51in;width:0.24in;line-height:0.15in;"><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:BCDFEE+Calibri;color:#000000">Fax</span><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:BCDFEE+Calibri;color:#000000"> </span><br/></SPAN></div>
<div style="position:absolute;top:5.92in;left:2.04in;width:1.39in;line-height:0.15in;"><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:BCDFEE+Calibri;color:#000000">: 00 212 5 22 23 06 74</span><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:BCDFEE+Calibri;color:#000000"> </span><br/></SPAN></div>
<img style="position:absolute;top:6.21in;left:1.51in;width:2.39in;height:0.19in" src="vi_8.png" />
<div style="position:absolute;top:6.24in;left:1.51in;width:2.42in;line-height:0.15in;"><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:BCDFEE+Calibri;color:#000000">Et désignée ci-</span><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:BCDFEE+Calibri;color:#000000">ap</span><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:BCDFEE+Calibri;color:#000000">rès par </span><a href="https://fr.wikipedia.org/wiki/%C3%89tablissement"><span style="font-style:normal;font-weight:bold;font-size:10pt;font-family:BCDEEE+Calibri-Bold;color:#000000">Établissement</span></a>
<a href="https://fr.wikipedia.org/wiki/%C3%89tablissement"><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:BCDFEE+Calibri;color:#660099"> </span></a>
<br/></SPAN></div>
<div style="position:absolute;top:6.56in;left:1.51in;width:3.39in;line-height:0.15in;"><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:BCDFEE+Calibri;color:#000000">Et</span><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:BCDFEE+Calibri;color:#000000"> </span><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:BCDGEE+Calibri;color:#000000">l’Entreprise </span><span style="font-style:normal;font-weight:bold;font-size:10pt;font-family:BCDEEE+Calibri-Bold;color:#000000">(ou organisme) </span><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:BCDFEE+Calibri;color:#000000">ci</span><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:BCDFEE+Calibri;color:#000000">-dessous</span><span style="font-style:normal;font-weight:bold;font-size:10pt;font-family:BCDEEE+Calibri-Bold;color:#000000"> </span><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:BCDFEE+Calibri;color:#000000">mentionnée:</span><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:BCDFEE+Calibri;color:#000000"> </span><br/></SPAN></div>
<div style="position:absolute;top:6.89in;left:1.51in;width:0.79in;line-height:0.15in;"><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:BCDFEE+Calibri;color:#000000">Sigle et nom</span><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:BCDFEE+Calibri;color:#000000"> </span><br/></SPAN></div>
<div style="position:absolute;top:6.89in;left:2.58in;width:3.08in;line-height:0.15in;"><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:BCDGEE+Calibri;color:#000000">:…………………………………………………………………………..</span><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:BCDFEE+Calibri;color:#000000"> </span><br/></SPAN></div>
<div style="position:absolute;top:7.21in;left:1.51in;width:0.57in;line-height:0.15in;"><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:BCDFEE+Calibri;color:#000000">Adresse </span><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:BCDFEE+Calibri;color:#000000"> </span><br/></SPAN></div>
<div style="position:absolute;top:7.21in;left:2.58in;width:3.12in;line-height:0.15in;"><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:BCDFEE+Calibri;color:#000000">: </span><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:BCDGEE+Calibri;color:#000000">…………………………………………………………………………..</span><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:BCDFEE+Calibri;color:#000000"> </span><br/></SPAN></div>
<div style="position:absolute;top:7.53in;left:1.51in;width:4.17in;line-height:0.15in;"><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:BCDFEE+Calibri;color:#000000">Représentée par </span><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:BCDFEE+Calibri;color:#000000">: </span><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:BCDGEE+Calibri;color:#000000">…………………………………………………………………………..</span><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:BCDFEE+Calibri;color:#000000"> </span><br/></SPAN></div>
<div style="position:absolute;top:7.85in;left:1.51in;width:0.69in;line-height:0.15in;"><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:BCDFEE+Calibri;color:#000000">Téléphone</span><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:BCDFEE+Calibri;color:#000000"> </span><br/></SPAN></div>
<div style="position:absolute;top:7.85in;left:2.58in;width:3.12in;line-height:0.15in;"><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:BCDFEE+Calibri;color:#000000">: </span><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:BCDGEE+Calibri;color:#000000">…………………………………………………………………………..</span><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:BCDFEE+Calibri;color:#000000"> </span><br/></SPAN></div>
<div style="position:absolute;top:8.17in;left:1.51in;width:3.53in;line-height:0.15in;"><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:BCDFEE+Calibri;color:#000000">E-mail </span><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:BCDFEE+Calibri;color:#000000">: </span><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:BCDGEE+Calibri;color:#000000">…………………………………………………………………………..</span><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:BCDFEE+Calibri;color:#000000"> </span><br/></SPAN></div>
<div style="position:absolute;top:8.49in;left:1.51in;width:2.26in;line-height:0.15in;"><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:BCDFEE+Calibri;color:#000000">Et désignée ci-après par </span><span style="font-style:normal;font-weight:bold;font-size:10pt;font-family:BCDHEE+Calibri-Bold;color:#000000">l’Entreprise</span><span style="font-style:normal;font-weight:bold;font-size:10pt;font-family:BCDEEE+Calibri-Bold;color:#000000"> </span><br/></SPAN></div>
<div style="position:absolute;top:8.81in;left:1.51in;width:0.93in;line-height:0.15in;"><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:BCDFEE+Calibri;color:#000000">Elle concerne :</span><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:BCDFEE+Calibri;color:#000000"> </span><br/></SPAN></div>
<div style="position:absolute;top:9.13in;left:1.51in;width:6.03in;line-height:0.15in;"><span style="font-style:normal;font-weight:bold;font-size:10pt;font-family:BCDEEE+Calibri-Bold;color:#000000">Mme/Melle/Mr</span><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:BCDGEE+Calibri;color:#000000">…………</span><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:BCDFEE+Calibri;color:#000000">..</span><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:BCDGEE+Calibri;color:#000000">………</span><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:BCDFEE+Calibri;color:#000000">.</span><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:BCDGEE+Calibri;color:#000000">…………</span><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:BCDFEE+Calibri;color:#000000">.</span><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:BCDGEE+Calibri;color:#000000">……</span><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:BCDFEE+Calibri;color:#000000">étudiant(e) régulièrement </span><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:BCDGEE+Calibri;color:#000000">inscrit(e) dans l’établissement</span><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:BCDGEE+Calibri;color:#000000"> </span><br/></SPAN></div>
<div style="position:absolute;top:9.33in;left:1.51in;width:5.91in;line-height:0.15in;"><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:BCDGEE+Calibri;color:#000000">pour l’année universitaire 2018</span><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:BCDFEE+Calibri;color:#000000">-2019, titulaire du  CNE suivant : </span><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:BCDGEE+Calibri;color:#000000">………….</span><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:BCDFEE+Calibri;color:#000000">.</span><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:BCDGEE+Calibri;color:#000000">.……</span><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:BCDFEE+Calibri;color:#000000">.</span><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:BCDGEE+Calibri;color:#000000">……</span><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:BCDGEE+Calibri;color:#000000">………………</span><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:BCDFEE+Calibri;color:#000000">et de</span><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:BCDFEE+Calibri;color:#000000"> </span><br/></SPAN></div>
<div style="position:absolute;top:9.53in;left:1.51in;width:3.54in;line-height:0.15in;"><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:BCDGEE+Calibri;color:#000000">la carte d’identité natio</span><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:BCDFEE+Calibri;color:#000000">nale CIN </span><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:BCDGEE+Calibri;color:#000000">…………..……….………….……</span><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:BCDFEE+Calibri;color:#000000"> </span><br/></SPAN></div>
<div style="position:absolute;top:9.85in;left:1.51in;width:2.06in;line-height:0.15in;"><span style="font-style:normal;font-weight:normal;font-size:10pt;font-family:BCDFEE+Calibri;color:#000000">Et dénommé ci-après </span><span style="font-style:normal;font-weight:bold;font-size:10pt;font-family:BCDEEE+Calibri-Bold;color:#000000">le stagiaire</span><span style="font-style:normal;font-weight:bold;font-size:10pt;font-family:BCDEEE+Calibri-Bold;color:#000000"> </span><br/></SPAN></div>
<img style="position:absolute;top:3.31in;left:1.49in;width:6.02in;height:0.62in" src="ri_2.png" />
<div style="position:absolute;top:3.36in;left:3.50in;width:2.21in;line-height:0.20in;"><span style="font-style:normal;font-weight:bold;font-size:13pt;font-family:BCDEEE+Calibri-Bold;color:#000000">CONVENTION DE STAGE</span><span style="font-style:normal;font-weight:normal;font-size:13pt;font-family:BCDFEE+Calibri;color:#000000"> </span><br/></SPAN></div>
<div style="position:absolute;top:3.70in;left:3.61in;width:1.94in;line-height:0.17in;"><span style="font-style:normal;font-weight:bold;font-size:11pt;font-family:BCDEEE+Calibri-Bold;color:#000000">CYCLE MASTER 2018-2019</span><span style="font-style:normal;font-weight:normal;font-size:11pt;font-family:BCDFEE+Calibri;color:#000000"> </span><br/></SPAN></div> -->
</page>
<?php
	$content =ob_get_clean();

	$html2pdf = new HTML2PDF('P', 'A4', 'en');
	$html2pdf->pdf->SetDisplayMode('fullpage');
	$html2pdf->writeHTML($content);
	$html2pdf->Output('first_PDF_file.pdf');
?>
