<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class ba extends CI_Controller {

    public function index() {
        $this->berita_acara();
    }

    public function ms2() {
        $depot = 1;
        $this->load->model('m_ba');

        $data2['submit'] = false;
        $data2['hapus'] = false;
        $data2['edit'] = false;
        if ($this->input->post('submit')) {
            $data2['submit'] = true;

            $data2['blnms2'] = $this->input->post('blnms2');

            $tanggal = date("d-m-Y", strtotime($this->input->post('blnms2')));
            $bulan = date("m", strtotime($this->input->post('blnms2')));
            $tahun = date("Y", strtotime($this->input->post('blnms2')));

            $data2['tahun'] = $tahun;
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

            $data2['status_ms2'] = $this->m_ba->cekMS2($depot, $tahun, $bulan);
            if ($data2['status_ms2'] == date('t', strtotime($tanggal))) {
                //ms2 ada
                $data2['ms2'] = $this->m_ba->getMS2($depot, $tahun, $bulan);
            }
        }
        $data['lv1'] = 6;
        $data['lv2'] = 2;
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->load->view('layouts/navbar', $data);
        $this->load->view('ba/v_ms2', $data2);
        $this->load->view('layouts/footer');
    }

    public function edit_ms2() {
        if (!$this->input->post('submit')) {
            redirect('ba/ms2');
        } else {
            $depot = 1;
            $this->load->model('m_ba');
            $id = $this->input->post('id_ms2');
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

            $this->m_ba->editMS2($id, $sesuai_premium, $sesuai_solar, $sesuai_pertamax, $cepat_premium, $cepat_solar, $cepat_pertamax, $cepat_shift1_premium, $cepat_shift1_solar, $cepat_shift1_pertamax, $lambat_premium, $lambat_solar, $lambat_pertamax, $tidak_terkirim_premium, $tidak_terkirim_solar, $tidak_terkirim_pertamax);

            $data2['blnms2'] = $this->input->post('blnms2');

            $tanggal = date("d-m-Y", strtotime($this->input->post('blnms2')));
            $bulan = date("m", strtotime($this->input->post('blnms2')));
            $tahun = date("Y", strtotime($this->input->post('blnms2')));

            $data2['tahun'] = $tahun;
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

            $data2['status_ms2'] = $this->m_ba->cekMS2($depot, $tahun, $bulan);
            if ($data2['status_ms2'] == date('t', strtotime($tanggal))) {
                $data2['ms2'] = $this->m_ba->getMS2($depot, $tahun, $bulan);
            }

            $data2['submit'] = true;
            $data2['hapus'] = false;
            $data2['edit'] = true;

            $data['lv1'] = 6;
            $data['lv2'] = 2;
            $this->load->view('layouts/header');
            $this->load->view('layouts/menu');
            $this->load->view('layouts/navbar', $data);
            $this->load->view('ba/v_ms2', $data2);
            $this->load->view('layouts/footer');
        }
    }

    public function hapus_ms2() {
        if (!$this->input->post('submit')) {
            redirect('ba/ms2');
        } else {
            $this->load->model('m_ba');
            $ms2 = unserialize($this->input->post('id_ms2'));
            $this->m_ba->deleteMS2($ms2);

            $data2['submit'] = false;
            $data2['hapus'] = true;
            $data2['edit'] = false;

            $data['lv1'] = 6;
            $data['lv2'] = 2;
            $this->load->view('layouts/header');
            $this->load->view('layouts/menu');
            $this->load->view('layouts/navbar', $data);
            $this->load->view('ba/v_ms2', $data2);
            $this->load->view('layouts/footer');
        }
    }

    public function import_ms2() {
        $this->load->model('m_ba');
        $depot = 1;
        $data2['klik_upload'] = false;
        $data2['klik_simpan'] = false;
        if ($this->input->post('upload')) {
            $data2['klik_upload'] = true;
            $data2['ms2']['error'] = true;

            $blnms2 = $this->input->post('blnms2');
            $bulan = date("d-m-Y", strtotime($blnms2));
            $data2['cek_ada'] = $this->m_ba->cekMS2($depot, date("Y", strtotime($blnms2)), date("m", strtotime($blnms2)));
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

                            $data2['ms2']['id_log_harian'][] = $this->m_ba->getIdLogHarian($depot, date("Y", strtotime($blnms2)), date("m", strtotime($blnms2)), ($i + 1));
                            $data2['ms2']['tanggal'][] = date("Y-m", strtotime($blnms2)) . '-' . ($i + 1);

                            $data2['ms2']['sesuai_premium'][] = is_numeric($sheetData->getCell('B' . ($row_baca + $i))->getValue()) ? ($sheetData->getCell('B' . ($row_baca + $i))->getValue() * 100) : -1;
                            $data2['ms2']['sesuai_solar'][] = (is_numeric($sheetData->getCell('C' . ($row_baca + $i))->getValue()) ? ($sheetData->getCell('C' . ($row_baca + $i))->getValue() * 100) : -1);
                            $data2['ms2']['sesuai_pertamax'][] = (is_numeric($sheetData->getCell('D' . ($row_baca + $i))->getValue()) ? ($sheetData->getCell('D' . ($row_baca + $i))->getValue() * 100) : -1);

                            $data2['ms2']['cepat_premium'][] = (is_numeric($sheetData->getCell('E' . ($row_baca + $i))->getValue()) ? ($sheetData->getCell('E' . ($row_baca + $i))->getValue() * 100) : -1);
                            $data2['ms2']['cepat_solar'][] = (is_numeric($sheetData->getCell('F' . ($row_baca + $i))->getValue()) ? ($sheetData->getCell('F' . ($row_baca + $i))->getValue() * 100) : -1);
                            $data2['ms2']['cepat_pertamax'][] = (is_numeric($sheetData->getCell('G' . ($row_baca + $i))->getValue()) ? ($sheetData->getCell('G' . ($row_baca + $i))->getValue() * 100) : -1);

                            $data2['ms2']['cepat_shift1_premium'][] = (is_numeric($sheetData->getCell('H' . ($row_baca + $i))->getValue()) ? ($sheetData->getCell('H' . ($row_baca + $i))->getValue() * 100) : -1);
                            $data2['ms2']['cepat_shift1_solar'][] = (is_numeric($sheetData->getCell('I' . ($row_baca + $i))->getValue()) ? ($sheetData->getCell('I' . ($row_baca + $i))->getValue() * 100) : -1);
                            $data2['ms2']['cepat_shift1_pertamax'][] = (is_numeric($sheetData->getCell('J' . ($row_baca + $i))->getValue()) ? ($sheetData->getCell('J' . ($row_baca + $i))->getValue() * 100) : -1);

                            $data2['ms2']['lambat_premium'][] = (is_numeric($sheetData->getCell('K' . ($row_baca + $i))->getValue()) ? ($sheetData->getCell('K' . ($row_baca + $i))->getValue() * 100) : -1);
                            $data2['ms2']['lambat_solar'][] = (is_numeric($sheetData->getCell('L' . ($row_baca + $i))->getValue()) ? ($sheetData->getCell('L' . ($row_baca + $i))->getValue() * 100) : -1);
                            $data2['ms2']['lambat_pertamax'][] = (is_numeric($sheetData->getCell('M' . ($row_baca + $i))->getValue()) ? ($sheetData->getCell('M' . ($row_baca + $i))->getValue() * 100) : -1);

                            $data2['ms2']['tidak_terkirim_premium'][] = (is_numeric($sheetData->getCell('N' . ($row_baca + $i))->getValue()) ? ($sheetData->getCell('N' . ($row_baca + $i))->getValue() * 100) : -1);
                            $data2['ms2']['tidak_terkirim_solar'][] = (is_numeric($sheetData->getCell('O' . ($row_baca + $i))->getValue()) ? ($sheetData->getCell('O' . ($row_baca + $i))->getValue() * 100) : -1);
                            $data2['ms2']['tidak_terkirim_pertamax'][] = (is_numeric($sheetData->getCell('P' . ($row_baca + $i))->getValue()) ? ($sheetData->getCell('P' . ($row_baca + $i))->getValue() * 100) : -1);
                        }
                    }
                }
            }
        } else if ($this->input->post('simpan')) {
            $data2['klik_simpan'] = true;
            $ms2 = unserialize($this->input->post('data_ms2'));
            $this->m_ba->simpanMS2($ms2);
        }
        $data['lv1'] = 6;
        $data['lv2'] = 2;
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->load->view('layouts/navbar', $data);
        $this->load->view('ba/v_import_ms2', $data2);
        $this->load->view('layouts/footer');
    }

    public function frm() {
        $this->load->model('m_ba');
        $depot = 1;

        $data2['klik_cek'] = false;
        $data2['klik_tambah'] = false;
        $data2['klik_edit'] = false;

        if ($this->input->post('cek')) {
            $data2['klik_cek'] = true;
            $data2['interpolasi']['status'] = false;
            $bln_frm = $this->input->post('bln_frm');
            $data2['interpolasi']['bln_frm'] = $bln_frm;

            if (date("m", strtotime($bln_frm)) == 1) {
                $data2['interpolasi']['bulan_tahun'] = 'Januari ' . date("Y", strtotime($bln_frm));
            } else if (date("m", strtotime($bln_frm)) == 2) {
                $data2['interpolasi']['bulan_tahun'] = 'Februari ' . date("Y", strtotime($bln_frm));
            } else if (date("m", strtotime($bln_frm)) == 3) {
                $data2['interpolasi']['bulan_tahun'] = 'Maret ' . date("Y", strtotime($bln_frm));
            } else if (date("m", strtotime($bln_frm)) == 4) {
                $data2['interpolasi']['bulan_tahun'] = 'April ' . date("Y", strtotime($bln_frm));
            } else if (date("m", strtotime($bln_frm)) == 5) {
                $data2['interpolasi']['bulan_tahun'] = 'Mei ' . date("Y", strtotime($bln_frm));
            } else if (date("m", strtotime($bln_frm)) == 6) {
                $data2['interpolasi']['bulan_tahun'] = 'Juni ' . date("Y", strtotime($bln_frm));
            } else if (date("m", strtotime($bln_frm)) == 7) {
                $data2['interpolasi']['bulan_tahun'] = 'Juli ' . date("Y", strtotime($bln_frm));
            } else if (date("m", strtotime($bln_frm)) == 8) {
                $data2['interpolasi']['bulan_tahun'] = 'Agustus ' . date("Y", strtotime($bln_frm));
            } else if (date("m", strtotime($bln_frm)) == 9) {
                $data2['interpolasi']['bulan_tahun'] = 'September ' . date("Y", strtotime($bln_frm));
            } else if (date("m", strtotime($bln_frm)) == 10) {
                $data2['interpolasi']['bulan_tahun'] = 'Oktober ' . date("Y", strtotime($bln_frm));
            } else if (date("m", strtotime($bln_frm)) == 11) {
                $data2['interpolasi']['bulan_tahun'] = 'November ' . date("Y", strtotime($bln_frm));
            } else if (date("m", strtotime($bln_frm)) == 12) {
                $data2['interpolasi']['bulan_tahun'] = 'Desember ' . date("Y", strtotime($bln_frm));
            }

            $tanggal = date("d-m-Y", strtotime($bln_frm));
            $last_day = date('t', strtotime($tanggal));
            $data2['interpolasi']['tanggal_akhir'] = $last_day;

            if ($last_day == $this->m_ba->cekInterpolasi($depot, date("Y", strtotime($bln_frm)), date("m", strtotime($bln_frm)))) {
                $data2['interpolasi']['status'] = true;
                $frm = $this->m_ba->getInterpolasi($depot, date("Y", strtotime($bln_frm)), date("m", strtotime($bln_frm)));
                foreach ($frm as $row) {
                    $data2['interpolasi']['id_nilai'][] = $row->ID_NILAI;
                    $data2['interpolasi']['jenis_penilaian'][] = $row->JENIS_PENILAIAN;
                    $data2['interpolasi']['nilai'][] = $row->NILAI;
                }
            }
        } else if ($this->input->post('edit')) {
            $data2['klik_edit'] = true;
            $this->m_ba->editInterpolasi($this->input->post('id_frm1'), $this->input->post('frm1'));
            $this->m_ba->editInterpolasi($this->input->post('id_frm2'), $this->input->post('frm2'));
            $this->m_ba->editInterpolasi($this->input->post('id_interpolasi1'), $this->input->post('interpolasi1'));
            $this->m_ba->editInterpolasi($this->input->post('id_interpolasi2'), $this->input->post('interpolasi2'));
        } else if ($this->input->post('tambah')) {
            $data2['klik_tambah'] = true;

            $bln_frm = $this->input->post('bln_frm');
            $bulan = date("m", strtotime($bln_frm));
            $tahun = date("Y", strtotime($bln_frm));
            $last_day = date("t", strtotime($bln_frm));

            $data2['id_log_frm1'] = $this->m_ba->getIdLogHarian($depot, $tahun, $bulan, 1);
            $data2['id_log_frm2'] = $this->m_ba->getIdLogHarian($depot, $tahun, $bulan, 15);
            $data2['id_log_interpolasi1'] = $this->m_ba->getIdLogHarian($depot, $tahun, $bulan, 1);
            $data2['id_log_interpolasi2'] = $this->m_ba->getIdLogHarian($depot, $tahun, $bulan, 15);

            $frm1 = $this->input->post('frm1');
            $frm2 = $this->input->post('frm2');
            $interpolasi1 = $this->input->post('interpolasi1');
            $interpolasi2 = $this->input->post('interpolasi2');

            if ($data2['id_log_frm1'] == -1) { // id tidak ditemukan
                $data2['status_id'] = false;
            } else {
                $data2['status_id'] = true;
                $data2['status_interpolasi'] = $this->m_ba->cekInterpolasi($depot, $tahun, $bulan);
                if ($data2['status_interpolasi'] == 0) {
                    $this->m_ba->tambahInterpolasi($depot, $bulan, $tahun, $data2['id_log_frm1'], $frm1, $data2['id_log_frm2'], $frm2, $data2['id_log_interpolasi1'], $interpolasi1, $data2['id_log_interpolasi2'], $interpolasi2);
                }
            }
        }

        $data['lv1'] = 6;
        $data['lv2'] = 3;
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->load->view('layouts/navbar', $data);
        $this->load->view('ba/v_frm', $data2);
        $this->load->view('layouts/footer');
    }

    public function berita_acara() {
        $data['lv1'] = 6;
        $data['lv2'] = 1;
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->load->view('layouts/navbar', $data);
        $this->load->view('ba/v_berita_acara');
        $this->load->view('layouts/footer');
    }

    public function kpi_operasional() {
        $data['lv1'] = 6;
        $data['lv2'] = 1;
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->load->view('layouts/navbar', $data);
        $this->load->view('ba/v_kpi_operasional');
        $this->load->view('layouts/footer');
    }

    public function kpi_internal() {
        $data['lv1'] = 6;
        $data['lv2'] = 1;
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->load->view('layouts/navbar', $data);
        $this->load->view('ba/v_kpi_internal');
        $this->load->view('layouts/footer');
    }

    public function cek() {
        if (is_numeric('0')) {
            echo "angka";
        } else {
            echo "bukan angka";
        }
    }

}
