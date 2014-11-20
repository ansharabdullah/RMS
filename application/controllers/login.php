<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_user');
        $this->load->model('m_log_harian');
    }

    public function index() {
        $this->login();
    }

    public function login() {
        if (!$this->session->userdata('isLoggedIn')) {
            $this->load->view('layouts/header');
            $this->load->view('login/v_login');
        } else {
            redirect(base_url());
        }
    }

    public function validate_login() {
        if ($this->input->post('submit')) {
            $email = $this->input->post('email');
            $password = md5($this->input->post('password'));
            $login = $this->m_user->validate_login($email, $password);
            if ($login->num_rows() == 1) {
                $data = $login->result();
                if ($data[0]->PHOTO == "") {
                    $photo = "default.png";
                } else {
                    $photo = $data[0]->PHOTO;
                }
                $session_user = array(
                    'id_role_assignment' => $data[0]->ID_ROLE_ASSIGNMENT,
                    'id_pegawai' => $data[0]->ID_PEGAWAI,
                    'id_role' => $data[0]->ID_ROLE,
                    'email' => $data[0]->EMAIL,
                    'password' => $data[0]->PASSWORD,
                    'isLoggedIn' => true,
                    'nama_pegawai' => $data[0]->NAMA_PEGAWAI,
                    'photo' => $photo,
                    'id_depot' => $data[0]->ID_DEPOT,
                    'ip' => $_SERVER['REMOTE_ADDR']
                );
                $this->session->set_userdata($session_user);

                $depot = $this->session->userdata('id_depot');
                $tahun = date('Y');
                $cek = $this->m_log_harian->cekLog($depot, $tahun);
                // Set timezone
                if ($cek[0]->jumlah < 1) {
                    date_default_timezone_set('UTC');

                    // Start date
                    
                    $date = date('Y-m') .'-01';
                    // End date
                    $end_date = date('Y') . '-12-31';
                    $i = 0;
                    while (strtotime($date) <= strtotime($end_date)) {
                        $data[$i] = array(
                            'id_depot' => $this->session->userdata('id_depot'),
                            'tanggal_log_harian' => $date
                        );
                        $date = date("Y-m-d", strtotime("+1 day", strtotime($date)));
                        $i++;
                    }
                    $this->m_log_harian->insertLogHarian($data);
                }
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
        } else {
            redirect(base_url());
        }
    }

    public function logout() {
        if ($this->session->userdata('isLoggedIn')) {
            $this->session->sess_destroy();
            echo '<script type="text/javascript">alert("Terimakasih!");';
            echo 'window.location.href="' . base_url() . '";';
            echo '</script>';
        }else{
            redirect(base_url());
        }
    }

}
