<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class home extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model("m_mt");
        $this->load->model("m_amt");
        $this->load->model("m_kinerja");
        $this->load->model("m_rencana");
        $this->load->model("m_log_harian");
        $this->load->model("m_depot");
        $this->load->model("m_notifikasi");
    }

    public function index() {
        if (($this->session->userdata('isLoggedIn')) && (($this->session->userdata('id_role') == 1) || ($this->session->userdata('id_role') == 2) )) {
            $this->home_oam();
        } else if (($this->session->userdata('isLoggedIn')) && (($this->session->userdata('id_role') != 1) || ($this->session->userdata('id_role') != 2) )) {
            $this->home();
        } else {
            redirect(base_url() . "login/");
        }
    }

    public function home() {
        if (($this->session->userdata('isLoggedIn')) && (($this->session->userdata('id_role') != 1) || ($this->session->userdata('id_role') != 2) )) {
            $data['lv1'] = 1;
            $data['lv2'] = 1;
            $id_depot = $this->session->userdata('id_depot');
            $data2['total_mt'] = $this->m_mt->getTotalMtByDepot($id_depot);
            $data2['total_amt'] = $this->m_amt->getTotalAMtByDepot($id_depot);
            $data2['rencana_bulan'] = $this->m_rencana->get_rencana_bulan($id_depot, date("n"),date("Y"));
            $data2['kinerja_bulan'] = $this->m_kinerja->get_kinerja_bulan($id_depot, date("n"),date("Y"));
            $data2['kinerja_mt'] = $this->m_kinerja->get_kinerja_mt($id_depot);
            $data2['kinerja_amt'] = $this->m_kinerja->get_kinerja_amt($id_depot);
            /*BOX PERINGATAN MT*/
            $data2['peringatan_mt'] = $this->m_notifikasi->notifikasi_mt($id_depot);
            $data3 = menu_ss();
            $data2['peringatan'] = $data3['arrPeringatan'];
            
            $this->load->view('layouts/header');
            $this->load->view('layouts/menu', $data3);
            $this->load->view('layouts/navbar', $data);
            $this->load->view('home/v_home', $data2);
            $this->load->view('layouts/footer');
        }
    }

    public function home_oam() {
        setlocale(LC_ALL, "IND");
        //if (($this->session->userdata('isLoggedIn')) && (($this->session->userdata('id_role') == 1) || ($this->session->userdata('id_role') == 2) )) {
       $this->load->model('m_kpi');
        $data2['total_mt'] = $this->m_mt->getTotalMt();
        $data2['total_amt'] = $this->m_amt->getTotalAMt();
        $data2['rencana_bulan'] = $this->m_rencana->get_rencana_bulan_oam(date("n"),date("Y"));
        $data2['rencana_tahun'] = $this->m_rencana->get_rencana_tahun_oam(date("Y"));
        $data2['rencana_hari'] = $this->m_rencana->get_rencana_hari_oam(date("Y-m-d"));
        $data2['kinerja_bulan'] = $this->m_kinerja->get_kinerja_bulan_oam(date("n"),date("Y"));
        $data2['kinerja_tahun'] = $this->m_kinerja->get_kinerja_tahun_oam(date("Y"));
        $data2['kinerja_hari'] = $this->m_kinerja->get_kinerja_hari_oam(date("Y-m-d"));
        $data2['kpi'] = $this->m_kpi->kpi_pertahun();
        $data2['kinerja_mt'] = $this->m_kinerja->get_kinerja_mt_tahun_oam();
        $data2['kinerja_amt'] = $this->m_kinerja->get_kinerja_amt_tahun_oam();
        $data2['depot'] = $this->m_depot->get_depot();
        $data3 = menu_oam();
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu',$data3);
        $this->navbar();
        $this->load->view('oam/v_home',$data2);
        $this->load->view('layouts/footer');
        //}
    }
    
    public function navbar()
    {
        $data['lv1'] = 1;
        $data['lv2'] = 1;
        $data['depot'] = $this->m_depot->get_depot();
        $this->load->view('layouts/navbar_oam', $data);
    }

}
