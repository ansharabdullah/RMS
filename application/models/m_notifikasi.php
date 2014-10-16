<?php

class m_notifikasi extends CI_Model {

    public function notifikasi_mt($id_depot) {

        $notifikasi = array();
        //reminder apar

        $query = $this->db->query("select a.ID_APAR,m.NOPOL,DATEDIFF(a.TANGGAL_APAR,now()) as store_pressure,
                            a.TANGGAL_APAR as tgl_store
                          from apar a, mobil m, depot d 
                          where m.ID_MOBIL = a.ID_MOBIL 
                          and m.ID_DEPOT = d.ID_DEPOT 
                          and d.ID_DEPOT = $id_depot order by m.ID_MOBIL asc");

        $data = $query->result();
        $arr = array();
        $set = array();
        foreach ($data as $dt) {
            if ($dt->store_pressure <= 7) {
                array_push($set, "Mobil Tangki " . $dt->NOPOL);
            }
        }
        $arr['title'] = "Reminder Apar";
        $arr['data'] = $set;
        $arr['url'] = base_url() . "mt/reminder";
        array_push($notifikasi, $arr);


        //reminder surat 
        $query = $this->db->query("select a.ID_SURAT,m.NOPOL,a.KETERANGAN_SURAT,j.ID_JENIS_SURAT,DATEDIFF(a.TANGGAL_AKHIR_SURAT,now()) as tanggal_akhir_surat,
                            a.TANGGAL_AKHIR_SURAT as tgl_surat
                          from surat a,jenis_surat j, mobil m, depot d 
                          where j.id_jenis_surat=a.id_jenis_surat 
                          and m.ID_MOBIL = a.ID_MOBIL 
                          and m.ID_DEPOT = d.ID_DEPOT 
                           and d.ID_DEPOT > 0
                          and d.ID_DEPOT = $id_depot order by m.ID_MOBIL asc");

        $data = $query->result();
        $arr = array();
        $set = array();
        foreach ($data as $dt) {
            if ($dt->tanggal_akhir_surat <= 7) {
                array_push($set, "Mobil Tangki " . $dt->NOPOL);
            }
        }
        $arr['title'] = "Reminder Surat";
        $arr['data'] = $set;
        $arr['url'] = base_url() . "mt/reminder";
        array_push($notifikasi, $arr);
        
        //reminder ban
        $query = $this->db->query("select a.ID_BAN,m.NOPOL,a.POSISI_BAN,a.MERK_BAN,a.NO_SERI_BAN,a.JENIS_BAN,DATEDIFF(a.TANGGAL_GANTI_BAN,now()) as tanggal_ban,
                                   a.TANGGAL_GANTI_BAN as tgl_ganti
                                   from ban a, mobil m, depot d 
                                   where m.ID_MOBIL = a.ID_MOBIL 
                                   and m.ID_DEPOT = d.ID_DEPOT 
                                   and d.ID_DEPOT > 0
                                   and d.ID_DEPOT = $id_depot order by m.ID_MOBIL asc");
        
        $data = $query->result();
        $arr = array();
        $set = array();
        $id_ban = "";
        foreach ($data as $dt) {
            if ($dt->tanggal_ban <= 7 && $id_ban != $dt->ID_BAN) {
                array_push($set, "Mobil Tangki " . $dt->NOPOL);
                $id_ban = $dt->ID_BAN;
            }
        }
        $arr['title'] = "Reminder Ban";
        $arr['data'] = $set;
        $arr['url'] = base_url() . "mt/reminder";
        array_push($notifikasi, $arr);
        
        //reminder oli

        $query = $this->db->query("select a.ID_OLI,m.NOPOL,a.KM_AWAL,a.MERK_OLI,a.TOTAL_VOLUME,DATEDIFF(a.TANGGAL_GANTI_OLI,now()) as tanggal_ganti_oli,
                                  a.TANGGAL_GANTI_OLI as tgl_oli
                                  from oli a, mobil m, depot d 
                                  where m.ID_MOBIL = a.ID_MOBIL 
                                  and m.ID_DEPOT = d.ID_DEPOT 
                                   and d.ID_DEPOT > 0
                                  and d.ID_DEPOT = $id_depot order by m.ID_MOBIL asc");
        $data = $query->result();
        $arr = array();
        $set = array();
        foreach ($data as $dt) {
            if ($dt->tanggal_ganti_oli <= 7) {
                array_push($set, "Mobil Tangki " . $dt->NOPOL);
            }
        }
        $arr['title'] = "Reminder Oli";
        $arr['data'] = $set;
        $arr['url'] = base_url() . "mt/reminder";
        array_push($notifikasi, $arr);
        
        return $notifikasi;
    }

    public function notifikasi_amt($id_depot) {
        
    }

}