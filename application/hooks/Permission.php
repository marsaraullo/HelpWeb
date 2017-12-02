<?php
class Permissions {
    
    function check_access(){
        $CI =& get_instance();
        $current_controller = $CI->uri->segment(1);
        $current_method = $CI->uri->segment(2);
        if ($current_method != "login" && !in_array($current_controller,
            array('apicall')) && !isset($_SESSION['username'])){
            if (session_status()==PHP_SESSION_NONE && !headers_sent()) { session_start(); }
            if (!isset($_SESSION['username'])){
                redirect('help/login');
                exit;
            }
        }
        $CI->load->model('userlogin');
        if (isset($_SESSION['user_id']) && $_SESSION['user_id'] != '') {
            $user_id = $_SESSION['user_id'];
        }
        if ($current_controller != "help" && !in_array($current_controller,
            array('apicall')) && $current_controller !== FALSE){
            if (session_status()==PHP_SESSION_NONE && !headers_sent()) { session_start(); }
            if (isset($_SESSION['role_id'])){
            if($CI->userlogin->check_access()==FALSE){
                if($_SESSION['role_id']==1){
                    redirect('help');
                }else{
                    redirect('home');
                }
            }

            } elseif (!isset($_SESSION['role_id']) && $current_method != "login") {
                redirect('help/logout');
                exit;
            }
        }elseif(isset($_SESSION['role_id']) && $current_method == "login"){
            redirect("help");
        }
    }
    
}