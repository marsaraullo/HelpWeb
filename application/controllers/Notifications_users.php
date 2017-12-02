<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notifications_users extends CI_Controller {

    function get_all_notifications(){
        $this->load->model('notificationmodel');
		$data['notifications'] = $this->notificationmodel->get_notification_jobposts_user();
        $data['count_notification'] = $this->notificationmodel->count_all_notification_user();
        $this->load->view('notifications_users/index',$data);
	}
	
    
}
