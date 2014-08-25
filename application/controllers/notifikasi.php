<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class notifikasi extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model("m_mt");
        $this->load->model("m_amt");
        $this->load->model("m_kinerja");
        $this->load->model("m_rencana");
        $this->load->model("m_log_harian");
        $this->load->model("m_depot");
    }
    
    public function index()
    {
        
        
    }
}
?>
