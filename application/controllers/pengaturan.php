<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class pengaturan extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_pengaturan');
        $this->load->model('m_amt');
    }

    public function index() {
        $data['lv1'] = 9;
        $data['lv2'] = 1;
        $data1['user'] = $this->m_pengaturan->selectAllUser();
        $data1['depot'] = $this->m_pengaturan->selectDepot();
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->load->view('layouts/navbar', $data);
        $this->load->view('pengaturan/v_pengaturan', $data1);
        $this->load->view('layouts/footer');
    }

    public function edit_depot() {
        $id_depot = $this->input->post('id_depot', true);
        $data = array(
            'nama_depot' => $this->input->post('nama_depot', true),
            'alamat_depot' => $this->input->post('alamat_depot', true),
            'nama_oh' => $this->input->post('nama_oh', true),
        );
        $this->m_pengaturan->editDepot($data, $id);
    }

    public function delete_akun($id_user) {
        $this->m_amt->deletePegawai($id_user);
        $this->m_pengaturan->deleteAkun($id_user);

        $link = base_url() . "pengaturan/";
        echo '<script type="text/javascript">alert("Data berhasil dihapus.");';
        echo 'window.location.href="' . $link . '"';
        echo '</script>';
    }

    public function edit_akun() {
        $id_pegawai = $this->input->post('id_pegawai', true);
        $id_role_assignment = $this->input->post('id_role_assignment', true);
        $data1 = array(
            'nama_pegawai' => $this->input->post('nama_pegawai', true),
            'nip' => $this->input->post('nip', true),
        );
        $this->m_amt->editPegawai($data1,$id_pegawai);
        $data2 = array(
            'email' => $this->input->post('email', true),
            'id_role' => $this->input->post('id_role', true),
        );
        echo $id_pegawai."<br>";
        echo $id_role_assignment."<br>";
        $this->m_amt->editPegawai($data1,$id_pegawai);
        
        $link = base_url() . "pengaturan/";
        echo '<script type="text/javascript">alert("Data berhasil diubah.");';
        echo 'window.location.href="' . $link . '"';
        echo '</script>';
    }

    public function tambah_akun() {

        //insert ke tabel pegawai
        $depot = 1;
        $data1 = array(
            'nama_pegawai' => $this->input->post('nama_pegawai', true),
            'nip' => $this->input->post('nip', true),
            'id_depot' => $depot,
        );
        $this->m_amt->insertPegawai($data1);

        //insert ke role_assignment
        $data = $this->m_amt->getMaxID();
        foreach ($data as $row) {
            $id_pegawai = $row->max;
        }
        $data2 = array(
            'email' => $this->input->post('email', true),
            'id_pegawai' => $id_pegawai,
            'id_role' => $this->input->post('id_role', true),
            'password' => '81dc9bdb52d04dc20036dbd8313ed055'
        );
        $this->m_pengaturan->insertAkun($data2);

        $link = base_url() . "pengaturan/";
        echo '<script type="text/javascript">alert("Data berhasil ditambahkan.");';
        echo 'window.location.href="' . $link . '"';
        echo '</script>';
    }

}
