<?php

class m_grafik_mt extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
     public function get_kinerja_harian($depot,$bulan_mt,$hari) {
        $query = $this->db->query("select lh.TANGGAL_LOG_HARIAN, m.id_mobil,m.nopol,m.kapasitas,m.produk,km.premium,km.pertamax,km.pertamax_plus,km.pertamina_dex,km.own_use,km.solar,km.bio_solar,km.total_km_mt,km.total_kl_mt,km.ritase_mt,
                                    lh.tanggal_log_harian ,(MONTHNAME(lh.TANGGAL_LOG_HARIAN ))as bulan 
                                   from kinerja_mt km, log_harian lh, mobil m
                                   where  km.ID_LOG_HARIAN = lh.ID_LOG_HARIAN and MONTH(lh.TANGGAL_LOG_HARIAN) = $bulan_mt 
                                   and DAY(lh.TANGGAL_LOG_HARIAN) = $hari and km.id_mobil=m.id_mobil and lh.id_depot = $depot");
        return $query->result();
    }
    
    public function get_kinerja_tanggal($depot,$bulan_mt) {
        $query = $this->db->query("select lh.TANGGAL_LOG_HARIAN,(DAY(lh.TANGGAL_LOG_HARIAN ))as hari,sum(ritase_mt) as ritase,sum(total_km_mt) as total_km, sum(total_kl_mt) as total_kl ,
                                    sum(km.PREMIUM) as premium , sum(km.PERTAMAX) as pertamax, 
                                    sum(km.PERTAMAX_PLUS) as pertamax_plus,sum(km.PERTAMINA_DEX) as pertamina_dex , 
                                    sum(km.OWN_USE) as own_use,sum(km.solar) as solar, sum(km.bio_solar) as bio_solar ,lh.TANGGAL_LOG_HARIAN
                                    from kinerja_mt km, log_harian lh 
                                    where  km.ID_LOG_HARIAN = lh.ID_LOG_HARIAN and 
                                    lh.id_depot = $depot AND MONTH(lh.TANGGAL_LOG_HARIAN) = $bulan_mt
                                    group by lh.TANGGAL_LOG_HARIAN order by lh.TANGGAL_LOG_HARIAN asc");
        return $query->result();
    }
    
    public function get_kinerja($depot) {
        $query = $this->db->query("select (DAY(lh.TANGGAL_LOG_HARIAN ))as hari,(MONTHNAME(lh.TANGGAL_LOG_HARIAN ))as bulan,lh.TANGGAL_LOG_HARIAN,sum(ritase_mt) as ritase,sum(total_km_mt) as total_km, sum(total_kl_mt) as total_kl ,
                                    sum(km.PREMIUM) as premium , sum(km.PERTAMAX) as pertamax, 
                                    sum(km.PERTAMAX_PLUS) as pertamax_plus,sum(km.PERTAMINA_DEX) as pertamina_dex , 
                                    sum(km.OWN_USE) as own_use,sum(km.solar) as solar, sum(km.bio_solar) as bio_solar
                                    from kinerja_mt km, log_harian lh 
                                    where  km.ID_LOG_HARIAN = lh.ID_LOG_HARIAN and 
                                    lh.id_depot = $depot
                                    group by MONTH(lh.TANGGAL_LOG_HARIAN) order by lh.TANGGAL_LOG_HARIAN asc");
        return $query->result();
    }
}
?>
