<?php

class m_rencana_apms extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function selectRencanaApms($depot,$tahun,$bulan) {
        $data = $this->db->query("SELECT R.ID_APMS, K.NO_APMS,L.ID_LOG_HARIAN, R.ID_RENCANA_APMS,DATE_FORMAT(l.TANGGAL_LOG_HARIAN, '%M-%Y')as TANGGAL,R.K_PREMIUM,R.K_SOLAR from rencana_apms R, log_harian L, apms K where R.ID_LOG_HARIAN = L.ID_LOG_HARIAN and R.ID_APMS = K.ID_APMS and L.ID_DEPOT= $depot and  YEAR(L.TANGGAL_LOG_HARIAN) = '$tahun' and MONTH(L.TANGGAL_LOG_HARIAN) = '$bulan' order by TANGGAL ASC");
        return $data->result();
    }
	
	  public function cekRencana($depot, $tahun, $bulan) {
        $query = $this->db->query("select STATUS_KUOTA_APMS from log_harian where ID_DEPOT =  1 and  TANGGAL_LOG_HARIAN = '2014-09-01'");
        $hasil = $query->row();
        $hasil = $hasil->STATUS_KUOTA_APMS;
		return $hasil;
    }
/* 
   public function editRencana($data, $id) {
        $this->db->where('id_rencana', $id);
        $this->db->update('rencana', $data);
    }
    
    function updateRencana($data, $id) {
        $this->db->where('id_rencana', $id);
        $this->db->update('rencana', $data);
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
    } */
   
  
}
