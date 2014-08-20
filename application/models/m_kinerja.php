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
    
    public function getKoefisien($tahun, $depot,$klas) {
        //$query = $this->db->query("select id_mobil from mobil where nopol = '$nopol' and id_depot = '$depot'");
        
        $hasil['km'] = 431.911897317884;
        $hasil['kl'] = 85.582804865155;
        $hasil['rit'] = 80.8623201356707;
        $hasil['spbu'] = 59.6126849991402;
        //if ($query->num_rows() == 1) {
            //$row = $query->row();
            //$hasil = $row->id_mobil;
        //}
        return $hasil;
    }

}
