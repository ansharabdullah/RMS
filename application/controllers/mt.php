<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mt extends CI_Controller {

    public function index() {
    }

    public function kinerja_manual() {
        $this->header();
        $this->load->view('mt/v_kinerja_manual');
        $this->footer();
    }

    public function kinerja_siod() {
        $this->header();
        $this->load->view('mt/v_kinerja_siod');
        $this->footer();
    }
    
    public function data_mt() {

        $data['lv1'] = 3;
        $data['lv2'] = 1;
        $this->header($data);
        $this->load->view('mt/v_data_mt');
        $this->footer();
    }
    
    public function grafik(){
        
        $data['lv1'] = 3;
        $data['lv2'] = 2;
        $this->header($data);
        $this->load->view('amt/v_grafik');
        $this->footer();
    }

    public function detail_mt() {

        $data['lv1'] = 3;
        $data['lv2'] = 1;
         $this->header($data);
        $this->load->view('mt/v_detail_mt');
        $this->footer();
    }
    
    public function import_sv() {
        
        $data['lv1'] = 3;
        $data['lv2'] = 1;
        $this->header($data);
        $this->load->view('mt/v_import_sv');
        $this->footer();
    }

    public function apar_mt() {
        $data['lv1'] = 3;
        $data['lv2'] = 1;
        $this->header($data);
        $this->load->view('mt/v_apar_mt');
        $this->footer();
    }
    public function ban_mt() {
        
        $data['lv1'] = 3;
        $data['lv2'] = 1;
        $this->header($data);
        $this->load->view('mt/v_ban_mt');
        $this->footer();
    }
     public function oli_mt() {
        $this->header();
        $this->load->view('mt/v_oli_mt');
        $this->footer();
    }

    public function laporan() {
        $this->header();
        $this->load->view('mt/v_laporan');
        $this->footer();
    }
    
    public function pengingat() {
        $data['lv1'] = 3;
        $data['lv2'] = 4;
        $this->header($data);
        $this->load->view('mt/v_pengingat');
        $this->footer();
    }
    
    public function rencana()
    {
        $this->header();
        $this->load->view('mt/v_rencana');
        $this->footer();
        
    }

    private function header($data) {
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->load->view('layouts/navbar', $data);
    }

    private function footer() {

        $this->load->view('layouts/footer');
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */