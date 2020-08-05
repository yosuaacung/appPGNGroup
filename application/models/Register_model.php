<?php
    class Register_model extends CI_model{
        public function get_Rute(){
            $this->db->where('ID_KENDARAAN', $this->input->post('id', true));
            $query = $this->db->get('tbl_RUTE');
            return $query->result_array();
        }

        public function get_Jadwal(){
            $this->db->where('ID_RUTE', $this->input->post('id', true));
            $query = $this->db->get('tbl_JADWAL_KEBERANGKATAN');
            return $query->result_array();
        }

        public function get_Kendaraan(){
            return $this->db->get('tbl_KENDARAAN')->result_array();
        }

        public function add_Booking(){
            $data = [
                'ID_BOOKING' => $_SESSION['new_ID'],
                'ID_KARYAWAN' => $this->input->post('id_karyawan', true),
                'ID_JADWAL' => $this->input->post('id_jadwal', true),
                'PERMINTAAN_SLOT' => $this->input->post('slot', true),
                'STATUS' => 'Menunggu'
            ];
            unset($_SESSION['new_ID']);
            $this->db->insert('tbl_BOOKING', $data);
        }

        public function get_lastID(){
            $query = $this->db->query('SELECT ID_BOOKING FROM tbl_BOOKING ORDER BY ID_BOOKING DESC LIMIT 1');
            return $query->row_array();
        }

        public function get_User(){
            $this->db->where('ID_KARYAWAN', $this->input->post('id_karyawan', true));
            $query = $this->db->get('tbl_KARYAWAN');
            return $query->row_array();
        }

        public function get_BookingByUserID(){
            
            $query = "SELECT tbl_booking.ID_BOOKING, tbl_karyawan.ID_KARYAWAN, tbl_karyawan.NAMA_KARYAWAN, tbl_kendaraan.NAMA_KENDARAAN, CONCAT(tbl_rute.BERANGKAT, ' - ', tbl_rute.TUJUAN) RUTE, tbl_jadwal_keberangkatan.DATE FROM tbl_booking JOIN tbl_jadwal_keberangkatan on tbl_booking.ID_JADWAL = tbl_jadwal_keberangkatan.ID_JADWAL JOIN tbl_karyawan on tbl_booking.ID_KARYAWAN = tbl_karyawan.ID_KARYAWAN JOIN tbl_rute on tbl_jadwal_keberangkatan.ID_RUTE = tbl_rute.ID_RUTE JOIN tbl_kendaraan on tbl_rute.ID_KENDARAAN = tbl_kendaraan.ID_KENDARAAN WHERE tbl_karyawan.ACTIVE = 'Y' ";
            $query = $query . "AND tbl_booking.ID_KARYAWAN = '" . $_SESSION['karyawan_ID'] . "' AND YEAR(CRT_DT) = YEAR(CURRENT_DATE) ORDER BY CRT_DT DESC";
            $query = $this->db->query($query);
            return $query->row_array();
               
        }

        public function get_BookingByID(){
            $query = "SELECT * FROM tbl_booking JOIN tbl_karyawan on tbl_booking.ID_KARYAWAN = tbl_karyawan.ID_KARYAWAN LEFT JOIN tbl_tiket on tbl_booking.ID_BOOKING = tbl_tiket.ID_BOOKING WHERE tbl_booking.ID_BOOKING = '" . $this->input->post('id', true) . "'";
            $query = $this->db->query($query);
            return $query->row_array();
        }
    }
?>