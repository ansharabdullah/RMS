<?php

class m_log_harian extends CI_Model {
    
    /*DASHBOARD --- RENISA*/
    //notifikasi pengingat aktivitas yang belum dilkukan
    public function get_log_peringatan()
    {
        $query = $this->db->query("select sum(status_input_kinerja) as input_kinerja,sum(status_ms2) as ms2,sum(status_interpolasi) as interpolasi, sum(status_kpi_operasional_internal) as kpi_operasional , sum(status_kpi_internal) as kpi_internal,sum(status_kpi_oam) as kpi_oam, sum(status_penjadwalan) as jadwal, sum(generate_ba) as ba from log_harian where id_depot = 1 and tanggal_log_harian = curdate()");
        
        return $query->result();
    }
}
?>
