<?php

class m_laporan extends CI_Model {

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

    public function getTotalMS2($depot, $tahun, $bulan) {
        $query = $this->db->query("select n.ID_NILAI,n.NILAI,j.JENIS_PENILAIAN from log_harian l, nilai n, jenis_penilaian j where l.ID_LOG_HARIAN = n.ID_LOG_HARIAN and n.ID_JENIS_PENILAIAN = j.ID_JENIS_PENILAIAN and l.ID_DEPOT = '$depot' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and YEAR(l.TANGGAL_LOG_HARIAN) = '$tahun' and j.KELOMPOK_PENILAIAN = 'MS2' ORDER BY j.ID_JENIS_PENILAIAN");
        return $query->result();
    }
    
    public function SyncRataMS2($depot, $tahun, $bulan) {
        $query = $this->db->query("select l.ID_LOG_HARIAN,m.ID_MS2, DATE_FORMAT(l.TANGGAL_LOG_HARIAN, '%d-%m-%Y')as TANGGAL,((AVG(m.SESUAI_PREMIUM)+AVG(m.SESUAI_PERTAMAX)+AVG(m.SESUAI_SOLAR))/3)as RATA_SESUAI,((AVG(m.CEPAT_PREMIUM)+AVG(m.CEPAT_PERTAMAX)+AVG(m.CEPAT_SOLAR))/3)as RATA_CEPAT,((AVG(m.CEPAT_SHIFT1_PREMIUM)+AVG(m.CEPAT_SHIFT1_PERTAMAX)+AVG(m.CEPAT_SHIFT1_SOLAR))/3)as RATA_CEPAT_SHIFT1,((AVG(m.LAMBAT_PREMIUM)+AVG(m.LAMBAT_PERTAMAX)+AVG(m.LAMBAT_SOLAR))/3)as RATA_LAMBAT,((AVG(m.TIDAK_TERKIRIM_PREMIUM)+AVG(m.TIDAK_TERKIRIM_PERTAMAX)+AVG(m.TIDAK_TERKIRIM_SOLAR))/3)as RATA_TIDAK_TERKIRIM,((AVG(m.TOTAL_LO_PREMIUM)+AVG(m.TOTAL_LO_PERTAMAX)+AVG(m.TOTAL_LO_SOLAR))/3)as RATA_TOTAL_LO from log_harian l, ms2 m where l.ID_LOG_HARIAN = m.ID_LOG_HARIAN and l.ID_DEPOT = '$depot' and  YEAR(l.TANGGAL_LOG_HARIAN) = '$tahun' and MONTH(l.TANGGAL_LOG_HARIAN) = '$bulan' order by TANGGAL ASC");
        $data = $query->row();
        
        $nilai = round($data->RATA_SESUAI, 2);
        $query = $this->db->query("update nilai n, log_harian l set n.NILAI = '$nilai' where l.ID_LOG_HARIAN = n.ID_LOG_HARIAN and l.ID_DEPOT ='$depot' and MONTH(l.TANGGAL_LOG_HARIAN) = '$bulan' and YEAR(l.TANGGAL_LOG_HARIAN) ='$tahun' and n.ID_JENIS_PENILAIAN = 65");
        
        $nilai = round($data->RATA_CEPAT, 2);
        $query = $this->db->query("update nilai n, log_harian l set n.NILAI = '$nilai' where l.ID_LOG_HARIAN = n.ID_LOG_HARIAN and l.ID_DEPOT ='$depot' and MONTH(l.TANGGAL_LOG_HARIAN) = '$bulan' and YEAR(l.TANGGAL_LOG_HARIAN) ='$tahun' and n.ID_JENIS_PENILAIAN = 66");
        
        $nilai = round($data->RATA_CEPAT_SHIFT1, 2);
        $query = $this->db->query("update nilai n, log_harian l set n.NILAI = '$nilai' where l.ID_LOG_HARIAN = n.ID_LOG_HARIAN and l.ID_DEPOT ='$depot' and MONTH(l.TANGGAL_LOG_HARIAN) = '$bulan' and YEAR(l.TANGGAL_LOG_HARIAN) ='$tahun' and n.ID_JENIS_PENILAIAN = 67");
        
        $nilai = round($data->RATA_LAMBAT, 2);
        $query = $this->db->query("update nilai n, log_harian l set n.NILAI = '$nilai' where l.ID_LOG_HARIAN = n.ID_LOG_HARIAN and l.ID_DEPOT ='$depot' and MONTH(l.TANGGAL_LOG_HARIAN) = '$bulan' and YEAR(l.TANGGAL_LOG_HARIAN) ='$tahun' and n.ID_JENIS_PENILAIAN = 68");
        
        $nilai = round($data->RATA_TIDAK_TERKIRIM, 2);
        $query = $this->db->query("update nilai n, log_harian l set n.NILAI = '$nilai' where l.ID_LOG_HARIAN = n.ID_LOG_HARIAN and l.ID_DEPOT ='$depot' and MONTH(l.TANGGAL_LOG_HARIAN) = '$bulan' and YEAR(l.TANGGAL_LOG_HARIAN) ='$tahun' and n.ID_JENIS_PENILAIAN = 69");
        
        $nilai = round($data->RATA_TOTAL_LO, 2);
        $query = $this->db->query("update nilai n, log_harian l set n.NILAI = '$nilai' where l.ID_LOG_HARIAN = n.ID_LOG_HARIAN and l.ID_DEPOT ='$depot' and MONTH(l.TANGGAL_LOG_HARIAN) = '$bulan' and YEAR(l.TANGGAL_LOG_HARIAN) ='$tahun' and n.ID_JENIS_PENILAIAN = 70");
        
        $nilai = round($data->RATA_SESUAI, 2) + round($data->RATA_CEPAT, 2) + round($data->RATA_CEPAT_SHIFT1, 2);
        $query = $this->db->query("update nilai n, log_harian l set n.NILAI = '$nilai' where l.ID_LOG_HARIAN = n.ID_LOG_HARIAN and l.ID_DEPOT ='$depot' and MONTH(l.TANGGAL_LOG_HARIAN) = '$bulan' and YEAR(l.TANGGAL_LOG_HARIAN) ='$tahun' and n.ID_JENIS_PENILAIAN = 71");
            
    }
    
