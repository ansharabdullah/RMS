<?php

class m_kpi_apms extends CI_Model {

	public function insertKPIApms($data)
	{
		$result = $this->db->insert('kpi_apms',$data);
		return $result;
	}
	public function selectKPIApms($depot,$tahun,$bulan){
	//	var_dump($depot,$tahun,$bulan);
		$query = $this->db->query("select MONTH(lh.TANGGAL_LOG_HARIAN) as nama_bulan,YEAR(lh.TANGGAL_LOG_HARIAN)as nama_tahun,ka.ID_KPI_APMS, ka.TARGET, ka.BOBOT, ka.REALISASI, ka.SCORE, ka.NORMAL_SCORE, ka.FINAL_SCORE, jka.JENIS_KPI_APMS, jka.ID_JENIS_KPI_APMS, jka.SATUAN, jka.ASPEK, jka.FREKUENSI,jka.KETERANGAN, lh.ID_LOG_HARIAN  from kpi_apms ka, jenis_kpi_apms jka, log_harian lh where ka.ID_JENIS_KPI_APMS = jka.ID_JENIS_KPI_APMS and ka.ID_LOG_HARIAN = lh.ID_LOG_HARIAN and lh.ID_DEPOT = $depot and YEAR(lh.TANGGAL_LOG_HARIAN) = '$tahun' and MONTH(lh.TANGGAL_LOG_HARIAN) = '$bulan' order by jka.ID_JENIS_KPI_APMS");
		//var_dump($bulan);
        return $query->result();
	}
	
	public function editKPIApms($target, $id) {
       $this->db->where('ID_KPI_APMS', $id);
       $result = $this->db->update('kpi_apms', $target);
    }
	
}

?>