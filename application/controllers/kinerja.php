<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class kinerja extends CI_Controller {

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
        $this->siod();
    }

    public function siod() {
        $this->load->model('m_kinerja');
        $depot = $this->session->userdata('id_depot');

        $data_kinerja['submit'] = false;
        $data_kinerja['simpan'] = false;

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
                            $pesan_error = array();
                            $data_error = false;
                            //NOPOL
                            $nopol = $sheetData->getCell('C' . $row_baca)->getFormattedValue();
                            $id = $this->m_kinerja->getIdMobil($nopol, $depot); // cek di data base
                            if ($id == -1) {
                                $data_error = true;
                                $pesan_error[] = 'Nopol tidak ada';
                            }

                            //CEK NOPOL GANDA
                            if ($row_baca > 14 && $id != -1) {
                                $sama = 0;
                                foreach ($data_kinerja['MT']['id'] as $row) {
                                    if ($row == $id) {
                                        $sama = 1;
                                    }
                                }
                                if ($sama == 1) {
                                    $data_error = true;
                                    $pesan_error[] = 'Nopol ganda dalam file';
                                }
                            }
                            $data_kinerja['MT']['id'][] = $id;

                            //id_kinerja
                            $id_kinerja = $this->m_kinerja->getIdKinerjaMT($data_kinerja['ID_LOG_HARIAN'], $id);
                            if ($id_kinerja == 1) {
                                $data_error = true;
                                $pesan_error[] = 'Kinerja telah diinput';
                            }
                            $data_kinerja['MT']['id_kinerja'][] = $id_kinerja;

                            //NOPOL
                            $data_kinerja['MT']['nopol'][] = $nopol;

                            //Ritase
                            $nilai = $sheetData->getCell('E' . $row_baca)->getValue();
                            if (!is_numeric($nilai)) {
                                $data_error = true;
                                $pesan_error[] = 'Nilai ritase bukan angka';
                            }
                            $data_kinerja['MT']['ritase'][] = $nilai;

                            //total_km
                            $nilai = $sheetData->getCell('F' . $row_baca)->getValue();
                            if (!is_numeric($nilai)) {
                                $data_error = true;
                                $pesan_error[] = 'Nilai total KM bukan angka';
                            }
                            $data_kinerja['MT']['total_km'][] = $nilai;

                            //total_kl
                            $nilai = $sheetData->getCell('G' . $row_baca)->getValue();
                            if (!is_numeric($nilai)) {
                                $data_error = true;
                                $pesan_error[] = 'Nilai total KL bukan angka';
                            }
                            $data_kinerja['MT']['total_kl'][] = $nilai;

                            //Ownuse
                            $nilai = $sheetData->getCell('I' . $row_baca)->getValue();
                            if (!is_numeric($nilai)) {
                                $data_error = true;
                                $pesan_error[] = 'Nilai Ownuse bukan angka';
                            }
                            $data_kinerja['MT']['ownuse'][] = $nilai;

                            //Premium
                            $nilai = $sheetData->getCell('M' . $row_baca)->getValue();
                            if (!is_numeric($nilai)) {
                                $data_error = true;
                                $pesan_error[] = 'Nilai Premium bukan angka';
                            }
                            $data_kinerja['MT']['premium'][] = $nilai;

                            //Pertamax
                            $nilai = $sheetData->getCell('R' . $row_baca)->getValue();
                            if (!is_numeric($nilai)) {
                                $data_error = true;
                                $pesan_error[] = 'Nilai Pertamax bukan angka';
                            }
                            $data_kinerja['MT']['pertamax'][] = $nilai;

                            //Pertamax plus
                            $nilai = $sheetData->getCell('S' . $row_baca)->getValue();
                            if (!is_numeric($nilai)) {
                                $data_error = true;
                                $pesan_error[] = 'Nilai Pertamax Plus bukan angka';
                            }
                            $data_kinerja['MT']['pertamax_plus'][] = $nilai;

                            //bio solar
                            $nilai = $sheetData->getCell('U' . $row_baca)->getValue();
                            if (!is_numeric($nilai)) {
                                $data_error = true;
                                $pesan_error[] = 'Nilai Bio Solar bukan angka';
                            }
                            $data_kinerja['MT']['bio_solar'][] = $nilai;

                            //pertamina dex
                            $nilai = $sheetData->getCell('X' . $row_baca)->getValue();
                            if (!is_numeric($nilai)) {
                                $data_error = true;
                                $pesan_error[] = 'Nilai Pertamina Dex bukan angka';
                            }
                            $data_kinerja['MT']['pertamina_dex'][] = $nilai;

                            //solar
                            $nilai = $sheetData->getCell('AE' . $row_baca)->getValue();
                            if (!is_numeric($nilai)) {
                                $data_error = true;
                                $pesan_error[] = 'Nilai Solar bukan angka';
                            }
                            $data_kinerja['MT']['solar'][] = $nilai;

                            //Setting Error
                            if ($data_error == true) {
                                $data_kinerja['MT']['data_error'][] = true;
                                $data_kinerja['MT']['pesan_error'][] = $pesan_error;
                            } else {
                                $data_kinerja['MT']['data_error'][] = false;
                                $data_kinerja['MT']['pesan_error'][] = $pesan_error;
                            }
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
                            $pesan_error = array();
                            $data_error = false;

                            //NIP
                            $nip = $sheetData->getCell('C' . $row_baca)->getFormattedValue();
                            $id = $this->m_kinerja->getIdPegawai($nip, $depot); // cek di data base
                            if ($id == -1) {
                                $data_error = true;
                                $pesan_error[] = 'NIP tidak ada';
                            }

                            //CEK NIP GANDA
                            if ($row_baca > 14 && $id != -1) {
                                $sama = 0;
                                foreach ($data_kinerja['SUPIR']['id'] as $row) {
                                    if ($row == $id) {
                                        $sama = 1;
                                    }
                                }
                                if ($sama == 1) {
                                    $data_error = true;
                                    $pesan_error[] = 'NIP ganda dalam file';
                                }
                            }
                            $data_kinerja['SUPIR']['id'][] = $id;

                            //id_kinerja
                            $id_kinerja = $this->m_kinerja->getIdKinerjaAMT($data_kinerja['ID_LOG_HARIAN'], $id);
                            if ($id_kinerja == 1) {
                                $data_error = true;
                                $pesan_error[] = 'Kinerja telah diinput';
                            }
                            $data_kinerja['SUPIR']['id_kinerja'][] = $id_kinerja;

                            $data_kinerja['SUPIR']['nip'][] = $nip;
                            $data_kinerja['SUPIR']['nama'][] = $sheetData->getCell('D' . $row_baca)->getFormattedValue();

                            //JABATAN
                            $jabatan = $sheetData->getCell('E' . $row_baca)->getFormattedValue();
                            if ($jabatan != 'SUPIR' && $jabatan != 'KERNET') {
                                $data_error = true;
                                $pesan_error[] = 'Jabatan salah';
                            }
                            $data_kinerja['SUPIR']['jabatan'][] = $jabatan;

                            //STATUS_TUGAS
                            $jabatan = $sheetData->getCell('F' . $row_baca)->getFormattedValue();
                            if ($jabatan != 'SUPIR' && $jabatan != 'KERNET') {
                                $data_error = true;
                                $pesan_error[] = 'Status tugas salah';
                            }
                            $data_kinerja['SUPIR']['status_tugas'][] = $jabatan;

                            //KLASIFIKASI
                            $klas = $sheetData->getCell('G' . $row_baca)->getFormattedValue();
                            if ($klas != '8' && $klas != '16' && $klas != '24' && $klas != '32' && $klas != '40') {
                                $data_error = true;
                                $pesan_error[] = 'Klasifikasi salah';
                            }
                            $data_kinerja['SUPIR']['klasifikasi'][] = $klas;

                            $error_hitung = false;
                            //total_km
                            $nilai = $sheetData->getCell('H' . $row_baca)->getValue();
                            if (!is_numeric($nilai)) {
                                $data_error = true;
                                $error_hitung = true;
                                $pesan_error[] = 'Nilai total KM bukan angka';
                            }
                            $data_kinerja['SUPIR']['total_km'][] = $nilai;

                            //total_kl
                            $nilai = $sheetData->getCell('I' . $row_baca)->getValue();
                            if (!is_numeric($nilai)) {
                                $data_error = true;
                                $error_hitung = true;
                                $pesan_error[] = 'Nilai total KL bukan angka';
                            }
                            $data_kinerja['SUPIR']['total_kl'][] = $nilai;

                            //Ritase
                            $nilai = $sheetData->getCell('J' . $row_baca)->getValue();
                            if (!is_numeric($nilai)) {
                                $data_error = true;
                                $error_hitung = true;
                                $pesan_error[] = 'Nilai Ritase bukan angka';
                            }
                            $data_kinerja['SUPIR']['ritase'][] = $nilai;

                            //SPBU
                            $koefisien = $this->m_kinerja->getKoefisien(date("Y", strtotime($tanggalSIOD)), $depot, $sheetData->getCell('F' . $row_baca)->getFormattedValue() . ' ' . $sheetData->getCell('G' . $row_baca)->getFormattedValue());
                            if ($koefisien['error'] == true) {
                                $data_kinerja['SUPIR']['koefisien_error'] = true;
                            }
                            if ($error_hitung == true) {
                                $data_kinerja['SUPIR']['jumlah_spbu'][] = 0;
                            } else {
                                $data_kinerja['SUPIR']['jumlah_spbu'][] = floor(($sheetData->getCell('L' . $row_baca)->getValue() - ($koefisien['km'] * $sheetData->getCell('H' . $row_baca)->getValue()) - ($koefisien['kl'] * $sheetData->getCell('I' . $row_baca)->getValue()) - ($koefisien['rit'] * $sheetData->getCell('J' . $row_baca)->getValue())) / $koefisien['spbu']); //hasil hitung koefisien
                            }

                            //Pendapatan
                            $nilai = $sheetData->getCell('L' . $row_baca)->getValue();
                            if (!is_numeric($nilai)) {
                                $data_error = true;
                                $pesan_error[] = 'Nilai Pendapatan bukan angka';
                            }
                            $data_kinerja['SUPIR']['pendapatan'][] = $nilai;

                            //Setting Error
                            if ($data_error == true) {
                                $data_kinerja['SUPIR']['data_error'][] = true;
                                $data_kinerja['SUPIR']['pesan_error'][] = $pesan_error;
                            } else {
                                $data_kinerja['SUPIR']['data_error'][] = false;
                                $data_kinerja['SUPIR']['pesan_error'][] = $pesan_error;
                            }
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
                            $pesan_error = array();
                            $data_error = false;

                            //NIP
                            $nip = $sheetData->getCell('C' . $row_baca)->getFormattedValue();
                            $id = $this->m_kinerja->getIdPegawai($nip, $depot); // cek di data base
                            if ($id == -1) {
                                $data_error = true;
                                $pesan_error[] = 'NIP tidak ada';
                            }

                            //CEK NIP GANDA DI KERNET DAN SUPIR
                            $sama = 0;
                            if ($row_baca > 14 && $id != -1) {
                                foreach ($data_kinerja['KERNET']['id'] as $row) {
                                    if ($row == $id) {
                                        $sama = 1;
                                    }
                                }
                            }
                            foreach ($data_kinerja['SUPIR']['id'] as $row) {
                                if ($row == $id) {
                                    $sama = 1;
                                }
                            }
                            if ($sama == 1) {
                                $data_error = true;
                                $pesan_error[] = 'NIP ganda dalam file';
                            }
                            $data_kinerja['KERNET']['id'][] = $id;


                            //id_kinerja
                            $id_kinerja = $this->m_kinerja->getIdKinerjaAMT($data_kinerja['ID_LOG_HARIAN'], $id);
                            if ($id_kinerja == 1) {
                                $data_error = true;
                                $pesan_error[] = 'Kinerja telah diinput';
                            }
                            $data_kinerja['KERNET']['id_kinerja'][] = $id_kinerja;

                            $data_kinerja['KERNET']['nip'][] = $nip;
                            $data_kinerja['KERNET']['nama'][] = $sheetData->getCell('D' . $row_baca)->getFormattedValue();

                            //JABATAN
                            $jabatan = $sheetData->getCell('E' . $row_baca)->getFormattedValue();
                            if ($jabatan != 'SUPIR' && $jabatan != 'KERNET') {
                                $data_error = true;
                                $pesan_error[] = 'Jabatan salah';
                            }
                            $data_kinerja['KERNET']['jabatan'][] = $jabatan;

                            //STATUS_TUGAS
                            $jabatan = $sheetData->getCell('F' . $row_baca)->getFormattedValue();
                            if ($jabatan != 'SUPIR' && $jabatan != 'KERNET') {
                                $data_error = true;
                                $pesan_error[] = 'Status tugas salah';
                            }
                            $data_kinerja['KERNET']['status_tugas'][] = $jabatan;

                            //KLASIFIKASI
                            $klas = $sheetData->getCell('G' . $row_baca)->getFormattedValue();
                            if ($klas != '8' && $klas != '16' && $klas != '24' && $klas != '32' && $klas != '40') {
                                $data_error = true;
                                $pesan_error[] = 'Klasifikasi salah';
                            }
                            $data_kinerja['KERNET']['klasifikasi'][] = $klas;

                            $error_hitung = false;
                            //total_km
                            $nilai = $sheetData->getCell('H' . $row_baca)->getValue();
                            if (!is_numeric($nilai)) {
                                $data_error = true;
                                $error_hitung = true;
                                $pesan_error[] = 'Nilai total KM bukan angka';
                            }
                            $data_kinerja['KERNET']['total_km'][] = $nilai;

                            //total_kl
                            $nilai = $sheetData->getCell('I' . $row_baca)->getValue();
                            if (!is_numeric($nilai)) {
                                $data_error = true;
                                $error_hitung = true;
                                $pesan_error[] = 'Nilai total KL bukan angka';
                            }
                            $data_kinerja['KERNET']['total_kl'][] = $nilai;

                            //Ritase
                            $nilai = $sheetData->getCell('J' . $row_baca)->getValue();
                            if (!is_numeric($nilai)) {
                                $data_error = true;
                                $error_hitung = true;
                                $pesan_error[] = 'Nilai Ritase bukan angka';
                            }
                            $data_kinerja['KERNET']['ritase'][] = $nilai;

                            //SPBU
                            $koefisien = $this->m_kinerja->getKoefisien(date("Y", strtotime($tanggalSIOD)), $depot, $sheetData->getCell('F' . $row_baca)->getFormattedValue() . ' ' . $sheetData->getCell('G' . $row_baca)->getFormattedValue());
                            if ($koefisien['error'] == true) {
                                $data_kinerja['KERNET']['koefisien_error'] = true;
                            }
                            if ($error_hitung == true) {
                                $data_kinerja['KERNET']['jumlah_spbu'][] = 0;
                            } else {
                                $data_kinerja['KERNET']['jumlah_spbu'][] = floor(($sheetData->getCell('L' . $row_baca)->getValue() - ($koefisien['km'] * $sheetData->getCell('H' . $row_baca)->getValue()) - ($koefisien['kl'] * $sheetData->getCell('I' . $row_baca)->getValue()) - ($koefisien['rit'] * $sheetData->getCell('J' . $row_baca)->getValue())) / $koefisien['spbu']); //hasil hitung koefisien
                            }


                            //Pendapatan
                            $nilai = $sheetData->getCell('L' . $row_baca)->getValue();
                            if (!is_numeric($nilai)) {
                                $data_error = true;
                                $pesan_error[] = 'Nilai Pendapatan bukan angka';
                            }
                            $data_kinerja['KERNET']['pendapatan'][] = $nilai;

                            //Setting Error
                            if ($data_error == true) {
                                $data_kinerja['KERNET']['data_error'][] = true;
                                $data_kinerja['KERNET']['pesan_error'][] = $pesan_error;
                            } else {
                                $data_kinerja['KERNET']['data_error'][] = false;
                                $data_kinerja['KERNET']['pesan_error'][] = $pesan_error;
                            }
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
        } else if ($this->input->post('simpan')) {
            $data_kinerja = unserialize($this->input->post('data_kinerja'));

            $status_input_kinerja = $this->m_kinerja->cekStatusLogHarian($depot, $data_kinerja['TANGGAL']['tanggal']);
            if ($status_input_kinerja == 1) {
                $data_kinerja['error_simpan'] = true;
            } else {
                $data_kinerja['error_simpan'] = false;
                $this->m_kinerja->insert_siod($depot, $data_kinerja);
            }
            $data_kinerja['submit'] = false;
            $data_kinerja['simpan'] = true;            
        }

        $this->header(5, 1);
        $this->load->view('kinerja/v_kinerja_siod', array('data_kinerja' => $data_kinerja));
        $this->footer();
    }

    public function hapus() {
        $depot = $this->session->userdata('id_depot');;

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

        $this->header(5, 1);
        $this->load->view('kinerja/v_hapus_kinerja_siod', $data2);
        $this->footer();
    }

    public function manual() {
        $depot = $this->session->userdata('id_depot');;
        $this->load->model('m_kinerja');
        $data2['AMT'] = $this->m_kinerja->getPegawai($depot);
        $data2['MT'] = $this->m_kinerja->getMobil($depot);
        $data2['KLIK_SIMPAN'] = false;
        //var_dump($data2);

       $this->header(5, 1);
        $this->load->view('kinerja/v_kinerja_manual', $data2);
        $this->footer();
    }

    public function simpan_manual() {
        $depot = $this->session->userdata('id_depot');;
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
            $this->header(5, 1);
            $this->load->view('kinerja/v_kinerja_manual', $data2);
           $this->footer();
        } else {
            redirect('kinerja/manual');
        }
    }

}
