<?php

class m_log_harian extends CI_Model {
    /* DASHBOARD --- RENISA */

    //notifikasi pengingat aktivitas yang belum dilkukan
    public function get_log_peringatan($id_depot) {

        //ambil semua tanggal di log harian
        $query = $this->db->query("select *,MONTH(TANGGAL_LOG_HARIAN) as bulan, DAY(TANGGAL_LOG_HARIAN) as tanggal,YEAR(TANGGAL_LOG_HARIAN) as tahun 
                                    from log_harian ,depot
                                    where tanggal_log_harian <= CURDATE() and log_harian.id_depot = $id_depot 
                                    and log_harian.id_depot = depot.id_depot
                                    and  (status_input_kinerja = 0 or status_ms2 = 0 or status_interpolasi = 0 
                                    or status_kpi_operasional_internal = 0 or status_kpi_internal = 0 or status_penjadwalan = 0
                                    or generate_ba = 0 or status_koefisien = 0 or status_presensi_amt = 0 or status_presensi_mt = 0 or status_rencana = 0) 
                                    order by tanggal_log_harian asc");
        $data = $query->result();

        //gabung semua notifikasi
        $notifikasi = array();
        $set = array();
        foreach ($data as $dt) {
            $set['tanggal'] = $dt->TANGGAL_LOG_HARIAN;
            $set['bulan'] = $dt->bulan;
            $set['tahun'] = $dt->tahun;
            $set['ms2'] = 1;
            $set['interpolasi'] = 1;
            $set['ba'] = 1;
            $set['kpi_operasional'] = 1;
            $set['kpi_internal'] = 1;
            $set['jadwal'] = 1;
            $set['input_kinerja'] = 1;
            $set['koefisien'] = 1;
            $set['presensi_amt'] = 1;
            $set['presensi_mt'] = 1;
            $set['rencana'] = 1;
            $set['notifikasi'] = 0;
            $set['kpi_apms'] = 1;
            $set['kuota_apms'] = 1;
            if ($dt->tanggal == 1) {
                //cek rencana
                if($dt->STATUS_RENCANA == 0)
                {
                    $set['rencana'] = 0;
                    $set['notifikasi'] = 1;
                }
                
                //cek koefesien
                if($dt->STATUS_KOEFISIEN == 0)
                {
                    $set['koefisien'] = 0;
                    $set['notifikasi'] = 1;
                }
                
                //cek ms2
                if ($dt->STATUS_MS2 == 0) {
                    $set['ms2'] = 0;
                    $set['notifikasi'] = 1;
                }
                //cek interpolasi 
                if ($dt->STATUS_INTERPOLASI == 0) {
                    $set['interpolasi'] = 0;
                    $set['notifikasi'] = 1;
                }
                //cek generate berita acara
                if ($dt->GENERATE_BA == 0) {
                    $set['ba'] = 0;
                    $set['notifikasi'] = 1;
                }
                //cek kpi_operasional
                if ($dt->STATUS_KPI_OPERASIONAL_INTERNAL == 0) {
                    $set['kpi_operasional'] = 0;
                    $set['notifikasi'] = 1;
                }
                //cek kpi_internal
                if ($dt->STATUS_KPI_INTERNAL == 0) {
                    $set['kpi_internal'] = 0;
                    $set['notifikasi'] = 1;
                }
                //cek status penjadwalan
                if ($dt->STATUS_PENJADWALAN == 0) {
                    $set['jadwal'] = 0;
                    $set['notifikasi'] = 1;
                }
                if($dt->STATUS_APMS == 1)
                {
                    //cek kuota apms
                    if($dt->STATUS_KUOTA_APMS == 0)
                    {
                        $set['kuota_apms'] = 0;
                        $set['notifikasi'] = 1;
                    }

                    //cek kpi apms
                    if($dt->STATUS_KPI_APMS == 0)
                    {
                        $set['kpi_apms'] = 0;
                        $set['notifikasi'] = 1;
                    }
                }
            }
            if ($dt->STATUS_INPUT_KINERJA == 0) {
                $set['input_kinerja'] = 0;
                $set['notifikasi'] = 1;
            }
            if ($dt->STATUS_PRESENSI_MT == 0) {
                $set['presensi_mt'] = 0;
                $set['notifikasi'] = 1;
            }
            if ($dt->STATUS_PRESENSI_AMT == 0) {
                $set['presensi_amt'] = 0;
                $set['notifikasi'] = 1;
            }
            array_push($notifikasi, $set);
        }

        return $notifikasi;
    }

    //notifikasi pengingat aktivitas yang belum dilakukan untuk oam
    public function get_log_peringatan_oam() {
        $query = $this->db->query("select *,MONTH(TANGGAL_LOG_HARIAN) as bulan, DAY(TANGGAL_LOG_HARIAN) as tanggal, YEAR(TANGGAL_LOG_HARIAN) as tahun  
                                    from log_harian, depot 
                                    where tanggal_log_harian <= CURDATE() 
                                    and log_harian.ID_DEPOT = depot.ID_DEPOT 
                                    and  (status_input_kinerja = 0 or status_ms2 = 0 or status_interpolasi = 0 or status_kpi_operasional_internal = 0 
                                    or status_kpi_internal = 0 or status_koefisien = 0 or status_presensi_amt = 0 or status_presensi_mt = 0 or status_rencana = 0
                                    or status_penjadwalan = 0 or generate_ba = 0 or status_kpi_oam = 0)  
                                    order by depot.ID_DEPOT,tanggal_log_harian asc");
        $data = $query->result();
        //gabung semua notifikasi
        $notifikasi = array();
        $set = array();
        foreach ($data as $dt) {
            $set['tanggal'] = $dt->TANGGAL_LOG_HARIAN;
            $set['bulan'] = $dt->bulan;
            $set['id_depot'] = $dt->ID_DEPOT;
            $set['depot'] = $dt->NAMA_DEPOT;
            $set['tahun'] = $dt->tahun;
            $set['ms2'] = 1;
            $set['interpolasi'] = 1;
            $set['ba'] = 1;
            $set['kpi_operasional'] = 1;
            $set['kpi_internal'] = 1;
            $set['jadwal'] = 1;
            $set['input_kinerja'] = 1;
            $set['koefisien'] = 1;
            $set['presensi_amt'] = 1;
            $set['presensi_mt'] = 1;
            $set['rencana'] = 1;
            $set['notifikasi'] = 0;
            $set['kpi_oam'] = 1;
            $set['kpi_apms'] = 1;
            $set['kuota_apms'] = 1;
            if ($dt->tanggal == 1) {
                if($dt->ID_DEPOT > 0)
                {
                    //cek rencana
                    if($dt->STATUS_RENCANA == 0)
                    {
                        $set['rencana'] = 0;
                        $set['notifikasi'] = 1;
                    }

                    //cek koefesien
                    if($dt->STATUS_KOEFISIEN == 0)
                    {
                        $set['koefisien'] = 0;
                        $set['notifikasi'] = 1;
                    }

                    //cek ms2
                    if ($dt->STATUS_MS2 == 0) {
                        $set['ms2'] = 0;
                        $set['notifikasi'] = 1;
                    }
                    //cek interpolasi 
                    if ($dt->STATUS_INTERPOLASI == 0) {
                        $set['interpolasi'] = 0;
                        $set['notifikasi'] = 1;
                    }
                    //cek generate berita acara
                    if ($dt->GENERATE_BA == 0) {
                        $set['ba'] = 0;
                        $set['notifikasi'] = 1;
                    }
                    //cek kpi_operasional
                    if ($dt->STATUS_KPI_OPERASIONAL_INTERNAL == 0) {
                        $set['kpi_operasional'] = 0;
                        $set['notifikasi'] = 1;
                    }
                    //cek kpi_internal
                    if ($dt->STATUS_KPI_INTERNAL == 0) {
                        $set['kpi_internal'] = 0;
                        $set['notifikasi'] = 1;
                    }
                    //cek status penjadwalan
                    if ($dt->STATUS_PENJADWALAN == 0) {
                        $set['jadwal'] = 0;
                        $set['notifikasi'] = 1;
                    }
                    
                    if($dt->STATUS_APMS == 1)
                    {
                        //cek kuota apms
                        if($dt->STATUS_KUOTA_APMS == 0)
                        {
                            $set['kuota_apms'] = 0;
                            $set['notifikasi'] = 1;
                        }  

                        //cek kpi apms
                        if($dt->STATUS_KPI_APMS == 0)
                        {
                            $set['kpi_apms'] = 0;
                            $set['notifikasi'] = 1;
                        }
                    }
                }
                else
                {
                    //cek kpi oam
                     if ($dt->STATUS_KPI_OAM == 0 && $dt->bulan % 3 == 1) {
                        $set['kpi_oam'] = 0;
                        $set['notifikasi'] = 1;
                    }
                    
                }
            }
            if($dt->ID_DEPOT > 0)
            {
                if ($dt->STATUS_INPUT_KINERJA == 0) {
                    $set['input_kinerja'] = 0;
                    $set['notifikasi'] = 1;
                }

                if ($dt->STATUS_PRESENSI_MT == 0) {
                    $set['presensi_mt'] = 0;
                    $set['notifikasi'] = 1;
                }
                if ($dt->STATUS_PRESENSI_AMT == 0) {
                    $set['presensi_amt'] = 0;
                    $set['notifikasi'] = 1;
                }
            }
            if($set['notifikasi'] == 1) array_push($notifikasi, $set);
        }
        return $notifikasi;
    }

    public function cekTanggal($tanggal, $depot) {
        $this->db->where('tanggal_log_harian', $tanggal);
        $this->db->where('id_depot', $depot);
        $data = $this->db->get('log_harian');
        return $data->result();
    }

    public function updateStatusJadwal($bulan, $tahun, $depot) {
        $this->db->query("update log_harian set status_penjadwalan=1 where month(tanggal_log_harian)='$bulan' and year(tanggal_log_harian)='$tahun' and id_depot='$depot'");
    }
    
    public function updateStatusPresensiAMT($depot, $tanggal, $data){
        $this->db->where('id_depot', $depot);
        $this->db->where('tanggal_log_harian', $tanggal);
        $this->db->update('log_harian',$data);
    }
    
     public function updateStatusPresensiMT($depot, $tanggal, $data){
        $this->db->where('id_depot', $depot);
        $this->db->where('tanggal_log_harian', $tanggal);
        $this->db->update('log_harian', $data);
    }

    //insert setahuneun
    public function insertLogHarian($data) {
        $length = count($data);
        for ($i = 0; $i < $length; $i++) {
            $this->db->insert("log_harian", $data[$i]);
        }
    }

    //cek log_harian
    public function cekLog($id_depot, $tahun) {
        $data = $this->db->query("select count(*) as jumlah from log_harian where id_depot='$id_depot' and tanggal_log_harian='$tahun-12-31'");
        return $data->result();
    }

    public function getIdLogHarian($now, $depot) {
        $this->db->where('year(tanggal_log_harian)', $now);
        $this->db->where('id_depot', $depot);
        $data = $this->db->get('log_harian');
        return $data->result();
    }
    
     public function getIdLogHarianTanggal($now, $depot) {
        $this->db->where('tanggal_log_harian', $now);
        $this->db->where('id_depot', $depot);
        $data = $this->db->get('log_harian');
        return $data->result();
    }
    
    public function getIdLogHarianTanggal1($now,$depot)
	{
		$this->db->where('tanggal_log_harian', $now);
        $this->db->where('id_depot', $depot);
        $data = $this->db->get('log_harian');
        return $data->result();
	}
	public function updateKoutaLog($depot,$tahun,$bulan)
	{
		$this->db->query("update log_harian set STATUS_KUOTA_APMS=1 where ID_DEPOT = $depot and YEAR(TANGGAL_LOG_HARIAN) = '$tahun' and MONTH(TANGGAL_LOG_HARIAN) = '$bulan'");
	}
	public function updateKoutaLogHapus($depot,$tahun,$bulan)
	{
		$this->db->query("update log_harian set STATUS_KUOTA_APMS=0 where ID_DEPOT = $depot and YEAR(TANGGAL_LOG_HARIAN) = '$tahun' and MONTH(TANGGAL_LOG_HARIAN) = '$bulan'");
	}
	public function updateStatusKPIAPMS($depot,$tahun,$bulan)
	{
		$this->db->query("update log_harian set STATUS_KPI_APMS=1 where ID_DEPOT = $depot and YEAR(TANGGAL_LOG_HARIAN) = '$tahun' and MONTH(TANGGAL_LOG_HARIAN) = '$bulan'");
	}
}

?>
