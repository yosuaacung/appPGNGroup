<?php
    class Admin_model extends CI_model{
        public function get_Kendaraan(){
            return $this->db->get('tbl_KENDARAAN')->result_array();
        }

        public function get_KendaraanByNama(){
            $this->db->where('NAMA_KENDARAAN', $this->input->post('nama_kendaraan', true));
            return $this->db->get('tbl_KENDARAAN')->row_array();
        }

        public function tambah_kendaraan(){
            $data = [
                'NAMA_KENDARAAN' => $this->input->post('nama_kendaraan', true)
            ];
            $this->db->insert('tbl_KENDARAAN', $data);
        }

        public function get_Rute(){
            return $this->db->query('SELECT * FROM tbl_rute JOIN tbl_kendaraan on tbl_rute.ID_KENDARAAN = tbl_kendaraan.ID_KENDARAAN ORDER BY BERANGKAT ASC, NAMA_KENDARAAN ASC')->result_array();
        }

        public function validasi_Rute(){
            $this->db->where('ID_KENDARAAN', $this->input->post('id_transportasi', true));
            $this->db->where('BERANGKAT', $this->input->post('berangkat', true));
            $this->db->where('TUJUAN', $this->input->post('tujuan', true));
            return $this->db->get('tbl_RUTE')->row_array();
        }

        public function tambah_rute(){
            $data = [
                'ID_KENDARAAN' => $this->input->post('id_transportasi', true),
                'BERANGKAT' => $this->input->post('berangkat', true),
                'TUJUAN' => $this->input->post('tujuan', true),
                'TOTAL_SLOT' => $this->input->post('slot', true)
            ];
            $this->db->insert('tbl_RUTE', $data);
        }

        public function get_Jadwal(){
            return $this->db->query('SELECT * FROM tbl_jadwal_keberangkatan JOIN tbl_rute on tbl_jadwal_keberangkatan.ID_RUTE = tbl_rute.ID_RUTE JOIN tbl_kendaraan on tbl_rute.ID_KENDARAAN = tbl_kendaraan.ID_KENDARAAN ORDER BY DATE DESC, NAMA_KENDARAAN ASC, BERANGKAT ASC')->result_array();
        }

        public function validasi_Jadwal(){
            $this->db->where('ID_RUTE', $this->input->post('id_rute', true));
            $this->db->where('DATE', $this->input->post('jadwal_keberangkatan', true));
            return $this->db->get('tbl_JADWAL_KEBERANGKATAN')->row_array();
        }

        public function tambah_jadwal(){
            $data = [
                'ID_RUTE' => $this->input->post('id_rute', true),
                'DATE' => $this->input->post('jadwal_keberangkatan', true)
            ];
            $this->db->insert('tbl_JADWAL_KEBERANGKATAN', $data);
        }

        public function get_DaftarBooking(){
            $query = "SELECT tbl_booking.ID_BOOKING, tbl_karyawan.ID_KARYAWAN, tbl_karyawan.NAMA_KARYAWAN, tbl_kendaraan.NAMA_KENDARAAN, CONCAT(tbl_rute.BERANGKAT, ' - ', tbl_rute.TUJUAN) RUTE, tbl_jadwal_keberangkatan.DATE, tbl_booking.PERMINTAAN_SLOT, tbl_booking.STATUS, tbl_booking.VALIDATION_DATE DATE_APPROVE FROM tbl_booking JOIN tbl_jadwal_keberangkatan on tbl_booking.ID_JADWAL = tbl_jadwal_keberangkatan.ID_JADWAL JOIN tbl_karyawan on tbl_booking.ID_KARYAWAN = tbl_karyawan.ID_KARYAWAN JOIN tbl_rute on tbl_jadwal_keberangkatan.ID_RUTE = tbl_rute.ID_RUTE JOIN tbl_kendaraan on tbl_rute.ID_KENDARAAN = tbl_kendaraan.ID_KENDARAAN WHERE tbl_karyawan.ACTIVE = 'Y' ORDER BY VALIDATION_DATE ASC, ID_BOOKING ASC";
            $query = $this->db->query($query);
            return $query->result_array();
        }

        public function update_StatusBooking($idBooking, $status){
            if($status == "approve"){
                $data = [
                    'STATUS' => 'Approve',
                    'VALIDATION_DATE'  => date("Y-m-d H:i:s")
                ];
            } else {
                $data = [
                    'STATUS' => 'Reject',
                    'VALIDATION_DATE'  => date("Y-m-d H:i:s")
                ];
            }
            $this->db->where('ID_BOOKING', $idBooking);
            $this->db->update('tbl_BOOKING',$data);
        }

        public function get_LastTiket(){
            $query = "SELECT * FROM tbl_TIKET ORDER BY KODE_TIKET DESC LIMIT 1";
            $query = $this->db->query($query);
            return $query->row_array();
        }

        public function insert_Tiket($idBooking, $newTiketID){
            $data = [
                'KODE_TIKET' => $newTiketID,
                'ID_BOOKING' => $idBooking
            ];
            $this->db->insert('tbl_TIKET', $data);
        }
    }
?>