<?php
    class produit_model extends CI_Model {
 
        protected $table;
 
        function __construct() {
            parent::__construct();
            $this->prod = 'produit';
            $this->tProd = 'type_produit';
            $this->pkProd='idproduit';
        }
 
        // function insert_produit($data){
        //     $this->db->insert($this->produit, $data);
        // } 

        function insert_produit($data){
            $insert=$this->db->insert($this->prod, $data);
            if($insert){
                return $this->db->insert_id();
            }else{
                return false;
            }
        }

        function insert_typeProduit($data){
            $insert=$this->db->insert($this->tProd, $data);
            if($insert){
                return $this->db->insert_id();
            }else{
                return false;
            }
        }

        function get_typeProd(){
            $this->db->select("idtype_produit,nom");
            $this->db->from('type_produit desc');
            $this->db->order_by('nom');
            $query = $this->db->get();
            return $query->result();
        }

        function get_Prod(){
            $this->db->select("*, concat(v.prenom,' ', v.nom) as vendeur, CONCAT(EXTRACT(DAY FROM Date_enreg),'-',EXTRACT(MONTH FROM Date_enreg),'-',EXTRACT(YEAR FROM Date_enreg)) as Date");
            $this->db->from('produit');
            $this->db->join('type_produit typ', 'typ.idtype_produit=produit.type_produit', 'left');
            $this->db->join('vendeur v', 'v.idvendeur=produit.vendeur', 'left');
            $this->db->order_by('Date_enreg desc');
            $query = $this->db->get();
            return $query->result();
        }
 
    }