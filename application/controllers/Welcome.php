<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->zone = 'pages';
        $this->load->library('form_validation');
        $this->load->model('Inscription_model','mIns');
        $this->load->model('Settings_model','mSet');
        $this->load->model('produit_model','mProd');
        $this->load->model('annuaire_model','mAnnuaire');
        $this->load->library('pagination');
    }
	
	public function index()
	{
        $this->Accueil();
	}

    public function Accueil()
    {
        $this->data["produits"] = $this->mProd->get_ProdTop();
        $this->render('index', "Accueil");
    }

    public function publications($id=null)
    {
        $config = array(
            'base_url' => site_url() .'/welcome/publications',
            'total_rows' => $this->mProd->record_count(),
            'per_page' => 8,
            'use_page_numbers' => TRUE,
            'full_tag_open' => '<ul class="pagination">',
            'full_tag_close' => '</ul>',
            'first_link' => '<<',
            'first_tag_open' => '<li class="page-item disabled">',
            'first_tag_close' => '</li>',
            'last_link' => '>>',
            'last_tag_open' => '<li class="page-item">',
            'last_tag_close' => '</li>',
            'next_link' => '>',
            'next_tag_open' => '<li class="page-item">',
            'next_tag_close' => '</li>',
            'prev_link' => '<',
            'prev_tag_open' => '<li class="page-item">',
            'prev_tag_close' => '</li>',
            'cur_tag_open' => '<li class="page-item active"><a class="page-link" href="#">',
            'cur_tag_close' => '</a></li>',
            'num_tag_open' => '<li class="page-item"> ',
            'num_tag_close' => '</li>',
            'attributes' => array('class' => 'page-link'),
        );
        $this->pagination->initialize($config);

        $page = ($this->uri->segment(2))? $this->uri->segment(2) : 0;
        $this->data["produits"] = $this->mProd->get_Prod($id, $config["per_page"], $page);
        $this->data["links"] = $this->pagination->create_links();
        $this->render('publications');
    }

    public function contacts()
    {
        $this->form_validation->set_error_delimiters('<p class="form_erreur text-danger small">', '<p>');
        $this->form_validation->set_rules('nom', 'nom', 'trim|required');
        $this->form_validation->set_rules('email', 'email', 'trim');
        $this->form_validation->set_rules('telephone', 'telephone', 'trim');
        $this->form_validation->set_rules('objet', 'objet', 'trim|required');
        $this->form_validation->set_rules('message', 'message', 'trim|required');

        //var_dump($_POST);die;

        if ($this->form_validation->run()) {

            $this->db->trans_begin();
            $data = array(
              "nom"=>$this->input->post('nom'),
              "email"=>$this->input->post('email'),
              "telephone"=>$this->input->post('telephone'),
              "objet"=>$this->input->post('objet'),
              "message"=>$this->input->post('message'),
            );

            $this->mIns->saveData($data,"commentaire");

            if($this->db->trans_status()===TRUE){
                $this->db->trans_commit();
                set_flash_data(array('success', 'Votre message a bien été envoyé'));
                redirect('Welcome/contacts');
            }else{
                $this->db->trans_rollback();
                set_flash_data(array('error',"Problème lors de l'envoi du message!<br>Contactez l'administrateur si le problème persiste"));
                redirect('Welcome/contacts');
            }
        }
        $this->render('contacts');
    }


    public function annuaire()
    {
        $config = array(
            'base_url' => site_url() .'/welcome/annuaire',
            'total_rows' => $this->mAnnuaire->record_count(),
            'per_page' => 3,
            'use_page_numbers' => TRUE,
            'full_tag_open' => '<ul class="pagination">',
            'full_tag_close' => '</ul>',
            'first_link' => '<<',
            'first_tag_open' => '<li class="page-item disabled">',
            'first_tag_close' => '</li>',
            'last_link' => '>>',
            'last_tag_open' => '<li class="page-item">',
            'last_tag_close' => '</li>',
            'next_link' => '>',
            'next_tag_open' => '<li class="page-item">',
            'next_tag_close' => '</li>',
            'prev_link' => '<',
            'prev_tag_open' => '<li class="page-item">',
            'prev_tag_close' => '</li>',
            'cur_tag_open' => '<li class="page-item active"><a class="page-link" href="#">',
            'cur_tag_close' => '</a></li>',
            'num_tag_open' => '<li class="page-item"> ',
            'num_tag_close' => '</li>',
            'attributes' => array('class' => 'page-link'),
        );
        $this->pagination->initialize($config);

        $page = ($this->uri->segment(2))? $this->uri->segment(2) : 0;
        $this->data["contact"] = $this->mAnnuaire->get_Contact($config["per_page"], $page);
        $this->data["links"] = $this->pagination->create_links();
        $this->render('annuaire');
    }
    public function add_annuaire()
    {
        $this->render('enreg_contacts');
    }
}
