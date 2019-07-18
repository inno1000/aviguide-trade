<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class produit extends MY_controller {
    public function __construct()
    {
        parent::__construct();
        $this->zone = 'pages';
        $this->load->library('form_validation', 'upload');
        $this->load->model('produit_model','mProd');
        $this->load->helper(array('form','url'));
        // $this->session->set_flashdata('item', 'value');
    }

	function index() {
		$this->data['type_produit'] = $this->mProd->get_typeProd();
		$this->data['produits'] = $this->mProd->get_Prod();
		$this->render('enreg_prod', "Enregistrement d'un produit");
	}

	function save_produit(){
			// $this->load->library('session');
			$this->data['type_produit'] = $this->mProd->get_typeProd();
 			$this->form_validation->set_rules('nom_prod', 'Nom du produit', 'trim|required');
			$this->form_validation->set_rules('type_prod', 'Type de produit', 'trim|required');
			$this->form_validation->set_rules('pu_prod', 'Prix unitaire du produit', 'trim|required');
			$this->form_validation->set_rules('qte_prod', 'Quantité', 'trim|required');
			$this->form_validation->set_rules('details_prod', 'Détails sur le produit', 'trim');
			if(!empty($_FILES['tof_prod']['name'])){
				 $config = [
                    'upload_path'   => './assets/img/Produits',
                    'allowed_types' => 'jpg|png|jpeg',
                    'file_name'=>'Prod_'.$this->input->post('type_prod').'_'.$this->input->post('nom_prod')
                ];
				
				$this->load->library('upload',$config);
				$this->upload->initialize($config);

				if(!$this->upload->do_upload('tof_prod')){
					$picture='';
				}else{
					$uploadData=$this->upload->data();
					$picture=$uploadData['file_name'];
				}

			}else{
				$picture='aviguide.png';
			}
			
			if($this->form_validation->run()==true) {
				$data = array(
	                'vendeur' => $this->input->post('vendeur'),
	                'nom_produit' => $this->input->post('nom_prod'),
	                'prix_u' => $this->input->post('pu_prod'),
	                'qte_produit' => $this->input->post('qte_prod'),
	                'type_produit' => $this->input->post('type_prod'),
	                'details_produit' => $this->input->post('details_prod'),
	                'img_produit' => $picture
	            );
	        
	            $insertProd=$this->mProd->insert_produit($data);

	            if($insertProd){
	            	// $this->session->set_flashdata('success_msg', 'Produit enregistré...');
	            	echo "OK";
	            	redirect(site_url('produit/publications'));
	            }else{
	            	echo "Bad";
	            	// $this->session->set_flashdata('error_msg', "Échec lors de l'enregistrement");
	            }
				$this->render('publications', $data);
				$this->data['produits'] = $this->mProd->get_Prod();
			}else {
				$this->data['error'] = "Veuillez remplir les champs obligatoires";
				$this->render('enreg_prod', 'Enregistrement des produits');
			}
		
	}

    public function publications()
    {
    	$this->data['produits'] = $this->mProd->get_Prod();
        $this->render('publications');
    }

    public function save_typeProduit()
    {
       	$this->form_validation->set_rules('nom_typeProd', 'Nom du type de produit', 'trim|required');
    	if($this->form_validation->run()==true) {

			$data = array(
	        	'nom' => $this->input->post('nom_typeProd'),
	        );
	        
	        $inserttypeProd=$this->mProd->insert_typeProduit($data);
		    if($inserttypeProd){
	    		echo "OK";
	        	redirect(site_url('produit/publications'));
	        }else{
	        	echo "Bad";
	        }
			$this->render('publications', $data);
		}else {
				$this->data['error'] = "Veuillez remplir les champs obligatoires";
				$this->render('enreg_typeProd', 'Enregistrement des types de produits');
		}
	}
}