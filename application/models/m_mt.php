<?php

class m_mt extends CI_Model {
    
    
    //Import Excel
    
    public function importMobil($data){
        for($i = 0; $i < sizeof($data); $i++){
            $this->db->insert('mobil', $data[$i]);
        }
    }
    
    //Data Mobil Tangki
    public function insertMobil($data) {
        $this->db->insert('mobil', $data);
    }
    
    public function Nopol ()
    {
        $data = $this->db->query("select NOPOL from mobil ");
        return $data->result();
    }

    public function editMT($data, $id) {
        $this->db->where('id_mobil', $id);
        $this->db->update('mobil', $data);
    }

    public function deleteMT($id) {
        $this->db->where('id_mobil', $id);
        $this->db->delete('mobil');
    }
    
    public function selectMobil($id_mobil){
        $data = $this->db->query("select NOPOL,KAPASITAS,PRODUK from mobil where id_mobil=$id_mobil");
        return $data->row();
    }
    
    public function selectMT($depot) {
        $data = $this->db->query("select * from mobil where (kapasitas='8' or kapasitas='16' or kapasitas='24' or kapasitas='32') and id_depot=$depot");
        return $data->result();
    }

    public function detailMT($id_mobil) {
        $data = $this->db->query("select * from mobil where (kapasitas='8' or kapasitas='16' or kapasitas='24' or kapasitas='32') and id_mobil=$id_mobil");
        return $data->result();
    }

    //Data Apar
    public function insertApar($data) {
        $this->db->insert('apar', $data);
    }

    public function getApar($id_mobil) {
        $query = $this->db->query("select a.ID_APAR,m.NOPOL,m.KAPASITAS,m.PRODUK,a.STORE_PRESSURE,a.CATRIDGE,a.CO2,a.KETERANGAN_APAR,a.STATUS_APAR
                          from apar a, mobil m, depot d 
                          where m.ID_MOBIL = a.ID_MOBIL 
                          and m.ID_MOBIL = 1
                          and m.ID_DEPOT = d.ID_DEPOT 
                          and d.ID_DEPOT = 1 ");
        return $query;
    }

    public function selectApar($id_mobil) {
        $data = $this->db->query("select a.ID_APAR,m.NOPOL,m.KAPASITAS,m.PRODUK,a.STORE_PRESSURE,a.CATRIDGE,a.CO2,a.KETERANGAN_APAR,a.STATUS_APAR from apar a, mobil m where (m.kapasitas='8' or m.kapasitas='16' or m.kapasitas='24' or m.kapasitas='32') and a.id_mobil=m.id_mobil and m.id_mobil = $id_mobil order by a.STORE_PRESSURE,a.CATRIDGE,a.CO2 DESC");
        return $data->result();
    }

    public function editApar($data, $id) {
        $this->db->where('id_apar', $id);
        $this->db->update('apar', $data);
    }

    public function deleteApar($id) {
        $this->db->where('id_apar', $id);
        $this->db->delete('apar');
    }

    //Data Ban
    public function selectBanMT($id_mobil) {
        $data = $this->db->query("select T.ID_BAN,T.MERK_BAN, T.NO_SERI_BAN,T.JENIS_BAN,T.POSISI_BAN,T.TANGGAL_PASANG,T.TANGGAL_GANTI_BAN,M.nopol,M.kapasitas,M.produk from ban T, mobil M where (M.kapasitas='8' or M.kapasitas='16' or M.kapasitas='24' or M.kapasitas='32') and T.id_mobil=M.id_mobil and M.id_mobil = $id_mobil order by T.POSISI_BAN ASC");
        return $data->result();
    }

    public function insertBan($data) {
        $this->db->insert('ban', $data);
    }
    
    public function editBan($data, $id) {
        $this->db->where('id_ban', $id);
        $this->db->update('ban', $data);
    }
    
    
    public function insertRencana($data) {
        $this->db->insert('rencana', $data);
    }
    

    public function deleteBan($id) {
        $this->db->where('id_ban', $id);
        $this->db->delete('ban');
    }

    //Data Oli
    public function selectOli($id_mobil) {
        $data = $this->db->query("select T.ID_OLI,T.MERK_OLI, T.KM_AWAL,T.TANGGAL_GANTI_OLI,T.TOTAL_VOLUME,M.nopol,M.kapasitas,M.produk from oli T, mobil M where (M.kapasitas='8' or M.kapasitas='16' or M.kapasitas='24' or M.kapasitas='32') and T.id_mobil=M.id_mobil and M.id_mobil = $id_mobil order by T.TANGGAL_GANTI_OLI DESC ");
        return $data->result();
    }

    public function insertOli($data) {
        $this->db->insert('oli', $data);
    }
    
     public function editOli($data, $id) {
        $this->db->where('id_oli', $id);
        $this->db->update('oli', $data);
    }

    public function deleteOli($id) {
        $this->db->where('id_oli', $id);
        $this->db->delete('oli');
    }

    //Data Surat
    public function selectSurat($id_mobil) {
        $data = $this->db->query("select s.ID_SURAT,m.nopol,m.kapasitas,m.produk,s.TANGGAL_AKHIR_SURAT,s.KETERANGAN_SURAT,j.ID_JENIS_SURAT from mobil m, surat s,jenis_surat j where j.id_jenis_surat=s.id_jenis_surat and s.id_mobil=m.id_mobil and m.id_mobil = $id_mobil and (m.kapasitas='8' or m.kapasitas='16' or m.kapasitas='24' or m.kapasitas='32')");
        return $data->result();
    }

    public function insertSurat($data) {
        $this->db->insert('surat', $data);
    }

     public function editSurat($data, $id) {
        $this->db->where('id_surat', $id);
        $this->db->update('surat', $data);
    }
    
    public function deleteSurat($id) {
        $this->db->where('id_surat', $id);
        $this->db->delete('surat');
    }
    
    //kinerja MT
    public function selectKinerjaMT($id_mobil){
        $data = $this->db->query("select k.id_kinerja_mt,k.total_km_mt,k.ritase_mt,k.total_kl_mt,k.own_use,k.premium,k.pertamax,k.pertamax_plus,k.pertamina_dex,k.solar,k.bio_solar,l.id_log_harian,l.tanggal_log_harian,m.id_mobil,m.nopol,k.premium from kinerja_mt k,mobil m,log_harian l where k.id_log_harian=l.id_log_harian and k.id_mobil=m.id_mobil and m.id_mobil=$id_mobil");
        return $data->result();
    }
    
     public function insertKinerja($data) {
        $this->db->insert('kinerja_mt', $data);
    }
    
    public function editKinerja($data, $id) {
        $this->db->where('id_kinerja_mt', $id);
        $this->db->update('kinerja_mt', $data);
    }
    
    public function deleteKinerja($id) {
        $this->db->where('id_kinerja_mt', $id);
        $this->db->delete('kinerja_mt');
    }
    
    
    //rencana
    public function selectRencana(){
        $data = $this->db->query("select T.ID_RENCANA,L.ID_LOG_HARIAN,L.TANGGAL_LOG_HARIAN, T.R_PREMIUM, T.R_PERTAMAX, T.R_PERTAMAXPLUS, T.R_PERTAMINADEX, T.R_SOLAR, T.R_BIOSOLAR, T.R_OWN_USE from rencana T, log_harian L ");
        return $data->result();
    }
    
    /*     * DASHBOARD --- Renisa* */

    //oam
    public function getAllMt() {
        $data = $this->db->query("select * from mobil");
        return $data;
    }

    public function getTotalMt() {
        return $this->getAllMt()->num_rows();
    }
    
    //penjadwalan
    public function cekNopol($nopol){
        $this->db->where('nopol',$nopol);
        $data = $this->db->get('mobil');
        return $data->result();
    }

    //ss
    public function getAllMtByDepot($id_depot) {
        $data = $this->db->query("select * from mobil where id_depot=$id_depot");
        return $data;
    }

    public function getTotalMtByDepot($id_depot) {
        return $this->getAllMtByDepot($id_depot)->num_rows();
    }

}
