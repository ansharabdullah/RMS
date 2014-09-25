<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class pengaturan extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_pengaturan');
        $this->load->model('m_amt');
        $this->load->model('m_depot');
        $this->load->model('m_log_harian');
    }

    public function index() {
        if (($this->session->userdata('isLoggedIn')) && (($this->session->userdata('id_role') == 1) || ($this->session->userdata('id_role') == 2) )) {
            $this->pengaturan_oam();
        } else if (($this->session->userdata('isLoggedIn')) && (($this->session->userdata('id_role') != 1) || ($this->session->userdata('id_role') != 2) )) {
            $this->pengaturan_ss();
        } else {
            redirect(base_url() . "login/");
        }
    }

    public function pengaturan_oam() {
        $q = $this->m_pengaturan->getCountDepot();
        $depot = $q[0]->count;
        $data['lv1'] = $depot + 3;
        $data['lv2'] = 1;

        $depot = $this->session->userdata('id_depot');
        $data1['user'] = $this->m_pengaturan->selectAllUser();
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->navbar($data['lv1'], $data['lv2']);
        $this->load->view('oam/v_pengaturan', $data1);
        $this->load->view('layouts/footer');
    }

    public function pengaturan_depot() {
        $q = $this->m_pengaturan->getCountDepot();
        $depot = $q[0]->count;
        $data['lv1'] = $depot + 4;
        $data['lv2'] = 1;

        $depot = $this->session->userdata('id_depot');
        $data1['depot'] = $this->m_pengaturan->selectAllDepot();
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->navbar($data['lv1'], $data['lv2']);
        $this->load->view('oam/v_pengaturan_depot', $data1);
        $this->load->view('layouts/footer');
    }

    public function set_depot() {

        //insert depot
        $data = array(
            'nama_depot' => $this->input->post('nama_depot', true),
            'alamat_depot' => $this->input->post('alamat_depot', true),
            'nama_oh' => $this->input->post('nama_oh', true),
        );
        $this->m_pengaturan->tambahDepot($data);

        //get id depot terbesar
        $q = $this->m_pengaturan->getMaxIdDepot();
        $depot = $q[0]->id_depot;

        //insert pegawai
        $data1 = array(
            'nama_pegawai' => $this->input->post('nama_pegawai', true),
            'nip' => $this->input->post('nip', true),
            'id_depot' => $depot,
        );
        $this->m_amt->insertPegawai($data1);

        //insert ke role_assignment
        $data = $this->m_amt->getMaxIDPegawai($depot);
        foreach ($data as $row) {
            $id_pegawai = $row->max;
        }
        $data2 = array(
            'email' => $this->input->post('email', true),
            'id_pegawai' => $id_pegawai,
            'id_role' => 3,
            'password' => '81dc9bdb52d04dc20036dbd8313ed055'
        );
        $this->m_pengaturan->insertAkun($data2);

        //insert log harian
        $tahun = date('Y');
        $cek = $this->m_log_harian->cekLog($depot, $tahun);
        // Set timezone
        if ($cek[0]->jumlah < 1) {
            date_default_timezone_set('UTC');

            // Start date
            $date = date('Y-m-d');
            // End date
            $end_date = date('Y') . '-12-31';
            $i = 0;
            while (strtotime($date) <= strtotime($end_date)) {
                $data[$i] = array(
                    'id_depot' => $depot,
                    'tanggal_log_harian' => $date
                );
                $date = date("Y-m-d", strtotime("+1 day", strtotime($date)));
                $i++;
            }
            $this->m_log_harian->insertLogHarian($data);
        }

        $link = base_url() . "pengaturan/pengaturan_depot/";
        echo '<script type="text/javascript">alert("Data berhasil ditambahkan.");';
        echo 'window.location.href="' . $link . '"';
        echo '</script>';
    }

    public function ubah_depot() {
        $depot = $this->input->post('id_depot', true);
        $data = array(
            'nama_depot' => $this->input->post('nama_depot', true),
            'alamat_depot' => $this->input->post('alamat_depot', true),
            'nama_oh' => $this->input->post('nama_oh', true),
        );
        $this->m_pengaturan->editDepot($data, $depot);

        $link = base_url() . "pengaturan/pengaturan_depot/";
        echo '<script type="text/javascript">alert("Data berhasil diubah.");';
        echo 'window.location.href="' . $link . '"';
        echo '</script>';
    }

    public function hapus_depot($id_depot) {
        $this->m_pengaturan->deleteDepot($id_depot);

        $link = base_url() . "pengaturan/pengaturan_depot/";
        echo '<script type="text/javascript">alert("Data berhasil dihapus.");';
        echo 'window.location.href="' . $link . '"';
        echo '</script>';
    }

    public function navbar($lv1, $lv2) {
        $data['lv1'] = $lv1;
        $data['lv2'] = $lv2;
        $data['depot'] = $this->m_depot->get_depot();
        $this->load->view('layouts/navbar_oam', $data);
    }

    public function pengaturan_ss() {
        $data['lv1'] = 9;
        $data['lv2'] = 1;
        $depot = $this->session->userdata('id_depot');
        $data1['user'] = $this->m_pengaturan->selectAllUserDepot($depot);
        $data1['depot'] = $this->m_pengaturan->selectDepot($depot);
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->load->view('layouts/navbar', $data);
        $this->load->view('pengaturan/v_pengaturan', $data1);
        $this->load->view('layouts/footer');
    }

    public function edit_depot() {
        $depot = $this->session->userdata('id_depot');
        $data = array(
            'nama_depot' => $this->input->post('nama_depot', true),
            'alamat_depot' => $this->input->post('alamat_depot', true),
            'nama_oh' => $this->input->post('nama_oh', true),
        );
        $this->m_pengaturan->editDepot($data, $depot);

        $link = base_url() . "pengaturan/";
        echo '<script type="text/javascript">alert("Data berhasil diubah.");';
        echo 'window.location.href="' . $link . '"';
        echo '</script>';
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
        $this->m_amt->editPegawai($data1, $id_pegawai);
        $data2 = array(
            'email' => $this->input->post('email', true),
            'id_role' => $this->input->post('id_role', true),
        );
        $this->m_amt->editPegawai($data1, $id_pegawai);

        $link = base_url() . "pengaturan/";
        echo '<script type="text/javascript">alert("Data berhasil diubah.");';
        echo 'window.location.href="' . $link . '"';
        echo '</script>';
    }

    public function tambah_akun() {

        //insert ke tabel pegawai
        $depot = $this->session->userdata('id_depot');
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

    public function tambah_depot() {
        $data['lv1'] = 10;
        $data['lv2'] = 1;

        $depot = $this->session->userdata('id_depot');
        $data1['user'] = $this->m_pengaturan->selectAllUser();
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->navbar($data['lv1'], $data['lv2']);
        $this->load->view('oam/v_tambah_depot', $data1);
        $this->load->view('layouts/footer');
    }

}
