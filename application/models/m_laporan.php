<?php

class m_laporan extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function InsertLogSistem($id_pegawai, $keterangan, $keyword) {
        $query = $this->db->query("insert into log_sistem(ID_PEGAWAI,KETERANGAN,KEYWORD) values('$id_pegawai','$keterangan','$keyword')");
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

    public function SyncKPIOperasional($depot, $tahun, $bulan) {
        //Total MS2
        $query = $this->db->query("select l.TANGGAL_LOG_HARIAN,n.ID_NILAI,n.NILAI from log_harian l, nilai n where l.ID_LOG_HARIAN = n.ID_LOG_HARIAN and l.ID_DEPOT = '$depot' and MONTH(l.TANGGAL_LOG_HARIAN) = '$bulan' and YEAR(l.TANGGAL_LOG_HARIAN) = '$tahun' and n.ID_JENIS_PENILAIAN = 71");
        $ms2_total = 0;
        if ($query->num_rows() > 0) {
            $data = $query->result();
            $ms2_total = $data[0]->NILAI;
        } else {
            $ms2_total = 0;
        }

        //Total Realisasi
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
        foreach ($hasil as $row) {
            $nilai_data = $nilai_data + $row->PENCAPAIAN;
            $jumlah_data++;
        }
        $realisasi_rata2 = 0;
        if ($jumlah_data > 0) {
            $realisasi_rata2 = round($nilai_data / $jumlah_data, 2);
        }

        // Nilai Total KPI       
        $query = $this->db->query("select l.TANGGAL_LOG_HARIAN,n.ID_NILAI,n.NILAI from log_harian l, nilai n where l.ID_LOG_HARIAN = n.ID_LOG_HARIAN and l.ID_DEPOT = '$depot' and MONTH(l.TANGGAL_LOG_HARIAN) = '$bulan' and YEAR(l.TANGGAL_LOG_HARIAN) = '$tahun' and n.ID_JENIS_PENILAIAN = 72");
        $data = $query->result();
        $kpi_total_id = 0;
        $kpi_total_nilai = 0;
        if ($query->num_rows() > 0) {
            $kpi_total_id = $data[0]->ID_NILAI;
            $kpi_total_nilai = $data[0]->NILAI;
        }
        //KPI
        $query = $this->db->query("select l.TANGGAL_LOG_HARIAN,k.ID_KPI_OPERASIONAL, k.ID_JENIS_KPI_OPERASIONAL ,k.BOBOT ,k.TARGET,k.REALISASI,k.WEIGHTED_SCORE from log_harian l, kpi_operasional k where l.ID_LOG_HARIAN = k.ID_LOG_HARIAN and l.ID_DEPOT = '$depot' and MONTH(l.TANGGAL_LOG_HARIAN) = '$bulan' and YEAR(l.TANGGAL_LOG_HARIAN) = '$tahun' order by k.ID_JENIS_KPI_OPERASIONAL ASC");
        $data = $query->result();
        if ($query->num_rows() == 10) {
            //KPI 1
            $kpi_id = $data[0]->ID_KPI_OPERASIONAL;
            $kpi_target = $data[0]->TARGET;
            $kpi_bobot = $data[0]->BOBOT;
            $kpi_realisasi = $data[0]->REALISASI;

            $id_kpi1 = $kpi_id;
            $kpitarget1 = $kpi_target;
            $bobot1 = $kpi_bobot / 100;
            $kpirealisasi1 = $ms2_total; // ganti realisasi kpi dengan total ms2 baru
            $deviasi1 = round($kpirealisasi1 - $kpitarget1, 2);
            $performance_score1 = round($kpirealisasi1 / $kpitarget1 * 100, 2);
            $normal_score1 = 0;
            if ($performance_score1 < 0) {
                $normal_score1 = 0.00;
            } else if ($performance_score1 > 120) {
                $normal_score1 = 120.00;
            } else {
                $normal_score1 = $performance_score1;
            } $weighted_score1 = round($normal_score1 * $bobot1, 2);
            $this->editKPIOperasional($id_kpi1, $kpitarget1, $kpirealisasi1, $deviasi1, $performance_score1, $normal_score1, $weighted_score1);

            //KPI 2
            $kpi_id = $data[1]->ID_KPI_OPERASIONAL;
            $kpi_target = $data[1]->TARGET;
            $kpi_bobot = $data[1]->BOBOT;
            $kpi_realisasi = $data[1]->REALISASI;

            $id_kpi2 = $kpi_id;
            $kpitarget2 = $kpi_target;
            $bobot2 = $kpi_bobot / 100;
            $kpirealisasi2 = $realisasi_rata2;
            $deviasi2 = round($kpirealisasi2 - $kpitarget2, 2);
            $performance_score2 = round($kpirealisasi2 / $kpitarget2 * 100, 2);
            $normal_score2 = 0;
            if ($performance_score2 < 0) {
                $normal_score2 = 0.00;
            } else if ($performance_score2 > 120) {
                $normal_score2 = 120.00;
            } else {
                $normal_score2 = $performance_score2;
            } $weighted_score2 = round($normal_score2 * $bobot2, 2);
            $this->editKPIOperasional($id_kpi2, $kpitarget2, $kpirealisasi2, $deviasi2, $performance_score2, $normal_score2, $weighted_score2);

            //KPI 3
            $weighted_score3 = $data[2]->WEIGHTED_SCORE;
            //KPI 4
            $weighted_score4 = $data[3]->WEIGHTED_SCORE;
            //KPI 5
            $weighted_score5 = $data[4]->WEIGHTED_SCORE;
            //KPI 6
            $weighted_score6 = $data[5]->WEIGHTED_SCORE;
            //KPI 7
            $weighted_score7 = $data[6]->WEIGHTED_SCORE;
            //KPI 8
            $weighted_score8 = $data[7]->WEIGHTED_SCORE;
            //KPI 9
            $weighted_score9 = $data[8]->WEIGHTED_SCORE;
            //KPI 10
            $weighted_score10 = $data[9]->WEIGHTED_SCORE;
            //KPI TOTAL
            $total_kpi = $weighted_score1 + $weighted_score2 + $weighted_score3 + $weighted_score4 + $weighted_score5 + $weighted_score6 + $weighted_score7 + $weighted_score8 + $weighted_score9 + $weighted_score10;
            $query = $this->db->query("update nilai set NILAI = '$total_kpi' where ID_NILAI = '$kpi_total_id'");
        }
    }

    public function deleteMS2($ms2, $total_ms2) {
        foreach ($total_ms2 as $row) {
            $query = $this->db->query("delete from nilai where ID_NILAI='$row->ID_NILAI'");
        }
        foreach ($ms2 as $row) {
            $query = $this->db->query("delete from ms2 where ID_MS2='$row->ID_MS2'");
            $query = $this->db->query("update log_harian set STATUS_MS2 = 0 where ID_LOG_HARIAN='$row->ID_LOG_HARIAN'");
        }
    }

    public function editMS2($id, $sesuai_premium, $sesuai_solar, $sesuai_pertamax, $cepat_premium, $cepat_solar, $cepat_pertamax, $cepat_shift1_premium, $cepat_shift1_solar, $cepat_shift1_pertamax, $lambat_premium, $lambat_solar, $lambat_pertamax, $tidak_terkirim_premium, $tidak_terkirim_solar, $tidak_terkirim_pertamax, $depot, $tahun, $bulan) {
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
        $query = $this->db->query("insert into nilai(ID_JENIS_PENILAIAN,ID_LOG_HARIAN,NILAI) values('65','$id_log_harian','" . $ms2['rata_sesuai'] . "')");
        $query = $this->db->query("insert into nilai(ID_JENIS_PENILAIAN,ID_LOG_HARIAN,NILAI) values('66','$id_log_harian','" . $ms2['rata_cepat'] . "')");
        $query = $this->db->query("insert into nilai(ID_JENIS_PENILAIAN,ID_LOG_HARIAN,NILAI) values('67','$id_log_harian','" . $ms2['rata_cepat_shift1'] . "')");
        $query = $this->db->query("insert into nilai(ID_JENIS_PENILAIAN,ID_LOG_HARIAN,NILAI) values('68','$id_log_harian','" . $ms2['rata_lambat'] . "')");
        $query = $this->db->query("insert into nilai(ID_JENIS_PENILAIAN,ID_LOG_HARIAN,NILAI) values('69','$id_log_harian','" . $ms2['rata_tidak_terkirim'] . "')");
        $query = $this->db->query("insert into nilai(ID_JENIS_PENILAIAN,ID_LOG_HARIAN,NILAI) values('70','$id_log_harian','" . $ms2['rata_total_lo'] . "')");
        $query = $this->db->query("insert into nilai(ID_JENIS_PENILAIAN,ID_LOG_HARIAN,NILAI) values('71','$id_log_harian','" . $ms2['hasil_akhir'] . "')");
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
        foreach ($hasil as $row) {
            $nilai_data = $nilai_data + $row->PENCAPAIAN;
            $jumlah_data++;
        }
        $rata2 = round($nilai_data / $jumlah_data, 2);
        return $rata2;
    }

    public function getTotalKL($depot, $tahun, $bulan) {
        $query = $this->db->query("select l.ID_LOG_HARIAN,l.TANGGAL_LOG_HARIAN, SUM(k.TOTAL_KL_MT) as KL from log_harian l, kinerja_mt k where l.ID_LOG_HARIAN = k.ID_LOG_HARIAN and  l.ID_DEPOT='$depot' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' GROUP BY l.TANGGAL_LOG_HARIAN");

        $hasil = $query->result();
        $kl = 0;

        foreach ($hasil as $row) {
            $kl = $kl + ($row->KL * 1000);
        }
        return $kl;
    }

