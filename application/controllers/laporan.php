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

            $tanggalms2 = $this->input->post('blnms2');
            $bulan = date("m", strtotime($tanggalms2));
            $tahun = date("Y", strtotime($tanggalms2));

            $sesuai_premium = $this->input->post('premium1');
            $sesuai_solar = $this->input->post('solar1');
            $sesuai_pertamax = $this->input->post('pertamax1');

            $cepat_premium = $this->input->post('premium2');
            $cepat_solar = $this->input->post('solar2');
            $cepat_pertamax = $this->input->post('pertamax2');

            $cepat_shift1_premium = $this->input->post('premium3');
            $cepat_shift1_solar = $this->input->post('solar3');
            $cepat_shift1_pertamax = $this->input->post('pertamax3');

            $lambat_premium = $this->input->post('premium4');
            $lambat_solar = $this->input->post('solar4');
            $lambat_pertamax = $this->input->post('pertamax4');

            $tidak_terkirim_premium = $this->input->post('premium5');
            $tidak_terkirim_solar = $this->input->post('solar5');
            $tidak_terkirim_pertamax = $this->input->post('pertamax5');

            $this->m_laporan->editMS2($id, $sesuai_premium, $sesuai_solar, $sesuai_pertamax, $cepat_premium, $cepat_solar, $cepat_pertamax, $cepat_shift1_premium, $cepat_shift1_solar, $cepat_shift1_pertamax, $lambat_premium, $lambat_solar, $lambat_pertamax, $tidak_terkirim_premium, $tidak_terkirim_solar, $tidak_terkirim_pertamax, $depot, $tahun, $bulan);

            $data2['submit'] = true;
            $data2['edit'] = true;
        } else if ($this->input->post('hapus')) {
            $data2['hapus'] = true;
            $ms2 = unserialize($this->input->post('id_ms2'));
            $total_ms2 = unserialize($this->input->post('total_ms2'));
            $this->m_laporan->deleteMS2($ms2, $total_ms2);
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
        $this->header(7, 4);
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
                        }
                        $nilai_sesuai = 0;
                        $nilai_cepat = 0;
                        $nilai_cepat_shift1 = 0;
                        $nilai_lambat = 0;
                        $nilai_tidak_terkirim = 0;
                        $nilai_total_lo = 0;
                        for ($i = 0; $i < $last_day; $i++) {
                            $nilai_sesuai = $nilai_sesuai + $data2['ms2']['sesuai_premium'] [$i];
                            $nilai_sesuai = $nilai_sesuai + $data2['ms2']['sesuai_solar'] [$i];
                            $nilai_sesuai = $nilai_sesuai + $data2['ms2']['sesuai_pertamax'] [$i];

                            $nilai_cepat = $nilai_cepat + $data2['ms2']['cepat_premium'] [$i];
                            $nilai_cepat = $nilai_cepat + $data2['ms2']['cepat_solar'] [$i];
                            $nilai_cepat = $nilai_cepat + $data2['ms2']['cepat_pertamax'] [$i];

                            $nilai_cepat_shift1 = $nilai_cepat_shift1 + $data2['ms2']['cepat_shift1_premium'] [$i];
                            $nilai_cepat_shift1 = $nilai_cepat_shift1 + $data2['ms2']['cepat_shift1_solar'] [$i];
                            $nilai_cepat_shift1 = $nilai_cepat_shift1 + $data2['ms2']['cepat_shift1_pertamax'] [$i];

                            $nilai_lambat = $nilai_lambat + $data2['ms2']['lambat_premium'] [$i];
                            $nilai_lambat = $nilai_lambat + $data2['ms2']['lambat_solar'] [$i];
                            $nilai_lambat = $nilai_lambat + $data2['ms2']['lambat_pertamax'] [$i];

                            $nilai_tidak_terkirim = $nilai_tidak_terkirim + $data2['ms2']['tidak_terkirim_premium'] [$i];
                            $nilai_tidak_terkirim = $nilai_tidak_terkirim + $data2['ms2']['tidak_terkirim_solar'] [$i];
                            $nilai_tidak_terkirim = $nilai_tidak_terkirim + $data2['ms2']['tidak_terkirim_pertamax'] [$i];

                            $nilai_total_lo = $nilai_total_lo + $data2['ms2']['total_lo_premium'] [$i];
                            $nilai_total_lo = $nilai_total_lo + $data2['ms2']['total_lo_solar'] [$i];
                            $nilai_total_lo = $nilai_total_lo + $data2['ms2']['total_lo_pertamax'] [$i];
                        }
                        $data2['ms2']['rata_sesuai'] = round($nilai_sesuai / ($last_day * 3), 2);
                        $data2['ms2']['rata_cepat'] = round($nilai_cepat / ($last_day * 3), 2);
                        $data2['ms2']['rata_cepat_shift1'] = round($nilai_cepat_shift1 / ($last_day * 3), 2);
                        $data2['ms2']['rata_lambat'] = round($nilai_lambat / ($last_day * 3), 2);
                        $data2['ms2']['rata_tidak_terkirim'] = round($nilai_tidak_terkirim / ($last_day * 3), 2);
                        $data2['ms2']['rata_total_lo'] = round($nilai_total_lo / ($last_day * 3), 2);
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
            } else {
                $data2['simpan_error'] = true;
            }
        }
        $this->header(7, 4);
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

            if ($data2['id_log_frm1'] == -1) { // id tidak ditemukan
                $data2['status_id'] = false;
            } else {
                $data2['status_id'] = true;
                $data2['status_interpolasi'] = $this->m_laporan->cekInterpolasi($depot, $tahun, $bulan);
                if ($data2['status_interpolasi'] == 0) {
                    $this->m_laporan->tambahInterpolasi($depot, $bulan, $tahun, $data2['id_log_frm1'], $frm1, $data2['id_log_frm2'], $frm2, $data2['id_log_interpolasi1'], $interpolasi1, $data2['id_log_interpolasi2'], $interpolasi2);
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


        $this->header(7, 4);
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

                //TOTAL KPI
                $total_kpi = $weighted_score1 + $weighted_score2 + $weighted_score3 + $weighted_score4 + $weighted_score5 + $weighted_score6 + $weighted_score7 + $weighted_score8 + $weighted_score9 + $weighted_score10;

                $this->m_laporan->tambahKPIOperasional($depot, $bulan, $tahun, $id_log_harian, $kpitarget1, $bobot1, $kpirealisasi1, $deviasi1, $performance_score1, $normal_score1, $weighted_score1, $kpitarget2, $bobot2, $kpirealisasi2, $deviasi2, $performance_score2, $normal_score2, $weighted_score2, $kpitarget3, $bobot3, $kpirealisasi3, $deviasi3, $performance_score3, $normal_score3, $weighted_score3, $kpitarget4, $bobot4, $kpirealisasi4, $deviasi4, $performance_score4, $normal_score4, $weighted_score4, $kpitarget5, $bobot5, $kpirealisasi5, $deviasi5, $performance_score5, $normal_score5, $weighted_score5, $kpitarget6, $bobot6, $kpirealisasi6, $deviasi6, $performance_score6, $normal_score6, $weighted_score6, $kpitarget7, $bobot7, $kpirealisasi7, $deviasi7, $performance_score7, $normal_score7, $weighted_score7, $kpitarget8, $bobot8, $kpirealisasi8, $deviasi8, $performance_score8, $normal_score8, $weighted_score8, $kpitarget9, $bobot9, $kpirealisasi9, $deviasi9, $performance_score9, $normal_score9, $weighted_score9, $kpitarget10, $bobot10, $kpirealisasi10, $deviasi10, $performance_score10, $normal_score10, $weighted_score10, $total_kpi);
            }
        }
        $this->header(7, 4);
        $this->load->view('laporan/v_kpi_operasional', $data2);
        $this->footer();
    }

    public function kpi_internal() {
        $this->header(7, 5);
        $this->load->view('laporan/v_kpi_internal');
        $this->footer();
    }
    
    public function tambah_kpi_internal() {
        $this->header(7, 5);
        $this->load->view('laporan/v_tambah_kpi_internal');
        $this->footer();
    }
    
    public function edit_kpi_internal() {
        $this->header(7, 5);
        $this->load->view('laporan/v_edit_kpi_internal');
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
