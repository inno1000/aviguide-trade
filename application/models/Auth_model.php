<?php

Class Auth_model extends CI_Model{

    public function __construct()
    {
        parent::__construct();
        
        $this->load->library('encryption');
        $this->load->library('phpass');
        $this->load->helper('email');

        if(!defined("AUTH_CLIENT")){
            $this->load->helper('define');
        }
    }

    public function auth($login, $password, $type = AUTH_CLIENT)
    {
        $this->db->select();
        switch($type){
            case AUTH_CLIENT:
                $this->db->from("client");
                break;
            case AUTH_SELLER:
                $this->db->from("vendeur");
                break;
            case AUTH_ADMIN:
                $this->db->from("administrateur");
                break;
        }
        
        $this->db->where("email", $login);
        
        if(count($result = $this->db->get()->result()) == 1 && $this->phpass->check($password, $result[0]->password)){
            return $result[0];
        }
        return FALSE;
    }
    
}