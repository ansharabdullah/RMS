<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class amt extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model("m_amt");
        $this->load->model("m_mt");
        $this->load->model("m_rencana");
        $this->load->model("m_kinerja");
        $this->load->model("m_log_sistem");
        $this->load->model("m_log_harian");
        $this->load->model("m_peringatan");
        $this->load->model("m_penjadwalan");
        $this->load->helper(array('form', 'url'));
    }

    public function index() {
        $this->data_amt();
    }

    public function data_amt() {
        $data['lv1'] = 2;
        $data['lv2'] = 1;
        $depot = $this->session->userdata('id_depot');
        $data1['amt'] = $this->m_amt->selectAMT($depot);
        $data1['success'] = 0;
        $data1['error'] = 0;
        $data3 = menu_ss();
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu', $data3);
        $this->load->view('layouts/navbar', $data);
        $this->load->view('amt/v_data_amt', $data1);
        $this->load->view('layouts/footer');
    }

    public function detail($id_pegawai) {
        $data['lv1'] = 2;
        $data['lv2'] = 1;
        $data1['amt'] = $this->m_amt->detailAMT($id_pegawai);

        $depot = $this->session->userdata('id_depot');
        $tahun = date('Y');
        //$bulan = date('m');
        $bulan = '01';
        $data1['grafik'] = $this->m_amt->get_kinerja_amt_hari($depot, $bulan, $tahun, $id_pegawai);
        $data1['tahun'] = $tahun;
        $data1['bulan'] = $bulan;
        $data1['id_pegawai'] = $id_pegawai;
        $data1['kinerja'] = 0;
        $data1['peringatan'] = $this->m_peringatan->getPeringatan($id_pegawai);
        $data3 = menu_ss();
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu', $data3);
        $this->load->view('layouts/navbar', $data);
        $this->load->view('amt/v_detail', $data1);
        $this->load->view('layouts/footer');
    }

    public function edit_kinerja() {
        $id_kinerja_amt = $this->input->post('id_kinerja_amt', true);
        $id_pegawai = $this->input->post('id_pegawai', true);

        $tugas = $this->input->post('status_tugas', true);
        $k = $this->m_amt->getKlasifikasi($id_pegawai);
        $klasifikasi = $k[0]->KLASIFIKASI;
        $depot = $this->session->userdata('id_depot');
        //$tahun = date('Y',  strtotime($this->input->post('tanggal_kinerja', true)));
        $tahun = 2013;

        //KM
        $jenis = "KM";
        $a = $this->m_amt->getKoef($jenis, $tugas, $klasifikasi, $depot, $tahun);
        $koef_km = $a[0]->NILAI;

        //KL
        $jenis = "KL";
        $a = $this->m_amt->getKoef($jenis, $tugas, $klasifikasi, $depot, $tahun);
        $koef_kl = $a[0]->NILAI;

        //RITASE
        $jenis = "RIT";
        $a = $this->m_amt->getKoef($jenis, $tugas, $klasifikasi, $depot, $tahun);
        $koef_rit = $a[0]->NILAI;

        //SPBU
        $jenis = "SPBU";
        $a = $this->m_amt->getKoef($jenis, $tugas, $klasifikasi, $depot, $tahun);
        $koef_spbu = $a[0]->NILAI;

        $km = $this->input->post('total_km', true);
        $kl = $this->input->post('total_kl', true);
        $ritase = $this->input->post('ritase_amt', true);
        $spbu = $this->input->post('spbu', true);

        $pendapatan = ($koef_km * $km) + ($koef_kl * $kl) + ($koef_rit * $ritase) + ($koef_spbu * $spbu);

        $data = array(
            'status_tugas' => $tugas,
            'total_km' => $km,
            'total_kl' => $kl,
            'ritase_amt' => $ritase,
            'pendapatan' => $pendapatan,
            'spbu' => $spbu
        );
        $this->m_kinerja->editKinerjaAMT($data, $id_kinerja_amt);

        $link = base_url() . "amt/detail/" . $id_pegawai;
        echo '<script type="text/javascript">alert("Data berhasil diubah.");';
        echo 'window.location.href="' . $link . '"';
        echo '</script>';
    }

    public function tambah_kinerja() {
        $id_kinerja_amt = $this->input->post('id_kinerja_amt', true);
        $id_pegawai = $this->input->post('id_pegawai', true);

        $tugas = $this->input->post('status_tugas', true);
        $k = $this->m_amt->getKlasifikasi($id_pegawai);
        $klasifikasi = $k[0]->KLASIFIKASI;
        $depot = $this->session->userdata('id_depot');
        //$tahun = date('Y',  strtotime($this->input->post('tanggal_kinerja', true)));
        $tahun = 2013;

        //KM
        $jenis = "KM";
        $a = $this->m_amt->getKoef($jenis, $tugas, $klasifikasi, $depot, $tahun);
        $koef_km = $a[0]->NILAI;

        //KL
        $jenis = "KL";
        $a = $this->m_amt->getKoef($jenis, $tugas, $klasifikasi, $depot, $tahun);
        $koef_kl = $a[0]->NILAI;

        //RITASE
        $jenis = "RIT";
        $a = $this->m_amt->getKoef($jenis, $tugas, $klasifikasi, $depot, $tahun);
        $koef_rit = $a[0]->NILAI;

        //SPBU
        $jenis = "SPBU";
        $a = $this->m_amt->getKoef($jenis, $tugas, $klasifikasi, $depot, $tahun);
        $koef_spbu = $a[0]->NILAI;

        $km = $this->input->post('total_km', true);
        $kl = $this->input->post('total_kl', true);
        $ritase = $this->input->post('ritase_amt', true);
        $spbu = $this->input->post('spbu', true);

        $pendapatan = ($koef_km * $km) + ($koef_kl * $kl) + ($koef_rit * $ritase) + ($koef_spbu * $spbu);

        $tanggal = $this->input->post('tanggal_kinerja', true);
        $a = $this->m_log_harian->getIdLogHarianTanggal($tanggal, $depot);
        $id_log_harian = $a[0]->ID_LOG_HARIAN;
        $data = array(
            'id_log_harian' => $id_log_harian,
            'id_pegawai' => $id_pegawai,
            'status_tugas' => $tugas,
            'total_km' => $km,
            'total_kl' => $kl,
            'ritase_amt' => $ritase,
            'pendapatan' => $pendapatan,
            'spbu' => $spbu
        );
        $this->m_kinerja->insertKinerjaAMT($data, $id_kinerja_amt);

        $link = base_url() . "amt/detail/" . $id_pegawai;
        echo '<script type="text/javascript">alert("Data berhasil diubah.");';
        echo 'window.location.href="' . $link . '"';
        echo '</script>';
    }

    public function edit_pegawai($id_pegawai) {
        $config['upload_path'] = './assets/img/photo/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '200';
        $config['max_width'] = '1024';
        $config['max_height'] = '768';
        $nip = $this->input->post('nip', true);
        $config['file_name'] = $nip;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('userfile')) {
            $upload = $this->upload->data();
            $ext = $upload['file_ext'];
            $photo = $nip . $ext;
            echo $photo;
        } else {
            echo "file upload failed";
        }

        $id = $this->input->post('id', true);
        if (isset($photo)) {
            $data = array(
                'nip' => $this->input->post('nip', true),
                'nama_pegawai' => $this->input->post('nama_pegawai', true),
                'jabatan' => $this->input->post('jabatan', true),
                'klasifikasi' => $this->input->post('klasifikasi', true),
                'status' => $this->input->post('status', true),
                'no_telepon' => $this->input->post('no_telepon', true),
                'no_ktp' => $this->input->post('no_ktp', true),
                'no_sim' => $this->input->post('no_sim', true),
                'alamat' => $this->input->post('alamat', true),
                'tempat_lahir' => $this->input->post('tempat_lahir', true),
                'tanggal_lahir' => $this->input->post('tanggal_lahir', true),
                'transportir_asal' => $this->input->post('transportir_asal', true),
                'tanggal_masuk' => $this->input->post('tanggal_masuk', true),
                'photo' => $photo
            );
        } else {
            $data = array(
                'nip' => $this->input->post('nip', true),
                'nama_pegawai' => $this->input->post('nama_pegawai', true),
                'jabatan' => $this->input->post('jabatan', true),
                'klasifikasi' => $this->input->post('klasifikasi', true),
                'status' => $this->input->post('status', true),
                'no_telepon' => $this->input->post('no_telepon', true),
                'no_ktp' => $this->input->post('no_ktp', true),
                'no_sim' => $this->input->post('no_sim', true),
                'alamat' => $this->input->post('alamat', true),
                'tempat_lahir' => $this->input->post('tempat_lahir', true),
                'tanggal_lahir' => $this->input->post('tanggal_lahir', true),
                'transportir_asal' => $this->input->post('transportir_asal', true),
                'tanggal_masuk' => $this->input->post('tanggal_masuk', true)
            );
        }

        $this->m_amt->editPegawai($data, $id);
        $datalog = array(
            'keterangan' => 'Edit Pegawai, NIP : ' . $this->input->post('nip', true),
            'id_pegawai' => $this->session->userdata("id_pegawai"),
            'keyword' => 'EDIT'
        );
        $this->m_log_sistem->insertLog($datalog);
        $link = base_url() . "amt/detail/" . $id_pegawai;
        echo '<script type="text/javascript">alert("Data berhasil diubah.");';
        echo 'window.location.href="' . $link . '"';
        echo '</script>';
    }

    public function tambah_pegawai() {

        $depot = $this->session->userdata("id_depot");

        $config['upload_path'] = base_url() . 'assets/img/photo/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '200';
        $config['max_width'] = '1024';
        $config['max_height'] = '768';

        $this->load->library('upload', $config);

        if ($this->upload->do_upload()) {
            echo "file upload success";
        } else {
            echo "file upload failed";
        }
        $nip = $this->m_amt->cekNip($this->input->post('nip', true));
        print_r($nip);
        if (!$nip) {
            $data = array(
                'id_depot' => $depot,
                'nip' => $this->input->post('nip', true),
                'nama_pegawai' => $this->input->post('nama_pegawai', true),
                'jabatan' => $this->input->post('jabatan', true),
                'klasifikasi' => $this->input->post('klasifikasi', true),
                'status' => $this->input->post('status', true),
                'no_telepon' => $this->input->post('no_telepon', true),
                'no_ktp' => $this->input->post('no_ktp', true),
                'no_sim' => $this->input->post('no_sim', true),
                'alamat' => $this->input->post('alamat', true),
                'tempat_lahir' => $this->input->post('tempat_lahir', true),
                'tanggal_lahir' => $this->input->post('tanggal_lahir', true),
                'transportir_asal' => $this->input->post('transportir_asal', true),
                'tanggal_masuk' => $this->input->post('tanggal_masuk', true),
                'photo' => $this->input->post('photo', true),
            );

            $this->m_amt->insertPegawai($data);
            $datalog = array(
                'keterangan' => 'Tambah Pegawai, NIP : ' . $this->input->post('nip', true),
                'id_pegawai' => $this->session->userdata("id_pegawai"),
                'keyword' => 'Tambah'
            );
            $this->m_log_sistem->insertLog($datalog);
            $link = base_url() . "amt/data_amt/";
            echo '<script type="text/javascript">alert("Data berhasil ditambahkan.");';
            echo 'window.location.href="' . $link . '"';
            echo '</script>';
        } else {
            $link = base_url() . "amt/data_amt/";
            echo '<script type="text/javascript">alert("NIP sudah ada. Mohon untuk diganti.");';
            //echo 'window.location.href="' . $link . '"';
            echo '</script>';
        }
    }

    public function delete_pegawai($id_pegawai, $nip) {
        $datalog = array(
            'keterangan' => 'HAPUS Pegawai, NIP : ' . $this->input->post('nip', true),
            'id_pegawai' => $nip,
            'keyword' => 'HAPUS'
        );
        $this->m_log_sistem->insertLog($datalog);
        $this->m_amt->deletePegawai($id_pegawai);

        $link = base_url() . "amt/data_amt/";
        echo '<script type="text/javascript">alert("Data berhasil dihapus.");';
        echo 'window.location.href="' . $link . '"';
        echo '</script>';
    }

    public function import_amt() {
        $data['lv1'] = 2;
        $data['lv2'] = 1;
        $data2['amt'] = 0;
        $data2['error'] = "0";
        $data3 = menu_ss();
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu', $data3);
        $this->load->view('layouts/navbar', $data);
        $this->load->view('amt/v_import_amt', $data2);
        $this->load->view('layouts/footer');
    }

    public function import_xls() {

        $fileAMT = $_FILES['fileAMT'];
        $dir = './assets/file/';
        if (!file_exists($dir)) {
            mkdir($dir);
        }

        $file_target = $dir . $_FILES['fileAMT']['name'];
        move_uploaded_file($_FILES['fileAMT']['tmp_name'], $file_target);

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
        foreach ($loadedSheetNames as $sheetIndex => $loadedSheetName) {
            if ($loadedSheetName == 'AMT') {
                $objPHPExcel->setActiveSheetIndexByName($loadedSheetName);
                $sheetData = $objPHPExcel->getActiveSheet();
                $sheetData->getStyle('H3:H1000')
                        ->getNumberFormat()
                        ->setFormatCode('dd-mm-yyyy');
                $sheetData->getStyle('L3:L1000')
                        ->getNumberFormat()
                        ->setFormatCode('dd-mm-yyyy');
                $i = 0;
                $status = 0;
                while ($status == 0) {
                    $no = $i + 3;
                    $nip = $this->m_amt->cekNIP($sheetData->getCell('B' . $no)->getFormattedValue());
                    $error = "Error : ";
                    if (!$sheetData->getCell('B3')->getFormattedValue() && !$sheetData->getCell('C3')->getFormattedValue() && !$sheetData->getCell('D3')->getFormattedValue() && !$sheetData->getCell('E3')->getFormattedValue() && !$sheetData->getCell('F3')->getFormattedValue() && !$sheetData->getCell('G3')->getFormattedValue() && !$sheetData->getCell('H3')->getFormattedValue() && !$sheetData->getCell('I3')->getFormattedValue() && !$sheetData->getCell('J3')->getFormattedValue() && !$sheetData->getCell('K3')->getFormattedValue() && !$sheetData->getCell('L3')->getFormattedValue() && !$sheetData->getCell('M3')->getFormattedValue() && !$sheetData->getCell('N3')->getFormattedValue()) {
                        $status = 1;
                        $data['amt'] = 0;
                        break;
                    }
                    if ($sheetData->getCell('B' . $no)->getFormattedValue() == "") {
                        $error = $error . "NIP tidak boleh kosong,";
                        $e = 1;
                    } else if (sizeof($nip) != 0) {
                        $error = $error . "NIP telah ada";
                        $e = 1;
                    }

                    if ($sheetData->getCell('M' . $no)->getFormattedValue() != 8 && $sheetData->getCell('M' . $no)->getFormattedValue() != 16 && $sheetData->getCell('M' . $no)->getFormattedValue() != 24 && $sheetData->getCell('M' . $no)->getFormattedValue() != 32 && $sheetData->getCell('M' . $no)->getFormattedValue() != 40) {
                        $error = $error . " Klasifikasi harus 8/16/24/32/40 ,";
                        $e = 1;
                    }

                    if (strtoupper($sheetData->getCell('N' . $no)->getFormattedValue()) != "SUPIR" && strtoupper($sheetData->getCell('N' . $no)->getFormattedValue()) != "KERNET") {
                        $error = $error . " Jabatan hanya SUPIR atau KERNET ,";
                        $e = 1;
                    }

                    if ($error == "Error : ") {
                        $error = "Sukses";
                        $e = 0;
                    }

                    if ($i >= $sheetData->getHighestRow() - 3) {
                        $status = 1;
                        break;
                    }
                    $data2['amt'][$i] = array(
                        'nip' => $sheetData->getCell('B' . $no)->getFormattedValue(),
                        'id_depot' => $this->session->userdata('id_depot'),
                        'no_pekerja' => $sheetData->getCell('C' . $no)->getFormattedValue(),
                        'no_ktp' => $sheetData->getCell('D' . $no)->getFormattedValue(),
                        'no_sim' => $sheetData->getCell('E' . $no)->getFormattedValue(),
                        'nama_pegawai' => $sheetData->getCell('F' . $no)->getFormattedValue(),
                        'tempat_lahir' => $sheetData->getCell('G' . $no)->getFormattedValue(),
                        'tanggal_lahir' => $sheetData->getCell('H' . $no)->getFormattedValue(),
                        'alamat' => $sheetData->getCell('I' . $no)->getFormattedValue(),
                        'no_telepon' => $sheetData->getCell('J' . $no)->getFormattedValue(),
                        'transportir_asal' => $sheetData->getCell('K' . $no)->getFormattedValue(),
                        'tanggal_masuk' => $sheetData->getCell('L' . $no)->getFormattedValue(),
                        'klasifikasi' => $sheetData->getCell('M' . $no)->getFormattedValue(),
                        'jabatan' => strtoupper($sheetData->getCell('N' . $no)->getFormattedValue()),
                        'status' => 'AKTIF',
                        'status_error' => $error,
                        'error' => $e
                    );
                    $i++;
                    if (!$sheetData->getCell('B' . ($no + 1))->getFormattedValue() && !$sheetData->getCell('C' . ($no + 1))->getFormattedValue() && !$sheetData->getCell('D' . ($no + 1))->getFormattedValue() && !$sheetData->getCell('E' . ($no + 1))->getFormattedValue() && !$sheetData->getCell('F' . ($no + 1))->getFormattedValue() && !$sheetData->getCell('G' . ($no + 1))->getFormattedValue() && !$sheetData->getCell('H' . ($no + 1))->getFormattedValue() && !$sheetData->getCell('I' . ($no + 1))->getFormattedValue() && !$sheetData->getCell('J' . ($no + 1))->getFormattedValue() && !$sheetData->getCell('K' . ($no + 1))->getFormattedValue() && !$sheetData->getCell('L' . ($no + 1))->getFormattedValue() && !$sheetData->getCell('M' . ($no + 1))->getFormattedValue() && !$sheetData->getCell('N' . ($no + 1))->getFormattedValue()) {
                        $status = 1;
                    }
                }
            }
            $data['error'] = 0;
        }

        unlink($file_target);
        $data['lv1'] = 2;
        $data['lv2'] = 1;
        $data3 = menu_ss();
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu', $data3);
        $this->load->view('layouts/navbar', $data);
        $this->load->view('amt/v_import_amt', $data2);
        $this->load->view('layouts/footer');
    }

    public function simpan_xls() {
        $data_amt = unserialize($this->input->post('data_amt'));
        $this->m_amt->importPegawai($data_amt);

        $datalog = array(
            'keterangan' => 'Import data pegawai',
            'id_pegawai' => $this->session->userdata("id_pegawai"),
            'keyword' => 'Tambah'
        );
        $this->m_log_sistem->insertLog($datalog);

        $link = base_url() . "amt/";
        echo '<script type="text/javascript">alert("Data berhasil ditambahkan.");';
        echo 'window.location.href="' . $link . '"';
        echo '</script>';
    }

    public function presensi() {
        $data['lv1'] = 2;
        $data['lv2'] = 3;
        $data2['presensi'] = 0;

        $depot = $this->session->userdata('id_depot');
        $tanggal = date('Y-m-d');
        $data2['tanggal'] = $tanggal;
        $data2['presensi'] = $this->m_penjadwalan->getPresensiAMT($depot, $tanggal);
        $this->load->model("m_kinerja");
        $data2['kinerja'] = $this->m_kinerja->getKinerjaPresensi($tanggal);

        $data3 = menu_ss();
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu', $data3);
        $this->load->view('layouts/navbar', $data);
        $this->load->view('amt/v_presensi', $data2);
        $this->load->view('layouts/footer');
    }

    public function presensi_pertanggal() {
        $data['lv1'] = 2;
        $data['lv2'] = 3;
        $depot = $this->session->userdata('id_depot');
        $tanggal = $this->input->get('tanggal', true);
        $data2['tanggal'] = $tanggal;
        $data2['presensi'] = $this->m_penjadwalan->getPresensiAMT($depot, $tanggal);

        $this->load->model("m_kinerja");
        $data2['kinerja'] = $this->m_kinerja->getKinerjaPresensi($tanggal);
        $data3 = menu_ss();
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu', $data3);
        $this->load->view('layouts/navbar', $data);
        $this->load->view('amt/v_presensi', $data2);
        $this->load->view('layouts/footer');
    }

    public function ubah_presensi() {
        $id_jadwal = $this->input->post('id_jadwal', true);
        $nip = $this->input->post('nip', true);
        $data = array(
            'alasan' => $this->input->post('alasan', true),
            'keterangan_masuk' => $this->input->post('keterangan_masuk', true)
        );
        $tanggal = $this->input->post('tanggal_log_harian', true);

        $this->m_penjadwalan->updateJadwal($data, $id_jadwal);

        $datalog = array(
            'keterangan' => "Ubah presensi NIP : $nip pada $tanggal",
            'id_pegawai' => $this->session->userdata("id_pegawai"),
            'keyword' => 'Edit'
        );
        $this->m_log_sistem->insertLog($datalog);
        $depot = $this->session->userdata('id_depot');
        //cek apakah jadwal dan kinerja sudah sesuai
        $jadwal = $this->m_penjadwalan->getPresensiAMT($depot, $tanggal);
        $this->load->model("m_kinerja");
        $kinerja = $this->m_kinerja->getKinerjaPresensi($tanggal);
        foreach ($jadwal as $row) {
            foreach ($kinerja as $row2) {
                if ($row->ID_PEGAWAI == $row2->ID_PEGAWAI) {
                    if ($row->KETERANGAN_MASUK != '') {
                        //status log_harian.status_presensi_amt jadikan 1
                        $data = array(
                            'status_presensi_amt' => 1
                        );

                        $this->m_log_harian->updateStatusPresensiAMT($depot, $tanggal, $data);
                    }
                }
            }
        }


        $link = base_url() . "amt/presensi_pertanggal/?tanggal=" . $tanggal;
        echo '<script type="text/javascript">alert("Data berhasil diubah.");';
        //echo 'window.location.href="' . $link . '"';
        echo '</script>';
    }

    public function koefisien() {
        $data['lv1'] = 2;
        $data['lv2'] = 4;
        $tahun = date('Y');
        $depot = $this->session->userdata("id_depot");
        $data2['koefisien'] = $this->m_amt->getKoefisien($depot, $tahun);
        $data2['tahun'] = $tahun;
        $data3 = menu_ss();
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu', $data3);
        $this->load->view('layouts/navbar', $data);
        $this->load->view('amt/v_koefisien', $data2);
        $this->load->view('layouts/footer');
    }

    public function cek_koefisien() {
        $data['lv1'] = 2;
        $data['lv2'] = 4;
        $tahun = $this->input->get('tahun', true);
        $depot = $this->session->userdata("id_depot");
        $data2['tahun'] = $tahun;
        $data2['koefisien'] = $this->m_amt->getKoefisien($depot, $tahun);
        $data3 = menu_ss();
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu', $data3);
        $this->load->view('layouts/navbar', $data);
        $this->load->view('amt/v_koefisien', $data2);
        $this->load->view('layouts/footer');
    }

    public function import_koefisien() {
        $data['lv1'] = 2;
        $data['lv2'] = 4;
        $data3 = menu_ss();
        $data3 = menu_ss();

        $data2['error'] = 0;
        $data2['koefisien'] = 0;
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu', $data3);
        $this->load->view('layouts/navbar', $data);
        $this->load->view('amt/v_import_koefisien', $data2);
        $this->load->view('layouts/footer');
    }

    public function import_koefisien_xls() {
        $tahun = $this->input->post('tahun', true);
        $depot = $this->session->userdata('id_depot');

        $data2['koefisien'] = 0;
        $cek = $this->m_amt->getKoefisien($depot, $tahun);
        if ($cek) {
            $data2['error'] = "Data koefisien tahun $tahun telah tersedia";
        } else if (!$cek) {
            $fileAMT = $_FILES['fileKoef'];
            $dir = './assets/file/';
            if (!file_exists($dir)) {
                mkdir($dir);
            }

            $file_target = $dir . $_FILES['fileKoef']['name'];
            move_uploaded_file($_FILES['fileKoef']['tmp_name'], $file_target);

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
            foreach ($loadedSheetNames as $sheetIndex => $loadedSheetName) {
                if ($loadedSheetName == 'KOEFISIEN') {
                    $objPHPExcel->setActiveSheetIndexByName($loadedSheetName);
                    $sheetData = $objPHPExcel->getActiveSheet();
                    $i = 0;
                    $status = 0;
                    while ($status == 0) {
                        $no = $i + 2;
                        $error = "Error : ";
                        if (!$sheetData->getCell('B3')->getFormattedValue() && !$sheetData->getCell('C3')->getFormattedValue() && !$sheetData->getCell('D3')->getFormattedValue() && !$sheetData->getCell('E3')->getFormattedValue() && !$sheetData->getCell('F3')->getFormattedValue() && !$sheetData->getCell('G3')->getFormattedValue() && !$sheetData->getCell('H3')->getFormattedValue() && !$sheetData->getCell('I3')->getFormattedValue() && !$sheetData->getCell('J3')->getFormattedValue() && !$sheetData->getCell('K3')->getFormattedValue() && !$sheetData->getCell('L3')->getFormattedValue() && !$sheetData->getCell('M3')->getFormattedValue() && !$sheetData->getCell('N3')->getFormattedValue()) {
                            $status = 1;
                            $data['amt'] = 0;
                            break;
                        }
                        if (!is_numeric($sheetData->getCell('C' . $no)->getFormattedValue()) && !is_numeric($sheetData->getCell('D' . $no)->getFormattedValue()) && !is_numeric($sheetData->getCell('E' . $no)->getFormattedValue()) && !is_numeric($sheetData->getCell('F' . $no)->getFormattedValue())) {
                            $error = "Isi harus berupa angka";
                            $e = 1;
                        }
                        if ($error == "Error : ") {
                            $error = "Sukses";
                            $e = 0;
                        }

                        if ($i >= $sheetData->getHighestRow() - 3) {
                            $status = 1;
                            break;
                        }
                        $id_log_harian = $this->m_log_harian->getIdLogHarian($tahun, $depot);
                        //koefisien KM
                        $data2['koefisien'][($i * 4) + 0] = array(
                            'id_log_harian' => $id_log_harian[0]->ID_LOG_HARIAN,
                            'id_jenis_penilaian' => 25 + ($i * 4),
                            'jenis_jabatan' => $sheetData->getCell('B' . $no)->getFormattedValue(),
                            'nilai' => $sheetData->getCell('C' . $no)->getFormattedValue(),
                            'status_error' => $error,
                            'error' => $e
                        );

                        //koefisien KL
                        $data2['koefisien'][($i * 4) + 1] = array(
                            'id_log_harian' => $id_log_harian[0]->ID_LOG_HARIAN,
                            'id_jenis_penilaian' => 26 + ($i * 4),
                            'jenis_jabatan' => $sheetData->getCell('B' . $no)->getFormattedValue(),
                            'nilai' => $sheetData->getCell('C' . $no)->getFormattedValue(),
                            'status_error' => $error,
                            'error' => $e
                        );

                        //koefisien Ritase
                        $data2['koefisien'][($i * 4) + 2] = array(
                            'id_log_harian' => $id_log_harian[0]->ID_LOG_HARIAN,
                            'id_jenis_penilaian' => 27 + ($i * 4),
                            'jenis_jabatan' => $sheetData->getCell('B' . $no)->getFormattedValue(),
                            'nilai' => $sheetData->getCell('C' . $no)->getFormattedValue(),
                            'status_error' => $error,
                            'error' => $e
                        );

                        //koefisien SPBU
                        $data2['koefisien'][($i * 4) + 3] = array(
                            'id_log_harian' => $id_log_harian[0]->ID_LOG_HARIAN,
                            'id_jenis_penilaian' => 28 + ($i * 4),
                            'jenis_jabatan' => $sheetData->getCell('B' . $no)->getFormattedValue(),
                            'nilai' => $sheetData->getCell('C' . $no)->getFormattedValue(),
                            'status_error' => $error,
                            'error' => $e
                        );
                        $i++;
                        if (!$sheetData->getCell('B' . ($no + 1))->getFormattedValue() && !$sheetData->getCell('C' . ($no + 1))->getFormattedValue() && !$sheetData->getCell('D' . ($no + 1))->getFormattedValue() && !$sheetData->getCell('E' . ($no + 1))->getFormattedValue() && !$sheetData->getCell('F' . ($no + 1))->getFormattedValue() && !$sheetData->getCell('G' . ($no + 1))->getFormattedValue() && !$sheetData->getCell('H' . ($no + 1))->getFormattedValue() && !$sheetData->getCell('I' . ($no + 1))->getFormattedValue() && !$sheetData->getCell('J' . ($no + 1))->getFormattedValue() && !$sheetData->getCell('K' . ($no + 1))->getFormattedValue() && !$sheetData->getCell('L' . ($no + 1))->getFormattedValue() && !$sheetData->getCell('M' . ($no + 1))->getFormattedValue() && !$sheetData->getCell('N' . ($no + 1))->getFormattedValue()) {
                            $status = 1;
                        }
                    }
                }
                $data['error'] = 0;
                $data2['error'] = 0;
            }
            unlink($file_target);
        }
        $data['lv1'] = 2;
        $data['lv2'] = 4;
        $data3 = menu_ss();
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu', $data3);
        $this->load->view('layouts/navbar', $data);
        $this->load->view('amt/v_import_koefisien', $data2);
        $this->load->view('layouts/footer');
    }

    public function simpan_koefisien() {
        $data_koef = unserialize($this->input->post('data'));
        $this->m_amt->importKoefisien($data_koef);

        $datalog = array(
            'keterangan' => 'Import Koefisien',
            'id_pegawai' => $this->session->userdata("id_pegawai"),
            'keyword' => 'Tambah'
        );
        $this->m_log_sistem->insertLog($datalog);

        $link = base_url() . "amt/koefisien/";
        echo '<script type="text/javascript">alert("Data berhasil ditambahkan.");';
        echo 'window.location.href="' . $link . '"';
        echo '</script>';
    }

    //grafik
    public function amt_depot($depot, $nama, $tahun) {

        $data['lv1'] = 2;
        $data['lv2'] = 2;
        $data2['tahun'] = $tahun;
        $data2['total_mt'] = $this->m_mt->getTotalMtByDepot($depot);
        $data2['total_amt'] = $this->m_amt->getTotalAMtByDepot($depot);
        $data2['nama_depot'] = str_replace('%20', ' ', $nama);
        $data2['rencana_bulan'] = $this->m_rencana->get_rencana_bulan($depot, date("n"), date("Y"));
        $data2['kinerja_bulan'] = $this->m_kinerja->get_kinerja_bulan($depot, date("n"), date("Y"));
        $data2['amt'] = $this->m_amt->selectAMT($depot);
        $data2['kinerja_amt'] = $this->m_kinerja->get_kinerja_amt_bulan($depot, $tahun);
        $data2['id_depot'] = $depot;
        $data3 = menu_ss();
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu', $data3);
        $this->load->view('layouts/navbar', $data);
        $this->load->view('amt/v_grafik_amt', $data2);
        $this->load->view('layouts/footer');
    }

    public function amt_depot_harian($depot, $nama, $bulan, $tahun) {
        $data['lv1'] = 2;
        $data['lv2'] = 2;
        $data2['nama_depot'] = str_replace('%20', ' ', $nama);
        $data2['kinerja_amt'] = $this->m_kinerja->get_kinerja_amt_hari($depot, $bulan, $tahun);
        $data2['id_depot'] = $depot;
        $data2['tahun'] = $tahun;
        $data2['bulan'] = $bulan;

        $data3 = menu_ss();
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu', $data3);
        $this->load->view('layouts/navbar', $data);
        $this->load->view('amt/v_grafik_amt_harian', $data2);
        $this->load->view('layouts/footer');
    }

    public function ganti_detail_amt($depot, $nama) {
        $tanggal = date("Y-m-d", strtotime($_POST['tanggal']));
        redirect("amt/amt_depot_detail/" . $depot . "/" . $nama . "/" . $tanggal . "/");
    }

    public function amt_depot_detail($depot, $nama, $tanggal) {
        $data['lv1'] = $depot + 1;
        $data['lv2'] = 1;
        $data2['nama_depot'] = str_replace('%20', ' ', $nama);
        $data2['id_depot'] = $depot;
        $data2['hari'] = date('d', strtotime($tanggal));
        $data2['bulan'] = date('F', strtotime($tanggal));
        $data2['tahun'] = date('Y', strtotime($tanggal));
        ;
        $data2['tanggal'] = date("d F Y", strtotime($tanggal));
        $data2['kinerja'] = $this->m_kinerja->get_kinerja_amt_detail($depot, $tanggal);
        $data3 = menu_oam();
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu', $data3);
        $this->navbar($data['lv1'], $data['lv2']);
        $this->load->view('amt/v_grafik_amt_detail', $data2);
        $this->load->view('layouts/footer');
    }

    public function detail_hari($id_pegawai, $bulan) {
        $tanggal = $_POST['bulan'];
        $bulan = date('n', strtotime($tanggal));
        $tahun = date('Y', strtotime($tanggal));
        redirect('amt/detail/' . $id_pegawai . "/" . $bulan . "/" . $tahun);
    }

    public function amt_hari($depot, $nama) {
        $tanggal = $_POST['bulan'];
        $bulan = date('n', strtotime($tanggal));
        $tahun = date('Y', strtotime($tanggal));
        redirect('amt/amt_depot_harian/' . $depot . "/" . $nama . "/" . $bulan . "/" . $tahun);
    }

    public function grafik() {
        $depot = $this->session->userdata("id_depot");
        $tahun = date('Y');
        $nama = 'TEGAL';
        $this->amt_depot($depot, $nama, $tahun);
//        $data['lv1'] = 2;
//        $data['lv2'] = 2;
//        $data3 = menu_ss();
//        $this->load->view('layouts/header');
//        $this->load->view('layouts/menu', $data3);
//        $this->load->view('layouts/navbar', $data);
//        $this->load->view('amt/v_grafik');
//        $this->load->view('layouts/footer');
    }

    public function grafik_bulan() {
        $data['lv1'] = 2;
        $data['lv2'] = 2;
        $data3 = menu_ss();
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu', $data3);
        $this->load->view('layouts/navbar', $data);
        $this->load->view('amt/v_grafik_bulan');
        $this->load->view('layouts/footer');
    }

    public function grafik_hari() {
        $data['lv1'] = 2;
        $data['lv2'] = 2;
        $data3 = menu_ss();
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu', $data3);
        $this->load->view('layouts/navbar', $data);
        $this->load->view('amt/v_grafik_hari');
        $this->load->view('layouts/footer');
    }

    //OAM
    public function oam_bulanan() {
        $data['lv1'] = 1;
        $data['lv2'] = 1;
        $data3 = menu_ss();
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu', $data3);
        $this->load->view('layouts/navbar_oam', $data);
        $this->load->view('oam/v_grafik_amt_bulan');
        $this->load->view('layouts/footer');
    }

    public function oam_harian() {
        $data['lv1'] = 1;
        $data['lv2'] = 1;
        $data3 = menu_ss();
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu', $data3);
        $this->load->view('layouts/navbar_oam', $data);
        $this->load->view('oam/v_grafik_amt_hari');
        $this->load->view('layouts/footer');
    }

}
