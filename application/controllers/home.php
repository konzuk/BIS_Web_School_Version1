<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{		
        $this->load->helper('url');
        
        $data['page']= 'home';		        

        $this->load->view('admin/header_footer/header', $data);        
        $this->load->view('admin/home');
        $this->load->view('admin/header_footer/footer');
                 
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */