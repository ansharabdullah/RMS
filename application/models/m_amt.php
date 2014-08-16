<?php

class m_amt extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function editAMT($data, $id) {
        $this->db->where('id_pegawai', $id);
        $this->db->update('pegawai', $data);
    }

    public function deleteAMT($data, $id) {
        $this->db->where('id_pegawai', $id);
        $this->db->delete('pegawai');
    }
    
    public function selectAMT(){
        $this->db->query("");
    }

}