    public function tambahKPIOperasional($depot, $bulan, $tahun, $id_log_harian, $target1, $bobot1, $realisasi1, $deviasi1, $performace1, $normal1, $weighted1, $target2, $bobot2, $realisasi2, $deviasi2, $performace2, $normal2, $weighted2, $target3, $bobot3, $realisasi3, $deviasi3, $performace3, $normal3, $weighted3, $target4, $bobot4, $realisasi4, $deviasi4, $performace4, $normal4, $weighted4, $target5, $bobot5, $realisasi5, $deviasi5, $performace5, $normal5, $weighted5, $target6, $bobot6, $realisasi6, $deviasi6, $performace6, $normal6, $weighted6, $target7, $bobot7, $realisasi7, $deviasi7, $performace7, $normal7, $weighted7, $target8, $bobot8, $realisasi8, $deviasi8, $performace8, $normal8, $weighted8, $target9, $bobot9, $realisasi9, $deviasi9, $performace9, $normal9, $weighted9, $target10, $bobot10, $realisasi10, $deviasi10, $performace10, $normal10, $weighted10, $total) {
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

    public function cetKPIInternal($tahun, $depot, $bulan_awal, $bulan_akhir) {
        $query = $this->db->query("select SUM(STATUS_KPI_INTERNAL) as STATUS_KPI_INTERNAL from log_harian where ID_DEPOT = '$depot' and  YEAR(TANGGAL_LOG_HARIAN) = '$tahun' and MONTH(TANGGAL_LOG_HARIAN) >= '$bulan_awal' and MONTH(TANGGAL_LOG_HARIAN) <= '$bulan_akhir'");
        $row = $query->row();
        return $row->STATUS_KPI_INTERNAL;
    }

    public function getKPIInternal($tahun, $depot) {
        $query = $this->db->query("select l.ID_LOG_HARIAN, k.ID_KPI_INTERNAL,j.ID_JENIS_KPI_INTERNAL,j.JENIS_KPI_INTERNAL, k.BOBOT,k.TAHUN_BASE,k.TAHUN_STRETCH,k.TW1_BASE,k.TW1_STRETCH,k.TW2_BASE,k.TW2_STRETCH,k.TW3_BASE,k.TW3_STRETCH,k.TW4_BASE,k.TW4_STRETCH,k.REALISASI_TW1_BULAN1,k.REALISASI_TW1_BULAN2,k.REALISASI_TW1_BULAN3,k.REALISASI_TW2_BULAN1,k.REALISASI_TW2_BULAN2,k.REALISASI_TW2_BULAN3,k.REALISASI_TW3_BULAN1,k.REALISASI_TW3_BULAN2,k.REALISASI_TW3_BULAN3,k.REALISASI_TW4_BULAN1,k.REALISASI_TW4_BULAN2,k.REALISASI_TW4_BULAN3 from log_harian l, kpi_internal k, jenis_kpi_internal j where l.ID_LOG_HARIAN = k.ID_LOG_HARIAN and k.ID_JENIS_KPI_INTERNAL = j.ID_JENIS_KPI_INTERNAL and l.ID_DEPOT = '$depot' and YEAR(l.TANGGAL_LOG_HARIAN) = '$tahun' and j.KELOMPOK = 'DEPOT' ORDER BY j.ID_JENIS_KPI_INTERNAL ASC");
        return $query->result();
    }

    public function editKPIInternal($id, $jenis, $edit_bobot, $edit_base, $edit_stretch, $edit_bulan1, $edit_bulan2, $edit_bulan3) {
        if ($jenis == 'Triwulan I') {
            $query = $this->db->query("update kpi_internal set BOBOT='$edit_bobot',TW1_BASE='$edit_base',TW1_STRETCH='$edit_stretch',REALISASI_TW1_BULAN1='$edit_bulan1',REALISASI_TW1_BULAN2='$edit_bulan2',REALISASI_TW1_BULAN3='$edit_bulan3' where ID_KPI_INTERNAL='$id'");
        } else if ($jenis == 'Triwulan II') {
            $query = $this->db->query("update kpi_internal set BOBOT='$edit_bobot',TW2_BASE='$edit_base',TW2_STRETCH='$edit_stretch',REALISASI_TW2_BULAN1='$edit_bulan1',REALISASI_TW2_BULAN2='$edit_bulan2',REALISASI_TW2_BULAN3='$edit_bulan3' where ID_KPI_INTERNAL='$id'");
        } else if ($jenis == 'Triwulan III') {
            $query = $this->db->query("update kpi_internal set BOBOT='$edit_bobot',TW3_BASE='$edit_base',TW3_STRETCH='$edit_stretch',REALISASI_TW3_BULAN1='$edit_bulan1',REALISASI_TW3_BULAN2='$edit_bulan2',REALISASI_TW3_BULAN3='$edit_bulan3' where ID_KPI_INTERNAL='$id'");
        } else if ($jenis == 'Triwulan IV') {
            $query = $this->db->query("update kpi_internal set BOBOT='$edit_bobot',TW4_BASE='$edit_base',TW4_STRETCH='$edit_stretch',REALISASI_TW4_BULAN1='$edit_bulan1',REALISASI_TW4_BULAN2='$edit_bulan2',REALISASI_TW4_BULAN3='$edit_bulan3' where ID_KPI_INTERNAL='$id'");
        } else if ($jenis == 'Tahun') {
            $query = $this->db->query("update kpi_internal set BOBOT='$edit_bobot',TAHUN_BASE='$edit_base',TAHUN_STRETCH='$edit_stretch' where ID_KPI_INTERNAL='$id'");
        }
    }

    public function tambahKPIInternalTriwulan($id_log, $id_jenis, $bobot, $base, $stretch, $bulan1, $bulan2, $bulan3, $jenis) {
        $query = $this->db->query("select count(*) as JUMLAH from kpi_internal where ID_LOG_HARIAN = '$id_log' and ID_JENIS_KPI_INTERNAL = '$id_jenis'");
        $data = $query->row();
        $cek = $data->JUMLAH;

        if ($jenis == "Triwulan I") {
            if ($cek == 0) {
                $query = $this->db->query("insert into kpi_internal(ID_LOG_HARIAN,ID_JENIS_KPI_INTERNAL,BOBOT,TW1_BASE,TW1_STRETCH,REALISASI_TW1_BULAN1,REALISASI_TW1_BULAN2,REALISASI_TW1_BULAN3) values ('$id_log','$id_jenis','$bobot','$base','$stretch','$bulan1','$bulan2','$bulan3')");
            } else {
                $query = $this->db->query("update kpi_internal set BOBOT = '$bobot', TW1_BASE = '$base', TW1_STRETCH = '$stretch', REALISASI_TW1_BULAN1 = '$bulan1', REALISASI_TW1_BULAN2 = '$bulan2', REALISASI_TW1_BULAN3 = '$bulan3' where ID_LOG_HARIAN = '$id_log' and ID_JENIS_KPI_INTERNAL = '$id_jenis'");
            }
        } else if ($jenis == "Triwulan II") {
            if ($cek == 0) {
                $query = $this->db->query("insert into kpi_internal(ID_LOG_HARIAN,ID_JENIS_KPI_INTERNAL,BOBOT,TW2_BASE,TW2_STRETCH,REALISASI_TW2_BULAN1,REALISASI_TW2_BULAN2,REALISASI_TW2_BULAN3) values ('$id_log','$id_jenis','$bobot','$base','$stretch','$bulan1','$bulan2','$bulan3')");
            } else {
                $query = $this->db->query("update kpi_internal set BOBOT = '$bobot', TW2_BASE = '$base', TW2_STRETCH = '$stretch', REALISASI_TW2_BULAN1 = '$bulan1', REALISASI_TW2_BULAN2 = '$bulan2', REALISASI_TW2_BULAN3 = '$bulan3' where ID_LOG_HARIAN = '$id_log' and ID_JENIS_KPI_INTERNAL = '$id_jenis'");
            }
        } else if ($jenis == "Triwulan III") {
            if ($cek == 0) {
                $query = $this->db->query("insert into kpi_internal(ID_LOG_HARIAN,ID_JENIS_KPI_INTERNAL,BOBOT,TW3_BASE,TW3_STRETCH,REALISASI_TW3_BULAN1,REALISASI_TW3_BULAN2,REALISASI_TW3_BULAN3) values ('$id_log','$id_jenis','$bobot','$base','$stretch','$bulan1','$bulan2','$bulan3')");
            } else {
                $query = $this->db->query("update kpi_internal set BOBOT = '$bobot', TW3_BASE = '$base', TW3_STRETCH = '$stretch', REALISASI_TW3_BULAN1 = '$bulan1', REALISASI_TW3_BULAN2 = '$bulan2', REALISASI_TW3_BULAN3 = '$bulan3' where ID_LOG_HARIAN = '$id_log' and ID_JENIS_KPI_INTERNAL = '$id_jenis'");
            }
        } else if ($jenis == "Triwulan IV") {
            if ($cek == 0) {
                $query = $this->db->query("insert into kpi_internal(ID_LOG_HARIAN,ID_JENIS_KPI_INTERNAL,BOBOT,TW4_BASE,TW4_STRETCH,REALISASI_TW4_BULAN1,REALISASI_TW4_BULAN2,REALISASI_TW4_BULAN3) values ('$id_log','$id_jenis','$bobot','$base','$stretch','$bulan1','$bulan2','$bulan3')");
            } else {
                $query = $this->db->query("update kpi_internal set BOBOT = '$bobot', TW4_BASE = '$base', TW4_STRETCH = '$stretch', REALISASI_TW4_BULAN1 = '$bulan1', REALISASI_TW4_BULAN2 = '$bulan2', REALISASI_TW4_BULAN3 = '$bulan3' where ID_LOG_HARIAN = '$id_log' and ID_JENIS_KPI_INTERNAL = '$id_jenis'");
            }
        }
    }

    public function tambahKPIInternalTahun($id_log, $id_jenis, $bobot, $base, $stretch) {
        $query = $this->db->query("select count(*) as JUMLAH from kpi_internal where ID_LOG_HARIAN = '$id_log' and ID_JENIS_KPI_INTERNAL = '$id_jenis'");
        $data = $query->row();
        $cek = $data->JUMLAH;

        if ($cek == 0) {
            $query = $this->db->query("insert into kpi_internal(ID_LOG_HARIAN,ID_JENIS_KPI_INTERNAL,BOBOT,TAHUN_BASE,TAHUN_STRETCH) values ('$id_log','$id_jenis','$bobot','$base','$stretch')");
        } else {
            $query = $this->db->query("update kpi_internal set BOBOT = '$bobot', TAHUN_BASE = '$base', TAHUN_STRETCH = '$stretch' where ID_LOG_HARIAN = '$id_log' and ID_JENIS_KPI_INTERNAL = '$id_jenis'");
        }
    }

    public function setStatusKPIInternal($depot, $tahun, $bulan_awal, $bulan_akhir) {
        $query = $this->db->query("update log_harian set STATUS_KPI_INTERNAL = 1 where ID_DEPOT = '$depot' and YEAR(TANGGAL_LOG_HARIAN) = '$tahun' and MONTH(TANGGAL_LOG_HARIAN) >= '$bulan_awal' and MONTH(TANGGAL_LOG_HARIAN) <= '$bulan_akhir'");
    }

    public function SyncKPIInternal($depot, $tahun, $jenis) {
        $bulan_awal = 1;
        $bulan_tengah = 1;
        $bulan_akhir = 1;
        if ($jenis == "Triwulan I") {
            $bulan_awal = 1;
            $bulan_tengah = 2;
            $bulan_akhir = 3;
        } else if ($jenis == "Triwulan II") {
            $bulan_awal = 4;
            $bulan_tengah = 5;
            $bulan_akhir = 6;
        } else if ($jenis == "Triwulan III") {
            $bulan_awal = 7;
            $bulan_tengah = 8;
            $bulan_akhir = 9;
        } else if ($jenis == "Triwulan IV") {
            $bulan_awal = 10;
            $bulan_tengah = 11;
            $bulan_akhir = 12;
        }

        $query = $this->db->query("select l.ID_LOG_HARIAN, k.ID_KPI_INTERNAL,j.ID_JENIS_KPI_INTERNAL,j.JENIS_KPI_INTERNAL, k.BOBOT,k.TAHUN_BASE,k.TAHUN_STRETCH,k.TW1_BASE,k.TW1_STRETCH,k.TW2_BASE,k.TW2_STRETCH,k.TW3_BASE,k.TW3_STRETCH,k.TW4_BASE,k.TW4_STRETCH,k.REALISASI_TW1_BULAN1,k.REALISASI_TW1_BULAN2,k.REALISASI_TW1_BULAN3,k.REALISASI_TW2_BULAN1,k.REALISASI_TW2_BULAN2,k.REALISASI_TW2_BULAN3,k.REALISASI_TW3_BULAN1,k.REALISASI_TW3_BULAN2,k.REALISASI_TW3_BULAN3,k.REALISASI_TW4_BULAN1,k.REALISASI_TW4_BULAN2,k.REALISASI_TW4_BULAN3 from log_harian l, kpi_internal k, jenis_kpi_internal j where l.ID_LOG_HARIAN = k.ID_LOG_HARIAN and k.ID_JENIS_KPI_INTERNAL = j.ID_JENIS_KPI_INTERNAL and l.ID_DEPOT = '$depot' and YEAR(l.TANGGAL_LOG_HARIAN) = '$tahun' and j.KELOMPOK = 'DEPOT' ORDER BY j.ID_JENIS_KPI_INTERNAL ASC");
        if ($query->num_rows() == 43) {
            $data_kpi = $query->result();

            //KL APMS index ke 12 dengan id jenis kpi 47 
            $query = $this->db->query("select IFNULL(SUM(k.PREMIUM + k.SOLAR),0) as KL_APMS from log_harian l, kinerja_apms k where l.ID_LOG_HARIAN = k.ID_LOG_HARIAN and l.ID_DEPOT = '$depot' and YEAR(l.TANGGAL_LOG_HARIAN) = '$tahun' and MONTH(l.TANGGAL_LOG_HARIAN) = '$bulan_awal'");
            $data = $query->row();
            $kl_apms_bln1 = $data->KL_APMS;
            $query = $this->db->query("select IFNULL(SUM(k.PREMIUM + k.SOLAR),0) as KL_APMS from log_harian l, kinerja_apms k where l.ID_LOG_HARIAN = k.ID_LOG_HARIAN and l.ID_DEPOT = '$depot' and YEAR(l.TANGGAL_LOG_HARIAN) = '$tahun' and MONTH(l.TANGGAL_LOG_HARIAN) = '$bulan_tengah'");
            $data = $query->row();
            $kl_apms_bln2 = $data->KL_APMS;
            $query = $this->db->query("select IFNULL(SUM(k.PREMIUM + k.SOLAR),0) as KL_APMS from log_harian l, kinerja_apms k where l.ID_LOG_HARIAN = k.ID_LOG_HARIAN and l.ID_DEPOT = '$depot' and YEAR(l.TANGGAL_LOG_HARIAN) = '$tahun' and MONTH(l.TANGGAL_LOG_HARIAN) = '$bulan_akhir'");
            $data = $query->row();
            $kl_apms_bln3 = $data->KL_APMS;
            
            $id_kpi_internal = $data_kpi[12]->ID_KPI_INTERNAL;
            
            if ($jenis == "Triwulan I") {
                $query = $this->db->query("update kpi_internal set REALISASI_TW1_BULAN1 = '$kl_apms_bln1',REALISASI_TW1_BULAN2 = '$kl_apms_bln2',REALISASI_TW1_BULAN3 = '$kl_apms_bln3' where ID_KPI_INTERNAL = '$id_kpi_internal'");
            } else if ($jenis == "Triwulan II") {
                $query = $this->db->query("update kpi_internal set REALISASI_TW2_BULAN1 = '$kl_apms_bln1',REALISASI_TW2_BULAN2 = '$kl_apms_bln2',REALISASI_TW2_BULAN3 = '$kl_apms_bln3' where ID_KPI_INTERNAL = '$id_kpi_internal'");
            } else if ($jenis == "Triwulan III") {
                $query = $this->db->query("update kpi_internal set REALISASI_TW3_BULAN1 = '$kl_apms_bln1',REALISASI_TW3_BULAN2 = '$kl_apms_bln2',REALISASI_TW3_BULAN3 = '$kl_apms_bln3' where ID_KPI_INTERNAL = '$id_kpi_internal'");
            } else if ($jenis == "Triwulan IV") {
                $query = $this->db->query("update kpi_internal set REALISASI_TW4_BULAN1 = '$kl_apms_bln1',REALISASI_TW4_BULAN2 = '$kl_apms_bln2',REALISASI_TW4_BULAN3 = '$kl_apms_bln3' where ID_KPI_INTERNAL = '$id_kpi_internal'");
            }
            
            //KL MT index ke 13 dengan id jenis kpi 48 
            $query = $this->db->query("select IFNULL(SUM(k.TOTAL_KL_MT),0) as KL_MT from log_harian l, kinerja_mt k where l.ID_LOG_HARIAN = k.ID_LOG_HARIAN and l.ID_DEPOT = '$depot' and YEAR(l.TANGGAL_LOG_HARIAN) = '$tahun' and MONTH(l.TANGGAL_LOG_HARIAN) = '$bulan_awal'");
            $data = $query->row();
            $kl_mt_bln1 = $data->KL_MT;
            $query = $this->db->query("select IFNULL(SUM(k.TOTAL_KL_MT),0) as KL_MT from log_harian l, kinerja_mt k where l.ID_LOG_HARIAN = k.ID_LOG_HARIAN and l.ID_DEPOT = '$depot' and YEAR(l.TANGGAL_LOG_HARIAN) = '$tahun' and MONTH(l.TANGGAL_LOG_HARIAN) = '$bulan_tengah'");
            $data = $query->row();
            $kl_mt_bln2 = $data->KL_MT;
            $query = $this->db->query("select IFNULL(SUM(k.TOTAL_KL_MT),0) as KL_MT from log_harian l, kinerja_mt k where l.ID_LOG_HARIAN = k.ID_LOG_HARIAN and l.ID_DEPOT = '$depot' and YEAR(l.TANGGAL_LOG_HARIAN) = '$tahun' and MONTH(l.TANGGAL_LOG_HARIAN) = '$bulan_akhir'");
            $data = $query->row();
            $kl_mt_bln3 = $data->KL_MT;
            
            $id_kpi_internal = $data_kpi[13]->ID_KPI_INTERNAL;
            
            if ($jenis == "Triwulan I") {
                $query = $this->db->query("update kpi_internal set REALISASI_TW1_BULAN1 = '$kl_mt_bln1',REALISASI_TW1_BULAN2 = '$kl_mt_bln2',REALISASI_TW1_BULAN3 = '$kl_mt_bln3' where ID_KPI_INTERNAL = '$id_kpi_internal'");
            } else if ($jenis == "Triwulan II") {
                $query = $this->db->query("update kpi_internal set REALISASI_TW2_BULAN1 = '$kl_mt_bln1',REALISASI_TW2_BULAN2 = '$kl_mt_bln2',REALISASI_TW2_BULAN3 = '$kl_mt_bln3' where ID_KPI_INTERNAL = '$id_kpi_internal'");
            } else if ($jenis == "Triwulan III") {
                $query = $this->db->query("update kpi_internal set REALISASI_TW3_BULAN1 = '$kl_mt_bln1',REALISASI_TW3_BULAN2 = '$kl_mt_bln2',REALISASI_TW3_BULAN3 = '$kl_mt_bln3' where ID_KPI_INTERNAL = '$id_kpi_internal'");
            } else if ($jenis == "Triwulan IV") {
                $query = $this->db->query("update kpi_internal set REALISASI_TW4_BULAN1 = '$kl_mt_bln1',REALISASI_TW4_BULAN2 = '$kl_mt_bln2',REALISASI_TW4_BULAN3 = '$kl_mt_bln3' where ID_KPI_INTERNAL = '$id_kpi_internal'");
            }
            
            //Ritase MT index ke 16 dengan id jenis kpi 51
            $query = $this->db->query("select IFNULL(ROUND(AVG(k.RITASE_MT),2),0) as RIT_MT from log_harian l, kinerja_mt k where l.ID_LOG_HARIAN = k.ID_LOG_HARIAN and l.ID_DEPOT = '$depot' and YEAR(l.TANGGAL_LOG_HARIAN) = '$tahun' and MONTH(l.TANGGAL_LOG_HARIAN) = '$bulan_awal'");
            $data = $query->row();
            $rit_mt_bln1 = $data->RIT_MT;
            $query = $this->db->query("select IFNULL(ROUND(AVG(k.RITASE_MT),2),0) as RIT_MT from log_harian l, kinerja_mt k where l.ID_LOG_HARIAN = k.ID_LOG_HARIAN and l.ID_DEPOT = '$depot' and YEAR(l.TANGGAL_LOG_HARIAN) = '$tahun' and MONTH(l.TANGGAL_LOG_HARIAN) = '$bulan_tengah'");
            $data = $query->row();
            $rit_mt_bln2 = $data->RIT_MT;
            $query = $this->db->query("select IFNULL(ROUND(AVG(k.RITASE_MT),2),0) as RIT_MT from log_harian l, kinerja_mt k where l.ID_LOG_HARIAN = k.ID_LOG_HARIAN and l.ID_DEPOT = '$depot' and YEAR(l.TANGGAL_LOG_HARIAN) = '$tahun' and MONTH(l.TANGGAL_LOG_HARIAN) = '$bulan_akhir'");
            $data = $query->row();
            $rit_mt_bln3 = $data->RIT_MT;
            
            $id_kpi_internal = $data_kpi[16]->ID_KPI_INTERNAL;
            
            if ($jenis == "Triwulan I") {
                $query = $this->db->query("update kpi_internal set REALISASI_TW1_BULAN1 = '$rit_mt_bln1',REALISASI_TW1_BULAN2 = '$rit_mt_bln2',REALISASI_TW1_BULAN3 = '$rit_mt_bln3' where ID_KPI_INTERNAL = '$id_kpi_internal'");
            } else if ($jenis == "Triwulan II") {
                $query = $this->db->query("update kpi_internal set REALISASI_TW2_BULAN1 = '$rit_mt_bln1',REALISASI_TW2_BULAN2 = '$rit_mt_bln2',REALISASI_TW2_BULAN3 = '$rit_mt_bln3' where ID_KPI_INTERNAL = '$id_kpi_internal'");
            } else if ($jenis == "Triwulan III") {
                $query = $this->db->query("update kpi_internal set REALISASI_TW3_BULAN1 = '$rit_mt_bln1',REALISASI_TW3_BULAN2 = '$rit_mt_bln2',REALISASI_TW3_BULAN3 = '$rit_mt_bln3' where ID_KPI_INTERNAL = '$id_kpi_internal'");
            } else if ($jenis == "Triwulan IV") {
                $query = $this->db->query("update kpi_internal set REALISASI_TW4_BULAN1 = '$rit_mt_bln1',REALISASI_TW4_BULAN2 = '$rit_mt_bln2',REALISASI_TW4_BULAN3 = '$rit_mt_bln3' where ID_KPI_INTERNAL = '$id_kpi_internal'");
            }
            
            //Rata-rata KM MT index ke 18 dengan id jenis kpi 53
            $query = $this->db->query("select IFNULL(ROUND(AVG(k.TOTAL_KM_MT),2),0) as KM_MT from log_harian l, kinerja_mt k where l.ID_LOG_HARIAN = k.ID_LOG_HARIAN and l.ID_DEPOT = '$depot' and YEAR(l.TANGGAL_LOG_HARIAN) = '$tahun' and MONTH(l.TANGGAL_LOG_HARIAN) = '$bulan_awal'");
            $data = $query->row();
            $km_mt_bln1 = $data->KM_MT;
            $query = $this->db->query("select IFNULL(ROUND(AVG(k.TOTAL_KM_MT),2),0) as KM_MT from log_harian l, kinerja_mt k where l.ID_LOG_HARIAN = k.ID_LOG_HARIAN and l.ID_DEPOT = '$depot' and YEAR(l.TANGGAL_LOG_HARIAN) = '$tahun' and MONTH(l.TANGGAL_LOG_HARIAN) = '$bulan_tengah'");
            $data = $query->row();
            $km_mt_bln2 = $data->KM_MT;
            $query = $this->db->query("select IFNULL(ROUND(AVG(k.TOTAL_KM_MT),2),0) as KM_MT from log_harian l, kinerja_mt k where l.ID_LOG_HARIAN = k.ID_LOG_HARIAN and l.ID_DEPOT = '$depot' and YEAR(l.TANGGAL_LOG_HARIAN) = '$tahun' and MONTH(l.TANGGAL_LOG_HARIAN) = '$bulan_akhir'");
            $data = $query->row();
            $km_mt_bln3 = $data->KM_MT;
            
            $id_kpi_internal = $data_kpi[18]->ID_KPI_INTERNAL;
            
            if ($jenis == "Triwulan I") {
                $query = $this->db->query("update kpi_internal set REALISASI_TW1_BULAN1 = '$km_mt_bln1',REALISASI_TW1_BULAN2 = '$km_mt_bln2',REALISASI_TW1_BULAN3 = '$km_mt_bln3' where ID_KPI_INTERNAL = '$id_kpi_internal'");
            } else if ($jenis == "Triwulan II") {
                $query = $this->db->query("update kpi_internal set REALISASI_TW2_BULAN1 = '$km_mt_bln1',REALISASI_TW2_BULAN2 = '$km_mt_bln2',REALISASI_TW2_BULAN3 = '$km_mt_bln3' where ID_KPI_INTERNAL = '$id_kpi_internal'");
            } else if ($jenis == "Triwulan III") {
                $query = $this->db->query("update kpi_internal set REALISASI_TW3_BULAN1 = '$km_mt_bln1',REALISASI_TW3_BULAN2 = '$km_mt_bln2',REALISASI_TW3_BULAN3 = '$km_mt_bln3' where ID_KPI_INTERNAL = '$id_kpi_internal'");
            } else if ($jenis == "Triwulan IV") {
                $query = $this->db->query("update kpi_internal set REALISASI_TW4_BULAN1 = '$km_mt_bln1',REALISASI_TW4_BULAN2 = '$km_mt_bln2',REALISASI_TW4_BULAN3 = '$km_mt_bln3' where ID_KPI_INTERNAL = '$id_kpi_internal'");
            }
            
            //Prosentase kehadiran AMT index ke 20 dengan id jenis kpi 55
            $query = $this->db->query("select p.NIP,(select count(*) from kinerja_amt k, log_harian l where k.ID_LOG_HARIAN = l.ID_LOG_HARIAN and l.ID_DEPOT = '$depot' and YEAR(l.TANGGAL_LOG_HARIAN) = '$tahun' and MONTH(l.TANGGAL_LOG_HARIAN) = '$bulan_awal' and k.ID_PEGAWAI = p.ID_PEGAWAI) as KEHADIRAN, (select count(*) from jadwal j, log_harian l where l.ID_LOG_HARIAN = j.ID_LOG_HARIAN and l.ID_DEPOT = '$depot' and YEAR(l.TANGGAL_LOG_HARIAN) = '$tahun' and MONTH(l.TANGGAL_LOG_HARIAN) = '$bulan_awal' and UPPER(j.STATUS_MASUK) = 'HADIR' and j.ID_PEGAWAI = p.ID_PEGAWAI) as JADWAL_DINAS  from pegawai p where p.ID_DEPOT = '$depot' and (p.JABATAN = 'SUPIR' or p.JABATAN = 'KERNET')");
            $data = $query->result();
            $jumlah_presentase = 0;
            $jumlah_data = 0;
            foreach($data as $row){
                if($row->KEHADIRAN > 0){
                    $presentase = 100;
                    if($row->JADWAL_DINAS != 0){
                        $presentase = floor($row->KEHADIRAN / $row->JADWAL_DINAS * 100);
                    }
                    if($presentase > 100){
                        $presentase = 100;
                    }
                    $jumlah_presentase = $jumlah_presentase + $presentase;
                    $jumlah_data++;
                }
            }
            $rata_kehadiran_amt_bln1 = 0;
            if($jumlah_data!=0){
                $rata_kehadiran_amt_bln1 = floor($jumlah_presentase / $jumlah_data);
            }
            
            $query = $this->db->query("select p.NIP,(select count(*) from kinerja_amt k, log_harian l where k.ID_LOG_HARIAN = l.ID_LOG_HARIAN and l.ID_DEPOT = '$depot' and YEAR(l.TANGGAL_LOG_HARIAN) = '$tahun' and MONTH(l.TANGGAL_LOG_HARIAN) = '$bulan_tengah' and k.ID_PEGAWAI = p.ID_PEGAWAI) as KEHADIRAN, (select count(*) from jadwal j, log_harian l where l.ID_LOG_HARIAN = j.ID_LOG_HARIAN and l.ID_DEPOT = '$depot' and YEAR(l.TANGGAL_LOG_HARIAN) = '$tahun' and MONTH(l.TANGGAL_LOG_HARIAN) = '$bulan_tengah' and UPPER(j.STATUS_MASUK) = 'HADIR' and j.ID_PEGAWAI = p.ID_PEGAWAI) as JADWAL_DINAS  from pegawai p where p.ID_DEPOT = '$depot' and (p.JABATAN = 'SUPIR' or p.JABATAN = 'KERNET')");
            $data = $query->result();
            $jumlah_presentase = 0;
            $jumlah_data = 0;
            foreach($data as $row){
                if($row->KEHADIRAN > 0){
                    $presentase = 100;
                    if($row->JADWAL_DINAS != 0){
                        $presentase = floor($row->KEHADIRAN / $row->JADWAL_DINAS * 100);
                    }
                    if($presentase > 100){
                        $presentase = 100;
                    }
                    $jumlah_presentase = $jumlah_presentase + $presentase;
                    $jumlah_data++;
                }
            }
            $rata_kehadiran_amt_bln2 = 0;
            if($jumlah_data!=0){
                $rata_kehadiran_amt_bln2 = floor($jumlah_presentase / $jumlah_data);
            }
            $query = $this->db->query("select p.NIP,(select count(*) from kinerja_amt k, log_harian l where k.ID_LOG_HARIAN = l.ID_LOG_HARIAN and l.ID_DEPOT = '$depot' and YEAR(l.TANGGAL_LOG_HARIAN) = '$tahun' and MONTH(l.TANGGAL_LOG_HARIAN) = '$bulan_akhir' and k.ID_PEGAWAI = p.ID_PEGAWAI) as KEHADIRAN, (select count(*) from jadwal j, log_harian l where l.ID_LOG_HARIAN = j.ID_LOG_HARIAN and l.ID_DEPOT = '$depot' and YEAR(l.TANGGAL_LOG_HARIAN) = '$tahun' and MONTH(l.TANGGAL_LOG_HARIAN) = '$bulan_akhir' and UPPER(j.STATUS_MASUK) = 'HADIR' and j.ID_PEGAWAI = p.ID_PEGAWAI) as JADWAL_DINAS  from pegawai p where p.ID_DEPOT = '$depot' and (p.JABATAN = 'SUPIR' or p.JABATAN = 'KERNET')");
            $data = $query->result();
            $jumlah_presentase = 0;
            $jumlah_data = 0;
            foreach($data as $row){
                if($row->KEHADIRAN > 0){
                    $presentase = 100;
                    if($row->JADWAL_DINAS != 0){
                        $presentase = floor($row->KEHADIRAN / $row->JADWAL_DINAS * 100);
                    }
                    if($presentase > 100){
                        $presentase = 100;
                    }
                    $jumlah_presentase = $jumlah_presentase + $presentase;
                    $jumlah_data++;
                }
            }
            $rata_kehadiran_amt_bln3 = 0;
            if($jumlah_data!=0){
                $rata_kehadiran_amt_bln3 = floor($jumlah_presentase / $jumlah_data);
            }
            
            $id_kpi_internal = $data_kpi[20]->ID_KPI_INTERNAL;
            
            if ($jenis == "Triwulan I") {
                $query = $this->db->query("update kpi_internal set REALISASI_TW1_BULAN1 = '$rata_kehadiran_amt_bln1',REALISASI_TW1_BULAN2 = '$rata_kehadiran_amt_bln2',REALISASI_TW1_BULAN3 = '$rata_kehadiran_amt_bln3' where ID_KPI_INTERNAL = '$id_kpi_internal'");
            } else if ($jenis == "Triwulan II") {
                $query = $this->db->query("update kpi_internal set REALISASI_TW2_BULAN1 = '$rata_kehadiran_amt_bln1',REALISASI_TW2_BULAN2 = '$rata_kehadiran_amt_bln2',REALISASI_TW2_BULAN3 = '$rata_kehadiran_amt_bln3' where ID_KPI_INTERNAL = '$id_kpi_internal'");
            } else if ($jenis == "Triwulan III") {
                $query = $this->db->query("update kpi_internal set REALISASI_TW3_BULAN1 = '$rata_kehadiran_amt_bln1',REALISASI_TW3_BULAN2 = '$rata_kehadiran_amt_bln2',REALISASI_TW3_BULAN3 = '$rata_kehadiran_amt_bln3' where ID_KPI_INTERNAL = '$id_kpi_internal'");
            } else if ($jenis == "Triwulan IV") {
                $query = $this->db->query("update kpi_internal set REALISASI_TW4_BULAN1 = '$rata_kehadiran_amt_bln1',REALISASI_TW4_BULAN2 = '$rata_kehadiran_amt_bln2',REALISASI_TW4_BULAN3 = '$rata_kehadiran_amt_bln3' where ID_KPI_INTERNAL = '$id_kpi_internal'");
            }
            
            //Kegagalan mobil milik patra index ke 26 dengan id jenis kpi 61
            $query = $this->db->query("select m.NOPOL, (select count(*) from kinerja_mt k, log_harian l where k.ID_LOG_HARIAN = l.ID_LOG_HARIAN and l.ID_DEPOT = '$depot' and YEAR(l.TANGGAL_LOG_HARIAN) = '$tahun' and MONTH(l.TANGGAL_LOG_HARIAN) = '$bulan_awal' and k.ID_MOBIL = m.ID_MOBIL) as KEHADIRAN, DAY(LAST_DAY('$tahun-$bulan_awal-1')) as JUMLAH_HARI from mobil m where m.ID_DEPOT = '$depot' and UPPER(m.TRANSPORTIR) like '%PATRA%'");
            $data = $query->result();            
            $jumlah_data = 0;
            foreach($data as $row){
                if($row->KEHADIRAN > 0){
                    if(($row->JUMLAH_HARI - $row->KEHADIRAN)>=2){
                        $jumlah_data++;
                    }
                }
            }
            $kegagalan_mt_bln1 = $jumlah_data;
                        
            $query = $this->db->query("select m.NOPOL, (select count(*) from kinerja_mt k, log_harian l where k.ID_LOG_HARIAN = l.ID_LOG_HARIAN and l.ID_DEPOT = '$depot' and YEAR(l.TANGGAL_LOG_HARIAN) = '$tahun' and MONTH(l.TANGGAL_LOG_HARIAN) = '$bulan_tengah' and k.ID_MOBIL = m.ID_MOBIL) as KEHADIRAN, DAY(LAST_DAY('$tahun-$bulan_tengah-1')) as JUMLAH_HARI from mobil m where m.ID_DEPOT = '$depot' and UPPER(m.TRANSPORTIR) like '%PATRA%'");
            $data = $query->result();            
            $jumlah_data = 0;
            foreach($data as $row){
                if($row->KEHADIRAN > 0){
                    if(($row->JUMLAH_HARI - $row->KEHADIRAN)>=2){
                        $jumlah_data++;
                    }
                }
            }
            $kegagalan_mt_bln2 = $jumlah_data;
            
            $query = $this->db->query("select m.NOPOL, (select count(*) from kinerja_mt k, log_harian l where k.ID_LOG_HARIAN = l.ID_LOG_HARIAN and l.ID_DEPOT = '$depot' and YEAR(l.TANGGAL_LOG_HARIAN) = '$tahun' and MONTH(l.TANGGAL_LOG_HARIAN) = '$bulan_akhir' and k.ID_MOBIL = m.ID_MOBIL) as KEHADIRAN, DAY(LAST_DAY('$tahun-$bulan_akhir-1')) as JUMLAH_HARI from mobil m where m.ID_DEPOT = '$depot' and UPPER(m.TRANSPORTIR) like '%PATRA%'");
            $data = $query->result();            
            $jumlah_data = 0;
            foreach($data as $row){
                if($row->KEHADIRAN > 0){
                    if(($row->JUMLAH_HARI - $row->KEHADIRAN)>=2){
                        $jumlah_data++;
                    }
                }
            }
            $kegagalan_mt_bln3 = $jumlah_data;
            
            $id_kpi_internal = $data_kpi[26]->ID_KPI_INTERNAL;
            
            if ($jenis == "Triwulan I") {
                $query = $this->db->query("update kpi_internal set REALISASI_TW1_BULAN1 = '$kegagalan_mt_bln1',REALISASI_TW1_BULAN2 = '$kegagalan_mt_bln2',REALISASI_TW1_BULAN3 = '$kegagalan_mt_bln3' where ID_KPI_INTERNAL = '$id_kpi_internal'");
            } else if ($jenis == "Triwulan II") {
                $query = $this->db->query("update kpi_internal set REALISASI_TW2_BULAN1 = '$kegagalan_mt_bln1',REALISASI_TW2_BULAN2 = '$kegagalan_mt_bln2',REALISASI_TW2_BULAN3 = '$kegagalan_mt_bln3' where ID_KPI_INTERNAL = '$id_kpi_internal'");
            } else if ($jenis == "Triwulan III") {
                $query = $this->db->query("update kpi_internal set REALISASI_TW3_BULAN1 = '$kegagalan_mt_bln1',REALISASI_TW3_BULAN2 = '$kegagalan_mt_bln2',REALISASI_TW3_BULAN3 = '$kegagalan_mt_bln3' where ID_KPI_INTERNAL = '$id_kpi_internal'");
            } else if ($jenis == "Triwulan IV") {
                $query = $this->db->query("update kpi_internal set REALISASI_TW4_BULAN1 = '$kegagalan_mt_bln1',REALISASI_TW4_BULAN2 = '$kegagalan_mt_bln2',REALISASI_TW4_BULAN3 = '$kegagalan_mt_bln3' where ID_KPI_INTERNAL = '$id_kpi_internal'");
            }
            
            //Kegagalan mobil milik patra index ke 27 dengan id jenis kpi 62
            $query = $this->db->query("select m.NOPOL, (select count(*) from kinerja_mt k, log_harian l where k.ID_LOG_HARIAN = l.ID_LOG_HARIAN and l.ID_DEPOT = '$depot' and YEAR(l.TANGGAL_LOG_HARIAN) = '$tahun' and MONTH(l.TANGGAL_LOG_HARIAN) = '$bulan_awal' and k.ID_MOBIL = m.ID_MOBIL) as KEHADIRAN, DAY(LAST_DAY('$tahun-$bulan_awal-1')) as JUMLAH_HARI from mobil m where m.ID_DEPOT = '$depot'");
            $data = $query->result();            
            $jumlah_data = 0;
            foreach($data as $row){
                if($row->KEHADIRAN > 0){
                    if(($row->JUMLAH_HARI - $row->KEHADIRAN)>=2){
                        $jumlah_data++;
                    }
                }
            }
            $kegagalan_mt_bln1 = $jumlah_data;
                        
            $query = $this->db->query("select m.NOPOL, (select count(*) from kinerja_mt k, log_harian l where k.ID_LOG_HARIAN = l.ID_LOG_HARIAN and l.ID_DEPOT = '$depot' and YEAR(l.TANGGAL_LOG_HARIAN) = '$tahun' and MONTH(l.TANGGAL_LOG_HARIAN) = '$bulan_tengah' and k.ID_MOBIL = m.ID_MOBIL) as KEHADIRAN, DAY(LAST_DAY('$tahun-$bulan_tengah-1')) as JUMLAH_HARI from mobil m where m.ID_DEPOT = '$depot'");
            $data = $query->result();            
            $jumlah_data = 0;
            foreach($data as $row){
                if($row->KEHADIRAN > 0){
                    if(($row->JUMLAH_HARI - $row->KEHADIRAN)>=2){
                        $jumlah_data++;
                    }
                }
            }
            $kegagalan_mt_bln2 = $jumlah_data;
            
            $query = $this->db->query("select m.NOPOL, (select count(*) from kinerja_mt k, log_harian l where k.ID_LOG_HARIAN = l.ID_LOG_HARIAN and l.ID_DEPOT = '$depot' and YEAR(l.TANGGAL_LOG_HARIAN) = '$tahun' and MONTH(l.TANGGAL_LOG_HARIAN) = '$bulan_akhir' and k.ID_MOBIL = m.ID_MOBIL) as KEHADIRAN, DAY(LAST_DAY('$tahun-$bulan_akhir-1')) as JUMLAH_HARI from mobil m where m.ID_DEPOT = '$depot'");
            $data = $query->result();            
            $jumlah_data = 0;
            foreach($data as $row){
                if($row->KEHADIRAN > 0){
                    if(($row->JUMLAH_HARI - $row->KEHADIRAN)>=2){
                        $jumlah_data++;
                    }
                }
            }
            $kegagalan_mt_bln3 = $jumlah_data;
            
            $id_kpi_internal = $data_kpi[27]->ID_KPI_INTERNAL;
            
            if ($jenis == "Triwulan I") {
                $query = $this->db->query("update kpi_internal set REALISASI_TW1_BULAN1 = '$kegagalan_mt_bln1',REALISASI_TW1_BULAN2 = '$kegagalan_mt_bln2',REALISASI_TW1_BULAN3 = '$kegagalan_mt_bln3' where ID_KPI_INTERNAL = '$id_kpi_internal'");
            } else if ($jenis == "Triwulan II") {
                $query = $this->db->query("update kpi_internal set REALISASI_TW2_BULAN1 = '$kegagalan_mt_bln1',REALISASI_TW2_BULAN2 = '$kegagalan_mt_bln2',REALISASI_TW2_BULAN3 = '$kegagalan_mt_bln3' where ID_KPI_INTERNAL = '$id_kpi_internal'");
            } else if ($jenis == "Triwulan III") {
                $query = $this->db->query("update kpi_internal set REALISASI_TW3_BULAN1 = '$kegagalan_mt_bln1',REALISASI_TW3_BULAN2 = '$kegagalan_mt_bln2',REALISASI_TW3_BULAN3 = '$kegagalan_mt_bln3' where ID_KPI_INTERNAL = '$id_kpi_internal'");
            } else if ($jenis == "Triwulan IV") {
                $query = $this->db->query("update kpi_internal set REALISASI_TW4_BULAN1 = '$kegagalan_mt_bln1',REALISASI_TW4_BULAN2 = '$kegagalan_mt_bln2',REALISASI_TW4_BULAN3 = '$kegagalan_mt_bln3' where ID_KPI_INTERNAL = '$id_kpi_internal'");
            }
            // SELESAI SINKRON           
        }
    }

    public function getInfoDepot($depot) {
        $query = $this->db->query("select * from depot d, pegawai p, role_assignment r where d.ID_DEPOT = p.ID_DEPOT and p.ID_PEGAWAI = r.ID_PEGAWAI and d.ID_DEPOT = '$depot' and r.ID_ROLE = 3");
        return $query->row();
    }

    public function getInfoOAM() {
        $query = $this->db->query("select * from depot d, pegawai p, role_assignment r where d.ID_DEPOT = p.ID_DEPOT and p.ID_PEGAWAI = r.ID_PEGAWAI and d.ID_DEPOT = -1 and r.ID_ROLE = 1");
        return $query->row();
    }

    public function getLaporanHarian($depot, $tahun, $bulan) {
        $query = $this->db->query("select m.ID_MOBIL,m.TRANSPORTIR,m.NOPOL,m.KAPASITAS,
(select k.TOTAL_KM_MT from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=1)as 'KM1',
(select k.TOTAL_KM_MT from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=2)as 'KM2',
(select k.TOTAL_KM_MT from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=3)as 'KM3',
(select k.TOTAL_KM_MT from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=4)as 'KM4',
(select k.TOTAL_KM_MT from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=5)as 'KM5',
(select k.TOTAL_KM_MT from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=6)as 'KM6',
(select k.TOTAL_KM_MT from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=7)as 'KM7',
(select k.TOTAL_KM_MT from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=8)as 'KM8',
(select k.TOTAL_KM_MT from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=9)as 'KM9',
(select k.TOTAL_KM_MT from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=10)as 'KM10',
(select k.TOTAL_KM_MT from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=11)as 'KM11',
(select k.TOTAL_KM_MT from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=12)as 'KM12',
(select k.TOTAL_KM_MT from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=13)as 'KM13',
(select k.TOTAL_KM_MT from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=14)as 'KM14',
(select k.TOTAL_KM_MT from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=15)as 'KM15',
(select k.TOTAL_KM_MT from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=16)as 'KM16',
(select k.TOTAL_KM_MT from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=17)as 'KM17',
(select k.TOTAL_KM_MT from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=18)as 'KM18',
(select k.TOTAL_KM_MT from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=19)as 'KM19',
(select k.TOTAL_KM_MT from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=20)as 'KM20',
(select k.TOTAL_KM_MT from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=21)as 'KM21',
(select k.TOTAL_KM_MT from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=22)as 'KM22',
(select k.TOTAL_KM_MT from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=23)as 'KM23',
(select k.TOTAL_KM_MT from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=24)as 'KM24',
(select k.TOTAL_KM_MT from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=25)as 'KM25',
(select k.TOTAL_KM_MT from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=26)as 'KM26',
(select k.TOTAL_KM_MT from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=27)as 'KM27',
(select k.TOTAL_KM_MT from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=28)as 'KM28',
(select k.TOTAL_KM_MT from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=29)as 'KM29',
(select k.TOTAL_KM_MT from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=30)as 'KM30',
(select k.TOTAL_KM_MT from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=31)as 'KM31',
(select k.TOTAL_KL_MT from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=1)as 'KL1',
(select k.TOTAL_KL_MT from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=2)as 'KL2',
(select k.TOTAL_KL_MT from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=3)as 'KL3',
(select k.TOTAL_KL_MT from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=4)as 'KL4',
(select k.TOTAL_KL_MT from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=5)as 'KL5',
(select k.TOTAL_KL_MT from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=6)as 'KL6',
(select k.TOTAL_KL_MT from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=7)as 'KL7',
(select k.TOTAL_KL_MT from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=8)as 'KL8',
(select k.TOTAL_KL_MT from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=9)as 'KL9',
(select k.TOTAL_KL_MT from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=10)as 'KL10',
(select k.TOTAL_KL_MT from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=11)as 'KL11',
(select k.TOTAL_KL_MT from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=12)as 'KL12',
(select k.TOTAL_KL_MT from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=13)as 'KL13',
(select k.TOTAL_KL_MT from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=14)as 'KL14',
(select k.TOTAL_KL_MT from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=15)as 'KL15',
(select k.TOTAL_KL_MT from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=16)as 'KL16',
(select k.TOTAL_KL_MT from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=17)as 'KL17',
(select k.TOTAL_KL_MT from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=18)as 'KL18',
(select k.TOTAL_KL_MT from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=19)as 'KL19',
(select k.TOTAL_KL_MT from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=20)as 'KL20',
(select k.TOTAL_KL_MT from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=21)as 'KL21',
(select k.TOTAL_KL_MT from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=22)as 'KL22',
(select k.TOTAL_KL_MT from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=23)as 'KL23',
(select k.TOTAL_KL_MT from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=24)as 'KL24',
(select k.TOTAL_KL_MT from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=25)as 'KL25',
(select k.TOTAL_KL_MT from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=26)as 'KL26',
(select k.TOTAL_KL_MT from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=27)as 'KL27',
(select k.TOTAL_KL_MT from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=28)as 'KL28',
(select k.TOTAL_KL_MT from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=29)as 'KL29',
(select k.TOTAL_KL_MT from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=30)as 'KL30',
(select k.TOTAL_KL_MT from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=31)as 'KL31',
(select k.RITASE_MT from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=1)as 'RIT1',
(select k.RITASE_MT from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=2)as 'RIT2',
(select k.RITASE_MT from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=3)as 'RIT3',
(select k.RITASE_MT from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=4)as 'RIT4',
(select k.RITASE_MT from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=5)as 'RIT5',
(select k.RITASE_MT from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=6)as 'RIT6',
(select k.RITASE_MT from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=7)as 'RIT7',
(select k.RITASE_MT from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=8)as 'RIT8',
(select k.RITASE_MT from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=9)as 'RIT9',
(select k.RITASE_MT from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=10)as 'RIT10',
(select k.RITASE_MT from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=11)as 'RIT11',
(select k.RITASE_MT from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=12)as 'RIT12',
(select k.RITASE_MT from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=13)as 'RIT13',
(select k.RITASE_MT from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=14)as 'RIT14',
(select k.RITASE_MT from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=15)as 'RIT15',
(select k.RITASE_MT from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=16)as 'RIT16',
(select k.RITASE_MT from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=17)as 'RIT17',
(select k.RITASE_MT from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=18)as 'RIT18',
(select k.RITASE_MT from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=19)as 'RIT19',
(select k.RITASE_MT from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=20)as 'RIT20',
(select k.RITASE_MT from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=21)as 'RIT21',
(select k.RITASE_MT from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=22)as 'RIT22',
(select k.RITASE_MT from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=23)as 'RIT23',
(select k.RITASE_MT from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=24)as 'RIT24',
(select k.RITASE_MT from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=25)as 'RIT25',
(select k.RITASE_MT from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=26)as 'RIT26',
(select k.RITASE_MT from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=27)as 'RIT27',
(select k.RITASE_MT from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=28)as 'RIT28',
(select k.RITASE_MT from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=29)as 'RIT29',
(select k.RITASE_MT from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=30)as 'RIT30',
(select k.RITASE_MT from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=31)as 'RIT31',
(select k.OWN_USE from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=1)as 'OWNUSE1',
(select k.OWN_USE from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=2)as 'OWNUSE2',
(select k.OWN_USE from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=3)as 'OWNUSE3',
(select k.OWN_USE from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=4)as 'OWNUSE4',
(select k.OWN_USE from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=5)as 'OWNUSE5',
(select k.OWN_USE from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=6)as 'OWNUSE6',
(select k.OWN_USE from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=7)as 'OWNUSE7',
(select k.OWN_USE from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=8)as 'OWNUSE8',
(select k.OWN_USE from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=9)as 'OWNUSE9',
(select k.OWN_USE from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=10)as 'OWNUSE10',
(select k.OWN_USE from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=11)as 'OWNUSE11',
(select k.OWN_USE from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=12)as 'OWNUSE12',
(select k.OWN_USE from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=13)as 'OWNUSE13',
(select k.OWN_USE from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=14)as 'OWNUSE14',
(select k.OWN_USE from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=15)as 'OWNUSE15',
(select k.OWN_USE from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=16)as 'OWNUSE16',
(select k.OWN_USE from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=17)as 'OWNUSE17',
(select k.OWN_USE from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=18)as 'OWNUSE18',
(select k.OWN_USE from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=19)as 'OWNUSE19',
(select k.OWN_USE from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=20)as 'OWNUSE20',
(select k.OWN_USE from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=21)as 'OWNUSE21',
(select k.OWN_USE from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=22)as 'OWNUSE22',
(select k.OWN_USE from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=23)as 'OWNUSE23',
(select k.OWN_USE from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=24)as 'OWNUSE24',
(select k.OWN_USE from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=25)as 'OWNUSE25',
(select k.OWN_USE from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=26)as 'OWNUSE26',
(select k.OWN_USE from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=27)as 'OWNUSE27',
(select k.OWN_USE from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=28)as 'OWNUSE28',
(select k.OWN_USE from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=29)as 'OWNUSE29',
(select k.OWN_USE from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=30)as 'OWNUSE30',
(select k.OWN_USE from kinerja_mt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_MOBIL=m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=31)as 'OWNUSE31'   
from mobil m where m.ID_DEPOT = '$depot' and (select COUNT(*) from kinerja_mt k, log_harian l where k.ID_LOG_HARIAN = l.ID_LOG_HARIAN and k.ID_MOBIL = m.ID_MOBIL and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan')>0 order by m.TRANSPORTIR DESC");
        return $query;
    }

    public function getPerformansiHarian($depot, $tahun, $bulan) {
        $query = $this->db->query("select p.NAMA_PEGAWAI,p.NIP,p.JABATAN,p.KLASIFIKASI,
(select k.TOTAL_KM from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=1)as 'KM1',
(select k.TOTAL_KM from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=2)as 'KM2',
(select k.TOTAL_KM from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=3)as 'KM3',
(select k.TOTAL_KM from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=4)as 'KM4',
(select k.TOTAL_KM from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=5)as 'KM5',
(select k.TOTAL_KM from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=6)as 'KM6',
(select k.TOTAL_KM from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=7)as 'KM7',
(select k.TOTAL_KM from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=8)as 'KM8',
(select k.TOTAL_KM from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=9)as 'KM9',
(select k.TOTAL_KM from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=10)as 'KM10',
(select k.TOTAL_KM from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=11)as 'KM11',
(select k.TOTAL_KM from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=12)as 'KM12',
(select k.TOTAL_KM from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=13)as 'KM13',
(select k.TOTAL_KM from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=14)as 'KM14',
(select k.TOTAL_KM from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=15)as 'KM15',
(select k.TOTAL_KM from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=16)as 'KM16',
(select k.TOTAL_KM from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=17)as 'KM17',
(select k.TOTAL_KM from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=18)as 'KM18',
(select k.TOTAL_KM from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=19)as 'KM19',
(select k.TOTAL_KM from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=20)as 'KM20',
(select k.TOTAL_KM from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=21)as 'KM21',
(select k.TOTAL_KM from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=22)as 'KM22',
(select k.TOTAL_KM from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=23)as 'KM23',
(select k.TOTAL_KM from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=24)as 'KM24',
(select k.TOTAL_KM from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=25)as 'KM25',
(select k.TOTAL_KM from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=26)as 'KM26',
(select k.TOTAL_KM from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=27)as 'KM27',
(select k.TOTAL_KM from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=28)as 'KM28',
(select k.TOTAL_KM from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=29)as 'KM29',
(select k.TOTAL_KM from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=30)as 'KM30',
(select k.TOTAL_KM from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=31)as 'KM31',
(select k.RITASE_AMT from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=1)as 'RIT1',
(select k.RITASE_AMT from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=2)as 'RIT2',
(select k.RITASE_AMT from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=3)as 'RIT3',
(select k.RITASE_AMT from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=4)as 'RIT4',
(select k.RITASE_AMT from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=5)as 'RIT5',
(select k.RITASE_AMT from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=6)as 'RIT6',
(select k.RITASE_AMT from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=7)as 'RIT7',
(select k.RITASE_AMT from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=8)as 'RIT8',
(select k.RITASE_AMT from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=9)as 'RIT9',
(select k.RITASE_AMT from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=10)as 'RIT10',
(select k.RITASE_AMT from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=11)as 'RIT11',
(select k.RITASE_AMT from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=12)as 'RIT12',
(select k.RITASE_AMT from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=13)as 'RIT13',
(select k.RITASE_AMT from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=14)as 'RIT14',
(select k.RITASE_AMT from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=15)as 'RIT15',
(select k.RITASE_AMT from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=16)as 'RIT16',
(select k.RITASE_AMT from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=17)as 'RIT17',
(select k.RITASE_AMT from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=18)as 'RIT18',
(select k.RITASE_AMT from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=19)as 'RIT19',
(select k.RITASE_AMT from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=20)as 'RIT20',
(select k.RITASE_AMT from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=21)as 'RIT21',
(select k.RITASE_AMT from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=22)as 'RIT22',
(select k.RITASE_AMT from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=23)as 'RIT23',
(select k.RITASE_AMT from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=24)as 'RIT24',
(select k.RITASE_AMT from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=25)as 'RIT25',
(select k.RITASE_AMT from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=26)as 'RIT26',
(select k.RITASE_AMT from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=27)as 'RIT27',
(select k.RITASE_AMT from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=28)as 'RIT28',
(select k.RITASE_AMT from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=29)as 'RIT29',
(select k.RITASE_AMT from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=30)as 'RIT30',
(select k.RITASE_AMT from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=31)as 'RIT31',
(select k.TOTAL_KL from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=1)as 'KL1',
(select k.TOTAL_KL from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=2)as 'KL2',
(select k.TOTAL_KL from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=3)as 'KL3',
(select k.TOTAL_KL from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=4)as 'KL4',
(select k.TOTAL_KL from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=5)as 'KL5',
(select k.TOTAL_KL from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=6)as 'KL6',
(select k.TOTAL_KL from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=7)as 'KL7',
(select k.TOTAL_KL from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=8)as 'KL8',
(select k.TOTAL_KL from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=9)as 'KL9',
(select k.TOTAL_KL from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=10)as 'KL10',
(select k.TOTAL_KL from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=11)as 'KL11',
(select k.TOTAL_KL from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=12)as 'KL12',
(select k.TOTAL_KL from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=13)as 'KL13',
(select k.TOTAL_KL from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=14)as 'KL14',
(select k.TOTAL_KL from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=15)as 'KL15',
(select k.TOTAL_KL from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=16)as 'KL16',
(select k.TOTAL_KL from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=17)as 'KL17',
(select k.TOTAL_KL from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=18)as 'KL18',
(select k.TOTAL_KL from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=19)as 'KL19',
(select k.TOTAL_KL from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=20)as 'KL20',
(select k.TOTAL_KL from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=21)as 'KL21',
(select k.TOTAL_KL from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=22)as 'KL22',
(select k.TOTAL_KL from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=23)as 'KL23',
(select k.TOTAL_KL from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=24)as 'KL24',
(select k.TOTAL_KL from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=25)as 'KL25',
(select k.TOTAL_KL from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=26)as 'KL26',
(select k.TOTAL_KL from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=27)as 'KL27',
(select k.TOTAL_KL from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=28)as 'KL28',
(select k.TOTAL_KL from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=29)as 'KL29',
(select k.TOTAL_KL from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=30)as 'KL30',
(select k.TOTAL_KL from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=31)as 'KL31',
(select k.SPBU from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=1)as 'SPBU1',
(select k.SPBU from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=2)as 'SPBU2',
(select k.SPBU from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=3)as 'SPBU3',
(select k.SPBU from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=4)as 'SPBU4',
(select k.SPBU from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=5)as 'SPBU5',
(select k.SPBU from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=6)as 'SPBU6',
(select k.SPBU from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=7)as 'SPBU7',
(select k.SPBU from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=8)as 'SPBU8',
(select k.SPBU from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=9)as 'SPBU9',
(select k.SPBU from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=10)as 'SPBU10',
(select k.SPBU from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=11)as 'SPBU11',
(select k.SPBU from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=12)as 'SPBU12',
(select k.SPBU from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=13)as 'SPBU13',
(select k.SPBU from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=14)as 'SPBU14',
(select k.SPBU from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=15)as 'SPBU15',
(select k.SPBU from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=16)as 'SPBU16',
(select k.SPBU from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=17)as 'SPBU17',
(select k.SPBU from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=18)as 'SPBU18',
(select k.SPBU from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=19)as 'SPBU19',
(select k.SPBU from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=20)as 'SPBU20',
(select k.SPBU from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=21)as 'SPBU21',
(select k.SPBU from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=22)as 'SPBU22',
(select k.SPBU from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=23)as 'SPBU23',
(select k.SPBU from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=24)as 'SPBU24',
(select k.SPBU from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=25)as 'SPBU25',
(select k.SPBU from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=26)as 'SPBU26',
(select k.SPBU from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=27)as 'SPBU27',
(select k.SPBU from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=28)as 'SPBU28',
(select k.SPBU from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=29)as 'SPBU29',
(select k.SPBU from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=30)as 'SPBU30',
(select k.SPBU from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=31)as 'SPBU31',
(select k.PENDAPATAN from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=1)as 'RUPIAH1',
(select k.PENDAPATAN from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=2)as 'RUPIAH2',
(select k.PENDAPATAN from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=3)as 'RUPIAH3',
(select k.PENDAPATAN from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=4)as 'RUPIAH4',
(select k.PENDAPATAN from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=5)as 'RUPIAH5',
(select k.PENDAPATAN from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=6)as 'RUPIAH6',
(select k.PENDAPATAN from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=7)as 'RUPIAH7',
(select k.PENDAPATAN from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=8)as 'RUPIAH8',
(select k.PENDAPATAN from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=9)as 'RUPIAH9',
(select k.PENDAPATAN from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=10)as 'RUPIAH10',
(select k.PENDAPATAN from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=11)as 'RUPIAH11',
(select k.PENDAPATAN from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=12)as 'RUPIAH12',
(select k.PENDAPATAN from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=13)as 'RUPIAH13',
(select k.PENDAPATAN from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=14)as 'RUPIAH14',
(select k.PENDAPATAN from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=15)as 'RUPIAH15',
(select k.PENDAPATAN from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=16)as 'RUPIAH16',
(select k.PENDAPATAN from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=17)as 'RUPIAH17',
(select k.PENDAPATAN from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=18)as 'RUPIAH18',
(select k.PENDAPATAN from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=19)as 'RUPIAH19',
(select k.PENDAPATAN from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=20)as 'RUPIAH20',
(select k.PENDAPATAN from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=21)as 'RUPIAH21',
(select k.PENDAPATAN from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=22)as 'RUPIAH22',
(select k.PENDAPATAN from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=23)as 'RUPIAH23',
(select k.PENDAPATAN from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=24)as 'RUPIAH24',
(select k.PENDAPATAN from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=25)as 'RUPIAH25',
(select k.PENDAPATAN from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=26)as 'RUPIAH26',
(select k.PENDAPATAN from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=27)as 'RUPIAH27',
(select k.PENDAPATAN from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=28)as 'RUPIAH28',
(select k.PENDAPATAN from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=29)as 'RUPIAH29',
(select k.PENDAPATAN from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=30)as 'RUPIAH30',
(select k.PENDAPATAN from kinerja_amt k,log_harian l where k.ID_LOG_HARIAN=l.ID_LOG_HARIAN and k.ID_PEGAWAI=p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan' and DAY(l.TANGGAL_LOG_HARIAN)=31)as 'RUPIAH31'
from pegawai p where p.ID_DEPOT = '$depot' and (p.JABATAN = 'SUPIR' or p.JABATAN = 'KERNET') and (select COUNT(*) from kinerja_amt k, log_harian l where k.ID_LOG_HARIAN = l.ID_LOG_HARIAN and k.ID_PEGAWAI = p.ID_PEGAWAI and YEAR(l.TANGGAL_LOG_HARIAN)='$tahun' and MONTH(l.TANGGAL_LOG_HARIAN)='$bulan')>0 order by p.NAMA_PEGAWAI DESC");
        return $query;
    }

    public function getRencanaRealisasi($depot, $tahun, $bulan) {
        $query = $this->db->query("select l.TANGGAL_LOG_HARIAN,l.JUMLAH_ALOKASI_SPBU,
(select r.R_PREMIUM from rencana r where r.ID_LOG_HARIAN = l.ID_LOG_HARIAN) as R_PREMIUM,
(select r.R_PERTAMAX from rencana r where r.ID_LOG_HARIAN = l.ID_LOG_HARIAN) as R_PERTAMAX,
(select r.R_PERTAMAXPLUS from rencana r where r.ID_LOG_HARIAN = l.ID_LOG_HARIAN) as R_PERTAMAXPLUS,
(select r.R_BIOSOLAR from rencana r where r.ID_LOG_HARIAN = l.ID_LOG_HARIAN) as R_BIOSOLAR,
(select r.R_SOLAR from rencana r where r.ID_LOG_HARIAN = l.ID_LOG_HARIAN) as R_SOLAR,
(select r.R_PERTAMINADEX from rencana r where r.ID_LOG_HARIAN = l.ID_LOG_HARIAN) as R_PERTAMINADEX,
(select r.R_OWN_USE from rencana r where r.ID_LOG_HARIAN = l.ID_LOG_HARIAN) as R_OWN_USE,
(select SUM(k.PREMIUM) from kinerja_mt k where k.ID_LOG_HARIAN = l.ID_LOG_HARIAN) as REALISASI_PREMIUM,
(select SUM(k.PERTAMAX) from kinerja_mt k where k.ID_LOG_HARIAN = l.ID_LOG_HARIAN) as REALISASI_PERTAMAX,
(select SUM(k.PERTAMAX_PLUS) from kinerja_mt k where k.ID_LOG_HARIAN = l.ID_LOG_HARIAN) as REALISASI_PERTAMAX_PLUS,
(select SUM(k.BIO_SOLAR) from kinerja_mt k where k.ID_LOG_HARIAN = l.ID_LOG_HARIAN) as REALISASI_BIO_SOLAR,
(select SUM(k.SOLAR) from kinerja_mt k where k.ID_LOG_HARIAN = l.ID_LOG_HARIAN) as REALISASI_SOLAR,
(select SUM(k.PERTAMINA_DEX) from kinerja_mt k where k.ID_LOG_HARIAN = l.ID_LOG_HARIAN) as REALISASI_PERTAMINA_DEX,
(select SUM(k.OWN_USE) from kinerja_mt k where k.ID_LOG_HARIAN = l.ID_LOG_HARIAN) as REALISASI_OWNUSE,
(select COUNT(*) from jadwal j, pegawai p where j.ID_LOG_HARIAN = l.ID_LOG_HARIAN and j.ID_PEGAWAI = p.ID_PEGAWAI and p.JABATAN = 'SUPIR' and j.STATUS_MASUK='Hadir') as JADWAL_DINAS_SUPIR,
(select COUNT(*) from jadwal j, pegawai p where j.ID_LOG_HARIAN = l.ID_LOG_HARIAN and j.ID_PEGAWAI = p.ID_PEGAWAI and p.JABATAN = 'KERNET' and j.STATUS_MASUK='Hadir') as JADWAL_DINAS_KERNET,
(select m.SESUAI_PREMIUM from ms2 m where m.ID_LOG_HARIAN = l.ID_LOG_HARIAN) as SESUAI_PREMIUM,
(select m.SESUAI_PERTAMAX from ms2 m where m.ID_LOG_HARIAN = l.ID_LOG_HARIAN) as SESUAI_PERTAMAX,
(select m.SESUAI_SOLAR from ms2 m where m.ID_LOG_HARIAN = l.ID_LOG_HARIAN) as SESUAI_SOLAR,
(select m.CEPAT_PREMIUM from ms2 m where m.ID_LOG_HARIAN = l.ID_LOG_HARIAN) as CEPAT_PREMIUM,
(select m.CEPAT_PERTAMAX from ms2 m where m.ID_LOG_HARIAN = l.ID_LOG_HARIAN) as CEPAT_PERTAMAX,
(select m.CEPAT_SOLAR from ms2 m where m.ID_LOG_HARIAN = l.ID_LOG_HARIAN) as CEPAT_SOLAR,
(select m.CEPAT_SHIFT1_PREMIUM from ms2 m where m.ID_LOG_HARIAN = l.ID_LOG_HARIAN) as CEPAT_SHIFT1_PREMIUM,
(select m.CEPAT_SHIFT1_PERTAMAX from ms2 m where m.ID_LOG_HARIAN = l.ID_LOG_HARIAN) as CEPAT_SHIFT1_PERTAMAX,
(select m.CEPAT_SHIFT1_SOLAR from ms2 m where m.ID_LOG_HARIAN = l.ID_LOG_HARIAN) as CEPAT_SHIFT1_SOLAR,
(select m.LAMBAT_PREMIUM from ms2 m where m.ID_LOG_HARIAN = l.ID_LOG_HARIAN) as LAMBAT_PREMIUM,
(select m.LAMBAT_PERTAMAX from ms2 m where m.ID_LOG_HARIAN = l.ID_LOG_HARIAN) as LAMBAT_PERTAMAX,
(select m.LAMBAT_SOLAR from ms2 m where m.ID_LOG_HARIAN = l.ID_LOG_HARIAN) as LAMBAT_SOLAR,
(select m.TIDAK_TERKIRIM_PREMIUM from ms2 m where m.ID_LOG_HARIAN = l.ID_LOG_HARIAN) as TIDAK_TERKIRIM_PREMIUM,
(select m.TIDAK_TERKIRIM_PERTAMAX from ms2 m where m.ID_LOG_HARIAN = l.ID_LOG_HARIAN) as TIDAK_TERKIRIM_PERTAMAX,
(select m.TIDAK_TERKIRIM_SOLAR from ms2 m where m.ID_LOG_HARIAN = l.ID_LOG_HARIAN) as TIDAK_TERKIRIM_SOLAR,
(select r.MISS from rencana r where r.ID_LOG_HARIAN = l.ID_LOG_HARIAN) as R_MISS,
(select r.TAMBAHAN from rencana r where r.ID_LOG_HARIAN = l.ID_LOG_HARIAN) as R_TAMBAHAN,
(select r.PEMBATALAN from rencana r where r.ID_LOG_HARIAN = l.ID_LOG_HARIAN) as R_PEMBATALAN
 from log_harian l where MONTH(l.TANGGAL_LOG_HARIAN) = '$bulan' and YEAR(l.TANGGAL_LOG_HARIAN) = '$tahun' and l.ID_DEPOT = '$depot' order by l.TANGGAL_LOG_HARIAN");
        return $query->result();
    }
    
    public function getJadwalAMT($depot, $tahun, $bulan){
        $query = $this->db->query("select l.TANGGAL_LOG_HARIAN,
(select count(*) from kinerja_amt k, pegawai p where k.ID_LOG_HARIAN = l.ID_LOG_HARIAN and p.ID_PEGAWAI = k.ID_PEGAWAI and upper(p.JABATAN) = 'SUPIR') as JUMLAH_HADIR_SUPIR,
(select count(*) from kinerja_amt k, pegawai p where k.ID_LOG_HARIAN = l.ID_LOG_HARIAN and p.ID_PEGAWAI = k.ID_PEGAWAI and upper(p.JABATAN) = 'KERNET') as JUMLAH_HADIR_KERNET,
(select count(*) from jadwal j, pegawai p where j.ID_LOG_HARIAN = l.ID_LOG_HARIAN and UPPER(j.STATUS_MASUK) = 'HADIR' and p.ID_PEGAWAI = j.ID_PEGAWAI and upper(p.JABATAN) = 'SUPIR') as JADWAL_DINAS_SUPIR,
(select count(*) from jadwal j, pegawai p where j.ID_LOG_HARIAN = l.ID_LOG_HARIAN and UPPER(j.STATUS_MASUK) = 'HADIR' and p.ID_PEGAWAI = j.ID_PEGAWAI and upper(p.JABATAN) = 'KERNET') as JADWAL_DINAS_KERNET
from log_harian l where MONTH(l.TANGGAL_LOG_HARIAN) = '$bulan' and YEAR(l.TANGGAL_LOG_HARIAN) = '$tahun' and l.ID_DEPOT = '$depot' order by l.TANGGAL_LOG_HARIAN");
        return $query->result();
    }
	public function getLaporanRealisasiAPMS($depot,$tahun,$bulan)
	{
		$result = $this->db->query("select b.NO_DELIVERY, b.DESCRIPTION, a.SHIP_TO,a.NO_APMS,a.NAMA_PENGUSAHA,b.DATE_PLAN_GI,b.SOLAR,b.PREMIUM from apms a, kinerja_apms b, log_harian i where b.ID_APMS = a.ID_APMS and i.ID_LOG_HARIAN = b.ID_LOG_HARIAN and i.ID_DEPOT = $depot and MONTH(i.TANGGAL_LOG_HARIAN) = '$bulan' and YEAR(i.TANGGAL_LOG_HARIAN) = '$tahun' order By a.NAMA_PENGUSAHA ASC, PREMIUM DESC, DATE_PLAN_GI ASC");
		return $result->result();
	}
	public function getAPMS($depot,$tahun,$bulan)
	{
		$data = $this->db->query("select a.NO_APMS from apms a, kinerja_apms b, log_harian i where b.ID_APMS = a.ID_APMS and i.ID_LOG_HARIAN = b.ID_LOG_HARIAN and i.ID_DEPOT = $depot and MONTH(i.TANGGAL_LOG_HARIAN) = '$bulan' and YEAR(i.TANGGAL_LOG_HARIAN) = '$tahun' group by a.NO_APMS order By a.NAMA_PENGUSAHA ASC, PREMIUM DESC, DATE_PLAN_GI ASC");
        return $data->result();
	}
	public function getRealisasiBiayaAPMS($depot,$tahun,$bulan)
	{
		$data = $this->db->query("select a.NO_APMS,a.NAMA_PENGUSAHA,a.SUPPLY_POINT,a.ALAMAT,a.NAMA_TRANSPORTIR,a.NO_PERJANJIAN,a.TARIF_PATRA_NIAGA,sum(b.SOLAR) as SOLAR,sum(b.PREMIUM) as PREMIUM from apms a, kinerja_apms b, log_harian i where b.ID_APMS = a.ID_APMS and i.ID_LOG_HARIAN = b.ID_LOG_HARIAN and i.ID_DEPOT = $depot and MONTH(i.TANGGAL_LOG_HARIAN) = '$bulan' and YEAR(i.TANGGAL_LOG_HARIAN) = '$tahun' group by a.ID_APMS order By a.NAMA_PENGUSAHA ASC, PREMIUM DESC, DATE_PLAN_GI ASC");
        return $data->result();
	}
	public function selectKPIApms($depot,$tahun,$bulan){
	//	var_dump($depot,$tahun,$bulan);
		$query = $this->db->query("select MONTH(lh.TANGGAL_LOG_HARIAN) as nama_bulan,YEAR(lh.TANGGAL_LOG_HARIAN)as nama_tahun,ka.ID_KPI_APMS, ka.TARGET, ka.BOBOT, ka.REALISASI, ka.SCORE, ka.NORMAL_SCORE, ka.FINAL_SCORE, jka.JENIS_KPI_APMS, jka.ID_JENIS_KPI_APMS, jka.SATUAN, jka.ASPEK, jka.FREKUENSI,jka.KETERANGAN, lh.ID_LOG_HARIAN  from kpi_apms ka, jenis_kpi_apms jka, log_harian lh where ka.ID_JENIS_KPI_APMS = jka.ID_JENIS_KPI_APMS and ka.ID_LOG_HARIAN = lh.ID_LOG_HARIAN and lh.ID_DEPOT = $depot and YEAR(lh.TANGGAL_LOG_HARIAN) = '$tahun' and MONTH(lh.TANGGAL_LOG_HARIAN) = '$bulan' order by jka.ID_JENIS_KPI_APMS ASC");
		//var_dump($bulan);
        return $query->result();
	}
	public function selectDataPengiriman($depot,$tahun,$bulan){
		$query = $this->db->query("select a.NAMA_PENGUSAHA,b.DATE_PLAN_GI, a.NO_APMS, a.ALAMAT, b.NO_DELIVERY, b.DATE_DELIVERY, b.ORDER_NUMBER, b.DATE_ORDER, a.SHIP_TO, b.DESCRIPTION, b.PREMIUM, b.SOLAR, b.DATE_KAPAL_DATANG,b.DATE_KAPAL_BERANGKAT,b.PENGIRIMAN_KAPAL from apms a, kinerja_apms b,log_harian c where a.ID_APMS = b.ID_APMS and b.ID_LOG_HARIAN = c.ID_LOG_HARIAN and a.ID_DEPOT = $depot and MONTH(c.TANGGAL_LOG_HARIAN) = '$bulan' and YEAR(c.TANGGAL_LOG_HARIAN) = '$tahun' order By a.NAMA_PENGUSAHA ASC, b.PREMIUM DESC, b.DATE_PLAN_GI ASC");
		return $query->result();
	}
	public function realisasiAPMS($depot,$tahun,$bulan)
	{
		$query = $this->db->query("select d.NO_APMS, d.NAMA_PENGUSAHA, b.K_PREMIUM, b.K_SOLAR, DAY(c.TANGGAL_LOG_HARIAN) as tanggal, sum(a.PREMIUM) as j_premium, sum(a.SOLAR) as j_solar from kinerja_apms a, rencana_apms b, log_harian c, apms d where a.ID_LOG_HARIAN = c.ID_LOG_HARIAN and a.ID_APMS = d.ID_APMS and b.ID_APMS = d.ID_APMS and d.ID_DEPOT = $depot and MONTH(c.TANGGAL_LOG_HARIAN) = '$bulan' and YEAR(c.TANGGAL_LOG_HARIAN) = '$tahun' group by d.NO_APMS order by d.NO_APMS, j_premium DESC, tanggal ");
		return $query->result();
	}
	public function realisasiAPMS1($depot,$tahun,$bulan)
	{
		$query = $this->db->query("select d.NO_APMS, d.NAMA_PENGUSAHA, b.K_PREMIUM, b.K_SOLAR, DAY(c.TANGGAL_LOG_HARIAN) as tanggal, PREMIUM as j_premium, SOLAR as j_solar from kinerja_apms a, rencana_apms b, log_harian c, apms d where a.ID_LOG_HARIAN = c.ID_LOG_HARIAN and a.ID_APMS = d.ID_APMS and b.ID_APMS = d.ID_APMS and d.ID_DEPOT = $depot and MONTH(c.TANGGAL_LOG_HARIAN) = '$bulan' and YEAR(c.TANGGAL_LOG_HARIAN) = '$tahun' group by d.NO_APMS, a.ID_KINERJA_APMS order by d.NO_APMS, j_premium DESC, tanggal ");
		return $query->result();
	}
    /*
      public function dummy_kinerja_amt($id_kinerja, $id_log_harian, $id_pegawai, $status_tugas, $total_km, $total_kl, $ritase, $pendapatan, $spbu) {
      $query = $this->db->query("insert into kinerja_amt(ID_KINERJA_AMT,ID_LOG_HARIAN,ID_PEGAWAI,STATUS_TUGAS,TOTAL_KM,TOTAL_KL,RITASE_AMT,PENDAPATAN,SPBU) values('$id_kinerja','$id_log_harian','$id_pegawai','$status_tugas','$total_km','$total_kl','$ritase','$pendapatan','$spbu')");
      }

      public function dummy_kinerja_mt($id_kinerja, $id_log_harian, $id_mobil, $ritase, $total_km, $total_kl, $ownuse, $premium, $pertamax, $pertamax_plus, $pertamina_dex, $solar, $biosolar) {
      $query = $this->db->query("insert into kinerja_mt(ID_KINERJA_MT,ID_LOG_HARIAN,ID_MOBIL,RITASE_MT,TOTAL_KM_MT,TOTAL_KL_MT,OWN_USE,PREMIUM,PERTAMAX,PERTAMAX_PLUS,PERTAMINA_DEX,SOLAR,BIO_SOLAR) values('$id_kinerja','$id_log_harian','$id_mobil','$ritase','$total_km','$total_kl','$ownuse','$premium','$pertamax','$pertamax_plus','$pertamina_dex','$solar','$biosolar')");
      } */
}
