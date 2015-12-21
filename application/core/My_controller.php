<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class My_controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->library('session');
        $this->load->helper('url');

        $this->check_login();
    }

    function check_login()
    {

        //$users = $this->session->all_userdata();
        $user = $this->session->userdata('user');

        if(!isset($user))
        {
            header("location:". base_url()."index.php/login");
        }

//        $this->session->sess_destroy();
//        $this->session->unset_userdata('user');

    }

    function get_json_object()
    {
        $result = file_get_contents('php://input');

        return json_decode($result);
    }

}