
<div><div id="slider" class="flexslider">
<div class="container">
	<div class="form-style-6">
	<h1>Inscription d'un nouveau etudiant</h1>
	<form method="post" action="/ENSAS/FrontEnd/InscriptionConfirm">

		<label style="text-align: center;">Votre CIN  <span class="required-filed">* </span >:</label>
		<input type="text" name="CINEtudiant"  placeholder="Votre cin" value="<?php echo set_value('CINEtudiant') ?>"/>
		<?php echo form_error('CINEtudiant'); ?>

		<label style="text-align: center;">Votre CNE  <span class="required-filed">* </span >:</label>
		<input type="text" name="CNEEtudiant"  placeholder="Votre cin" value="<?php echo set_value('CNEEtudiant') ?>"/>
		<?php echo form_error('CNEEtudiant'); ?>
		
		<label style="text-align: center;">Votre nom  <span class="required-filed">* </span >:</label>
		<input type="text" name="NomEtudiant"  placeholder="Votre nom" value="<?php echo set_value('NomEtudiant') ?>"/>
		<?php echo form_error('NomEtudiant'); ?>

		<label style="text-align: center;">Votre prenom  <span class="required-filed">* </span >:</label>
		<input type="text" name="PrenomEtudiant"  placeholder="Votre prenom" value="<?php echo set_value('PrenomEtudiant') ?>"/>
		<?php echo form_error('PrenomEtudiant'); ?>

		<label style="text-align: center;">Votre date de naissance <span class="required-filed">* </span >:</label>
		<input type="date" name="DNEtudiant"  placeholder="Votre date de naissance" value="<?php echo set_value('DNEtudiant') ?>"/>
		<?php echo form_error('DNEtudiant'); ?>
		
		<label style="text-align: center;">Votre email  <span class="required-filed">* </span >:</label>
		<input type="text" name="EmailEtudiant"  placeholder="Votre email" value="<?php echo set_value('EmailEtudiant') ?>"/>
		<?php echo form_error('EmailEtudiant'); ?>

		<label style="text-align: center;">Votre telephone <span class="required-filed">* </span >:</label>
		<input type="text" name="TelEtudiant"  placeholder="Votre telephone" value="<?php echo set_value('TelEtudiant') ?>"/>
		<?php echo form_error('TelEtudiant'); ?>
		
		<label style="text-align: center;">Votre sexe <span class="required-filed">* </span >:</label>
		<select name="SexEtudiant">
			<option value="Masculin">Masculin</option>
			<option value="Feminum">Feminum</option>
			
		</select>
		<?php echo form_error('SexEtudiant'); ?>
		
		<label style="text-align: center;">Votre mot de passe  <span class="required-filed">* </span >:</label>
		<input type="password" name="PassEtudiant"  placeholder="Votre mot de passe" value="<?php echo set_value('PassEtudiant') ?>"/>
		<?php echo form_error('PassEtudiant'); ?>

		<label style="text-align: center;">Confirmer votre mot de passe <span class="required-filed">* </span >:</label>
		<input type="password" name="Pass2Etudiant" placeholder="Retapper votre mot de passe" value="<?php echo set_value('Pass2Etudiant') ?>"/>
		<?php echo form_error('Pass2Etudiant'); ?>
		<input type="hidden" name="IdNiveau" value="1"/>
		<input type="hidden" name="IdFiliere" value="1"/>
		<input type="submit" value="Valider" />
	</form>
	</div>
</div>
 </div>
<script>
    $(document).ready(function() {
        $('.source_info_autre').hide();
        $('.error-container').effect("shake", {times: 4}, 0);

    });
    $('#radio_autre').on('click', function() {
        $('.source_info_autre').fadeIn();
    });
    $('.visible-f').on('click', function() {
        $('.source_info_autre').fadeOut();
    });

</script>