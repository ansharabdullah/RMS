<?php

class m_depot extends CI_Model {
    /* --RENISA-- */

    public function get_depot() {
        $query = $this->db->query("select * from depot");
        return $query->result();
    }

}

?>
