<?php

class m_rencana_mt extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getRencana($depot,$tahun,$bulan) {
        $data = $this->db->query("SELECT L.ID_LOG_HARIAN, R.ID_RENCANA,DATE_FORMAT(l.TANGGAL_LOG_HARIAN, '%d-%m-%Y')as TANGGAL,R.R_PREMIUM,R.R_PERTAMAX,R.R_PERTAMAXPLUS,R.R_PERTAMINADEX,R.R_SOLAR,R.R_BIOSOLAR,R.R_OWN_USE,L.TANGGAL_LOG_HARIAN from rencana R, log_harian L where R.id_log_harian=L.id_log_harian and L.ID_DEPOT= $depot and  YEAR(L.TANGGAL_LOG_HARIAN) = '$tahun' and MONTH(L.TANGGAL_LOG_HARIAN) = '$bulan'");
        return $data->result();
    }

    public function editRencana($id, $r_premium, $r_pertamax, $r_pertamaxplus, $r_pertaminadex, $r_solar, $r_biosolar,$r_own_use) {
        $query = $this->db->query("update rencana set R_PREMIUM = '$r_premium',R_PERTAMAX='$r_pertamax', R_PERTAMAXPLUS = '$r_pertamaxplus',R_PERTAMINADEX = '$r_pertaminadex',R_SOLAR='$r_solar', R_BIOSOLAR = '$r_biosolar', R_OWN_USE = '$r_own_use' where ID_RENCANA='$id'");
    }

    public function importRencana($data) {
        for ($i = 0; $i < sizeof($data); $i++) {
            $this->db->insert('rencana', $data[$i]);
        }
    }   
    
    public function getIdLogHarian($depot, $tahun, $bulan, $hari) {
        $query = $this->db->query("select l.ID_LOG_HARIAN from log_harian l where l.ID_DEPOT = '$depot' and MONTH(l.TANGGAL_LOG_HARIAN) = '$bulan' and YEAR(l.TANGGAL_LOG_HARIAN) = '$tahun' and DAY(l.TANGGAL_LOG_HARIAN) = '$hari'");
        $hasil = -1;
        if ($query->num_rows() == 1) {
            $row = $query->row();
            $hasil = $row->ID_LOG_HARIAN;
        }
        return $hasil;
    }

    public function cekRencana($depot, $tahun, $bulan) {
        $query = $this->db->query("select SUM(STATUS_RENCANA) as STATUS_RENCANA from log_harian where ID_DEPOT = '$depot' and  YEAR(TANGGAL_LOG_HARIAN) = '$tahun' and MONTH(TANGGAL_LOG_HARIAN) = '$bulan'");
        $row = $query->row();
        return $hasil = $row->STATUS_RENCANA;
    }
    
    public function deleteRencana($rencana) {
        foreach ($rencana as $row) {
            $query = $this->db->query("delete from RENCANA where ID_RENCANA='$row->ID_RENCANA'");
            $query = $this->db->query("update log_harian set STATUS_RENCANA = 0 where ID_LOG_HARIAN='$row->ID_LOG_HARIAN'");
        }
    }
    
   public function simpanRencana($rencana) {
        $no = 0;
        for ($no = 0; $no < $rencana['jumlah']; $no++) {
            $query = $this->db->query("insert into rencana(ID_LOG_HARIAN,r_premium,r_pertamax,r_pertamaxplus,r_pertaminadex,r_solar,r_biosolar,r_own_use)values('" . $rencana ['id_log_harian'][$no] . "','" . $rencana['r_premium'][$no] . "','" . $rencana['r_pertamax'][$no] . "','" . $rencana['r_pertamaxplus'][$no] . "','" . $rencana['r_pertaminadex'][$no] . "','" . $rencana['r_solar'][$no] . "','" . $rencana['r_biosolar'][$no] ."','" . $rencana['r_own_use'][$no] . "')");
            $query = $this->db->query("update log_harian set STATUS_RENCANA = 1 where ID_LOG_HARIAN = '" . $rencana['id_log_harian'][$no] . "'");
        }
    }
   
  
}
