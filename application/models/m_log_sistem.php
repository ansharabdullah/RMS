<?php

class m_log_sistem extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function insertLog($data) {
        $this->db->insert('log_sistem', $data);
    }

    public function getAllLog() {
        $id_depot = $this->session->userdata('id_depot');
        $query = $this->db->query("SELECT * FROM PEGAWAI P, LOG_SISTEM LS WHERE P.ID_PEGAWAI=LS.ID_PEGAWAI AND P.ID_DEPOT=$id_depot");
        return $query->result();
    }

    public function getLog($id_pegawai) {
        $this->db->where('id_pegawai', $id_pegawai);
        $query = $this->db->get('log_sistem');
        return $query->result();
    }

}