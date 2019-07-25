<?php

Class Inscription extends MY_Controller{
    function __construct(){
        parent::__construct();
        $this->zone = "pages";
    }

    public function index()
    {
        $this->client();
    }

    public function client()
    {
        $this->load->library('form_validation');
        $this->load->library('phpass');
        $this->load->helper('email');

        $this->form_validation->set_rules('nom', '"Nom"', 'trim|required|min_length[5]|max_length[50]|encode_php_tags');
        $this->form_validation->set_rules('prenom', '"Prenom"', 'trim|min_length[2]|max_length[50]|encode_php_tags');
        $this->form_validation->set_rules('telephone', '"Telephone"', 'trim|required|min_length[5]|max_length[50]|encode_php_tags');
        $this->form_validation->set_rules('email', '"E-mail"', 'trim|required|encode_php_tags|valid_email|is_unique[client.email]');
        $this->form_validation->set_rules('password', '"Password"', 'trim|required|min_length[8]|max_length[250]|encode_php_tags');
        $this->form_validation->set_rules('repassword', '', 'trim|required|matches[password]');
        
        
        if ($this->form_validation->run()) {
            $this->load->model('Inscription_model', 'Minscription');
            
            $data = array(
                'nom' => $this->input->post('nom'),
                'prenom' => $this->input->post('prenom'),
                'telephone' => $this->input->post('telephone'),
                'email' => $this->input->post('email'),
                'password' => $this->phpass->hash($this->input->post('password')),
            );

            if($id = $this->Minscription->saveData($data, "client") !== NULL){
                redirect('connexion');
            }else{
                $this->data["error"][] = "Une erreur est survenue.";
            }
        }

        $this->render('inscription');
    }
}