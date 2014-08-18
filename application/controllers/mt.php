<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mt extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model("m_apar");
    }

    public function index() {
        
    }

    public function data_mt() {

        $data['lv1'] = 3;
        $data['lv2'] = 1;
        $this->header($data);
        $this->load->view('mt/v_data_mt');
        $this->footer();
    }

    public function grafik_mt() {

        $data['lv1'] = 3;
        $data['lv2'] = 2;
        $this->header($data);
        $this->load->view('mt/v_grafik_mt');
        $this->footer();
    }

    public function grafik_bulan_mt() {

        $data['lv1'] = 3;
        $data['lv2'] = 2;
        $this->header($data);
        $this->load->view('mt/v_grafik_bulan_mt');
        $this->footer();
    }

    public function grafik_hari_mt() {

        $data['lv1'] = 3;
        $data['lv2'] = 2;
        $this->header($data);
        $this->load->view('mt/v_grafik_hari_mt');
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

    public function surat_mt() {
        $data['lv1'] = 3;
        $data['lv2'] = 1;
        $this->header($data);
        $this->load->view('mt/v_surat_mt');
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
        //data reminder
        $data2['apar'] = $this->m_apar->getAparReminder()->result();
        $this->header($data);
        $this->load->view('mt/v_pengingat', $data2);
        $this->footer();
    }

    public function rencana() {

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

    //OAM
    public function oam_bulanan() {
        $data['lv1'] = 1;
        $data['lv2'] = 1;
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->load->view('layouts/navbar_oam', $data);
        $this->load->view('oam/v_grafik_mt_bulan');
        $this->load->view('layouts/footer');
    }

    public function oam_harian() {
        $data['lv1'] = 1;
        $data['lv2'] = 1;
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->load->view('layouts/navbar_oam', $data);
        $this->load->view('oam/v_grafik_mt_hari');
        $this->load->view('layouts/footer');
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */