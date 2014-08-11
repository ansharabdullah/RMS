<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class user extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $data['lv1'] = 0;
        $data['lv2'] = 0;
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->load->view('layouts/navbar', $data);
        $this->load->view('profile/v_profile');
        $this->load->view('layouts/footer');
    }

}
