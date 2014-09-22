<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class kpi extends CI_Controller {

    var $level1;
    
    function __construct() {
        parent::__construct();
        $this->load->model("m_depot");
        $this->load->model("m_kinerja");
        $this->load->model('m_kpi');
        $this->load->model("m_rencana");
        $this->load->model("m_log_harian");
        $this->load->helper('form');
        $this->level1 = $this->m_depot->get_total_depot() + 2;
       
    }

    public function index() {
        
    }

    public function operasional() {

        $data['lv1'] = $this->level1;
        $data['lv2'] = 1;
        $data2 = menu_oam();
        $data3['kpi'] = $this->m_kpi->kpi_pertahun();
        $data3['depot'] = $this->m_depot->get_depot();
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu',$data2);
        $this->navbar($data['lv1'],$data['lv2']);
        $this->load->view("oam/v_kpi_operasional",$data3);
        $this->load->view('layouts/footer');
    }
    
     public function changeGrafikBulan() {
        $index = $_POST['indikator'];
        $tahun = $_POST['tahun'];
        $depot = $_POST['depot'];
        redirect('kpi/operasional_bulan/' . $depot.'/'.$tahun);
    }

    public function operasional_bulan($id_depot,$tahun) {
        $data['lv1'] = $this->level1;
        $data['lv2'] = 1;
        $data2 = menu_oam();
        $data3['id_depot'] = $id_depot;
        $data3['depot'] = $this->m_depot->get_depot();
        $data3['kpi_bulan'] = $this->m_kpi->nilai_kpi_perbulan($id_depot,$tahun);
        $data3['detail_kpi'] = $this->m_kpi->detail_kpi_perbulan($id_depot,$tahun);
        $data3['tahun'] = $tahun;
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu',$data2);
        $this->navbar($data['lv1'], $data['lv2']);
        $this->load->view('oam/v_kpi_operasional_bulan',$data3);
        $this->load->view('layouts/footer');
    }
    
    public function ganti_kpi_harian($tipe)
    {
        $tanggal = $_POST['bulan'];
        $id_depot = $_POST['depot'];
        $bulan = date('n',strtotime($tanggal));
        $tahun = date('Y',strtotime($tanggal));
      redirect('kpi/operasional_depot/' . $tipe.'/'.$id_depot.'/'.$bulan.'/'.$tahun.'/');
    }
    
    public function operasional_depot($tipe,$id_depot,$bulan,$tahun) {
        $data['lv1'] = $this->level1;
        $data['lv2'] = 1;
        $data2 = menu_oam();
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu',$data2);
        $data3['bulan'] = $bulan;
        $data3['tahun'] = $tahun;
        $data3['depot'] = $this->m_depot->get_depot();
        $data3['kpi'] = $this->m_kpi->performance_kpi_perbulan($id_depot,$bulan,$tahun);
        $this->navbar($data['lv1'], $data['lv2']);
        if ($tipe == 'ms2') {
            $data3['ms2'] = $this->m_kpi->ms2_oam($id_depot,$bulan,$tahun);
            $this->load->view('oam/v_kpi_ms2_harian',$data3);
        } else if ($tipe == 'volume') {
             $data3['volume'] = $this->m_kpi->volume_realisasi_oam($id_depot,$bulan,$tahun);
            $this->load->view('oam/v_kpi_volume_harian',$data3);
        }
        $this->load->view('layouts/footer');
    }
    
    
    public function internal()
    {
        $data['lv1'] = $this->level1;
        $data['lv2'] = 2;
        $data2 = menu_oam();
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu',$data2);
        $this->navbar($data['lv1'],$data['lv2']);
        $this->load->view("oam/v_kpi_internal_oam");
        $this->load->view('layouts/footer');
    }
    
    public function internal_input()
    {
        $data['lv1'] = $this->level1;
        $data['lv2'] = 2;
        $data2 = menu_oam();
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu',$data2);
        $this->navbar($data['lv1'],$data['lv2']);
        $this->load->view("oam/v_input_kpi_internal_oam");
        $this->load->view('layouts/footer');
    }
    
    
    public function navbar($lv1,$lv2)
    {
        $data['lv1'] = $lv1;
        $data['lv2'] = $lv2;
        $data['depot'] = $this->m_depot->get_depot();
        $this->load->view('layouts/navbar_oam', $data);
    }


}
