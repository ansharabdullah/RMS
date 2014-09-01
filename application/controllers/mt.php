<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mt extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model("m_mt");
        $this->load->model("m_grafik_mt");
        $this->load->model("m_pengingat");
        $this->load->model("m_log_sistem");
        $this->load->helper(array('form', 'url'));
    }

    public function index() {
        $this->data_mt();

    }
    
    //Import Excel
    
    public function simpan_xls() {
        $data_mt = unserialize($this->input->post('data_mt'));
        $this->m_mt->importMobil($data_mt);

        $link = base_url() . "mt/data_mt";
        echo '<script type="text/javascript">alert("Data berhasil ditambahkan.");';
        echo 'window.location.href="' . $link . '"';
        echo '</script>';
    }
    
     public function simpan_rencana() {
        $data_rencana = unserialize($this->input->post('data_rencana'));
        $this->m_mt->importRencana($data_rencana);

        $link = base_url() . "mt/v_rencana_manual";
        echo '<script type="text/javascript">alert("Data berhasil ditambahkan.");';
        echo 'window.location.href="' . $link . '"';
        echo '</script>';
    }
    
    public function import_xls_rencana() {

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
            
            $data2 = array();
            
            foreach ($loadedSheetNames as $sheetIndex => $loadedSheetName) {
                if ($loadedSheetName == 'RENCANA') {
                    //echo $sheetIndex, ' -> ', $loadedSheetName, '<br />';
                    $objPHPExcel->setActiveSheetIndexByName($loadedSheetName);
                    $sheetData = $objPHPExcel->getActiveSheet();
                    $sheetData->getStyle('H3:H1000')
                        ->getNumberFormat()
                        ->setFormatCode('dd-mm-yyyy');
					$sheetData->getStyle('L3:L1000')
                        ->getNumberFormat()
                        ->setFormatCode('dd-mm-yyyy');
					
		$i=0;
		$status=0;
                    while ($status==0) {
			$no = $i + 2;
			$tanggal=$this->m_mt->ambilTanggal($sheetData->getCell('B' . $no)->getFormattedValue());
			$error ="Error:";
						
                    if (!$sheetData->getCell('B2')->getFormattedValue() && !$sheetData->getCell('C2')->getFormattedValue() && !$sheetData->getCell('D2')->getFormattedValue() && !$sheetData->getCell('E2')->getFormattedValue() && !$sheetData->getCell('F2')->getFormattedValue() && !$sheetData->getCell('G2')->getFormattedValue() && !$sheetData->getCell('H2')->getFormattedValue() && !$sheetData->getCell('I2')->getFormattedValue()){
                        $status= 1;
			$data['mt']=0;
			break;
			}
			if ($sheetData->getCell('B' . $no)->getFormattedValue() == "") {
                        $error = $error . "Tanggal Tidak Boleh Kosong";
                        $e = 1;
                    }
                    else if (sizeof($tanggal) != 0) {
                        $error = $error . "Tanggal telah ada";
                        $e = 1;
                    }
                    if ($error == "Error : ") {
                        $error = "Sukses";
                        $e = 0;
                    }
                    if ($i >= $sheetData->getHighestRow() - 2) {
                        $status = 1;
                        break;
                    }
                    $e=0;
		$data2['mt'][$i] = array(
                        'tanggal_log_harian' => $sheetData->getCell('B' . $no)->getFormattedValue(),
                        'r_own_use' => $sheetData->getCell('C' . $no)->getFormattedValue(),
                        'r_premium' => $sheetData->getCell('D' . $no)->getFormattedValue(),
                        'r_pertamax' => $sheetData->getCell('E' . $no)->getFormattedValue(),
                        'r_pertamaxplus' => $sheetData->getCell('F' . $no)->getFormattedValue(),
                        'r_pertaminadex' => $sheetData->getCell('G' . $no)->getFormattedValue(),
                        'r_solar' => $sheetData->getCell('H' . $no)->getFormattedValue(),
                        'r_biosolar' => $sheetData->getCell('I' . $no)->getFormattedValue(),
                        'status_error' => $error,
                        'error' => $e,
			);
					$i++;
                    if (!$sheetData->getCell('B' . ($no + 1))->getFormattedValue() && !$sheetData->getCell('C' . ($no + 1))->getFormattedValue() && !$sheetData->getCell('D' . ($no + 1))->getFormattedValue() && !$sheetData->getCell('E' . ($no + 1))->getFormattedValue() && !$sheetData->getCell('F' . ($no + 1))->getFormattedValue() && !$sheetData->getCell('G' . ($no + 1))->getFormattedValue() && !$sheetData->getCell('H' . ($no + 1))->getFormattedValue() && !$sheetData->getCell('I' . ($no + 1))->getFormattedValue()) {
                        $status = 1;
				} 
                    }
		}
	$data['error'] = 0;
	}
            unlink($file_target);

            $data['lv1'] = 3;
            $data['lv2'] = 5;
            $this->load->view('layouts/header');
            $this->load->view('layouts/menu');
            $this->load->view('layouts/navbar', $data);
            $this->load->view('mt/v_rencana', $data2);
            $this->load->view('layouts/footer');
        
    }
    
    public function manual($id_log_harian) {
        
       
        $data2['id_log_harian'] =  $id_log_harian;
        $data2['mt'] = $this->m_mt->getRencana($id_log_harian);
        $data2['KLIK_SIMPAN'] = false;

        $data['lv1'] = 3;
        $data['lv2'] = 5;
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->load->view('layouts/navbar', $data);
        $this->load->view('mt/v_rencana_manual', $data2);
        $this->load->view('layouts/footer');
    }
    
