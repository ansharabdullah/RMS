<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class peringatan extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_peringatan');
    }

    public function index() {
    }
    
    public function tambah_peringatan(){
        $data = array(
            'id_pegawai' => $this->input->post('id_pegawai', true),
            'peringatan_pegawai' => $this->input->post('peringatan_pegawai', true),
            'jenis_peringatan' => $this->input->post('jenis_peringatan', true),
            'tanggal_berlaku' => $this->input->post('tanggal_berlaku', true),
            'tanggal_berakhir' => $this->input->post('tanggal_berakhir', true)
        );
        
        $this->m_peringatan->insertPeringatan($data);
        
        $id_pegawai = $this->input->post('id_pegawai', true);
        $link = base_url() . "amt/detail/" . $id_pegawai;
        echo '<script type="text/javascript">alert("Data berhasil ditambahkan.");';
        echo 'window.location.href="' . $link . '"';
        echo '</script>';
        
    }
    
    public function edit_peringatan(){
        $data = array(
            'peringatan_pegawai' => $this->input->post('peringatan_pegawai', true),
            'jenis_peringatan' => $this->input->post('jenis_peringatan', true),
            'tanggal_berlaku' => $this->input->post('tanggal_berlaku', true),
            'tanggal_berakhir' => $this->input->post('tanggal_berakhir', true)
        );
        $id_pegawai = $this->input->post('id_pegawai', true);
        $id_log_peringatan = $this->input->post('id_log_peringatan', true);
        
        $this->m_peringatan->updatePeringatan($data,$id_log_peringatan);
        $link = base_url() . "amt/detail/" . $id_pegawai;
        echo '<script type="text/javascript">alert("Data berhasil diubah.");';
        echo 'window.location.href="' . $link . '"';
        echo '</script>';
    }
    
    public function delete_peringatan($id_log_peringatan, $id_pegawai){
        $this->m_peringatan->deletePeringatan($id_log_peringatan);
        $link = base_url() . "amt/detail/" . $id_pegawai;
        echo '<script type="text/javascript">alert("Data berhasil dihapus.");';
        echo 'window.location.href="' . $link . '"';
        echo '</script>';
    }
}