<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
  | -------------------------------------------------------------------------
  | Rolemodel
  | -------------------------------------------------------------------------
 */

class Rolemodel extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all() {
        $data = array();
        $result = $this->db->get('roles');
        foreach ($result->result_array() as $key => $val) {
            $data[$val['id']] = $val;
        }
        return $data;
    }

    function check_duplicate() {
        if ($this->input->post('rolename')) {
            $result = $this->db->get_where('roles', array('rolename' => $this->input->post('rolename')));
            if ($result->num_rows() > 0) {
                return true;
            } else {
                return false;
            }
        }
        return false;
    }

    function add_record() {
        $data = array();
        foreach ($this->input->post() as $key => $val) {
            if (substr($key, 0, 3) != "btn" && $key != "id") {
                if (is_string($val) && $key != "rolename") {
                    $val = ucwords(strtolower($val));
                }
                $data[$key] = $val;
            }
        }
        $this->db->insert('roles', $data);
    }

    function update_record() {
        $id = $this->uri->segment(3);
        $data = array();
        foreach ($this->input->post() as $key => $val) {
            if (substr($key, 0, 3) != "btn" && $key != "userid") {
                if (is_string($val) && $key != "rolename") {
                    $val = ucwords(strtolower($val));
                }
                $data[$key] = $val;
            }
        }
        $this->db->where('id', $id);
        $this->db->update('roles', $data);
    }

    function get_record() {
        $id = $this->uri->segment(3);
        if ($id) {
            $qry = $this->db->get_where('roles', array('id' => $id));
            if ($qry->num_rows() > 0) {
                return $qry->row_array(0);
            }
        }
        return array();
    }

    function validate_input() {
        $messg = '';
        //check for duplicate role name
        $id = $this->uri->segment(3);
        if (!$id) {
            if ($this->input->post('rolename') != '' && $this->check_duplicate()) {
                $messg = 'Role name already exists!';
            }
        }
        //check for emptry entry
        if (!$this->input->post('roletasks') || $this->input->post('roletasks') == '') {
            $messg = 'Please enter role tasks';
        }
        return $messg;
    }

    function delete_record() {
        $id = $this->uri->segment(3);
        if ($id) {
            //check for referential integrity
            $this->db->where('role_id', $id);
            $result = $this->db->get('users');
            if ($result->num_rows() == 0) {
                $this->db->delete('roles', array('id' => $id));
                if ($this->db->affected_rows() > 0) {
                    return "Record has been deleted.";
                } else {
                    return "Record has not been deleted.";
                }
            } else {
                return "Referential Integrity Error";
            }
        }
    }

    function get_from_datatables() {
        // Get posted data
        $start = $this->input->post('start');
        $length = $this->input->post('length');
        $search = $this->input->post('search');
        $columns = $this->input->post('columns');
        // Setup sort SQL using posted data
        $sortSql = "ORDER BY ";
        foreach($this->input->post('order') as $key => $val){
            if($columns[$val['column']]['data'] == 'action'){
                $sortSql .=  'roles.id ' . $val['dir'] . ',';
            }else{
                $sortSql .= $columns[$val['column']]['data'] . ' ' . $val['dir'] . ',';
            }
        }
        $sortSql = rtrim($sortSql, ',');
        // Setup search SQL using posted data
        if ($search['value'] != '') {
            $searchSql = "";
            foreach ($columns as $key => $val) {
                if ($val['data'] != "action") {
                    $val['data'] = '`roles`.`' . $val['data'] . '`';
                    $searchSql .= $val['data'] . ' LIKE "%' . $search['value'] . '%" OR ';
                }
            }
            $searchSql = rtrim($searchSql, ' OR ');
            $searchSql = "WHERE " . $searchSql;
        } else {
            $searchSql = '';
        }
        // Get total count of records
        $sql = "SELECT COUNT(*) AS total FROM `roles`";
        $result = $this->db->query($sql);
        $total = $result->row(0)->total;
        // Get total count of filtered records
        $sql = "SELECT COUNT(*) AS total FROM `roles` $searchSql";
        $result = $this->db->query($sql);
        $filtered_total = $result->row(0)->total;
        // Setup paging SQL
        $limitSql = "LIMIT $start, $length";
        // Return JSON data
        $data = array();
        $data['draw'] = (int) $this->input->post('draw');
        $data['recordsTotal'] = (int) $total;
        $data['recordsFiltered'] = (int) $filtered_total;
        $data['data'] = array();
        $sql = 'SELECT id, rolename, roletasks'
                . ' FROM `roles` ' . $searchSql . ' ' . $sortSql . ' ' . $limitSql;
        $results = $this->db->query($sql);
        foreach ($results->result_array() as $key => $row) {
            $data['data'][] = array('id' => $row['id'], 'rolename' => $row['rolename'],
                'roletasks' => $row['roletasks'],
                'action' => '<a href="javascript:view_record('
                . $row['id'] . ')" title="View" class="btn btn-info btn-xs"><i class="fa fa-list-alt"></i></a>'
                . '&nbsp;&nbsp;<a href="javascript:update_record('
                . $row['id'] . ')" title="Update" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>'
                . '&nbsp;&nbsp;<a href="javascript:delete_record('
                . $row['id'] . ')" title="Delete" class="btn btn-danger btn-xs"><i class="fa fa-times-circle"></i></a>');
        }
        return json_encode($data);
    }

}