//data MT
    
    public function data_mt() {

        $data3 = $this->m_mt->Nopol();
        $nopol =array();
        $jumlahbaris=0;
        foreach ($data3 as $row){
            $nopol[]= $row->NOPOL;
            $jumlahbaris++;
        }
        
        $depot = $this->session->userdata('id_depot');
        $data1['mt'] = $this->m_mt->selectMT($depot);

        $mt = $data1['mt']; 
        
        $data['lv1'] = 3;
        $data['lv2'] = 1;
        $this->header($data);
        $this->load->view('mt/v_data_mt', array('mt' => $mt, 'nopolcek' => $nopol, 'jumlahbaris' => $jumlahbaris));
        $this->footer();
    }
    
    public function tambah_mobil() {
        
        
        $depot = $this->session->userdata("id_depot");

        $data = array(
            'id_depot' => $depot,
            'nopol' => $this->input->post('nopol', true),
            'kapasitas' => $this->input->post('kapasitas', true),
            'produk' => $this->input->post('produk', true),
            'transportir' => $this->input->post('transportir', true),
            'status_mobil' => $this->input->post('status_mobil', true),
            'no_mesin' => $this->input->post('no_mesin', true),
            'no_rangka' => $this->input->post('no_rangka', true),
            'jenis_kendaraan' => $this->input->post('jenis_kendaraan', true),
            'rasio' => $this->input->post('rasio', true),
            'jenis_tangki' => $this->input->post('jenis_tangki', true),
            'gps' => $this->input->post('gps', true),
            'sensor_overfill' => $this->input->post('sensor_overfill', true),
            'standar_volume' => $this->input->post('standar_volume', true),
            'volume_1' => $this->input->post('volume_1', true),
            'kategori_mobil' => $this->input->post('kategori_mobil', true),
            'jumlah_segel' => $this->input->post('jumlah_segel', true),
            'rk1_komp1' => $this->input->post('rk1_komp1', true),
            'rk1_komp2' => $this->input->post('rk1_komp2', true),
            'rk1_komp3' => $this->input->post('rk1_komp3', true),
            'rk1_komp4' => $this->input->post('rk1_komp4', true),
            'rk1_komp5' => $this->input->post('rk1_komp5', true),
            'rk1_komp6' => $this->input->post('rk1_komp6', true),
            'rk2_komp1' => $this->input->post('rk2_komp1', true),
            'rk2_komp2' => $this->input->post('rk2_komp2', true),
            'rk2_komp3' => $this->input->post('rk2_komp3', true),
            'rk2_komp4' => $this->input->post('rk2_komp4', true),
            'rk2_komp5' => $this->input->post('rk2_komp5', true),
            'rk2_komp6' => $this->input->post('rk2_komp6', true),
             'k_komp1' => $this->input->post('k1_komp1', true),
            'k_komp2' => $this->input->post('k1_komp2', true),
            'k_komp3' => $this->input->post('k1_komp3', true),
            'k_komp4' => $this->input->post('k1_komp4', true),
            'k_komp5' => $this->input->post('k1_komp5', true),
            'k_komp6' => $this->input->post('k1_komp6', true),
        );

        $this->m_mt->insertMobil($data);
        $link = base_url() . "mt/data_mt/";
        echo '<script type="text/javascript">alert("Data berhasil ditambahkan.");';
        echo 'window.location.href="' . $link . '"';
        echo '</script>';
    }


    public function detail_mt($id_mobil) {

        $data['lv1'] = 3;
        $data['lv2'] = 1;
        $data1['mt'] = $this->m_mt->detailMT($id_mobil);
        $data1['kinerja'] = $this->m_mt->selectKinerjaMT($id_mobil);
        $this->header($data);
        $this->load->view('mt/v_detail_mt', $data1);
        $this->footer();
    }


    public function edit_mobil($id_mobil) {

       
        
        $id = $this->input->post('id', true);
        $data = array(
            'nopol' => $this->input->post('nopol', true),
            'kapasitas' => $this->input->post('kapasitas', true),
            'produk' => $this->input->post('produk', true),
            'transportir' => $this->input->post('transportir', true),
            'status_mobil' => $this->input->post('status_mobil', true),
            'no_mesin' => $this->input->post('no_mesin', true),
            'no_rangka' => $this->input->post('no_rangka', true),
            'jenis_kendaraan' => $this->input->post('jenis_kendaraan', true),
            'rasio' => $this->input->post('rasio', true),
            'jenis_tangki' => $this->input->post('jenis_tangki', true),
            'gps' => $this->input->post('gps', true),
            'sensor_overfill' => $this->input->post('sensor_overfill', true),
            'standar_volume' => $this->input->post('standar_volume', true),
            'volume_1' => $this->input->post('volume_1', true),
            'kategori_mobil' => $this->input->post('kategori_mobil', true),
            'jumlah_segel' => $this->input->post('jumlah_segel', true),
            'rk1_komp1' => $this->input->post('rk1_komp1', true),
            'rk1_komp2' => $this->input->post('rk1_komp2', true),
            'rk1_komp3' => $this->input->post('rk1_komp3', true),
            'rk1_komp4' => $this->input->post('rk1_komp4', true),
            'rk1_komp5' => $this->input->post('rk1_komp5', true),
            'rk1_komp6' => $this->input->post('rk1_komp6', true),
            'rk2_komp1' => $this->input->post('rk2_komp1', true),
            'rk2_komp2' => $this->input->post('rk2_komp2', true),
            'rk2_komp3' => $this->input->post('rk2_komp3', true),
            'rk2_komp4' => $this->input->post('rk2_komp4', true),
            'rk2_komp5' => $this->input->post('rk2_komp5', true),
            'rk2_komp6' => $this->input->post('rk2_komp6', true),
             'k_komp1' => $this->input->post('k1_komp1', true),
            'k_komp2' => $this->input->post('k1_komp2', true),
            'k_komp3' => $this->input->post('k1_komp3', true),
            'k_komp4' => $this->input->post('k1_komp4', true),
            'k_komp5' => $this->input->post('k1_komp5', true),
            'k_komp6' => $this->input->post('k1_komp6', true),
        );
        $this->m_mt->editMT($data, $id);
        
         $link = base_url()."mt/detail_mt/".$id_mobil;
        echo '<script type="text/javascript">alert("Data berhasil diubah.");';
        echo 'window.location.href="' . $link . '"';
        echo '</script>';
        
    }
    
    public function delete_mobil($id_mobil){
        $this->m_mt->deleteMT($id_mobil);
        
        $link = base_url()."mt/data_mt/";
        echo '<script type="text/javascript">alert("Data berhasil dihapus.");';
        echo 'window.location.href="' . $link . '"';
        echo '</script>';
    }
    
    public function delete_kinerja($id_kinerja_mt,$id_mobil){
        
        
        $this->m_mt->deleteKinerja($id_kinerja_mt);
        
        $link = base_url()."mt/detail_mt/".$id_mobil;
        echo '<script type="text/javascript">alert("Data berhasil dihapus.");';
        echo 'window.location.href="' . $link . '"';
        echo '</script>';
    }
    
