
<?php

class m_pengingat extends CI_Model {
    
    public function getAparReminder($depot)
    {
        $query = $this->db->query("select a.ID_APAR,m.NOPOL,a.STATUS_APAR,DATEDIFF(a.STORE_PRESSURE,now()) as store_pressure,DATEDIFF(a.CATRIDGE,now()) as  catridge,DATEDIFF(a.CO2,now()) as co2,
                            a.STORE_PRESSURE as tgl_store,a.CATRIDGE as tgl_catridge,a.CO2 as tgl_co2
                          from apar a, mobil m, depot d 
                          where m.ID_MOBIL = a.ID_MOBIL 
                          and m.ID_DEPOT = d.ID_DEPOT 
                          and d.ID_DEPOT = $depot ");
        return $query;
    }
    
    public function editReminderApar($id,$data)
    {
        $this->db->where('ID_APAR', $id);
        $this->db->update('apar', $data); 
        
    }
    
    public function getSuratReminder($depot)
    {
        $query = $this->db->query("select a.ID_SURAT,m.NOPOL,a.KETERANGAN_SURAT,j.ID_JENIS_SURAT,DATEDIFF(a.TANGGAL_AKHIR_SURAT,now()) as tanggal_akhir_surat,
                            a.TANGGAL_AKHIR_SURAT as tgl_surat
                          from surat a,jenis_surat j, mobil m, depot d 
                          where j.id_jenis_surat=a.id_jenis_surat 
                          and m.ID_MOBIL = a.ID_MOBIL 
                          and m.ID_DEPOT = d.ID_DEPOT 
                          and d.ID_DEPOT = $depot ");
        return $query;
    }
    
    public function editReminderSurat($id,$data)
    {
        $this->db->where('ID_SURAT', $id);
        $this->db->update('surat', $data); 
        
    }
    
    public function getBanReminder($depot)
    {
        $query = $this->db->query("select a.ID_BAN,m.NOPOL,a.POSISI_BAN,a.MERK_BAN,a.NO_SERI_BAN,a.JENIS_BAN,DATEDIFF(a.TANGGAL_PASANG,a.TANGGAL_GANTI_BAN) as tanggal_ban,
                            a.TANGGAL_PASANG as tgl_pasang,a.TANGGAL_GANTI_BAN as tgl_ganti
                          from ban a, mobil m, depot d 
                          where m.ID_MOBIL = a.ID_MOBIL 
                          and m.ID_DEPOT = d.ID_DEPOT 
                          and d.ID_DEPOT = $depot ");
        return $query;
    }
    
    public function editReminderBan($id,$data)
    {
        $this->db->where('ID_BAN', $id);
        $this->db->update('ban', $data); 
        
    }
    
    public function getOliReminder($depot)
    {
        $query = $this->db->query("select a.ID_OLI,m.NOPOL,a.KM_AWAL,a.MERK_OLI,a.TOTAL_VOLUME,DATEDIFF(a.TANGGAL_GANTI_OLI,now()) as tanggal_ganti_oli,
                            a.TANGGAL_GANTI_OLI as tgl_oli
                          from oli a, mobil m, depot d 
                          where m.ID_MOBIL = a.ID_MOBIL 
                          and m.ID_DEPOT = d.ID_DEPOT 
                          and d.ID_DEPOT = $depot ");
        return $query;
    }
    
    public function editReminderOli($id,$data)
    {
        $this->db->where('ID_OLI', $id);
        $this->db->update('oli', $data); 
        
    }
    
}

?>