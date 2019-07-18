<?php

class MY_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();

    }
    
    public function uniqueGlobalRef($ref){
         //facture commission
        $query1=$this->db->query(
            "SELECT *
            FROM facture_commission f
            LEFT JOIN tickets t1 ON t1.id = f.ticket
            LEFT JOIN tickets t2 ON t2.id = f.ticket2
            WHERE f.code=?
            AND (t1.state!=-1 OR t2.state!=-1) ",
            array($ref)
        )->result();
//       $query=$this->db->where('n_versement', $ref)->where('valide !=', -1)->from('rechargecga')->select('id')->get()->result();
//Cga
        $query2=$this->db->query(
            "SELECT *
            FROM rechargecga r
            LEFT JOIN tickets t ON t.id = r.ticket
            WHERE r.n_versement=?
            AND (t.state!=-1) ",
            array($ref)
        )->result();
//commande
         $query3 = $this->db->select('*')->from('commande_materiel cm')->join('tickets t','cm.ticket = t.id')->where('cm.n_versement',$ref)->where('state !=',-1)->get()->result();
//memo
         $query4 = $this->db->where('n_versement', $ref)->where('state !=', REMBOURSEMENT_REJETE)->from('remboursement_dette')->select('id')->get()->result();
         
//versement         
         $query5 =  $this->db->select('*')->from('versement v')->join('tickets t','v.ticket = t.id')->where('v.ref',$ref)->where('t.state !=',-1)->get()->result();
    
//justi decaiis
         $query6 =  $this->db->select('*')->from('justification_decaissemnt j')->join('tickets t','j.ticket = t.id')->where('j.reference',$ref)->where('t.state !=',-1)->get()->result();
       
         return empty($query1) && empty($query2) && empty($query3) &&  empty($query4) && empty($query5) && empty($query6) ;
     }
    
}