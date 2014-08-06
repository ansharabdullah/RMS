<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mt extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('layouts/header');
		$this->load->view('layouts/menu');
		$this->load->view('layouts/navbar');
		$this->load->view('testing/page');
		$this->load->view('layouts/footer');
                
	}
        
        public function header()
        {
            $this->load->view('layouts/header');
            $this->load->view('layouts/menu');
            $this->load->view('layouts/navbar');
        }
        
         public function data_mt()
        {
             
                $this->load->view('layouts/header');
		$this->load->view('layouts/menu');
		$this->load->view('layouts/navbar');
		$this->load->view('mt/v_data_mt');
		$this->load->view('layouts/footer');
            
        }
        public function detail_mt()
        {
             
                $this->load->view('layouts/header');
		$this->load->view('layouts/menu');
		$this->load->view('layouts/navbar');
		$this->load->view('mt/v_detail_mt');
		$this->load->view('layouts/footer');
            
        }
        
        
        
        public function footer()
        {
            $this->load->view('layouts/footer');
        }
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */