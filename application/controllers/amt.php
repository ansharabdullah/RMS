<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class amt extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->presensi();
    }

    public function data_amt() {
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->load->view('layouts/navbar');
        $this->load->view('AMT/presensi');
        $this->load->view('layouts/footer');
    }

    public function input_amt() {
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->load->view('layouts/navbar');
        $this->load->view('AMT/presensi');
        $this->load->view('layouts/footer');
    }

    public function import_amt() {
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->load->view('layouts/navbar');
        $this->load->view('AMT/presensi');
        $this->load->view('layouts/footer');
    }

    public function presensi() {
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->load->view('layouts/navbar');
        $this->load->view('AMT/v_data_amt');
        $this->load->view('layouts/footer');
    }

    public function laporan() {
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->load->view('layouts/navbar');
        $this->load->view('AMT/presensi');
        $this->load->view('layouts/footer');
    }

    public function grafik() {
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->load->view('layouts/navbar');
        $this->load->view('AMT/presensi');
        $this->load->view('layouts/footer');
    }

    public function rencana() {
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->load->view('layouts/navbar');
        $this->load->view('AMT/presensi');
        $this->load->view('layouts/footer');
    }

}
