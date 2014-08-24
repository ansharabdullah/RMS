<?php

class m_user extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
    public function validate_login($email,$password) {
        $query = $this->db->query("SELECT* FROM pegawai P, role_assignment RA WHERE P.ID_PEGAWAI=RA.ID_PEGAWAI AND RA.EMAIL='$email' AND RA.PASSWORD='$password'");
        return $query;
    }
    
    public function getAkun($id_pegawai){
        $this->db->where('id_pegawai',$id_pegawai);
        $query = $this->db->get('role_assignment');
        return $query->result();
    }
    
    public function editPassword($data, $id){
        $this->db->where('id_pegawai',$id);
        $this->db->update('role_assignment',$data);
    }
}