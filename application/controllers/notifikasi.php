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
        $data['lv1'] = 1;
        $data['lv2'] = 1;
        $logHarian = $this->m_log_harian->get_log_peringatan_oam();
        $totalNotif = 0;
        $id_depot = "";
        $arrNotif = array();
        for ($i = 0; $i < sizeof($logHarian); $i++) {
            if ($id_depot != $logHarian[$i]->ID_DEPOT) {
                array_push($arrNotif, "<b>&nbsp; DEPOT " . $logHarian[$i]->NAMA_DEPOT . "</b>");
                $id_depot = $logHarian[$i]->ID_DEPOT;
            }
            array_push($arrNotif, "<b>&nbsp;&nbsp;" . date_format(date_create($logHarian[$i]->tanggal), 'd-M-y') . "</b>");
            //cek jadwal
            if ($logHarian[$i]->jadwal == 0) {
                $totalNotif++;
                array_push($arrNotif, "<a href='#'>
                                        <span class='label label-success'><i class='icon-calendar'></i></span>
                                       Data Penjadwalan belum ada.
                                        </a>");
            }
            //cek kinerja
            if ($logHarian[$i]->input_kinerja == 0) {
                $totalNotif++;
                array_push($arrNotif, " <a href='#'>
                                        <span class='label label-warning'><i class='icon-briefcase'></i></span>
                                         Data kinerja belum ada.
                                        </a> ");
            }
            //cek ms2
            if ($logHarian[$i]->ms2 == 0) {
                $totalNotif++;
                array_push($arrNotif, " <a href='#'>
                                        <span class='label label-danger'><i class='icon-bolt'></i></span>
                                         MS2 belum diisi.
                                        </a>");
            }
            //cek kpi_operasional
            if ($logHarian[$i]->kpi_operasional == 0) {
                $totalNotif++;
                array_push($arrNotif, "<a href='#'>
                                        <span class='label label-danger'><i class='icon-bolt'></i></span>
                                        Data KPI Operasional belum ada.
                                        </a>");
            }
            //cek kpi_internal
            if ($logHarian[$i]->kpi_internal == 0) {
                $totalNotif++;
                array_push($arrNotif, "<a href='#'>
                                        <span class='label label-danger'><i class='icon-bolt'></i></span>
                                        Data KPI Internal belum ada.
                                        </a>");
            }

            //cek interpolasi
            if ($logHarian[$i]->interpolasi == 0) {
                $totalNotif++;
                array_push($arrNotif, "<a href='#'>
                                        <span class='label label-danger'><i class='icon-bolt'></i></span>
                                      Data Tarif Interpolasi belum ada.
                                        </a>");
            }
            //cek ba
            if ($logHarian[$i]->ba == 0) {
                $totalNotif++;
                array_push($arrNotif, "<a href='#'>
                                        <span class='label label-warning'><i class='icon-check'></i></span>
                                      Berita Acara belum dibuat.
                                        </a>");
            }
        }
        $data3['total_notifikasi'] = $totalNotif;
        $data3['notifikasi'] = $arrNotif;
        $data2['logHarian'] = $logHarian;
        $data3['rencana_bulan'] = $this->m_rencana->get_rencana_bulan_oam(date("n"), date("Y"));
        $data3['kinerja_bulan'] = $this->m_kinerja->get_kinerja_bulan_oam(date("n"), date("Y"));

        $this->load->view('layouts/header');
        $this->load->view('layouts/menu', $data3);
        $data['depot'] = $this->m_depot->get_depot();
        $this->load->view('layouts/navbar_oam', $data);
        $this->load->view('oam/v_notifikasi', $data2);
        $this->load->view('layouts/footer');
    }

    public function notifikasi() {
        $data['lv1'] = 1;
        $data['lv2'] = 1;
        $logHarian = $this->m_log_harian->get_log_peringatan($this->session->userdata('id_depot'));
        $totalNotif = 0;
        $arrNotif = array();
        for($i = 0 ; $i < sizeof($logHarian); $i++)
        {
           if($logHarian[$i]['notifikasi'] == 1)
           {
               array_push($arrNotif,"<b>&nbsp;&nbsp;".date_format(date_create($logHarian[$i]['tanggal']),'d-M-y')."</b>");
                //cek jadwal
                if ($logHarian[$i]['jadwal'] == 0) {
                    $totalNotif++;
                    array_push($arrNotif, "<a href='".base_url()."jadwal'>
                                            <span class='label label-success'><i class='icon-calendar'></i></span>
                                           Data Penjadwalan belum ada.
                                            </a>");
                }
                //cek kinerja
                if ($logHarian[$i]['input_kinerja'] == 0) {
                    $totalNotif++;
                    array_push($arrNotif, " <a href='".base_url()."kinerja'>
                                            <span class='label label-warning'><i class='icon-briefcase'></i></span>
                                             Data kinerja belum ada.
                                            </a> ");
                }
                //cek ms2
                if ($logHarian[$i]['ms2'] == 0) {
                    $totalNotif++;
                    array_push($arrNotif, " <a href='".base_url()."ba/ms2'>
                                            <span class='label label-danger'><i class='icon-bolt'></i></span>
                                             MS2 belum diisi.
                                            </a>");
                }
                //cek kpi_operasional
                if ($logHarian[$i]['kpi_operasional'] == 0) {
                    $totalNotif++;
                    array_push($arrNotif, "<a href='".base_url()."kpi_operasional'>
                                            <span class='label label-danger'><i class='icon-bolt'></i></span>
                                            Data KPI Operasional belum ada.
                                            </a>");
                }
                //cek kpi_internal
                if ($logHarian[$i]['kpi_internal'] == 0) {
                    $totalNotif++;
                    array_push($arrNotif, "<a href='".base_url()."kpi_internal'>
                                            <span class='label label-danger'><i class='icon-bolt'></i></span>
                                            Data KPI Internal belum ada.
                                            </a>");
                }

                //cek interpolasi
                if ($logHarian[$i]['interpolasi'] == 0) {
                    $totalNotif++;
                    array_push($arrNotif, "<a href='".base_url()."frm'>
                                            <span class='label label-danger'><i class='icon-bolt'></i></span>
                                          Data Tarif Interpolasi belum ada.
                                            </a>");
                }
                //cek ba
                if ($logHarian[$i]['ba'] == 0) {
                    $totalNotif++;
                    array_push($arrNotif, "<a href='".base_url()."ba/berita_acara'>
                                            <span class='label label-warning'><i class='icon-check'></i></span>
                                          Berita Acara belum dibuat.
                                            </a>");
                }
           }
        }
        $data3['total_notifikasi'] = $totalNotif;
        $data3['notifikasi'] = $arrNotif;
        $data3['rencana_bulan'] = $this->m_rencana->get_rencana_bulan($this->session->userdata('id_depot'), date("n"), date("Y"));
        $data3['kinerja_bulan'] = $this->m_kinerja->get_kinerja_bulan($this->session->userdata('id_depot'), date("n"), date("Y"));
        $data2['logHarian'] = $logHarian;
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu', $data3);
        $this->load->view('layouts/navbar', $data);
        $this->load->view('notifikasi/v_notifikasi', $data2);
        $this->load->view('layouts/footer');
    }

}

?>