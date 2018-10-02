<?php
	require(APPPATH.'libraries/html2pdf/html2pdf.class.php');
	ob_start();
	$user = $this->session->userdata('Etudiant')[0]->PrenomEtudiant." ". $this->session->userdata('Etudiant')[0]->NomEtudiant;
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
		<h2>Rapport d'absence annuelle:</h2>
		<div class="description">
			&nbsp; &nbsp; &nbsp; &nbsp; <?php echo $user?>,
		<?php if($alert == "Success"){
		?>
		on vous felicite pour votre seriosité et votre bienveillance à vos cours
		<?php
		}else if($alert == "Warning"){
		?>
		on vous annonce que vous avez un grand risque d'etre convoqué au conseil disciplinaire
		<?php
		}else if($alert == "Danger"){
		?>
		malheureusement, vous etes deja convoqué au conseil disciplinaire 
		<?php
		}
		?>. et on vous recommande un tableau recapitulatif de vos absences durant cette année dans tous les modules :
		</div>
		<table class="table">
			<thead>
			<tr><th>Module</th><th>Nombres d'heures</th></tr>
			</thead>
			<tbody>
			<?php
				for($i=0;$i<count($module);$i++){
					echo "<tr><td>".$module[$i]."</td><td>".$pourcentage[$i]." heures </td></tr>";
				}
			?>
			</tbody>
		</table>
		<div class="signature">
			Signature : <br> Chef de département 
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
		$pdf->Output("$user$jourr.pdf");
	}
	catch(HTML2PDF_exception $e)
	{
		die($e);
	}
?>
