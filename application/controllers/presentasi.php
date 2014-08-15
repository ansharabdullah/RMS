<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class presentasi extends CI_Controller {

    public function index() {
       $this->slide(1);
    }

    public function slide($index) {
        $data['lv1'] = 8;
        $data['lv2'] = 1;
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->load->view('layouts/navbar_oam',$data);
        $next = anchor("presentasi/slide/".($index - 1),"<button class='btn btn-danger'><i class='icon-long-arrow-left'></i> kembali</button>");
        $before = anchor("presentasi/slide/".($index + 1),"<button class='btn btn-danger' style='float:right;'>selanjutnya <i class='icon-long-arrow-left'></i></button>");
        $slide['paging'] = " <section class='panel'>
            <div class='panel-body'>".$before." ".$next."
            </div>
        </section>";
        //pilih slide
        switch ($index){
            case 1:
                $this->load->view('oam/presentasi/v_kpi_operasional',$slide);
                break;
            case 2:
                $this->load->view('oam/presentasi/v_realisasi_thruput',$slide);
                break;
            case 3:
                $this->load->view('oam/presentasi/v_ms2_compliance',$slide);
                break;
            case 4:
                $this->load->view('oam/presentasi/v_revenue',$slide);
                break;
            case 5:
                $this->load->view('oam/presentasi/v_laba_usaha',$slide);
                break;
            case 6:
                $this->load->view('oam/presentasi/v_cost_perliter',$slide);
                break;
            case 7:
                $this->load->view('oam/presentasi/v_thruput_kl',$slide);
                break;
            case 8:
                $this->load->view('oam/presentasi/v_pencapaian_ritase',$slide);
                break;
            case 9:
                $this->load->view('oam/presentasi/v_pencapaian_km',$slide);
                break;
            case 10:
                $this->load->view('oam/presentasi/v_breakdown_mt',$slide);
                break;
            case 11:
                $this->load->view('oam/presentasi/v_persentase_kehadiran',$slide);
                break;
            case 12:
                $this->load->view('oam/presentasi/v_kendala',$slide);
                break;
        }
        $this->load->view('layouts/footer');
        
    }

}
