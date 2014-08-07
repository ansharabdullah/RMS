<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mt extends CI_Controller {

    public function index() {
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->load->view('layouts/navbar');
        $this->load->view('testing/page');
        $this->load->view('layouts/footer');
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

    public function laporan() {
        $this->header();
        $this->load->view('mt/v_laporan');
        $this->footer();
    }

    public function pengingat() {
        $this->header();
        $this->load->view('mt/v_pengingat');
        $this->footer();
    }

    public function data_mt() {

        $this->header();
        $this->load->view('mt/v_data_mt');
        $this->footer();
    }

    public function detail_mt() {

         $this->header();
        $this->load->view('mt/v_detail_mt');
        $this->footer();
    }
    
    public function import_sv() {
        $this->header();
        $this->load->view('mt/v_import_sv');
        $this->footer();
    }

    public function apar_mt() {
        $this->header();
        $this->load->view('mt/v_apar_mt');
        $this->footer();
    }
    public function ban_mt() {
        $this->header();
        $this->load->view('mt/v_ban_mt');
        $this->footer();
    }

    private function header() {
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->load->view('layouts/navbar');
    }

    private function footer() {

        $this->load->view('layouts/footer');
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */