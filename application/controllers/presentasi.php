<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class presentasi extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model("m_depot");
        $this->load->model("m_kpi");
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
        redirect("presentasi/slide/1/".$bulan);
        
    }
    
    public function slide($index,$bulan) {
       
        if($this->session->userdata('id_depot') < 0 )
        {
            $this->slide_oam($index,$bulan);
        }
        else
        {
            $this->slide_ss($index,$bulan);
        }
    }
   
    public function slide_ss($index,$bulan)
    {
        $depot = $this->session->userdata('id_depot');
        $data['lv1'] = 8;
        $data['lv2'] = 1;
        $data2 = menu_ss();
        $this->load->view('layouts/header');
        //$this->load->view('layouts/menu',$data2);
        //$this->navbar($data['lv1'],$data['lv2']);
        $before = anchor("presentasi/slide/".($index - 1)."/".$bulan,"<button class='btn btn-danger'><i class='icon-long-arrow-left'></i> kembali</button>");
        $next = anchor("presentasi/slide/".($index + 1)."/".$bulan,"<button class='btn btn-danger' style='float:right;'>selanjutnya <i class='icon-long-arrow-right'></i></button>");
        if($index == 1){ $before = ""; }
        if($index == 11){ $next = ""; }
        $slide['paging'] = " <section class='panel'>
            <div class='panel-body'>".$before." ".$next."
            </div>
        </section>";
        $slide['depot'] = $this->m_depot->get_depot();
        $slide['nama_depot'] = $this->m_depot->get_nama_depot($depot);
        $slide['bulan'] = array();
        array_push($slide['bulan'],strftime("%B", mktime(null, null, null, $bulan)));
        array_push($slide['bulan'],strftime("%B", mktime(null, null, null, $bulan + 1)));
        array_push($slide['bulan'],strftime("%B", mktime(null, null, null, $bulan + 2)));
        $this->load->view('presentasi/v_header');
        //pilih slide
        switch ($index){
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
                $this->load->view('presentasi/v_revenue',$slide);
                break;
            case 5:
                $this->load->view('presentasi/v_laba_usaha',$slide);
                break;
            case 6:
                $this->load->view('presentasi/v_cost_perliter',$slide);
                break;
            case 7:
                $this->load->view('presentasi/v_thruput_kl',$slide);
                break;
            case 8:
                $this->load->view('presentasi/v_pencapaian_ritase',$slide);
                break;
            case 9:
                $this->load->view('presentasi/v_pencapaian_km',$slide);
                break;
            case 10:
                $this->load->view('presentasi/v_breakdown_mt',$slide);
                break;
            case 11:
                $this->load->view('presentasi/v_persentase_kehadiran',$slide);
                break;
            case 12:
                $this->load->view('presentasi/v_kendala',$slide);
                break;
        }
        $this->load->view('layouts/footer');
    }
    
    public function slide_oam($index,$bulan)
    {
        
        $data['lv1'] = $this->m_depot->get_total_depot() + 3;
        $data['lv2'] = 1;
        $data2 = menu_oam();
        $this->load->view('layouts/header');
        //$this->load->view('layouts/menu',$data2);
        //$this->navbar($data['lv1'],$data['lv2']);
        $next = anchor("presentasi/slide/".($index - 1)."/".$bulan,"<button class='btn btn-danger'><i class='icon-long-arrow-left'></i> kembali</button>");
        $before = anchor("presentasi/slide/".($index + 1)."/".$bulan,"<button class='btn btn-danger' style='float:right;'>selanjutnya <i class='icon-long-arrow-right'></i></button>");
        $slide['paging'] = " <section class='panel'>
            <div class='panel-body'>".$before." ".$next."
            </div>
        </section>";
        $slide['depot'] = $this->m_depot->get_depot();
        $slide['bulan'] = array();
        array_push($slide['bulan'],strftime("%B", mktime(null, null, null, $bulan)));
        array_push($slide['bulan'],strftime("%B", mktime(null, null, null, $bulan + 1)));
        array_push($slide['bulan'],strftime("%B", mktime(null, null, null, $bulan + 2)));
        $this->load->view('oam/presentasi/v_header');
        //pilih slide
        switch ($index){
            case 1:
                $slide['kpi'] = $this->m_kpi->kpi_triwulan($bulan);
                $this->load->view('oam/presentasi/v_kpi_operasional',$slide);
                break;
            case 2:
                $slide['volume'] = $this->m_kpi->realisasi_volume_triwulan($bulan);
                $this->load->view('oam/presentasi/v_realisasi_thruput',$slide);
                break;
            case 3:
                $slide['ms2'] = $this->m_kpi->realisasi_ms2_triwulan($bulan);
                $this->load->view('oam/presentasi/v_ms2_compliance',$slide);
                break;
            case 4:
                $this->load->view('oam/presentasi/v_revenue',$slide);
                break;
            case 5:
                $this->load->view('oam/presentasi/v_laba_usaha',$slide);
                break;
            case 6:
                $this->load->view('oam/presentasi/v_cost_perliter',$slide);
                break;
            case 7:
                $this->load->view('oam/presentasi/v_thruput_kl',$slide);
                break;
            case 8:
                $this->load->view('oam/presentasi/v_pencapaian_ritase',$slide);
                break;
            case 9:
                $this->load->view('oam/presentasi/v_pencapaian_km',$slide);
                break;
            case 10:
                $this->load->view('oam/presentasi/v_breakdown_mt',$slide);
                break;
            case 11:
                $this->load->view('oam/presentasi/v_persentase_kehadiran',$slide);
                break;
            case 12:
                $this->load->view('oam/presentasi/v_kendala',$slide);
                break;
        }
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
