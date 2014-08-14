<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Depot extends CI_Controller {

    function __construct() {
        parent::__construct();
    }
    
    public function grafik_bulan()
    {
        $data['lv1'] = 1;
        $data['lv2'] = 1;
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->load->view('layouts/navbar_oam',$data);
        $this->load->view('oam/v_grafik_depot_bulanan');
        $this->load->view('layouts/footer');
        
    }
    
    public function grafik_hari()
    {
        
        $data['lv1'] = 1;
        $data['lv2'] = 1;
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->load->view('layouts/navbar_oam',$data);
        $this->load->view('oam/v_grafik_depot_harian');
        $this->load->view('layouts/footer');
    }

}
