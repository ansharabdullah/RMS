<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class laporan_sebelum extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $data['lv1'] = 7;
        $data['lv2'] = 1;
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->load->view('layouts/navbar',$data);
        $this->load->view('laporan/v_laporan');
        $this->load->view('layouts/footer');
    }


        
    
    
    
    

}
