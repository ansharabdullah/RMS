<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class amt extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model("m_amt");
        $this->load->model("m_log_sistem");
        $this->load->model("m_peringatan");
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
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->load->view('layouts/navbar', $data);
        $this->load->view('amt/v_data_amt', $data1);
        $this->load->view('layouts/footer');
    }

    public function detail($id_pegawai) {
        $data['lv1'] = 2;
        $data['lv2'] = 1;
        $data1['amt'] = $this->m_amt->detailAMT($id_pegawai);
        $data1['grafik']= 0;
        $data1['kinerja']= 0;
        $data1['peringatan'] = $this->m_peringatan->getPeringatan($id_pegawai);
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->load->view('layouts/navbar', $data);
        $this->load->view('amt/v_detail', $data1);
        $this->load->view('layouts/footer');
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

        $data = array(
            'depot' => $depot,
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
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
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
                //echo $sheetIndex, ' -> ', $loadedSheetName, '<br />';
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
                    
                    if ($sheetData->getCell('B' . $no)->getFormattedValue() == "") {
                        $error = $error . "NIP tidak boleh kosong";
                        $e = 1;
                    } else if (sizeof($nip) != 0) {
                        $error = $error . "NIP telah ada";
                        $e = 1;
                    }

                    if ($sheetData->getCell('M' . $no)->getFormattedValue() != 8 && $sheetData->getCell('M' . $no)->getFormattedValue() != 16 && $sheetData->getCell('M' . $no)->getFormattedValue() != 24 && $sheetData->getCell('M' . $no)->getFormattedValue() != 32 && $sheetData->getCell('M' . $no)->getFormattedValue() != 40) {
                        $error = $error . ", Klasifikasi harus 8/16/24/32/40 ";
                        $e = 1;
                    }

                    if (strtoupper($sheetData->getCell('N' . $no)->getFormattedValue()) != "SUPIR" && strtoupper($sheetData->getCell('N' . $no)->getFormattedValue()) != "KERNET") {
                        $error = $error . ", Kabatan hanya SUPIR atau KERNET ";
                        $e = 1;
                    }
                    
                    if ($error == "Error : ") {
                        $error = "Sukses";
                        $e = 0;
                    }
                    
                    if ($i >= $sheetData->getHighestRow() - 4) {
                        $status = 1;
                        break;
                    }
                    if ($sheetData->getCell('A' . $no)->getFormattedValue() == '') {
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
                }
                //echo $sheetData;
            }
        }
        unlink($file_target);
        $data['lv1'] = 2;
        $data['lv2'] = 1;
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->load->view('layouts/navbar', $data);
        $this->load->view('amt/v_import_amt', $data2);
        $this->load->view('layouts/footer');
    }

    public function simpan_xls() {
        $data_amt = unserialize($this->input->post('data_amt'));
        $this->m_amt->importPegawai($data_amt);

        $link = base_url() . "amt/";
        echo '<script type="text/javascript">alert("Data berhasil ditambahkan.");';
        echo 'window.location.href="' . $link . '"';
        echo '</script>';
    }

    public function presensi() {
        $data['lv1'] = 2;
        $data['lv2'] = 3;

        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->load->view('layouts/navbar', $data);
        $this->load->view('amt/v_presensi');
        $this->load->view('layouts/footer');
    }

    public function koefisien() {
        $data['lv1'] = 2;
        $data['lv2'] = 4;

        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->load->view('layouts/navbar', $data);
        $this->load->view('amt/v_koefisien');
        $this->load->view('layouts/footer');
    }

    public function grafik() {
        $data['lv1'] = 2;
        $data['lv2'] = 2;
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->load->view('layouts/navbar', $data);
        $this->load->view('amt/v_grafik');
        $this->load->view('layouts/footer');
    }

    public function grafik_bulan() {
        $data['lv1'] = 2;
        $data['lv2'] = 2;
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->load->view('layouts/navbar', $data);
        $this->load->view('amt/v_grafik_bulan');
        $this->load->view('layouts/footer');
    }

    public function grafik_hari() {
        $data['lv1'] = 2;
        $data['lv2'] = 2;
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->load->view('layouts/navbar', $data);
        $this->load->view('amt/v_grafik_hari');
        $this->load->view('layouts/footer');
    }

    //OAM
    public function oam_bulanan() {
        $data['lv1'] = 1;
        $data['lv2'] = 1;
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->load->view('layouts/navbar_oam', $data);
        $this->load->view('oam/v_grafik_amt_bulan');
        $this->load->view('layouts/footer');
    }

    public function oam_harian() {
        $data['lv1'] = 1;
        $data['lv2'] = 1;
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->load->view('layouts/navbar_oam', $data);
        $this->load->view('oam/v_grafik_amt_hari');
        $this->load->view('layouts/footer');
    }

}
