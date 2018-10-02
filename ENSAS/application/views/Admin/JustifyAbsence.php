<header>
	<section>
		<div class="container">
	<div class="form-style-6">
	<h1>Formulaire pour justifier une absence</h1>
	<form method="post" action="/ENSAS/AdminController/JustifyAbsenceConfirm">
		<label>Etudiant : </label>
		<select name="etudiant">
			<?php
				foreach($etudiants as $i){
					echo "<option value='".$i->ID."'>".$i->PrenomEtudiant." ".$i->NomEtudiant."</option>";
				}
			?>
		</select>
		<label>Date debut : </label><input type="date" name="datedebut" required/>
		<label>Date fin : </label><input type="date" name="datefin" required/>
		<input type="submit" value="Send" />
	</form>
	</div>
		</div>
</section>
</header>