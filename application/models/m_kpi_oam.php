<?php

class m_kpi_oam extends CI_Model {
    /* --RENISA-- */

   //ambil row sesuai log harian dan indikator  kpi
   
   public function get_kpi_internal($log_harian,$indikator)
   {
       $query = $this->db->query("select * from kpi_internal where id_log_harian = $log_harian and id_jenis_kpi_internal = $indikator");
       
       return $query;
   }
    
   public function insert_kpi_internal($data)
   {
       $this->db->insert('kpi_internal', $data);
   }
   
   public function update_kpi_internal($log_harian,$indikator,$data)
   {
       $this->db->where('id_jenis_kpi_internal', $indikator);
        $this->db->where('id_log_harian', $log_harian);
        $this->db->update('kpi_internal', $data);
       
   }
   
   public function get_kpi_internal_tahun($log_harian)
   {
       $query = $this->db->query("select * from kpi_internal where id_log_harian = $log_harian ");
       
       return $query->result();
   }
   
   public function get_kpi_internal_depot($log_harian,$indikator)
   {
       $query = $this->db->query("select * from kpi_internal k, log_harian l,depot d,jenis_kpi_internal jk 
           where d.ID_DEPOT = l.ID_DEPOT 
           and jk.ID_JENIS_KPI_INTERNAL = k.ID_JENIS_KPI_INTERNAL
           and l.ID_LOG_HARIAN = k.ID_LOG_HARIAN 
           and l.TANGGAL_LOG_HARIAN = '$log_harian'
           and k.ID_JENIS_KPI_INTERNAL = $indikator
               order by l.ID_DEPOT ASC");
       
       return $query->result();
   }
   
   public function get_rkap_oam($log_harian,$indikator)
   {
        $query = $this->db->query("select * from kpi_internal k, log_harian l
           where l.ID_LOG_HARIAN = k.ID_LOG_HARIAN 
           and l.TANGGAL_LOG_HARIAN = '$log_harian'
           and k.ID_JENIS_KPI_INTERNAL = $indikator
           and l.ID_DEPOT = -1");
       
       return $query->result();
   }

}

?>
