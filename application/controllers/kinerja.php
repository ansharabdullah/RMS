<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class kinerja extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        
        if(!$this->session->userdata('isLoggedIn')){
            redirect('login');
        }else if($this->session->userdata('id_role')<=2){
            redirect();
        }
    }

    public function header($lv1,$lv2) {
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
        $this->siod();
    }

    public function siod() {
        $depot = 1;
        $this->load->model('m_kinerja');
        
        $data_kinerja['submit'] = false;
        $data_kinerja['simpan'] =  false;
        
        if ($this->input->post('cek')) {
            $data_kinerja['submit'] = true;
            
            $data_kinerja['SPBU']['error'] = true;
            $data_kinerja['MT']['error'] = true;
            $data_kinerja['SUPIR']['error'] = true;
            $data_kinerja['KERNET']['error'] = true;
            $data_kinerja['TANGGAL']['error'] = true;

            $tanggalSIOD = $this->input->post('tanggalSIOD');
            $tanggalSIOD = date("d-m-Y", strtotime($tanggalSIOD));

            $data_kinerja['TANGGAL']['tanggal'] = $tanggalSIOD;

            $data_kinerja['ID_LOG_HARIAN'] = $this->m_kinerja->getIdLogHarian($depot, $tanggalSIOD);
            $data_kinerja['STATUS_INPUT_HARIAN'] = $this->m_kinerja->cekStatusLogHarian($depot, $tanggalSIOD);


            $fileSIOD = $_FILES['fileSIOD'];

            $dir = './assets/file/';
            if (!file_exists($dir)) {
                mkdir($dir);
            }

            $file_target = $dir . $_FILES['fileSIOD']['name'];
            move_uploaded_file($_FILES['fileSIOD']['tmp_name'], $file_target);

            $this->load->library('PHPExcel/Classes/PHPExcel');

            $inputFileName = $file_target;

            $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
            //echo 'File ', pathinfo($inputFileName, PATHINFO_BASENAME), ' has been identified as an ', $inputFileType, ' file<br />';
            //echo 'Loading file ', pathinfo($inputFileName, PATHINFO_BASENAME), ' using IOFactory with the identified reader type<br />';
            $objReader = PHPExcel_IOFactory::createReader($inputFileType);

            $worksheetData = $objReader->listWorksheetInfo($inputFileName);

            //$worksheetRead = array_column($worksheetData, 'worksheetName');

            foreach ($worksheetData as $row) {
                $worksheetRead[] = $row['worksheetName'];
            }

            $objReader->setLoadSheetsOnly($worksheetRead);

            $objPHPExcel = $objReader->load($inputFileName);

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
                            $id = $this->m_kinerja->getIdMobil($sheetData->getCell('C' . $row_baca)->getFormattedValue(), $depot); // cek di data base
                            $data_kinerja['MT']['id'][] = $id;
                            $data_kinerja['MT']['id_kinerja'][] = $this->m_kinerja->getIdKinerjaMT($data_kinerja['ID_LOG_HARIAN'], $id);
                            $data_kinerja['MT']['nopol'][] = $sheetData->getCell('C' . $row_baca)->getFormattedValue();
                            $data_kinerja['MT']['ritase'][] = $sheetData->getCell('E' . $row_baca)->getValue();
                            $data_kinerja['MT']['total_km'][] = $sheetData->getCell('F' . $row_baca)->getValue();
                            $data_kinerja['MT']['total_kl'][] = $sheetData->getCell('G' . $row_baca)->getValue();
                            $data_kinerja['MT']['ownuse'][] = $sheetData->getCell('I' . $row_baca)->getValue();
                            $data_kinerja['MT']['premium'][] = $sheetData->getCell('M' . $row_baca)->getValue();
                            $data_kinerja['MT']['pertamax'][] = $sheetData->getCell('R' . $row_baca)->getValue();
                            $data_kinerja['MT']['pertamax_plus'][] = $sheetData->getCell('S' . $row_baca)->getValue();
                            $data_kinerja['MT']['bio_solar'][] = $sheetData->getCell('U' . $row_baca)->getValue();
                            $data_kinerja['MT']['pertamina_dex'][] = $sheetData->getCell('X' . $row_baca)->getValue();
                            $data_kinerja['MT']['solar'][] = $sheetData->getCell('AE' . $row_baca)->getValue();
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

                    $data_kinerja['SUPIR']['koefisien_error'] = false;

                    $row_baca = 14;
                    while ($sheetData->getCell('B' . $row_baca)->getFormattedValue() != NULL) {
                        if ($data_kinerja['SUPIR']['error'] == true && $tanggalSIOD == $sheetData->getCell('B' . $row_baca)->getFormattedValue()) {
                            $data_kinerja['SUPIR']['error'] = false;
                            $data_kinerja['TANGGAL']['error'] = false;
                        }
                        if ($data_kinerja['SUPIR']['error'] == false) {
                            $id = $this->m_kinerja->getIdPegawai($sheetData->getCell('C' . $row_baca)->getFormattedValue(), $depot); // cek di data base
                            $data_kinerja['SUPIR']['id'][] = $id;
                            $data_kinerja['SUPIR']['id_kinerja'][] = $this->m_kinerja->getIdKinerjaAMT($data_kinerja['ID_LOG_HARIAN'], $id);
                            $data_kinerja['SUPIR']['nip'][] = $sheetData->getCell('C' . $row_baca)->getFormattedValue();
                            $data_kinerja['SUPIR']['nama'][] = $sheetData->getCell('D' . $row_baca)->getFormattedValue();
                            $data_kinerja['SUPIR']['jabatan'][] = $sheetData->getCell('E' . $row_baca)->getFormattedValue();
                            $data_kinerja['SUPIR']['status_tugas'][] = $sheetData->getCell('F' . $row_baca)->getFormattedValue();
                            $data_kinerja['SUPIR']['klasifikasi'][] = $sheetData->getCell('G' . $row_baca)->getFormattedValue();
                            $data_kinerja['SUPIR']['total_km'][] = $sheetData->getCell('H' . $row_baca)->getValue();
                            $data_kinerja['SUPIR']['total_kl'][] = $sheetData->getCell('I' . $row_baca)->getValue();
                            $data_kinerja['SUPIR']['ritase'][] = $sheetData->getCell('J' . $row_baca)->getValue();
                            $koefisien = $this->m_kinerja->getKoefisien(date("Y", strtotime($tanggalSIOD)), $depot, $sheetData->getCell('F' . $row_baca)->getFormattedValue() . ' ' . $sheetData->getCell('G' . $row_baca)->getFormattedValue());
                            if ($koefisien['error'] == true) {
                                $data_kinerja['SUPIR']['koefisien_error'] = true;
                            }

                            $data_kinerja['SUPIR']['jumlah_spbu'][] = floor(($sheetData->getCell('L' . $row_baca)->getValue() - ($koefisien['km'] * $sheetData->getCell('H' . $row_baca)->getValue()) - ($koefisien['kl'] * $sheetData->getCell('I' . $row_baca)->getValue()) - ($koefisien['rit'] * $sheetData->getCell('J' . $row_baca)->getValue())) / $koefisien['spbu']); //hasil hitung koefisien
                            $data_kinerja['SUPIR']['pendapatan'][] = $sheetData->getCell('L' . $row_baca)->getValue();
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

                    $data_kinerja['KERNET']['koefisien_error'] = false;

                    $row_baca = 14;
                    while ($sheetData->getCell('B' . $row_baca)->getFormattedValue() != NULL) {
                        if ($data_kinerja['KERNET']['error'] == true && $tanggalSIOD == $sheetData->getCell('B' . $row_baca)->getFormattedValue()) {
                            $data_kinerja['KERNET']['error'] = false;
                            $data_kinerja['TANGGAL']['error'] = false;
                        }
                        if ($data_kinerja['KERNET']['error'] == false) {
                            $id = $this->m_kinerja->getIdPegawai($sheetData->getCell('C' . $row_baca)->getFormattedValue(), $depot); // cek di data base
                            $data_kinerja['KERNET']['id'][] = $id;
                            $data_kinerja['KERNET']['id_kinerja'][] = $this->m_kinerja->getIdKinerjaAMT($data_kinerja['ID_LOG_HARIAN'], $id);
                            $data_kinerja['KERNET']['nip'][] = $sheetData->getCell('C' . $row_baca)->getFormattedValue();
                            $data_kinerja['KERNET']['nama'][] = $sheetData->getCell('D' . $row_baca)->getFormattedValue();
                            $data_kinerja['KERNET']['jabatan'][] = $sheetData->getCell('E' . $row_baca)->getFormattedValue();
                            $data_kinerja['KERNET']['status_tugas'][] = $sheetData->getCell('F' . $row_baca)->getFormattedValue();
                            $data_kinerja['KERNET']['klasifikasi'][] = $sheetData->getCell('G' . $row_baca)->getFormattedValue();
                            $data_kinerja['KERNET']['total_km'][] = $sheetData->getCell('H' . $row_baca)->getValue();
                            $data_kinerja['KERNET']['total_kl'][] = $sheetData->getCell('I' . $row_baca)->getValue();
                            $data_kinerja['KERNET']['ritase'][] = $sheetData->getCell('J' . $row_baca)->getValue();

                            $koefisien = $this->m_kinerja->getKoefisien(date("Y", strtotime($tanggalSIOD)), $depot, $sheetData->getCell('F' . $row_baca)->getFormattedValue() . ' ' . $sheetData->getCell('G' . $row_baca)->getFormattedValue());
                            if ($koefisien['error'] == true) {
                                $data_kinerja['KERNET']['koefisien_error'] = true;
                            }

                            $data_kinerja['KERNET']['jumlah_spbu'][] = floor(($sheetData->getCell('L' . $row_baca)->getValue() - ($koefisien['km'] * $sheetData->getCell('H' . $row_baca)->getValue()) - ($koefisien['kl'] * $sheetData->getCell('I' . $row_baca)->getValue()) - ($koefisien['rit'] * $sheetData->getCell('J' . $row_baca)->getValue())) / $koefisien['spbu']); //hasil hitung koefisien
                            $data_kinerja['KERNET']['pendapatan'][] = $sheetData->getCell('L' . $row_baca)->getValue();
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
            if ($data_kinerja['STATUS_INPUT_HARIAN'] == 0 && $data_kinerja['ID_LOG_HARIAN'] > 0 && $data_kinerja['SPBU']['error'] == false && $data_kinerja['MT']['error'] == false && $data_kinerja['SUPIR']['error'] == false && $data_kinerja['SUPIR']['koefisien_error'] == false && $data_kinerja['KERNET']['error'] == false && $data_kinerja['KERNET']['koefisien_error'] == false && $data_kinerja['TANGGAL']['error'] == false) {
                $data_kinerja['ERROR'] = false;
            }
            unlink($file_target);

        }else if($this->input->post('simpan')){
            $data_kinerja = unserialize($this->input->post('data_kinerja'));
            $this->m_kinerja->insert_siod($depot, $data_kinerja);
        }
        
        
        
        $this->header(5, 1);
        $this->load->view('kinerja/v_kinerja_siod', array('data_kinerja' => $data_kinerja));
        $this->footer();
    }

    public function preview() {
        if (!$this->input->post('submit')) {
            redirect('kinerja');
        } else {
            $depot = 1;

            $this->load->model('m_kinerja');

            $data_kinerja['SPBU']['error'] = true;
            $data_kinerja['MT']['error'] = true;
            $data_kinerja['SUPIR']['error'] = true;
            $data_kinerja['KERNET']['error'] = true;
            $data_kinerja['TANGGAL']['error'] = true;

            $tanggalSIOD = $this->input->post('tanggalSIOD');
            $tanggalSIOD = date("d-m-Y", strtotime($tanggalSIOD));

            $data_kinerja['TANGGAL']['tanggal'] = $tanggalSIOD;

            $data_kinerja['ID_LOG_HARIAN'] = $this->m_kinerja->getIdLogHarian($depot, $tanggalSIOD);
            $data_kinerja['STATUS_INPUT_HARIAN'] = $this->m_kinerja->cekStatusLogHarian($depot, $tanggalSIOD);


            $fileSIOD = $_FILES['fileSIOD'];

            $dir = './assets/file/';
            if (!file_exists($dir)) {
                mkdir($dir);
            }

            $file_target = $dir . $_FILES['fileSIOD']['name'];
            move_uploaded_file($_FILES['fileSIOD']['tmp_name'], $file_target);

            $this->load->library('PHPExcel/Classes/PHPExcel');

            $inputFileName = $file_target;

            $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
            //echo 'File ', pathinfo($inputFileName, PATHINFO_BASENAME), ' has been identified as an ', $inputFileType, ' file<br />';
            //echo 'Loading file ', pathinfo($inputFileName, PATHINFO_BASENAME), ' using IOFactory with the identified reader type<br />';
            $objReader = PHPExcel_IOFactory::createReader($inputFileType);

            $worksheetData = $objReader->listWorksheetInfo($inputFileName);

            //$worksheetRead = array_column($worksheetData, 'worksheetName');

            foreach ($worksheetData as $row) {
                $worksheetRead[] = $row['worksheetName'];
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
                            $id = $this->m_kinerja->getIdMobil($sheetData->getCell('C' . $row_baca)->getFormattedValue(), $depot); // cek di data base
                            $data_kinerja['MT']['id'][] = $id;
                            $data_kinerja['MT']['id_kinerja'][] = $this->m_kinerja->getIdKinerjaMT($data_kinerja['ID_LOG_HARIAN'], $id);
                            $data_kinerja['MT']['nopol'][] = $sheetData->getCell('C' . $row_baca)->getFormattedValue();
                            $data_kinerja['MT']['ritase'][] = $sheetData->getCell('E' . $row_baca)->getValue();
                            $data_kinerja['MT']['total_km'][] = $sheetData->getCell('F' . $row_baca)->getValue();
                            $data_kinerja['MT']['total_kl'][] = $sheetData->getCell('G' . $row_baca)->getValue();
                            $data_kinerja['MT']['ownuse'][] = $sheetData->getCell('I' . $row_baca)->getValue();
                            $data_kinerja['MT']['premium'][] = $sheetData->getCell('M' . $row_baca)->getValue();
                            $data_kinerja['MT']['pertamax'][] = $sheetData->getCell('R' . $row_baca)->getValue();
                            $data_kinerja['MT']['pertamax_plus'][] = $sheetData->getCell('S' . $row_baca)->getValue();
                            $data_kinerja['MT']['bio_solar'][] = $sheetData->getCell('U' . $row_baca)->getValue();
                            $data_kinerja['MT']['pertamina_dex'][] = $sheetData->getCell('X' . $row_baca)->getValue();
                            $data_kinerja['MT']['solar'][] = $sheetData->getCell('AE' . $row_baca)->getValue();
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

                    $data_kinerja['SUPIR']['koefisien_error'] = false;

                    $row_baca = 14;
                    while ($sheetData->getCell('B' . $row_baca)->getFormattedValue() != NULL) {
                        if ($data_kinerja['SUPIR']['error'] == true && $tanggalSIOD == $sheetData->getCell('B' . $row_baca)->getFormattedValue()) {
                            $data_kinerja['SUPIR']['error'] = false;
                            $data_kinerja['TANGGAL']['error'] = false;
                        }
                        if ($data_kinerja['SUPIR']['error'] == false) {
                            $id = $this->m_kinerja->getIdPegawai($sheetData->getCell('C' . $row_baca)->getFormattedValue(), $depot); // cek di data base
                            $data_kinerja['SUPIR']['id'][] = $id;
                            $data_kinerja['SUPIR']['id_kinerja'][] = $this->m_kinerja->getIdKinerjaAMT($data_kinerja['ID_LOG_HARIAN'], $id);
                            $data_kinerja['SUPIR']['nip'][] = $sheetData->getCell('C' . $row_baca)->getFormattedValue();
                            $data_kinerja['SUPIR']['nama'][] = $sheetData->getCell('D' . $row_baca)->getFormattedValue();
                            $data_kinerja['SUPIR']['jabatan'][] = $sheetData->getCell('E' . $row_baca)->getFormattedValue();
                            $data_kinerja['SUPIR']['status_tugas'][] = $sheetData->getCell('F' . $row_baca)->getFormattedValue();
                            $data_kinerja['SUPIR']['klasifikasi'][] = $sheetData->getCell('G' . $row_baca)->getFormattedValue();
                            $data_kinerja['SUPIR']['total_km'][] = $sheetData->getCell('H' . $row_baca)->getValue();
                            $data_kinerja['SUPIR']['total_kl'][] = $sheetData->getCell('I' . $row_baca)->getValue();
                            $data_kinerja['SUPIR']['ritase'][] = $sheetData->getCell('J' . $row_baca)->getValue();
                            $koefisien = $this->m_kinerja->getKoefisien(date("Y", strtotime($tanggalSIOD)), $depot, $sheetData->getCell('F' . $row_baca)->getFormattedValue() . ' ' . $sheetData->getCell('G' . $row_baca)->getFormattedValue());
                            if ($koefisien['error'] == true) {
                                $data_kinerja['SUPIR']['koefisien_error'] = true;
                            }

                            $data_kinerja['SUPIR']['jumlah_spbu'][] = floor(($sheetData->getCell('L' . $row_baca)->getValue() - ($koefisien['km'] * $sheetData->getCell('H' . $row_baca)->getValue()) - ($koefisien['kl'] * $sheetData->getCell('I' . $row_baca)->getValue()) - ($koefisien['rit'] * $sheetData->getCell('J' . $row_baca)->getValue())) / $koefisien['spbu']); //hasil hitung koefisien
                            $data_kinerja['SUPIR']['pendapatan'][] = $sheetData->getCell('L' . $row_baca)->getValue();
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

                    $data_kinerja['KERNET']['koefisien_error'] = false;

                    $row_baca = 14;
                    while ($sheetData->getCell('B' . $row_baca)->getFormattedValue() != NULL) {
                        if ($data_kinerja['KERNET']['error'] == true && $tanggalSIOD == $sheetData->getCell('B' . $row_baca)->getFormattedValue()) {
                            $data_kinerja['KERNET']['error'] = false;
                            $data_kinerja['TANGGAL']['error'] = false;
                        }
                        if ($data_kinerja['KERNET']['error'] == false) {
                            $id = $this->m_kinerja->getIdPegawai($sheetData->getCell('C' . $row_baca)->getFormattedValue(), $depot); // cek di data base
                            $data_kinerja['KERNET']['id'][] = $id;
                            $data_kinerja['KERNET']['id_kinerja'][] = $this->m_kinerja->getIdKinerjaAMT($data_kinerja['ID_LOG_HARIAN'], $id);
                            $data_kinerja['KERNET']['nip'][] = $sheetData->getCell('C' . $row_baca)->getFormattedValue();
                            $data_kinerja['KERNET']['nama'][] = $sheetData->getCell('D' . $row_baca)->getFormattedValue();
                            $data_kinerja['KERNET']['jabatan'][] = $sheetData->getCell('E' . $row_baca)->getFormattedValue();
                            $data_kinerja['KERNET']['status_tugas'][] = $sheetData->getCell('F' . $row_baca)->getFormattedValue();
                            $data_kinerja['KERNET']['klasifikasi'][] = $sheetData->getCell('G' . $row_baca)->getFormattedValue();
                            $data_kinerja['KERNET']['total_km'][] = $sheetData->getCell('H' . $row_baca)->getValue();
                            $data_kinerja['KERNET']['total_kl'][] = $sheetData->getCell('I' . $row_baca)->getValue();
                            $data_kinerja['KERNET']['ritase'][] = $sheetData->getCell('J' . $row_baca)->getValue();

                            $koefisien = $this->m_kinerja->getKoefisien(date("Y", strtotime($tanggalSIOD)), $depot, $sheetData->getCell('F' . $row_baca)->getFormattedValue() . ' ' . $sheetData->getCell('G' . $row_baca)->getFormattedValue());
                            if ($koefisien['error'] == true) {
                                $data_kinerja['KERNET']['koefisien_error'] = true;
                            }

                            $data_kinerja['KERNET']['jumlah_spbu'][] = floor(($sheetData->getCell('L' . $row_baca)->getValue() - ($koefisien['km'] * $sheetData->getCell('H' . $row_baca)->getValue()) - ($koefisien['kl'] * $sheetData->getCell('I' . $row_baca)->getValue()) - ($koefisien['rit'] * $sheetData->getCell('J' . $row_baca)->getValue())) / $koefisien['spbu']); //hasil hitung koefisien
                            $data_kinerja['KERNET']['pendapatan'][] = $sheetData->getCell('L' . $row_baca)->getValue();
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
            if ($data_kinerja['STATUS_INPUT_HARIAN'] == 0 && $data_kinerja['ID_LOG_HARIAN'] > 0 && $data_kinerja['SPBU']['error'] == false && $data_kinerja['MT']['error'] == false && $data_kinerja['SUPIR']['error'] == false && $data_kinerja['SUPIR']['koefisien_error'] == false && $data_kinerja['KERNET']['error'] == false && $data_kinerja['KERNET']['koefisien_error'] == false && $data_kinerja['TANGGAL']['error'] == false) {
                $data_kinerja['ERROR'] = false;
            }
            unlink($file_target);

            $data['lv1'] = 4;
            $data['lv2'] = 1;
            $this->load->view('layouts/header');
            $this->load->view('layouts/menu');
            $this->load->view('layouts/navbar', $data);
            $this->load->view('kinerja/v_kinerja_siod', array('data_kinerja' => $data_kinerja, 'submit' => true, 'simpan' => false));
            $this->load->view('layouts/footer');
        }
    }

    public function simpan() {
        if (!$this->input->post('simpan')) {
            redirect('kinerja');
        } else {
            $depot = 1;
            $data_kinerja = unserialize($this->input->post('data_kinerja'));

            $this->load->model('m_kinerja');
            $this->m_kinerja->insert_siod($depot, $data_kinerja);
            //insert log sistem

            $data['lv1'] = 4;
            $data['lv2'] = 1;
            $this->load->view('layouts/header');
            $this->load->view('layouts/menu');
            $this->load->view('layouts/navbar', $data);
            $this->load->view('kinerja/v_kinerja_siod', array('submit' => false, 'simpan' => true));
            $this->load->view('layouts/footer');
        }
    }

    public function hapus() {
        $depot = 1;

        $this->load->model('m_kinerja');

        $data2['klik_hapus'] = false;
        $data2['klik_cek'] = false;
        $data2['status_hapus'] = false;

        if ($this->input->post('submit')) {
            $data2['klik_hapus'] = true;
            $tanggal_hapus = date("d-m-Y", strtotime($this->input->post('tanggal_hapus')));

            $cek = $this->m_kinerja->cekStatusLogHarian($depot, $tanggal_hapus);

            if ($cek != 0) {
                $id = $this->m_kinerja->getIdLogHarian($depot, $tanggal_hapus);
                $this->m_kinerja->hapus_kinerja_siod($id);
                $data2['status_hapus'] = true;
                // insert log sistem
            }
        } else if ($this->input->post('cek')) {
            $data2['klik_cek'] = true;
            $data2['tanggal_cek'] = $this->input->post('tanggal_cek');
            $data2['tanggal'] = date("d-m-Y", strtotime($data2['tanggal_cek']));

            $id = $this->m_kinerja->getIdLogHarian($depot, $data2['tanggal']);
            if ($id != -1) {//data ada
                $cek = $this->m_kinerja->cekStatusLogHarian($depot, $data2['tanggal']);
                if ($cek == 1) {
                    $data2['status_hapus'] = true;
                    //get jumlah spbu
                    $data2 ['alokasi_spbu'] = $this->m_kinerja->getAlokasiSPBU($id);
                    //get kinerja mt
                    $data2 ['kinerja_mt'] = $this->m_kinerja->getKinerjaMT($id);
                    ;
                    //get kinerja amt
                    $data2 ['kinerja_amt'] = $this->m_kinerja->getKinerjaAMT($id);
                } else {
                    $data2['status_hapus'] = false;
                }
            }
        }

        $data['lv1'] = 4;
        $data['lv2'] = 1;
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->load->view('layouts/navbar', $data);
        $this->load->view('kinerja/v_hapus_kinerja_siod', $data2);
        $this->load->view('layouts/footer');
    }

    public function manual() {
        $depot = 1;
        $this->load->model('m_kinerja');
        $data2['AMT'] = $this->m_kinerja->getPegawai($depot);
        $data2['MT'] = $this->m_kinerja->getMobil($depot);
        $data2['KLIK_SIMPAN'] = false;
        //var_dump($data2);

        $data['lv1'] = 4;
        $data['lv2'] = 1;
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->load->view('layouts/navbar', $data);
        $this->load->view('kinerja/v_kinerja_manual', $data2);
        $this->load->view('layouts/footer');
    }

    public function simpan_manual() {
        $depot = 1;
        $this->load->model('m_kinerja');

        if ($this->input->post('submit_pegawai')) {
            $data2['KLIK_SIMPAN'] = true;
            $data2['KLIK_SIMPAN_PEGAWAI'] = true;
            $data2['KLIK_SIMPAN_MOBIL'] = false;

            $data2['error_id_log_harian'] = false;
            $data2['error_id_kinerja_amt'] = false;
            $data2['error_koefisien'] = false;

            $id_pegawai = $this->input->post('id_pegawai');
            $klas_pegawai = $this->input->post('klas_pegawai');
            $status_tugas = $this->input->post('status_tugas');
            $tanggal = date("d-m-Y", strtotime($this->input->post('tgl')));
            $km_pegawai = $this->input->post('km_pegawai');
            $kl_pegawai = $this->input->post('kl_pegawai');
            $rit_pegawai = $this->input->post('rit_pegawai');
            $spbu_pegawai = $this->input->post('spbu_pegawai');

            //cek dulu id log harian
            $id_log_harian = $this->m_kinerja->getIdLogHarian($depot, $tanggal);
            if ($id_log_harian != -1) {
                //cek id_kinerja_amt jika ada
                $id_kinerja = $this->m_kinerja->getIdKinerjaAMT($id_log_harian, $id_pegawai);
                if ($id_kinerja == 0) {
                    //cek koefisien
                    $koefisien = $this->m_kinerja->getKoefisien(date("Y", strtotime($this->input->post('tgl'))), $depot, $status_tugas . ' ' . $klas_pegawai);
                    if ($koefisien['error'] == true) {
                        $data2['error_koefisien'] = true;
                    } else {
                        // berhasil tinggal input
                        $pendapatan = ($km_pegawai * $koefisien['km']) + ($kl_pegawai * $koefisien['kl']) + ($rit_pegawai * $koefisien['rit']) + ($spbu_pegawai * $koefisien['spbu']);
                        $this->m_kinerja->insertManualKinerjaAMT($id_log_harian, $id_pegawai, $status_tugas, $km_pegawai, $kl_pegawai, $rit_pegawai, $spbu_pegawai, $pendapatan);
                    }
                } else {
                    $data2['error_id_kinerja_amt'] = true;
                }
            } else {
                $data2['error_id_log_harian'] = true;
            }

            $data2['AMT'] = $this->m_kinerja->getPegawai($depot);
            $data2['MT'] = $this->m_kinerja->getMobil($depot);
            //var_dump($data2);

            $data['lv1'] = 4;
            $data['lv2'] = 1;
            $this->load->view('layouts/header');
            $this->load->view('layouts/menu');
            $this->load->view('layouts/navbar', $data);
            $this->load->view('kinerja/v_kinerja_manual', $data2);
            $this->load->view('layouts/footer');
        } else if ($this->input->post('submit_mobil')) {
            $data2['KLIK_SIMPAN'] = true;
            $data2['KLIK_SIMPAN_PEGAWAI'] = false;
            $data2['KLIK_SIMPAN_MOBIL'] = true;

            $data2['error_id_log_harian'] = false;
            $data2['error_id_kinerja_mt'] = false;

            $id_mobil = $this->input->post('id_mobil');
            $tanggal = date("d-m-Y", strtotime($this->input->post('tgl_mobil')));
            $km_mobil = $this->input->post('km_mobil');
            $kl_mobil = $this->input->post('kl_mobil');
            $rit_mobil = $this->input->post('rit_mobil');
            $ou_mobil = $this->input->post('ou_mobil');
            $premium_mobil = $this->input->post('premium_mobil');
            $pertamax_mobil = $this->input->post('pertamax_mobil');
            $pertamaxplus_mobil = $this->input->post('pertamaxplus_mobil');
            $pertaminadex_mobil = $this->input->post('pertaminadex_mobil');
            $solar_mobil = $this->input->post('solar_mobil');
            $biosolar_mobil = $this->input->post('biosolar_mobil');

            //cek dulu id log harian
            $id_log_harian = $this->m_kinerja->getIdLogHarian($depot, $tanggal);
            if ($id_log_harian != -1) {
                //cek kinerja mt jika sudah di input
                $id_kinerja = $this->m_kinerja->getIdKinerjaMT($id_log_harian, $id_mobil);
                if ($id_kinerja == 0) {
                    $this->m_kinerja->insertManualKinerjaMT($id_log_harian, $id_mobil, $km_mobil, $kl_mobil, $rit_mobil, $ou_mobil, $premium_mobil, $pertamax_mobil, $pertamaxplus_mobil, $pertaminadex_mobil, $solar_mobil, $biosolar_mobil);
                } else {
                    $data2['error_id_kinerja_mt'] = true;
                }
            } else {
                $data2['error_id_log_harian'] = true;
            }

            $data2['AMT'] = $this->m_kinerja->getPegawai($depot);
            $data2['MT'] = $this->m_kinerja->getMobil($depot);
            $data['lv1'] = 4;
            $data['lv2'] = 1;
            $this->load->view('layouts/header');
            $this->load->view('layouts/menu');
            $this->load->view('layouts/navbar', $data);
            $this->load->view('kinerja/v_kinerja_manual', $data2);
            $this->load->view('layouts/footer');
        } else {
            redirect('kinerja/manual');
        }
    }

}
