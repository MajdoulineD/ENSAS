<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Filiere extends CI_Model{
/*---------------------------------------------------------------------------
 *	Constructeur et Deconstructeur
 *---------------------------------------------------------------------------*/
	/*
	 * Je vais m'occuper de cette partie 
	 */
	function __construct() {
		parent::__construct();
		$this->load->database(); // Connecter la base donnée
	}
	function __destruct(){
		// deconnecter la base 
	}
	
	function getFilieres(){
		$data = array();
		$this->db->select('*');
		$data=$this->db->get('filiere');
		return $data->result();
	}
	function getFiliere($id){
		$data = array();
		$this->db->select('NomFiliere');
		$this->db->where('IdFiliere',$id);
		$data=$this->db->get('filiere');
		return $data->result()['0']->NomFiliere;
	}
	function getIDFiliere($id){
		$data = array();
		$this->db->select('IdFiliere');
		$this->db->where('NomFiliere',$id);
		$data=$this->db->get('filiere');
		return $data->result()['0']->IdFiliere;
	}
	function getDepartement($id){
		$data = array();
		$this->db->select('NomDepartement');
		$this->db->where('IDDepartement',$id);
		$data=$this->db->get('departement');
		return $data->result()['0']->NomDepartement;
	}
	function addFiliere($tab){
		$this->db->insert('filiere',$tab);
	}
	function updateEtudiant($tab,$ID){
		$this->db->where('ID', $ID);
		$this->db->update('filiere',$tab);
	}
	function deleteFiliere($ID){
		$this->db->where('ID', $ID);
		$this->db->delete('filiere');
	}
}
?> 