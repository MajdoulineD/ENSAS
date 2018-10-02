<?php defined('BASEPATH') OR exit('No direct script access allowed');

class ChefDepartement extends CI_Model{
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
	function getDepartements(){
		$data = array();
		$this->db->select('*');
		$data=$this->db->get('departement');
	}
	function getDepartement($id){
		$data = array();
		$this->db->select('*');
		$this->db->where('DOTI',$id);
		$this->db->or_where('CIN',$id);
		$data=$this->db->get('departement');
	}
	function addDepartement($tab){
		$this->db->insert('departement',$tab);
	}
	function deleteDepartement($ID){
		$this->db->where('DOTI', $ID);
		$this->db->or_where('CIN', $ID);
		$this->db->update('departement',$tab);
	}
}
?> 
 


	