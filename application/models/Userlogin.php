<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Userlogin extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function check_user() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if ($this->db->count_all('users') == 0) {
            $this->create_superadmin();
            sleep(1);
        }
        $data['username'] = $this->input->post('username');
        $data['password'] = $this->input->post('password');
        $data['password'] = hash('sha256',$this->input->post('password')); 
        $sql = $this->db->get_where('users', $data);
        if ($sql->num_rows() > 0) {
            $_SESSION['user_id'] = $sql->row(0)->id;
            $_SESSION['role_id'] = $sql->row(0)->role_id;
            $_SESSION['username'] = $sql->row(0)->username;
            $_SESSION['email'] = $sql->row(0)->email;
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function check_access() {
        $controller = $this->uri->segment(1);
        $result1 = $this->db->get_where('controllers',array('name'=> $controller));
        if($result1->num_rows()>0){
            $result2 = $result1->row();
            $result3 = $this->db->get_where('assigned_controllers',array('controller_id' => $result2->id, 'role_id' => $_SESSION['role_id']));
            if($result3->num_rows()>0){
                return TRUE;
            }else{
                return FALSE;   
            }
        }else{
            return FALSE;
        }
        
    }    


    function check_assigned_controllers_access($title, $controllers, $icon) {
        $retval = $data = '';
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (count($controllers) > 1) {
            foreach ($controllers as $key => $value) {
                $skey = array();
                $skey['controller_id'] = $key;
                $skey['role_id'] = $_SESSION['role_id'];

                $this->db->select('controllers.id, controllers.name');
                $this->db->from('controllers');
                $this->db->join('assigned_controllers', 'controllers.id = assigned_controllers.controller_id');
                $this->db->where($skey); 
                $result = $this->db->get();

                if ($result->num_rows() > 0) {
                    $active = $this->uri->segment(1) == $result->row(0)->name ? ' class="active"' : '';
                    $data .= ' <li' . $active . '>'
                            . '<a href="' . site_url() . '/' . $result->row(0)->name . '"> ' . $value . '</a></li>';
                }
            }
            if ($this->uri->segment(1)) {
                $segment = $this->uri->segment(1);
            } else {
                $segment = 'cricket';
            }
            if ($data != '') {
                $active = array_key_exists($segment, $controllers) ? ' active' : '';
                $retval = '<li class="treeview' . $active . '">'
                        . '<a href="#"><i class="' . $icon . '"></i>&nbsp;<span>' . $title . '</span><i class="fa fa-angle-left pull-right"></i></a>'
                        . '<ul class="treeview-menu">' . $data . '</ul>'
                        . '</li>';
            }
        } else {
            foreach ($controllers as $key => $value) {
                $skey = array();
                $skey['controller_id'] = $key;
                $skey['role_id'] = $_SESSION['role_id'];

                $this->db->select('controllers.id, controllers.name');
                $this->db->from('controllers');
                $this->db->join('assigned_controllers', 'controllers.id = assigned_controllers.controller_id');
                $this->db->where($skey); 
                $result = $this->db->get();
                
                if ($result->num_rows() > 0) {
                    $active = $this->uri->segment(1) == $result->row(0)->name ? ' class="active"' : '';
                    $retval = '<li' . $active . '><a href="' . site_url() . '/' . $result->row(0)->name . '"><i class="' . $icon . '"></i>&nbsp;<span>' . $value . '</span></a></li>';
                }
            }
        }
        return $retval;
    }
    


}
