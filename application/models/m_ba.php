<?php

class m_ba extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function cekMS2($depot, $tahun, $bulan) {
        $query = $this->db->query("select SUM(STATUS_MS2) as STATUS_MS2 from log_harian where ID_DEPOT = '$depot' and  YEAR(TANGGAL_LOG_HARIAN) = '$tahun' and MONTH(TANGGAL_LOG_HARIAN) = '$bulan'");
        $row = $query->row();
        return $hasil = $row->STATUS_MS2;
        ;
    }

    public function getMS2($depot, $tahun, $bulan) {
        $query = $this->db->query("select l.ID_LOG_HARIAN,m.ID_MS2, DATE_FORMAT(l.TANGGAL_LOG_HARIAN, '%d-%m-%Y')as TANGGAL, m.SESUAI_PREMIUM,m.SESUAI_PERTAMAX,m.SESUAI_SOLAR,m.CEPAT_PREMIUM,m.CEPAT_PERTAMAX,m.CEPAT_SOLAR,m.CEPAT_SHIFT1_PREMIUM,m.CEPAT_SHIFT1_PERTAMAX,m.CEPAT_SHIFT1_SOLAR,m.LAMBAT_PREMIUM,m.LAMBAT_PERTAMAX,m.LAMBAT_SOLAR,m.TIDAK_TERKIRIM_PREMIUM,m.TIDAK_TERKIRIM_PERTAMAX,m.TIDAK_TERKIRIM_SOLAR from log_harian l, ms2 m where l.ID_LOG_HARIAN = m.ID_LOG_HARIAN and l.ID_DEPOT = '$depot' and  YEAR(l.TANGGAL_LOG_HARIAN) = '$tahun' and MONTH(l.TANGGAL_LOG_HARIAN) = '$bulan' order by TANGGAL ASC");
        return $query->result();
    }

    public function deleteMS2($ms2) {
        foreach ($ms2 as $row) {
            $query = $this->db->query("delete from ms2 where ID_MS2='$row->ID_MS2'");
            $query = $this->db->query("update log_harian set STATUS_MS2 = 0 where ID_LOG_HARIAN='$row->ID_LOG_HARIAN'");
        }
    }

    public function editMS2($id, $sesuai_premium, $sesuai_solar, $sesuai_pertamax, $cepat_premium, $cepat_solar, $cepat_pertamax, $cepat_shift1_premium, $cepat_shift1_solar, $cepat_shift1_pertamax, $lambat_premium, $lambat_solar, $lambat_pertamax, $tidak_terkirim_premium, $tidak_terkirim_solar, $tidak_terkirim_pertamax) {
        $query = $this->db->query("update ms2 set SESUAI_PREMIUM = '$sesuai_premium',SESUAI_SOLAR='$sesuai_solar', SESUAI_PERTAMAX = '$sesuai_pertamax',CEPAT_PREMIUM = '$cepat_premium',CEPAT_SOLAR='$cepat_solar', CEPAT_PERTAMAX = '$cepat_pertamax',CEPAT_SHIFT1_PREMIUM = '$cepat_shift1_premium',CEPAT_SHIFT1_SOLAR='$cepat_shift1_solar', CEPAT_SHIFT1_PERTAMAX = '$cepat_shift1_pertamax',LAMBAT_PREMIUM = '$lambat_premium',LAMBAT_SOLAR='$lambat_solar', LAMBAT_PERTAMAX = '$lambat_pertamax',TIDAK_TERKIRIM_PREMIUM = '$tidak_terkirim_premium',TIDAK_TERKIRIM_SOLAR='$tidak_terkirim_solar', TIDAK_TERKIRIM_PERTAMAX = '$tidak_terkirim_pertamax' where ID_MS2='$id'");
    }

}