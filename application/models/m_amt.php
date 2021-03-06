<?php

class m_amt extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function insertPegawai($data) {
        $this->db->insert('pegawai', $data);
    }

    public function importPegawai($data) {
        for ($i = 0; $i < sizeof($data); $i++) {
            $this->db->insert('pegawai', $data[$i]);
        }
    }

    public function getMaxID() {
        $depot = $this->session->userdata('id_depot');
        $query = $this->db->query("select max(id_pegawai) max from pegawai where id_depot=$depot");
        return $query->result();
    }
    public function getMaxIDPegawai($depot) {
        $query = $this->db->query("select max(id_pegawai) max from pegawai where id_depot=$depot");
        return $query->result();
    }
    

    public function editPegawai($data, $id) {
        $this->db->where('id_pegawai', $id);
        $this->db->update('pegawai', $data);
    }

    public function deletePegawai($id) {
        $this->db->where('id_pegawai', $id);
        $this->db->delete('pegawai');
    }
    
    public function editRA($data,$id){
        $this->db->where('id_pegawai', $id);
        $this->db->update('role_assignment', $data);
    }

    public function selectAMT($depot) {
        $data = $this->db->query("select * from pegawai where (jabatan='SUPIR' or jabatan='KERNET') and ID_DEPOT=$depot");
        return $data->result();
    }

    public function detailAMT($id_pegawai) {
        $data = $this->db->query("select * from pegawai where (jabatan='SUPIR' or jabatan='KERNET') and id_pegawai=$id_pegawai");
        return $data->result();
    }

    public function detailPegawai($id_pegawai) {
        $data = $this->db->query("select * from pegawai p, role_assignment r where p.id_pegawai=r.id_pegawai and (p.jabatan<>'SUPIR' or p.jabatan<>'KERNET') and p.id_pegawai=$id_pegawai");
        return $data->result();
    }

    public function cekNIP($nip) {
        $this->db->where('nip',$nip);
        $data = $this->db->get('pegawai');
        //$data = $this->db->query("select * from pegawai where nip='$nip'");
        return $data->result();
    }
    
    public function getNIP($id){
        $this->db->where('id_pegawai',$id);
        $this->db->select('nip');
        $this->db->from('pegawai');
        $data = $this->db->get();
        return $data->row();
    }

    //koefisien
    public function getKoefisien($depot, $tahun) {
        $data = $this->db->query("select * from nilai n, jenis_penilaian j, log_harian l where j.id_jenis_penilaian=n.id_jenis_penilaian and n.ID_LOG_HARIAN=l.ID_LOG_HARIAN and l.ID_DEPOT='$depot' and year(l.TANGGAL_LOG_HARIAN)='$tahun' and j.id_jenis_penilaian between 25 and 64");
        return $data->result();
    }

    public function importKoefisien($data) {
        for ($i = 0; $i < sizeof($data); $i++) {
            $this->db->insert('nilai', $data[$i]);
        }
    }
    
    public function getKoef($jenis, $tugas, $klasifikasi, $depot, $tahun) {
        $query = $this->db->query("select n.NILAI from nilai n, jenis_penilaian j, log_harian l
        where n.ID_JENIS_PENILAIAN=j.ID_JENIS_PENILAIAN and l.ID_LOG_HARIAN=n.ID_LOG_HARIAN and j.JENIS_PENILAIAN='KOEFISIEN $jenis $tugas $klasifikasi' and l.ID_DEPOT=$depot and year(l.TANGGAL_LOG_HARIAN)='$tahun'");
        return $query->result();
    }
    
    public function getKlasifikasi($id_pegawai){
        $this->db->where('id_pegawai', $id_pegawai);
        $query = $this->db->get('pegawai');
        return $query->result();
    }
    
    public function getIDNilaiKoef($depot, $tahun, $koef){
        $query = $this->db->query("select * from nilai n, jenis_penilaian j, log_harian l where j.id_jenis_penilaian=n.id_jenis_penilaian and n.ID_LOG_HARIAN=l.ID_LOG_HARIAN and l.ID_DEPOT=$depot and year(l.TANGGAL_LOG_HARIAN)=$tahun and j.id_jenis_penilaian=$koef");
        return $query->result();
    }
    
    public function editNilaiKoef($data, $id){
        $this->db->where('ID_NILAI', $id);
        $this->db->update('nilai', $data);
    }


    /*     * DASHBOARD --- Renisa* */

    //oam
    public function getAllAMt() {
        $data = $this->db->query("select * from pegawai where (jabatan='SUPIR' or jabatan='KERNET')");
        return $data;
    }

    public function getTotalAMt() {
        return $this->getAllAMt()->num_rows();
    }

    //ss
    public function getAllAMtByDepot($id_depot) {
        $data = $this->db->query("select * from pegawai where (jabatan='SUPIR' or jabatan='KERNET') and ID_DEPOT=$id_depot");
        return $data;
    }

    public function getTotalAMtByDepot($id_depot) {
        return $this->getAllAMtByDepot($id_depot)->num_rows();
    }

    //grafik detail
    public function get_kinerja_amt_hari($id_depot, $bulan, $tahun, $id_pegawai) {
        $query = $this->db->query("select sum(total_km) as total_km, sum(total_kl) as total_kl , ka.ID_KINERJA_AMT, ka.status_tugas,
                                    sum(ka.RITASE_AMT) as ritase , sum(ka.SPBU) as spbu, sum(ka.PENDAPATAN) as pendapatan,
                                    lh.TANGGAL_LOG_HARIAN, DAY(lh.TANGGAL_LOG_HARIAN) as tanggal  
                                    from kinerja_amt ka, log_harian lh 
                                    where ka.ID_LOG_HARIAN = lh.ID_LOG_HARIAN and
                                    ka.ID_PEGAWAI=$id_pegawai and
                                    lh.id_depot = $id_depot and MONTH(lh.TANGGAL_LOG_HARIAN) = $bulan 
                                    and YEAR(lh.TANGGAL_LOG_HARIAN) = $tahun 
                                    group by lh.TANGGAL_LOG_HARIAN order by tanggal asc");
        return $query->result();
    }
    
    public function get_kinerja_amt_tabel($id_depot, $bulan, $tahun, $id_pegawai) {
        $query = $this->db->query("select sum(total_km) as total_km, sum(total_kl) as total_kl , ka.ID_KINERJA_AMT, ka.status_tugas,
                                    sum(ka.RITASE_AMT) as ritase , sum(ka.SPBU) as spbu, sum(ka.PENDAPATAN) as pendapatan,
                                    lh.TANGGAL_LOG_HARIAN, DAY(lh.TANGGAL_LOG_HARIAN) as tanggal  
                                    from kinerja_amt ka, log_harian lh 
                                    where ka.ID_LOG_HARIAN = lh.ID_LOG_HARIAN and
                                    ka.ID_PEGAWAI=$id_pegawai and
                                    lh.id_depot = $id_depot and MONTH(lh.TANGGAL_LOG_HARIAN) = $bulan 
                                    and YEAR(lh.TANGGAL_LOG_HARIAN) = $tahun 
                                    group by ka.ID_KINERJA_AMT order by tanggal asc");
        return $query->result();
    }
    
    //persentase
    public function get_persentase_kehadiran($id_depot,$tahun,$bulan){
        
        
        $persentasi = array();
        for($i = 0 ; $i < 3; $i++){
                //kinerja
                $query = $this->db->query("select count(*)as jumlah , p.id_depot from 
                                            kinerja_amt ka, pegawai p, log_harian l
                                            where p.ID_PEGAWAI=ka.ID_PEGAWAI  and p.id_depot = $id_depot 
                                            and l.ID_LOG_HARIAN=ka.ID_LOG_HARIAN and month(l.TANGGAL_LOG_HARIAN)=$bulan and year(l.TANGGAL_LOG_HARIAN)=$tahun 
                                            group by p.ID_DEPOT");
                $kinerja = $query->result();
                //jadwal
                $query = $this->db->query("select count(*) as jumlah, l.id_depot
                                            from jadwal j, log_harian l
                                            where j.ID_LOG_HARIAN=l.ID_LOG_HARIAN  and l.id_depot = $id_depot
                                            and month(l.TANGGAL_LOG_HARIAN)=$bulan and year(l.TANGGAL_LOG_HARIAN)=$tahun 
                                            group by l.ID_DEPOT");
                $jadwal = $query->result();
                if(sizeof($kinerja) > 0 && sizeof($jadwal))
                {
                    array_push($persentasi,($kinerja[0]->jumlah / $jadwal[0]->jumlah) * 100);
                }
                else
                {
                    array_push($persentasi,0);
                }
            $bulan++;
        }
        
        return $persentasi;
        
    }

    
}
