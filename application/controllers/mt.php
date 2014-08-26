<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mt extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model("m_mt");
        $this->load->model("m_apar");
        $this->load->model("m_log_sistem");
        $this->load->helper(array('form', 'url'));
    }

    public function index() {
        $this->data_mt();

    }
    
//data MT
    
    public function data_mt() {

        
        $depot = $this->session->userdata('id_depot');
        $data1['mt'] = $this->m_mt->selectMT($depot);

        $data['lv1'] = 3;
        $data['lv2'] = 1;
        $this->header($data);
        $this->load->view('mt/v_data_mt', $data1);
        $this->footer();
    }
    
    public function tambah_mobil() {

        $depot = $this->session->userdata("id_depot");

        $data = array(
            'depot' => $depot,
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
    
//Import CSV
    public function import_csv() {

        $data['lv1'] = 3;
        $data['lv2'] = 1;
        $this->header($data);
        $this->load->view('mt/v_import_csv');
        $this->footer();
    }
    
//APAR MT
    public function apar_mt($id_mobil) {
        
        
        $data1['apar'] = $this->m_mt->selectApar($id_mobil);
        $data1['dataMobil']=$this->m_mt->selectMobil($id_mobil);
        
        $data['lv1'] = 3;
        $data['lv2'] = 1;
        $this->header($data);
        $this->load->view('mt/v_apar_mt',$data1);
        
        $this->footer();
    }
    
    public function tambah_apar() {

        $id_mobil = 1;

        $data = array(
            'id_mobil' => $id_mobil,
            'STORE_PRESSURE' => $this->input->post('STORE_PRESSURE', true),
            'CATRIDGE' => $this->input->post('CATRIDGE', true),
            'CO2' => $this->input->post('CO2', true),
            'KETERANGAN_APAR' => $this->input->post('KETERANGAN_APAR', true),
            'STATUS_APAR' => $this->input->post('STATUS_APAR', true),
        );

        $this->m_mt->insertApar($data);
        $link = base_url() . "mt/apar_mt/".$id_mobil;
        
        echo '<script type="text/javascript">alert("Data berhasil ditambahkan.");';
        echo 'window.location.href="' . $link . '"';
        echo '</script>';
    }
    
    public function edit_apar($id) {
        
        $store = $_POST['STORE_PRESSURE'];
        $catridge = $_POST['CATRIDGE'];
        $co2 = $_POST['CO2'];
        $keterangan= $_POST['KETERANGAN_APAR'];
        $status= $_POST['STATUS_APAR'];
        
        $data = array(
            "STORE_PRESSURE"=>$store,
            "CATRIDGE"=>$catridge,
            "CO2"=>$co2,
            "KETERANGAN_APAR" =>$keterangan,
            "STATUS_APAR" =>$status,
        );
        
        $id_mobil=1;
       
        $this->m_mt->editApar($data,$id);
        
        $link = base_url()."mt/apar_mt/".$id_mobil;
        echo '<script type="text/javascript">alert("Data berhasil diubah.");';
        echo 'window.location.href="' . $link . '"';
        echo '</script>';
        
        
    }
    
    public function delete_apar($id_apar){
        $this->m_mt->deleteApar($id_apar);
        
        $id_mobil = 1;
        
        $link = base_url()."mt/apar_mt/".$id_mobil;
        echo '<script type="text/javascript">alert("Data berhasil dihapus.");';
        echo 'window.location.href="' . $link . '"';
        echo '</script>';
    }

//Ban MT    
    
    public function ban_mt($id_mobil) {

        
        $data1['ban'] = $this->m_mt->selectBanMT($id_mobil);
        $data1['dataMobil']=$this->m_mt->selectMobil($id_mobil);
       
        
        $data['lv1'] = 3;
        $data['lv2'] = 1;
        $this->header($data);
        $this->load->view('mt/v_ban_mt',$data1);
        $this->footer();
    }
    
    public function tambah_ban() {

        $id_mobil = 1;

        $data = array(
            'id_mobil' => $id_mobil,
            'MERK_BAN' => $this->input->post('MERK_BAN', true),
            'NO_SERI_BAN' => $this->input->post('NO_SERI_BAN', true),
            'JENIS_BAN' => $this->input->post('JENIS_BAN', true),
            'POSISI_BAN' => $this->input->post('POSISI_BAN', true),
            'TANGGAL_PASANG' => $this->input->post('TANGGAL_PASANG', true),
            'TANGGAL_GANTI_BAN' => $this->input->post('TANGGAL_GANTI_BAN', true),
        );

        $this->m_mt->insertBan($data);
        $link = base_url() . "mt/ban_mt/".$id_mobil;
        echo '<script type="text/javascript">alert("Data berhasil ditambahkan.");';
        echo 'window.location.href="' . $link . '"';
        echo '</script>';
    }
    
     public function edit_ban($id) {

        $merk = $_POST['MERK_BAN'];
        $seri = $_POST['NO_SERI_BAN'];
        $jenis = $_POST['JENIS_BAN'];
        $posisi= $_POST['POSISI_BAN'];
        $tgl_pasang= $_POST['TANGGAL_PASANG'];
        $tgl_ganti= $_POST['TANGGAL_GANTI_BAN'];
        
        $data = array(
            "MERK_BAN"=>$merk,
            "NO_SERI_BAN"=>$seri,
            "JENIS_BAN"=>$jenis,
            "POSISI_BAN" =>$posisi,
            "TANGGAL_PASANG" =>$tgl_pasang,
            "TANGGAL_GANTI_BAN" =>$tgl_ganti,
            );
        
        $id_mobil=1;
        $this->m_mt->editBan($data, $id);
        
         $link = base_url()."mt/ban_mt/".$id_mobil;
        echo '<script type="text/javascript">alert("Data berhasil diubah.");';
        echo 'window.location.href="' . $link . '"';
        echo '</script>';
        
    }
    
     public function delete_ban($id_ban){
         
        $this->m_mt->deleteBan($id_ban);
        
        $id_mobil = 1;
        
        $link = base_url()."mt/ban_mt/".$id_mobil;
        echo '<script type="text/javascript">alert("Data berhasil dihapus.");';
        echo 'window.location.href="' . $link . '"';
        echo '</script>';
     }
     
     //oli

    public function oli_mt($id_mobil) {

        
        $data1['oli'] = $this->m_mt->selectOli($id_mobil);
        $data1['dataMobil']=$this->m_mt->selectMobil($id_mobil);
        
        
        $data['lv1'] = 3;
        $data['lv2'] = 1;
        $this->header($data);
        $this->load->view('mt/v_oli_mt',$data1);
        $this->footer();
    }
    
    public function tambah_oli() {

        $id_mobil = 1;

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
    
    public function edit_oli($id) {

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
        
        $id_mobil=1;
        $this->m_mt->editOli($data, $id);
        
         $link = base_url()."mt/oli_mt/".$id_mobil;
        echo '<script type="text/javascript">alert("Data berhasil diubah.");';
        echo 'window.location.href="' . $link . '"';
        echo '</script>';
        
    }
    
    public function delete_oli($id_oli){
         
        $this->m_mt->deleteOli($id_oli);
        
        $id_mobil = 1;
        
        $link = base_url()."mt/oli_mt/".$id_mobil;
        echo '<script type="text/javascript">alert("Data berhasil dihapus.");';
        echo 'window.location.href="' . $link . '"';
        echo '</script>';
     }

    
    //Data Surat
    public function surat_mt($id_mobil) {
        
        $data1['surat'] = $this->m_mt->selectSurat($id_mobil);
        $data1['dataMobil']=$this->m_mt->selectMobil($id_mobil);
        
        $data['lv1'] = 3;
        $data['lv2'] = 1;
        $this->header($data);
        $this->load->view('mt/v_surat_mt',$data1);
        $this->footer();
    }
    
    public function tambah_surat() {

        $id_mobil = 1;

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
    
    public function edit_surat($id) {

        $surat = $_POST['ID_JENIS_SURAT'];
        $tgl = $_POST['TANGGAL_AKHIR_SURAT'];
        $keterangan = $_POST['KETERANGAN_SURAT'];
       
        
        $data = array(
            "ID_JENIS_SURAT"=>$surat,
            "TANGGAL_AKHIR_SURAT"=>$tgl,
            "KETERANGAN_SURAT" =>$keterangan,
            );
        
        $id_mobil=1;
        $this->m_mt->editSurat($data, $id);
        
         $link = base_url()."mt/surat_mt/".$id_mobil;
        echo '<script type="text/javascript">alert("Data berhasil diubah.");';
        echo 'window.location.href="' . $link . '"';
        echo '</script>';
        
    }
    
      public function delete_surat($id_surat){
         
        $this->m_mt->deleteSurat($id_surat);
        
        $id_mobil = 1;
        
        $link = base_url()."mt/surat_mt/".$id_mobil;
        echo '<script type="text/javascript">alert("Data berhasil dihapus.");';
        echo 'window.location.href="' . $link . '"';
        echo '</script>';
     }
     
     //Data Grafik
    
    
    public function grafik_mt() {


        $data['lv1'] = 3;
        $data['lv2'] = 2;
        $this->header($data);
        $this->load->view('mt/v_grafik_mt');
        $this->footer();
    }

    public function grafik_bulan_mt() {

        $data['lv1'] = 3;

        $data['lv2'] = 2;
        $this->header($data);
        $this->load->view('mt/v_grafik_bulan_mt');
        $this->footer();
    }

    public function grafik_hari_mt() {

        $data['lv1'] = 3;
        $data['lv2'] = 2;
        $this->header($data);
        $this->load->view('mt/v_grafik_hari_mt');
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
        $data['lv1'] = 3;
        $data['lv2'] = 4;
        //data reminder
        $data2['apar'] = $this->m_apar->getAparReminder()->result();
        $this->header($data);
        $this->load->view('mt/v_pengingat', $data2);
        $this->footer();
    }
    
    
    public function edit_reminder_apar($id)
    {
        $store = $_POST['tgl_store'];
        $catridge = $_POST['tgl_catridge'];
        $co2 = $_POST['tgl_co2'];
        
        $data = array(
            "STORE_PRESSURE"=>$store,
            "CATRIDGE"=>$catridge,
            "CO2"=>$co2
        );
        
        $this->m_apar->editReminderApar($id,$data);
        //redirect('mt/reminder');
          echo '<script type="text/javascript">alert("Pengingat apar berhasil diubah");';
            echo 'window.location.href="' . base_url() . 'mt/reminder";';
            echo '</script>';
    }
    

    
    public function rencana() {
        
        
        $id_log_harian = 1;
        $data['rencana'] = $this->m_mt->selectRencana($id_log_harian);
        
        
        $data['lv1'] = 3;
        $data['lv2'] = 5;
        $this->header($data);
        $this->load->view('mt/v_rencana',$data);
        $this->footer();
    }
    
    public function tambah_rencana() {

        $id_log_harian = 1;

        $data = array(
            'id_log_harian' => $id_log_harian,
            'R_PREMIUM' => $this->input->post('R_PREMIUM', true),
            'R_PERTAMAX' => $this->input->post('R_PERTAMAX', true),
            'R_PERTAMAXPLUS' => $this->input->post('R_PERTAMAXPLUS', true),
            'R_PERTAMINADEX' => $this->input->post('R_PERTAMINADEX', true),
            'R_BIOSOLAR' => $this->input->post('R_BIOSOLAR', true),
            'R_SOLAR' => $this->input->post('R_SOLAR', true),
            'R_OWN_USE' => $this->input->post('R_OWN_USE', true),
        );

        $this->m_mt->insertRencana($data);
        $link = base_url() . "mt/rencana/";
        
        echo '<script type="text/javascript">alert("Data berhasil ditambahkan.");';
        echo 'window.location.href="' . $link . '"';
        echo '</script>';
    }
    

    private function header($data) {
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
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