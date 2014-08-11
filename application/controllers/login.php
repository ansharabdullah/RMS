<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class login extends CI_Controller {

    public function index() {
        $this->login();
    }

    public function login() {
        $this->load->view('layouts/header');
        $this->load->view('login/v_login');
    }

}
