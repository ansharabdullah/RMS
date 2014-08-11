<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mt extends CI_Controller {

    public function index() {
        
    }

    public function login() {
        $this->load->view('layouts/header');
        $this->load->view('login/v_login');
    }

}
