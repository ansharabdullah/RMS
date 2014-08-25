<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Depot extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model("m_mt");
        $this->load->model("m_amt");
        $this->load->helper('form');
        $this->load->model("m_depot");
        $this->load->model("m_kinerja");
        $this->load->model("m_rencana");
    }

    public function grafik_bulan($index) {
        $data['lv1'] = 1;
        $data['lv2'] = 1;
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->navbar($data['lv1'], $data['lv2']);
        $this->load->view('oam/v_header_grafik_bulan');
        if ($index == 1) {
            $this->load->view('oam/v_grafik_ms2_bulanan');
        } else if ($index == 2) {
            $this->load->view('oam/v_grafik_voluime_bulanan');
        } else {
            switch ($index) {
                case 3:
                    $title = "Laporan tagihan ongkos angkut";
                    $color = "#CF2727";
                    break;
                case 4:
                    $title = "Customer  Satisfaction (Lembaga Penyalur)";
                    $color = "#9085D6";
                    break;
                case 5:
                    $title = "Jumlah temuan, keluhan atau komplain terkait pengelolaan MT";
                    $color = "#0A356E";
                    break;
                case 6:
                    $title = "Tindak lanjut penyelesaian keluhan atau komplain yang diterima";
                    $color = "#0D8082";
                    break;
                case 7:
                    $title = "Jumlah pekerja pengelola MT  yang mengikuti pelatihan";
                    $color = "#279C67";
                    break;
                case 8:
                    $title = "Number of Incidents";
                    $color = "#5BC44D";
                    break;
                case 9:
                    $title = "Waktu penyelesaian Incidents";
                    $color = "#E3C852";
                    break;
                case 10:
                    $title = "Number of Accident";
                    $color = "#DB6435";
                    break;
            }
            $data = array("title" => $title, "color" => $color);
            $this->load->view('oam/v_grafik_depot_bulanan', $data);
        }
        $this->load->view('oam/v_footer_grafik_bulan');
        $this->load->view('layouts/footer');
    }

    public function changeGrafikBulan() {
        $index = $_POST['indikator'];
        $tahun = $_POST['tahun'];
        $depot = $_POST['depot'];
        redirect('depot/grafik_bulan/' . $index);
    }

    public function grafik_hari($index) {

        $data['lv1'] = 1;
        $data['lv2'] = 1;
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->navbar($data['lv1'], $data['lv2']);
        $this->load->view('oam/v_header_grafik_harian');
        if ($index == 1) {
            $this->load->view('oam/v_grafik_ms2_harian');
        } else if ($index == 2) {
            $this->load->view('oam/v_grafik_volume_harian');
        }
        $this->load->view('layouts/footer');
    }

    public function amt_depot($depot,$nama) {
        $data['lv1'] = $depot;
        $data['lv2'] = 1;
        $data2['total_mt'] = $this->m_mt->getTotalMtByDepot($depot);
        $data2['total_amt'] = $this->m_amt->getTotalAMtByDepot($depot);
        $data2['nama_depot'] = str_replace('%20', ' ', $nama);
        $data2['rencana_bulan'] = $this->m_rencana->get_rencana_bulan($depot, date("n"), date("Y"));
        $data2['kinerja_bulan'] = $this->m_kinerja->get_kinerja_bulan($depot, date("n"), date("Y"));
        $data2['amt'] = $this->m_amt->selectAMT($depot);
        $data2['kinerja_amt'] = $this->m_kinerja->get_kinerja_amt_bulan($depot, date("Y"));
        $data2['id_depot'] = $depot;    
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->navbar($data['lv1'], $data['lv2']);
        $this->load->view('oam/v_depot_amt', $data2);
        $this->load->view('layouts/footer');
    }

    public function amt_depot_harian($depot,$nama,$bulan,$tahun) {
        $data['lv1'] = $depot;
        $data['lv2'] = 1;
        $data2['nama_depot'] = str_replace('%20', ' ', $nama);
        $data2['kinerja_amt'] = $this->m_kinerja->get_kinerja_amt_hari($depot, $bulan,$tahun);
        $data2['id_depot'] = $depot;
        $data2['tahun'] = $tahun;
        $data2['bulan'] = $bulan;

        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->navbar($data['lv1'], $data['lv2']);
        $this->load->view('oam/v_depot_amt_harian',$data2);
        $this->load->view('layouts/footer');
    }

    public function mt_depot($depot,$nama) {
        $data['lv1'] = $depot;
        $data['lv2'] = 2;

        $data2['mt'] = $this->m_mt->selectMT($depot);
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->navbar($data['lv1'], $data['lv2']);
        $this->load->view('oam/v_depot_mt',$data2);
        $this->load->view('layouts/footer');
    }

    public function mt_depot_harian($depot) {
        $data['lv1'] = $depot;
        $data['lv2'] = 2;

        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->navbar($data['lv1'], $data['lv2']);
        $this->load->view('oam/v_depot_mt_harian');
        $this->load->view('layouts/footer');
    }

    public function navbar($lv1, $lv2) {
        $data['lv1'] = $lv1;
        $data['lv2'] = $lv2;
        $data['depot'] = $this->m_depot->get_depot();
        $this->load->view('layouts/navbar_oam', $data);
    }

}
