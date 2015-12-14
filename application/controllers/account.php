<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends CI_Controller {
    	
	public function index()
	{		
        $this->load->helper('url');
        		        
        $this->manage_user();
                 
	}

    public function manage_depositor()
	{		
        $this->load->helper('url');
        		        
        $data['page']= 'manage_depositor';	

        $this->load->view('admin/header_footer/header', $data);        
        $this->load->view('admin/all_depositor');
        $this->load->view('admin/header_footer/footer');
                 
	}


    public function add_depositor()
	{		
        $this->load->helper('url');
        		        
        $data['page']= 'manage_depositor';	

        $this->load->view('admin/header_footer/header', $data);        
        $this->load->view('admin/add_depositor');
        $this->load->view('admin/header_footer/footer');
                 
	}

    public function manage_user()
	{		
        $this->load->helper('url');
        		        
        $data['page']= 'manage_user';	                    
        $this->load->view('admin/header_footer/header', $data);     
      

        $this->load->model('Account_model', '');
        $user_data['users'] = $this->Account_model->get_all_users();   
             
        $this->load->view('admin/manage_user', $user_data);
        //$this->load->view('admin/manage_user');
    
        $this->load->view('admin/header_footer/footer');
                 
	}

    public function add_user()
	{		
        $this->load->helper('url');
        		        
        $data['page']= 'manage_user';

        $this->load->view('admin/header_footer/header', $data);        
        $this->load->view('admin/add_user');
        $this->load->view('admin/header_footer/footer');
                 
	}



}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */