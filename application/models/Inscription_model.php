<?php
/**
 * Created by PhpStorm.
 * User: IngVL'sKati
 * Date: 14/01/2018
 * Time: 13:24
 */
class Inscription_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();

    }

    public function saveData($data,$table){
        $this->db->insert($table,$data);
        return $this->db->insert_id();
    }






    public function getRecrutedAbonne(){

        return $this->db->query("
            SELECT d.carte numcarte,d.decodeur numdeco,d.nom_abonne nom,d.numabo,d.mtn_act,d.mtn_mat,d.next_reabo,d.numabo,d.cuser,
            a.tel,
            b.nom btqNom,
            ac.label as article,op.nom opt
            FROM detail_xls_ku d
            LEFT JOIN users u ON u.cuser=d.cuser
            LEFT JOIN articles ac ON ac.id = d.article
            LEFT JOIN materiel_type m ON m.id = d.materiel
            LEFT JOIN options_formule op ON op.id = d.opt
            LEFT JOIN boutiques b ON (b.id=u.boutique)
            LEFT JOIN abonnements a ON a.num_carte = d.carte
            WHERE u.status=1 and d.act = ?
        ",array(1))->result();
    }

}