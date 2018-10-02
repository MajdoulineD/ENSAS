<div class="container">
	<h2 class="lead">La liste des etudiants à approuver</h2>
	<form method="post" action="/ENSAS/AdminController/ApprouverDemande">
		<table class="table table-hover">
			<thead>
			</thead>
				<tr><th>L'etudiant</th><th>Approuvé</th></tr>
			<tbody>
			<?php
				foreach($etudiants as $i){
					echo "<tr><td> L'etudiant  ". $i->PrenomEtudiant." ".$i->NomEtudiant." son CIN : ".$i->CINEtudiant." et son CNE : ".$i->CNEEtudiant."</td><td><input type='checkbox' name='".$i->IDEtudiant_attente."' value='".$i->IDEtudiant_attente."'/></td></tr>";
				}
			?>
			</tbody>
		</table>
		<div class="form-style-6">
			<input type="submit" value="Approuver" class="form-style-6"/>
		</div>
	</form>
</div>