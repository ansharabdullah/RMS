<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class amt extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->data_amt();
    }

    public function data_amt() {
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->load->view('layouts/navbar');
        $this->load->view('amt/v_data_amt');
        $this->load->view('layouts/footer');
    }

    public function import_amt() {
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->load->view('layouts/navbar');
        $this->load->view('amt/v_import_amt');
        $this->load->view('layouts/footer');
    }
    
    public function detail(){
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->load->view('layouts/navbar');
        $this->load->view('amt/v_detail');
        $this->load->view('layouts/footer');
    }

    public function kinerja(){
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->load->view('layouts/navbar');
        $this->load->view('amt/v_kinerja_manual');
        $this->load->view('layouts/footer');
    }
    
    public function kinerja_siod(){
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->load->view('layouts/navbar');
        $this->load->view('amt/v_kinerja_siod');
        $this->load->view('layouts/footer');
    }
    
    public function presensi() {
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->load->view('layouts/navbar');

        $this->load->view('amt/v_presensi');
        $this->load->view('layouts/footer');
    }

    public function laporan() {
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->load->view('layouts/navbar');
        $this->load->view('amt/v_laporan');
        $this->load->view('layouts/footer');
    }
    
    public function grafik() {
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->load->view('layouts/navbar');
        $this->load->view('amt/v_grafik');
        $this->load->view('layouts/footer');
    }

    

        
    
    
    
    

}