//Import MT
    public function import_mt() {

        $data['lv1'] = 3;
        $data['lv2'] = 1;
        $data2['mt'] = 0;
        $data2['error'] = "0";
        $this->header($data);
        $this->load->view('mt/v_import_mt',$data2);
        $this->footer();
    }
    
    public function import_xls_mt() {

        $fileMT = $_FILES['fileMT'];
        $dir = './assets/file/';
        if (!file_exists($dir)) {
            mkdir($dir);
        }

        $file_target = $dir . $_FILES['fileMT']['name'];
        move_uploaded_file($_FILES['fileMT']['tmp_name'], $file_target);

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
            if ($loadedSheetName == 'MT') {
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
                    $nopol = $this->m_mt->ambilNopol($sheetData->getCell('B' . $no)->getFormattedValue());
                    $error = "Error : ";
                    if (!$sheetData->getCell('B3')->getFormattedValue() && !$sheetData->getCell('C3')->getFormattedValue() && !$sheetData->getCell('D3')->getFormattedValue() && !$sheetData->getCell('E3')->getFormattedValue() && !$sheetData->getCell('F3')->getFormattedValue() && !$sheetData->getCell('G3')->getFormattedValue() && !$sheetData->getCell('H3')->getFormattedValue() && !$sheetData->getCell('I3')->getFormattedValue() && !$sheetData->getCell('J3')->getFormattedValue() && !$sheetData->getCell('K3')->getFormattedValue() && !$sheetData->getCell('L3')->getFormattedValue() && !$sheetData->getCell('M3')->getFormattedValue() && !$sheetData->getCell('N3')->getFormattedValue() && !$sheetData->getCell('O3')->getFormattedValue() && !$sheetData->getCell('P3')->getFormattedValue() && !$sheetData->getCell('Q3')->getFormattedValue() && !$sheetData->getCell('R3')->getFormattedValue() && !$sheetData->getCell('S3')->getFormattedValue() && !$sheetData->getCell('T3')->getFormattedValue()&& !$sheetData->getCell('U3')->getFormattedValue() && !$sheetData->getCell('V3')->getFormattedValue() && !$sheetData->getCell('W3')->getFormattedValue()&& !$sheetData->getCell('X3')->getFormattedValue() && !$sheetData->getCell('Y3')->getFormattedValue() && !$sheetData->getCell('Z3')->getFormattedValue()&& !$sheetData->getCell('AA3')->getFormattedValue() && !$sheetData->getCell('AB3')->getFormattedValue() && !$sheetData->getCell('AC3')->getFormattedValue() && !$sheetData->getCell('AD3')->getFormattedValue() && !$sheetData->getCell('AE3')->getFormattedValue() && !$sheetData->getCell('AF3')->getFormattedValue() && !$sheetData->getCell('AG3')->getFormattedValue() && !$sheetData->getCell('AI3')->getFormattedValue()) {
                        $status = 1;
                        $data['mt']=0;
                        break;
                    }
                    if ($sheetData->getCell('B' . $no)->getFormattedValue() == "") {
                        $error = $error . "Nopol tidak boleh kosong";
                        $e = 1;
                    } else if (sizeof($nopol) != 0) {
                        $error = $error . "Nopol telah ada";
                        $e = 1;
                    }

                    if ($sheetData->getCell('E' . $no)->getFormattedValue() != 8 && $sheetData->getCell('E' . $no)->getFormattedValue() != 16 && $sheetData->getCell('E' . $no)->getFormattedValue() != 24 && $sheetData->getCell('E' . $no)->getFormattedValue() != 32 && $sheetData->getCell('E' . $no)->getFormattedValue() != 40) {
                        $error = $error . ", Klasifikasi harus 8/16/24/32/40 ";
                        $e = 1;
                    }
                    if (strtoupper($sheetData->getCell('F' . $no)->getFormattedValue()) != "SOLAR" && strtoupper($sheetData->getCell('F' . $no)->getFormattedValue()) != "PREMIUM" && strtoupper($sheetData->getCell('F' . $no)->getFormattedValue()) != "PERTAMAX" && strtoupper($sheetData->getCell('F' . $no)->getFormattedValue()) != "PERTAMINA DEX" && strtoupper($sheetData->getCell('F' . $no)->getFormattedValue()) != "PERTAMAX PLUS" && strtoupper($sheetData->getCell('F' . $no)->getFormattedValue()) != "BIO SOLAR") {
                        $error = $error . ", Klasifikasi harus SOLAR/PERTAMAX/PREMIUM/DLL ";
                        $e = 1;
                    }

                    if (strtoupper($sheetData->getCell('J' . $no)->getFormattedValue()) != "ALUMUNIUM AWEKO" && strtoupper($sheetData->getCell('J' . $no)->getFormattedValue()) != "CARBON STEEL" && strtoupper($sheetData->getCell('J' . $no)->getFormattedValue()) != "STEEL") {
                        $error = $error . ", Jenis Tangki hanya ALUMUNIUM AWEKO/CARBON STELL/STELL ";
                        $e = 1;
                    }
                    if (strtoupper($sheetData->getCell('K' . $no)->getFormattedValue()) != "HAK MILIK" && strtoupper($sheetData->getCell('K' . $no)->getFormattedValue()) != "SEWA" ) {
                        $error = $error . ", Status mobil hanya HAK MILIK/SEWA ";
                        $e = 1;
                    }
                    if (strtoupper($sheetData->getCell('L' . $no)->getFormattedValue()) != "OK" && strtoupper($sheetData->getCell('L' . $no)->getFormattedValue()) != "NO" ) {
                        $error = $error . ", GPS hanya OK/NO ";
                        $e = 1;
                    }
                    if (strtoupper($sheetData->getCell('M' . $no)->getFormattedValue()) != "OK" && strtoupper($sheetData->getCell('M' . $no)->getFormattedValue()) != "NO" ) {
                        $error = $error . ", Sensor Overfill hanya OK/NO ";
                        $e = 1;
                    }
                    if (strtoupper($sheetData->getCell('N' . $no)->getFormattedValue()) != "OK" && strtoupper($sheetData->getCell('N' . $no)->getFormattedValue()) != "NO" ) {
                        $error = $error . ", Standar Volume hanya OK/NO ";
                        $e = 1;
                    }
                    if (strtoupper($sheetData->getCell('O' . $no)->getFormattedValue()) != "OK" && strtoupper($sheetData->getCell('O' . $no)->getFormattedValue()) != "NO" ) {
                        $error = $error . ", volume 1 hanya OK/NO ";
                        $e = 1;
                    }
                    if ($sheetData->getCell('P' . $no)->getFormattedValue() != 1 && $sheetData->getCell('P' . $no)->getFormattedValue() != 2 && $sheetData->getCell('P' . $no)->getFormattedValue() != 3 ) {
                        $error = $error . ", Kategori hanya 1/2/3 ";
                        $e = 1;
                    }
                    if ($sheetData->getCell('Q' . $no)->getFormattedValue() != 4 && $sheetData->getCell('Q' . $no)->getFormattedValue() != 6 && $sheetData->getCell('Q' . $no)->getFormattedValue() != 8 && $sheetData->getCell('Q' . $no)->getFormattedValue() != 10 && $sheetData->getCell('Q' . $no)->getFormattedValue() != 12 ) {
                        $error = $error . ", Jumlah Segel hanya 4/6/8/10/12 ";
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
                    $data2['mt'][$i] = array(
                        'nopol' => $sheetData->getCell('B' . $no)->getFormattedValue(),
                        'id_depot' => $this->session->userdata('id_depot'),
                        'no_rangka' => $sheetData->getCell('C' . $no)->getFormattedValue(),
                        'no_mesin' => $sheetData->getCell('D' . $no)->getFormattedValue(),
                        'kapasitas' => $sheetData->getCell('E' . $no)->getFormattedValue(),
                        'produk' => strtoupper($sheetData->getCell('F' . $no)->getFormattedValue()),
                        'jenis_kendaraan' => $sheetData->getCell('G' . $no)->getFormattedValue(),
                        'transportir' => $sheetData->getCell('H' . $no)->getFormattedValue(),
                        'rasio' => $sheetData->getCell('I' . $no)->getFormattedValue(),
                        'jenis_tangki' => strtoupper($sheetData->getCell('J' . $no)->getFormattedValue()),
                        'status_mobil' => strtoupper($sheetData->getCell('K' . $no)->getFormattedValue()),
                        'gps' => strtoupper($sheetData->getCell('L' . $no)->getFormattedValue()),
                        'sensor_overfill' => strtoupper($sheetData->getCell('M' . $no)->getFormattedValue()),
                        'standar_volume' => strtoupper($sheetData->getCell('N' . $no)->getFormattedValue()),
                        'volume_1' => strtoupper($sheetData->getCell('O' . $no)->getFormattedValue()),
                        'kategori_mobil' => $sheetData->getCell('P' . $no)->getFormattedValue(),
                        'jumlah_segel' => $sheetData->getCell('Q' . $no)->getFormattedValue(),
                        'rk1_komp1' => $sheetData->getCell('R' . $no)->getFormattedValue(),
                        'rk1_komp2' => $sheetData->getCell('S' . $no)->getFormattedValue(),
                        'rk1_komp3' => $sheetData->getCell('T' . $no)->getFormattedValue(),
                        'rk1_komp4' => $sheetData->getCell('U' . $no)->getFormattedValue(),
                        'rk1_komp5' => $sheetData->getCell('V' . $no)->getFormattedValue(),
                        'rk1_komp6' => $sheetData->getCell('W' . $no)->getFormattedValue(),
                        'rk2_komp1' => $sheetData->getCell('X' . $no)->getFormattedValue(),
                        'rk2_komp2' => $sheetData->getCell('Y' . $no)->getFormattedValue(),
                        'rk2_komp3' => $sheetData->getCell('Z' . $no)->getFormattedValue(),
                        'rk2_komp4' => $sheetData->getCell('AA' . $no)->getFormattedValue(),
                        'rk2_komp5' => $sheetData->getCell('AB' . $no)->getFormattedValue(),
                        'rk2_komp6' => $sheetData->getCell('AC' . $no)->getFormattedValue(),
                        'k_komp1' => $sheetData->getCell('AD' . $no)->getFormattedValue(),
			'k_komp2' => $sheetData->getCell('AE' . $no)->getFormattedValue(),
			'k_komp3' => $sheetData->getCell('AF' . $no)->getFormattedValue(),
			'k_komp4' => $sheetData->getCell('AG' . $no)->getFormattedValue(),
			'k_komp5' => $sheetData->getCell('AH' . $no)->getFormattedValue(),
			'k_komp6' => $sheetData->getCell('AI' . $no)->getFormattedValue(),
			'status' => 'AKTIF',
                        'status_error' => $error,
                        'error' => $e
                    );
                    $i++;
                    
                    if (!$sheetData->getCell('B' . ($no + 1))->getFormattedValue() && !$sheetData->getCell('C' . ($no + 1))->getFormattedValue() && !$sheetData->getCell('D' . ($no + 1))->getFormattedValue() && !$sheetData->getCell('E' . ($no + 1))->getFormattedValue() && !$sheetData->getCell('F' . ($no + 1))->getFormattedValue() && !$sheetData->getCell('G' . ($no + 1))->getFormattedValue() && !$sheetData->getCell('H' . ($no + 1))->getFormattedValue() && !$sheetData->getCell('I' . ($no + 1))->getFormattedValue() && !$sheetData->getCell('J' . ($no + 1))->getFormattedValue() && !$sheetData->getCell('K' . ($no + 1))->getFormattedValue() && !$sheetData->getCell('L' . ($no + 1))->getFormattedValue() && !$sheetData->getCell('M' . ($no + 1))->getFormattedValue() && !$sheetData->getCell('N' . ($no + 1))->getFormattedValue() && !$sheetData->getCell('O' . ($no + 1))->getFormattedValue() && !$sheetData->getCell('P' . ($no + 1))->getFormattedValue() && !$sheetData->getCell('Q' . ($no + 1))->getFormattedValue() && !$sheetData->getCell('R' . ($no + 1))->getFormattedValue() && !$sheetData->getCell('S' . ($no + 1))->getFormattedValue() && !$sheetData->getCell('T' . ($no + 1))->getFormattedValue() && !$sheetData->getCell('U' . ($no + 1))->getFormattedValue() && !$sheetData->getCell('V' . ($no + 1))->getFormattedValue() && !$sheetData->getCell('W' . ($no + 1))->getFormattedValue() && !$sheetData->getCell('X' . ($no + 1))->getFormattedValue() && !$sheetData->getCell('Y' . ($no + 1))->getFormattedValue() && !$sheetData->getCell('Z' . ($no + 1))->getFormattedValue() && !$sheetData->getCell('AA' . ($no + 1))->getFormattedValue() && !$sheetData->getCell('AB' . ($no + 1))->getFormattedValue() && !$sheetData->getCell('AC' . ($no + 1))->getFormattedValue() && !$sheetData->getCell('AD' . ($no + 1))->getFormattedValue() && !$sheetData->getCell('AE' . ($no + 1))->getFormattedValue() && !$sheetData->getCell('AF' . ($no + 1))->getFormattedValue() && !$sheetData->getCell('AG' . ($no + 1))->getFormattedValue() && !$sheetData->getCell('AH' . ($no + 1))->getFormattedValue() && !$sheetData->getCell('AI' . ($no + 1))->getFormattedValue()) {
                        $status = 1;
                    }
                }
            }
            $data['error'] = 0;
        }
        unlink($file_target);
        $data['lv1'] = 3;
        $data['lv2'] = 1;
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->load->view('layouts/navbar', $data);
        $this->load->view('mt/v_import_mt', $data2);
        $this->load->view('layouts/footer');
        
    }
    
