<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Depot extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('form');
    }

    public function grafik_bulan($index) {
        $data['lv1'] = 1;
        $data['lv2'] = 1;
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->load->view('layouts/navbar_oam', $data);
        $this->load->view('oam/v_header_grafik_bulan');
        if($index == 1)
        {
            $this->load->view('oam/v_grafik_depot_bulanan');
        }
        else if($index == 2)
        {
            $this->load->view('oam/v_grafik_voluime_bulanan');
        }
        $this->load->view('oam/v_footer_grafik_bulan');
        $this->load->view('layouts/footer');
    }

    public function changeGrafikBulan()
    {
        $index = $_POST['indikator'];
        $tahun = $_POST['tahun'];
        $depot = $_POST['depot'];
        redirect('depot/grafik_bulan/'.$index);
    }
    
    public function grafik_hari() {

        $data['lv1'] = 1;
        $data['lv2'] = 1;
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->load->view('layouts/navbar_oam', $data);
        $this->load->view('oam/v_header_grafik_harian');
        $this->load->view('oam/v_grafik_depot_harian');
        $this->load->view('oam/v_footer_grafik_harian');
        $this->load->view('layouts/footer');
    }

    public function amt_depot($depot) {
        $data['lv1'] = $depot;
        $data['lv2'] = 1;
        
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->load->view('layouts/navbar_oam', $data);
        $this->load->view('oam/v_depot_amt');
        $this->load->view('layouts/footer');
    }
    
    public function amt_depot_harian($depot) {
        $data['lv1'] = $depot;
        $data['lv2'] = 1;
        
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->load->view('layouts/navbar_oam', $data);
        $this->load->view('oam/v_depot_amt_harian');
        $this->load->view('layouts/footer');
    }
    
    public function mt_depot($depot) {
        $data['lv1'] = $depot;
        $data['lv2'] = 1;
        
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->load->view('layouts/navbar_oam', $data);
        $this->load->view('oam/v_depot_mt');
        $this->load->view('layouts/footer');
    }
    
    public function mt_depot_harian($depot) {
        $data['lv1'] = $depot;
        $data['lv2'] = 1;
        
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->load->view('layouts/navbar_oam', $data);
        $this->load->view('oam/v_depot_mt_harian');
        $this->load->view('layouts/footer');
    }

}
