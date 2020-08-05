<?php
    class Login_model extends CI_model{
        public function login(){
            $this->db->where('USERNAME', $this->input->post('username', true));
            $this->db->where('PASSWORD', $this->input->post('password', true));
            $query = $this->db->get('tbl_ADMIN');
            return $query->row_array();
        }
    }
?>