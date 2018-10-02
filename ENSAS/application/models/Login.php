<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Model{
/*---------------------------------------------------------------------------
 *	Constructeur et Deconstructeur
 *---------------------------------------------------------------------------*/
	/*
	 * Je vais m'occuper de cette partie 
	 */
	function __construct() {
		parent::__construct();
		$this->load->database(); // Connecter la base donnée
		$this->load->model('Enseignant');
		$this->load->model('Etudiant');
		$this->load->model('Admin');
	}
	function __destruct(){
		// deconnecter la base 
	}
	function verifLogin($cin,$pass){
		$enseignantConnect = $this->Enseignant->getEnseignantConnect($cin,$pass);
		$etudiantConnect = $this->Etudiant->getEtudiantConnect($cin,$pass);
		$adminConnect = $this->Admin->getAdminConnect($cin,$pass);
		if($enseignantConnect != null){
			return "Enseignant";
		}else if($etudiantConnect != null){
			return "Etudiant"; 
		}else if($adminConnect != null){
			return "Admin"; 
		}else{
			return null;
		}
		var_dump($adminConnect);
		var_dump($this->Admin->getAdmins());
	}
	function subscribe(){
		
	}
	function get_data() {
	    $this->db->select();
	    $query = $this->db->get('horaireprof');	      
	    if ($query->num_rows > 0) {
			return $query->result();
	    }
		else {
			return FALSE;
	    }
	  }
}
?> 
 


	
	