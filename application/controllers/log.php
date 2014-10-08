<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Log extends CI_Controller {

    function __construct() {
        parent::__construct();

        if ($this->session->userdata('isLoggedIn')) {
            $this->load->model('m_log_sistem');
            $this->load->model('m_depot');
            $this->load->model('m_pengaturan');
        } else {
            redirect(base_url());
        }
    }

    public function index($bulan = 1) {
        $id_depot = $this->session->userdata('id_depot');
        if ($bulan == 1) {
            $bulan = date('Y-m');
        }
        $a = $bulan;
        $data3['bulan'] = $a;
        $tahun = date('Y', strtotime($bulan));
        $bulan = date('m', strtotime($bulan));

        if ($id_depot == -1) {

            $q = $this->m_pengaturan->getCountDepot();
            $depot = $q[0]->count;
            $data['lv1'] = $depot + 5;
            $data['lv2'] = 1;
            $data2 = menu_oam();

            $data3['log'] = $this->m_log_sistem->getLogOam($bulan, $tahun);
            $this->load->view('layouts/header');
            $this->load->view('layouts/menu', $data2);
            $this->navbar($data['lv1'], $data['lv2']);
            $this->load->view('log/v_log_oam', $data3);
            $this->load->view('layouts/footer');
        } else {
            $data3['log'] = $this->m_log_sistem->getAllLog($id_depot, $bulan, $tahun);
            $data['lv1'] = 9;
            $data['lv2'] = 1;
            $data1 = menu_ss();
            $this->load->view('layouts/header');
            $this->load->view('layouts/menu',$data1);
            $this->load->view('layouts/navbar', $data);
            $this->load->view('log/v_log', $data3);
            $this->load->view('layouts/footer');
        }
    }

    public function pilih_bulan() {
        $bulan = $this->input->post('bulan', true);
        redirect("log/index/$bulan");
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