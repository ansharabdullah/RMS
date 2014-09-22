<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class notifikasi extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model("m_mt");
        $this->load->model("m_amt");
        $this->load->model("m_kinerja");
        $this->load->model("m_rencana");
        $this->load->model("m_log_harian");
        $this->load->model("m_depot");
    }

    public function index() {
        if (($this->session->userdata('isLoggedIn')) && (($this->session->userdata('id_role') == 1) || ($this->session->userdata('id_role') == 2) )) {
            $this->notifikasi_oam();
        } else if (($this->session->userdata('isLoggedIn')) && (($this->session->userdata('id_role') != 1) || ($this->session->userdata('id_role') != 2) )) {
            $this->notifikasi();
        } else {
            redirect(base_url() . "login/");
        }
    }

    public function notifikasi_oam() {
        setlocale(LC_ALL, "IND");
        $data['lv1'] = 1;
        $data['lv2'] = 1;
        $logHarian = $this->m_log_harian->get_log_peringatan_oam();
        
        $data2['logHarian'] = $logHarian;
        $data3['rencana_bulan'] = $this->m_rencana->get_rencana_bulan_oam(date("n"), date("Y"));
        $data3['kinerja_bulan'] = $this->m_kinerja->get_kinerja_bulan_oam(date("n"), date("Y"));
        $data3 = menu_oam();
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu',$data3);
        $data['depot'] = $this->m_depot->get_depot();
        $this->load->view('layouts/navbar_oam', $data);
        $this->load->view('oam/v_notifikasi', $data2);
        $this->load->view('layouts/footer');
    }

    public function notifikasi() {
        $data['lv1'] = 1;
        $data['lv2'] = 1;
        $logHarian = $this->m_log_harian->get_log_peringatan($this->session->userdata('id_depot'));
        
        $data2['logHarian'] = $logHarian;
        $data3 = menu_ss();
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu',$data3);
        $this->load->view('layouts/navbar', $data);
        $this->load->view('notifikasi/v_notifikasi', $data2);
        $this->load->view('layouts/footer');
    }

}

?>
