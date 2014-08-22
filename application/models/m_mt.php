<?php

class m_mt extends CI_Model {
    
    //Data Mobil Tangki
    public function insertMobil($data) {
        $this->db->insert('mobil', $data);
    }
    
    public function editMT($data, $id) {
        $this->db->where('id_mobil', $id);
        $this->db->update('mobil', $data);
    }

    public function deleteMT($id) {
        $this->db->where('id_mobil', $id);
        $this->db->delete('mobil');
    }
    
    public function selectMT($depot){
        $data = $this->db->query("select * from mobil where (kapasitas='8' or kapasitas='16' or kapasitas='24' or kapasitas='32') and id_depot=$depot");
        return $data->result();
    }
    
     public function detailMT($id_mobil){
        $data = $this->db->query("select * from mobil where (kapasitas='8' or kapasitas='16' or kapasitas='24' or kapasitas='32') and id_mobil=$id_mobil");
        return $data->result();
    }
    
    
    //Data Apar
    public function insertApar($data) {
        $this->db->insert('apar', $data);
    }
    
    public function getApar($id_mobil)
    {
        $query = $this->db->query("select a.ID_APAR,m.NOPOL,m.KAPASITAS,m.PRODUK,a.STORE_PRESSURE,a.CATRIDGE,a.CO2,a.KETERANGAN_APAR,a.STATUS_APAR
                          from apar a, mobil m, depot d 
                          where m.ID_MOBIL = a.ID_MOBIL 
                          and m.ID_MOBIL = 1
                          and m.ID_DEPOT = d.ID_DEPOT 
                          and d.ID_DEPOT = 1 ");
        return $query;
    }
    
    public function selectApar($id_mobil){
        $data = $this->db->query("select a.ID_APAR,m.NOPOL,m.KAPASITAS,m.PRODUK,a.STORE_PRESSURE,a.CATRIDGE,a.CO2,a.KETERANGAN_APAR,a.STATUS_APAR from apar a, mobil m where (m.kapasitas='8' or m.kapasitas='16' or m.kapasitas='24' or m.kapasitas='32') and a.id_mobil=m.id_mobil and m.id_mobil = $id_mobil order by a.STORE_PRESSURE,a.CATRIDGE,a.CO2 DESC");
        return $data->result();
    }
    
     public function editApar($data,$id)
    {
        $this->db->where('id_apar', $id);
        $this->db->update('apar', $data); 
        
    }
    
    public function deleteApar($id) {
        $this->db->where('id_apar', $id);
        $this->db->delete('apar');
    }
    
   
    //Data Ban
    public function selectBanMT($id_mobil){
        $data = $this->db->query("select T.ID_BAN,T.MERK_BAN, T.NO_SERI_BAN,T.JENIS_BAN,T.POSISI_BAN,T.TANGGAL_PASANG,T.TANGGAL_GANTI_BAN,M.nopol,M.kapasitas,M.produk from ban T, mobil M where (M.kapasitas='8' or M.kapasitas='16' or M.kapasitas='24' or M.kapasitas='32') and T.id_mobil=M.id_mobil and M.id_mobil = $id_mobil order by T.POSISI_BAN ASC");
        return $data->result();
    }
    
     public function insertBan($data) {
        $this->db->insert('ban', $data);
    }
    
     public function deleteBan($id) {
        $this->db->where('id_ban', $id);
        $this->db->delete('ban');
    }
    
    //Data Oli
    public function selectOli($id_mobil){
        $data = $this->db->query("select T.ID_OLI,T.MERK_OLI, T.KM_AWAL,T.TANGGAL_GANTI_OLI,T.TOTAL_VOLUME,M.nopol,M.kapasitas,M.produk from oli T, mobil M where (M.kapasitas='8' or M.kapasitas='16' or M.kapasitas='24' or M.kapasitas='32') and T.id_mobil=M.id_mobil and M.id_mobil = $id_mobil order by T.TANGGAL_GANTI_OLI DESC ");
        return $data->result();
    }
    
    public function insertOli($data) {
        $this->db->insert('oli', $data);
    }
    
     public function deleteOli($id) {
        $this->db->where('id_oli', $id);
        $this->db->delete('oli');
    }
    
    
    //Data Surat
    public function selectSurat($id_mobil){
        $data = $this->db->query ("select s.ID_SURAT,m.nopol,m.kapasitas,m.produk,s.TANGGAL_AKHIR_SURAT,s.KETERANGAN_SURAT,j.ID_JENIS_SURAT from mobil m, surat s,jenis_surat j where j.id_jenis_surat=s.id_jenis_surat and s.id_mobil=m.id_mobil and m.id_mobil = $id_mobil and (m.kapasitas='8' or m.kapasitas='16' or m.kapasitas='24' or m.kapasitas='32')");
        return $data->result();           
    }
    
    public function insertSurat($data) {
        $this->db->insert('surat', $data);
    }
    
    public function deleteSurat($id) {
        $this->db->where('id_surat', $id);
        $this->db->delete('surat');
    }
    
}
