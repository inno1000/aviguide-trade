<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_AdminController {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
	{
		$this->render();
	}
}
