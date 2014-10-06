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
        $this->load->model("m_mt");
        $this->load->model("m_rencana_apms");
        $this->load->model("m_log_harian");
        $this->load->model("m_kpi_apms");
       /*  
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
	public function detail_apms($id_apms,$bulan,$tahun){
				
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
		$data1['tahun'] = $tahun;
		$data1['id_apms'] = $id_apms;
        $data1['bulan'] = $bulan;
        $data1['apms'] = $this->m_apms->detailApms($id_apms);
		$data3 = menu_ss();
		$data1['kinerja'] = $this->m_apms->selectKinerja($id_apms,$bulan,$tahun);
		$data1['grafix'] = $this->m_apms->selectKinerjaGrafix($id_apms,$bulan,$tahun);
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
	public function grafik_apms($tahun) {

        $depot = $this->session->userdata("id_depot");
        
        $data1['tahun'] = $tahun;
        $data1['depot'] = $depot;
        $data1['grafik'] = $this->m_apms->get_grafik_tahun($depot, $tahun);
        $data3 = menu_ss();
        $data['lv1'] = 4;
        $data['lv2'] = 2;
        $this->load->view('layouts/header');
		$this->load->view('layouts/menu', $data3);
		$this->load->view('layouts/navbar', $data);
        //var_dump($tahun);
		$this->load->view('apms/v_grafik_apms',$data1);
        $this->load->view('layouts/footer');
    }
	public function grafik_bulan_apms($bulan,$tahun) {

        $depot = $this->session->userdata("id_depot");
        
        $data1['tahun'] = $tahun;
        $data1['bulan'] = $bulan;
        $data1['depot'] = $depot;
        $data1['grafik'] = $this->m_apms->get_grafik_bulan($depot,$bulan,$tahun);
        $data3 = menu_ss();
        $data['lv1'] = 4;
        $data['lv2'] = 2;
        $this->load->view('layouts/header');
		$this->load->view('layouts/menu', $data3);
		$this->load->view('layouts/navbar', $data);
        //var_dump($data1['grafik']);
		$this->load->view('apms/v_grafik_bulan_apms',$data1);
        $this->load->view('layouts/footer');
    }
	public function grafik_hari_apms($bulan,$hari,$tahun) {
        
        
        $depot = $this->session->userdata("id_depot");
        $data1['bulan'] = $bulan;
        $data1['tahun'] = $tahun;
        $data1['hari'] = $hari;
        $data1['grafik'] = $this->m_apms->get_grafik_harian($depot ,$bulan,$hari,$tahun); 

        $data3 = menu_ss();		
        $data['lv1'] = 4;
        $data['lv2'] = 2;
        $this->load->view('layouts/header');
		$this->load->view('layouts/menu', $data3);
		$this->load->view('layouts/navbar', $data);
        //var_dump($data1['grafik']);
		$this->load->view('apms/v_grafik_hari_apms',$data1);
        $this->load->view('layouts/footer');
    }
	
	
    public function apms_tahun($depot)
    {
       $tahun =  $_POST['tahun'];
       redirect('apms/grafik_apms/'.$tahun);
    }
	public function apms_masuk($id_apms)
    {
       $tanggal =  $_POST['bulan'];
       $bulan =  date('n',strtotime($tanggal));
       $tahun =  date('Y',strtotime($tanggal));
       redirect('apms/detail_apms/'.$id_apms."/".$bulan."/".$tahun);
    }
		public function apms_grafik_masuk()
    {
       $tanggal =  $_POST['bulan'];
       $bulan =  date('n',strtotime($tanggal));
       $tahun =  date('Y',strtotime($tanggal));
       redirect('apms/grafik_bulan_apms/'.$bulan."/".$tahun);
    }
	public function apms_grafik_hari()
    {
       $tanggal =  $_POST['tanggal'];
       $hari =  date('d',strtotime($tanggal));
       $bulan =  date('n',strtotime($tanggal));
       $tahun =  date('Y',strtotime($tanggal));
       redirect('apms/grafik_hari_apms/'.$bulan."/".$hari."/".$tahun);
    }
	
	public function rencana_apms($tahun,$bulan) {
		$data1['submit'] = false;
        $data1['hapus'] = false;
        $data1['edit'] = false;
        $data1['pesan'] = 0;
		$depot = $this->session->userdata('id_depot');
        $data1['bulan'] = $bulan;
        $data1['tahun'] = $tahun;
		
		if($this->input->post('simpan')=="Simpan")
		{
			$tanggal_log = date($tahun.'-'.$bulan.'-'.'1');
			$id_log = $this->m_log_harian->getIdLogHarianTanggal($tanggal_log,$depot);
			$id_log_h='';
			foreach($id_log as $l)
			{
				$id_log_h = $l->ID_LOG_HARIAN;
			}
			
			$jumlah = $this->m_apms->countnoApms($depot);
			for($i=0;$i<$jumlah->jumlah;$i++)
			{
					$data[$i] = array(
						 'K_PREMIUM' => $this->input->post('P_'.$i, true),
						 'K_SOLAR' => $this->input->post('R_'.$i, true),
						 'ID_APMS' => $this->input->post('I_'.$i, true),
						 'ID_LOG_HARIAN' => $id_log_h,
					);
					//var_dump($data[$i]);
			}
			
			$hasil = $this->m_rencana_apms->insertRencanaApms($data);
			if($hasil)
			{
				$datalog = array(
					'keterangan' => 'Menambah Data Rencana APMS',
					'id_pegawai' => $this->session->userdata("id_pegawai"),
					'keyword' => 'Edit'
				);
				$this->m_log_sistem->insertLog($datalog);
				$this->m_log_harian->updateKoutaLog($id_log_h);
				$data1['pesan'] = 1;
				$data1['pesan_text'] = "Data Rencana APMS Berhasil Ditambah.";
			}else
			{
				$data1['pesan'] = 2;
				$data1['pesan_text'] = "Data Rencana APMS Tidak Berhasil Ditambah.";
			}
		}
		if($this->input->post('edit')=="Simpan")
		{
			$jumlah = $this->m_apms->countnoApms($depot);
			for($i=0;$i<$jumlah->jumlah;$i++)
			{
					$data[$i] = array(
						 'K_PREMIUM' => $this->input->post('P_'.$i, true),
						 'K_SOLAR' => $this->input->post('R_'.$i, true),
					);
					$data_id[$i] =  $this->input->post('I_'.$i, true);
										
			}
			$hasil = $this->m_rencana_apms->editRencanaApms($data,$data_id);
			if($hasil)
			{
				$datalog = array(
					'keterangan' => 'Mengedit Data Rencana APMS',
					'id_pegawai' => $this->session->userdata("id_pegawai"),
					'keyword' => 'Edit'
				);
				$this->m_log_sistem->insertLog($datalog);
				$data1['pesan'] = 1;
				$data1['pesan_text'] = "Data Rencana APMS Berhasil Diubah.";
			}else
			{
				$data1['pesan'] = 2;
				$data1['pesan_text'] = "Data Rencana APMS Tidak Berhasil Diubah.";
			}
		}
		if($this->input->post('hapus')=="Simpan")
		{
			$id = $this->input->post('id_rencana',true);
			$hasil = $this->m_rencana_apms->deleteRencanaApms($id);
			if($hasil)
			{
				$datalog = array(
					'keterangan' => 'Menghapus Data Rencana APMS',
					'id_pegawai' => $this->session->userdata("id_pegawai"),
					'keyword' => 'Hapus'
				);
				$this->m_log_sistem->insertLog($datalog);
				$this->m_log_harian->updateKoutaLogHapus($id);
				$data1['pesan'] = 1;
				$data1['pesan_text'] = "Data Rencana APMS Berhasil Dihapus.";
			}else
			{
				$data1['pesan'] = 2;
				$data1['pesan_text'] = "Data Rencana APMS Tidak Berhasil Dihapus.";
			}
		}
		
		
		$data['lv1'] = 4;
		$data['lv2'] = 3;
		$data1['apms'] = $this->m_rencana_apms->selectRencanaApms($depot,$tahun,$bulan);
		$data1['no_apms'] = $this->m_apms->selectnoApms($depot);
		$data1['STATUS_RENCANA'] = $this->m_rencana_apms->cekRencana($depot,$bulan,$tahun);
		//var_dump ( $data1['STATUS_RENCANA']);
		//var_dump ( $data1['no_apms']);
		$data3 = menu_ss();
		$this->load->view('layouts/header');
		$this->load->view('layouts/menu', $data3);
		$this->load->view('layouts/navbar', $data);
		$this->load->view('apms/v_rencana_apms', $data1);
		$this->load->view('layouts/footer');
	
    }	
	public function rencana() {
		$tanggal =  $_POST['bln'];
       $bulan =  date('m',strtotime($tanggal));
       $tahun =  date('Y',strtotime($tanggal));
		redirect('apms/rencana_apms/'.$tahun."/".$bulan);
	}
	
	public function kpi_apms() {
        $data1['pesan'] = 0;
		$depot = $this->session->userdata('id_depot');
		$tanggal_log =  $this->input->post('bln_kpi', true);
		$bulan =  date('m',strtotime($tanggal_log));
		$tahun =  date('Y',strtotime($tanggal_log));
        $data1['tahun'] = $tahun;
        $data1['bulan'] = $bulan;
		
		
		if($this->input->post('tambah')=="Simpan")
		{
			$cek = $this->m_rencana_apms->cekRencana($depot,$bulan,$tahun);
			foreach($cek as $k)
				{
					$stat = $k->STATUS_KUOTA_APMS;
				}
			if($stat== '1')
			{
				$tanggal_log = date($tanggal_log.'-1');
				$id_log = $this->m_log_harian->getIdLogHarianTanggal($tanggal_log,$depot);
				//var_dump($tanggal_log);
				$id_log_h='';
				foreach($id_log as $l)
				{
					$id_log_h = $l->ID_LOG_HARIAN;
				}
				$jumlah_nilai = 0;
				
				$bobot = 20;
				$jumlah_rencana = $this->m_rencana_apms->jumlah_total($id_log_h);
				//echo $jumlah_rencana->jumlah;
				$jumlah_kinerja = $this->m_apms->get_jumlah($depot,$tahun,$bulan);
				if($jumlah_kinerja->jumlah==NULL)
				{
					$jumlah_kinerja->jumlah = 0;
				}
				
				$target = $jumlah_rencana->jumlah;
				$realisasi = $jumlah_kinerja->jumlah;
				$deviasi =  $realisasi - $target;
				$score =  (1 - ($deviasi/$target))*100;
				if($score < 80)
				{
					$normal_score = 80;
				}
				else if($score > 120)
				{
					$normal_score = 120;
				}
				else
				{
					$normal_score = $score;
				}
				$nilai = $normal_score * $bobot / 100;
				$jumlah_nilai = $jumlah_nilai + $nilai;
				
				//var_dump($target,$realisasi,$deviasi,$score,$normal_score,$nilai);
				//echo $deviasi;
				
				$data1 = Array(
					'ID_JENIS_KPI_APMS' => 4,
					'ID_LOG_HARIAN' => $id_log_h,
					'BOBOT' => $bobot,
					'TARGET' => $target,
					'REALISASI' => $realisasi,
					'SCORE' => $score,
					'NORMAL_SCORE' => $normal_score,
					'FINAL_SCORE' => $nilai,
				);
				$insert = $this->m_kpi_apms->insertKPIApms($data1);
				
				$bobot = 5;
				$target = $this->input->post('kpitarget1', true);
				$realisasi = $this->input->post('kpirealisasi1', true);
				$deviasi =  $realisasi - $target;
				$score =  (1 - ($deviasi/$target))*100;
				if($score < 80)
				{
					$normal_score = 80;
				}
				else if($score > 120)
				{
					$normal_score = 120;
				}
				else
				{
					$normal_score = $score;
				}
				$nilai = $normal_score * $bobot / 100;
				$jumlah_nilai = $jumlah_nilai + $nilai;
				//var_dump($target,$realisasi,$deviasi,$score,$normal_score,$nilai);
				//echo $deviasi;
				
				$data1 = Array(
					'ID_JENIS_KPI_APMS' => 1,
					'ID_LOG_HARIAN' => $id_log_h,
					'BOBOT' => $bobot,
					'TARGET' => $target,
					'REALISASI' => $realisasi,
					'SCORE' => $score,
					'NORMAL_SCORE' => $normal_score,
					'FINAL_SCORE' => $nilai,
				);
				$insert = $this->m_kpi_apms->insertKPIApms($data1);
				
				$bobot = 5;
				$target = $this->input->post('kpitarget2', true);
				$realisasi = $this->input->post('kpirealisasi2', true);
				$deviasi =  $realisasi - $target;
				$score =  (1 - ($deviasi/$target))*100;
				if($score < 80)
				{
					$normal_score = 80;
				}
				else if($score > 120)
				{
					$normal_score = 120;
				}
				else
				{
					$normal_score = $score;
				}
				$nilai = $normal_score * $bobot / 100;
				$jumlah_nilai = $jumlah_nilai + $nilai;
				//var_dump($target,$realisasi,$deviasi,$score,$normal_score,$nilai);
				//echo $deviasi;
				
				$data1 = Array(
					'ID_JENIS_KPI_APMS' => 2,
					'ID_LOG_HARIAN' => $id_log_h,
					'BOBOT' => $bobot,
					'TARGET' => $target,
					'REALISASI' => $realisasi,
					'SCORE' => $score,
					'NORMAL_SCORE' => $normal_score,
					'FINAL_SCORE' => $nilai,
				);
				$insert = $this->m_kpi_apms->insertKPIApms($data1);
				
				$bobot = 5;
				$target = $this->input->post('kpitarget2', true);
				$realisasi = $this->input->post('kpirealisasi2', true);
				$deviasi =  $realisasi - $target;
				$score =  (1 - ($deviasi/$target))*100;
				if($score < 80)
				{
					$normal_score = 80;
				}
				else if($score > 120)
				{
					$normal_score = 120;
				}
				else
				{
					$normal_score = $score;
				}
				$nilai = $normal_score * $bobot / 100;
				$jumlah_nilai = $jumlah_nilai + $nilai;
				//var_dump($target,$realisasi,$deviasi,$score,$normal_score,$nilai);
				//echo $deviasi;
				
				$data1 = Array(
					'ID_JENIS_KPI_APMS' => 3,
					'ID_LOG_HARIAN' => $id_log_h,
					'BOBOT' => $bobot,
					'TARGET' => $target,
					'REALISASI' => $realisasi,
					'SCORE' => $score,
					'NORMAL_SCORE' => $normal_score,
					'FINAL_SCORE' => $nilai,
				);
				$insert = $this->m_kpi_apms->insertKPIApms($data1);
				
				$bobot = 30;
				$target = $this->input->post('kpitarget2', true);
				$realisasi = $this->input->post('kpirealisasi2', true);
				$deviasi =  $realisasi - $target;
				$score =  (1 - ($deviasi/$target))*100;
				if($score < 80)
				{
					$normal_score = 80;
				}
				else if($score > 120)
				{
					$normal_score = 120;
				}
				else
				{
					$normal_score = $score;
				}
				$nilai = $normal_score * $bobot / 100;
				$jumlah_nilai = $jumlah_nilai + $nilai;
				//var_dump($target,$realisasi,$deviasi,$score,$normal_score,$nilai);
				//echo $deviasi;
				
				$data1 = Array(
					'ID_JENIS_KPI_APMS' => 5,
					'ID_LOG_HARIAN' => $id_log_h,
					'BOBOT' => $bobot,
					'TARGET' => $target,
					'REALISASI' => $realisasi,
					'SCORE' => $score,
					'NORMAL_SCORE' => $normal_score,
					'FINAL_SCORE' => $nilai,
				);
				$insert = $this->m_kpi_apms->insertKPIApms($data1);
				
				$bobot = 10;
				$target = $this->input->post('kpitarget2', true);
				$realisasi = $this->input->post('kpirealisasi2', true);
				$deviasi =  $realisasi - $target;
				$score =  (1 - ($deviasi/$target))*100;
				if($score < 80)
				{
					$normal_score = 80;
				}
				else if($score > 120)
				{
					$normal_score = 120;
				}
				else
				{
					$normal_score = $score;
				}
				$nilai = $normal_score * $bobot / 100;
				$jumlah_nilai = $jumlah_nilai + $nilai;
				//var_dump($target,$realisasi,$deviasi,$score,$normal_score,$nilai);
				//echo $deviasi;
				
				$data1 = Array(
					'ID_JENIS_KPI_APMS' => 6,
					'ID_LOG_HARIAN' => $id_log_h,
					'BOBOT' => $bobot,
					'TARGET' => $target,
					'REALISASI' => $realisasi,
					'SCORE' => $score,
					'NORMAL_SCORE' => $normal_score,
					'FINAL_SCORE' => $nilai,
				);
				$insert = $this->m_kpi_apms->insertKPIApms($data1);
				
				$bobot = 10;
				$target = $this->input->post('kpitarget2', true);
				$realisasi = $this->input->post('kpirealisasi2', true);
				$deviasi =  $realisasi - $target;
				$score =  (1 - ($deviasi/$target))*100;
				if($score < 80)
				{
					$normal_score = 80;
				}
				else if($score > 120)
				{
					$normal_score = 120;
				}
				else
				{
					$normal_score = $score;
				}
				$nilai = $normal_score * $bobot / 100;
				$jumlah_nilai = $jumlah_nilai + $nilai;
				//var_dump($target,$realisasi,$deviasi,$score,$normal_score,$nilai);
				//echo $deviasi;
				
				$data1 = Array(
					'ID_JENIS_KPI_APMS' => 7,
					'ID_LOG_HARIAN' => $id_log_h,
					'BOBOT' => $bobot,
					'TARGET' => $target,
					'REALISASI' => $realisasi,
					'SCORE' => $score,
					'NORMAL_SCORE' => $normal_score,
					'FINAL_SCORE' => $nilai,
				);
				$insert = $this->m_kpi_apms->insertKPIApms($data1);
				
				$bobot = 10;
				$target = $this->input->post('kpitarget2', true);
				$realisasi = $this->input->post('kpirealisasi2', true);
				$deviasi =  $realisasi - $target;
				$score =  (1 - ($deviasi/$target))*100;
				if($score < 80)
				{
					$normal_score = 80;
				}
				else if($score > 120)
				{
					$normal_score = 120;
				}
				else
				{
					$normal_score = $score;
				}
				$nilai = $normal_score * $bobot / 100;
				$jumlah_nilai = $jumlah_nilai + $nilai;
				//var_dump($target,$realisasi,$deviasi,$score,$normal_score,$nilai);
				//echo $deviasi;
				
				$data1 = Array(
					'ID_JENIS_KPI_APMS' => 8,
					'ID_LOG_HARIAN' => $id_log_h,
					'BOBOT' => $bobot,
					'TARGET' => $target,
					'REALISASI' => $realisasi,
					'SCORE' => $score,
					'NORMAL_SCORE' => $normal_score,
					'FINAL_SCORE' => $nilai,
				);
				$insert = $this->m_kpi_apms->insertKPIApms($data1);
				
				$bobot = 5;
				$target = $this->input->post('kpitarget2', true);
				$realisasi = $this->input->post('kpirealisasi2', true);
				$deviasi =  $realisasi - $target;
				$score =  (1 - ($deviasi/$target))*100;
				if($score < 80)
				{
					$normal_score = 80;
				}
				else if($score > 120)
				{
					$normal_score = 120;
				}
				else
				{
					$normal_score = $score;
				}
				$nilai = $normal_score * $bobot / 100;
				$jumlah_nilai = $jumlah_nilai + $nilai;
				//var_dump($target,$realisasi,$deviasi,$score,$normal_score,$nilai);
				//echo $deviasi;
				
				$data1 = Array(
					'ID_JENIS_KPI_APMS' => 9,	
					'ID_LOG_HARIAN' => $id_log_h,
					'BOBOT' => $bobot,
					'TARGET' => $target,
					'REALISASI' => $realisasi,
					'SCORE' => $score,
					'NORMAL_SCORE' => $normal_score,
					'FINAL_SCORE' => $nilai,
				);
				$insert = $this->m_kpi_apms->insertKPIApms($data1);
				
				$datanilai = array(
					'ID_LOG_HARIAN' => $id_log_h,
					'ID_JENIS_PENILAIAN' => 73,
					'NILAI' => $jumlah_nilai,
				);
				
				$insert = $this->m_apms->insertnilaiApms($datanilai);
				
				$datalog = array(
					'keterangan' => 'Menambah Data KPI APMS',
					'id_pegawai' => $this->session->userdata("id_pegawai"),
					'keyword' => 'Tambah'
				);
				$this->m_log_sistem->insertLog($datalog);
				
				$data1['pesan'] = 1;
				$data1['pesan_text'] = "Data KPI APMS Berhasil Ditambahkan!";
				
					
			}
			else
			{
				$data1['pesan'] = 2;
				$data1['pesan_text'] = "Data Rencana APMS Tidak Ditemukan. Silahkan Isi terlebih dahulu rencana APMS!";
			}
		}
		if($this->input->post('edit')=="Simpan")
		{
				$jumlah_nilai = 0;
				$bobot = 5;
				
				$target = $this->input->post('kpitarget1', true);
				$realisasi = $this->input->post('kpirealisasi1', true);
				$id = $this->input->post('idkpi1', true);
				
				$deviasi =  $realisasi - $target;
				$score =  (1 - ($deviasi/$target))*100;
				if($score < 80)
				{
					$normal_score = 80;
				}
				else if($score > 120)
				{
					$normal_score = 120;
				}
				else
				{
					$normal_score = $score;
				}
				$nilai = $normal_score * $bobot / 100;
				$jumlah_nilai = $jumlah_nilai + $nilai;
				//var_dump($target,$realisasi,$deviasi,$score,$normal_score,$nilai);
				//echo $deviasi;
				
				$data1 = Array(
					'ID_JENIS_KPI_APMS' => 1,
					'ID_LOG_HARIAN' => $id_log_h,
					'BOBOT' => $bobot,
					'TARGET' => $target,
					'REALISASI' => $realisasi,
					'SCORE' => $score,
					'NORMAL_SCORE' => $normal_score,
					'FINAL_SCORE' => $nilai,
				);
				$edit = $this->m_kpi_apms->editKPIApms($data1,$id);
				
				//2
				$bobot = 5;
				$target = $this->input->post('kpitarget2', true);
				$realisasi = $this->input->post('kpirealisasi2', true);
				$id = $this->input->post('idkpi2', true);
				
				$deviasi =  $realisasi - $target;
				$score =  (1 - ($deviasi/$target))*100;
				if($score < 80)
				{
					$normal_score = 80;
				}
				else if($score > 120)
				{
					$normal_score = 120;
				}
				else
				{
					$normal_score = $score;
				}
				$nilai = $normal_score * $bobot / 100;
				$jumlah_nilai = $jumlah_nilai + $nilai;
				//var_dump($target,$realisasi,$deviasi,$score,$normal_score,$nilai);
				//echo $deviasi;
				
				$data1 = Array(
					'ID_JENIS_KPI_APMS' => 1,
					'ID_LOG_HARIAN' => $id_log_h,
					'BOBOT' => $bobot,
					'TARGET' => $target,
					'REALISASI' => $realisasi,
					'SCORE' => $score,
					'NORMAL_SCORE' => $normal_score,
					'FINAL_SCORE' => $nilai,
				);
				$edit = $this->m_kpi_apms->editKPIApms($data1,$id);
				
					//3
				$bobot = 5;
				$target = $this->input->post('kpitarget3', true);
				$realisasi = $this->input->post('kpirealisasi3', true);
				$id = $this->input->post('idkpi3', true);
				
				$deviasi =  $realisasi - $target;
				$score =  (1 - ($deviasi/$target))*100;
				if($score < 80)
				{
					$normal_score = 80;
				}
				else if($score > 120)
				{
					$normal_score = 120;
				}
				else
				{
					$normal_score = $score;
				}
				$nilai = $normal_score * $bobot / 100;
				$jumlah_nilai = $jumlah_nilai + $nilai;
				//var_dump($target,$realisasi,$deviasi,$score,$normal_score,$nilai);
				//echo $deviasi;
				
				$data1 = Array(
					'ID_JENIS_KPI_APMS' => 1,
					'ID_LOG_HARIAN' => $id_log_h,
					'BOBOT' => $bobot,
					'TARGET' => $target,
					'REALISASI' => $realisasi,
					'SCORE' => $score,
					'NORMAL_SCORE' => $normal_score,
					'FINAL_SCORE' => $nilai,
				);
				$edit = $this->m_kpi_apms->editKPIApms($data1,$id);
					//4
				$bobot = 30;
				$target = $this->input->post('kpitarget4', true);
				$realisasi = $this->input->post('kpirealisasi4', true);
				$id = $this->input->post('idkpi4', true);
				
				$deviasi =  $realisasi - $target;
				$score =  (1 - ($deviasi/$target))*100;
				if($score < 80)
				{
					$normal_score = 80;
				}
				else if($score > 120)
				{
					$normal_score = 120;
				}
				else
				{
					$normal_score = $score;
				}
				$nilai = $normal_score * $bobot / 100;
				$jumlah_nilai = $jumlah_nilai + $nilai;
				//var_dump($target,$realisasi,$deviasi,$score,$normal_score,$nilai);
				//echo $deviasi;
				
				$data1 = Array(
					'ID_JENIS_KPI_APMS' => 1,
					'ID_LOG_HARIAN' => $id_log_h,
					'BOBOT' => $bobot,
					'TARGET' => $target,
					'REALISASI' => $realisasi,
					'SCORE' => $score,
					'NORMAL_SCORE' => $normal_score,
					'FINAL_SCORE' => $nilai,
				);
				$edit = $this->m_kpi_apms->editKPIApms($data1,$id);
					//5
				$bobot = 10;
				$target = $this->input->post('kpitarget5', true);
				$realisasi = $this->input->post('kpirealisasi5', true);
				$id = $this->input->post('idkpi5', true);
				
				$deviasi =  $realisasi - $target;
				$score =  (1 - ($deviasi/$target))*100;
				if($score < 80)
				{
					$normal_score = 80;
				}
				else if($score > 120)
				{
					$normal_score = 120;
				}
				else
				{
					$normal_score = $score;
				}
				$nilai = $normal_score * $bobot / 100;
				$jumlah_nilai = $jumlah_nilai + $nilai;
				//var_dump($target,$realisasi,$deviasi,$score,$normal_score,$nilai);
				//echo $deviasi;
				
				$data1 = Array(
					'ID_JENIS_KPI_APMS' => 1,
					'ID_LOG_HARIAN' => $id_log_h,
					'BOBOT' => $bobot,
					'TARGET' => $target,
					'REALISASI' => $realisasi,
					'SCORE' => $score,
					'NORMAL_SCORE' => $normal_score,
					'FINAL_SCORE' => $nilai,
				);
				$edit = $this->m_kpi_apms->editKPIApms($data1,$id);
					//6
				$bobot = 10;
				$target = $this->input->post('kpitarget6', true);
				$realisasi = $this->input->post('kpirealisasi6', true);
				$id = $this->input->post('idkpi6', true);
				
				$deviasi =  $realisasi - $target;
				$score =  (1 - ($deviasi/$target))*100;
				if($score < 80)
				{
					$normal_score = 80;
				}
				else if($score > 120)
				{
					$normal_score = 120;
				}
				else
				{
					$normal_score = $score;
				}
				$nilai = $normal_score * $bobot / 100;
				$jumlah_nilai = $jumlah_nilai + $nilai;
				//var_dump($target,$realisasi,$deviasi,$score,$normal_score,$nilai);
				//echo $deviasi;
				
				$data1 = Array(
					'ID_JENIS_KPI_APMS' => 1,
					'ID_LOG_HARIAN' => $id_log_h,
					'BOBOT' => $bobot,
					'TARGET' => $target,
					'REALISASI' => $realisasi,
					'SCORE' => $score,
					'NORMAL_SCORE' => $normal_score,
					'FINAL_SCORE' => $nilai,
				);
				$edit = $this->m_kpi_apms->editKPIApms($data1,$id);
					//7
				$bobot = 10;
				$target = $this->input->post('kpitarget7', true);
				$realisasi = $this->input->post('kpirealisasi7', true);
				$id = $this->input->post('idkpi7', true);
				
				$deviasi =  $realisasi - $target;
				$score =  (1 - ($deviasi/$target))*100;
				if($score < 80)
				{
					$normal_score = 80;
				}
				else if($score > 120)
				{
					$normal_score = 120;
				}
				else
				{
					$normal_score = $score;
				}
				$nilai = $normal_score * $bobot / 100;
				$jumlah_nilai = $jumlah_nilai + $nilai;
				//var_dump($target,$realisasi,$deviasi,$score,$normal_score,$nilai);
				//echo $deviasi;
				
				$data1 = Array(
					'ID_JENIS_KPI_APMS' => 1,
					'ID_LOG_HARIAN' => $id_log_h,
					'BOBOT' => $bobot,
					'TARGET' => $target,
					'REALISASI' => $realisasi,
					'SCORE' => $score,
					'NORMAL_SCORE' => $normal_score,
					'FINAL_SCORE' => $nilai,
				);
				$edit = $this->m_kpi_apms->editKPIApms($data1,$id);
					//8
				$bobot = 5;
				$target = $this->input->post('kpitarget8', true);
				$realisasi = $this->input->post('kpirealisasi8', true);
				$id = $this->input->post('idkpi8', true);
				
				$deviasi =  $realisasi - $target;
				$score =  (1 - ($deviasi/$target))*100;
				if($score < 80)
				{
					$normal_score = 80;
				}
				else if($score > 120)
				{
					$normal_score = 120;
				}
				else
				{
					$normal_score = $score;
				}
				$nilai = $normal_score * $bobot / 100;
				$jumlah_nilai = $jumlah_nilai + $nilai;
				//var_dump($target,$realisasi,$deviasi,$score,$normal_score,$nilai);
				//echo $deviasi;
				
				$data1 = Array(
					'ID_JENIS_KPI_APMS' => 1,
					'ID_LOG_HARIAN' => $id_log_h,
					'BOBOT' => $bobot,
					'TARGET' => $target,
					'REALISASI' => $realisasi,
					'SCORE' => $score,
					'NORMAL_SCORE' => $normal_score,
					'FINAL_SCORE' => $nilai,
				);
				$edit = $this->m_kpi_apms->editKPIApms($data1,$id);
				
				$datalog = array(
					'keterangan' => 'Mengedit Data KPI APMS',
					'id_pegawai' => $this->session->userdata("id_pegawai"),
					'keyword' => 'Edit'
				);
				$this->m_log_sistem->insertLog($datalog);
				
				$data1['pesan'] = 1;
				$data1['pesan_text'] = "Data KPI APMS Berhasil Diubah!";
		}
		
		$data['lv1'] = 4;
		$data['lv2'] = 4;
		$data3 = menu_ss();
		$data1['kpi_apms'] = $this->m_kpi_apms->selectKPIApms($depot,$tahun,$bulan);
		$this->load->view('layouts/header');
		$this->load->view('layouts/menu', $data3);
		$this->load->view('layouts/navbar', $data);
		$this->load->view('apms/v_kpi_apms', $data1);
		$this->load->view('layouts/footer');
	
    }
}
