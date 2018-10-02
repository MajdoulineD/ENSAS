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
			Departement : <?php echo $departement?><br>
			Niveau : <?php echo $niveau. " ". $filiere?>
		</div>
		<h2>Rapport d'absence du module <?php echo $module;?>:</h2>
		<div class="description">
			&nbsp; &nbsp; &nbsp; &nbsp; Voici la liste des etudiants accompagnés avec le nombre d'absence dans ce module</div>
		<table class="table">
			<thead>
			<tr><th>N°</th><th>Prenom d'etudiant</th><th>Nom d'etudiant</th><th>Nombres d'heures</th></tr>
			</thead>
			<tbody>
			<?php
				$j=1;
				foreach($absences as $i){
					echo "<tr><td>".$j++."</td><td>".$i->PrenomEtudiant."</td><td>".$i->NomEtudiant."</td><td>".$i->nbAbsence." </td></tr>";
				}
			?>
			</tbody>
		</table>
		<div class="signature">
			Signature : <br> <?php echo $this->session->userdata('Enseignant')[0]->NomProfesseur." ". $this->session->userdata('Enseignant')[0]->PrenomProfesseur?> 
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
		$pdf->Output("sortie.pdf");
	}
	catch(HTML2PDF_exception $e)
	{
		die($e);
	}
?>