//APAR MT
    public function apar_mt($id_mobil) {
        
        $data1['id_mobil'] =  $id_mobil;
        $data1['apar'] = $this->m_mt->selectApar($id_mobil);
        $data1['dataMobil']=$this->m_mt->selectMobil($id_mobil);
        
        $data['lv1'] = 3;
        $data['lv2'] = 1;
        $this->header($data);
        $this->load->view('mt/v_apar_mt',$data1);
        
        $this->footer();
    }
    
    public function tambah_apar($id_mobil) {

        //$id_mobil = 1;

        $data = array(
            'id_mobil' => $id_mobil,
            'ID_JENIS_APAR' => $this->input->post('ID_JENIS_APAR', true),
            'TANGGAL_APAR' => $this->input->post('TANGGAL_APAR', true),
            'KETERANGAN_APAR' => $this->input->post('KETERANGAN_APAR', true),
            'STATUS_APAR' => $this->input->post('STATUS_APAR', true),
        );

        $this->m_mt->insertApar($data);
        $link = base_url() . "mt/apar_mt/".$id_mobil;
        
        echo '<script type="text/javascript">alert("Data berhasil ditambahkan.");';
        echo 'window.location.href="' . $link . '"';
        echo '</script>';
    }
    
    public function edit_apar($id,$id_mobil) {
        
        $tanggal_apar = $_POST['TANGGAL_APAR'];
        $id_jenis= $_POST['ID_JENIS_APAR'];
        $keterangan= $_POST['KETERANGAN_APAR'];
        $status= $_POST['STATUS_APAR'];
        
        $data = array(
            "TANGGAL_APAR"=>$tanggal_apar,
            "ID_JENIS_APAR"=>$id_jenis,
            "KETERANGAN_APAR" =>$keterangan,
            "STATUS_APAR" =>$status,
        );
       
        $this->m_mt->editApar($data,$id);
        
        $link = base_url()."mt/apar_mt/".$id_mobil;
        echo '<script type="text/javascript">alert("Data berhasil diubah.");';
        echo 'window.location.href="' . $link . '"';
        echo '</script>';
        
        
    }
    
    public function delete_apar($id_apar,$id_mobil){
        $this->m_mt->deleteApar($id_apar);
        
        
        $link = base_url()."mt/apar_mt/".$id_mobil;
        echo '<script type="text/javascript">alert("Data berhasil dihapus.");';
        echo 'window.location.href="' . $link . '"';
        echo '</script>';
    }
    

