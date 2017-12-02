<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| Roles
| -------------------------------------------------------------------------
*/

class Roles extends CI_Controller {
    
    function index(){
        $data = array();
        $this->load->model('rolemodel');
        $data['roles'] = $this->rolemodel->get_all();
        $data['form_url'] = 'roles/add_role';
        $this->load->helper('form');
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('roles/index',$data);
        $this->load->view('layouts/footer');
    }
    
    function add_role(){
        $this->load->model('rolemodel');
        if ($this->input->post('btn_add')){
            //validate form
            $messg = $this->rolemodel->validate_input();
            if ($messg == ''){
                if ($this->input->post('btn_add')){
                    $this->rolemodel->add_record();
                }
                redirect("roles");
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
        $data['form_url'] = 'roles/add_role';
        $this->load->helper('form');
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('roles/index',$data);
        $this->load->view('layouts/footer');
    }
    
    function update_role($id = "",$is_view = 0){
        $data = array();
        if ($id != ""){
            $this->load->model('rolemodel');
            if ($this->input->post('btn_save')){
                $this->rolemodel->update_record();
                redirect("roles");
                exit;
            } elseif ($this->input->post('btn_cancel')){
                redirect("roles");
                exit;
            } else {
                //get the record
                $roledata = $this->rolemodel->get_record();
                if (count($roledata)>0){
                    foreach ($roledata as $key => $val){
                        $data[$key] = $val;
                    }
                } else {
                    $fields = $this->db->list_fields("roles");
                    foreach ($fields as $val){
                        $data[$val] = '';
                    }
                }
            }
        } else {
            $fields = $this->db->list_fields("roles");
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
        $data['form_url'] = 'roles/update_role/'.$id;
        $this->load->view('roles/roledata',$data);
    }

    function delete_role($id = ""){
        if ($id != ""){
            $this->load->model('rolemodel');
            echo $this->rolemodel->delete_record();
            exit;
        }
    }
    
    function get_data(){
        $this->load->model('rolemodel');
        echo $this->rolemodel->get_from_datatables();
        exit;
    }
    
}