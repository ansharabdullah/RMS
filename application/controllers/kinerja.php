<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class kinerja extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $data['lv1'] = 4;
        $data['lv2'] = 1;
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->load->view('layouts/navbar', $data);
        $this->load->view('kinerja/v_kinerja_siod', array('submit' => false));
        $this->load->view('layouts/footer');
    }

    public function manual() {
        $data['lv1'] = 4;
        $data['lv2'] = 1;
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->load->view('layouts/navbar', $data);
        $this->load->view('kinerja/v_kinerja_manual');
        $this->load->view('layouts/footer');
    }

    public function preview() {
        if (!$this->input->post('submit')) {
            redirect('kinerja');
        } else {
            $this->load->model('m_kinerja');

            $data_kinerja['SPBU']['error'] = true;
            $data_kinerja['MT']['error'] = true;
            $data_kinerja['SUPIR']['error'] = true;
            $data_kinerja['KERNET']['error'] = true;
            $data_kinerja['TANGGAL']['error'] = true;

            $tanggalSIOD = $this->input->post('tanggalSIOD');
            $tanggalSIOD = date("d-m-Y", strtotime($tanggalSIOD));

            $data_kinerja['TANGGAL']['tanggal'] = $tanggalSIOD;

            $fileSIOD = $_FILES['fileSIOD'];
            $file_target = dirname(dirname(__DIR__)) . '\assets\file\\' . $_FILES['fileSIOD']['name'];
            move_uploaded_file($_FILES['fileSIOD']['tmp_name'], $file_target);

            $this->load->library('PHPExcel/Classes/PHPExcel');

            $inputFileName = $file_target;

            $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
            //echo 'File ', pathinfo($inputFileName, PATHINFO_BASENAME), ' has been identified as an ', $inputFileType, ' file<br />';
            //echo 'Loading file ', pathinfo($inputFileName, PATHINFO_BASENAME), ' using IOFactory with the identified reader type<br />';
            $objReader = PHPExcel_IOFactory::createReader($inputFileType);

            $worksheetData = $objReader->listWorksheetInfo($inputFileName);

            //$worksheetRead = array_column($worksheetData, 'worksheetName');
            
            foreach($worksheetData as $row){
                $worksheetRead[]=$row['worksheetName'];
            }
            
            $objReader->setLoadSheetsOnly($worksheetRead);

            $objPHPExcel = $objReader->load($inputFileName);


            //echo '<hr />';

            $loadedSheetNames = $objPHPExcel->getSheetNames();
            foreach ($loadedSheetNames as $sheetIndex => $loadedSheetName) {
                if ($loadedSheetName == 'Detail MT Report') {
                    //echo $sheetIndex, ' -> ', $loadedSheetName, '<br />';
                    $objPHPExcel->setActiveSheetIndexByName($loadedSheetName);
                    $sheetData = $objPHPExcel->getActiveSheet();
                    $sheetData->getStyle('B14:B1000')
                            ->getNumberFormat()
                            ->setFormatCode('dd-mm-yyyy');

                    $row_baca = 14;
                    while ($sheetData->getCell('B' . $row_baca)->getFormattedValue() != NULL) {
                        if ($data_kinerja['MT']['error'] == true && $tanggalSIOD == $sheetData->getCell('B' . $row_baca)->getFormattedValue()) {
                            $data_kinerja['MT']['error'] = false;
                            $data_kinerja['TANGGAL']['error'] = false;
                        }
                        if ($data_kinerja['MT']['error'] == false) {
                            $data_kinerja['MT']['id'][] = $this->m_kinerja->getIdMobil($sheetData->getCell('C' . $row_baca)->getFormattedValue(), 1); // cek di data base
                            $data_kinerja['MT']['nopol'][] = $sheetData->getCell('C' . $row_baca)->getFormattedValue();
                            $data_kinerja['MT']['ritase'][] = $sheetData->getCell('E' . $row_baca)->getFormattedValue();
                            $data_kinerja['MT']['total_km'][] = $sheetData->getCell('F' . $row_baca)->getFormattedValue();
                            $data_kinerja['MT']['total_kl'][] = $sheetData->getCell('G' . $row_baca)->getFormattedValue();
                            $data_kinerja['MT']['ownuse'][] = $sheetData->getCell('I' . $row_baca)->getFormattedValue();
                            $data_kinerja['MT']['premium'][] = $sheetData->getCell('M' . $row_baca)->getFormattedValue();
                            $data_kinerja['MT']['pertamax'][] = $sheetData->getCell('R' . $row_baca)->getFormattedValue();
                            $data_kinerja['MT']['pertamax_plus'][] = $sheetData->getCell('S' . $row_baca)->getFormattedValue();
                            $data_kinerja['MT']['bio_solar'][] = $sheetData->getCell('U' . $row_baca)->getFormattedValue();
                            $data_kinerja['MT']['pertamina_dex'][] = $sheetData->getCell('X' . $row_baca)->getFormattedValue();
                            $data_kinerja['MT']['solar'][] = $sheetData->getCell('AE' . $row_baca)->getFormattedValue();
                        }
                        $row_baca++;
                    }
                    $data_kinerja['MT']['jumlah'] = $row_baca - 14;
                } else if ($loadedSheetName == 'Detail Crew Supir') {
                    //echo $sheetIndex, ' -> ', $loadedSheetName, '<br />';
                    $objPHPExcel->setActiveSheetIndexByName($loadedSheetName);
                    $sheetData = $objPHPExcel->getActiveSheet();
                    $sheetData->getStyle('B14:B1000')
                            ->getNumberFormat()
                            ->setFormatCode('dd-mm-yyyy');

                    $koefisien = $this->m_kinerja->getKoefisien(date("Y", strtotime($tanggalSIOD)), 1, 2);

                    $row_baca = 14;
                    while ($sheetData->getCell('B' . $row_baca)->getFormattedValue() != NULL) {
                        if ($data_kinerja['SUPIR']['error'] == true && $tanggalSIOD == $sheetData->getCell('B' . $row_baca)->getFormattedValue()) {
                            $data_kinerja['SUPIR']['error'] = false;
                            $data_kinerja['TANGGAL']['error'] = false;
                        }
                        if ($data_kinerja['SUPIR']['error'] == false) {
                            $data_kinerja['SUPIR']['id'][] = $this->m_kinerja->getIdPegawai($sheetData->getCell('C' . $row_baca)->getFormattedValue(), 1); // cek di data base
                            $data_kinerja['SUPIR']['nip'][] = $sheetData->getCell('C' . $row_baca)->getFormattedValue();
                            $data_kinerja['SUPIR']['nama'][] = $sheetData->getCell('D' . $row_baca)->getFormattedValue();
                            $data_kinerja['SUPIR']['jabatan'][] = $sheetData->getCell('E' . $row_baca)->getFormattedValue();
                            $data_kinerja['SUPIR']['status_tugas'][] = $sheetData->getCell('F' . $row_baca)->getFormattedValue();
                            $data_kinerja['SUPIR']['klasifikasi'][] = $sheetData->getCell('G' . $row_baca)->getFormattedValue();
                            $data_kinerja['SUPIR']['total_km'][] = $sheetData->getCell('H' . $row_baca)->getFormattedValue();
                            $data_kinerja['SUPIR']['total_kl'][] = $sheetData->getCell('I' . $row_baca)->getFormattedValue();
                            $data_kinerja['SUPIR']['ritase'][] = $sheetData->getCell('J' . $row_baca)->getFormattedValue();
                            $data_kinerja['SUPIR']['jumlah_spbu'][] = ($sheetData->getCell('L' . $row_baca)->getValue() - ($koefisien['km'] * $sheetData->getCell('H' . $row_baca)->getValue()) - ($koefisien['kl'] * $sheetData->getCell('I' . $row_baca)->getValue()) - ($koefisien['rit'] * $sheetData->getCell('J' . $row_baca)->getValue())) / $koefisien['spbu']; //hasil hitung koefisien
                            $data_kinerja['SUPIR']['pendapatan'][] = $sheetData->getCell('L' . $row_baca)->getFormattedValue();
                        }
                        $row_baca++;
                    }
                    $data_kinerja['SUPIR']['jumlah'] = $row_baca - 14;
                } else if ($loadedSheetName == 'Detail Crew Kernet') {
                    //echo $sheetIndex, ' -> ', $loadedSheetName, '<br />';

                    $objPHPExcel->setActiveSheetIndexByName($loadedSheetName);
                    $sheetData = $objPHPExcel->getActiveSheet();
                    $sheetData->getStyle('B14:B1000')
                            ->getNumberFormat()
                            ->setFormatCode('dd-mm-yyyy');

                    $koefisien = $this->m_kinerja->getKoefisien(date("Y", strtotime($tanggalSIOD)), 1, 2);

                    $row_baca = 14;
                    while ($sheetData->getCell('B' . $row_baca)->getFormattedValue() != NULL) {
                        if ($data_kinerja['KERNET']['error'] == true && $tanggalSIOD == $sheetData->getCell('B' . $row_baca)->getFormattedValue()) {
                            $data_kinerja['KERNET']['error'] = false;
                            $data_kinerja['TANGGAL']['error'] = false;
                        }
                        if ($data_kinerja['KERNET']['error'] == false) {
                            $data_kinerja['KERNET']['id'][] = $this->m_kinerja->getIdPegawai($sheetData->getCell('C' . $row_baca)->getFormattedValue(), 1); // cek di data base
                            $data_kinerja['KERNET']['nip'][] = $sheetData->getCell('C' . $row_baca)->getFormattedValue();
                            $data_kinerja['KERNET']['nama'][] = $sheetData->getCell('D' . $row_baca)->getFormattedValue();
                            $data_kinerja['KERNET']['jabatan'][] = $sheetData->getCell('E' . $row_baca)->getFormattedValue();
                            $data_kinerja['KERNET']['status_tugas'][] = $sheetData->getCell('F' . $row_baca)->getFormattedValue();
                            $data_kinerja['KERNET']['klasifikasi'][] = $sheetData->getCell('G' . $row_baca)->getFormattedValue();
                            $data_kinerja['KERNET']['total_km'][] = $sheetData->getCell('H' . $row_baca)->getFormattedValue();
                            $data_kinerja['KERNET']['total_kl'][] = $sheetData->getCell('I' . $row_baca)->getFormattedValue();
                            $data_kinerja['KERNET']['ritase'][] = $sheetData->getCell('J' . $row_baca)->getFormattedValue();
                            $data_kinerja['KERNET']['jumlah_spbu'][] = ($sheetData->getCell('L' . $row_baca)->getValue() - ($koefisien['km'] * $sheetData->getCell('H' . $row_baca)->getValue()) - ($koefisien['kl'] * $sheetData->getCell('I' . $row_baca)->getValue()) - ($koefisien['rit'] * $sheetData->getCell('J' . $row_baca)->getValue())) / $koefisien['spbu']; //hasil hitung koefisien
                            $data_kinerja['KERNET']['pendapatan'][] = $sheetData->getCell('L' . $row_baca)->getFormattedValue();
                        }
                        $row_baca++;
                    }
                    $data_kinerja['KERNET']['jumlah'] = $row_baca - 14;
                } else if ($loadedSheetName == 'Produk SPBU') {
                    $data_kinerja['SPBU']['error'] = false;
                    //echo $sheetIndex, ' -> ', $loadedSheetName, '<br />';
                    $objPHPExcel->setActiveSheetIndexByName($loadedSheetName);
                    $sheetData = $objPHPExcel->getActiveSheet();
                    $sheetData->getStyle('B14:B1000')
                            ->getNumberFormat()
                            ->setFormatCode('dd-mm-yyyy');

                    //$sheetData = $objPHPExcel->getActiveSheet()->toArray(null, false, true, true);

                    $row_baca = 14;
                    $jumlah_SPBU = 0;
                    while ($sheetData->getCell('B' . $row_baca)->getFormattedValue() != NULL) {
                        $jumlah_SPBU++;
                        $row_baca++;
                    }
                    //echo "Jumlah SPBU : " . $jumlah_SPBU;
                    $data_kinerja['SPBU']['jumlah'] = $jumlah_SPBU;
                    //echo '<hr />';
                }
            }
            //setting error
            $data_kinerja['ERROR'] = true;
            if ($data_kinerja['SPBU']['error'] == false && $data_kinerja['MT']['error'] == false && $data_kinerja['SUPIR']['error'] == false && $data_kinerja['KERNET']['error'] == false && $data_kinerja['TANGGAL']['error'] == false) {
                $data_kinerja['ERROR'] = false;
            }
            unlink($file_target);
        }
        $data['lv1'] = 4;
        $data['lv2'] = 1;
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->load->view('layouts/navbar', $data);
        $this->load->view('kinerja/v_kinerja_siod', array('data_kinerja' => $data_kinerja, 'submit' => true));
        $this->load->view('layouts/footer');
    }

    public function simpan() {
        if (!$this->input->post('submit')) {
            redirect('kinerja');
        } else {
            $data_kinerja = unserialize($this->input->post('data_kinerja'));
            $data['lv1'] = 4;
            $data['lv2'] = 1;
            $this->load->view('layouts/header');
            $this->load->view('layouts/menu');
            $this->load->view('layouts/navbar', $data);
            $this->load->view('kinerja/v_kinerja_siod', array('data_kinerja' => $data_kinerja, 'submit' => true));
            $this->load->view('layouts/footer');
        }
    }

}
