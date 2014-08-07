<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class home extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->home();
    }
    
    public function home(){
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->load->view('layouts/navbar');
        $this->load->view('home/v_home');
        $this->load->view('layouts/footer');
    }

}
