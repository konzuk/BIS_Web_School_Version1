<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class My_controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        date_default_timezone_set(date_default_timezone_get());
        //date_default_timezone_get('Asia/Phnom_Penh');


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

            $location =  base_url()."index.php/login";
            header("status: 521 $location");
            header("Refresh: 0; url=$location");

            exit;
        }

//        $this->session->sess_destroy();
//        $this->session->unset_userdata('user');

    }

    function get_json_object()
    {
        $result = file_get_contents('php://input');

        return json_decode($result);
    }

    function get_object_file()
    {

        echo print_r($_POST);
        echo print_r($_FILES);


    }

}