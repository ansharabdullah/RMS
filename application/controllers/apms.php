<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class apms extends CI_Controller {

    function __construct() {
        parent::__construct();
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
        $this->data_apms();
    }

    public function data_apms() {
        $data['lv1'] = 4;
        $data['lv2'] = 1;
        $depot = $this->session->userdata('id_depot');
        $data1['apms'] = $this->m_apms->selectAllApms($depot);
        $data1['success'] = 0;
        $data1['error'] = 0;
        $data3 = menu_ss();
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu', $data3);
        $this->load->view('layouts/navbar', $data);
        $this->load->view('apms/v_data_apms', $data1);
        $this->load->view('layouts/footer');
    }
	
	public function tambah_apms(){
		$depot = $this->session->userdata("id_depot");
        $data = array(
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
		$this->m_apms->insertApms($data);
        $link = base_url() . "apms/data_apms/";
        echo '<script type="text/javascript">alert("Data berhasil ditambahkan.");';
        echo 'window.location.href="' . $link . '"';
        echo '</script>';
	}
	public function detail_apms($id_apms){
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
        $this->m_apms->editApms($data, $id);
        
         $link = base_url()."apms/detail_apms/".$id_apms;
        echo '<script type="text/javascript">alert("Data berhasil diubah.");';
        echo 'window.location.href="' . $link . '"';
        echo '</script>';
        
    }
    
    public function delete_apms($id_apms){
        $this->m_apms->deleteApms($id_apms);
        
        $link = base_url()."apms/data_apms/";
        echo '<script type="text/javascript">alert("Data berhasil dihapus.");';
        echo 'window.location.href="' . $link . '"';
        echo '</script>';
    }
	
}
