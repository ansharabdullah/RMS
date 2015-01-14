<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class jadwal extends CI_Controller {

    function __construct() {
        parent::__construct();
        if ($this->session->userdata('isLoggedIn')) {
            if ($this->session->userdata('id_role') <= 2) {
                redirect(base_url());
            }
            $this->load->model('m_amt');
            $this->load->model('m_log_harian');
            $this->load->model('m_mt');
            $this->load->model('m_penjadwalan');
            $this->load->model('m_log_sistem');
        } else {
            redirect(base_url());
        }
    }

    public function index() {
        $this->penjadwalan();
    }

    public function penjadwalan($tanggal = 0) {
        $data2['feedback'] = 0;
        $data2['pesan'] = 0;
        if ($this->input->post("edit_jadwal", true)) {
            if ($this->session->userdata('id_role') == 5) {
                redirect(base_url());
            } else {
                $id_jadwal = $this->input->post('id_jadwal', true);
                $nip = $this->input->post('nip', true);
                $data = array(
                    'status_masuk' => $this->input->post('status_masuk', true)
                );
                $tanggal = $this->input->post('tanggal_log_harian', true);
                $this->m_penjadwalan->updateJadwal($data, $id_jadwal);

                $datalog = array(
                    'keterangan' => "Ubah Jadwal NIP : $nip pada $tanggal",
                    'id_pegawai' => $this->session->userdata("id_pegawai"),
                    'keyword' => 'Edit'
                );
                $this->m_log_sistem->insertLog($datalog);

                $data2['feedback'] = 1;
                $data2['pesan'] = "Data berhasil diubah.";
            }
        } else if ($this->input->post("delete_jadwal", true)) {
            if ($this->session->userdata('id_role') == 5) {
                redirect(base_url());
            } else {
                $tanggal = $this->input->post('bulan', true);
                $bulan = date("m", strtotime($tanggal));
                $tahun = date("Y", strtotime($tanggal));
                $depot = $this->session->userdata('id_depot');

                $this->m_penjadwalan->deleteJadwal($depot, $bulan, $tahun);

                $datalog = array(
                    'keterangan' => "Menghapus jadwal bulan : $tanggal",
                    'id_pegawai' => $this->session->userdata("id_pegawai"),
                    'keyword' => 'Hapus'
                );
                $this->m_log_sistem->insertLog($datalog);

                $data2['feedback'] = 1;
                $data2['pesan'] = "Data berhasil dihapus.";
            }
        } else if ($this->input->post("import_jadwal", true)) {
            $data_jadwal = unserialize($this->input->post('data_jadwal'));
            $tanggal = $this->input->post('tanggal', true);
            $bulan = date("m", strtotime($tanggal));
            $tahun = date("Y", strtotime($tanggal));
            $depot = $this->session->userdata("id_depot");
            $this->m_penjadwalan->importJadwal($data_jadwal);
            $this->m_log_harian->updateStatusJadwal($bulan, $tahun, $depot);

            $datalog = array(
                'keterangan' => "Import jadwal bulan $tahun-$bulan",
                'id_pegawai' => $this->session->userdata("id_pegawai"),
                'keyword' => 'Tambah'
            );
            $this->m_log_sistem->insertLog($datalog);


            $data2['feedback'] = 1;
            $data2['pesan'] = "Data berhasil ditambahkan.";
        }

        $data['lv1'] = 6;
        $data['lv2'] = 1;
        $data2['jadwal'] = 0;
        $data2['tanggal'] = 0;

        $data3 = menu_ss();
        $depot = $this->session->userdata('id_depot');
        if ($tanggal == 0)
            $tanggal = date('Y-m-d');

        $data2['jadwal'] = $this->m_penjadwalan->getJadwal($depot, $tanggal);
        $data2['tanggal'] = $tanggal;
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu', $data3);

        $this->load->view('layouts/navbar', $data);
        $this->load->view('jadwal/v_jadwal', $data2);
        $this->load->view('layouts/footer');
    }

    public function import_penjadwalan() {
        $data['lv1'] = 6;
        $data['lv2'] = 1;
        $data2['jadwal'] = 0;
        $data2['error'] = 0;
        $data3 = menu_ss();
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu', $data3);

        $this->load->view('layouts/navbar', $data);
        $this->load->view('jadwal/v_import_jadwal', $data2);
        $this->load->view('layouts/footer');
    }

    public function import_xls() {
        $data2['error'] = 0;
        $bulanJadwal = $this->input->post('bulanJadwal', true);
        $fileJadwal = $_FILES['fileJadwal'];
        $dir = './assets/file/';
        if (!file_exists($dir)) {
            mkdir($dir);
        }

        $file_target = $dir . $_FILES['fileJadwal']['name'];
        move_uploaded_file($_FILES['fileJadwal']['tmp_name'], $file_target);

        $this->load->library('PHPExcel/Classes/PHPExcel');

        $inputFileName = $file_target;
        $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
        $objReader = PHPExcel_IOFactory::createReader($inputFileType);

        $worksheetData = $objReader->listWorksheetInfo($inputFileName);

        foreach ($worksheetData as $row) {
            $worksheetRead[] = $row['worksheetName'];
        }

        $objReader->setLoadSheetsOnly($worksheetRead);

        $objPHPExcel = $objReader->load($inputFileName);

        $loadedSheetNames = $objPHPExcel->getSheetNames();
        $data2 = array();
        $j = 0;
        foreach ($loadedSheetNames as $sheetIndex => $loadedSheetName) {
            if (strtoupper($loadedSheetName) == 'JADWAL') {
                $objPHPExcel->setActiveSheetIndexByName($loadedSheetName);
                $sheetData = $objPHPExcel->getActiveSheet();
                $i = 1;
                $status = 0;
                $month = $sheetData->getCell('B2')->getFormattedValue();
                if ($month < 10) {
                    $month = "0" . $month;
                }
                $year = date('Y', strtotime($bulanJadwal));
                $month = date('m', strtotime($bulanJadwal));
                $bulanDB = $this->m_penjadwalan->cekJadwal($year, $month);
                if (sizeof($bulanDB) == 0) {

                    $no = $i + 3;
                    while ($status == 0) {
                        $depot = $this->session->userdata('id_depot');
                        $error = "Error : ";
                        $nip_pegawai = "";
                        $nama_pegawai = "";
                        $jabatan = "";
                        $id_pegawai = "";
                        $id_mobil = "";
                        $e = 0;

                        //supir
                        $nips = $sheetData->getCell('A' . $no)->getFormattedValue();
                        $nip_supir = $this->m_amt->cekNIP($nips);

                        //kernet
                        $nipk = $sheetData->getCell('C' . $no)->getFormattedValue();
                        $nip_kernet = $this->m_amt->cekNIP($nipk);

                        //jika sell tidak ada isi
                        if (!$sheetData->getCell('A4')->getFormattedValue() && !$sheetData->getCell('B4')->getFormattedValue() && !$sheetData->getCell('C4')->getFormattedValue() && !$sheetData->getCell('D4')->getFormattedValue() && !$sheetData->getCell('E4')->getFormattedValue()) {
                            $status = 1;
                            $data['amt'] = 0;
                            $data2['jadwal'] = 0;
                            break;
                        }

                        if (($sheetData->getCell('A' . ($no + 1))->getFormattedValue() == '') && ($sheetData->getCell('A' . ($no + 2))->getFormattedValue() == '')) {
                            $status = 1;
                        }

                        //cek nip supir
                        if ($sheetData->getCell('A' . $no)->getFormattedValue() == "") {
                            $error = $error . " NIP Supir tidak boleh kosong,";
                            $e = 1;
                        } else if (sizeof($nip_supir) == 0) {
                            $error = $error . " NIP Supir tidak ditemukan dalam database,";
                            $e = 1;
                        } else {
                            $nip_pegawai_supir = $nip_supir[0]->NIP;
                            $nama_pegawai_supir = $nip_supir[0]->NAMA_PEGAWAI;
                            $jabatan_supir = $nip_supir[0]->JABATAN;
                            $id_pegawai_supir = $nip_supir[0]->ID_PEGAWAI;
                        }

                        //cek nip kernet
                        if ($sheetData->getCell('C' . $no)->getFormattedValue() == "") {
                            $error = $error . " NIP Kernet tidak boleh kosong,";
                            $e = 1;
                        } else if (sizeof($nip_kernet) == 0) {
                            $error = $error . " NIP Kernet tidak ditemukan dalam database,";
                            $e = 1;
                        } else {
                            $nip_pegawai_kernet = $nip_kernet[0]->NIP;
                            $nama_pegawai_kernet = $nip_kernet[0]->NAMA_PEGAWAI;
                            $jabatan_kernet = $nip_kernet[0]->JABATAN;
                            $id_pegawai_kernet = $nip_kernet[0]->ID_PEGAWAI;
                        }


                        $hadir = "Libur";

                        //jika tidak ada error
                        if ($error == "Error : ") {
                            $error = "Sukses";
                            $e = 0;
                        }


                        //loop column
                        $cekbulan = $month;
                        $cektahun = $year;

                        //cek jumlah hari dalam satu bulan
                        if ($cekbulan == 1 || $cekbulan == 3 || $cekbulan == 5 || $cekbulan == 7 || $cekbulan == 8 || $cekbulan == 10 || $cekbulan == 12) {
                            $jumlahHari = 'AK';
                        } else if ($cekbulan == 2) {
                            if (date('L', strtotime($cektahun . '-01-01')) == 1) {
                                $jumlahHari = 'AH';
                            } else {
                                $jumlahHari = 'AI';
                            }
                        } else {
                            $jumlahHari = 'AJ';
                        }

                        //baris satu dua
                        if ($i % 4 < 3) {
                            $no_polisi = strtoupper(str_replace(" ", "", $sheetData->getCell('E' . $no)->getFormattedValue()));
                            $nopol = $this->m_mt->cekNopol($no_polisi, $depot);
                            //cek nopol
                            if ($sheetData->getCell('E' . $no)->getFormattedValue() == "") {
                                $error = $error . " NO Polisi tidak boleh kosong,";
                                $e = 1;
                            } else if (sizeof($nopol) == 0) {
                                $error = $error . " No Polisi tidak ditemukan dalam database,";
                                $e = 1;
                            } else {
                                $id_mobil = $nopol[0]->ID_MOBIL;
                            }

                            //loop per hari
                            for ($column = 'F'; $column != $jumlahHari; $column++) {
                                $tanggal = $bulanJadwal . '-' . $sheetData->getCell($column . 3)->getFormattedValue();
                                //cek absen
                                if (strtoupper($sheetData->getCell($column . $no)->getFormattedValue()) == "X") {
                                    $hadir = "Libur";
                                } else if (strtoupper($sheetData->getCell($column . $no)->getFormattedValue()) == "T") {
                                    $hadir = "Hadir";
                                } else {
                                    $hadir = "Kosong";
                                    $error = $error . "Jadwal hanya boleh diisi dengan T atau X, ";
                                    $e = 1;
                                }
                                //echo $tanggal."<br/>";
                                $log_harian = $this->m_log_harian->cekTanggal($tanggal, $this->session->userdata('id_depot'));
                                $id_log_harian = $log_harian[0]->ID_LOG_HARIAN;

                                //masukan ke array supir
                                $data2['jadwal'][($j * 2)] = array(
                                    'nip' => $nips,
                                    'nama_pegawai' => $nama_pegawai_supir,
                                    'id_pegawai' => $id_pegawai_supir,
                                    'jabatan' => $jabatan_supir,
                                    'id_mobil' => $id_mobil,
                                    'id_log_harian' => $id_log_harian,
                                    'id_depot' => $this->session->userdata('id_depot'),
                                    'nopol' => $no_polisi,
                                    'tanggal_log_harian' => $tanggal,
                                    'status_error' => $error,
                                    'status_masuk' => $hadir,
                                    'error' => $e
                                );

                                //kernet
                                $data2['jadwal'][($j * 2 + 1)] = array(
                                    'nip' => $nipk,
                                    'nama_pegawai' => $nama_pegawai_kernet,
                                    'id_pegawai' => $id_pegawai_kernet,
                                    'jabatan' => $jabatan_kernet,
                                    'id_mobil' => $id_mobil,
                                    'id_log_harian' => $id_log_harian,
                                    'id_depot' => $this->session->userdata('id_depot'),
                                    'nopol' => $no_polisi,
                                    'tanggal_log_harian' => $tanggal,
                                    'status_error' => $error,
                                    'status_masuk' => $hadir,
                                    'error' => $e
                                );
                                $j++;
                            }
                            //baris ke 3
                            $no++;
                        } else if ($i % 4 == 3) {
                            //loop per hari
                            for ($column = 'F'; $column != $jumlahHari; $column++) {
                                $index = 0;
                                $tanggal = $bulanJadwal . '-' . $sheetData->getCell($column . 3)->getFormattedValue();
                                //cek absen
                                if (strtoupper($sheetData->getCell($column . $no)->getFormattedValue()) == "T") {
                                    if ((strtoupper($sheetData->getCell($column . $no)->getFormattedValue())) == (strtoupper($sheetData->getCell($column . ($no - 1))->getFormattedValue()))) {
                                        $no_polisi = strtoupper(str_replace(" ", "", $sheetData->getCell('E' . ($no - 2))->getFormattedValue()));
                                        $index = $no - 2;
                                    } else if ((strtoupper($sheetData->getCell($column . $no)->getFormattedValue())) == (strtoupper($sheetData->getCell($column . ($no - 2))->getFormattedValue()))) {
                                        $no_polisi = strtoupper(str_replace(" ", "", $sheetData->getCell('E' . ($no - 1))->getFormattedValue()));
                                        $index = $no - 1;
                                    }

                                    $nopol = $this->m_mt->cekNopol($no_polisi, $depot);
                                    //echo 'E' . $index;
                                    //cek nopol
                                    if ($sheetData->getCell('E' . $index)->getFormattedValue() == "") {
                                        $error = $error . " NO Polisi tidak boleh kosong,";
                                        $e = 1;
                                    } else if (sizeof($nopol) == 0) {
                                        $error = $error . " No Polisi tidak ditemukan dalam database,";
                                        $e = 1;
                                    } else {
                                        $id_mobil = $nopol[0]->ID_MOBIL;
                                    }
                                }
                                if (strtoupper($sheetData->getCell($column . $no)->getFormattedValue()) == "X") {
                                    $hadir = "Libur";
                                } else if (strtoupper($sheetData->getCell($column . $no)->getFormattedValue()) == "T") {
                                    $hadir = "Hadir";
                                } else {
                                    $hadir = "Kosong";
                                    $error = $error . "Jadwal hanya boleh diisi dengan T atau X, ";
                                    $e = 1;
                                }
                                //echo $tanggal."<br/>";
                                $log_harian = $this->m_log_harian->cekTanggal($tanggal, $this->session->userdata('id_depot'));
                                $id_log_harian = $log_harian[0]->ID_LOG_HARIAN;

                                //masukan ke array supir
                                $data2['jadwal'][($j * 2)] = array(
                                    'nip' => $nips,
                                    'nama_pegawai' => $nama_pegawai_supir,
                                    'id_pegawai' => $id_pegawai_supir,
                                    'jabatan' => $jabatan_supir,
                                    'id_mobil' => $id_mobil,
                                    'id_log_harian' => $id_log_harian,
                                    'id_depot' => $this->session->userdata('id_depot'),
                                    'nopol' => $no_polisi,
                                    'tanggal_log_harian' => $tanggal,
                                    'status_error' => $error,
                                    'status_masuk' => $hadir,
                                    'error' => $e
                                );

                                //kernet
                                $data2['jadwal'][($j * 2 + 1)] = array(
                                    'nip' => $nipk,
                                    'nama_pegawai' => $nama_pegawai_kernet,
                                    'id_pegawai' => $id_pegawai_kernet,
                                    'jabatan' => $jabatan_kernet,
                                    'id_mobil' => $id_mobil,
                                    'id_log_harian' => $id_log_harian,
                                    'id_depot' => $this->session->userdata('id_depot'),
                                    'nopol' => $no_polisi,
                                    'tanggal_log_harian' => $tanggal,
                                    'status_error' => $error,
                                    'status_masuk' => $hadir,
                                    'error' => $e
                                );
                                $j++;
                            }
                            $no +=2;
                            $i++;
                        }
                        //jika baris selanjutnya kosong
                        $i++;
                    }

                    //print_r($data2['jadwal'][180]);
                } else {
                    $data2['jadwal'] = 0;
                    $data2['error'] = "Jadwal pada bulan tersebut telah terisi.";
                }
            }
            $data['error'] = 0;
        }

        unlink($file_target);
        $data['lv1'] = 6;
        $data['lv2'] = 1;
        $data3 = menu_ss();

        $this->load->view('layouts/header');
        $this->load->view('layouts/menu', $data3);
        $this->load->view('layouts/navbar', $data);
        $this->load->view('jadwal/v_import_jadwal', $data2);
        $this->load->view('layouts/footer');
    }

    public function simpan_xls() {
        $data_jadwal = unserialize($this->input->post('data_jadwal'));
        $tanggal = $this->input->post('tanggal', true);
        $bulan = date("m", strtotime($tanggal));
        $tahun = date("Y", strtotime($tanggal));
        $depot = $this->session->userdata("id_depot");
        $this->m_penjadwalan->importJadwal($data_jadwal);
        $this->m_log_harian->updateStatusJadwal($bulan, $tahun, $depot);

        $datalog = array(
            'keterangan' => "Import jadwal bulan $tanggal",
            'id_pegawai' => $this->session->userdata("id_pegawai"),
            'keyword' => 'Tambah'
        );
        $this->m_log_sistem->insertLog($datalog);

        $link = base_url() . "jadwal/";
        echo '<script type="text/javascript">alert("Data berhasil ditambahkan.");';
        echo 'window.location.href="' . $link . '"';
        echo '</script>';
    }

    public function lihat_jadwal() {
        $depot = $this->session->userdata('id_depot');
        $tanggal = $this->input->get('tanggal', true);
        redirect(base_url() . "jadwal/penjadwalan/" . $tanggal);
    }

    public function edit_jadwal() {
        if ($this->session->userdata('id_role') == 5) {
            redirect(base_url());
        } else {
            $id_jadwal = $this->input->post('id_jadwal', true);
            $nip = $this->input->post('nip', true);
            $data = array(
                'status_masuk' => $this->input->post('status_masuk', true)
            );
            $tanggal = $this->input->post('tanggal_log_harian', true);
            $this->m_penjadwalan->updateJadwal($data, $id_jadwal);

            $datalog = array(
                'keterangan' => "Ubah Jadwal NIP : $nip pada $tanggal",
                'id_pegawai' => $this->session->userdata("id_pegawai"),
                'keyword' => 'Edit'
            );
            $this->m_log_sistem->insertLog($datalog);

            $link = base_url() . "jadwal/lihat_jadwal/?tanggal=$tanggal";
            echo '<script type="text/javascript">alert("Data berhasil diubah.");';
            echo 'window.location.href="' . $link . '"';
            echo '</script>';
        }
    }

    public function hapus_jadwal() {
        if ($this->session->userdata('id_role') == 5) {
            redirect(base_url());
        } else {
            $data['lv1'] = 6;
            $data['lv2'] = 1;
            $data2['jadwal'] = 0;
            $data3 = menu_ss();
            $this->load->view('layouts/header');
            $this->load->view('layouts/menu', $data3);

            $this->load->view('layouts/navbar', $data);
            $this->load->view('jadwal/v_hapus_jadwal', $data2);
            $this->load->view('layouts/footer');
        }
    }

    public function hapus_jadwal_preview() {

        if ($this->session->userdata('id_role') == 5) {
            redirect(base_url());
        } else {
            $tanggal = $this->input->get('bulan', true);
            $bulan = date("m", strtotime($tanggal));
            $tahun = date("Y", strtotime($tanggal));
            $depot = $this->session->userdata('id_depot');

            $data2['jadwal'] = $this->m_penjadwalan->getJadwalPerbulan($depot, $bulan, $tahun);
            $data2['tanggal'] = $tanggal;
            $data['lv1'] = 6;
            $data['lv2'] = 1;
            $data3 = menu_ss();
            $this->load->view('layouts/header');
            $this->load->view('layouts/menu', $data3);

            $this->load->view('layouts/navbar', $data);
            $this->load->view('jadwal/v_hapus_jadwal', $data2);
            $this->load->view('layouts/footer');
        }
    }

    public function hapus_jadwal_perbulan($tanggal) {
        if ($this->session->userdata('id_role') == 5) {
            redirect(base_url());
        } else {
            $bulan = date("m", strtotime($tanggal));
            $tahun = date("Y", strtotime($tanggal));
            $depot = $this->session->userdata('id_depot');

            $this->m_penjadwalan->deleteJadwal($depot, $bulan, $tahun);

            $datalog = array(
                'keterangan' => "Menghapus jadwal bulan : $tanggal",
                'id_pegawai' => $this->session->userdata("id_pegawai"),
                'keyword' => 'Hapus'
            );
            $this->m_log_sistem->insertLog($datalog);
            $link = base_url() . "jadwal/hapus_jadwal/";
            echo '<script type="text/javascript">alert("Data berhasil dihapus.");';
            echo 'window.location.href="' . $link . '"';
            echo '</script>';
        }
    }

}