    public function deleteMS2($ms2,$total_ms2) {
        foreach ($total_ms2 as $row) {
            $query = $this->db->query("delete from nilai where ID_NILAI='$row->ID_NILAI'");
        }
        foreach ($ms2 as $row) {
            $query = $this->db->query("delete from ms2 where ID_MS2='$row->ID_MS2'");
            $query = $this->db->query("update log_harian set STATUS_MS2 = 0 where ID_LOG_HARIAN='$row->ID_LOG_HARIAN'");
        }
    }

    public function editMS2($id, $sesuai_premium, $sesuai_solar, $sesuai_pertamax, $cepat_premium, $cepat_solar, $cepat_pertamax, $cepat_shift1_premium, $cepat_shift1_solar, $cepat_shift1_pertamax, $lambat_premium, $lambat_solar, $lambat_pertamax, $tidak_terkirim_premium, $tidak_terkirim_solar, $tidak_terkirim_pertamax,$depot,$tahun,$bulan) {
        $query = $this->db->query("update ms2 set SESUAI_PREMIUM = '$sesuai_premium',SESUAI_SOLAR='$sesuai_solar', SESUAI_PERTAMAX = '$sesuai_pertamax',CEPAT_PREMIUM = '$cepat_premium',CEPAT_SOLAR='$cepat_solar', CEPAT_PERTAMAX = '$cepat_pertamax',CEPAT_SHIFT1_PREMIUM = '$cepat_shift1_premium',CEPAT_SHIFT1_SOLAR='$cepat_shift1_solar', CEPAT_SHIFT1_PERTAMAX = '$cepat_shift1_pertamax',LAMBAT_PREMIUM = '$lambat_premium',LAMBAT_SOLAR='$lambat_solar', LAMBAT_PERTAMAX = '$lambat_pertamax',TIDAK_TERKIRIM_PREMIUM = '$tidak_terkirim_premium',TIDAK_TERKIRIM_SOLAR='$tidak_terkirim_solar', TIDAK_TERKIRIM_PERTAMAX = '$tidak_terkirim_pertamax' where ID_MS2='$id'");
        $this->SyncRataMS2($depot, $tahun, $bulan);
    }

