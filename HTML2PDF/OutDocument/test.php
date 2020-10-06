<?php


	require __DIR__.'/vendor/autoload.php';

	use Spipu\Html2Pdf\Html2Pdf;
	ob_start();
?>
<style type="text/css">
	table {border-collapse: collapse;}
	table td {padding: 0px}
</style>
<page>
	<h1>Convention de stage 
	<qrcode value="monPFE" style="width: 40mm;background-color: white; color: black;"></qrcode>
	</h1>
</page>
<page>
	<h1>page2</h1>
	<!-- <div style="position:absolute;top:2.83in;left:3.04in;width:2.98in;line-height:0.17in;">
		<span style="font-style:normal;font-weight:bold;font-size:11pt;font-family:BCDEEE+Calibri-Bold;color:#000000">Faculté des Sciences A</span>
		<span style="font-style:normal;font-weight:bold;font-size:11pt;font-family:BCDEEE+Calibri-Bold;color:#1c1c1c">ïn Chock-Casablanca</span>
		<span style="font-style:normal;font-weight:bold;font-size:11pt;font-family:BCDEEE+Calibri-Bold;color:#000000"> </span><br/>
	</div> -->
</page>	
<page>
	<h1>page3</h1>
</page>
<page>
	<h1>page4</h1>
</page>	
<?php
	$content =ob_get_clean();

	$html2pdf = new HTML2PDF('P', 'A4', 'en');
	$html2pdf->pdf->SetDisplayMode('fullpage');
	$html2pdf->writeHTML($content);
	$html2pdf->Output('first_PDF_file.pdf');
?>
