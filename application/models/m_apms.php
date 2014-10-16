<?php

class m_apms extends CI_Model {
    
    //data_apms
    public function selectAllApms($depot) {
        $data = $this->db->query("select * from apms where ID_DEPOT = $depot");
        return $data->result();
    }
	public function selectnoApms($depot) {
        $data = $this->db->query("select NO_APMS, ID_APMS,NAMA_PENGUSAHA from apms where ID_DEPOT = $depot");
		//var_dump ($data->result());
        return $data->result();
    }
	public function periksaApms($depot,$id_apms,$ship_to) {
		$data = $this->db->query("select count(ID_APMS) as jumlah from apms  where ID_DEPOT = $depot and NO_APMS = '$id_apms'");
		$hasil = $data->row();
		if($hasil->jumlah > 0)
		{
			$data = $this->db->query("select count(ID_APMS) as jumlah from apms  where ID_DEPOT = $depot and SHIP_TO = '$ship_to'");
			$hasil = $data->row();
			if($hasil->jumlah>0)
			{
				return 3;
			}else
			{
				return 1;
			}
		}
		else
		{
			$data = $this->db->query("select count(ID_APMS) as jumlah from apms  where ID_DEPOT = $depot and SHIP_TO = '$ship_to'");
			$hasil = $data->row();
			if($hasil->jumlah>0)
			{
				return 2;
			}
			else
			{
				return 0;
			}
		}
		
	}
	public function getID_APMS($no_apms,$depot)
	{
		$data = $this->db->query("select ID_APMS from apms where ID_DEPOT = $depot and NO_APMS = '$no_apms'");
		return $data->result();
	}
	public function periksaeditApms($depot,$no_apms,$ship_to,$id_apms) {
		$data = $this->db->query("select count(ID_APMS) as jumlah from apms  where ID_DEPOT = $depot and NO_APMS = '$no_apms' and ID_APMS != $id_apms");
		$hasil = $data->row();
		if($hasil->jumlah > 0)
		{
			$data = $this->db->query("select count(ID_APMS) as jumlah from apms  where ID_DEPOT = $depot and SHIP_TO = '$ship_to' and ID_APMS != $id_apms");
			$hasil = $data->row();
			if($hasil->jumlah>1)
			{
				return 3;
			}else
			{
				return 1;
			}
		}
		else
		{
			$data = $this->db->query("select count(ID_APMS) as jumlah from apms  where ID_DEPOT = $depot and SHIP_TO = '$ship_to' and ID_APMS != $id_apms");
			$hasil = $data->row();
			if($hasil->jumlah>0)
			{
				return 2;
			}
			else
			{
				return 0;
			}
		}
		
	}
	public function periksaKinerjaApms($depot,$id_log,$no_delivery) {
		$data = $this->db->query("select count(i.ID_KINERJA_APMS) as jumlah from kinerja_apms i, log_harian l where i.ID_LOG_HARIAN = l.ID_LOG_HARIAN and l.ID_DEPOT = $depot and i.NO_DELIVERY = $no_delivery");
		$hasil = $data->row();
		if($hasil->jumlah>0)
		{
			return 1;
		}else
		{
			return 0;
		}
		
	}
	public function periksaeditKinerjaApms($depot,$id_log,$no_delivery,$id_kinerja) {
		$data = $this->db->query("select count(i.ID_KINERJA_APMS) as jumlah from kinerja_apms i, log_harian l where i.ID_LOG_HARIAN = l.ID_LOG_HARIAN and l.ID_DEPOT = $depot and i.NO_DELIVERY = $no_delivery");
		$hasil = $data->row();
		if($hasil->jumlah>0)
		{
			return 1;
		}else
		{
			return 0;
		}
		
	}
	public function selectApms($depot) {
		$data = $this->db->query("select ID_APMS, NO_APMS,NAMA_PENGUSAHA from apms  where ID_DEPOT = $depot");
        return $data->result();
	}
	public function countnoApms($depot) {
        $data = $this->db->query("select count(NO_APMS) as jumlah from apms where ID_DEPOT = $depot");
		//var_dump ($data->row());
        return $data->row();
    }
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
		$data = $this->db->query("select (DAY(l.TANGGAL_LOG_HARIAN ))as hari,k.ID_KINERJA_APMS,k.ID_LOG_HARIAN,k.ID_APMS,k.NO_DELIVERY,k.DATE_DELIVERY,k.DATE_PLAN_GI,k.SOLAR,k.PREMIUM,k.ORDER_NUMBER,k.DATE_ORDER,k.PENGIRIMAN_KAPAL,k.DATE_KAPAL_DATANG,k.DATE_KAPAL_BERANGKAT,k.DESCRIPTION from kinerja_apms k,log_harian l
                                  where k.ID_LOG_HARIAN = l.ID_LOG_HARIAN and k.ID_APMS = $id_apms and MONTH(l.TANGGAL_LOG_HARIAN) = '$bulan' and YEAR(l.TANGGAL_LOG_HARIAN) = '$tahun' 
                                  order by k.DATE_PLAN_GI asc");
        return $data->result();
	}
	public function selectKinerjaGrafix($id_apms,$bulan,$tahun)
	{
		$data = $this->db->query("select (DAY(l.TANGGAL_LOG_HARIAN ))as hari,k.ID_KINERJA_APMS,k.ID_LOG_HARIAN,k.ID_APMS,k.NO_DELIVERY,k.DATE_DELIVERY,k.DATE_PLAN_GI,(sum(k.PREMIUM)) as premium,(sum(k.SOLAR)) as solar,k.ORDER_NUMBER,k.DATE_ORDER,k.PENGIRIMAN_KAPAL,k.DATE_KAPAL_DATANG,k.DATE_KAPAL_BERANGKAT,k.DESCRIPTION from kinerja_apms k,log_harian l where k.ID_LOG_HARIAN = l.ID_LOG_HARIAN and k.ID_APMS = $id_apms and MONTH(l.TANGGAL_LOG_HARIAN) = '$bulan' and YEAR(l.TANGGAL_LOG_HARIAN) = '$tahun' group by l.TANGGAL_LOG_HARIAN order by l.TANGGAL_LOG_HARIAN asc");
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
    public function deleteKinerjaApms($id) {
        $this->db->where('ID_KINERJA_APMS', $id);
          $result =$this->db->delete('kinerja_apms');
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
	public function get_grafik_tahun($depot,$tahun)
	{
		$query = $this->db->query("select (DAY(l.TANGGAL_LOG_HARIAN )) as hari,k.ID_KINERJA_APMS,k.ID_APMS,k.NO_DELIVERY, k.DATE_DELIVERY, k.DATE_PLAN_GI,(sum(k.SOLAR)) as solar,(sum(k.PREMIUM)) as premium,k.ORDER_NUMBER,k.DATE_ORDER,k.PENGIRIMAN_KAPAL, k.DATE_KAPAL_DATANG,k.DATE_KAPAL_BERANGKAT,k.DESCRIPTION, MONTHNAME(STR_TO_DATE(MONTH(l.TANGGAL_LOG_HARIAN),'%m')) as bulan,MONTH(l.TANGGAL_LOG_HARIAN) as no_bulan from kinerja_apms k,log_harian l where  k.ID_LOG_HARIAN = l.ID_LOG_HARIAN and l.id_depot = $depot and YEAR(l.TANGGAL_LOG_HARIAN) = '$tahun' group by MONTH(l.TANGGAL_LOG_HARIAN) order by no_bulan asc");
		//var_dump($tahun,$depot);
        return $query->result();
	}
	public function get_max_bulan($depot,$tahun)
	{
		$query = $this->db->query("select (MAX(MONTH(l.TANGGAL_LOG_HARIAN))) as no_bulan from kinerja_apms k,log_harian l where  k.ID_LOG_HARIAN = l.ID_LOG_HARIAN and l.id_depot = $depot and YEAR(l.TANGGAL_LOG_HARIAN) = '$tahun'");
		return $query->row();
	}
	public function get_grafik_bulan($depot,$bulan,$tahun) {
        $query = $this->db->query("select l.TANGGAL_LOG_HARIAN,(DAY(l.TANGGAL_LOG_HARIAN ))as hari,sum(k.PREMIUM) as premium,sum(k.SOLAR) as solar
                                    from kinerja_apms k, log_harian l 
                                    where  k.ID_LOG_HARIAN = l.ID_LOG_HARIAN and 
                                    l.id_depot = $depot AND MONTH(l.TANGGAL_LOG_HARIAN) = '$bulan' and YEAR(l.TANGGAL_LOG_HARIAN) = '$tahun'
                                    group by l.TANGGAL_LOG_HARIAN order by l.TANGGAL_LOG_HARIAN asc");
		//var_dump($bulan);
        return $query->result();
    }
	public function get_grafik_harian($depot,$bulan,$hari,$tahun) {
		$query = $this->db->query("select a.ID_APMS, a.NO_APMS,sum(k.PREMIUM) as premium,sum(k.SOLAR) as solar from kinerja_apms k,log_harian l,apms a  
                                    where a.ID_APMS = k.ID_APMS
                                    and k.ID_LOG_HARIAN = l.ID_LOG_HARIAN 
                                    and DAY(l.TANGGAL_LOG_HARIAN) = '$hari' and MONTH(l.TANGGAL_LOG_HARIAN) = '$bulan' and YEAR(l.TANGGAL_LOG_HARIAN) = '$tahun' 
                                    and l.ID_DEPOT = $depot");
		//var_dump($bulan);
        return $query->result();
    }
	public function get_jumlah($id_depot,$tahun,$bulan)
	{
		$query = $this->db->query("select (sum(SOLAR) + sum(PREMIUM)) as jumlah from kinerja_apms k, log_harian lh where k.ID_LOG_HARIAN = lh.ID_LOG_HARIAN and YEAR(lh.TANGGAL_LOG_HARIAN) = '$tahun' and MONTH(lh.TANGGAL_LOG_HARIAN) = '$bulan' and lh.ID_DEPOT = $id_depot");
		return $query->row();
	}
	
	public function insertnilaiApms($data){
		$result = $this->db->insert('nilai',$data);
		return $result;
	}
	public function updateNilai($id_log,$nilai){
		$result = $this->db->query("update nilai set nilai = $nilai where ID_LOG_HARIAN = $id_log and ID_JENIS_PENILAIAN = 73");
		return $result;
	}
	public function getLaporanRealisasi($depot,$tahun,$bulan)
	{
		$result = $this->db->query("select b.NO_DELIVERY, b.DESCRIPTION, a.SHIP_TO,a.NAMA_PENGUSAHA,b.DATE_PLAN_GI,b.SOLAR,b.PREMIUM from apms a, kinerja_apms b, log_harian i where b.ID_APMS = a.ID_APMS and i.ID_LOG_HARIAN = b.ID_LOG_HARIAN and i.ID_DEPOT = $depot and MONTH(i.TANGGAL_LOG_HARIAN) = '$bulan' and YEAR(i.TANGGAL_LOG_HARIAN) = '$tahun' order By a.NAMA_PENGUSAHA ASC, PREMIUM DESC, DATE_PLAN_GI ASC");
		return $result->result();
	}
}
