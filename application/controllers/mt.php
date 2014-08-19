<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mt extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model("m_mt");
        $this->load->model("m_apar");
    }

    public function index() {
        $this->data_mt();

        
    }

    public function data_mt() {

        $depot = 1;
        $data1['mt'] = $this->m_mt->selectMT($depot);

        $data['lv1'] = 3;
        $data['lv2'] = 1;
        $this->header($data);
        $this->load->view('mt/v_data_mt', $data1);
        $this->footer();
    }


    public function detail_mt($id_mobil) {


        $data['lv1'] = 3;
        $data['lv2'] = 1;
        $data1['mt'] = $this->m_mt->detailMT($id_mobil);
        $this->header($data);
        $this->load->view('mt/v_detail_mt', $data1);
        $this->footer();
    }


    public function edit_mobil($id_mobil) {

        $id = $this->input->post('id', true);
        $data = array(
            'nopol' => $this->input->post('nopol', true),
            'kapasitas' => $this->input->post('kapasitas', true),
            'produk' => $this->input->post('produk', true),
            'transportir' => $this->input->post('transportir', true),
            'status_mobil' => $this->input->post('status_mobil', true),
            'no_mesin' => $this->input->post('no_mesin', true),
            'no_rangka' => $this->input->post('no_rangka', true),
            'jenis_kendaraan' => $this->input->post('jenis_kendaraan', true),
            'rasio' => $this->input->post('rasio', true),
            'jenis_tangki' => $this->input->post('jenis_tangki', true),
            'gps' => $this->input->post('gps', true),
            'sensor_overfill' => $this->input->post('sensor_overfill', true),
            'standar_volume' => $this->input->post('standar_volume', true),
            'volume_1' => $this->input->post('volume_1', true),
            'kategori_mobil' => $this->input->post('kategori_mobil', true),
            'jumlah_segel' => $this->input->post('jumlah_segel', true),
            'rk1_komp1' => $this->input->post('rk1_komp1', true),
            'rk1_komp2' => $this->input->post('rk1_komp2', true),
            'rk1_komp3' => $this->input->post('rk1_komp3', true),
            'rk1_komp4' => $this->input->post('rk1_komp4', true),
            'rk1_komp5' => $this->input->post('rk1_komp5', true),
            'rk1_komp6' => $this->input->post('rk1_komp6', true),
            'rk2_komp1' => $this->input->post('rk2_komp1', true),
            'rk2_komp2' => $this->input->post('rk2_komp2', true),
            'rk2_komp3' => $this->input->post('rk2_komp3', true),
            'rk2_komp4' => $this->input->post('rk2_komp4', true),
            'rk2_komp5' => $this->input->post('rk2_komp5', true),
            'rk2_komp6' => $this->input->post('rk2_komp6', true),
             'k_komp1' => $this->input->post('k1_komp1', true),
            'k_komp2' => $this->input->post('k1_komp2', true),
            'k_komp3' => $this->input->post('k1_komp3', true),
            'k_komp4' => $this->input->post('k1_komp4', true),
            'k_komp5' => $this->input->post('k1_komp5', true),
            'k_komp6' => $this->input->post('k1_komp6', true),
        );
        $this->m_mt->editMT($data, $id);

        echo '<script type="text/javascript">alert("Data berhasil diubah.");';
        echo 'window.location.href="' . base_url() . '"mt/detail_mt/"' . $id_mobil . '"';
        echo '</script>';
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
        
        $id_mobil = 1;
        $data1['mt'] = $this->m_mt->selectApar($id_mobil);
        
        $data['lv1'] = 3;
        $data['lv2'] = 1;
        $this->header($data);
        $this->load->view('mt/v_apar_mt',$data1);
        
        $this->footer();
    }

    public function ban_mt() {


        $id_mobil = 1;
        $data1['mt'] = $this->m_mt->selectBanMT($id_mobil);
        
        $data['lv1'] = 3;
        $data['lv2'] = 1;
        $this->header($data);
        $this->load->view('mt/v_ban_mt',$data1);
        $this->footer();
    }

    public function oli_mt() {

        
         $id_mobil = 1;
        $data1['mt'] = $this->m_mt->selectOli($id_mobil);
        
        $data['lv1'] = 3;
        $data['lv2'] = 1;
        $this->header($data);
        $this->load->view('mt/v_oli_mt',$data1);
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