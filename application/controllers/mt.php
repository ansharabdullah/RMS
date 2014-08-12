<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mt extends CI_Controller {

    public function index() {
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
    
    public function tambah_mt() {

        $data['lv1'] = 3;
        $data['lv2'] = 1;
         $this->header($data);
        $this->load->view('mt/v_tambah_mt');
        $this->footer();
    }
    
    public function import_csv() {

        $data['lv1'] = 3;
        $data['lv2'] = 1;
        $this->header($data);
        $this->load->view('mt/v_import_csv');
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
         $data['lv1'] = 3;
        $data['lv2'] = 1;
        $this->header($data);
        $this->load->view('mt/v_oli_mt');
        $this->footer();
    }
   
    public function presensi() {
        $data['lv1'] = 3;
        $data['lv2'] = 3;
        $this->header($data);
        $this->load->view('mt/v_presensi');
        $this->footer();
    }
    
    public function reminder() {
        $data['lv1'] = 3;
        $data['lv2'] = 4;
        $this->header($data);
        $this->load->view('mt/v_pengingat');
        $this->footer();
    }
    
    public function rencana()
    {
        
        $data['lv1'] = 3;
        $data['lv2'] = 5;
        $this->header($data);
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