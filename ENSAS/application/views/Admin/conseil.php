	<section>
		<div class="container">
		<h2 class="lead">Conseil disciplinaire du <?php echo $niveau;?></h2>
		<div class="col-md-2 form-style-6">
		<form method="post" action="/ENSAS/AdminController/Conseil">
			<label>
				<center>Veuillez choisir le niveau d'etudes :</center>
			</label>
			<select name="IdNiveau">
				<option value="1">Premiere annee</option>
				<option value="2">Deuxieme annee</option>
				<option value="3">Troisieme annee</option>
				<option value="4">Quatrieme annee</option>
				<option value="5">Cinquieme annee</option>
			</select>
			<input type="submit" value="Send" />
		</form>
		</div>
		<div class="col-md-10">
			<div class="col-md-12">
			<table class="table table-hover">
				<thead>
				<tr><th>Filiere</th><th>Nom et Prenom de l'etudiant</th></tr>
				</thead>
				<tbody>
				<?php
					foreach($conseil as $i){
						echo "<tr><td>".$i->NomFiliere."</td><td>".$i->PrenomEtudiant." ".$i->NomEtudiant." </td></tr>";
					}
				?>
				</tbody>
			</table>
			<div class="col-xs-11">			
				<div class="alert alert-info" role="alert">Il seront convoqué le jour : 20/06/2017 et la date de la délibération du la decision du conseil aura lieu au maximun apres une semaine</div>
			</div>
			<div class="col-xs-1">
				<form method="post" action="/ENSAS/AdminController/PdfConseil">
					<input type="hidden" value="<?php echo $niveau?>" name="niveau"/>
					<input type="image" src="/ENSAS/public/images/PDF.jpg" height="40px" width="40px" border="0"/>
				</form>
			</div>
			</div>
			<div class="col-md-4 col-md-offset-4">
				<form class="form-style-6"> 
					<input type="button" value="Decision"/> 
				</form>
			</div>
		</div>
		</div>
	</section>
