<?php

class m_apms extends CI_Model {
    
    //data_apms
    public function selectAllApms($depot) {
        $data = $this->db->query("select * from apms where ID_DEPOT = $depot");
        return $data->result();
    }
	//insert
	public function insertApms($data){
		var_dump($data);
		$this->db->insert('apms',$data);
	}
	public function detailApms($id_apms)
	{
		$data = $this->db->query("select * from apms where ID_APMS = $id_apms");
        return $data->result();
	}
	public function editApms($data, $id) {
        $this->db->where('ID_APMS', $id);
        $this->db->update('apms', $data);
    }

    public function deleteApms($id) {
        $this->db->where('ID_APMS', $id);
        $this->db->delete('apms');
    }
}
