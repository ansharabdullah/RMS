<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class kinerja extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->load->view('layouts/navbar');
        $this->load->view('kinerja/v_kinerja_siod');
        $this->load->view('layouts/footer');
    }
    
    public function manual() {
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->load->view('layouts/navbar');
        $this->load->view('kinerja/v_kinerja_manual');
        $this->load->view('layouts/footer');
    }


        
    
    
    
    

}
