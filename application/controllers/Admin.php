<?php

class Admin extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('Admin_model');
    }

    public function index(){
        $data['judul_halaman'] = 'Admin';
        $this->load->view('templates/header_admin.php', $data);
        $this->load->view('admin/index.php', $data);
        $this->load->view('templates/footer_admin.php');
    }

    public function tambah_kendaraan(){
        $data['judul_halaman'] = 'Admin';
        $data['kendaraan'] = $this->Admin_model->get_Kendaraan();
        $this->load->view('templates/header_admin.php', $data);
        $this->load->view('admin/tambah_kendaraan.php', $data);
        $this->load->view('templates/footer_admin.php');
    }

    public function proses_tambah_kendaraan(){
        $totalRow = $this->Admin_model->get_KendaraanByNama();
        if (empty($totalRow)){
            $this->Admin_model->tambah_kendaraan();
            $this->session->set_flashdata('flash', ['success','Data Kendaraan berhasil didaftarkan']);
            redirect('admin/tambah_kendaraan');
        } else {
            $this->session->set_flashdata('flash', ['danger','Nama Kendaraan sudah ada']);
            redirect('admin/tambah_kendaraan');
        }
    }

    public function tambah_rute(){
        $data['judul_halaman'] = 'Admin';
        $data['rute'] = $this->Admin_model->get_Rute();
        $data['kendaraan'] = $this->Admin_model->get_Kendaraan();
        $this->load->view('templates/header_admin.php', $data);
        $this->load->view('admin/tambah_rute.php', $data);
        $this->load->view('templates/footer_admin.php');
    }

    public function proses_tambah_rute(){
        $totalRow = $this->Admin_model->validasi_Rute();
        if (empty($totalRow)){
            $this->Admin_model->tambah_rute();
            $this->session->set_flashdata('flash', ['success','Data Rute berhasil didaftarkan']);
            redirect('admin/tambah_rute');
        } else {
            $this->session->set_flashdata('flash', ['danger','Data rute sudah ada']);
            redirect('admin/tambah_rute');
        }
    }

    public function tambah_jadwal(){
        $data['judul_halaman'] = 'Admin';
        $data['rute'] = $this->Admin_model->get_Rute();
        $data['kendaraan'] = $this->Admin_model->get_Kendaraan();
        $data['jadwal'] = $this->Admin_model->get_Jadwal();
        $this->load->view('templates/header_admin.php', $data);
        $this->load->view('admin/tambah_jadwal.php', $data);
        $this->load->view('templates/footer_admin.php');
    }

    public function proses_tambah_jadwal_keberangkatan(){
        $totalRow = $this->Admin_model->validasi_Jadwal();
        if (empty($totalRow)){
            $this->Admin_model->tambah_jadwal();
            $this->session->set_flashdata('flash', ['success','Data Jadwal Keberangkatan berhasil didaftarkan']);
            redirect('admin/tambah_jadwal');
        } else {
            $this->session->set_flashdata('flash', ['danger','Data Jadwal Keberangkatan sudah ada']);
            redirect('admin/tambah_jadwal');
        }
    }

    public function daftar_booking(){
        $data['judul_halaman'] = 'Admin';
        $data['daftar_booking'] = $this->Admin_model->get_DaftarBooking();
        $this->load->view('templates/header_admin.php', $data);
        $this->load->view('admin/daftar_booking.php', $data);
        $this->load->view('templates/footer_admin.php');
    }

    public function update_StatusBooking($idBooking, $status){
        $newTiketID = $this->Admin_model->get_LastTiket();
        if (empty($newTiketID)){
            $newTiketID = 'TK00001';
        } else {
            $newTiketID = 'TK' . str_pad(substr($newTiketID['KODE_TIKET'], 2) + 1, 5, 0, STR_PAD_LEFT);
        }
        $this->Admin_model->update_StatusBooking($idBooking, $status);
        if ($status == "approve"){
            $this->Admin_model->insert_Tiket($idBooking, $newTiketID);
        }
        $this->session->set_flashdata('flash', ['success','Data Berhasil Diubah']);
        redirect('admin/daftar_booking');
        
    }
}