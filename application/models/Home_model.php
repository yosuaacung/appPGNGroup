<?php
    class Home_model extends CI_model{
        public function get_Rute(){
            $query = $this->db->query('SELECT * FROM tbl_rute JOIN tbl_kendaraan on tbl_rute.ID_KENDARAAN = tbl_kendaraan.ID_KENDARAAN ORDER BY NAMA_KENDARAAN ASC, BERANGKAT ASC, TUJUAN ASC');
            return $query->result_array();
        }
    }
?>