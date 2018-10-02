<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Filiere');
		$this->load->model('ChefDepartement');
		$this->load->model('Enseignant');
		$this->load->model('Etudiant');
		$this->load->model('Module');
		$this->load->model('Absence');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('session');
		date_default_timezone_set("Africa/Casablanca");
		if($this->session->userdata('Admin')==null){
			redirect('FrontEnd');
		}
	}
	function Index(){
		$this->load->view('Admin/include/header1.php');
		$this->load->view('Admin/index.php');
		$this->load->view('Admin/include/footer1.php');
	}
	function ContactUs(){
		$this->load->view('Enseignant/include/header1.php');
		$this->load->view('contact.php');
		$this->load->view('Enseignant/include/footer1.php');
	}
	function JustifyAbsence(){
		$data["etudiants"] = $this->Etudiant->getEtudiantsNivFil(4,1);
		$this->load->view('Admin/include/header1.php');
		$this->load->view('Admin/JustifyAbsence.php',$data);
		$this->load->view('Admin/include/footer1.php');
	}
	function JustifyAbsenceConfirm(){
		$this->Absence->justifierAbsence($_POST);
		redirect('AdminController/JustifyAbsence');
	}
	function Conseil(){
		if(!$_POST){
			$_POST["IdNiveau"]=1;
		}
		$data["conseil"] = $this->Absence->getConseil($_POST["IdNiveau"]);
		if($_POST["IdNiveau"]==1){
			$data["niveau"] = "premiere année";
		}else if($_POST["IdNiveau"]==2){
			$data["niveau"] = "deuxieme année";
		}else if($_POST["IdNiveau"]==3){
			$data["niveau"] = "troisieme année";
		}else if($_POST["IdNiveau"]==4){
			$data["niveau"] = "quatrieme année";
		}else if($_POST["IdNiveau"]==5){
			$data["niveau"] = "cinquieme année";
		}
		
		$this->load->view('Admin/include/header1.php');
		$this->load->view('Admin/conseil.php',$data);
		$this->load->view('Admin/include/footer1.php');
	}
	function PdfConseil(){
		if($_POST["niveau"]=="premiere année"){
			$_POST["IdNiveau"] = 1;
		}else if($_POST["niveau"]=="deuxieme année"){
			$_POST["IdNiveau"] = 2;
		}else if($_POST["niveau"]=="troisieme année"){
			$_POST["IdNiveau"] = 3;
		}else if($_POST["niveau"]=="quatrieme année"){
			$_POST["IdNiveau"] = 4;
		}else if($_POST["niveau"]=="cinquieme année"){
			$_POST["IdNiveau"] = 5;
		}
		$data["conseil"] = $this->Absence->getConseil($_POST["IdNiveau"]);
		$donnees = array();
		$donnees['filiere'] = array();
		$k=-1;
		$j=0;
 		foreach($data['conseil'] as $i){
			if(!in_array($i->NomFiliere,$donnees['filiere'])){
				$donnees['filiere'][$j] = $i->NomFiliere;
				$j++;
				$k++;
			}
			$donnees['etudiant'][$k][] = $i->PrenomEtudiant." ".$i->NomEtudiant;
		}
		if($_POST['niveau']>=3){
			$donnees['cycle'] = "cycle ingenieur"; 
		}else{
			$donnees['cycle'] = "cycle preparatoire";
		}
		$donnees['niveau'] = $_POST['niveau'];
		require(APPPATH.'libraries/html2pdf/html2pdf.class.php');
		$this->load->view('Admin/imprimer.php',$donnees);
	}
	function Contact(){
		$this->load->view('Admin/include/header1.php');
		$this->load->view('Admin/contact.php');
		$this->load->view('Admin/include/footer1.php');
	}
	function Gestionnaire(){
		$donnees['etudiants'] = $this->Etudiant->getEtudiantsAttente();
		$this->load->view('Admin/include/header1.php');
		$this->load->view('Admin/gestionUser.php',$donnees);
		$this->load->view('Admin/include/footer1.php');		
	}
	function ApprouverDemande(){
		$data = $this->Etudiant->getEtudiantsAttenteSelected($_POST);
		foreach($data as $i){
			$this->Etudiant->deleteEtudiantApprouvé($i->IDEtudiant_attente);
			unset($i->IDEtudiant_attente);
			$this->Etudiant->addEtudiantApprouvé($i);
		}
		redirect('AdminController/Gestionnaire');
	}
}
