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

    /* DASHBOARD --- RENISA */

    //realisasi rencana bulan ini
    public function get_kinerja_bulan($id_depot, $bulan,$tahun) {
        $query = $this->db->query("select sum(km.premium) as premium,sum(km.pertamax) as pertamax,sum(km.pertamax_plus) as pertamax_plus,sum(km.pertamina_dex) as pertamina_dex,
                                   sum(km.solar) as solar, sum(km.bio_solar) as bio_solar , sum(km.own_use) as own_use,
                                   sum(km.total_kl_mt) as total_kl
                                   from kinerja_mt km, log_harian lh 
                                   where km.ID_LOG_HARIAN = lh.ID_LOG_HARIAN 
                                   and MONTH(lh.TANGGAL_LOG_HARIAN) = $bulan and YEAR(lh.TANGGAL_LOG_HARIAN) = $tahun
                                   and lh.ID_DEPOT = $id_depot");
        return $query->result();
    }
    
    public function get_kinerja_bulan_oam($bulan,$tahun) {
        $query = $this->db->query("select sum(km.premium) as premium,sum(km.pertamax) as pertamax,sum(km.pertamax_plus) as pertamax_plus,sum(km.pertamina_dex) as pertamina_dex,
                                   sum(km.solar) as solar, sum(km.bio_solar) as bio_solar , sum(km.own_use) as own_use,
                                   sum(km.total_kl_mt) as total_kl
                                   from kinerja_mt km, log_harian lh 
                                   where km.ID_LOG_HARIAN = lh.ID_LOG_HARIAN 
                                   and MONTH(lh.TANGGAL_LOG_HARIAN) = $bulan and YEAR(lh.TANGGAL_LOG_HARIAN) = $tahun");
        return $query->result();
    }
    
    //realisasi rencana tahun ini
    public function get_kinerja_tahun_oam($tahun) {
        $query = $this->db->query("select sum(km.premium) as premium,sum(km.pertamax) as pertamax,sum(km.pertamax_plus) as pertamax_plus,sum(km.pertamina_dex) as pertamina_dex,
                                   sum(km.solar) as solar, sum(km.bio_solar) as bio_solar , sum(km.own_use) as own_use,
                                   sum(km.total_kl_mt) as total_kl
                                   from kinerja_mt km, log_harian lh 
                                   where km.ID_LOG_HARIAN = lh.ID_LOG_HARIAN 
                                   and YEAR(lh.TANGGAL_LOG_HARIAN) = $tahun");
        return $query->result();
    }
    
    //realisasi rencana hari ini
    public function get_kinerja_hari_oam($tanggal) {
        $query = $this->db->query("select sum(km.premium) as premium,sum(km.pertamax) as pertamax,sum(km.pertamax_plus) as pertamax_plus,sum(km.pertamina_dex) as pertamina_dex,
                                   sum(km.solar) as solar, sum(km.bio_solar) as bio_solar , sum(km.own_use) as own_use,
                                   sum(km.total_kl_mt) as total_kl
                                   from kinerja_mt km, log_harian lh 
                                   where km.ID_LOG_HARIAN = lh.ID_LOG_HARIAN 
                                   and lh.TANGGAL_LOG_HARIAN = '$tanggal'");
        return $query->result();
    }

    //grafik mt
    public function get_kinerja_mt_hari($id_depot, $bulan,$tahun) {
        $query = $this->db->query("select sum(total_km_mt) as total_km, sum(total_kl_mt) as total_kl , 
                                    lh.TANGGAL_LOG_HARIAN, DAY(lh.TANGGAL_LOG_HARIAN) as tanggal 
                                    from kinerja_mt km, log_harian lh 
                                    where  km.ID_LOG_HARIAN = lh.ID_LOG_HARIAN and 
                                    lh.id_depot = $id_depot and MONTH(lh.TANGGAL_LOG_HARIAN) = $bulan 
                                    and YEAR(lh.TANGGAL_LOG_HARIAN) = $tahun
                                    group by lh.TANGGAL_LOG_HARIAN order by tanggal asc");
        return $query->result();
    }
    
     public function get_kinerja_mt_tahun_oam() {
        $query = $this->db->query("select d.ID_DEPOT,d.NAMA_DEPOT, sum(total_km_mt )as total_km, sum(total_kl_mt) as total_kl ,
                                    sum(ritase_mt) as ritase,sum(premium) as premium,sum(pertamax) as pertamax,
                                    sum(pertamax_plus) as pertamax_plus,sum(pertamina_dex) as pertamina_dex,
                                    sum(solar) as solar,sum(bio_solar) as bio_solar,YEAR(lh.TANGGAL_LOG_HARIAN) as tahun 
                                    from kinerja_mt km, log_harian lh,depot d 
                                    where  km.ID_LOG_HARIAN = lh.ID_LOG_HARIAN
                                    and lh.ID_DEPOT = d.ID_DEPOT
                                    group by d.ID_DEPOT,tahun  order by tahun asc");
        return $query->result();
    }
    

    //grafik amt
    public function get_kinerja_amt_hari($id_depot, $bulan,$tahun) {
        $query = $this->db->query("select sum(total_km) as total_km, sum(total_kl) as total_kl , 
                                    lh.TANGGAL_LOG_HARIAN, DAY(lh.TANGGAL_LOG_HARIAN) as tanggal  
                                    from kinerja_amt ka, log_harian lh 
                                    where ka.ID_LOG_HARIAN = lh.ID_LOG_HARIAN and
                                    lh.id_depot = $id_depot and MONTH(lh.TANGGAL_LOG_HARIAN) = $bulan 
                                    and YEAR(lh.TANGGAL_LOG_HARIAN) = $tahun 
                                    group by lh.TANGGAL_LOG_HARIAN order by tanggal asc");
        return $query->result();
    }
    
      public function get_kinerja_amt_bulan($id_depot, $tahun) {
        $query = $this->db->query("select sum(total_km) as total_km, sum(total_kl) as total_kl , 
                                    lh.TANGGAL_LOG_HARIAN, MONTHNAME(STR_TO_DATE(MONTH(lh.TANGGAL_LOG_HARIAN),'%m')) as bulan,
                                    MONTH(lh.TANGGAL_LOG_HARIAN) as no_bulan 
                                    from kinerja_amt ka, log_harian lh 
                                    where ka.ID_LOG_HARIAN = lh.ID_LOG_HARIAN and
                                    lh.id_depot = $id_depot and YEAR(lh.TANGGAL_LOG_HARIAN) = $tahun 
                                    group by MONTH(lh.TANGGAL_LOG_HARIAN) order by bulan asc");
        return $query->result();
    }
    
    
    public function get_kinerja_amt_tahun_oam()
    {
        $query = $this->db->query("select d.ID_DEPOT,d.NAMA_DEPOT,sum(ka.TOTAL_KM) as total_km, sum(ka.TOTAL_KL) as total_kl, 
                                    sum(ka.ritase_amt) as ritase , sum(ka.spbu) as spbu,YEAR(lh.TANGGAL_LOG_HARIAN) as tahun 
                                    from kinerja_amt ka, log_harian lh , depot d
                                    where lh.ID_LOG_HARIAN = ka.ID_LOG_HARIAN  
                                    and d.ID_DEPOT = lh.ID_DEPOT and ka.STATUS_TUGAS = 'SUPIR'
                                    group by d.ID_DEPOT,tahun  order by tahun asc");
        return $query->result();
    }
}
