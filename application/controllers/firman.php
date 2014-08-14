<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class firman extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $data['lv1'] = 2;
        $data['lv2'] = 1;
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->load->view('layouts/navbar',$data);
        $this->load->view('firman/v_coba');
        $this->load->view('layouts/footer');
    }

    public function exsport() {
        $data['lv1'] = 2;
        $data['lv2'] = 1;
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->load->view('layouts/navbar',$data);
        $this->load->view('firman/v_coba');
        $this->load->view('layouts/footer');
    }
    
    
    
}
