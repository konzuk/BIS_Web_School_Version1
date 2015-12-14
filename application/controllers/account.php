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


        $this->load->model('Account_model', '', true);

        echo json_encode($this->Account_model->get_all_users());

//        $user_data['users'] = $this->Account_model->get_all_users();
//        $this->load->view('admin/header_footer/header', $data);
//        $this->load->view('admin/manage_user', $user_data);
//        $this->load->view('admin/header_footer/footer');
                 
	}

    public function delete_user()
    {

        $this->load->model('Account_model', '', true);
        $this->load->database();

        $json = file_get_contents('php://input');
        $obj = json_decode($json);

        $query = "Delete from account where AccountId = $obj->AccountId ";
        if ($this->db->query($query))
        {
           echo json_encode(true);
        }
        else
        {
            echo json_encode(false);
        }
    }

    public function add_user()
	{		
        $this->load->helper('url');
        		        
        $data['page']= 'manage_user';

        $this->load->view('admin/header_footer/header', $data);        
        $this->load->view('admin/add_user');
        $this->load->view('admin/header_footer/footer');
                 
	}
    

    public function get_user(){
        

    }


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */