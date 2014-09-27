<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class apms extends CI_Controller {
    function __construct() {
        parent::__construct();
		if(!$this->session->userdata('isLoggedIn')){
            redirect('login');
        }else if ($this->session->userdata('id_role')<=2){
            redirect();
        }
		
		//belum make database	
	    $this->load->model("m_apms");
        $this->load->model("m_log_sistem");
       /*  
        $this->load->model("m_mt");
        $this->load->model("m_rencana");
        $this->load->model("m_kinerja");
        $this->load->model("m_log_harian");
        $this->load->model("m_peringatan");
        $this->load->model("m_penjadwalan");
		*/
        $this->load->helper(array('form', 'url'));
    }

    public function index() {
	$this->pesan =0;
        $this->data_apms();
    }
	public function tambah_apms(){
		$depot = $this->session->userdata("id_depot");
        $data5 = array(
            'NO_APMS' => $this->input->post('no_apms', true),
			'ID_DEPOT'=> $depot,
            'SHIP_TO' => $this->input->post('ship_to', true),
            'NAMA_PENGUSAHA' => $this->input->post('nama_pengusaha', true),
            'SUPPLY_POINT' => $this->input->post('supply_point', true),
            'ALAMAT' => $this->input->post('alamat', true),
            'NAMA_TRANSPORTIR' => $this->input->post('nama_transportir', true),
            'NO_PERJANJIAN' => $this->input->post('no_perjanjian', true),
            'TARIF_PATRA_NIAGA' => $this->input->post('tarif', true),
        );
		//$pesan = $this->m_apms->insertApms($data5);
		//$this->pesan = $pesan;
		
		$datalog = array(
            'keterangan' => 'Menambah Data APMS',
            'id_pegawai' => $this->session->userdata("id_pegawai"),
            'keyword' => 'Tambah'
        );
        $this->m_log_sistem->insertLog($datalog);
		
		$link = base_url()."apms/";
		echo '<script type="text/javascript">';
		echo 'window.location.href="' . $link . '"';
		echo '</script>';
	}
    public function data_apms() {
		$data1['pesan'] = 0;
		if($this->input->post('simpan')){
			if($this->input->post('simpan')=="Simpan")
			{
				$depot = $this->session->userdata("id_depot");
				$data5 = array(
					'NO_APMS' => $this->input->post('no_apms', true),
					'ID_DEPOT'=> $depot,
					'SHIP_TO' => $this->input->post('ship_to', true),
					'NAMA_PENGUSAHA' => $this->input->post('nama_pengusaha', true),
					'SUPPLY_POINT' => $this->input->post('supply_point', true),
					'ALAMAT' => $this->input->post('alamat', true),
					'NAMA_TRANSPORTIR' => $this->input->post('nama_transportir', true),
					'NO_PERJANJIAN' => $this->input->post('no_perjanjian', true),
					'TARIF_PATRA_NIAGA' => $this->input->post('tarif', true),
				);
				$pesan = $this->m_apms->insertApms($data5);
				if($pesan)
				{
					$data1['pesan'] = 1;
					$data1['pesan_text'] = "Selamat Data Berhasil Ditambahkan!";
					$datalog = array(
						'keterangan' => 'Menambahkan Data APMS',
						'id_pegawai' => $this->session->userdata("id_pegawai"),
						'keyword' => 'Tambah'
					);
					$this->m_log_sistem->insertLog($datalog);
				}else{
					$data1['pesan'] = 2;
					$data1['pesan_text'] = "Data Tidak Berhasil Ditambahkan!";
					
				}
			}
			if($this->input->post('simpan')=="Hapus")
			{
				$id_apms = $this->input->post('ID_APMS');
				$pesan = $this->m_apms->deleteApms($id_apms);
				if($pesan)
				{
					$data1['pesan'] = 1;
					$data1['pesan_text'] = "Selamat Data Berhasil Dihapus!";
					$datalog = array(
						'keterangan' => 'Menghapus Data APMS',
						'id_pegawai' => $this->session->userdata("id_pegawai"),
						'keyword' => 'Hapus'
					);
					$this->m_log_sistem->insertLog($datalog);
				}else
				{
					$data1['pesan'] = 2;
					$data1['pesan_text'] = "Data Tidak Berhasil Dihapus!";
				}
			}
		}
			$data['lv1'] = 4;
			$data['lv2'] = 1;
			$depot = $this->session->userdata('id_depot');
			$data1['apms'] = $this->m_apms->selectAllApms($depot);
			$data3 = menu_ss();
			$this->load->view('layouts/header');
			$this->load->view('layouts/menu', $data3);
			$this->load->view('layouts/navbar', $data);
			$this->load->view('apms/v_data_apms', $data1);
			$this->load->view('layouts/footer');
		
    }	
	public function detail_apms($id_apms){
				
		$data1['pesan'] =0;
		if($this->input->post('simpan'))
		{
			if($this->input->post('simpan')=="Simpan")
			{
				$id = $this->input->post('id', true);
				$data = array(
					'NO_APMS' => $this->input->post('no_apms', true),
					'NAMA_PENGUSAHA' => $this->input->post('nama_pengusaha', true),
					'SUPPLY_POINT' => $this->input->post('supply_point', true),
					'ALAMAT' => $this->input->post('alamat', true),
					'NAMA_TRANSPORTIR' => $this->input->post('nama_transportir', true),
					'NO_PERJANJIAN' => $this->input->post('no_perjanjian', true),
					'TARIF_PATRA_NIAGA' => $this->input->post('tarif', true),
					'SHIP_TO' => $this->input->post('ship_to', true),
				);
				$pesan =  $this->m_apms->editApms($data, $id);
				if($pesan){
					$data1['pesan'] = 1;
					$data1['pesan_text'] = "Data Berhasil Diubah.";
					$datalog = array(
						'keterangan' => 'Mengedit Data APMS',
						'id_pegawai' => $this->session->userdata("id_pegawai"),
						'keyword' => 'edit'
					);
					$this->m_log_sistem->insertLog($datalog);
				}else{
					$data1['pesan'] = 2;
					$data1['pesan_text'] = "Data Tidak Berhasil Diubah.";
				}
				
			}
		}
		if($this->input->post('simpan1')=="Simpan")
			{
				$id = $this->input->post('id', true);
				$data = $this->m_apms->getLogHarian(date('Y-m-d'),$this->session->userdata('id_depot'));
				$log_harian = $data[0]->ID_LOG_HARIAN;
				$data_1 = array(
					'ID_APMS' => $id,
					'ID_LOG_HARIAN' => $log_harian,
					'NO_DELIVERY' => $this->input->post('no_delivery', true),
					'DATE_DELIVERY' => $this->input->post('tgl_delivery', true),
					'DATE_PLAN_GI' => $this->input->post('tgl_plan_gi', true),
					'BAHAN_BAKAR' => $this->input->post('bh', true),
					'JUMLAH' => $this->input->post('jml', true),
					'ORDER_NUMBER' => $this->input->post('nomor_order', true),
					'DATE_ORDER' => $this->input->post('tgl_order', true),
					'PENGIRIMAN_KAPAL' => $this->input->post('tgl_kirim', true),
					'DATE_KAPAL_DATANG' => $this->input->post('tgl_kpl_dtg', true),
					'DATE_KAPAL_BERANGKAT' => $this->input->post('tgl_kpl_brkt', true),
					'DESCRIPTION' => $this->input->post('des', true),
				);
				$bisa = $this->m_apms->insertKinerjaApms($data_1);
				if($bisa)
				{
					$datalog = array(
						'keterangan' => 'Menambah Data Kinerja APMS',
						'id_pegawai' => $this->session->userdata("id_pegawai"),
						'keyword' => 'Hapus'
					);
					$this->m_log_sistem->insertLog($datalog);
					$data1['pesan'] = 1;
					$data1['pesan_text'] = "Data Kinerja Berhasil Ditambahkan.";
				}else
				{
					$data1['pesan'] = 2;
					$data1['pesan_text'] = "Data Kinerja Tidak Berhasil Ditambahkan.";
				}
			}
			if($this->input->post('simpan2')=="Simpan")
			{
				$id = $this->input->post('id', true);
				$id_kinerja = $this->input->post('id_kinerja_apms', true);
				$data_1 = array(
					'ID_APMS' => $id,
					'ID_LOG_HARIAN' => $this->input->post('id_log', true),
					'NO_DELIVERY' => $this->input->post('no_delivery1', true),
					'DATE_DELIVERY' => $this->input->post('tgl_delivery1', true),
					'DATE_PLAN_GI' => $this->input->post('tgl_plan_gi1', true),
					'BAHAN_BAKAR' => $this->input->post('bh1', true),
					'JUMLAH' => $this->input->post('jml1', true),
					'ORDER_NUMBER' => $this->input->post('nomor_order1', true),
					'DATE_ORDER' => $this->input->post('tgl_order1', true),
					'PENGIRIMAN_KAPAL' => $this->input->post('tgl_kirim1', true),
					'DATE_KAPAL_DATANG' => $this->input->post('tgl_kpl_dtg1', true),
					'DATE_KAPAL_BERANGKAT' => $this->input->post('tgl_kpl_brkt1', true),
					'DESCRIPTION' => $this->input->post('des1', true),
				);
				$bisa = $this->m_apms->editKinerjaApms($data_1,$id_kinerja);
				if($bisa)
				{
					$datalog = array(
						'keterangan' => 'Mengedit Data Kinerja APMS',
						'id_pegawai' => $this->session->userdata("id_pegawai"),
						'keyword' => 'Hapus'
					);
					$this->m_log_sistem->insertLog($datalog);
					$data1['pesan'] = 1;
					$data1['pesan_text'] = "Data Kinerja Berhasil Diubah.";
				}else
				{
					$data1['pesan'] = 2;
					$data1['pesan_text'] = "Data Kinerja Tidak Berhasil Diubah.";
				}
			}
		$data['lv1'] = 4;
        $data['lv2'] = 1;
        $data1['apms'] = $this->m_apms->detailApms($id_apms);
		$data3 = menu_ss();
		$data1['kinerja'] = $this->m_apms->selectKinerja($id_apms);
        //$data1['kinerja'] = $this->m_mt->selectKinerjaMT($id_mobil,date('Y'));
		$this->load->view('layouts/header');
        $this->load->view('layouts/menu', $data3);
        $this->load->view('layouts/navbar', $data);
        $this->load->view('apms/v_detail_apms', $data1);
        $this->load->view('layouts/footer');
		
		
	}
	
    public function edit_apms($id_apms) {
        $id = $this->input->post('id', true);
        $data = array(
            'NO_APMS' => $this->input->post('no_apms', true),
            'NAMA_PENGUSAHA' => $this->input->post('nama_pengusaha', true),
            'SUPPLY_POINT' => $this->input->post('supply_point', true),
            'ALAMAT' => $this->input->post('alamat', true),
            'NAMA_TRANSPORTIR' => $this->input->post('nama_transportir', true),
            'NO_PERJANJIAN' => $this->input->post('no_perjanjian', true),
            'TARIF_PATRA_NIAGA' => $this->input->post('tarif', true),
			'SHIP_TO' => $this->input->post('ship_to', true),
        );
       $pesan =  $this->m_apms->editApms($data, $id);
        
        $link = base_url()."apms/detail_apms/".$id_apms."_".$pesan;
        
		echo '<script type="text/javascript">';
        echo 'window.location.href="' . $link . '"';
        echo '</script>';
        
    }
    
    public function delete_apms($id_apms){
        $pesan = $this->m_apms->deleteApms($id_apms);
        $link = base_url()."apms/";
        echo '<script type="text/javascript">;';
        echo 'window.location.href="' . $link . '"';
        echo '</script>';
    }
	
}
