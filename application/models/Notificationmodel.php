<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
  | -------------------------------------------------------------------------
  | Notificationmodel
  | -------------------------------------------------------------------------
 */

class Notificationmodel extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_notification_jobposts(){
        $stmt = $this->db->query('SELECT * FROM jobposts ORDER BY id DESC LIMIT 7');
        return $stmt->result_array();
        
    }

    function count_all_notification(){
        $stmt = $this->db->get_where('jobposts');
        return $stmt->num_rows();
    }

    function get_notification_jobposts_user(){
        $stmt = $this->db->get_where('jobposts', array('asker_id !=' => $_SESSION['user_id']));
        return $stmt->result_array();
        
    }

    function count_all_notification_user(){
        $stmt = $this->db->get_where('jobposts', array('asker_id !=' => $_SESSION['user_id']));
        return $stmt->num_rows();
    }    

}
