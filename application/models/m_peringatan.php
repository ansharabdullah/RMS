<?php

class m_peringatan extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
    public function getPeringatan($id){
        $this->db->where("id_pegawai", $id);
        $data = $this->db->get("log_peringatan");
        return $data->result();
    }
    
    public function insertPeringatan($data){
        $this->db->insert("log_peringatan",$data);
    }
    
    public function updatePeringatan($data, $id){
        $this->db->where("id_log_peringatan", $id);
        $this->db->update("log_peringatan", $data);
    }
    
    public function deletePeringatan($id){
        $this->db->where("id_log_peringatan", $id);
        $this->db->delete("log_peringatan");
    }
    
    public function deletePeringatanPegawai($id){
        $this->db->where("id_pegawai", $id);
        $this->db->delete("log_peringatan");
    }
    
}