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
        $this->load->model("m_rencana_apms");
        $this->load->model("m_apms");
        $this->load->model("m_kpi");
        setlocale(LC_ALL, "IND");
        if(!$this->session->userdata('isLoggedIn') || $this->session->userdata('id_depot') > 0){
            redirect('login');
        }
    }

    public function grafik_bulan($id_depot,$tahun) {
        $data['lv1'] = $id_depot + 1;
        $data['lv2'] = 3;
        $data2 = menu_oam();
        $data3['id_depot'] = $id_depot;
        $data3['depot'] = $this->m_depot->get_depot();
        $data3['kpi_bulan'] = $this->m_kpi->nilai_kpi_perbulan($id_depot,$tahun);
        $data3['detail_kpi'] = $this->m_kpi->detail_kpi_perbulan($id_depot,$tahun);
        $data3['tahun'] = $tahun;
        $data3['nama_depot'] = $this->m_depot->get_nama_depot($id_depot);
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu',$data2);
        $this->navbar($data['lv1'], $data['lv2']);
        $this->load->view('oam/v_grafik_bulan',$data3);
        $this->load->view('layouts/footer');
    }
    
     public function grafik_apms_bulan($id_depot,$tahun) {
        $data['lv1'] = 1;
        $data['lv2'] = 1;
        $data2 = menu_oam();
        $data3['id_depot'] = $id_depot;
        $data3['depot'] = $this->m_depot->get_depot_apms();
        $data3['nama_depot'] = $this->m_depot->get_nama_depot($id_depot);
        $data3['tahun'] = $tahun;
        $data3['detail_kpi'] = $this->m_kpi->get_kpi_apms_bulanan($id_depot,$tahun);
        $data3['kpi_bulan'] = $this->m_kpi->nilai_kpi_apms_perbulan($id_depot,$tahun);
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu',$data2);
        $this->navbar($data['lv1'], $data['lv2']);
        $this->load->view('oam/v_grafik_apms_bulan',$data3);
        $this->load->view('layouts/footer');
    }
    public function changeGrafikApmsBulan() {
        $index = $_POST['indikator'];
        $tahun = $_POST['tahun'];
        $depot = $_POST['depot'];
        redirect('depot/grafik_apms_bulan/' . $depot.'/'.$tahun);
    }
    public function changeGrafikBulan() {
        $index = $_POST['indikator'];
        $tahun = $_POST['tahun'];
        $depot = $_POST['depot'];
        redirect('depot/grafik_bulan/' . $depot.'/'.$tahun);
    }

    public function grafik_hari($tipe,$id_depot,$bulan,$tahun) {
        $data['lv1'] = $id_depot + 1;
        $data['lv2'] = 3;
        $data2 = menu_oam();
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu',$data2);
        $data3['bulan'] = $bulan;
        $data3['tahun'] = $tahun;
        $data3['id_depot'] = $id_depot;
        $data3['depot'] = $this->m_depot->get_depot();
        $data3['kpi'] = $this->m_kpi->performance_kpi_perbulan($id_depot,$bulan,$tahun);
        $data3['nama_depot'] = $this->m_depot->get_nama_depot($id_depot);
        $this->navbar($data['lv1'], $data['lv2']);
        if ($tipe == 'ms2') {
            $data3['ms2'] = $this->m_kpi->ms2_oam($id_depot,$bulan,$tahun);
            $this->load->view('oam/v_grafik_ms2_harian',$data3);
        } else if ($tipe == 'volume') {
             $data3['volume'] = $this->m_kpi->volume_realisasi_oam($id_depot,$bulan,$tahun);
            $this->load->view('oam/v_grafik_volume_harian',$data3);
        }
        $this->load->view('layouts/footer');
    }
    
    public function ganti_kpi_harian($tipe)
    {
        $tanggal = $_POST['bulan'];
        $id_depot = $_POST['depot'];
        $bulan = date('n',strtotime($tanggal));
        $tahun = date('Y',strtotime($tanggal));
      redirect('depot/grafik_hari/' . $tipe.'/'.$id_depot.'/'.$bulan.'/'.$tahun.'/');
    }

    public function amt_tahun($depot)
    {
       $tahun =  $_POST['tahun'];
       $nama = $this->m_depot->get_nama_depot($depot);
       redirect('depot/amt_depot/'.$depot."/".$tahun);
    }
    
    public function amt_depot($depot,$tahun) {
         $nama = $this->m_depot->get_nama_depot($depot);
        $data['lv1'] = $depot + 1;
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

    public function amt_depot_harian($depot,$bulan,$tahun) {
        $nama = $this->m_depot->get_nama_depot($depot);
        $data['lv1'] = $depot + 1;
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
    
    
    public function ganti_detail_amt($depot)
    {
        $nama = $this->m_depot->get_nama_depot($depot);
        $tanggal = date("Y-m-d",strtotime($_POST['tanggal']));
        redirect("depot/amt_depot_detail/".$depot."/".$tanggal."/");
    }
    
     public function amt_depot_detail($depot,$tanggal) {
        $nama = $this->m_depot->get_nama_depot($depot);
        $data['lv1'] = $depot + 1;
        $data['lv2'] = 1;
        $data2['amt'] = $this->m_amt->selectAMT($depot);
        $data2['nama_depot'] = str_replace('%20', ' ', $nama);
        $data2['id_depot'] = $depot;
        $data2['hari'] = date('d',strtotime($tanggal));
        $data2['no_bulan'] = date('n',  strtotime($tanggal));
        $data2['bulan'] = strftime('%B',strtotime($tanggal));
        $data2['tahun'] = date('Y',strtotime($tanggal));;
        $data2['tanggal'] = strftime('%d %B %Y',strtotime($tanggal));
        $data2['kinerja'] = $this->m_kinerja->get_kinerja_amt_detail($depot , $tanggal);
        $data3 = menu_oam();
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu',$data3);
        $this->navbar($data['lv1'], $data['lv2']);
        $this->load->view('oam/v_depot_amt_detail_harian',$data2);
        $this->load->view('layouts/footer');
    }

    public function amt_hari($depot)
    {
       $nama = $this->m_depot->get_nama_depot($depot);
       $tanggal =  $_POST['bulan'];
       $bulan = date('n',strtotime($tanggal));
       $tahun = date('Y',strtotime($tanggal));
       redirect('depot/amt_depot_harian/'.$depot."/".$bulan."/".$tahun);
    }
    
    public function mt_tahun($depot)
    {
       $nama = $this->m_depot->get_nama_depot($depot);
       $tahun =  $_POST['tahun'];
       redirect('depot/mt_depot/'.$depot."/".$tahun);
    }
    
    public function mt_depot($depot,$tahun) {
        $nama = $this->m_depot->get_nama_depot($depot);
        $data['lv1'] = $depot + 1;
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
    
    public function mt_depot_harian($depot,$bulan,$tahun) {
        $nama = $this->m_depot->get_nama_depot($depot);
        $data['lv1'] = $depot + 1;
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
    
   
    public function ganti_detail_mt($depot)
    {
        $nama = $this->m_depot->get_nama_depot($depot);
        $tanggal = date("Y-m-d",strtotime($_POST['tanggal']));
        redirect("depot/mt_depot_detail/".$depot."/".$tanggal."/");
    }
    
    public function mt_depot_detail($depot,$tanggal) {
        $nama = $this->m_depot->get_nama_depot($depot);
        $data['lv1'] = $depot + 1;
        $data['lv2'] = 2;
        $data2['no_bulan'] = date('n',  strtotime($tanggal));
        $data2['hari'] = date('d',strtotime($tanggal));
        $data2['bulan_mt'] = strftime('%B',strtotime($tanggal));
        $data2['grafik'] = $this->m_kinerja->get_kinerja_mt_detail($depot , $tanggal);
        $data2['tahun'] = date('Y',strtotime($tanggal));;
        $data2['tanggal'] = strftime('%d %B %Y',strtotime($tanggal));
//        $data2['bulan'] = $bulan;
//        $data2['grafik'] = $this->m_kinerja->get_kinerja_mt_hari($depot, $bulan,$tahun);
        $data2['mt'] = $this->m_mt->selectMT($depot);
        $data2['id_depot'] = $depot;    
        $data2['nama_depot'] = str_replace('%20', ' ', $nama);
        
        $data3 = menu_oam();
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu',$data3);
        $this->navbar($data['lv1'], $data['lv2']);
        $this->load->view('oam/v_depot_mt_detail_harian',$data2);
        $this->load->view('layouts/footer');
    }
    
    public function mt_hari($depot)
    {
       $nama = $this->m_depot->get_nama_depot($depot);
       $tanggal =  $_POST['bulan'];
       $bulan = date('n',strtotime($tanggal));
       $tahun = date('Y',strtotime($tanggal));
       redirect('depot/mt_depot_harian/'.$depot."/".$bulan."/".$tahun);
    }
    
    public function apms_tahun($depot)
    {
       $tahun =  $_POST['tahun'];
       redirect('depot/apms_depot/'.$depot."/".$tahun);
    }
    
    public function apms_depot($depot,$tahun)
    {
       $nama = $this->m_depot->get_nama_depot($depot);
        $data['lv1'] = $depot + 1;
        $data['lv2'] = 5;
        $data2['tahun'] = $tahun;
        $data2['id_depot'] = $depot;    
        $data2['nama_depot'] = str_replace('%20', ' ', $nama);
        $data2['depot'] = $depot;
        $data2['grafik'] = $this->m_apms->get_grafik_tahun($depot, $tahun);
        $data2['grafik_max'] = $this->m_apms->get_max_bulan($depot, $tahun);
        $data2['grafik_kuota'] = $this->m_rencana_apms->get_grafik_tahun_kuota($depot, $tahun);
        $data3 = menu_oam();
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu',$data3);
        $this->navbar($data['lv1'], $data['lv2']);
        $this->load->view('oam/v_depot_apms',$data2);
        $this->load->view('layouts/footer');
    }
    
    public function apms_hari($depot)
    {
       $tanggal =  $_POST['bulan'];
       $bulan = date('n',strtotime($tanggal));
       $tahun = date('Y',strtotime($tanggal));
       redirect('depot/apms_depot_harian/'.$depot."/".$bulan."/".$tahun);
    }
    
    
    public function apms_depot_harian($depot,$bulan,$tahun) {
       $nama = $this->m_depot->get_nama_depot($depot);
        $data['lv1'] = $depot + 1;
        $data['lv2'] = 5;
        $data2['nama_depot'] = str_replace('%20', ' ', $nama);
        $data2['kinerja_amt'] = $this->m_kinerja->get_kinerja_amt_hari($depot, $bulan,$tahun);
        $data2['id_depot'] = $depot;
        $data2['tahun'] = $tahun;
        $data2['bulan'] = $bulan;
        $data2['grafik'] = $this->m_apms->get_grafik_bulan($depot,$bulan,$tahun);
        $data2['nama_bulan'] = strftime('%B',strtotime($tahun."-".$bulan."-01"));
        $data3 = menu_oam();
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu',$data3);
        $this->navbar($data['lv1'], $data['lv2']);
        $this->load->view('oam/v_depot_apms_harian',$data2);
        $this->load->view('layouts/footer');
    }
    
    
    public function ganti_detail_apms($depot)
    {
       $nama = $this->m_depot->get_nama_depot($depot);
        $tanggal = date("Y-m-d",strtotime($_POST['tanggal']));
        redirect("depot/apms_depot_detail/".$depot."/".$nama."/".$tanggal."/");
    }
    
    
     public function apms_depot_detail($depot,$tanggal) {
       $nama = $this->m_depot->get_nama_depot($depot);
        $data['lv1'] = $depot + 1;
        $data['lv2'] = 5;
        $hari = date('d',strtotime($tanggal));
        $bulan = date('n',strtotime($tanggal));
        $tahun =  date('Y',strtotime($tanggal));
        $data2['hari'] = $hari;
        $data2['bulan_apms'] = strftime('%B',strtotime($tanggal));
        $data2['tahun'] = $tahun;
        $data2['tanggal'] = strftime('%d %B %Y',strtotime($tanggal));
        $data2['mt'] = $this->m_mt->selectMT($depot);
        $data2['id_depot'] = $depot;    
        $data2['nama_depot'] = str_replace('%20', ' ', $nama);
        $data2['nama_bulan'] = strftime('%B',strtotime($tanggal));
        $data2['grafik'] = $this->m_apms->get_grafik_harian($depot ,$bulan,$hari,$tahun); 
        $data2['nama_apms'] = $this->m_apms->selectApms($depot);
        $data2['no_bulan'] = $bulan;
        $data3 = menu_oam();
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu',$data3);
        $this->navbar($data['lv1'], $data['lv2']);
        $this->load->view('oam/v_depot_apms_detail_harian',$data2);
        $this->load->view('layouts/footer');
    }
    
     public function kpi_internal($depot) {
         $this->load->model('m_laporan');
        $tahun = date('Y');
        $bulan = date('m');
        $jenis = 'Triwulan I';
        if ($bulan <= 12) {
            $jenis = 'Triwulan IV';
        } else if ($bulan <= 9) {
            $jenis = 'Triwulan III';
        } else if ($bulan <= 6) {
            $jenis = 'Triwulan II';
        } else if ($bulan <= 3) {
            $jenis = 'Triwulan I';
        }

        $data2['edit_kpi'] = false;

        if ($this->input->post('cek')) {
            $tahun = $this->input->post('tahun');
            $jenis = $this->input->post('jenis');
        } else if ($this->input->post('edit_triwulan')) {
            $tahun = $this->input->post('tahun');
            $jenis = $this->input->post('jenis');
            $id = $this->input->post('id_kpi_internal');
            $edit_bobot = $this->input->post('edit_bobot');
            $edit_base = $this->input->post('edit_base');
            $edit_stretch = $this->input->post('edit_stretch');
            $edit_bulan1 = $this->input->post('edit_bulan1');
            $edit_bulan2 = $this->input->post('edit_bulan2');
            $edit_bulan3 = $this->input->post('edit_bulan3');
            $this->m_laporan->editKPIInternal($id, $jenis, $edit_bobot, $edit_base, $edit_stretch, $edit_bulan1, $edit_bulan2, $edit_bulan3);
            $this->m_laporan->InsertLogSistem($this->session->userdata('id_pegawai'), 'Ubah KPI Internal ' . $jenis . ' ' . $tahun, 'Edit');
            $data2['edit_kpi'] = true;
        } else if ($this->input->post('sinkron')) {
            $tahun = $this->input->post('tahun');
            $jenis = $this->input->post('jenis');
            $this->m_laporan->SyncKPIInternal($depot, $tahun,$jenis);
        }

        $data2['tahun_kpi'] = $tahun;
        $data2['jenis_kpi'] = $jenis;

        $bulan_awal = 1;
        $bulan_akhir = 1;
        if ($jenis == "Triwulan I") {
            $bulan_awal = 1;
            $bulan_akhir = 3;
        } else if ($jenis == "Triwulan II") {
            $bulan_awal = 4;
            $bulan_akhir = 6;
        } else if ($jenis == "Triwulan III") {
            $bulan_awal = 7;
            $bulan_akhir = 9;
        } else if ($jenis == "Triwulan IV") {
            $bulan_awal = 10;
            $bulan_akhir = 12;
        }

        $data2['status_ada_kpi'] = $this->m_laporan->cetKPIInternal($tahun, $depot, $bulan_awal, $bulan_akhir);
        if ($data2['status_ada_kpi'] > 0) {
            $data2['data_kpi'] = $this->m_laporan->getKPIInternal($tahun, $depot);
        }
        $nama = $this->m_depot->get_nama_depot($depot);
        $data2['nama_depot'] = str_replace('%20', ' ', $nama);
        $data2['id_depot'] = $depot;

        $data['lv1'] = $depot + 1;
        $data['lv2'] = 4;
        $data3 = menu_oam();
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu',$data3);
        $this->navbar($data['lv1'], $data['lv2']);

        $this->load->view('oam/v_kpi_internal_depot', $data2);
        $this->load->view('layouts/footer');
    }
    
    public function navbar($lv1, $lv2) {
        $data['lv1'] = $lv1;
        $data['lv2'] = $lv2;
        $data['depot'] = $this->m_depot->get_depot();
        $this->load->view('layouts/navbar_oam', $data);
    }

}
