<?php

class m_log_harian extends CI_Model {
    /* DASHBOARD --- RENISA */

    //notifikasi pengingat aktivitas yang belum dilkukan
    public function get_log_peringatan($id_depot) {
        
        //ambil semua tanggal di log harian
        $query = $this->db->query("select *,MONTH(TANGGAL_LOG_HARIAN) as bulan, DAY(TANGGAL_LOG_HARIAN) as tanggal from log_harian where tanggal_log_harian <= CURDATE() and id_depot = $id_depot and  (status_input_kinerja = 0 or status_ms2 = 0 or status_interpolasi = 0 or status_kpi_operasional_internal = 0 or status_kpi_internal = 0 or status_penjadwalan = 0 or generate_ba = 0) order by tanggal_log_harian asc");
        $data = $query->result();

        //gabung semua notifikasi
        $notifikasi = array();
        $set = array();
        foreach ($data as $dt) {
            $set['tanggal'] = $dt->TANGGAL_LOG_HARIAN;
            $set['bulan'] = $dt->bulan;
            $set['ms2'] = 1;
            $set['interpolasi'] = 1;
            $set['ba'] = 1;
            $set['kpi_operasional'] = 1;
            $set['kpi_internal'] = 1;
            $set['jadwal'] = 1;
            $set['input_kinerja'] = 1;
            $set['notifikasi'] = 0;
            if ($dt->tanggal == 1) {
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
            }
            if ($dt->STATUS_INPUT_KINERJA == 0) {
                $set['input_kinerja'] = 0;
                $set['notifikasi'] = 1;
            }
            array_push($notifikasi, $set);
        }

        return $notifikasi;
    }

    //notifikasi pengingat aktivitas yang belum dilakukan untuk oam
    public function get_log_peringatan_oam() {
        $query = $this->db->query("select *,MONTH(TANGGAL_LOG_HARIAN) as bulan, DAY(TANGGAL_LOG_HARIAN) as tanggal 
                                    from log_harian, depot 
                                    where tanggal_log_harian <= CURDATE() 
                                    and log_harian.ID_DEPOT = depot.ID_DEPOT 
                                    and  (status_input_kinerja = 0 or status_ms2 = 0 or status_interpolasi = 0 or status_kpi_operasional_internal = 0 or status_kpi_internal = 0 or status_penjadwalan = 0 or generate_ba = 0)  
                                    order by tanggal_log_harian,depot.ID_DEPOT asc");
        $data = $query->result();
        //gabung semua notifikasi
        $notifikasi = array();
        $set = array();
        foreach ($data as $dt) {
            $set['tanggal'] = $dt->TANGGAL_LOG_HARIAN;
            $set['bulan'] = $dt->bulan;
            $set['id_depot'] = $dt->ID_DEPOT;
            $set['depot'] = $dt->NAMA_DEPOT;
            $set['ms2'] = 1;
            $set['interpolasi'] = 1;
            $set['ba'] = 1;
            $set['kpi_operasional'] = 1;
            $set['kpi_internal'] = 1;
            $set['jadwal'] = 1;
            $set['input_kinerja'] = 1;
            $set['notifikasi'] = 0;
            if ($dt->tanggal == 1) {
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
            }
            if ($dt->STATUS_INPUT_KINERJA == 0) {
                $set['input_kinerja'] = 0;
                $set['notifikasi'] = 1;
            }
            array_push($notifikasi, $set);
        }
//        $query = $this->db->query("select d.ID_DEPOT , d.NAMA_DEPOT, sum(lh.status_input_kinerja) as input_kinerja,sum(lh.status_ms2) as ms2,sum(lh.status_interpolasi) as interpolasi, 
//                                    sum(lh.status_kpi_operasional_internal) as kpi_operasional , sum(lh.status_kpi_internal) as kpi_internal,
//                                    sum(lh.status_kpi_oam) as kpi_oam, sum(lh.status_penjadwalan) as jadwal, sum(lh.generate_ba) as ba,
//                                    lh.TANGGAL_LOG_HARIAN as tanggal
//                                    from log_harian lh, depot d 
//                                    where lh.ID_DEPOT = d.ID_DEPOT 
//                                    group by lh.ID_DEPOT,lh.TANGGAL_LOG_HARIAN order by d.ID_DEPOT,tanggal asc");
         return $notifikasi;
    }

    public function cekTanggal($tanggal, $depot){
        $this->db->where('tanggal_log_harian', $tanggal);
        $this->db->where('id_depot', $depot);
        $data = $this->db->get('log_harian');
        return $data->result();
    }
}

?>
