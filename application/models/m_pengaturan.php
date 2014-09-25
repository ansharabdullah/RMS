<?php

class m_pengaturan extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function selectDepot($depot) {
        $this->db->where('ID_DEPOT', $depot);
        $query = $this->db->get('depot');
        return $query->result();
    }
    
    public function selectAllDepot() {
        $this->db->where('ID_DEPOT <>', -1);
        $query = $this->db->get('depot');
        return $query->result();
    }
     
    public function getMaxIdDepot(){
        $this->db->select('max(id_depot) as id_depot');
        $this->db->from('depot');
        
        $query = $this->db->get();
        return $query->result();
    }
    
    public function getCountDepot(){
        $this->db->select('count(id_depot) as count');
        $this->db->from('depot');
        
        $query = $this->db->get();
        return $query->result();
    }
    
    public function tambahDepot($data){
        $this->db->insert('depot', $data);
    }

    public function editDepot($data, $id) {
        $this->db->where('id_depot', $id);
        $this->db->update('depot',$data);
    }
    
    public function deleteDepot($depot){
        $this->db->where('id_depot', $depot);
        $this->db->delete('pegawai');
        
        $this->db->where('id_depot',$depot);
        $this->db->delete('depot');
    }

    public function selectAllUser() {
        $query = $this->db->query('SELECT RA.EMAIL, RA.ID_ROLE, RA.PASSWORD, D.NAMA_DEPOT,P.ID_PEGAWAI, RA.ID_ROLE_ASSIGNMENT, P.NAMA_PEGAWAI, P.NIP, P.JABATAN, R.NAMA_ROLE FROM pegawai P, role R, role_assignment RA, depot D WHERE P.ID_PEGAWAI=RA.ID_PEGAWAI AND RA.ID_ROLE=R.ID_ROLE AND RA.ID_ROLE<=3 AND RA.ID_ROLE<>1 AND P.ID_DEPOT=D.ID_DEPOT ORDER BY P.ID_DEPOT');
        return $query->result();
    }
    
    public function selectAllUserDepot($depot) {
        $query = $this->db->query("SELECT RA.EMAIL, RA.ID_ROLE, RA.PASSWORD, P.ID_PEGAWAI, RA.ID_ROLE_ASSIGNMENT, P.NAMA_PEGAWAI, P.NIP, P.JABATAN, R.NAMA_ROLE FROM pegawai P, role R, role_assignment RA WHERE P.ID_PEGAWAI=RA.ID_PEGAWAI AND RA.ID_ROLE=R.ID_ROLE AND RA.ID_ROLE<>3 AND P.ID_DEPOT=$depot");
        return $query->result();
    }

    public function insertAkun($data) {
        $this->db->insert('role_assignment', $data);
    }

    public function editAkun($data, $id) {
        $this->db->where('id_role_assignment', $id);
        $this->db->update($data);
    }

    public function deleteAkun($id) {
        $this->db->where('id_pegawai', $id);
        $this->db->delete('pegawai');
    }

    public function selectRA($id){
        $this->db->where('id_pegawai',$id);
        $query = $this->db->get('role_assignment');
        
        return $query->result();
    }
}
