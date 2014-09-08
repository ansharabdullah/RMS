<?php

class m_grafik_mt extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
     public function get_kinerja_harian($depot,$hari,$bulan_mt,$tahun) {
        $query = $this->db->query("select * 
                                    from kinerja_mt km,log_harian lh,mobil m  
                                    where m.ID_MOBIL = km.ID_MOBIL 
                                    and km.ID_LOG_HARIAN = lh.ID_LOG_HARIAN 
                                    and DAY(lh.TANGGAL_LOG_HARIAN) = $hari and MONTH(lh.TANGGAL_LOG_HARIAN) = $bulan_mt and YEAR(lh.TANGGAL_LOG_HARIAN) = $tahun 
                                    and lh.ID_DEPOT = $depot");
        return $query->result();
    }
    
    public function get_kinerja_tanggal($depot,$bulan_mt,$tahun) {
        $query = $this->db->query("select lh.TANGGAL_LOG_HARIAN,(DAY(lh.TANGGAL_LOG_HARIAN ))as hari,sum(ritase_mt) as ritase,sum(total_km_mt) as total_km, sum(total_kl_mt) as total_kl ,
                                    sum(km.PREMIUM) as premium , sum(km.PERTAMAX) as pertamax, 
                                    sum(km.PERTAMAX_PLUS) as pertamax_plus,sum(km.PERTAMINA_DEX) as pertamina_dex , 
                                    sum(km.OWN_USE) as own_use,sum(km.solar) as solar, sum(km.bio_solar) as bio_solar ,lh.TANGGAL_LOG_HARIAN
                                    from kinerja_mt km, log_harian lh 
                                    where  km.ID_LOG_HARIAN = lh.ID_LOG_HARIAN and 
                                    lh.id_depot = $depot AND MONTH(lh.TANGGAL_LOG_HARIAN) = $bulan_mt and YEAR(lh.TANGGAL_LOG_HARIAN) = $tahun
                                    group by lh.TANGGAL_LOG_HARIAN order by lh.TANGGAL_LOG_HARIAN asc");
        return $query->result();
    }
    
    public function get_kinerja($depot,$tahun) {
        $query = $this->db->query("select (DAY(lh.TANGGAL_LOG_HARIAN ))as hari,(MONTHNAME(lh.TANGGAL_LOG_HARIAN ))as bulan,lh.TANGGAL_LOG_HARIAN,sum(ritase_mt) as ritase,sum(total_km_mt) as total_km, sum(total_kl_mt) as total_kl ,
                                    sum(km.PREMIUM) as premium , sum(km.PERTAMAX) as pertamax, 
                                    sum(km.PERTAMAX_PLUS) as pertamax_plus,sum(km.PERTAMINA_DEX) as pertamina_dex , 
                                    sum(km.OWN_USE) as own_use,sum(km.solar) as solar, sum(km.bio_solar) as bio_solar
                                    from kinerja_mt km, log_harian lh 
                                    where  km.ID_LOG_HARIAN = lh.ID_LOG_HARIAN and 
                                    lh.id_depot = $depot and YEAR(lh.TANGGAL_LOG_HARIAN) = $tahun
                                    group by MONTH(lh.TANGGAL_LOG_HARIAN) order by lh.TANGGAL_LOG_HARIAN asc");
        return $query->result();
    }
}
?>
