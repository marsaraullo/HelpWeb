<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jobcomments extends CI_Controller {

	public function index(){
        $this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('jobcomments/index');
		$this->load->view('layouts/footer');
	}

}
