<?php defined('BASEPATH') OR exit('No direct script access allowed');

class EtudiantController extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Login');
		$this->load->model('Etudiant');
		$this->load->model('Absence');
		$this->load->model('Module');
		$this->load->helper('form');
		$this->load->helper('url');
		date_default_timezone_set("Africa/Casablanca");
		if($this->session->userdata('Etudiant')==null){
			redirect('/FrontEnd/');
		}
	}

	public function Index()
	{
		$this->load->view('/Etudiant/include/header1.php');
		$this->load->view('/Etudiant/index.php');
		$this->load->view('/Etudiant/include/footer1.php');
	}

	function Profil()
	{
		$data = array();
		$total = 0;
		$data['c'] = $this->Absence->absence($this->session->userdata('Etudiant')[0]->ID,$this->session->userdata('Etudiant')[0]->IdNiveau,$this->session->userdata('Etudiant')[0]->IdFiliere);
		$data['module']= array();
		for($i=0;$i<count($data['c']);$i++){
			$count = 0;
			if($this->exist($data['module'],$data['c'][$i]->NomModule)==false){
				if($data['c'][$i]->total!=0){
					for($j=0;$j<count($data['c']);$j++){
						if($data['c'][$i]->NomModule==$data['c'][$j]->NomModule){
							$count++;
						}
					}
				}
				$data['module'][]=$data['c'][$i]->NomModule;
				$data['pourcentage'][] = $count*2;
				$total = $total + $count*2;
			}
		}
		$somme = $this->Module->getSumNbHeureModule($this->session->userdata('Etudiant')[0]->IdNiveau,$this->session->userdata('Etudiant')[0]->IdFiliere);
		if($total>$somme*0.25){
			$data['alert'] = "Danger";
			$data['avert'] = "Vous serez convoqué au conseil disciplinaire !!!!!";
		}else if($total>$somme*0.175){
			$data['alert'] = "Warning";
			$data['avert'] = "Vous etes risqué d'avoi un conseil displainaire ";
		}else {
			$data['alert'] = "Success";
			$data['avert'] = "<center>Vous etes ponctuel</center>";
		}
		$data['c']=null;
		$this->load->view('/Etudiant/include/header1.php');
		$this->load->view('/Etudiant/profil.php',$data);
		$this->load->view('/Etudiant/include/footer1.php');
	}
	
	function SettlementEnsas()
	{
		$this->load->view('/Etudiant/include/header1.php');
		$this->load->view('/Etudiant/SettlementEnsas.php');
		$this->load->view('/Etudiant/include/footer1.php');
	}
	function exist($tab,$module){
		foreach($tab as $k){
			if($k == $module){
				return true;
			}
		}
		return false;
	}
	function Statistical(){
		$data = array();
		$data['c'] = $this->Absence->absence($this->session->userdata('Etudiant')[0]->ID,$this->session->userdata('Etudiant')[0]->IdNiveau,$this->session->userdata('Etudiant')[0]->IdFiliere);
		$data['module']= array();
		for($i=0;$i<count($data['c']);$i++){
			$count = 0;
			if($this->exist($data['module'],$data['c'][$i]->NomModule)==false){
				if($data['c'][$i]->total!=0){
					for($j=0;$j<count($data['c']);$j++){
						if($data['c'][$i]->NomModule==$data['c'][$j]->NomModule){
							$count++;
						}
					}
				}
				$data['module'][]=$data['c'][$i]->NomModule;
				$data['pourcentage'][]=$count*2;
			}
		}
		$data['max'] = $this->Module->getMaxNH();
		$this->load->view('/Etudiant/include/header1.php');
		$this->load->view('/Etudiant/Statistical.php',$data);
		$this->load->view('/Etudiant/include/footer1.php');		
	}
	function pdf(){
		$this->load->model('Niveau');
		$this->load->model('Filiere');
		$data = array();
		$total = 0;
		$data['c'] = $this->Absence->absence($this->session->userdata('Etudiant')[0]->ID,$this->session->userdata('Etudiant')[0]->IdNiveau,$this->session->userdata('Etudiant')[0]->IdFiliere);
		$data['module']= array();
		for($i=0;$i<count($data['c']);$i++){
			$count = 0;
			if($this->exist($data['module'],$data['c'][$i]->NomModule)==false){
				if($data['c'][$i]->total!=0){
					for($j=0;$j<count($data['c']);$j++){
						if($data['c'][$i]->NomModule==$data['c'][$j]->NomModule){
							$count++;
						}
					}
				}
				$data['module'][]=$data['c'][$i]->NomModule;
				$data['pourcentage'][] = $count*2;
				$total = $total + $count*2;
			}
		}
		$somme = $this->Module->getSumNbHeureModule($this->session->userdata('Etudiant')[0]->IdNiveau,$this->session->userdata('Etudiant')[0]->IdFiliere);
		if($total>$somme*0.25){
			$data['alert'] = "Danger";
			$data['avert'] = "Vous serez convoqué au conseil disciplinaire !!!!!";
		}else if($total>$somme*0.175){
			$data['alert'] = "Warning";
			$data['avert'] = "Vous etes risqué d'avoi un conseil displainaire ";
		}else {
			$data['alert'] = "Success";
			$data['avert'] = "<center>Vous etes ponctuel</center>";
		}
		$data['c']=null;
		$data['filiere']=$this->Filiere->getFiliere($this->session->userdata('Etudiant')[0]->IdFiliere);
		$data['niveau']=$this->Niveau->getNiveau($this->session->userdata('Etudiant')[0]->IdNiveau);
		$data['departement']=$this->Filiere->getDepartement($this->session->userdata('Etudiant')[0]->IdFiliere);
		require(APPPATH.'libraries/html2pdf/html2pdf.class.php');
		$this->load->view('Etudiant/imprimer.php',$data);
	}
	
	function StatistiqueParModule(){
		// Similaire que la fonction home
		$this->load->view('statistiqueModule.php');
	}

	function StatistiqueParAnnee(){
		// Group by par niveau du module et calcul de nombre d'absence total dans cet année
		$this->load->view('statistiqueAnnee.php',$data);
	}
	function Contact(){
		$this->load->model('Enseignant');
		$data['enseignant'] = $this->Enseignant->getProf();
		$this->load->view('/Etudiant/include/header1.php');
		$this->load->view('/Etudiant/contact.php',$data);
		$this->load->view('/Etudiant/include/footer1.php');
	}
}
