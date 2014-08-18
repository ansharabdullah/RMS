<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class amt extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model("m_amt");
    }

    public function index() {
        $this->data_amt();
    }

    public function data_amt() {
        $data['lv1'] = 2;
        $data['lv2'] = 1;
        $depot = 1;
        $data1['amt'] = $this->m_amt->selectAMT($depot);
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->load->view('layouts/navbar', $data);
        $this->load->view('amt/v_data_amt', $data1);
        $this->load->view('layouts/footer');
    }

    public function detail($id_pegawai) {
        $data['lv1'] = 2;
        $data['lv2'] = 1;
        $data1['amt'] = $this->m_amt->detailAMT($id_pegawai);
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->load->view('layouts/navbar', $data);
        $this->load->view('amt/v_detail', $data1);
        $this->load->view('layouts/footer');
    }

    public function edit_pegawai($id_pegawai) {

        $id = $this->input->post('id', true);
        $data = array(
            'nip' => $this->input->post('nip', true),
            'nama_pegawai' => $this->input->post('nama_pegawai', true),
            'jabatan' => $this->input->post('jabatan', true),
            'klasifikasi' => $this->input->post('klasifikasi', true),
            'status' => $this->input->post('status', true),
            'no_telepon' => $this->input->post('no_telepon', true),
            'no_ktp' => $this->input->post('no_ktp', true),
            'no_sim' => $this->input->post('no_sim', true),
            'tempat_lahir' => $this->input->post('tempat_lahir', true),
            'tanggal_lahir' => $this->input->post('tanggal_lahir', true),
            'transportir_asal' => $this->input->post('transportir_asal', true),
            'tanggal_masuk' => $this->input->post('tanggal_masuk', true),
            'photo' => $this->input->post('photo', true),
        );
        $this->m_amt->editPegawai($data, $id);
        $link = base_url()."amt/detail/".$id_pegawai;
        echo '<script type="text/javascript">alert("Data berhasil diubah.");';
        echo 'window.location.href="' . $link . '"';
        echo '</script>';
    }

    public function import_amt() {
        $data['lv1'] = 2;
        $data['lv2'] = 1;
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->load->view('layouts/navbar', $data);
        $this->load->view('amt/v_import_amt');
        $this->load->view('layouts/footer');
    }

    public function presensi() {
        $data['lv1'] = 2;
        $data['lv2'] = 3;

        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->load->view('layouts/navbar', $data);
        $this->load->view('amt/v_presensi');
        $this->load->view('layouts/footer');
    }

    public function koefisien() {
        $data['lv1'] = 2;
        $data['lv2'] = 4;

        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->load->view('layouts/navbar', $data);
        $this->load->view('amt/v_koefisien');
        $this->load->view('layouts/footer');
    }

    public function grafik() {
        $data['lv1'] = 2;
        $data['lv2'] = 2;
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->load->view('layouts/navbar', $data);
        $this->load->view('amt/v_grafik');
        $this->load->view('layouts/footer');
    }

    public function grafik_bulan() {
        $data['lv1'] = 2;
        $data['lv2'] = 2;
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->load->view('layouts/navbar', $data);
        $this->load->view('amt/v_grafik_bulan');
        $this->load->view('layouts/footer');
    }

    public function grafik_hari() {
        $data['lv1'] = 2;
        $data['lv2'] = 2;
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->load->view('layouts/navbar', $data);
        $this->load->view('amt/v_grafik_hari');
        $this->load->view('layouts/footer');
    }

}
