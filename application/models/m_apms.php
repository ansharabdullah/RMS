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
	public function insertKinerjaApms($data){
		$result = $this->db->insert('kinerja_apms',$data);
		return $result;
	}
	public function editKinerjaApms($data, $id) {
       $this->db->where('ID_KINERJA_APMS', $id);
       $result = $this->db->update('kinerja_apms', $data);
	   return $result;
    }
	public function detailApms($id_apms)
	{
		$data = $this->db->query("select * from apms where ID_APMS = $id_apms");
        return $data->result();
	}
	public function selectKinerja($id_apms,$bulan,$tahun)
	{
		$data = $this->db->query("select (DAY(l.TANGGAL_LOG_HARIAN ))as hari,k.ID_KINERJA_APMS,k.ID_LOG_HARIAN,k.ID_APMS,k.NO_DELIVERY,k.DATE_DELIVERY,k.DATE_PLAN_GI,k.BAHAN_BAKAR,k.JUMLAH,k.ORDER_NUMBER,k.DATE_ORDER,k.PENGIRIMAN_KAPAL,k.DATE_KAPAL_DATANG,k.DATE_KAPAL_BERANGKAT,k.DESCRIPTION from kinerja_apms k,log_harian l
                                  where k.ID_LOG_HARIAN = l.ID_LOG_HARIAN and k.ID_APMS = $id_apms and MONTH(l.TANGGAL_LOG_HARIAN) = '$bulan' and YEAR(l.TANGGAL_LOG_HARIAN) = '$tahun' 
                                  order by l.TANGGAL_LOG_HARIAN asc");
        return $data->result();
	}
	public function selectKinerjaGrafix($id_apms,$bulan,$tahun)
	{
		$data = $this->db->query("select (DAY(l.TANGGAL_LOG_HARIAN ))as hari,k.ID_KINERJA_APMS,k.ID_LOG_HARIAN,k.ID_APMS,k.NO_DELIVERY,k.DATE_DELIVERY,k.DATE_PLAN_GI,k.BAHAN_BAKAR,(sum(k.JUMLAH)) as jumlah,k.ORDER_NUMBER,k.DATE_ORDER,k.PENGIRIMAN_KAPAL,k.DATE_KAPAL_DATANG,k.DATE_KAPAL_BERANGKAT,k.DESCRIPTION from kinerja_apms k,log_harian l
                                  where k.ID_LOG_HARIAN = l.ID_LOG_HARIAN and k.ID_APMS = $id_apms and MONTH(l.TANGGAL_LOG_HARIAN) = '$bulan' and YEAR(l.TANGGAL_LOG_HARIAN) = '$tahun' group by l.TANGGAL_LOG_HARIAN, k.BAHAN_BAKAR
                                  order by l.TANGGAL_LOG_HARIAN asc");
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
	public function getLogHarian($date,$id)
	{
		$data = $this->db->query("select ID_LOG_HARIAN from log_harian where TANGGAL_LOG_HARIAN = '$date' and ID_DEPOT = $id");
        return $data->result();
	}
}
