<?php

class Home extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('Home_model');
    }

    public function index(){
        $data['judul_halaman'] = 'Home';
        $data['rute'] = $this->Home_model->get_Rute();
        $this->load->view('templates/header.php', $data);
        $this->load->view('home/index.php', $data);
        $this->load->view('templates/footer.php');
    }
}