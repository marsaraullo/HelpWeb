<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| Users
| -------------------------------------------------------------------------
*/

class Users extends CI_Controller {
    
    function index(){
        $data = array();
        $this->load->model('rolemodel');
        $data['roles'] = $this->rolemodel->get_all();
        $this->load->model('usermodel');
        $data['users'] = $this->usermodel->get_all();
        $data['form_url'] = 'users/add_user';
        $this->load->helper('form');
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('users/index',$data);
        $this->load->view('layouts/footer');
    }
    
    function add_user(){
        $this->load->model('usermodel');
        if ($this->input->post('btn_add')){
            //validate form
            $messg = $this->usermodel->validate_input();
            if ($messg == ''){
                if ($this->input->post('btn_add')){
                    $this->usermodel->add_record();
                }
                redirect("users");
                exit;
            } else {
                if ($this->input->post('btn_add')){
                    foreach($this->input->post() as $key => $val){
                        if (substr($key,1,3)!="btn") { $data[$key] = $val; }
                    }
                }
                $data['messg'] = $messg;
                $data['app_error'] = 1;
            }
        }
        $data['form_url'] = 'users/add_user';
        $data['users'] = $this->usermodel->get_all();
        $this->load->helper('form');
        $this->load->view('header');
        $this->load->view('tabmenu');
        $this->load->view('users/index',$data);
        $this->load->view('footer');
    }
    
    function update_user($id = "",$is_view = 0){
        $data = array();
        $this->load->model('rolemodel');
        $data['roles'] = $this->rolemodel->get_all();
        if ($id != ""){
            $this->load->model('usermodel');
            if ($this->input->post('btn_save')){
                $this->usermodel->update_record();
                redirect("users");
                exit;
            } elseif ($this->input->post('btn_cancel')){
                redirect("users");
                exit;
            } else {
                //get the record
                $userdata = $this->usermodel->get_record();
                if (count($userdata)>0){
                    foreach ($userdata as $key => $val){
                        $data[$key] = $val;
                    }
                } else {
                    $fields = $this->db->list_fields("users");
                    foreach ($fields as $val){
                        $data[$val] = '';
                    }
                }
            }
        } else {
            $fields = $this->db->list_fields("users");
            foreach ($fields as $val){
                $data[$val] = '';
            }
        }
        if ($is_view == 0) {
            $data['enable_save'] = 1;
        } else {
            $data['is_view'] = 1;
        }
        $this->load->helper('form');
        $data['form_url'] = 'users/update_user/'.$id;
        $this->load->view('users/userdata',$data);
    }

    function delete_user($id = ""){
        if ($id != ""){
            $this->load->model('usermodel');
            echo $this->usermodel->delete_record();
            exit;
        }
    }
    
    function get_data(){
        $this->load->model('usermodel');
        echo $this->usermodel->get_from_datatables();
        exit;
    }
    
    function stb_config(){
        return true;
    }
    
}