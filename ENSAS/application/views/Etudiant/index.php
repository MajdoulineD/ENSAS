<div class="container">
	<div class="col-xs-12 intro-text">
		<div class="lead"><?php echo "Bienvenue ". $this->session->userdata('Etudiant')[0]->PrenomEtudiant." ". $this->session->userdata('Etudiant')[0]->NomEtudiant;?></div>		<div class="lead">Votre Espace d'absence</div>
        <div class="hidden-xs col-sm-2 col-sm-offset-5"><a href="/ENSAS/EtudiantController/Profil" class="page-scroll btn btn-xl">More</a></div>
    </div>
</div>