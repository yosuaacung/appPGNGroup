<?php

class Login extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('Login_model');
    }

    public function index(){
        $this->load->view('login/index.php');
    }

    public function prosesLogin(){
        $totalRow = $this->Login_model->login();
        if (empty($totalRow)){
            $this->session->set_flashdata('flash', ['danger','User atau Password salah']);
            redirect('login');
        } else {
            redirect('admin');
        }
    }
}