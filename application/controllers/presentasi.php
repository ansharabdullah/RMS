<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class presentasi extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model("m_depot");
        $this->load->model("m_kpi");
        $this->load->model("m_kpi_oam");
        $this->load->model("m_internal");
        $this->load->model("m_amt");
        setlocale(LC_ALL, "IND");
         if(!$this->session->userdata('isLoggedIn')){
            redirect('login');
        }
    }

    public function index() {
        if($this->session->userdata('id_depot') < 0 )
        {
            $data['lv1'] = $this->m_depot->get_total_depot() + 3;
            $data['lv2'] = 1;
            $this->load->view('layouts/header');
            $data2 = menu_oam();
            $this->load->view('layouts/menu',$data2);
            $this->navbar($data['lv1'],$data['lv2']);
            $this->load->view("oam/presentasi/v_option");
            $this->load->view('layouts/footer');
        }
        else
        {
            $data['lv1'] = 8;
            $data['lv2'] = 1;
            $data3 = menu_ss();
            $this->load->view('layouts/header');
            $this->load->view('layouts/menu', $data3);
            $this->load->view('layouts/navbar', $data);
            $this->load->view('presentasi/v_option');
            $this->load->view('layouts/footer');
            
        }
    }

    public function set_slide()
    {
        $bulan = $_POST['bulan'];
        $tahun = $_POST['tahun'];
        redirect("presentasi/slide/0/".$tahun."/".$bulan);
        
    }
    
    public function slide($index,$tahun,$bulan) {
       
        if($this->session->userdata('id_depot') < 0 )
        {
            $this->slide_oam($index,$tahun,$bulan);
        }
        else
        {
            $this->slide_ss($index,$tahun,$bulan);
        }
    }
   
    public function slide_ss($index,$tahun,$bulan)
    {
        $depot = $this->session->userdata('id_depot');
        $data['lv1'] = 8;
        $data['lv2'] = 1;
        $data2 = menu_ss();
        $this->load->view('layouts/header');
        //$this->load->view('layouts/menu',$data2);
        //$this->navbar($data['lv1'],$data['lv2']);
        $before = anchor("presentasi/slide/".($index - 1)."/".$tahun."/".$bulan,"<button class='btn btn-danger'><i class='icon-long-arrow-left'></i> kembali</button>");
        $next = anchor("presentasi/slide/".($index + 1)."/".$tahun."/".$bulan,"<button class='btn btn-danger' style='float:right;'>selanjutnya <i class='icon-long-arrow-right'></i></button>");
        if($index == 11){ $next = ""; }
        $slide['paging'] = " <section class='panel'>
            <div class='panel-body'>".$before." ".$next."
            </div>
        </section>";
        $log_harian = $tahun."-".$bulan."-01";
        $slide['depot'] = $this->m_depot->get_depot();
        $slide['tahun'] = $tahun;
        $slide['triwulan'] = floor(($bulan / 3) + 1);
         if($slide['triwulan'] == 1)
        {
            $slide['triwulan'] = "I";
        }
        else if($slide['triwulan'] == 2)
        {
            $slide['triwulan'] = "II";
        }
        else if($slide['triwulan'] == 3)
        {
            $slide['triwulan'] = "III";
        }
        else 
        {
            $slide['triwulan'] = "IV";
        }
        $slide['log_harian'] = $log_harian;
        $slide['nama_depot'] = $this->m_depot->get_nama_depot($depot);
        $slide['bulan'] = array();
        array_push($slide['bulan'],strftime("%B", mktime(null, null, null, $bulan)));
        array_push($slide['bulan'],strftime("%B", mktime(null, null, null, $bulan + 1)));
        array_push($slide['bulan'],strftime("%B", mktime(null, null, null, $bulan + 2)));
        $this->load->view('presentasi/v_header');
        //pilih slide
        switch ($index){
            case 0:
                $slide['url'] = base_url()."presentasi/slide/1/".$tahun."/".$bulan;
                $this->load->view('presentasi/v_opening',$slide);
                break;
            case 1:
                $slide['kpi'] = $this->m_kpi->kpi_triwulan_depot($bulan,$depot);
                $this->load->view('presentasi/v_kpi_operasional',$slide);
                break;
            case 2:
                $slide['volume'] = $this->m_kpi->realisasi_volume_triwulan_depot($bulan,$depot);
                $this->load->view('presentasi/v_realisasi_thruput',$slide);
                break;
            case 3:
                $slide['ms2'] = $this->m_kpi->realisasi_ms2_triwulan_depot($bulan,$depot);
                $this->load->view('presentasi/v_ms2_compliance',$slide);
                break;
            case 4:
                $slide['data'] = $this->m_internal->get_kpi_internal_depot($log_harian,35,$depot);
                $slide['apms'] = $this->m_internal->get_kpi_internal_depot($log_harian,35,$depot);
                $this->load->view('presentasi/v_revenue',$slide);
                break;
            case 5:
                $slide['data'] = $this->m_internal->get_kpi_internal_depot($log_harian,37,$depot);
                $this->load->view('presentasi/v_laba_usaha',$slide);
                break;
            case 6:
                $slide['data'] = $this->m_internal->get_kpi_internal_depot($log_harian,40,$depot);
                $this->load->view('presentasi/v_cost_perliter',$slide);
                break;
            case 7:
                $slide['data'] = $this->m_internal->get_kpi_internal_depot($log_harian,48,$depot);
                $this->load->view('presentasi/v_thruput_kl',$slide);
                break;
            case 8:
                $slide['data'] = $this->m_internal->get_kpi_internal_depot($log_harian,51,$depot);
                $this->load->view('presentasi/v_pencapaian_ritase',$slide);
                break;
            case 9:
                $slide['data'] = $this->m_internal->get_kpi_internal_depot($log_harian,53,$depot);
                $this->load->view('presentasi/v_pencapaian_km',$slide);
                break;
            case 10:
                $slide['data'] = $this->m_internal->get_kpi_internal_depot($log_harian,62,$depot);
                $this->load->view('presentasi/v_breakdown_mt',$slide);
                break;
            case 11:
                $slide['data'] = $this->m_amt->get_persentase_kehadiran($depot,$tahun,$bulan);
                $this->load->view('presentasi/v_persentase_kehadiran',$slide);
                break;
            case 12:
                $this->load->view('presentasi/v_kendala',$slide);
                break;
        }
        if($index > 0)
        {
             $this->load->view('layouts/footer');
        }
    }
    
    public function slide_oam($index,$tahun,$bulan)
    {
        
        $data['lv1'] = $this->m_depot->get_total_depot() + 3;
        $data['lv2'] = 1;
        $data2 = menu_oam();
        $this->load->view('layouts/header');
        //$this->load->view('layouts/menu',$data2);
        //$this->navbar($data['lv1'],$data['lv2']);
        $before = anchor("presentasi/slide/".($index - 1)."/".$tahun."/".$bulan,"<button class='btn btn-danger'><i class='icon-long-arrow-left'></i> kembali</button>");
        $next = anchor("presentasi/slide/".($index + 1)."/".$tahun."/".$bulan,"<button class='btn btn-danger' style='float:right;'>selanjutnya <i class='icon-long-arrow-right'></i></button>");
        
        if($index == 11){ $next = ""; }
        $slide['paging'] = " <section class='panel'>
            <div class='panel-body'>".$before." ".$next."
            </div>
        </section>";
        $log_harian = $tahun."-".$bulan."-01";
        $slide['depot'] = $this->m_depot->get_depot();
        $slide['tahun'] = $tahun;
        $slide['triwulan'] = floor(($bulan / 3) + 1);
        if($slide['triwulan'] == 1)
        {
            $slide['triwulan'] = "I";
        }
        else if($slide['triwulan'] == 2)
        {
            $slide['triwulan'] = "II";
        }
        else if($slide['triwulan'] == 3)
        {
            $slide['triwulan'] = "III";
        }
        else 
        {
            $slide['triwulan'] = "IV";
        }
        $slide['log_harian'] = $log_harian;
        $slide['bulan'] = array();
        array_push($slide['bulan'],strftime("%B", mktime(null, null, null, $bulan)));
        array_push($slide['bulan'],strftime("%B", mktime(null, null, null, $bulan + 1)));
        array_push($slide['bulan'],strftime("%B", mktime(null, null, null, $bulan + 2)));
        $this->load->view('oam/presentasi/v_header');
        //pilih slide
        switch ($index){
            case 0:
                $slide['url'] = base_url()."presentasi/slide/1/".$tahun."/".$bulan;
                $this->load->view('oam/presentasi/v_opening',$slide);
                break;
            case 1:
                $slide['kpi'] = $this->m_kpi->kpi_triwulan($tahun,$bulan);
                $this->load->view('oam/presentasi/v_kpi_operasional',$slide);
                break;
            case 2:
                $slide['volume'] = $this->m_kpi->realisasi_volume_triwulan($tahun,$bulan);
                $this->load->view('oam/presentasi/v_realisasi_thruput',$slide);
                break;
            case 3:
                $slide['ms2'] = $this->m_kpi->realisasi_ms2_triwulan($tahun,$bulan);
                $this->load->view('oam/presentasi/v_ms2_compliance',$slide);
                break;
            case 4:
                $slide['rkap'] = $this->m_kpi_oam->get_rkap_oam($log_harian,31);
                $slide['data'] = $this->m_kpi_oam->get_kpi_internal_depot($log_harian,35);
                $this->load->view('oam/presentasi/v_revenue',$slide);
                break;
            case 5:
                $slide['rkap'] = $this->m_kpi_oam->get_rkap_oam($log_harian,32);
                $slide['data'] = $this->m_kpi_oam->get_kpi_internal_depot($log_harian,37);
                $this->load->view('oam/presentasi/v_laba_usaha',$slide);
                break;
            case 6:
                $slide['rkap'] = $this->m_kpi_oam->get_rkap_oam($log_harian,33);
                $slide['data'] = $this->m_kpi_oam->get_kpi_internal_depot($log_harian,40);
                $this->load->view('oam/presentasi/v_cost_perliter',$slide);
                break;
            case 7:
                $slide['rkap'] = $this->m_kpi_oam->get_rkap_oam($log_harian,34);
                $slide['data'] = $this->m_kpi_oam->get_kpi_internal_depot($log_harian,48);
                $this->load->view('oam/presentasi/v_thruput_kl',$slide);
                break;
            case 8:
                $slide['data'] = $this->m_kpi_oam->get_kpi_internal_depot($log_harian,51);
                $this->load->view('oam/presentasi/v_pencapaian_ritase',$slide);
                break;
            case 9:
                $slide['data'] = $this->m_kpi_oam->get_kpi_internal_depot($log_harian,53);
                $this->load->view('oam/presentasi/v_pencapaian_km',$slide);
                break;
            case 10:
                $slide['data'] = $this->m_kpi_oam->get_kpi_internal_depot($log_harian,62);
                $this->load->view('oam/presentasi/v_breakdown_mt',$slide);
                break;
            case 11:
                $slide['data'] = array();
                $depot = $this->m_depot->get_depot();
                foreach($depot as $d)
                {
                    $set = array();
                    array_push($set,$d->NAMA_DEPOT);
                    array_push($set,$this->m_amt->get_persentase_kehadiran($d->ID_DEPOT,$tahun,$bulan));
                
                    array_push($slide['data'],$set);
                }
                $this->load->view('oam/presentasi/v_persentase_kehadiran',$slide);
                break;
            case 12:
                $this->load->view('oam/presentasi/v_kendala',$slide);
                break;
        }
        if($index > 0)
        {
             $this->load->view('layouts/footer');
        }
    }
    
    public function navbar($lv1,$lv2)
    {
        $data['lv1'] = $lv1;
        $data['lv2'] = $lv2;
        $data['depot'] = $this->m_depot->get_depot();
        $this->load->view('layouts/navbar_oam', $data);
    }
    

}
