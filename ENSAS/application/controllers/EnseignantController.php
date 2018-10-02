<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EnseignantController extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('session');
		date_default_timezone_set("Africa/Casablanca");
		if($this->session->userdata('Enseignant')==null){
			redirect('FrontEnd/');
		}
	}
	function Index(){
		$this->load->view('Enseignant/include/header1.php');
		$this->load->view('Enseignant/index.php');
		$this->load->view('Enseignant/include/footer1.php');
	}
	function AddAbsence()
	{
		$this->load->model('Enseignant');
		$this->load->model('Module');
		$this->load->model('Filiere');
		$this->load->model('Niveau');
		$this->load->model('Etudiant');
		$emploi = $this->Enseignant->selectEmploiProf($this->session->userdata('Enseignant')[0]->DOTI);
		$donnees['bool'] = false;
		foreach($emploi as $i)
		{
			if($i['Jour']==date('l') && $i['HeureDebut']<=date("H:i:s") && $i['HeureFin'] >= date("H:i:s")){
				$data = $this->Module->getNiveauAndFiliere($i["IdModule"])[0];
				$this->session->set_userdata('Emploi', $i["IdEmploi"]);
				$this->session->set_userdata('Module', $i["IdModule"]);
				$donnees['module'] = $this->Module->getModule($this->session->userdata('Module'));
				$donnees['filiere'] = $this->Filiere->getFiliere($data->IdFiliere);
				$donnees['niveau'] = $this->Niveau->getNiveau($data->IdNiveau);
				$donnees['etudiants'] = $this->Etudiant->getEtudiantsNivFil($data->IdNiveau,$data->IdFiliere);
				$donnees['bool'] = true;
				break;
			}
		}
		$this->load->view('Enseignant/include/header1.php');
		$this->load->view('Enseignant/AddAbsence.php',$donnees);
		$this->load->view('Enseignant/include/footer1.php');
	}
	function AddRattrapage(){
		$this->load->model('Module');	
		$donnees['modules'] = $this->Module->getModulesProf($this->session->userdata('Enseignant')[0]->DOTI);
		$this->load->view('Enseignant/include/header1.php');
		$this->load->view('Enseignant/AddRattrapage.php',$donnees);
		$this->load->view('Enseignant/include/footer1.php');
	}
	function ContactUs(){
		$this->load->view('Enseignant/include/header1.php');
		$this->load->view('Enseignant/contact.php');
		$this->load->view('Enseignant/include/footer1.php');
	}
	function ConfirmAbsence(){
$this->load->model('Enseignant');
$emploi =  $this->session->userdata('Emploi');
if(!empty($_POST)){
		$this->load->model('Absence');
		foreach($_POST as $i){
			$tab = array(
				'IdEtudiant' => $i ,
				'IdModule' => $this->session->userdata('Module'),
				'IdEnseignant' => $this->session->userdata('Enseignant')[0]->DOTI,
				'IdEmploi' => $emploi,
				'Justifie' => 'NonJustify',
				'Date' => date("Y-m-d"),
			);
			$this->Absence->addAbsence($tab);
		}}
		if(intval($emploi)>22){
			$this->Enseignant->deleteRattrapage($tab['IdEmploi']);
		}redirect('EnseignantController');
	}
	function ConfirmRattrapage(){
		$this->load->model('Enseignant');
		if($this->Enseignant->CheckAvailabilityEmploi($_POST['IdModule'],$_POST['Jour'],$_POST['HeureDebut'],$_POST['HeureFin'])){
			$tab = array(
					'Jour' => $_POST['Jour'],
					'HeureDebut' => $_POST['HeureDebut'],
					'HeureFin' => $_POST['HeureFin']
			);
			$IdEmploi = $this->Enseignant->addRattrapage($tab);
			$tab = array(
					'DOTI' =>$this->session->userdata('Enseignant')[0]->DOTI ,
					'IdEmploi' => $IdEmploi,
					'IdModule' => $_POST['IdModule'],
					'Type' => $_POST['Type']
			);
			$this->Enseignant->addHoraireProf($tab);
			redirect('EnseignantController/AddAbsence','refresh');
		}else{
			redirect('EnseignantController/ErrorAddRattrapage','refresh');
		}
	}
        function ErrorAddRattrapage(){
                $this->load->view('Enseignant/include/header1.php');
		$this->load->view('Enseignant/AddRattrapage_error.php');
		$this->load->view('Enseignant/include/footer1.php');
        }
	function Emploi(){
		$this->load->model('Enseignant');
		$donnees["emploi"]=$this->Enseignant->getEmploi($this->session->userdata('Enseignant')[0]->DOTI);
		$this->load->view('Enseignant/include/header1.php');
		$this->load->view('Enseignant/EmploiTemps.php',$donnees);
		$this->load->view('Enseignant/include/footer1.php');
	}
	function Etudiants(){
		$this->load->model('Module');	
		$donnees['modules'] = $this->Module->getModulesProf($this->session->userdata('Enseignant')[0]->DOTI);
		$this->load->model('Filiere');
		$donnees['filieres'] = $this->Filiere->getFilieres();
		$this->load->model('Niveau');
		$donnees['niveaux'] = $this->Niveau->getNiveaux();
		$this->load->view('Enseignant/include/header1.php');
		$this->load->view('Enseignant/Etudiants.php',$donnees);
		$this->load->view('Enseignant/include/footer1.php');		
	}
	function PdfEtudiant(){
		$this->load->model('Niveau');
		$this->load->model('Filiere');
		$this->load->model('Absence');
		$this->load->model('Module');
		$donnees['module']=$this->Module->getModule($_POST['IdModule']);
		$donnees['filiere']=$this->Filiere->getFiliere($_POST['IdFiliere']);
		$donnees['niveau']=$this->Niveau->getNiveau($_POST['IdNiveau']);
		$donnees['departement']=$this->Filiere->getDepartement($_POST['IdFiliere']);
		$donnees['absences'] = $this->Absence->absencesNF($_POST['IdNiveau'],$_POST['IdFiliere'],$_POST['IdModule']);
		require(APPPATH.'libraries/html2pdf/html2pdf.class.php');
		$this->load->view('Enseignant/imprimer.php',$donnees);
	}
}