<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->library('session');
        $this->load->helper('url');
    }

	public function index(Account_model $account=null)
    {
        $user = $this->session->userdata('user');
        if(isset($user))
        {
            //$this->session->unset_userdata('user');
            $this->session->sess_destroy();
        }

        $this->load->view('admin/login', $account);
    }

    function login()
    {
        $this->load->model('Account_model', '', true);

        $account = new Account_model();
        $account->AccountNumber = isset($_POST['AccountNumber'])? $_POST['AccountNumber']: '';
        $account->Password = isset($_POST['Password'])? $_POST['Password'] : '';

        $result = $this->Account_model->login($account);

        if($result)
        {
            $this->session->set_userdata(array('user'=>$result));

            header("location:". base_url()."index.php");
        }
        else
        {
            $account->RememberMe = isset($_POST['RememberMe']) && $_POST['RememberMe']==true;
            $this->index($account);
        }
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */