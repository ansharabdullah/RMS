<?php

class m_internal extends CI_Model {
    /* --RENISA-- */

 //kpi internal ss
   
   public function get_kpi_internal_depot($log_harian,$indikator,$depot)
   {
       $query = $this->db->query("select * from kpi_internal k, log_harian l
           where l.id_depot = $depot
           and l.ID_LOG_HARIAN = k.ID_LOG_HARIAN 
           and l.TANGGAL_LOG_HARIAN = '$log_harian'
           and k.ID_JENIS_KPI_INTERNAL = $indikator");
       
       return $query->result();
   }
   
}

?>
