<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
  | -------------------------------------------------------------------------
  | BITTEL: User Manager
  | -------------------------------------------------------------------------
 */

class Usermodel extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all() {
        $result = $this->db->get('users');
        return $result->result_array();
    }

    function check_duplicate() {
        if ($this->input->post('username')) {
            $result = $this->db->get_where('users', array('username' => $this->input->post('username')));
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
                if ($key == "password") {
                    $val = hash("sha256", $val);
                } elseif (is_string($val) && $key != "username") {
                    $val = ucwords(strtolower($val));
                }
                $data[$key] = $val;
            }
        }
        $this->db->insert('users', $data);
    }

    function update_record() {
        $change_password = false;
        $id = $this->uri->segment(3);
        //get the old password
        $this->db->select('password');
        $this->db->where('id', $id);
        $sql = $this->db->get('users');
        if ($sql->num_rows() > 0) {
            $old_pass = $sql->row(0)->password;
        } else {
            $old_pass = "";
        }
        if ($old_pass != $this->input->post('password')) {
            $change_password = true;
        }
        $data = array();
        foreach ($this->input->post() as $key => $val) {
            if (substr($key, 0, 3) != "btn" && $key != "userid") {
                if ($key == "password" && $change_password) {
                    $val = hash("sha256", $val);
                } elseif (is_string($val) && $key != "username") {
                    $val = ucwords(strtolower($val));
                }
                $data[$key] = $val;
            }
        }
        $this->db->where('id', $id);
        $this->db->update('users', $data);
    }

    function get_record() {
        $id = $this->uri->segment(3);
        if ($id) {
            $qry = $this->db->get_where('users', array('id' => $id));
            if ($qry->num_rows() > 0) {
                return $qry->row_array(0);
            }
        }
        return array();
    }

    function validate_input() {
        $messg = '';
        //check for duplicate username
        $id = $this->uri->segment(3);
        if (!$id) {
            if ($this->input->post('username') != '' && $this->check_duplicate()) {
                $messg = 'Username already exists!';
            }
        }
        //check for emptry entry
        if (!$this->input->post('password') || $this->input->post('password') == '') {
            $messg = 'Please enter password';
        }
        if (!$this->input->post('lastname') || $this->input->post('lastname') == '') {
            $messg = 'Please enter lastname';
        }
        if (!$this->input->post('firstname') || $this->input->post('firstname') == '') {
            $messg = 'Please enter firstname';
        }
        if (!$this->input->post('username') || $this->input->post('username') == '') {
            $messg = 'Please enter username';
        }
        return $messg;
    }

    function delete_record() {
        $id = $this->uri->segment(3);
        if ($id) {
            $this->db->delete('users', array('id' => $id));
            if ($this->db->affected_rows() > 0) {
                return "Record has been deleted.";
            } else {
                return "Record has not been deleted.";
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
                $sortSql .= 'users.id ' . $val['dir'] . ',';
            }else{
                $sortSql .= $columns[$val['column']]['data'] . ' ' . $val['dir'] . ',';
            }
        }
        $sortSql = rtrim($sortSql, ',');
        // Setup search SQL using posted data
        if ($search['value'] != '') {
            $searchSql = "";
            foreach ($columns as $key => $val) {
                if ($val['data'] == "roletasks") {
                    $val['data'] = '`roles`.`roletasks`';
                } elseif ($val['data'] != "action") {
                    $val['data'] = '`users`.`' . $val['data'] . '`';
                }
                if ($val['data'] != "action") {
                    $searchSql .= $val['data'] . ' LIKE "%' . $search['value'] . '%" OR ';
                }
            }
            $searchSql = rtrim($searchSql, ' OR ');
            $searchSql = "WHERE " . $searchSql;
        } else {
            $searchSql = '';
        }
        // Get total count of records
        $sql = "SELECT COUNT(*) AS total FROM `users`";
        $result = $this->db->query($sql);
        $total = $result->row(0)->total;
        // Get total count of filtered records
        $sql = $sql . 'LEFT JOIN `roles`'
                . ' ON `roles`.`id` = `users`.`role_id` ' . $searchSql;
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
        $sql = 'SELECT `users`.*, `roles`.`roletasks` FROM `users`'
                . ' INNER JOIN `roles` ON `roles`.`id` = `users`.`role_id` '
                . $searchSql . ' ' . $sortSql . ' ' . $limitSql;
        $results = $this->db->query($sql);
        foreach ($results->result_array() as $key => $row) {
            $data['data'][] = array('id' => $row['id'],
                'username' => $row['username'],
                'firstname' => $row['firstname'],
                'lastname' => $row['lastname'],
                'email' => $row['email'],
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