    public function simpanMS2($ms2) {
        $no = 0;
        for ($no = 0; $no < $ms2['jumlah']; $no++) {
            $query = $this->db->query("insert into ms2(ID_LOG_HARIAN,SESUAI_PREMIUM,SESUAI_SOLAR,SESUAI_PERTAMAX,CEPAT_PREMIUM,CEPAT_SOLAR,CEPAT_PERTAMAX,CEPAT_SHIFT1_PREMIUM,CEPAT_SHIFT1_SOLAR,CEPAT_SHIFT1_PERTAMAX,LAMBAT_PREMIUM,LAMBAT_SOLAR,LAMBAT_PERTAMAX,TIDAK_TERKIRIM_PREMIUM,TIDAK_TERKIRIM_SOLAR,TIDAK_TERKIRIM_PERTAMAX)values('" . $ms2['id_log_harian'][$no] . "','" . $ms2['sesuai_premium'][$no] . "','" . $ms2['sesuai_solar'][$no] . "','" . $ms2['sesuai_pertamax'][$no] . "','" . $ms2['cepat_premium'][$no] . "','" . $ms2['cepat_solar'][$no] . "','" . $ms2['cepat_pertamax'][$no] . "','" . $ms2['cepat_shift1_premium'][$no] . "','" . $ms2['cepat_shift1_solar'][$no] . "','" . $ms2['cepat_shift1_pertamax'][$no] . "','" . $ms2['lambat_premium'][$no] . "','" . $ms2['lambat_solar'][$no] . "','" . $ms2['lambat_pertamax'][$no] . "','" . $ms2['tidak_terkirim_premium'][$no] . "','" . $ms2['tidak_terkirim_solar'][$no] . "','" . $ms2['tidak_terkirim_pertamax'][$no] . "')");
            $query = $this->db->query("update log_harian set STATUS_MS2 = 1 where ID_LOG_HARIAN = '" . $ms2['id_log_harian'][$no] . "'");
        }
        $id_log_harian = $ms2['id_log_harian'][0];
        $query = $this->db->query("insert into nilai(ID_JENIS_PENILAIAN,ID_LOG_HARIAN,NILAI) values('65','$id_log_harian','".$ms2['rata_sesuai']."')");
        $query = $this->db->query("insert into nilai(ID_JENIS_PENILAIAN,ID_LOG_HARIAN,NILAI) values('66','$id_log_harian','".$ms2['rata_cepat']."')");
        $query = $this->db->query("insert into nilai(ID_JENIS_PENILAIAN,ID_LOG_HARIAN,NILAI) values('67','$id_log_harian','".$ms2['rata_cepat_shift1']."')");
        $query = $this->db->query("insert into nilai(ID_JENIS_PENILAIAN,ID_LOG_HARIAN,NILAI) values('68','$id_log_harian','".$ms2['rata_lambat']."')");
        $query = $this->db->query("insert into nilai(ID_JENIS_PENILAIAN,ID_LOG_HARIAN,NILAI) values('69','$id_log_harian','".$ms2['rata_tidak_terkirim']."')");
        $query = $this->db->query("insert into nilai(ID_JENIS_PENILAIAN,ID_LOG_HARIAN,NILAI) values('70','$id_log_harian','".$ms2['rata_total_lo']."')");
        $query = $this->db->query("insert into nilai(ID_JENIS_PENILAIAN,ID_LOG_HARIAN,NILAI) values('71','$id_log_harian','".$ms2['hasil_akhir']."')");
    }

    public function cekInterpolasi($depot, $tahun, $bulan) {
        $query = $this->db->query("select SUM(STATUS_INTERPOLASI) as STATUS_INTERPOLASI from log_harian where ID_DEPOT = '$depot' and  YEAR(TANGGAL_LOG_HARIAN) = '$tahun' and MONTH(TANGGAL_LOG_HARIAN) = '$bulan'");
        $row = $query->row();
        return $hasil = $row->STATUS_INTERPOLASI;
    }

