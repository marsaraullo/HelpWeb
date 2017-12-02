<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
  | -------------------------------------------------------------------------
  | Job Post User model
  | -------------------------------------------------------------------------
 */

class Jobpostusermodel extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all() {
        $retval = array();
        $result = $this->db->get('jobposts');
        foreach ($result->result_array() as $k => $v) {
            $retval[$v['id']] = $v;
        }
        return $retval;
    }


    function add_record() {
        $data = array();
        foreach ($this->input->post() as $key => $val) {
            if (substr($key, 0, 3) != "btn" && $key != "id") {
                $data['id'] = uniqid();
                $data[$key] = $val;
            }
        }
        $this->db->insert('jobposts', $data);
    }

    function update_record() {
        $id = $this->uri->segment(3);
        $data = array();
        foreach ($this->input->post() as $key => $val) {
            if (substr($key, 0, 3) != "btn" && $key != "id") {
                $data[$key] = $val;
            }
        }
        $this->db->where('id', $id);
        $this->db->update('jobposts', $data);
    }

    function get_record() {
        $id = $this->uri->segment(3);
        if ($id) {
            $qry = $this->db->get_where('jobposts', array('id' => $id));
            if ($qry->num_rows() > 0) {
                return $qry->row_array(0);
            }
        }
        return array();
    }

    function delete_record() {
        $id = $this->uri->segment(3);
        if ($id) {
            $this->db->delete('jobposts', array('id' => $id));
            if ($this->db->affected_rows() > 0) {
                return "Record has been deleted.";
            } else {
                return "Record has not been deleted.";
            }
        }
    }

    function get_from_datatables($dbf) {
        // Get posted data
        $start = $this->input->post('start');
        $length = $this->input->post('length');
        $search = $this->input->post('search');
        $columns = $this->input->post('columns');
        // Setup sort SQL using posted data
        if($this->input->post('order')){
            $sortSql = "ORDER BY ";
                foreach($this->input->post('order') as $key => $val){
                    if($columns[$val['column']]['data'] == 'action'){
                        $sortSql .= $dbf . '.id ' . $val['dir'] . ',';
                    }else{
                        $sortSql .= $columns[$val['column']]['data'] . ' ' . $val['dir'] . ',';
                    }
                }
            $sortSql = rtrim($sortSql, ',');
        } else {
            $sortSql = "";
        }
        // Setup search SQL using posted data
        if ($search['value'] != '') {
            $searchSql = "";
            foreach ($columns as $key => $val) {
                if ($val['data'] != 'action') {
                    $searchSql .= $val['data'] . ' LIKE "%' . $search['value'] . '%" OR ';
                }
            }
            $searchSql = rtrim($searchSql, ' OR ');
            $searchSql = "WHERE " . $searchSql;
        } else {
            $searchSql = '';
        }
        // Get total count of records
        $sql = "SELECT COUNT(*) AS total FROM `" . $dbf . "`";
        $result = $this->db->query($sql);
        $total = $result->row(0)->total;
        // Get total count of filtered records
        $sql = "SELECT COUNT(*) AS total FROM `" . $dbf . "` $searchSql";
        $result = $this->db->query($sql);
        $filtered_total = $result->row(0)->total;
        // Setup paging SQL
        if($this->input->post('start') && $this->input->post('length')){
            $limitSql = "LIMIT $start, $length";
        } else {
            $limitSql = "";
        }
        // Return JSON data
        $data = array();
        $data['draw'] = (int) $this->input->post('draw');
        $data['recordsTotal'] = (int) $total;
        $data['recordsFiltered'] = (int) $filtered_total;
        $data['data'] = array();
        $sql = 'SELECT * FROM `' . $dbf . '` ' . $searchSql . ' ' . $sortSql
                . ' ' . $limitSql;
        $results = $this->db->query($sql);
        foreach ($results->result_array() as $key => $row) {
            $result = $this->db->get_where('users',array('id'=>$row['asker_id']));
            $result2 = $result->row();
            $data['data'][] = array('id' => $row['id'],
                'datetime' => $row['datetime'],
                'title' => $row['title'],
                'min_cost' => $row['min_cost'],
                'actual_cost' => $row['actual_cost'],
                'max_cost' => $row['max_cost'],
                'asker_id' => $result2->lastname.', '.$result2->firstname,
                'action' => '<a href="javascript:view_record(\''.$row['id'].'\')" title="View" class="btn btn-info btn-xs"><i class="fa fa-list-alt"></i></a>'
                . '&nbsp;&nbsp;<a href="javascript:update_record(\''.$row['id'].'\')" title="Update" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>'
                . '&nbsp;&nbsp;<a href="javascript:delete_record(\''.$row['id'].'\')" title="Delete" class="btn btn-danger btn-xs"><i class="fa fa-times-circle"></i></a>');
        }
        return json_encode($data);
    }

}