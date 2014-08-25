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
            $data2['total_mt'] = $this->m_mt->getTotalMtByDepot($this->session->userdata('id_depot'));
            $data2['total_amt'] = $this->m_amt->getTotalAMtByDepot($this->session->userdata('id_depot'));
            $data2['rencana_bulan'] = $this->m_rencana->get_rencana_bulan($this->session->userdata('id_depot'), date("n"));
            $data2['kinerja_bulan'] = $this->m_kinerja->get_kinerja_bulan($this->session->userdata('id_depot'), date("n"));
            $data2['kinerja_mt'] = $this->m_kinerja->get_kinerja_mt_hari($this->session->userdata('id_depot'), date("n"));
            $data2['kinerja_amt'] = $this->m_kinerja->get_kinerja_amt_hari($this->session->userdata('id_depot'), date("n"));
            $logHarian = $this->m_log_harian->get_log_peringatan();
            $totalNotif = 0;
            $arrNotif = array();
            //cek jadwal
            if ($logHarian[0]->jadwal == 0) {
                $totalNotif++;
                array_push($arrNotif, "<a href='#'>
                                        <span class='label label-warning'><i class='icon-calendar'></i></span>
                                       Data Penjadwalan hari ini <br/><br/>belum ada.
                                        </a>");
            }
            //cek kinerja
            if ($logHarian[0]->input_kinerja == 0) {
                $totalNotif++;
                array_push($arrNotif, " <a href='#'>
                                        <span class='label label-warning'><i class='icon-briefcase'></i></span>
                                         Data kinerja hari ini <br/><br/>belum ada.
                                        </a> ");
            }
            //cek ms2
            if ($logHarian[0]->ms2 == 0) {
                $totalNotif++;
                array_push($arrNotif, " <a href='#'>
                                        <span class='label label-danger'><i class='icon-bolt'></i></span>
                                         MS2 hari ini belum diisi.
                                        </a>");
            }
            //cek kpi_operasional
            if ($logHarian[0]->kpi_operasional == 0) {
                $totalNotif++;
                array_push($arrNotif, "<a href='#'>
                                        <span class='label label-danger'><i class='icon-bolt'></i></span>
                                        Data KPI Operasional hari ini <br/><br/>belum ada.
                                        </a>");
            }
            //cek kpi_internal
            if ($logHarian[0]->kpi_internal == 0) {
                $totalNotif++;
                array_push($arrNotif, "<a href='#'>
                                        <span class='label label-danger'><i class='icon-bolt'></i></span>
                                        Data KPI Internal hari ini <br/><br/>belum ada.
                                        </a>");
            }

            //cek interpolasi
            if ($logHarian[0]->interpolasi == 0) {
                $totalNotif++;
                array_push($arrNotif, "<a href='#'>
                                        <span class='label label-danger'><i class='icon-bolt'></i></span>
                                      Data Tarif Interpolasi hari ini <br/><br/>belum ada.
                                        </a>");
            }
            //cek ba
            if ($logHarian[0]->ba == 0) {
                $totalNotif++;
                array_push($arrNotif, "<a href='#'>
                                        <span class='label label-warning'><i class='icon-check'></i></span>
                                      Berita Acara hari ini belum dibuat.
                                        </a>");
            }
            $data3['total_notifikasi'] = $totalNotif;
            $data3['notifikasi'] = $arrNotif;
            $this->load->view('layouts/header');
            $this->load->view('layouts/menu', $data3);
            $this->load->view('layouts/navbar', $data);
            $this->load->view('home/v_home', $data2);
            $this->load->view('layouts/footer');
        }
    }

    public function home_oam() {
        //if (($this->session->userdata('isLoggedIn')) && (($this->session->userdata('id_role') == 1) || ($this->session->userdata('id_role') == 2) )) {
        $data['lv1'] = 1;
        $data['lv2'] = 1;
        $data2['total_mt'] = $this->m_mt->getTotalMt();
        $data2['total_amt'] = $this->m_amt->getTotalAMt();
        $data2['rencana_bulan'] = $this->m_rencana->get_rencana_bulan_oam(date("n"));
        $data2['rencana_tahun'] = $this->m_rencana->get_rencana_tahun_oam(date("Y"));
        $data2['rencana_hari'] = $this->m_rencana->get_rencana_hari_oam(date("Y-m-d"));
        $data2['kinerja_bulan'] = $this->m_kinerja->get_kinerja_bulan_oam(date("n"));
        $data2['kinerja_tahun'] = $this->m_kinerja->get_kinerja_tahun_oam(date("Y"));
        $data2['kinerja_hari'] = $this->m_kinerja->get_kinerja_hari_oam(date("Y-m-d"));
        $data2['kinerja_mt'] = $this->m_kinerja->get_kinerja_mt_tahun_oam();
        $data2['depot'] = $this->m_depot->get_depot();
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->load->view('layouts/navbar_oam', $data);
        $this->load->view('oam/v_home',$data2);
        $this->load->view('layouts/footer');
        //}
    }

}
