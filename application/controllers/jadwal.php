<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class jadwal extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->penjadwalan();
    }
    
    public function penjadwalan(){
        $data['lv1'] = 5;
        $data['lv2'] = 1;
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->load->view('layouts/navbar',$data);
        $this->load->view('jadwal/v_jadwal');
        $this->load->view('layouts/footer');
    }

}
