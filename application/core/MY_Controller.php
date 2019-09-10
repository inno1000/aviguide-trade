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

    protected function render($view = 'index', $title = '', $header = true)
    {
        if(!$view) $view = 'index';
        if(!$title) $title = 'Accueil';

        $this->load->view('head', ['title'=>$title]);
        if($header === true) $this->load->view('header');
        $this->execute($view);
        $this->load->view('footer');
    }

    protected function execute($view, $title='', $return = FALSE)
    {
        $this->zone = trim($this->zone);

        if($title) $this->data['titre'] = $title;
        if($this->zone) $view = $this->zone.'/'.$view;

        return $this->load->view($view, $this->data, $return);
    }
}

Class MY_AdminController extends MY_Controller{

    /**
     * @var string
     */
    protected $adminViewZone = 'admin';

    public function __construct()
    {
        parent::__construct();
    }

    protected function render($view = 'index', $title = '', $header = true)
    {
        $this->adminViewZone = trim($this->adminViewZone);
        
        if(!$view) $view = 'index';
        if(!$title) $title = 'Accueil';

        $this->load->view($this->adminViewZone.'/head', ['title'=>$title]);
        $this->load->view($this->adminViewZone.'/header');
        $this->execute($view);
        $this->load->view($this->adminViewZone.'/footer');
    }

    protected function execute($view, $title='', $return = FALSE)
    {
        $this->zone = trim($this->zone);

        if($title) $this->data['title'] = $title;
        $view = $this->adminViewZone.(($this->zone)?'/'.$this->zone:'').'/'.$view;

        return $this->load->view($view, $this->data, $return);
    }
}