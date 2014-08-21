<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class kpi extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        
    }

    public function operasional() {

        $data['lv1'] = 7;
        $data['lv2'] = 1;
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->load->view('layouts/navbar_oam', $data);
        $this->load->view("oam/v_kpi_operasional");
        $this->load->view('layouts/footer');
    }

    public function operasional_bulan($tahun) {
        $data['lv1'] = 7;
        $data['lv2'] = 1;
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->load->view('layouts/navbar_oam', $data);
        $this->load->view("oam/v_kpi_operasional_bulan");
        $this->load->view('layouts/footer');
    }
    
    public function operasional_depot($tahun,$bulan,$depot) {
        $data['lv1'] = 7;
        $data['lv2'] = 1;
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->load->view('layouts/navbar_oam', $data);
        $this->load->view("oam/v_kpi_operasional_depot");
        $this->load->view('layouts/footer');
    }

}
