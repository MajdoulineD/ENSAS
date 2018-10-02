<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Niveau extends CI_Model{
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
	
	function getNiveaux(){
		$data = array();
		$this->db->select('*');
		$data=$this->db->get('niveau');
		return $data->result();
	}
	function getNiveau($id){
		$this->db->select('NomNiveau');
		$this->db->where('IdNiveau',$id);
		$data=$this->db->get('niveau');
		return $data->result()['0']->NomNiveau;
	}
	function addNiveau($tab){
		$this->db->insert('niveau',$tab);
	}
	function updateNiveau($tab,$ID){
		$this->db->where('ID', $ID);
		$this->db->update('niveau',$tab);
	}
	function deleteNiveau($ID){
		$this->db->where('ID', $ID);
		$this->db->delete('niveau');
	}
}
?>