//Ban MT    
    
    public function ban_mt($id_mobil) {
        
        $data1['id_mobil'] =  $id_mobil;
        $data1['ban'] = $this->m_mt->selectBanMT($id_mobil);
        $data1['dataMobil']=$this->m_mt->selectMobil($id_mobil);
       
        
        $data['lv1'] = 3;
        $data['lv2'] = 1;
        $this->header($data);
        $this->load->view('mt/v_ban_mt',$data1);
        $this->footer();
    }
    
    public function tambah_ban($id_mobil) {

      
        $data = array(
            'id_mobil' => $id_mobil,
            'MERK_BAN' => $this->input->post('MERK_BAN', true),
            'NO_SERI_BAN' => $this->input->post('NO_SERI_BAN', true),
            'JENIS_BAN' => $this->input->post('JENIS_BAN', true),
            'POSISI_BAN' => $this->input->post('POSISI_BAN', true),
            'TANGGAL_GANTI_BAN' => $this->input->post('TANGGAL_GANTI_BAN', true),
        );

        $this->m_mt->insertBan($data);
        $link = base_url() . "mt/ban_mt/".$id_mobil;
        echo '<script type="text/javascript">alert("Data berhasil ditambahkan.");';
        echo 'window.location.href="' . $link . '"';
        echo '</script>';
    }
    
     public function edit_ban($id,$id_mobil) {

        $merk = $_POST['MERK_BAN'];
        $seri = $_POST['NO_SERI_BAN'];
        $jenis = $_POST['JENIS_BAN'];
        $posisi= $_POST['POSISI_BAN'];
        $tgl_ganti= $_POST['TANGGAL_GANTI_BAN'];
        
        $data = array(
            "MERK_BAN"=>$merk,
            "NO_SERI_BAN"=>$seri,
            "JENIS_BAN"=>$jenis,
            "POSISI_BAN" =>$posisi,
            "TANGGAL_GANTI_BAN" =>$tgl_ganti,
            );
        
        $this->m_mt->editBan($data, $id);
        
         $link = base_url()."mt/ban_mt/".$id_mobil;
        echo '<script type="text/javascript">alert("Data berhasil diubah.");';
        echo 'window.location.href="' . $link . '"';
        echo '</script>';
        
    }
    
     public function delete_ban($id_ban,$id_mobil){
         
        $this->m_mt->deleteBan($id_ban);
       
        $link = base_url()."mt/ban_mt/".$id_mobil;
        echo '<script type="text/javascript">alert("Data berhasil dihapus.");';
        echo 'window.location.href="' . $link . '"';
        echo '</script>';
     }
     
     //oli

    public function oli_mt($id_mobil) {

        $data1['id_mobil'] =  $id_mobil;
        $data1['oli'] = $this->m_mt->selectOli($id_mobil);
        $data1['dataMobil']=$this->m_mt->selectMobil($id_mobil);
        
        
        $data['lv1'] = 3;
        $data['lv2'] = 1;
        $this->header($data);
        $this->load->view('mt/v_oli_mt',$data1);
        $this->footer();
    }
    
    public function tambah_oli($id_mobil) {

        $data = array(
            'id_mobil' => $id_mobil,
            'MERK_OLI' => $this->input->post('MERK_OLI', true),
            'TANGGAL_GANTI_OLI' => $this->input->post('TANGGAL_GANTI_OLI', true),
            'KM_AWAL' => $this->input->post('KM_AWAL', true),
            'TOTAL_VOLUME' => $this->input->post('TOTAL_VOLUME', true),
            
        );

        $this->m_mt->insertOli($data);
        $link = base_url() . "mt/oli_mt/".$id_mobil;
        echo '<script type="text/javascript">alert("Data berhasil ditambahkan.");';
        echo 'window.location.href="' . $link . '"';
        echo '</script>';
    }
    
    public function edit_oli($id,$id_mobil) {

        $km = $_POST['KM_AWAL'];
        $merk = $_POST['MERK_OLI'];
        $tgl = $_POST['TANGGAL_GANTI_OLI'];
        $total= $_POST['TOTAL_VOLUME'];
       
        
        $data = array(
            "KM_AWAL"=>$km,
            "MERK_OLI"=>$merk,
            "TANGGAL_GANTI_OLI" =>$tgl,
            "TOTAL_VOLUME" =>$total,
            );
        
        $this->m_mt->editOli($data, $id);
        
         $link = base_url()."mt/oli_mt/".$id_mobil;
        echo '<script type="text/javascript">alert("Data berhasil diubah.");';
        echo 'window.location.href="' . $link . '"';
        echo '</script>';
        
    }
    
    public function delete_oli($id_oli,$id_mobil){
         
        $this->m_mt->deleteOli($id_oli);
        
        $link = base_url()."mt/oli_mt/".$id_mobil;
        echo '<script type="text/javascript">alert("Data berhasil dihapus.");';
        echo 'window.location.href="' . $link . '"';
        echo '</script>';
     }

    
    //Data Surat
    public function surat_mt($id_mobil) {
        
        $data1['id_mobil'] =  $id_mobil;
        $data1['surat'] = $this->m_mt->selectSurat($id_mobil);
        $data1['dataMobil']=$this->m_mt->selectMobil($id_mobil);
        
        $data['lv1'] = 3;
        $data['lv2'] = 1;
        $this->header($data);
        $this->load->view('mt/v_surat_mt',$data1);
        $this->footer();
    }
    
    public function tambah_surat($id_mobil) {

        

        $data = array(
            'id_mobil' => $id_mobil,
            'ID_JENIS_SURAT' => $this->input->post('ID_JENIS_SURAT', true),
            'TANGGAL_AKHIR_SURAT' => $this->input->post('TANGGAL_AKHIR_SURAT', true),
            'KETERANGAN_SURAT' => $this->input->post('KETERANGAN_SURAT', true),
            
        );

        $this->m_mt->insertSurat($data);
        $link = base_url() . "mt/surat_mt/".$id_mobil;
        echo '<script type="text/javascript">alert("Data berhasil ditambahkan.");';
        echo 'window.location.href="' . $link . '"';
        echo '</script>';
    }
    
    public function edit_surat($id,$id_mobil) {

        $surat = $_POST['ID_JENIS_SURAT'];
        $tgl = $_POST['TANGGAL_AKHIR_SURAT'];
        $keterangan = $_POST['KETERANGAN_SURAT'];
       
        
        $data = array(
            "ID_JENIS_SURAT"=>$surat,
            "TANGGAL_AKHIR_SURAT"=>$tgl,
            "KETERANGAN_SURAT" =>$keterangan,
            );
        
        $this->m_mt->editSurat($data, $id);
        
         $link = base_url()."mt/surat_mt/".$id_mobil;
        echo '<script type="text/javascript">alert("Data berhasil diubah.");';
        echo 'window.location.href="' . $link . '"';
        echo '</script>';
        
    }
    
      public function delete_surat($id_surat,$id_mobil){
         
        $this->m_mt->deleteSurat($id_surat);
        
        
        $link = base_url()."mt/surat_mt/".$id_mobil;
        echo '<script type="text/javascript">alert("Data berhasil dihapus.");';
        echo 'window.location.href="' . $link . '"';
        echo '</script>';
     }
     
     //Data Grafik
    
    
    public function grafik_mt() {

        $depot = $this->session->userdata("id_depot");
        
        $data1['grafik'] = $this->m_grafik_mt->get_kinerja($depot,date("Y"));
        
        $data['lv1'] = 3;
        $data['lv2'] = 2;
        $this->header($data);
        $this->load->view('mt/v_grafik_mt',$data1);
        $this->footer();
    }

    public function grafik_bulan_mt($bulan_mt) {
        
        $data1['bulan_mt'] = $bulan_mt;
        $depot = $this->session->userdata("id_depot");
        $data1['grafik'] = $this->m_grafik_mt->get_kinerja_tanggal($depot,$bulan_mt);
        $data['lv1'] = 3;
        $data['lv2'] = 2;
        $this->header($data);
        $this->load->view('mt/v_grafik_bulan_mt',$data1);
        $this->footer();
    }

    public function grafik_hari_mt($bulan_mt,$hari) {
        
        $data1['hari'] = $hari;
        $data1['bulan_mt'] = $bulan_mt;
        $depot = $this->session->userdata("id_depot");
        $data1['grafik'] = $this->m_grafik_mt->get_kinerja_harian($depot,$bulan_mt,$hari);
        
        $data['lv1'] = 3;
        $data['lv2'] = 2;
        $this->header($data);
        $this->load->view('mt/v_grafik_hari_mt',$data1);
        $this->footer();
    }


    public function presensi() {
        $data['lv1'] = 3;
        $data['lv2'] = 3;
        $this->header($data);
        $this->load->view('mt/v_presensi');
        $this->footer();
    }
    
    
    public function reminder() {
        
        $depot = $this->session->userdata("id_depot");
        $data['lv1'] = 3;
        $data['lv2'] = 4;
        //data reminder
        $data2['apar'] = $this->m_pengingat->getAparReminder($depot)->result();
        $data2['surat'] = $this->m_pengingat->getSuratReminder($depot)->result();
        $data2['ban'] = $this->m_pengingat->getBanReminder($depot)->result();
        $data2['oli'] = $this->m_pengingat->getOliReminder($depot)->result();
        $this->header($data);
        $this->load->view('mt/v_pengingat', $data2);
        $this->footer();
    }
    
    
    public function edit_reminder_surat($id)
    {
        
        $akhir_surat = $_POST['tgl_surat'];
        $id_jenis = $_POST['ID_JENIS_SURAT'];
        $keterangan = $_POST['KETERANGAN_SURAT'];
        
        $data = array(
            "TANGGAL_AKHIR_SURAT"=>$akhir_surat,
            "ID_JENIS_SURAT"=>$id_jenis,
            "KETERANGAN_SURAT"=>$keterangan
        );
        
        $this->m_pengingat->editReminderSurat($id,$data);
        //redirect('mt/reminder');
          echo '<script type="text/javascript">alert("Pengingat apar berhasil diubah");';
            echo 'window.location.href="' . base_url() . 'mt/reminder";';
            echo '</script>';
    }
    
    public function edit_reminder_oli($id)
    {
        
        $merk = $_POST['MERK_OLI'];
        $km = $_POST['KM_AWAL'];
        $tgl = $_POST['tgl_oli'];
        $total = $_POST['TOTAL_VOLUME'];
        
        $data = array(
            "MERK_OLI"=>$merk,
            "KM_AWAL"=>$km,
            "TANGGAL_GANTI_OLI"=>$tgl,
            "TOTAL_VOLUME"=>$total
        );
        
        $this->m_pengingat->editReminderOli($id,$data);
        //redirect('mt/reminder');
          echo '<script type="text/javascript">alert("Pengingat apar berhasil diubah");';
            echo 'window.location.href="' . base_url() . 'mt/reminder";';
            echo '</script>';
    }
    
    public function edit_reminder_apar($id)
    {
        $tgl = $_POST['tgl_apar'];
        $id_jenis= $_POST['ID_JENIS_APAR'];
        $keterangan = $_POST['KETERANGAN_APAR'];
        $data = array(
            "TANGGAL_APAR"=>$tgl,
            "ID_JENIS_APAR"=>$id_jenis,
            "KETERANGAN_APAR"=>$keterangan,
            
        );
        
        $this->m_pengingat->editReminderApar($id,$data);
        //redirect('mt/reminder');
          echo '<script type="text/javascript">alert("Pengingat apar berhasil diubah");';
            echo 'window.location.href="' . base_url() . 'mt/reminder";';
            echo '</script>';
    }
    
    
 
    public function rencana() {
        
        
        $data2['mt'] = 0;
        $data2['error'] = "0";
        $data['lv1'] = 3;
        $data['lv2'] = 5;
        $this->header($data);
        $this->load->view('mt/v_rencana',$data2);
        $this->footer();
    }
    

    private function header($data) {
        
        $data2 = menu_ss();
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu', $data2);

        $this->load->view('layouts/navbar', $data);
    }

    private function footer() {

        $this->load->view('layouts/footer');
    }

    //OAM
    public function oam_bulanan() {
        $data['lv1'] = 1;
        $data['lv2'] = 1;
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->load->view('layouts/navbar_oam', $data);
        $this->load->view('oam/v_grafik_mt_bulan');
        $this->load->view('layouts/footer');
    }

    public function oam_harian() {
        $data['lv1'] = 1;
        $data['lv2'] = 1;
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->load->view('layouts/navbar_oam', $data);
        $this->load->view('oam/v_grafik_mt_hari');
        $this->load->view('layouts/footer');
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */