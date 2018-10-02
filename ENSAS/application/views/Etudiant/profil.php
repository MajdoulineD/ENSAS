	<div class="container">
		<h2 class="lead">Vos absences par module</h2>
		<div class="container" style="overflow-x:auto;">
		<table class="table table-hover">
			<thead>
			<tr><th>Module</th><th>Nombres d'heures</th></tr>
			</thead>
			<tbody>
			<?php
				for($i=0;$i<count($module);$i++){
					echo "<tr><td>".$module[$i]."</td><td>".$pourcentage[$i]." heures</td></tr>";
				}
			?>
			</tbody>
		</table>
		</div>
		<div>
		<div class="col-xs-10 col-md-8 col-md-offset-1">
		<?php if($alert == "Success"){
		?>
		<div class="alert alert-success" role="alert"><?php echo $avert;?></div>
		<?php
		}else if($alert == "Warning"){
		?>
		<div class="alert alert-warning" role="alert"><?php echo $avert;?></div>
		<?php
		}else if($alert == "Danger"){
		?>
		<div class="alert alert-danger" role="alert"><?php echo $avert;?></div>
		<?php
		}
		?>
		</div>
		<div class="col-xs-2 col-md-2">
			<form method="post" action="/ENSAS/EtudiantController/pdf">
				<input type="image" src="/ENSAS/public/images/PDF.jpg" height="40%" width="40px" border="0"/>
			</form>
		</div>
		</div>
	</div>
	