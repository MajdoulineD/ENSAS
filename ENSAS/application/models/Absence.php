<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Absence extends CI_Model{
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
	
	function getAbsences(){
		$data = array();
		$this->db->select('*');
		$data=$this->db->get('absence');
	}
	function getAbsence($id){
		$data = array();
		$this->db->select('*');
		$this->db->where('ID',$id);
		$data=$this->db->get('absence');
	}
	function addAbsence($tab){
		$this->db->insert('absence',$tab);
	}
	function updateAbsence($tab,$ID){
		$this->db->where('ID', $ID);
		$this->db->update('absence',$tab);
	}
	function deleteAbsence($ID){
		$this->db->where('ID', $ID);
		$this->db->update('absence',$tab);
	}
	function absence($id,$niveau,$filiere){
		$this->db->select("module.NomModule,COALESCE(absence.IdAbscence,0) as total");
		$this->db->from('module');
		$this->db->where('module.IdNiveau',$niveau);
		$this->db->where('module.IdFiliere',$filiere);
		$this->db->join('absence', "module.IdModule = absence.IdModule AND absence.IdEtudiant = $id AND absence.Justifie = 'NonJustify'",'left outer');
		$this->db->order_by('module.NomModule');
		$query = $this->db->get();
		return $query->result();
	}
	function absencesNF($niveau,$filiere,$module){
		$this->db->select("etudiant.ID, etudiant.PrenomEtudiant,etudiant.NomEtudiant, COUNT(absence.IdEtudiant)*2 as nbAbsence");
		$this->db->from('etudiant');
		$this->db->where('etudiant.IdNiveau',$niveau);
		$this->db->where('etudiant.IdFiliere',$filiere);
		$this->db->join('absence', "etudiant.ID = absence.IdEtudiant AND absence.IdModule = $module AND absence.Justifie = 'NonJustify'",'left outer');
		$this->db->group_by('etudiant.ID');
		$this->db->order_by('etudiant.NomEtudiant,etudiant.PrenomEtudiant');
		$query = $this->db->get();
		return $query->result();
	}
	function absences(){
		$this->db->select("absence.IdEtudiant, concat(etudiant.PrenomEtudiant,' ',etudiant.NomEtudiant) as etudiant, COUNT(absence.IdEtudiant) as nbAbsence");
		$this->db->from('absence');
		$this->db->where('Justifie','NonJustify');
		$this->db->join('etudiant', 'etudiant.ID = absence.IdEtudiant');
		$this->db->group_by('absence.IdEtudiant');
		$query = $this->db->get();
		return $query->result();
	}
	function existEtudiant($id){
		$this->db->select("COUNT(*) as count");
		$this->db->from('conseildisciplinaire');
		$this->db->where('IdEtudiant',$id);
		$query = $this->db->get();
		if($query->result()['0']->count != 0){
			return true;
		}else{
			return false;
		}
	}
	function addConseil($tab){
		$this->db->insert('conseildisciplinaire',$tab);
	}
	function getConseil($id){
		$this->db->select("filiere.NomFiliere,etudiant.PrenomEtudiant,etudiant.NomEtudiant");
		$this->db->from('etudiant');
		$this->db->where("etudiant.IdNiveau",$id);
		$this->db->join('conseildisciplinaire', "etudiant.ID = conseildisciplinaire.IdEtudiant");
		$this->db->join('filiere', "filiere.IdFiliere = etudiant.IdFiliere");
		$this->db->order_by("filiere.NomFiliere","ASC","NomEtudiant","ASC","PrenomEtudiant","ASC");
		$query = $this->db->get();
		return $query->result();
	}
	function justifierAbsence($tab){
		$this->db->set('Justifie', 'Justify');
		$this->db->where('IdEtudiant',$tab['etudiant']);
		$this->db->where('Date>=',$tab['datedebut']);
		$this->db->where('Date<=',$tab['datefin']);	
		return $this->db->update('absence');
	}
}
?> 