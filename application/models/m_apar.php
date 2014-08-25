<?php

class m_apar extends CI_Model {
    
    public function getAparReminder()
    {
        $query = $this->db->query("select a.ID_APAR,m.NOPOL,a.STATUS_APAR,DATEDIFF(a.STORE_PRESSURE,now()) as store_pressure,DATEDIFF(a.CATRIDGE,now()) as  catridge,DATEDIFF(a.CO2,now()) as co2,
                            a.STORE_PRESSURE as tgl_store,a.CATRIDGE as tgl_catridge,a.CO2 as tgl_co2
                          from apar a, mobil m, depot d 
                          where m.ID_MOBIL = a.ID_MOBIL 
                          and m.ID_DEPOT = d.ID_DEPOT 
                          and d.ID_DEPOT = 1 ");
        return $query;
    }
    
    public function editReminderApar($id,$data)
    {
        $this->db->where('ID_APAR', $id);
        $this->db->update('apar', $data); 
        
    }
}

?>