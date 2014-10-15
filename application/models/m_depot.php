<?php

class m_depot extends CI_Model {
    /* --RENISA-- */

    public function get_depot() {
        $query = $this->db->query("select * from depot where ID_DEPOT > 0");
        return $query->result();
    }
    
     public function get_depot_apms() {
        $query = $this->db->query("select * from depot where ID_DEPOT > 0 and STATUS_APMS = 1");
        return $query->result();
    }
    
    public function get_total_depot()
    {
        $query = $this->db->query("select * from depot where ID_DEPOT > 0");
        
        return $query->num_rows();
        
    }
    
    public function get_nama_depot($id)
    {
        $query = $this->db->query("select * from depot where ID_DEPOT = $id");
        $data = $query->result();
        $nama = strtolower($data[0]->NAMA_DEPOT);
        $nama = ucfirst($nama);
        return $nama;
    }
    
    public function getDetailDepot($id){
        $this->db->where('ID_DEPOT',$id);
        $data = $this->db->get("depot");
        return $data->row();
    }
    
}

?>
