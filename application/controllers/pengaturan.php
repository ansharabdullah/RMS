<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class pengaturan extends CI_Controller {

    public function index() {
        $data['lv1'] = 9;
        $data['lv2'] = 1;
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->load->view('layouts/navbar',$data);
        $this->load->view('pengaturan/v_pengaturan');
        $this->load->view('layouts/footer');
        
        
    }

    

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */