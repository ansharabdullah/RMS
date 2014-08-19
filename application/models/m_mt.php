<?php

class m_mt extends CI_Model {


    public function editMT($data, $id) {
        $this->db->where('id_mobil', $id);
        $this->db->update('mobil', $data);
    }

    public function deleteMT($data, $id_mobil) {
        $this->db->where('id_mobil', $id_mobil);
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
    
    public function selectApar($id_mobil){
        $data = $this->db->query("select T.store_pressure, T.catridge,T.co2,T.keterangan_apar,T.status_apar,M.nopol,M.kapasitas,M.produk from apar T, mobil M where (M.kapasitas='8' or M.kapasitas='16' or M.kapasitas='24' or M.kapasitas='32') and T.id_mobil=M.id_mobil and M.id_mobil = $id_mobil");
        return $data->result();
    }
    
    public function selectBanMT($id_mobil){
        $data = $this->db->query("select T.MERK_BAN, T.NO_SERI_BAN,T.JENIS_BAN,T.POSISI_BAN,T.TANGGAL_PASANG,T.TANGGAL_GANTI_BAN,M.nopol,M.kapasitas,M.produk from ban T, mobil M where (M.kapasitas='8' or M.kapasitas='16' or M.kapasitas='24' or M.kapasitas='32') and T.id_mobil=M.id_mobil and M.id_mobil = $id_mobil");
        return $data->result();
    }
    
    public function selectOli($id_mobil){
        $data = $this->db->query("select T.MERK_OLI, T.KM_AWAL,T.TANGGAL_GANTI_OLI,T.TOTAL_VOLUME,M.nopol,M.kapasitas,M.produk from oli T, mobil M where (M.kapasitas='8' or M.kapasitas='16' or M.kapasitas='24' or M.kapasitas='32') and T.id_mobil=M.id_mobil and M.id_mobil = $id_mobil ");
        return $data->result();
    }
    
    public function selectSurat($id_mobil){
        $data = $this->db->query ("select m.nopol,m.kapasitas,m.produk,s.tanggal_akhir_surat,s.keterangan_surat,j.id_jenis_surat,j.jenis_surat from mobil m, surat s,jenis_surat j where j.id_jenis_surat=s.id_jenis_surat and s.id_mobil=m.id_mobil and m.id_mobil = $id_mobil and (m.kapasitas='8' or m.kapasitas='16' or m.kapasitas='24' or m.kapasitas='32')");
        return $data->result();
                
    }
}
