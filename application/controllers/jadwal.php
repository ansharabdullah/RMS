<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class jadwal extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_amt');
        $this->load->model('m_log_harian');
        $this->load->model('m_mt');
        $this->load->model('m_penjadwalan');
    }

    public function index() {
        $this->penjadwalan();
    }

    public function penjadwalan() {
        $data['lv1'] = 5;
        $data['lv2'] = 1;
        $data2['jadwal'] = 0;

        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->load->view('layouts/navbar', $data);
        $this->load->view('jadwal/v_jadwal', $data2);
        $this->load->view('layouts/footer');
    }

    public function import_penjadwalan() {
        $data['lv1'] = 5;
        $data['lv2'] = 1;
        $data2['jadwal'] = 0;
        $data2['error'] = 0;
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->load->view('layouts/navbar', $data);
        $this->load->view('jadwal/v_import_jadwal', $data2);
        $this->load->view('layouts/footer');
    }

    public function import_xls() {
        $data2['error'] = 0;
        $bulanJadwal = $this->input->post('bulanJadwal', true);
        $fileJadwal = $_FILES['fileJadwal'];
        $dir = './assets/file/';
        if (!file_exists($dir)) {
            mkdir($dir);
        }

        $file_target = $dir . $_FILES['fileJadwal']['name'];
        move_uploaded_file($_FILES['fileJadwal']['tmp_name'], $file_target);

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
        $data2 = array();
        $j = 0;
        foreach ($loadedSheetNames as $sheetIndex => $loadedSheetName) {
            if ($loadedSheetName == 'JADWAL') {
                $objPHPExcel->setActiveSheetIndexByName($loadedSheetName);
                $sheetData = $objPHPExcel->getActiveSheet();
                $i = 1;
                $status = 0;
                $month = $sheetData->getCell('B2')->getFormattedValue();
                if($month<=10){
                    $month = "0".$month;
                }
                $year = $sheetData->getCell('B1')->getFormattedValue();
                $bulan = $year. '-' . $month;
                if ($bulanJadwal == $bulan) {
                    $bulanDB=$this->m_penjadwalan->cekJadwal($year,$month);
                    if(sizeof($bulanDB) == 0) {
                        while ($status == 0) {
                            $no = $i + 5;
                            $nip = $this->m_amt->cekNIP($sheetData->getCell('B' . $no)->getFormattedValue());
                            $nopol = $this->m_mt->cekNopol(strtoupper(str_replace(" ", "", $sheetData->getCell('E' . $no)->getFormattedValue())));
                            $error = "Error : ";
                            $nip_pegawai = "";
                            $nama_pegawai = "";
                            $jabatan = "";
                            $id_pegawai = "";
                            $id_mobil = "";
                            //jika sell tidak ada isi
//                    if (!$sheetData->getCell('B3')->getFormattedValue() && !$sheetData->getCell('C3')->getFormattedValue() && !$sheetData->getCell('D3')->getFormattedValue() && !$sheetData->getCell('E3')->getFormattedValue() && !$sheetData->getCell('F3')->getFormattedValue() && !$sheetData->getCell('G3')->getFormattedValue() && !$sheetData->getCell('H3')->getFormattedValue() && !$sheetData->getCell('I3')->getFormattedValue() && !$sheetData->getCell('J3')->getFormattedValue() && !$sheetData->getCell('K3')->getFormattedValue() && !$sheetData->getCell('L3')->getFormattedValue() && !$sheetData->getCell('M3')->getFormattedValue() && !$sheetData->getCell('N3')->getFormattedValue()) {
//                        $status = 1;
//                        $data['amt'] = 0;
//                        break;
//                    }
                            //cek nip
                            if ($sheetData->getCell('B' . $no)->getFormattedValue() == "") {
                                $error = $error . " NIP tidak boleh kosong,";
                                $e = 1;
                            } else if (sizeof($nip) == 0) {
                                $error = $error . " NIP tidak ditemukan dalam database,";
                                $e = 1;
                            } else {
                                $nip_pegawai = $nip[0]->NIP;
                                $nama_pegawai = $nip[0]->NAMA_PEGAWAI;
                                $jabatan = $nip[0]->JABATAN;
                                $id_pegawai = $nip[0]->ID_PEGAWAI;
                            }

                            //cek nopol
                            if ($sheetData->getCell('C' . $no)->getFormattedValue() == "") {
                                $error = $error . " NOPOL tidak boleh kosong,";
                                $e = 1;
                            } else if (sizeof($nopol) == 0) {
                                $error = $error . " NOPOL tidak ditemukan dalam database,";
                                $e = 1;
                            } else {
                                $id_mobil = $nopol[0]->ID_MOBIL;
                            }

                            $hadir = "Libur";

                            //jika tidak ada error
                            if ($error == "Error : ") {
                                $error = "Sukses";
                                $e = 0;
                            }

                            //jika lebih dari batas row
                            if ($i >= $sheetData->getHighestRow() - 3) {
                                $status = 1;
                                break;
                            }


                            //loop column
                            for ($column = 'F'; $column != 'AK'; $column++) {
                                $tanggal = $sheetData->getCell('B1')->getFormattedValue() . '-' . $sheetData->getCell('B2')->getFormattedValue() . '-' . $sheetData->getCell($column . 5)->getFormattedValue();
                                //cek absen
                                if ($sheetData->getCell($column . $no)->getFormattedValue() == "0") {
                                    $hadir = "Libur";
                                } else if ($sheetData->getCell($column . $no)->getFormattedValue() == "1") {
                                    $hadir = "Hadir";
                                } else {
                                    $hadir = "Kosong";
                                    $error = $error . "Jadwal hanya boleh diisi dengan 0 atau 1, ";
                                    $e = 1;
                                }
                                $log_harian = $this->m_log_harian->cekTanggal($tanggal, $this->session->userdata('id_depot'));
                                $id_log_harian = $log_harian[0]->ID_LOG_HARIAN;

                                //masukan ke array
                                $data2['jadwal'][($j)] = array(
                                    'nip' => $sheetData->getCell('B' . $no)->getFormattedValue(),
                                    'nama_pegawai' => $nama_pegawai,
                                    'id_pegawai' => $id_pegawai,
                                    'jabatan' => $jabatan,
                                    'id_mobil' => $id_mobil,
                                    'id_log_harian' => $id_log_harian,
                                    'id_depot' => $this->session->userdata('id_depot'),
                                    'nopol' => str_replace(" ", "", $sheetData->getCell('E' . $no)->getFormattedValue()),
                                    'tanggal_log_harian' => $tanggal,
                                    'status_error' => $error,
                                    'status_masuk' => $hadir,
                                    'error' => $e
                                );
                                $j++;
                                //print_r($data2);
                            }


                            //jika baris selanjutnya kosong
                            $i++;
                            if ($no == 10 + 5)
                                $status = 1;
//                    if (!$sheetData->getCell('B' . ($no + 1))->getFormattedValue() && !$sheetData->getCell('C' . ($no + 1))->getFormattedValue() && !$sheetData->getCell('D' . ($no + 1))->getFormattedValue() && !$sheetData->getCell('E' . ($no + 1))->getFormattedValue() && !$sheetData->getCell('F' . ($no + 1))->getFormattedValue() && !$sheetData->getCell('G' . ($no + 1))->getFormattedValue() && !$sheetData->getCell('H' . ($no + 1))->getFormattedValue() && !$sheetData->getCell('I' . ($no + 1))->getFormattedValue() && !$sheetData->getCell('J' . ($no + 1))->getFormattedValue() && !$sheetData->getCell('K' . ($no + 1))->getFormattedValue() && !$sheetData->getCell('L' . ($no + 1))->getFormattedValue() && !$sheetData->getCell('M' . ($no + 1))->getFormattedValue() && !$sheetData->getCell('N' . ($no + 1))->getFormattedValue()) {
//                        $status = 1;
//                    }
                        }
                    }else {
                        $data2['jadwal'] = 0;
                        $data2['error'] = "Jadwal pada bulan tersebut telah terisi.";
                    }
                } else {
                    $data2['jadwal'] = 0;
                    $data2['error'] = "Bulan yang dipilih tidak sama dengan yang ada di file. Mohon cek kembali.";
                }
            }
            $data['error'] = 0;
        }
        unlink($file_target);
        $data['lv1'] = 5;
        $data['lv2'] = 1;
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->load->view('layouts/navbar', $data);
        $this->load->view('jadwal/v_import_jadwal', $data2);
        $this->load->view('layouts/footer');
    }

    public function simpan_xls() {
        $data_jadwal = unserialize($this->input->post('data_jadwal'));
        $tanggal = $this->input->post('tanggal', true);
        $bulan = date("m", strtotime($tanggal));
        $tahun = date("Y", strtotime($tanggal));
        $depot = $this->session->userdata("id_depot");
        $this->m_penjadwalan->importJadwal($data_jadwal);
        $this->m_log_harian->updateStatusJadwal($bulan, $tahun, $depot);
        //print_r($data_jadwal);
        $link = base_url() . "jadwal/";
        echo '<script type="text/javascript">alert("Data berhasil ditambahkan.");';
        echo 'window.location.href="' . $link . '"';
        echo '</script>';
    }

    public function lihat_jadwal() {

        $data['lv1'] = 5;
        $data['lv2'] = 1;
        $depot = $this->session->userdata('id_depot');
        $tanggal = $this->input->get('tanggal', true);

        $data2['jadwal'] = $this->m_penjadwalan->getJadwal($depot, $tanggal);
        $data2['tanggal'] = $tanggal;
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->load->view('layouts/navbar', $data);
        $this->load->view('jadwal/v_jadwal', $data2);
        $this->load->view('layouts/footer');
    }

    public function edit_jadwal() {
        $id_jadwal = $this->input->post('id_jadwal', true);
        $data = array(
            'status_masuk' => $this->input->post('status_masuk', true)
        );
        $tanggal = $this->input->post('tanggal_log_harian', true);
        $this->m_penjadwalan->updateJadwal($data, $id_jadwal);

        $link = base_url() . "jadwal/lihat_jadwal/?tanggal=$tanggal";
        echo '<script type="text/javascript">alert("Data berhasil diubah.");';
        echo 'window.location.href="' . $link . '"';
        echo '</script>';
    }
    
    public function hapus_jadwal(){
        $data['lv1'] = 5;
        $data['lv2'] = 1;
        $data2['jadwal'] = 0;
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->load->view('layouts/navbar', $data);
        $this->load->view('jadwal/v_hapus_jadwal',$data2);
        $this->load->view('layouts/footer');
    }
    
    public function hapus_jadwal_preview(){
        $tanggal=$this->input->get('bulan', true);
        $bulan = date("m", strtotime($tanggal));
        $tahun = date("Y", strtotime($tanggal));
        $depot = $this->session->userdata('id_depot');
        
        $data2['jadwal'] = $this->m_penjadwalan->getJadwalPerbulan($depot, $bulan, $tahun);
        $data2['tanggal'] = $tanggal;
        $data['lv1'] = 5;
        $data['lv2'] = 1;
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->load->view('layouts/navbar', $data);
        $this->load->view('jadwal/v_hapus_jadwal',$data2);
        $this->load->view('layouts/footer');
    }
    
    public function hapus_jadwal_perbulan($tanggal){
        $bulan = date("m", strtotime($tanggal));
        $tahun = date("Y", strtotime($tanggal));
        $depot = $this->session->userdata('id_depot');
        
        $this->m_penjadwalan->deleteJadwal($depot, $bulan, $tahun);
        $link = base_url() . "jadwal/hapus_jadwal/";
        echo '<script type="text/javascript">alert("Data berhasil dihapus.");';
        echo 'window.location.href="' . $link . '"';
        echo '</script>';
    }

}
