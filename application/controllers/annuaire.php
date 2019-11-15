<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class annuaire extends MY_controller {
    public function __construct()
    {
        parent::__construct();
        $this->zone = 'pages';
        $this->load->library('form_validation');
        $this->load->model('annuaire_model','mAnnuaire');
        $this->load->model('produit_model','mProd');
        $this->load->helper(array('form','url'));
        // $this->session->set_flashdata('item', 'value');
    }

	function index() {
		$this->render('enreg_contacts', "Enregistrement des contacts");
	}

    function save_contact(){
        $this->data["produits"] = $this->mProd->get_ProdTop();
        // // $this->load->library('session');
        // $this->data['contact'] = $this->mAnnuaire->get_Contact();
        $this->form_validation->set_rules('nom_contact', 'Nom du contact', 'trim|required');
        $this->form_validation->set_rules('tel_contact', 'Téléphone du contact', 'trim|required');
        $this->form_validation->set_rules('fax_contact', 'Fax du contact', 'trim');
        $this->form_validation->set_rules('email_contact', 'Adresse mail du contact', 'trim|required');
        $this->form_validation->set_rules('site_contact', 'Adresse du site internet', 'trim');
        $this->form_validation->set_rules('adresse_contact', 'Adresse physique du contact', 'trim');
        $this->form_validation->set_rules('activite_contact', 'Activités du contact', 'trim');

        if($this->form_validation->run()==true) {
            $data = array(
                'nom' => $this->input->post('nom_contact'),
                'telephone' => $this->input->post('tel_contact'),
                'fax' => $this->input->post('fax_contact'),
                'email' => $this->input->post('email_contact'),
                'site_web' => $this->input->post('site_contact'),
                'Activites' => $this->input->post('activite_contact'),
                'Adresse' => $this->input->post('adresse_contact')
            );

            $insertCnt=$this->mAnnuaire->insert_contact($data);

            if($insertCnt){
                echo "OK";
                redirect(site_url('Welcome/annuaire'));
            }else{
                echo "Bad";
                redirect('index');
                // $this->session->set_flashdata('error_msg', "Échec lors de l'enregistrement");
            }
            redirect('Welcome/annuaire');
            // $this->render('publications', $data);
            // $this->data['produits'] = $this->mProd->get_Prod();
        }else {
            $this->data['error'] = "Veuillez remplir les champs obligatoires";
            $this->render('enreg_contacts', 'Enregistrement des contacts');
        }
    }

}