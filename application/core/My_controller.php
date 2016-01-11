<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class My_controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        //date_default_timezone_set(date_default_timezone_get());
        date_default_timezone_set('Asia/Phnom_Penh');

        //load library
        $this->load->library('session');

        //load helper
        $this->load->helper(array('url', 'file'));

        //check login
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

    function delete_dir($dir_name)
    {
        return file_exists($dir_name)? is_dir($dir_name) && delete_files($dir_name, true) && rmdir($dir_name) : -1;
    }

    function delete_file($file_name)
    {
        return file_exists($file_name) ? is_file($file_name) && unlink($file_name) : -1;
    }

    function default_user_image_path()
    {
        return base_url()."app/template/images/avatar-1.jpg";
    }

    function get_file_site()
    {
        return base_url()."files/";
    }

    function get_file_path()
    {
        return SERVER_ROOT."files/";
    }

    function get_json_object()
    {
        return isset($_POST['model']) ? json_decode($_POST['model']) : null;
    }

    function upload_file($file_path = '', $file_name = '')
    {
        if(!isset($_FILES['file'])) return -1;

        $path = isset($file_path) && $file_path != ''? $file_path : "./files/";

		$config['upload_path'] = $path;
		$config['allowed_types'] = "gif|png|jpg|jpeg|ico|mp3|mp4|avi|flv|wmv|pdf";
        $config['max_size']	= 0;
		$config['max_width']  = 0;
		$config['max_height']  = 0;
        if(isset($file_name) && $file_name != '') $config['file_name'] = $file_name;

		$this->load->library('upload', $config);

        $result = null;

		if (!$this->upload->do_upload('file'))
		{
			//$result = array('error' => $this->upload->display_errors());
            $result = false;
		}
		else
		{
            $result = array('upload_data' => $this->upload->data());
		}

        return $result;
    }

}