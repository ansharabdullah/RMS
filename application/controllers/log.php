<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Log extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_log_sistem');
    }
    
    public function index() {
        $data['lv1'] = 8;
        $data['lv2'] = 1;
        $data2['log'] = $this->m_log_sistem->getAllLog();
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->load->view('layouts/navbar',$data);
        $this->load->view('log/v_log',$data2);
        $this->load->view('layouts/footer');

    }

    

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */