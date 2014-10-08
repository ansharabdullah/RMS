<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class user extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_amt');
        $this->load->model('m_user');
        $this->load->model('m_depot');
        $this->load->model('m_log_sistem');
    }

    public function index() {
        $data1['feedback'] = 0;
        $data1['pesan'] = 0;

        if ($this->input->post('ubah_password', true)) {
            $password_lama = md5($this->input->post('password_lama', true));

            $id_pegawai = $this->input->post('id_pegawai', true);
            $password = $this->m_user->getAkun($id_pegawai);
            $password_db = $password[0]->PASSWORD;

            if ($password_db == $password_lama) {
                $password_baru = $this->input->post('password_baru', true);
                $password_konfirm = $this->input->post('password_konfirm', true);

                if ($password_baru == $password_konfirm) {
                    $data = array(
                        'password' => md5($password_baru)
                    );
                    $this->m_user->editPassword($data, $id_pegawai);

                    $datalog = array(
                        'keterangan' => 'Edit Password',
                        'id_pegawai' => $this->session->userdata("id_pegawai"),
                        'keyword' => 'EDIT'
                    );
                    $this->m_log_sistem->insertLog($datalog);

                    $pesan = "Data berhasil diubah.";
                    $data1['feedback'] = 1;
                    $data1['pesan'] = $pesan;
                } else {

                    $pesan = "Password Baru dan Konfirmasi Password Anda tidak cocok.";
                    $data1['feedback'] = 2;
                    $data1['pesan'] = $pesan;
                }
            } else {
                $pesan = "Password Lama Anda tidak cocok.";
                $data1['feedback'] = 2;
                $data1['pesan'] = $pesan;
            }
        } else if ($this->input->post('edit_profile', true)) {
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
            }

            $id_pegawai = $this->input->post('id_pegawai', true);
            if (isset($photo)) {
                $data = array(
                    'nip' => $this->input->post('nip', true),
                    'nama_pegawai' => $this->input->post('nama_pegawai', true),
                    'jabatan' => $this->input->post('jabatan', true),
                    'status' => $this->input->post('status', true),
                    'no_telepon' => $this->input->post('no_telepon', true),
                    'no_ktp' => $this->input->post('no_ktp', true),
                    'no_sim' => $this->input->post('no_sim', true),
                    'alamat' => $this->input->post('alamat', true),
                    'tempat_lahir' => $this->input->post('tempat_lahir', true),
                    'tanggal_lahir' => $this->input->post('tanggal_lahir', true),
                    'tanggal_masuk' => $this->input->post('tanggal_masuk', true),
                    'photo' => $photo
                );
            } else {
                $data = array(
                    'nip' => $this->input->post('nip', true),
                    'nama_pegawai' => $this->input->post('nama_pegawai', true),
                    'jabatan' => $this->input->post('jabatan', true),
                    'status' => $this->input->post('status', true),
                    'no_telepon' => $this->input->post('no_telepon', true),
                    'no_ktp' => $this->input->post('no_ktp', true),
                    'no_sim' => $this->input->post('no_sim', true),
                    'alamat' => $this->input->post('alamat', true),
                    'tempat_lahir' => $this->input->post('tempat_lahir', true),
                    'tanggal_lahir' => $this->input->post('tanggal_lahir', true),
                    'tanggal_masuk' => $this->input->post('tanggal_masuk', true)
                );
            }

            $this->m_amt->editPegawai($data, $id_pegawai);
            $datalog = array(
                'keterangan' => 'Edit Data Pribadi',
                'id_pegawai' => $this->session->userdata("id_pegawai"),
                'keyword' => 'EDIT'
            );
            $this->m_log_sistem->insertLog($datalog);
            $pesan = "Data berhasil diubah.";
            $data1['feedback'] = 1;
            $data1['pesan'] = $pesan;
        }
        if ($this->session->userdata('id_role') <= 2) {
            $data['lv1'] = 0;
            $data['lv2'] = 0;

            $id_pegawai = $this->session->userdata('id_pegawai');
            $data1['pegawai'] = $this->m_amt->detailPegawai($id_pegawai);
            $data1['log'] = $this->m_log_sistem->getLog($id_pegawai);
            
            $data3 = menu_oam();
            $this->load->view('layouts/header');
            $this->load->view('layouts/menu',$data3);
            $this->navbar($data['lv1'], $data['lv2']);
            $this->load->view('profile/v_profile', $data1);
            $this->load->view('layouts/footer');
        } else {
            $data['lv1'] = 0;
            $data['lv2'] = 0;
            $data3 = menu_ss();
            $id_pegawai = $this->session->userdata('id_pegawai');
            $data1['pegawai'] = $this->m_amt->detailPegawai($id_pegawai);
            $data1['log'] = $this->m_log_sistem->getLog($id_pegawai);
            $this->load->view('layouts/header');
            $this->load->view('layouts/menu',$data3);
            $this->load->view('layouts/navbar', $data);
            $this->load->view('profile/v_profile', $data1);
            $this->load->view('layouts/footer');
        }
    }

    public function ubah_password() {
        $password_lama = md5($this->input->post('password_lama', true));

        $id_pegawai = $this->input->post('id_pegawai', true);
        $password = $this->m_user->getAkun($id_pegawai);
        $password_db = $password[0]->PASSWORD;

        if ($password_db == $password_lama) {
            $password_baru = $this->input->post('password_baru', true);
            $password_konfirm = $this->input->post('password_konfirm', true);

            if ($password_baru == $password_konfirm) {
                $data = array(
                    'password' => md5($password_baru)
                );
                $this->m_user->editPassword($data, $id_pegawai);

                $datalog = array(
                    'keterangan' => 'Edit Password',
                    'id_pegawai' => $this->session->userdata("id_pegawai"),
                    'keyword' => 'EDIT'
                );
                $this->m_log_sistem->insertLog($datalog);

                $link = base_url() . "user";
                echo '<script type="text/javascript">alert("Data berhasil diubah.");';
                echo 'window.location.href="' . $link . '"';
                echo '</script>';
            } else {
                $link = base_url() . "user";
                echo '<script type="text/javascript">alert("Password baru anda tidak cocok.");';
                echo 'window.location.href="' . $link . '"';
                echo '</script>';
            }
        } else {
            $link = base_url() . "user";
            echo '<script type="text/javascript">alert("Password lama anda tidak cocok.");';
            echo 'window.location.href="' . $link . '"';
            echo '</script>';
        }
    }

    public function edit_pegawai() {
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
        }

        $id_pegawai = $this->input->post('id_pegawai', true);
        if (isset($photo)) {
            $data = array(
                'nip' => $this->input->post('nip', true),
                'nama_pegawai' => $this->input->post('nama_pegawai', true),
                'jabatan' => $this->input->post('jabatan', true),
                'status' => $this->input->post('status', true),
                'no_telepon' => $this->input->post('no_telepon', true),
                'no_ktp' => $this->input->post('no_ktp', true),
                'no_sim' => $this->input->post('no_sim', true),
                'alamat' => $this->input->post('alamat', true),
                'tempat_lahir' => $this->input->post('tempat_lahir', true),
                'tanggal_lahir' => $this->input->post('tanggal_lahir', true),
                'tanggal_masuk' => $this->input->post('tanggal_masuk', true),
                'photo' => $photo
            );
        } else {
            $data = array(
                'nip' => $this->input->post('nip', true),
                'nama_pegawai' => $this->input->post('nama_pegawai', true),
                'jabatan' => $this->input->post('jabatan', true),
                'status' => $this->input->post('status', true),
                'no_telepon' => $this->input->post('no_telepon', true),
                'no_ktp' => $this->input->post('no_ktp', true),
                'no_sim' => $this->input->post('no_sim', true),
                'alamat' => $this->input->post('alamat', true),
                'tempat_lahir' => $this->input->post('tempat_lahir', true),
                'tanggal_lahir' => $this->input->post('tanggal_lahir', true),
                'tanggal_masuk' => $this->input->post('tanggal_masuk', true)
            );
        }

        $this->m_amt->editPegawai($data, $id_pegawai);
        $datalog = array(
            'keterangan' => 'Edit Data Pribadi',
            'id_pegawai' => $this->session->userdata("id_pegawai"),
            'keyword' => 'EDIT'
        );
        $this->m_log_sistem->insertLog($datalog);
        $link = base_url() . "user";
        echo '<script type="text/javascript">alert("Data berhasil diubah.");';
        echo 'window.location.href="' . $link . '"';
        echo '</script>';
    }

    public function navbar($lv1, $lv2) {
        $data['lv1'] = $lv1;
        $data['lv2'] = $lv2;
        $data['depot'] = $this->m_depot->get_depot();
        $this->load->view('layouts/navbar_oam', $data);
    }

}
