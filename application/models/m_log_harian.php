<?php

class m_log_harian extends CI_Model {
    
    /*DASHBOARD --- RENISA*/
    //notifikasi pengingat aktivitas yang belum dilkukan
    public function get_log_peringatan($id_depot)
    {
        $query = $this->db->query("select d.ID_DEPOT , d.NAMA_DEPOT, sum(lh.status_input_kinerja) as input_kinerja,sum(lh.status_ms2) as ms2,sum(lh.status_interpolasi) as interpolasi, 
                                    sum(lh.status_kpi_operasional_internal) as kpi_operasional , sum(lh.status_kpi_internal) as kpi_internal,
                                    sum(lh.status_kpi_oam) as kpi_oam, sum(lh.status_penjadwalan) as jadwal, sum(lh.generate_ba) as ba,
                                    lh.TANGGAL_LOG_HARIAN as tanggal
                                    from log_harian lh, depot d 
                                    where lh.ID_DEPOT = d.ID_DEPOT and d.ID_DEPOT = $id_depot
                                    group by lh.ID_DEPOT,lh.TANGGAL_LOG_HARIAN order by d.ID_DEPOT,tanggal asc");
        
        return $query->result();
    }
    
    //notifikasi pengingat aktivitas yang belum dilakukan untuk oam
    public function get_log_peringatan_oam()
    {
        $query = $this->db->query("select d.ID_DEPOT , d.NAMA_DEPOT, sum(lh.status_input_kinerja) as input_kinerja,sum(lh.status_ms2) as ms2,sum(lh.status_interpolasi) as interpolasi, 
                                    sum(lh.status_kpi_operasional_internal) as kpi_operasional , sum(lh.status_kpi_internal) as kpi_internal,
                                    sum(lh.status_kpi_oam) as kpi_oam, sum(lh.status_penjadwalan) as jadwal, sum(lh.generate_ba) as ba,
                                    lh.TANGGAL_LOG_HARIAN as tanggal
                                    from log_harian lh, depot d 
                                    where lh.ID_DEPOT = d.ID_DEPOT 
                                    group by lh.ID_DEPOT,lh.TANGGAL_LOG_HARIAN order by d.ID_DEPOT,tanggal asc");
        return $query->result();
    }
    
    
    //box peringatan di SS
    public function generate_peringatan_bulanan($id_depot,$bulan,$tahun)
    {
        /*
         * Input kinerja mt dan amt(perhari)
         * input ms2 (perbulan)
         * input interpolasi tgl 1
         * interpolasi tgl 15
         * kpi operasional (perbulan)
         * kpi internal (perbulan)
         * Penjadwalan (sebulaneun)
         * generate ba (akhir bulan)
         */
        
        $data = array();
        
        //cek kinerja mt
        
        //cek kinerja amt
        
        //cek ms2
        
        //cek interpolasi
        
        //cek operasional
        
        //cek internal
        
        //cek penjadwalan
        
        //cek generate ba
        
    }
    
    public function cekTanggal($tanggal, $depot){
        $this->db->where('tanggal_log_harian', $tanggal);
        $this->db->where('id_depot', $depot);
        $data = $this->db->get('log_harian');
        return $data->result();
    }
}
?>
