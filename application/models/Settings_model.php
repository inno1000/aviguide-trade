<?php


class Settings_model extends MY_Model
{
    protected $userId;

    public function __construct()
    {
        parent::__construct();
        $this->departement = 'departement';
        $this->role = 'roles';
        $this->capacite = 'capacite';
        $this->categories = 'categories';
        $this->users = 'users';
        $this->secteur = 'secteur';
        $this->boutique = 'boutiques';
        $this->brigade = 'brigade';

    }


    public function getInfo($numT,$table){
        return $this->db->query("
            SELECT $table.*, users.nom, roles.role,tickets.open_date,tickets.close_date
            FROM $table
            INNER  JOIN tickets ON tickets.id = $table.ticket
            INNER  JOIN users ON users.id = tickets.init_user
            INNER  JOIN roles ON roles.id = users.role
            WHERE tickets.num=?
        ",array($numT))->result();
    }
    public function getDocs($id,$table,$colJoin){

       return $ret =  $this->db->query("
            SELECT $table.*
            FROM $table
            WHERE $table.$colJoin=?
        ",array($id))->result();

        echo  $this->db->last_query();
    }

    public function getParams(){
        $p=$this->db->query("select params from parametres")->result();
        $params=json_decode($p[0]->params)[0];
        return $params;
    }

    public function getDecodeur(){
        return $this->db->query("
            SELECT * FROM materiel_type WHERE is_decodeur = 1
        ")->result();
    }

    public function getSecteur($id=false)
    {
        if ($id and !empty($id)){
            $query=$this->db->where('id', intval($id))->from('secteur')->select('*')->get()->result();
            return !empty($query)?$query:null;
        }
        $query=$this->db->from('secteur')->select('*')->get()->result();
        return !empty($query)?$query:null;
        return null;
    }

    public function get()
    {
        $query=$this->db->query("select params from parametres")->result();
        if (!empty($query))
            if (is_object($params=json_decode($query[0]->params)[0]))
                return $params;
        return null;
    }

    public function save($params)
    {
        $this->db->query('update parametres set params=?', array($params));
    }

    public function reset()
    {
        $this->db->query('update parametres set params=backup');
    }

    public function backup()
    {
        $this->db->query('update parametres set backup=params');
    }

    public function saveGestionnaire(array $data){
        if($data){
            return $this->db->set($data)->insert($this->users);
        }else{
            return false;
        }
    }

    public function listGestionnaire(){
        return $this->db->query("

                        SELECT users.*, users.id as Uid, users.nom as Unom, users.boutique as Ubtq, users.role
                        as Urole,
                        boutiques.nom, boutiques.id as Bid, boutiques.nom as Bnom, boutiques.*,
                        brigade.*, brigade.id as BRGDid, brigade.boutique as BRGDbtq,
                        roles.*, roles.id as Rid, roles.role as Rrole,
                        secteur.*, secteur.id AS Sid, secteur.nom AS Snom,
                        departement.*, departement.id AS Did, departement.nom AS Dnom
                        FROM users
                        LEFT JOIN boutiques ON users.boutique = boutiques.id
                        LEFT JOIN brigade ON users.brigade = brigade.id
                        LEFT JOIN roles ON users.role = roles.id
                        LEFT JOIN secteur ON boutiques.secteur = secteur.id
                        LEFT JOIN departement ON roles.departement = departement.id
                        ORDER BY users.id DESC;")->result();
    }

    public function getAllUsers(){
        return $this->db->query("
            SELECT u.id as uId, u.nom AS uNom, u.prenom as uPrenom, u.ccivil, u.cuser,
            r.role
            FROM users u
            LEFT JOIN roles r ON r.id = u.role
            WHERE ISNULL(u.boutique) AND r.id != ? AND r.id != ? AND r.uniq=0 OR ISNULL(u.role)
        ",array(ROLE_ADMIN,ROLE_SUDO))->result();
    }

    public function saveDepartement($code=false, $nom=false){
        if($code && $nom){
            $data = array('code'=>$code, 'nom'=>$nom);
            return $this->db->set($data)->insert($this->departement);
        }else{
            return false;
        }
    }
    public function updateDpt($data, $id){
        return $this->db->update($this->departement, $data, "id = ".$id);
    }

    public function saveCategorie($nom=false, $icone=null,$ordre=null){
        if($nom){
            if($icone!=null){
                $data = array('nom'=>$nom, 'icon'=>$icone,'ordre'=>$ordre);
                return $this->db->set($data)->insert($this->categories);
            }
            else{
                $data = array('nom'=>$nom,'ordre'=>$ordre);
                return $this->db->set($data)->insert($this->categories);
            }
        }else{
            return false;
        }
    }
    public function saveCapacite($data){
        if($data){
            return $this->db->set($data)->insert($this->capacite);
        }else{
            return false;
        }
    }

    public function saveRole($data){
        if($data){
            return $this->db->set($data)->insert($this->role);
        }else{
            return false;
        }
    }


    public function listDepartement(){
        return $this->db->select('*')->from($this->departement)->order_by('id', 'DESC')->get()->result();
    }

    public function listCapacite(){
        return $this->db->select('*')->from($this->capacite)->order_by('categorie', 'ASC')->get()->result();
    }

    public function getCaps($id=null){
        if($id!=null)
            return $this->db->query('
                SELECT cap.id as capId, cap.nom as capNom, cap.url, cap.description, cap.categorie,
                cat.nom as catNom, cat.icon
                FROM capacite cap
                LEFT JOIN categories cat ON cat.id = cap.categorie
                WHERE cap.id=? ',array($id))->result();

        return $this->db->query('
                SELECT cap.id as capId, cap.nom as capNom, cap.url, cap.description, cap.categorie,
                cat.nom as catNom, cat.icon
                FROM capacite cap
                LEFT JOIN categories cat ON cat.id = cap.categorie
                 ORDER BY cat.ordre DESC, cap.categorie ASC, cap.ordre DESC')->result();
    }

    public function updateCaps($data,$id){
        return $this->db->update($this->capacite, $data, "id = ".$id);
    }

    public function listBoutique(){
        return $this->db->select('*')->from($this->boutique)->order_by('nom', 'ASC')->get()->result();
    }

    public function getBtqByName(){
        return $this->db->query("
                SELECT btq.id as btqId,btq.secteur, btq.nom as btqNom, btq.numdist,btq.numbtq,btq.responsable, btq.dette_flotte,
                btq.bp, btq.tel, btq.localisation, btq.registre_commerce, btq.code_bancaire, btq.type,
                sec.nom as secNom,
                u.ccivil, u.nom as uNom,u.cuser
                FROM boutiques btq
                INNER JOIN secteur sec ON sec.id = btq.secteur
                LEFT JOIN users u ON u.id = btq.responsable
                ORDER BY btq.nom ASC")->result();
    }

    public function getBtq($id=null,$orderCriteria=""){
        if($id!=null)
            return $this->db->query("
                SELECT u.id, u.role,
                btq.id as btqId, btq.secteur,u.signature,u.cachet, btq.nom as btqNom, btq.numdist,btq.numbtq, btq.responsable,btq.taux_abo,btq.taux_mat,btq.taux_migr,btq.taux_migr,btq.taux_reabo,btq.taux_svod,btq.secteur, btq.dette_flotte,
                btq.bp, btq.tel, btq.localisation, btq.registre_commerce, btq.code_bancaire, btq.type,btq.sim_marchand,btq.sim_gerant,btq.sim_proprio,

                sec.nom as secNom,
                u.ccivil, u.nom as uNom,u.cuser
                FROM boutiques btq
                INNER JOIN secteur sec ON sec.id = btq.secteur
                LEFT JOIN users u ON u.id = btq.responsable
                WHERE btq.id = ?
            ",array($id))->result();

        return $this->db->query("
                SELECT btq.id as btqId,btq.secteur,u.signature,u.cachet, btq.nom as btqNom, btq.numdist,btq.numbtq,btq.responsable, btq.dette_flotte,
                btq.bp, btq.tel, btq.localisation, btq.registre_commerce, btq.code_bancaire, btq.type,btq.sim_marchand,btq.sim_gerant,btq.sim_proprio,
                sec.nom as secNom,
                u.ccivil, u.nom as uNom,u.cuser
                FROM boutiques btq
                INNER JOIN secteur sec ON sec.id = btq.secteur
                LEFT JOIN users u ON u.id = btq.responsable
                ORDER BY btq.secteur ASC, btq.type ASC,btq.nom ASC ")->result();
    }
    public function getBtqM($id=null,$orderCriteria=""){
        if($id!=null)
            return $this->db->query("
                SELECT btq.id as btqId, btq.nom as btqNom, b.type,b.numdist,b.taux_abo,b.taux_mat,b.taux_migr,b.taux_migr,b.taux_reabo,b.taux_svod,b.secteur,b.localisation,b.tel,b.bp, sec.nom as secNom, b.dette_flotte

                FROM boutiques_parent btq
                LEFT JOIN boutiques b ON b.boutique_parent = btq.id
                INNER JOIN secteur sec ON sec.id = b.secteur
                WHERE btq.id = ?
            ",array($id))->result();

        return $this->db->query("
               SELECT btq.id as btqId, btq.nom as btqNom
                FROM boutiques_parent btq
                ORDER BY btq.nom ASC ")->result();
    }


    public function getBtqOfType($type=false,$secteur=null,$ctrl=null){
        $s=$c=$u=$cb="";
        if($secteur!=null)
            $s = " AND sec.id=$secteur";
        if($ctrl!=null)
        {
            $u = " LEFT JOIN users ON users.id = $ctrl ";
            $cb = " LEFT JOIN controleur_boutique cb ON cb.users = users.id ";
            $c = " AND cb.boutiques LIKE CONCAT('%\"', btq.id, '\"%') ";
        }

        if(is_array($type)){


            $btq = $this->db->query("
                SELECT btq.id as btqId, btq.secteur, btq.nom as btqNom, btq.numdist,btq.responsable,btq.taux_reabo,btq.taux_abo,btq.taux_mat,btq.taux_migr,btq.taux_svod,btq.tel,
                btq.bp, btq.tel, btq.localisation, btq.registre_commerce, btq.code_bancaire, btq.type, btq.dette_flotte,
                sec.nom as secNom,sec.id secId,sec.code,
                u.ccivil, u.nom as uNom
                FROM boutiques btq
                $u
              $cb
                INNER JOIN secteur sec ON sec.id = btq.secteur
                LEFT JOIN users u ON u.id = btq.responsable
                WHERE btq.etat!=-1 and btq.type in ? 
                $s
                $c
            ",array($type))->result();


        }elseif($type){
            $btq= $this->db->query("
                    SELECT btq.id as btqId, btq.secteur, btq.nom as btqNom, btq.numdist,btq.responsable,btq.taux_reabo,btq.taux_abo,btq.taux_mat,btq.taux_migr,btq.taux_svod,btq.tel,
                    btq.bp, btq.tel, btq.localisation, btq.registre_commerce, btq.code_bancaire, btq.type, btq.dette_flotte,
                    sec.nom as secNom,sec.id secId,sec.code,
                    u.ccivil, u.nom as uNom
                    FROM boutiques btq
                        $u
                  $cb
                    INNER JOIN secteur sec ON sec.id = btq.secteur
                    LEFT JOIN users u ON u.id = btq.responsable
                    WHERE btq.etat!=-1 and btq.type = ? $s $c
                ",array($type))->result();
        }else{
            $btq= $this->db->query("
                    SELECT btq.id as btqId, btq.secteur, btq.nom as btqNom, btq.numdist,btq.responsable,btq.taux_reabo,btq.taux_abo,btq.taux_mat,btq.taux_migr,btq.taux_svod,btq.tel,
                    btq.bp, btq.tel, btq.localisation, btq.registre_commerce, btq.code_bancaire, btq.type, btq.dette_flotte,
                    sec.nom as secNom,sec.id secId,sec.code,
                    u.ccivil, u.nom as uNom
                    FROM boutiques btq
                        $u
                  $cb
                    INNER JOIN secteur sec ON sec.id = btq.secteur
                    LEFT JOIN users u ON u.id = btq.responsable
                    WHERE btq.etat!=-1 $s $c
                    order by btq.type ASC , btq.nom asc
                ")->result();
        }

//        var_dump($this->db->last_query());die;

        $result = array();
        foreach($btq as $b){
            $o = new stdClass();

            $o->btqId = $b->btqId;
            $o->nom = $b->btqNom;
            $o->tel = $b->tel;
            $o->secId = $b->secId;
            $o->sec = $b->code;
            $o->numdist = $b->numdist;
            $o->taux_abo = $b->taux_abo;
            $o->taux_mat = $b->taux_mat;
            $o->taux_migr = $b->taux_migr;
            $o->taux_svod = $b->taux_svod;
            $o->taux_reabo = $b->taux_reabo;
            $o->type = $b->type;
            $o->dette_flotte = $b->dette_flotte;

            $result[$o->btqId]=$o;
        }

        return $result;

    }
    public function getBtqType($type=false, $sec=false){
        if($type)
        {
            if(!empty($sec))
                return $this->db->query("
                    SELECT btq.id as btqId, btq.secteur, btq.nom as btqNom, btq.numdist,btq.responsable,
                    btq.bp, btq.tel, btq.localisation, btq.registre_commerce, btq.code_bancaire, btq.type,
                    sec.nom as secNom,
                    u.ccivil, u.nom as uNom
                    FROM boutiques btq
                    INNER JOIN secteur sec ON sec.id = btq.secteur
                    LEFT JOIN users u ON u.id = btq.responsable
                    WHERE btq.type in ? AND sec.id = ?
                ",array($type, $sec))->result();
            else
                return $this->db->query("
                    SELECT btq.id as btqId, btq.secteur, btq.nom as btqNom, btq.numdist,btq.responsable,
                    btq.bp, btq.tel, btq.localisation, btq.registre_commerce, btq.code_bancaire, btq.type,
                    sec.nom as secNom,
                    u.ccivil, u.nom as uNom
                    FROM boutiques btq
                    INNER JOIN secteur sec ON sec.id = btq.secteur
                    LEFT JOIN users u ON u.id = btq.responsable
                    WHERE btq.type in ?
                ",array($type))->result();
        }
        else
            return $this->db->query("
                SELECT btq.id as btqId, btq.secteur, btq.nom as btqNom, btq.numdist,btq.responsable,
                btq.bp, btq.tel, btq.localisation, btq.registre_commerce, btq.code_bancaire, btq.type,
                sec.nom as secNom,
                u.ccivil, u.nom as uNom
                FROM boutiques btq
                INNER JOIN secteur sec ON sec.id = btq.secteur
                LEFT JOIN users u ON u.id = btq.responsable
                WHERE btq.type = ?
            ",array($type))->result();

        return $this->db->query("
                SELECT btq.id as btqId, btq.secteur, btq.nom as btqNom, btq.numdist,btq.responsable,
                btq.bp, btq.tel, btq.localisation, btq.registre_commerce, btq.code_bancaire, btq.type,
                sec.nom as secNom,
                u.ccivil, u.nom as uNom
                FROM boutiques btq
                INNER JOIN secteur sec ON sec.id = btq.secteur
                LEFT JOIN users u ON u.id = btq.responsable
                ORDER BY btq.type ASC
              ")->result();
    }

    public function getBtqSec($sec = false){
        return $this->db->query("
                SELECT btq.id as btqId, btq.secteur, btq.nom as btqNom, btq.numdist,btq.responsable,
                btq.bp, btq.tel, btq.localisation, btq.registre_commerce, btq.code_bancaire, btq.type,
                sec.nom as secNom,
                u.ccivil, u.nom as uNom
                FROM boutiques btq
                INNER JOIN secteur sec ON sec.id = btq.secteur
                LEFT JOIN users u ON u.id = btq.responsable
                WHERE btq.secteur = ?
            ",array($sec))->result();
    }


    public function getAA($type,$secteur=null){
        if($secteur!=null)
            return $this->db->query("
                SELECT btq.id as btqId, btq.secteur, btq.nom as btqNom, btq.numdist,btq.numbtq, btq.responsable,
                btq.bp, btq.tel, btq.localisation, btq.registre_commerce, btq.code_bancaire, btq.type,
                sec.nom as secNom,
                u.ccivil, u.nom as uNom,u.cuser
                FROM boutiques btq
                INNER JOIN secteur sec ON sec.id = btq.secteur
                LEFT JOIN users u ON u.id = btq.responsable
                WHERE btq.type = ? AND btq.secteur = ?
            ",array($type,$secteur))->result();

        return $this->db->query("
                SELECT btq.id as btqId, btq.secteur, btq.nom as btqNom, btq.numdist,btq.numbtq, btq.responsable,
                btq.bp, btq.tel, btq.localisation, btq.registre_commerce, btq.code_bancaire, btq.type,
                sec.nom as secNom,
                u.ccivil, u.nom as uNom,u.cuser
                FROM boutiques btq
                INNER JOIN secteur sec ON sec.id = btq.secteur
                LEFT JOIN users u ON u.id = btq.responsable
                WHERE btq.type = ?
            ",array($type))->result();

    }

    public function updateBtq($data, $id){
        return $this->db->update($this->boutique, $data, "id = ".intval($id));
    }
    public function updateUser($data, $id){
        return $this->db->update('users', $data, "id = ".intval($id));
    }

    public function saveBoutique($data){
        if($data){
            //var_dump($data); die;
            $this->db->set($data)->insert($this->boutique);
            $idBtq =  $this->db->insert_id();
            $index = castNumberId($idBtq,4);
            $this->db->query("UPDATE boutiques SET numbtq=? WHERE id = ?",array("PDV$index",$idBtq));
            if (isset($data['responsable']))
                $this->db->query("UPDATE users SET  boutique=? WHERE id = ?",array($idBtq,$data['responsable']));
            return $idBtq;
        }else{
            return false;
        }
    }

    public function listCategorie(){
        return $this->db->select('*')->from($this->categories)->order_by('id', 'DESC')->get()->result();
    }
    public function updateCats($data,$id){
        return $this->db->update($this->categories, $data, "id = ".$id);
    }
    public function getCat($id=null){
        if($id!=null)
            return $this->db->query('
                SELECT cat.id, cat.nom as catNom, cat.icon, cat.ordre
                FROM categories cat
                WHERE cat.id=? ',array($id))->result();

        return $this->db->query('
               SELECT cat.id, cat.nom as catNom, cat.icon,cat.ordre
                FROM categories cat
                 ORDER BY cat.ordre DESC')->result();
    }
    public function getArt($id=null){
        if($id!=null)
            return $this->db->query('
                SELECT *
                FROM articles
                WHERE id=? ',array($id))->result();

        return $this->db->query('
              SELECT *
                FROM articles
                ORDER BY pu ASC
                 ')->result();
    }
    public function getOptions($id=null){
        if($id!=null)
            return $this->db->query('
                SELECT *
                FROM options_formule
                WHERE id=? ',array($id))->result();

        return $this->db->query('
              SELECT *
                FROM options_formule
                ORDER BY nom ASC
                 ')->result();
    }


    public function listRole(){
        return $this->db->select('*')->from($this->role)->order_by('role', 'ASC')->get()->result();
    }
    public function getRole($id=null){
        if($id==null){
            return $this->db->query("
            SELECT r.id as roleId, r.capacites, d.nom as depName, d.id as depId, r.role
            FROM roles r
            INNER JOIN departement d ON d.id = r.departement
            ORDER BY r.role ASC
        ")->result();
        }
        else{
            return $this->db->query("
            SELECT r.id as roleId, r.capacites, d.nom as depName, d.id as depId,r.role
            FROM roles r
            INNER JOIN departement d ON d.id = r.departement
            WHERE r.id = ?
        ",array($id))->result();
        }
    }

    public function updateRole($data,$id){
        return $this->db->update($this->role, $data, "id = ".$id);
    }

    public function listSecteur(){
        return $this->db->select('*')->from($this->secteur)->order_by('nom', 'ASC')->get()->result();
    }

    public function listNSector(){
        return $this->db->query("
            SELECT s.*
            FROM secteur s
            WHERE s.id NOT IN (SELECT secteur FROM direction_secteur )
            ORDER BY s.nom ASC
        ")->result();
    }
    public function listNSectorAA(){
        return $this->db->query("
            SELECT s.*
            FROM secteur s
            WHERE s.id NOT IN (SELECT secteur FROM aa_secteur )
            ORDER BY s.nom ASC
        ")->result();
    }
    public function listNSectorLog(){
        return $this->db->query("
            SELECT s.*
            FROM secteur s
            WHERE s.id NOT IN (SELECT secteur FROM direction_logistique )
            ORDER BY s.nom ASC
        ")->result();
    }

    public function boosterNbr($nom){
        return $this->db->query("
               SELECT f.id AS fId, f.nom AS fNom, f.debut,f.fin,f.prix_achat_kit AS  paKit,
                f.prix_vente_kit AS pvKit, f.type,f.article,
                a.code, a.label,a.pu
                FROM recru_type f
                INNER JOIN articles a ON a.id = f.article
                WHERE f.nom = ?
        ",array($nom))->result();
    }

    public function getFormule($id=null){
        if($id!=null)
            return $this->db->query('
                SELECT f.id AS fId, f.nom AS fNom, f.debut,f.fin,f.prix_achat_kit AS  paKit,
                f.prix_vente_kit AS pvKit, f.type,f.article,f.materiel,
                a.code, a.label,a.pu
                FROM recru_type f
                INNER JOIN articles a ON a.id = f.article
                WHERE f.id=? ',array($id))->result();

        return $this->db->query('
              SELECT f.id AS fId, f.nom AS fNom, f.debut,f.fin,f.prix_achat_kit AS  paKit,
               f.prix_vente_kit AS pvKit, f.type,f.article,f.materiel,
                a.code, a.label,a.pu
                FROM recru_type f
                INNER JOIN articles a ON a.id = f.article ORDER BY f.type DESC ')->result();
    }

    public function getFormuleByNom($nom){
        return $this->db->query('
                SELECT f.id AS fId, f.nom AS fNom, f.debut,f.fin,f.prix_achat_kit AS  paKit,
                f.prix_vente_kit AS pvKit,
                a.code, a.label,a.pu
                FROM recru_type f
                INNER JOIN articles a ON a.id = f.article
                WHERE f.nom=? ',array($nom))->result();
    }

    public function uniqueField($field=false, $table=false, $value=false){
        if($field && $table){
            $r = $this->db->select($field)->from($table)->where(array($field=>$value))->get()->result();
            if(empty($r)){
                return true;
            }else{
                return false;
            }
        }
    }

    public function manyField($table=false, $key=false, $value=false){
        if($table && $key && $value){
            return $this->db->select('*')->from($table)->where(array($key=>$value))->get()->result();
        }else{
            return false;
        }
    }

    public function manyFieldSort($table=false, $key=false, $value=false, $field=false){
        if($table && $key && $value && $field){
            return $this->db->select($field)->from($table)->where(array($key=>$value))->get()->result();
        }else{
            return false;
        }
    }


    public function saveTable($data = array(), $table=false){
        if(is_array($data) && $table){
            return $this->db->set($data)->insert($table);
        }else{
            return false;
        }
    }

    public function listTable($field=false, $table=false,$orderField="id",$ordre="DESC"){
        return $this->db->select($field)->from($table)->order_by($orderField, $ordre)->get()->result();
    }

    public function updateTable($data = array(), $table = false,$id){
        if(is_array($data) && $table){
            return $this->db->where('id',$id)->update($table,$data);
        }else{
            return false;
        }
    }

    public function selectDistinctNum(){
        return $this->db->query("select DISTINCT num, debut, fin from recru_type;")->result();
    }


    public function listProspect(){
        return $this->db->query("SELECT DISTINCT (prospect.id),prospect.*, (select count(rdv.id) from rdv where prospect = prospect.id) as nbr
                                FROM prospect
                                LEFT JOIN rdv on rdv.prospect=prospect.id WHERE prospect.client = 0 ORDER BY prospect.id DESC;");
    }

    public function listRdv($idP=false){
        if($idP){
            return $this->db->query("
                select rdv.id as rdvId, rdv.date_rdv, rdv.lieu, rdv.statut, rdv.prospect, prospect.*
                from prospect, rdv
                WHERE rdv.prospect = prospect.id and rdv.prospect= ".$idP."
                order by rdv.id desc;")->result();
        }else{
            return null;
        }
    }

    public function getBoutique($type = null){
        $btq = array(); $btqs = array();
        if(is_array($type)){ //var_dump($type); die;
            foreach ($type as $item) {
                $btq[] = $this->db->query("
                SELECT btq.id as btqId,btq.secteur, btq.nom as btqNom, btq.numdist,btq.numbtq,btq.responsable, btq.etat as bEtat,
                btq.bp, btq.tel, btq.localisation, btq.registre_commerce, btq.code_bancaire, btq.type, btq.boutique_lie,
                sec.nom as secNom,sec.id as sId,
                u.ccivil, u.nom as uNom,u.cuser
                FROM boutiques btq
                INNER JOIN secteur sec ON sec.id = btq.secteur
                LEFT JOIN users u ON u.id = btq.responsable
                WHERE btq.type = ?
                ORDER BY btq.secteur ASC, btq.type ASC,btq.nom ASC ", array($item))->result();
            }
            foreach ($btq as $item) {
                foreach ($item as $i) {
                    $btqs[] = $i;
                }
            }
            return $btqs;
        }

        return $this->db->query("
                SELECT btq.id as btqId,btq.secteur, btq.nom as btqNom, btq.numdist,btq.numbtq,btq.responsable, btq.etat as bEtat,
                btq.bp, btq.tel, btq.localisation, btq.registre_commerce, btq.code_bancaire, btq.type,
                sec.nom as secNom,sec.id as sId,
                u.ccivil, u.nom as uNom, u.prenom as uPrenom, u.tel as uTel, u.cuser
                FROM boutiques btq
                INNER JOIN secteur sec ON sec.id = btq.secteur
                LEFT JOIN users u ON u.id = btq.responsable
                WHERE btq.type = ?
                ORDER BY btq.secteur ASC, btq.type ASC,btq.nom ASC ", array($type))->result();
    }

    public function getUserByRole($role=null){
        if($role and !empty($role) and ($role != -1))
            return $this->db->query("
                SELECT u.id as uId, u.nom, u.prenom, u.ccivil,u.tel, u.cuser, u.localisation,
                r.role,
                b.nom as bNom,b.numdist, b.id as bId,
                bl.nom as blNom,bl.numdist as blNumdist, bl.id as blId,
                s.nom as sNom
                FROM users u
                INNER JOIN roles r ON r.id = u.role
                LEFT JOIN boutiques b ON b.id = u.boutique
                LEFT JOIN boutiques bl ON bl.boutique_lie = u.boutique
                LEFT JOIN secteur s ON s.id = b.secteur
                WHERE u.role = ?
                ORDER BY s.nom ASC, b.nom ASC , u.nom ASC, u.prenom ASC
            ",array($role))->result();
        else{ //var_dump($role); //die;
            $this->db->select("u.id as uId, u.nom, u.prenom, u.ccivil,u.tel, u.cuser, u.localisation,
                r.role,
                b.nom as bNom,b.numdist, b.id as bId,
                bl.nom as blNom,bl.numdist as blNumdist, bl.id as blId,
                s.nom as sNom")
                ->from("users u")
                ->join("roles r", "r.id = u.role", "inner")
                ->join("boutiques b", "b.id = u.boutique", "left")
                ->join("boutiques bl", "bl.boutique_lie = u.boutique", "left")
                ->join("secteur s", "s.id = b.secteur", "left");

            return $this->db->get()->result();
        }
    }

    public function selectTable($field=false, $table=false, $order = 'id' , $by = 'ASC'){
        if($table && $field){
            return $this->db->select($field)->from($table)->order_by($order,$by)->get()->result();
        }else{
            return false;
        }
    }
    public function saveKit($data,$table){
        $this->db->set($data)->insert($table);
        return $this->db->insert_id();
    }
    public function getAllKits($id = NULL){
        if($id == NULL)
            return $this->db->select('*')->from('kit')->get()->result();
        else
            return $this->db->select('*')->from('kit')->where('id',$id)->get()->result()[0];

    }
    public function getMatForKit($kit){
        return $this->db->select('*')
            ->from('kit')
            ->join('materiel_kit','kit.id = materiel_kit.kit')
            ->join('materiel_type','materiel_kit.materiel = materiel_type.id')
            ->where('kit.id',$kit)
            ->get()
            ->result();
    }
    public  function deleteKit($data){
        return $this->db->where('kit',$data)->delete('materiel_kit');
    }
    public function updateKit($data){
        $this->db->where('kit',$data['kit'])->where('materiel',$data['materiel'])->delete('materiel_kit');
        return  $this->db->set($data)->insert('materiel_kit');
    }

    public function selectTables($field=false, $table=false, $where = array()){
        if($table && $field && $where){
            $return = $this->db->select($field)->from($table)->where($where)->get()->result();
            if(empty($return))
                return false;
            else
                return $return;
        }else{
            return false;
        }
    }

    public function selectTabless($field=false, $table=false, $where = array()){
        if($table && $field && $where){
            return $this->db->select($field)->from($table)->where($where)->get()->result();
        }else{
            return false;
        }
    }
    public function getCapacities($id=null){
        if($id!=null)
            return $this->db->query('
                SELECT cap.id, cap.nom, cap.url, cap.ordre, cap.description, cap.categorie,
                cat.nom as catNom, cat.icon
                FROM capacite cap
                LEFT JOIN categories cat ON cat.id = cap.categorie
                WHERE cat.id=? ',array($id))->result();

        return $this->db->query('
                SELECT cap.id as capId, cap.nom as capNom, cap.url, cap.description, cap.categorie,
                cat.nom as catNom, cat.icon
                FROM capacite cap
                LEFT JOIN categories cat ON cat.id = cap.categorie
                 ORDER BY cap.categorie ASC')->result();
    }
    public function selectTableCriterion($field=false, $table=false,$where = array() , $order = 'id' , $by = 'ASC'){
        if($table && $field){
            return $this->db->select($field)->from($table)->where($where)->order_by($order,$by)->get()->result();
        }else{
            return false;
        }
    }
        public function selectTableCriterionDisctinct($field=false, $table=false,$where = array() , $order = 'id' , $by = 'ASC'){
        if($table && $field){
            return $this->db->select($field)->distinct($field)->from($table)->where($where)->order_by($order,$by)->get()->result();
        }else{
            return false;
        }
    }
    public function updateTableCriterion($data , $table,$where = array()){
        return $this->db->set($data)->where($where)->update($table);

    }
    public function saveCaution($data){
        if($data){
            $this->db->set($data)->insert("cautionnement");
            $idC =  $this->db->insert_id();
            /*$this->db->query("UPDATE users SET role = ?, boutique=? WHERE id = ?",array(ROLE_DA,$idBtq,$data['responsable']));*/
            return $idC;
        }else{
            return false;
        }
    }

    public function saveMBoutique($data){
        if($data){
            $this->db->set($data)->insert("boutiques_parent");
            $idBtq =  $this->db->insert_id();
            $index = castNumberId($idBtq,4);
            $this->db->query("UPDATE boutiques_parent SET numbtq=? WHERE id = ?",array("BM$index",$idBtq));
            /*$this->db->query("UPDATE users SET role = ?, boutique=? WHERE id = ?",array(ROLE_DA,$idBtq,$data['responsable']));*/
            return $idBtq;

        }else{
            return false;
        }
    }

    public function updateMBtq($data, $id){
        return $this->db->update("boutiques_parent", $data, "id = ".intval($id));
    }

    public function saveAASector($data)
    {
        $this->db->set($data)->insert("aa_secteur");
    }

    public function getShopCusers($shopID)
    {
        $query=$this->db
            ->where('boutique', $shopID)
            ->where("role",ROLE_VENDEUR)
            ->where("status",1)
            ->order_by('cuser', 'asc')
            ->from('users')
            ->distinct(true)
            ->select('cuser')
            ->get()
            ->result();
        return !empty($query)?$query:null;
    }
    
    public function checkCuserFromShop($cuser, $btqId){
        $cusers = $this->getShopCusers($btqId); $t = false; 
        
        if(!empty($cusers)){
            foreach ($cusers as $c){
                if($c->cuser == $cuser)
                    $t = true; 
                break;
            }
            
            return $t;
        }
    }

    public function listTableIn($field=false, $table=false, $where=array(), $state="id", $orderField="id",$ordre="DESC"){
        $return = null;
        if(is_array($where))
            $return = $this->db->select($field)->from($table)->where_in($state, $where)->order_by($orderField, $ordre)->get()->result();

        return $return;
    }
    
     public function uniqueRefDetails($ref){
         
         //facture commission
        $query1=$this->db->query(
            "SELECT *,f.code as ref_comission,t1.open_date as tOpen1,t2.open_date as tOpen2,t1.num as num1,t2.num as num2,
            t1.close_date as tClose1,t2.close_date as tClose2,t1.state as mState1,t2.state as mState2,t1.commentaire as tkMotif1,t2.commentaire as tkMotif2,
            t1.type as type,moy.label as mlabel,tp.nom as tpnom, tp.id tpid
            FROM facture_commission f 
            LEFT JOIN tickets t1 ON t1.id = f.ticket
            INNER JOIN moyen_payment moy ON moy.id=f.moyen_paiement
            INNER JOIN type_payment tp ON tp.id=moy.type
            LEFT JOIN tickets t2 ON t2.id = f.ticket2
            INNER JOIN boutiques ON boutiques.id=f.boutique
            WHERE f.code=?
            AND (t1.state!=-1 OR t2.state!=-1) ",
            array($ref)
        )->result();
        if($query1!=null or !empty($query1)){
            return $query1;
        }
//       $query=$this->db->where('n_versement', $ref)->where('valide !=', -1)->from('rechargecga')->select('id')->get()->result();
//Cga
        $query2=$this->db->query(
            "SELECT *,r.n_versement as ref_rCga,tp.nom as tpnom, tp.id tpid
            FROM rechargecga r
            INNER JOIN tickets t ON t.id = r.ticket
             INNER JOIN moyen_payment moy ON moy.id=r.moyen_paiement
            INNER JOIN type_payment tp ON tp.id=moy.type
            INNER JOIN boutiques ON boutiques.id=r.boutique
            WHERE r.n_versement=?
            AND (t.state!=-1) ",
            array($ref)
        )->result();
        if($query2!=null or !empty($query2)){
            return $query2;
        }
//commande
         $query3 = $this->db->select('*,cm.n_versement as ref_commande,t.open_date as Odate,t.close_date as Cdate,tp.nom as tpnom, tp.id tpid,boutiques.nom as bnom')
         ->from('commande_materiel cm')
         ->join('tickets t','cm.ticket = t.id')
         ->join('boutiques','boutiques.id=cm.boutique')
         ->join('moyen_payment moy','moy.id=cm.moyen_paiement')
         ->join('type_payment tp','tp.id=moy.type')
         ->where('cm.n_versement',$ref)
         ->where('state !=',-1)->get()
         ->result();
         if($query3!=null or !empty($query3)){
            return $query3;
        }
//memo
         $query4 = $this->db->select('*,n_versement as ref_memo,moy.label as label,b.nom as bnom')
         ->from('remboursement_dette rd')
         ->join('memos m','m.id=rd.memo')
         ->join('moyen_payment moy','moy.id=rd.moyen_paiement')
         ->join('type_payment tp','tp.id=moy.type')
         ->join('boutiques b','b.id=m.boutique')
         ->where('n_versement', $ref)
         ->where('rd.state !=', REMBOURSEMENT_REJETE)
         ->get()
         ->result();
         if($query4!=null or !empty($query4)){
            return $query4;
        }
         
//versement         
         $query5 =  $this->db->select('*,v.ref as ref_versement,b.nom as bnom,moy.label as label')
         ->from('versement v')
         ->join('tickets t','v.ticket = t.id')
         ->join('boutiques b','b.id=v.btq')
         ->join('moyen_payment moy','moy.id=v.moyen_vers')
         ->join('type_payment tp','tp.id=moy.type')
         ->where('v.ref',$ref)
         ->where('t.state !=',-1)
         ->get()
         ->result();
         if($query5!=null or !empty($query5)){
            return $query5;
        }
    
//justi decaiis
         $query6 =  $this->db->select('*,j.reference as ref_justification')
         ->from('justification_decaissemnt j')
         ->join('tickets t','j.ticket = t.id')
         ->where('j.reference',$ref)
         ->where('t.state !=',-1)
         ->get()
         ->result();
         if($query6!=null or !empty($query6)){
            return $query6;
        }
       
         //return empty($query1) && empty($query2) && empty($query3) &&  empty($query4) && empty($query5) && empty($query6) ;
     }

    public function getUserBySector($sec=null){
        if($sec)
            return $this->db->query("
                SELECT u.id as uId, u.nom, u.prenom, u.ccivil,u.tel, u.cuser, u.localisation,
                r.role,
                b.nom as bNom,b.numdist, b.id as bId,
                bl.nom as blNom,bl.numdist as blNumdist, bl.id as blId,
                s.nom as sNom
                FROM users u
                INNER JOIN roles r ON r.id = u.role
                LEFT JOIN boutiques b ON b.id = u.boutique
                LEFT JOIN boutiques bl ON bl.boutique_lie = u.boutique
                INNER JOIN secteur s ON s.id = b.secteur
                WHERE b.secteur = ?
                ORDER BY s.nom ASC, b.nom ASC , u.nom ASC, u.prenom ASC
            ",array($sec))->result();
    }

    public function getBtqBySector($sec=false, $role=false){
        if($sec){
            $this->db->select("boutiques.*")
                ->from("boutiques")
                ->join("users u", "u.boutique = boutiques.id", "left")
                ->join("secteur s", "s.id = boutiques.secteur", "left")
                ->where(array("boutiques.secteur"=>$sec));
            if($role and ($role != -1) and !empty($role))
                $this->db->where(array("u.role"=>$role));

                $result = $this->db->get()->result();
            return !empty($result)?$result:null;
        }
        else
            return $this->db->get("boutiques")->result();
    }

    public function getUsersByBtq($data=false){
        $this->db->select("u.id as uId, u.nom, u.prenom, u.ccivil,u.tel, u.cuser, u.localisation,
                r.role,
                b.nom as bNom,b.numdist, b.id as bId,
                bl.nom as blNom,bl.numdist as blNumdist, bl.id as blId,
                s.nom as sNom")
            ->from("users u")
            ->join("roles r", "r.id = u.role", "inner")
            ->join("boutiques b", "b.id = u.boutique", "left")
            ->join("boutiques bl", "bl.boutique_lie = u.boutique", "left")
            ->join("secteur s", "s.id = b.secteur", "inner");
        if($data and isset($data["sec"]) and ($data["sec"] != -1) and !empty($data["sec"]))
            $this->db->where(array("b.secteur"=>$data["sec"]));
        if($data and isset($data["role"]) and ($data["role"] != -1) and !empty($data["role"]))
            $this->db->where(array("u.role"=>$data["role"]));
        if($data and isset($data["btq"]) and ($data["btq"] != -1) and !empty($data["btq"]))
            $this->db->where(array("b.id"=>$data["btq"]));

        return $this->db->get()->result();
    }

    public function getUsersByRoleSector($data=false){ //var_dump($data); die;
        if($data or isset($data["sec"]) or isset($data["role"])){
            $this->db->select("u.id as uId, u.nom, u.prenom, u.ccivil,u.tel, u.cuser, u.localisation,
                r.role,
                b.nom as bNom,b.numdist, b.id as bId,
                bl.nom as blNom,bl.numdist as blNumdist, bl.id as blId,
                s.nom as sNom")
                ->from("users u")
                ->join("roles r", "r.id = u.role", "inner")
                ->join("boutiques b", "b.id = u.boutique", "left")
                ->join("boutiques bl", "bl.boutique_lie = u.boutique", "left")
                ->join("secteur s", "s.id = b.secteur", "left");
            if(($data["sec"] != -1) and !empty($data["sec"]))
                $this->db->where(array("b.secteur"=>$data["sec"]));
            if(($data["role"] != -1) and !empty($data["role"]))
                $this->db->where(array("u.role"=>$data["role"]));

            return $this->db->get()->result();
        }

    }

    public function getUsersByRoleSectorBtq($data=false){ //var_dump($data); die;
        if($data or isset($data["sec"]) or isset($data["role"]) or isset($data["btq"])){
            $this->db->select("u.id as uId, u.nom, u.prenom, u.ccivil,u.tel, u.cuser, u.localisation,
                r.role,
                b.nom as bNom,b.numdist, b.id as bId,
                bl.nom as blNom,bl.numdist as blNumdist, bl.id as blId,
                s.nom as sNom")
                ->from("users u")
                ->join("roles r", "r.id = u.role", "inner")
                ->join("boutiques b", "b.id = u.boutique", "left")
                ->join("boutiques bl", "bl.boutique_lie = u.boutique", "left")
                ->join("secteur s", "s.id = b.secteur", "left");
            if(($data["sec"] != -1) or !empty($data["sec"]))
                $this->db->where(array("b.secteur"=>$data["sec"]));
            if(($data["role"] != -1) or !empty($data["role"]))
                $this->db->where(array("u.role"=>$data["role"]));
            if(($data["btq"] == -1) or  !empty($data["btq"]))
                $this->db->where(array("b.id"=>$data["btq"]));

            return $this->db->get()->result();
        }

    }
    
    public function  deleteSession($field=false, $table=false){
        $this->db->where('cuser', $field)->delete('session');
    }

    public function verifId($data=array()){
        if(is_array($data) and !empty($data)){

            $this->db->select($data['field'])
                ->from($data['table'])
                ->join($data['joinTable'], $data['on'], $data['type']);
                if(isset($data['where']))
                    $this->db->where($data['where']);
            if(isset($data['state']))
                $this->db->where($data['state']);

            $info = $this->db->get()->result();

            if(isset($data['data']))
                return empty($info)?null:$info;
            else
                return empty($info)?false:true;

        }
    }

        public  function deleteTable($data){
        return $this->db->where($data['where'])->delete($data['table']);
    }
    
    public function getDepartementChief($data=false){
        if($data and !empty($data) and is_array($data)){
            $this->db->select($data["field"])
                ->from("chef_departement")
                ->join("users", "users.id = chef_departement.users")
                ->join("departement", "departement.id = chef_departement.departement");
                if(isset($data["departement"]))
                    $this->db->where("chef_departement.departement = ".$data["departement"]);

            return $this->db->get()->result();

        }
    }
  
}