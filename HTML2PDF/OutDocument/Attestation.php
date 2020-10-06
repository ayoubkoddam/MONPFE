<?php

	require __DIR__.'/vendor/autoload.php';

	use Spipu\Html2Pdf\Html2Pdf;
	ob_start();
	session_start();
	include'../../connection.php';
  $sql=$bdd->prepare("
    SELECT trombinoscope.Etudiant_e_1,trombinoscope.Etudiant_e_2,trombinoscope.Etudiant_e_3,trombinoscope.Nom_filiere,Affecter_sujet.Sujet FROM trombinoscope JOIN Affecter_sujet ON trombinoscope.Num_groupe=Affecter_sujet.Num_groupe WHERE Encadrant=?;");
  $sql->execute(array($_SESSION['Nom_enseignant']));
  $query=$bdd->prepare('SELECT Annee_univ FROM annee_universitaire ORDER BY Annee_univ DESC');
    $query->execute();
    $row=$query->fetch();
    $annee_universitaire=$row[0];

?>

<style>
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}
</style>
<html>
<head><meta http-equiv=Content-Type content="text/html; charset=UTF-8">
<style type="text/css">

span.cls_004{font-size:24.1px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none}
div.cls_004{font-size:24.1px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none}
span.cls_005{font-size:14.1px;color:rgb(0,0,0);font-weight:normal;font-style:italic;text-decoration: none}
div.cls_005{font-size:14.1px;color:rgb(0,0,0);font-weight:normal;font-style:italic;text-decoration: none}
span.cls_006{font-size:16.1px;color:rgb(0,0,0);font-weight:normal;font-style:italic;text-decoration: none}
div.cls_006{font-size:16.1px;color:rgb(0,0,0);font-weight:normal;font-style:italic;text-decoration: none}
span.cls_007{font-size:11.1px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none}
div.cls_007{font-size:11.1px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none}
span.cls_002{font-size:11.1px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}
div.cls_002{font-size:11.1px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}

</style>
<script type="text/javascript" src="2eb6f87e-7f39-11e9-9d71-0cc47a792c0a_id_2eb6f87e-7f39-11e9-9d71-0cc47a792c0a_files/wz_jsgraphics.js"></script>
</head>
<body>
<div style="position:absolute;left:30%;margin-left:-257px;top:0px;width:795px;height:1142px;border-style:outset;overflow:hidden">
<div style="position:absolute;left:36% ;top:0px;">
<img src="2eb6f87e-7f39-11e9-9d71-0cc47a792c0a_id_2eb6f87e-7f39-11e9-9d71-0cc47a792c0a_files/ri_1.png" style="position:absolute;top:0.33in;width:2.66in;height:1.08in" ></div>  
<div style=" position:absolute;left:259.83px;top:200.83px" class="cls_004"><span class="cls_004">Attestation d'encadrement</span></div><br><br>
<div style=" position:absolute;left:60.03px;top:330.85px" class="cls_005"><span class="cls_005">   L'Enseignant(e) : <strong><?=$_SESSION['Prenom_enseignant']." ".$_SESSION['Nom_enseignant']?></strong> </span></div>
<div style="position:absolute;left:60.3px;top:367.10px" class="cls_006"><span class="cls_006"></span><span class="cls_005">  À encadrer les étudiants dans le cadre de la rélisation du projet de fin d'étude </span></div>
<div style="position:absolute;left:60.03px;top:388.35px" class="cls_005"><span class="cls_005"> </span> durant l'année universitaire <?=$annee_universitaire;?> </div>
<!-- <div style="position:absolute;left:100.03px;top:400.87px" class="cls_005"><span class="cls_005"><table border="2"><tr><th> &nbsp;&nbsp;&nbsp; Sujets &nbsp;&nbsp;&nbsp;</th><th>année universitaire</th></tr></table></span>
</div> -->
 <div>
 	<span></span></div>
 <?php    
             echo "<div style='position:absolute;left:30px;top:440.87px;width:100%;' class='cls_005'><span class='cls_005'><table border='0'><tr style='width:100%;'><th style='width:90px;'> Etudiant(e)1 </th><th style='width:90px;'> Etudiant(e)2 </th><th style='width:90px;'> Etudiant(e)3 </th><th style='width:100px; text-align:center;'> Sujet </th ><th style='width:100px; text-align:center;'>Filière</th></tr>";
             while($row=$sql->fetch()){
              $req1=$bdd->prepare("SELECT Prenom_etudiant,Nom_etudiant FROM etudiant WHERE CNE=?");
              $req1->execute(array($row[0]));
              $etud1=$req1->fetch();

              $req2=$bdd->prepare("SELECT Prenom_etudiant,Nom_etudiant FROM etudiant WHERE CNE=?");
              $req2->execute(array($row[1]));
              $etud2=$req2->fetch();

              $req3=$bdd->prepare("SELECT Prenom_etudiant,Nom_etudiant FROM etudiant WHERE CNE=?");
              $req3->execute(array($row[2]));
              $etud3=$req3->fetch();
             echo "<tr><td>".$etud1[0]."<br>".$etud1[1]."</td><td>".$etud2[0]."<br>".$etud2[1]."</td><td>".$etud3[0]."<br>".$etud3[1]."</td><td style='text-align:center;'>".$row[4]."</td><td style='text-align:center;'>".$row[3]."</td></tr>";
             }
             echo "</table></span>
                 </div>";

      ?>
<div style="position:absolute;left:595.68px;top:1000.45px" class="cls_007"><span class="cls_007">Département informatique</span></div>
<div style="position:absolute;left:167.03px;top:1065.47px" class="cls_002"><span class="cls_002">Faculté des Sciences -  AïnChock Km 8 Route d’El Jadida B.P 5366 Mâarif Casablanca 20100</span></div>
</div>

</body>
</html>

<?php
	$content =ob_get_clean();

	$html2pdf = new HTML2PDF('P', 'A4', 'en');
	$html2pdf->pdf->SetDisplayMode('fullpage');
	$html2pdf->writeHTML($content);
	$html2pdf->Output('first_PDF_file.pdf');
?>
