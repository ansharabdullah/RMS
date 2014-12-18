<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('menu_ss'))
{
    function menu_ss($var = '')
    { 
        $CI =& get_instance();
        $CI->load->model("m_mt");
        $CI->load->model("m_amt");
        $CI->load->model("m_kinerja");
        $CI->load->model("m_rencana");
        $CI->load->model("m_log_harian");
        $CI->load->model("m_depot");
        $id_depot = $CI->session->userdata('id_depot');
        $data = array();    
        $logHarian = $CI->m_log_harian->get_log_peringatan($id_depot);
        $totalNotif = 0;
        $arrNotif = array();
        $arrPeringatan = array();
        $set = array();
        for($i = 0 ; $i < sizeof($logHarian); $i++)
        {
           if($logHarian[$i]['notifikasi'] == 1)
           {
               array_push($arrNotif,"<b>&nbsp;&nbsp;".date_format(date_create($logHarian[$i]['tanggal']),'d-M-y')."</b>");
               $set['tanggal'] = date_format(date_create($logHarian[$i]['tanggal']),'d-M-y');
               $set['keterangan'] = "";
               //cek jadwal
                if ($logHarian[$i]['jadwal'] == 0) {
                    $totalNotif++;
                    array_push($arrNotif, "<a href='".base_url()."jadwal'>
                                            <span class='label label-success'><i class='icon-calendar'></i></span>
                                           Data Penjadwalan belum ada.
                                            </a>");
                    $set['keterangan'] = $set['keterangan']. "<a href='".base_url()."jadwal'>Data Penjadwalan belum ada.</a><br/>";
                }
                
                //cek presensi amt
                 if ($logHarian[$i]['presensi_amt'] == 0) {
                    $totalNotif++;
                    array_push($arrNotif, "<a href='".base_url()."jadwal'>
                                            <span class='label label-primary'><i class='icon-user'></i></span>
                                           Presensi AMT belum dilakukan.
                                            </a>");
                    $set['keterangan'] = $set['keterangan']. "<a href='".base_url()."amt/presensi'>Presensi AMT belum dilakukan.</a><br/>";
                }
                
                //cek presensi mt
                 if ($logHarian[$i]['presensi_mt'] == 0) {
                    $totalNotif++;
                    array_push($arrNotif, "<a href='".base_url()."jadwal'>
                                            <span class='label label-primary'><i class='icon-truck'></i></span>
                                           Presensi MT belum dilakukan.
                                            </a>");
                    $set['keterangan'] = $set['keterangan']. "<a href='".base_url()."mt/presensi'>Presensi MT belum dilakukan.</a><br/>";
                }
                
                //cek rencana
                 if ($logHarian[$i]['rencana'] == 0) {
                    $totalNotif++;
                    array_push($arrNotif, "<a href='".base_url()."jadwal'>
                                            <span class='label label-primary'><i class='icon-truck'></i></span>
                                           Data rencana MT belum ada.
                                            </a>");
                    $set['keterangan'] = $set['keterangan']. "<a href='".base_url()."mt/rencana'>Data rencana MT belum ada.</a><br/>";
                }
                
                
                //cek kinerja
                if ($logHarian[$i]['input_kinerja'] == 0) {
                    $totalNotif++;
                    array_push($arrNotif, " <a href='".base_url()."kinerja'>
                                            <span class='label label-warning'><i class='icon-briefcase'></i></span>
                                             Data kinerja belum ada.
                                            </a> ");
                     $set['keterangan'] = $set['keterangan']. "<a href='".base_url()."kinerja'>Data kinerja belum ada.</a><br/>";
                }
                //cek ms2
                if ($logHarian[$i]['ms2'] == 0) {
                    $totalNotif++;
                    array_push($arrNotif, " <a href='".base_url()."ba/ms2'>
                                            <span class='label label-danger'><i class='icon-bolt'></i></span>
                                             MS2 belum diisi.
                                            </a>");
                     $set['keterangan'] = $set['keterangan']. "<a href='".base_url()."ba/ms2'>MS2 belum diisi.</a><br/>";
                }
                //cek kpi_operasional
                if ($logHarian[$i]['kpi_operasional'] == 0) {
                    $totalNotif++;
                    array_push($arrNotif, "<a href='".base_url()."kpi_operasional'>
                                            <span class='label label-danger'><i class='icon-bolt'></i></span>
                                            Data KPI Operasional belum ada.
                                            </a>");
                     $set['keterangan'] = $set['keterangan']. "<a href='".base_url()."kpi_operasional'>Data KPI Operasional belum ada.</a><br/>";
                }
                //cek kpi_internal
                if ($logHarian[$i]['kpi_internal'] == 0) {
                    $totalNotif++;
                    array_push($arrNotif, "<a href='".base_url()."kpi_internal'>
                                            <span class='label label-danger'><i class='icon-bolt'></i></span>
                                            Data KPI Internal belum ada.
                                            </a>");
                     $set['keterangan'] = $set['keterangan']. "<a href='".base_url()."kpi_internal'>Data KPI Internal belum ada.</a><br/>";
                }
                
                //cek koefisien
                if ($logHarian[$i]['koefisien'] == 0) {
                    $totalNotif++;
                    array_push($arrNotif, "<a href='".base_url()."kpi_internal'>
                                            <span class='label label-danger'><i class='icon-bolt'></i></span>
                                            Data koefisien belum ada.
                                            </a>");
                     $set['keterangan'] = $set['keterangan']. "<a href='".base_url()."kpi_internal'>Data koefisien belum ada</a><br/>";
                }
                
                
                //cek interpolasi
                if ($logHarian[$i]['interpolasi'] == 0) {
                    $totalNotif++;
                    array_push($arrNotif, "<a href='".base_url()."frm'>
                                            <span class='label label-danger'><i class='icon-bolt'></i></span>
                                          Data Tarif Interpolasi belum ada.
                                            </a>");
                     $set['keterangan'] = $set['keterangan']. "<a href='".base_url()."frm'>Data Tarif Interpolasi belum ada.</a><br/>";
                }
                //cek ba
//                if ($logHarian[$i]['ba'] == 0) {
//                    $totalNotif++;
//                    array_push($arrNotif, "<a href='".base_url()."ba/berita_acara'>
//                                            <span class='label label-warning'><i class='icon-check'></i></span>
//                                          Berita Acara belum dibuat.
//                                            </a>");
//                     $set['keterangan'] = $set['keterangan']. "<a href='".base_url()."laporan/bulanan'>Berita Acara belum dibuat.</a><br/>";
//                }
                
                 //cek kuota apms
                if ($logHarian[$i]['kuota_apms'] == 0) {
                    $totalNotif++;
                    array_push($arrNotif, "<a href='".base_url()."apms/rencana_apms'>
                                            <span class='label label-warning'><i class='icon-check'></i></span>
                                          Kuota APMS belum diisi.
                                            </a>");
                     $set['keterangan'] = $set['keterangan']. "<a href='".base_url()."apms/rencana_apms'>Kuota APMS belum diisi.</a><br/>";
                }
                
                    //cek kpi apms
                if ($logHarian[$i]['kpi_apms'] == 0) {
                    $totalNotif++;
                    array_push($arrNotif, "<a href='".base_url()."apms/kpi_apms'>
                                            <span class='label label-warning'><i class='icon-check'></i></span>
                                          KPI APMS belum diisi.
                                            </a>");
                     $set['keterangan'] = $set['keterangan']. "<a href='".base_url()."apms/kpi_apms'>KPI APMS belum diisi</a><br/>";
                }
                
              if($logHarian[$i]['bulan'] == date('n') && $logHarian[$i]['tahun'] == date('Y')) array_push($arrPeringatan,$set);
           }
        }
        $data['total_notifikasi'] = $totalNotif;
        $data['depot'] = $CI->m_depot->getDetailDepot($id_depot);
        $data['notifikasi'] = $arrNotif;
        $data['rencana_bulan'] = $CI->m_rencana->get_rencana_bulan($id_depot, date("n"),date("Y"));
        $data['kinerja_bulan'] = $CI->m_kinerja->get_kinerja_bulan($id_depot, date("n"),date("Y"));
        $data['kinerja_amt_bulan'] = $CI->m_kinerja->get_kinerja_amt_by_bulan($CI->session->userdata('id_depot'), date("n"),date("Y"));
        $data['arrPeringatan'] = $arrPeringatan;
        return $data;
    }   
}

if ( ! function_exists('menu_oam'))
{
    function menu_oam($var = '')
    {
        setlocale(LC_ALL, "IND");
        $CI =& get_instance();
         $CI->load->model("m_kinerja");
         $CI->load->model("m_rencana");
         $CI->load->model("m_log_harian");
        $data = array();    
        $logHarian =  $CI->m_log_harian->get_log_peringatan_oam();
        $totalNotif = 0;
        $id_depot = "";
        $arrNotif = array();
        for($i = 0 ; $i < sizeof($logHarian); $i++)
        {
           if($logHarian[$i]['notifikasi'] == 1)
           {
               if($logHarian[$i]['id_depot'] != $id_depot)
               {
                   $id_depot = $logHarian[$i]['id_depot']; 
                    if($logHarian[$i]['id_depot'] > 0) 
                    {
                        array_push($arrNotif,"<b>&nbsp; DEPOT ".$logHarian[$i]['depot']."</b>");
                    }
                    else
                    {
                        array_push($arrNotif,"<b>&nbsp; ".$logHarian[$i]['depot']."</b>");
                    }
               }
               
               array_push($arrNotif,"<b>&nbsp;&nbsp;".strftime('%d %B %Y',strtotime($logHarian[$i]['tanggal']))."</b>");
               if($logHarian[$i]['id_depot'] > 0)
               {
                   //cek jadwal
                    if ($logHarian[$i]['jadwal'] == 0) {
                        $totalNotif++;
                        array_push($arrNotif, "<a href='#'>
                                                <span class='label label-success'><i class='icon-calendar'></i></span>
                                               Data Penjadwalan belum ada.
                                                </a>");
                    }
                    
                    //cek presensi amt
                    if ($logHarian[$i]['presensi_amt'] == 0) {
                        $totalNotif++;
                        array_push($arrNotif, "<a href='#'>
                                                <span class='label label-primary'><i class='icon-user'></i></span>
                                               Presensi AMT belum dilakukan.
                                                </a>");
                    }

                    //cek presensi mt
                     if ($logHarian[$i]['presensi_mt'] == 0) {
                        $totalNotif++;
                        array_push($arrNotif, "<a href='#'>
                                                <span class='label label-primary'><i class='icon-truck'></i></span>
                                               Presensi MT belum dilakukan.
                                                </a>");
                    }

                    //cek rencana
                     if ($logHarian[$i]['rencana'] == 0) {
                        $totalNotif++;
                        array_push($arrNotif, "<a href='#'>
                                                <span class='label label-danger'><i class='icon-truck'></i></span>
                                               Data rencana MT belum ada.
                                                </a>");
                    }
                    
                    //cek kinerja
                    if ($logHarian[$i]['input_kinerja'] == 0) {
                        $totalNotif++;
                        array_push($arrNotif, "<a href='#'>
                                                <span class='label label-warning'><i class='icon-briefcase'></i></span>
                                                 Data kinerja belum ada.
                                                </a> ");
                     }
                    //cek ms2
                    if ($logHarian[$i]['ms2'] == 0) {
                        $totalNotif++;
                        array_push($arrNotif, "<a href='#'>
                                                <span class='label label-danger'><i class='icon-bolt'></i></span>
                                                 MS2 belum diisi.
                                                </a>");
                     }
                    //cek kpi_operasional
                    if ($logHarian[$i]['kpi_operasional'] == 0) {
                        $totalNotif++;
                        array_push($arrNotif, "<a href='#'>
                                                <span class='label label-danger'><i class='icon-bolt'></i></span>
                                                Data KPI Operasional belum ada.
                                                </a>");
                    }
                    //cek kpi_internal
                    if ($logHarian[$i]['kpi_internal'] == 0) {
                        $totalNotif++;
                        array_push($arrNotif, "<a href='#'>
                                                <span class='label label-danger'><i class='icon-bolt'></i></span>
                                                Data KPI Internal belum ada.
                                                </a>");
                     }
                     
                      //cek koefisien
                    if ($logHarian[$i]['koefisien'] == 0) {
                        $totalNotif++;
                        array_push($arrNotif, "<a href='#'>
                                                <span class='label label-danger'><i class='icon-bolt'></i></span>
                                                Data koefisien belum ada.
                                                </a>");
                     }


                    //cek interpolasi
                    if ($logHarian[$i]['interpolasi'] == 0) {
                        $totalNotif++;
                        array_push($arrNotif, "<a href='#'>
                                                <span class='label label-danger'><i class='icon-bolt'></i></span>
                                              Data Tarif Interpolasi belum ada.
                                                </a>");
                     }
                    //cek ba
//                    if ($logHarian[$i]['ba'] == 0) {
//                        $totalNotif++;
//                        array_push($arrNotif, "<a href='#'>
//                                                <span class='label label-warning'><i class='icon-check'></i></span>
//                                              Berita Acara belum dibuat.
//                                                </a>");
//                     }
                     
                     //cek kuota apms
                    if ($logHarian[$i]['kuota_apms'] == 0) {
                        $totalNotif++;
                        array_push($arrNotif, "<a href='#'>
                                                <span class='label label-warning'><i class='icon-check'></i></span>
                                              Kuota APMS belum diisi.
                                                </a>");
                     }
                     
                      //cek kpi apms
                    if ($logHarian[$i]['kpi_apms'] == 0) {
                        $totalNotif++;
                        array_push($arrNotif, "<a href='#'>
                                                <span class='label label-warning'><i class='icon-check'></i></span>
                                              Kuota APMS belum diisi.
                                                </a>");
                     }
               }
               else
               {
                   //cek KPI OAM 
                   if ($logHarian[$i]['kpi_oam'] == 0) {
                        $totalNotif++;
                        array_push($arrNotif, "<a href='".base_url()."kpi/internal/".$logHarian[$i]['tahun']."/5'>
                                                <span class='label label-warning'><i class='icon-check'></i></span>
                                              KPI OAM belum dibuat.
                                                </a>");
                     }
                   
               }
           }

       }
        $data['total_notifikasi'] = $totalNotif;
        $data['notifikasi'] = $arrNotif;
        $data['rencana_bulan'] =  $CI->m_rencana->get_rencana_bulan_oam(date("n"),date("Y"));
        $data['kinerja_bulan'] =  $CI->m_kinerja->get_kinerja_bulan_oam(date("n"),date("Y"));
        $data['kinerja_amt_bulan'] =  $CI->m_kinerja->get_kinerja_amt_by_bulan_oam(date("n"),date("Y"));
        return $data;
    }   
}