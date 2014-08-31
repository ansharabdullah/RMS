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

    public function grafik_bulan() {
        $data['lv1'] = 1;
        $data['lv2'] = 1;
        $data2 = menu_oam();
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu',$data2);
        $this->navbar($data['lv1'], $data['lv2']);
        $this->load->view('oam/v_grafik_bulan');
        $this->load->view('layouts/footer');
    }

    public function changeGrafikBulan() {
        $index = $_POST['indikator'];
        $tahun = $_POST['tahun'];
        $depot = $_POST['depot'];
        redirect('depot/grafik_bulan/' . $index);
    }

    public function grafik_hari($tipe,$index,$id_depot) {

        $data['lv1'] = 1;
        $data['lv2'] = 1;
        $data2 = menu_oam();
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu',$data2);
        $this->navbar($data['lv1'], $data['lv2']);
        if ($tipe == 'ms2') {
            $this->load->view('oam/v_grafik_ms2_harian');
        } else if ($tipe == 'volume') {
            $this->load->view('oam/v_grafik_volume_harian');
        }
        $this->load->view('layouts/footer');
    }

    public function amt_depot($depot,$nama,$tahun) {
        $data['lv1'] = $depot;
        $data['lv2'] = 1;
        $data2['tahun'] = $tahun;
        $data2['total_mt'] = $this->m_mt->getTotalMtByDepot($depot);
        $data2['total_amt'] = $this->m_amt->getTotalAMtByDepot($depot);
        $data2['nama_depot'] = str_replace('%20', ' ', $nama);
        $data2['rencana_bulan'] = $this->m_rencana->get_rencana_bulan($depot, date("n"), date("Y"));
        $data2['kinerja_bulan'] = $this->m_kinerja->get_kinerja_bulan($depot, date("n"), date("Y"));
        $data2['amt'] = $this->m_amt->selectAMT($depot);
        $data2['kinerja_amt'] = $this->m_kinerja->get_kinerja_amt_bulan($depot, $tahun);
        $data2['id_depot'] = $depot;    
        $data3 = menu_oam();
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu',$data3);
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

        $data3 = menu_oam();
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu',$data3);
        $this->navbar($data['lv1'], $data['lv2']);
        $this->load->view('oam/v_depot_amt_harian',$data2);
        $this->load->view('layouts/footer');
    }

    public function amt_hari($depot,$nama)
    {
       $tanggal =  $_POST['bulan'];
       $bulan = date('n',strtotime($tanggal));
       $tahun = date('Y',strtotime($tanggal));
       redirect('depot/amt_depot_harian/'.$depot."/".$nama."/".$bulan."/".$tahun);
    }
    
    public function mt_depot($depot,$nama,$tahun) {
        $data['lv1'] = $depot;
        $data['lv2'] = 2;
        $data2['tahun'] = $tahun;
        $data2['kinerja_mt'] = $this->m_kinerja->get_kinerja_mt_bulan($depot, $tahun);
        $data2['mt'] = $this->m_mt->selectMT($depot);
        $data2['id_depot'] = $depot;    
        $data2['total_mt'] = $this->m_mt->getTotalMtByDepot($depot);
        $data2['total_amt'] = $this->m_amt->getTotalAMtByDepot($depot);
        $data2['nama_depot'] = str_replace('%20', ' ', $nama);
        $data2['rencana_bulan'] = $this->m_rencana->get_rencana_bulan($depot, date("n"), date("Y"));
        $data2['kinerja_bulan'] = $this->m_kinerja->get_kinerja_bulan($depot, date("n"), date("Y"));
        
        $data3 = menu_oam();
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu',$data3);
        $this->navbar($data['lv1'], $data['lv2']);
        $this->load->view('oam/v_depot_mt',$data2);
        $this->load->view('layouts/footer');
    }
   
    public function mt_depot_harian($depot,$nama,$bulan,$tahun) {
        $data['lv1'] = $depot;
        $data['lv2'] = 2;

        $data2['tahun'] = $tahun;
        $data2['bulan'] = $bulan;
        $data2['kinerja_mt'] = $this->m_kinerja->get_kinerja_mt_hari($depot, $bulan,$tahun);
        $data2['mt'] = $this->m_mt->selectMT($depot);
        $data2['id_depot'] = $depot;    
        $data2['nama_depot'] = str_replace('%20', ' ', $nama);
        
        $data3 = menu_oam();
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu',$data3);
        $this->navbar($data['lv1'], $data['lv2']);
        $this->load->view('oam/v_depot_mt_harian',$data2);
        $this->load->view('layouts/footer');
    }
    
    public function mt_hari($depot,$nama)
    {
       $tanggal =  $_POST['bulan'];
       $bulan = date('n',strtotime($tanggal));
       $tahun = date('Y',strtotime($tanggal));
       redirect('depot/mt_depot_harian/'.$depot."/".$nama."/".$bulan."/".$tahun);
    }
    public function navbar($lv1, $lv2) {
        $data['lv1'] = $lv1;
        $data['lv2'] = $lv2;
        $data['depot'] = $this->m_depot->get_depot();
        $this->load->view('layouts/navbar_oam', $data);
    }

}
