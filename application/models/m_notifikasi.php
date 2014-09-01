<?php

class m_notifikasi extends CI_Model {

    public function notifikasi_mt($id_depot){
        
        $notifikasi = array();
        //reminder apar
         $query = $this->db->query("select a.ID_APAR,m.NOPOL,a.STATUS_APAR,DATEDIFF(a.STORE_PRESSURE,now()) as store_pressure,DATEDIFF(a.CATRIDGE,now()) as  catridge,DATEDIFF(a.CO2,now()) as co2,
                            a.STORE_PRESSURE as tgl_store,a.CATRIDGE as tgl_catridge,a.CO2 as tgl_co2
                          from apar a, mobil m, depot d 
                          where m.ID_MOBIL = a.ID_MOBIL 
                          and m.ID_DEPOT = d.ID_DEPOT 
                          and d.ID_DEPOT = $id_depot ");
         
         $data = $query->result();
         $arr = array();
         $set = array();
         foreach($data as $dt)
         {
             if($dt->store_pressure <= 7 || $dt->catridge <= 7 || $dt->co2 <=7)
             {  
                 array_push($set,"Mobil Tangki ".$dt->NOPOL);
             }
         }
         $arr['title'] = "Reminder Apar";
         $arr['data'] = $set;
         $arr['url'] = base_url()."mt/reminder";
         array_push($notifikasi,$arr);
        
        //reminder ban
         
         $query = $this->db->query("select b.ID_BAN,m.NOPOL,DATEDIFF(b.TANGGAL_GANTI_BAN,now()) as sisa_waktu,b.TANGGAL_GANTI_BAN
                          from ban b, mobil m, depot d 
                          where m.ID_MOBIL = b.ID_MOBIL 
                          and m.ID_DEPOT = d.ID_DEPOT 
                          and d.ID_DEPOT = $id_depot order by b.ID_MOBIL asc");
         $data = $query->result();
         $arr = array();
         $set = array();
         foreach($data as $dt)
         {
             if($dt->sisa_waktu <= 7)
             {  
                 array_push($set,"Mobil Tangki ".$dt->NOPOL);
             }
         }
         $arr['title'] = "Reminder Ban";
         $arr['data'] = $set;
         $arr['url'] = base_url()."mt/reminder";
         array_push($notifikasi,$arr);
         
        //reminder surat 
        $query = $this->db->query("select a.ID_SURAT,m.NOPOL,a.KETERANGAN_SURAT,j.ID_JENIS_SURAT,DATEDIFF(a.TANGGAL_AKHIR_SURAT,now()) as tanggal_akhir_surat,
                            a.TANGGAL_AKHIR_SURAT as tgl_surat
                          from surat a,jenis_surat j, mobil m, depot d 
                          where j.id_jenis_surat=a.id_jenis_surat 
                          and m.ID_MOBIL = a.ID_MOBIL 
                          and m.ID_DEPOT = d.ID_DEPOT 
                          and d.ID_DEPOT = $id_depot ");
        
         $data = $query->result();
         $arr = array();
         $set = array();
         foreach($data as $dt)
         {
             if($dt->tanggal_akhir_surat <= 7)
             {
                 array_push($set,"Mobil Tangki ".$dt->NOPOL);
             }
         }
         $arr['title'] = "Reminder Surat";
         $arr['data'] = $set;
         $arr['url'] = base_url()."mt/reminder";
         array_push($notifikasi,$arr);
        //reminder oli
         
         return $notifikasi;
    }
    
    
    public function notifikasi_amt($id_depot)
    {
        
        
    }

}