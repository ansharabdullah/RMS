<?php

class m_rencana extends CI_Model {
    
    /* DASHBOARD --- RENISA */

    //realisasi rencana bulan ini

    public function get_rencana_bulan($id_depot,$bulan) {
        $query = $this->db->query("select sum(r.R_PREMIUM) as r_premium , sum(r.R_PERTAMAX) as r_pertamax , 
                                   sum(r.R_PERTAMAXPLUS) as r_pertamax_plus ,sum(r.R_BIOSOLAR) as r_bio_solar,
                                   sum(r.R_SOLAR) as r_solar, sum(r.R_PERTAMINADEX) as r_pertamina_dex,sum(r.R_OWN_USE) as r_own_use,
                                   (sum(r.R_PREMIUM) + sum(r.R_PERTAMAX) + sum(r.R_PERTAMAXPLUS) + sum(r.R_BIOSOLAR) +  sum(r.R_SOLAR) + sum(r.R_PERTAMINADEX) + sum(r.R_OWN_USE)) as total_kl
                                   from rencana r, log_harian lh 
                                   where  r.ID_LOG_HARIAN = lh.ID_LOG_HARIAN 
                                   and MONTH(lh.TANGGAL_LOG_HARIAN) = $bulan
                                   and lh.ID_DEPOT = $id_depot");
        return $query->result();
    }
    
     public function get_rencana_bulan_oam($bulan) {
        $query = $this->db->query("select sum(r.R_PREMIUM) as r_premium , sum(r.R_PERTAMAX) as r_pertamax , 
                                   sum(r.R_PERTAMAXPLUS) as r_pertamax_plus ,sum(r.R_BIOSOLAR) as r_bio_solar,
                                   sum(r.R_SOLAR) as r_solar, sum(r.R_PERTAMINADEX) as r_pertamina_dex,sum(r.R_OWN_USE) as r_own_use,
                                   (sum(r.R_PREMIUM) + sum(r.R_PERTAMAX) + sum(r.R_PERTAMAXPLUS) + sum(r.R_BIOSOLAR) +  sum(r.R_SOLAR) + sum(r.R_PERTAMINADEX) + sum(r.R_OWN_USE)) as total_kl
                                   from rencana r, log_harian lh 
                                   where  r.ID_LOG_HARIAN = lh.ID_LOG_HARIAN 
                                   and MONTH(lh.TANGGAL_LOG_HARIAN) = $bulan");
        return $query->result();
    }
    
    //rencana tahun ini
     public function get_rencana_tahun_oam($tahun) {
        $query = $this->db->query("select sum(r.R_PREMIUM) as r_premium , sum(r.R_PERTAMAX) as r_pertamax , 
                                   sum(r.R_PERTAMAXPLUS) as r_pertamax_plus ,sum(r.R_BIOSOLAR) as r_bio_solar,
                                   sum(r.R_SOLAR) as r_solar, sum(r.R_PERTAMINADEX) as r_pertamina_dex,sum(r.R_OWN_USE) as r_own_use,
                                   (sum(r.R_PREMIUM) + sum(r.R_PERTAMAX) + sum(r.R_PERTAMAXPLUS) + sum(r.R_BIOSOLAR) +  sum(r.R_SOLAR) + sum(r.R_PERTAMINADEX) + sum(r.R_OWN_USE)) as total_kl
                                   from rencana r, log_harian lh 
                                   where  r.ID_LOG_HARIAN = lh.ID_LOG_HARIAN 
                                   and YEAR(lh.TANGGAL_LOG_HARIAN) = $tahun");
        return $query->result();
    }
    
    //rencana hari ini
     public function get_rencana_hari_oam($tanggal) {
        $query = $this->db->query("select sum(r.R_PREMIUM) as r_premium , sum(r.R_PERTAMAX) as r_pertamax , 
                                   sum(r.R_PERTAMAXPLUS) as r_pertamax_plus ,sum(r.R_BIOSOLAR) as r_bio_solar,
                                   sum(r.R_SOLAR) as r_solar, sum(r.R_PERTAMINADEX) as r_pertamina_dex,sum(r.R_OWN_USE) as r_own_use,
                                   (sum(r.R_PREMIUM) + sum(r.R_PERTAMAX) + sum(r.R_PERTAMAXPLUS) + sum(r.R_BIOSOLAR) +  sum(r.R_SOLAR) + sum(r.R_PERTAMINADEX) + sum(r.R_OWN_USE)) as total_kl
                                   from rencana r, log_harian lh 
                                   where  r.ID_LOG_HARIAN = lh.ID_LOG_HARIAN 
                                   and lh.TANGGAL_LOG_HARIAN = '$tanggal'");
        return $query->result();
    }

}