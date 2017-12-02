<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notifications_users extends CI_Controller {

	public function index(){
        $this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('notifications_users/index');
		$this->load->view('layouts/footer');
	}
}
