<?php

class m_kinerja extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function getIdPegawai($nip, $depot) {
        $query = $this->db->query("select id_pegawai from pegawai where NIP = '$nip' and id_depot = '$depot'");

        $hasil = -1;
        if ($query->num_rows() == 1) {
            $row = $query->row();
            $hasil = $row->id_pegawai;
        }
        return $hasil;
    }

    public function getIdMobil($nopol, $depot) {
        $query = $this->db->query("select id_mobil from mobil where nopol = '$nopol' and id_depot = '$depot'");

        $hasil = -1;
        if ($query->num_rows() == 1) {
            $row = $query->row();
            $hasil = $row->id_mobil;
        }
        return $hasil;
    }

    public function getKoefisien($tahun, $depot, $klas) {
        $query = $this->db->query("SELECT n.ID_NILAI, n.ID_JENIS_PENILAIAN,n.ID_DEPOT,n.ID_LOG_HARIAN,n.NILAI,j.jenis_penilaian,j.kelompok_penilaian,l.TANGGAL_LOG_HARIAN from nilai n, jenis_penilaian j, log_harian l where n.ID_JENIS_PENILAIAN = j.ID_JENIS_PENILAIAN and l.ID_LOG_HARIAN = n.ID_LOG_HARIAN and n.ID_DEPOT = '$depot' and YEAR(l.TANGGAL_LOG_HARIAN) = '$tahun' and j.KELOMPOK_PENILAIAN like '%$klas%' ORDER BY n.ID_NILAI ASC");
        $data = $query->result();

        if ($query->num_rows() == 4) {
            $hasil['error'] = false;
            $hasil['km'] = $data[0]->NILAI;
            $hasil['kl'] = $data[1]->NILAI;
            $hasil['rit'] = $data[2]->NILAI;
            $hasil['spbu'] = $data[3]->NILAI;
        } else {
            $hasil['error'] = true;
            $hasil['km'] = 1;
            $hasil['kl'] = 1;
            $hasil['rit'] = 1;
            $hasil['spbu'] = 1;
        }

        return $hasil;
    }

    public function cekStatusLogHarian($depot, $tanggal) {
        $query = $this->db->query("select * from log_harian l where DATE_FORMAT(l.TANGGAL_LOG_HARIAN, '%d-%m-%Y') = '$tanggal' and l.ID_DEPOT = '$depot'");

        $hasil = 0;
        if ($query->num_rows() == 1) {
            $row = $query->row();
            $hasil = $row->STATUS_INPUT_KINERJA;
        }
        return $hasil;
    }

    public function getIdLogHarian($depot, $tanggal) {
        $query = $this->db->query("select * from log_harian l where DATE_FORMAT(l.TANGGAL_LOG_HARIAN, '%d-%m-%Y') = '$tanggal' and l.ID_DEPOT = '$depot'");

        $hasil = -1;
        if ($query->num_rows() == 1) {
            $row = $query->row();
            $hasil = $row->ID_LOG_HARIAN;
        }
        return $hasil;
    }

    public function insert_siod($depot, $data_kinerja) {
        //insert kinerja MT
        $no = 1;
        for ($no = 1; $no <= $data_kinerja['MT']['jumlah']; $no++) {
            $query = $this->db->query("insert into kinerja_mt(ID_MOBIL,ID_LOG_HARIAN,RITASE_MT,TOTAL_KM_MT,TOTAL_KL_MT,OWN_USE,PREMIUM,PERTAMAX,PERTAMAX_PLUS,PERTAMINA_DEX,SOLAR,BIO_SOLAR) values(" . $data_kinerja['MT']['id'][$no - 1] . "," . $data_kinerja['ID_LOG_HARIAN'] . "," . $data_kinerja['MT']['ritase'][$no - 1] . "," . $data_kinerja['MT']['total_km'][$no - 1] . "," . $data_kinerja['MT']['total_kl'][$no - 1] . "," . $data_kinerja['MT']['ownuse'][$no - 1] . "," . $data_kinerja['MT']['premium'][$no - 1] . "," . $data_kinerja['MT']['pertamax'][$no - 1] . "," . $data_kinerja['MT']['pertamax_plus'][$no - 1] . "," . $data_kinerja['MT']['pertamina_dex'][$no - 1] . "," . $data_kinerja['MT']['solar'][$no - 1] . "," . $data_kinerja['MT']['bio_solar'][$no - 1] . ")");
        }

        //insert kinerja supir
        $no = 1;
        for ($no = 1; $no <= $data_kinerja['SUPIR']['jumlah']; $no++) {
            $query = $this->db->query("insert into kinerja_amt(ID_LOG_HARIAN,ID_PEGAWAI,STATUS_TUGAS,TOTAL_KM,TOTAL_KL,RITASE_AMT,SPBU,PENDAPATAN)values(" . $data_kinerja['ID_LOG_HARIAN'] . "," . $data_kinerja['SUPIR']['id'][$no - 1] . ",'" . $data_kinerja['SUPIR']['status_tugas'][$no - 1] . "'," . $data_kinerja['SUPIR']['total_km'][$no - 1] . "," . $data_kinerja['SUPIR']['total_kl'][$no - 1] . "," . $data_kinerja['SUPIR']['ritase'][$no - 1] . "," . $data_kinerja['SUPIR']['jumlah_spbu'][$no - 1] . "," . $data_kinerja['SUPIR']['pendapatan'][$no - 1] . ")");
        }

        //insert kinerja KERNET
        $no = 1;
        for ($no = 1; $no <= $data_kinerja['KERNET']['jumlah']; $no++) {
            $query = $this->db->query("insert into kinerja_amt(ID_LOG_HARIAN,ID_PEGAWAI,STATUS_TUGAS,TOTAL_KM,TOTAL_KL,RITASE_AMT,SPBU,PENDAPATAN)values(" . $data_kinerja['ID_LOG_HARIAN'] . "," . $data_kinerja['KERNET']['id'][$no - 1] . ",'" . $data_kinerja['KERNET']['status_tugas'][$no - 1] . "'," . $data_kinerja['KERNET']['total_km'][$no - 1] . "," . $data_kinerja['KERNET']['total_kl'][$no - 1] . "," . $data_kinerja['KERNET']['ritase'][$no - 1] . "," . $data_kinerja['KERNET']['jumlah_spbu'][$no - 1] . "," . $data_kinerja['KERNET']['pendapatan'][$no - 1] . ")");
        }

        //update log harian
        $query = $this->db->query("update log_harian l set l.STATUS_INPUT_KINERJA = 1, l.JUMLAH_ALOKASI_SPBU = '" . $data_kinerja['SPBU']['jumlah'] . "' where l.ID_LOG_HARIAN = '" . $data_kinerja['ID_LOG_HARIAN'] . "'");
    }

    public function hapus_kinerja_siod($id) {
        //hapus kinerja MT
        $query = $this->db->query("delete from kinerja_mt where ID_LOG_HARIAN='" . $id . "'");

        //hapus kinerja amt
        $query = $this->db->query("delete from kinerja_amt where ID_LOG_HARIAN='" . $id . "'");


        //update log harian
        $query = $this->db->query("update log_harian l set l.STATUS_INPUT_KINERJA = 0, l.JUMLAH_ALOKASI_SPBU = 0 where l.ID_LOG_HARIAN = '" . $id . "'");
    }
    
    public function getPegawai($depot) {
        $query = $this->db->query("select ID_PEGAWAI, NIP, NO_PEKERJA, NAMA_PEGAWAI, JABATAN, TRANSPORTIR_ASAL, KLASIFIKASI from pegawai where ID_DEPOT = '$depot' and STATUS <> 'TIDAK AKTIF' and (JABATAN = 'KERNET' or JABATAN = 'SUPIR') order by NAMA_PEGAWAI ASC");
        return $query->result();
    }
    
    public function getMobil($depot) {
        $query = $this->db->query("select ID_MOBIL,NOPOL,TRANSPORTIR,KAPASITAS,PRODUK,KATEGORI_MOBIL,STATUS_MOBIL from mobil where ID_DEPOT = '$depot' order by TRANSPORTIR ASC, NOPOL ASC");
        return $query->result();
    }
    
    public function getIdKinerjaAMT($id_log_harian, $id_pegawai) {
        $query = $this->db->query("select * from kinerja_amt where ID_LOG_HARIAN = '$id_log_harian' and ID_PEGAWAI = '$id_pegawai'");
        return $query->num_rows();
    }
    
    public function insertManualKinerjaAMT($id_log_harian, $id_pegawai,$status_tugas,$km,$kl,$rit,$spbu,$pendapatan) {
        $query = $this->db->query("insert into kinerja_amt(ID_LOG_HARIAN,ID_PEGAWAI,STATUS_TUGAS,TOTAL_KM,TOTAL_KL,RITASE_AMT,SPBU,PENDAPATAN) values('$id_log_harian','$id_pegawai','$status_tugas','$km','$kl','$rit','$spbu','$pendapatan')");
    }
    
    public function getIdKinerjaMT($id_log_harian, $id_mobil) {
        $query = $this->db->query("select * from kinerja_mt where ID_LOG_HARIAN = '$id_log_harian' and ID_MOBIL = '$id_mobil'");
        return $query->num_rows();
    }
    
    public function insertManualKinerjaMT($id_log_harian, $id_mobil,$km,$kl,$rit,$ou,$premium,$pertamax,$pertamax_plus,$pertamina_dex,$solar,$bio_solar) {
        $query = $this->db->query("insert into kinerja_mt(ID_LOG_HARIAN,ID_MOBIL,TOTAL_KM_MT,TOTAL_KL_MT,RITASE_MT,OWN_USE,PREMIUM,PERTAMAX,PERTAMAX_PLUS,PERTAMINA_DEX,SOLAR,BIO_SOLAR) values('$id_log_harian','$id_mobil','$km','$kl','$rit','$ou','$premium','$pertamax','$pertamax_plus','$pertamina_dex','$solar','$bio_solar')");
    }

}
