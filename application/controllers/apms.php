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
       /*  
        $this->load->model("m_mt");
        $this->load->model("m_rencana");
        $this->load->model("m_kinerja");
        $this->load->model("m_log_sistem");
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
				$data1['pesan'] = 1;
				$data1['pesan_text'] = "Selamat Data Berhasil Ditambahkan!";
			}
			if($this->input->post('simpan')=="Hapus")
			{
				$id_apms = $this->input->post('ID_APMS');
				$pesan = $this->m_apms->deleteApms($id_apms);
				$data1['pesan'] = 1;
				$data1['pesan_text'] = "Selamat Data Berhasil Dihapus!";
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
				$data1['pesan'] = 1;
				$data1['pesan_text'] = "Data Berhasil di Edit.";
				
			}
		}
		$data['lv1'] = 4;
        $data['lv2'] = 1;
        $data1['apms'] = $this->m_apms->detailApms($id_apms);
		$data3 = menu_ss();
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
