<?php
    class Register extends CI_Controller {
        public function __construct(){
            parent::__construct();
            $this->load->model('Register_model');
            $this->load->library('form_validation');
        }

        public function index(){
            $data['judul_halaman'] = 'Booking Tiket';
            $data['transportasi'] = $this->Register_model->get_Kendaraan();
            if (isset($_SESSION['karyawan_ID'])){
                $data['booking'] = $this->Register_model->get_BookingByUserID();
            }
            $this->load->view('templates/header.php', $data);
            $this->load->view('register/index.php', $data);
            $this->load->view('templates/footer.php');
        }

        public function get_Rute(){
            echo json_encode($this->Register_model->get_Rute());
        }

        public function get_JadwalBerangkatByRuteID(){
            echo json_encode($this->Register_model->get_Jadwal());
        }

        public function addBooking(){
            $totalRow = $this->Register_model->get_User();
            if (empty($totalRow)){
                $this->session->set_flashdata('flash', ['danger','User tidak terdaftar']);
                redirect('register');
            } else {
                $lastID = $this->Register_model->get_lastID();
                if (empty($lastID)){
                    $lastID = 'BK00001';
                } else {
                    $lastID = 'BK' . str_pad(substr($lastID['ID_BOOKING'], 2) + 1, 5, 0, STR_PAD_LEFT);
                }
                $_SESSION['new_ID'] = $lastID;
                $this->Register_model->add_Booking();
                $this->session->set_flashdata('flash', ['success','Booking berhasil didaftarkan']);
                $_SESSION['karyawan_ID'] = $this->input->post('id_karyawan', true);
                redirect('register');
            }
        }

        public function get_BookingByID(){
            echo json_encode($this->Register_model->get_BookingByID());        
        }
    }
?>