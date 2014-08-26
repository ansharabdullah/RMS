<?php

class m_amt extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function insertPegawai($data) {
        $this->db->insert('pegawai', $data);
    }
    
    public function importPegawai($data){
        for($i = 0; $i < sizeof($data); $i++){
            $this->db->insert('pegawai', $data[$i]);
        }
    }
    
    public function getMaxID(){
        $depot = $this->session->userdata('id_depot');;
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
    
    public function detailPegawai($id_pegawai) {
        $data = $this->db->query("select * from pegawai p, role_assignment r where p.id_pegawai=r.id_pegawai and (p.jabatan<>'SUPIR' or p.jabatan<>'KERNET') and p.id_pegawai=$id_pegawai");
        return $data->result();
    }
    

    public function cekNIP($nip){
        $data = $this->db->query("select id_pegawai from pegawai where nip='$nip'");
        return $data->result();
    }
    
    /*     * DASHBOARD --- Renisa* */

    //oam
    public function getAllAMt() {
        $data = $this->db->query("select * from pegawai where (jabatan='SUPIR' or jabatan='KERNET')");
        return $data;
    }

    public function getTotalAMt() {
        return $this->getAllAMt()->num_rows();
    }

    //ss
    public function getAllAMtByDepot($id_depot) {
        $data = $this->db->query("select * from pegawai where (jabatan='SUPIR' or jabatan='KERNET') and ID_DEPOT=$id_depot");
        return $data;
    }

    public function getTotalAMtByDepot($id_depot) {
        return $this->getAllAMtByDepot($id_depot)->num_rows();

    }
}
