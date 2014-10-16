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
	public function statusKPIApms($depot, $tahun, $bulan) {
        $query = $this->db->query("select STATUS_KPI_APMS, ID_LOG_HARIAN from log_harian where ID_DEPOT =  $depot and   YEAR(TANGGAL_LOG_HARIAN) = '$tahun' and MONTH(TANGGAL_LOG_HARIAN) = '$bulan' and day(TANGGAL_LOG_HARIAN) = '1'");
		return $query->result();
	}
	public function jumlahNilai($id_log)
	{
		$query = $this->db->query("select sum(FINAL_SCORE) as jumlah from kpi_apms where ID_LOG_HARIAN = $id_log");
		return $query->row();
	}
	
	public function syncKPIAPMS($depot,$tahun,$bulan)
	{
		//rencana
		$rencana = $this->db->query("select IFNULL((sum(a.K_SOLAR)+sum(a.K_PREMIUM)),0) as jumlah from rencana_apms a, log_harian b where a.ID_LOG_HARIAN = b.ID_LOG_HARIAN and b.ID_DEPOT = $depot and YEAR(b.TANGGAL_LOG_HARIAN) = '$tahun' and MONTH(b.TANGGAL_LOG_HARIAN) = '$bulan'");
		
		$kpi_nilai_r = $rencana->row();
		
		//kinerja
		$query = $this->db->query("select IFNULL((sum(a.SOLAR)+sum(a.PREMIUM)),0) as jumlah from kinerja_apms a, log_harian b where a.ID_LOG_HARIAN = b.ID_LOG_HARIAN and b.ID_DEPOT = $depot and YEAR(b.TANGGAL_LOG_HARIAN) = '$tahun' and MONTH(b.TANGGAL_LOG_HARIAN) = '$bulan'");
		$kpi_nilai_k = $query->row();
		
		//id_log_harian
		//$now = date('y-m',$tanggal.'-'.$bulan);
		$this->db->where('tanggal_log_harian', $tahun.'-'.$bulan.'-1');
        $this->db->where('id_depot', $depot);
        $id_log = $this->db->get('log_harian');
        $id_log = $id_log->row();
		if($kpi_nilai_r->jumlah!=0)
		{
			$score = round((1 - (($kpi_nilai_r->jumlah - $kpi_nilai_k->jumlah)/$kpi_nilai_r->jumlah))*100,2);
		}else{
			$score = 80;
		}
		
		
		
		if($score < 80)
		{
			$normal_score = 80;
		}else if($score > 120){
			$normal_score = 120;
		}else
		{
			$normal_score = $score;
		}
		$final_score = $normal_score*20/100;
		$query= $this->db->query("update kpi_apms set TARGET = $kpi_nilai_r->jumlah,REALISASI = $kpi_nilai_k->jumlah,SCORE = $score,NORMAL_SCORE = $normal_score, FINAL_SCORE = $final_score where ID_JENIS_KPI_APMS = 4 and ID_LOG_HARIAN = $id_log->ID_LOG_HARIAN");
		
		$jumlah = $this->db->query("select sum(FINAL_SCORE) as jumlah from kpi_apms where ID_LOG_HARIAN = $id_log->ID_LOG_HARIAN");
		$jumlah = $jumlah->row();
		
		$query = $this->db->query("update nilai set nilai = $jumlah->jumlah where ID_JENIS_PENILAIAN = 73 and ID_LOG_HARIAN = $id_log->ID_LOG_HARIAN");
		
	}
}

?>