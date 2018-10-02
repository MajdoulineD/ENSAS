<div class="container">
<h2 class="lead">Votre emploi du temps</h2>
<div style="overflow-x:auto;">
<table class="table table-hover">
	<thead>
	<tr><th>Module</th><th>Jour</th><th>Horaire</th><th>Type de seance</th></tr>
	</thead>
	<tbody>
	<?php
		foreach($emploi as $i){
			echo "<tr><td>".$i->NomModule."</td><td>".$i->Jour."</td><td>".$i->HeureDebut." - ".$i->HeureFin."</td><td>".$i->Type."</td></tr>";
		}
	?>
	</tbody>
</table>
</div>
</div>
