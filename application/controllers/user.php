<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class user extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_amt');
        $this->load->model('m_user');
        $this->load->model('m_log_sistem');
    }

    public function index() {
        $data['lv1'] = 0;
        $data['lv2'] = 0;
        $id_pegawai = $this->session->userdata('id_pegawai');
        $data2['pegawai'] = $this->m_amt->detailPegawai($id_pegawai);
        $data2['log'] = $this->m_log_sistem->getLog($id_pegawai);
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->load->view('layouts/navbar', $data);
        $this->load->view('profile/v_profile', $data2);
        $this->load->view('layouts/footer');
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
        $link = base_url() . "user";
        echo '<script type="text/javascript">alert("Data berhasil diubah.");';
        echo 'window.location.href="' . $link . '"';
        echo '</script>';
    }

}
