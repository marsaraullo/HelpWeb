<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jobposts_Users extends CI_Controller {

	public function index(){
        $data['form_url'] = 'jobposts_users/add_jobpost';		
		$this->load->helper('form');		
        $this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('jobposts_users/index',$data);
		$this->load->view('layouts/footer_home');
	}


    function add_jobpost(){
        $this->load->model('jobpostusermodel');
        if ($this->input->post('btn_add')){
			$this->jobpostusermodel->add_record();
            	redirect("jobposts_users");
        }
        $data['form_url'] = 'jobposts_users/add_jobpost';
        $this->load->helper('form');
        $this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('jobposts_users/index',$data);
		$this->load->view('layouts/footer_home');
	}	

	
    function update_jobpost($id = "",$is_view=0){
        $data = array();
        if ($id != ""){
            $this->load->model('jobpostusermodel');
            if ($this->input->post('btn_save')){
                $this->jobpostusermodel->update_record();
                redirect("jobposts_users");
                exit;
            } elseif ($this->input->post('btn_cancel')){
                redirect("jobposts_users");
                exit;
            } else {
                //get the record
                $userdata = $this->jobpostusermodel->get_record();
                if (count($userdata)>0){
                    foreach ($userdata as $key => $val){
                        $data[$key] = $val;
                    }
                } else {
                    $fields = $this->db->list_fields("jobposts_users");
                    foreach ($fields as $val){
                        $data[$val] = '';
                    }
                }
            }
        } else {
            $fields = $this->db->list_fields("jobposts_users");
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
        $data['form_url'] = 'jobposts_users/update_jobpost/'.$id;
        $this->load->view('jobposts_users/jobpostdata',$data);
    }

    function delete_jobpost($id = ""){
        if ($id != ""){
            $this->load->model('jobpostusermodel');
            echo $this->jobpostusermodel->delete_record();
            exit;
        }
    }
    
    function get_data(){
        $this->load->model('jobpostusermodel');
        echo $this->jobpostusermodel->get_from_datatables('jobposts');
        exit;
	}
	
    function job($id){	
		$data['id'] = $id;
		$this->load->model('jobpostusermodel');
		$data['jobdata'] = $this->jobpostusermodel->get_jobpost_by_id($id);
		$data['jobapplicants'] = $this->jobpostusermodel->get_jobapplicants_by_id($id);
        $this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('jobposts_users/job',$data);
		$this->load->view('layouts/footer_home');
	}	
	
	function accept_applicant($job_id,$user_id){
		if($job_id !=="" && $user_id !==""){
			$this->db->where('id',$job_id);
			$this->db->update('jobposts',array('helper_id' => $user_id));
			sleep(1);
			$this->db->where('job_id',$job_id);
			$this->db->delete('applicants');
			redirect(site_url().'/jobposts_users/job/'.$job_id);
		}else{
			redirect(site_url().'/jobposts_users/job/'.$job_id);
		}
	}	

	function apply($job_id){
		if($job_id !=="" && $user_id !==""){
			$this->db->insert('applicants',array('job_id'=> $job_id, 'user_id' => $_SESSION['user_id']));
			redirect(site_url().'/jobposts_users/');
		}else{
			redirect(site_url().'/jobposts_users/');
		}
	}		

}
