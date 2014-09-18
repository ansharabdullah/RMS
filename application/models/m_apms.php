<?php

class m_apms extends CI_Model {
    
    //data_apms
    public function selectAllApms($depot) {
        $data = $this->db->query("select * from apms where ID_DEPOT = $depot");
        return $data->result();
    }
	//insert
	public function insertApms($data){
		$result = $this->db->insert('apms',$data);
		return $result;
	}
	public function detailApms($id_apms)
	{
		$data = $this->db->query("select * from apms where ID_APMS = $id_apms");
        return $data->result();
	}
	public function getIdApms($no_apms)
	{
		$data = $this->db->query("select ID_APMS from apms where NO_APMS = $no_apms");
        return $data->result();
	}
	public function editApms($data, $id) {
        $this->db->where('ID_APMS', $id);
       $result = $this->db->update('apms', $data);
	   return $result;
    }

    public function deleteApms($id) {
        $this->db->where('ID_APMS', $id);
          $result =$this->db->delete('apms');
		  return $result;
    }
}
