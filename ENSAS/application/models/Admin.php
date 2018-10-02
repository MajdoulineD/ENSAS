<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Model{
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
	function getAdminConnect($cin,$pass){
		$data = array();
		$this->db->select('*');
		$this->db->where('LoginAdmin',$cin);
		$this->db->where('PasswordAdmin',$pass);
		$data=$this->db->get('admin');
		$query_result = $data->result();
		return $query_result;
	}
	function getAdmin($id){
		$data = array();
		$this->db->select('*');
		$this->db->where('LoginAdmin',$id);
		$data=$this->db->get('Admin');
		$query_result = $data->result();
		return $query_result;
	}
	function getAdmins(){
		$data = array();
		$this->db->select('*');
		$data=$this->db->get('Admin');
		$query_result = $data->result();
		return $query_result;
	}
}
?> 
 


	