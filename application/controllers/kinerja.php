<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class kinerja extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $data['lv1'] = 4;
        $data['lv2'] = 1;
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->load->view('layouts/navbar', $data);
        $this->load->view('kinerja/v_kinerja_siod');
        $this->load->view('layouts/footer');
    }

    public function manual() {
        $data['lv1'] = 4;
        $data['lv2'] = 1;
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->load->view('layouts/navbar', $data);
        $this->load->view('kinerja/v_kinerja_manual');
        $this->load->view('layouts/footer');
    }

}
