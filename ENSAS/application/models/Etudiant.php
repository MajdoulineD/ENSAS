<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Etudiant extends CI_Model{
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
	function getEtudiantsNivFil($niveau,$filiere){
		$data = array();
		$this->db->select('ID,CINEtudiant,NomEtudiant,PrenomEtudiant');
		$this->db->where('IdNiveau',$niveau);
		$this->db->where('IdFiliere',$filiere);
		//$this->db->order_by('NomEtudiant','ASC','PrenomEtudiant','ASC');
		$data=$this->db->get('etudiant');
		$query_result = $data->result();
		return $query_result; 
	}	
	function getEtudiants(){
		$data = array();
		$this->db->select('*');
		$data=$this->db->get('etudiant');
	}
	function getEtudiant($id){
		$data = array();
		$this->db->select('*');
		$this->db->where('CINEtudiant',$id);
		$this->db->or_where('ID',$id);
		$data=$this->db->get('etudiant');
		$query_result = $data->result();
		return $query_result;
	}
	function getEtudiantConnect($cin,$pass){
		$this->db->select('*');
		$this->db->where('CINEtudiant',$cin);
		$this->db->where('PassEtudiant',$pass);
		$data=$this->db->get('etudiant');
		$query_result = $data->result();
		return $query_result;
	}
	function addEtudiant($tab){
		$this->db->insert('etudiant_attente',$tab);
	}
	function deleteEtudiantApprouvé($id){
		$this->db->where('IDEtudiant_attente', $id);
		$this->db->delete('etudiant_attente');
	}
	function addEtudiantApprouvé($tab){
		$this->db->insert('etudiant',$tab);
	}
	function updateEtudiant($tab,$ID){
		$this->db->where('CINEtudiant', $ID);
		$this->db->update('etudiant',$tab);
	}
	function getNiveauAndFiliereByEtudiant($id){
		$this->db->select('IdNiveau,IdFiliere');
		$this->db->where('Id',$id);
		$data=$this->db->get('etudiant');
		$query_result = $data->result();
		return $query_result['0'];			
	}
	function getEtudiantsAttente(){
		$this->db->select('*');
		$data=$this->db->get('etudiant_attente');
		return $data->result();
	}
	function getEtudiantsAttenteSelected($tab){
		$this->db->select('*');
		$this->db->where_in('IDEtudiant_attente',$tab);
		$data=$this->db->get('etudiant_attente');
		return $data->result();
	}
	function getEtudiantTest($cin,$email){
		$data = array();
		$this->db->select('*');
		$this->db->where('CINEtudiant',$cin);
		$this->db->where('EmailEtudiant',$email);
		$data=$this->db->get('etudiant');
		$query_result = $data->result();
		return $query_result;
	}
	
}
?> 
 


	