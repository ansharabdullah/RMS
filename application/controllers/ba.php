<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class ba extends CI_Controller {

    public function index() {
        $this->berita_acara();
    }

    public function ms2() {
        $data['lv1'] = 6;
        $data['lv2'] = 2;
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->load->view('layouts/navbar', $data);
        $this->load->view('ba/v_ms2');
        $this->load->view('layouts/footer');
    }

    public function import_ms2() {
        $data['lv1'] = 6;
        $data['lv2'] = 2;
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->load->view('layouts/navbar', $data);
        $this->load->view('ba/v_import_ms2');
        $this->load->view('layouts/footer');
    }
    
    public function frm() {
       $data['lv1'] = 6;
        $data['lv2'] = 3;
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->load->view('layouts/navbar', $data);
        $this->load->view('ba/v_frm');
        $this->load->view('layouts/footer');
    }

    public function berita_acara(){
       $data['lv1'] = 6;
        $data['lv2'] = 1;
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->load->view('layouts/navbar', $data);
        $this->load->view('ba/v_berita_acara');
        $this->load->view('layouts/footer');
        
    }
    
    public function kpi_operasional(){
       $data['lv1'] = 6;
        $data['lv2'] = 1;
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->load->view('layouts/navbar', $data);
        $this->load->view('ba/v_kpi_operasional');
        $this->load->view('layouts/footer');
        
    }
    public function kpi_internal(){
       $data['lv1'] = 6;
        $data['lv2'] = 1;
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->load->view('layouts/navbar', $data);
        $this->load->view('ba/v_kpi_internal');
        $this->load->view('layouts/footer');
        
    }
    
    
}
