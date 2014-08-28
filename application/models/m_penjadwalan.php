<?php

class m_penjadwalan extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
    function getJadwal($depot, $tanggal){
        $data = $this->db->query("SELECT P.ID_PEGAWAI, L.ID_LOG_HARIAN, J.ID_JADWAL, M.ID_MOBIL, P.NIP, P.NAMA_PEGAWAI, P.JABATAN, J.STATUS_MASUK, L.TANGGAL_LOG_HARIAN, M.NOPOL from pegawai P, jadwal J, log_harian L, mobil M where P.id_pegawai=J.id_pegawai and J.id_log_harian=L.id_log_harian and J.id_mobil=M.id_mobil and P.ID_DEPOT=$depot and l.tanggal_log_harian='$tanggal'");
        return $data->result();
    }
    
    function insertjadwal($data){
        $this->db->insert('jadwal',$data);
    }
    
    function updateJadwal($data, $id){
        $this->db->where('id_jadwal', $id);
        $this->db->update('jadwal',$data);
    }
    
    function deleteJadwal($data, $id){
        $this->db->where('id_jadwal', $id);
        $this->db->delete('jadwal');
    }
    
    public function importJadwal($data){
        for($i = 0; $i < sizeof($data); $i++){
            $this->db->insert('jadwal', $data[$i]);
        }
    }
    
}