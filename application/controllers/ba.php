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
        $depot = 1;
        $data2['klik_upload'] = false;
        $data2['klik_simpan'] = false;
        if ($this->input->post('upload')) {
            $data2['klik_upload'] = true;
            $data2['ms2']['error'] = true;

            $blnms2 = $this->input->post('blnms2');
            $bulan = date("d-m-Y", strtotime($blnms2));
            $fileMS2 = $_FILES['fileMS2'];
            $last_day = date('t', strtotime($bulan));
echo "<script>alert('$last_day');</script>";    
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
                        $data2['ms2']['tanggal'][] = '2014-05-01';
                        $data2['ms2']['sesuai_premium'][] = $sheetData->getCell('B' . ($row_baca + $i))->getValue()*100;
                        $data2['ms2']['sesuai_solar'][] = $sheetData->getCell('C' . ($row_baca + $i))->getValue()*100;
                        $data2['ms2']['sesuai_pertamax'][] = $sheetData->getCell('D' . ($row_baca + $i))->getValue()*100;

                        $data2['ms2']['cepat_premium'][] = $sheetData->getCell('E' . ($row_baca + $i))->getValue()*100;
                        $data2['ms2']['cepat_solar'][] = $sheetData->getCell('F' . ($row_baca + $i))->getValue()*100;
                        $data2['ms2']['cepat_pertamax'][] = $sheetData->getCell('G' . ($row_baca + $i))->getValue()*100;

                        $data2['ms2']['cepat_shift1_premium'][] = $sheetData->getCell('H' . ($row_baca + $i))->getValue()*100;
                        $data2['ms2']['cepat_shift1_solar'][] = $sheetData->getCell('I' . ($row_baca + $i))->getValue()*100;
                        $data2['ms2']['cepat_shift1_pertamax'][] = $sheetData->getCell('J' . ($row_baca + $i))->getValue()*100;

                        $data2['ms2']['lambat_premium'][] = $sheetData->getCell('K' . ($row_baca + $i))->getValue()*100;
                        $data2['ms2']['lambat_solar'][] = $sheetData->getCell('L' . ($row_baca + $i))->getValue()*100;
                        $data2['ms2']['lambat_pertamax'][] = $sheetData->getCell('M' . ($row_baca + $i))->getValue()*100;

                        $data2['ms2']['tidak_terkirim_premium'][] = $sheetData->getCell('N' . ($row_baca + $i))->getValue()*100;
                        $data2['ms2']['tidak_terkirim_solar'][] = $sheetData->getCell('O' . ($row_baca + $i))->getValue()*100;
                        $data2['ms2']['tidak_terkirim_pertamax'][] = $sheetData->getCell('P' . ($row_baca + $i))->getValue()*100;
                    }
                }
            }
        } else if ($this->input->post('simpan')) {
            $data2['klik_simpan'] = true;
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
        $data['lv1'] = 6;
        $data['lv2'] = 3;
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->load->view('layouts/navbar', $data);
        $this->load->view('ba/v_frm');
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

}
