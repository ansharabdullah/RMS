<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class pengaturan_oam extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model("m_depot");
    }
    
    public function index() {
        $data['lv1'] = 9;
        $data['lv2'] = 1;
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->navbar($data['lv1'],$data['lv2']);
        $this->load->view('oam/v_pengaturan');
        $this->load->view('layouts/footer');
        
        
    }
    
    
    public function navbar($lv1,$lv2)
    {
        $data['lv1'] = $lv1;
        $data['lv2'] = $lv2;
        $data['depot'] = $this->m_depot->get_depot();
        $this->load->view('layouts/navbar_oam', $data);
    }
    

    

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */