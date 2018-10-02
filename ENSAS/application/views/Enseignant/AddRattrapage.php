<!-- Services Section -->
<div class="containner">
<div class="form-style-6">
<form method="post" action="/ENSAS/EnseignantController/ConfirmRattrapage">
        <h1>Ajouter une seance de rattrapage</h1>
		    <label>Module : </label>
			<select name="IdModule" id="module">
			<?php
				foreach($modules as $i){
					echo "<option value=".$i->IdModule.">".$i->NomModule."</option>";
				}
			?>
			</select>
            <label>Jour : </label>
			<select name="Jour">
				<option value="Monday">Monday</option>
				<option value="Tuesday">Tuesday</option>
				<option value="Wednesdayy">Wednesday</option>
				<option value="Thursday">Thursday</option>
				<option value="Friday">Friday</option>
				<option value="Saturday">Saturday</option>
				<option value="Sunday">Sunday</option>
			</select>
			<label>Heure debut: </label>
			<input type="time" name="HeureDebut" required/>
			<label>Heure fin : </label>
			<input type="time" name="HeureFin" required/>
			<label>Type de seance : </label>
			<select name="Type">
				<option value="Rattrapage">Rattrapage</option>
				<option value="DS">Devoir</option>
			</select>
			<input type="submit" value="Ajouter"/>
</form>        
</div>
</div>