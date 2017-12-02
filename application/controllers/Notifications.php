<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notifications extends CI_Controller {

    function get_all_notifications(){
        $this->load->model('notificationmodel');
		$data['notifications'] = $this->notificationmodel->get_notification_jobposts();
        $data['count_notification'] = $this->notificationmodel->count_all_notification();
        $this->load->view('notifications/index',$data);

    }
    
}
