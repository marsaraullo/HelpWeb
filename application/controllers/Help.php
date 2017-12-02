<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Help extends CI_Controller {

	public function index(){
        $this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('help/index');
		$this->load->view('layouts/footer');
	}

	public function login(){
		$this->load->view('login/index');
	}
}
