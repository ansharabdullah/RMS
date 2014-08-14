<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Log extends CI_Controller {

    public function index() {
        $data['lv1'] = 7;
        $data['lv2'] = 1;
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->load->view('layouts/navbar',$data);
        $this->load->view('log/v_log');
        $this->load->view('layouts/footer');

    }

    

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */