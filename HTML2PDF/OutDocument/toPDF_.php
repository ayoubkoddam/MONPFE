<?php
    //require_once '../Model/classes/Personne.php';
    //require_once '../Model/db/PersonneDB.php';
    require __DIR__.'/vendor/autoload.php';

	use Spipu\Html2Pdf\Html2Pdf;
    
    //$personneDB = new PersonneDB();
    //$list = $personneDB->get();
    
    ob_start();
?>

<page>
	<h1>Liste</h1>
	<table border="1" style="border-collapse: collapse;">
		<tr>
			<th>Nom</th>
			<th>Date de Naissance</th>
		</tr>
		<?php foreach ($list as $p) : ?>
			<tr>
				<td><?= $p->getNom() ?></td>
				<td><?= $p->getDateNaissance() ?></td>
			</tr>
		<?php endforeach; ?>
	</table>
</page>
<page>
	<qrcode value="http://www.fsac.ac.ma" width="50mm"></qrcode>
</page>

<?php 
    $content = ob_get_clean();
    
    $pdf = new Html2Pdf('P', 'A4', 'fr');
    $pdf->writeHTML($content);
    $pdf->output("personnes.pdf", "D");
?>
    