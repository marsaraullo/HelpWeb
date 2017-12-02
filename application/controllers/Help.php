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
        if ($this->input->post('btn_submit')){
            if ($this->userlogin->check_user()){
				if($_SESSION['role_id']==1){
					redirect('help');
				}else{
					redirect('home');	
				}
                exit;
            }
        }
        $this->load->helper('form');
        $this->load->view('login/header_login');
        $this->load->view('login/index');
        $this->load->view('login/footer_login');
	}

    function logout(){
        if (session_status()==PHP_SESSION_NONE) {
             session_start(); 
        }
        // Unset all of the session variables.
        $_SESSION = array();
        // If it's desired to kill the session, also delete the session cookie.
        // Note: This will destroy the session, and not just the session data!
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
        // Finally, destroy the session.
        session_destroy();
        redirect(site_url());
        exit;
    }
}
