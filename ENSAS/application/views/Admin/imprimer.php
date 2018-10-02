<?php
	ob_start();
	$jour = date('d/m/Y');
	$jourr = date('dmY');
?>

<!--  _-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_- 	le contenu du fichier pdf   _-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-  -->
	
	<page backcolor="#EEEEEE" backtop="5mm" backleft="10mm" backright="10mm" >
	<div class="container">
		<div class="header">
			Université Cadi AYYAD <br>Ecole Nationale des Sciences Appliquées de Safi
		</div>
		<div class="DFN">
			Cycle : <?php echo $cycle?><br>
			Niveau : <?php echo $niveau?>
		</div>
		<h2>Conseil disciplaine:</h2>
		<div class="description">
			&nbsp; &nbsp; &nbsp; &nbsp; Voici la liste des etudiants convoqué au conseil displinaire :</div>
			<?php
				for($i=0;$i<count($filiere);$i++){
			?>
				<h5 style="text-decoration: underline; font-style: italic;"><?php echo $filiere[$i]?></h5>
					<?php
						for($j=0;$j<count($etudiant[$i]);$j++){
					?>
						<p style="text-align: center"><?php echo $etudiant[$i][$j]?></p>
					<?php
						}
					?>
			<?php
				}
			?>
		<div class="signature">
			Signature : <br> Chef de departement 
		</div>
		<div class="jour">
			Date : <?php echo $jour;?>
		</div>
	</div>
	</page>
<!--  _-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-      Fin du contenu du fichier pdf _-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-      -->

	<?php
	$content = ob_get_clean();
	try
	{
		$pdf = new HTML2PDF('P','A4','fr');
		$css = '<style>'.file_get_contents(base_url().'public/css/table.css').'</style>';
		$pdf->writeHTML($css);
		$pdf->writeHTML($content);
		$pdf->Output("conseildisciplinaire.pdf");
	}
	catch(HTML2PDF_exception $e)
	{
		die($e);
	}
?>
