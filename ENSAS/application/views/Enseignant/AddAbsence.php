<?php
if($bool){?>
<div class="container">
<div id="EnseignantAbsence">
<h2 class="lead">La feuille d'absence </h2>
<h2 class="lead">Module <?php echo "\"".$module."\"&nbsp&nbsp - &nbsp&nbsp"." ".$niveau. "&nbsp&nbsp - &nbsp&nbsp".$filiere;?></h2>
<form action="/ENSAS/EnseignantController/ConfirmAbsence" method="post">
<table class="table table-hover">
	<thead>
	<tr><th>CNE</th><th>Nom & Prenom Etudiant</th><th>Absence</th></tr>
	</thead>
	<tbody>
	<?php
		foreach($etudiants as $i){
			echo "<tr><td>".$i->CINEtudiant."</td><td>".$i->PrenomEtudiant . " ". $i->NomEtudiant. "</td><td><input type='checkbox' name='".$i->ID."' value='".$i->ID."'/></td></tr>";
		}
	?>
	</tbody>
</table>
    <div class="form-style-6">
	    <input type="submit" value="Valider"/>
    </div>
</form>
</div>
<?php }
?>
<?php
if(!$bool){
	?>
	<div id="slider" class="flexslider">
        <ul class="slides">
            <li>
            	<img src="/ENSAS/public/images/image.png" height="30px";>
            </li>
        </ul>
	</div>
	<div class="container" id="EnseignantNonAbsence">
		<p>Vous n'avez pas de seance pour l'instant</p>
		<a class='page-scroll btn btn-xl' href='/ENSAS/EnseignantController/addRattrapage'> Add Rattrapage </a>
	</div>
<?php
}
?>