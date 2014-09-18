<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Log extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_log_sistem');
        $this->load->model('m_depot');
    }

    public function index() {
        $id_depot = $this->session->userdata('id_depot');
        if ($id_depot == -1) {
            $data['lv1'] = 11;
            $data['lv2'] = 1;
            $data2 = menu_oam();
            $data3['log'] = $this->m_log_sistem->getLogOam();
            $this->load->view('layouts/header');
            $this->load->view('layouts/menu', $data2);
            $this->navbar($data['lv1'], $data['lv2']);
            $this->load->view('log/v_log_oam', $data3);
            $this->load->view('layouts/footer');
        } else {
            $data2['log'] = $this->m_log_sistem->getAllLog($id_depot);
            $data['lv1'] = 8;
            $data['lv2'] = 1;
            $this->load->view('layouts/header');
            $this->load->view('layouts/menu');
            $this->load->view('layouts/navbar', $data);
            $this->load->view('log/v_log', $data2);
            $this->load->view('layouts/footer');
        }
    }

    public function navbar($lv1, $lv2) {
        $data['lv1'] = $lv1;
        $data['lv2'] = $lv2;
        $data['depot'] = $this->m_depot->get_depot();
        $this->load->view('layouts/navbar_oam', $data);
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */