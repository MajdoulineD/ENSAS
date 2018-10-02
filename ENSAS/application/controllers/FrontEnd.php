<?php defined('BASEPATH') OR exit('No direct script access allowed');

class FrontEnd extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('Etudiant');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('session');
		date_default_timezone_set("Africa/Casablanca");
		$this->gestionConseil();
	}
	function gestionConseil(){
		$this->load->model('Absence');
		$data = $this->Absence->absences();
		foreach($data as $i){
			$NF = $this->Etudiant->getNiveauAndFiliereByEtudiant($i->IdEtudiant);
			//if($i->nbAbsence*2 >= ($this->Module->getSumNbHeureModule($NF->IdNiveau,$NF->IdFiliere)/2)*0.25){
			if($i->nbAbsence*2 >= 4){
				if(!$this->Absence->existEtudiant($i->IdEtudiant)){
					$now = date("d-m-Y");
					$year = date("Y");
					$yearr = $year-1;
					$session = null;
					if(strtotime($now) >= strtotime("14-09-$yearr") && strtotime($now) <= strtotime("08-11-$yearr")){$session = 1;}
					else if(strtotime($now) >= strtotime("30-11-$yearr") && strtotime($now) <= strtotime("03-01-$year")){$session = 1;}
					else if(strtotime($now) >= strtotime("15-02-$year") && strtotime($now) <= strtotime("27-03-$year")){$session = 1;}
					else if(strtotime($now) >= strtotime("18-04-$year") && strtotime($now) <= strtotime("22-07-$year")){$session = 4;}
					$data = array(
						"IdEtudiant" => $i->IdEtudiant,
						"AnneeScolaire" => "$yearr/$year",
						"Session" => $session,
						"Deliberate" => "NV"
					);
					$this->Absence->addConseil($data);
				}
			}
		}
	}
	function Inscription(){
		$this->load->view('include/header1.php');
		$this->load->view('subscribe.php');
		$this->load->view('include/footer1.php');
	}
	function Index()
	{
		$this->load->view('include/header1.php');
		$this->load->view('index.php');
		$this->load->view('include/footer1.php');
	}
	function Service()
	{
		$this->load->view('include/header1.php');
		$this->load->view('service.php');
		$this->load->view('include/footer1.php');
	}
	function Vision(){
		$this->load->view('include/header1.php');
		$this->load->view('vision.php');
		$this->load->view('include/footer1.php');
	}
	function ContactUs(){
		$this->load->view('include/header1.php');
		$this->load->view('contact.php');
		$this->load->view('include/footer1.php');		
	}
	function About(){
		$this->load->view('include/header1.php');
		$this->load->view('about.php');
		$this->load->view('include/footer1.php');		
	}
	function authentification(){
		$this->load->model('Login');
		$this->load->model('Enseignant');
		$this->load->model('Admin');
		$profil = $this->Login->verifLogin($_POST['cin'],$_POST['password']); 
		if($profil =="Etudiant"){
			$this->session->set_userdata('Etudiant', $this->Etudiant->getEtudiant($_POST['cin']));
			redirect('EtudiantController','refresh');
		}else if($profil=="Enseignant"){
			$this->session->set_userdata('Enseignant', $this->Enseignant->getEnseignant($_POST['cin']));
			redirect('EnseignantController','refresh');			
		}else if($profil=="Admin"){
			$this->session->set_userdata('Admin', $this->Admin->getAdmin($_POST['cin']));
			redirect('AdminController','refresh');			
		}else{
			redirect('FrontEnd','refresh');
		}
	}
	function InscriptionConfirm(){
		$this->load->view('include/header1.php');
        // Validation.        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('NomEtudiant', '"Nom"', 'trim|required|min_length[4]|max_length[52]|alpha_dash|encode_php_tags');
        $this->form_validation->set_rules('PrenomEtudiant', '"Prénom"', 'trim|required|min_length[4]|max_length[52]|alpha_dash|encode_php_tags');
        $this->form_validation->set_rules('DNEtudiant', '"Date Naissance"', 'trim|required');
        $this->form_validation->set_rules('CINEtudiant', '"CIN"', 'trim|required|min_length[4]|max_length[52]|encode_php_tags|is_unique[etudiant_attente.CINEtudiant]|is_unique[etudiant.CINEtudiant]|is_unique[enseignant.CINProfesseur]');
        $this->form_validation->set_rules('CNEEtudiant', '"CNE"', 'trim|required|min_length[4]|max_length[52]|encode_php_tags|is_unique[etudiant.CNEEtudiant]|is_unique[etudiant_attente.CNEEtudiant]');
        $this->form_validation->set_rules('TelEtudiant', '"Telephone "', 'trim|required|min_length[10]|max_length[10]|alpha_dash|encode_php_tags');
        //$this->form_validation->set_rules('tel_fixe', '"Tél. Fixe"', 'trim|min_length[14]|max_length[14]|alpha_dash|encode_php_tags|xss_clean');
        $this->form_validation->set_rules('EmailEtudiant', '"Email"', 'required|valid_email|max_length[255]','Votre');
        $this->form_validation->set_rules('PassEtudiant', '"Mot de passe"', 'trim|required|min_length[4]|max_length[52]|alpha_dash|encode_php_tags');
        $this->form_validation->set_rules('Pass2Etudiant', '"Confirmation du passe"', 'trim|required|alpha_dash|encode_php_tags|matches[PassEtudiant]');

        // Error container 
        $this->form_validation->set_error_delimiters('<div class="b-message message-error" style="margin : auto auto 5% auto; color : red; width:auto; ; font-style:italic; font-weight:bold;"> <i class="fa fa-exclamation-circle"></i> ', '</div>');

        // validation success
        if ($this->form_validation->run()){
            unset($_POST['Pass2Etudiant']);
			$this->Etudiant->addEtudiant($_POST);
			redirect('FrontEnd/InscriptionSuccess','refresh');		
		} else {
            $this->load->view('subscribe', array('main_content' => 'inscription_form'));
            $this->load->view('include/footer1');
        }
	}
	function InscriptionSuccess(){
		$this->load->view('include/header1.php');
		$this->load->view('inscription_success');
		$this->load->view('include/footer1');
	}
	function Deconnecter(){
		$this->session->unset_userdata('Etudiant');
		$this->session->unset_userdata('Emploi');
		$this->session->unset_userdata('Enseignant');
		$this->session->unset_userdata('Module');
		$this->session->unset_userdata('Admin');
		redirect('FrontEnd','refresh');			
	}
	function ForgetPassword(){
		$this->load->view('include/header1.php');
		$this->load->view('forgetPassword.php');
		$this->load->view('include/footer1');		
	}
	function ForgetPasswordConfirm(){
		$this->load->view('include/header1.php');	
		$donnees = $this->Etudiant->getEtudiantTest($_POST['CIN'],$_POST['Email']);
		if(count($donnees)>0){
			$this->SendMsg($donnees['0']);
			redirect('FrontEnd/ForgetPasswordSuccess');
		}else{
			$this->load->view('forgetPassword');
		}
		$this->load->view('include/footer1');	
	}
	function ForgetPasswordSuccess(){
		$this->load->view('include/header1.php');
		$this->load->view('forgetPassword_success');
		$this->load->view('include/footer1');
	}
	function SendMsg($emetteur){
		require(APPPATH.'libraries/PHPMailer/class.phpmailer.php');
		$mail = new PHPmailer();
		$mail->SetLanguage('fr', 'PHPMailer/language/');
		$mail->From=$emetteur->EmailEtudiant;
		$mail->AddAddress($emetteur->EmailEtudiant);
		$mail->AddReplyTo($emetteur->EmailEtudiant);	
		$mail->Subject='Exemple trouvé sur DVP';
		$mail->Body='Bonjour Mr. '.$emetteur->PrenomEtudiant. ' ' .$emetteur->NomEtudiant . '<br><br> Votre mot de passe oublié est le suivant '. $emetteur->PassEtudiant .'<br><br>Cordialement<br>AnasBELLAGHZILIA';
		if(!$mail->Send()){ 
			$message = $mail->ErrorInfo; 
		}
		else{
			$message = "Mail envoyé avec succès";
		}
		return $message;
	}
}