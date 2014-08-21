<?php

class m_user extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
    public function validate_login($email,$password) {
        $query = $this->db->query("SELECT* FROM PEGAWAI P, ROLE_ASSIGNMENT RA WHERE P.ID_PEGAWAI=RA.ID_PEGAWAI AND RA.EMAIL='$email' AND RA.PASSWORD='$password'");
        return $query;
    }
}