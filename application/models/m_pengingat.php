<?php

class m_pengingat extends CI_Model {
    
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
    
    public function getSuratReminder()
    {
        $query = $this->db->query("select a.ID_SURAT,m.NOPOL,a.KETERANGAN_SURAT,j.ID_JENIS_SURAT,DATEDIFF(a.TANGGAL_AKHIR_SURAT,now()) as tanggal_akhir_surat,
                            a.TANGGAL_AKHIR_SURAT as tgl_surat
                          from surat a,jenis_surat j, mobil m, depot d 
                          where j.id_jenis_surat=a.id_jenis_surat 
                          and m.ID_MOBIL = a.ID_MOBIL 
                          and m.ID_DEPOT = d.ID_DEPOT 
                          and d.ID_DEPOT = 1 ");
        return $query;
    }
    
    public function editReminderSurat($id,$data)
    {
        $this->db->where('ID_SURAT', $id);
        $this->db->update('surat', $data); 
        
    }
    
}

?>