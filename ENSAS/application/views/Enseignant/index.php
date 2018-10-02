<div class="container">
	<div class="col-xs-12 intro-text">
        <div class="lead"><?php echo "Bienvenue ". $this->session->userdata('Enseignant')[0]->NomProfesseur." ". $this->session->userdata('Enseignant')[0]->PrenomProfesseur;?></div>
		<div class="lead">Votre Espace d'absence</div>
        <div class="hidden-xs col-sm-2 col-sm-offset-5"><a href="/ENSAS/EnseignantController/Emploi" class="page-scroll btn btn-xl">More</a></div>
    </div>
</div>