<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class pengaturan extends CI_Controller {

    function __construct() {
        parent::__construct();
        if ($this->session->userdata('isLoggedIn')) {
            $this->load->model('m_pengaturan');
            $this->load->model('m_amt');
            $this->load->model('m_depot');
            $this->load->model('m_log_harian');
            $this->load->model('m_log_sistem');
        } else {
            redirect(base_url());
        }
    }

    public function index() {
        $data1['feedback'] = 0;
        $data1['pesan'] = 0;

        if (($this->session->userdata('id_role') <= 2)) {
            if ($this->input->post('edit_depot', true)) {
                $depot = $this->input->post('id_depot', true);
                $data = array(
                    'nama_depot' => $this->input->post('nama_depot', true),
                    'alamat_depot' => $this->input->post('alamat_depot', true),
                    'nama_oh' => $this->input->post('nama_oh', true),
                );
                $this->m_pengaturan->editDepot($data, $depot);

                $namadepot = $this->m_depot->get_nama_depot($depot);
                $datalog = array(
                    'keterangan' => 'Ubah data depot ' . $namadepot,
                    'id_pegawai' => $this->session->userdata("id_pegawai"),
                    'keyword' => 'Edit'
                );
                $this->m_log_sistem->insertLog($datalog);

                $pesan = "Data berhasil diubah.";
                $data1['feedback'] = 1;
                $data1['pesan'] = $pesan;
            } else if ($this->input->post('edit_user', true)) {
                if (($this->session->userdata('id_role') == 5)) {
                    redirect(base_url());
                } else {
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
                    $this->m_amt->editRA($data2, $id_pegawai);

                    $a = $this->m_amt->getNIP($id_pegawai);
                    $nip = $a->nip;
                    $datalog = array(
                        'keterangan' => 'Ubah data pegawai, NIP : ' . $nip,
                        'id_pegawai' => $this->session->userdata("id_pegawai"),
                        'keyword' => 'Edit'
                    );
                    $this->m_log_sistem->insertLog($datalog);

                    $pesan = "Data berhasil diubah.";
                    $data1['feedback'] = 1;
                    $data1['pesan'] = $pesan;
                }
            } else if ($this->input->post('add_user', true)) {
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

                $nip = $this->input->post('nip', true);
                $datalog = array(
                    'keterangan' => 'Tambah data pegawai, NIP : ' . $nip,
                    'id_pegawai' => $this->session->userdata("id_pegawai"),
                    'keyword' => 'Tambah'
                );
                $this->m_log_sistem->insertLog($datalog);

                $pesan = "Data berhasil ditambah.";
                $data1['feedback'] = 1;
                $data1['pesan'] = $pesan;
            } else if ($this->input->post('delete_user', true)) {
                if (($this->session->userdata('id_role') == 5)) {
                    redirect(base_url());
                } else {
                    $id_user = $this->input->post('id_pegawai', true);

                    $a = $this->m_amt->getNIP($id_user);
                    $nip = $a->nip;
                    $datalog = array(
                        'keterangan' => 'Hapus data pegawai, NIP : ' . $nip,
                        'id_pegawai' => $this->session->userdata("id_pegawai"),
                        'keyword' => 'Hapus'
                    );
                    $this->m_log_sistem->insertLog($datalog);
                    
                    $this->m_amt->deletePegawai($id_user);
                    $this->m_pengaturan->deleteAkun($id_user);

                    $pesan = "Data berhasil dihapus.";
                    $data1['feedback'] = 1;
                    $data1['pesan'] = $pesan;
                }
            }

            $q = $this->m_pengaturan->getCountDepot();
            $depot = $q[0]->count;
            $data['lv1'] = $depot + 3;
            $data['lv2'] = 1;

            $data3 = menu_oam();
            $depot = $this->session->userdata('id_depot');
            $data1['user'] = $this->m_pengaturan->selectAllUser();
            $this->load->view('layouts/header');
            $this->load->view('layouts/menu', $data3);
            $this->navbar($data['lv1'], $data['lv2']);
            $this->load->view('oam/v_pengaturan', $data1);
            $this->load->view('layouts/footer');
        } else if (($this->session->userdata('id_role') >= 3)) {
            if ($this->input->post('edit_depot', true)) {
                $depot = $this->input->post('id_depot', true);
                $data = array(
                    'nama_depot' => $this->input->post('nama_depot', true),
                    'alamat_depot' => $this->input->post('alamat_depot', true),
                    'nama_oh' => $this->input->post('nama_oh', true),
                );
                $this->m_pengaturan->editDepot($data, $depot);

                $namadepot = $this->m_depot->get_nama_depot($depot);
                $datalog = array(
                    'keterangan' => 'Ubah data depot ' . $namadepot,
                    'id_pegawai' => $this->session->userdata("id_pegawai"),
                    'keyword' => 'Edit'
                );
                $this->m_log_sistem->insertLog($datalog);

                $pesan = "Data berhasil diubah.";
                $data1['feedback'] = 1;
                $data1['pesan'] = $pesan;
            } else if ($this->input->post('edit_user', true)) {
                if (($this->session->userdata('id_role') == 5)) {
                    redirect(base_url());
                } else {
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
                    $this->m_amt->editRA($data2, $id_pegawai);

                    $a = $this->m_amt->getNIP($id_pegawai);
                    $nip = $a->nip;
                    $datalog = array(
                        'keterangan' => 'Ubah data pegawai, NIP : ' . $nip,
                        'id_pegawai' => $this->session->userdata("id_pegawai"),
                        'keyword' => 'Edit'
                    );
                    $this->m_log_sistem->insertLog($datalog);

                    $pesan = "Data berhasil diubah.";
                    $data1['feedback'] = 1;
                    $data1['pesan'] = $pesan;
                }
            } else if ($this->input->post('add_user', true)) {
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

                $nip = $this->input->post('nip', true);
                $datalog = array(
                    'keterangan' => 'Tambah data pegawai, NIP : ' . $nip,
                    'id_pegawai' => $this->session->userdata("id_pegawai"),
                    'keyword' => 'Tambah'
                );
                $this->m_log_sistem->insertLog($datalog);

                $pesan = "Data berhasil ditambah.";
                $data1['feedback'] = 1;
                $data1['pesan'] = $pesan;
            } else if ($this->input->post('delete_user', true)) {
                if (($this->session->userdata('id_role') == 5)) {
                    redirect(base_url());
                } else {
                    $id_user = $this->input->post('id_pegawai', true);

                    $a = $this->m_amt->getNIP($id_user);
                    $nip = $a->nip;
                    $datalog = array(
                        'keterangan' => 'Hapus data pegawai, NIP : ' . $nip,
                        'id_pegawai' => $this->session->userdata("id_pegawai"),
                        'keyword' => 'Hapus'
                    );
                    $this->m_log_sistem->insertLog($datalog);
                    $this->m_amt->deletePegawai($id_user);
                    $this->m_pengaturan->deleteAkun($id_user);

                    $pesan = "Data berhasil dihapus.";
                    $data1['feedback'] = 1;
                    $data1['pesan'] = $pesan;
                }
            } else if ($this->input->post('reset_password', true)) {
                $id = $this->input->post('id_pegawai', true);

                $a = $this->m_pengaturan->selectRA($id);
                $email = $a[0]->EMAIL;
                $data2 = array(
                    'password' => md5($email)
                );
                $this->m_amt->editRA($data2, $id);

                $a = $this->m_amt->getNIP($id);
                $nip = $a->nip;
                $datalog = array(
                    'keterangan' => 'Reset Password, NIP : ' . $nip,
                    'id_pegawai' => $this->session->userdata("id_pegawai"),
                    'keyword' => 'Edit'
                );
                $this->m_log_sistem->insertLog($datalog);

                $pesan = "Password berhasil di reset.";
                $data1['feedback'] = 1;
                $data1['pesan'] = $pesan;
            }

            $data['lv1'] = 10;
            $data['lv2'] = 1;
            $depot = $this->session->userdata('id_depot');
            $data1['user'] = $this->m_pengaturan->selectAllUserDepot($depot);
            $data1['depot'] = $this->m_pengaturan->selectDepot($depot);
            $data3 = menu_ss();
            $this->load->view('layouts/header');
            $this->load->view('layouts/menu', $data3);
            $this->load->view('layouts/navbar', $data);
            $this->load->view('pengaturan/v_pengaturan', $data1);
            $this->load->view('layouts/footer');
        } else {
            redirect(base_url());
        }
    }

    public function pengaturan_oam() {
        if (($this->session->userdata('id_role') <= 2)) {
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
        } else {
            redirect(base_url());
        }
    }

    public function pengaturan_depot() {
        if (($this->session->userdata('id_role') <= 2)) {
            $data1['feedback'] = 0;
            $data1['pesan'] = 0;

            if ($this->input->post('add_depot', true)) {
                $data = array(
                    'nama_depot' => $this->input->post('nama_depot', true),
                    'alamat_depot' => $this->input->post('alamat_depot', true),
                    'nama_oh' => $this->input->post('nama_oh', true),
                );
                $this->m_pengaturan->tambahDepot($data);
                
                $namadepot = $this->input->post('nama_depot', true);
                $datalog = array(
                    'keterangan' => 'Tambah data depot ' . $namadepot,
                    'id_pegawai' => $this->session->userdata("id_pegawai"),
                    'keyword' => 'Tambah'
                );
                $this->m_log_sistem->insertLog($datalog);
                
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
                
                $nip = $this->input->post('nip', true);
                $datalog = array(
                    'keterangan' => 'Tambah data pegawai, NIP ' . $nip,
                    'id_pegawai' => $this->session->userdata("id_pegawai"),
                    'keyword' => 'Tambah'
                );
                $this->m_log_sistem->insertLog($datalog);

                //insert ke role_assignment
                $data = $this->m_amt->getMaxIDPegawai($depot);
                foreach ($data as $row) {
                    $id_pegawai = $row->max;
                }
                $data2 = array(
                    'email' => $this->input->post('email', true),
                    'id_pegawai' => $id_pegawai,
                    'id_role' => 3,
                    'password' => md5($this->input->post('email', true))
                );
                $this->m_pengaturan->insertAkun($data2);

                //insert log harian
                $tahun = date('Y');
                $cek = $this->m_log_harian->cekLog($depot, $tahun);
                // Set timezone
                if ($cek[0]->jumlah < 1) {
                    date_default_timezone_set('UTC');

                    // Start date
                    $date = date('Y-m') . "-01";
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
                }
                    $this->m_log_harian->insertLogHarian($data);
                    $pesan = "Data berhasil ditambah.";
                    $data1['feedback'] = 1;
                    $data1['pesan'] = $pesan;
            } else if ($this->input->post('edit_depot', true)) {
                $depot = $this->input->post('id_depot', true);
                $data = array(
                    'nama_depot' => $this->input->post('nama_depot', true),
                    'alamat_depot' => $this->input->post('alamat_depot', true),
                    'nama_oh' => $this->input->post('nama_oh', true),
                );
                $this->m_pengaturan->editDepot($data, $depot);

                $namadepot = $this->m_depot->get_nama_depot($depot);
                $datalog = array(
                    'keterangan' => 'Ubah data depot ' . $namadepot,
                    'id_pegawai' => $this->session->userdata("id_pegawai"),
                    'keyword' => 'Edit'
                );
                $this->m_log_sistem->insertLog($datalog);
                
                $pesan = "Data berhasil diubah.";
                $data1['feedback'] = 1;
                $data1['pesan'] = $pesan;
            } else if ($this->input->post('delete_depot', true)) {
                $id_depot = $this->input->post('id_depot', true);
                
                $namadepot = $this->m_depot->get_nama_depot($id_depot);
                $datalog = array(
                    'keterangan' => 'Hapus data depot ' . $namadepot,
                    'id_pegawai' => $this->session->userdata("id_pegawai"),
                    'keyword' => 'Hapus'
                );
                $this->m_log_sistem->insertLog($datalog);
                
                $this->m_pengaturan->deleteDepot($id_depot);

                $pesan = "Data berhasil dihapus.";
                $data1['feedback'] = 1;
                $data1['pesan'] = $pesan;
            }

            $q = $this->m_pengaturan->getCountDepot();
            $depot = $q[0]->count;
            $data['lv1'] = $depot + 4;
            $data['lv2'] = 1;

            $data3 = menu_oam();
            $depot = $this->session->userdata('id_depot');
            $data1['depot'] = $this->m_pengaturan->selectAllDepot();
            $this->load->view('layouts/header');
            $this->load->view('layouts/menu', $data3);
            $this->navbar($data['lv1'], $data['lv2']);
            $this->load->view('oam/v_pengaturan_depot', $data1);
            $this->load->view('layouts/footer');
        } else {
            redirect(base_url());
        }
    }

    public function set_depot() {
        if (($this->session->userdata('id_role') <= 2)) {
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
                'password' => md5($this->input->post('email', true))
            );
            $this->m_pengaturan->insertAkun($data2);

            //insert log harian
            $tahun = date('Y');
            $cek = $this->m_log_harian->cekLog($depot, $tahun);
            // Set timezone
            if ($cek[0]->jumlah < 1) {
                date_default_timezone_set('UTC');

                // Start date
                $date = date('Y-m') . "-01";
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
        } else {
            redirect(base_url());
        }
    }

    public function ubah_depot() {
        if (($this->session->userdata('id_role') <= 2)) {
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
        } else {
            redirect(base_url());
        }
    }

    public function hapus_depot($id_depot) {
        if (($this->session->userdata('id_role') <= 2)) {
            $this->m_pengaturan->deleteDepot($id_depot);

            $link = base_url() . "pengaturan/pengaturan_depot/";
            echo '<script type="text/javascript">alert("Data berhasil dihapus.");';
            echo 'window.location.href="' . $link . '"';
            echo '</script>';
        } else {
            redirect(base_url());
        }
    }

    public function navbar($lv1, $lv2) {
        $data['lv1'] = $lv1;
        $data['lv2'] = $lv2;
        $data['depot'] = $this->m_depot->get_depot();
        $this->load->view('layouts/navbar_oam', $data);
    }

    public function pengaturan_ss() {
        if (($this->session->userdata('id_role') > 2)) {
            $data['lv1'] = 10;
            $data['lv2'] = 1;
            $depot = $this->session->userdata('id_depot');
            $data1['user'] = $this->m_pengaturan->selectAllUserDepot($depot);
            $data1['depot'] = $this->m_pengaturan->selectDepot($depot);
            $this->load->view('layouts/header');
            $this->load->view('layouts/menu');
            $this->load->view('layouts/navbar', $data);
            $this->load->view('pengaturan/v_pengaturan', $data1);
            $this->load->view('layouts/footer');
        } else {
            redirect(base_url());
        }
    }

    public function edit_depot() {
        if (($this->session->userdata('id_role') <= 2)) {
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
        } else {
            redirect(base_url());
        }
    }

    public function delete_akun($id_user) {
        if (($this->session->userdata('id_role') == 5)) {
            redirect(base_url());
        } else {
            $this->m_amt->deletePegawai($id_user);
            $this->m_pengaturan->deleteAkun($id_user);

            $link = base_url() . "pengaturan/";
            echo '<script type="text/javascript">alert("Data berhasil dihapus.");';
            echo 'window.location.href="' . $link . '"';
            echo '</script>';
        }
    }

    public function edit_akun() {
        if (($this->session->userdata('id_role') == 5)) {
            redirect(base_url());
        } else {
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
            $this->m_amt->editRA($data2, $id_pegawai);

            $link = base_url() . "pengaturan/";
            echo '<script type="text/javascript">alert("Data berhasil diubah.");';
            echo 'window.location.href="' . $link . '"';
            echo '</script>';
        }
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
        if (($this->session->userdata('id_role') >= 3)) {
            redirect(base_url());
        } else {
            $q = $this->m_pengaturan->getCountDepot();
            $depot = $q[0]->count;
            $data['lv1'] = $depot + 4;
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

    public function reset_password($id) {

        $a = $this->m_pengaturan->selectRA($id);
        $email = $a[0]->EMAIL;
        $data2 = array(
            'password' => md5($email)
        );
        $this->m_amt->editRA($data2, $id);

        $link = base_url() . "pengaturan/";
        echo '<script type="text/javascript">alert("Password berhasil di reset.");';
        echo 'window.location.href="' . $link . '"';
        echo '</script>';
    }

}
