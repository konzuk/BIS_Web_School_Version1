<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Upload extends My_Controller {

	function __construct()
	{
		parent::__construct();

        $this->load->helper(array('form'));
	}

	function index()
	{
		$this->load->view('admin/upload_form', array('error' => '' ));
	}

	function do_upload()
	{
//		$config['upload_path'] = './files/';
//		$config['allowed_types'] = 'gif|png|jpg|jpeg|mp3|mp4|avi|flv|wmv';
//        $config['max_size']	= '100000000000000000000';
//		$config['max_width']  = '0';
//		$config['max_height']  = '0';
//
//		$this->load->library('upload', $config);
//
//		if ( ! $this->upload->do_upload())
//		{
//			$error = array('error' => $this->upload->display_errors());
//
//			$this->load->view('admin/upload_form', $error);
//		}
//		else
//		{
//			$data = array('upload_data' => $this->upload->data());
//
//			$this->load->view('admin/upload_success', $data);
//		}


        //if(isset($_FILES['file'])) echo print_r($_FILES['file']);
//        else echo 'No file to upload';

        $upload = $this->upload_file();
        echo print_r($upload);


	}
}

?>