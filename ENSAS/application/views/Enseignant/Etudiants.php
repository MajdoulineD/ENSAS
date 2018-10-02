<!-- Services Section -->
<div class="containner">
<div class="form-style-6">
<form method="post" action="/ENSAS/EnseignantController/PdfEtudiant">
        <h1>Choisir le niveau et la filiere</h1>
		    <label>Niveau : </label>
			<select name="IdNiveau">
			<?php
				foreach($niveaux as $i){
					echo "<option value=".$i->IdNiveau.">".$i->NomNiveau."</option>";
				}
			?>
			</select>
            <label>Filiere : </label>
			<select name="IdFiliere">
			<?php
				foreach($filieres as $i){
					echo "<option value=".$i->IdFiliere.">".$i->NomFiliere."</option>";
				}
			?>
			</select>
			<label>Module :</label>
			<select name="IdModule">
			<?php
				foreach($modules as $i){
					echo "<option value=".$i->IdModule.">".$i->NomModule."</option>";
				}
			?>
			</select>
			<input type="image" src="/ENSAS/public/images/pdf.ico" width="20%" border="0"/>
</form>        
</div>
</div>