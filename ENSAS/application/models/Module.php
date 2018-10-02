<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Module extends CI_Model{
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
	
	function getModules(){
		$this->db->select('IdModule,NomModule');
		$data=$this->db->get('module');
		return $data->result();
	}
	function getModule($id){
		$this->db->select('NomModule');
		$this->db->where('IdModule',$id);
		$data=$this->db->get('module');
		return $data->result()['0']->NomModule;
	}
	function getModulesProf($id){
		$data = array();
		$this->db->select('IdModule,NomModule');
		$this->db->where('DOTIEnseignant',$id);
		$data=$this->db->get('module');
		return $data->result();
	}
	function addModule($tab){
		$this->db->insert('module',$tab);
	}
	function updateModule($tab,$ID){
		$this->db->where('ID', $ID); //
		$this->db->update('module',$tab);
	}
	function deleteModule($ID){
		$this->db->where('ID', $ID);
		$this->db->delete('module');
	}
	function getNiveauAndFiliere($id){
		$this->db->select('IdNiveau,IdFiliere');
		$this->db->where('IdModule',$id);
		$data=$this->db->get('module');
		return $data->result();
	}
	function getMaxNH(){
		$this->db->select('MAX(NbrHeureCM+NbrHeureTP+NbrHeureTD) as max');
		$data=$this->db->get('module');
		return $data->result()[0]->max;
	}
	function getNbHeureModule($nom){
		$this->db->select('NbrHeureCM+NbrHeureTP+NbrHeureTD as nb');
		$this->db->where('NomModule',$nom);
		$data=$this->db->get('module');
		return $data->result()[0]->nb;
	}
	function getSumNbHeureModule($niveau,$filiere){
		$this->db->select('SUM(NbrHeureCM+NbrHeureTP+NbrHeureTD) as somme');
		$this->db->where('IdNiveau',$niveau);
		$this->db->where('IdFiliere',$filiere);
		$data=$this->db->get('module');
		return $data->result()[0]->somme;
	}
}
?>