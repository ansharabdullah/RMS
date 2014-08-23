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
    
    public function cekStatusLogHarian($depot,$tanggal){
        $query = $this->db->query("select * from log_harian l where DATE_FORMAT(l.TANGGAL_LOG_HARIAN, '%d-%m-%Y') = '$tanggal' and l.ID_DEPOT = '$depot'");

        $hasil = 0;
        if ($query->num_rows() == 1) {
            $row = $query->row();
            $hasil = $row->STATUS_INPUT_KINERJA;
        }
        return $hasil;
    }
    
    public function getIdLogHarian($depot,$tanggal){
        $query = $this->db->query("select * from log_harian l where DATE_FORMAT(l.TANGGAL_LOG_HARIAN, '%d-%m-%Y') = '$tanggal' and l.ID_DEPOT = '$depot'");

        $hasil = -1;
        if ($query->num_rows() == 1) {
            $row = $query->row();
            $hasil = $row->ID_LOG_HARIAN;
        }
        return $hasil;
    }


    public function insert_kinerja($depot,$tanggal,$data){
        
    }

}
