<div class="container">	
	<div class="col-xs-12 intro-text">
		<div class="lead"><?php echo "Bienvenue ". $this->session->userdata('Admin')[0]->PrenomAdmin." ". $this->session->userdata('Admin')[0]->NomAdmin;;?></div>		<div class="lead">Votre Espace d'administration</div>
        <div class="hidden-xs col-sm-2 col-sm-offset-5"><a href="/ENSAS/AdminController/Gestionnaire" class="page-scroll btn btn-xl">More</a></div>
    </div>
</div>
