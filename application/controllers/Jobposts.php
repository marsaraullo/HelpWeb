<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jobposts extends CI_Controller {

	public function index(){
        $data['form_url'] = 'jobposts/add_jobpost';		
		$this->load->helper('form');
        $this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('jobposts/index',$data);
		$this->load->view('layouts/footer');
	}
	
    function add_jobpost(){
        $this->load->model('jobpostmodel');
        if ($this->input->post('btn_add')){
			$this->jobpostmodel->add_record();
            	redirect("jobposts");
        }
        $data['form_url'] = 'jobposts/add_jobpost';
        $this->load->helper('form');
        $this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('jobposts/index',$data);
		$this->load->view('layouts/footer');
	}	

	
    function update_jobpost($id = "",$is_view=0){
        $data = array();
        if ($id != ""){
            $this->load->model('jobpostmodel');
            if ($this->input->post('btn_save')){
                $this->jobpostmodel->update_record();
                redirect("jobposts");
                exit;
            } elseif ($this->input->post('btn_cancel')){
                redirect("jobposts");
                exit;
            } else {
                //get the record
                $userdata = $this->jobpostmodel->get_record();
                if (count($userdata)>0){
                    foreach ($userdata as $key => $val){
                        $data[$key] = $val;
                    }
                } else {
                    $fields = $this->db->list_fields("jobposts");
                    foreach ($fields as $val){
                        $data[$val] = '';
                    }
                }
            }
        } else {
            $fields = $this->db->list_fields("jobposts");
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
        $data['form_url'] = 'jobposts/update_jobpost/'.$id;
        $this->load->view('jobposts/jobpostdata',$data);
    }

    function delete_jobpost($id = ""){
        if ($id != ""){
            $this->load->model('jobpostmodel');
            echo $this->jobpostmodel->delete_record();
            exit;
        }
    }
    
    function get_data(){
        $this->load->model('jobpostmodel');
        echo $this->jobpostmodel->get_from_datatables('jobposts');
        exit;
	}
	
    function job($id){	
		$data['id'] = $id;
		$this->load->model('jobpostmodel');
		$data['jobdata'] = $this->jobpostmodel->get_jobpost_by_id($id);
		$data['jobapplicants'] = $this->jobpostmodel->get_jobapplicants_by_id($id);
        $this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('jobposts/job',$data);
		$this->load->view('layouts/footer');
	}	
	
	function accept_applicant($job_id,$user_id){
		if($job_id !=="" && $user_id !==""){
			$this->db->where('id',$job_id);
			$this->db->update('jobposts',array('helper_id' => $user_id));
			sleep(1);
			$this->db->where('job_id',$job_id);
			$this->db->delete('applicants');
			redirect(site_url().'/jobposts/job/'.$job_id);
		}else{
			redirect(site_url().'/jobposts/job/'.$job_id);
		}
	}

    
}
