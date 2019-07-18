<?php

Class Connexion extends MY_Controller{
    public function __construct()
    {
        parent::__construct();

        $this->zone = "pages";
    }

    public function index()
    {
        $this->load->library('form_validation');
        $this->load->helper('email');
        
        $this->load->model('Auth_model', 'MAuth');
        
        $this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email|encode_php_tags');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|encode_php_tags');

        if ($this->form_validation->run()) {
            if($user = $this->MAuth->auth($this->input->post('email', true), $this->input->post('password', true)) !== FALSE){
                redirect();
            }else{
                $this->data['error'] = ["<b>\"Login\"</b> ou <b>\"Mod de passe\"</b> erronés"];
            }
        }
        
        $this->render('connexion', "Authentification", false);
    }
}