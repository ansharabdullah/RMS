<?php

class m_amt extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function insertPegawai($data) {
        $this->db->insert('pegawai', $data);
    }
    
    public function getMaxID(){
        $depot = 1;
        $query = $this->db->query("select max(id_pegawai) max from pegawai where id_depot=$depot");
        return $query->result();
    }

    public function editPegawai($data, $id) {
        $this->db->where('id_pegawai', $id);
        $this->db->update('pegawai', $data);
    }

    public function deletePegawai($id) {
        $this->db->where('id_pegawai', $id);
        $this->db->delete('pegawai');
    }

    public function selectAMT($depot) {
        $data = $this->db->query("select * from pegawai where (jabatan='SUPIR' or jabatan='KERNET') and ID_DEPOT=$depot");
        return $data->result();
    }

    public function detailAMT($id_pegawai) {
        $data = $this->db->query("select * from pegawai where (jabatan='SUPIR' or jabatan='KERNET') and id_pegawai=$id_pegawai");
        return $data->result();
    }

}
