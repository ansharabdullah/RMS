<?php

class m_apar extends CI_Model {
    
    public function getAparReminder()
    {
        $query = $this->db->query("select m.NOPOL,DATEDIFF(a.STORE_PRESSURE,now()) as store_pressure,DATEDIFF(a.CATRIDGE,now()) as  catridge,DATEDIFF(a.CO2,now()) as co2 
                          from apar a, mobil m, depot d 
                          where m.ID_MOBIL = a.ID_MOBIL 
                          and m.ID_DEPOT = d.ID_DEPOT 
                          and d.ID_DEPOT = 1 ");
        return $query;
    }
}

?>