    public function getInterpolasi($depot, $tahun, $bulan) {
        $query = $this->db->query("select n.ID_NILAI,j.JENIS_PENILAIAN,l.TANGGAL_LOG_HARIAN,n.NILAI from log_harian l, nilai n, jenis_penilaian j where l.ID_LOG_HARIAN = n.ID_LOG_HARIAN and n.ID_JENIS_PENILAIAN = j.ID_JENIS_PENILAIAN and j.KELOMPOK_PENILAIAN = 'INTERPOLASI' and l.ID_DEPOT = '$depot' and MONTH(l.TANGGAL_LOG_HARIAN) = '$bulan' and YEAR(l.TANGGAL_LOG_HARIAN) = '$tahun' order by j.JENIS_PENILAIAN ASC");
        return $query->result();
    }

    public function editInterpolasi($id, $nilai) {
        $query = $this->db->query("update nilai set NILAI = '$nilai' where ID_NILAI = '$id'");
    }

    public function tambahInterpolasi($depot, $bulan, $tahun, $id_log_frm1, $frm1, $id_log_frm2, $frm2, $id_log_interpolasi1, $interpolasi1, $id_log_interpolasi2, $interpolasi2) {
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

    public function cekRencana($depot, $tahun, $bulan) {
        $query = $this->db->query("select SUM(STATUS_RENCANA) as STATUS_RENCANA from log_harian where ID_DEPOT = '$depot' and  YEAR(TANGGAL_LOG_HARIAN) = '$tahun' and MONTH(TANGGAL_LOG_HARIAN) = '$bulan'");
        $row = $query->row();
        return $row->STATUS_RENCANA;
    }

    public function cekKinerja($depot, $tahun, $bulan) {
        $query = $this->db->query("select SUM(STATUS_INPUT_KINERJA) as STATUS_INPUT_KINERJA from log_harian where ID_DEPOT = '$depot' and  YEAR(TANGGAL_LOG_HARIAN) = '$tahun' and MONTH(TANGGAL_LOG_HARIAN) = '$bulan'");
        $row = $query->row();
        return $row->STATUS_INPUT_KINERJA;
    }

    public function getKPIOperasional($depot, $tahun, $bulan) {
        $query = $this->db->query("select l.ID_LOG_HARIAN,l.TANGGAL_LOG_HARIAN,k.ID_KPI_OPERASIONAL,k.ID_JENIS_KPI_OPERASIONAL,k.TARGET,k.BOBOT,k.REALISASI,k.DEVIASI,k.PERFORMANCE_SCORE,k.NORMAL_SCORE,k.WEIGHTED_SCORE,j.JENIS_KPI_OPERASIONAL from log_harian l, kpi_operasional k, jenis_kpi_operasional j where l.ID_LOG_HARIAN = k.ID_LOG_HARIAN and k.ID_JENIS_KPI_OPERASIONAL = j.ID_JENIS_KPI_OPERASIONAL and MONTH(l.TANGGAL_LOG_HARIAN) = '$bulan' and YEAR(l.TANGGAL_LOG_HARIAN) = '$tahun' and l.ID_DEPOT = '$depot' order by j.ID_JENIS_KPI_OPERASIONAL");
        return $query->result();
    }

    public function editKPIOperasional($id_kpi, $target, $realisasi, $deviasi, $performance_score, $normal_score, $weighted_score) {
        $query = $this->db->query("update kpi_operasional set TARGET = '$target',REALISASI = '$realisasi',DEVIASI='$deviasi',PERFORMANCE_SCORE='$performance_score',NORMAL_SCORE='$normal_score',WEIGHTED_SCORE='$weighted_score' where ID_KPI_OPERASIONAL = '$id_kpi'");
    }

    public function getTotalMS2KPI($depot, $tahun, $bulan) {
        $query = $this->db->query("select n.NILAI as NILAI from log_harian l, nilai n, jenis_penilaian j where l.ID_LOG_HARIAN = n.ID_LOG_HARIAN and n.ID_JENIS_PENILAIAN = j.ID_JENIS_PENILAIAN and MONTH(l.TANGGAL_LOG_HARIAN) = '$bulan' and YEAR(l.TANGGAL_LOG_HARIAN) = '$tahun' and l.ID_DEPOT = '$depot' and j.ID_JENIS_PENILAIAN = 71");
        $row = $query->row();
        return $row->NILAI;
    }

    public function getTotalRealisaasiKPI($depot, $tahun, $bulan) {
        $query = $this->db->query("select l.ID_LOG_HARIAN,l.TANGGAL_LOG_HARIAN,
                SUM(k.PREMIUM) as PREMIUM,r.R_PREMIUM,
                SUM(k.PERTAMAX)as PERTAMAX,r.R_PERTAMAX,
                SUM(k.SOLAR)as SOLAR,r.R_SOLAR,
                SUM(k.PERTAMAX_PLUS) as PERTAMAX_PLUS,r.R_PERTAMAXPLUS,
                SUM(k.PERTAMINA_DEX) as PERTAMIA_DEX,r.R_PERTAMINADEX,
                SUM(k.BIO_SOLAR) as BIO_SOLAR,r.R_BIOSOLAR,
                (SUM(k.PREMIUM)+SUM(k.PERTAMAX)+SUM(k.SOLAR)+SUM(k.PERTAMAX_PLUS)+SUM(k.PERTAMINA_DEX)+SUM(k.BIO_SOLAR))as TOTAL_REALISASI,
                (r.R_PREMIUM+r.R_PERTAMAX+r.R_SOLAR+r.R_PERTAMAXPLUS+r.R_PERTAMINADEX+r.R_BIOSOLAR)as TOTAL_RENCANA,
                ((SUM(k.PREMIUM)+SUM(k.PERTAMAX)+SUM(k.SOLAR)+SUM(k.PERTAMAX_PLUS)+SUM(k.PERTAMINA_DEX)+SUM(k.BIO_SOLAR))/(r.R_PREMIUM+r.R_PERTAMAX+r.R_SOLAR+r.R_PERTAMAXPLUS+r.R_PERTAMINADEX+r.R_BIOSOLAR)*100)as PENCAPAIAN 
                from log_harian l, kinerja_mt k,rencana r where l.ID_LOG_HARIAN = k.ID_LOG_HARIAN and l.ID_LOG_HARIAN=r.ID_LOG_HARIAN and  l.ID_DEPOT='$depot' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' GROUP BY l.TANGGAL_LOG_HARIAN");

        $hasil = $query->result();
        $jumlah_data = 0;
        $nilai_data = 0;
        foreach($hasil as $row){
            $nilai_data = $nilai_data + $row->PENCAPAIAN;
            $jumlah_data++;
        }
        $rata2 = round($nilai_data/$jumlah_data, 2);
        return $rata2;
    }

    public function tambahKPIOperasional($depot,$bulan,$tahun,$id_log_harian,$target1,$bobot1,$realisasi1,$deviasi1,$performace1,$normal1,$weighted1,$target2,$bobot2,$realisasi2,$deviasi2,$performace2,$normal2,$weighted2,$target3,$bobot3,$realisasi3,$deviasi3,$performace3,$normal3,$weighted3,$target4,$bobot4,$realisasi4,$deviasi4,$performace4,$normal4,$weighted4,$target5,$bobot5,$realisasi5,$deviasi5,$performace5,$normal5,$weighted5,$target6,$bobot6,$realisasi6,$deviasi6,$performace6,$normal6,$weighted6,$target7,$bobot7,$realisasi7,$deviasi7,$performace7,$normal7,$weighted7,$target8,$bobot8,$realisasi8,$deviasi8,$performace8,$normal8,$weighted8,$target9,$bobot9,$realisasi9,$deviasi9,$performace9,$normal9,$weighted9,$target10,$bobot10,$realisasi10,$deviasi10,$performace10,$normal10,$weighted10,$total) {
        $query = $this->db->query("insert into kpi_operasional(ID_LOG_HARIAN,ID_JENIS_KPI_OPERASIONAL,TARGET,BOBOT,REALISASI,DEVIASI,PERFORMANCE_SCORE,NORMAL_SCORE,WEIGHTED_SCORE) values('$id_log_harian','1','$target1','$bobot1','$realisasi1','$deviasi1','$performace1','$normal1','$weighted1')");
        $query = $this->db->query("insert into kpi_operasional(ID_LOG_HARIAN,ID_JENIS_KPI_OPERASIONAL,TARGET,BOBOT,REALISASI,DEVIASI,PERFORMANCE_SCORE,NORMAL_SCORE,WEIGHTED_SCORE) values('$id_log_harian','2','$target2','$bobot2','$realisasi2','$deviasi2','$performace2','$normal2','$weighted2')");
        $query = $this->db->query("insert into kpi_operasional(ID_LOG_HARIAN,ID_JENIS_KPI_OPERASIONAL,TARGET,BOBOT,REALISASI,DEVIASI,PERFORMANCE_SCORE,NORMAL_SCORE,WEIGHTED_SCORE) values('$id_log_harian','3','$target3','$bobot3','$realisasi3','$deviasi3','$performace3','$normal3','$weighted3')");
        $query = $this->db->query("insert into kpi_operasional(ID_LOG_HARIAN,ID_JENIS_KPI_OPERASIONAL,TARGET,BOBOT,REALISASI,DEVIASI,PERFORMANCE_SCORE,NORMAL_SCORE,WEIGHTED_SCORE) values('$id_log_harian','4','$target4','$bobot4','$realisasi4','$deviasi4','$performace4','$normal4','$weighted4')");
        $query = $this->db->query("insert into kpi_operasional(ID_LOG_HARIAN,ID_JENIS_KPI_OPERASIONAL,TARGET,BOBOT,REALISASI,DEVIASI,PERFORMANCE_SCORE,NORMAL_SCORE,WEIGHTED_SCORE) values('$id_log_harian','5','$target5','$bobot5','$realisasi5','$deviasi5','$performace5','$normal5','$weighted5')");
        $query = $this->db->query("insert into kpi_operasional(ID_LOG_HARIAN,ID_JENIS_KPI_OPERASIONAL,TARGET,BOBOT,REALISASI,DEVIASI,PERFORMANCE_SCORE,NORMAL_SCORE,WEIGHTED_SCORE) values('$id_log_harian','6','$target6','$bobot6','$realisasi6','$deviasi6','$performace6','$normal6','$weighted6')");
        $query = $this->db->query("insert into kpi_operasional(ID_LOG_HARIAN,ID_JENIS_KPI_OPERASIONAL,TARGET,BOBOT,REALISASI,DEVIASI,PERFORMANCE_SCORE,NORMAL_SCORE,WEIGHTED_SCORE) values('$id_log_harian','7','$target7','$bobot7','$realisasi7','$deviasi7','$performace7','$normal7','$weighted7')");
        $query = $this->db->query("insert into kpi_operasional(ID_LOG_HARIAN,ID_JENIS_KPI_OPERASIONAL,TARGET,BOBOT,REALISASI,DEVIASI,PERFORMANCE_SCORE,NORMAL_SCORE,WEIGHTED_SCORE) values('$id_log_harian','8','$target8','$bobot8','$realisasi8','$deviasi8','$performace8','$normal8','$weighted8')");
        $query = $this->db->query("insert into kpi_operasional(ID_LOG_HARIAN,ID_JENIS_KPI_OPERASIONAL,TARGET,BOBOT,REALISASI,DEVIASI,PERFORMANCE_SCORE,NORMAL_SCORE,WEIGHTED_SCORE) values('$id_log_harian','9','$target9','$bobot9','$realisasi9','$deviasi9','$performace9','$normal9','$weighted9')");
        $query = $this->db->query("insert into kpi_operasional(ID_LOG_HARIAN,ID_JENIS_KPI_OPERASIONAL,TARGET,BOBOT,REALISASI,DEVIASI,PERFORMANCE_SCORE,NORMAL_SCORE,WEIGHTED_SCORE) values('$id_log_harian','10','$target10','$bobot10','$realisasi10','$deviasi10','$performace10','$normal10','$weighted10')");
        
        $query = $this->db->query("insert into nilai(ID_LOG_HARIAN,ID_JENIS_PENILAIAN,NILAI) values('$id_log_harian','72','$total')");
                
        $query = $this->db->query("update log_harian l set l.STATUS_KPI_OPERASIONAL_INTERNAL = 1 where l.ID_DEPOT = '$depot' and MONTH(l.TANGGAL_LOG_HARIAN) = '$bulan' and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun'");
    }
    
    public function cetKPIInternal($tahun,$depot){
        $query = $this->db->query("select SUM(STATUS_KPI_INTERNAL) as STATUS_KPI_INTERNAL from log_harian where ID_DEPOT = '$depot' and  YEAR(TANGGAL_LOG_HARIAN) = '$tahun'");
        $row = $query->row();
        return $row->STATUS_KPI_INTERNAL;
    }
    
    public function getKPIInternal($tahun,$depot){
        $query = $this->db->query("select l.ID_LOG_HARIAN, k.ID_KPI_INTERNAL,j.ID_JENIS_KPI_INTERNAL,j.JENIS_KPI_INTERNAL, k.BOBOT,k.TAHUN_BASE,k.TAHUN_STRETCH,k.TW1_BASE,k.TW1_STRETCH,k.TW2_BASE,k.TW2_STRETCH,k.TW3_BASE,k.TW3_STRETCH,k.TW4_BASE,k.TW4_STRETCH from log_harian l, kpi_internal k, jenis_kpi_internal j where l.ID_LOG_HARIAN = k.ID_LOG_HARIAN and k.ID_JENIS_KPI_INTERNAL = j.ID_JENIS_KPI_INTERNAL and l.ID_DEPOT = '$depot' and YEAR(l.TANGGAL_LOG_HARIAN) = '$tahun' and j.KELOMPOK = 'DEPOT' ORDER BY j.ID_JENIS_KPI_INTERNAL ASC");
        return $query->result();
    }
    
    public function editKPIInternal($id,$bobot,$th_b,$th_s,$tw1_b,$tw1_s,$tw2_b,$tw2_s,$tw3_b,$tw3_s,$tw4_b,$tw4_s){
        $query = $this->db->query("update kpi_internal set BOBOT='$bobot',TAHUN_BASE='$th_b',TAHUN_STRETCH='$th_s',TW1_BASE='$tw1_b',TW1_STRETCH='$tw1_s',TW2_BASE='$tw2_b',TW2_STRETCH='$tw2_s',TW3_BASE='$tw3_b',TW3_STRETCH='$tw3_s',TW4_BASE='$tw4_b',TW4_STRETCH='$tw4_s' where ID_KPI_INTERNAL='$id'");        
    }
    
    public function tambahKPIInternal(){
        
    }
    
    
    
    /*
    public function dummy_kinerja_amt($id_kinerja, $id_log_harian, $id_pegawai, $status_tugas, $total_km, $total_kl, $ritase, $pendapatan, $spbu) {
        $query = $this->db->query("insert into kinerja_amt(ID_KINERJA_AMT,ID_LOG_HARIAN,ID_PEGAWAI,STATUS_TUGAS,TOTAL_KM,TOTAL_KL,RITASE_AMT,PENDAPATAN,SPBU) values('$id_kinerja','$id_log_harian','$id_pegawai','$status_tugas','$total_km','$total_kl','$ritase','$pendapatan','$spbu')");
    }

    public function dummy_kinerja_mt($id_kinerja, $id_log_harian, $id_mobil, $ritase, $total_km, $total_kl, $ownuse, $premium, $pertamax, $pertamax_plus, $pertamina_dex, $solar, $biosolar) {
        $query = $this->db->query("insert into kinerja_mt(ID_KINERJA_MT,ID_LOG_HARIAN,ID_MOBIL,RITASE_MT,TOTAL_KM_MT,TOTAL_KL_MT,OWN_USE,PREMIUM,PERTAMAX,PERTAMAX_PLUS,PERTAMINA_DEX,SOLAR,BIO_SOLAR) values('$id_kinerja','$id_log_harian','$id_mobil','$ritase','$total_km','$total_kl','$ownuse','$premium','$pertamax','$pertamax_plus','$pertamina_dex','$solar','$biosolar')");
    }*/

}
