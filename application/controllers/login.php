<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_user');
    }

    public function index() {
        $this->login();
    }

    public function login() {
        $this->load->view('layouts/header');
        $this->load->view('login/v_login');
    }

    public function validate_login() {
        $email = $this->input->post('email');
        $password = md5($this->input->post('password'));
        $login = $this->m_user->validate_login($email, $password);

        if ($login->num_rows() == 1) {
            $data = $login->result();
            $session_user = array(
                'id_role_assignment' => $data[0]->ID_ROLE_ASSIGNMENT,
                'id_pegawai' => $data[0]->ID_PEGAWAI,
                'id_role' => $data[0]->ID_ROLE,
                'email' => $data[0]->EMAIL,
                'password' => $data[0]->PASSWORD,
                'isLoggedIn' => true,
                'nama_pegawai' => $data[0]->NAMA_PEGAWAI,
                'photo' => $data[0]->PHOTO,
                'ip' => $_SERVER['REMOTE_ADDR']
            );
            $this->session->set_userdata($session_user);
            $link = base_url();
            echo '<script type="text/javascript">alert("Selamat datang di OSCRMS.COM");';
            echo 'window.location.href="' . $link . '"';
            echo '</script>';
        } else {
            $link = base_url();
            echo '<script type="text/javascript">alert("Username atau Password salah.");';
            echo 'window.location.href="' . $link . '"';
            echo '</script>';
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        echo '<script type="text/javascript">alert("Terimakasih!");';
        echo 'window.location.href="' . base_url() . '";';
        echo '</script>';
    }

}
