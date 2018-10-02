<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Enseignant extends CI_Model{
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
	function getEnseignants(){
		$data = array();
		$this->db->select('*');
		$data=$this->db->get('enseignant');
	}
	function getEnseignant($id){
		$data = array();
		$this->db->select('*');
		$this->db->where('DOTI',$id);
		$this->db->or_where('CINProfesseur',$id);
		$data=$this->db->get('enseignant');
		$query_result = $data->result();
		return $query_result;
	}
	function getEnseignantConnect($cin,$pass){
		$this->db->select('*');
		$this->db->where('CINProfesseur',$cin);
		$this->db->where('PasswordProfesseur',$pass);
		$data=$this->db->get('enseignant');
		$query_result = $data->result();
		return $query_result;
	}
	function addEnseignant($tab){
		$this->db->insert('enseignant',$tab);
	}
	function updateEnseignant($tab,$ID){
		$this->db->where('DOTI', $ID);
		$this->db->or_where('CIN', $ID);
		$this->db->update('enseignant',$tab);
	}
	function deleteEnseignant($ID){
		$this->db->where('DOTI', $ID);
		$this->db->or_where('CIN', $ID);
		$this->db->update('enseignant',$tab);
	}
	function selectEmploiProf($doti){
		$data = array();
		$this->db->select('*');
		$this->db->join('emploi', 'horaireprof.IdEmploi = emploi.IdEmploi');
		$this->db->where('DOTI',$doti);
		$data=$this->db->get('horaireprof');
		$query_result = $data->result();
		foreach($query_result as $key => $value) {
			$query_result[$key] = (array) $value;
		}
		return $query_result;
	}
	function addRattrapage($tab){
		$this->db->insert('emploi',$tab);
		$insert_id = $this->db->insert_id();
		return  $insert_id;
	}
	function deleteRattrapage($id){
		$this->db->where('IdEmploi', $id);
		$this->db->delete('emploi');
	}
	function addHoraireProf($tab){
		$this->db->insert('horaireprof',$tab);
	}
	function getEmploi($id){
		$this->db->select('horaireprof.Type,emploi.Jour,enseignant.PrenomProfesseur,enseignant.NomProfesseur,module.NomModule,emploi.HeureDebut,emploi.HeureFin');
		$this->db->from('horaireprof');
		$this->db->join('module', 'horaireprof.IdModule = module.IdModule');
		$this->db->join('emploi', 'horaireprof.IdEmploi = emploi.IdEmploi');
		$this->db->join('enseignant', 'horaireprof.DOTI = enseignant.DOTI');
		$this->db->where('horaireprof.DOTI',$id);
		$data = $this->db->get();
		return $data->result();
	}
	function CheckAvailabilityEmploi($IdModule,$jour,$HD,$HF){
		$this->db->select('IdFiliere,IdNiveau');
		$this->db->from('module');
		$this->db->where('IdModule',$IdModule);
		$data = $this->db->get();
		$query_result = $data->result();
		$this->db->select('IdModule');
		$this->db->where('IdFiliere',$query_result['0']->IdFiliere);
		$this->db->where('IdNiveau',$query_result['0']->IdNiveau);
		$data = $this->db->get('module');
		$query_result1 = $data->result();
		foreach($query_result1 as $j){
			$this->db->select('Jour,HeureDebut,HeureFin');
			$this->db->from('horaireprof');
			$this->db->join('emploi', 'horaireprof.IdEmploi = emploi.IdEmploi');
			$this->db->where('horaireprof.IdModule',$j->IdModule);
			$data = $this->db->get('module');
			$query_result = $data->result();
			foreach($query_result as $i){
				if($i->Jour == $jour){
					if( ($i->HeureDebut < $HF && $i->HeureFin > $HF) || ($i->HeureDebut < $HF && $i->HeureFin > $HF) || ($i->HeureDebut == $HD && $i->HeureFin == $HF)){
						return false;
					}
				}
			}
		}
		return true;
	}
	function getEmploiProf($doti){
		$this->db->select("Jour,HeureDebut,HeureFin");
		$this->db->from("horaireprof");
		$this->db->where("DOTI",$doti);
		$this->db->join('emploi', 'horaireprof.IdEmploi = emploi.IdEmploi');
		$data = $this->db->get();
		$query_result = $data->result();
		return $query_result;
	}
	
	function getProf(){
		$this->db->select("concat(PrenomProfesseur,' ',NomProfesseur) as prof");
		$data=$this->db->get('enseignant');
		return $data->result();
	}
	
}
?> 
 


	