<?php

class m_log_sistem extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function insertLog($data) {
        $this->db->insert('log_sistem', $data);
    }

    public function getAllLog($id_depot,$bulan,$tahun) {
        $query = $this->db->query("SELECT * FROM pegawai P, log_sistem LS WHERE P.ID_PEGAWAI=LS.ID_PEGAWAI AND P.ID_DEPOT=$id_depot AND MONTH(LS.TANGGAL_LOG)='$bulan' AND YEAR(LS.TANGGAL_LOG)='$tahun' order by LS.tanggal_log desc");
        return $query->result();
    }

    public function getLogOAM($bulan,$tahun) {
        $query = $this->db->query("SELECT * FROM pegawai P, log_sistem LS, depot d WHERE P.ID_PEGAWAI=LS.ID_PEGAWAI and d.ID_DEPOT=P.ID_DEPOT AND MONTH(LS.TANGGAL_LOG)='$bulan' AND YEAR(LS.TANGGAL_LOG)='$tahun' order by LS.tanggal_log desc");
        return $query->result();
    }

    public function getLog($id_pegawai) {
        $this->db->where('id_pegawai', $id_pegawai);
        $this->db->order_by('tanggal_log', 'desc');
        $query = $this->db->get('log_sistem');
        return $query->result();
    }

}
