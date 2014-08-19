<?php

class m_mt extends CI_Model {


    public function editMT($data, $id) {
        $this->db->where('id_mobil', $id);
        $this->db->update('mobil', $data);
    }

    public function deleteMT($data, $id) {
        $this->db->where('id_mobil', $id);
        $this->db->delete('mobil');
    }
    
    public function selectMT($depot){
        $data = $this->db->query("select * from mobil where id_depot=$depot");
        return $data->result();
    }
    
    public function detailMT($id_mobil){
        $data = $this->db->query("select * from mobil where id_mobil=$id_mobil");
        return $data->result();
    }
    
    public function selectApar($id_mobil){
        $data = $this->db->query("select T.store_pressure, T.catridge,T.co2,T.keterangan_apar,T.status_apar,M.nopol,M.kapasitas,M.produk from apar T, mobil M where T.id_mobil=M.id_mobil ");
        return $data->result();
    }
    
    public function selectBanMT($id_mobil){
        $data = $this->db->query("select T.MERK_BAN, T.NO_SERI_BAN,T.JENIS_BAN,T.POSISI_BAN,T.TANGGAL_PASANG,T.TANGGAL_GANTI_BAN,M.nopol,M.kapasitas,M.produk from ban T, mobil M where T.id_mobil=M.id_mobil ");
        return $data->result();
    }
    
    public function selectOli($id_mobil){
        $data = $this->db->query("select T.MERK_OLI, T.KM_AWAL,T.TANGGAL_GANTI_OLI,T.TOTAL_VOLUME,M.nopol,M.kapasitas,M.produk from oli T, mobil M where T.id_mobil=M.id_mobil ");
        return $data->result();
    }
    
    
}
