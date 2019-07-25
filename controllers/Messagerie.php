<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Messagerie extends MY_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->zone = 'message';
        $this->load->library('form_validation');
        $this->load->model('Inscription_model','mIns');
        $this->load->model('Settings_model','mSet');
    }

    public function index()
	{
		$this->render('message');

	}

	public function message()
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

        $this->data['toto'] = 'toto';
        $this->render('message');
    }

}
