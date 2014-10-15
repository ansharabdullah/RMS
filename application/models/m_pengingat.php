
<?php

class m_pengingat extends CI_Model {
    
    public function getAparReminder($depot)
    {
        $query = $this->db->query("select a.ID_APAR,m.ID_MOBIL,m.NOPOL,a.ID_JENIS_APAR,a.KETERANGAN_APAR,DATEDIFF(a.TANGGAL_APAR,now()) as tanggal_apar,
                            a.TANGGAL_APAR as tgl_apar
                          from apar a, mobil m, depot d 
                          where TANGGAL_APAR IN (select MAX(TANGGAL_APAR)from apar group by ID_MOBIL) 
			  and m.ID_MOBIL = a.ID_MOBIL 
                          and m.ID_DEPOT = d.ID_DEPOT 
                          and d.ID_DEPOT = $depot order by m.ID_MOBIL");
        return $query;
    }
    
    public function editReminderApar($data)
    {
        $this->db->insert('apar', $data);
        
    }
    
    public function getSuratReminder($depot)
    {
        $query = $this->db->query("select a.ID_SURAT,a.ID_MOBIL,m.NOPOL as suratnopol,a.KETERANGAN_SURAT,j.ID_JENIS_SURAT,DATEDIFF(a.TANGGAL_AKHIR_SURAT,now()) as tanggal_akhir_surat,
                            a.TANGGAL_AKHIR_SURAT as tgl_surat
                          from surat a,jenis_surat j, mobil m, depot d 
                          where TANGGAL_AKHIR_SURAT IN (select MAX(TANGGAL_AKHIR_SURAT)from surat group by ID_MOBIL)
                          and j.id_jenis_surat=a.id_jenis_surat 
                          and m.ID_MOBIL = a.ID_MOBIL 
                          and m.ID_DEPOT = d.ID_DEPOT 
                          and d.ID_DEPOT = $depot ");
        return $query;
    }
    
    
    public function editReminderSurat($data)
    {
        $this->db->insert('surat', $data);
        
    }
    
    public function getBanReminder($depot)
    {
        $query = $this->db->query("select a.ID_BAN,a.ID_MOBIL,m.NOPOL as bannopol,a.POSISI_BAN,a.MERK_BAN,a.NO_SERI_BAN,a.JENIS_BAN,DATEDIFF(a.TANGGAL_GANTI_BAN,now()) as tanggal_ban,
                            a.TANGGAL_GANTI_BAN as tgl_ganti
                          from ban a, mobil m, depot d 
                          where TANGGAL_GANTI_BAN IN (select MAX(TANGGAL_GANTI_BAN)from ban group by ID_MOBIL)
                          and m.ID_MOBIL = a.ID_MOBIL 
                          and m.ID_DEPOT = d.ID_DEPOT 
                          and d.ID_DEPOT = $depot ");
        return $query;
    }
    
    public function mobil($depot){
        $query = $this->db->query("select nopol, ID_MOBIL from mobil where id_depot='$depot' order by ID_MOBIL ASC");
        return $query;
    }
    
    public function editReminderBan($data)
    {
       $this->db->insert('ban', $data);
        
    }
    
    public function getOliReminder($depot)
    {
        $query = $this->db->query("select a.ID_OLI,a.ID_MOBIL,m.NOPOL as olinopol,a.KM_AWAL,a.MERK_OLI,a.TOTAL_VOLUME,DATEDIFF(a.TANGGAL_GANTI_OLI,now()) as tanggal_ganti_oli,
                            a.TANGGAL_GANTI_OLI as tgl_oli
                          from oli a, mobil m, depot d 
                          where TANGGAL_GANTI_OLI IN (select MAX(TANGGAL_GANTI_OLI)from oli group by ID_MOBIL)
                          and m.ID_MOBIL = a.ID_MOBIL 
                          and m.ID_DEPOT = d.ID_DEPOT 
                          and d.ID_DEPOT = $depot ");
        return $query;
    }
    
    public function editReminderOli($data)
    {
        $this->db->insert('oli', $data);
        
    }
    
}

?>