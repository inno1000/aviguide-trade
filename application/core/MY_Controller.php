<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class MY_Controller extends CI_Controller{
    /**
     *
     * @var array
     */
    protected $data;

    /**
     * @var string
     */
    protected $zone = '';

    public function __construct()
    {
        parent::__construct();
    }

    protected function render($view = 'index', $titre = '', $header = true)
    {
        if(!$view) $view = 'index';
        if(!$titre) $titre = 'Accueil';

        $this->load->view('head', ['title'=>$titre]);
        if($header === true) $this->load->view('header');
        $this->execute($view);
        $this->load->view('footer');
    }

    protected function execute($view, $titre='', $return = FALSE)
    {
        $this->zone = trim($this->zone);

        if($titre) $this->data['titre'] = $titre;
        if($this->zone) $view = $this->zone.'/'.$view;

        return $this->load->view($view, $this->data, $return);
    }
}