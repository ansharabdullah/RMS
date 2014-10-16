<?php

class m_kpi extends CI_Model {

    //Dashboard OAM
//    public function kpi_pertahun() {
//        //kpi tiga tahun terakhir
//        //data depot
//        $query = $this->db->query('select * from depot where ID_DEPOT > 0');
//        $depot = $query->result();
//        //data tahun yang ada di tabel kpi
//        $query = $this->db->query("select YEAR(lh.TANGGAL_LOG_HARIAN) as tahun from kpi_operasional kp, log_harian lh where kp.ID_LOG_HARIAN = lh.ID_LOG_HARIAN and YEAR(lh.TANGGAL_LOG_HARIAN) > (YEAR(CURDATE()) - 3) group by tahun");
//        $tahun = $query->result();
//        $arr_tahun= array();
//        foreach ($tahun as $dt) {
//            array_push($arr_tahun,$dt->tahun);
//        }
//        $query = $this->db->query("select d.NAMA_DEPOT ,YEAR(lh.TANGGAL_LOG_HARIAN) as tahun ,
//                                  (select sum(WEIGHTED_SCORE) from kpi_operasional where id_log_harian = kp.ID_LOG_HARIAN) as total,lh.ID_DEPOT 
//                                  from kpi_operasional kp, log_harian lh,depot d 
//                                  where d.ID_DEPOT = lh.ID_DEPOT 
//                                  and kp.ID_LOG_HARIAN = lh.ID_LOG_HARIAN 
//                                  and lh.ID_DEPOT > 0 
//                                  and YEAR(lh.TANGGAL_LOG_HARIAN) > (YEAR(CURDATE()) - 3) 
//                                  group by tahun,d.ID_DEPOT order by lh.TANGGAL_LOG_HARIAN asc");
//        $data = $query->result();
//
//        //mengolah data ke array
//        $kpi = array();
//        $set = array();
//        foreach ($depot as $dp) {
//            $set['depot'] = $dp->NAMA_DEPOT;
//            $set['id_depot'] = $dp->ID_DEPOT;
//            $set['kpi'] = array();
//            foreach ($tahun as $th) {
//                $jml_bulan = 0;
//                $total = 0;
//                foreach ($data as $dt) {
//                    if ($dt->tahun == $th->tahun && $dt->ID_DEPOT == $dp->ID_DEPOT) {
//                        $total += $dt->total;
//                        $jml_bulan++;
//                    }
//                }
//                if ($jml_bulan == 0) {
//                    $hasil = 0;
//                } else {
//                    $hasil = $total / $jml_bulan;
//                }
//                array_push($set['kpi'],$hasil);
//            }
//            array_push($kpi,$set);
//        }
//        $result = array();
//        $result['tahun'] = $arr_tahun;
//        $result['data'] = $kpi;
//
//        return $result;
//    }
    public function kpi_pertahun()
    {
        $query = $this->db->query("select *,YEAR(lh.TANGGAL_LOG_HARIAN) as tahun,ROUND(AVG(n.NILAI),1) as rata_rata 
                                   from nilai n, jenis_penilaian jp , depot d , log_harian lh 
                                   where n.ID_JENIS_PENILAIAN = jp.ID_JENIS_PENILAIAN and d.ID_DEPOT = lh.ID_DEPOT
                                   and n.ID_LOG_HARIAN = lh.ID_LOG_HARIAN and n.ID_JENIS_PENILAIAN = 72
                                   and YEAR(lh.TANGGAL_LOG_HARIAN) <= YEAR(CURDATE()) and YEAR(lh.TANGGAL_LOG_HARIAN) >= YEAR(CURDATE()) - 2
                                   group by d.ID_DEPOT,YEAR(lh.TANGGAL_LOG_HARIAN) order by d.ID_DEPOT asc");
         return $query->result();
    }
    
    public function kpi_indikator()
    {
        $query = $this->db->get("jenis_kpi_operasional");
        return $query->result();
    }

    public function nilai_kpi_perbulan($id_depot,$tahun) {
        $query = $this->db->query("select d.NAMA_DEPOT as nama_depot, ROUND(n.NILAI,1) as total, MONTH(lh.TANGGAL_LOG_HARIAN) as bulan ,
                                    lh.TANGGAL_LOG_HARIAN as tanggal    
                                    from kpi_operasional kp, log_harian lh, depot d,nilai n 
                                    where lh.ID_LOG_HARIAN = kp.ID_LOG_HARIAN and d.ID_DEPOT = lh.ID_DEPOT
                                    and n.ID_LOG_HARIAN = lh.ID_LOG_HARIAN and n.ID_JENIS_PENILAIAN = 72
                                    and lh.ID_DEPOT = $id_depot and YEAR(lh.TANGGAL_LOG_HARIAN) = $tahun
                                    group by bulan order by bulan asc");
        
        return $query->result();
    }
    
    public function detail_kpi_perbulan($id_depot,$tahun) {
        $query = $this->db->query("select kp.ID_KPI_OPERASIONAL,kp.ID_LOG_HARIAN,kp.ID_JENIS_KPI_OPERASIONAL,
                                   ROUND(kp.TARGET,1)as TARGET,ROUND(kp.REALISASI,1) as REALISASI,ROUND(kp.DEVIASI,1) as DEVIASI,ROUND(kp.PERFORMANCE_SCORE,1) as PERFORMANCE_SCORE,
                                   ROUND(kp.NORMAL_SCORE,1) as NORMAL_SCORE,jk.JENIS_KPI_OPERASIONAL,
                                   ROUND(kp.WEIGHTED_SCORE,1) as WEIGHTED_SCORE , MONTH(lh.TANGGAL_LOG_HARIAN) as bulan ,lh.TANGGAL_LOG_HARIAN as tanggal
                                   from kpi_operasional kp, log_harian lh ,jenis_kpi_operasional as jk
                                   where lh.ID_LOG_HARIAN = kp.ID_LOG_HARIAN  and jk.ID_JENIS_KPI_OPERASIONAL = kp.ID_JENIS_KPI_OPERASIONAL
                                   and lh.ID_DEPOT = $id_depot and YEAR(lh.TANGGAL_LOG_HARIAN) = $tahun
                                   group by bulan,kp.ID_JENIS_KPI_OPERASIONAL");
        
        return $query->result();
    }
    
    public function performance_kpi_perbulan($id_depot,$bulan,$tahun)
    {
        $query = $this->db->query("select * from depot d, kpi_operasional ko , log_harian lh,jenis_kpi_operasional as jk 
                                    where jk.ID_JENIS_KPI_OPERASIONAL = ko.ID_JENIS_KPI_OPERASIONAL 
                                    and lh.ID_LOG_HARIAN = ko.ID_LOG_HARIAN and lh.ID_DEPOT = d.ID_DEPOT
                                    and MONTH(lh.TANGGAL_LOG_HARIAN) = $bulan and
                                    YEAR(lh.TANGGAL_LOG_HARIAN) = $tahun and lh.ID_DEPOT = $id_depot ");
        
        return $query->result();
        
    }
    
    
    public function ms2_oam($id_depot,$bulan,$tahun)
    {
        $query = $this->db->query("select *,DAY(lh.TANGGAL_LOG_HARIAN) as tanggal 
                                    from ms2 ,log_harian lh 
                                    where ms2.ID_LOG_HARIAN = lh.ID_LOG_HARIAN 
                                    and MONTH(lh.TANGGAL_LOG_HARIAN) = $bulan 
                                    and YEAR(lh.TANGGAL_LOG_HARIAN) = $tahun and lh.ID_DEPOT = $id_depot");
        
        return $query->result();
        
    }
    
    public function volume_realisasi_oam($id_depot,$bulan,$tahun)
    {
         $query = $this->db->query("select *,sum(RITASE_MT) as ritase,sum(TOTAL_KM_MT) as km,sum(TOTAL_KL_MT) as kl,
                                     sum(OWN_USE) as own_use,sum(PREMIUM) as premium,sum(PERTAMAX) as pertamax,
                                     sum(PERTAMAX_PLUS) as pertamax_plus,sum(PERTAMINA_DEX) as pertamina_dex,
                                     sum(SOLAR) as solar,sum(BIO_SOLAR) as bio_solar, DAY(lh.TANGGAL_LOG_HARIAN) as tanggal 
                                     from kinerja_mt km, rencana r, log_harian lh ,depot d
                                     where lh.ID_LOG_HARIAN = km.ID_LOG_HARIAN and km.ID_LOG_HARIAN = r.ID_LOG_HARIAN 
                                     and MONTH(lh.TANGGAL_LOG_HARIAN) = $bulan 
                                     and YEAR(lh.TANGGAL_LOG_HARIAN) = $tahun 
                                     and lh.ID_DEPOT = d.ID_DEPOT
                                     and lh.ID_DEPOT = $id_depot
                                     group by tanggal");
        
        return $query->result();
    }
    
    public function realisasi_volume_triwulan($tahun,$bulan)
    {
        $akhir = $bulan + 3;
        $query = $this->db->query("select kp.ID_KPI_OPERASIONAL,kp.TARGET,
                                    kp.REALISASI,kp.DEVIASI,kp.PERFORMANCE_SCORE as nilai,kp.NORMAL_SCORE,
                                    lh.ID_DEPOT,MONTHNAME(lh.TANGGAL_LOG_HARIAN) as nama_bulan,
                                   kp.WEIGHTED_SCORE , MONTH(lh.TANGGAL_LOG_HARIAN) as bulan ,lh.TANGGAL_LOG_HARIAN as tanggal
                                   from kpi_operasional kp, log_harian lh 
                                   where lh.ID_LOG_HARIAN = kp.ID_LOG_HARIAN
                                   and MONTH(lh.TANGGAL_LOG_HARIAN) >= $bulan and MONTH(lh.TANGGAL_LOG_HARIAN) < $akhir 
                                    and lh.ID_DEPOT > 0 
                                    and YEAR(lh.TANGGAL_LOG_HARIAN) = $tahun
                                   and kp.ID_JENIS_KPI_OPERASIONAL = 2");
        
        return $query->result();
    }
    
    public function realisasi_volume_triwulan_depot($bulan,$depot)
    {
        $tahun = date('Y');
        $akhir = $bulan + 3;
        $query = $this->db->query("select kp.ID_KPI_OPERASIONAL,kp.TARGET,
                                    kp.REALISASI,kp.DEVIASI,kp.PERFORMANCE_SCORE as nilai,kp.NORMAL_SCORE,
                                    lh.ID_DEPOT,MONTHNAME(lh.TANGGAL_LOG_HARIAN) as nama_bulan,
                                   kp.WEIGHTED_SCORE , MONTH(lh.TANGGAL_LOG_HARIAN) as bulan ,lh.TANGGAL_LOG_HARIAN as tanggal
                                   from kpi_operasional kp, log_harian lh 
                                   where lh.ID_LOG_HARIAN = kp.ID_LOG_HARIAN
                                   and MONTH(lh.TANGGAL_LOG_HARIAN) >= $bulan and MONTH(lh.TANGGAL_LOG_HARIAN) < $akhir 
                                    and lh.ID_DEPOT = $depot 
                                    and YEAR(lh.TANGGAL_LOG_HARIAN) = $tahun
                                   and kp.ID_JENIS_KPI_OPERASIONAL = 2");
        
        return $query->result();
    }
    
     public function realisasi_ms2_triwulan($tahun,$bulan)
    {
        $akhir = $bulan + 3;
        $query = $this->db->query("select kp.ID_KPI_OPERASIONAL,kp.TARGET,
                                    kp.REALISASI,kp.DEVIASI,kp.PERFORMANCE_SCORE as nilai,kp.NORMAL_SCORE,
                                    lh.ID_DEPOT,MONTHNAME(lh.TANGGAL_LOG_HARIAN) as nama_bulan,
                                   kp.WEIGHTED_SCORE , MONTH(lh.TANGGAL_LOG_HARIAN) as bulan ,lh.TANGGAL_LOG_HARIAN as tanggal
                                   from kpi_operasional kp, log_harian lh 
                                   where lh.ID_LOG_HARIAN = kp.ID_LOG_HARIAN
                                   and MONTH(lh.TANGGAL_LOG_HARIAN) >= $bulan and MONTH(lh.TANGGAL_LOG_HARIAN) < $akhir 
                                    and lh.ID_DEPOT > 0 
                                    and YEAR(lh.TANGGAL_LOG_HARIAN) = $tahun
                                   and kp.ID_JENIS_KPI_OPERASIONAL = 1");
        
        return $query->result();
    }
    
     public function realisasi_ms2_triwulan_depot($bulan,$depot)
    {
        $tahun = date('Y');
        $akhir = $bulan + 3;
        $query = $this->db->query("select kp.ID_KPI_OPERASIONAL,kp.TARGET,
                                    kp.REALISASI,kp.DEVIASI,kp.PERFORMANCE_SCORE as nilai,kp.NORMAL_SCORE,
                                    lh.ID_DEPOT,MONTHNAME(lh.TANGGAL_LOG_HARIAN) as nama_bulan,
                                   kp.WEIGHTED_SCORE , MONTH(lh.TANGGAL_LOG_HARIAN) as bulan ,lh.TANGGAL_LOG_HARIAN as tanggal
                                   from kpi_operasional kp, log_harian lh 
                                   where lh.ID_LOG_HARIAN = kp.ID_LOG_HARIAN
                                   and MONTH(lh.TANGGAL_LOG_HARIAN) >= $bulan and MONTH(lh.TANGGAL_LOG_HARIAN) < $akhir 
                                    and lh.ID_DEPOT = $depot 
                                    and YEAR(lh.TANGGAL_LOG_HARIAN) = $tahun
                                   and kp.ID_JENIS_KPI_OPERASIONAL = 1");
        
        return $query->result();
    }
    
    public function kpi_triwulan($tahun,$bulan)
    {
        $akhir = $bulan + 3;
        $query = $this->db->query("select d.ID_DEPOT , n.ID_NILAI,d.NAMA_DEPOT, MONTHNAME(lh.TANGGAL_LOG_HARIAN) as nama_bulan, 
                                    MONTH(lh.TANGGAL_LOG_HARIAN) as bulan, n.NILAI as nilai 
                                    from nilai n,log_harian lh,depot d 
                                    where n.id_jenis_penilaian = 72 and lh.ID_DEPOT > 0
                                    and d.ID_DEPOT = lh.ID_DEPOT and lh.ID_LOG_HARIAN = n.ID_LOG_HARIAN 
                                    and MONTH(lh.TANGGAL_LOG_HARIAN) >= $bulan and MONTH(lh.TANGGAL_LOG_HARIAN) < $akhir
                                    and YEAR(lh.TANGGAL_LOG_HARIAN) = $tahun group by d.ID_DEPOT,bulan");
        
        return $query->result();
        
    }
    
     public function kpi_triwulan_depot($bulan,$depot)
    {
        $tahun = date('Y');
        $akhir = $bulan + 3;
        $query = $this->db->query("select d.ID_DEPOT , n.ID_NILAI,d.NAMA_DEPOT, MONTHNAME(lh.TANGGAL_LOG_HARIAN) as nama_bulan, 
                                    MONTH(lh.TANGGAL_LOG_HARIAN) as bulan, n.NILAI as nilai 
                                    from nilai n,log_harian lh,depot d 
                                    where n.id_jenis_penilaian = 72 and lh.ID_DEPOT = $depot
                                    and d.ID_DEPOT = lh.ID_DEPOT and lh.ID_LOG_HARIAN = n.ID_LOG_HARIAN 
                                    and MONTH(lh.TANGGAL_LOG_HARIAN) >= $bulan and MONTH(lh.TANGGAL_LOG_HARIAN) < $akhir
                                    and YEAR(lh.TANGGAL_LOG_HARIAN) = $tahun group by d.ID_DEPOT,bulan");
        
        return $query->result();
        
    }
    
    
    /*****KPI APMS******/
    
     public function nilai_kpi_apms_perbulan($id_depot,$tahun) {
        $query = $this->db->query("select d.NAMA_DEPOT as nama_depot, sum(kp.FINAL_SCORE) as total, MONTH(lh.TANGGAL_LOG_HARIAN) as bulan ,
                                    lh.TANGGAL_LOG_HARIAN as tanggal    
                                    from kpi_apms kp, log_harian lh, depot d 
                                    where lh.ID_LOG_HARIAN = kp.ID_LOG_HARIAN and d.ID_DEPOT = lh.ID_DEPOT
                                    and lh.ID_DEPOT = $id_depot and YEAR(lh.TANGGAL_LOG_HARIAN) = $tahun
                                    group by bulan order by bulan asc");
        
        return $query->result();
    }
    
    public function get_kpi_apms_bulanan($id_depot,$tahun)
    {
        $query = $this->db->query("select * from kpi_apms ka,jenis_kpi_apms jk,log_harian lh 
                                    where jk.ID_JENIS_KPI_APMS = ka.ID_JENIS_KPI_APMS 
                                    and lh.ID_LOG_HARIAN = ka.ID_LOG_HARIAN
                                    and year(lh.TANGGAL_LOG_HARIAN) = $tahun 
                                    and lh.ID_DEPOT = $id_depot 
                                    order by month(lh.TANGGAL_LOG_HARIAN),ka.ID_JENIS_KPI_APMS asc");
        return $query->result();
    }
    
     public function get_kpi_apms_tahunan()
    {
        $query = $this->db->query("select *,YEAR(lh.TANGGAL_LOG_HARIAN) as tahun,ROUND(AVG(n.NILAI),1) as rata_rata 
                                   from nilai n, jenis_penilaian jp , depot d , log_harian lh 
                                   where n.ID_JENIS_PENILAIAN = jp.ID_JENIS_PENILAIAN and d.ID_DEPOT = lh.ID_DEPOT
                                   and n.ID_LOG_HARIAN = lh.ID_LOG_HARIAN and n.ID_JENIS_PENILAIAN = 73
                                   and d.STATUS_APMS = 1 and YEAR(lh.TANGGAL_LOG_HARIAN) <= YEAR(CURDATE()) and YEAR(lh.TANGGAL_LOG_HARIAN) >= YEAR(CURDATE()) - 2
                                   group by d.ID_DEPOT,YEAR(lh.TANGGAL_LOG_HARIAN) order by d.ID_DEPOT asc");
         return $query->result();
    }

}