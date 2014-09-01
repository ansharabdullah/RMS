<?php

class m_penjadwalan extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getJadwal($depot, $tanggal) {
        $data = $this->db->query("SELECT P.ID_PEGAWAI, L.ID_LOG_HARIAN, J.ID_JADWAL, M.ID_MOBIL, P.NIP, P.NAMA_PEGAWAI, P.JABATAN, J.STATUS_MASUK, L.TANGGAL_LOG_HARIAN, M.NOPOL from pegawai P, jadwal J, log_harian L, mobil M where P.id_pegawai=J.id_pegawai and J.id_log_harian=L.id_log_harian and J.id_mobil=M.id_mobil and P.ID_DEPOT=$depot and l.tanggal_log_harian='$tanggal'");
        return $data->result();
    }

    function insertjadwal($data) {
        $this->db->insert('jadwal', $data);
    }

    function updateJadwal($data, $id) {
        $this->db->where('id_jadwal', $id);
        $this->db->update('jadwal', $data);
    }

    public function importJadwal($data) {
        for ($i = 0; $i < sizeof($data); $i++) {
            $this->db->insert('jadwal', $data[$i]);
        }
    }

    public function cekJadwal($tahun,$bulan) {
        $data = $this->db->query("select * from jadwal j, log_harian l where j.id_log_harian=l.id_log_harian and month(l.TANGGAL_LOG_HARIAN)='$bulan' and year(l.TANGGAL_LOG_HARIAN)='$tahun'");
        return $data->result();
    }
    
    public function getJadwalPerbulan($depot, $bulan, $tahun){
        $data = $this->db->query("SELECT P.ID_PEGAWAI, L.ID_LOG_HARIAN, J.ID_JADWAL, M.ID_MOBIL, P.NIP, P.NAMA_PEGAWAI, P.JABATAN, J.STATUS_MASUK, L.TANGGAL_LOG_HARIAN, M.NOPOL from pegawai P, jadwal J, log_harian L, mobil M where P.id_pegawai=J.id_pegawai and J.id_log_harian=L.id_log_harian and J.id_mobil=M.id_mobil and P.ID_DEPOT=$depot and month(l.tanggal_log_harian)='$bulan' order by l.tanggal_log_harian");
        return $data->result();
    }
    
    public function deleteJadwal($depot, $bulan, $tahun){
        $this->db->query("delete j from jadwal as j join log_harian as l on j.id_log_harian=l.id_log_harian where month(l.tanggal_log_harian)='$bulan' and year(l.tanggal_log_harian)='$tahun' and l.id_depot='$depot'");
    }
    
    public function getPresensiAMT($depot, $tanggal){
        $data = $this->db->query("select * from jadwal j, log_harian l, pegawai p where p.id_pegawai=j.id_pegawai and l.id_log_harian=j.id_log_harian and l.id_depot='$depot' and l.tanggal_log_harian='$tanggal'");
        return $data->result();
    }

}
