<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class laporan extends CI_Controller {

    function __construct() {
        parent::__construct();

        if (!$this->session->userdata('isLoggedIn')) {
            redirect('login');
        } else if ($this->session->userdata('id_role') <= 2) {
            redirect();
        }
    }

    public function header($lv1, $lv2) {
        $data['lv1'] = $lv1;
        $data['lv2'] = $lv2;
        $data_notifikasi = menu_ss();
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu', $data_notifikasi);
        $this->load->view('layouts/navbar', $data);
    }

    public function footer() {
        $this->load->view('layouts/footer');
    }

    public function index() {
        $this->harian();
    }

    public function harian() {
        $this->header(7, 1);
        $this->load->view('laporan/v_laporan_harian');
        $this->footer();
    }

    public function bulanan() {
        $this->header(7, 2);
        $this->load->view('laporan/v_laporan_bulanan');
        $this->footer();
    }

    public function triwulan() {
        $this->header(7, 3);
        $this->load->view('laporan/v_laporan_triwulan');
        $this->footer();
    }

    public function tahunan() {
        $this->header(7, 4);
        $this->load->view('laporan/v_laporan_tahunan');
        $this->footer();
    }

    public function ms2() {
        $depot = $this->session->userdata('id_depot');
        $this->load->model('m_laporan');

        $data2['submit'] = false;
        $data2['hapus'] = false;
        $data2['edit'] = false;

        if ($this->input->post('cek')) {
            $data2['submit'] = true;
            $tanggalms2 = $this->input->post('blnms2');
        } else if ($this->input->post('edit')) {
            $id = $this->input->post('id_ms2');

            $tanggal = $this->input->post('tanggal_ms2');
            $tanggalms2 = $this->input->post('blnms2');

            $bulan = date("m", strtotime($tanggalms2));
            $tahun = date("Y", strtotime($tanggalms2));

            
            $total_lo_premium=0;
            $total_lo_solar=0;
            $total_lo_pertamax=0;
            
            $sesuai_premium = $this->input->post('premium1');
            if($sesuai_premium == ""){
                $sesuai_premium = "NULL";
            }else{
                $total_lo_premium = $total_lo_premium + $sesuai_premium;
            }
            $sesuai_solar = $this->input->post('solar1');
            if($sesuai_solar == ""){
                $sesuai_solar = "NULL";
            }else{
                $total_lo_solar = $total_lo_solar + $sesuai_solar;
            }
            $sesuai_pertamax = $this->input->post('pertamax1');
            if($sesuai_pertamax == ""){
                $sesuai_pertamax = "NULL";
            }else{
                $total_lo_pertamax = $total_lo_pertamax + $sesuai_pertamax;
            }
            
            $cepat_premium = $this->input->post('premium2');
            if($cepat_premium == ""){
                $cepat_premium = "NULL";
            }else{
                $total_lo_premium = $total_lo_premium + $cepat_premium;
            }
            $cepat_solar = $this->input->post('solar2');
            if($cepat_solar == ""){
                $cepat_solar = "NULL";
            }else{
                $total_lo_solar = $total_lo_solar + $cepat_solar;
            }
            $cepat_pertamax = $this->input->post('pertamax2');
            if($cepat_pertamax == ""){
                $cepat_pertamax = "NULL";
            }else{
                $total_lo_pertamax = $total_lo_pertamax + $cepat_pertamax;
            }

            $cepat_shift1_premium = $this->input->post('premium3');
            if($cepat_shift1_premium == ""){
                $cepat_shift1_premium = "NULL";
            }else{
                $total_lo_premium = $total_lo_premium + $cepat_shift1_premium;
            }
            $cepat_shift1_solar = $this->input->post('solar3');
            if($cepat_shift1_solar == ""){
                $cepat_shift1_solar = "NULL";
            }else{
                $total_lo_solar = $total_lo_solar + $cepat_shift1_solar;
            }
            $cepat_shift1_pertamax = $this->input->post('pertamax3');
            if($cepat_shift1_pertamax == ""){
                $cepat_shift1_pertamax = "NULL";
            }else{
                $total_lo_pertamax = $total_lo_pertamax + $cepat_shift1_pertamax;
            }

            $lambat_premium = $this->input->post('premium4');
            if($lambat_premium == ""){
                $lambat_premium = "NULL";
            }else{
                $total_lo_premium = $total_lo_premium + $lambat_premium;
            }
            $lambat_solar = $this->input->post('solar4');
            if($lambat_solar == ""){
                $lambat_solar = "NULL";
            }else{
                $total_lo_solar = $total_lo_solar + $lambat_solar;
            }
            $lambat_pertamax = $this->input->post('pertamax4');
            if($lambat_pertamax == ""){
                $lambat_pertamax = "NULL";
            }else{
                $total_lo_pertamax = $total_lo_pertamax + $lambat_pertamax;
            }

            $tidak_terkirim_premium = $this->input->post('premium5');
            if($tidak_terkirim_premium == ""){
                $tidak_terkirim_premium = "NULL";
            }else{
                $total_lo_premium = $total_lo_premium + $tidak_terkirim_premium;
            }
            $tidak_terkirim_solar = $this->input->post('solar5');
            if($tidak_terkirim_solar == ""){
                $tidak_terkirim_solar = "NULL";
            }else{
                $total_lo_solar = $total_lo_solar + $tidak_terkirim_solar;
            }
            $tidak_terkirim_pertamax = $this->input->post('pertamax5');
            if($tidak_terkirim_pertamax == ""){
                $tidak_terkirim_pertamax = "NULL";
            }else{
                $total_lo_pertamax = $total_lo_pertamax + $tidak_terkirim_pertamax;
            }
            

            $this->m_laporan->editMS2($id, $sesuai_premium, $sesuai_solar, $sesuai_pertamax, $cepat_premium, $cepat_solar, $cepat_pertamax, $cepat_shift1_premium, $cepat_shift1_solar, $cepat_shift1_pertamax, $lambat_premium, $lambat_solar, $lambat_pertamax, $tidak_terkirim_premium, $tidak_terkirim_solar, $tidak_terkirim_pertamax,$total_lo_premium,$total_lo_solar,$total_lo_pertamax, $depot, $tahun, $bulan);
            $this->m_laporan->SyncKPIOperasional($depot, $tahun, $bulan);
            $this->m_laporan->InsertLogSistem($this->session->userdata('id_pegawai'), 'Edit MS2 Complience tanggal ' . $tanggal, 'Edit');

            $data2['submit'] = true;
            $data2['edit'] = true;
        } else if ($this->input->post('hapus')) {
            $data2['hapus'] = true;
            $ms2 = unserialize($this->input->post('id_ms2'));
            $total_ms2 = unserialize($this->input->post('total_ms2'));
            $nama_bln = $this->input->post('nama_blnms2');
            $tanggalms2 = $this->input->post('blnms2');
            $bulan = date("m", strtotime($tanggalms2));
            $tahun = date("Y", strtotime($tanggalms2));
            $this->m_laporan->deleteMS2($ms2, $total_ms2);
            $this->m_laporan->SyncKPIOperasional($depot, $tahun, $bulan);
            $this->m_laporan->InsertLogSistem($this->session->userdata('id_pegawai'), 'Hapus MS2 Complience bulan ' . $nama_bln, 'Hapus');
        } else {
            $data2['submit'] = true;
            $tanggalms2 = date('Y-m-d');
        }

        if ($data2['hapus'] == false) {
            $data2['blnms2'] = $tanggalms2;
            $tanggal = date("d-m-Y", strtotime($tanggalms2));
            $bulan = date("m", strtotime($tanggalms2));
            $tahun = date("Y", strtotime($tanggalms2));

            $data2 ['tahun'] = $tahun;
            if ($bulan == 1) {
                $data2['bulan'] = 'Januari';
            } else if ($bulan == 2) {
                $data2['bulan'] = 'Februari';
            } else if ($bulan == 3) {
                $data2['bulan'] = 'Maret';
            } else if ($bulan == 4) {
                $data2['bulan'] = 'April';
            } else if ($bulan == 5) {
                $data2['bulan'] = 'Mei';
            } else if ($bulan == 6) {
                $data2['bulan'] = 'Juni';
            } else if ($bulan == 7) {
                $data2['bulan'] = 'Juli';
            } else if ($bulan == 8) {
                $data2['bulan'] = 'Agustus';
            } else if ($bulan == 9) {
                $data2['bulan'] = 'September';
            } else if ($bulan == 10) {
                $data2['bulan'] = 'Oktober';
            } else if ($bulan == 11) {
                $data2['bulan'] = 'November';
            } else if ($bulan == 12) {
                $data2['bulan'] = 'Desember';
            }

            $data2['status_ms2'] = $this->m_laporan->cekMS2($depot, $tahun, $bulan);
            if ($data2['status_ms2'] == date('t', strtotime($tanggal))) {
                //ms2 ada
                $data2['ms2'] = $this->m_laporan->getMS2($depot, $tahun, $bulan);
                $data2['total_ms2'] = $this->m_laporan->getTotalMS2($depot, $tahun, $bulan);
            }
        }

        $this->header(7, 2);
        $this->load->view('laporan/v_ms2', $data2);
        $this->footer();
    }

    public function import_ms2() {
        $depot = $this->session->userdata('id_depot');
        $this->load->model('m_laporan');

        $data2['klik_upload'] = false;
        $data2['klik_simpan'] = false;
        if ($this->input->post('upload')) {
            $data2['klik_upload'] = true;
            $data2['ms2']['error'] = true;

            $blnms2 = $this->input->post('blnms2');
            $data2['ms2']['blnms2'] = $blnms2;

            $bulan = date("d-m-Y", strtotime($blnms2));
            $data2['cek_ada'] = $this->m_laporan->cekMS2($depot, date("Y", strtotime($blnms2)), date("m", strtotime($blnms2)));
            if ($data2['cek_ada'] == 0) {
                if (date("m", strtotime($blnms2)) == 1) {
                    $data2['nama_bulan'] = 'Januari ' . date("Y", strtotime($blnms2));
                } else if (date("m", strtotime($blnms2)) == 2) {
                    $data2['nama_bulan'] = 'Februari ' . date("Y", strtotime($blnms2));
                } else if (date("m", strtotime($blnms2)) == 3) {
                    $data2['nama_bulan'] = 'Maret ' . date("Y", strtotime($blnms2));
                } else if (date("m", strtotime($blnms2)) == 4) {
                    $data2['nama_bulan'] = 'April ' . date("Y", strtotime($blnms2));
                } else if (date("m", strtotime($blnms2)) == 5) {
                    $data2['nama_bulan'] = 'Mei ' . date("Y", strtotime($blnms2));
                } else if (date("m", strtotime($blnms2)) == 6) {
                    $data2['nama_bulan'] = 'Juni ' . date("Y", strtotime($blnms2));
                } else if (date("m", strtotime($blnms2)) == 7) {
                    $data2['nama_bulan'] = 'Juli ' . date("Y", strtotime($blnms2));
                } else if (date("m", strtotime($blnms2)) == 8) {
                    $data2['nama_bulan'] = 'Agustus ' . date("Y", strtotime($blnms2));
                } else if (date("m", strtotime($blnms2)) == 9) {
                    $data2['nama_bulan'] = 'September ' . date("Y", strtotime($blnms2));
                } else if (date("m", strtotime($blnms2)) == 10) {
                    $data2['nama_bulan'] = 'Oktober ' . date("Y", strtotime($blnms2));
                } else if (date("m", strtotime($blnms2)) == 11) {
                    $data2['nama_bulan'] = 'November ' . date("Y", strtotime($blnms2));
                } else if (date("m", strtotime($blnms2)) == 12) {
                    $data2['nama_bulan'] = 'Desember ' . date("Y", strtotime($blnms2));
                }

                $fileMS2 = $_FILES['fileMS2'];
                $last_day = date('t', strtotime($bulan));

                $data2['ms2']['jumlah'] = $last_day;

                $dir = './assets/file/';
                if (!file_exists($dir)) {
                    mkdir($dir);
                }

                $file_target = $dir . $_FILES['fileMS2']['name'];
                move_uploaded_file($_FILES['fileMS2']['tmp_name'], $file_target);

                $this->load->library('PHPExcel/Classes/PHPExcel');

                $inputFileName = $file_target;

                $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
                $objReader = PHPExcel_IOFactory::createReader($inputFileType);

                $worksheetData = $objReader->listWorksheetInfo($inputFileName);

                foreach ($worksheetData as $row) {
                    $worksheetRead[] = $row['worksheetName'];
                }

                $objReader->setLoadSheetsOnly($worksheetRead);

                $objPHPExcel = $objReader->load($inputFileName);

                $loadedSheetNames = $objPHPExcel->getSheetNames();

                foreach ($loadedSheetNames as $sheetIndex => $loadedSheetName) {
                    if ($loadedSheetName == 'MS2 Compliance') {
                        $data2['ms2']['error'] = false;
                        $objPHPExcel->setActiveSheetIndexByName($loadedSheetName);
                        $sheetData = $objPHPExcel->getActiveSheet();
                        $row_baca = 4;
                        $i = 0;

                        for ($i = 0; $i < $last_day; $i++) {

                            $data2['ms2']['id_log_harian'][] = $this->m_laporan->getIdLogHarian($depot, date("Y", strtotime($blnms2)), date("m", strtotime($blnms2)), ($i + 1));
                            $data2['ms2'] ['tanggal'] [] = date("Y-m", strtotime($blnms2)) . '-' . ($i + 1);

                            $sesuai_premium = is_numeric($sheetData->getCell('B' . ($row_baca + $i))->getValue()) ? ($sheetData->getCell('B' . ($row_baca + $i))->getValue() * 100) : -1;
                            $sesuai_solar = is_numeric($sheetData->getCell('C' . ($row_baca + $i))->getValue()) ? ($sheetData->getCell('C' . ($row_baca + $i))->getValue() * 100) : -1;
                            $sesuai_pertamax = (is_numeric($sheetData->getCell('D' . ($row_baca + $i))->getValue()) ? ($sheetData->getCell('D' . ($row_baca + $i))->getValue() * 100) : -1);
                            $data2['ms2']['sesuai_premium'] [] = $sesuai_premium;
                            $data2['ms2']['sesuai_solar'] [] = $sesuai_solar;
                            $data2['ms2']['sesuai_pertamax'] [] = $sesuai_pertamax;

                            $cepat_premium = (is_numeric($sheetData->getCell('E' . ($row_baca + $i))->getValue()) ? ($sheetData->getCell('E' . ($row_baca + $i))->getValue() * 100) : -1);
                            $cepat_solar = (is_numeric($sheetData->getCell('F' . ($row_baca + $i))->getValue()) ? ($sheetData->getCell('F' . ($row_baca + $i))->getValue() * 100) : -1);
                            $cepat_pertamax = (is_numeric($sheetData->getCell('G' . ($row_baca + $i))->getValue()) ? ($sheetData->getCell('G' . ($row_baca + $i))->getValue() * 100) : -1);
                            $data2['ms2']['cepat_premium'] [] = $cepat_premium;
                            $data2['ms2']['cepat_solar'] [] = $cepat_solar;
                            $data2['ms2']['cepat_pertamax'] [] = $cepat_pertamax;

                            $cepat_shift1_premium = (is_numeric($sheetData->getCell('H' . ($row_baca + $i))->getValue()) ? ($sheetData->getCell('H' . ($row_baca + $i))->getValue() * 100) : -1);
                            $cepat_shift1_solar = (is_numeric($sheetData->getCell('I' . ($row_baca + $i))->getValue()) ? ($sheetData->getCell('I' . ($row_baca + $i))->getValue() * 100) : -1);
                            $cepat_shift1_pertamax = (is_numeric($sheetData->getCell('J' . ($row_baca + $i))->getValue()) ? ($sheetData->getCell('J' . ($row_baca + $i))->getValue() * 100) : -1);
                            $data2['ms2']['cepat_shift1_premium'] [] = $cepat_shift1_premium;
                            $data2['ms2']['cepat_shift1_solar'] [] = $cepat_shift1_solar;
                            $data2['ms2']['cepat_shift1_pertamax'] [] = $cepat_shift1_pertamax;

                            $lambat_premium = (is_numeric($sheetData->getCell('K' . ($row_baca + $i))->getValue()) ? ($sheetData->getCell('K' . ($row_baca + $i))->getValue() * 100) : -1);
                            $lambat_solar = (is_numeric($sheetData->getCell('L' . ($row_baca + $i))->getValue()) ? ($sheetData->getCell('L' . ($row_baca + $i))->getValue() * 100) : -1);
                            $lambat_pertamax = (is_numeric($sheetData->getCell('M' . ($row_baca + $i))->getValue()) ? ($sheetData->getCell('M' . ($row_baca + $i))->getValue() * 100) : -1);
                            $data2['ms2']['lambat_premium'] [] = $lambat_premium;
                            $data2['ms2']['lambat_solar'] [] = $lambat_solar;
                            $data2['ms2']['lambat_pertamax'] [] = $lambat_pertamax;

                            $tidak_terkirim_premium = (is_numeric($sheetData->getCell('N' . ($row_baca + $i))->getValue()) ? ($sheetData->getCell('N' . ($row_baca + $i))->getValue() * 100) : -1);
                            $tidak_terkirim_solar = (is_numeric($sheetData->getCell('O' . ($row_baca + $i))->getValue()) ? ($sheetData->getCell('O' . ($row_baca + $i))->getValue() * 100) : -1);
                            $tidak_terkirim_pertamax = (is_numeric($sheetData->getCell('P' . ($row_baca + $i))->getValue()) ? ($sheetData->getCell('P' . ($row_baca + $i))->getValue() * 100) : -1);
                            $data2['ms2']['tidak_terkirim_premium'] [] = $tidak_terkirim_premium;
                            $data2['ms2']['tidak_terkirim_solar'] [] = $tidak_terkirim_solar;
                            $data2['ms2']['tidak_terkirim_pertamax'] [] = $tidak_terkirim_pertamax;

                            $temp_total_lo = 0;
                            if($sesuai_premium > 0){
                                $temp_total_lo = $temp_total_lo + $sesuai_premium;
                            }
                            if($cepat_premium > 0){
                                $temp_total_lo = $temp_total_lo + $cepat_premium;
                            }
                            if($cepat_shift1_premium > 0){
                                $temp_total_lo = $temp_total_lo + $cepat_shift1_premium;
                            }
                            if($lambat_premium > 0){
                                $temp_total_lo = $temp_total_lo + $lambat_premium;
                            }
                            if($tidak_terkirim_premium > 0){
                                $temp_total_lo = $temp_total_lo + $tidak_terkirim_premium;
                            }
                            $data2['ms2']['total_lo_premium'] [] = $temp_total_lo;
                            
                            $temp_total_lo = 0;
                            if($sesuai_solar > 0){
                                $temp_total_lo = $temp_total_lo + $sesuai_solar;
                            }
                            if($cepat_solar > 0){
                                $temp_total_lo = $temp_total_lo + $cepat_solar;
                            }
                            if($cepat_shift1_solar > 0){
                                $temp_total_lo = $temp_total_lo + $cepat_shift1_solar;
                            }
                            if($lambat_solar > 0){
                                $temp_total_lo = $temp_total_lo + $lambat_solar;
                            }
                            if($tidak_terkirim_solar > 0){
                                $temp_total_lo = $temp_total_lo + $tidak_terkirim_solar;
                            }
                            $data2['ms2']['total_lo_solar'] [] = $temp_total_lo;
                            
                            $temp_total_lo = 0;
                            if($sesuai_pertamax > 0){
                                $temp_total_lo = $temp_total_lo + $sesuai_pertamax;
                            }
                            if($cepat_pertamax > 0){
                                $temp_total_lo = $temp_total_lo + $cepat_pertamax;
                            }
                            if($cepat_shift1_pertamax > 0){
                                $temp_total_lo = $temp_total_lo + $cepat_shift1_pertamax;
                            }
                            if($lambat_pertamax > 0){
                                $temp_total_lo = $temp_total_lo + $lambat_pertamax;
                            }
                            if($tidak_terkirim_pertamax > 0){
                                $temp_total_lo = $temp_total_lo + $tidak_terkirim_pertamax;
                            }
                            $data2['ms2']['total_lo_pertamax'] [] = $temp_total_lo;
                            
                            /*
                            if ($sesuai_premium == -1 || $cepat_premium == -1 || $cepat_shift1_premium == -1 || $lambat_premium == -1 || $tidak_terkirim_premium == -1) {
                                $data2['ms2']['total_lo_premium'] [] = -1;
                            } else {
                                $data2['ms2']['total_lo_premium'] [] = $sesuai_premium + $cepat_premium + $cepat_shift1_premium + $lambat_premium + $tidak_terkirim_premium;
                            }
                            if ($sesuai_solar == -1 || $cepat_solar == -1 || $cepat_shift1_solar == -1 || $lambat_solar == -1 || $tidak_terkirim_solar == -1) {
                                $data2['ms2']['total_lo_solar'] [] = -1;
                            } else {
                                $data2['ms2']['total_lo_solar'] [] = $sesuai_solar + $cepat_solar + $cepat_shift1_solar + $lambat_solar + $tidak_terkirim_solar;
                            }
                            if ($sesuai_pertamax == -1 || $cepat_pertamax == -1 || $cepat_shift1_pertamax == -1 || $lambat_pertamax == -1 || $tidak_terkirim_pertamax == -1) {
                                $data2['ms2']['total_lo_pertamax'] [] = -1;
                            } else {
                                $data2['ms2']['total_lo_pertamax'] [] = $sesuai_pertamax + $cepat_pertamax + $cepat_shift1_pertamax + $lambat_pertamax + $tidak_terkirim_pertamax;
                            }
                            */
                            
                        }
                        $nilai_sesuai = 0;
                        $banyak_nilai_sesuai=0;
                        $nilai_cepat = 0;
                        $banyak_nilai_cepat=0;
                        $nilai_cepat_shift1 = 0;
                        $banyak_nilai_cepat_shift1=0;
                        $nilai_lambat = 0;
                        $banyak_nilai_lambat=0;
                        $nilai_tidak_terkirim = 0;
                        $banyak_nilai_tidak_terkirim=0;
                        $nilai_total_lo = 0;
                        $banyak_nilai_total_lo=0;
                        for ($i = 0; $i < $last_day; $i++) {
                            if($data2['ms2']['sesuai_premium'] [$i] != -1){
                                $nilai_sesuai = $nilai_sesuai + $data2['ms2']['sesuai_premium'] [$i];
                                $banyak_nilai_sesuai++;
                            }                            
                            if($data2['ms2']['sesuai_solar'] [$i] != -1){
                                $nilai_sesuai = $nilai_sesuai + $data2['ms2']['sesuai_solar'] [$i];
                                $banyak_nilai_sesuai++;
                            }                            
                            if($data2['ms2']['sesuai_pertamax'] [$i] != -1){
                                $nilai_sesuai = $nilai_sesuai + $data2['ms2']['sesuai_pertamax'] [$i];
                                $banyak_nilai_sesuai++;
                            }
                            
                            if($data2['ms2']['cepat_premium'] [$i] != -1){
                                $nilai_cepat = $nilai_cepat + $data2['ms2']['cepat_premium'] [$i];
                                $banyak_nilai_cepat++;
                            }
                            if($data2['ms2']['cepat_solar'] [$i] != -1){
                                $nilai_cepat = $nilai_cepat + $data2['ms2']['cepat_solar'] [$i];
                                $banyak_nilai_cepat++;
                            }
                            if($data2['ms2']['cepat_pertamax'] [$i] != -1){
                                $nilai_cepat = $nilai_cepat + $data2['ms2']['cepat_pertamax'] [$i];
                                $banyak_nilai_cepat++;
                            }
                            
                            if($data2['ms2']['cepat_shift1_premium'] [$i] != -1){
                                $nilai_cepat_shift1 = $nilai_cepat_shift1 + $data2['ms2']['cepat_shift1_premium'] [$i];
                                $banyak_nilai_cepat_shift1++;
                            }
                            if($data2['ms2']['cepat_shift1_solar'] [$i] != -1){
                                $nilai_cepat_shift1 = $nilai_cepat_shift1 + $data2['ms2']['cepat_shift1_solar'] [$i];
                                $banyak_nilai_cepat_shift1++;
                            }
                            if($data2['ms2']['cepat_shift1_pertamax'] [$i] != -1){
                                $nilai_cepat_shift1 = $nilai_cepat_shift1 + $data2['ms2']['cepat_shift1_pertamax'] [$i];
                                $banyak_nilai_cepat_shift1++;
                            }

                            if($data2['ms2']['lambat_premium'] [$i] != -1){
                                $nilai_lambat = $nilai_lambat + $data2['ms2']['lambat_premium'] [$i];
                                $banyak_nilai_lambat++;
                            }
                            if($data2['ms2']['lambat_solar'] [$i] != -1){
                                $nilai_lambat = $nilai_lambat + $data2['ms2']['lambat_solar'] [$i];
                                $banyak_nilai_lambat++;
                            }
                            if($data2['ms2']['lambat_pertamax'] [$i] != -1){
                                $nilai_lambat = $nilai_lambat + $data2['ms2']['lambat_pertamax'] [$i];
                                $banyak_nilai_lambat++;
                            }
                            
                            if($data2['ms2']['tidak_terkirim_premium'] [$i] != -1){
                                $nilai_tidak_terkirim = $nilai_tidak_terkirim + $data2['ms2']['tidak_terkirim_premium'] [$i];
                                $banyak_nilai_tidak_terkirim++;
                            }
                            if($data2['ms2']['tidak_terkirim_solar'] [$i] != -1){
                                $nilai_tidak_terkirim = $nilai_tidak_terkirim + $data2['ms2']['tidak_terkirim_solar'] [$i];
                                $banyak_nilai_tidak_terkirim++;
                            }
                            if($data2['ms2']['tidak_terkirim_pertamax'] [$i] != -1){
                                $nilai_tidak_terkirim = $nilai_tidak_terkirim + $data2['ms2']['tidak_terkirim_pertamax'] [$i];
                                $banyak_nilai_tidak_terkirim++;
                            }
                            
                            if($data2['ms2']['total_lo_premium'] [$i] != -1){
                                $nilai_total_lo = $nilai_total_lo + $data2['ms2']['total_lo_premium'] [$i];
                                $banyak_nilai_total_lo++;
                            }
                            if($data2['ms2']['total_lo_solar'] [$i] != -1){
                                $nilai_total_lo = $nilai_total_lo + $data2['ms2']['total_lo_solar'] [$i];
                                $banyak_nilai_total_lo++;
                            }
                            if($data2['ms2']['total_lo_pertamax'] [$i] != -1){                                
                                $nilai_total_lo = $nilai_total_lo + $data2['ms2']['total_lo_pertamax'] [$i];
                                $banyak_nilai_total_lo++;
                            }
                            
                        }
                        $data2['ms2']['rata_sesuai'] = round($nilai_sesuai / ($banyak_nilai_sesuai), 2);
                        $data2['ms2']['rata_cepat'] = round($nilai_cepat / ($banyak_nilai_cepat), 2);
                        $data2['ms2']['rata_cepat_shift1'] = round($nilai_cepat_shift1 / ($banyak_nilai_cepat_shift1), 2);
                        $data2['ms2']['rata_lambat'] = round($nilai_lambat / ($banyak_nilai_lambat), 2);
                        $data2['ms2']['rata_tidak_terkirim'] = round($nilai_tidak_terkirim / ($banyak_nilai_tidak_terkirim), 2);
                        $data2['ms2']['rata_total_lo'] = round($nilai_total_lo / ($banyak_nilai_total_lo), 2);
                        $data2['ms2']['hasil_akhir'] = $data2['ms2']['rata_sesuai'] + $data2['ms2']['rata_cepat'] + $data2['ms2']['rata_cepat_shift1'];
                    }
                }
            }
        } else if ($this->input->post('simpan')) {
            $data2['klik_simpan'] = true;
            $ms2 = unserialize($this->input->post('data_ms2'));
            $cek_simpan_error = $this->m_laporan->cekMS2($depot, date("Y", strtotime($ms2['blnms2'])), date("m", strtotime($ms2['blnms2'])));

            if ($cek_simpan_error == 0) {
                $data2['simpan_error'] = false;
                $this->m_laporan->simpanMS2($ms2);
                $nama_bulan = $this->input->post('nama_bulan');
                $this->m_laporan->InsertLogSistem($this->session->userdata('id_pegawai'), 'Import MS2 Complience bulan ' . $nama_bulan, 'Tambah');
                $this->m_laporan->SyncKPIOperasional($depot, date("Y", strtotime($ms2['blnms2'])), date("m", strtotime($ms2['blnms2'])));
            } else {
                $data2['simpan_error'] = true;
            }
        }
        $this->header(7, 2);
        $this->load->view('laporan/v_import_ms2', $data2);
        $this->footer();
    }

    public function frm() {
        $this->load->model('m_laporan');
        $depot = $this->session->userdata('id_depot');

        $data2['klik_tambah'] = false;
        $data2['klik_edit'] = false;
        $data2['interpolasi']['status'] = false;

        if ($this->input->post('cek')) {
            $bln_frm = $this->input->post('bln_frm');
        } else if ($this->input->post('edit')) {
            $data2['klik_edit'] = true;
            $bln_frm = $this->input->post('bln_frm');
            $this->m_laporan->editInterpolasi($this->input->post('id_frm1'), $this->input->post('frm1'));
            $this->m_laporan->editInterpolasi($this->input->post('id_frm2'), $this->input->post('frm2'));
            $this->m_laporan->editInterpolasi($this->input->post('id_interpolasi1'), $this->input->post('interpolasi1'));
            $this->m_laporan->editInterpolasi($this->input->post('id_interpolasi2'), $this->input->post('interpolasi2'));

            $nama_bulan = 'ERROR';
            if (date("m", strtotime($bln_frm)) == 1) {
                $nama_bulan = 'Januari ' . date("Y", strtotime($bln_frm));
            } else if (date("m", strtotime($bln_frm)) == 2) {
                $nama_bulan = 'Februari ' . date("Y", strtotime($bln_frm));
            } else if (date("m", strtotime($bln_frm)) == 3) {
                $nama_bulan = 'Maret ' . date("Y", strtotime($bln_frm));
            } else if (date("m", strtotime($bln_frm)) == 4) {
                $nama_bulan = 'April ' . date("Y", strtotime($bln_frm));
            } else if (date("m", strtotime($bln_frm)) == 5) {
                $nama_bulan = 'Mei ' . date("Y", strtotime($bln_frm));
            } else if (date("m", strtotime($bln_frm)) == 6) {
                $nama_bulan = 'Juni ' . date("Y", strtotime($bln_frm));
            } else if (date("m", strtotime($bln_frm)) == 7) {
                $nama_bulan = 'Juli ' . date("Y", strtotime($bln_frm));
            } else if (date("m", strtotime($bln_frm)) == 8) {
                $nama_bulan = 'Agustus ' . date("Y", strtotime($bln_frm));
            } else if (date("m", strtotime($bln_frm)) == 9) {
                $nama_bulan = 'September ' . date("Y", strtotime($bln_frm));
            } else if (date("m", strtotime($bln_frm)) == 10) {
                $nama_bulan = 'Oktober ' . date("Y", strtotime($bln_frm));
            } else if (date("m", strtotime($bln_frm)) == 11) {
                $nama_bulan = 'November ' . date("Y", strtotime($bln_frm));
            } else if (date("m", strtotime($bln_frm)) == 12) {
                $nama_bulan = 'Desember ' . date("Y", strtotime($bln_frm));
            }

            $this->m_laporan->InsertLogSistem($this->session->userdata('id_pegawai'), 'Edit Tarif Interpolasi dan FRM bulan ' . $nama_bulan, 'Edit');
        } else if ($this->input->post('tambah')) {
            $data2['klik_tambah'] = true;

            $bln_frm = $this->input->post('bln_frm');
            $bulan = date("m", strtotime($bln_frm));
            $tahun = date("Y", strtotime($bln_frm));
            $last_day = date("t", strtotime($bln_frm));

            $data2['id_log_frm1'] = $this->m_laporan->getIdLogHarian($depot, $tahun, $bulan, 1);
            $data2['id_log_frm2'] = $this->m_laporan->getIdLogHarian($depot, $tahun, $bulan, 15);
            $data2['id_log_interpolasi1'] = $this->m_laporan->getIdLogHarian($depot, $tahun, $bulan, 1);
            $data2['id_log_interpolasi2'] = $this->m_laporan->getIdLogHarian($depot, $tahun, $bulan, 15);

            $frm1 = $this->input->post('frm1');
            $frm2 = $this->input->post('frm2');
            $interpolasi1 = $this->input->post('interpolasi1');
            $interpolasi2 = $this->input->post('interpolasi2');

            $nama_bulan = 'ERROR';
            if (date("m", strtotime($bln_frm)) == 1) {
                $nama_bulan = 'Januari ' . date("Y", strtotime($bln_frm));
            } else if (date("m", strtotime($bln_frm)) == 2) {
                $nama_bulan = 'Februari ' . date("Y", strtotime($bln_frm));
            } else if (date("m", strtotime($bln_frm)) == 3) {
                $nama_bulan = 'Maret ' . date("Y", strtotime($bln_frm));
            } else if (date("m", strtotime($bln_frm)) == 4) {
                $nama_bulan = 'April ' . date("Y", strtotime($bln_frm));
            } else if (date("m", strtotime($bln_frm)) == 5) {
                $nama_bulan = 'Mei ' . date("Y", strtotime($bln_frm));
            } else if (date("m", strtotime($bln_frm)) == 6) {
                $nama_bulan = 'Juni ' . date("Y", strtotime($bln_frm));
            } else if (date("m", strtotime($bln_frm)) == 7) {
                $nama_bulan = 'Juli ' . date("Y", strtotime($bln_frm));
            } else if (date("m", strtotime($bln_frm)) == 8) {
                $nama_bulan = 'Agustus ' . date("Y", strtotime($bln_frm));
            } else if (date("m", strtotime($bln_frm)) == 9) {
                $nama_bulan = 'September ' . date("Y", strtotime($bln_frm));
            } else if (date("m", strtotime($bln_frm)) == 10) {
                $nama_bulan = 'Oktober ' . date("Y", strtotime($bln_frm));
            } else if (date("m", strtotime($bln_frm)) == 11) {
                $nama_bulan = 'November ' . date("Y", strtotime($bln_frm));
            } else if (date("m", strtotime($bln_frm)) == 12) {
                $nama_bulan = 'Desember ' . date("Y", strtotime($bln_frm));
            }

            if ($data2['id_log_frm1'] == -1) { // id tidak ditemukan
                $data2['status_id'] = false;
            } else {
                $data2['status_id'] = true;
                $data2['status_interpolasi'] = $this->m_laporan->cekInterpolasi($depot, $tahun, $bulan);
                if ($data2['status_interpolasi'] == 0) {
                    $this->m_laporan->tambahInterpolasi($depot, $bulan, $tahun, $data2['id_log_frm1'], $frm1, $data2['id_log_frm2'], $frm2, $data2['id_log_interpolasi1'], $interpolasi1, $data2['id_log_interpolasi2'], $interpolasi2);
                    $this->m_laporan->InsertLogSistem($this->session->userdata('id_pegawai'), 'Tambah Tarif Interpolasi dan FRM bulan ' . $nama_bulan, 'Tambah');
                }
            }
        } else {
            $bln_frm = date('Y-m-d');
        }

        $data2['interpolasi']['bln_frm'] = $bln_frm;

        if (date("m", strtotime($bln_frm)) == 1) {
            $data2 ['interpolasi']['bulan_tahun'] = 'Januari ' . date("Y", strtotime($bln_frm));
        } else if (date("m", strtotime($bln_frm)) == 2) {
            $data2 ['interpolasi']['bulan_tahun'] = 'Februari ' . date("Y", strtotime($bln_frm));
        } else if (date("m", strtotime($bln_frm)) == 3) {
            $data2 ['interpolasi']['bulan_tahun'] = 'Maret ' . date("Y", strtotime($bln_frm));
        } else if (date("m", strtotime($bln_frm)) == 4) {
            $data2 ['interpolasi']['bulan_tahun'] = 'April ' . date("Y", strtotime($bln_frm));
        } else if (date("m", strtotime($bln_frm)) == 5) {
            $data2 ['interpolasi']['bulan_tahun'] = 'Mei ' . date("Y", strtotime($bln_frm));
        } else if (date("m", strtotime($bln_frm)) == 6) {
            $data2 ['interpolasi']['bulan_tahun'] = 'Juni ' . date("Y", strtotime($bln_frm));
        } else if (date("m", strtotime($bln_frm)) == 7) {
            $data2 ['interpolasi']['bulan_tahun'] = 'Juli ' . date("Y", strtotime($bln_frm));
        } else if (date("m", strtotime($bln_frm)) == 8) {
            $data2 ['interpolasi']['bulan_tahun'] = 'Agustus ' . date("Y", strtotime($bln_frm));
        } else if (date("m", strtotime($bln_frm)) == 9) {
            $data2 ['interpolasi']['bulan_tahun'] = 'September ' . date("Y", strtotime($bln_frm));
        } else if (date("m", strtotime($bln_frm)) == 10) {
            $data2 ['interpolasi']['bulan_tahun'] = 'Oktober ' . date("Y", strtotime($bln_frm));
        } else if (date("m", strtotime($bln_frm)) == 11) {
            $data2 ['interpolasi']['bulan_tahun'] = 'November ' . date("Y", strtotime($bln_frm));
        } else if (date("m", strtotime($bln_frm)) == 12) {
            $data2 ['interpolasi']['bulan_tahun'] = 'Desember ' . date("Y", strtotime($bln_frm));
        }

        $tanggal = date("d-m-Y", strtotime($bln_frm));
        $last_day = date('t', strtotime($tanggal));
        $data2['interpolasi']['tanggal_akhir'] = $last_day;

        if ($last_day == $this->m_laporan->cekInterpolasi($depot, date("Y", strtotime($bln_frm)), date("m", strtotime($bln_frm)))) {
            $data2['interpolasi']['status'] = true;
            $frm = $this->m_laporan->getInterpolasi($depot, date("Y", strtotime($bln_frm)), date("m", strtotime($bln_frm)));
            foreach ($frm as $row) {
                $data2['interpolasi']['id_nilai'][] = $row->ID_NILAI;
                $data2['interpolasi']['jenis_penilaian'][] = $row->JENIS_PENILAIAN;
                $data2['interpolasi']['nilai'][] = $row->NILAI;
            }
        }


        $this->header(7, 2);
        $this->load->view('laporan/v_frm', $data2);
        $this->footer();
    }

    public function kpi_operasional() {
        $depot = $this->session->userdata('id_depot');
        $this->load->model('m_laporan');

        $data2['klik_cek'] = false;
        $data2['klik_edit'] = false;
        $data2['klik_tambah'] = false;

        if ($this->input->post('cek')) {
            $data2['klik_cek'] = true;

            $bln_kpi = $this->input->post('bln_kpi');
            $bulan = date("m", strtotime($bln_kpi));
            $tahun = date("Y", strtotime($bln_kpi));

            $data2['kpi'] ['bln_kpi'] = $bln_kpi;
            if ($bulan == 1) {
                $data2['kpi']['nama_bulan'] = 'Januari ' . $tahun;
            } else if ($bulan == 2) {
                $data2['kpi']['nama_bulan'] = 'Februari ' . $tahun;
            } else if ($bulan == 3) {
                $data2['kpi']['nama_bulan'] = 'Maret ' . $tahun;
            } else if ($bulan == 4) {
                $data2['kpi']['nama_bulan'] = 'April ' . $tahun;
            } else if ($bulan == 5) {
                $data2['kpi']['nama_bulan'] = 'Mei ' . $tahun;
            } else if ($bulan == 6) {
                $data2['kpi']['nama_bulan'] = 'Juni ' . $tahun;
            } else if ($bulan == 7) {
                $data2['kpi']['nama_bulan'] = 'Juli ' . $tahun;
            } else if ($bulan == 8) {
                $data2['kpi']['nama_bulan'] = 'Agustus ' . $tahun;
            } else if ($bulan == 9) {
                $data2['kpi']['nama_bulan'] = 'September ' . $tahun;
            } else if ($bulan == 10) {
                $data2['kpi']['nama_bulan'] = 'Oktober ' . $tahun;
            } else if ($bulan == 11) {
                $data2['kpi']['nama_bulan'] = 'November ' . $tahun;
            } else if ($bulan == 12) {
                $data2['kpi']['nama_bulan'] = 'Desember ' . $tahun;
            }

            if ($this->m_laporan->cekKPIOperasional($depot, $tahun, $bulan) != 0) {
                $data2['kpi']['error'] = false;
                $data2['kpi']['data'] = $this->m_laporan->getKPIOperasional($depot, $tahun, $bulan);
            } else {
                $data2['kpi']['error'] = true;
            }
        } else if ($this->input->post('sinkron')) {
            $data2['klik_cek'] = true;

            $bln_kpi = $this->input->post('bln_kpi');
            $bulan = date("m", strtotime($bln_kpi));
            $tahun = date("Y", strtotime($bln_kpi));

            $this->m_laporan->SyncKPIOperasional($depot, $tahun, $bulan);

            $data2['kpi'] ['bln_kpi'] = $bln_kpi;
            if ($bulan == 1) {
                $data2['kpi']['nama_bulan'] = 'Januari ' . $tahun;
            } else if ($bulan == 2) {
                $data2['kpi']['nama_bulan'] = 'Februari ' . $tahun;
            } else if ($bulan == 3) {
                $data2['kpi']['nama_bulan'] = 'Maret ' . $tahun;
            } else if ($bulan == 4) {
                $data2['kpi']['nama_bulan'] = 'April ' . $tahun;
            } else if ($bulan == 5) {
                $data2['kpi']['nama_bulan'] = 'Mei ' . $tahun;
            } else if ($bulan == 6) {
                $data2['kpi']['nama_bulan'] = 'Juni ' . $tahun;
            } else if ($bulan == 7) {
                $data2['kpi']['nama_bulan'] = 'Juli ' . $tahun;
            } else if ($bulan == 8) {
                $data2['kpi']['nama_bulan'] = 'Agustus ' . $tahun;
            } else if ($bulan == 9) {
                $data2['kpi']['nama_bulan'] = 'September ' . $tahun;
            } else if ($bulan == 10) {
                $data2['kpi']['nama_bulan'] = 'Oktober ' . $tahun;
            } else if ($bulan == 11) {
                $data2['kpi']['nama_bulan'] = 'November ' . $tahun;
            } else if ($bulan == 12) {
                $data2['kpi']['nama_bulan'] = 'Desember ' . $tahun;
            }

            if ($this->m_laporan->cekKPIOperasional($depot, $tahun, $bulan) != 0) {
                $data2['kpi']['error'] = false;
                $data2['kpi']['data'] = $this->m_laporan->getKPIOperasional($depot, $tahun, $bulan);
            } else {
                $data2['kpi']['error'] = true;
            }
        } else if ($this->input->post('edit')) {
            $data2['klik_edit'] = true;
            $data2['klik_cek'] = true;

            $bln_kpi = $this->input->post('bln_kpi');
            $bulan = date("m", strtotime($bln_kpi));
            $tahun = date("Y", strtotime($bln_kpi));

            $data2['kpi'] ['bln_kpi'] = $bln_kpi;
            if ($bulan == 1) {
                $data2['kpi']['nama_bulan'] = 'Januari ' . $tahun;
            } else if ($bulan == 2) {
                $data2['kpi']['nama_bulan'] = 'Februari ' . $tahun;
            } else if ($bulan == 3) {
                $data2['kpi']['nama_bulan'] = 'Maret ' . $tahun;
            } else if ($bulan == 4) {
                $data2['kpi']['nama_bulan'] = 'April ' . $tahun;
            } else if ($bulan == 5) {
                $data2['kpi']['nama_bulan'] = 'Mei ' . $tahun;
            } else if ($bulan == 6) {
                $data2['kpi']['nama_bulan'] = 'Juni ' . $tahun;
            } else if ($bulan == 7) {
                $data2['kpi']['nama_bulan'] = 'Juli ' . $tahun;
            } else if ($bulan == 8) {
                $data2['kpi']['nama_bulan'] = 'Agustus ' . $tahun;
            } else if ($bulan == 9) {
                $data2['kpi']['nama_bulan'] = 'September ' . $tahun;
            } else if ($bulan == 10) {
                $data2['kpi']['nama_bulan'] = 'Oktober ' . $tahun;
            } else if ($bulan == 11) {
                $data2['kpi']['nama_bulan'] = 'November ' . $tahun;
            } else if ($bulan == 12) {
                $data2['kpi']['nama_bulan'] = 'Desember ' . $tahun;
            }

            // KPI NO 1
            $id_kpi1 = $this->input->post('id_kpi1');
            $kpitarget1 = $this->input->post('kpitarget1');
            $bobot1 = 30 / 100;
            $kpirealisasi1 = $this->input->post('kpirealisasi1');
            $deviasi1 = round($kpirealisasi1 - $kpitarget1, 2);
            $performance_score1 = round($kpirealisasi1 / $kpitarget1 * 100, 2);
            $normal_score1 = 0;
            if ($performance_score1 < 0) {
                $normal_score1 = 0.00;
            } else if ($performance_score1 > 120) {
                $normal_score1 = 120.00;
            } else {
                $normal_score1 = $performance_score1;
            } $weighted_score1 = round($normal_score1 * $bobot1, 2);
            $this->m_laporan->editKPIOperasional($id_kpi1, $kpitarget1, $kpirealisasi1, $deviasi1, $performance_score1, $normal_score1, $weighted_score1);

            // KPI NO 2
            $id_kpi2 = $this->input->post('id_kpi2');
            $kpitarget2 = $this->input->post('kpitarget2');
            $bobot2 = 25 / 100;
            $kpirealisasi2 = $this->input->post('kpirealisasi2');
            $deviasi2 = round($kpirealisasi2 - $kpitarget2, 2);
            $performance_score2 = round($kpirealisasi2 / $kpitarget2 * 100, 2);
            $normal_score2 = 0;
            if ($performance_score2 < 0) {
                $normal_score2 = 0.00;
            } else if ($performance_score2 > 120) {
                $normal_score2 = 120.00;
            } else {
                $normal_score2 = $performance_score2;
            } $weighted_score2 = round($normal_score2 * $bobot2, 2);
            $this->m_laporan->editKPIOperasional($id_kpi2, $kpitarget2, $kpirealisasi2, $deviasi2, $performance_score2, $normal_score2, $weighted_score2);


            // KPI NO 3
            $id_kpi3 = $this->input->post('id_kpi3');
            $kpitarget3 = $this->input->post('kpitarget3');
            $bobot3 = 5 / 100;
            $kpirealisasi3 = $this->input->post('kpirealisasi3');
            $deviasi3 = round($kpirealisasi3 - $kpitarget3, 2);
            $performance_score3 = 0;
            if ($kpirealisasi3 < 5) {
                $performance_score3 = 120.00;
            } else if ($kpirealisasi3 == 5) {
                $performance_score3 = 100.00;
            } else if ($kpirealisasi3 <= 8) {
                $performance_score3 = 70.00;
            } else if ($kpirealisasi3 <= 11) {
                $performance_score3 = 50.00;
            } else {
                $performance_score3 = 0.00;
            }

            $normal_score3 = 0;
            if ($performance_score3 < 0) {
                $normal_score3 = 0.00;
            } else if ($performance_score3 > 120) {
                $normal_score3 = 120.00;
            } else {
                $normal_score3 = $performance_score3;
            } $weighted_score3 = round($normal_score3 * $bobot3, 2);
            $this->m_laporan->editKPIOperasional($id_kpi3, $kpitarget3, $kpirealisasi3, $deviasi3, $performance_score3, $normal_score3, $weighted_score3);


            // KPI NO 4
            $id_kpi4 = $this->input->post('id_kpi4');
            $kpitarget4 = $this->input->post('kpitarget4');
            $bobot4 = 5 / 100;
            $kpirealisasi4 = $this->input->post('kpirealisasi4');
            $deviasi4 = round($kpirealisasi4 - $kpitarget4, 2);
            $performance_score4 = round($kpirealisasi4 / $kpitarget4 * 100, 2);

            $normal_score4 = 0;
            if ($performance_score4 < 0) {
                $normal_score4 = 0.00;
            } else if ($performance_score4 > 120) {
                $normal_score4 = 120.00;
            } else {
                $normal_score4 = $performance_score4;
            } $weighted_score4 = round($normal_score4 * $bobot4, 2);
            $this->m_laporan->editKPIOperasional($id_kpi4, $kpitarget4, $kpirealisasi4, $deviasi4, $performance_score4, $normal_score4, $weighted_score4);


            // KPI NO 5
            $id_kpi5 = $this->input->post('id_kpi5');
            $kpitarget5 = $this->input->post('kpitarget5');
            $bobot5 = 5 / 100;
            $kpirealisasi5 = $this->input->post('kpirealisasi5');
            $deviasi5 = round($kpirealisasi5 - $kpitarget5, 2);

            $performance_score5 = 0;
            if ($kpirealisasi5 == 0) {
                $performance_score5 = 120;
            } else if ($kpirealisasi5 == 1) {
                $performance_score5 = 90;
            } else if ($kpirealisasi5 == 2) {
                $performance_score5 = 80;
            } else if ($kpirealisasi5 == 3) {
                $performance_score5 = 70;
            } else if ($kpirealisasi5 == 4) {
                $performance_score5 = 60;
            } else if ($kpirealisasi5 == 5) {
                $performance_score5 = 50;
            } else {
                $performance_score5 = 0;
            }

            $normal_score5 = 0;
            if ($performance_score5 < 0) {
                $normal_score5 = 0.00;
            } else if ($performance_score5 > 120) {
                $normal_score5 = 120.00;
            } else {
                $normal_score5 = $performance_score5;
            } $weighted_score5 = round($normal_score5 * $bobot5, 2);
            $this->m_laporan->editKPIOperasional($id_kpi5, $kpitarget5, $kpirealisasi5, $deviasi5, $performance_score5, $normal_score5, $weighted_score5);

            // KPI NO 6
            $id_kpi6 = $this->input->post('id_kpi6');
            $kpitarget6 = $this->input->post('kpitarget6');
            $bobot6 = 5 / 100;
            $kpirealisasi6 = $this->input->post('kpirealisasi6');
            $deviasi6 = round($kpirealisasi6 - $kpitarget6, 2);
            $performance_score6 = round($kpirealisasi6 / $kpitarget6 * 100, 2);

            $normal_score6 = 0;
            if ($performance_score6 < 0) {
                $normal_score6 = 0.00;
            } else if ($performance_score6 > 120) {
                $normal_score6 = 120.00;
            } else {
                $normal_score6 = $performance_score6;
            } $weighted_score6 = round($normal_score6 * $bobot6, 2);
            $this->m_laporan->editKPIOperasional($id_kpi6, $kpitarget6, $kpirealisasi6, $deviasi6, $performance_score6, $normal_score6, $weighted_score6);

            // KPI NO 7
            $id_kpi7 = $this->input->post('id_kpi7');
            $kpitarget7 = $this->input->post('kpitarget7');
            $bobot7 = 5 / 100;
            $kpirealisasi7 = $this->input->post('kpirealisasi7');
            $deviasi7 = round($kpirealisasi7 - $kpitarget7, 2);
            $performance_score7 = round($kpirealisasi7 / $kpitarget7 * 100, 2);

            $normal_score7 = 0;
            if ($performance_score7 < 0) {
                $normal_score7 = 0.00;
            } else if ($performance_score7 > 120) {
                $normal_score7 = 120.00;
            } else {
                $normal_score7 = $performance_score7;
            } $weighted_score7 = round($normal_score7 * $bobot7, 2);
            $this->m_laporan->editKPIOperasional($id_kpi7, $kpitarget7, $kpirealisasi7, $deviasi7, $performance_score7, $normal_score7, $weighted_score7);

            // KPI NO 8
            $id_kpi8 = $this->input->post('id_kpi8');
            $kpitarget8 = $this->input->post('kpitarget8');
            $bobot8 = 10 / 100;
            $kpirealisasi8 = $this->input->post('kpirealisasi8');
            $deviasi8 = round($kpirealisasi8 - $kpitarget8, 2);

            $performance_score8 = 0;
            if ($kpirealisasi8 == 0) {
                $performance_score8 = 120;
            } else if ($kpirealisasi8 == 1) {
                $performance_score8 = 90;
            } else if ($kpirealisasi8 == 2) {
                $performance_score8 = 80;
            } else if ($kpirealisasi8 == 3) {
                $performance_score8 = 70;
            } else if ($kpirealisasi8 == 4) {
                $performance_score8 = 60;
            } else if ($kpirealisasi8 == 5) {
                $performance_score8 = 50;
            } else {
                $performance_score8 = 0;
            }

            $normal_score8 = 0;
            if ($performance_score8 < 0) {
                $normal_score8 = 0.00;
            } else if ($performance_score8 > 120) {
                $normal_score8 = 120.00;
            } else {
                $normal_score8 = $performance_score8;
            } $weighted_score8 = round($normal_score8 * $bobot8, 2);
            $this->m_laporan->editKPIOperasional($id_kpi8, $kpitarget8, $kpirealisasi8, $deviasi8, $performance_score8, $normal_score8, $weighted_score8);

            // KPI NO 9
            $id_kpi9 = $this->input->post('id_kpi9');
            $kpitarget9 = $this->input->post('kpitarget9');
            $bobot9 = 10 / 100;
            $kpirealisasi9 = $this->input->post('kpirealisasi9');
            $deviasi9 = round($kpirealisasi9 - $kpitarget9, 2);

            $performance_score9 = 0;
            if ($kpirealisasi9 <= 5) {
                $performance_score9 = 120;
            } else if ($kpirealisasi9 <= 7) {
                $performance_score9 = round(( (($kpirealisasi9 - 5) / ($kpitarget9 - 5) * 20 / 100) + 1) * 100, 2);
            } else if ($kpirealisasi9 <= 9) {
                $performance_score9 = round((1 - ($kpirealisasi9 - $kpitarget9) / (9 - $kpitarget9) * 20 / 100) * 100, 2);
            } else {
                $performance_score9 = 0;
            }

            $normal_score9 = 0;
            if ($performance_score9 < 0) {
                $normal_score9 = 0.00;
            } else if ($performance_score9 > 120) {
                $normal_score9 = 120.00;
            } else {
                $normal_score9 = $performance_score9;
            } $weighted_score9 = round($normal_score9 * $bobot9, 2);
            $this->m_laporan->editKPIOperasional($id_kpi9, $kpitarget9, $kpirealisasi9, $deviasi9, $performance_score9, $normal_score9, $weighted_score9);

            // KPI NO 10
            $id_kpi10 = $this->input->post('id_kpi10');
            $kpitarget10 = $this->input->post('kpitarget10');
            $bobot10 = 0;
            $kpirealisasi10 = $this->input->post('kpirealisasi10');
            $deviasi10 = 0;
            $performance_score10 = 0;
            $normal_score10 = 0;
            $weighted_score10 = 0;
            $this->m_laporan->editKPIOperasional($id_kpi10, $kpitarget10, $kpirealisasi10, $deviasi10, $performance_score10, $normal_score10, $weighted_score10);

            $this->m_laporan->SyncKPIOperasional($depot, $tahun, $bulan);
            $this->m_laporan->InsertLogSistem($this->session->userdata('id_pegawai'), 'Edit KPI Operasional bulan ' . $data2['kpi']['nama_bulan'], 'Edit');

            if ($this->m_laporan->cekKPIOperasional($depot, $tahun, $bulan) != 0) {
                $data2['kpi']['error'] = false;
                $data2['kpi']['data'] = $this->m_laporan->getKPIOperasional($depot, $tahun, $bulan);
            } else {
                $data2['kpi']['error'] = true;
            }
        } else if ($this->input->post('tambah')) {
            $data2['klik_tambah'] = true;

            $bln_kpi = $this->input->post('bln_kpi');
            $bulan = date("m", strtotime($bln_kpi));
            $tahun = date("Y", strtotime($bln_kpi));

            $id_log_harian = $this->m_laporan->getIdLogHarian($depot, $tahun, $bulan, 1);

            $data2['kpi'] ['bln_kpi'] = $bln_kpi;
            if ($bulan == 1) {
                $data2['kpi']['nama_bulan'] = 'Januari ' . $tahun;
            } else if ($bulan == 2) {
                $data2['kpi']['nama_bulan'] = 'Februari ' . $tahun;
            } else if ($bulan == 3) {
                $data2['kpi']['nama_bulan'] = 'Maret ' . $tahun;
            } else if ($bulan == 4) {
                $data2['kpi']['nama_bulan'] = 'April ' . $tahun;
            } else if ($bulan == 5) {
                $data2['kpi']['nama_bulan'] = 'Mei ' . $tahun;
            } else if ($bulan == 6) {
                $data2['kpi']['nama_bulan'] = 'Juni ' . $tahun;
            } else if ($bulan == 7) {
                $data2['kpi']['nama_bulan'] = 'Juli ' . $tahun;
            } else if ($bulan == 8) {
                $data2['kpi']['nama_bulan'] = 'Agustus ' . $tahun;
            } else if ($bulan == 9) {
                $data2['kpi']['nama_bulan'] = 'September ' . $tahun;
            } else if ($bulan == 10) {
                $data2['kpi']['nama_bulan'] = 'Oktober ' . $tahun;
            } else if ($bulan == 11) {
                $data2['kpi']['nama_bulan'] = 'November ' . $tahun;
            } else if ($bulan == 12) {
                $data2['kpi']['nama_bulan'] = 'Desember ' . $tahun;
            }


            if ($this->m_laporan->cekKPIOperasional($depot, $tahun, $bulan) == 0) {
                $data2['kpi']['error'] = false;
            } else {
                $data2['kpi']['error'] = true;
            } if ($this->m_laporan->cekMS2($depot, $tahun, $bulan) > 0) {
                $data2['kpi']['error_ms2'] = false;
            } else {
                $data2['kpi']['error_ms2'] = true;
            } if ($this->m_laporan->cekRencana($depot, $tahun, $bulan) > 0) {
                $data2['kpi']['error_rencana'] = false;
            } else {
                $data2['kpi']['error_rencana'] = true;
            } if ($this->m_laporan->cekKinerja($depot, $tahun, $bulan) > 0) {
                $data2['kpi']['error_kinerja'] = false;
            } else {
                $data2['kpi']['error_kinerja'] = true;
            }

            if ($data2['kpi']['error'] == false && $data2['kpi']['error_ms2'] == false && $data2['kpi']['error_rencana'] == false && $data2['kpi']['error_kinerja'] == false) {
                //insert kpi ke sini
                // KPI NO 1
                $kpitarget1 = $this->input->post('kpitarget1');
                $bobot1 = 30 / 100;
                $kpirealisasi1 = $this->m_laporan->getTotalMS2KPI($depot, $tahun, $bulan);
                //$kpirealisasi1 = 99.54;
                $deviasi1 = round($kpirealisasi1 - $kpitarget1, 2);
                $performance_score1 = round($kpirealisasi1 / $kpitarget1 * 100, 2);
                $normal_score1 = 0;
                if ($performance_score1 < 0) {
                    $normal_score1 = 0.00;
                } else if ($performance_score1 > 120) {
                    $normal_score1 = 120.00;
                } else {
                    $normal_score1 = $performance_score1;
                } $weighted_score1 = round($normal_score1 * $bobot1, 2);

                // KPI NO 2
                $kpitarget2 = $this->input->post('kpitarget2');
                $bobot2 = 25 / 100;
                $kpirealisasi2 = $this->m_laporan->getTotalRealisaasiKPI($depot, $tahun, $bulan);
                //$kpirealisasi2 = 101.59;
                $deviasi2 = round($kpirealisasi2 - $kpitarget2, 2);
                $performance_score2 = round($kpirealisasi2 / $kpitarget2 * 100, 2);
                $normal_score2 = 0;
                if ($performance_score2 < 0) {
                    $normal_score2 = 0.00;
                } else if ($performance_score2 > 120) {
                    $normal_score2 = 120.00;
                } else {
                    $normal_score2 = $performance_score2;
                } $weighted_score2 = round($normal_score2 * $bobot2, 2);

                // KPI NO 3
                $id_kpi3 = $this->input->post('id_kpi3');
                $kpitarget3 = $this->input->post('kpitarget3');
                $bobot3 = 5 / 100;
                $kpirealisasi3 = $this->input->post('kpirealisasi3');
                $deviasi3 = round($kpirealisasi3 - $kpitarget3, 2);
                $performance_score3 = 0;
                if ($kpirealisasi3 < 5) {
                    $performance_score3 = 120.00;
                } else if ($kpirealisasi3 == 5) {
                    $performance_score3 = 100.00;
                } else if ($kpirealisasi3 <= 8) {
                    $performance_score3 = 70.00;
                } else if ($kpirealisasi3 <= 11) {
                    $performance_score3 = 50.00;
                } else {
                    $performance_score3 = 0.00;
                }

                $normal_score3 = 0;
                if ($performance_score3 < 0) {
                    $normal_score3 = 0.00;
                } else if ($performance_score3 > 120) {
                    $normal_score3 = 120.00;
                } else {
                    $normal_score3 = $performance_score3;
                } $weighted_score3 = round($normal_score3 * $bobot3, 2);

                // KPI NO 4
                $id_kpi4 = $this->input->post('id_kpi4');
                $kpitarget4 = $this->input->post('kpitarget4');
                $bobot4 = 5 / 100;
                $kpirealisasi4 = $this->input->post('kpirealisasi4');
                $deviasi4 = round($kpirealisasi4 - $kpitarget4, 2);
                $performance_score4 = round($kpirealisasi4 / $kpitarget4 * 100, 2);

                $normal_score4 = 0;
                if ($performance_score4 < 0) {
                    $normal_score4 = 0.00;
                } else if ($performance_score4 > 120) {
                    $normal_score4 = 120.00;
                } else {
                    $normal_score4 = $performance_score4;
                } $weighted_score4 = round($normal_score4 * $bobot4, 2);

                // KPI NO 5
                $id_kpi5 = $this->input->post('id_kpi5');
                $kpitarget5 = $this->input->post('kpitarget5');
                $bobot5 = 5 / 100;
                $kpirealisasi5 = $this->input->post('kpirealisasi5');
                $deviasi5 = round($kpirealisasi5 - $kpitarget5, 2);

                $performance_score5 = 0;
                if ($kpirealisasi5 == 0) {
                    $performance_score5 = 120;
                } else if ($kpirealisasi5 == 1) {
                    $performance_score5 = 90;
                } else if ($kpirealisasi5 == 2) {
                    $performance_score5 = 80;
                } else if ($kpirealisasi5 == 3) {
                    $performance_score5 = 70;
                } else if ($kpirealisasi5 == 4) {
                    $performance_score5 = 60;
                } else if ($kpirealisasi5 == 5) {
                    $performance_score5 = 50;
                } else {
                    $performance_score5 = 0;
                }

                $normal_score5 = 0;
                if ($performance_score5 < 0) {
                    $normal_score5 = 0.00;
                } else if ($performance_score5 > 120) {
                    $normal_score5 = 120.00;
                } else {
                    $normal_score5 = $performance_score5;
                } $weighted_score5 = round($normal_score5 * $bobot5, 2);

                // KPI NO 6
                $id_kpi6 = $this->input->post('id_kpi6');
                $kpitarget6 = $this->input->post('kpitarget6');
                $bobot6 = 5 / 100;
                $kpirealisasi6 = $this->input->post('kpirealisasi6');
                $deviasi6 = round($kpirealisasi6 - $kpitarget6, 2);
                $performance_score6 = round($kpirealisasi6 / $kpitarget6 * 100, 2);

                $normal_score6 = 0;
                if ($performance_score6 < 0) {
                    $normal_score6 = 0.00;
                } else if ($performance_score6 > 120) {
                    $normal_score6 = 120.00;
                } else {
                    $normal_score6 = $performance_score6;
                } $weighted_score6 = round($normal_score6 * $bobot6, 2);

                // KPI NO 7
                $id_kpi7 = $this->input->post('id_kpi7');
                $kpitarget7 = $this->input->post('kpitarget7');
                $bobot7 = 5 / 100;
                $kpirealisasi7 = $this->input->post('kpirealisasi7');
                $deviasi7 = round($kpirealisasi7 - $kpitarget7, 2);
                $performance_score7 = round($kpirealisasi7 / $kpitarget7 * 100, 2);

                $normal_score7 = 0;
                if ($performance_score7 < 0) {
                    $normal_score7 = 0.00;
                } else if ($performance_score7 > 120) {
                    $normal_score7 = 120.00;
                } else {
                    $normal_score7 = $performance_score7;
                } $weighted_score7 = round($normal_score7 * $bobot7, 2);


                // KPI NO 8
                $id_kpi8 = $this->input->post('id_kpi8');
                $kpitarget8 = $this->input->post('kpitarget8');
                $bobot8 = 10 / 100;
                $kpirealisasi8 = $this->input->post('kpirealisasi8');
                $deviasi8 = round($kpirealisasi8 - $kpitarget8, 2);

                $performance_score8 = 0;
                if ($kpirealisasi8 == 0) {
                    $performance_score8 = 120;
                } else if ($kpirealisasi8 == 1) {
                    $performance_score8 = 90;
                } else if ($kpirealisasi8 == 2) {
                    $performance_score8 = 80;
                } else if ($kpirealisasi8 == 3) {
                    $performance_score8 = 70;
                } else if ($kpirealisasi8 == 4) {
                    $performance_score8 = 60;
                } else if ($kpirealisasi8 == 5) {
                    $performance_score8 = 50;
                } else {
                    $performance_score8 = 0;
                }

                $normal_score8 = 0;
                if ($performance_score8 < 0) {
                    $normal_score8 = 0.00;
                } else if ($performance_score8 > 120) {
                    $normal_score8 = 120.00;
                } else {
                    $normal_score8 = $performance_score8;
                } $weighted_score8 = round($normal_score8 * $bobot8, 2);



                // KPI NO 9
                $id_kpi9 = $this->input->post('id_kpi9');
                $kpitarget9 = $this->input->post('kpitarget9');
                $bobot9 = 10 / 100;
                $kpirealisasi9 = $this->input->post('kpirealisasi9');
                $deviasi9 = round($kpirealisasi9 - $kpitarget9, 2);

                $performance_score9 = 0;
                if ($kpirealisasi9 <= 5) {
                    $performance_score9 = 120;
                } else if ($kpirealisasi9 <= 7) {
                    $performance_score9 = round(( (($kpirealisasi9 - 5) / ($kpitarget9 - 5) * 20 / 100) + 1) * 100, 2);
                } else if ($kpirealisasi9 <= 9) {
                    $performance_score9 = round((1 - ($kpirealisasi9 - $kpitarget9) / (9 - $kpitarget9) * 20 / 100) * 100, 2);
                } else {
                    $performance_score9 = 0;
                }

                $normal_score9 = 0;
                if ($performance_score9 < 0) {
                    $normal_score9 = 0.00;
                } else if ($performance_score9 > 120) {
                    $normal_score9 = 120.00;
                } else {
                    $normal_score9 = $performance_score9;
                } $weighted_score9 = round($normal_score9 * $bobot9, 2);

                // KPI NO 10
                $id_kpi10 = $this->input->post('id_kpi10');
                $kpitarget10 = $this->input->post('kpitarget10');
                $bobot10 = 0;
                $kpirealisasi10 = $this->input->post('kpirealisasi10');
                $deviasi10 = 0;
                $performance_score10 = 0;
                $normal_score10 = 0;
                $weighted_score10 = 0;

                $bobot1 = $bobot1 * 100;
                $bobot2 = $bobot2 * 100;
                $bobot3 = $bobot3 * 100;
                $bobot4 = $bobot4 * 100;
                $bobot5 = $bobot5 * 100;
                $bobot6 = $bobot6 * 100;
                $bobot7 = $bobot7 * 100;
                $bobot8 = $bobot8 * 100;
                $bobot9 = $bobot9 * 100;
                $bobot10 = $bobot10 * 100;
                
                //TOTAL KPI
                $total_kpi = $weighted_score1 + $weighted_score2 + $weighted_score3 + $weighted_score4 + $weighted_score5 + $weighted_score6 + $weighted_score7 + $weighted_score8 + $weighted_score9 + $weighted_score10;

                $this->m_laporan->tambahKPIOperasional($depot, $bulan, $tahun, $id_log_harian, $kpitarget1, $bobot1, $kpirealisasi1, $deviasi1, $performance_score1, $normal_score1, $weighted_score1, $kpitarget2, $bobot2, $kpirealisasi2, $deviasi2, $performance_score2, $normal_score2, $weighted_score2, $kpitarget3, $bobot3, $kpirealisasi3, $deviasi3, $performance_score3, $normal_score3, $weighted_score3, $kpitarget4, $bobot4, $kpirealisasi4, $deviasi4, $performance_score4, $normal_score4, $weighted_score4, $kpitarget5, $bobot5, $kpirealisasi5, $deviasi5, $performance_score5, $normal_score5, $weighted_score5, $kpitarget6, $bobot6, $kpirealisasi6, $deviasi6, $performance_score6, $normal_score6, $weighted_score6, $kpitarget7, $bobot7, $kpirealisasi7, $deviasi7, $performance_score7, $normal_score7, $weighted_score7, $kpitarget8, $bobot8, $kpirealisasi8, $deviasi8, $performance_score8, $normal_score8, $weighted_score8, $kpitarget9, $bobot9, $kpirealisasi9, $deviasi9, $performance_score9, $normal_score9, $weighted_score9, $kpitarget10, $bobot10, $kpirealisasi10, $deviasi10, $performance_score10, $normal_score10, $weighted_score10, $total_kpi);

                $this->m_laporan->InsertLogSistem($this->session->userdata('id_pegawai'), 'Tambah KPI Operasional bulan ' . $data2['kpi']['nama_bulan'], 'Tambah');
            }
        } else {
            $data2['klik_cek'] = true;

            $bln_kpi = date('Y-m');
            $bulan = date("m", strtotime($bln_kpi));
            $tahun = date("Y", strtotime($bln_kpi));

            $data2['kpi'] ['bln_kpi'] = $bln_kpi;
            if ($bulan == 1) {
                $data2['kpi']['nama_bulan'] = 'Januari ' . $tahun;
            } else if ($bulan == 2) {
                $data2['kpi']['nama_bulan'] = 'Februari ' . $tahun;
            } else if ($bulan == 3) {
                $data2['kpi']['nama_bulan'] = 'Maret ' . $tahun;
            } else if ($bulan == 4) {
                $data2['kpi']['nama_bulan'] = 'April ' . $tahun;
            } else if ($bulan == 5) {
                $data2['kpi']['nama_bulan'] = 'Mei ' . $tahun;
            } else if ($bulan == 6) {
                $data2['kpi']['nama_bulan'] = 'Juni ' . $tahun;
            } else if ($bulan == 7) {
                $data2['kpi']['nama_bulan'] = 'Juli ' . $tahun;
            } else if ($bulan == 8) {
                $data2['kpi']['nama_bulan'] = 'Agustus ' . $tahun;
            } else if ($bulan == 9) {
                $data2['kpi']['nama_bulan'] = 'September ' . $tahun;
            } else if ($bulan == 10) {
                $data2['kpi']['nama_bulan'] = 'Oktober ' . $tahun;
            } else if ($bulan == 11) {
                $data2['kpi']['nama_bulan'] = 'November ' . $tahun;
            } else if ($bulan == 12) {
                $data2['kpi']['nama_bulan'] = 'Desember ' . $tahun;
            }

            if ($this->m_laporan->cekKPIOperasional($depot, $tahun, $bulan) != 0) {
                $data2['kpi']['error'] = false;
                $data2['kpi']['data'] = $this->m_laporan->getKPIOperasional($depot, $tahun, $bulan);
            } else {
                $data2['kpi']['error'] = true;
            }
        }


        $this->header(7, 2);
        $this->load->view('laporan/v_kpi_operasional', $data2);
        $this->footer();
    }

    public function kpi_internal() {
        $this->load->model('m_laporan');
        $depot = $this->session->userdata('id_depot');
        $tahun = date('Y');
        $bulan = date('m');
        $jenis = 'Triwulan I';
        if ($bulan <= 12) {
            $jenis = 'Triwulan IV';
        } else if ($bulan <= 9) {
            $jenis = 'Triwulan III';
        } else if ($bulan <= 6) {
            $jenis = 'Triwulan II';
        } else if ($bulan <= 3) {
            $jenis = 'Triwulan I';
        }

        $data2['edit_kpi'] = false;

        if ($this->input->post('cek')) {
            $tahun = $this->input->post('tahun');
            $jenis = $this->input->post('jenis');
        } else if ($this->input->post('edit_triwulan')) {
            $tahun = $this->input->post('tahun');
            $jenis = $this->input->post('jenis');
            $id = $this->input->post('id_kpi_internal');
            $edit_bobot = $this->input->post('edit_bobot');
            $edit_base = $this->input->post('edit_base');
            $edit_stretch = $this->input->post('edit_stretch');
            $edit_bulan1 = $this->input->post('edit_bulan1');
            $edit_bulan2 = $this->input->post('edit_bulan2');
            $edit_bulan3 = $this->input->post('edit_bulan3');
            $this->m_laporan->editKPIInternal($id, $jenis, $edit_bobot, $edit_base, $edit_stretch, $edit_bulan1, $edit_bulan2, $edit_bulan3);
            $this->m_laporan->InsertLogSistem($this->session->userdata('id_pegawai'), 'Ubah KPI Internal ' . $jenis . ' ' . $tahun, 'Edit');
            $data2['edit_kpi'] = true;
        } else if ($this->input->post('sinkron')) {
            $tahun = $this->input->post('tahun');
            $jenis = $this->input->post('jenis');
            $this->m_laporan->SyncKPIInternal($depot, $tahun, $jenis);
        }

        $data2['tahun_kpi'] = $tahun;
        $data2['jenis_kpi'] = $jenis;

        $bulan_awal = 1;
        $bulan_akhir = 1;
        if ($jenis == "Triwulan I") {
            $bulan_awal = 1;
            $bulan_akhir = 3;
        } else if ($jenis == "Triwulan II") {
            $bulan_awal = 4;
            $bulan_akhir = 6;
        } else if ($jenis == "Triwulan III") {
            $bulan_awal = 7;
            $bulan_akhir = 9;
        } else if ($jenis == "Triwulan IV") {
            $bulan_awal = 10;
            $bulan_akhir = 12;
        }

        $data2['status_ada_kpi'] = $this->m_laporan->cetKPIInternal($tahun, $depot, $bulan_awal, $bulan_akhir);
        if ($data2['status_ada_kpi'] > 0) {
            $data2['data_kpi'] = $this->m_laporan->getKPIInternal($tahun, $depot);
        }

        $this->header(7, 3);
        $this->load->view('laporan/v_kpi_internal', $data2);
        $this->footer();
    }

    public function tambah_kpi_internal() {
        $depot = $this->session->userdata('id_depot');
        $this->load->model('m_laporan');

        $data2['status_tambah'] = false;
        $data2['status_ada'] = true;

        if ($this->input->post('tambah')) {

            $tahun = $this->input->post('tahun');
            $jenis = $this->input->post('jenis');

            $data2['tahun_kpi'] = $tahun;
            $data2['jenis_kpi'] = $jenis;

            $bulan_awal = 1;
            $bulan_akhir = 12;
            if ($jenis == "Total") {
                $bulan_awal = 1;
                $bulan_akhir = 1;
            } else if ($jenis == "Triwulan I") {
                $bulan_awal = 2;
                $bulan_akhir = 3;
            } else if ($jenis == "Triwulan II") {
                $bulan_awal = 4;
                $bulan_akhir = 6;
            } else if ($jenis == "Triwulan III") {
                $bulan_awal = 7;
                $bulan_akhir = 9;
            } else if ($jenis == "Triwulan IV") {
                $bulan_awal = 10;
                $bulan_akhir = 12;
            }

            $data2['status_ada_kpi'] = $this->m_laporan->cetKPIInternal($tahun, $depot, $bulan_awal, $bulan_akhir);
            if ($data2['status_ada_kpi'] == 0) {
                $data2['status_ada'] = false;
                $id_log_harian = $this->m_laporan->getIdLogHarian($depot, $tahun, 1, 1);

                //input disini
                $i = 35;
                for ($i = 35; $i <= 77; $i++) {
                    $id_jenis = $this->input->post('id_index_' . $i);
                    $bobot = $this->input->post('bobot_index_' . $i);
                    $base = $this->input->post('base_index_' . $i);
                    $stretch = $this->input->post('stretch_index_' . $i);
                    $bulan1 = $this->input->post('bulan1_index_' . $i);
                    $bulan2 = $this->input->post('bulan3_index_' . $i);
                    $bulan3 = $this->input->post('bulan3_index_' . $i);
                    if ($bulan_akhir == 1) {
                        $this->m_laporan->tambahKPIInternalTahun($id_log_harian, $id_jenis, $bobot, $base, $stretch);
                    } else {
                        $this->m_laporan->tambahKPIInternalTriwulan($id_log_harian, $id_jenis, $bobot, $base, $stretch, $bulan1, $bulan2, $bulan3, $jenis);
                    }
                }
                $this->m_laporan->setStatusKPIInternal($depot, $tahun, $bulan_awal, $bulan_akhir);
                $this->m_laporan->InsertLogSistem($this->session->userdata('id_pegawai'), 'Tambah KPI Internal ' . $jenis . ' tahun ' . $tahun, 'Tambah');
            }
            $data2['status_tambah'] = true;
        }

        $this->header(7, 3);
        $this->load->view('laporan/v_tambah_kpi_internal', $data2);
        $this->footer();
    }

    public function preview_harian() {
        $this->load->model('m_laporan');
        $depot = $this->session->userdata('id_depot');
        $data2['laporan_ada'] = false;

        if (!$this->input->post('cek')) {
            redirect('laporan/harian');
        } else {
            $bulan_input = $this->input->post('bulan');
            $pjs = trim($this->input->post('pjs'));
            $tanggal = date("d-m-Y", strtotime($bulan_input));
            $bulan = date("m", strtotime($bulan_input));
            $tahun = date("Y", strtotime($bulan_input));
            $last_day = date('t', strtotime($tanggal));
            $data_depot = $this->m_laporan->getInfoDepot($depot);
            $hasil_rencana_realisasi = $this->m_laporan->getRencanaRealisasi($depot, $tahun, $bulan);
            $data_performansi = $this->m_laporan->getPerformansiHarian($depot, $tahun, $bulan); // RITASE, KM, KL, SPBU untuk AMT
            $jumlah_data_performansi = $data_performansi->num_rows();
            $hasil_data_performansi = $data_performansi->result();
            $data = $this->m_laporan->getLaporanHarian($depot, $tahun, $bulan); // Ritase, KM, KL, OU untuk MT
            $jumlah_data = $data->num_rows();
            $hasil_data = $data->result();

            $column_name = array("A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z", "AA", "AB", "AC", "AD", "AE", "AF", "AG", "AH", "AI", "AJ", "AK", "AL", "AM", "AN", "AO");
            $month_name = array("01" => "Januari", "02" => "Februari", "03" => "Maret", "04" => "April", "05" => "Mei", "06" => "Juni", "07" => "Juli", "08" => "Agustus", "09" => "September", "10" => "Oktober", "11" => "November", "12" => "Desember");

            if ($jumlah_data > 0) {
                $data2['laporan_ada'] = true;
                $this->load->library('PHPExcel/Classes/PHPExcel');
                $inputFileName = './data_laporan/template/harian.xls';

                $objReader = PHPExcel_IOFactory::createReader('Excel5');
                $objPHPExcel = $objReader->load($inputFileName);

                // Set document properties
                $objPHPExcel->getProperties()->setCreator("Firman Fiqri Firdaus")
                        ->setLastModifiedBy("Firman Fiqri Firdaus")
                        ->setTitle("Laporan Harian")
                        ->setSubject("Laporan Harian")
                        ->setDescription("Laporan Harian")
                        ->setKeywords("Laporan Harian")
                        ->setCategory("Laporan Harian");


                /*
                 * KM
                 */
                $objPHPExcel->setActiveSheetIndexByName('KM');
                $sheetData = $objPHPExcel->getActiveSheet();

                if ($pjs != "") {
                    $sheetData->setCellValue('U10', "Pjs SS Pertamina Patra Niaga");
                    $sheetData->setCellValue('U11', $pjs);
                } else {
                    $sheetData->setCellValue('U11', $data_depot->NAMA_PEGAWAI);
                }
                $sheetData->setCellValue('A1', "Rekapitulasi KILOMETER Mobil Tangki PT. Pertamina Patra Niaga - Terminal BBM " . $data_depot->NAMA_DEPOT . " Periode " . $month_name[$bulan] . " " . $tahun);

                if ($last_day == 28) {
                    $sheetData->removeColumn('AI', 1);
                    $sheetData->removeColumn('AH', 1);
                    $sheetData->removeColumn('AG', 1);
                } else if ($last_day == 29) {
                    $sheetData->removeColumn('AI', 1);
                    $sheetData->removeColumn('AH', 1);
                } else if ($last_day == 30) {
                    $sheetData->removeColumn('AI', 1);
                }

                //Untuk laporan harian lokasi
                $km_total_8 = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
                $km_total_16 = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
                $km_total_24 = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
                $km_total_32 = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
                $km_total_40 = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

                $no = $jumlah_data;
                foreach ($hasil_data as $row) {
                    $array = (array) $row;

                    $sheetData->insertNewRowBefore(5, 1);
                    $sheetData->setCellValue('A5', $no);
                    $sheetData->setCellValue('B5', $array['TRANSPORTIR']);
                    $sheetData->setCellValue('C5', $array['NOPOL']);
                    $sheetData->setCellValue('D5', $array['KAPASITAS']);

                    $i = 0;
                    for ($i = 1; $i <= $last_day; $i++) {
                        if ($this->input->post('bln' . $i)) {
                            if ($array['KM' . $i] != "") {
                                $sheetData->setCellValue($column_name[$i + 3] . '5', $array['KM' . $i]);
                                if ($array['KAPASITAS'] == '8') {
                                    $km_total_8[$i - 1] = $km_total_8[$i - 1] + $array['KM' . $i];
                                } else if ($array['KAPASITAS'] == '16') {
                                    $km_total_16[$i - 1] = $km_total_16[$i - 1] + $array['KM' . $i];
                                } else if ($array['KAPASITAS'] == '24') {
                                    $km_total_24[$i - 1] = $km_total_24[$i - 1] + $array['KM' . $i];
                                } else if ($array['KAPASITAS'] == '32') {
                                    $km_total_32[$i - 1] = $km_total_32[$i - 1] + $array['KM' . $i];
                                } else if ($array['KAPASITAS'] == '40') {
                                    $km_total_40[$i - 1] = $km_total_40[$i - 1] + $array['KM' . $i];
                                }
                            } else {
                                $sheetData->setCellValue($column_name[$i + 3] . '5', 0);
                            }
                        } else {
                            $sheetData->setCellValue($column_name[$i + 3] . '5', 0);
                        }
                    }

                    $sheetData->setCellValue($column_name[$i + 3] . '5', '=SUM(' . $column_name[4] . '5:' . $column_name[$i + 2] . '5)');
                    $i++;
                    $sheetData->setCellValue($column_name[$i + 3] . '5', '=AVERAGE(' . $column_name[4] . '5:' . $column_name[$i + 1] . '5)');


                    if ($array['TRANSPORTIR'] == $sheetData->getCell('B6')->getFormattedValue()) {
                        $sheetData->mergeCells('B5:B6');
                    }
                    $no--;
                }

                $objPHPExcel->getActiveSheet()->removeRow(4, 1);
                $objPHPExcel->getActiveSheet()->removeRow($jumlah_data + 4, 1);

                for ($i = 1; $i <= $last_day + 2; $i++) {
                    $sheetData->setCellValue($column_name[$i + 3] . ($jumlah_data + 4), '=SUM(' . $column_name[$i + 3] . '4:' . $column_name[$i + 3] . ($jumlah_data + 3) . ')');
                    $sheetData->setCellValue($column_name[$i + 3] . ($jumlah_data + 5), '=AVERAGE(' . $column_name[$i + 3] . '4:' . $column_name[$i + 3] . ($jumlah_data + 3) . ')');
                }

                /*
                 * KL
                 */
                $objPHPExcel->setActiveSheetIndexByName('KL');
                $sheetData = $objPHPExcel->getActiveSheet();

                if ($pjs != "") {
                    $sheetData->setCellValue('U10', "Pjs SS Pertamina Patra Niaga");
                    $sheetData->setCellValue('U11', $pjs);
                } else {
                    $sheetData->setCellValue('U11', $data_depot->NAMA_PEGAWAI);
                }
                $sheetData->setCellValue('A1', "Rekapitulasi KILOLITER Mobil Tangki PT. Pertamina Patra Niaga - Terminal BBM " . $data_depot->NAMA_DEPOT . " Periode " . $month_name[$bulan] . " " . $tahun);

                if ($last_day == 28) {
                    $sheetData->removeColumn('AI', 1);
                    $sheetData->removeColumn('AH', 1);
                    $sheetData->removeColumn('AG', 1);
                } else if ($last_day == 29) {
                    $sheetData->removeColumn('AI', 1);
                    $sheetData->removeColumn('AH', 1);
                } else if ($last_day == 30) {
                    $sheetData->removeColumn('AI', 1);
                }

                $no = $jumlah_data;
                foreach ($hasil_data as $row) {
                    $array = (array) $row;

                    $sheetData->insertNewRowBefore(5, 1);
                    $sheetData->setCellValue('A5', $no);
                    $sheetData->setCellValue('B5', $array['TRANSPORTIR']);
                    $sheetData->setCellValue('C5', $array['NOPOL']);
                    $sheetData->setCellValue('D5', $array['KAPASITAS']);

                    $i = 0;
                    for ($i = 1; $i <= $last_day; $i++) {
                        if ($this->input->post('bln' . $i)) {
                            if ($array['KM' . $i] != "") {
                                $sheetData->setCellValue($column_name[$i + 3] . '5', $array['KL' . $i]);
                            } else {
                                $sheetData->setCellValue($column_name[$i + 3] . '5', 0);
                            }
                        } else {
                            $sheetData->setCellValue($column_name[$i + 3] . '5', 0);
                        }
                    }

                    $sheetData->setCellValue($column_name[$i + 3] . '5', '=SUM(' . $column_name[4] . '5:' . $column_name[$i + 2] . '5)');
                    $i++;
                    $sheetData->setCellValue($column_name[$i + 3] . '5', '=AVERAGE(' . $column_name[4] . '5:' . $column_name[$i + 1] . '5)');


                    if ($array['TRANSPORTIR'] == $sheetData->getCell('B6')->getFormattedValue()) {
                        $sheetData->mergeCells('B5:B6');
                    }
                    $no--;
                }

                $objPHPExcel->getActiveSheet()->removeRow(4, 1);
                $objPHPExcel->getActiveSheet()->removeRow($jumlah_data + 4, 1);

                for ($i = 1; $i <= $last_day + 2; $i++) {
                    $sheetData->setCellValue($column_name[$i + 3] . ($jumlah_data + 4), '=SUM(' . $column_name[$i + 3] . '4:' . $column_name[$i + 3] . ($jumlah_data + 3) . ')');
                    $sheetData->setCellValue($column_name[$i + 3] . ($jumlah_data + 5), '=AVERAGE(' . $column_name[$i + 3] . '4:' . $column_name[$i + 3] . ($jumlah_data + 3) . ')');
                }

                /*
                 * Ritase MT
                 */
                $objPHPExcel->setActiveSheetIndexByName('Ritase MT');
                $sheetData = $objPHPExcel->getActiveSheet();

                $sheetData->setCellValue('A1', "Ritase Mobil Tangki PT. Pertamina Patra Niaga - Terminal BBM " . $data_depot->NAMA_DEPOT . " Periode " . $month_name[$bulan] . " " . $tahun);

                if ($last_day == 28) {
                    $sheetData->removeColumn('AI', 1);
                    $sheetData->removeColumn('AH', 1);
                    $sheetData->removeColumn('AG', 1);
                } else if ($last_day == 29) {
                    $sheetData->removeColumn('AI', 1);
                    $sheetData->removeColumn('AH', 1);
                } else if ($last_day == 30) {
                    $sheetData->removeColumn('AI', 1);
                }

                $mt_ops8 = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
                $mt_ops16 = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
                $mt_ops24 = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
                $mt_ops32 = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
                $mt_ops40 = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

                $mt_off8 = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
                $mt_off16 = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
                $mt_off24 = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
                $mt_off32 = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
                $mt_off40 = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

                $mt_opsPatra = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);


                $no = $jumlah_data;
                foreach ($hasil_data as $row) {
                    $array = (array) $row;

                    $sheetData->insertNewRowBefore(5, 1);
                    $sheetData->setCellValue('A5', $no);
                    $sheetData->setCellValue('B5', $array['TRANSPORTIR']);
                    $sheetData->setCellValue('C5', $array['NOPOL']);
                    $sheetData->setCellValue('D5', $array['KAPASITAS']);

                    $i = 0;
                    for ($i = 1; $i <= $last_day; $i++) {
                        if ($this->input->post('bln' . $i)) {
                            if ($array['KM' . $i] != "") {
                                $sheetData->setCellValue($column_name[$i + 3] . '5', $array['RIT' . $i]);
                                if ($array['KAPASITAS'] == '8') {
                                    $mt_ops8[$i - 1] ++;
                                } else if ($array['KAPASITAS'] == '16') {
                                    $mt_ops16[$i - 1] ++;
                                } else if ($array['KAPASITAS'] == '24') {
                                    $mt_ops24[$i - 1] ++;
                                } else if ($array['KAPASITAS'] == '32') {
                                    $mt_ops32[$i - 1] ++;
                                } else if ($array['KAPASITAS'] == '40') {
                                    $mt_ops40[$i - 1] ++;
                                }

                                if (strpos($array['TRANSPORTIR'], 'PATRA NIAGA') !== false) {
                                    $mt_opsPatra[$i - 1] ++;
                                }
                            } else {
                                $sheetData->getStyle($column_name[$i + 3] . '5')->getFill()->applyFromArray(array('type' => PHPExcel_Style_Fill::FILL_SOLID, 'startcolor' => array('rgb' => 'FFFF00')));
                                $sheetData->setCellValue($column_name[$i + 3] . '5', 0);
                                if ($array['KAPASITAS'] == '8') {
                                    $mt_off8[$i - 1] ++;
                                } else if ($array['KAPASITAS'] == '16') {
                                    $mt_off16[$i - 1] ++;
                                } else if ($array['KAPASITAS'] == '24') {
                                    $mt_off24[$i - 1] ++;
                                } else if ($array['KAPASITAS'] == '32') {
                                    $mt_off32[$i - 1] ++;
                                } else if ($array['KAPASITAS'] == '40') {
                                    $mt_off40[$i - 1] ++;
                                }
                            }
                        } else {
                            $sheetData->getStyle($column_name[$i + 3] . '5')->getFill()->applyFromArray(array('type' => PHPExcel_Style_Fill::FILL_SOLID, 'startcolor' => array('rgb' => 'FFFF00')));

                            $sheetData->setCellValue($column_name[$i + 3] . '5', 0);
                            if ($array['KAPASITAS'] == '8') {
                                $mt_off8[$i - 1] ++;
                            } else if ($array['KAPASITAS'] == '16') {
                                $mt_off16[$i - 1] ++;
                            } else if ($array['KAPASITAS'] == '24') {
                                $mt_off24[$i - 1] ++;
                            } else if ($array['KAPASITAS'] == '32') {
                                $mt_off32[$i - 1] ++;
                            } else if ($array['KAPASITAS'] == '40') {
                                $mt_off40[$i - 1] ++;
                            }
                        }
                    }

                    $sheetData->setCellValue($column_name[$i + 3] . '5', '=AVERAGE(' . $column_name[4] . '5:' . $column_name[$i + 2] . '5)');
                    $sheetData->setCellValue($column_name[$i + 4] . '5', '=KL!' . $column_name[$i + 3] . ($no + 3));
                    $sheetData->setCellValue($column_name[$i + 5] . '5', '=COUNTIF(' . $column_name[4] . '5:' . $column_name[$i + 2] . '5;">0")');
                    $sheetData->setCellValue($column_name[$i + 6] . '5', '=' . $column_name[$i + 4] . '5/' . $column_name[$i + 5] . '4/D5');


                    if ($array['TRANSPORTIR'] == $sheetData->getCell('B6')->getFormattedValue()) {
                        $sheetData->mergeCells('B5:B6');
                    }
                    $no--;
                }

                $objPHPExcel->getActiveSheet()->removeRow(4, 1);
                $objPHPExcel->getActiveSheet()->removeRow($jumlah_data + 4, 1);

                $i = 0;
                for ($i = 1; $i <= $last_day; $i++) {
                    $sheetData->setCellValue($column_name[$i + 3] . ($jumlah_data + 4), '=KL!' . $column_name[$i + 3] . ($jumlah_data + 4));
                }

                $sheetData->setCellValue($column_name[$i + 3] . ($jumlah_data + 4), '=AVERAGE(E' . ($jumlah_data + 4) . ':' . $column_name[$i + 2] . ($jumlah_data + 4) . ')');
                $sheetData->setCellValue($column_name[$i + 4] . ($jumlah_data + 4), '=AVERAGE(' . $column_name[$i + 4] . '4:' . $column_name[$i + 4] . ($jumlah_data + 3) . ')');
                $sheetData->setCellValue($column_name[$i + 5] . ($jumlah_data + 4), '=AVERAGE(' . $column_name[$i + 5] . '4:' . $column_name[$i + 5] . ($jumlah_data + 3) . ')');
                $sheetData->setCellValue($column_name[$i + 6] . ($jumlah_data + 4), '=AVERAGE(' . $column_name[$i + 6] . '4:' . $column_name[$i + 6] . ($jumlah_data + 3) . ')');

                $i = 0;
                for ($i = 1; $i <= $last_day; $i++) {
                    $sheetData->setCellValue($column_name[$i + 3] . ($jumlah_data + 6), $mt_ops8[$i - 1]);
                    $sheetData->setCellValue($column_name[$i + 3] . ($jumlah_data + 7), $mt_ops16[$i - 1]);
                    $sheetData->setCellValue($column_name[$i + 3] . ($jumlah_data + 8), $mt_ops24[$i - 1]);
                    $sheetData->setCellValue($column_name[$i + 3] . ($jumlah_data + 9), $mt_ops32[$i - 1]);
                    $sheetData->setCellValue($column_name[$i + 3] . ($jumlah_data + 10), $mt_ops40[$i - 1]);

                    $sheetData->setCellValue($column_name[$i + 3] . ($jumlah_data + 13), $mt_off8[$i - 1]);
                    $sheetData->setCellValue($column_name[$i + 3] . ($jumlah_data + 14), $mt_off16[$i - 1]);
                    $sheetData->setCellValue($column_name[$i + 3] . ($jumlah_data + 15), $mt_off24[$i - 1]);
                    $sheetData->setCellValue($column_name[$i + 3] . ($jumlah_data + 16), $mt_off32[$i - 1]);
                    $sheetData->setCellValue($column_name[$i + 3] . ($jumlah_data + 17), $mt_off40[$i - 1]);

                    $sheetData->setCellValue($column_name[$i + 3] . ($jumlah_data + 20), $mt_opsPatra[$i - 1]);
                }

                $sheetData->setCellValue($column_name[$i + 3] . ($jumlah_data + 6), '=AVERAGE(E' . ($jumlah_data + 6) . ':' . $column_name[$i + 2] . ($jumlah_data + 6) . ')');
                $sheetData->setCellValue($column_name[$i + 3] . ($jumlah_data + 7), '=AVERAGE(E' . ($jumlah_data + 7) . ':' . $column_name[$i + 2] . ($jumlah_data + 7) . ')');
                $sheetData->setCellValue($column_name[$i + 3] . ($jumlah_data + 8), '=AVERAGE(E' . ($jumlah_data + 8) . ':' . $column_name[$i + 2] . ($jumlah_data + 8) . ')');
                $sheetData->setCellValue($column_name[$i + 3] . ($jumlah_data + 9), '=AVERAGE(E' . ($jumlah_data + 9) . ':' . $column_name[$i + 2] . ($jumlah_data + 9) . ')');
                $sheetData->setCellValue($column_name[$i + 3] . ($jumlah_data + 10), '=AVERAGE(E' . ($jumlah_data + 10) . ':' . $column_name[$i + 2] . ($jumlah_data + 10) . ')');
                $sheetData->setCellValue($column_name[$i + 3] . ($jumlah_data + 11), '=AVERAGE(E' . ($jumlah_data + 11) . ':' . $column_name[$i + 2] . ($jumlah_data + 11) . ')');

                $sheetData->setCellValue($column_name[$i + 3] . ($jumlah_data + 13), '=AVERAGE(E' . ($jumlah_data + 13) . ':' . $column_name[$i + 2] . ($jumlah_data + 13) . ')');
                $sheetData->setCellValue($column_name[$i + 3] . ($jumlah_data + 14), '=AVERAGE(E' . ($jumlah_data + 14) . ':' . $column_name[$i + 2] . ($jumlah_data + 14) . ')');
                $sheetData->setCellValue($column_name[$i + 3] . ($jumlah_data + 15), '=AVERAGE(E' . ($jumlah_data + 15) . ':' . $column_name[$i + 2] . ($jumlah_data + 15) . ')');
                $sheetData->setCellValue($column_name[$i + 3] . ($jumlah_data + 16), '=AVERAGE(E' . ($jumlah_data + 16) . ':' . $column_name[$i + 2] . ($jumlah_data + 16) . ')');
                $sheetData->setCellValue($column_name[$i + 3] . ($jumlah_data + 17), '=AVERAGE(E' . ($jumlah_data + 17) . ':' . $column_name[$i + 2] . ($jumlah_data + 17) . ')');
                $sheetData->setCellValue($column_name[$i + 3] . ($jumlah_data + 18), '=AVERAGE(E' . ($jumlah_data + 18) . ':' . $column_name[$i + 2] . ($jumlah_data + 18) . ')');
                $sheetData->setCellValue($column_name[$i + 3] . ($jumlah_data + 19), '=AVERAGE(E' . ($jumlah_data + 19) . ':' . $column_name[$i + 2] . ($jumlah_data + 19) . ')');
                $sheetData->setCellValue($column_name[$i + 3] . ($jumlah_data + 20), '=AVERAGE(E' . ($jumlah_data + 20) . ':' . $column_name[$i + 2] . ($jumlah_data + 20) . ')');
                $sheetData->setCellValue($column_name[$i + 3] . ($jumlah_data + 21), '=AVERAGE(E' . ($jumlah_data + 21) . ':' . $column_name[$i + 2] . ($jumlah_data + 21) . ')');


                /*
                 * OWNUSE
                 */
                $objPHPExcel->setActiveSheetIndexByName('Ownuse');
                $sheetData = $objPHPExcel->getActiveSheet();

                if ($pjs != "") {
                    $sheetData->setCellValue('U10', "Pjs SS Pertamina Patra Niaga");
                    $sheetData->setCellValue('U11', $pjs);
                } else {
                    $sheetData->setCellValue('U11', $data_depot->NAMA_PEGAWAI);
                }
                $sheetData->setCellValue('A1', "Rekapitulasi OWNUSE Mobil Tangki PT. Pertamina Patra Niaga - Terminal BBM " . $data_depot->NAMA_DEPOT . " Periode " . $month_name[$bulan] . " " . $tahun);

                if ($last_day == 28) {
                    $sheetData->removeColumn('AI', 1);
                    $sheetData->removeColumn('AH', 1);
                    $sheetData->removeColumn('AG', 1);
                } else if ($last_day == 29) {
                    $sheetData->removeColumn('AI', 1);
                    $sheetData->removeColumn('AH', 1);
                } else if ($last_day == 30) {
                    $sheetData->removeColumn('AI', 1);
                }

                $no = $jumlah_data;
                foreach ($hasil_data as $row) {
                    $array = (array) $row;

                    $sheetData->insertNewRowBefore(5, 1);
                    $sheetData->setCellValue('A5', $no);
                    $sheetData->setCellValue('B5', $array['TRANSPORTIR']);
                    $sheetData->setCellValue('C5', $array['NOPOL']);
                    $sheetData->setCellValue('D5', $array['KAPASITAS']);

                    $i = 0;
                    for ($i = 1; $i <= $last_day; $i++) {
                        if ($this->input->post('bln' . $i)) {
                            if ($array['KM' . $i] != "") {
                                $sheetData->setCellValue($column_name[$i + 3] . '5', $array['OWNUSE' . $i]);
                            } else {
                                $sheetData->setCellValue($column_name[$i + 3] . '5', 0);
                            }
                        } else {
                            $sheetData->setCellValue($column_name[$i + 3] . '5', 0);
                        }
                    }

                    $sheetData->setCellValue($column_name[$i + 3] . '5', '=SUM(' . $column_name[4] . '5:' . $column_name[$i + 2] . '5)');
                    $i++;
                    $sheetData->setCellValue($column_name[$i + 3] . '5', '=AVERAGE(' . $column_name[4] . '5:' . $column_name[$i + 1] . '5)');


                    if ($array['TRANSPORTIR'] == $sheetData->getCell('B6')->getFormattedValue()) {
                        $sheetData->mergeCells('B5:B6');
                    }
                    $no--;
                }

                $objPHPExcel->getActiveSheet()->removeRow(4, 1);
                $objPHPExcel->getActiveSheet()->removeRow($jumlah_data + 4, 1);

                for ($i = 1; $i <= $last_day + 2; $i++) {
                    $sheetData->setCellValue($column_name[$i + 3] . ($jumlah_data + 4), '=SUM(' . $column_name[$i + 3] . '4:' . $column_name[$i + 3] . ($jumlah_data + 3) . ')');
                    $sheetData->setCellValue($column_name[$i + 3] . ($jumlah_data + 5), '=AVERAGE(' . $column_name[$i + 3] . '4:' . $column_name[$i + 3] . ($jumlah_data + 3) . ')');
                }


                /*
                 * Performansi
                 */
                $objPHPExcel->setActiveSheetIndexByName('Performansi');
                $sheetData = $objPHPExcel->getActiveSheet();


                $sheetData->setCellValue('A2', "PT. Pertamina Patra Niaga - Terminal BBM " . $data_depot->NAMA_DEPOT);
                $sheetData->setCellValue('A3', "Periode " . $month_name[$bulan] . " " . $tahun);
                $sheetData->setCellValue('A13', "TBBM " . $data_depot->NAMA_DEPOT);

                $byk_amt_kurang = 0;
                $amt_kurang['nama'] = array();
                $amt_kurang['hari_kerja'] = array();
                $amt_kurang['jabatan'] = array();
                $amt_kurang['klas'] = array();

                //Untuk laporan harian lokasi
                $jumlah_sopir = 0;
                $jumlah_kernet = 0;
                $sopir_ops = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
                $kernet_ops = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
                $sopir_tidak_ops = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
                $kernet_tidak_ops = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);


                $no = $jumlah_data_performansi;
                foreach ($hasil_data_performansi as $row) {
                    $array = (array) $row;

                    //Untul laporan harian lokasi 
                    if ($array['JABATAN'] == "SUPIR") {
                        $jumlah_sopir++;
                    } else if ($array['JABATAN'] == "KERNET") {
                        $jumlah_kernet++;
                    }

                    $sheetData->insertNewRowBefore(8, 1);
                    $sheetData->setCellValue('A8', $no);
                    $sheetData->setCellValue('B8', $array['NAMA_PEGAWAI']);
                    $sheetData->setCellValue('C8', $array['NIP']);
                    $sheetData->setCellValue('D8', $array['JABATAN']);
                    $sheetData->setCellValue('E8', $array['KLASIFIKASI']);

                    $hari_kerja = 0;
                    $km = 0;
                    $kl = 0;
                    $rit = 0;
                    $spbu = 0;
                    $rupiah = 0;

                    $i = 0;
                    for ($i = 1; $i <= $last_day; $i++) {
                        if ($this->input->post('bln' . $i)) {
                            if ($array['KM' . $i] != "") {
                                $km = $km + $array['KM' . $i];
                            }
                            if ($array['RIT' . $i] != "") {
                                $rit = $rit + $array['RIT' . $i];
                                $hari_kerja++;
                            }
                            if ($array['KL' . $i] != "") {
                                $kl = $kl + $array['KL' . $i];
                            }
                            if ($array['SPBU' . $i] != "") {
                                $spbu = $spbu + $array['SPBU' . $i];
                            }
                            if ($array['RUPIAH' . $i] != "") {
                                $rupiah = $rupiah + $array['RUPIAH' . $i];
                            }

                            //Untul laporan harian lokasi 
                            if ($array['JABATAN'] == "SUPIR") {
                                if ($array['RIT' . $i] != "") {
                                    $sopir_ops[$i - 1] ++;
                                } else {
                                    $sopir_tidak_ops[$i - 1] ++;
                                }
                            } else if ($array['JABATAN'] == "KERNET") {
                                if ($array['RIT' . $i] != "") {
                                    $kernet_ops[$i - 1] ++;
                                } else {
                                    $kernet_tidak_ops[$i - 1] ++;
                                }
                            }
                        }
                    }

                    $sheetData->setCellValue('F8', $hari_kerja);
                    $sheetData->setCellValue('G8', $km);
                    $sheetData->setCellValue('H8', $rit);
                    $sheetData->setCellValue('I8', $spbu);
                    $sheetData->setCellValue('J8', $kl);
                    $sheetData->setCellValue('K8', $rupiah);

                    if ($hari_kerja < 15) {
                        $byk_amt_kurang++;
                        $amt_kurang['nama'][] = $array['NAMA_PEGAWAI'];
                        $amt_kurang['hari_kerja'] [] = $hari_kerja;
                        $amt_kurang['jabatan'] [] = $array['JABATAN'];
                        $amt_kurang['klas'] [] = $array['KLASIFIKASI'];
                    }

                    $no--;
                }

                $sheetData->setCellValue('F' . ($jumlah_data_performansi + 9), '=SUM(F7:F' . ($jumlah_data_performansi + 7) . ')');
                $sheetData->setCellValue('G' . ($jumlah_data_performansi + 9), '=SUM(G7:G' . ($jumlah_data_performansi + 7) . ')');
                $sheetData->setCellValue('H' . ($jumlah_data_performansi + 9), '=SUM(H7:H' . ($jumlah_data_performansi + 7) . ')');
                $sheetData->setCellValue('I' . ($jumlah_data_performansi + 9), '=SUM(I7:I' . ($jumlah_data_performansi + 7) . ')');
                $sheetData->setCellValue('J' . ($jumlah_data_performansi + 9), '=SUM(J7:J' . ($jumlah_data_performansi + 7) . ')');
                $sheetData->setCellValue('K' . ($jumlah_data_performansi + 9), '=SUM(K7:K' . ($jumlah_data_performansi + 7) . ')');

                $objPHPExcel->getActiveSheet()->removeRow(7, 1);
                $objPHPExcel->getActiveSheet()->removeRow($jumlah_data_performansi + 7, 1);

                $no = $byk_amt_kurang;
                for ($i = 0; $i < $byk_amt_kurang; $i++) {
                    $sheetData->insertNewRowBefore(($jumlah_data_performansi + 23), 1);
                    $sheetData->setCellValue('A' . ($jumlah_data_performansi + 23), $no);
                    $sheetData->setCellValue('B' . ($jumlah_data_performansi + 23), $amt_kurang['nama'][$i]);
                    $sheetData->setCellValue('C' . ($jumlah_data_performansi + 23), $amt_kurang['hari_kerja'] [$i]);
                    $sheetData->setCellValue('D' . ($jumlah_data_performansi + 23), $amt_kurang['jabatan'] [$i]);
                    $sheetData->setCellValue('E' . ($jumlah_data_performansi + 23), $amt_kurang['klas'] [$i]);
                    $no--;
                }
                $objPHPExcel->getActiveSheet()->removeRow(($jumlah_data_performansi + 22), 1);
                $objPHPExcel->getActiveSheet()->removeRow(($jumlah_data_performansi + 22 + $byk_amt_kurang), 1);

                /*
                 * Laporan Harian Lokasi
                 */
                $objPHPExcel->setActiveSheetIndexByName('Laporan Harian Lokasi');
                $sheetData = $objPHPExcel->getActiveSheet();

                $sheetData->setCellValue('B3', "TBBM " . $data_depot->NAMA_DEPOT);
                $sheetData->setCellValue('B4', "Bulan " . $month_name[$bulan] . " " . $tahun);

                if ($last_day == 28) {
                    $sheetData->removeColumn('AH', 1);
                    $sheetData->removeColumn('AH', 1);
                    $sheetData->removeColumn('AH', 1);
                } else if ($last_day == 29) {
                    $sheetData->removeColumn('AI', 1);
                    $sheetData->removeColumn('AI', 1);
                } else if ($last_day == 30) {
                    $sheetData->removeColumn('AJ', 1);
                }

                for ($i = 0; $i < $last_day; $i++) {
                    //1
                    $sheetData->setCellValue($column_name[$i + 5] . '10', "='Ritase MT'!" . $column_name[$i + 5] . ($jumlah_data + 6) . "+'Ritase MT'!" . $column_name[$i + 5] . ($jumlah_data + 13));
                    $sheetData->setCellValue($column_name[$i + 5] . '11', "='Ritase MT'!" . $column_name[$i + 5] . ($jumlah_data + 7) . "+'Ritase MT'!" . $column_name[$i + 5] . ($jumlah_data + 14));
                    $sheetData->setCellValue($column_name[$i + 5] . '12', "='Ritase MT'!" . $column_name[$i + 5] . ($jumlah_data + 8) . "+'Ritase MT'!" . $column_name[$i + 5] . ($jumlah_data + 15));
                    $sheetData->setCellValue($column_name[$i + 5] . '13', "='Ritase MT'!" . $column_name[$i + 5] . ($jumlah_data + 9) . "+'Ritase MT'!" . $column_name[$i + 5] . ($jumlah_data + 16));
                    $sheetData->setCellValue($column_name[$i + 5] . '14', "='Ritase MT'!" . $column_name[$i + 5] . ($jumlah_data + 10) . "+'Ritase MT'!" . $column_name[$i + 5] . ($jumlah_data + 17));

                    //3
                    $sheetData->setCellValue($column_name[$i + 5] . '28', "='Ritase MT'!" . $column_name[$i + 5] . ($jumlah_data + 6));
                    $sheetData->setCellValue($column_name[$i + 5] . '29', "='Ritase MT'!" . $column_name[$i + 5] . ($jumlah_data + 7));
                    $sheetData->setCellValue($column_name[$i + 5] . '30', "='Ritase MT'!" . $column_name[$i + 5] . ($jumlah_data + 8));
                    $sheetData->setCellValue($column_name[$i + 5] . '31', "='Ritase MT'!" . $column_name[$i + 5] . ($jumlah_data + 9));
                    $sheetData->setCellValue($column_name[$i + 5] . '32', "='Ritase MT'!" . $column_name[$i + 5] . ($jumlah_data + 10));

                    //4
                    if ($hasil_rencana_realisasi) {
                        //4.b
                        $sheetData->setCellValue($column_name[$i + 5] . '50', "=KL!" . $column_name[$i + 4] . ($jumlah_data + 4));

                        if ($this->input->post('bln' . ($i + 1))) {
                            // 4.a
                            if ($hasil_rencana_realisasi[$i]->R_PREMIUM != "") {
                                $sheetData->setCellValue($column_name[$i + 5] . '39', $hasil_rencana_realisasi[$i]->R_PREMIUM);
                            }
                            if ($hasil_rencana_realisasi[$i]->R_BIOSOLAR != "") {
                                $sheetData->setCellValue($column_name[$i + 5] . '40', $hasil_rencana_realisasi[$i]->R_BIOSOLAR);
                            }
                            if ($hasil_rencana_realisasi[$i]->R_PERTAMAX != "") {
                                $sheetData->setCellValue($column_name[$i + 5] . '41', $hasil_rencana_realisasi[$i]->R_PERTAMAX);
                            }
                            if ($hasil_rencana_realisasi[$i]->R_SOLAR != "") {
                                $sheetData->setCellValue($column_name[$i + 5] . '42', $hasil_rencana_realisasi[$i]->R_SOLAR);
                            }
                            if ($hasil_rencana_realisasi[$i]->R_PERTAMAXPLUS != "") {
                                $sheetData->setCellValue($column_name[$i + 5] . '43', $hasil_rencana_realisasi[$i]->R_PERTAMAXPLUS);
                            }
                            if ($hasil_rencana_realisasi[$i]->R_PERTAMINADEX != "") {
                                $sheetData->setCellValue($column_name[$i + 5] . '44', $hasil_rencana_realisasi[$i]->R_PERTAMINADEX);
                            }
                            if ($hasil_rencana_realisasi[$i]->R_MISS != "") {
                                $sheetData->setCellValue($column_name[$i + 5] . '45', $hasil_rencana_realisasi[$i]->R_MISS);
                            }
                            if ($hasil_rencana_realisasi[$i]->R_TAMBAHAN != "") {
                                $sheetData->setCellValue($column_name[$i + 5] . '46', $hasil_rencana_realisasi[$i]->R_TAMBAHAN);
                            }
                            if ($hasil_rencana_realisasi[$i]->R_PEMBATALAN != "") {
                                $sheetData->setCellValue($column_name[$i + 5] . '47', $hasil_rencana_realisasi[$i]->R_PEMBATALAN);
                            }

                            //4.b
                            if ($hasil_rencana_realisasi[$i]->REALISASI_PREMIUM != "") {
                                $sheetData->setCellValue($column_name[$i + 5] . '51', $hasil_rencana_realisasi[$i]->REALISASI_PREMIUM);
                            }
                            if ($hasil_rencana_realisasi[$i]->REALISASI_BIO_SOLAR != "") {
                                $sheetData->setCellValue($column_name[$i + 5] . '52', $hasil_rencana_realisasi[$i]->REALISASI_BIO_SOLAR);
                            }
                            if ($hasil_rencana_realisasi[$i]->REALISASI_PERTAMAX != "") {
                                $sheetData->setCellValue($column_name[$i + 5] . '53', $hasil_rencana_realisasi[$i]->REALISASI_PERTAMAX);
                            }
                            if ($hasil_rencana_realisasi[$i]->REALISASI_SOLAR != "") {
                                $sheetData->setCellValue($column_name[$i + 5] . '54', $hasil_rencana_realisasi[$i]->REALISASI_SOLAR);
                            }
                            if ($hasil_rencana_realisasi[$i]->REALISASI_PERTAMAX_PLUS != "") {
                                $sheetData->setCellValue($column_name[$i + 5] . '55', $hasil_rencana_realisasi[$i]->REALISASI_PERTAMAX_PLUS);
                            }
                            if ($hasil_rencana_realisasi[$i]->REALISASI_PERTAMINA_DEX != "") {
                                $sheetData->setCellValue($column_name[$i + 5] . '56', $hasil_rencana_realisasi[$i]->REALISASI_PERTAMINA_DEX);
                            }


                            //9
                            $sheetData->setCellValue($column_name[$i + 5] . '98', $hasil_rencana_realisasi[$i]->JUMLAH_ALOKASI_SPBU);
                            $sheetData->setCellValue($column_name[$i + 5] . '99', 0);
                        }
                    }

                    //6
                    $sheetData->setCellValue($column_name[$i + 5] . '68', $km_total_8[$i]);
                    $sheetData->setCellValue($column_name[$i + 5] . '69', $km_total_16[$i]);
                    $sheetData->setCellValue($column_name[$i + 5] . '70', $km_total_24[$i]);
                    $sheetData->setCellValue($column_name[$i + 5] . '71', $km_total_32[$i]);
                    $sheetData->setCellValue($column_name[$i + 5] . '72', $km_total_40[$i]);

                    //7
                    if ($this->input->post('bln' . ($i + 1))) {
                        $sheetData->setCellValue($column_name[$i + 5] . '77', $jumlah_sopir);
                        $sheetData->setCellValue($column_name[$i + 5] . '78', $jumlah_kernet);

                        $sheetData->setCellValue($column_name[$i + 5] . '80', $hasil_rencana_realisasi[$i]->JADWAL_DINAS_SUPIR);
                        $sheetData->setCellValue($column_name[$i + 5] . '81', $hasil_rencana_realisasi[$i]->JADWAL_DINAS_KERNET);

                        $sheetData->setCellValue($column_name[$i + 5] . '83', $sopir_ops[$i]);
                        $sheetData->setCellValue($column_name[$i + 5] . '84', $kernet_ops[$i]);
                    }

                    //8
                    if ($this->input->post('bln' . ($i + 1))) {
                        $sheetData->setCellValue($column_name[$i + 5] . '94', $hasil_rencana_realisasi[$i]->REALISASI_OWNUSE);
                    }
                }

                $j = 0;
                for ($j = 9; $j <= 105; $j++) {
                    if ($j != 16 && $j != 18 && $j != 25 && $j != 26 && $j != 33 && $j != 36 && $j != 37 && $j != 61 && $j != 62 && $j != 65 && $j != 66 && $j != 75 && $j != 76 && $j != 79 && $j != 82 && $j != 85 && $j != 88 && $j != 91 && $j != 92 && $j != 96 && $j != 97 && $j != 100 && $j != 101) {
                        if ($j == 95) {
                            
                        } else if ($j == 105) {
                            $sheetData->setCellValue($column_name[$i + 6] . $j, "=AVERAGE(F" . $j . ":" . $column_name[$i + 4] . $j . ")");
                        } else {
                            $sheetData->setCellValue($column_name[$i + 5] . $j, "=SUM(F" . $j . ":" . $column_name[$i + 4] . $j . ")");
                            $sheetData->setCellValue($column_name[$i + 6] . $j, "=AVERAGE(F" . $j . ":" . $column_name[$i + 4] . $j . ")");
                        }
                    }
                }

                $nama_file = 'data_laporan/harian/Laporan Harian ' . $data_depot->NAMA_DEPOT . " " . $month_name[$bulan] . " " . $tahun . '.xls';

                $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
                $objWriter->setPreCalculateFormulas(FALSE);
                $objWriter->save('./' . $nama_file);

                $data2['nama_file'] = base_url() . $nama_file;
            }
            $this->header(7, 1);
            $this->load->view('laporan/v_preview_harian', $data2);
            $this->footer();
        }
    }

    public function preview_bulanan() {
        $this->load->model('m_laporan');
        $depot = $this->session->userdata('id_depot');
        $data2['laporan_ada'] = false;

        if (!$this->input->post('cek')) {
            redirect('laporan/bulanan');
        } else {
            $bulan_input = $this->input->post('bulan');
            $pjs = trim($this->input->post('pjs'));
            $tanggal = date("d-m-Y", strtotime($bulan_input));
            $bulan = date("m", strtotime($bulan_input));
            $tahun = date("Y", strtotime($bulan_input));
            $last_day = date('t', strtotime($tanggal));
            $hasil_rencana_realisasi = $this->m_laporan->getRencanaRealisasi($depot, $tahun, $bulan);
            $hasil_kpi_operational = $this->m_laporan->getKPIOperasional($depot, $tahun, $bulan);
            $data_performansi = $this->m_laporan->getPerformansiHarian($depot, $tahun, $bulan);
            $jumlah_data_performansi = $data_performansi->num_rows();
            $hasil_data_performansi = $data_performansi->result();
            $data = $this->m_laporan->getLaporanHarian($depot, $tahun, $bulan);
            $data_depot = $this->m_laporan->getInfoDepot($depot);
            $jumlah_data = $data->num_rows();
            $hasil_data = $data->result();
            $interpolasi = $this->m_laporan->getInterpolasi($depot, $tahun, $bulan);

            $column_name = array("A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z", "AA", "AB", "AC", "AD", "AE", "AF", "AG", "AH", "AI", "AJ", "AK", "AL", "AM", "AN", "AO");
            $month_name = array("01" => "Januari", "02" => "Februari", "03" => "Maret", "04" => "April", "05" => "Mei", "06" => "Juni", "07" => "Juli", "08" => "Agustus", "09" => "September", "10" => "Oktober", "11" => "November", "12" => "Desember");

//			var_dump($data_realisasi_apms);

            //if ($jumlah_data > 0) {
                $data2['laporan_ada'] = true;
                $this->load->library('PHPExcel/Classes/PHPExcel');
                $inputFileName = './data_laporan/template/bulanan.xls';

                $objReader = PHPExcel_IOFactory::createReader('Excel5');
                $objPHPExcel = $objReader->load($inputFileName);


                /*
                 * KM
                 */

                $objPHPExcel->setActiveSheetIndexByName('KM');
                $sheetData = $objPHPExcel->getActiveSheet();

                if ($pjs != "") {
                    $sheetData->setCellValue('U10', "Pjs SS Pertamina Patra Niaga");
                    $sheetData->setCellValue('U11', $pjs);
                } else {
                    $sheetData->setCellValue('U11', $data_depot->NAMA_PEGAWAI);
                }
                $sheetData->setCellValue('A1', "Rekapitulasi KILOMETER Mobil Tangki PT. Pertamina Patra Niaga - Terminal BBM " . $data_depot->NAMA_DEPOT . " Periode " . $month_name[$bulan] . " " . $tahun);

                if ($last_day == 28) {
                    $sheetData->removeColumn('AI', 1);
                    $sheetData->removeColumn('AH', 1);
                    $sheetData->removeColumn('AG', 1);
                } else if ($last_day == 29) {
                    $sheetData->removeColumn('AI', 1);
                    $sheetData->removeColumn('AH', 1);
                } else if ($last_day == 30) {
                    $sheetData->removeColumn('AI', 1);
                }

                //Untuk laporan harian lokasi
                $km_total_8 = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
                $km_total_16 = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
                $km_total_24 = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
                $km_total_32 = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
                $km_total_40 = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

                $no = $jumlah_data;
                foreach ($hasil_data as $row) {
                    $array = (array) $row;

                    $sheetData->insertNewRowBefore(5, 1);
                    $sheetData->setCellValue('A5', $no);
                    $sheetData->setCellValue('B5', $array['TRANSPORTIR']);
                    $sheetData->setCellValue('C5', $array['NOPOL']);
                    $sheetData->setCellValue('D5', $array['KAPASITAS']);

                    $i = 0;
                    for ($i = 1; $i <= $last_day; $i++) {
                        if ($array['KM' . $i] != "") {
                            $sheetData->setCellValue($column_name[$i + 3] . '5', $array['KM' . $i]);
                            if ($array['KAPASITAS'] == '8') {
                                $km_total_8[$i - 1] = $km_total_8[$i - 1] + $array['KM' . $i];
                            } else if ($array['KAPASITAS'] == '16') {
                                $km_total_16[$i - 1] = $km_total_16[$i - 1] + $array['KM' . $i];
                            } else if ($array['KAPASITAS'] == '24') {
                                $km_total_24[$i - 1] = $km_total_24[$i - 1] + $array['KM' . $i];
                            } else if ($array['KAPASITAS'] == '32') {
                                $km_total_32[$i - 1] = $km_total_32[$i - 1] + $array['KM' . $i];
                            } else if ($array['KAPASITAS'] == '40') {
                                $km_total_40[$i - 1] = $km_total_40[$i - 1] + $array['KM' . $i];
                            }
                        } else {
                            $sheetData->setCellValue($column_name[$i + 3] . '5', 0);
                        }
                    }

                    $sheetData->setCellValue($column_name[$i + 3] . '5', '=SUM(' . $column_name[4] . '5:' . $column_name[$i + 2] . '5)');
                    $i++;
                    $sheetData->setCellValue($column_name[$i + 3] . '5', '=AVERAGE(' . $column_name[4] . '5:' . $column_name[$i + 1] . '5)');


                    if ($array['TRANSPORTIR'] == $sheetData->getCell('B6')->getFormattedValue()) {
                        $sheetData->mergeCells('B5:B6');
                    }
                    $no--;
                }

                $objPHPExcel->getActiveSheet()->removeRow(4, 1);
                $objPHPExcel->getActiveSheet()->removeRow($jumlah_data + 4, 1);

                for ($i = 1; $i <= $last_day + 2; $i++) {
                    $sheetData->setCellValue($column_name[$i + 3] . ($jumlah_data + 4), '=SUM(' . $column_name[$i + 3] . '4:' . $column_name[$i + 3] . ($jumlah_data + 3) . ')');
                    $sheetData->setCellValue($column_name[$i + 3] . ($jumlah_data + 5), '=AVERAGE(' . $column_name[$i + 3] . '4:' . $column_name[$i + 3] . ($jumlah_data + 3) . ')');
                }

                /*
                 * KL
                 */
                $objPHPExcel->setActiveSheetIndexByName('KL');
                $sheetData = $objPHPExcel->getActiveSheet();

                if ($pjs != "") {
                    $sheetData->setCellValue('U10', "Pjs SS Pertamina Patra Niaga");
                    $sheetData->setCellValue('U11', $pjs);
                } else {
                    $sheetData->setCellValue('U11', $data_depot->NAMA_PEGAWAI);
                }
                $sheetData->setCellValue('A1', "Rekapitulasi KILOLITER Mobil Tangki PT. Pertamina Patra Niaga - Terminal BBM " . $data_depot->NAMA_DEPOT . " Periode " . $month_name[$bulan] . " " . $tahun);

                if ($last_day == 28) {
                    $sheetData->removeColumn('AI', 1);
                    $sheetData->removeColumn('AH', 1);
                    $sheetData->removeColumn('AG', 1);
                } else if ($last_day == 29) {
                    $sheetData->removeColumn('AI', 1);
                    $sheetData->removeColumn('AH', 1);
                } else if ($last_day == 30) {
                    $sheetData->removeColumn('AI', 1);
                }

                $no = $jumlah_data;
                foreach ($hasil_data as $row) {
                    $array = (array) $row;

                    $sheetData->insertNewRowBefore(5, 1);
                    $sheetData->setCellValue('A5', $no);
                    $sheetData->setCellValue('B5', $array['TRANSPORTIR']);
                    $sheetData->setCellValue('C5', $array['NOPOL']);
                    $sheetData->setCellValue('D5', $array['KAPASITAS']);

                    $i = 0;
                    for ($i = 1; $i <= $last_day; $i++) {
                        if ($array['KM' . $i] != "") {
                            $sheetData->setCellValue($column_name[$i + 3] . '5', $array['KL' . $i]);
                        } else {
                            $sheetData->setCellValue($column_name[$i + 3] . '5', 0);
                        }
                    }

                    $sheetData->setCellValue($column_name[$i + 3] . '5', '=SUM(' . $column_name[4] . '5:' . $column_name[$i + 2] . '5)');
                    $i++;
                    $sheetData->setCellValue($column_name[$i + 3] . '5', '=AVERAGE(' . $column_name[4] . '5:' . $column_name[$i + 1] . '5)');


                    if ($array['TRANSPORTIR'] == $sheetData->getCell('B6')->getFormattedValue()) {
                        $sheetData->mergeCells('B5:B6');
                    }
                    $no--;
                }

                $objPHPExcel->getActiveSheet()->removeRow(4, 1);
                $objPHPExcel->getActiveSheet()->removeRow($jumlah_data + 4, 1);

                for ($i = 1; $i <= $last_day + 2; $i++) {
                    $sheetData->setCellValue($column_name[$i + 3] . ($jumlah_data + 4), '=SUM(' . $column_name[$i + 3] . '4:' . $column_name[$i + 3] . ($jumlah_data + 3) . ')');
                    $sheetData->setCellValue($column_name[$i + 3] . ($jumlah_data + 5), '=AVERAGE(' . $column_name[$i + 3] . '4:' . $column_name[$i + 3] . ($jumlah_data + 3) . ')');
                }

                /*
                 * Ritase MT
                 */
                $objPHPExcel->setActiveSheetIndexByName('Ritase MT');
                $sheetData = $objPHPExcel->getActiveSheet();

                $sheetData->setCellValue('A1', "Ritase Mobil Tangki PT. Pertamina Patra Niaga - Terminal BBM " . $data_depot->NAMA_DEPOT . " Periode " . $month_name[$bulan] . " " . $tahun);

                if ($last_day == 28) {
                    $sheetData->removeColumn('AI', 1);
                    $sheetData->removeColumn('AH', 1);
                    $sheetData->removeColumn('AG', 1);
                } else if ($last_day == 29) {
                    $sheetData->removeColumn('AI', 1);
                    $sheetData->removeColumn('AH', 1);
                } else if ($last_day == 30) {
                    $sheetData->removeColumn('AI', 1);
                }

                $mt_ops8 = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
                $mt_ops16 = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
                $mt_ops24 = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
                $mt_ops32 = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
                $mt_ops40 = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

                $mt_off8 = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
                $mt_off16 = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
                $mt_off24 = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
                $mt_off32 = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
                $mt_off40 = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

                $mt_opsPatra = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);


                $no = $jumlah_data;
                foreach ($hasil_data as $row) {
                    $array = (array) $row;

                    $sheetData->insertNewRowBefore(5, 1);
                    $sheetData->setCellValue('A5', $no);
                    $sheetData->setCellValue('B5', $array['TRANSPORTIR']);
                    $sheetData->setCellValue('C5', $array['NOPOL']);
                    $sheetData->setCellValue('D5', $array['KAPASITAS']);

                    $i = 0;
                    for ($i = 1; $i <= $last_day; $i++) {
                        if ($array['KM' . $i] != "") {
                            $sheetData->setCellValue($column_name[$i + 3] . '5', $array['RIT' . $i]);
                            if ($array['KAPASITAS'] == '8') {
                                $mt_ops8[$i - 1] ++;
                            } else if ($array['KAPASITAS'] == '16') {
                                $mt_ops16[$i - 1] ++;
                            } else if ($array['KAPASITAS'] == '24') {
                                $mt_ops24[$i - 1] ++;
                            } else if ($array['KAPASITAS'] == '32') {
                                $mt_ops32[$i - 1] ++;
                            } else if ($array['KAPASITAS'] == '40') {
                                $mt_ops40[$i - 1] ++;
                            }

                            if (strpos($array['TRANSPORTIR'], 'PATRA NIAGA') !== false) {
                                $mt_opsPatra[$i - 1] ++;
                            }
                        } else {
                            $sheetData->getStyle($column_name[$i + 3] . '5')->getFill()->applyFromArray(array('type' => PHPExcel_Style_Fill::FILL_SOLID, 'startcolor' => array('rgb' => 'FFFF00')));
                            $sheetData->setCellValue($column_name[$i + 3] . '5', 0);
                            if ($array['KAPASITAS'] == '8') {
                                $mt_off8[$i - 1] ++;
                            } else if ($array['KAPASITAS'] == '16') {
                                $mt_off16[$i - 1] ++;
                            } else if ($array['KAPASITAS'] == '24') {
                                $mt_off24[$i - 1] ++;
                            } else if ($array['KAPASITAS'] == '32') {
                                $mt_off32[$i - 1] ++;
                            } else if ($array['KAPASITAS'] == '40') {
                                $mt_off40[$i - 1] ++;
                            }
                        }
                    }

                    $sheetData->setCellValue($column_name[$i + 3] . '5', '=AVERAGE(' . $column_name[4] . '5:' . $column_name[$i + 2] . '5)');
                    $sheetData->setCellValue($column_name[$i + 4] . '5', '=KL!' . $column_name[$i + 3] . ($no + 3));
                    $sheetData->setCellValue($column_name[$i + 5] . '5', '=COUNTIF(' . $column_name[4] . '5:' . $column_name[$i + 2] . '5;">0")');
                    $sheetData->setCellValue($column_name[$i + 6] . '5', '=' . $column_name[$i + 4] . '5/' . $column_name[$i + 5] . '4/D5');


                    if ($array['TRANSPORTIR'] == $sheetData->getCell('B6')->getFormattedValue()) {
                        $sheetData->mergeCells('B5:B6');
                    }
                    $no--;
                }

                $objPHPExcel->getActiveSheet()->removeRow(4, 1);
                $objPHPExcel->getActiveSheet()->removeRow($jumlah_data + 4, 1);

                $i = 0;
                for ($i = 1; $i <= $last_day; $i++) {
                    $sheetData->setCellValue($column_name[$i + 3] . ($jumlah_data + 4), '=KL!' . $column_name[$i + 3] . ($jumlah_data + 4));
                }

                $sheetData->setCellValue($column_name[$i + 3] . ($jumlah_data + 4), '=AVERAGE(E' . ($jumlah_data + 4) . ':' . $column_name[$i + 2] . ($jumlah_data + 4) . ')');
                $sheetData->setCellValue($column_name[$i + 4] . ($jumlah_data + 4), '=AVERAGE(' . $column_name[$i + 4] . '4:' . $column_name[$i + 4] . ($jumlah_data + 3) . ')');
                $sheetData->setCellValue($column_name[$i + 5] . ($jumlah_data + 4), '=AVERAGE(' . $column_name[$i + 5] . '4:' . $column_name[$i + 5] . ($jumlah_data + 3) . ')');
                $sheetData->setCellValue($column_name[$i + 6] . ($jumlah_data + 4), '=AVERAGE(' . $column_name[$i + 6] . '4:' . $column_name[$i + 6] . ($jumlah_data + 3) . ')');

                $i = 0;
                for ($i = 1; $i <= $last_day; $i++) {
                    $sheetData->setCellValue($column_name[$i + 3] . ($jumlah_data + 6), $mt_ops8[$i - 1]);
                    $sheetData->setCellValue($column_name[$i + 3] . ($jumlah_data + 7), $mt_ops16[$i - 1]);
                    $sheetData->setCellValue($column_name[$i + 3] . ($jumlah_data + 8), $mt_ops24[$i - 1]);
                    $sheetData->setCellValue($column_name[$i + 3] . ($jumlah_data + 9), $mt_ops32[$i - 1]);
                    $sheetData->setCellValue($column_name[$i + 3] . ($jumlah_data + 10), $mt_ops40[$i - 1]);

                    $sheetData->setCellValue($column_name[$i + 3] . ($jumlah_data + 13), $mt_off8[$i - 1]);
                    $sheetData->setCellValue($column_name[$i + 3] . ($jumlah_data + 14), $mt_off16[$i - 1]);
                    $sheetData->setCellValue($column_name[$i + 3] . ($jumlah_data + 15), $mt_off24[$i - 1]);
                    $sheetData->setCellValue($column_name[$i + 3] . ($jumlah_data + 16), $mt_off32[$i - 1]);
                    $sheetData->setCellValue($column_name[$i + 3] . ($jumlah_data + 17), $mt_off40[$i - 1]);

                    $sheetData->setCellValue($column_name[$i + 3] . ($jumlah_data + 20), $mt_opsPatra[$i - 1]);
                }

                $sheetData->setCellValue($column_name[$i + 3] . ($jumlah_data + 6), '=AVERAGE(E' . ($jumlah_data + 6) . ':' . $column_name[$i + 2] . ($jumlah_data + 6) . ')');
                $sheetData->setCellValue($column_name[$i + 3] . ($jumlah_data + 7), '=AVERAGE(E' . ($jumlah_data + 7) . ':' . $column_name[$i + 2] . ($jumlah_data + 7) . ')');
                $sheetData->setCellValue($column_name[$i + 3] . ($jumlah_data + 8), '=AVERAGE(E' . ($jumlah_data + 8) . ':' . $column_name[$i + 2] . ($jumlah_data + 8) . ')');
                $sheetData->setCellValue($column_name[$i + 3] . ($jumlah_data + 9), '=AVERAGE(E' . ($jumlah_data + 9) . ':' . $column_name[$i + 2] . ($jumlah_data + 9) . ')');
                $sheetData->setCellValue($column_name[$i + 3] . ($jumlah_data + 10), '=AVERAGE(E' . ($jumlah_data + 10) . ':' . $column_name[$i + 2] . ($jumlah_data + 10) . ')');
                $sheetData->setCellValue($column_name[$i + 3] . ($jumlah_data + 11), '=AVERAGE(E' . ($jumlah_data + 11) . ':' . $column_name[$i + 2] . ($jumlah_data + 11) . ')');

                $sheetData->setCellValue($column_name[$i + 3] . ($jumlah_data + 13), '=AVERAGE(E' . ($jumlah_data + 13) . ':' . $column_name[$i + 2] . ($jumlah_data + 13) . ')');
                $sheetData->setCellValue($column_name[$i + 3] . ($jumlah_data + 14), '=AVERAGE(E' . ($jumlah_data + 14) . ':' . $column_name[$i + 2] . ($jumlah_data + 14) . ')');
                $sheetData->setCellValue($column_name[$i + 3] . ($jumlah_data + 15), '=AVERAGE(E' . ($jumlah_data + 15) . ':' . $column_name[$i + 2] . ($jumlah_data + 15) . ')');
                $sheetData->setCellValue($column_name[$i + 3] . ($jumlah_data + 16), '=AVERAGE(E' . ($jumlah_data + 16) . ':' . $column_name[$i + 2] . ($jumlah_data + 16) . ')');
                $sheetData->setCellValue($column_name[$i + 3] . ($jumlah_data + 17), '=AVERAGE(E' . ($jumlah_data + 17) . ':' . $column_name[$i + 2] . ($jumlah_data + 17) . ')');
                $sheetData->setCellValue($column_name[$i + 3] . ($jumlah_data + 18), '=AVERAGE(E' . ($jumlah_data + 18) . ':' . $column_name[$i + 2] . ($jumlah_data + 18) . ')');
                $sheetData->setCellValue($column_name[$i + 3] . ($jumlah_data + 19), '=AVERAGE(E' . ($jumlah_data + 19) . ':' . $column_name[$i + 2] . ($jumlah_data + 19) . ')');
                $sheetData->setCellValue($column_name[$i + 3] . ($jumlah_data + 20), '=AVERAGE(E' . ($jumlah_data + 20) . ':' . $column_name[$i + 2] . ($jumlah_data + 20) . ')');
                $sheetData->setCellValue($column_name[$i + 3] . ($jumlah_data + 21), '=AVERAGE(E' . ($jumlah_data + 21) . ':' . $column_name[$i + 2] . ($jumlah_data + 21) . ')');


                /*
                 * OWNUSE
                 */
                $objPHPExcel->setActiveSheetIndexByName('Ownuse');
                $sheetData = $objPHPExcel->getActiveSheet();

                if ($pjs != "") {
                    $sheetData->setCellValue('U10', "Pjs SS Pertamina Patra Niaga");
                    $sheetData->setCellValue('U11', $pjs);
                } else {
                    $sheetData->setCellValue('U11', $data_depot->NAMA_PEGAWAI);
                }
                $sheetData->setCellValue('A1', "Rekapitulasi OWNUSE Mobil Tangki PT. Pertamina Patra Niaga - Terminal BBM " . $data_depot->NAMA_DEPOT . " Periode " . $month_name[$bulan] . " " . $tahun);

                if ($last_day == 28) {
                    $sheetData->removeColumn('AI', 1);
                    $sheetData->removeColumn('AH', 1);
                    $sheetData->removeColumn('AG', 1);
                } else if ($last_day == 29) {
                    $sheetData->removeColumn('AI', 1);
                    $sheetData->removeColumn('AH', 1);
                } else if ($last_day == 30) {
                    $sheetData->removeColumn('AI', 1);
                }

                $no = $jumlah_data;
                foreach ($hasil_data as $row) {
                    $array = (array) $row;

                    $sheetData->insertNewRowBefore(5, 1);
                    $sheetData->setCellValue('A5', $no);
                    $sheetData->setCellValue('B5', $array['TRANSPORTIR']);
                    $sheetData->setCellValue('C5', $array['NOPOL']);
                    $sheetData->setCellValue('D5', $array['KAPASITAS']);

                    $i = 0;
                    for ($i = 1; $i <= $last_day; $i++) {
                        if ($array['KM' . $i] != "") {
                            $sheetData->setCellValue($column_name[$i + 3] . '5', $array['OWNUSE' . $i]);
                        } else {
                            $sheetData->setCellValue($column_name[$i + 3] . '5', 0);
                        }
                    }

                    $sheetData->setCellValue($column_name[$i + 3] . '5', '=SUM(' . $column_name[4] . '5:' . $column_name[$i + 2] . '5)');
                    $i++;
                    $sheetData->setCellValue($column_name[$i + 3] . '5', '=AVERAGE(' . $column_name[4] . '5:' . $column_name[$i + 1] . '5)');


                    if ($array['TRANSPORTIR'] == $sheetData->getCell('B6')->getFormattedValue()) {
                        $sheetData->mergeCells('B5:B6');
                    }
                    $no--;
                }

                $objPHPExcel->getActiveSheet()->removeRow(4, 1);
                $objPHPExcel->getActiveSheet()->removeRow($jumlah_data + 4, 1);

                for ($i = 1; $i <= $last_day + 2; $i++) {
                    $sheetData->setCellValue($column_name[$i + 3] . ($jumlah_data + 4), '=SUM(' . $column_name[$i + 3] . '4:' . $column_name[$i + 3] . ($jumlah_data + 3) . ')');
                    $sheetData->setCellValue($column_name[$i + 3] . ($jumlah_data + 5), '=AVERAGE(' . $column_name[$i + 3] . '4:' . $column_name[$i + 3] . ($jumlah_data + 3) . ')');
                }


                /*
                 * Performansi
                 */
                $objPHPExcel->setActiveSheetIndexByName('Performansi');
                $sheetData = $objPHPExcel->getActiveSheet();


                $sheetData->setCellValue('A2', "PT. Pertamina Patra Niaga - Terminal BBM " . $data_depot->NAMA_DEPOT);
                $sheetData->setCellValue('A3', "Periode " . $month_name[$bulan] . " " . $tahun);
                $sheetData->setCellValue('A13', "TBBM " . $data_depot->NAMA_DEPOT);

                $byk_amt_kurang = 0;
                $amt_kurang['nama'] = array();
                $amt_kurang['hari_kerja'] = array();
                $amt_kurang['jabatan'] = array();
                $amt_kurang['klas'] = array();

                //Untuk laporan harian lokasi
                $jumlah_sopir = 0;
                $jumlah_kernet = 0;
                $sopir_ops = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
                $kernet_ops = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
                $sopir_tidak_ops = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
                $kernet_tidak_ops = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);


                $no = $jumlah_data_performansi;
                foreach ($hasil_data_performansi as $row) {
                    $array = (array) $row;


                    //Untul laporan harian lokasi
                    if ($array['JABATAN'] == "SUPIR") {
                        $jumlah_sopir++;
                    } else if ($array['JABATAN'] == "KERNET") {
                        $jumlah_kernet++;
                    }

                    $sheetData->insertNewRowBefore(8, 1);
                    $sheetData->setCellValue('A8', $no);
                    $sheetData->setCellValue('B8', $array['NAMA_PEGAWAI']);
                    $sheetData->setCellValue('C8', $array['NIP']);
                    $sheetData->setCellValue('D8', $array['JABATAN']);
                    $sheetData->setCellValue('E8', $array['KLASIFIKASI']);

                    $hari_kerja = 0;
                    $km = 0;
                    $kl = 0;
                    $rit = 0;
                    $spbu = 0;
                    $rupiah = 0;

                    $i = 0;
                    for ($i = 1; $i <= $last_day; $i++) {
                        if ($array['KM' . $i] != "") {
                            $km = $km + $array['KM' . $i];
                        }
                        if ($array['RIT' . $i] != "") {
                            $rit = $rit + $array['RIT' . $i];
                            $hari_kerja++;
                        }
                        if ($array['KL' . $i] != "") {
                            $kl = $kl + $array['KL' . $i];
                        }
                        if ($array['SPBU' . $i] != "") {
                            $spbu = $spbu + $array['SPBU' . $i];
                        }
                        if ($array['RUPIAH' . $i] != "") {
                            $rupiah = $rupiah + $array['RUPIAH' . $i];
                        }

                        //Untul laporan harian lokasi
                        if ($array['JABATAN'] == "SUPIR") {
                            if ($array['RIT' . $i] != "") {
                                $sopir_ops[$i - 1] ++;
                            } else {
                                $sopir_tidak_ops[$i - 1] ++;
                            }
                        } else if ($array['JABATAN'] == "KERNET") {
                            if ($array['RIT' . $i] != "") {
                                $kernet_ops[$i - 1] ++;
                            } else {
                                $kernet_tidak_ops[$i - 1] ++;
                            }
                        }
                    }

                    $sheetData->setCellValue('F8', $hari_kerja);
                    $sheetData->setCellValue('G8', $km);
                    $sheetData->setCellValue('H8', $rit);
                    $sheetData->setCellValue('I8', $spbu);
                    $sheetData->setCellValue('J8', $kl);
                    $sheetData->setCellValue('K8', $rupiah);

                    if ($hari_kerja < 15) {
                        $byk_amt_kurang++;
                        $amt_kurang['nama'][] = $array['NAMA_PEGAWAI'];
                        $amt_kurang['hari_kerja'] [] = $hari_kerja;
                        $amt_kurang['jabatan'] [] = $array['JABATAN'];
                        $amt_kurang['klas'] [] = $array['KLASIFIKASI'];
                    }

                    $no--;
                }

                $sheetData->setCellValue('F' . ($jumlah_data_performansi + 9), '=SUM(F7:F' . ($jumlah_data_performansi + 7) . ')');
                $sheetData->setCellValue('G' . ($jumlah_data_performansi + 9), '=SUM(G7:G' . ($jumlah_data_performansi + 7) . ')');
                $sheetData->setCellValue('H' . ($jumlah_data_performansi + 9), '=SUM(H7:H' . ($jumlah_data_performansi + 7) . ')');
                $sheetData->setCellValue('I' . ($jumlah_data_performansi + 9), '=SUM(I7:I' . ($jumlah_data_performansi + 7) . ')');
                $sheetData->setCellValue('J' . ($jumlah_data_performansi + 9), '=SUM(J7:J' . ($jumlah_data_performansi + 7) . ')');
                $sheetData->setCellValue('K' . ($jumlah_data_performansi + 9), '=SUM(K7:K' . ($jumlah_data_performansi + 7) . ')');

                $objPHPExcel->getActiveSheet()->removeRow(7, 1);
                $objPHPExcel->getActiveSheet()->removeRow($jumlah_data_performansi + 7, 1);

                $no = $byk_amt_kurang;
                for ($i = 0; $i < $byk_amt_kurang; $i++) {
                    $sheetData->insertNewRowBefore(($jumlah_data_performansi + 23), 1);
                    $sheetData->setCellValue('A' . ($jumlah_data_performansi + 23), $no);
                    $sheetData->setCellValue('B' . ($jumlah_data_performansi + 23), $amt_kurang['nama'][$i]);
                    $sheetData->setCellValue('C' . ($jumlah_data_performansi + 23), $amt_kurang['hari_kerja'] [$i]);
                    $sheetData->setCellValue('D' . ($jumlah_data_performansi + 23), $amt_kurang['jabatan'] [$i]);
                    $sheetData->setCellValue('E' . ($jumlah_data_performansi + 23), $amt_kurang['klas'] [$i]);
                    $no--;
                }
                $objPHPExcel->getActiveSheet()->removeRow(($jumlah_data_performansi + 22), 1);
                $objPHPExcel->getActiveSheet()->removeRow(($jumlah_data_performansi + 22 + $byk_amt_kurang), 1);

                /*
                 * Laporan Harian Lokasi
                 */
                $objPHPExcel->setActiveSheetIndexByName('Laporan Harian Lokasi');
                $sheetData = $objPHPExcel->getActiveSheet();

                $sheetData->setCellValue('B3', "TBBM " . $data_depot->NAMA_DEPOT);
                $sheetData->setCellValue('B4', "Bulan " . $month_name[$bulan] . " " . $tahun);

                if ($last_day == 28) {
                    $sheetData->removeColumn('AH', 1);
                    $sheetData->removeColumn('AH', 1);
                    $sheetData->removeColumn('AH', 1);
                } else if ($last_day == 29) {
                    $sheetData->removeColumn('AI', 1);
                    $sheetData->removeColumn('AI', 1);
                } else if ($last_day == 30) {
                    $sheetData->removeColumn('AJ', 1);
                }

                for ($i = 0; $i < $last_day; $i++) {
                    //1
                    $sheetData->setCellValue($column_name[$i + 5] . '10', "='Ritase MT'!" . $column_name[$i + 5] . ($jumlah_data + 6) . "+'Ritase MT'!" . $column_name[$i + 5] . ($jumlah_data + 13));
                    $sheetData->setCellValue($column_name[$i + 5] . '11', "='Ritase MT'!" . $column_name[$i + 5] . ($jumlah_data + 7) . "+'Ritase MT'!" . $column_name[$i + 5] . ($jumlah_data + 14));
                    $sheetData->setCellValue($column_name[$i + 5] . '12', "='Ritase MT'!" . $column_name[$i + 5] . ($jumlah_data + 8) . "+'Ritase MT'!" . $column_name[$i + 5] . ($jumlah_data + 15));
                    $sheetData->setCellValue($column_name[$i + 5] . '13', "='Ritase MT'!" . $column_name[$i + 5] . ($jumlah_data + 9) . "+'Ritase MT'!" . $column_name[$i + 5] . ($jumlah_data + 16));
                    $sheetData->setCellValue($column_name[$i + 5] . '14', "='Ritase MT'!" . $column_name[$i + 5] . ($jumlah_data + 10) . "+'Ritase MT'!" . $column_name[$i + 5] . ($jumlah_data + 17));

                    //3
                    $sheetData->setCellValue($column_name[$i + 5] . '28', "='Ritase MT'!" . $column_name[$i + 5] . ($jumlah_data + 6));
                    $sheetData->setCellValue($column_name[$i + 5] . '29', "='Ritase MT'!" . $column_name[$i + 5] . ($jumlah_data + 7));
                    $sheetData->setCellValue($column_name[$i + 5] . '30', "='Ritase MT'!" . $column_name[$i + 5] . ($jumlah_data + 8));
                    $sheetData->setCellValue($column_name[$i + 5] . '31', "='Ritase MT'!" . $column_name[$i + 5] . ($jumlah_data + 9));
                    $sheetData->setCellValue($column_name[$i + 5] . '32', "='Ritase MT'!" . $column_name[$i + 5] . ($jumlah_data + 10));

                    //4
                    if ($hasil_rencana_realisasi) {
                        //4.b
                        $sheetData->setCellValue($column_name[$i + 5] . '50', "=KL!" . $column_name[$i + 4] . ($jumlah_data + 4));


                        // 4.a
                        if ($hasil_rencana_realisasi[$i]->R_PREMIUM != "") {
                            $sheetData->setCellValue($column_name[$i + 5] . '39', $hasil_rencana_realisasi[$i]->R_PREMIUM);
                        }
                        if ($hasil_rencana_realisasi[$i]->R_BIOSOLAR != "") {
                            $sheetData->setCellValue($column_name[$i + 5] . '40', $hasil_rencana_realisasi[$i]->R_BIOSOLAR);
                        }
                        if ($hasil_rencana_realisasi[$i]->R_PERTAMAX != "") {
                            $sheetData->setCellValue($column_name[$i + 5] . '41', $hasil_rencana_realisasi[$i]->R_PERTAMAX);
                        }
                        if ($hasil_rencana_realisasi[$i]->R_SOLAR != "") {
                            $sheetData->setCellValue($column_name[$i + 5] . '42', $hasil_rencana_realisasi[$i]->R_SOLAR);
                        }
                        if ($hasil_rencana_realisasi[$i]->R_PERTAMAXPLUS != "") {
                            $sheetData->setCellValue($column_name[$i + 5] . '43', $hasil_rencana_realisasi[$i]->R_PERTAMAXPLUS);
                        }
                        if ($hasil_rencana_realisasi[$i]->R_PERTAMINADEX != "") {
                            $sheetData->setCellValue($column_name[$i + 5] . '44', $hasil_rencana_realisasi[$i]->R_PERTAMINADEX);
                        }
                        if ($hasil_rencana_realisasi[$i]->R_MISS != "") {
                            $sheetData->setCellValue($column_name[$i + 5] . '45', $hasil_rencana_realisasi[$i]->R_MISS);
                        }
                        if ($hasil_rencana_realisasi[$i]->R_TAMBAHAN != "") {
                            $sheetData->setCellValue($column_name[$i + 5] . '46', $hasil_rencana_realisasi[$i]->R_TAMBAHAN);
                        }
                        if ($hasil_rencana_realisasi[$i]->R_PEMBATALAN != "") {
                            $sheetData->setCellValue($column_name[$i + 5] . '47', $hasil_rencana_realisasi[$i]->R_PEMBATALAN);
                        }

                        //4.b
                        if ($hasil_rencana_realisasi[$i]->REALISASI_PREMIUM != "") {
                            $sheetData->setCellValue($column_name[$i + 5] . '51', $hasil_rencana_realisasi[$i]->REALISASI_PREMIUM);
                        }
                        if ($hasil_rencana_realisasi[$i]->REALISASI_BIO_SOLAR != "") {
                            $sheetData->setCellValue($column_name[$i + 5] . '52', $hasil_rencana_realisasi[$i]->REALISASI_BIO_SOLAR);
                        }
                        if ($hasil_rencana_realisasi[$i]->REALISASI_PERTAMAX != "") {
                            $sheetData->setCellValue($column_name[$i + 5] . '53', $hasil_rencana_realisasi[$i]->REALISASI_PERTAMAX);
                        }
                        if ($hasil_rencana_realisasi[$i]->REALISASI_SOLAR != "") {
                            $sheetData->setCellValue($column_name[$i + 5] . '54', $hasil_rencana_realisasi[$i]->REALISASI_SOLAR);
                        }
                        if ($hasil_rencana_realisasi[$i]->REALISASI_PERTAMAX_PLUS != "") {
                            $sheetData->setCellValue($column_name[$i + 5] . '55', $hasil_rencana_realisasi[$i]->REALISASI_PERTAMAX_PLUS);
                        }
                        if ($hasil_rencana_realisasi[$i]->REALISASI_PERTAMINA_DEX != "") {
                            $sheetData->setCellValue($column_name[$i + 5] . '56', $hasil_rencana_realisasi[$i]->REALISASI_PERTAMINA_DEX);
                        }


                        //9
                        $sheetData->setCellValue($column_name[$i + 5] . '98', $hasil_rencana_realisasi[$i]->JUMLAH_ALOKASI_SPBU);
                        $sheetData->setCellValue($column_name[$i + 5] . '99', 0);
                    }

                    //6
                    $sheetData->setCellValue($column_name[$i + 5] . '68', $km_total_8[$i]);
                    $sheetData->setCellValue($column_name[$i + 5] . '69', $km_total_16[$i]);
                    $sheetData->setCellValue($column_name[$i + 5] . '70', $km_total_24[$i]);
                    $sheetData->setCellValue($column_name[$i + 5] . '71', $km_total_32[$i]);
                    $sheetData->setCellValue($column_name[$i + 5] . '72', $km_total_40[$i]);

                    //7

                    $sheetData->setCellValue($column_name[$i + 5] . '77', $jumlah_sopir);
                    $sheetData->setCellValue($column_name[$i + 5] . '78', $jumlah_kernet);

                    $sheetData->setCellValue($column_name[$i + 5] . '80', $hasil_rencana_realisasi[$i]->JADWAL_DINAS_SUPIR);
                    $sheetData->setCellValue($column_name[$i + 5] . '81', $hasil_rencana_realisasi[$i]->JADWAL_DINAS_KERNET);

                    $sheetData->setCellValue($column_name[$i + 5] . '83', $sopir_ops[$i]);
                    $sheetData->setCellValue($column_name[$i + 5] . '84', $kernet_ops[$i]);


                    //8
                    $sheetData->setCellValue($column_name[$i + 5] . '94', $hasil_rencana_realisasi[$i]->REALISASI_OWNUSE);
                }

                $j = 0;
                for ($j = 9; $j <= 105; $j++) {
                    if ($j != 16 && $j != 18 && $j != 25 && $j != 26 && $j != 33 && $j != 36 && $j != 37 && $j != 61 && $j != 62 && $j != 65 && $j != 66 && $j != 75 && $j != 76 && $j != 79 && $j != 82 && $j != 85 && $j != 88 && $j != 91 && $j != 92 && $j != 96 && $j != 97 && $j != 100 && $j != 101) {
                        if ($j == 95) {
                            
                        } else if ($j == 105) {
                            $sheetData->setCellValue($column_name[$i + 6] . $j, "=AVERAGE(F" . $j . ":" . $column_name[$i + 4] . $j . ")");
                        } else {
                            $sheetData->setCellValue($column_name[$i + 5] . $j, "=SUM(F" . $j . ":" . $column_name[$i + 4] . $j . ")");
                            $sheetData->setCellValue($column_name[$i + 6] . $j, "=AVERAGE(F" . $j . ":" . $column_name[$i + 4] . $j . ")");
                        }
                    }
                }

                /*
                 * HSSE
                 */
                $objPHPExcel->setActiveSheetIndexByName('HSSE');
                $sheetData = $objPHPExcel->getActiveSheet();

                $sheetData->setCellValue('A3', "Bulan : " . $month_name[$bulan] . " " . $tahun);
                $sheetData->setCellValue('A4', "Lokasi : TBBM " . $data_depot->NAMA_DEPOT);
                $sheetData->setCellValue('B30', "OPERATION HEAD TBBM " . $data_depot->NAMA_DEPOT);
                $sheetData->setCellValue('B36', $data_depot->NAMA_OH);

                $sheetData->setCellValue('H30', ucfirst(strtolower($data_depot->NAMA_DEPOT)) . ", " . $last_day . " " . $month_name[$bulan] . " " . $tahun);
                if ($pjs != "") {
                    $sheetData->setCellValue('H31', "Pjs SITE MANAGER/SITE SUPERVISOR");
                    $sheetData->setCellValue('H36', $pjs);
                } else {
                    $sheetData->setCellValue('H36', $data_depot->NAMA_PEGAWAI);
                }

                /*
                 * Volume Plan Vs Realisasi
                 */
                $objPHPExcel->setActiveSheetIndexByName('Volume Plan Vs Realisasi');
                $sheetData = $objPHPExcel->getActiveSheet();

                $sheetData->setCellValue('B5', "BULAN " . $month_name[$bulan] . " " . $tahun);

                $i = 0;
                for ($i = 0; $i < $last_day; $i++) {
                    $sheetData->setCellValue('B' . (9 + $i), ($i + 1) . " " . $month_name[$bulan] . " " . $tahun);
                }

                if ($pjs != "") {
                    $sheetData->setCellValue('B45', "Pjs Site Supervisor Fleet BBM");
                    $sheetData->setCellValue('B46', "TBBM " . $data_depot->NAMA_DEPOT);
                    $sheetData->setCellValue('B53', $pjs);
                } else {
                    $sheetData->setCellValue('B46', "TBBM " . $data_depot->NAMA_DEPOT);
                    $sheetData->setCellValue('B53', $data_depot->NAMA_PEGAWAI);
                }

                $sheetData->setCellValue('I45', "Operation Head TBBM " . $data_depot->NAMA_DEPOT);
                $sheetData->setCellValue('I46', $data_depot->NAMA_DEPOT);
                $sheetData->setCellValue('I53', $data_depot->NAMA_OH);

                if ($last_day == 28) {
                    $sheetData->removeRow(37, 1);
                    $sheetData->removeRow(37, 1);
                    $sheetData->removeRow(37, 1);
                } else if ($last_day == 29) {
                    $sheetData->removeRow(38, 1);
                    $sheetData->removeRow(38, 1);
                } else if ($last_day == 30) {
                    $sheetData->removeRow(39, 1);
                }

                $sheetData->setCellValue('C' . ($last_day + 9), "=SUM(C9:C" . ($last_day + 8) . ")");
                $sheetData->setCellValue('D' . ($last_day + 9), "=SUM(D9:D" . ($last_day + 8) . ")");
                $sheetData->setCellValue('E' . ($last_day + 9), "=SUM(E9:E" . ($last_day + 8) . ")");
                $sheetData->setCellValue('F' . ($last_day + 9), "=SUM(F9:F" . ($last_day + 8) . ")");
                $sheetData->setCellValue('G' . ($last_day + 9), "=SUM(G9:G" . ($last_day + 8) . ")");
                $sheetData->setCellValue('H' . ($last_day + 9), "=SUM(H9:H" . ($last_day + 8) . ")");
                $sheetData->setCellValue('I' . ($last_day + 9), "=SUM(I9:I" . ($last_day + 8) . ")");
                $sheetData->setCellValue('J' . ($last_day + 9), "=SUM(J9:J" . ($last_day + 8) . ")");
                $sheetData->setCellValue('K' . ($last_day + 9), "=AVERAGE(K9:K" . ($last_day + 8) . ")");

                /*
                 * MS2 Compliance
                 */
                $objPHPExcel->setActiveSheetIndexByName('MS2 Compliance');
                $sheetData = $objPHPExcel->getActiveSheet();

                $sheetData->setCellValue('A4', "Bulan : " . $month_name[$bulan] . " " . $tahun);

                $sheetData->setCellValue('A44', ucfirst(strtolower($data_depot->NAMA_DEPOT)) . ", " . $last_day . " " . $month_name[$bulan] . " " . $tahun);

                if ($pjs != "") {
                    $sheetData->setCellValue('A47', "Pjs Site Supervisor TBBM " . ucfirst(strtolower($data_depot->NAMA_DEPOT)));
                    $sheetData->setCellValue('B53', $pjs);
                } else {
                    $sheetData->setCellValue('A47', "Site Supervisor TBBM " . ucfirst(strtolower($data_depot->NAMA_DEPOT)));
                    $sheetData->setCellValue('B53', $data_depot->NAMA_PEGAWAI);
                }

                $sheetData->setCellValue('O47', "Operation Head " . ucfirst(strtolower($data_depot->NAMA_DEPOT)));
                $sheetData->setCellValue('O53', $data_depot->NAMA_OH);



                $i = 0;
                for ($i = 0; $i < $last_day; $i++) {
                    $sheetData->setCellValue('B' . (9 + $i), ($i + 1) . " " . $month_name[$bulan] . " " . $tahun);
                    if ($hasil_rencana_realisasi[$i]->SESUAI_PREMIUM != "") {
                        $sheetData->setCellValue('C' . (9 + $i), $hasil_rencana_realisasi[$i]->SESUAI_PREMIUM / 100);
                    }
                    if ($hasil_rencana_realisasi[$i]->SESUAI_SOLAR != "") {
                        $sheetData->setCellValue('D' . (9 + $i), $hasil_rencana_realisasi[$i]->SESUAI_PERTAMAX / 100);
                    }
                    if ($hasil_rencana_realisasi[$i]->SESUAI_PERTAMAX != "") {
                        $sheetData->setCellValue('E' . (9 + $i), $hasil_rencana_realisasi[$i]->SESUAI_SOLAR / 100);
                    }

                    if ($hasil_rencana_realisasi[$i]->CEPAT_PREMIUM != "") {
                        $sheetData->setCellValue('F' . (9 + $i), $hasil_rencana_realisasi[$i]->CEPAT_PREMIUM / 100);
                    }
                    if ($hasil_rencana_realisasi[$i]->CEPAT_SOLAR != "") {
                        $sheetData->setCellValue('G' . (9 + $i), $hasil_rencana_realisasi[$i]->CEPAT_PERTAMAX / 100);
                    }
                    if ($hasil_rencana_realisasi[$i]->CEPAT_PERTAMAX != "") {
                        $sheetData->setCellValue('H' . (9 + $i), $hasil_rencana_realisasi[$i]->CEPAT_SOLAR / 100);
                    }

                    if ($hasil_rencana_realisasi[$i]->CEPAT_SHIFT1_PREMIUM != "") {
                        $sheetData->setCellValue('I' . (9 + $i), $hasil_rencana_realisasi[$i]->CEPAT_SHIFT1_PREMIUM / 100);
                    }
                    if ($hasil_rencana_realisasi[$i]->CEPAT_SHIFT1_SOLAR != "") {
                        $sheetData->setCellValue('J' . (9 + $i), $hasil_rencana_realisasi[$i]->CEPAT_SHIFT1_PERTAMAX / 100);
                    }
                    if ($hasil_rencana_realisasi[$i]->CEPAT_SHIFT1_PERTAMAX != "") {
                        $sheetData->setCellValue('K' . (9 + $i), $hasil_rencana_realisasi[$i]->CEPAT_SHIFT1_SOLAR / 100);
                    }

                    if ($hasil_rencana_realisasi[$i]->LAMBAT_PREMIUM != "") {
                        $sheetData->setCellValue('L' . (9 + $i), $hasil_rencana_realisasi[$i]->LAMBAT_PREMIUM / 100);
                    }
                    if ($hasil_rencana_realisasi[$i]->LAMBAT_SOLAR != "") {
                        $sheetData->setCellValue('M' . (9 + $i), $hasil_rencana_realisasi[$i]->LAMBAT_PERTAMAX / 100);
                    }
                    if ($hasil_rencana_realisasi[$i]->LAMBAT_PERTAMAX != "") {
                        $sheetData->setCellValue('N' . (9 + $i), $hasil_rencana_realisasi[$i]->LAMBAT_SOLAR / 100);
                    }

                    if ($hasil_rencana_realisasi[$i]->TIDAK_TERKIRIM_PREMIUM != "") {
                        $sheetData->setCellValue('O' . (9 + $i), $hasil_rencana_realisasi[$i]->TIDAK_TERKIRIM_PREMIUM / 100);
                    }
                    if ($hasil_rencana_realisasi[$i]->TIDAK_TERKIRIM_SOLAR != "") {
                        $sheetData->setCellValue('P' . (9 + $i), $hasil_rencana_realisasi[$i]->TIDAK_TERKIRIM_PERTAMAX / 100);
                    }
                    if ($hasil_rencana_realisasi[$i]->TIDAK_TERKIRIM_PERTAMAX != "") {
                        $sheetData->setCellValue('Q' . (9 + $i), $hasil_rencana_realisasi[$i]->TIDAK_TERKIRIM_SOLAR / 100);
                    }
                }

                if ($last_day == 28) {
                    $sheetData->removeRow(37, 1);
                    $sheetData->removeRow(37, 1);
                    $sheetData->removeRow(37, 1);
                } else if ($last_day == 29) {
                    $sheetData->removeRow(38, 1);
                    $sheetData->removeRow(38, 1);
                } else if ($last_day == 30) {
                    $sheetData->removeRow(39, 1);
                }

                $sheetData->setCellValue('C' . ($last_day + 9), "=AVERAGE(C9:E" . ($last_day + 8) . ")");
                $sheetData->setCellValue('F' . ($last_day + 9), "=AVERAGE(F9:H" . ($last_day + 8) . ")");
                $sheetData->setCellValue('I' . ($last_day + 9), "=AVERAGE(I9:K" . ($last_day + 8) . ")");
                $sheetData->setCellValue('L' . ($last_day + 9), "=AVERAGE(L9:N" . ($last_day + 8) . ")");
                $sheetData->setCellValue('O' . ($last_day + 9), "=AVERAGE(O9:Q" . ($last_day + 8) . ")");
                $sheetData->setCellValue('R' . ($last_day + 9), "=AVERAGE(R9:T" . ($last_day + 8) . ")");
                $sheetData->setCellValue('C' . ($last_day + 10), "=SUM(C" . ($last_day + 9) . "+F" . ($last_day + 9) . "+I" . ($last_day + 9) . ")");

                /*
                 * KPI
                 */
                $objPHPExcel->setActiveSheetIndexByName('KPI');
                $sheetData = $objPHPExcel->getActiveSheet();

                $sheetData->setCellValue('B4', "Terminal BBM " . ucfirst(strtolower($data_depot->NAMA_DEPOT)));
                $sheetData->setCellValue('H4', "Bulan " . $month_name[$bulan] . " " . $tahun);

                /*
                $objConditional1 = new PHPExcel_Style_Conditional();
                $objConditional1->setConditionType(PHPExcel_Style_Conditional::CONDITION_CELLIS);
                $objConditional1->setOperatorType(PHPExcel_Style_Conditional::OPERATOR_LESSTHAN);
                $objConditional1->addCondition('0');
                //$objConditional1->getStyle()->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_RED);
                $objConditional1->getStyle()->getFont()->setBold(true);
                $objConditional1->getStyle()->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB("FFFF00FF");

                //$sheetData->setCellValue('N8', $sheetData->getStyle('N8')->getFill()->getStartColor()->getRGB());
                //$sheetData->setCellValue('N9', $sheetData->getStyle('N9')->getFill()->getStartColor()->getRGB());
                //$sheetData->setCellValue('N11', $sheetData->getStyle('N11')->getFill()->getStartColor()->getRGB());
                //$objPHPExcel->getActiveSheet()->getStyle('N13:N16')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('FFFF0000');


                $objConditional2 = new PHPExcel_Style_Conditional();
                $objConditional2->setConditionType(PHPExcel_Style_Conditional::CONDITION_CELLIS);
                $objConditional2->setOperatorType(PHPExcel_Style_Conditional::OPERATOR_GREATERTHANOREQUAL);
                $objConditional2->addCondition('0');
                //$objConditional2->getStyle()->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_GREEN);
                //$objConditional2->getStyle()->getFont()->setBold(true);
                $objConditional2->getStyle()->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB("FF808080");


                $conditionalStyles = $objPHPExcel->getActiveSheet()->getStyle('K8')->getConditionalStyles();
                array_push($conditionalStyles, $objConditional1);
                array_push($conditionalStyles, $objConditional2);
                $objPHPExcel->getActiveSheet()->getStyle('K8')->setConditionalStyles($conditionalStyles);
                */
                if($hasil_kpi_operational){
                    $sheetData->setCellValue('G8', $hasil_kpi_operational[0]->TARGET);
                    $sheetData->setCellValue('I8', $hasil_kpi_operational[0]->REALISASI);

                    $sheetData->setCellValue('G9', $hasil_kpi_operational[1]->TARGET);
                    $sheetData->setCellValue('I9', $hasil_kpi_operational[1]->REALISASI);

                    $sheetData->setCellValue('G11', $hasil_kpi_operational[2]->TARGET);
                    $sheetData->setCellValue('I11', $hasil_kpi_operational[2]->REALISASI);

                    $sheetData->setCellValue('G13', $hasil_kpi_operational[3]->TARGET);
                    $sheetData->setCellValue('I13', $hasil_kpi_operational[3]->REALISASI);

                    $sheetData->setCellValue('G14', $hasil_kpi_operational[4]->TARGET);
                    $sheetData->setCellValue('I14', $hasil_kpi_operational[4]->REALISASI);

                    $sheetData->setCellValue('G15', $hasil_kpi_operational[5]->TARGET);
                    $sheetData->setCellValue('I15', $hasil_kpi_operational[5]->REALISASI);

                    $sheetData->setCellValue('G16', $hasil_kpi_operational[6]->TARGET);
                    $sheetData->setCellValue('I16', $hasil_kpi_operational[6]->REALISASI);

                    $sheetData->setCellValue('G18', $hasil_kpi_operational[7]->TARGET);
                    $sheetData->setCellValue('I18', $hasil_kpi_operational[7]->REALISASI);

                    $sheetData->setCellValue('G19', $hasil_kpi_operational[8]->TARGET);
                    $sheetData->setCellValue('I19', $hasil_kpi_operational[8]->REALISASI);

                    $sheetData->setCellValue('G22', $hasil_kpi_operational[9]->TARGET);
                    $sheetData->setCellValue('I22', $hasil_kpi_operational[9]->REALISASI);

                    $sheetData->setCellValue('E27', "=KL!" . $column_name[$last_day + 4] . ($jumlah_data + 4) . "*1000");
                }
                if ($pjs != "") {
                    $sheetData->setCellValue('C36', "Pjs Site Supervisor TBBM " . ucfirst(strtolower($data_depot->NAMA_DEPOT)));
                    $sheetData->setCellValue('C41', $pjs);
                } else {
                    $sheetData->setCellValue('C36', "Site Supervisor TBBM " . ucfirst(strtolower($data_depot->NAMA_DEPOT)));
                    $sheetData->setCellValue('C41', $data_depot->NAMA_PEGAWAI);
                }

                $sheetData->setCellValue('H36', "Operation Head TBBM " . ucfirst(strtolower($data_depot->NAMA_DEPOT)));
                $sheetData->setCellValue('H41', $data_depot->NAMA_OH);


                /*
                 * BA
                 */
                $objPHPExcel->setActiveSheetIndexByName('BA');
                $sheetData = $objPHPExcel->getActiveSheet();

                $romawi_bln = array("01" => "I", "02" => "II", "03" => "III", "04" => "IV", "05" => "V", "06" => "VI", "07" => "VII", "08" => "VIII", "09" => "IX", "10" => "X", "11" => "XI", "12" => "XII");
                $hari = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu");
                $dw = date("w", strtotime($tahun . "-" . $bulan . "-" . $last_day));
                $sheetData->setCellValue('C2', "NOMOR : ...../...../" . $romawi_bln[$bulan] . "/" . $tahun);
                $kata = "Pada hari ini " . $hari[$dw] . " tanggal " . $last_day . " bulan " . $month_name[$bulan] . " tahun " . $tahun . ", yang bertanda tangan dibawah ini PIHAK PERTAMA dan PIHAK KEDUA  menyatakan bahwa realisasi pengangkutan/pengiriman BBM/BBK untuk Bulan " . $month_name[$bulan] . " " . $tahun . " tanggal 1 s/d " . $last_day . ", dari  PT PERTAMINA (PERSERO) Region S&D " . AREA_OAM_ROMAWI . " Terminal BBM " . ucfirst(strtolower($data_depot->NAMA_DEPOT)) . " kepada Pelanggan/SPBU yang diangkut oleh mobil tangki yang dikelola oleh PT. PERTAMINA PATRA NIAGA dengan data - data sebagai berikut :";
                $sheetData->setCellValue('C4', $kata);

                $sheetData->setCellValue('C11', "01 - 14 " . $month_name[$bulan] . " " . $tahun);
                $sheetData->setCellValue('C12', "15 - " . $last_day . " " . $month_name[$bulan] . " " . $tahun);
                if($interpolasi){
                    $sheetData->setCellValue('E11', $interpolasi[0]->NILAI);
                    $sheetData->setCellValue('E12', $interpolasi[1]->NILAI);
                    $sheetData->setCellValue('F11', $interpolasi[2]->NILAI);
                    $sheetData->setCellValue('F12', $interpolasi[3]->NILAI);
                }
                $sheetData->setCellValue('G11', "=SUM(KL!E" . ($jumlah_data + 4) . ":R" . ($jumlah_data + 4) . ")*1000");
                $sheetData->setCellValue('G12', "=SUM(KL!S" . ($jumlah_data + 4) . ":" . $column_name[$last_day + 3] . ($jumlah_data + 4) . ")*1000");

                $sheetData->setCellValue('C26', ucfirst(strtolower($data_depot->NAMA_DEPOT)));
                $sheetData->setCellValue('H26', ucfirst(strtolower($data_depot->NAMA_DEPOT)));
                $sheetData->setCellValue('C34', $data_depot->NAMA_OH);

                if ($pjs != "") {
                    $sheetData->setCellValue('H25', "Pjs Site Supervisor Fleet TBBM");
                    $sheetData->setCellValue('H34', $pjs);
                } else {
                    $sheetData->setCellValue('H25', "Site Supervisor Fleet TBBM");
                    $sheetData->setCellValue('H34', $data_depot->NAMA_PEGAWAI);
                }

                $sheetData->setCellValue('C39', "Per Tanggal 1 - " . $last_day . " Berdasarkan Good Issue");
                $sheetData->setCellValue('C40', "Lokasi Depot " . ucfirst(strtolower($data_depot->NAMA_DEPOT)) . " Bulan " . $month_name[$bulan] . " " . $tahun);

                $sheetData->setCellValue('C80', ucfirst(strtolower($data_depot->NAMA_DEPOT)));
                $sheetData->setCellValue('G80', ucfirst(strtolower($data_depot->NAMA_DEPOT)));

                if ($pjs != "") {
                    $sheetData->setCellValue('G79', "Pjs Site Supervisor Fleet TBBM");
                    $sheetData->setCellValue('G86', $pjs);
                } else {
                    $sheetData->setCellValue('G79', "Site Supervisor Fleet TBBM");
                    $sheetData->setCellValue('G86', $data_depot->NAMA_PEGAWAI);
                }

                $sheetData->setCellValue('C88', "TERMINAL BBM " . strtoupper($data_depot->NAMA_DEPOT));

                $kata = "Pada hari ini " . $hari[$dw] . " tanggal " . $last_day . " bulan " . $month_name[$bulan] . " tahun " . $tahun . ", yang bertanda tangan dibawah ini PIHAK PERTAMA dan PIHAK KEDUA  menyatakan bahwa realisasi penyerahan produk BBM/BBK untuk Bulan " . $month_name[$bulan] . " " . $tahun . " tanggal 1 s/d " . $last_day . ", dari  PT PERTAMINA (PERSERO) Region S&D " . AREA_OAM_ROMAWI . " Terminal BBM " . ucfirst(strtolower($data_depot->NAMA_DEPOT)) . " kepada Pelanggan/SPBU yang diangkut oleh mobil tangki yang dikelola oleh PT. PERTAMINA PATRA NIAGA dengan data - data sebagai berikut :";
                $sheetData->setCellValue('C91', $kata);

                $sheetData->setCellValue('D97', "Terminal BBM " . ucfirst(strtolower($data_depot->NAMA_DEPOT)));
                $sheetData->setCellValue('F97', $month_name[$bulan] . " " . $tahun);

                $sheetData->setCellValue('C118', "TERMINAL BBM " . strtoupper($data_depot->NAMA_DEPOT));

                $kata = "Pada hari ini " . $hari[$dw] . " tanggal " . $last_day . " bulan " . $month_name[$bulan] . " tahun " . $tahun . ", yang bertanda tangan dibawah ini PIHAK PERTAMA dan PIHAK KEDUA menyatakan bahwa realisasi penyelesaian perkerjaan 100% bulanan penyaluran produk BBM/BBK untuk Bulan " . $month_name[$bulan] . " " . $tahun . " tanggal 1 s/d " . $last_day . ", dari  PT PERTAMINA (PERSERO) Region S&D " . AREA_OAM_ROMAWI . " Terminal BBM " . ucfirst(strtolower($data_depot->NAMA_DEPOT)) . " kepada Pelanggan/SPBU yang diangkut oleh mobil tangki yang dikelola oleh PT. PERTAMINA PATRA NIAGA dengan data - data sebagai berikut :";
                $sheetData->setCellValue('C120', $kata);
                $sheetData->setCellValue('C141', "S & D Region Manager " . AREA_OAM_ROMAWI);

                $sheetData->setCellValue('C150', "TERMINAL BBM " . strtoupper($data_depot->NAMA_DEPOT));
                $kata = "Pada hari ini " . $hari[$dw] . " tanggal " . $last_day . " bulan " . $month_name[$bulan] . " tahun " . $tahun . ", yang bertanda tangan dibawah ini PIHAK PERTAMA dan PIHAK KEDUA menyatakan bahwa realisasi penyerahan produk BBM/BBK untuk Bulan " . $month_name[$bulan] . " " . $tahun . " tanggal 1 s/d " . $last_day . ", dari  PT PERTAMINA (PERSERO) Region S&D " . AREA_OAM_ROMAWI . " Terminal BBM " . ucfirst(strtolower($data_depot->NAMA_DEPOT)) . " kepada Pelanggan/SPBU yang diangkut oleh mobil tangki yang dikelola oleh PT. PERTAMINA PATRA NIAGA dengan data - data sebagai berikut :";
                $sheetData->setCellValue('C153', $kata);

                $sheetData->setCellValue('D159', "Terminal BBM " . ucfirst(strtolower($data_depot->NAMA_DEPOT)));
                $sheetData->setCellValue('F159', $month_name[$bulan] . " " . $tahun);


                $sheetData->setCellValue('C172', ucfirst(strtolower($data_depot->NAMA_DEPOT)));
                $sheetData->setCellValue('H172', ucfirst(strtolower($data_depot->NAMA_DEPOT)));
                $sheetData->setCellValue('C178', $data_depot->NAMA_OH);

                if ($pjs != "") {
                    $sheetData->setCellValue('H171', "Pjs Site Supervisor Fleet TBBM");
                    $sheetData->setCellValue('H178', $pjs);
                } else {
                    $sheetData->setCellValue('H171', "Site Supervisor Fleet TBBM");
                    $sheetData->setCellValue('H178', $data_depot->NAMA_PEGAWAI);
                }

                if ($last_day == 28) {
                    $sheetData->removeRow(73, 1);
                    $sheetData->removeRow(72, 1);
                    $sheetData->removeRow(71, 1);
                    $sheetData->setCellValue('E73', "=SUM(E43:E70)");
                    $sheetData->setCellValue('F73', "=SUM(F43:F70)");
                    $sheetData->setCellValue('G73', "=SUM(G43:G70)");
                    $sheetData->setCellValue('H73', "=SUM(H43:H70)");
                    $sheetData->setCellValue('I73', "=SUM(I43:I70)");
                } else if ($last_day == 29) {
                    $sheetData->removeRow(73, 1);
                    $sheetData->removeRow(72, 1);
                    $sheetData->setCellValue('E73', "=SUM(E43:E71)");
                    $sheetData->setCellValue('F73', "=SUM(F43:F71)");
                    $sheetData->setCellValue('G73', "=SUM(G43:G71)");
                    $sheetData->setCellValue('H73', "=SUM(H43:H71)");
                    $sheetData->setCellValue('I73', "=SUM(I43:I71)");
                } else if ($last_day == 30) {
                    $sheetData->removeRow(73, 1);
                    $sheetData->setCellValue('E73', "=SUM(E43:E72)");
                    $sheetData->setCellValue('F73', "=SUM(F43:F72)");
                    $sheetData->setCellValue('G73', "=SUM(G43:G72)");
                    $sheetData->setCellValue('H73', "=SUM(H43:H72)");
                    $sheetData->setCellValue('I73', "=SUM(I43:I72)");
                }
				$cek_kinerja=0;
				$cek_kinerja = $this->m_laporan->cekKinerjaAPMS($depot,$tahun,$bulan);
				//echo $cek_kinerja;
                if ($data_depot->STATUS_APMS == 1 && $cek_kinerja!=0) {
                    /*
                      Realisasi Volume APMS
                     */
                    $objPHPExcel->setActiveSheetIndexByName('Realisasi Volume APMS');
                    $sheetData = $objPHPExcel->getActiveSheet();

                    $sheetData->setCellValue('A151', "TBBM " . $data_depot->NAMA_DEPOT);
                    $sheetData->setCellValue('A158', $data_depot->NAMA_OH);
                    $sheetData->setCellValue('E149', ucfirst(strtolower($data_depot->NAMA_DEPOT)) . ", " . $last_day . " " . $month_name[$bulan] . " " . $tahun);
                    if ($pjs != "") {
                        //$sheetData->setCellValue('E151', "Pjs SITE MANAGER/SITE SUPERVISOR");
                        $sheetData->setCellValue('E158', $pjs);
                    } else {
                        //$sheetData->setCellValue('E151', "SITE MANAGER/SITE SUPERVISOR");
                        $sheetData->setCellValue('E158', $data_depot->NAMA_PEGAWAI);
                    }

                    $data_realisasi_apms = $this->m_laporan->getLaporanRealisasiAPMS($depot, $tahun, $bulan);
                    $data_apms = $this->m_laporan->getAPMS($depot, $tahun, $bulan);
                    $sheetData->setCellValue('A2', "1 s/d " . $last_day . " " . $month_name[$bulan] . " " . $tahun);
                    $k = 4;
                    $l = 0;
                    $i = 0;
                    foreach ($data_apms as $row) {
                        $sheetData->setCellValue('A' . $k, 'APMS ' . $row->NO_APMS);
                        $k = $k + 6;
                    }
                    $k = 4;
                    $i = 0;
                    foreach ($data_realisasi_apms as $row) {
                        if ($sheetData->getCell('A' . $k)->getValue() == 'APMS ' . $row->NO_APMS) {
                            $sheetData->insertNewRowBefore($k + 3 + $i, 1);

                            $sheetData->setCellValue('B' . '' . ($k + 2 + $i) . '', $row->NO_DELIVERY);
                            $sheetData->setCellValue('A' . '' . ($k + 2 + $i) . '', $i + 1);
                            $sheetData->setCellValue('D' . '' . ($k + 2 + $i) . '', $row->SHIP_TO);
                            $sheetData->setCellValue('E' . '' . ($k + 2 + $i) . '', $row->NAMA_PENGUSAHA);
                            $sheetData->setCellValue('F' . '' . ($k + 2 + $i) . '', $row->DATE_PLAN_GI);
                            if ($row->SOLAR == 0) {
                                $sheetData->setCellValue('G' . '' . ($k + 2 + $i) . '', $row->PREMIUM);
                                $sheetData->setCellValue('C' . '' . ($k + 2 + $i) . '', 'PREMIUM');
                            } else {
                                $sheetData->setCellValue('G' . '' . ($k + 2 + $i) . '', $row->SOLAR);
                                $sheetData->setCellValue('C' . '' . ($k + 2 + $i) . '', 'BIO SOLAR');
                            }
                            /*
                             */
                            $i++;
                        } else {
                            $objPHPExcel->getActiveSheet()->removeRow($k + 2 + $i, 2);
                            $sheetData->setCellValue('G' . '' . ($k + 2 + $i) . '', "=SUM(G" . $k . ":" . 'G' . ($k + 1 + $i) . ")");
                            $k = $k + 4 + $i;
                            $i = 0;
                            $sheetData->insertNewRowBefore($k + 3 + $i, 1);
                            $sheetData->setCellValue('B' . '' . ($k + 2 + $i) . '', $row->NO_DELIVERY);
                            $sheetData->setCellValue('A' . '' . ($k + 2 + $i) . '', $i + 1);
                            $sheetData->setCellValue('D' . '' . ($k + 2 + $i) . '', $row->SHIP_TO);
                            $sheetData->setCellValue('E' . '' . ($k + 2 + $i) . '', $row->NAMA_PENGUSAHA);
                            $sheetData->setCellValue('F' . '' . ($k + 2 + $i) . '', $row->DATE_PLAN_GI);
                            if ($row->SOLAR == 0) {
                                $sheetData->setCellValue('G' . '' . ($k + 2 + $i) . '', $row->PREMIUM);
                                $sheetData->setCellValue('C' . '' . ($k + 2 + $i) . '', 'PREMIUM');
                            } else {
                                $sheetData->setCellValue('G' . '' . ($k + 2 + $i) . '', $row->SOLAR);
                                $sheetData->setCellValue('C' . '' . ($k + 2 + $i) . '', 'BIO SOLAR');
                            }
                            /*
                             */
                            $i++;
                        }
                    }
                    $objPHPExcel->getActiveSheet()->removeRow($k + 2 + $i, 2);
                    $sheetData->setCellValue('G' . '' . ($k + 2 + $i) . '', "=SUM(G" . $k . ":" . 'G' . ($k + 1 + $i) . ")");
                    for ($j = ($k + $i); $j < 145; $j++) {
                        $objPHPExcel->getActiveSheet()->removeRow($k + 4 + $i, 1);
                    }

                    /*
                      BIAYA Angkut
                     */
                    $objPHPExcel->setActiveSheetIndexByName('Biaya Angkutan APMS');
                    $sheetData = $objPHPExcel->getActiveSheet();

                    $laporanBiaya = $this->m_laporan->getRealisasiBiayaAPMS($depot, $tahun, $bulan);
                    $sheetData->setCellValue('A1', "BIAYA ANGKUTAN APMS TERMINAL BBM " . $data_depot->NAMA_DEPOT);
                    $sheetData->setCellValue('A2', "1 s/d " . $last_day . " " . $month_name[$bulan] . " " . $tahun);

                    $sheetData->setCellValue('A19', "TBBM " . $data_depot->NAMA_DEPOT);
                    $sheetData->setCellValue('A24', $data_depot->NAMA_OH);
                    $sheetData->setCellValue('J17', ucfirst(strtolower($data_depot->NAMA_DEPOT)) . ", " . $last_day . " " . $month_name[$bulan] . " " . $tahun);
                    if ($pjs != "") {
                        //$sheetData->setCellValue('E151', "Pjs SITE MANAGER/SITE SUPERVISOR");
                        $sheetData->setCellValue('J24', $pjs);
                    } else {
                        //$sheetData->setCellValue('E151', "SITE MANAGER/SITE SUPERVISOR");
                        $sheetData->setCellValue('J24', $data_depot->NAMA_PEGAWAI);
                    }

                    $i = 0;
                    $k = 7;
                    foreach ($laporanBiaya as $row) {
                        $sheetData->insertNewRowBefore($i + $k + 1, 1);
                        $sheetData->setCellValue('A' . '' . ($k + $i) . '', $i + 1);
                        $sheetData->setCellValue('B' . '' . ($k + $i) . '', $row->NO_APMS);
                        $sheetData->setCellValue('C' . '' . ($k + $i) . '', $row->NAMA_PENGUSAHA);
                        $sheetData->setCellValue('D' . '' . ($k + $i) . '', $row->SUPPLY_POINT);
                        $sheetData->setCellValue('E' . '' . ($k + $i) . '', $row->ALAMAT);
                        $sheetData->setCellValue('F' . '' . ($k + $i) . '', $row->NAMA_TRANSPORTIR);
                        $sheetData->setCellValue('G' . '' . ($k + $i) . '', $row->NO_PERJANJIAN);
                        $sheetData->setCellValue('H' . '' . ($k + $i) . '', $row->PREMIUM);
                        $sheetData->setCellValue('I' . '' . ($k + $i) . '', $row->SOLAR);
                        $sheetData->setCellValue('J' . '' . ($k + $i) . '', $row->SOLAR + $row->PREMIUM);
                        $sheetData->setCellValue('K' . '' . ($k + $i) . '', $row->TARIF_PATRA_NIAGA);
                        $sheetData->setCellValue('L' . '' . ($k + $i) . '', "=J" . ($k + $i) . "*" . 'K' . ($k + $i));
                        $i++;
                    }
                    $objPHPExcel->getActiveSheet()->removeRow($k + $i, 1);
                    $objPHPExcel->getActiveSheet()->removeRow($k + $i, 1);
                    $sheetData->setCellValue('H' . '' . ($k + $i) . '', "=SUM(H" . $k . ":" . 'H' . ($k + $i - 1) . ")");
                    $sheetData->setCellValue('I' . '' . ($k + $i) . '', "=SUM(I" . $k . ":" . 'I' . ($k + $i - 1) . ")");
                    $sheetData->setCellValue('J' . '' . ($k + $i) . '', "=SUM(J" . $k . ":" . 'J' . ($k + $i - 1) . ")");
                    $sheetData->setCellValue('L' . '' . ($k + $i) . '', "=SUM(L" . $k . ":" . 'L' . ($k + $i - 1) . ")");

                    /*
                      kpi
                     */
                    $objPHPExcel->setActiveSheetIndexByName('KPI APMS');
                    $sheetData = $objPHPExcel->getActiveSheet();

                    $laporanBiaya = $this->m_laporan->getRealisasiBiayaAPMS($depot, $tahun, $bulan);
                    $sheetData->setCellValue('A3', "WILAYAH S & D REGION ".AREA_OAM_ROMAWI." TERMINAL BBM " . $data_depot->NAMA_DEPOT);
                    $sheetData->setCellValue('A4', "Bulan : " . $month_name[$bulan] . " " . $tahun);

                    $sheetData->setCellValue('A23', "TBBM " . $data_depot->NAMA_DEPOT);
                    $sheetData->setCellValue('A30', $data_depot->NAMA_OH);
                    $sheetData->setCellValue('K21', ucfirst(strtolower($data_depot->NAMA_DEPOT)) . ", " . $last_day . " " . $month_name[$bulan] . " " . $tahun);
                    if ($pjs != "") {
                        //$sheetData->setCellValue('E151', "Pjs SITE MANAGER/SITE SUPERVISOR");
                        $sheetData->setCellValue('A30', $pjs);
                    } else {
                        //$sheetData->setCellValue('E151', "SITE MANAGER/SITE SUPERVISOR");
                        $sheetData->setCellValue('K30', $data_depot->NAMA_PEGAWAI);
                    }

                    $data_kpi = $this->m_laporan->selectKPIApms($depot, $tahun, $bulan);
                    $i = 1;
                    $k = 6;
                    $j = 0;
                    foreach ($data_kpi as $row) {
                        //echo $row->ID_JENIS_KPI_APMS ;
                        if ($row->ID_JENIS_KPI_APMS == $i) {
                            if ($row->ID_JENIS_KPI_APMS > 5) {
                                $sheetData->setCellValue('F' . '' . ($k + $i + 1) . '', $row->TARGET);
                                $sheetData->setCellValue('H' . '' . ($k + $i + 1) . '', $row->REALISASI);
                            } else {
                                $sheetData->setCellValue('F' . '' . ($k + $i) . '', $row->TARGET);
                                $sheetData->setCellValue('H' . '' . ($k + $i) . '', $row->REALISASI);
                            }
                        }
                        $i++;
                    }
					
					/*
                      kpi Madiun
                     */
                    $objPHPExcel->setActiveSheetIndexByName('KPI APMS');
                    $sheetData = $objPHPExcel->getActiveSheet();

                    $laporanBiaya = $this->m_laporan->getRealisasiBiayaAPMS($depot, $tahun, $bulan);
                    //$sheetData->setCellValue('A3', "WILAYAH S & D REGION ".AREA_OAM_ROMAWI." TERMINAL BBM " . $data_depot->NAMA_DEPOT);
                    $sheetData->setCellValue('A5', "Terminal". $data_depot->NAMA_DEPOT ."Bulan : " . $month_name[$bulan] . " " . $tahun);

                    //$sheetData->setCellValue('A23', "TBBM " . $data_depot->NAMA_DEPOT);
                    $sheetData->setCellValue('J52', $data_depot->NAMA_OH);
                    //$sheetData->setCellValue('K21', ucfirst(strtolower($data_depot->NAMA_DEPOT)) . ", " . $last_day . " " . $month_name[$bulan] . " " . $tahun);
                    if ($pjs != "") {
                        $sheetData->setCellValue('B47', "Pjs SITE MANAGER/SITE SUPERVISOR");
                        $sheetData->setCellValue('B52', $pjs);
                    } else {
                        $sheetData->setCellValue('B47', "SITE MANAGER/SITE SUPERVISOR");
                        $sheetData->setCellValue('B52', $data_depot->NAMA_PEGAWAI);
                    }

                    $data_kpi = $this->m_laporan->selectKPIApms($depot, $tahun, $bulan);
					$sheetData->setCellValue('F9', $data_kpi[0]->TARGET);
					$sheetData->setCellValue('H9', $data_kpi[0]->REALISASI);
					$sheetData->setCellValue('F10', $data_kpi[1]->TARGET);
					$sheetData->setCellValue('H10', $data_kpi[1]->REALISASI);
					$sheetData->setCellValue('F12', $data_kpi[2]->TARGET);
					$sheetData->setCellValue('H12', $data_kpi[2]->REALISASI);
					$sheetData->setCellValue('F14', $data_kpi[3]->TARGET);
					$sheetData->setCellValue('H14', $data_kpi[3]->REALISASI);
					$sheetData->setCellValue('F15', $data_kpi[4]->TARGET);
					$sheetData->setCellValue('H15', $data_kpi[4]->REALISASI);
					$sheetData->setCellValue('F16', $data_kpi[5]->TARGET);
					$sheetData->setCellValue('H16', $data_kpi[5]->REALISASI);
					$sheetData->setCellValue('F18', $data_kpi[6]->TARGET);
					$sheetData->setCellValue('H18', $data_kpi[6]->REALISASI);
					$sheetData->setCellValue('F19', $data_kpi[7]->TARGET);
					$sheetData->setCellValue('H19', $data_kpi[7]->REALISASI);
                    $sheetData->setCellValue('F25', $data_kpi[8]->TARGET);
					$sheetData->setCellValue('H25', $data_kpi[8]->REALISASI);        
					
                    /*
                      Data Pengiriman APMS
                     */
                    $objPHPExcel->setActiveSheetIndexByName('Data Pengiriman APMS');
                    $sheetData = $objPHPExcel->getActiveSheet();

                    $laporanBiaya = $this->m_laporan->getRealisasiBiayaAPMS($depot, $tahun, $bulan);
                    $sheetData->setCellValue('A1', "Data Pengiriman BBM APMS DEPOT " . $data_depot->NAMA_DEPOT);


                    $data_pengiriman = $this->m_laporan->selectDataPengiriman($depot, $tahun, $bulan);
					//$x=0;
                    $i = 1;
                    $j = 1;
                    $k = 3;
                    $t_premium = 0;
                    $premium = 0;
                    $t_solar = 0;
                    $solar = 0;
					$apm=0;
					$last = "=0";
					$last1 = "=0";
                    foreach ($data_pengiriman as $row) {
                        if ($i == 1) {
						   $sheetData->insertNewRowBefore($i + $k + 1, 1);
                            $sheetData->setCellValue('A' . '' . ($k + $i) . '', $j);
                            $sheetData->setCellValue('B' . '' . ($k + $i) . '', $row->NAMA_PENGUSAHA);
                            $sheetData->setCellValue('C' . '' . ($k + $i) . '', date('d-m-Y',strtotime($row->DATE_PLAN_GI)));
                            $sheetData->setCellValue('D' . '' . ($k + $i) . '', $row->NO_APMS);
                            $sheetData->setCellValue('E' . '' . ($k + $i) . '', $row->ALAMAT);
                            $sheetData->setCellValue('F' . '' . ($k + $i) . '', $row->NO_DELIVERY);
                            $sheetData->setCellValue('G' . '' . ($k + $i) . '', date('d-m-Y',strtotime($row->DATE_DELIVERY)));
                            $sheetData->setCellValue('H' . '' . ($k + $i) . '', $row->ORDER_NUMBER);
                            $sheetData->setCellValue('I' . '' . ($k + $i) . '', date('d-m-Y',strtotime($row->DATE_ORDER)));
                            $sheetData->setCellValue('J' . '' . ($k + $i) . '', $row->SHIP_TO);
                            $sheetData->setCellValue('K' . '' . ($k + $i) . '', $row->DESCRIPTION);
                            $sheetData->setCellValue('L' . '' . ($k + $i) . '', $data_depot->NAMA_DEPOT);
                            if ($row->PREMIUM != 0) {
                                $sheetData->setCellValue('M' . '' . ($k + $i) . '', "Premium");
                                $sheetData->setCellValue('N' . '' . ($k + $i) . '', $row->PREMIUM);
                                $sheetData->setCellValue('P' . '' . ($k + $i) . '', "Premium");
                                $premium = $premium + $row->PREMIUM;
                            } else {
                                $sheetData->setCellValue('M' . '' . ($k + $i) . '', "Solar");
                                $sheetData->setCellValue('N' . '' . ($k + $i) . '', $row->SOLAR);
                                $sheetData->setCellValue('P' . '' . ($k + $i) . '', "Solar");
                                $solar = $solar + $row->SOLAR;
                            }
                            $sheetData->setCellValue('O' . '' . ($k + $i) . '', $row->PENGIRIMAN_KAPAL);
                           $sheetData->setCellValue('Q' . '' . ($k + $i) . '', date('d-m-Y',strtotime($row->DATE_KAPAL_DATANG)));
                           $sheetData->setCellValue('R' . '' . ($k + $i) . '', date('d-m-Y',strtotime($row->DATE_KAPAL_BERANGKAT)));
                            $j++;
							$apm++;
                        } else {
                            if ($sheetData->getCell('D' . ($k + $i - 1))->getValue() == $row->NO_APMS) {
                                $sheetData->insertNewRowBefore($i + $k + 1, 1);
                                $sheetData->setCellValue('A' . '' . ($k + $i) . '', $j);
                                $sheetData->setCellValue('B' . '' . ($k + $i) . '', $row->NAMA_PENGUSAHA);
                                $sheetData->setCellValue('C' . '' . ($k + $i) . '', date('d-m-Y',strtotime($row->DATE_PLAN_GI)));
                                $sheetData->setCellValue('D' . '' . ($k + $i) . '', $row->NO_APMS);
                                $sheetData->setCellValue('E' . '' . ($k + $i) . '', $row->ALAMAT);
                                $sheetData->setCellValue('F' . '' . ($k + $i) . '', $row->NO_DELIVERY);
                                $sheetData->setCellValue('G' . '' . ($k + $i) . '', date('d-m-Y',strtotime($row->DATE_DELIVERY)));
                                $sheetData->setCellValue('H' . '' . ($k + $i) . '', $row->ORDER_NUMBER);
                                $sheetData->setCellValue('I' . '' . ($k + $i) . '', date('d-m-Y',strtotime($row->DATE_ORDER)));
                                $sheetData->setCellValue('J' . '' . ($k + $i) . '', $row->SHIP_TO);
                                $sheetData->setCellValue('K' . '' . ($k + $i) . '', $row->DESCRIPTION);
                                $sheetData->setCellValue('L' . '' . ($k + $i) . '', $data_depot->NAMA_DEPOT);
                                $j++;
                                if ($row->PREMIUM != 0) {
                                    $sheetData->setCellValue('M' . '' . ($k + $i) . '', "Premium");
                                    $sheetData->setCellValue('N' . '' . ($k + $i) . '', $row->PREMIUM);
                                    $sheetData->setCellValue('P' . '' . ($k + $i) . '', "Premium");
                                    $premium = $premium + $row->PREMIUM;
                                } else {
                                    $sheetData->setCellValue('M' . '' . ($k + $i) . '', "Solar");
                                    $sheetData->setCellValue('N' . '' . ($k + $i) . '', $row->SOLAR);
                                    $sheetData->setCellValue('P' . '' . ($k + $i) . '', "Solar");
                                    $solar = $solar + $row->SOLAR;
                                }
                                $sheetData->setCellValue('O' . '' . ($k + $i) . '', $row->PENGIRIMAN_KAPAL);
                               $sheetData->setCellValue('Q' . '' . ($k + $i) . '', date('d-m-Y',strtotime($row->DATE_KAPAL_DATANG)));
                                $sheetData->setCellValue('R' . '' . ($k + $i) . '', date('d-m-Y',strtotime($row->DATE_KAPAL_BERANGKAT)));
                            } else{
								$apm++;
                                $objPHPExcel->getActiveSheet()->removeRow($k + $i, 1);
                                $objPHPExcel->getActiveSheet()->removeRow($k + $i, 1);
                                $sheetData->setCellValue('N' . '' . ($k + $i + 2) . '', $premium);
                                $sheetData->setCellValue('N' . '' . ($k + $i + 2 + 1) . '', $solar);
                                $sheetData->setCellValue('N' . '' . ($k + $i) . '', "=SUM(N" . ($k + $i - $j + 1) . ":" . 'N' . ($k + $i - 1) . ")");
                                $last = $last.'+N' . '' . ($k + $i + 2);
								$last1 = $last1.'+N' . '' . ($k + $i + 2 + 1);
								$t_premium = $t_premium + $premium;
                                $t_solar = $t_solar + $solar;
                                $premium = 0;
                                $solar = 0;
                                $k = $k + 7;
                                $j = 1;
                                $sheetData->insertNewRowBefore($i + $k + 1, 1);
                                $sheetData->setCellValue('A' . '' . ($k + $i) . '', $j);
                                $sheetData->setCellValue('B' . '' . ($k + $i) . '', $row->NAMA_PENGUSAHA);
                                $sheetData->setCellValue('C' . '' . ($k + $i) . '', date('d-m-Y',strtotime($row->DATE_PLAN_GI)));
                                $sheetData->setCellValue('D' . '' . ($k + $i) . '', $row->NO_APMS);
                                $sheetData->setCellValue('E' . '' . ($k + $i) . '', $row->ALAMAT);
                                $sheetData->setCellValue('F' . '' . ($k + $i) . '', $row->NO_DELIVERY);
                                $sheetData->setCellValue('G' . '' . ($k + $i) . '', date('d-m-Y',strtotime($row->DATE_DELIVERY)));
                                $sheetData->setCellValue('H' . '' . ($k + $i) . '', $row->ORDER_NUMBER);
                                $sheetData->setCellValue('I' . '' . ($k + $i) . '', date('d-m-Y',strtotime($row->DATE_ORDER)));
                                $sheetData->setCellValue('J' . '' . ($k + $i) . '', $row->SHIP_TO);
                                $sheetData->setCellValue('K' . '' . ($k + $i) . '', $row->DESCRIPTION);
                                $sheetData->setCellValue('L' . '' . ($k + $i) . '', $data_depot->NAMA_DEPOT);
                                if ($row->PREMIUM != 0) {
                                    $sheetData->setCellValue('M' . '' . ($k + $i) . '', "Premium");
                                    $sheetData->setCellValue('N' . '' . ($k + $i) . '', $row->PREMIUM);
                                    $sheetData->setCellValue('P' . '' . ($k + $i) . '', "Premium");
                                    $premium = $premium + $row->PREMIUM;
                                } else {
                                    $sheetData->setCellValue('M' . '' . ($k + $i) . '', "Solar");
                                    $sheetData->setCellValue('N' . '' . ($k + $i) . '', $row->SOLAR);
                                    $sheetData->setCellValue('P' . '' . ($k + $i) . '', "Solar");
                                    $solar = $solar + $row->SOLAR;
                                }
                                $sheetData->setCellValue('O' . '' . ($k + $i) . '', $row->PENGIRIMAN_KAPAL);
                                $sheetData->setCellValue('Q' . '' . ($k + $i) . '', date('d-m-Y',strtotime($row->DATE_KAPAL_DATANG)));
                                $sheetData->setCellValue('R' . '' . ($k + $i) . '', date('d-m-Y',strtotime($row->DATE_KAPAL_BERANGKAT)));
                                $j++;
                            }
                        }
                        $i++;
                    }
					
                    $objPHPExcel->getActiveSheet()->removeRow($k + $i, 1);
                    $objPHPExcel->getActiveSheet()->removeRow($k + $i, 1);
                    $sheetData->setCellValue('N' . '' . ($k + $i + 2) . '', $premium);
                    $sheetData->setCellValue('N' . '' . ($k + $i + 2 + 1) . '', $solar);
					$t_premium = $t_premium + $premium;
					$t_solar = $t_solar + $solar;
                    $sheetData->setCellValue('N' . '' . ($k + $i) . '', "=SUM(N" . ($k + $i - $j + 1) . ":" . 'N' . ($k + $i - 1) . ")");
					$last = $last.'+N' . '' . ($k + $i + 2);
					$last1 = $last1.'+N' . '' . ($k + $i + 2 + 1);
					$sp =0;
					if($apm!=0)
					{
						$sp = (($i-1)-$apm*2);
					}
					//echo $x;
                    for ($h = ($k + $i + 2 + 1);$h < 180 + (($i-1)-$apm*2);$h++){
                       $objPHPExcel->getActiveSheet()->removeRow(($k + $i + 2+1+1) , 1);
						
					}
                    //$sheetData->setCellValue('N' . '' . ($k + $i + 2 + 3) . '', $t_premium);
                    $sheetData->setCellValue('N' . '' . ($k + $i + 2 + 3) . '', $last);
                    $sheetData->setCellValue('N' . '' . ($k + $i + 2 + 1 + 3) . '', $last1);
                    //$sheetData->setCellValue('N' . '' . ($k + $i + 2 + 1 + 3) . '', $t_solar);


                    /*
                     * Realisasi Penyaluran
                     */

                    $objPHPExcel->setActiveSheetIndexByName('Realisasi Penyaluran APMS');
                    $sheetData = $objPHPExcel->getActiveSheet();

                    $sheetData->setCellValue('A2', "REALISASI PENYALURAN HARIAN APMS TERMINAL BBM " . $data_depot->NAMA_DEPOT);
                    $sheetData->setCellValue('A3', "1 s/d " . $last_day . " " . $month_name[$bulan] . " " . $tahun);

                    $sheetData->setCellValue('A16', "Terminal BBM " . $data_depot->NAMA_DEPOT);
                    $sheetData->setCellValue('A20', $data_depot->NAMA_OH);
                    $sheetData->setCellValue('AK14', ucfirst(strtolower($data_depot->NAMA_DEPOT)) . ", " . $last_day . " " . $month_name[$bulan] . " " . $tahun);
                    if ($pjs != "") {
                        $sheetData->setCellValue('AK20', $pjs);
                    } else {
                        $sheetData->setCellValue('AK20', $data_depot->NAMA_PEGAWAI);
                    }


                    if ($last_day == 28) {
                        $sheetData->removeColumn('AJ', 1);
                        $sheetData->removeColumn('AI', 1);
                        $sheetData->removeColumn('AH', 1);
                    } else if ($last_day == 29) {
                        $sheetData->removeColumn('AJ', 1);
                        $sheetData->removeColumn('AI', 1);
                    } else if ($last_day == 30) {
                        $sheetData->removeColumn('AJ', 1);
                    }

                    $hasil_realisasi = $this->m_laporan->realisasiAPMS1($depot, $tahun, $bulan);
                    $l = 1;
                    $k = 10;
                    $no_apms_temp = "kosong";
                    foreach ($hasil_realisasi as $row) {
                        if ($no_apms_temp != $row->NO_APMS) {
                            $sheetData->insertNewRowBefore(9, 1);
                            $sheetData->insertNewRowBefore(9, 1);
                            $sheetData->setCellValue('A9', $l);
                            $sheetData->setCellValue('B9', $row->NO_APMS);
                            $sheetData->setCellValue('C9', $row->NAMA_PENGUSAHA);
                            $sheetData->setCellValue('D9', "Premium");
                            $sheetData->setCellValue('D10', "Solar");
                            $sheetData->setCellValue('E9', $row->K_PREMIUM);
                            $sheetData->setCellValue('E10', $row->K_SOLAR);

                            $sheetData->mergeCells('A9:A10');
                            $sheetData->mergeCells('B9:B10');
                            $sheetData->mergeCells('C9:C10');

                            $no_apms_temp = $row->NO_APMS;
                            $l++;
							$col_no = $row->tanggal + 4;
                            if ($row->j_solar == 0) {
                                $nilai = $sheetData->getCell($column_name[$col_no] . '9')->getValue();
								
                                $nilai = $nilai+ $row->j_premium;
                                $sheetData->setCellValue($column_name[$col_no] . '9', $nilai);
                            } else {
                                $nilai = $sheetData->getCell($column_name[$col_no] . '10')->getValue();
								
                                $nilai = $nilai + $row->j_solar;
                                $sheetData->setCellValue($column_name[$col_no] . '10', $nilai);
                            }
                        } else {
                            $col_no = $row->tanggal + 4;
                            if ($row->j_solar == 0) {
                                $nilai = $sheetData->getCell($column_name[$col_no] . '9')->getValue();
								
                                $nilai = $nilai + $row->j_premium;
                                $sheetData->setCellValue($column_name[$col_no] . '9', $nilai);
                            } else {
                                $nilai = $sheetData->getCell($column_name[$col_no] . '10')->getValue();
								
                                $nilai = $nilai + $row->j_solar;
                                $sheetData->setCellValue($column_name[$col_no] . '10', $nilai);
                            }
                        }
                    }

                    for ($i = 0; $i < $last_day; $i++) {
                        $dw = date("w", strtotime($tahun . "-" . $bulan . "-" . ($i + 1)));
                        if ($dw == 0) {
                            for ($j = 7; $j < (7 + (2 * $l) + 3); $j++) {
                                $sheetData->getStyle($column_name[$i + 5] . $j)->getFill()->applyFromArray(array('type' => PHPExcel_Style_Fill::FILL_SOLID, 'startcolor' => array('rgb' => 'FF0000')));
                            }
                        }
                    }

                    for ($j = 8; $j < (8 + (2 * $l)); $j++) {
                        $sheetData->setCellValue($column_name[$last_day + 5] . $j, "=SUM(F" . $j . ":" . $column_name[$last_day + 4] . $j . ")");
                        $sheetData->setCellValue($column_name[$last_day + 6] . $j, "=E" . $j . "-" . $column_name[$last_day + 5] . $j);
                        $sheetData->setCellValue($column_name[$last_day + 7] . $j, "=(" . $column_name[$last_day + 5] . $j . "/E" . $j . ")*100");
                    }

                    for ($i = 0; $i <= $last_day + 1; $i++) {
                        $formula_premium = "";
                        $formula_solar = "";
                        for ($j = 9; $j < (7 + (2 * $l)); $j++) {
                            if ($j % 2 == 1) {
                                $formula_premium = $formula_premium . "+" . $column_name[$i + 4] . $j;
                            } else {
                                $formula_solar = $formula_solar . "+" . $column_name[$i + 4] . $j;
                            }
                        }
                        $formula_premium[0] = "=";
                        $formula_solar[0] = "=";

                        $sheetData->setCellValue($column_name[$i + 4] . (8 + ($l * 2)), $formula_premium);
                        $sheetData->setCellValue($column_name[$i + 4] . (9 + ($l * 2)), $formula_solar);
                    }

                    $objPHPExcel->getActiveSheet()->removeRow(8, 1);
                    $objPHPExcel->getActiveSheet()->removeRow((6 + ($l * 2)), 1);

                    $e = 1;
                    for ($j = 8; $j < (6 + ($l * 2)); $j+=2) {
                        $sheetData->setCellValue('A' . $j, $e);
                        $e++;
                    }

                    for ($i = 0; $i < $last_day; $i++) {
                        for ($j = 0; $j < ($l * 2); $j++) {
                            $nilai = $sheetData->getCell($column_name[$i + 5] . ($j + 8))->getValue();
                            if ($nilai == "") {
                                $sheetData->setCellValue($column_name[$i + 5] . ($j + 8), 0);
                            }
                        }
                    }

					$sheetIndex = $objPHPExcel->getIndex($objPHPExcel->getSheetByName('KPI APMS Tanjung Wangi'));
                    $objPHPExcel->removeSheetByIndex($sheetIndex);

                    $objPHPExcel->setActiveSheetIndexByName('BA');
                    $sheetData = $objPHPExcel->getActiveSheet();
                } else {
                    $sheetIndex = $objPHPExcel->getIndex($objPHPExcel->getSheetByName('Realisasi Volume APMS'));
                    $objPHPExcel->removeSheetByIndex($sheetIndex);
                    $sheetIndex = $objPHPExcel->getIndex($objPHPExcel->getSheetByName('Biaya Angkutan APMS'));
                    $objPHPExcel->removeSheetByIndex($sheetIndex);
                    $sheetIndex = $objPHPExcel->getIndex($objPHPExcel->getSheetByName('Realisasi Penyaluran APMS'));
                    $objPHPExcel->removeSheetByIndex($sheetIndex);
                    $sheetIndex = $objPHPExcel->getIndex($objPHPExcel->getSheetByName('Data Pengiriman APMS'));
                    $objPHPExcel->removeSheetByIndex($sheetIndex);
                    $sheetIndex = $objPHPExcel->getIndex($objPHPExcel->getSheetByName('KPI APMS'));
                    $objPHPExcel->removeSheetByIndex($sheetIndex);
                    $sheetIndex = $objPHPExcel->getIndex($objPHPExcel->getSheetByName('KPI APMS Tanjung Wangi'));
                    $objPHPExcel->removeSheetByIndex($sheetIndex);
					
                }


                $nama_file = 'data_laporan/bulanan/Laporan Bulanan ' . $data_depot->NAMA_DEPOT . " " . $month_name[$bulan] . " " . $tahun . '.xls';

                $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
                $objWriter->setPreCalculateFormulas(FALSE);
                $objWriter->save('./' . $nama_file);

                $data2['nama_file'] = base_url() . $nama_file;
            //}
            $this->header(7, 2);
            $this->load->view('laporan/v_preview_bulanan', $data2);
            $this->footer();
        }
    }

    public function preview_triwulan() {
        $this->load->model('m_laporan');
        $depot = $this->session->userdata('id_depot');
        $data2['laporan_ada'] = false;

        if (!$this->input->post('cek')) {
            redirect('laporan/triwulan');
        } else {
            $tahun = $this->input->post('tahun');
            $jenis = $this->input->post('jenis');
            $bulan_awal = 1;
            $bulan_akhir = 3;
            $tw = 'TW1';
            if ($jenis == "Triwulan II") {
                $bulan_awal = 4;
                $bulan_akhir = 6;
                $tw = 'TW2';
            } else if ($jenis == "Triwulan III") {
                $bulan_awal = 7;
                $bulan_akhir = 9;
                $tw = 'TW3';
            } else if ($jenis == "Triwulan IV") {
                $bulan_awal = 10;
                $bulan_akhir = 12;
                $tw = 'TW4';
            }

            $month_name = array(1 => "Januari", 2 => "Februari", 3 => "Maret", 4 => "April", 5 => "Mei", 6 => "Juni", 7 => "Juli", 8 => "Agustus", 9 => "September", 10 => "Oktober", 11 => "November", 12 => "Desember");

            if ($jenis == "Triwulan I") {
                $bulan_awal = 2;
            }
            $cek_ada = $this->m_laporan->cetKPIInternal($tahun, $depot, $bulan_awal, $bulan_akhir);
            if ($cek_ada > 0) {

                if ($jenis == "Triwulan I") {
                    $bulan_awal = 1;
                }

                $data2['laporan_ada'] = true;
                $data_kpi_internal = $this->m_laporan->getKPIInternal($tahun, $depot);
                $data_depot = $this->m_laporan->getInfoDepot($depot);
                $data_oam = $this->m_laporan->getInfoOAM();

                $this->load->library('PHPExcel/Classes/PHPExcel');
                $inputFileName = './data_laporan/template/triwulan.xls';

                $objReader = PHPExcel_IOFactory::createReader('Excel5');
                $objPHPExcel = $objReader->load($inputFileName);

                // Set document properties
                $objPHPExcel->getProperties()->setCreator("OSCRMS")
                        ->setLastModifiedBy("OSCRMS")
                        ->setTitle("Laporan Triwulan")
                        ->setSubject("Laporan Triwulan")
                        ->setDescription("Laporan Triwulan")
                        ->setKeywords("Laporan Triwulan")
                        ->setCategory("Laporan Triwulan");

                /*
                 * KPI Internal Depot
                 */
                $objPHPExcel->setActiveSheetIndexByName('KPI Internal Depot');
                $sheetData = $objPHPExcel->getActiveSheet();
                $sheetData->setTitle('KPI Internal ' . $data_depot->NAMA_DEPOT);

                $sheetData->setCellValue('C4', $tahun);
                $sheetData->setCellValue('C5', 'Site Supervisor TBBM ' . $data_depot->NAMA_DEPOT);
                $sheetData->setCellValue('C6', $month_name[$bulan_awal] . ' - ' . $month_name[$bulan_akhir] . ' ' . $tahun);
                $sheetData->setCellValue('H9', $jenis);
                $sheetData->setCellValue('J9', $jenis);
                $sheetData->setCellValue('J10', $month_name[$bulan_awal]);
                $sheetData->setCellValue('K10', $month_name[$bulan_awal + 1]);
                $sheetData->setCellValue('L10', $month_name[$bulan_awal + 2]);

                $index = 13;

                foreach ($data_kpi_internal as $row) {
                    $array = (array) $row;
                    if ($index < 62) {
                        $sheetData->setCellValue('G' . $index, $array['BOBOT']);
                        $sheetData->setCellValue('H' . $index, $array[$tw . '_BASE']);
                        $sheetData->setCellValue('I' . $index, $array[$tw . '_STRETCH']);
                        $sheetData->setCellValue('J' . $index, $array['REALISASI_' . $tw . '_BULAN1']);
                        $sheetData->setCellValue('K' . $index, $array['REALISASI_' . $tw . '_BULAN2']);
                        $sheetData->setCellValue('L' . $index, $array['REALISASI_' . $tw . '_BULAN3']);
                    } else if ($index == 65) {
                        $sheetData->setCellValue('H' . $index, 'WTP');
                        $sheetData->setCellValue('I' . $index, '--');
                    } else if ($index == 66) {
                        $sheetData->setCellValue('H' . $index, $array[$tw . '_BASE'] . '/green');
                        $sheetData->setCellValue('I' . $index, '--');
                    } else if ($index == 72) {
                        $sheetData->setCellValue('H' . $index, $array[$tw . '_BASE']);
                        $sheetData->setCellValue('I' . $index, $array[$tw . '_STRETCH']);
                    } else {
                        $sheetData->setCellValue('H' . $index, $array[$tw . '_BASE']);
                        $sheetData->setCellValue('I' . $index, '--');
                    }

                    if ($index == 14 || $index == 18 || $index == 38 || $index == 41 || $index == 44 || $index == 58 || $index == 60) {
                        $index+=2;
                    } else if ($index == 23 || $index == 28 || $index == 34 || $index == 48 || $index == 55) {
                        $index+=3;
                    } else {
                        $index++;
                    }
                }

                $sheetData->setCellValue('J77', 'Site Supervisor TBBM ' . $data_depot->NAMA_DEPOT);
                $sheetData->setCellValue('J82', $data_depot->NAMA_PEGAWAI);

                $sheetData->setCellValue('G77', 'Operation Manager Area ' . AREA_OAM_ROMAWI);
                $sheetData->setCellValue('G82', $data_oam->NAMA_PEGAWAI);

                $t = 0;
                for ($t = 0; $t < 3; $t++) {
                    $bulan_cek = $bulan_awal + $t;
                    /*
                     * KPI Internal Depot tiga bulan
                     */

                    $cek_kpi_operasional = $this->m_laporan->cekKPIOperasional($depot, $tahun, $bulan_cek);
                    if ($cek_kpi_operasional != 0) {
                        $objPHPExcel->setActiveSheetIndexByName('KPI Operasional Bulan ' . ($t + 1));
                        $sheetData = $objPHPExcel->getActiveSheet();
                        $sheetData->setTitle('KPI Operasional ' . $month_name[$bulan_cek]);

                        $data_kpi_operasional = $this->m_laporan->getKPIOperasional($depot, $tahun, $bulan_cek);
                        $total_kl = $this->m_laporan->getTotalKL($depot, $tahun, $bulan_cek);

                        $sheetData->setCellValue('B4', 'Terminal BBM ' . $data_depot->NAMA_DEPOT);
                        $sheetData->setCellValue('H4', 'Bulan ' . $month_name[$bulan_cek] . ' ' . $tahun);

                        $index = 8;
                        foreach ($data_kpi_operasional as $row) {
                            $sheetData->setCellValue('G' . $index, $row->TARGET);
                            $sheetData->setCellValue('I' . $index, $row->REALISASI);
                            $index++;
                            if ($index == 10 || $index == 12 || $index == 17) {
                                $index++;
                            } else if ($index == 19) {
                                $index++;
                                $index++;
                            }
                        }

                        $sheetData->setCellValue('E27', $total_kl);
                        $sheetData->setCellValue('C36', 'Site Supervisor TBBM ' . $data_depot->NAMA_DEPOT);
                        $sheetData->setCellValue('H36', 'Operation Head TBBM ' . $data_depot->NAMA_DEPOT);
                        $sheetData->setCellValue('C41', $data_depot->NAMA_PEGAWAI);
                        $sheetData->setCellValue('H41', $data_depot->NAMA_OH);
                    } else {
                        // Hapus Sheet
                        $sheetIndex = $objPHPExcel->getIndex($objPHPExcel->getSheetByName('KPI Operasional Bulan ' . ($t + 1)));
                        $objPHPExcel->removeSheetByIndex($sheetIndex);
                    }
                }

                // Sheet yang ditampilkan pertama
                $objPHPExcel->setActiveSheetIndexByName('KPI Internal ' . $data_depot->NAMA_DEPOT);


                $nama_file = 'data_laporan/triwulan/Laporan ' . $jenis . ' ' . $data_depot->NAMA_DEPOT . ' ' . $tahun . '.xls';

                $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
                $objWriter->setPreCalculateFormulas(FALSE);
                $objWriter->save('./' . $nama_file);

                $data2['nama_file'] = base_url() . $nama_file;
            }
        }

        $this->header(7, 3);
        $this->load->view('laporan/v_preview_triwulan', $data2);
        $this->footer();
    }

    public function preview_tahunan() {
        $this->load->model('m_laporan');
        $depot = $this->session->userdata('id_depot');
        $data2['laporan_ada'] = false;

        if (!$this->input->post('cek')) {
            redirect('laporan/tahunan');
        } else {
            $tahun = $this->input->post('tahun');
            $bulan_awal = 1;
            $bulan_akhir = 12;

            $month_name = array(1 => "Januari", 2 => "Februari", 3 => "Maret", 4 => "April", 5 => "Mei", 6 => "Juni", 7 => "Juli", 8 => "Agustus", 9 => "September", 10 => "Oktober", 11 => "November", 12 => "Desember");


            $cek_ada = $this->m_laporan->cetKPIInternal($tahun, $depot, $bulan_awal, $bulan_akhir);
            if ($cek_ada > 0) {
                $data2['laporan_ada'] = true;
                $data_kpi_internal = $this->m_laporan->getKPIInternal($tahun, $depot);
                $data_depot = $this->m_laporan->getInfoDepot($depot);
                $data_oam = $this->m_laporan->getInfoOAM();

                $this->load->library('PHPExcel/Classes/PHPExcel');
                $inputFileName = './data_laporan/template/tahunan.xls';

                $objReader = PHPExcel_IOFactory::createReader('Excel5');
                $objPHPExcel = $objReader->load($inputFileName);

                // Set document properties
                $objPHPExcel->getProperties()->setCreator("OSCRMS")
                        ->setLastModifiedBy("OSCRMS")
                        ->setTitle("Laporan Tahunan")
                        ->setSubject("Laporan Tahunan")
                        ->setDescription("Laporan Tahunan")
                        ->setKeywords("Laporan Tahunan")
                        ->setCategory("Laporan Tahunan");

                /*
                 * KPI Internal Depot
                 */
                $objPHPExcel->setActiveSheetIndexByName('KPI Internal Depot');
                $sheetData = $objPHPExcel->getActiveSheet();
                $sheetData->setTitle('KPI Internal ' . $data_depot->NAMA_DEPOT);

                $sheetData->setCellValue('C4', $tahun);
                $sheetData->setCellValue('C5', 'Site Supervisor TBBM ' . $data_depot->NAMA_DEPOT);
                $sheetData->setCellValue('C6', $month_name[$bulan_awal] . ' - ' . $month_name[$bulan_akhir] . ' ' . $tahun);
                $sheetData->setCellValue('H9', 'KPI ' . $tahun);


                $index = 13;

                foreach ($data_kpi_internal as $row) {
                    $array = (array) $row;
                    if ($index < 62) {
                        $sheetData->setCellValue('G' . $index, $array['BOBOT']);
                        $sheetData->setCellValue('H' . $index, $array['TAHUN_BASE']);
                        $sheetData->setCellValue('I' . $index, $array['TAHUN_STRETCH']);
                        $sheetData->setCellValue('J' . $index, $array['TW1_BASE']);
                        $sheetData->setCellValue('K' . $index, $array['TW1_STRETCH']);
                        $sheetData->setCellValue('L' . $index, $array['REALISASI_TW1_BULAN1']);
                        $sheetData->setCellValue('M' . $index, $array['REALISASI_TW1_BULAN2']);
                        $sheetData->setCellValue('N' . $index, $array['REALISASI_TW1_BULAN3']);
                        $sheetData->setCellValue('O' . $index, $array['TW2_BASE']);
                        $sheetData->setCellValue('P' . $index, $array['TW2_STRETCH']);
                        $sheetData->setCellValue('Q' . $index, $array['REALISASI_TW2_BULAN1']);
                        $sheetData->setCellValue('R' . $index, $array['REALISASI_TW2_BULAN2']);
                        $sheetData->setCellValue('S' . $index, $array['REALISASI_TW2_BULAN3']);
                        $sheetData->setCellValue('T' . $index, $array['TW3_BASE']);
                        $sheetData->setCellValue('U' . $index, $array['TW3_STRETCH']);
                        $sheetData->setCellValue('V' . $index, $array['REALISASI_TW3_BULAN1']);
                        $sheetData->setCellValue('W' . $index, $array['REALISASI_TW3_BULAN2']);
                        $sheetData->setCellValue('X' . $index, $array['REALISASI_TW3_BULAN3']);
                        $sheetData->setCellValue('Y' . $index, $array['TW4_BASE']);
                        $sheetData->setCellValue('Z' . $index, $array['TW4_STRETCH']);
                        $sheetData->setCellValue('AA' . $index, $array['REALISASI_TW4_BULAN1']);
                        $sheetData->setCellValue('AB' . $index, $array['REALISASI_TW4_BULAN2']);
                        $sheetData->setCellValue('AC' . $index, $array['REALISASI_TW4_BULAN3']);
                    } else if ($index == 65) {
                        $sheetData->setCellValue('H' . $index, 'WTP');
                        $sheetData->setCellValue('I' . $index, '--');
                        $sheetData->setCellValue('J' . $index, 'WTP');
                        $sheetData->setCellValue('K' . $index, '--');
                        $sheetData->setCellValue('O' . $index, 'WTP');
                        $sheetData->setCellValue('P' . $index, '--');
                        $sheetData->setCellValue('T' . $index, 'WTP');
                        $sheetData->setCellValue('U' . $index, '--');
                        $sheetData->setCellValue('Y' . $index, 'WTP');
                        $sheetData->setCellValue('Z' . $index, '--');
                    } else if ($index == 66) {
                        $sheetData->setCellValue('H' . $index, $array['TAHUN_BASE'] . '/green');
                        $sheetData->setCellValue('I' . $index, '--');
                        $sheetData->setCellValue('J' . $index, $array['TW1_BASE'] . '/green');
                        $sheetData->setCellValue('K' . $index, '--');
                        $sheetData->setCellValue('O' . $index, $array['TW2_BASE'] . '/green');
                        $sheetData->setCellValue('P' . $index, '--');
                        $sheetData->setCellValue('T' . $index, $array['TW3_BASE'] . '/green');
                        $sheetData->setCellValue('U' . $index, '--');
                        $sheetData->setCellValue('Y' . $index, $array['TW4_BASE'] . '/green');
                        $sheetData->setCellValue('Z' . $index, '--');
                    } else if ($index == 72) {
                        $sheetData->setCellValue('H' . $index, $array['TAHUN_BASE']);
                        $sheetData->setCellValue('I' . $index, $array['TAHUN_STRETCH']);
                        $sheetData->setCellValue('J' . $index, $array['TW1_BASE']);
                        $sheetData->setCellValue('K' . $index, $array['TW1_STRETCH']);
                        $sheetData->setCellValue('O' . $index, $array['TW2_BASE']);
                        $sheetData->setCellValue('P' . $index, $array['TW2_STRETCH']);
                        $sheetData->setCellValue('T' . $index, $array['TW3_BASE']);
                        $sheetData->setCellValue('U' . $index, $array['TW3_STRETCH']);
                        $sheetData->setCellValue('Y' . $index, $array['TW4_BASE']);
                        $sheetData->setCellValue('Z' . $index, $array['TW4_STRETCH']);
                    } else {
                        $sheetData->setCellValue('H' . $index, $array['TAHUN_BASE']);
                        $sheetData->setCellValue('I' . $index, '--');
                        $sheetData->setCellValue('J' . $index, $array['TW1_BASE']);
                        $sheetData->setCellValue('K' . $index, '--');
                        $sheetData->setCellValue('O' . $index, $array['TW2_BASE']);
                        $sheetData->setCellValue('P' . $index, '--');
                        $sheetData->setCellValue('T' . $index, $array['TW3_BASE']);
                        $sheetData->setCellValue('U' . $index, '--');
                        $sheetData->setCellValue('Y' . $index, $array['TW4_BASE']);
                        $sheetData->setCellValue('Z' . $index, '--');
                    }

                    if ($index == 14 || $index == 18 || $index == 38 || $index == 41 || $index == 44 || $index == 58 || $index == 60) {
                        $index+=2;
                    } else if ($index == 23 || $index == 28 || $index == 34 || $index == 48 || $index == 55) {
                        $index+=3;
                    } else {
                        $index++;
                    }
                }

                $sheetData->setCellValue('J77', 'Site Supervisor TBBM ' . $data_depot->NAMA_DEPOT);
                $sheetData->setCellValue('J82', $data_depot->NAMA_PEGAWAI);

                $sheetData->setCellValue('G77', 'Operation Manager Area ' . AREA_OAM_ROMAWI);
                $sheetData->setCellValue('G82', $data_oam->NAMA_PEGAWAI);

                $t = 0;
                for ($t = 0; $t < 12; $t++) {
                    $bulan_cek = $bulan_awal + $t;
                    /*
                     * KPI Internal Depot tiga bulan
                     */

                    $cek_kpi_operasional = $this->m_laporan->cekKPIOperasional($depot, $tahun, $bulan_cek);
                    if ($cek_kpi_operasional != 0) {
                        $objPHPExcel->setActiveSheetIndexByName('KPI Operasional Bulan ' . ($t + 1));
                        $sheetData = $objPHPExcel->getActiveSheet();
                        $sheetData->setTitle('KPI Operasional ' . $month_name[$bulan_cek]);

                        $data_kpi_operasional = $this->m_laporan->getKPIOperasional($depot, $tahun, $bulan_cek);
                        $total_kl = $this->m_laporan->getTotalKL($depot, $tahun, $bulan_cek);

                        $sheetData->setCellValue('B4', 'Terminal BBM ' . $data_depot->NAMA_DEPOT);
                        $sheetData->setCellValue('H4', 'Bulan ' . $month_name[$bulan_cek] . ' ' . $tahun);

                        $index = 8;
                        foreach ($data_kpi_operasional as $row) {
                            $sheetData->setCellValue('G' . $index, $row->TARGET);
                            $sheetData->setCellValue('I' . $index, $row->REALISASI);
                            $index++;
                            if ($index == 10 || $index == 12 || $index == 17) {
                                $index++;
                            } else if ($index == 19) {
                                $index++;
                                $index++;
                            }
                        }

                        $sheetData->setCellValue('E27', $total_kl);
                        $sheetData->setCellValue('C36', 'Site Supervisor TBBM ' . $data_depot->NAMA_DEPOT);
                        $sheetData->setCellValue('H36', 'Operation Head TBBM ' . $data_depot->NAMA_DEPOT);
                        $sheetData->setCellValue('C41', $data_depot->NAMA_PEGAWAI);
                        $sheetData->setCellValue('H41', $data_depot->NAMA_OH);
                    } else {
                        // Hapus Sheet
                        $sheetIndex = $objPHPExcel->getIndex($objPHPExcel->getSheetByName('KPI Operasional Bulan ' . ($t + 1)));
                        $objPHPExcel->removeSheetByIndex($sheetIndex);
                    }
                }

                // Sheet yang ditampilkan pertama
                $objPHPExcel->setActiveSheetIndexByName('KPI Internal ' . $data_depot->NAMA_DEPOT);


                $nama_file = 'data_laporan/tahunan/Laporan Tahunan ' . $data_depot->NAMA_DEPOT . ' ' . $tahun . '.xls';

                $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
                $objWriter->setPreCalculateFormulas(FALSE);
                $objWriter->save('./' . $nama_file);

                $data2['nama_file'] = base_url() . $nama_file;
            }
        }

        $this->header(7, 4);
        $this->load->view('laporan/v_preview_tahunan', $data2);
        $this->footer();
    }

    public function dummy_kinerja() {
        $this->load->model('m_laporan');
        /*
         * Dummy untuk depot 1
         */
        /*
          $id_kinerja = 16975;
          $id_log_harian = 944;
          $id_pegawai = 1;
          $tidak_hadir = 1;
          for ($id_log_harian = 944; $id_log_harian <= 974; $id_log_harian++) {
          for ($id_pegawai = 1; $id_pegawai <= 10; $id_pegawai++) {
          if ($tidak_hadir != $id_pegawai) {
          if (rand(0, 1) == 0) {
          $status_tugas = 'SUPIR';
          } else {
          $status_tugas = 'KERNET';
          }
          $total_km = rand(50, 400);
          $total_kl = rand(8, 80);
          $ritase = rand(1, 3);
          $pendapatan = rand(50000, 200000);
          $spbu = rand(1, 5);

          $this->m_laporan->dummy_kinerja_amt($id_kinerja, $id_log_harian, $id_pegawai, $status_tugas, $total_km, $total_kl, $ritase, $pendapatan, $spbu);
          $id_kinerja++;
          }
          }
          $tidak_hadir++;
          if ($tidak_hadir == 11) {
          $tidak_hadir = 1;
          }
          }


          /*
         * Dummy untuk depot 2
         */
        /*
          $id_kinerja = 8488;
          $id_log_harian = 1097;
          $id_pegawai = 11;
          $tidak_hadir = 11;
          for ($id_log_harian = 1097; $id_log_harian <= 2039; $id_log_harian++) {
          $tidak_hadir = rand(11,20);
          for ($id_pegawai = 11; $id_pegawai <= 20; $id_pegawai++) {
          if ($tidak_hadir != $id_pegawai) {
          if (rand(0, 1) == 0) {
          $status_tugas = 'SUPIR';
          } else {
          $status_tugas = 'KERNET';
          }
          $total_km = rand(50, 400);
          $total_kl = rand(8,80);
          $ritase = rand(1,3);
          $pendapatan = rand(50000,200000);
          $spbu = rand(1,5);

          $this->m_laporan->dummy_kinerja_amt($id_kinerja, $id_log_harian, $id_pegawai, $status_tugas,$total_km,$total_kl,$ritase,$pendapatan,$spbu);
          $id_kinerja++;
          }
          }
          }
         */


        /*
         * Dummy mt untuk depot 1
         */
        /*
          $id_kinerja = 16975;
          $id_log_harian = 944;
          $id_mobil = 1;
          $tidak_hadir = 1;
          for ($id_log_harian = 944; $id_log_harian <= 974; $id_log_harian++) {
          for ($id_mobil = 1; $id_mobil <= 10; $id_mobil++) {
          if ($tidak_hadir != $id_mobil) {

          $total_km = rand(50, 400);
          $total_kl = rand(8, 80);
          $ritase = rand(1, 3);
          $ownuse = rand(20, 150);
          $premium = rand(0, 100);
          $pertamax = rand(0, 8);
          $pertamax_plus = 0;
          $pertamina_dex = 0;
          $solar = rand(0, 40);
          $bio_solar = rand(0, 40);

          $this->m_laporan->dummy_kinerja_mt($id_kinerja, $id_log_harian, $id_mobil, $ritase, $total_km, $total_kl, $ownuse, $premium, $pertamax, $pertamax_plus, $pertamina_dex, $solar, $bio_solar);
          $id_kinerja++;
          }
          }
          $tidak_hadir++;
          if ($tidak_hadir == 11) {
          $tidak_hadir = 1;
          }
          }

          /*
         * Dummy mt untuk depot 2
         */
        /*
          $id_kinerja = 8488;
          $id_log_harian = 1097;
          $id_mobil = 11;
          $tidak_hadir = 11;
          for ($id_log_harian = 1097; $id_log_harian <= 2039; $id_log_harian++) {
          $tidak_hadir = rand(11, 20);
          for ($id_mobil = 11; $id_mobil <= 20; $id_mobil++) {
          if ($tidak_hadir != $id_mobil) {
          $total_km = rand(50, 400);
          $total_kl = rand(8, 80);
          $ritase = rand(1, 3);
          $ownuse = rand(20,150);
          $premium = rand(0,100);
          $pertamax = rand(0,8);
          $pertamax_plus = 0;
          $pertamina_dex = 0;
          $solar = rand(0,40);
          $bio_solar = rand(0,40);

          $this->m_laporan->dummy_kinerja_mt($id_kinerja, $id_log_harian, $id_mobil, $ritase,$total_km,$total_kl,$ownuse,$premium,$pertamax,$pertamax_plus,$pertamina_dex,$solar,$bio_solar);
          $id_kinerja++;
          }
          }
          }
         */

        echo "berhasil";
    }

}
