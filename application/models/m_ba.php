<?php

class m_ba extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function getIdLogHarian($depot, $tahun, $bulan, $hari) {
        $query = $this->db->query("select l.ID_LOG_HARIAN from log_harian l where l.ID_DEPOT = '$depot' and MONTH(l.TANGGAL_LOG_HARIAN) = '$bulan' and YEAR(l.TANGGAL_LOG_HARIAN) = '$tahun' and DAY(l.TANGGAL_LOG_HARIAN) = '$hari'");
        $hasil = -1;
        if ($query->num_rows() == 1) {
            $row = $query->row();
            $hasil = $row->ID_LOG_HARIAN;
        }
        return $hasil;
    }

    public function cekMS2($depot, $tahun, $bulan) {
        $query = $this->db->query("select SUM(STATUS_MS2) as STATUS_MS2 from log_harian where ID_DEPOT = '$depot' and  YEAR(TANGGAL_LOG_HARIAN) = '$tahun' and MONTH(TANGGAL_LOG_HARIAN) = '$bulan'");
        $row = $query->row();
        return $hasil = $row->STATUS_MS2;
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

    public function simpanMS2($ms2) {
        $no = 0;
        for ($no = 0; $no < $ms2['jumlah']; $no++) {
            $query = $this->db->query("insert into ms2(ID_LOG_HARIAN,SESUAI_PREMIUM,SESUAI_SOLAR,SESUAI_PERTAMAX,CEPAT_PREMIUM,CEPAT_SOLAR,CEPAT_PERTAMAX,CEPAT_SHIFT1_PREMIUM,CEPAT_SHIFT1_SOLAR,CEPAT_SHIFT1_PERTAMAX,LAMBAT_PREMIUM,LAMBAT_SOLAR,LAMBAT_PERTAMAX,TIDAK_TERKIRIM_PREMIUM,TIDAK_TERKIRIM_SOLAR,TIDAK_TERKIRIM_PERTAMAX)values('" . $ms2['id_log_harian'][$no] . "','" . $ms2['sesuai_premium'][$no] . "','" . $ms2['sesuai_solar'][$no] . "','" . $ms2['sesuai_pertamax'][$no] . "','" . $ms2['cepat_premium'][$no] . "','" . $ms2['cepat_solar'][$no] . "','" . $ms2['cepat_pertamax'][$no] . "','" . $ms2['cepat_shift1_premium'][$no] . "','" . $ms2['cepat_shift1_solar'][$no] . "','" . $ms2['cepat_shift1_pertamax'][$no] . "','" . $ms2['lambat_premium'][$no] . "','" . $ms2['lambat_solar'][$no] . "','" . $ms2['lambat_pertamax'][$no] . "','" . $ms2['tidak_terkirim_premium'][$no] . "','" . $ms2['tidak_terkirim_solar'][$no] . "','" . $ms2['tidak_terkirim_pertamax'][$no] . "')");
            $query = $this->db->query("update log_harian set STATUS_MS2 = 1 where ID_LOG_HARIAN = '" . $ms2['id_log_harian'][$no] . "'");
        }
    }
    
    public function cekInterpolasi($depot, $tahun, $bulan) {
        $query = $this->db->query("select SUM(STATUS_INTERPOLASI) as STATUS_INTERPOLASI from log_harian where ID_DEPOT = '$depot' and  YEAR(TANGGAL_LOG_HARIAN) = '$tahun' and MONTH(TANGGAL_LOG_HARIAN) = '$bulan'");
        $row = $query->row();
        return $hasil = $row->STATUS_INTERPOLASI;
    }
    
    public function getInterpolasi($depot,$tahun,$bulan) {
        $query = $this->db->query("select n.ID_NILAI,j.JENIS_PENILAIAN,l.TANGGAL_LOG_HARIAN,n.NILAI from log_harian l, nilai n, jenis_penilaian j where l.ID_LOG_HARIAN = n.ID_LOG_HARIAN and n.ID_JENIS_PENILAIAN = j.ID_JENIS_PENILAIAN and j.KELOMPOK_PENILAIAN = 'INTERPOLASI' and l.ID_DEPOT = '$depot' and MONTH(l.TANGGAL_LOG_HARIAN) = '$bulan' and YEAR(l.TANGGAL_LOG_HARIAN) = '$tahun' order by j.JENIS_PENILAIAN ASC");
        return $query->result();
    }
    
    public function editInterpolasi($id,$nilai) {
        $query = $this->db->query("update nilai set NILAI = '$nilai' where ID_NILAI = '$id'");
    }
    
    public function tambahInterpolasi($depot,$bulan,$tahun,$id_log_frm1,$frm1,$id_log_frm2,$frm2,$id_log_interpolasi1,$interpolasi1,$id_log_interpolasi2,$interpolasi2) {
        $query = $this->db->query("insert into nilai(ID_JENIS_PENILAIAN,ID_LOG_HARIAN,NILAI) values('21','$id_log_frm1','$frm1')");
        $query = $this->db->query("insert into nilai(ID_JENIS_PENILAIAN,ID_LOG_HARIAN,NILAI) values('22','$id_log_frm2','$frm2')");
        $query = $this->db->query("insert into nilai(ID_JENIS_PENILAIAN,ID_LOG_HARIAN,NILAI) values('23','$id_log_interpolasi1','$interpolasi1')");
        $query = $this->db->query("insert into nilai(ID_JENIS_PENILAIAN,ID_LOG_HARIAN,NILAI) values('24','$id_log_interpolasi2','$interpolasi2')");
        
        $query = $this->db->query("update log_harian l set l.STATUS_INTERPOLASI = 1 where l.ID_DEPOT = '$depot' and MONTH(l.TANGGAL_LOG_HARIAN) = '$bulan' and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun'");
    }
    
    
    public function cekKPIOperasional($depot, $tahun, $bulan) {
        $query = $this->db->query("select SUM(STATUS_KPI_OPERASIONAL_INTERNAL) as STATUS_KPI_OPERASIONAL from log_harian where ID_DEPOT = '$depot' and  YEAR(TANGGAL_LOG_HARIAN) = '$tahun' and MONTH(TANGGAL_LOG_HARIAN) = '$bulan'");
        $row = $query->row();
        return $hasil = $row->STATUS_KPI_OPERASIONAL;
    }
        
    public function cekRecana($depot, $tahun, $bulan) {
        $query = $this->db->query("select SUM(STATUS_RENCANA) as STATUS_RENCANA from log_harian where ID_DEPOT = '$depot' and  YEAR(TANGGAL_LOG_HARIAN) = '$tahun' and MONTH(TANGGAL_LOG_HARIAN) = '$bulan'");
        $row = $query->row();
        return $hasil = $row->STATUS_RENCANA;
    }
    
    public function cekKinerja($depot, $tahun, $bulan) {
        $query = $this->db->query("select SUM(STATUS_INPUT_KINERJA) as STATUS_INPUT_KINERJA from log_harian where ID_DEPOT = '$depot' and  YEAR(TANGGAL_LOG_HARIAN) = '$tahun' and MONTH(TANGGAL_LOG_HARIAN) = '$bulan'");
        $row = $query->row();
        return $hasil = $row->STATUS_INPUT_KINERJA;
    }
    
    public function getKPIOperasional($depot,$tahun,$bulan) {
        $query = $this->db->query("select l.ID_LOG_HARIAN,l.TANGGAL_LOG_HARIAN,k.ID_KPI_OPERASIONAL,k.ID_JENIS_KPI_OPERASIONAL,k.TARGET,k.BOBOT,k.REALISASI,k.DEVIASI,k.PERFORMANCE_SCORE,k.NORMAL_SCORE,k.WEIGHTED_SCORE,j.JENIS_KPI_OPERASIONAL from log_harian l, kpi_operasional k, jenis_kpi_operasional j where l.ID_LOG_HARIAN = k.ID_LOG_HARIAN and k.ID_JENIS_KPI_OPERASIONAL = j.ID_JENIS_KPI_OPERASIONAL and MONTH(l.TANGGAL_LOG_HARIAN) = '$bulan' and YEAR(l.TANGGAL_LOG_HARIAN) = '$tahun' and l.ID_DEPOT = '$depot' order by j.ID_JENIS_KPI_OPERASIONAL");
        return $query->result();
    }
    
    public function editKPIOperasional($id_kpi,$target,$realisasi,$deviasi,$performance_score,$normal_score,$weighted_score) {
        $query = $this->db->query("update kpi_operasional set TARGET = '$target',REALISASI = '$realisasi',DEVIASI='$deviasi',PERFORMANCE_SCORE='$performance_score',NORMAL_SCORE='$normal_score',WEIGHTED_SCORE='$weighted_score' where ID_KPI_OPERASIONAL = '$id_kpi'");
    }
    
    public function getTotalMS2KPI($depot,$tahun,$bulan) {
        $query = $this->db->query("select l.ID_LOG_HARIAN,l.TANGGAL_LOG_HARIAN,k.ID_KPI_OPERASIONAL,k.ID_JENIS_KPI_OPERASIONAL,k.TARGET,k.BOBOT,k.REALISASI,k.DEVIASI,k.PERFORMANCE_SCORE,k.NORMAL_SCORE,k.WEIGHTED_SCORE,j.JENIS_KPI_OPERASIONAL from log_harian l, kpi_operasional k, jenis_kpi_operasional j where l.ID_LOG_HARIAN = k.ID_LOG_HARIAN and k.ID_JENIS_KPI_OPERASIONAL = j.ID_JENIS_KPI_OPERASIONAL and MONTH(l.TANGGAL_LOG_HARIAN) = '$bulan' and YEAR(l.TANGGAL_LOG_HARIAN) = '$tahun' and l.ID_DEPOT = '$depot' order by j.ID_JENIS_KPI_OPERASIONAL");
        return $query->result();
    }
    public function getTotalRealisaasiKPI($depot,$tahun,$bulan) {
        $query = $this->db->query("select l.ID_LOG_HARIAN,l.TANGGAL_LOG_HARIAN,k.ID_KPI_OPERASIONAL,k.ID_JENIS_KPI_OPERASIONAL,k.TARGET,k.BOBOT,k.REALISASI,k.DEVIASI,k.PERFORMANCE_SCORE,k.NORMAL_SCORE,k.WEIGHTED_SCORE,j.JENIS_KPI_OPERASIONAL from log_harian l, kpi_operasional k, jenis_kpi_operasional j where l.ID_LOG_HARIAN = k.ID_LOG_HARIAN and k.ID_JENIS_KPI_OPERASIONAL = j.ID_JENIS_KPI_OPERASIONAL and MONTH(l.TANGGAL_LOG_HARIAN) = '$bulan' and YEAR(l.TANGGAL_LOG_HARIAN) = '$tahun' and l.ID_DEPOT = '$depot' order by j.ID_JENIS_KPI_OPERASIONAL");
        return $query->result();
    }
    
    public function tambahKPIOperasional($depot,$bulan,$tahun,$id_log_frm1,$frm1,$id_log_frm2,$frm2,$id_log_interpolasi1,$interpolasi1,$id_log_interpolasi2,$interpolasi2) {
        $query = $this->db->query("insert into nilai(ID_JENIS_PENILAIAN,ID_LOG_HARIAN,NILAI) values('21','$id_log_frm1','$frm1')");
        $query = $this->db->query("insert into nilai(ID_JENIS_PENILAIAN,ID_LOG_HARIAN,NILAI) values('22','$id_log_frm2','$frm2')");
        $query = $this->db->query("insert into nilai(ID_JENIS_PENILAIAN,ID_LOG_HARIAN,NILAI) values('23','$id_log_interpolasi1','$interpolasi1')");
        $query = $this->db->query("insert into nilai(ID_JENIS_PENILAIAN,ID_LOG_HARIAN,NILAI) values('24','$id_log_interpolasi2','$interpolasi2')");
        
        $query = $this->db->query("update log_harian l set l.STATUS_INTERPOLASI = 1 where l.ID_DEPOT = '$depot' and MONTH(l.TANGGAL_LOG_HARIAN) = '$bulan' and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun'");
    }

    
    
    
    
    public function dummy_kinerja_amt($id_kinerja,$id_log_harian,$id_pegawai,$status_tugas,$total_km,$total_kl,$ritase,$pendapatan,$spbu) {
        $query = $this->db->query("insert into kinerja_amt(ID_KINERJA_AMT,ID_LOG_HARIAN,ID_PEGAWAI,STATUS_TUGAS,TOTAL_KM,TOTAL_KL,RITASE_AMT,PENDAPATAN,SPBU) values('$id_kinerja','$id_log_harian','$id_pegawai','$status_tugas','$total_km','$total_kl','$ritase','$pendapatan','$spbu')");
      
    }
    
    public function dummy_kinerja_mt($id_kinerja,$id_log_harian,$id_mobil,$ritase,$total_km,$total_kl,$ownuse,$premium,$pertamax,$pertamax_plus,$pertamina_dex,$solar,$biosolar) {
        $query = $this->db->query("insert into kinerja_mt(ID_KINERJA_MT,ID_LOG_HARIAN,ID_MOBIL,RITASE_MT,TOTAL_KM_MT,TOTAL_KL_MT,OWN_USE,PREMIUM,PERTAMAX,PERTAMAX_PLUS,PERTAMINA_DEX,SOLAR,BIO_SOLAR) values('$id_kinerja','$id_log_harian','$id_mobil','$ritase','$total_km','$total_kl','$ownuse','$premium','$pertamax','$pertamax_plus','$pertamina_dex','$solar','$biosolar')");
    
    }
}
