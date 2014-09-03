<?php

class m_kpi extends CI_Model {

    //Dashboard OAM
    public function kpi_pertahun() {
        //kpi tiga tahun terakhir
        //data depot
        $query = $this->db->query('select * from depot where ID_DEPOT > 0');
        $depot = $query->result();
        //data tahun yang ada di tabel kpi
        $query = $this->db->query("select YEAR(lh.TANGGAL_LOG_HARIAN) as tahun from kpi_operasional kp, log_harian lh where kp.ID_LOG_HARIAN = lh.ID_LOG_HARIAN and YEAR(lh.TANGGAL_LOG_HARIAN) > (YEAR(CURDATE()) - 3) group by tahun");
        $tahun = $query->result();
        $arr_tahun= array();
        foreach ($tahun as $dt) {
            array_push($arr_tahun,$dt->tahun);
        }
        $query = $this->db->query("select d.NAMA_DEPOT ,YEAR(lh.TANGGAL_LOG_HARIAN) as tahun ,
                                  (select sum(WEIGHTED_SCORE) from kpi_operasional where id_log_harian = kp.ID_LOG_HARIAN) as total,lh.ID_DEPOT 
                                  from kpi_operasional kp, log_harian lh,depot d 
                                  where d.ID_DEPOT = lh.ID_DEPOT 
                                  and kp.ID_LOG_HARIAN = lh.ID_LOG_HARIAN 
                                  and lh.ID_DEPOT > 0 
                                  and YEAR(lh.TANGGAL_LOG_HARIAN) > (YEAR(CURDATE()) - 3) 
                                  group by tahun,d.ID_DEPOT order by lh.TANGGAL_LOG_HARIAN asc");
        $data = $query->result();

        //mengolah data ke array
        $kpi = array();
        $set = array();
        foreach ($depot as $dp) {
            $set['depot'] = $dp->NAMA_DEPOT;
            $set['id_depot'] = $dp->ID_DEPOT;
            $set['kpi'] = array();
            foreach ($tahun as $th) {
                $jml_bulan = 0;
                $total = 0;
                foreach ($data as $dt) {
                    if ($dt->tahun == $th->tahun && $dt->ID_DEPOT == $dp->ID_DEPOT) {
                        $total += $dt->total;
                        $jml_bulan++;
                    }
                }
                if ($jml_bulan == 0) {
                    $hasil = 0;
                } else {
                    $hasil = $total / $jml_bulan;
                }
                array_push($set['kpi'],$hasil);
            }
            array_push($kpi,$set);
        }
        $result = array();
        $result['tahun'] = $arr_tahun;
        $result['data'] = $kpi;

        return $result;
    }
    
    
    public function kpi_indikator()
    {
        $query = $this->db->get("jenis_kpi_operasional");
        return $query->result();
    }

    public function nilai_kpi_perbulan($id_depot,$tahun) {
        $query = $this->db->query("select d.NAMA_DEPOT as nama_depot, sum(kp.WEIGHTED_SCORE) as total, MONTH(lh.TANGGAL_LOG_HARIAN) as bulan ,
                                    lh.TANGGAL_LOG_HARIAN as tanggal    
                                    from kpi_operasional kp, log_harian lh, depot d 
                                    where lh.ID_LOG_HARIAN = kp.ID_LOG_HARIAN and d.ID_DEPOT = lh.ID_DEPOT
                                    and lh.ID_DEPOT = $id_depot and YEAR(lh.TANGGAL_LOG_HARIAN) = $tahun
                                    group by bulan order by bulan asc");
        
        return $query->result();
    }
    
    public function detail_kpi_perbulan($id_depot,$tahun) {
        $query = $this->db->query("select kp.ID_KPI_OPERASIONAL,kp.ID_LOG_HARIAN,kp.ID_JENIS_KPI_OPERASIONAL,
                                   kp.TARGET,kp.REALISASI,kp.DEVIASI,kp.PERFORMANCE_SCORE,kp.NORMAL_SCORE,jk.JENIS_KPI_OPERASIONAL,
                                   kp.WEIGHTED_SCORE , MONTH(lh.TANGGAL_LOG_HARIAN) as bulan ,lh.TANGGAL_LOG_HARIAN as tanggal
                                   from kpi_operasional kp, log_harian lh ,jenis_kpi_operasional as jk
                                   where lh.ID_LOG_HARIAN = kp.ID_LOG_HARIAN  and jk.ID_JENIS_KPI_OPERASIONAL = kp.ID_JENIS_KPI_OPERASIONAL
                                   and lh.ID_DEPOT = $id_depot and YEAR(lh.TANGGAL_LOG_HARIAN) = $tahun
                                   group by bulan,kp.ID_JENIS_KPI_OPERASIONAL");
        
        return $query->result();
    }

}