<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class kpi extends CI_Controller {

    var $level1;

    function __construct() {
        parent::__construct();
        $this->load->model("m_depot");
        $this->load->model("m_kinerja");
        $this->load->model('m_kpi');
        $this->load->model("m_rencana");
        $this->load->model("m_log_harian");
        $this->load->model("m_kpi_oam");
        $this->load->helper('form');
        $this->level1 = $this->m_depot->get_total_depot() + 2;
        if (!$this->session->userdata('isLoggedIn') || $this->session->userdata('id_depot') > 0) {
            redirect('login');
        }
    }

    public function index() {
        
    }

    public function operasional() {

        $data['lv1'] = $this->level1;
        $data['lv2'] = 1;
        $data2 = menu_oam();
        $data3['kpi'] = $this->m_kpi->kpi_pertahun();
        $data3['depot'] = $this->m_depot->get_depot();
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu', $data2);
        $this->navbar($data['lv1'], $data['lv2']);
        $this->load->view("oam/v_kpi_operasional", $data3);
        $this->load->view('layouts/footer');
    }

    public function changeGrafikBulan() {
        $index = $_POST['indikator'];
        $tahun = $_POST['tahun'];
        $depot = $_POST['depot'];
        redirect('kpi/operasional_bulan/' . $depot . '/' . $tahun);
    }

    public function operasional_bulan($id_depot, $tahun) {
        $data['lv1'] = $this->level1;
        $data['lv2'] = 1;
        $data2 = menu_oam();
        $data3['id_depot'] = $id_depot;
        $data3['depot'] = $this->m_depot->get_depot();
        $data3['kpi_bulan'] = $this->m_kpi->nilai_kpi_perbulan($id_depot, $tahun);
        $data3['detail_kpi'] = $this->m_kpi->detail_kpi_perbulan($id_depot, $tahun);
        $data3['tahun'] = $tahun;
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu', $data2);
        $this->navbar($data['lv1'], $data['lv2']);
        $this->load->view('oam/v_kpi_operasional_bulan', $data3);
        $this->load->view('layouts/footer');
    }

    public function ganti_kpi_harian($tipe) {
        $tanggal = $_POST['bulan'];
        $id_depot = $_POST['depot'];
        $bulan = date('n', strtotime($tanggal));
        $tahun = date('Y', strtotime($tanggal));
        redirect('kpi/operasional_depot/' . $tipe . '/' . $id_depot . '/' . $bulan . '/' . $tahun . '/');
    }

    public function operasional_depot($tipe, $id_depot, $bulan, $tahun) {
        $data['lv1'] = $this->level1;
        $data['lv2'] = 1;
        $data2 = menu_oam();
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu', $data2);
        $data3['bulan'] = $bulan;
        $data3['tahun'] = $tahun;
        $data3['depot'] = $this->m_depot->get_depot();
        $data3['kpi'] = $this->m_kpi->performance_kpi_perbulan($id_depot, $bulan, $tahun);
        $this->navbar($data['lv1'], $data['lv2']);
        if ($tipe == 'ms2') {
            $data3['ms2'] = $this->m_kpi->ms2_oam($id_depot, $bulan, $tahun);
            $this->load->view('oam/v_kpi_ms2_harian', $data3);
        } else if ($tipe == 'volume') {
            $data3['volume'] = $this->m_kpi->volume_realisasi_oam($id_depot, $bulan, $tahun);
            $this->load->view('oam/v_kpi_volume_harian', $data3);
        }
        $this->load->view('layouts/footer');
    }
    
    public function gantiTahunKpi()
    {
        $tahun = $_POST['tahun'];
        $triwulan = $_POST['triwulan'];
        redirect('kpi/internal/'.$tahun."/".$triwulan);
        
    }

    public function internal($tahun,$triwulan) {
        $data['lv1'] = $this->level1;
        $data['lv2'] = 2;
        $data2 = menu_oam();
        //ambil data kpi internal
        $tanggal = $tahun . "-01-01";
        $log_harian = $this->m_log_harian->getIdLogHarianTanggal($tanggal, $this->session->userdata('id_depot'));
        if(sizeof($log_harian) == 0)
        {
            $id_log_harian = 0;
        }
        else
        {
            $id_log_harian = $log_harian[0]->ID_LOG_HARIAN;
        }
        $data3['triwulan'] = $triwulan;
        $data3['kpi'] = $this->m_kpi_oam->get_kpi_internal_tahun($id_log_harian);
        $data3['tahun'] = $tahun;
        //realisasi total dari setiap depot, indikator 35 - 66
        $data3['realisasi'] = array();
        for($i = 1 ; $i <= 4 ; $i++)
        {
            $set = array();
            for($indikator = 35 ; $indikator <= 66; $indikator++)
            {
                array_push($set,$this->getRealisasi($tanggal,$indikator,$i));
                
//                $kpi_depot = $this->m_kpi_oam->get_kpi_internal_depot($tahun ."-".$bulan."-01",$indikator);

            }
            array_push($data3['realisasi'],$set);
        }
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu', $data2);
        $this->navbar($data['lv1'], $data['lv2']);
        $this->load->view("oam/v_kpi_internal_oam",$data3);
        $this->load->view('layouts/footer');
    }
    
    
    public function getRealisasi($tanggal,$indikator,$triwulan)
    {
        $kpi_depot = $this->m_kpi_oam->get_kpi_internal_depot($tanggal,$indikator);
        $hasil = array(0,0,0);
        $depot = 0;
        //perhitungan realisasi pada bulan tertentu
        foreach($kpi_depot as $k)
        {
            if($triwulan == 1)
            {
                $hasil[0] += $k->REALISASI_TW1_BULAN1;
                $hasil[1] += $k->REALISASI_TW1_BULAN2;
                $hasil[2] += $k->REALISASI_TW1_BULAN3;
            }
            else  if($triwulan == 2)
            {
                $hasil[0] += $k->REALISASI_TW2_BULAN1;
                $hasil[1] += $k->REALISASI_TW2_BULAN2;
                $hasil[2] += $k->REALISASI_TW2_BULAN3;
            }
            else  if($triwulan == 3)
            {
                $hasil[0] += $k->REALISASI_TW3_BULAN1;
                $hasil[1] += $k->REALISASI_TW3_BULAN2;
                $hasil[2] += $k->REALISASI_TW3_BULAN3;
            } else  if($triwulan == 3)
            {
                $hasil[0] += $k->REALISASI_TW4_BULAN1;
                $hasil[1] += $k->REALISASI_TW4_BULAN2;
                $hasil[2] += $k->REALISASI_TW4_BULAN3;
            }
            
            $depot++;
        }
        
        if(sizeof($kpi_depot) > 0)
        {
            if($kpi_depot[0]->PERHITUNGAN == 2)
            {
                $hasil[0] = $hasil[0] / $depot;
                $hasil[1] = $hasil[1] / $depot;
                $hasil[2] = $hasil[2] / $depot;
            }
        
        }
        
        return $hasil;
    }

    public function internal_input() {
        $data['lv1'] = $this->level1;
        $data['lv2'] = 2;
        $data2 = menu_oam();
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu', $data2);
        $this->navbar($data['lv1'], $data['lv2']);
        $this->load->view("oam/v_input_kpi_internal_oam");
        $this->load->view('layouts/footer');
    }
     public function internal_edit($tahun,$triwulan) {
        $data['lv1'] = $this->level1;
        $data['lv2'] = 2;
        $tanggal = $tahun . "-01-01";
        $log_harian = $this->m_log_harian->getIdLogHarianTanggal($tanggal, $this->session->userdata('id_depot'));
        $id_log_harian = $log_harian[0]->ID_LOG_HARIAN;
        $kpi = $this->m_kpi_oam->get_kpi_internal_tahun($id_log_harian);
        $data3['kpi'] = array();
        foreach($kpi as $k)
        {
            $set = array();
            if($triwulan == 1){
                array_push($set,$k->BOBOT);
                array_push($set,$k->TW1_BASE);
                array_push($set,$k->TW1_STRETCH);
                array_push($set,$k->RKAP_OAM_TW1);
            }else if($triwulan == 2) {
                array_push($set,$k->BOBOT);
                array_push($set,$k->TW2_BASE);
                array_push($set,$k->TW2_STRETCH);
                array_push($set,$k->RKAP_OAM_TW2);
            }else if($triwulan == 3) {
                array_push($set,$k->BOBOT);
                array_push($set,$k->TW3_BASE);
                array_push($set,$k->TW3_STRETCH);
                array_push($set,$k->RKAP_OAM_TW3);
            }else{
                array_push($set,$k->BOBOT);
                array_push($set,$k->TW4_BASE);
                array_push($set,$k->TW4_STRETCH);
                array_push($set,$k->RKAP_OAM_TW4);
            }
            array_push($data3['kpi'],$set);
        }
        $data3['tahun'] = $tahun;
        $data3['no_triwulan'] = $triwulan;
        if($triwulan == 1){
           $data3['triwulan'] = 'I';
        }else if($triwulan == 2) {
           $data3['triwulan'] = 'II';
        }else if($triwulan == 3) {
           $data3['triwulan'] = 'III';
        }else{
           $data3['triwulan'] = 'IV';
        }
        $data2 = menu_oam();
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu', $data2);
        $this->navbar($data['lv1'], $data['lv2']);
        $this->load->view("oam/v_edit_kpi_internal_oam",$data3);
        $this->load->view('layouts/footer');
    }

    public function insert_internal() {

        $tahun = $_POST['tahun'];
        $triwulan = $_POST['triwulan'];
        if ($triwulan == 1) {
            $base = "TW1_BASE";
            $stretch = "TW1_STRETCH";
            $realisasi1 = "REALISASI_TW1_BULAN1";
            $realisasi2 = "REALISASI_TW1_BULAN2";
            $realisasi3 = "REALISASI_TW1_BULAN3";
            $rkap = "RKAP_OAM_TW1";
        } else if ($triwulan == 2) {

            $base = "TW2_BASE";
            $stretch = "TW2_STRETCH";
            $realisasi1 = "REALISASI_TW2_BULAN1";
            $realisasi2 = "REALISASI_TW2_BULAN2";
            $realisasi3 = "REALISASI_TW2_BULAN3";
            $rkap = "RKAP_OAM_TW2";
        } else if ($triwulan == 3) {

            $base = "TW3_BASE";
            $stretch = "TW3_STRETCH";
            $realisasi1 = "REALISASI_TW3_BULAN1";
            $realisasi2 = "REALISASI_TW3_BULAN2";
            $realisasi3 = "REALISASI_TW3_BULAN3";
            $rkap = "RKAP_OAM_TW3";
        } else if ($triwulan == 4) {

            $base = "TW4_BASE";
            $stretch = "TW4_STRETCH";
            $realisasi1 = "REALISASI_TW4_BULAN1";
            $realisasi2 = "REALISASI_TW4_BULAN2";
            $realisasi3 = "REALISASI_TW4_BULAN3";
            $rkap = "RKAP_OAM_TW4";
        }
        //ambil id_log_harian
        $tanggal = $tahun . "-01-01";
        $log_harian = $this->m_log_harian->getIdLogHarianTanggal($tanggal, $this->session->userdata('id_depot'));
        $id_log_harian = $log_harian[0]->ID_LOG_HARIAN;

        //struktur insert 
        //id_log_harian,id_jenis_kpi_internal,bobot,tahun_base,tahun_stretch,tw1_base,tw1_stretch,....,
        //realiasasi_tw1_bulan1,realiasasi_tw2_bulan2,realisasi_tw3_bulan3,.....,rkap_oam_tw1,...rkap_oam_tw4
        /* Tahapan : cek dulu log tahun segitu udah ada atau belum di kpi internal
         *          - kalau belum, insert di set 0 semua
         *          - kalau udah , tinggal update
         */
        //cek dulu log tahun segitu udah ada atau belum di kpi internal
        for ($i = 1; $i <= 34; $i++) {
            $data = $this->m_kpi_oam->get_kpi_internal($id_log_harian, $i);
            if ($data->num_rows() == 0) {
                $field = array(
                    "id_log_harian" => $id_log_harian,
                    "id_jenis_kpi_internal" => $i
                );
                $this->m_kpi_oam->insert_kpi_internal($field);
            }
        }
        //1.kumpulin data
        //2.update dilakukan per id log harian dan id_indikator_kpi di tabel kpi_internal $data = array
        $data = array(
            "bobot" => $_POST['bobot1'],
            $base => $_POST['base1'],
            $stretch => $_POST['stretch1'],
            //$realisasi1 => $_POST['realisasi_1_1'],
            //$realisasi2 => $_POST['realisasi_1_2'],
            //$realisasi3 => $_POST['realisasi_1_3'],
        );
        $this->m_kpi_oam->update_kpi_internal($id_log_harian, 1, $data);
        $data = array(
            "bobot" => $_POST['bobot2'],
            $base => $_POST['base2'],
            $stretch => $_POST['stretch2'],
            //$realisasi1 => $_POST['realisasi_2_1'],
            //$realisasi2 => $_POST['realisasi_2_2'],
            //$realisasi3 => $_POST['realisasi_2_3'],
        );
        $this->m_kpi_oam->update_kpi_internal($id_log_harian, 2, $data);
        $data = array(
            "bobot" => $_POST['bobot3'],
            $base => $_POST['base3'],
            $stretch => $_POST['stretch3'],
            //$realisasi1 => $_POST['realisasi_3_1'],
            //$realisasi2 => $_POST['realisasi_3_2'],
            //$realisasi3 => $_POST['realisasi_3_3'],
        );
        $this->m_kpi_oam->update_kpi_internal($id_log_harian, 3, $data);
        $data = array(
            "bobot" => $_POST['bobot4'],
            $base => $_POST['base4'],
            $stretch => $_POST['stretch4'],
            //$realisasi1 => $_POST['realisasi_4_1'],
            //$realisasi2 => $_POST['realisasi_4_2'],
            //$realisasi3 => $_POST['realisasi_4_3'],
        );
        $this->m_kpi_oam->update_kpi_internal($id_log_harian, 4, $data);
        $data = array(
            "bobot" => $_POST['bobot5'],
            $base => $_POST['base5'],
            $stretch => $_POST['stretch5'],
            //$realisasi1 => $_POST['realisasi_5_1'],
            //$realisasi2 => $_POST['realisasi_5_2'],
            //$realisasi3 => $_POST['realisasi_5_3'],
        );
        $this->m_kpi_oam->update_kpi_internal($id_log_harian, 5, $data);
        $data = array(
            "bobot" => $_POST['bobot6'],
            $base => $_POST['base6'],
            $stretch => $_POST['stretch6'],
            //$realisasi1 => $_POST['realisasi_6_1'],
            //$realisasi2 => $_POST['realisasi_6_2'],
            //$realisasi3 => $_POST['realisasi_6_3'],
        );
        $this->m_kpi_oam->update_kpi_internal($id_log_harian, 6, $data);
        $data = array(
            "bobot" => $_POST['bobot7'],
            $base => $_POST['base7'],
            $stretch => $_POST['stretch7'],
            //$realisasi1 => $_POST['realisasi_7_1'],
            //$realisasi2 => $_POST['realisasi_7_2'],
            //$realisasi3 => $_POST['realisasi_7_3'],
        );
        $this->m_kpi_oam->update_kpi_internal($id_log_harian, 7, $data);
        $data = array(
            "bobot" => $_POST['bobot8'],
            $base => $_POST['base8'],
            $stretch => $_POST['stretch8'],
            //$realisasi1 => $_POST['realisasi_8_1'],
            //$realisasi2 => $_POST['realisasi_8_2'],
            //$realisasi3 => $_POST['realisasi_8_3'],
        );
        $this->m_kpi_oam->update_kpi_internal($id_log_harian, 8, $data);
        $data = array(
            "bobot" => $_POST['bobot9'],
            $base => $_POST['base9'],
            $stretch => $_POST['stretch9'],
            //$realisasi1 => $_POST['realisasi_9_1'],
            //$realisasi2 => $_POST['realisasi_9_2'],
            //$realisasi3 => $_POST['realisasi_9_3'],
        );
        $this->m_kpi_oam->update_kpi_internal($id_log_harian, 9, $data);
        $data = array(
            "bobot" => $_POST['bobot10'],
            $base => $_POST['base10'],
            $stretch => $_POST['stretch10'],
            //$realisasi1 => $_POST['realisasi_10_1'],
            //$realisasi2 => $_POST['realisasi_10_2'],
            //$realisasi3 => $_POST['realisasi_10_3'],
        );
        $this->m_kpi_oam->update_kpi_internal($id_log_harian, 10, $data);
        $data = array(
            "bobot" => $_POST['bobot11'],
            $base => $_POST['base11'],
            $stretch => $_POST['stretch11'],
            //$realisasi1 => $_POST['realisasi_11_1'],
            //$realisasi2 => $_POST['realisasi_11_2'],
            //$realisasi3 => $_POST['realisasi_11_3'],
        );
        $this->m_kpi_oam->update_kpi_internal($id_log_harian, 11, $data);
        $data = array(
            "bobot" => $_POST['bobot12'],
            $base => $_POST['base12'],
            $stretch => $_POST['stretch12'],
            //$realisasi1 => $_POST['realisasi_12_1'],
            //$realisasi2 => $_POST['realisasi_12_2'],
            //$realisasi3 => $_POST['realisasi_12_3'],
        );
        $this->m_kpi_oam->update_kpi_internal($id_log_harian, 12, $data);
        $data = array(
            "bobot" => $_POST['bobot13'],
            $base => $_POST['base13'],
            $stretch => $_POST['stretch13'],
            //$realisasi1 => $_POST['realisasi_13_1'],
            //$realisasi2 => $_POST['realisasi_13_2'],
            //$realisasi3 => $_POST['realisasi_13_3'],
        );
        $this->m_kpi_oam->update_kpi_internal($id_log_harian, 13, $data);
        $data = array(
            "bobot" => $_POST['bobot14'],
            $base => $_POST['base14'],
            $stretch => $_POST['stretch14'],
            //$realisasi1 => $_POST['realisasi_14_1'],
            //$realisasi2 => $_POST['realisasi_14_2'],
            //$realisasi3 => $_POST['realisasi_14_3'],
        );
        $this->m_kpi_oam->update_kpi_internal($id_log_harian, 14, $data);
        $data = array(
            "bobot" => $_POST['bobot15'],
            $base => $_POST['base15'],
            $stretch => $_POST['stretch15'],
            //$realisasi1 => $_POST['realisasi_15_1'],
            //$realisasi2 => $_POST['realisasi_15_2'],
            //$realisasi3 => $_POST['realisasi_15_3'],
        );
        $this->m_kpi_oam->update_kpi_internal($id_log_harian, 15, $data);
        $data = array(
            "bobot" => $_POST['bobot16'],
            $base => $_POST['base16'],
            $stretch => $_POST['stretch16'],
            //$realisasi1 => $_POST['realisasi_16_1'],
            //$realisasi2 => $_POST['realisasi_16_2'],
            //$realisasi3 => $_POST['realisasi_16_3'],
        );
        $this->m_kpi_oam->update_kpi_internal($id_log_harian, 16, $data);
        $data = array(
            "bobot" => $_POST['bobot17'],
            $base => $_POST['base17'],
            $stretch => $_POST['stretch17'],
            //$realisasi1 => $_POST['realisasi_17_1'],
            //$realisasi2 => $_POST['realisasi_17_2'],
            //$realisasi3 => $_POST['realisasi_17_3'],
        );
        $this->m_kpi_oam->update_kpi_internal($id_log_harian, 17, $data);
        $data = array(
            "bobot" => $_POST['bobot18'],
            $base => $_POST['base18'],
            $stretch => $_POST['stretch18'],
            //$realisasi1 => $_POST['realisasi_18_1'],
            //$realisasi2 => $_POST['realisasi_18_2'],
            //$realisasi3 => $_POST['realisasi_18_3'],
        );
        $this->m_kpi_oam->update_kpi_internal($id_log_harian, 18, $data);
        $data = array(
            "bobot" => $_POST['bobot19'],
            $base => $_POST['base19'],
            $stretch => $_POST['stretch19'],
            //$realisasi1 => $_POST['realisasi_19_1'],
            //$realisasi2 => $_POST['realisasi_19_2'],
            //$realisasi3 => $_POST['realisasi_19_3'],
        );
        $this->m_kpi_oam->update_kpi_internal($id_log_harian, 19, $data);
        $data = array(
            //$stretch => $_POST['stretch20'],
            $base => $_POST['base20'],
        );
        $this->m_kpi_oam->update_kpi_internal($id_log_harian, 20, $data);
        $data = array(
            //$stretch => $_POST['stretch21'],
            $base => $_POST['base21'],
        );
        $this->m_kpi_oam->update_kpi_internal($id_log_harian, 21, $data);
        $data = array(
            //$stretch => $_POST['stretch22'],
            $base => $_POST['base22'],
        );
        $this->m_kpi_oam->update_kpi_internal($id_log_harian, 22, $data);
//        $data = array(
//            //$stretch => $_POST['stretch23'],
//            $base => $_POST['base23'],
//        );
//        $this->m_kpi_oam->update_kpi_internal($id_log_harian, 23, $data);
        $data = array(
            //$stretch => $_POST['stretch24'],
            $base => $_POST['base24'],
        );
        $this->m_kpi_oam->update_kpi_internal($id_log_harian, 24, $data);
        $data = array(
//            $stretch => $_POST['stretch25'],
            $base => $_POST['base25'],
        );
        $this->m_kpi_oam->update_kpi_internal($id_log_harian, 25, $data);
        $data = array(
//            $stretch => $_POST['stretch26'],
            $base => $_POST['base26'],
        );
        $this->m_kpi_oam->update_kpi_internal($id_log_harian, 26, $data);
        $data = array(
//            $stretch => $_POST['stretch27'],
            $base => $_POST['base27'],
        );
        $this->m_kpi_oam->update_kpi_internal($id_log_harian, 27, $data);
        $data = array(
//            $stretch => $_POST['stretch28'],
            $base => $_POST['base28'],
        );
        $this->m_kpi_oam->update_kpi_internal($id_log_harian, 28, $data);
        $data = array(
//            $stretch => $_POST['stretch29'],
            $base => $_POST['base29'],
        );
        $this->m_kpi_oam->update_kpi_internal($id_log_harian, 29, $data);
        $data = array(
            $stretch => $_POST['stretch30'],
            $base => $_POST['base30'],
        );
        $this->m_kpi_oam->update_kpi_internal($id_log_harian, 30, $data);
        $data = array(
            $rkap => $_POST['rkap_revenue']
        );
        $this->m_kpi_oam->update_kpi_internal($id_log_harian, 31, $data);
        $data = array(
            $rkap => $_POST['rkap_laba_usaha']
        );
        $this->m_kpi_oam->update_kpi_internal($id_log_harian, 32, $data);
        $data = array(
            $rkap => $_POST['rkap_cost_liter']
        );
        $this->m_kpi_oam->update_kpi_internal($id_log_harian, 33, $data);
        $data = array(
            $rkap => $_POST['rkap_thruput']
        );
        $this->m_kpi_oam->update_kpi_internal($id_log_harian, 34, $data);
        
        redirect("kpi/internal/".date('Y')."/5");
    }
    
    public function update_internal($tahun,$triwulan) {

        if ($triwulan == 1) {
            $base = "TW1_BASE";
            $stretch = "TW1_STRETCH";
            $rkap = "RKAP_OAM_TW1";
        } else if ($triwulan == 2) {

            $base = "TW2_BASE";
            $stretch = "TW2_STRETCH";
            $rkap = "RKAP_OAM_TW2";
        } else if ($triwulan == 3) {

            $base = "TW3_BASE";
            $stretch = "TW3_STRETCH";
            $rkap = "RKAP_OAM_TW3";
        } else if ($triwulan == 4) {

            $base = "TW4_BASE";
            $stretch = "TW4_STRETCH";
            $rkap = "RKAP_OAM_TW4";
        }
        //ambil id_log_harian
        $tanggal = $tahun . "-01-01";
        $log_harian = $this->m_log_harian->getIdLogHarianTanggal($tanggal, $this->session->userdata('id_depot'));
        $id_log_harian = $log_harian[0]->ID_LOG_HARIAN;

        //struktur insert 
        //id_log_harian,id_jenis_kpi_internal,bobot,tahun_base,tahun_stretch,tw1_base,tw1_stretch,....,
        //realiasasi_tw1_bulan1,realiasasi_tw2_bulan2,realisasi_tw3_bulan3,.....,rkap_oam_tw1,...rkap_oam_tw4
        /* Tahapan : cek dulu log tahun segitu udah ada atau belum di kpi internal
         *          - kalau belum, insert di set 0 semua
         *          - kalau udah , tinggal update
         */
        //cek dulu log tahun segitu udah ada atau belum di kpi internal
        for ($i = 1; $i <= 34; $i++) {
            $data = $this->m_kpi_oam->get_kpi_internal($id_log_harian, $i);
            if ($data->num_rows() == 0) {
                $field = array(
                    "id_log_harian" => $id_log_harian,
                    "id_jenis_kpi_internal" => $i
                );
                $this->m_kpi_oam->insert_kpi_internal($field);
            }
        }
        //1.kumpulin data
        //2.update dilakukan per id log harian dan id_indikator_kpi di tabel kpi_internal $data = array
        $data = array(
            "bobot" => $_POST['bobot1'],
            $base => $_POST['base1'],
            $stretch => $_POST['stretch1'],
            //$realisasi1 => $_POST['realisasi_1_1'],
            //$realisasi2 => $_POST['realisasi_1_2'],
            //$realisasi3 => $_POST['realisasi_1_3'],
        );
        $this->m_kpi_oam->update_kpi_internal($id_log_harian, 1, $data);
        $data = array(
            "bobot" => $_POST['bobot2'],
            $base => $_POST['base2'],
            $stretch => $_POST['stretch2'],
            //$realisasi1 => $_POST['realisasi_2_1'],
            //$realisasi2 => $_POST['realisasi_2_2'],
            //$realisasi3 => $_POST['realisasi_2_3'],
        );
        $this->m_kpi_oam->update_kpi_internal($id_log_harian, 2, $data);
        $data = array(
            "bobot" => $_POST['bobot3'],
            $base => $_POST['base3'],
            $stretch => $_POST['stretch3'],
            //$realisasi1 => $_POST['realisasi_3_1'],
            //$realisasi2 => $_POST['realisasi_3_2'],
            //$realisasi3 => $_POST['realisasi_3_3'],
        );
        $this->m_kpi_oam->update_kpi_internal($id_log_harian, 3, $data);
        $data = array(
            "bobot" => $_POST['bobot4'],
            $base => $_POST['base4'],
            $stretch => $_POST['stretch4'],
            //$realisasi1 => $_POST['realisasi_4_1'],
            //$realisasi2 => $_POST['realisasi_4_2'],
            //$realisasi3 => $_POST['realisasi_4_3'],
        );
        $this->m_kpi_oam->update_kpi_internal($id_log_harian, 4, $data);
        $data = array(
            "bobot" => $_POST['bobot5'],
            $base => $_POST['base5'],
            $stretch => $_POST['stretch5'],
            //$realisasi1 => $_POST['realisasi_5_1'],
            //$realisasi2 => $_POST['realisasi_5_2'],
            //$realisasi3 => $_POST['realisasi_5_3'],
        );
        $this->m_kpi_oam->update_kpi_internal($id_log_harian, 5, $data);
        $data = array(
            "bobot" => $_POST['bobot6'],
            $base => $_POST['base6'],
            $stretch => $_POST['stretch6'],
            //$realisasi1 => $_POST['realisasi_6_1'],
            //$realisasi2 => $_POST['realisasi_6_2'],
            //$realisasi3 => $_POST['realisasi_6_3'],
        );
        $this->m_kpi_oam->update_kpi_internal($id_log_harian, 6, $data);
        $data = array(
            "bobot" => $_POST['bobot7'],
            $base => $_POST['base7'],
            $stretch => $_POST['stretch7'],
            //$realisasi1 => $_POST['realisasi_7_1'],
            //$realisasi2 => $_POST['realisasi_7_2'],
            //$realisasi3 => $_POST['realisasi_7_3'],
        );
        $this->m_kpi_oam->update_kpi_internal($id_log_harian, 7, $data);
        $data = array(
            "bobot" => $_POST['bobot8'],
            $base => $_POST['base8'],
            $stretch => $_POST['stretch8'],
            //$realisasi1 => $_POST['realisasi_8_1'],
            //$realisasi2 => $_POST['realisasi_8_2'],
            //$realisasi3 => $_POST['realisasi_8_3'],
        );
        $this->m_kpi_oam->update_kpi_internal($id_log_harian, 8, $data);
        $data = array(
            "bobot" => $_POST['bobot9'],
            $base => $_POST['base9'],
            $stretch => $_POST['stretch9'],
            //$realisasi1 => $_POST['realisasi_9_1'],
            //$realisasi2 => $_POST['realisasi_9_2'],
            //$realisasi3 => $_POST['realisasi_9_3'],
        );
        $this->m_kpi_oam->update_kpi_internal($id_log_harian, 9, $data);
        $data = array(
            "bobot" => $_POST['bobot10'],
            $base => $_POST['base10'],
            $stretch => $_POST['stretch10'],
            //$realisasi1 => $_POST['realisasi_10_1'],
            //$realisasi2 => $_POST['realisasi_10_2'],
            //$realisasi3 => $_POST['realisasi_10_3'],
        );
        $this->m_kpi_oam->update_kpi_internal($id_log_harian, 10, $data);
        $data = array(
            "bobot" => $_POST['bobot11'],
            $base => $_POST['base11'],
            $stretch => $_POST['stretch11'],
            //$realisasi1 => $_POST['realisasi_11_1'],
            //$realisasi2 => $_POST['realisasi_11_2'],
            //$realisasi3 => $_POST['realisasi_11_3'],
        );
        $this->m_kpi_oam->update_kpi_internal($id_log_harian, 11, $data);
        $data = array(
            "bobot" => $_POST['bobot12'],
            $base => $_POST['base12'],
            $stretch => $_POST['stretch12'],
            //$realisasi1 => $_POST['realisasi_12_1'],
            //$realisasi2 => $_POST['realisasi_12_2'],
            //$realisasi3 => $_POST['realisasi_12_3'],
        );
        $this->m_kpi_oam->update_kpi_internal($id_log_harian, 12, $data);
        $data = array(
            "bobot" => $_POST['bobot13'],
            $base => $_POST['base13'],
            $stretch => $_POST['stretch13'],
            //$realisasi1 => $_POST['realisasi_13_1'],
            //$realisasi2 => $_POST['realisasi_13_2'],
            //$realisasi3 => $_POST['realisasi_13_3'],
        );
        $this->m_kpi_oam->update_kpi_internal($id_log_harian, 13, $data);
        $data = array(
            "bobot" => $_POST['bobot14'],
            $base => $_POST['base14'],
            $stretch => $_POST['stretch14'],
            //$realisasi1 => $_POST['realisasi_14_1'],
            //$realisasi2 => $_POST['realisasi_14_2'],
            //$realisasi3 => $_POST['realisasi_14_3'],
        );
        $this->m_kpi_oam->update_kpi_internal($id_log_harian, 14, $data);
        $data = array(
            "bobot" => $_POST['bobot15'],
            $base => $_POST['base15'],
            $stretch => $_POST['stretch15'],
            //$realisasi1 => $_POST['realisasi_15_1'],
            //$realisasi2 => $_POST['realisasi_15_2'],
            //$realisasi3 => $_POST['realisasi_15_3'],
        );
        $this->m_kpi_oam->update_kpi_internal($id_log_harian, 15, $data);
        $data = array(
            "bobot" => $_POST['bobot16'],
            $base => $_POST['base16'],
            $stretch => $_POST['stretch16'],
            //$realisasi1 => $_POST['realisasi_16_1'],
            //$realisasi2 => $_POST['realisasi_16_2'],
            //$realisasi3 => $_POST['realisasi_16_3'],
        );
        $this->m_kpi_oam->update_kpi_internal($id_log_harian, 16, $data);
        $data = array(
            "bobot" => $_POST['bobot17'],
            $base => $_POST['base17'],
            $stretch => $_POST['stretch17'],
            //$realisasi1 => $_POST['realisasi_17_1'],
            //$realisasi2 => $_POST['realisasi_17_2'],
            //$realisasi3 => $_POST['realisasi_17_3'],
        );
        $this->m_kpi_oam->update_kpi_internal($id_log_harian, 17, $data);
        $data = array(
            "bobot" => $_POST['bobot18'],
            $base => $_POST['base18'],
            $stretch => $_POST['stretch18'],
            //$realisasi1 => $_POST['realisasi_18_1'],
            //$realisasi2 => $_POST['realisasi_18_2'],
            //$realisasi3 => $_POST['realisasi_18_3'],
        );
        $this->m_kpi_oam->update_kpi_internal($id_log_harian, 18, $data);
        $data = array(
            "bobot" => $_POST['bobot19'],
            $base => $_POST['base19'],
            $stretch => $_POST['stretch19'],
            //$realisasi1 => $_POST['realisasi_19_1'],
            //$realisasi2 => $_POST['realisasi_19_2'],
            //$realisasi3 => $_POST['realisasi_19_3'],
        );
        $this->m_kpi_oam->update_kpi_internal($id_log_harian, 19, $data);
        $data = array(
//            $stretch => $_POST['stretch20'],
            $base => $_POST['base20'],
        );
        $this->m_kpi_oam->update_kpi_internal($id_log_harian, 20, $data);
        $data = array(
//            $stretch => $_POST['stretch21'],
            $base => $_POST['base21'],
        );
        $this->m_kpi_oam->update_kpi_internal($id_log_harian, 21, $data);
        $data = array(
//            $stretch => $_POST['stretch22'],
            $base => $_POST['base22'],
        );
        $this->m_kpi_oam->update_kpi_internal($id_log_harian, 22, $data);
//        $data = array(
////            $stretch => $_POST['stretch23'],
//            $base => $_POST['base23'],
//        );
//        $this->m_kpi_oam->update_kpi_internal($id_log_harian, 23, $data);
        $data = array(
//            $stretch => $_POST['stretch24'],
            $base => $_POST['base24'],
        );
        $this->m_kpi_oam->update_kpi_internal($id_log_harian, 24, $data);
        $data = array(
//            $stretch => $_POST['stretch25'],
            $base => $_POST['base25'],
        );
        $this->m_kpi_oam->update_kpi_internal($id_log_harian, 25, $data);
        $data = array(
//            $stretch => $_POST['stretch26'],
            $base => $_POST['base26'],
        );
        $this->m_kpi_oam->update_kpi_internal($id_log_harian, 26, $data);
        $data = array(
//            $stretch => $_POST['stretch27'],
            $base => $_POST['base27'],
        );
        $this->m_kpi_oam->update_kpi_internal($id_log_harian, 27, $data);
        $data = array(
//            $stretch => $_POST['stretch28'],
            $base => $_POST['base28'],
        );
        $this->m_kpi_oam->update_kpi_internal($id_log_harian, 28, $data);
        $data = array(
//            $stretch => $_POST['stretch29'],
            $base => $_POST['base29'],
        );
        $this->m_kpi_oam->update_kpi_internal($id_log_harian, 29, $data);
        $data = array(
            $stretch => $_POST['stretch30'],
            $base => $_POST['base30'],
        );
        $this->m_kpi_oam->update_kpi_internal($id_log_harian, 30, $data);
        $data = array(
            $rkap => $_POST['rkap_revenue']
        );
        $this->m_kpi_oam->update_kpi_internal($id_log_harian, 31, $data);
        $data = array(
            $rkap => $_POST['rkap_laba_usaha']
        );
        $this->m_kpi_oam->update_kpi_internal($id_log_harian, 32, $data);
        $data = array(
            $rkap => $_POST['rkap_cost_liter']
        );
        $this->m_kpi_oam->update_kpi_internal($id_log_harian, 33, $data);
        $data = array(
            $rkap => $_POST['rkap_thruput']
        );
        $this->m_kpi_oam->update_kpi_internal($id_log_harian, 34, $data);
        
        redirect("kpi/internal/".$tahun."/".$triwulan);
    }

    public function navbar($lv1, $lv2) {
        $data['lv1'] = $lv1;
        $data['lv2'] = $lv2;
        $data['depot'] = $this->m_depot->get_depot();
        $this->load->view('layouts/navbar_oam', $data);
    }

}
